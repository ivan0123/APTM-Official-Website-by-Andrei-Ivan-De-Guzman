<?php namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model 
{
    protected $table = 'tbl_forum';
    protected $primaryKey = 'forum_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'forum_content',
        'forum_category',
        'forum_division',
        'forum_status',
        'forum_comment_num',
        'forum_time_created',
        'forum_time_updated',
        'forum_creator_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();
        $forumModel = new ForumModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $m_division = $session->get('l_division');

            if($session->get('l_type') == 'admin'){
                // FORUM DATA FOR ALL DIVISION
                    $data = $forumModel->orderBy('forum_id', 'DESC')->findAll();
                // x

                return $data;
            }else{
                // FORUM DATA FOR ALL DIVISION MEMBERS
                    $where = "forum_division='All Division' OR forum_division='$m_division'";
                    $data = $forumModel->where($where)->orderBy('forum_id', 'DESC')->findAll();
                // x

                return $data;
            }
		}else{
			return false;
		}
	}

    public function fetch_data_per_division($division){
		$session = \Config\Services::session();
        $forumModel = new ForumModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $data = $forumModel->where('forum_division' , $division)
                                             ->orderBy('forum_id', 'DESC')
                                             ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}
}


?>