<?php namespace App\Controllers;

use Modules\UserManagement\Models as UserManagement;
use Modules\HomeManagement\Models as HomeManagement;
use Modules\OrderManagement\Models as OrderManagement;
use Modules\SystemSettings\Models as SystemSettings;
use Modules\IngredientReportManagement\Models as IngredientReportManagement;
use App\Controllers\SendMail as SendMail;

class Security extends BaseController{

    function __construct(){
        helper(['form','link']);
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->usersModel = new UserManagement\UsersModel();
		$this->cartsModel = new HomeManagement\CartModel();
		$this->ordersModel = new OrderManagement\OrderModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		$this->barangayModel = new SystemSettings\BarangayModel();
		$this->infoModel = new SystemSettings\HomeInfoModel();
		$this->notificationModel = new SystemSettings\NotificationModel();
        $this->stocksModel = new IngredientReportManagement\IngredientReportModel();
        $this->email = \Config\Services::email();
        // $this->sendMail = new SendMail();
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
                'title' => 'Lamon Restaurant Food Ordering',
                'view' => 'Login/login',
                'random_name' => random_string(25),
                'homeDetails' => $this->infoModel->get()[0],
                'regions' => $this->regionModel->get(['status'=>'a']),
                'provinces' => $this->provinceModel->get(['status'=>'a']),
                'cities' => $this->cityModel->get(['status'=>'a']),
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

                    $user = $this->usersModel->getDetails(['lrfoims_users.username'=>$this->request->getVar('username'),'lrfoims_users.status'=>'a'])[0];

                    $this->setUserMethod($user);
                    $this->session->setFlashdata('success_login', 'Successfully logged in!');
                    
		            $userPermissionView = $this->rolesPermissionsModel->getSecurityPermissions(['lrfoims_roles_permissions.role_id' => session()->get('role_id')]);
                    session()->set(['userPermissionView' => $userPermissionView]);
                    return redirect()->to(session()->get('landing_page'));

                }
            }

            return view('templates/landingPage_home', $data);
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
            'contact_number' => $user['contact_number'],
            'email_address' => $user['email_address'],
            'region_id' => $user['region_id'],
            'province_id' => $user['province_id'],
            'city_id' => $user['city_id'],
            'addtl_address' => $user['addtl_address'],
            'landing_page' => $user['slug'],
            'isLoggedIn' => true,
            'permissions' => $this->rolesPermissionsModel->getPermissions(['lrfoims_roles_permissions.role_id' => $user['role_id']]),
            'modules' => $this->rolesPermissionsModel->getModules(['lrfoims_roles_permissions.role_id' => $user['role_id']]),
            'getOrderCounts' => $this->ordersModel->getCountOrdersHome(['user_id' => $user['id'], 'status'=>'a', 'order_status_id'=> 7])[0],
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
            'provinces' => $this->provinceModel->get(['status'=>'a']),
            'cities' => $this->cityModel->get(['status'=>'a']),
			'homeDetails' => $this->infoModel->get()[0],
        ];
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            if(!$this->validate('addRegister')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {

                function random_string($length) {
                    $key = '';
                    $keys = array_merge(range(0, 9), range('a', 'z'));
                    for ($i = 0; $i < $length; $i++) {
                        $key .= $keys[array_rand($keys)];
                    }
                    return $key;
                }

                $email = $this->request->getVar('email_address');

                $code = random_string(6);

                $localData = [
                    'local_first_name' => $this->request->getVar('first_name'),
                    'local_last_name' => $this->request->getVar('last_name'),
                    'local_username' => $this->request->getVar('username'),
                    'local_email_address' => $this->request->getVar('email_address'),
                    'local_contact_number' => $this->request->getVar('contact_number'),
                    'local_region_id' => $this->request->getVar('region_id'),
                    'local_province_id' => $this->request->getVar('province_id'),
                    'local_city_id' => $this->request->getVar('city_id'),
                    'local_addtl_address' => $this->request->getVar('addtl_address'),
                    'local_password' => $this->request->getVar('password'),
                    'local_role_id' => 4,
                    'local_status' => 'a',
                    'local_email_code' => $code
                ];
                session()->set($localData);

                $code = random_string(6);
                $message = '';
                $message .= '<p>Email Verification';
                $message .= '<br><p>Code: <b>'.$code.'</b></p>';
                $message .= "<br><p>** This email is system generated. Do not reply. **</p>";
                $to = $this->request->getVar('email_address');
                $subject = 'Email Verification';
                $this->email->setTo($to);
                $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');	
                $this->email->setSubject($subject);
                $this->email->setMessage($message);
                if($this->email->send()){
                    $this->session->setFlashdata('success','Email sent!');
                    return redirect()->to('/submit-email-verification');
                }
                $this->session->setFlashdata('error','Email not sent!');
                return redirect()->to('/register');
            }

        }

        return view('templates/landingPage_home',$data);
    }

    public function send(){
        $code = session()->get('local_email_code');
        $message = '';
        $message .= '<p>Email Verification';
        $message .= '<br><p>Code: <b>'.$code.'</b></p>';
        $message .= "<br><p>** This email is system generated. Do not reply. **</p>";
        $to = session()->get('local_email_address');
        $subject = 'Email Verification';
        $this->email->setTo($to);
        $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');	
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        if($this->email->send()){
            $this->session->setFlashdata('success','Email sent!');
            return redirect()->to('/submit-email-verification');
        }else{
            $this->session->setFlashdata('error','Email not sent!');
            return redirect()->to('/submit-email-verification');
        }
    }

    public function sendRegister(){
        $code = session()->get('local_email_code');
        $message = '';
        $message .= '<p>Email Verification';
        $message .= '<br><p>Code: <b>'.$code.'</b></p>';
        $message .= "<br><p>** This email is system generated. Do not reply. **</p>";
        $to = session()->get('local_email_address');
        $subject = 'Email Verification';
        $this->email->setTo($to);
        $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');	
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        if($this->email->send()){
            $this->session->setFlashdata('success','Email sent!');
            return redirect()->to('/register-submit-email-verification');
        }else{
            $this->session->setFlashdata('error','Email not sent!');
            return redirect()->to('/register-submit-email-verification');
        }
    }

    public function emailVerification(){
        $data = [
            'page_title' => 'LRFOIMS | Verify Email',
            'view' => 'email_verification',
			'homeDetails' => $this->infoModel->get()[0],
            'regions' => $this->regionModel->get(['status'=>'a']),
            'provinces' => $this->provinceModel->get(['status'=>'a']),
            'cities' => $this->cityModel->get(['status'=>'a']),
        ];
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            if(!$this->validate('emailCode')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if($_POST['email_code'] == session()->get('local_email_code')){
                    $newData = [
                        'first_name' => session()->get('local_first_name'),
                        'last_name' => session()->get('local_last_name'),
                        'username' => session()->get('local_username'),
                        'email_address' => session()->get('local_email_address'),
                        'contact_number' => session()->get('local_contact_number'),
                        'region_id' => session()->get('local_region_id'),
                        'province_id' => session()->get('local_province_id'),
                        'city_id' => session()->get('local_city_id'),
                        'addtl_address' => session()->get('local_addtl_address'),
                        'password' => session()->get('local_password'),
                        'role_id' => session()->get('local_role_id'),
                        'status' => session()->get('local_status')
                    ];
                    $this->usersModel->save($newData);

                    session()->remove('local_first_name');
                    session()->remove('local_last_name');
                    session()->remove('local_username');
                    session()->remove('local_email_address');
                    session()->remove('local_contact_number');
                    session()->remove('local_region_id');
                    session()->remove('local_province_id');
                    session()->remove('local_city_id');
                    session()->remove('local_addtl_address');
                    session()->remove('local_password');
                    session()->remove('local_role_id');
                    session()->remove('local_status');
                    $this->session->setFlashdata('success','Successfully Registered!');
                    return redirect()->to('/login');
                }else{
                    $this->session->setFlashdata('error','Invalid Code!');
                    return redirect()->to('/submit-email-verification');
                }
            }

        }

        return view('templates/landingPage_home',$data);
    }

	public function getRegions() {
		$data = $this->regionModel->where('status', 'a')->orderBy('id', 'ASC')->findAll();
		return $this->response->setJSON($data);
	}

	public function getProvinces($id) {
		$data = $this->provinceModel->where('region_code', $id)->orderBy('id', 'ASC')->findAll();
		return $this->response->setJSON($data);
	}

	public function getCities($id) {
		$data = $this->cityModel->where('province_code', $id)->orderBy('id', 'ASC')->findAll();
		return $this->response->setJSON($data);
	}

	public function getBarangay($id) {
		$data = $this->barangayModel->where('barangay_code', $id)->orderBy('id', 'ASC')->findAll();
		return $this->response->setJSON($data);
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
    
    public function forgotPassword(){
        $data = [
            'page_title' => 'LRFOIMS | Forgot Password',
            'title' => 'Lamon Restaurant Food Ordering and Ingredient System',
            'view' => 'forgot_password',
            'regions' => $this->regionModel->get(['status'=>'a']),
            'provinces' => $this->provinceModel->get(['status'=>'a']),
            'cities' => $this->cityModel->get(['status'=>'a']),
			'homeDetails' => $this->infoModel->get()[0],
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            if(!$this->validate('forgotPassword')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $existing = 0;
                $user = $this->usersModel->get(['status'=>'a']);
                foreach($user as $value){
                    if($value['email_address'] == $this->request->getVar('email_address')){
                        $existing = 1;
                    }
                }
                if($existing == 1){
                    function random_string($length) {
                        $key = '';
                        $keys = array_merge(range(0, 9), range('a', 'z'));
                        for ($i = 0; $i < $length; $i++) {
                            $key .= $keys[array_rand($keys)];
                        }
                        return $key;
                    }
    
                    $email = $this->request->getVar('email_address');
    
                    $code = random_string(6);
    
                    $localData = [
                        'local_forgot_password_email_address' => $this->request->getVar('email_address'),
                        'local_forgot_password_email_code' => $code
                    ];
                    session()->set($localData);
    
                    $message = '';
                    $message .= '<p>Email Verification';
                    $message .= '<br><p>Code: <b>'.$code.'</b></p>';
                    $message .= "<br><p>** This email is system generated. Do not reply. **</p>";
                    $to = $email;
                    $subject = 'Email Verification';
                    $this->email->setTo($to);
                    $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');	
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);
                    if($this->email->send()){
                        $this->session->setFlashdata('success','Email sent!');
                        return redirect()->to('/forgot-password');
                    }
                    $this->session->setFlashdata('error','Email not sent!');
                    return redirect()->to('/forgot-password');
                }else{
                    $this->session->setFlashdata('error','Email address does not exist!');
                    return redirect()->to('/forgot-password');
                }
            }
        }

        return view('templates/landingPage_home',$data);
    }
    
    public function emailTemporaryPassword(){
        $data = [
            'page_title' => 'LRFOIMS | Forgot Password',
            'title' => 'Lamon Restaurant Food Ordering and Ingredient System',
            'view' => 'forgot_password',
            'regions' => $this->regionModel->get(['status'=>'a']),
            'provinces' => $this->provinceModel->get(['status'=>'a']),
            'cities' => $this->cityModel->get(['status'=>'a']),
			'homeDetails' => $this->infoModel->get()[0],
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            if(!$this->validate('emailCode')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                if($_POST['email_code'] == session()->get('local_forgot_password_email_code')){
                    function random_string($length) {
                        $key = '';
                        $keys = array_merge(range(0, 9), range('a', 'z'));
                        for ($i = 0; $i < $length; $i++) {
                            $key .= $keys[array_rand($keys)];
                        }
                        return $key;
                    }

                    $user = $this->usersModel->getDetails(['lrfoims_users.email_address'=>$this->request->getVar('email_address'),'lrfoims_users.status'=>'a'])[0];
                    
                    $password = random_string(10);

                    $message = '';
                    $message .= '<p>Temporary Password';
                    $message .= '<br><p>Username: <b>'.$user['username'].'</b></p>';
                    $message .= '<br><p>Password: <b>'.$password.'</b></p>';
                    $message .= "<br><p>** This email is system generated. Do not reply. **</p>";
                    $to = $this->request->getVar('email_address');
                    $subject = 'Temporary Password';
                    $this->email->setTo($to);
                    $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');	
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);
                    if($this->email->send()){
                        session()->remove('local_forgot_password_email_address');
                        session()->remove('local_forgot_password_email_code');

                        $jdata = [
                            'password' => $password,
                        ];
                        $model->update($user['id'], $jdata);

                        $this->session->setFlashdata('success','Successfully Verified!');
                        return redirect()->to('/login');
                    }else{
                        $this->session->setFlashdata('error','I\\\'m sorry! Failed to verify if it\\\'s you. :(');
                        return redirect()->to('/forgot-password');
                    }
                }else{
                    $this->session->setFlashdata('error','Invalid Code!');
                    return redirect()->to('/forgot-password');
                }
            }
        }

        return view('templates/landingPage_home',$data);
    }

    public function signOut(){
        $this->session->destroy();
        return redirect()->to('/');
    }
}