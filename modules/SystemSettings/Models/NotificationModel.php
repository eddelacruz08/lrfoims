<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class NotificationModel extends BaseModel
{
    protected $table = 'lrfoims_notifications';
    protected $allowedFields = [
        'user_id',
        'name',
        'description',
        'link',
        'notif_date_status',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getNotifications(){
        $this->select('lrfoims_notifications.*');
        $this->where('status', 'a');
        $this->orderBy('id', 'DESC');
        $this->limit(10);

        return $this->findAll();
    }

}
