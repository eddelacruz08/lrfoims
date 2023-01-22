<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Coupon extends BaseController
{
    function __construct(){
        $this->couponModel = new SystemSettings\CouponModel();
        helper(['form','link']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Coupon',
            'title' => 'Coupon',
            'view' => 'Modules\SystemSettings\Views\coupon\index',
            'coupons' => $this->couponModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Coupon',
            'title' => 'Coupon',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\coupon\form',
            'edit' => false,
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('coupon')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $dateAndTime = new \DateTime($_POST['expiration_date']);
                function random_string($length) {
                    $key = '';
                    $keys = array_merge(range(0, 9), range('A', 'Z'));
                
                    for ($i = 0; $i < $length; $i++) {
                        $key .= $keys[array_rand($keys)];
                    }
                
                    return $key;
                }
                $_POST['code'] = random_string(7);
                $_POST['expiration_date'] = $dateAndTime->format('Y-m-d');
                $this->couponModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/coupons');
            }
        }

        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->couponModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
