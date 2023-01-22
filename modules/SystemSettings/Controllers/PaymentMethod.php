<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class PaymentMethod extends BaseController
{
    function __construct(){
        $this->methodModel = new SystemSettings\PaymentMethodModel();
        helper(['form','link']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Payment Method',
            'title' => 'Payment Method',
            'view' => 'Modules\SystemSettings\Views\method\index',
            'methods' => $this->methodModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Payment Method',
            'title' => 'Payment Method',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\method\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('method')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->methodModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/payment-methods');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Payment Method',
            'title' => 'Payment Method',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\method\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->methodModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('method')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->methodModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/payment-methods');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->methodModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
