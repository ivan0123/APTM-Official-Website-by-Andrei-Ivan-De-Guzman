<?php namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model 
{
    protected $table = 'tbl_user_log_history';
    protected $primaryKey = 'log_id';
    protected $allowedFields = [
        'log_creator_name',
        'log_creator_profile',
        'log_creator_type',
        'log_activity',
        'log_time_created',
        'log_creator_id'
        
    ];

    public function fetch_data_per_type($type){
		$session = \Config\Services::session();
        $logModel = new LogModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $data = $logModel->where('log_creator_type' , $type)
                                             ->orderBy('log_id', 'DESC')
                                             ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}

}

?>