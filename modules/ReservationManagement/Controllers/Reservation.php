<?php namespace Modules\ReservationManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use Modules\ReservationManagement\Models as ReservationManagement;
use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\SendMail;
use TCPDF;
use App\Controllers\BaseController;
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = FCPATH.'assets/img/header-long.png';
        $this->Image($image_file, 5, 5, '350', '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        $this->SetX(350);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $image_file = FCPATH.'assets/img/footer-long.png';
        $this->Image($image_file, 5, 195, '350', '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Page number
    }
}
class Reservation extends BaseController
{
	function __construct(){
		$this->usersModel = new UserManagement\UsersModel();
		$this->reservationsModel = new ReservationManagement\ReservationsModel();
		$this->facilitiesModel = new ReservationManagement\FacilitiesModel();
		$this->facilityMaintenancesModel = new ReservationManagement\FacilityMaintenancesModel();
		$this->logsModel = new ReservationManagement\LogsModel();
		$this->reservationStatusModel = new ReservationManagement\ReservationStatusModel();
		$this->facultiesModel = new UniversityManagement\FacultiesModel();
		$this->studentsModel = new UniversityManagement\StudentsModel();
		$this->coursesModel = new UniversityManagement\CoursesModel();
		$this->organizationsModel = new UniversityManagement\OrganizationsModel();
		$this->eventTypesModel = new SystemSettings\EventTypesModel();
		$this->organizationOfficersModel = new UniversityManagement\OrganizationOfficersModel();
		$this->sendMail = new SendMail();
		helper(['form']);

		$this->options = new \Dompdf\Options();
		$this->options->set('isRemoteEnabled', TRUE);
		$this->options->set('isHtml5ParserEnabled', TRUE);
		$this->dompdf = new \Dompdf\Dompdf($this->options);
	}

	public function index()
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
		$data = [
			'page_title' => 'RMFS | Reservation',
			'title' => 'List of Reservations',
			'view' => 'Modules\ReservationManagement\Views\reservation\index',
			'reservations' => $this->reservationsModel->getDetails(),
			'userReservations' => $this->reservationsModel->getDetails(['frbs_reservations.user_id' => session()->get('id')]),
			'userPendingReservations' => $this->reservationsModel->getDetails(['frbs_reservations.user_id' => session()->get('id'), 'frbs_reservations.status_id' => 1]),
			'userApprovedReservations' => $this->reservationsModel->getDetails(['frbs_reservations.user_id' => session()->get('id'), 'frbs_reservations.status_id' => 2]),
			'userRejectedReservations' => $this->reservationsModel->getDetails(['frbs_reservations.user_id' => session()->get('id'), 'frbs_reservations.status_id' => 3]),
		];
		// if($data['value']['event_type_id'] == 1){
		// 	$professor = $this->facultiesModel->get(['position_id' => 8])[0];
		// }else{
		// 	$professor = $this->facultiesModel->get(['position_id' => 7])[0];
		// }
		// $data['sAdmin'] = $professor['first_name'];
		if(session()->get("role_id") == 6){
			$data['reservationsAssessed'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.president_is_checked' => 1, 's.email_address' => session()->get('email_address'), 'frbs_reservation_status.status_id' => 2]);
			$data['reservationsForApproval'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.president_is_checked' => 0, 's.email_address' => session()->get('email_address'), 'frbs_reservation_status.status_id' => 2]);
		}
		else if(session()->get("role_id") == 7){
			$data['reservationsAssessed'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.custodian_is_checked' => 1, 'frbs_reservation_status.status_id' => 2]);
			$data['reservationsForApproval'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.custodian_is_checked' => 0, 'frbs_reservation_status.status_id' => 2]);
		}
		else if(session()->get("role_id") == 8){
			$professor = $this->facultiesModel->get(['first_name' => session()->get('first_name')])[0];
			if($professor['position_id'] == 8){
				$event_type = 1;
			}else{
				$event_type = 2;
			}
			$data['reservationsAssessed'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.admin_is_checked' => 1, 'r.event_type_id' => $event_type, 'frbs_reservation_status.status_id' => 2]);
			$data['reservationsForApproval'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.admin_is_checked' => 0, 'r.event_type_id' => $event_type, 'frbs_reservation_status.status_id' => 2]);
		}
		else if(session()->get("role_id") == 10){
			$data['reservationsAssessed'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.professor_is_checked' => 1, 'p.email_address' => session()->get('email_address'), 'frbs_reservation_status.status_id' => 2]);
			$data['reservationsForApproval'] = $this->reservationStatusModel->getDetails(['frbs_reservation_status.is_checked' => 0, 'frbs_reservation_status.professor_is_checked' => 0, 'p.email_address' => session()->get('email_address'), 'frbs_reservation_status.status_id' => 2]);
		}
		// die(print_r($this->reservationsModel->getDetails()));
		return view('templates/index', $data);
	}

	public function calendar()
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$data = [
			'page_title' => 'RMFS | Calendar of events',
			'title' => 'Calendar of Activities',
			'view' => 'Modules\ReservationManagement\Views\reservation\calendar',
			'forApprovals' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.status_id' => 2]),
			'ongoings' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.status_id' => 4]),
			'pending' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.status_id' => 1]),
			'maintenances' => $this->facilityMaintenancesModel->getDetails()
		];

		return view('templates/index', $data);
	}
	public function add()
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$data = [
			'page_title' => 'RMFS | Reservations',
			'title' => 'Reservation',
			'view' => 'Modules\ReservationManagement\Views\reservation\form',
			'edit' => false,
			'organizations' => $this->organizationsModel->get(),
			'organizationOfficers' => $this->organizationOfficersModel->getDetails(),
			'types' => $this->eventTypesModel->get(),
			'facilities' => $this->facilitiesModel->get(['facility_status_id' => 5]),
			'courses' => $this->coursesModel->get(),
			'students' => $this->studentsModel->get(),
			'faculties' => $this->facultiesModel->get(),
		];
		
		if ($this->request->getMethod() == 'post') {
			if (!$this->validate('reservations')) {
                $data['errors'] = $this->validation->getErrors();
				$data['value'] = $_POST;
				$this->session->setFlashdata('error', 'An Error Occured. Please check the form.');
			} else {
				if($_POST['event_type_id'] == 1){
					$orgPresident = $this->organizationOfficersModel->getDetails(['organization_id' => $_POST['organization_id'], 'org_position_id' => 1])[0];
					$_POST['student_id'] = $orgPresident['student_id'];
				}
				$_POST['user_id'] = session()->get('id');
				$_POST['status_id'] = 1;
				$start = date('H:i:s', strtotime($_POST['reservation_starting_time']));
				$end = date('H:i:s', strtotime($_POST['reservation_end_time']));
				$_POST['reservation_starting_time'] = $start;
				$_POST['reservation_end_time'] = $end;
				$this->reservationsModel->add($_POST);
				$reservations = $this->reservationsModel->get(['frbs_reservations.reservation_code' => $_POST['reservation_code']])[0];
				$reservationData = [
					'reservation_id' => $reservations['id'],
					'status_id' => 1,
					'reservation_fee' => 0,
					'remarks' => 'Waiting for the assessment'
				];
				$this->reservationStatusModel->add($reservationData);
				$this->session->setFlashdata('success', 'Successfully Added a Record');
				$user_id = session()->get('id');
				$user = $this->usersModel->get(['id' => $user_id])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $_POST['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been added. Submit the signed activity form and wait for the admin's assessment. <br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
				return redirect()->to('/reservations');
			}
		}

		return view('templates/index', $data);
	}
	public function edit($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$data = [
			'page_title' => 'RMFS | Reservations',
			'title' => 'Reservation',
			'view' => 'Modules\ReservationManagement\Views\reservation\form',
			'edit' => true,
			'id' => $id,
			'types' => $this->eventTypesModel->get(),
			'facilities' => $this->facilitiesModel->get(['facility_status_id' => 5]),
			'faculties' => $this->facultiesModel->get(),
			'courses' => $this->coursesModel->get(),
			'organizations' => $this->organizationsModel->get(),
			'organizationOfficers' => $this->organizationOfficersModel->getDetails(),
			'students' => $this->studentsModel->get(),
			'value' => $this->reservationsModel->get(['id' => $id])[0],
		];
		$data['size'] = $this->facilitiesModel->get(['id' => $data['value']['facility_id']])[0];
		if ($this->request->getMethod() == 'post') {
			if (!$this->validate('reservations')) {
                $data['errors'] = $this->validation->getErrors();
				$data['value'] = $_POST;
				$this->session->setFlashdata('error', 'An Error Occured. Please check the form.');
			} else {
				if($_POST['event_type_id'] == 1){
					$orgPresident = $this->organizationOfficersModel->getDetails(['organization_id' => $_POST['organization_id'], 'org_position_id' => 1])[0];
					$_POST['student_id'] = $orgPresident['student_id'];
				}
				$reservations = $this->reservationsModel->get(['id' => $id])[0];
				$status = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
				$start = date('H:i:s', strtotime($_POST['reservation_starting_time']));
				$end = date('H:i:s', strtotime($_POST['reservation_end_time']));
				$_POST['reservation_starting_time'] = $start;
				$_POST['reservation_end_time'] = $end;
				$_POST['status_id'] = 1;
				$statusData['status_id'] = 1;
				$statusData['reservation_fee'] = '';
				$statusData['remarks'] = 'Waiting for assessment.';
				$this->reservationsModel->update($id, $_POST);
				$this->reservationStatusModel->update($status['id'], $statusData);
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'edit the reservation.'
				];
				$this->logsModel->add($logData);
				$this->session->setFlashdata('success', 'Successfully Edited a Record');
				return redirect()->to('/reservations');
			}
		}

		return view('templates/index', $data);
	}

	public function delete($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationsModel->get(['id' => $id])[0];
		
      if($this->reservationsModel->softDelete($id)){
		  $data =[
			  'status' => 'Deleted Successfully',
			  'status_text' => 'Reservation successfully deleted!',
			  'status_icon' => 'success'
			];
		} else{
			$data =[
				'status' => 'Oops!',
				'status_text' => 'Something went wrong!',
				'status_icon' => 'warning'
			];
		}
		$r_status = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		$this->reservationStatusModel->softDelete($r_status['id']);
    return $this->response->setJSON($data);
	}

	public function view($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
		$data = [
			'page_title' => 'RMFS | Reservations',
			'title' => 'Reservation',
			'view' => 'Modules\ReservationManagement\Views\reservation\profile',
			'id' => $id,
			'value' => $this->reservationsModel->getDetails(['frbs_reservations.id' => $id])[0],
			'status' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.reservation_id' => $id])[0],
			'logs' => $this->logsModel->getDetails(['reservation_id' => $id]),
		];
		
		
		$data['user'] = $this->usersModel->get(['id' => $data['value']['user_id']])[0];
		if($data['value']['organization_id'] == 0){
			$data['course'] = $this->coursesModel->get(['id' => $data['value']['course_id']])[0];
		}
		else if($data['value']['course_id'] == 0){
			$data['organization'] = $this->organizationsModel->get(['id' => $data['value']['organization_id']])[0];
		}

		return view('templates/index', $data);
	}

	public function approve($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		if(session()->get('role_id') >= 5){
			$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
			if ($this->request->getMethod() == 'post') {
				
				if(session()->get('role_id') == 7){
						$data['custodian_is_checked'] = $_POST['officeIsChecked'];
				}

				if($this->reservationStatusModel->update($reservations['id'], $data)){
					$jdata =[
						'status' => 'Success',
						'status_text' => 'Reservation successfully approved!',
						'status_icon' => 'success'
					];
				} else{
					$jdata =[
						'status' => 'Oops!',
						'status_text' => 'Something went wrong!',
						'status_icon' => 'warning'
					];
				}
			}

			return $this->response->setJSON($jdata);
		}

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {


			
			$data = [
				'reservation_fee' => $_POST['reservation_fee'],
				'status_id' => 2,
				'remarks' => $_POST['remarks']
			];
			$reservationData['status_id'] = 2;
			$this->reservationsModel->update($id, $reservationData);
			if($this->reservationStatusModel->update($reservations['id'], $data)){
				$jdata =[
				'status' => 'Success',
				'status_text' => 'Reservation successfully approved!',
				'status_icon' => 'success'
				];

				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'approved the reservation.'
				];
				$this->logsModel->add($logData);

				$reservation = $this->reservationsModel->get(['id' => $id])[0];

				$this->sendMail->sendMailForOffices($id);

				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been approved." . ucfirst($_POST['remarks']) . ". <br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
				// $this->session->setFlashdata('success', 'Successfully Approve a Reservation');

			} else{
				$jdata =[
					'status' => 'Oops!',
					'status_text' => 'Something went wrong!',
					'status_icon' => 'warning'
				];
			}
		}
		
		// return redirect()->to('/reservations/v/'.$id);
		return $this->response->setJSON($jdata);
	}

	public function approvedFree($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {
			$data = [
				'reservation_fee' => 0,
				'status_id' => 2,
				'remarks' => $_POST['remarks']
			];
			$reservationData['status_id'] = 2;
			$this->reservationsModel->update($id, $reservationData);
			if($this->reservationStatusModel->update($reservations['id'], $data)){
				$jdata =[
					'status' => 'Success',
					'status_text' => 'Reservation successfully approved free!',
					'status_icon' => 'success'
				];
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'approved the reservation.'
				];
				$this->logsModel->add($logData);
				$this->sendMail->sendMailForOffices($id);

				$reservation = $this->reservationsModel->get(['id' => $id])[0];
				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been approved for free. ". ucfirst($_POST['remarks']) .". <br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
				// $this->session->setFlashdata('success', 'Successfully Approve a Reservation for Free');

			} else{
				$jdata =[
					'status' => 'Oops!',
					'status_text' => 'Something went wrong!',
					'status_icon' => 'warning'
				];
			}

		}
		// return redirect()->to('/reservations/v/'.$id);
		return $this->response->setJSON($jdata);

	}

	public function approveByOffice($id){
			$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
			if ($this->request->getMethod() == 'post') {
				
				switch (session()->get('role_id')) {
					case 6:
						$data['president_is_checked'] = $_POST['officeIsChecked'];
						break;					
					case 7:
						$data['custodian_is_checked'] = $_POST['officeIsChecked'];
						break;					
					case 8:
						$data['admin_is_checked'] = $_POST['officeIsChecked'];
						break;					
					case 10:
						$data['professor_is_checked'] = $_POST['officeIsChecked'];
						break;
					
					default:
						// code...
						break;
				}
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'approved the reservation.'
				];
				$this->logsModel->add($logData);
				if($this->reservationStatusModel->update($reservations['id'], $data)){					
					$jdata =[
						'status' => 'Success',
						'status_text' => 'Reservation successfully approved!',
						'status_icon' => 'success'
					];
				} else{
					$jdata =[
						'status' => 'Oops!',
						'status_text' => 'Something went wrong!',
						'status_icon' => 'warning'
					];
				}
			}
			return $this->response->setJSON($jdata);
	}
	public function rejectByOffice($id){

			$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
			if ($this->request->getMethod() == 'post') {
				
				switch (session()->get('role_id')) {
					case 6:
						$data['president_is_checked'] = $_POST['officeIsChecked'];
						break;					
					case 7:
						$data['custodian_is_checked'] = $_POST['officeIsChecked'];
						break;					
					case 8:
						$data['admin_is_checked'] = $_POST['officeIsChecked'];
						break;					
					case 10:
						$data['professor_is_checked'] = $_POST['officeIsChecked'];
						break;
					
					default:
						// code...
						break;
				}
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'rejected the reservation.'
				];
				$this->logsModel->add($logData);
				if($this->reservationStatusModel->update($reservations['id'], $data)){
					$jdata =[
						'status' => 'Success',
						'status_text' => 'Reservation successfully rejected!',
						'status_icon' => 'success'
					];
				} else{
					$jdata =[
						'status' => 'Oops!',
						'status_text' => 'Something went wrong!',
						'status_icon' => 'warning'
					];
				}
			}

			return $this->response->setJSON($jdata);
	}

	public function reject($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {
			$data = [
				'reservation_fee' => '',
				'status_id' => 3,
				'remarks' => $_POST['remarks']
			];
			$reservationData['status_id'] = 3;
			$this->reservationsModel->update($id, $reservationData);
			if($this->reservationStatusModel->update($reservations['id'], $data)){
				$jdata =[
					'status' => 'Success',
					'status_text' => 'Reservation successfully rejected!',
					'status_icon' => 'success'
				];
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'rejected the reservation.'
				];
				$this->logsModel->add($logData);
				$reservation = $this->reservationsModel->get(['id' => $id])[0];
				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been rejected. " . ucfirst($_POST['remarks']) . ". <br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
			} else{
				$jdata =[
					'status' => 'Oops!',
					'status_text' => 'Something went wrong!',
					'status_icon' => 'warning'
				];
			}

	}
		// return redirect()->to('/reservations/v/'.$id);
		return $this->response->setJSON($jdata);
	}

	public function reset($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
		if(session()->get('role_id') >= 5){
			$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
				
				if(session()->get('role_id') == 6){
						$data['president_is_checked'] = 0;
				}else if(session()->get('role_id') == 7){
						$data['custodian_is_checked'] = 0;
				}else if(session()->get('role_id') == 8){
						$data['admin_is_checked'] = 0;
				}else if(session()->get('role_id') == 9){
						$data['security_is_checked'] = 0;
				}else if(session()->get('role_id') == 10){
						$data['professor_is_checked'] = 0;
				}

				if($this->reservationStatusModel->update($reservations['id'], $data)){
					$jdata =[
						'status' => 'Success',
						'status_text' => 'Reservation successfully reassessed!',
						'status_icon' => 'success'
					];
				} else{
					$jdata =[
						'status' => 'Oops!',
						'status_text' => 'Something went wrong!',
						'status_icon' => 'warning'
					];
				}

			return $this->response->setJSON($jdata);
		}
		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];

		$currentImage = $reservations['receipt'];

		if(!empty($currentImage)){
			if(file_exists('./assets/uploads/Receipts/'.$currentImage)){
				unlink('./assets/uploads/Receipts/'.$currentImage);
			}
		}

		$data = [
			'reservation_id' => $id,
			'reservation_fee' => 0,
			'status_id' => 1,
			'receipt' => '',
			'is_checked' => '0',
			'remarks' => 'waiting for the assessment'
		];
		$_POST['status_id'] = 1;
		$this->reservationsModel->update($id, $_POST);

		if($this->reservationStatusModel->update($reservations['id'], $data)){
			$jdata =[
			'status' => 'Success',
			'status_text' => 'Reservation successfully reassessed!',
			'status_icon' => 'success'
			];
			$logData = [
				'reservation_id' => $id,
				'user_id' => session()->get('id'),
				'description' => 'reassess of the reservation'
			];
			$this->logsModel->add($logData);
			
			$reservation = $this->reservationsModel->get(['id' => $id])[0];
			$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
			$to = $user['email_address'];
			$subject = "Facility Reservation: " . $reservation['event_name'];
			$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been reassessed. Wait for the admin's reassessment.<br><br> Thank you! <br><br><br> Warm regards,</p>";
			$this->sendMail->sendMail($to, $subject, $message);

		} else{
			$jdata =[
				'status' => 'Oops!',
				'status_text' => 'Something went wrong!',
				'status_icon' => 'warning'
			];
		}
		// return redirect()->to('/reservations/v/'.$id);

		return $this->response->setJSON($jdata);
	}

	public function generateReceipt($id){
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$data = [
			'page_title' => 'generate',
			'title' => 'List of Reservations',
			'type' => 'voucher',
			'value' => $this->reservationStatusModel->getDetails(['reservation_id' => $id])[0],
		];
		$this->dompdf->loadHtml(view('templates/generateReciept', $data), 'UTF-8');
		// $this->dompdf->setPaper('Letter', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("Voucher-".$id."-".date("Y-m-d").".pdf", array("Attachment" => false));
		$logData = [
			'reservation_id' => $id,
			'user_id' => session()->get('id'),
			'description' => 'generate payment voucher.'
		];
		$this->logsModel->add($logData);
		exit(0);
		// return redirect()->to('/reservations/v/' . $id);
	}
	public function generateForm($id){
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$data = [
			'page_title' => 'generate',
			'title' => 'List of Reservations',
			'id' => $id,
			'type' => 'activityForm',
			'value' => $this->reservationsModel->getDetails(['frbs_reservations.id' => $id])[0],
			'status' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.reservation_id' => $id])[0],
		];
		$data['user'] = $this->usersModel->get(['id' => $data['value']['user_id']])[0];
		if($data['value']['event_type_id'] == 1){
			$data['organization'] = $this->organizationsModel->get(['id' => $data['value']['organization_id']])[0];
		}else if($data['value']['event_type_id'] == 2){
			$data['course'] = $this->coursesModel->get(['id' => $data['value']['course_id']])[0];
		}

		$this->dompdf->loadHtml(view('templates/generateForm', $data));
		$this->dompdf->setPaper('Legal', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("ActivityForm-".$id."-".date("Y-m-d").".pdf", array("Attachment" => false));
		$logData = [
			'reservation_id' => $id,
			'user_id' => session()->get('id'),
			'description' => 'generate activity form'
		];
		$this->logsModel->add($logData);
		// return redirect()->to('/reservations/v/' . $id);
		exit(0);
	}
	public function generatePermit($id){
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$data = [
			'page_title' => 'generate',
			'title' => 'List of Reservations',
			'id' => $id,
			'type' => 'activityPermit',
			'value' => $this->reservationsModel->getDetails(['frbs_reservations.id' => $id])[0],
			'status' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.reservation_id' => $id])[0],

		];
		$data['user'] = $this->usersModel->get(['id' => $data['value']['user_id']])[0];
		if($data['value']['event_type_id'] == 1){
			$data['organization'] = $this->organizationsModel->get(['id' => $data['value']['organization_id']])[0];
		}else if($data['value']['event_type_id'] == 2){
			$data['course'] = $this->coursesModel->get(['id' => $data['value']['course_id']])[0];
		}

		$this->dompdf->loadHtml(view('templates/generatePermit', $data));
		$this->dompdf->setPaper('Legal', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("ActivityPermit-".$id."-".date("Y-m-d").".pdf", array("Attachment" => false));
		$logData = [
			'reservation_id' => $id,
			'user_id' => session()->get('id'),
			'description' => 'generate activity permit'
		];
		$this->logsModel->add($logData);
		// return redirect()->to('/reservations/v/' . $id);
		exit(0);
	}

	public function generateReport(){
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		if($this->request->getMethod() == 'post'){
			if($this->validate('report')){
				$data = [
					'page_title' => 'generate',
					'title' => 'List of Reservations',
					'type' => 'report',
				];
				if($_POST['facility_id'] == 0){
					$data['reservations'] = $this->reservationStatusModel->getDetailedReport(['reservation_date >=' => $_POST['starting_date'], 'reservation_date <=' => $_POST['ending_date']]);
					$data['facility'] = 'All';
				}else{
					$data['reservations'] = $this->reservationStatusModel->getDetailedReport(['facility_id' => $_POST['facility_id'], 'reservation_date >=' => $_POST['starting_date'], 'reservation_date <=' => $_POST['ending_date']]);
					$data['facility'] = $this->facilitiesModel->get(['id' => $_POST['facility_id']])[0];
				}
				$data['start'] = $_POST['starting_date'];
				$data['end'] = $_POST['ending_date'];

				$pdf = new MYPDF('landscape', PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
				// set default header data
				$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
				// set margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				// set auto page breaks
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
				$pdf->AddPage();

				$html = view('templates/generateReport', $data);
				$pdf->writeHTML($html, true, false, true, false, '');
				$this->response->setContentType('application/pdf');
				$pdf->Output('Report-'.date("Y-m-d").'.pdf', 'I');
			}else{
				$this->session->setFlashdata('error', 'An error occured. Check the form and try again.');
				return redirect()->to('/dashboard');
			}
		}

	}

	public function submitReceipt($id){
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		if ($this->request->getMethod() == 'post') {
			if (!$this->validate('image')) {
				$data = [
					'page_title' => 'RMFS | Reservations',
					'title' => 'Reservation',
					'view' => 'Modules\ReservationManagement\Views\reservation\profile',
					'id' => $id,
					'value' => $this->reservationsModel->getDetails(['frbs_reservations.id' => $id])[0],
					'status' => $this->reservationStatusModel->getDetails(['frbs_reservation_status.reservation_id' => $id])[0],
					'logs' => $this->logsModel->getDetails(['reservation_id' => $id]),
				];
                $data['errors'] = $this->validation->getErrors();
				$data['user'] = $this->usersModel->get(['id' => $data['value']['user_id']])[0];
				if($data['value']['organization_id'] == 0){
					$data['course'] = $this->coursesModel->get(['id' => $data['value']['course_id']])[0];
				}
				else if($data['value']['course_id'] == 0){
					$data['organization'] = $this->organizationsModel->get(['id' => $data['value']['organization_id']])[0];
				}
				$this->session->setFlashdata('error', 'An error occured. Check the uploaded file.');
				return view('templates/index', $data);
				// return redirect()->to('/reservations/v/'.$id);
			}else {

				$reservation = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
				$currentImage = $reservation['receipt'];

				if(!empty($currentImage)){
					if(file_exists('./assets/uploads/Receipts/'.$currentImage)){
						unlink('./assets/uploads/Receipts/'.$currentImage);
					}
				}

				$file = $this->request->getFile('receipt');
				if ($file->isValid() && !$file->hasMoved()) {

				$imageName = $file->getRandomName();
				$file->move('./assets/uploads/Receipts', $imageName);
				$data['receipt'] = $imageName;
				}
				$record = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
				$data['remarks'] = "Wait for the verification of the administrator.";
				$this->reservationStatusModel->update($record['id'],$data);
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'Uploaded the official receipt.'
				];
				$this->logsModel->add($logData);
				$this->session->setFlashdata('success', 'Successfully uploaded the official receipt');
				$reservation = $this->reservationsModel->get(['id' => $id])[0];
				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> You successfully submited the official receipt.<br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
				return redirect()->to('/reservations/v/'.$id);
		}
	}

	}

	public function verify($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {
			$data = [
				'status_id' => 4,
				'is_checked' => 1,
				'remarks' => $_POST['remarks']
			];
			$reservationData['status_id'] = 4;
			$this->reservationsModel->update($id, $reservationData);

			if($this->reservationStatusModel->update($reservations['id'], $data)){
				$jdata =[
				'status' => 'Success',
				'status_text' => 'Successfully verified the official receipt!',
				'status_icon' => 'success'
				];
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'Verified the official receipt.'
				];
				$this->logsModel->add($logData);
				$reservation = $this->reservationsModel->get(['id' => $id])[0];
				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br>" . 'Your reservation has been verified.'. ucfirst($_POST['remarks']) . "<br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
			} else{
				$jdata =[
				'status' => 'Oops!',
				'status_text' => 'Something went wrong!',
				'status_icon' => 'warning'
				];
			}
		}
		return $this->response->setJSON($jdata);

	}

	public function end($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {
		$data = [
			'status_id' => 5,
			'remarks' => $_POST['remarks']
		];
		$reservationData['status_id'] = 5;
		$this->reservationsModel->update($id, $reservationData);

		if($this->reservationStatusModel->update($reservations['id'], $data)){
			$jdata =[
			'status' => 'Success',
			'status_text' => 'Reservation successfully ended!',
			'status_icon' => 'success'
			];
			$logData = [
				'reservation_id' => $id,
				'user_id' => session()->get('id'),
				'description' => 'End of reservation'
			];
			$this->logsModel->add($logData);
			$reservation = $this->reservationsModel->get(['id' => $id])[0];
			$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
			$to = $user['email_address'];
			$subject = "Facility Reservation: " . $reservation['event_name'];
			$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been ended." . ucfirst($_POST['remarks']) . "<br><br> Thank you! <br><br><br> Warm regards,</p>";
			$this->sendMail->sendMail($to, $subject, $message);
		} else{
			$jdata =[
			'status' => 'Oops!',
			'status_text' => 'Something went wrong!',
			'status_icon' => 'warning'
			];
		}

	}
	return $this->response->setJSON($jdata);
	}

	public function cancel($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {
			$data = [
				'status_id' => 6,
				'remarks' => $_POST['remarks']
			];
			$reservationData['status_id'] = 6;
			$this->reservationsModel->update($id, $reservationData);

			if($this->reservationStatusModel->update($reservations['id'], $data)){
				$jdata =[
				'status' => 'Success',
				'status_text' => 'Reservation successfully cancelled!',
				'status_icon' => 'success'
				];
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'Cancelled the reservation.'
				];
				$this->logsModel->add($logData);
				$reservation = $this->reservationsModel->get(['id' => $id])[0];
				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br> Your reservation has been cancelled." . ucfirst($_POST['remarks']) . "<br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
			} else{
				$jdata =[
				'status' => 'Oops!',
				'status_text' => 'Something went wrong!',
				'status_icon' => 'warning'
				];
			}
		}
		return $this->response->setJSON($jdata);
	}

	public function reupload($id)
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		$reservations = $this->reservationStatusModel->get(['reservation_id' => $id])[0];
		if ($this->request->getMethod() == 'post') {
			$data['remarks'] = $_POST['remarks'];
			if($this->reservationStatusModel->update($reservations['id'], $data)){
				$jdata =[
				'status' => 'Successfully Requested',
				'status_text' => 'Successfully Requested for Reupload of the Receipt!',
				'status_icon' => 'success'
				];
				$logData = [
					'reservation_id' => $id,
					'user_id' => session()->get('id'),
					'description' => 'Request for reupload of official receipt.'
				];
				$this->logsModel->add($logData);
				$reservation = $this->reservationsModel->get(['id' => $id])[0];
				$user = $this->usersModel->get(['id' => $reservation['user_id']])[0];
				$to = $user['email_address'];
				$subject = "Facility Reservation: " . $reservation['event_name'];
				$message = "<p>Good day, " . ucwords($user['first_name']) . "! <br><br>" . 'Please reupload your submitted copy of the official receipt.' .ucfirst($_POST['remarks']) . "<br><br> Thank you! <br><br><br> Warm regards,</p>";
				$this->sendMail->sendMail($to, $subject, $message);
			} else{
				$jdata =[
				'status' => 'Oops!',
				'status_text' => 'Something went wrong!',
				'status_icon' => 'warning'
				];
			}
		}
		return $this->response->setJSON($jdata);
	}
	public function preview()
	{
		if (!session()->get('isLoggedIn')) return redirect()->to(base_url());

		if($this->request->getMethod() === 'post'){
			$type = $this->eventTypesModel->get(['id' => $_POST['event_type']])[0];
			$faculty = $this->facultiesModel->get(['id' => $_POST['faculty']])[0];
			$facility = $this->facilitiesModel->get(['id' => $_POST['facility']])[0];
			$prof = $faculty['first_name'] . ' ' . $faculty['last_name'];

			$data =[
				'event_name' => ucwords($_POST['event_name']),
				'type' => ucwords($type['event_type']),
				'date' => $_POST['date'],
				'start' => $_POST['start'],
				'end' => $_POST['end'],
				'budget' => $_POST['budget'],
				'participants' => $_POST['participants'],
				'faculty' => ucwords($prof),
				'facility' => ucwords($facility['facility_name']),
			];

			if($_POST['event_type'] == 1){
				$org = $this->organizationsModel->get(['id' => $_POST['event_select']])[0];
				$data['type_data'] = ucwords($org['organization_name']);
			}
			else if($_POST['event_type'] == 2){
				$course = $this->coursesModel->get(['id' => $_POST['event_select']])[0];
				$data['type_data'] = ucwords($course['course_name']);
			}

		}
		return $this->response->setJSON($data);

	}

	public function check($facilityId){
		$reservations = $this->reservationsModel->get();
		$maintenances = $this->facilityMaintenancesModel->get();
		$data = [
			'status' => 0,
			'is_maintained' => 0
		];
		if($this->request->getMethod() == 'post'){
			foreach($reservations as $reservation){
					if($reservation['facility_id'] == $facilityId){
						if($reservation['reservation_date'] == $_POST['date'] && strtotime($reservation['reservation_starting_time']) == strtotime($_POST['start']) && strtotime($reservation['reservation_end_time']) == strtotime($_POST['end'])){
							if($_POST['id'] == $reservation['id']){
								$data['status']=0;
							}else{
								$data['status']=1;
							}
						}
						else if($reservation['reservation_date'] == $_POST['date']){
							if(strtotime($reservation['reservation_end_time']) > strtotime($_POST['start']) || strtotime($reservation['reservation_starting_time']) <= strtotime($_POST['start']) && strtotime($reservation['reservation_end_time']) > strtotime($_POST['end'])){
								$data['status']=1;
							}
						}
					}
			}			
			foreach($maintenances as $maintenance){
				if($maintenance['facility_id'] == $facilityId){
					if($maintenance['maintenance_date'] == $_POST['date'] && strtotime($maintenance['scheduled_starting_time']) == strtotime($_POST['start']) && strtotime($maintenance['scheduled_end_time']) == strtotime($_POST['end'])){
						$data['is_maintained']=1;
					}
					else if($maintenance['maintenance_date'] == $_POST['date']){
						if(strtotime($maintenance['scheduled_starting_time']) <= strtotime($_POST['start']) && strtotime($maintenance['scheduled_end_time']) > strtotime($_POST['end'])){
							$data['is_maintained']=1;
						}
					}
				}
			}
		}

		return $this->response->setJSON($data);
	}
}

