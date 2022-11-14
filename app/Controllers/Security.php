<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\LogsModel;
use Modules\UserManagement\Models as UserManagement;
use Modules\HomeManagement\Models as HomeManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;

class Security extends BaseController{

    function __construct(){
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
		$this->cartsModel = new HomeManagement\CartModel();
		$this->ordersModel = new OrderManagement\OrderModel();
        $this->logsModel = new UserManagement\LogsModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
    }

    public function index(){
        if(empty(session()->get('isLoggedIn'))) {
        
            function random_string($length) {
                $key = '';
                $keys = array_merge(range(0, 9), range('a', 'z'));
            
                for ($i = 0; $i < $length; $i++) {
                    $key .= $keys[array_rand($keys)];
                }
            
                return 'Anonymous_'.$key;
            }

            $data = [
                'page_title' => 'LRFOIMS | Sign in',
                'title' => 'Lamon Restaurant Food Ordering and Ingredient Management System',
                'view' => 'Login/login',
                'random_name' => random_string(25)
            ];
            helper(['form']);
            if ($this->request->getMethod() == 'post') {
                //validation
                $rules = [
                    'username' => 'required|min_length[5]|max_length[25]',
                    'password' => 'required|min_length[8]|max_length[50]|validateUser[username,password]',
                ];
                $errors = [
                    'password' => [ 
                        'validateUser' => 'Username or Password don\'t match.'
                    ]
                ];

                if (!$this->validate($rules, $errors)) {
                    $data['validation'] = $this->validator;
                } else {
                    $model = new UsersModel();

                    $user = $model->getDetails(['lrfoims_users.username'=>$this->request->getVar('username'),'lrfoims_users.status'=>'a'])[0];

                    $this->setUserMethod($user);
                    $this->session->setFlashdata('success_login', 'Successfully logged in!');
                    
                    $logData = [
                        'user_id' => session()->get('id'),
                        'description' => 'signed in'
                    ];
                    $this->logsModel->add($logData);
                    return redirect()->to(session()->get('landing_page'));

                }
            }

            return view('templates/landingPage', $data);
        }else{
            return redirect()->to(session()->get('landing_page'));
        }
    }

    private function setUserMethod($user){
        $data = [
            'id' => $user['id'],
            'role_id' => $user['role_id'],
            'role_name' => $user['role_name'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'last_name' => $user['last_name'],
            'username' => $user['username'],
            'landing_page' => $user['slug'],
            'isLoggedIn' => true,
            'permissions' => $this->rolesPermissionsModel->getPermissions(['lrfoims_roles_permissions.role_id' => $user['role_id']]),
            'modules' => $this->rolesPermissionsModel->getModules(['lrfoims_roles_permissions.role_id' => $user['role_id']]),
            'getOrderCounts' => $this->ordersModel->getCountOrdersHome(['user_id' => $user['id'], 'status'=>'a'])[0],
        ];

        session()->set($data);

        return true;
    }

    public function register(){
        $data = [
            'page_title' => 'LRFOIMS | Register',
            'title' => 'Lamon Restaurant Food Ordering and Ingredient System',
            'view' => 'register',
            'regions' => $this->regionModel->get(['status'=>'a']),
            'province' => $this->provinceModel->get(['status'=>'a']),
            'city' => $this->cityModel->get(['status'=>'a']),
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            if(!$this->validate('addRegister')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $model = new UsersModel();
                $newData = [
                    'first_name' => $this->request->getVar('first_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'username' => $this->request->getVar('username'),
                    'email_address' => $this->request->getVar('email_address'),
                    'region_id' => $this->request->getVar('region_id'),
                    'province_id' => $this->request->getVar('province_id'),
                    'city_id' => $this->request->getVar('city_id'),
                    'addtl_address' => $this->request->getVar('addtl_address'),
                    'password' => $this->request->getVar('password'),
                    'role_id' => 4,
                    'status' => 'a'
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success','Successfully Registered!');
                return redirect()->to('/');
            }

        }

        return view('templates/landingPage',$data);
    }
    
    public function guestMode(){
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $model = new UsersModel();

            $newData = [
                'username' => $this->request->getVar('username'),
                'role_id' => 5,
                'status' => 'u'
            ];
            
            $logData = [
                'user_id' => session()->get('id'),
                'description' => 'signed in'
            ];
            $this->logsModel->add($logData);
            $model->save($newData);
            $session = session();
            $session->setFlashdata('success','Successfully Registered!');
            $user = $model->getDetails(['lrfoims_users.username'=>$this->request->getVar('username'),'lrfoims_users.status'=>'a'])[0];

            $this->setUserMethod($user);
            return redirect()->to('/');
        }

        return view('templates/landingPage',$data);
    }

    public function fileNotFound($slugs)
	{
		$data['view'] = 'errors/403';
		$data['slugs'] = $slugs;
        $data['page_title'] = 'LRFOIMS | Permissions!';
        if(session()->get('role_id') <= 3){
            return view('templates/index',$data);
        }else{
            return view('templates/landingPage',$data);
        }
	}

    public function signOut(){
        $logData = [
            'user_id' => session()->get('id'),
            'description' => 'signed out'
        ];
        $this->logsModel->add($logData);
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}