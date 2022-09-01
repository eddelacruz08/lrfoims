<?php namespace Modules\OrderManagement\Controllers;

use Modules\OrderManagement\Models as OrderManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Order extends BaseController
{
	function __construct(){
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->cartsModel = new OrderManagement\CartModel();
        $this->menusModel = new MenuManagement\MenuModel();
        $this->menuCategoryModel = new SystemSettings\MenuCategoryModel();
        $this->orderNumbersModel = new SystemSettings\OrderNumberModel();
		helper(['form']);
	}

	public function index()
	{
        $this->hasPermissionRedirect('orders');
        $time = new \DateTime();
        $dateAndTime = $time->format('Y-m-d');
		$data = [
			'page_title' => 'LRFOIMS | Orders',
			'title' => 'Orders',
			'view' => 'Modules\OrderManagement\Views\order\index',
            'countOrders' => $this->ordersModel->getCountPerOrderDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 1]),
            'countPlaceOrders' => $this->ordersModel->getCountPerOrderDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 2]),
            'countServeOrders' => $this->ordersModel->getCountPerOrderDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 3]),
            'countPaymentOrders' => $this->ordersModel->getCountPerOrderDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 4]),
            'countPaymentHistoryOrders' => $this->ordersModel->getCountPerOrderDetails(['CAST(lrfoims_orders.updated_at AS DATE)' => $dateAndTime, 'lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 5]),
            'orders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 1]),
            'placeOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 2]),
            'serveOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 3]),
            'paymentOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 4]),
            'paymentHistoryOrders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a', 'lrfoims_orders.order_status_id' => 5])
		];

		return view('templates/index', $data);
	}
    
    public function retrieveOrder(){
        $data['menuLists'] = $this->menusModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 1]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a', 'lrfoims_orders.order_number_id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 1]);
        return view('Modules\OrderManagement\Views\order\orders', $data);
    }

    public function retrievePlaceOrder(){
        $data['menuLists'] = $this->menusModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 2]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a','lrfoims_orders.order_number_id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 2]);
        return view('Modules\OrderManagement\Views\order\orders', $data);
    }
    
    public function retrieveServeOrder(){
        $data['menuLists'] = $this->menusModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 3]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a','lrfoims_orders.order_number_id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 3]);
        return view('Modules\OrderManagement\Views\order\serveOrder', $data);
    }
    
    public function retrievePaymentOrder(){
        $data['menuLists'] = $this->menusModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 4]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.status' => 'a','lrfoims_orders.order_number_id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 4]);
        return view('Modules\OrderManagement\Views\order\paymentOrder', $data);
    }
    
    public function retrievePaymentHistoryOrder(){
        $time = new \DateTime();
        $dateAndTime = $time->format('Y-m-d');
        $data['menuLists'] = $this->menusModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['lrfoims_carts.status' => 'a']);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['lrfoims_carts.status' => 'a', 'o.order_status_id' => 5]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['CAST(lrfoims_orders.updated_at AS DATE)' => $dateAndTime, 'lrfoims_orders.status' => 'a','lrfoims_orders.order_number_id' => $_GET['id'], 'lrfoims_orders.order_status_id' => 5]);
        return view('Modules\OrderManagement\Views\order\paymentHistoryOrder', $data);
    }

    public function placeOrder($id, $valueId)
    {
        if($valueId == 1 || $valueId == 2 || $valueId == 3 || $valueId == 4){
            $_POST['order_status_id'] = $valueId;
            $this->ordersModel->update($id, $_POST);
            $data =[
                'status'=> 'Added Successfully',
                'status_text' => 'Order has been successfully added!',
                'status_icon' => 'success'
            ];
            return $this->response->setJSON($data);
        }else{
            $ordersData = $this->ordersModel->get(['lrfoims_orders.status' => 'a','lrfoims_orders.id' => $id, 'lrfoims_orders.order_status_id' => 4])[0];
            
            if(empty($ordersData['total_amount']) && $valueId == 5){
                $data =[
                    'status'=> 'Opss',
                    'status_text' => 'Please add payments!',
                    'status_icon' => 'error'
                ];
                return $this->response->setJSON($data);
            }else{
                $_POST['order_status_id'] = $valueId;
                $this->ordersModel->update($id, $_POST);
                $data =[
                    'status'=> 'Added Successfully',
                    'status_text' => 'Order has been successfully added!',
                    'status_icon' => 'success'
                ];
                return $this->response->setJSON($data);
            }
        }
    }

    public function addOrder(){
        $data['page_title'] = 'LRFOIMS | Orders';
        $data['title'] = 'Orders';
        $data['view'] = 'Modules\OrderManagement\Views\order\index';

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('addToCartAdmin')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
                $this->session->setFlashdata('error', 'Please complete all fields!');
            } else {
                $this->cartsModel->add($_POST);
                $this->session->setFlashdata('success_no_flash', 'Menu successfully added!');
            }
            return redirect()->to('/orders');
        }
        return view('templates/index', $data);
    }

    public function menu()
	{
		$data = [
			'page_title' => 'LRFOIMS | Order Menu',
			'title' => 'Order Menu',
			'view' => 'Modules\OrderManagement\Views\menuList\index',
            'menuLists' => $this->menusModel->getDetails(['lrfoims_menus.status'=>'a']),
            'menuCategory' => $this->menuCategoryModel->get(),
            'adminUnavailableOrders' => $this->ordersModel->get(['lrfoims_orders.status'=>'u']),
            'adminCartLists' => $this->cartsModel->getAdminCartLists(['lrfoims_carts.status'=>'a']),
            'adminCountCartLists' => $this->cartsModel->getAdminCountCartLists(['o.status'=>'u']),
            'availableOrderNumbers' => $this->orderNumbersModel->get(['status'=>'a']),
            'getCreatedOrderNumber' => $this->ordersModel->getCreatedOrderNumber(['on.number_status' => 'u', 'lrfoims_orders.status'=>'u']),
		];

		return view('templates/index', $data);
	}

    public function addAdminOrderNumber(){ 
        $jdata['page_title'] = 'LRFOIMS | Order Menu';
        $jdata['title'] = 'Order Menu';
        $jdata['view'] = 'Modules\OrderManagement\Views\menuList\index';

        $_POST['user_id'] = session()->get('id');
        $_POST['number_status'] = 'u';
        $orderNumberId = $_POST['order_number_id'];

        $data['order_number_id'] = $orderNumberId;
        $data['user_id'] = session()->get('id');
        $data['order_status_id'] = 1;
        // die(session()->get('id'));
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('addAdminOrderNumber')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if($this->ordersModel->addStatusUnavailable($data)){
                    $this->orderNumbersModel->update($orderNumberId, $_POST);
                    $this->session->setFlashdata('success_no_flash', 'Order successfully added!');
                }else{
                    $this->session->setFlashdata('error_no_flash', 'Can\'t assign number!');
                }
                return redirect()->to('/orders/admin-menu');
            }
            return redirect()->to('/orders/admin-menu');
        }
        return view('templates/index', $jdata);
    }
    
    public function addOrderToCartInMenuList(){
        $data['page_title'] = 'LRFOIMS | Order Menu';
        $data['title'] = 'Order Menu';
        $data['view'] = 'Modules\OrderManagement\Views\menuList\index';
        $data['getCreatedOrderNumber'] = $this->ordersModel->getCreatedOrderNumber(['on.number_status' => 'u', 'lrfoims_orders.status'=>'u']);

        $checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $_POST['order_id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
        if(empty($checkDuplicateMenuId)){
            if ($this->request->getMethod() == 'post') {
                if (!$this->validate('addOrderToCartInMenuList')) {
                    $data['errors'] = $this->validation->getErrors();
                    $data['value'] = $_POST;
                    $this->session->setFlashdata('error', 'Please complete all fields!');
                } else {
                    $this->cartsModel->add($_POST);
                    $this->session->setFlashdata('success_no_flash', 'Menu successfully added!');
                }
                return redirect()->to('/orders/admin-menu');
            }
            return redirect()->to('/orders/admin-menu');
        }else{
            $this->session->setFlashdata('error_no_flash', 'You\'ve already added this menu! Please check your cart to apply changes.');
            return redirect()->to('/orders/admin-menu');
        }
        return view('templates/index', $data);
    }
    
    public function submitAdminOrderCarts($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Orders',
            'title' => 'Orders',
            'view' => 'Modules\OrderManagement\Views\orders\order'
        ];
        $_POST['order_status_id'] = 2;
        $_POST['status'] = 'a';
        if ($this->request->getMethod() == 'post') {
            $this->ordersModel->update($id, $_POST);
            $this->session->setFlashdata('success', 'Order successfully submitted!');
            return redirect()->to('/orders');
        }

        return view('templates/index', $data);
    }
    
    public function addAdminPayment($id, $totalAmount)
	{
        $orders = $this->ordersModel->get(['id' => $id, 'status' => 'a'])[0];

        if ($this->request->getMethod() == 'post') 
        {
            if($totalAmount < $_POST['c_cash']){
                $data = [
                    'total_amount' => $totalAmount,
                    'c_cash' => $_POST['c_cash'],
                    'c_balance' => $_POST['c_cash'] - $totalAmount
                ];
                if($this->ordersModel->update($orders['id'], $data)){
                    
                    $jdata =[
                        'status' => 'Success',
                        'status_text' => 'Successfully added a payment!',
                        'status_icon' => 'success'
                    ];
                } else{
                    $jdata =[
                        'status' => 'Oops!',
                        'status_text' => 'Something went wrong!',
                        'status_icon' => 'warning'
                    ];
                }
                return $this->response->setJSON($jdata);
            }else{
                $jdata =[
                    'status' => 'Oops!',
                    'status_text' => 'Please pay higher than your bill!',
                    'status_icon' => 'warning'
                ];
            }
        }
		return $this->response->setJSON($jdata);
    }

    public function editCartQty($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Order Menu',
            'title' => 'Order Menu',
            'view' => 'Modules\OrderManagement\Views\menuList\index'
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
            $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
            return redirect()->to('/orders/admin-menu');
        }

        return view('templates/index', $data);
    }

    public function editQty($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Orders',
            'title' => 'Orders',
            'view' => 'Modules\OrderManagement\Views\orders\orders'
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
            $this->session->setFlashdata('success_no_flash', 'Menu Quantity Updated!');
            return redirect()->to('/orders');
        }

        return view('templates/index', $data);
    }
    
    public function deleteAdminCart($cartId)
    {
        $this->cartsModel->softDelete($cartId);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

    public function deleteCart($cartId)
    {
        $this->cartsModel->softDelete($cartId);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

    public function delete($id)
    {
        $this->ordersModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
	//--------------------------------------------------------------------
}
