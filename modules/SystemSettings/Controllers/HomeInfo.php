<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class HomeInfo extends BaseController
{
	function __construct(){
		$this->infoModel = new SystemSettings\HomeInfoModel();
		$this->regionModel = new SystemSettings\RegionModel();
		$this->provinceModel = new SystemSettings\ProvinceModel();
		$this->cityModel = new SystemSettings\CityModel();
		helper(['form']);
	}

	public function index() {
		$data = [
			'page_title' => 'LRFOIMS | Home Details',
			'title' => 'Home Details',
			'view' => 'Modules\SystemSettings\Views\homeDetails\index',
			'homeDetails' => $this->infoModel->get(),
            'regions' => $this->regionModel->get(['status'=>'a']), 
            'provinces' => $this->provinceModel->get(['status'=>'a']),
            'cities' => $this->cityModel->get(['status'=>'a']),
		];

		return view('templates/index', $data);
	}

    public function edit($id) {
        $data = [
            'page_title' => 'LRFOIMS | Home Details',
            'title' => 'Home Details',
            'action' => 'Submit',
            'view' => 'Modules\SystemSettings\Views\homeDetails\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->infoModel->get(['id' => $id])[0]
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('homeDetails')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                // die($_POST['image']);
                $details = $this->infoModel->get(['id' => $id])[0];
                $currentImage = $details['image'];
                $file = $this->request->getFile('image');
                if ($file->isValid() && !$file->hasMoved()) {

                    if(file_exists('./assets/img/'.$currentImage)){
                        unlink('./assets/img/'.$currentImage);
                    }

                    $imageName = $file->getRandomName();
                    $file->move('./assets/img/', $imageName);
                } else {
                    $imageName = $currentImage;
                }
                $_POST['image'] = $imageName;
                $this->infoModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Details successfully updated');
                return redirect()->to('/home-details');
            }
        }
        return view('templates/index', $data);
    }
	//--------------------------------------------------------------------
}
