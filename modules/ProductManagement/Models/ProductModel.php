<?php namespace Modules\ProductManagement\Models;

use App\Models\BaseModel;

class ProductModel extends BaseModel
{
    protected $table = 'lrfoims_products';
    protected $allowedFields = [
        'product_name',
        'product_category_id',
        'unit',
        'product_description_id',
        'price',
        'quantity',
        'product_status_id',
        'stock_out_date',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('lrfoims_products.*');
        $this->join('lrfoims_ingredient_out as io', 'lrfoims_products.id = io.ingredient_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    
    public function getProduct($conditions = []){
        
        $this->select('lrfoims_products.*, pc.product_description, ps.name, pd.name as description');
        $this->join('lrfoims_product_categories as pc', 'pc.id = lrfoims_products.product_category_id');
        $this->join('lrfoims_product_measures as pd', 'pd.id = lrfoims_products.product_description_id');
        $this->join('lrfoims_product_status as ps', 'ps.id = lrfoims_products.product_status_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }

    public function getTotalProduct($conditions = []){
        
        $this->select('lrfoims_products.*, COUNT(lrfoims_products.id) as total_ingredients,
                        SUM(lrfoims_products.price) as total_ingredients_price');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }

    public function getCountIngredientPerMonth($conditions = []){
        
        $this->select('lrfoims_products.*, COUNT(lrfoims_products.id) as total_ingredients');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }
    
    public function getTotalIngredientPerMonth($conditions = []){
        
        $this->select('
            SUM(MONTH(stock_out_date) = 1) AS Jan, 
            SUM(MONTH(stock_out_date) = 2) AS Feb,
            SUM(MONTH(stock_out_date) = 3) AS Mar, 
            SUM(MONTH(stock_out_date) = 4) AS Apr, 
            SUM(MONTH(stock_out_date) = 5) AS May, 
            SUM(MONTH(stock_out_date) = 6) AS Jun, 
            SUM(MONTH(stock_out_date) = 7) AS Jul, 
            SUM(MONTH(stock_out_date) = 8) AS Aug, 
            SUM(MONTH(stock_out_date) = 9) AS Sept,
            SUM(MONTH(stock_out_date) = 10) AS Oct, 
            SUM(MONTH(stock_out_date) = 11) AS Nov, 
            SUM(MONTH(stock_out_date) = 12) AS December,
        ');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        // $this->orderBy('lrfoims_products.id', 'ASC');

        return $this->findAll();
    }
    
    public function getTotalIngredients($conditions = []){

        $this->select('lrfoims_products.*, COUNT(lrfoims_products.id) as getTotalIngredients');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
}
