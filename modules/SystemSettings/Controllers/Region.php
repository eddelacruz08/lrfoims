<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Region extends BaseController
{
    function __construct(){
        $this->regionsModel = new SystemSettings\RegionModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Region',
            'title' => 'Region',
            'view' => 'Modules\SystemSettings\Views\region\index',
            'regions' => $this->regionsModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Region',
            'title' => 'Region',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\region\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('region')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->regionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/regions');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Region',
            'title' => 'Region',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\region\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->regionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('region')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->regionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/regions');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->regionsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
