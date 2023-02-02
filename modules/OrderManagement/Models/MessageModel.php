<?php namespace Modules\OrderManagement\Models;

use App\Models\BaseModel;

class MessageModel extends BaseModel
{
    protected $table = 'lrfoims_user_messages';
    protected $allowedFields = [
        'order_id',
        'user_id',
        'username',
        'message',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('lrfoims_user_messages.*, u.username, u.first_name, u.last_name');
        $this->join('lrfoims_users as u', 'u.id = lrfoims_user_messages.user_id');
        $this->join('lrfoims_orders as o', 'o.id = lrfoims_orders.order_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('lrfoims_user_messages.id','DESC');

        return $this->findAll();
    }
}
