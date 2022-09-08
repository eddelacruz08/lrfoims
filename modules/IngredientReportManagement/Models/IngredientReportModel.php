<?php namespace Modules\IngredientReportManagement\Models;

use App\Models\BaseModel;

class IngredientReportModel extends BaseModel
{
    protected $table = 'lrfoims_ingredient_out';
    protected $allowedFields = [
        'ingredient_id',
        'quantity',
        'total_unit_price',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('lrfoims_ingredient_out.*');
        $this->join('lrfoims_products as p', 'lrfoims_ingredient_out.ingredient_id = p.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

    public function getCountIngredientReports($conditions = []){

        $this->select('lrfoims_ingredient_out.*, SUM(lrfoims_ingredient_out.quantity * lrfoims_ingredient_out.total_unit_price) as total,
                        COUNT(lrfoims_ingredient_out.ingredient_id) as countIngredientReport, p.product_name, p.id as product_id');
        $this->join('lrfoims_products as p', 'lrfoims_ingredient_out.ingredient_id = p.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        $this->groupBy('lrfoims_ingredient_out.ingredient_id');
        return $this->findAll();
    }
    
    public function getTotalIngredientReports($conditions = []){
        
        $this->select('lrfoims_ingredient_out.*, COUNT(lrfoims_ingredient_out.id) as total_ingredient_report,
                        SUM(lrfoims_ingredient_out.quantity * lrfoims_ingredient_out.total_unit_price) as total_ingredient_report_price');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }
}
