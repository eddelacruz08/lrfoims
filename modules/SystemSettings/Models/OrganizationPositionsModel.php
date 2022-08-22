<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrganizationPositionsModel extends BaseModel
{
    protected $table = 'frbs_organization_positions';
    protected $allowedFields = [
        'position', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
