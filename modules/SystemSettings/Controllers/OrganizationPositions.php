<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrganizationPositions extends BaseController
{
    function __construct(){
        $this->OrganizationPositionsModel = new SystemSettings\OrganizationPositionsModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RMFS | Organization Positions',
            'title' => 'Organization Positions',
            'action' => 'Add Position',
            'view' => 'Modules\SystemSettings\Views\OrganizationPositions\index',
            'positions' => $this->OrganizationPositionsModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RMFS | Organization Positions',
            'title' => 'Organization Positions',
            'action' => 'Add Position',
            'view' => 'Modules\SystemSettings\Views\OrganizationPositions\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizationPositions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->OrganizationPositionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Position Successfully Added');
                return redirect()->to('/organization-positions');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RMFS | Organization Positions',
            'title' => 'Organization Positions',
            'action' => 'Edit Position',
            'view' => 'Modules\SystemSettings\Views\OrganizationPositions\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->OrganizationPositionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizationPositions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->OrganizationPositionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Position Successfully Updated');
                return redirect()->to('/organization-positions');
            }
        }

        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->OrganizationPositionsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
