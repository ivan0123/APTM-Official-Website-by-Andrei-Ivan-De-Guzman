<?php namespace App\Models;

use CodeIgniter\Model;

class MeetingAttendeeModel extends Model 
{
    protected $table = 'tbl_meeting_attendees';
    protected $primaryKey = 'ma_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'ma_datetime',
        'ma_meeting_id',
        'ma_member_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();
        $attendeeModel = new MeetingAttendeeModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
			$data = $attendeeModel->orderBy('ma_id', 'DESC')->findAll();
            return $data;
		}else{
			return false;
		}
	}
}


?>