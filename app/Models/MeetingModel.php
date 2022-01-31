<?php namespace App\Models;

use CodeIgniter\Model;

class MeetingModel extends Model 
{
    protected $table = 'tbl_meetings';
    protected $primaryKey = 'meet_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'meet_zoom_id',
        'meet_title',
        'meet_content_who',
        'meet_content_where',
        'meet_content_what',
        'meet_division',
        'meet_duration',
        'meet_image',
        'meet_link',
        'meet_password',
        'meet_status',
        'meet_room_status',
        'meet_time_started',
        'meet_time_created',
        'meet_time_updated',
        'meet_comment_num',
        'meet_creator_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();
        $meetingModel = new MeetingModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $m_division = $session->get('l_division');

            if($session->get('l_type') == 'admin'){
                // MEETING DATA FOR ALL DIVISION
				$data = $meetingModel->orderBy('meet_id', 'DESC')->findAll();

                return $data;
            }else{
                // MEETING DATA FOR MEMBERS DIVISION
				$where = "meet_division='All Divisions' OR meet_division='$m_division'";
				$data = $meetingModel->where($where)->orderBy('meet_id', 'DESC')->findAll();

                return $data;
            }
		}else{
			return false;
		}
	}

    public function fetch_data_per_app($app){
		$session = \Config\Services::session();
        $meetModel = new MeetingModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $data = $meetModel->where('meet_content_where' , $app)
                                             ->orderBy('meet_id', 'DESC')
                                             ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}

}


?>