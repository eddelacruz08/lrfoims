<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class QrCode extends BaseController
{
    function __construct(){
        $this->infoModel = new SystemSettings\HomeInfoModel();
        helper(['form','link']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'LRFOIMS | QrCode Link',
            'title' => 'QrCode Link',
            'view' => 'Modules\SystemSettings\Views\qrcode\index',
            'qrcodeInfo' => $this->infoModel->get()[0]
        ];
        
        return view('templates/index',$data);
    }
}
