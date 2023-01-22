<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class DeliveryFee extends BaseController
{
    function __construct(){
        $this->deliveryFeeModel = new SystemSettings\DeliveryFeeModel();
        helper(['form','link']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Delivery Fee',
            'title' => 'Delivery Fee',
            'view' => 'Modules\SystemSettings\Views\deliveryFee\index',
            'deliveryFee' => $this->deliveryFeeModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Delivery Fee',
            'title' => 'Delivery Fee',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\deliveryFee\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->deliveryFeeModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('deliveryFee')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->deliveryFeeModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/delivery-fee');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->deliveryFeeModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
