<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class HomeInfoModel extends BaseModel
{
    protected $table = 'lrfoims_restaurant_information';
    protected $allowedFields = [
        'image', 
        'restaurant_name',
        'body_desc',
        'footer_desc',
        'region_id',
        'province_id',
        'city_id',
        'addtl_address',
        'contact',
        'email_address',
        'fb_link',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getDetails($conditions = []){

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

}
