<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Barangay extends BaseController
{
    function __construct(){
        $this->barangayModel = new SystemSettings\BarangayModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Barangay',
            'title' => 'Barangay',
            'view' => 'Modules\SystemSettings\Views\barangay\index',
            'barangay' => $this->barangayModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Barangay',
            'title' => 'Barangay',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\barangay\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('barangay')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->barangayModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/barangay');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Barangay',
            'title' => 'Barangay',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\barangay\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->barangayModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('barangay')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->barangayModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/barangay');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->barangayModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
