<?php namespace Modules\ReservationManagement\Models;

use App\Models\BaseModel;

class FacilityMaintenancesModel extends BaseModel
{
    protected $table = 'frbs_facility_maintenances';
    protected $allowedFields = [
        'facility_id',
        'maintenance_date',
        'scheduled_starting_time',
        'scheduled_end_time',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){

        $this->select('frbs_facility_maintenances.*, f.facility_name,');
        $this->join('frbs_facilities as f', 'f.id = frbs_facility_maintenances.facility_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
}
