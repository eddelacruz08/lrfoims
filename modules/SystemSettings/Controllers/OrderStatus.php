<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrderStatus extends BaseController
{
	function __construct(){
		$this->orderStatusModel = new SystemSettings\OrderStatusModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | Order Status',
			'title' => 'Order Status',
			'view' => 'Modules\SystemSettings\Views\orderStatus\index',
			'orderStatus' => $this->orderStatusModel->get(),
		];

		return view('templates/index', $data);
	}

    public function add()
    {
        $data = [
            'page_title' => 'LRFOIMS | Order Status',
            'title' => 'Order Status',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\orderStatus\form',
            'edit' => false,
            'orderStatus' => $this->orderStatusModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('orderStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->orderStatusModel->add($_POST);
                $this->session->setFlashdata('success', 'Order Status successfully added');
                return redirect()->to('/order-status');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Order Status',
            'title' => 'Order Status',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\orderStatus\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->orderStatusModel->get(['id' => $id])[0]
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('orderStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->orderStatusModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Order Status successfully updated');
                return redirect()->to('/order-status');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->orderStatusModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
