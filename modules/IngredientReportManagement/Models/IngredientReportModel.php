<?php namespace Modules\IngredientReportManagement\Models;

use App\Models\BaseModel;

class IngredientReportModel extends BaseModel
{
    protected $table = 'lrfoims_ingredient_out';
    protected $allowedFields = [
        'ingredient_id',
        'order_id',
        'unit_quantity',
        'unit_price',
        'total_unit_price',
        'product_description_id',
        'stock_status',
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

    public function getIngredientReports($conditions = []){

        $this->select('lrfoims_ingredient_out.*, pm.name as description');
        $this->join('lrfoims_products as p', 'lrfoims_ingredient_out.ingredient_id = p.id');
        $this->join('lrfoims_product_measures as pm', 'lrfoims_ingredient_out.product_description_id = pm.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('lrfoims_ingredient_out.created_at', 'DESC');
        return $this->findAll();
    }

    public function getCountIngredientReports($conditions = []){

        $this->select('lrfoims_ingredient_out.*, SUM(lrfoims_ingredient_out.total_unit_price) as total,
                        COUNT(lrfoims_ingredient_out.ingredient_id) as countIngredientReport, p.product_name, p.id as product_id');
        $this->join('lrfoims_products as p', 'lrfoims_ingredient_out.ingredient_id = p.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        $this->groupBy('lrfoims_ingredient_out.ingredient_id');
        return $this->findAll();
    }
    
    public function getTotalIngredientReports($conditions = []){
        
        $this->select('COUNT(lrfoims_ingredient_out.id) as total_ingredient_report,
                        SUM(lrfoims_ingredient_out.total_unit_price) as total_ingredient_report_price');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    
    public function getTotalGoodSoldIngredientPerYears($conditions = []){
        
        $this->select('
            COUNT(id) AS total_ingredients_report,
            SUM(total_unit_price) AS total_ingredients_report_price,
        ');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    
    public function getCountTotalAmountIngredientPerMonth($conditions = []){
        
        $this->select('COUNT(id) AS total_count_per_month_ingredients');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }

    public function getTotalAmountIngredientPerMonth($conditions = []){
        
        $this->select('SUM(total_unit_price) AS total_amount_per_month_ingredients');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    
}
