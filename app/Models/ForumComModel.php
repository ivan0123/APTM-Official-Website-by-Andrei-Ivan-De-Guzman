<?php namespace App\Models;

use CodeIgniter\Model;

class ForumComModel extends Model 
{
    protected $table = 'tbl_forum_comment';
    protected $primaryKey = 'forum_com_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'forum_com_content',
        'forum_com_time_created',
        'forum_com_time_updated',
        'forum_com_creator_id',
        'forum_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){

			// ANNOUNCEMENT COMMENT DATA
                $forumComModel = new ForumComModel();
                $data = $forumComModel->orderBy('forum_com_id', 'DESC')->findAll();
            // x

            return $data;
		}else{
			return false;
		}
	}

}
?>