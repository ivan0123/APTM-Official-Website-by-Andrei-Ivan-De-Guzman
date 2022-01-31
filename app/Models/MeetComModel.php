<?php namespace App\Models;

use CodeIgniter\Model;

class MeetComModel extends Model 
{
    protected $table = 'tbl_meetings_comment';
    protected $primaryKey = 'meet_com_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'meet_com_content',
        'meet_com_time_created',
        'meet_com_time_updated',
        'meet_com_creator_id',
        'meet_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){

			// ANNOUNCEMENT COMMENT DATA
                $meetComModel = new MeetComModel();
                $data = $meetComModel->orderBy('meet_com_id', 'DESC')->findAll();
            // x

            return $data;
		}else{
			return false;
		}
	}

}


?>