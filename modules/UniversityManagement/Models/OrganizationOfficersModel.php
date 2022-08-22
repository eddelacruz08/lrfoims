<?php namespace Modules\UniversityManagement\Models;

use App\Models\BaseModel;

class OrganizationOfficersModel extends BaseModel
{
    protected $table = 'frbs_organization_officers';
    protected $allowedFields = [
        'student_id', 
        'org_position_id', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getDetails($conditions = []){

        $this->select('frbs_organization_officers.id as \'officer_id\', frbs_organizations.id, frbs_organization_officers.org_position_id, frbs_organization_officers.student_id,  frbs_students.first_name, frbs_students.last_name, frbs_organizations.organization_name, frbs_organization_positions.position');
        $this->join('frbs_students', 'frbs_organization_officers.student_id = frbs_students.id');
        $this->join('frbs_organizations', 'frbs_organizations.id = frbs_students.organization_id');
        $this->join('frbs_organization_positions', 'frbs_organization_officers.org_position_id = frbs_organization_positions.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    public function getOrgData(){
        $this->select('count(id) as org');
        return $this->findAll();
    }
}
