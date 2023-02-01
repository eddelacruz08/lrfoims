<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use Modules\UserManagement\Models as UserManagement;
use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\ReservationManagement\Models as ReservationManagement;

class SendMail extends Controller
{
    function __construct(){
        $this->email = \Config\Services::email();
        $this->usersModel = new UserManagement\UsersModel();
    }

    public function sendMail($to, $subject, $message) { 
        $this->email->setTo($to);
        $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');
        
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        if($this->email->send()){
            return $this->email->printDebugger(['headers']);
            // return "Email sent!";
        }else{
            return $this->email->printDebugger(['headers']);
        }
    }

}