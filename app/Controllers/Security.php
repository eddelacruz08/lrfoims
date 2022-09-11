<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models as UserManagement;
use Modules\HomeManagement\Models as HomeManagement;

class Security extends BaseController{

    function __construct(){
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
		$this->cartsModel = new HomeManagement\CartModel();
    }

    public function index(){
        $data = [
            'page_title' => 'LRFOIMS | Sign in',
            'title' => 'Lamon Restaurant Food Ordering and Ingredients Management System',
            'view' => 'Login/login'
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
                // $logData = [
                //     'user_id' => session()->get('id'),
                //     'description' => 'signed in'
                // ];
                // $this->logsModel->add($logData);
                if(session()->get('role_id') <= 3){
                    return redirect()->to('/dashboard');
                }else{
                    return redirect()->to('/');
                }

            }
        }

        return view('templates/landingPage', $data);
    }

    private function setUserMethod($user){
        $data = [
            'id' => $user['id'],
            'role_id' => $user['role_id'],
            'role_name' => $user['role_name'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email_address' => $user['email_address'],
            'isLoggedIn' => true,
            'permissions' => $this->rolesPermissionsModel->getPermissions(['role_id' => $user['role_id']]),
            'modules' => $this->rolesPermissionsModel->getModules(['role_id' => $user['role_id']]),
        ];

        session()->set($data);

        return true;
    }

    public function register(){
        $data = [
            'page_title' => 'LRFOIMS | Register',
            'title' => 'Lamon Restaurant Food Ordering and Inventory System',
            'view' => 'register'
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            //validation
            $rules=[
                'username' => 'required|min_length[5]|max_length[25]|is_unique[ors_users.username]',
                'password' => 'required|min_length[8]|max_length[50]',
                'confirm_password' => 'matches[password]',
            ];

            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }
            else{
                $model = new UsersModel();

                $newData = [
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'role_id' => 4,
                    'status' => 'a'
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success','Successfull Registration');
                return redirect()->to('/');
            }

        }

        return view('templates/landingPage',$data);
    }

    public function fileNotFound($slugs)
	{
		$data['view'] = 'errors/403';
		$data['slugs'] = $slugs;
        $data['page_title'] = 'LRFOIMS | Permissions!';
        return view('templates/index',$data);
	}

    public function signOut(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}