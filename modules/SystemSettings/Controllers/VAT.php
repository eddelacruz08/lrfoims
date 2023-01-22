<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class VAT extends BaseController
{
    function __construct(){
        $this->vatModel = new SystemSettings\VATModel();
        helper(['form','link']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Value-Added Tax',
            'title' => 'Value-Added Tax',
            'view' => 'Modules\SystemSettings\Views\vat\index',
            'vat' => $this->vatModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Value-Added Tax',
            'title' => 'Value-Added Tax',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\vat\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->vatModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('vat')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->vatModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/vat');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->vatModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
