<?php

namespace Modules\OrderManagement\Controllers;

use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\ProductManagement\Models as ProductManagement;
use App\Controllers\BaseController;

class Order extends BaseController
{
    function __construct(){
        $this->ordersModel = new OrderManagement\OrderModel();
        $this->cartsModel = new OrderManagement\CartModel();
        $this->menusModel = new ProductManagement\ProductModel();
        $this->facilityStatusModel = new SystemSettings\FacilityStatusModel();
        helper(['form']);
    }

    public function index()
    {
        // $server = trim($_SERVER['REQUEST_URI'],'/');
        // $this->hasPermissionRedirect($server);

        $data = [
            'page_title' => 'LRFOIMS | Orders',
            'title' => 'Orders',
            'view' => 'Modules\OrderManagement\Views\order\index',
            'orders' => $this->ordersModel->getDetails(['lrfoims_orders.status'=>'a'])
        ];
        return view('templates/index', $data);
    }

    public function retrieve(){
        $data['menuLists'] = $this->menusModel->get();
        $data['getCarts'] = $this->cartsModel->getCarts(['o.user_id' => $_GET['id']]);
        $data['getCartTotalPrice'] = $this->cartsModel->getCartTotalPrice(['o.user_id' => $_GET['id']]);
        $data['getOrderDetails'] = $this->ordersModel->getOrderDetails(['lrfoims_orders.user_id' => $_GET['id']]);
        return view('Modules\OrderManagement\Views\order\orders', $data);
    }

    public function add(){
        $data['page_title'] = 'LRFOIMS | Roles Permissions';
        $data['title'] = 'Roles Permissions';
        $data['edit'] = false;
        $data['view'] = 'Modules\UserManagement\Views\RolesPermissions\form';
        // $data['id'] = $id;
        $data['roles'] = $this->rolesModel->get();
        $data['modules'] = $this->modulesModel->get();
        $data['permissions'] = $this->permissionsModel->get();
        // $data['role_permissions'] = $this->rolesPermissionsModel->getDetails(['r.id' => $id]);
    
        // $data['value'] = $this->rolesModel->get(['id' => $id])[0];
        if(empty($data['value'])){
          die('Some Error Code Here (No Record)');
        }
    
        if($this->request->getMethod() === 'post'){
            if ($this->rolesPermissionsModel->softDeleteByRoleId($id)) {
              if(!empty($_POST['permission_id'])){
                foreach ($_POST['permission_id'] as $key => $value) {
                //   $permission = $this->rolesPermissionsModel->get(['role_id' => $id, 'permission_id' => $value]);
                  if (!empty($permission)) {
                    $this->rolesPermissionsModel->EditByModuleId(['deleted_at' => null],$value);
                  } else {
                    $this->rolesPermissionsModel->add($_POST);
                  }
                }
              }
              $this->session->setFlashData('success', 'Successfully edit permission roles!');
            } else {
              $this->session->setFlashData('error', 'Something went wrong!');
            }
            return redirect()->to(base_url('roles-permissions'));
        }
        return view('templates/index', $data);
    }
    
    public function editQty($id)
    {
        $data = [
            'page_title' => 'LRFOIMS | Orders',
            'title' => 'Orders',
            'view' => 'Modules\OrderManagement\Views\orders\orders',
            'id' => $id,
        ];
        if ($this->request->getMethod() == 'post') {
            $this->cartsModel->update($id, $_POST);
            // $this->ordersModel->update($id, $_POST);
            // $this->session->setFlashdata('success', 'Order Quantity Successfully Added');
            return redirect()->to('/orders');
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'RMFS | Facilities',
            'title' => 'Facility',
            'view' => 'Modules\OrderManagement\Views\facility\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->facilitiesModel->get(['id' => $id])[0],
            'status' => $this->facilityStatusModel->get()
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilitiesEdit')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {

                $facility = $this->facilitiesModel->get(['id' => $id])[0];
                $currentImage = $facility['image'];
                $file = $this->request->getFile('image');

                if ($file->isValid() && !$file->hasMoved()) {

                    if(file_exists('./assets/uploads/facility/'.$currentImage)){
                        unlink('./assets/uploads/facility/'.$currentImage);
                    }

                    $imageName = $file->getRandomName();
                    $file->move('./assets/uploads', $imageName);
                } else {
                    $imageName = $currentImage;
                }

                $_POST['image'] = $imageName;

                $this->facilitiesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Facility Successfully Updated');
                return redirect()->to('/facility');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $facility = $this->ordersModel->get(['id' => $id])[0];
        $this->ordersModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
