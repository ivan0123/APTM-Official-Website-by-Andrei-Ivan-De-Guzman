<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model 
{
    protected $table = 'tbl_news';
    protected $primaryKey = 'news_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'news_title',
        'news_content',
        'news_image',
        'news_category',
        'news_division',
        'news_status',
        'news_comment_num',
        'news_time_created',
        'news_time_updated',
        'news_creator_id'
    ];

    public function fetchdata(){
		$session = \Config\Services::session();
        $newsModel = new NewsModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            
            $m_division = $session->get('l_division');

            if($session->get('l_type') == 'admin'){
                // fetch all news data from db
                    $data = $newsModel->orderBy('news_id', 'DESC')->findAll();
                // x
                return $data;
            }else{
                // fetch all news data from db
                    $where = "news_division='All Division' OR news_division='$m_division'";
                    $data = $newsModel->where($where)->orderBy('news_id', 'DESC')->findAll();
                // x
                return $data;
            }
		}else{
			return false;
		}
	}

    public function fetchLatestNews(){
		$session = \Config\Services::session();
		
		$m_division = $session->get('l_division');

		// for latest news widget - fetch all news data from db 
		$newsModel = new NewsModel();
		$where = "news_division='All Division' OR news_division='$m_division'";
		$data = $newsModel
							->where($where)
							->orderBy('news_id', 'DESC')
							->limit(3)
							->findAll();
		// x

        return $data;
	}

    public function fetch_data_per_division($division){
		$session = \Config\Services::session();
        $newsModel = new NewsModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $data = $newsModel->where('news_division' , $division)
                                             ->orderBy('news_id', 'DESC')
                                             ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}
}


?>