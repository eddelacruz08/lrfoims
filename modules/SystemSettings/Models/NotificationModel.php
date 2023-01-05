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

}
