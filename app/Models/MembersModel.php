<?php namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model 
{
    protected $table = 'tbl_member';
    protected $primaryKey = 'm_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'm_gmail_oauth_id',
        'm_password',
        'm_code',
        'm_fname',
        'm_mname',
        'm_lname',
        'm_email',
        'm_profile_pic',
        'm_age',
        'm_gender',
        'm_street',
        'm_town',
        'm_province',
        'm_position',
        'm_school',
        'm_division',
        'm_join_date',
        'm_membership_fee',
        'm_prc_id',
        'm_status',
        'm_type',
        'm_created_time',
        'm_updated_time'
    ];

//  GMAIL SIGN IN
    function isAlreadyRegister($authid){
        //return $this->db->table('tbl_member')->getWhere(['m_gmail_oauth_id'=>$authid])->getRowArray()>0?true:false;
        $membersModel = new MembersModel();
        $data = $membersModel->where(['m_gmail_oauth_id'=>$authid])->orderBy('m_id', 'DESC')->findAll();
        return $data;
    }
    
    // in second time login find a match for oauth id and email to get inside the site
    public function second_time_login($oauth_id, $email){
        $membersModel = new MembersModel();
        $where = "m_gmail_oauth_id='$oauth_id' AND m_email='$email'";
        $data = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
        return $data;
    }
// x

    public function fetchdata(){
		$session = \Config\Services::session();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
			$m_division = $session->get('l_division');

			// MEMBER DATA
                $membersModel = new MembersModel();
                $data = $membersModel->orderBy('m_id', 'DESC')->findAll();
            // x

            return $data;
		}else{
			return false;
		}
	}

    public function fetch_data_search($query){
        $membersModel = new MembersModel();

		// if theres a user logged in to the site fetch all data
		if($query != ''){
            $data = $membersModel->like('m_fname', $query, 'after')
                                 ->orderBy('m_id', 'DESC')
                                 ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}

    public function fetch_data_per_division($division){
        $session = \Config\Services::session();
        $membersModel = new MembersModel();

		// if theres a user logged in to the site fetch all data
		if($session->get('l_id')){
            $data = $membersModel->where('m_division' , $division)
                                             ->orderBy('m_id', 'DESC')
                                             ->findAll();
            return $data;                            
		}else{
			return false;
		}
	}
}
?>