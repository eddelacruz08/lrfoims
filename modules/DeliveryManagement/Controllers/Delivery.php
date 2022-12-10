<?php namespace Modules\DeliveryManagement\Controllers;

use Modules\DeliveryManagement\Models as DeliveryManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\MenuManagement\Models as MenuManagement;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Delivery extends BaseController
{
	function __construct(){
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->cartsModel = new OrderManagement\CartModel();
        $this->orderTypeModel = new SystemSettings\OrderTypeModel();
		$this->deliveryModel = new DeliveryManagement\DeliveryModel();
		$this->usersModel = new UserManagement\UsersModel();
		$this->rolesModel = new UserManagement\RolesModel();
		$this->ingredientsModel = new ProductManagement\ProductModel();
		$this->logsModel = new UserManagement\LogsModel();
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->menusModel = new MenuManagement\MenuModel();
        $this->menuCategoryModel = new SystemSettings\MenuCategoryModel();
		$this->messageModel = new DeliveryManagement\MessageModel();
		$this->usersModel = new UserManagement\UsersModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		helper(['form','link']);
	}

	public function index() { 
        $this->hasPermissionRedirect('delivery');
		// die(session()->get('username'));
		$data = [
			'page_title' => 'LRFOIMS | Delivery',
			'title' => 'Delivery',
			'view' => 'Modules\DeliveryManagement\Views\delivery\index',
		];
		
        $data['menuLists'] = $this->menusModel->get();
		$data['userLists'] = $this->usersModel->get();
		$data['regions'] = $this->regionModel->get(['status'=>'a']);
		$data['provinces'] = $this->provinceModel->get(['status'=>'a']);
		$data['cities'] = $this->cityModel->get(['status'=>'a']);
        $data['menuCategory'] = $this->menuCategoryModel->get(['status'=>'a']);
        $data['orderType'] = $this->orderTypeModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartDeliveryTotalPrice'] = $this->cartsModel->getCartDeliveryTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_type' => 3]);
        $data['getCartDeliveryShipmentTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_type' => 3]);
        $data['getOrderDeliveryDetails'] = $this->ordersModel->getOrderDeliveryDetails(['lrfoims_orders.status' => 'a', 'lrfoims_orders.order_type' => 3]);
        $data['getOrderShipmentDetails'] = $this->ordersModel->getOrderDeliveryShipmentDetails(['lrfoims_orders.status' => 'a', 'lrfoims_orders.order_type' => 3]);
		return view('templates/index', $data);
	}

	public function addChat() {
		if(!session()->get('username'))
			return redirect()->to('/');

		$data = [
			'page_title' => 'LRFOIMS | Delivery',
			'title' => 'Delivery',
			'view' => 'Modules\DeliveryManagement\Views\delivery\index',
		];
		
		$data['menuLists'] = $this->menusModel->get();
		$data['menuCategory'] = $this->menuCategoryModel->get(['status'=>'a']);
		$data['orderType'] = $this->orderTypeModel->get();
		$data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
		$data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_type' => 3, 'o.order_status_id' => 2]);
		$data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a', 'lrfoims_orders.order_type' => 3, 'lrfoims_orders.order_status_id' => 2]);

		if($this->request->getMethod() == 'post') {
			$rules = [
				'message' => 'required'
			];

			if(!$this->validate($rules)) {
				return $this->fail($this->validator->getErrors());
			} else {
				$msg = [
					'username' => session()->get('username'),
					'order_id' => $this->request->getVar('order_id'),
					'user_id' => session()->get('id'),
					'message' => $this->request->getVar('message')
				];
				$this->messageModel->save($msg);
				return $this->response->setJSON($msg);
			}

		}
		return view('templates/index',$data);
	}

	public function getMessage($orderId) {
		$data = $this->messageModel->where('order_id', $orderId)->orderBy('id', 'ASC')->findAll();
		// $data = $this->messageModel->getDetails(['lrfoims_user_messages.status'=>'a']);
		return $this->response->setJSON($data);
	}

	//--------------------------------------------------------------------
}
