<?php namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model 
{
    protected $table = 'tbl_chat';
    protected $primaryKey = 'chat_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'chat_content',
        'chat_time_created',
        'chat_sender_id',
        'chat_receiver_id',
        'chat_status'
    ];

    public function fetchAllMessage(){
		$session = \Config\Services::session();
        // $builder = \Config\Builders::

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
                $chatModel = new ChatModel();
                $user_id = $session->get('l_id');

                $where = "chat_sender_id='$user_id' OR chat_receiver_id='$user_id'";
                $data = $chatModel->where($where)->orderBy('chat_id', 'DESC')->findAll();
            return $data;
		}else{
			return false;
		}
	}

}


?>