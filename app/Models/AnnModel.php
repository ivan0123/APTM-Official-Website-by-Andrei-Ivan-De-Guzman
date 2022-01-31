<?php namespace App\Models;

use CodeIgniter\Model;

class AnnModel extends Model 
{
    protected $table = 'tbl_announcement';
    protected $primaryKey = 'ann_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'ann_content_who',
        'ann_content_when_date',
        'ann_content_where',
        'ann_content_what',
        'ann_image',
        'ann_division',
        'ann_status',
        'ann_comment_num',
        'ann_time_created',
        'ann_time_updated',
        'ann_creator_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();
        $annModel = new AnnModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $m_division = $session->get('l_division');

            if($session->get('l_type') == 'admin'){
                // ANNOUNCEMENT DATA
                    $data = $annModel->orderBy('ann_id', 'DESC')->findAll();
                // x

                return $data;
            }else{
                // if the user logged in is member
                // ANNOUNCEMENT DATA
                    $where = "ann_division='All Divisions' OR ann_division='$m_division'";
                    $data = $annModel->where($where)->orderBy('ann_id', 'DESC')->findAll();
                // x

                return $data;
            }
		}else{
			return false;
		}
	}

    public function fetch_data_per_division($division){
		$session = \Config\Services::session();
        $annModel = new AnnModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $data = $annModel->where('ann_division' , $division)
                                             ->orderBy('ann_id', 'DESC')
                                             ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}

}


?>