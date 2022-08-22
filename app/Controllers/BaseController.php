<?php
namespace App\Controllers;

use Modules\UserManagement\Models as UserManagement;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	
	// protected $permissions = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();
		$this->validation = \Config\Services::validation();
	}
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
		helper(['link', 'namesearch', 'paging', 'document']);

		$this->permissionsModel = new UserManagement\PermissionsModel();
		// $model_permission = new PermissionsModel();
		// $model_module = new ModulesModel();
		// $model_user = new UsersModel();

		if(session()->get('isLoggedIn')){
			$this->permissions = $this->permissionsModel->getPermissionsTypes();
			// $this->permissions = $model_permission->like('allowed_roles', $_SESSION['rid'])->findAll();
			// $this->modules = $model_module->findAll();

			// $_SESSION['appmodules'] = $this->modules;
			// $_SESSION['userPermmissions'] = $this->permissions;
		}else{
			
			header('Location: '.current_url());
			// $str = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    		// if($str != base_url()){
			// 	if($str == base_url().'login/register'){
			// 		return redirect()->to(base_url().'login/register');
			// 	}elseif($str == base_url().'login/forgotpassword'){
			// 		return redirect()->to(base_url().'login/forgotpassword');
			// 	}elseif($str == base_url().'health-declaration-form/requesthealthform'){
			// 		return redirect()->to(base_url().'health-declaration-form/requesthealthform');
			// 	}else{
			// 		header('Location: '.base_url());
			// 	}
			// 	exit;
			// }
		}
	}

	protected function hasPermissionRedirect($slugs)
	{
		$isValidSlug = 0;

		$this->permissionsModel = new UserManagement\PermissionsModel();
		$this->permissions = $this->permissionsModel->getPermissionsTypes(['role_id' => session()->get('role_id')]);
		if(!empty($this->permissions))
		{
			die(session()->get('role_id'));
			foreach($this->permissions as $permission)
			{
				if($slugs == $permission['slug'] && in_array(session()->get('role_id'), json_decode($permission['role_id'])))
				{
					$isValidSlug = 1;
					break;
				}
			}
		}

		if($isValidSlug == 0)
		{
			// header('Location: '.base_url());
			// session_destroy();
			die(true);
		}
	}


}
