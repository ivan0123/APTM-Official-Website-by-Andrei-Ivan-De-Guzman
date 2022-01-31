<?php namespace App\Models;

use CodeIgniter\Model;

class AnnComModel extends Model 
{
    protected $table = 'tbl_announcement_comment';
    protected $primaryKey = 'ann_com_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'ann_com_content',
        'ann_com_time_created',
        'ann_com_time_updated',
        'ann_com_creator_id',
        'ann_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){

			// ANNOUNCEMENT COMMENT DATA
                $annComModel = new AnnComModel();
                $data = $annComModel->orderBy('ann_com_id', 'DESC')->findAll();
            // x

            return $data;
		}else{
			return false;
		}
	}

}


?>