<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class BarangayModel extends BaseModel
{
    protected $table = 'lrfoims_barangay';
    protected $allowedFields = [
        'barangay_code',
        'barangay_name',
        'region_code',
        'province_code',
        'city_code',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
    
    public function getBarangay($conditions = [], $limit = null, $offset = null, $searchItem = null) {
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }
        if($searchItem != null){
            $this->where('lrfoims_barangay.barangay_code', $searchItem);
            $this->orWhere('lrfoims_barangay.barangay_name', $searchItem);
            $this->orWhere('lrfoims_barangay.region_code', $searchItem);
            $this->orWhere('lrfoims_barangay.province_code', $searchItem);
            $this->orWhere('lrfoims_barangay.city_code', $searchItem);
            $this->orWhere('lrfoims_barangay.status', $searchItem);
        }

        return $this->findAll($limit, $offset);
    }

    public function getTotalBarangay($conditions = []) {
        $this->select('COUNT(lrfoims_barangay.id) as total_barangay');
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }
        return $this->findAll();
    }

}
