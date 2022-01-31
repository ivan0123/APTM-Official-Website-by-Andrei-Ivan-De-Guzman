<?php namespace App\Models;

use CodeIgniter\Model;

class NewsComModel extends Model 
{
    protected $table = 'tbl_news_comment';
    protected $primaryKey = 'news_com_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'news_com_content',
        'news_com_time_created',
        'news_com_time_updated',
        'news_com_creator_id',
        'news_id'
    ];

    public function fetchData(){
		$session = \Config\Services::session();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            
			$newsComModel = new NewsComModel();
			$data = $newsComModel->orderBy('news_com_id', 'DESC')->findAll();

            return $data;
		}else{
			return false;
		}
	}

}


?>