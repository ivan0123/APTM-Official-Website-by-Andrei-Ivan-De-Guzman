<?php namespace App\Models;

use CodeIgniter\Model;

class NotifModel extends Model 
{
    protected $table = 'tbl_user_notif';
    protected $primaryKey = 'notif_id';
    protected $allowedFields = [
        'notif_content',
        'notif_link',
        'notif_data_id',
        'notif_division',
        'notif_for_who',
        'notif_status',
        'notif_time_created',
        'notif_creator_id',
        'notif_creator_name',
        'notif_creator_pic',
        'notif_creator_type',
        'notif_creator_division'
    ];

    public function countNotSeen(){
        $session = \Config\Services::session();
		$user_id = $session->get('l_id');
		
		// fetch all notif data from db
		$notifModel = new NotifModel();

		if($session->get('l_type') == 'admin'){
			$where = "notif_for_who='admin' AND notif_creator_id!='$user_id' AND notif_status='not seen' OR notif_for_who='all'";
			$data = $notifModel->orderBy('notif_id', 'DESC')
								->where($where)
								->findAll();
			// x

			return count($data);
		}elseif($session->get('l_type') == 'member' OR $session->get('l_type') == 'treasurer'){
			$where = "notif_for_who='member' AND notif_creator_id!='$user_id' AND notif_status='not seen' OR notif_for_who='all'";
			$data = $notifModel->orderBy('notif_id', 'DESC')
								->where($where)
								->findAll();
			// x

			return count($data);
		}
    }

}

?>