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
        $this->select('lrfoims_notifications.name, lrfoims_notifications.description, lrfoims_notifications.link, 
            lrfoims_notifications.notif_date_status, lrfoims_notifications.status, lrfoims_notifications.created_at, 
            lrfoims_notifications.id');
        $this->orderBy('lrfoims_notifications.id', 'DESC');

        return $this->findAll(15);
    }

}
