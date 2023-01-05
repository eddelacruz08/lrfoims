<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class City extends BaseController
{
    function __construct(){
        $this->citiesModel = new SystemSettings\CityModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | City',
            'title' => 'City',
            'view' => 'Modules\SystemSettings\Views\city\index',
            'cities' => $this->citiesModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | City',
            'title' => 'City',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\city\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('city')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->citiesModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/cities');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | City',
            'title' => 'City',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\city\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->citiesModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('city')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->citiesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/cities');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->citiesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
