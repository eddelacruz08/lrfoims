<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrderDiscount extends BaseController
{
    function __construct(){
        $this->discountModel = new SystemSettings\OrderDiscountModel();
        helper(['form','link']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Order User Discount',
            'title' => 'Order User Discount',
            'view' => 'Modules\SystemSettings\Views\discount\index',
            'discounts' => $this->discountModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Order User Discount',
            'title' => 'Order User Discount',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\discount\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('discount')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $discount_amount = $_POST['discount_amount'] / 100;
                $_POST['discount_amount'] = $discount_amount;
                
                $this->discountModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/order-user-discounts');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Order User Discount',
            'title' => 'Order User Discount',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\discount\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->discountModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('discount')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->discountModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/order-user-discounts');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->discountModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
