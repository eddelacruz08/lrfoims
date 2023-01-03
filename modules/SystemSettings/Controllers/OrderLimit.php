<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrderLimit extends BaseController
{
    function __construct(){
        $this->orderLimitModel = new SystemSettings\OrderLimitModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Order Limit',
            'title' => 'Order Limit',
            'view' => 'Modules\SystemSettings\Views\orderLimit\index',
            'orderLimit' => $this->orderLimitModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Order Limit',
            'title' => 'Order Limit',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\orderLimit\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('orderLimit')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->orderLimitModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/order-max-limit');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Order Limit',
            'title' => 'Order Limit',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\orderLimit\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->orderLimitModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('orderLimit')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->orderLimitModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/order-max-limit');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->orderLimitModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
