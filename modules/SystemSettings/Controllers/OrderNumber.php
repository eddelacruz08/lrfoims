<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrderNumber extends BaseController
{
	function __construct(){
		$this->orderNumberModel = new SystemSettings\OrderNumberModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Order Number',
			'title' => 'Order Number',
			'view' => 'Modules\SystemSettings\Views\orderNumber\index',
			'orderNumbers' => $this->orderNumberModel->get(),
		];

		return view('templates/index', $data);
	}

    public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Order Number',
            'title' => 'Order Number',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\orderNumber\form',
            'edit' => false,
            'menuCategory' => $this->orderNumberModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('orderNumbers')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->orderNumberModel->add($_POST);
                $this->session->setFlashdata('success', 'Order Number successfully added');
                return redirect()->to('/order-numbers');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Order Number',
            'title' => 'Order Number',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\menuCategory\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->orderNumberModel->get(['id' => $id])[0]
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('orderNumbers')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->orderNumberModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Order Number successfully updated');
                return redirect()->to('/order-numbers');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->orderNumberModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
