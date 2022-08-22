<?php

namespace Modules\ReservationManagement\Controllers;

use Modules\ReservationManagement\Models as ReservationManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class FacilityMaintenances extends BaseController
{
    function __construct(){
        $this->facilityMaintenanceModel = new ReservationManagement\FacilityMaintenancesModel();
        $this->facilitiesModel = new ReservationManagement\FacilitiesModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RMFS | Facility Maintenances',
            'title' => 'Facility Maintenances',
            'view' => 'Modules\ReservationManagement\Views\facilityMaintenance\index',
            'facilityMaintenance' => $this->facilityMaintenanceModel->getDetails()
        ];
        return view('templates/index', $data);
    }
    public function add()
    {
        $data = [
            'page_title' => 'RMFS | Facility Maintenances',
            'title' => 'Facility Maintenances',
            'view' => 'Modules\ReservationManagement\Views\facilityMaintenance\form',
            'edit' => false,
            'facilities' => $this->facilitiesModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilityMaintenances')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
				$start = date('H:i:s', strtotime($_POST['scheduled_starting_time']));
				$end = date('H:i:s', strtotime($_POST['scheduled_end_time']));
				$_POST['scheduled_starting_time'] = $start;
				$_POST['scheduled_end_time'] = $end;
                $this->facilityMaintenanceModel->add($_POST);
                $this->session->setFlashdata('success', 'Maintenance Successfully scheduled');
                return redirect()->to('/facility-maintenances');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'RMFS | Facility Maintenances',
            'title' => 'Facility Maintenances',
            'view' => 'Modules\ReservationManagement\Views\facilityMaintenance\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->facilityMaintenanceModel->get(['id' => $id])[0],
            'facilities' => $this->facilitiesModel->get()
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilityMaintenances')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
				$start = date('H:i:s', strtotime($_POST['scheduled_starting_time']));
				$end = date('H:i:s', strtotime($_POST['scheduled_end_time']));
				$_POST['scheduled_starting_time'] = $start;
				$_POST['scheduled_end_time'] = $end;
                $this->facilityMaintenanceModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Schedule Successfully Updated');
                return redirect()->to('/facility-maintenances');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->facilityMaintenanceModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
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
								$data['status']=1;
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
                        if($maintenance['id'] == $_POST['id']){
						    $data['is_maintained']=0;
                        }else{
						    $data['is_maintained']=1;
                        }
					}
					else if($maintenance['maintenance_date'] == $_POST['date']){
						if(strtotime($maintenance['scheduled_end_time']) > strtotime($_POST['start']) || strtotime($maintenance['scheduled_starting_time']) <= strtotime($_POST['start']) && strtotime($maintenance['scheduled_end_time']) > strtotime($_POST['end'])){
							$data['is_maintained']=1;
						}
					}
				}
			}
		}

		return $this->response->setJSON($data);
	}
}
