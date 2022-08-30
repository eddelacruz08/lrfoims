<?php namespace Modules\ProductManagement\Models;

use App\Models\BaseModel;

class ProductModel extends BaseModel
{
    protected $table = 'lrfoims_products';
    protected $allowedFields = [
        'product_name',
        'product_category_id',
        'quantity',
        'product_description_id',
        'price',
        'product_status_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('frbs_equipments.*, es.equipment_status, ec.equipment_condition');
        $this->join('frbs_equipment_status as es', 'frbs_equipments.status_id = es.id');
        $this->join('frbs_equipment_conditions as ec', 'frbs_equipments.condition_id = ec.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    
    public function getProduct($conditions = []){
        
        $this->select('lrfoims_products.*, pc.product_description, ps.name, pd.name as description');
        $this->join('lrfoims_product_categories as pc', 'pc.id = lrfoims_products.product_category_id');
        $this->join('lrfoims_product_description as pd', 'pd.id = lrfoims_products.product_description_id');
        $this->join('lrfoims_product_status as ps', 'ps.id = lrfoims_products.product_status_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }
}
