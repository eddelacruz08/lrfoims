<?php namespace Modules\DeliveryManagement\Controllers;

use Modules\DeliveryManagement\Models as DeliveryManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\ProductManagement\Models as ProductManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

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
		helper(['form','link']);
	}

	public function index() { 
        $this->hasPermissionRedirect('delivery');

		$data = [
			'page_title' => 'LRFOIMS | Delivery',
			'title' => 'Delivery',
			'view' => 'Modules\DeliveryManagement\Views\delivery\index',
		];
		
        $data['orderType'] = $this->orderTypeModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_type' => 3, 'o.order_status_id' => 2]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a', 'lrfoims_orders.order_type' => 3, 'lrfoims_orders.order_status_id' => 2]);
		return view('templates/index', $data);
	}

	//--------------------------------------------------------------------
}
