<?php namespace Modules\HomeManagement\Controllers;

use Modules\HomeManagement\Models as HomeManagement;
use Modules\MenuManagement\Models as MenuManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Home extends BaseController
{
	function __construct(){
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->cartsModel = new HomeManagement\CartModel();
		$this->menuModel = new MenuManagement\MenuModel();
		$this->menuCategoryModel = new SystemSettings\MenuCategoryModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'LRFOIMS | LAMON',
			'title' => 'LAMON',
			'view' => 'Modules\HomeManagement\Views\home\index',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
		];
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
				,'o.order_status_id'=>1]);
		session()->set($dataSession);

		return view('templates/landingPage',$data);
	}

	public function menu()
	{
		$data = [
			'page_title' => 'LRFOIMS | Menu',
			'title' => 'Menu',
			'view' => 'Modules\HomeManagement\Views\home\menu',
			'menu' => $this->menuModel->get(),
			'menuCategory' => $this->menuCategoryModel->get(),
		];

		return view('templates/landingPage',$data);
	}
	
	public function addToCart()
	{
        $data['page_title'] = 'LRFOIMS | Menu';
        $data['title'] = 'Menu';
        $data['view'] = 'Modules\OrderManagement\Views\menuList\index';

        $checkHaveOrders = $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id' => 1, 'status' => 'a']);
		if(!empty($checkHaveOrders)){
			$checkHaveOrderId = $this->ordersModel->get(['user_id' => session()->get('id'), 'order_status_id' => 1, 'status' => 'a'])[0];
			$checkDuplicateMenuId = $this->cartsModel->get(['order_id' => $checkHaveOrderId['id'], 'menu_id' => $_POST['menu_id'], 'status' => 'a']);
			if(empty($checkDuplicateMenuId)){
				if ($this->request->getMethod() == 'post') {
					if (!$this->validate('addOrderToCartInMenuList')) {
						$data['errors'] = $this->validation->getErrors();
						$data['value'] = $_POST;
						$this->session->setFlashdata('error', 'Please complete all fields!');
					} else {
						$_POST['order_id'] = $checkHaveOrderId['id'];
						$this->cartsModel->add($_POST);
						$this->session->setFlashdata('success_no_flash', 'Menu successfully added!');
					}
					$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
							,'o.order_status_id'=>1]);
					session()->set($dataSession);
					return redirect()->to('/menu');
				}
				return redirect()->to('/menu');
			}else{
				$this->session->setFlashdata('error_no_flash', 'You\\\'ve already added this menu! Please check your cart to apply changes.');
				return redirect()->to('/menu');
			}
		}else{
			if ($this->request->getMethod() == 'post') {
				if (!$this->validate('addOrderToCartInMenuList')) {
					$data['errors'] = $this->validation->getErrors();
					$data['value'] = $_POST;
					$this->session->setFlashdata('error', 'Please complete all fields!');
				} else {
					$orderNumberId = $highestOrderNumber['max_order_number'] + 1;
					$orderId = $highestOrderNumber['id'] + 1;
					$postData = [
						'number' => $orderNumberId,
						'user_id' => session()->get('id'),
						'order_status_id' => 1
					];
					$this->ordersModel->add($postData);
					$_POST['order_id'] = $orderId;
					$this->cartsModel->add($_POST);
					$this->session->setFlashdata('success_no_flash', 'Menu successfully added!');
				}
				$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
						,'o.order_status_id'=>1]);
				session()->set($dataSession);
				return redirect()->to('/menu');
			}
			$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
					,'o.order_status_id'=>1]);
			session()->set($dataSession);
			return redirect()->to('/menu');
		}

		return view('templates/landingPage',$data);
	}

	public function cart()
	{
		$data = [
			'page_title' => 'LRFOIMS | Cart',
			'title' => 'Cart',
			'view' => 'Modules\HomeManagement\Views\home\cart',
			'getCustomerCartDetails' => $this->cartsModel->getCustomerCartDetails(['lrfoims_carts.status' => 'a']),
			'getCustomerOrderDetails' => $this->ordersModel->get(['lrfoims_orders.user_id' => session()->get('id'),'lrfoims_orders.order_status_id' => 1,'lrfoims_orders.status' => 'a']),
		];
		
		$dataSession['getCustomerCountCarts'] = $this->cartsModel->getCustomerCountCarts(['o.user_id'=>session()->get('id'),'lrfoims_carts.status'=>'a'
				,'o.order_status_id'=>1]);
		session()->set($dataSession);

		return view('templates/landingPage',$data);
	}

    public function editCartQuantity($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Cart',
            'title' => 'Cart',
            'view' => 'Modules\HomeManagement\Views\home\cart'
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
            $this->session->setFlashdata('success_no_flash', 'Cart Quantity Updated!');
            return redirect()->to('/cart');
        }

        return view('templates/index', $data);
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

	public function profile()
	{
		$data = [
			'page_title' => 'LRFOIMS | Profile',
			'title' => 'Profile',
			'view' => 'Modules\HomeManagement\Views\home\profile'
		];

		return view('templates/landingPage',$data);
	}
	//--------------------------------------------------------------------
}
