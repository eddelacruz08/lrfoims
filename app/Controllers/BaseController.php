<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

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
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();
		$this->validation = \Config\Services::validation();
    }
    
	public function __construct()
	{
		$this->session = \Config\Services::session();

		helper(['form', 'link', 'namesearch', 'document']);
	}

	protected function hasPermissionRedirect($slugs)
	{
		$this->modulesModel = new UserManagement\ModulesModel();
		$this->permissionsModel = new UserManagement\PermissionsModel();
		$this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();

		$isValidSlug = 0;
		$userPermissionView = $this->rolesPermissionsModel->getSecurityPermissions(['lrfoims_roles_permissions.role_id' => session()->get('role_id')]);
		$permissions = $this->rolesPermissionsModel->getSecurityPermissions(['lrfoims_roles_permissions.role_id' => session()->get('role_id'), 'p.slug'=> $slugs]);
		if(!empty($permissions)){
			session()->set(['userPermissionView' => $userPermissionView]);
			$isValidSlug = 1;
		}else{
			$isValidSlug = 0;
		}
		if($isValidSlug == 0 && session()->get('role_id') == null){
			header('Location: '.base_url());
			exit();
		}
		if($isValidSlug == 0){
			header('Location: '.base_url().'/'.$slugs.'/403');
			exit();
		}
	}
}
