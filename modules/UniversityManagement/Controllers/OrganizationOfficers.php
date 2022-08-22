<?php namespace Modules\UniversityManagement\Controllers;

use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrganizationOfficers extends BaseController
{
    function __construct(){
        $this->organizationOfficersModel = new UniversityManagement\OrganizationOfficersModel();
        $this->studentsModel = new UniversityManagement\studentsModel();
        $this->organizationPositionsModel = new SystemSettings\OrganizationPositionsModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RMFS | Organization Officers',
            'title' => 'Organization Officers',
            'view' => 'Modules\UniversityManagement\Views\OrganizationOfficers\index',
            'organizationOfficers' => $this->organizationOfficersModel->getDetails()
        ];

        return view('templates/index', $data);
    }

    public function add()
    {   
        $data = [
            'page_title' => 'RMFS | Organization Officers',
            'title' => 'Organization Officers',
            'view' => 'Modules\UniversityManagement\Views\OrganizationOfficers\form',
            'positions' => $this->organizationPositionsModel->get(),
            'students' => $this->studentsModel->get(),
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizationOfficers')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->organizationOfficersModel->add($_POST);
                $this->session->setFlashdata('success', 'Officer Successfully Added.');
                return redirect()->to('/organization-officers');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'RMFS | Organization Officers',
            'title' => 'Organization Officers',
            'view' => 'Modules\UniversityManagement\Views\OrganizationOfficers\form',
            'positions' => $this->organizationPositionsModel->get(),
            'students' => $this->studentsModel->get(),
            'value' => $this->organizationOfficersModel->get(['frbs_organization_officers.id' => $id])[0],
            'edit' => true,
            'id' => $id
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizationOfficers')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->organizationOfficersModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Officer Successfully Updated.');
                return redirect()->to('/organization-officers');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->organizationOfficersModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
    //--------------------------------------------------------------------
}
