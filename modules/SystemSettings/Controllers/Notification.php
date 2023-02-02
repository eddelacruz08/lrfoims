<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Notification extends BaseController
{
    function __construct(){
        $this->notifModel = new SystemSettings\NotificationModel();
        helper(['form','link']);
    }

    public function index() {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | Notification',
            'title' => 'Notification',
            'view' => 'Modules\SystemSettings\Views\notif\index',
            'notif' => $this->notifModel->get()
        ];
        
        return view('templates/index',$data);
    }
    
	public function getNotifications() {
        
        $data = [
            'getNotifications' => $this->notifModel->getNotifications(['lrfoims_notifications.status'=>'a']),
        ];
        return $this->response->setJSON($data);
	}
}
