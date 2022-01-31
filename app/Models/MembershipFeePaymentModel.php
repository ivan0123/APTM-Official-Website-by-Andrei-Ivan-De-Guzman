<?php namespace App\Models;

use CodeIgniter\Model;

class MembershipFeePaymentModel extends Model 
{
    protected $table = 'tbl_membership_fee_payment';
    protected $primaryKey = 't_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        't_paypal_id',
        't_paypal_payer_fname',
        't_paypal_payer_lname',
        't_paypal_payer_email',
        't_paypal_payer_id',
        't_paypal_currency',
        't_paypal_amount',
        't_paypal_payee_email',
        't_paypal_payee_merchant_id',
        't_paypal_reference_id',
        't_paypal_status',
        't_paypal_date',
        't_payer_aptm_member_id'
    ];

    // public function fetchdata(){
	// 	$session = \Config\Services::session();

	// 	// if theres a user logged in to the site fetch all data
	// 	if($session->get('l_id')){

	// 		// ANNOUNCEMENT COMMENT DATA
    //             $annComModel = new AnnComModel();
    //             $data = $annComModel->orderBy('ann_com_id', 'DESC')->findAll();
    //         // x

    //         return $data;
	// 	}else{
	// 		return false;
	// 	}
	// }
}


?>