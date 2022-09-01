<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Extensions extends BaseController
{
    function __construct(){
        $this->extensionsModel = new SystemSettings\ExtensionsModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Extensions',
            'title' => 'Extensions',
            'view' => 'Modules\SystemSettings\Views\extensions\index',
            'extensions' => $this->extensionsModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Extensions',
            'title' => 'Extensions',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\extensions\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('extensions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->extensionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Extension Name Successfully Added');
                return redirect()->to('/extensions');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Extensions',
            'title' => 'Extensions',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\extensions\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->extensionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('extensions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->extensionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Extension Name Successfully Updated');
                return redirect()->to('/extensions');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->extensionsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
