<?php namespace App\Controllers;

use CodeIgniter\Controller;

// models
use App\Models\AnnModel;
use App\Models\AnnComModel;
use App\Models\NewsModel;
use App\Models\NewsComModel;
use App\Models\ForumModel;
use App\Models\ForumComModel;
use App\Models\MeetingModel;
use App\Models\MeetComModel;
use App\Models\MembersModel;
use App\Models\LogModel;
use App\Models\NotifModel;
use App\Models\ChatModel;
use App\Models\MeetingAttendeeModel;
use App\Models\MembershipFeePaymentModel;

use DOMDocument;

// for PHPMAILER
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';

// require '../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class AptmController extends BaseController
{
	private $googleCLient = NULL;

	// GOOGLE API
	// APP NAME - APTM Official Website
	// CLIENT ID - 29967513786-rfd3o37u51kmk8m1u05rog09gkpcp883.apps.googleusercontent.com
	// CLIENT SECRET - pfirwZ7yJxCStS_h7WxzXXx1

	public function __construct(){
		require_once APPPATH.("Libraries/vendor/autoload.php");
		$this->googleCLient = new \Google_Client();
		$this->googleCLient->setClientId("29967513786-rfd3o37u51kmk8m1u05rog09gkpcp883.apps.googleusercontent.com");
		$this->googleCLient->setClientSecret("pfirwZ7yJxCStS_h7WxzXXx1");
		$this->googleCLient->setRedirectUri("https://aptm.online/AptmController/gmail_signup");
		$this->googleCLient->addScope("email");
		$this->googleCLient->addScope("profile");
	}

// ----------------------------------------------------------------------------------------------

// VIEW PAGES METHODS
	public function index()
	{
		// create btn for gmail sign up
		$data['btn_g_signup'] = $this->googleCLient->createAuthUrl();

		// fetch 3 latest news data 
		$newsModel = new NewsModel();
		$data['latest_news_data'] = $newsModel->fetchLatestNews();

  		return view('landing_page', $data);
	}

	public function view_after_gmail_signup(){
		return view('after_gmail_signup');
	}

	public function view_signup() {
		return view('sign_up');
	}

	public function view_register() {
		return view('register');
	}

	public function view_registerSuccess() {
		return view('registerSuccess');
	}
	
	public function view_paypal_payment() {
		return view('paypal_payment');
	}

	public function view_logout() {
		return view('logout');
	}

	public function view_home() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = ['meta_title' => 'Home'];

			// for counts widget
				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				// members count
				$membersModel = new MembersModel();
				$data['members_count'] = count($membersModel->fetchdata());
				// x

				// news count
				$newsModel = new NewsModel();
				$data['news_count'] = count($newsModel->fetchdata());
				// x

				$newsModel = new NewsModel();
				$data['latest_news_data'] = $newsModel->fetchLatestNews();


				// meetings count
				$meetModel = new MeetingModel();
				$data['meetings_count'] = count($meetModel->fetchdata());
				// x

				// forums count
				$forumModel = new ForumModel();
				$data['forums_count'] = count($forumModel->fetchdata());
				// x
			// xx

			return view('pages/home', $data);
		}else{
			return $this->index();
		}
	}

	public function view_announcement() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Announcement',
				'b_title' => 'Announcements',
				'b_descrip' => 'Association of Professional Teachers
				in Mimaropa (APTM) Official Website is an informative website that 
				aids the members of the association to be updated in the latest memorandum 
				and orders from DEPED.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_ideas_flow_cy7b.svg'
			];

			$annModel = new AnnModel();
			$data['ann_data'] = $annModel->fetchdata();
	
			$annComModel = new AnnComModel();
			$data['ann_com_data'] = $annComModel->fetchdata();
		
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/announcement', $data);
		}else{
			return $this->index();
		}
	}

	public function view_news() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'News',
				'b_title' => 'News',
				'b_descrip' => 'Association of Professional Teacehrs
				in Mimaropa (APTM) Official Website is an informative website that 
				aids the members of the association to be updated in the latest memorandum 
				and orders from DEPED.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_newspaper_k72w.svg'
			];

			$newsModel = new NewsModel();
			$data['news_data'] = $newsModel->fetchdata();
	
			$newsComModel = new NewsComModel();
			$data['news_com_data'] = $newsComModel->fetchdata();
		
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/news', $data);
			
		}else{
			return $this->index();
		}
	}

	public function view_forum() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Forum',
				'b_title' => 'Forum',
				'b_descrip' => 'Association of Professional Teacehrs
				in Mimaropa (APTM) Official Website is an informative website that 
				aids the members of the association to be updated in the latest memorandum 
				and orders from DEPED.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_online_discussion_5wgl.svg'
			];

			$forumModel = new ForumModel();
			$data['forum_data'] = $forumModel->fetchdata();
	
			$forumComModel = new ForumComModel();
			$data['forum_com_data'] = $forumComModel->fetchdata();
		
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/forum', $data);
		}else{
			return $this->index();
		}
	}

	public function view_treasurerTask() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Treasurers Task',
				'b_title' => 'Treasurers Task',
				'b_descrip' => 'It\'s your task to mark the 
					member accounts if they were paid or not. All Member\'s account 
					can\'t login to our website if they we\'re unpaid for Membership Fee.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_pay_online_b1hk.svg'
			];
			
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->where('m_division' , $session->get('l_division'))->orderBy('m_id', 'DESC')->findAll();
			
			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x
			
			return view('pages/treasurerTask', $data);
		}else{
			return $this->index();
		}
	}


	public function view_zoom() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'APTM Zoom Meetings',
				'b_title' => 'APTM Zoom Meetings',
				'b_descrip' => 'Join webinars, meetings and discussions using Zoom API,
					To join zoom meetings the members should login their zoom account on Zoom App.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_Video_call_re_4p26.svg'
			];
			
			$meetModel = new MeetingModel();
			$data['meet_data'] = $meetModel->fetchdata();
	
			$meetComModel = new MeetComModel();
			$data['meet_com_data'] = $meetComModel->fetchdata();
		
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/zoom', $data);
		}else{
			return $this->index();
		}
	}

	public function view_jitsiMeet() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'APTM Jitsi Meetings',
				'b_title' => 'APTM Jitsi Meetings',
				'b_descrip' => 'Join webinars, meetings and discussions using Jitsi API,
					Jitsi is a collection of Open Source projects which provide state-of-the-art 
					video conferencing capabilities that are secure, easy to use and easy to self-host.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_video_call_kxyp.svg'
			];
			
			$meetModel = new MeetingModel();
			$data['meet_data'] = $meetModel->fetchdata();
	
			$meetComModel = new MeetComModel();
			$data['meet_com_data'] = $meetComModel->fetchdata();
		
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/jitsiMeet', $data);
		}else{
			return $this->index();
		}
	}


	public function view_profile() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'My Account',
				'b_title' => 'Account Information',
				'b_descrip' => 'Your account information was displayed, you can edit your information 
					change password and profile picture.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_ideas_flow_cy7b.svg'
			];

			// fetch all notif data from db
			$notifModel = new NotifModel();
	
			$where_notif = ['notif_creator_id' => $session->get('l_id')];
			$data['notif_data'] = $notifModel->orderBy('notif_id', 'DESC')
								->where($where_notif)
								->findAll();
			// x

			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			$membersModel = new MembersModel();
			$where_member = ['m_id' => $session->get('l_id')];
			$data['m_data'] = $membersModel->where($where_member)->findAll();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/profile', $data);

			
		}else{
			return $this->index();
		}
	}

	public function view_depedOrders() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Deped Recent Orders',
				'b_title' => 'Deped Recent Orders',
				'b_descrip' => 'The latest Orders published on DepEd 
							Website was displayed in this page. Please be reminded that 
							once you click the read button, this page will take you 
							to that order in DepEd Website, to see the released order.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_public_discussion_btnw.svg'
			];
			
			// web scrapping
			// scrape data from deped.gov.ph 
			// fetch order title and link
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.deped.gov.ph");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$html = curl_exec($ch);

			$dom = new DOMDocument();
			@ $dom->loadHTML($html);

			$ul = $dom->getElementById('lcp_instance_listcategorypostswidget-2');
			$a = $ul->getElementsByTagName('a');

			$data['order_data'] = $a;

			// x

			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/depedOrders', $data);
		}else{
			return $this->index();
		}
	}

	public function view_depedMemo() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Deped Recent Memoranda',
				'b_title' => 'Deped Recent Memoranda',
				'b_descrip' => 'The latest Memoranda published on DepEd 
							Website was displayed in this page. Please be reminded that 
							once you click the read button, this page will take you 
							to that order in DepEd Website, to see the released Memoranda.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_annotation_7das.svg'
			];
			
			// web scrapping
			// scrape data from deped.gov.ph 
			// fetch order title and link
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.deped.gov.ph");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$html = curl_exec($ch);

			$dom = new DOMDocument();
			@ $dom->loadHTML($html);

			$ul = $dom->getElementById('lcp_instance_listcategorypostswidget-3');
			$a = $ul->getElementsByTagName('a');

			$data['memo_data'] = $a;

			// x
			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('pages/depedMemo', $data);
		}else{
			return $this->index();
		}
	}

	public function view_chatRoom() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Chat Room',
				'b_title' => 'Chat Room',
				'b_descrip' => 'Search your co-members name and send messages, 
							if your co-member message you for the first time, 
							you must accept his message request to continue recieving messages from him.
							You can accept or denied message request, it\'s up to you.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_annotation_7das.svg'
			];
			
			// x
			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			$chatModel = new ChatModel();
			$data['chat_data'] = $chatModel->fetchAllMessage();

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// for displaying members to chat
			$m_division = $session->get('l_division');
			$l_user_id = $session->get('l_id');
			// for displaying members to chat
			
			if($session->get('l_type') == 'admin'){
				$where = "m_id!='$l_user_id'";
				$data['m_data_per_d'] = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
			
				$data['click_stat'] = 0;

				$where_c = "chat_sender_id='$l_user_id' OR chat_receiver_id='$l_user_id'";
				$data['c_data'] = $chatModel->where($where_c)->orderBy('chat_id', 'DESC')->findAll();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/chatroom', $data);
			}else{
				$where = "m_division='$m_division' AND m_id!='$l_user_id'";
				$data['m_data_per_d'] = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
			
				$data['click_stat'] = 0;

				$where_c = "chat_sender_id='$l_user_id' OR chat_receiver_id='$l_user_id'";
				$data['c_data'] = $chatModel->where($where_c)->orderBy('chat_id', 'DESC')->findAll();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/chatroom', $data);
			}
			
			// x

		}else{
			return $this->index();
		}
	}

	public function view_notif() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Notifications',
				'b_title' => 'Notifications',
			];

			// fetch all notif data from db
			$notifModel = new NotifModel();
			$user_id = $session->get('l_id');

			if($session->get('l_type') == 'admin'){
				$where = "notif_for_who='admin' AND notif_creator_id!='$user_id' OR notif_for_who='all'";
				$data['notif_data'] = $notifModel->orderBy('notif_id', 'DESC')
									->where($where)
									->findAll();
				// x

				$newsModel = new NewsModel();
				$data['latest_news_data'] = $newsModel->fetchLatestNews();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/notification', $data);

			}elseif($session->get('l_type') == 'member' OR $session->get('l_type') == 'treasurer'){
				$where = "notif_for_who='member' AND notif_creator_id!='$user_id' OR notif_for_who='all'";
				$data['notif_data'] = $notifModel->orderBy('notif_id', 'DESC')
									->where($where)
									->findAll();
				// x

				$newsModel = new NewsModel();
				$data['latest_news_data'] = $newsModel->fetchLatestNews();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/notification', $data);
			}
		}else{
			return $this->index();
		}
	}

// x

// SESSION METHODS 
	// ALERT SESSION
	public function alert_session($msg_content, $msg_head, $msg_type){
		$session = \Config\Services::session();
		$session->setFlashdata('msg_status', $msg_content);
		$session->setFlashdata('msg_head',$msg_head);
		$session->setFlashdata('msg_type', $msg_type);
	}

// x

// SAVE LOG USER HISTORY

	// use this function if there was session active yet from member login
	public function record_log_with_session($log_activity){
		// record the registration to tbl_user_log_history
		$logModel = new LogModel();
		$session = \Config\Services::session();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$log = [
			'log_creator_name' => $session->get('l_fname').' '.$session->get('l_lname'),
			'log_creator_profile' => $session->get('l_profile_pic'),
			'log_creator_type' => $session->get('l_type'),
			'log_activity' => $log_activity,
			'log_time_created' => $date_now,
			'log_creator_id' => $session->get('l_id')
		];

		$logModel->insert(esc($log));
	}

	// insert the log activity
	// use this function if there is no session active yet 
	// $c_name, $c_profle, $c_type, $activity, $c_id
	public function record_log_no_session($c_name, $c_profle, $c_type, $activity, $c_id){
		// record the registration to tbl_user_log_history
		$logModel = new LogModel();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$log = [
			'log_creator_name' => $c_name,
			'log_creator_profile' => $c_profle,
			'log_creator_type' => $c_type,
			'log_activity' => $activity,
			'log_time_created' => $date_now,
			'log_creator_id' => $c_id
		];

		$logModel->insert(esc($log));
	}

// x

// SAVE NOTIF FOR NEW ACTIVITY 

	public function save_notif($notif_activity, $notif_link, $notif_division, $notif_for_who, $data_id){
		// record the registration to tbl_user_log_history
		$notifModel = new NotifModel();
		$session = \Config\Services::session();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$notif = [
			'notif_content' => $notif_activity,
			'notif_link' => $notif_link,
			'notif_division' => $notif_division,
			'notif_for_who' => $notif_for_who,
			'notif_time_created' => $date_now,
			'notif_creator_id' => $session->get('l_id'),
			'notif_creator_name' => $session->get('l_fname').' '.$session->get('l_lname'),
			'notif_creator_pic' => $session->get('l_profile_pic'),
			'notif_creator_type' => $session->get('l_type'),
			'notif_creator_division' => $session->get('l_division'),
			'notif_data_id' => $data_id
		];

		$notifModel->insert(esc($notif));
	}

	public function save_notif_no_session($notif_activity,$notif_link,$notif_division,$notif_for_who,$c_id,$c_name){
		// record the registration to tbl_user_log_history
		$notifModel = new NotifModel();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$notif = [
			'notif_content' => $notif_activity,
			'notif_link' => $notif_link,
			'notif_division' => $notif_division,
			'notif_for_who' => $notif_for_who,
			'notif_time_created' => $date_now,
			'notif_creator_id' => $c_id,
			'notif_creator_name' => $c_name
		];

		$notifModel->insert(esc($notif));
	}



// 

// SEND EMAIL FUNCTION

	public function sendMail($sendTo, $subject, $message) { 
		$email = \Config\Services::email();

		$email->setTo($sendTo);
		$email->setFrom('aptmmimaropa@gmail.com', 'APTM Official Website');
		
		$email->setSubject($subject);
		$email->setMessage($message);

		if (!$email->send()){
			$this->alert_session(
				$email->printDebugger(['headers']),
				'Error!',
				'danger'
			);
		}
	}


// SEND EMAIL FOR CONTACT US

	// public function customer_send_email(){
	// 	helper(['form', 'url']);
	// 	$validation = \Config\Services::validation();
	// 	$session = \Config\Services::session();

	// 	// datetime
	// 	$timezone = "Asia/Manila";
	// 	date_default_timezone_set($timezone);
	// 	$date_now = date("h:i a  m, d, Y");

	// 	// post request
	// 	$request = service('request');
	// 	$postData = $request->getPost();

	// 	$error = $this->validate([
	// 		'txt_name' => [
	// 			'rules'  => 'required',
	// 			'errors' => [
	// 				'required' => 'You must input your Name.',
	// 			]
	// 		],
	// 		'txt_email' => [
	// 			'rules'  => 'required|valid_email',
	// 			'errors' => [
	// 				'required' => 'You must input your Email.',
	// 				'valid_email' => 'Your email is Invalid, please try another email.'
	// 			]
	// 		],
	// 		'txt_subject' => [
	// 			'rules'  => 'required',
	// 			'errors' => [
	// 				'required' => 'You must input your Subject.',
	// 			]
	// 		],
	// 		'txt_comment' => [
	// 			'rules'  => 'required',
	// 			'errors' => [
	// 				'required' => 'You must input your Message.',
	// 			]
	// 		],

	// 	]);
			
	// 	if(!$error)
	// 	{
	// 		$errorMsg1 = $validation->getError('txt_name');
	// 		$errorMsg2 = $validation->getError('txt_email');
	// 		$errorMsg3 = $validation->getError('txt_subject');
	// 		$errorMsg4 = $validation->getError('txt_comment');
	// 		$this->alert_session(
	// 			'<p>'.$errorMsg1.'</p>'.
	// 			'<p>'.$errorMsg2.'</p>'.
	// 			'<p>'.$errorMsg3.'</p>'.
	// 			'<p>'.$errorMsg4.'</p>', 
	// 			'Warning!',
	// 			'danger'
	// 		);
	// 		return $this->index();
	// 	}
	// 	else
	// 	{
	// 		$email = \Config\Services::email();

	// 		$email->setTo('aptmmimaropa@gmail.com', 'APTM Official Website');
	// 		$email->setFrom($postData['txt_email'], $postData['txt_name']);
	// 		$email->setSubject($postData['txt_subject']);
	// 		$email->setMessage($postData['txt_comment']);

	// 		if(!$email->send()){
	// 			$this->alert_session(
	// 				$email->printDebugger(['headers']),
	// 				'Something went wrong, please try again!',
	// 				'danger'
	// 			);
	// 			return $this->index();
	// 		}else{
	// 			// record log (initialize the record log method)
	// 			$this->record_log_no_session(
	// 				$postData['txt_name'], 
	// 				null, 
	// 				'Inquiry Message From User', 
	// 				$postData['txt_name'].' send message through an email: '.
	// 				$postData['txt_email'].' Message Content: '.
	// 				$postData['txt_comment'].' .', 
	// 				null
	// 			);
	// 			$this->alert_session(
	// 				'Your message has been sent to the email of our site! we will get back to you shortly.',
	// 				'Email Sent !',
	// 				'success'
	// 			);
	// 			return $this->index();
	// 		}
	// 	}
	// }

// 

// ----------------------------------------------------------------------------------------------

	// AUTHENTICATION 

// REGISTER NEW ACCOUNT REGULAR WAY

	public function register(){

		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txtFname' => [
				'rules'  => 'required|min_length[2]',
				'errors' => [
					'required' => 'You must input First Name.',
					'min_length' => 'Please input a valid First Name.'
				]
			],
			'txtAge' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input Age.'
				]
			],
			'txtTown' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Town Address.',
					'min_length' => 'Please input a valid Town Address.'
				]
			],
			'txtSchool' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input the name of School youre currently working at.',
					'min_length' => 'Please input a valid School Name.'
				]
			],
			'txtMname' => [
				'rules'  => 'required|min_length[2]',
				'errors' => [
					'required' => 'You must input Middle Name.',
					'min_length' => 'Please input a valid Middle Name, not initial.'
				]
			],
			'txtGender' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your Gender.'
				]
			],
			'txtProvince' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Province Address.',
					'min_length' => 'Please input a valid Province Address.'
				]
			],
			'txtDivision' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input APTM Division.',
					'min_length' => 'Please input a valid APTM Division.'
				]
			],
			'txtLname' => [
				'rules'  => 'required|min_length[2]',
				'errors' => [
					'required' => 'You must input Last Name.',
					'min_length' => 'Please input a valid Last Name.'
				]
			],
			'txtStreet' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Street Address.',
					'min_length' => 'Please input a valid Street Address.'
				]
			],
			'txtPosition' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Teacher Level.',
					'min_length' => 'Please input a valid Teacher Level.'
				]
			],
			'txtJoin' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input the Date when you join the APTM.'
				]
			],
			'txtEmail' => [
				'rules'  => 'required|valid_email',
				'errors' => [
					'required' => 'You must input Email.',
					'valid_email' => 'Your email is Invalid, please try another email.'
				]
			],
			'txtPassword' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your desired Password.'
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtFname');
			$errorMsg2 = $validation->getError('txtMname');
			$errorMsg3 = $validation->getError('txtLname');
			$errorMsg4 = $validation->getError('txtEmail');
			$errorMsg5 = $validation->getError('txtAge');
			$errorMsg6 = $validation->getError('txtGender');
			$errorMsg7 = $validation->getError('txtStreet');
			$errorMsg8 = $validation->getError('txtTown');
			$errorMsg9 = $validation->getError('txtProvince');
			$errorMsg10 = $validation->getError('txtPosition');
			$errorMsg11 = $validation->getError('txtSchool');
			$errorMsg12 = $validation->getError('txtDivision');
			$errorMsg13 = $validation->getError('txtJoin');
			$errorMsg14 = $validation->getError('txtPassword');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>'.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				'<p>'.$errorMsg7.'<p>'.'</p>'.$errorMsg8.'<p>'.'</p>'.$errorMsg9.'</p>'.
				'<p>'.$errorMsg10.'<p>'.'</p>'.$errorMsg11.'<p>'.'</p>'.$errorMsg12.'</p>'.
				'<p>'.$errorMsg13.'</p>'.'<p>'.$errorMsg14.'</p>',
				'Warning !',
				'danger'
			);
			return $this->view_register();
		}
		else
		{
			// if the email is gmail accept the registration
			if(strpos($postData['txtEmail'], '@gmail.com') == true){

				$membersModel = new MembersModel();

				//verify if there is an existing code in db 
				$m_email = $membersModel->where('m_email', esc($postData['txtEmail']))->findAll();

				// if there's no same email form db save the info
				if(count($m_email) > 0){
					$this->alert_session(
						'The Email you provided was already used by another member, make sure if this is your email!',
						'Email Address Already Used!',
						'danger'
						);
					return $this->view_register();
				}else{

					// UPLOAD IMAGE IF THERE IS NO ERROR
					if($_POST){
						$target_dir = "public/uploads/prc_id/";
						$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtProfile"]["name"]));
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						if(isset($_POST["btn_register"])) {
							$check = getimagesize($_FILES["txtProfile"]["tmp_name"]);
							if($check !== false) {
								$uploadOk = 1;
							} else {
								$this->alert_session(
									'File is not an image.',
									'Error!',
									'danger'
								);
								return $this->view_register();
								$uploadOk = 0;
							}
						}
						// Check if file already exists
						if (file_exists($target_file)) {
							$this->alert_session(
								'Sorry, this image already exists.',
								'Error!',
								'danger'
							);
							return $this->view_register();
							$uploadOk = 0;
						}
						// Check file size
						if ($_FILES["txtProfile"]["size"] > 500000) {
							$this->alert_session(
								'Sorry, your image file size is too large, please choose an image below 500KB.',
								'Error!',
								'danger'
							);
							return $this->view_register();
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
							$this->alert_session(
								'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
								'Error!',
								'danger'
							);
							return $this->view_register();
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							$this->alert_session(
								'Sorry, your PRC ID picture was not uploaded. Please try again.',
								'Error!',
								'danger'
							);
							return $this->view_register();
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["txtProfile"]["tmp_name"], $target_file)) {
								// insert the data
								$img_filename = basename( $_FILES["txtProfile"]["name"]);

								$encrypter = \Config\Services::encrypter();

								if($postData['txtGender'] == 'Male'){
									$sample_profile_pic = base_url().'/public/assets/images/aptm/undraw_male_avatar_323b.svg';
								}else{
									$sample_profile_pic = base_url().'/public/assets/images/aptm/undraw_female_avatar_w3jk.svg';
								}

								$data = [
									'm_fname' => $postData['txtFname'],
									'm_mname' => $postData['txtMname'],
									'm_lname' => $postData['txtLname'],
									'm_email' => $postData['txtEmail'],
									'm_age' => $postData['txtAge'],
									'm_gender' => $postData['txtGender'],
									'm_street' => $postData['txtStreet'],
									'm_town' => $postData['txtTown'],
									'm_province' => $postData['txtProvince'],
									'm_position' => $postData['txtPosition'],
									'm_school' => $postData['txtSchool'],
									'm_division' => $postData['txtDivision'],
									'm_join_date' => $postData['txtJoin'],
									'm_created_time' => $date_now,
									'm_password' => bin2hex($encrypter->encrypt($postData['txtPassword'])),
									'm_prc_id' => base_url().'/public/uploads/prc_id/'.$img_filename,
									'm_profile_pic' => $sample_profile_pic
								];

								## Insert
								if($membersModel->insert(esc($data))){
									$this->alert_session(
									'Your request to join the Association was Successful!',
									'Success !',
									'success'
									);

									if($postData['txtGender'] == 'Male'){
									
										$this->record_log_no_session(
											$postData['txtFname'].' '.$postData['txtLname'], 
											base_url().'/public/assets/images/aptm/undraw_male_avatar_323b.svg', 
											'requesting to join the APTM', 
											'Requested to join the Association and register his account.',
											NULL
										);

										// save the register request to notif tbl
										$this->save_notif_no_session(
											'Requested to join the Association and register his account 
											from '.$postData['txtDivision'].' Division.',
											'admin_pages/members',
											$postData['txtDivision'],
											'admin',
											NULL,
											$postData['txtFname'].' '.$postData['txtLname']
										);
									}else{
										$this->record_log_no_session(
											$postData['txtFname'].' '.$postData['txtLname'], 
											base_url().'/public/assets/images/aptm/undraw_male_avatar_323b.svg', 
											'requesting to join the APTM', 
											'Requested to join the Association and register her account.',
											NULL
										);

										// save the register request to notif tbl
										$this->save_notif_no_session(
											'Requested to join the Association and register her account 
											from '.$postData['txtDivision'].' Division.',
											'admin_pages/members',
											$postData['txtDivision'],
											'admin',
											NULL,
											$postData['txtFname'].' '.$postData['txtLname']
										);
									}

									// pass the user data to new session vars
									// this vars will be used to save and find who's the payer of membership fee

									// find the member that matches the name and email from the payer
									$membersModel = new MembersModel();

									$where = [
										'm_email' => $postData['txtEmail'],
										'm_fname' => $postData['txtFname'],
										'm_lname' => $postData['txtLname']
									];
									
									$m_data = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();

									if($m_data > 0){
										foreach($m_data as $m_datum){
											$session->setFlashdata('signed_up_m_id', $m_datum['m_id']);
											$session->setFlashdata('signed_up_fname', $m_datum['m_fname']);
											$session->setFlashdata('signed_up_lname', $m_datum['m_lname']);
											$session->setFlashdata('signed_up_email', $m_datum['m_email']);
										}
									}
									// x
									
									// send confirmation email to the user
									$this->sendMail(
										$postData['txtEmail'],
										'Account Registration Confirmation.',
										'Good Day '.$postData['txtFname'].' '.$postData['txtLname'].
										'. Thank you for your registration, your account is in verification process.
										Please wait for the Approval of the Administrator, it will be send to your email. 
										Once your account was verified and approved please pay for the Membership Fee, 
										to enable your account to log in to our website. This is our website link: www.aptm.online'
									);

									return $this->view_registerSuccess();
								}else{
									$this->alert_session(
									'Something went wrong, please try again!',
									'Warning !',
									'danger'
									);
								return $this->view_register();
								}

							} else {
								$this->alert_session(
									'Sorry, there was an error uploading your profile picture.',
									'Error !',
									'danger'
								);
								return $this->view_register();
							}
						}
					}
				}
			}else{
				// if email is not gmail, don't accept it
				$this->alert_session(
					'Please use Gmail email address, our site supports Gmail Accounts only!',
					'Warning !',
					'danger'
				);	
				return $this->view_register();
			}
		}
	}
// x

// LOGIN USING GMAIL ACCOUNT

	public function gmail_signup(){

		// if the member is already registered to site
		// update his data and logged in

		$session = \Config\Services::session();
		$membersModel = new MembersModel();

		$token = $this->googleCLient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
		$gClient = $this->googleCLient;
		if(!isset($token['error'])){

			$gClient->setAccessToken($token['access_token']);
			session()->set("AccessToken", $token['access_token']);
			$googleService = new \Google_Service_Oauth2($gClient);
			
			// pass the data from logged in gmail account
			$gmail_data = $googleService->userinfo->get();

			$date_now = date("h:i a  m/d/Y");
			// use this to test if the method is getting a userdata from gmail account
			//echo "<pre>"; print_r($data);die;

			// if the user is in 2nd time login using gmail account
			// find if theres a match in oauth id and email
			// update the members data
			// pass logged in user data to session vars
			
			$is_already_register = $membersModel->isAlreadyRegister($gmail_data['id']);

			if(count($is_already_register) > 0){

				$member_data_from_db = $membersModel->second_time_login($gmail_data['id'], $gmail_data['email']);
				
				if(count($member_data_from_db) > 0){
					
					foreach($member_data_from_db as $member_datum){
					
						if($member_datum['m_membership_fee'] == 'paid'){
						if($member_datum['m_status'] == 'approved'){

							//pass the userdata got from gmail account
							$memberdata = [
								'm_fname'=>$gmail_data['givenName'], 
								'm_lname'=>$gmail_data['familyName'],
								'm_email'=>$gmail_data['email'], 
								'm_profile_pic'=>$gmail_data['picture'], 
								'm_updated_time'=>$date_now
							];

							// update the members data on db
							if($membersModel->where(['m_gmail_oauth_id'=>$gmail_data['id']])->update($member_datum['m_id'], esc($memberdata))){

								// pass the userdata to session vars
								$session_signed_data['l_id'] = $member_datum['m_id'];
								$session_signed_data['l_fname'] = $gmail_data['givenName'];
								$session_signed_data['l_lname'] = $gmail_data['familyName'];
								$session_signed_data['l_profile_pic'] = $gmail_data['picture'];
								$session_signed_data['l_type'] = $member_datum['m_type'];
								$session_signed_data['l_division'] = $member_datum['m_division'];
								$session_signed_data['l_gender'] = $member_datum['m_gender'];
								$session->set($session_signed_data);

								if ($session->get('l_id')) {
										
									$this->alert_session(
										'Logged in successfully, using your Gmail account! 
										    (If you click the register button and you\'re account was logged in to our Website, it means that you\'re email was registered to one Member Account.)',
										'Success !',
										'success'
									);

									// record log (initialize the record log method)
									// $c_name, $c_profle, $c_type, $activity, $c_id
									$this->record_log_with_session(
										'Logged in his account successfully, using Gmail.'
									);

									// save notif 
									$this->save_notif(
										'Logged in his account successfully, using Gmail.',
										'admin_pages/activityLog',
										$session->get('l_division'),
										'admin',
										NULL
									);

									return $this->view_home();
								}else{
									$this->alert_session(
										'Failed to set the Session Data !',
										'Error !',
										'danger'
									);
									return $this->index();
								}
							}else{
								$this->alert_session(
									'Error on updating your Data !',
									'Error !',
									'danger'
								);
								return $this->index();
							}
						}else{
							// if account is still pending
							$this->alert_session(
								'Your Account with email '.$member_datum['m_email'].' 
									is not yet approved by the Administrator, 
									please wait for the Approval of your Account Registration, 
									we will send you an email once you\'re account registration was approved.',
								'Warning !',
								'danger'
							);

							// record log (initialize the record log method)
							$this->record_log_no_session(
								$member_datum['m_fname'].' '.$member_datum['m_lname'],
								$member_datum['m_profile_pic'],
								$member_datum['m_type'],
								'Logged in failed due not approved account.',
								$member_datum['m_id']
							);
							return $this->index();
						}
					}else{
						// if unpaid
						$this->alert_session(
							'Your Account with email '.$member_datum['m_email'].' 
								is not yet approved because you haven\'t paid for the Membership Fee.
								In case you\'ve already paid for the membership fee, please contact your APTM Division\'s 
								Treasurer to review your payment.',
							'Warning !',
							'warning'
						);

						// record log (initialize the record log method)
						$this->record_log_no_session(
							$member_datum['m_fname'].' '.$member_datum['m_lname'],
							$member_datum['m_profile_pic'],
							$member_datum['m_type'],
							'Logged in failed due to Unpaid Membership Fee.',
							$member_datum['m_id']
						);

						$session->setFlashdata('signed_up_m_id', $member_datum['m_id']);
						$session->setFlashdata('signed_up_fname', $member_datum['m_fname']);
						$session->setFlashdata('signed_up_lname', $member_datum['m_lname']);
						$session->setFlashdata('signed_up_email', $member_datum['m_email']);

						return $this->view_registerSuccess();
					}
				}
				}else{
					$this->alert_session(
						'Doesnt find your account !',
						'Error !',
						'danger'
					);
					return $this->index();
				}
			}else{
				// FOR NO ACCOUNT USER WANTS TO LOGIN USING GMAIL ACCOUNT
				
				$this->alert_session(
					'It seems like you don\'t have an account to our Website, please fill out all this field to create your account!',
					'Verification Complete !',
					'success'
				);

				$session->setFlashdata('gmail_oauth_id', $gmail_data['id']);
				$session->setFlashdata('gmail_fname', $gmail_data['givenName']);
				$session->setFlashdata('gmail_lname', $gmail_data['familyName']);
				$session->setFlashdata('gmail_email', $gmail_data['email']);
				$session->setFlashdata('gmail_profile_img', $gmail_data['picture']);

				return $this->view_after_gmail_signup();
			}
		}else{
			$this->alert_session(
				'Something went wrong, please try it again !',
				'Error !',
				'danger'
			);
			return $this->index();
		}
	}

// x



// SAVE REGISTER NEW ACCOUNT IF USER'S FIRST LOGIN USING GMAIL ACCOUNT - but still have to pay membership fee and approve his account

	public function register_account_gmail(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();
	
		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");
		$request = service('request');
		$postData = $request->getPost();
	
		$error = $this->validate([
			'txtAge' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your Age.'
				]
			],
			'txtTown' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input your Town Address.',
					'min_length' => 'Please input a valid Town Address.'
				]
			],
			'txtSchool' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input the name of School youre currently working at.',
					'min_length' => 'Please input a valid School Name.'
				]
			],
			'txtGender' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your Gender.'
				]
			],
			'txtProvince' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input your Province Address.',
					'min_length' => 'Please input a valid Province Address.'
				]
			],
			'txtDivision' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input your APTM Division.',
					'min_length' => 'Please input a valid APTM Division.'
				]
			],
			'txtStreet' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input your Street Address.',
					'min_length' => 'Please input a valid Street Address.'
				]
			],
			'txtPosition' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input your Position.',
					'min_length' => 'Please input a valid Position.'
				]
			],
			'txtJoin' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input the Date when you join the APTM.'
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtAge');
			$errorMsg2 = $validation->getError('txtGender');
			$errorMsg3 = $validation->getError('txtStreet');
			$errorMsg4 = $validation->getError('txtTown');
			$errorMsg5 = $validation->getError('txtProvince');
			$errorMsg6 = $validation->getError('txtPosition');
			$errorMsg7 = $validation->getError('txtSchool');
			$errorMsg8 = $validation->getError('txtDivision');
			$errorMsg9 = $validation->getError('txtJoin');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>'.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				'<p>'.$errorMsg7.'<p>'.'</p>'.$errorMsg8.'<p>'.'</p>'.$errorMsg9.'</p>',
				'Warning !',
				'danger'
			);

			return $this->view_after_gmail_signup();
		}
		else
		{
			$membersModel = new MembersModel();
	
			// UPLOAD IMAGE IF THERE IS NO ERROR
			if($_POST){
				$target_dir = "public/uploads/prc_id/";
				$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtPrc_ID"]["name"]));
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["btn_register"])) {
					$check = getimagesize($_FILES["txtPrc_ID"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						$this->alert_session(
							'File is not an image.',
							'Error!',
							'danger'
						);
						return $this->view_after_gmail_signup();
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					$this->alert_session(
						'Sorry, this image already exists.',
						'Error!',
						'danger'
					);
					return $this->view_after_gmail_signup();
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["txtPrc_ID"]["size"] > 500000) {
					$this->alert_session(
						'Sorry, your image file size is too large, please choose an image below 500KB file size.',
						'Error!',
						'danger'
					);
					return $this->view_after_gmail_signup();
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
					$this->alert_session(
						'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
						'Error!',
						'danger'
					);
					return $this->view_after_gmail_signup();
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$this->alert_session(
						'Sorry, your profile picture was not uploaded. Please try again.',
						'Error!',
						'danger'
					);
				return $this->view_after_gmail_signup();
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["txtPrc_ID"]["tmp_name"], $target_file)) {
						
						// insert the data
						$img_filename = basename( $_FILES["txtPrc_ID"]["name"]);
								
						$oauth_id = $session->getFlashdata('gmail_oauth_id');
						$fname = $session->getFlashdata('gmail_fname');
						$lname = $session->getFlashdata('gmail_lname');
						$email = $session->getFlashdata('gmail_email');
						$profile = $session->getFlashdata('gmail_profile_img');
	
						$encrypter = \Config\Services::encrypter();
	
							$data = [
								'm_gmail_oauth_id' => $oauth_id,
								'm_fname' => $fname,
								'm_lname' => $lname,
								'm_email' => $email,
								'm_age' => $postData['txtAge'],
								'm_gender' => $postData['txtGender'],
								'm_street' => $postData['txtStreet'],
								'm_town' => $postData['txtTown'],
								'm_province' => $postData['txtProvince'],
								'm_position' => $postData['txtPosition'],
								'm_school' => $postData['txtSchool'],
								'm_division' => $postData['txtDivision'],
								'm_join_date' => $postData['txtJoin'],
								'm_created_time' => $date_now,
								'm_prc_id' => base_url().'/public/uploads/prc_id/'.$img_filename,
								'm_profile_pic' => $profile
							];
	
							## Insert
							if($membersModel->insert(esc($data))){
								$this->alert_session(
								'Your request to join the Association was Successful!',
								'Success !',
								'success'
								);
	
								if($postData['txtGender'] == 'Male'){
								
									$this->record_log_no_session(
										$fname.' '.$lname, 
										base_url().'/public/assets/images/aptm/undraw_male_avatar_323b.svg', 
										'requesting to join the APTM', 
										'Requested to join the Association and register his account.',
										NULL
									);
	
									// save the register request to notif tbl
									$this->save_notif_no_session(
										$fname.' '.$lname.' requested to join the Association and register his account 
										from '.$postData['txtDivision'].' Division.',
										'admin_pages/members',
										$postData['txtDivision'],
										'admin',
										NULL,
										$fname.' '.$lname
									);
	
								}else{
									$this->record_log_no_session(
										$fname.' '.$lname, 
										base_url().'/public/assets/images/aptm/undraw_male_avatar_323b.svg', 
										'requesting to join the APTM', 
										'Requested to join the Association and register her account.',
										NULL
									);
	
									// save the register request to notif tbl
									$this->save_notif_no_session(
										$fname.' '.$lname.' requested to join the Association and register her account 
										from '.$postData['txtDivision'].' Division.',
										'admin_pages/members',
										$postData['txtDivision'],
										'admin',
										NULL,
										$fname.' '.$lname
									);
								}

								// pass the user data to new session vars
								// this vars will be used to save and find who's the payer of membership fee

								// find the member that matches the name and email from the payer
								$membersModel = new MembersModel();

								$where = [
									'm_email' => $email,
									'm_fname' => $fname,
									'm_lname' => $lname
								];
								
								$m_data = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();

								if($m_data > 0){
									foreach($m_data as $m_datum){
										$session->setFlashdata('signed_up_m_id', $m_datum['m_id']);
										$session->setFlashdata('signed_up_fname', $m_datum['m_fname']);
										$session->setFlashdata('signed_up_lname', $m_datum['m_lname']);
										$session->setFlashdata('signed_up_email', $m_datum['m_email']);
									}
								}
								// x

								// send confirmation email to the user
								$this->sendMail(
									$postData['txtEmail'],
									'Account Registration Confirmation.',
									'Good Day '.$fname.' '.$lname.
									'. Thank you for your registration, your account is in verification process.
									Please wait for the Approval of the Administrator, it will be send to your email. 
									Once your account was verified and approved please pay for the Membership Fee, 
									to enable your account to log in to our website. This is our website link: '
									. base_url().'/APTM/public/AptmController/index'
								);
								
								// destroy the session vars once it was saved
								unset($_SESSION['gmail_oauth_id']);
								unset($_SESSION['gmail_fname']);
								unset($_SESSION['gmail_lname']);
								unset($_SESSION['gmail_email']);
								unset($_SESSION['gmail_profile_img']);
					
								return $this->view_registerSuccess();
							}else{
								$this->alert_session(
								'Something went wrong, please try again!',
								'Warning !',
								'danger'
								);
							return $this->index();
							}
	
						} else {
							$this->alert_session(
								'Sorry, there was an error uploading your profile picture.',
								'Error !',
								'danger'
							);
							return $this->index();
						}
					}
				}
			
		}
	}

// 

// LOG IN METHOD
	public function login() {
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();
		$encrypter = \Config\Services::encrypter();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_email' => [
				'rules'  => 'required',
				'errors' => ['required' => 'You must input your Email Address to login your account.']
			],
			'txt_password' => [
				'rules'  => 'required',
				'errors' => ['required' => 'You must input your Password to login your account.']
			],
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txt_email');
			$errorMsg2 = $validation->getError('txt_password');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2,
				'Warning !',
				'danger'
			);
			return $this->index();
		}
		else
		{
			$membersModel = new MembersModel;

			// query finds if theres an email match from db
			$allUsers = $membersModel->where('m_email', esc($postData['txt_email']))->findAll();

			// if the email matched from login save the member info to session vars
			if (count($allUsers) > 0) {
				if($allUsers[0]['m_membership_fee'] == 'paid'){
					// if the member is paid to membership fee proceed
					if($allUsers[0]['m_status'] == 'approved'){
						// if the member account is approved by the admin proceed
						$u_pass = $encrypter->decrypt(hex2bin($allUsers[0]['m_password']));
						if (esc($postData['txt_password']) == $u_pass) {
							$session_signed_data['l_id'] = $allUsers[0]['m_id'];
							$session_signed_data['l_fname'] = $allUsers[0]['m_fname'];
							$session_signed_data['l_lname'] = $allUsers[0]['m_lname'];
							$session_signed_data['l_profile_pic'] = $allUsers[0]['m_profile_pic'];
							$session_signed_data['l_type'] = $allUsers[0]['m_type'];
							$session_signed_data['l_division'] = $allUsers[0]['m_division'];
							$session_signed_data['l_gender'] = $allUsers[0]['m_gender'];

							$session->set($session_signed_data);
							if ($session->get('l_id')) {
								
								$this->alert_session(
									'Logged in successfully!',
									'Success !',
									'success'
								);

								// record log (initialize the record log method)
								// $c_name, $c_profle, $c_type, $activity, $c_id
								$this->record_log_no_session(
									$allUsers[0]['m_fname'].' '.$allUsers[0]['m_lname'],
									$allUsers[0]['m_profile_pic'],
									$allUsers[0]['m_type'],
									'Logged in successfully.',
									$allUsers[0]['m_id']
								);

								if($session->get('l_gender') == 'Male'){
									// save notif 
									$this->save_notif(
										'Logged in his Account.',
										'admin_pages/activityLog',
										$session->get('l_division'),
										'admin',
										NULL
									);
								}else{
									// save notif 
									$this->save_notif(
										'Logged in her Account.',
										'admin_pages/activityLog',
										$session->get('l_division'),
										'admin',
										NULL
									);
								}

								return $this->view_home();
							}
							else{
								$this->alert_session(
									'You can\'t signin now, please try again !',
									'Warning !',
									'danger'
								);
								return $this->index();
							}
						}
						else{
							$this->alert_session(
								'Your Password is Incorrect, please try again !',
								'Warning !',
								'danger'
							);

							// record log (initialize the record log method)
							$this->record_log_no_session(
								$allUsers[0]['m_fname'].' '.$allUsers[0]['m_lname'],
								$allUsers[0]['m_profile_pic'],
								$allUsers[0]['m_type'],
								'Logged in failed due to entering incorrect password.',
								$allUsers[0]['m_id']
							);
							return $this->index();
						}
					}else{
						// if account is still pending
						$this->alert_session(
							'Your Account with email '.$allUsers[0]['m_email'].' 
								is in verification process by the Administrator, 
								please wait for the Approval of your Account Registration, 
								we will send you an email once you\'re account registration was approved.',
							'Warning !',
							'danger'
						);

						// record log (initialize the record log method)
						$this->record_log_no_session(
							$allUsers[0]['m_fname'].' '.$allUsers[0]['m_lname'],
							$allUsers[0]['m_profile_pic'],
							$allUsers[0]['m_type'],
							'Logged in failed due not approved account.',
							$allUsers[0]['m_id']
						);
						return $this->index();
						}
				}else{
					// if unpaid
					$this->alert_session(
						'Your Account with email '.$allUsers[0]['m_email'].' 
							is not yet approved because you haven\'t paid for the Membership Fee.
							In case you\'ve already paid for the membership fee, please contact your APTM Division\'s 
							Treasurer to review your payment.',
						'Warning !',
						'warning'
					);

					// record log (initialize the record log method)
					$this->record_log_no_session(
						$allUsers[0]['m_fname'].' '.$allUsers[0]['m_lname'],
						$allUsers[0]['m_profile_pic'],
						$allUsers[0]['m_type'],
						'Logged in failed due to Unpaid Membership Fee.',
						$allUsers[0]['m_id']
					);
					
					$session->setFlashdata('signed_up_m_id', $allUsers[0]['m_id']);
					$session->setFlashdata('signed_up_fname', $allUsers[0]['m_fname']);
					$session->setFlashdata('signed_up_lname', $allUsers[0]['m_lname']);
					$session->setFlashdata('signed_up_email', $allUsers[0]['m_email']);

					return $this->view_registerSuccess();
				}
			}else{
				$this->alert_session(
					'Your email is incorrect, please try again !',
					'Warning !',
					'danger'
				);
				return $this->index();
			}
		}
	}

// x

// LOG OUT METHOD 
	public function signOut(){
		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$session = \Config\Services::session();
		
		// record log (initialize the record log method)
		$this->record_log_with_session(
			'Logged out successfuly.'
		);

		if($session->get('l_gender') == 'Male'){
			// save notif 
			$this->save_notif(
				'Logged out his Account.',
				'admin_pages/activityLog',
				$session->get('l_division'),
				'admin',
				NULL
			);
		}else{
			// save notif 
			$this->save_notif(
				'Logged out her Account.',
				'admin_pages/activityLog',
				$session->get('l_division'),
				'admin',
				NULL	
			);
		}

		$session->destroy();

		unset($_SESSION['msg_status']);
        unset($_SESSION['msg_type']);
        unset($_SESSION['msg_head']);

		return $this->view_logout();
	}
// x

	// AUTHENTICATION END

// ----------------------------------------------------------------------------------------------
	


	// ANNOUNCEMENT 

	// note: this file upload code is not used

// FILE UPLOAD(IMAGE) FUNCTION FOR ANY INSERT METHOD
	// public function fileUpload(){
	// 	$session = \Config\Services::session();
	// 	$data = array();

	// 	// Read new token and assign to $data['token']
	// 	$data['token'] = csrf_hash();

	// 	## Validation
	// 	$validation = \Config\Services::validation();

	// 	$input = $validation->setRules([
	// 	'file' => 'uploaded[file]|max_size[file,1024]|ext_in[png,jpeg,jpg,gif],'
	// 	]);

	// 	if ($validation->withRequest($this->request)->run() == FALSE){

	// 	$data['success'] = 0;
	// 	$data['error'] = $validation->getError('file');// Error response

	// 	}else{

	// 	if($file = $this->request->getFile('file')) {
	// 		if ($file->isValid() && ! $file->hasMoved()) {
	// 			// Get file name and extension
	// 			$name = $file->getName();
	// 			$ext = $file->getClientExtension();

	// 			// Get random file name
	// 			$newName = $file->getRandomName();

	// 			// Store file in public/uploads/ folder
	// 			$file->move('../public/uploads', $newName);

	// 			// File path to display preview
	// 			$filepath = base_url()."/uploads/".$newName;
	// 			$session->setFlashdata('ann_img_file_path', $filepath);

	// 			// Response
	// 			$data['success'] = 1;
	// 			$data['message'] = 'Your file has been uploaded successfully!';
	// 			$data['filepath'] = $filepath;
	// 			$data['extension'] = $ext;
	// 		}else{
	// 			// Response
	// 			$data['success'] = 2;
	// 			$data['message'] = 'Your file extension should be png,jpeg,jpg,docx,pdf only!'; 
	// 		}
	// 	}else{
	// 		// Response
	// 		$data['success'] = 2;
	// 		$data['message'] = 'File not uploaded.';
	// 	}
	// 	}
	// 	return $this->response->setJSON($data);
	// }
// x

// SAVE ANNOUNCEMENT COMMENT
	public function saveAnnComment(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_comment' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your comment.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txt_comment');
			$this->alert_session(
				$errorMsg1,
				'Warning!',
				'danger'
			);
			return $this->view_announcement();
		}
		else
		{
			$annComModel = new AnnComModel();

			$data = [
				'ann_com_content' => $postData['txt_comment'],
				'ann_com_time_created' => $date_now,
				'ann_com_time_updated' => 'not edited yet',
				'ann_com_creator_id' => $postData['txt_m_id'],
				'ann_id' => $postData['txt_ann_id']
			];

			## Insert Record
			if($annComModel->insert($data)){
				$this->alert_session(
					"Your comment has been submitted!",
					'Success!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Commented to announcement with id '.$postData['txt_ann_id'].' Comment: '.$postData['txt_comment']
				);

				// update the number of comments
				
				// first fetch num comments on db
				$annModel = new AnnModel();
				$n_data = $annModel->where('ann_id', $postData['txt_ann_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['ann_comment_num'] + 1;
					// then update the comment_num
					$com_data = ['ann_comment_num' => $num_comment];
					$annModel->update($postData['txt_ann_id'], $com_data);
					// x
				}
				// x

				// save notif 
				$this->save_notif(
					'Commented to Announcement : '.$postData['txt_ann_what']
					.'comment: '.$postData['txt_comment'],
					'pages/announcement',
					$session->get('l_division'),
					'all',
					$postData['txt_ann_id']
				);

				return $this->view_announcement();
			}else{
				$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
				);
				return $this->view_announcement();
			}
		}
	}
// x

// EDIT ANNOUNCEMENT COMMENT
	public function editAnnCom(){
		$annComModel = new AnnComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'ann_com_content' => $postData['txt_comment_new'].' - edited',
			'ann_com_time_updated' => $date_now
		];

		if($annComModel->update(esc($postData['txt_id']), esc($data))){
			$this->alert_session(
				'Your comment has been edited !',
				'Success!',
				'success'
			);

			// search for announcement details
			$annModel = new AnnModel();
			$n_data = $annModel->where('ann_id', $postData['txt_ann_id'])->findAll();

			foreach($n_data as $n_datum){
				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Edited his comment: '.$postData['txt_comment_before'].
					' to: '.$postData['txt_comment_new'].
					'to the Announcement '.$n_datum['ann_content_what'].' .'
				);

				if($session->get('l_gender') == 'Male'){
					// save notif 
					$this->save_notif(
						'Edited his comment to Announcement : '.$n_datum['ann_content_what']
						.'comment: '.$postData['txt_comment_before'],
						'pages/announcement',
						$session->get('l_division'),
						'all',
						$postData['txt_ann_id']
					);
				}else{
					// save notif 
					$this->save_notif(
						'Edited her comment to Announcement : '.$n_datum['ann_content_what']
						.'comment: '.$postData['txt_comment_before'],
						'pages/announcement',
						$session->get('l_division'),
						'all',
						$postData['txt_ann_id']
					);
				}
			}
			
			return $this->view_announcement();
		}
	}
// x

// DELETE ANNOUNCEMENT COMMENT

	public function deleteAnnCom(){
		$annComModel = new AnnComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($annComModel->where('ann_com_id', esc($postData['txt_id']))->delete()){
			$this->alert_session(
				'Comment has been deleted, it can\'t be retrieve back !',
				'Deleted!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Deleted the Comment: '.$postData['txt_comment'].
				' to the Announcement with id'.$postData['txt_ann_id'].' .'
			);
			
			// update the number of comments
				
				// first fetch num comments on db
				$annModel = new AnnModel();
				$n_data = $annModel->where('ann_id', $postData['txt_ann_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['ann_comment_num'] - 1;
					// then update the comment_num
					$com_data = ['ann_comment_num' => $num_comment];
					$annModel->update($postData['txt_ann_id'], $com_data);
					// x
				}

			// x

			return $this->view_announcement();
		}
	}

// x

	// ANNOUNCEMENT END

// ----------------------------------------------------------------------------------------------

	// NEWS 

// ADD NEWS COMMENT 

	public function saveNewsComment(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_comment' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your comment.',
				]
			]
		]);
		
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txt_comment');
			$this->alert_session(
				$errorMsg1,
				'Warning!',
				'danger'
			);
			return $this->view_news();
		}
		else
		{
			$newsComModel = new NewsComModel();

			$data = [
				'news_com_content' => $postData['txt_comment'],
				'news_com_time_created' => $date_now,
				'news_com_time_updated' => 'not edited yet',
				'news_com_creator_id' => $postData['txt_m_id'],
				'news_id' => $postData['txt_news_id']
			];

			## Insert Record
			if($newsComModel->insert($data)){
				$this->alert_session(
					"Your comment has been submitted!",
					'Success!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Commented to news with Headline: '.$postData['txt_news_head'].' 
					| Comment: '.$postData['txt_comment']
				);

				// update the number of comments
				
				// first fetch num comments on db
				$newsModel = new NewsModel();
				$n_data = $newsModel->where('news_id', $postData['txt_news_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['news_comment_num'] + 1;
					// then update the comment_num
					$com_data = ['news_comment_num' => $num_comment];
					$newsModel->update($postData['txt_news_id'], $com_data);
					// x
				}
				// x

				// save notif 
				$this->save_notif(
					'Commented to News : '.$postData['txt_news_head'].
					'comment: '.$postData['txt_comment'],
					'pages/newsSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_news_id']
				);

				return $this->view_news();
			}else{
				$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
				);
				return $this->view_news();
			}
		}
	}

// x

// EDIT NEWS COMMENT
	public function editNewsCom(){
		$newsComModel = new NewsComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'news_com_content' => $postData['txt_comment_new'].' - edited',
			'news_com_time_updated' => $date_now
		];

		if($newsComModel->update(esc($postData['txt_id']), esc($data))){
			$this->alert_session(
				'Your comment has been edited !',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Edited his/her comment: '.$postData['txt_comment_before'].
				' to: '.$postData['txt_comment_new'].
				'to the news with Headline: '.$postData['txt_news_head'].' .'
			);

			if($session->get('l_gender') == 'Male'){
				// save notif 
				$this->save_notif(
					'Edited his comment to News : '.$postData['txt_news_head'].
					' | comment: '.$postData['txt_comment_new'],
					'pages/newsSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_news_id']	
				);
			}else{
				// save notif 
				$this->save_notif(
					'Edited her comment to News : '.$postData['txt_news_head'].
					'comment: '.$postData['txt_comment_new'],
					'pages/newsSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_news_id']
				);
			}
			

			return $this->view_news();
		}
	}
// x

// DELETE NEWS COMMENT

	public function deleteNewsCom(){
		$newsComModel = new NewsComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($newsComModel->where('news_com_id', esc($postData['txt_id']))->delete()){
			$this->alert_session(
				'Comment has been deleted, it can\'t be retrieve back !',
				'Deleted!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Deleted the Comment: '.$postData['txt_comment'].
				' | to the news with Headline: '.$postData['txt_news_head'].' .'
			);

			// update the number of comments
				
				// first fetch num comments on db
				$newsModel = new NewsModel();
				$n_data = $newsModel->where('news_id', $postData['txt_news_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['news_comment_num'] - 1;
					// then update the comment_num
					$com_data = ['news_comment_num' => $num_comment];
					$newsModel->update($postData['txt_news_id'], $com_data);
					// x
				}

			// x
			
			return $this->view_news();
		}
	}

// x

	// NEWS END

// ----------------------------------------------------------------------------------------------

	// FORUM 

// SAVE FORUM
	public function createForum(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txtContent' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your question to create open new forum.',
				]
			],
			'txtCategory' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must choose the category of your forum.',
				]
			],
			'txtDivision' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must choose to what division will your forum appear.',
				]
			]
		]);
		
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtContent');
			$errorMsg2 = $validation->getError('txtCategory');
			$errorMsg3 = $validation->getError('txtDivision');
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'<p>'.$errorMsg3,
				'Warning!',
				'danger'
			);
			return $this->view_forum();
		}
		else
		{
			$forumModel = new ForumModel();

			if($session->get('l_type') == 'admin'){
				$forum_stat = 'published';

				$data = [
					'forum_content' => $postData['txtContent'],
					'forum_category' => $postData['txtCategory'],
					'forum_division' => $postData['txtDivision'],
					'forum_status' => $forum_stat,
					'forum_time_created' => $date_now,
					'forum_creator_id' => $session->get('l_id')
				];
	
				## Insert Record
				if($forumModel->insert($data)){
					$this->alert_session(
						"Your New Forum has been published !",
						'Success!',
						'success'
					);
	
					// record log (initialize the record log method)
					$this->record_log_with_session(
						'Admin created new Forum with the question: '.$postData['txtContent'].
						' and Category: '.$postData['txtCategory'].' for '.$postData['txtDivision']
					);
	
					// save notif 
					$this->save_notif(
						'Admin created new Forum with the question: '.$postData['txtContent'].
						' and Category: '.$postData['txtCategory'].' for '.$postData['txtDivision'],
						'pages/forumSingle',
						$session->get('l_division'),
						'all',
						$postData['txtContent']
					);
	
					return $this->view_forum();
				}else{
					$this->alert_session(
					'Something went wrong, please try again!',
					'Warning!',
					'danger'
					);
					return $this->view_forum();
				}
			}else{
				$forum_stat = 'pending';

				$data = [
					'forum_content' => $postData['txtContent'],
					'forum_category' => $postData['txtCategory'],
					'forum_division' => $postData['txtDivision'],
					'forum_status' => $forum_stat,
					'forum_time_created' => $date_now,
					'forum_creator_id' => $session->get('l_id')
				];
	
				## Insert Record
				if($forumModel->insert($data)){
					$this->alert_session(
						"Your question was submitted, please wait for the approval of the admin ! 
						We will notify you once your question was approved.",
						'Success!',
						'success'
					);
	
					// record log (initialize the record log method)
					$this->record_log_with_session(
						$session->get('l_fname').' '.$session->get('l_lname').
						' created new Forum with the question: '.$postData['txtContent'].
						' and Category: '.$postData['txtCategory'].' for '.$postData['txtDivision']
					);
	
					// save notif 
					$this->save_notif(
						$session->get('l_fname').' '.$session->get('l_lname').
						' created new Forum with the question: '.$postData['txtContent'].
						' and Category: '.$postData['txtCategory'].' for '.$postData['txtDivision'],
						'pages/forumSingle',
						$session->get('l_division'),
						'all',
						$postData['txtContent']
					);
	
					return $this->view_forum();
				}else{
					$this->alert_session(
					'Something went wrong, please try again!',
					'Warning!',
					'danger'
					);
					return $this->view_forum();
				}
			}

			
		}
	}
// x

// EDIT FORUM
	public function editForums(){
		helper(['form', 'url']);
		$session = \Config\Services::session();
		## Validation
		$validation = \Config\Services::validation();
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_f_e_content' => 'required|min_length[5]',
		]);
			
		if(!$error)
		{
			$errorMsg_t = $validation->getError('txt_f_e_content');
			$this->alert_session(
				$errorMsg_t,
				'Warning!',
				'danger'
			);
			return $this->view_forum();
		}
		else
		{
			$forumsModel = new ForumModel();

			$data = [
				'forums_content' => $postData['txt_f_e_content'],
				'forums_creator_name' => $session->get('u_fname'),
				'forums_created_time' => $date_now.' edited'
			];
			
			## Insert Record
			if($forumsModel->update($postData['txt_edit_forums_id'], $data)){
				$this->alert_session(
				'Forum is edited successfully!',
				'Success!',
				'success'
				);
			return $this->view_forum();
			}else{
				$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
				);
			return $this->view_forum();
			}
		}
	}
// x

// DELETE FORUM
	public function deleteforums(){
		$forumsModel = new ForumModel();
		$request = service('request');
		$postData = $request->getPost();

		if($forumsModel->where('forum_id', $postData['txt_d_forums_id'])->delete()){
			$this->alert_session(
				'Your forum was deleted!',
				'Deleted!',
				'danger'
			);
			return $this->view_forum();
		}
	}
// x

// SAVE FORUM COMMENT

	public function saveForumComment(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_comment' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your comment before submitting it.',
				]
			]
		]);
		
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txt_comment');
			$this->alert_session(
				$errorMsg1,
				'Warning!',
				'danger'
			);
			return $this->view_forum();
		}
		else
		{
			$forumComModel = new ForumComModel();

			$data = [
				'forum_com_content' => $postData['txt_comment'],
				'forum_com_time_created' => $date_now,
				'forum_com_time_updated' => 'not edited yet',
				'forum_com_creator_id' => $postData['txt_m_id'],
				'forum_id' => $postData['txt_forum_id']
			];

			## Insert Record
			if($forumComModel->insert($data)){
				$this->alert_session(
					"Your comment has been submitted!",
					'Success!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Commented to Forum with Content: | '.htmlspecialchars_decode($postData['txt_forum_content']).' for '.
					$postData['txt_division'].' .Comment: '.$postData['txt_comment'],
				);

				// update the number of comments
				
				// first fetch num comments on db
				$forumModel = new ForumModel();
				$n_data = $forumModel->where('forum_id', $postData['txt_forum_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['forum_comment_num'] + 1;
					// then update the comment_num
					$com_data = ['forum_comment_num' => $num_comment];
					$forumModel->update($postData['txt_forum_id'], $com_data);
					// x
				}
				// x

				// save notif 
				$this->save_notif(
					'Commented to Forum : '.htmlspecialchars_decode($postData['txt_forum_content']).
					'comment: '.$postData['txt_comment'],
					'pages/forumSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_forum_id']
				);

				return $this->view_forum();
			}else{
				$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
				);
				return $this->view_forum();
			}
		}
	}

// x

// EDIT FORUM COMMENT

	public function editForumCom(){
		$forumComModel = new ForumComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'forum_com_content' => $postData['txt_comment_new'].' - edited',
			'forum_com_time_updated' => $date_now
		];

		if($forumComModel->update(esc($postData['txt_id']), esc($data))){
			$this->alert_session(
				'Your comment has been edited !',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Edited his/her comment: '.$postData['txt_comment_before'].
				' to: '.$postData['txt_comment_new'].
				' to the Forum with Content: '.
				htmlspecialchars_decode($postData['txt_forum_content']).' for '.
				$postData['txt_forum_division']
			);

			if($session->get('l_gender') == 'Male'){
				// save notif 
				$this->save_notif(
					'Edited his comment to Forum : '.htmlspecialchars_decode($postData['txt_forum_content']).
					'comment: '.$postData['txt_comment_before'],
					'pages/forumSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_forum_id']
				);
			}else{
				// save notif 
				$this->save_notif(
					'Edited her comment to Forum : '.htmlspecialchars_decode($postData['txt_forum_content']).
					'comment: '.$postData['txt_comment_before'],
					'pages/forumSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_forum_id']
				);
			}

			return $this->view_forum();
		}
	}

// x

// DELETE FORUM COMMENT

	public function deleteForumCom(){
		$forumComModel = new ForumComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		if($forumComModel->where('forum_com_id', esc($postData['txt_id']))->delete()){
			$this->alert_session(
				'Comment has been deleted, it can\'t be retrieve back !',
				'Deleted!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Deleted the Comment: '.$postData['txt_comment'].
				' to the Forum with Content: '.
				htmlspecialchars_decode($postData['txt_forum_content']).' for '.
				$postData['txt_forum_division']
			);

			// update the number of comments
				
				// first fetch num comments on db
				$forumModel = new ForumModel();
				$n_data = $forumModel->where('forum_id', $postData['txt_forum_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['forum_comment_num'] - 1;
					// then update the comment_num
					$com_data = ['forum_comment_num' => $num_comment];
					$forumModel->update($postData['txt_forum_id'], $com_data);
					// x
				}

			// x
			
			if($session->get('l_gender') == 'Male'){
				// save notif 
				$this->save_notif(
					'Deleted his comment to Forum : '.htmlspecialchars_decode($postData['txt_forum_content']).
					'comment: '.$postData['txt_comment'],
					'pages/forumSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_forum_id']
				);
			}else{
				// save notif 
				$this->save_notif(
					'Deleted her comment to Forum : '.htmlspecialchars_decode($postData['txt_forum_content']).
					'comment: '.$postData['txt_comment'],
					'pages/forumSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_forum_id']
				);
			}


			return $this->view_forum();
		}
	}

// x

	// FORUM END

// ----------------------------------------------------------------------------------------------

// TREASURER'S TASK

	public function paidMember(){
		$membersModel = new MembersModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($session->get('l_type') == 'treasurer'){
			if(esc($postData['txt_m_status']) == 'pending'){
				$this->alert_session(
					$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
						'\'s account was not yet approved and verified by the Admin, 
						Once his account was approved by the Admin, that is the time 
						for him to pay for the Membership Fee.!',
					'Warning!',
					'danger'
				);
				return $this->view_treasurerTask();
			}else{
				$data = ['m_membership_fee' => 'paid'];

				if($membersModel->update(esc($postData['txt_m_id']), esc($data))){
					$this->sendMail(
						$postData['txt_m_email'],
						'Membership Fee has been Marked as Paid.',
						'Good Day '.$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
						', Welcome to APTM Official Website, your Membership Fee has been 
						marked as paid by your Division Treasurer. You can now Login your account to our website.
						This is our website link: '.base_url().'/APTM/public/AptmController/index'
					);
					
					$this->alert_session(
						$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
							'\'s account marked as paid and notification email sent to this Member!',
						'Success!',
						'success'
					);
		
					// record log (initialize the record log method)
					$this->record_log_with_session(
						$session->get('l_division').' Division Treasurer, marked the account of '
						.$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
						' of '.$postData['txt_m_division'].' as Paid.'
					);
		
					// save notif 
					$this->save_notif(
						$session->get('l_division').'Division Treasurer, marked your account paid for Membership Fee.',
						'pages/profile',
						$session->get('l_division'),
						'member'.$postData['txt_m_id'],
						NULL
					);
					
					return $this->view_treasurerTask();
				}
			}
		}else{
			$this->alert_session(
				'This action is strictly for Treasurer access only.',
				'Invalid Action !',
				'danger'
			);
			return $this->view_treasurerTask();
		}
	}

// x


// ZOOM MEETINGS METHODS - comment section

// SAVE ZOOM MEETINGS COMMENT
	public function saveMeetComment(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_comment' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your comment.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txt_comment');
			$this->alert_session(
				$errorMsg1,
				'Warning!',
				'danger'
			);
			return $this->view_zoom();
		}
		else
		{
			$meetComModel = new MeetComModel();

			$data = [
				'meet_com_content' => $postData['txt_comment'],
				'meet_com_time_created' => $date_now,
				'meet_com_time_updated' => 'not edited yet',
				'meet_com_creator_id' => $postData['txt_m_id'],
				'meet_id' => $postData['txt_meet_id']
			];

			## Insert Record
			if($meetComModel->insert(esc($data))){
				$this->alert_session(
					"Your comment has been submitted!",
					'Success!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Commented to zoom meeting with topic: '.$postData['txt_meet_title'].
					' Comment: '.$postData['txt_comment']
				);

				// update the number of comments 
				// add 1 in num comment in every comment
				
				// first fetch num comments on db
				$meetModel = new MeetingModel();
				$n_data = $meetModel->where('meet_id', $postData['txt_meet_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['meet_comment_num'] + 1;
					// then update the comment_num
					$com_data = ['meet_comment_num' => $num_comment];
					$meetModel->update($postData['txt_meet_id'], $com_data);
					// x
				}
				// x

				// save notif 
				$this->save_notif(
					'Commented to Zoom Meeting : '.$postData['txt_meet_title'].
					'comment: '.$postData['txt_comment'],
					'pages/meetSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_meet_id']
				);
				
				return $this->view_zoom();
			}else{
				$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
				);
				return $this->view_zoom();
			}
		}
	}
// x

// EDIT ZOOM MEETINGS COMMENT
	public function editMeetCom(){
		$meetComModel = new MeetComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'meet_com_content' => $postData['txt_comment_new'].' - edited',
			'meet_com_time_updated' => $date_now
		];

		if($meetComModel->update(esc($postData['txt_id']), esc($data))){
			$this->alert_session(
				'Your comment has been edited !',
				'Success!',
				'success'
			);

			// search for meeting details
			$meetingModel = new MeetingModel();
			$n_data = $meetingModel->where('meet_id', $postData['txt_id'])->findAll();

			foreach($n_data as $n_datum){
				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Edited his comment: '.$postData['txt_comment_before'].
					' to: '.$postData['txt_comment_new'].
					'to the Zoom Meeting '.$n_datum['meet_title'].' .'
				);

				if($session->get('l_gender') == 'Male'){
					// save notif 
					$this->save_notif(
						'Edited his comment to Zoom Meeting : '.$n_datum['meet_title']
						.'comment: '.$postData['txt_comment_before'],
						'pages/meetSingle',
						$session->get('l_division'),
						'all',
						$postData['txt_id']
					);
				}else{
					// save notif 
					$this->save_notif(
						'Edited her comment to Zoom Meeting : '.$n_datum['meet_title']
						.'comment: '.$postData['txt_comment_before'],
						'pages/meetSingle',
						$session->get('l_division'),
						'all',
						$postData['txt_id']
					);
				}
			}

			return $this->view_zoom();
		}
	}
// x

// DELETE ZOOM MEETINGS COMMENT

	public function deleteMeetCom(){
		$meetComModel = new MeetComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($meetComModel->where('meet_com_id', esc($postData['txt_id']))->delete()){
			$this->alert_session(
				'Comment has been deleted, it can\'t be retrieve back !',
				'Deleted!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Deleted the Comment: '.$postData['txt_comment'].
				' to the Zoom Meeting with id'.$postData['txt_meet_id'].' .'
			);
			
			// update the number of comments 
			// add 1 in num comment in every comment
				
			// first fetch num comments on db
			$meetModel = new MeetingModel();
			$n_data = $meetModel->where('meet_id', $postData['txt_meet_id'])->findAll();
			foreach($n_data as $n_datum){
				// plus 1 to comment
				$num_comment = $n_datum['meet_comment_num'] - 1;
				// then update the comment_num
				$com_data = ['meet_comment_num' => $num_comment];
				$meetModel->update($postData['txt_meet_id'], $com_data);
				// x
			}
			// x
			
			return $this->view_zoom();
		}
	}

// x

// X


// JITSI MEETINGS METHODS - comment section

// SAVE JITSI MEETINGS COMMENT
	public function saveJitsiMeetComment(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txt_comment' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your comment.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txt_comment');
			$this->alert_session(
				$errorMsg1,
				'Warning!',
				'danger'
			);
			return $this->view_jitsiMeet();
		}
		else
		{
			$meetComModel = new MeetComModel();

			$data = [
				'meet_com_content' => $postData['txt_comment'],
				'meet_com_time_created' => $date_now,
				'meet_com_time_updated' => 'not edited yet',
				'meet_com_creator_id' => $postData['txt_m_id'],
				'meet_id' => $postData['txt_meet_id']
			];

			## Insert Record
			if($meetComModel->insert(esc($data))){
				$this->alert_session(
					"Your comment has been submitted!",
					'Success!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Commented to Jitsi Meeting: '.$postData['txt_meet_id'].' Comment: '
					.$postData['txt_comment']
				);

				// update the number of comments 
				// add 1 in num comment in every comment
				
				// first fetch num comments on db
				$meetModel = new MeetingModel();
				$n_data = $meetModel->where('meet_id', $postData['txt_meet_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['meet_comment_num'] + 1;
					// then update the comment_num
					$com_data = ['meet_comment_num' => $num_comment];
					$meetModel->update($postData['txt_meet_id'], $com_data);
					// x
				}
				// x

				// save notif 
				$this->save_notif(
					'Commented to Jitsi Meeting : '.$postData['txt_meet_title'].
					'comment: '.$postData['txt_comment'],
					'pages/meetSingle',
					$session->get('l_division'),
					'all',
					$postData['txt_meet_id']
				);

				return $this->view_jitsiMeet();
			}else{
				$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
				);
				return $this->view_jitsiMeet();
			}
		}
	}
// x

// EDIT JITSI MEETINGS COMMENT
	public function editJitsiMeetCom(){
		$meetComModel = new MeetComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'meet_com_content' => $postData['txt_comment_new'].' - edited',
			'meet_com_time_updated' => $date_now
		];

		if($meetComModel->update(esc($postData['txt_id']), esc($data))){
			$this->alert_session(
				'Your comment has been edited !',
				'Success!',
				'success'
			);

			// search for meeting details
			$meetingModel = new MeetingModel();
			$n_data = $meetingModel->where('meet_id', $postData['txt_id'])->findAll();

			foreach($n_data as $n_datum){
				// record log (initialize the record log method)
				$this->record_log_with_session(
					'Edited his comment: '.$postData['txt_comment_before'].
					' to: '.$postData['txt_comment_new'].
					'to the Jitsi Meeting '.$n_datum['meet_title'].' .'
				);

				if($session->get('l_gender') == 'Male'){
					// save notif 
					$this->save_notif(
						'Edited his comment to Jitsi Meeting : '.$n_datum['meet_title']
						.'comment: '.$postData['txt_comment_before'],
						'pages/meetSingle',
						$session->get('l_division'),
						'all',
						$postData['txt_id']
					);
				}else{
					// save notif 
					$this->save_notif(
						'Edited her comment to Jitsi Meeting : '.$n_datum['meet_title']
						.'comment: '.$postData['txt_comment_before'],
						'pages/meetSingle',
						$session->get('l_division'),
						'all',
						$postData['txt_id']
					);
				}
			}

			return $this->view_jitsiMeet();
		}
	}
// x

// DELETE JITSI MEETINGS COMMENT

	public function deleteJitsiMeetCom(){
		$meetComModel = new MeetComModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($meetComModel->where('meet_com_id', esc($postData['txt_id']))->delete()){
			$this->alert_session(
				'Comment has been deleted, it can\'t be retrieve back !',
				'Deleted!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Deleted the Comment: '.$postData['txt_comment'].
				' to the Jitsi Meeting with id'.$postData['txt_meet_id'].' .'
			);

			// update the number of comments 
				// add 1 in num comment in every comment
				
				// first fetch num comments on db
				$meetModel = new MeetingModel();
				$n_data = $meetModel->where('meet_id', $postData['txt_meet_id'])->findAll();
				foreach($n_data as $n_datum){
					// plus 1 to comment
					$num_comment = $n_datum['meet_comment_num'] - 1;
					// then update the comment_num
					$com_data = ['meet_comment_num' => $num_comment];
					$meetModel->update($postData['txt_meet_id'], $com_data);
					// x
				}
			// x
			
			return $this->view_jitsiMeet();
		}
	}

// x

// SAVE MEETING ATTENDEES

	public function saveMeetingAttendee(){
		$session = \Config\Services::session();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");
		
		// post request
		$request = service('request');
		$postData = $request->getPost();

		$meetAttendeeModel = new MeetingAttendeeModel();

		$data = [
			'ma_datetime' => $date_now,
			'ma_meeting_id' => $postData['txt_meet_id'],
			'ma_member_id' => $postData['txt_member_id']
		];

		## Insert Record
		if($meetAttendeeModel->insert(esc($data))){
			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Has Joined the Meeting: '.$postData['txt_meet_title'].' for '
				.$postData['txt_meet_division']
			);

			// save notif 
			$this->save_notif(
				'Has Joined the Meeting: '.$postData['txt_meet_title'].' for '
				.$postData['txt_meet_division'],
				'admin_pages/activityLog',
				$session->get('l_division'),
				'admin',
				$postData['txt_meet_id']
			);

			return redirect()->to($postData['txt_meet_link']);
		}else{
			$this->alert_session(
				'Something went wrong, please try again!',
				'Warning!',
				'danger'
			);
			return $this->view_jitsiMeet();
		}
	}

// x

// X

// FETCH NOTIFICATIONS

	public function fetchNotif(){
		$session = \Config\Services::session();
		$user_id = $session->get('l_id');
		
		// fetch all notif data from db
		$notifModel = new NotifModel();

		if($session->get('l_type') == 'admin'){
			$where = "notif_for_who='admin' OR notif_for_who='all'";
			$data = $notifModel->orderBy('notif_id', 'DESC')
								->where($where)
								->findAll();
			// x

			echo json_encode($data);
		}elseif($session->get('l_type') == 'member' OR $session->get('l_type') == 'treasurer'){
			$where = "notif_for_who='member' AND notif_creator_id!='$user_id' OR notif_for_who='all'";
			$data = $notifModel->orderBy('notif_id', 'DESC')
								->where($where)
								->findAll();
			// x

			echo json_encode($data);
		}
	}

// x

// VISIT THE NOTIF

	public function visitNotif(){
		$notifModel = new NotifModel();

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'notif_status' => 'seen'
		];

		if($notifModel->update(esc($postData['txtNotifId']), esc($data))){

			if($postData['txtLink'] == 'admin_pages/activityLog'){
				$session = \Config\Services::session();
				if($session->get('l_id') && $session->get('l_type') == 'admin'){
					$data = [
						'meta_title' => 'Activty Log',
						'b_svg' => base_url().'/public/assets/images/aptm/undraw_developer_activity_bv83.svg',
						'b_title' => 'Activty Log History',
						'b_descrip' => 'All activity done by the users and admin is recorded and displayed in table.'
					];

					$logModel = new LogModel();
					$data['log_data_a'] = $logModel->fetch_data_per_type('admin');
					$data['log_data_t'] = $logModel->fetch_data_per_type('treasurer');
					$data['log_data_m'] = $logModel->fetch_data_per_type('member');

					return view('admin_pages/activityLog', $data);
				}else{
					return view('landing_page');
				}
			}
		}
	}

// x 

// CHAT METHODS
// FETCH MEMBER DATA

	public function fetchMemberSearch($query){
		$membersModel = new MembersModel();
		$data = $membersModel->fetch_data_search($query);
		echo json_encode($data);	
	}

// x

// SEND MESSAGE - chat view

	public function sendMessage($msg, $reciever_id){
		$session = \Config\Services::session();
		$chatModel = new ChatModel();
		helper(['form', 'url']);

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		// post request
		$request = service('request');
		$postData = $request->getPost();

	
		$chatModel = new ChatModel();

			$data = [
				'chat_content' => stripslashes(htmlspecialchars($msg)),	
				'chat_time_created' => $date_now,
				'chat_sender_id' => $session->get('l_id'),
				'chat_receiver_id' => $reciever_id
			];

			## Insert Record
			if($chatModel->insert(esc($data))){
				// save notif 
				$this->save_notif(
					'New Message: '.$msg,
					'pages/chatroom',
					$session->get('l_division'),
					'member',
					$reciever_id
				);
			}
	}

// x

// VIEW MESSAGES OF THIS MEMBER

	public function viewMessage($receiver_id){
		$membersModel = new MembersModel();
		$chatModel = new ChatModel();
		$session = \Config\Services::session();
		
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();
		$sender_id = $session->get('l_id');
		// $receiver_id = $postData['txt_r_id'];
		
		$data = ['chat_status' => 'seen'];

			$data = [
				'meta_title' => 'Chat Room',
				'b_title' => 'Chat Room',
				'b_descrip' => 'Search your co-members name and send messages, 
							if your co-member message you for the first time, 
							you must accept his message request to continue recieving messages from him.
							You can accept or denied message request, it\'s up to you.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_annotation_7das.svg'
			];
			
			// x
			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// $chatModel = new ChatModel();
			// $data['chat_data'] = $chatModel->fetchAllMessage();

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// for displaying members to chat
			$m_division = $session->get('l_division');
			$l_user_id = $session->get('l_id');
			
			if($session->get('l_type') == 'admin'){
				$where = "m_id!='$l_user_id'";
				$data['m_data_per_d'] = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
			
				$data['click_stat'] = 1;
				
				$where_m = ['m_id' => $receiver_id];
				$data['r_data'] = $membersModel->where($where_m)->orderBy('m_id', 'DESC')->findAll();
					
				$where_c = "chat_sender_id='$sender_id' OR chat_receiver_id='$receiver_id'";
				$data['c_data'] = $chatModel->where($where_c)->orderBy('chat_id', 'DESC')->findAll();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/chatroom', $data);
			}else{
				$where = "m_division='$m_division' AND m_id!='$l_user_id'";
				$data['m_data_per_d'] = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
			
				$data['click_stat'] = 1;

				$where_m = ['m_id' => $receiver_id];
				$data['r_data'] = $membersModel->where($where_m)->orderBy('m_id', 'DESC')->findAll();
					
				$where_c = "chat_sender_id='$sender_id' OR chat_receiver_id='$receiver_id'";
				$data['c_data'] = $chatModel->where($where_c)->orderBy('chat_id', 'DESC')->findAll();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/chatroom', $data);
			}

	}

// x

// CLICK PROFILE TO SEND MESSAGE TO MEMBER

	public function clickMember($receiver_id){
		$membersModel = new MembersModel();
		$chatModel = new ChatModel();
		$session = \Config\Services::session();
		
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();
		$sender_id = $session->get('l_id');
		// $receiver_id = $postData['txt_r_id'];
		
		$data = ['chat_status' => 'seen'];

			$data = [
				'meta_title' => 'Chat Room',
				'b_title' => 'Chat Room',
				'b_descrip' => 'Search your co-members name and send messages, 
							if your co-member message you for the first time, 
							you must accept his message request to continue recieving messages from him.
							You can accept or denied message request, it\'s up to you.',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_annotation_7das.svg'
			];
			
			// x
			$newsModel = new NewsModel();
			$data['latest_news_data'] = $newsModel->fetchLatestNews();

			// $chatModel = new ChatModel();
			// $data['chat_data'] = $chatModel->fetchAllMessage();

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// for displaying members to chat
			$m_division = $session->get('l_division');
			$l_user_id = $session->get('l_id');
			
			if($session->get('l_type') == 'admin'){
				$where = "m_id!='$l_user_id'";
				$data['m_data_per_d'] = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
			
				$data['click_stat'] = 1;
				
				$where_m = ['m_id' => $receiver_id];
				$data['r_data'] = $membersModel->where($where_m)->orderBy('m_id', 'DESC')->findAll();
					
				$where_c = "chat_sender_id='$sender_id' OR chat_receiver_id='$receiver_id'";
				$data['c_data'] = $chatModel->where($where_c)->orderBy('chat_id', 'DESC')->findAll();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/chatroom', $data);
			}else{
				$where = "m_division='$m_division' AND m_id!='$l_user_id'";
				$data['m_data_per_d'] = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();
			
				$data['click_stat'] = 1;

				$where_m = ['m_id' => $receiver_id];
				$data['r_data'] = $membersModel->where($where_m)->orderBy('m_id', 'DESC')->findAll();
					
				$where_c = "chat_sender_id='$sender_id' OR chat_receiver_id='$receiver_id'";
				$data['c_data'] = $chatModel->where($where_c)->orderBy('chat_id', 'DESC')->findAll();

				// count of not seen notif
				$notifModel = new NotifModel();
				$data['not_seen_notif_count'] = $notifModel->countNotSeen();
				// x

				return view('pages/chatroom', $data);
			}
	}

// x

// MY ACCOUNT METHODS
// EDIT PERSONAL INFO

	public function editProfile(){
		helper(['form', 'url']);
		$validation = \Config\Services::validation();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txtFname' => [
				'rules'  => 'required|min_length[2]',
				'errors' => [
					'required' => 'You must input First Name.',
					'min_length' => 'Please input a valid First Name.'
				]
			],
			'txtAge' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input Age.'
				]
			],
			'txtTown' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Town Address.',
					'min_length' => 'Please input a valid Town Address.'
				]
			],
			'txtSchool' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => 'You must input the name of School youre currently working at.',
					'min_length' => 'Please input a valid School Name.'
				]
			],
			'txtMname' => [
				'rules'  => 'required|min_length[2]',
				'errors' => [
					'required' => 'You must input Middle Name.',
					'min_length' => 'Please input a valid Middle Name, not initial.'
				]
			],
			'txtGender' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input your Gender.'
				]
			],
			'txtProvince' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Province Address.',
					'min_length' => 'Please input a valid Province Address.'
				]
			],
			'txtLname' => [
				'rules'  => 'required|min_length[2]',
				'errors' => [
					'required' => 'You must input Last Name.',
					'min_length' => 'Please input a valid Last Name.'
				]
			],
			'txtStreet' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Street Address.',
					'min_length' => 'Please input a valid Street Address.'
				]
			],
			'txtPosition' => [
				'rules'  => 'required|min_length[3]',
				'errors' => [
					'required' => 'You must input Teacher Level.',
					'min_length' => 'Please input a valid Teacher Level.'
				]
			],
			'txtEmail' => [
				'rules'  => 'required|valid_email',
				'errors' => [
					'required' => 'You must input Email.',
					'valid_email' => 'Your email is Invalid, please try another email.'
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtFname');
			$errorMsg2 = $validation->getError('txtMname');
			$errorMsg3 = $validation->getError('txtLname');
			$errorMsg4 = $validation->getError('txtEmail');
			$errorMsg5 = $validation->getError('txtAge');
			$errorMsg6 = $validation->getError('txtGender');
			$errorMsg7 = $validation->getError('txtStreet');
			$errorMsg8 = $validation->getError('txtTown');
			$errorMsg9 = $validation->getError('txtProvince');
			$errorMsg10 = $validation->getError('txtPosition');
			$errorMsg11 = $validation->getError('txtSchool');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>'.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				'<p>'.$errorMsg7.'<p>'.'</p>'.$errorMsg8.'<p>'.'</p>'.$errorMsg9.'</p>'.
				'<p>'.$errorMsg10.'<p>'.'</p>'.$errorMsg11.'<p>',
				'Warning !',
				'danger'
			);
			return $this->view_profile();
		}
		else
		{
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/profilePic/";
					$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtProfile"]["name"]));
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["btn_save"])) {
						$check = getimagesize($_FILES["txtProfile"]["tmp_name"]);
						if($check !== false) {
							$uploadOk = 1;
						} else {
							$this->alert_session(
								'File is not an image.',
								'Error!',
								'danger'
							);
							return $this->view_profile();
							$uploadOk = 0;
						}
					}
					// Check file size
					if ($_FILES["txtProfile"]["size"] > 500000) {
						$this->alert_session(
							'Sorry, your image file size is too large, please choose an image below 500KB file size.',
							'Error!',
							'danger'
						);
						return $this->view_profile();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_profile();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your profile picture was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_profile();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtProfile"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtProfile"]["name"]);

							$data = [
								'm_fname' => $postData['txtFname'],
								'm_mname' => $postData['txtMname'],
								'm_lname' => $postData['txtLname'],
								'm_email' => $postData['txtEmail'],
								'm_age' => $postData['txtAge'],
								'm_gender' => $postData['txtGender'],
								'm_street' => $postData['txtStreet'],
								'm_town' => $postData['txtTown'],
								'm_province' => $postData['txtProvince'],
								'm_position' => $postData['txtPosition'],
								'm_school' => $postData['txtSchool'],
								'm_updated_time' => $date_now,
								'm_profile_pic' => base_url().'/public/uploads/profilePic/'.$img_filename
							];

							$membersModel = new MembersModel();
							$session = \Config\Services::session();

							## Insert
							if($membersModel->update(esc($postData['txt_m_id']), esc($data))){
								$this->alert_session(
								'Changes has been Saved ! Please log in your account again.',
								'Success !',
								'success'
								);

								$this->record_log_with_session(
									'Edited his personal information.',
								);

								// save the register request to notif tbl
								$this->save_notif(
									'Edited his personal information.',
									'admin_pages/members',
									$session->get('l_division'),
									'admin',
									NULL,
								);
								
								return $this->view_logout();
							}else{
								$this->alert_session(
								'Something went wrong, please try again!',
								'Warning !',
								'danger'
								);
							return $this->view_profile();
							}

						} else {
							$this->alert_session(
								'Sorry, there was an error uploading your profile picture.',
								'Error !',
								'danger'
							);
							return $this->view_profile();
						}
					}
				}
			}
		
	}

// x

// CHANGE PASSWORD

	public function changePassword(){
		$membersModel = new MembersModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$encrypter = \Config\Services::encrypter();
		$data = ['m_password' => bin2hex($encrypter->encrypt($postData['txtCoPass']))];

		if($membersModel->update(esc($postData['txt_m_id']), esc($data))){
			$this->alert_session(
				'Your new Password has been saved.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log_with_session(
				'Changed his Password.'
			);

			// save notif 
			$this->save_notif(
				'Changed his Password.',
				'admin_pages/activityLog',
				$session->get('l_division'),
				'admin',
				NULL
			);
			
			return $this->signOut();
		}
	}

// x

// PAYPAL PAYMENT METHODS

// SAVE PAYPAL PAYMENT TRANSACTION

	public function save_payment_transaction(
		$paypal_id,
		$paypal_payer_fname,
		$paypal_payer_lname,
		$paypal_payer_email,
		$paypal_payer_id,
		$paypal_currency,
		$paypal_amount,
		$paypal_payee_email,
		$paypal_payee_merchant_id,
		$paypal_reference_id,
		$paypal_status,
		$paypal_date,
		$payer_aptm_member_id, 
		$payer_aptm_member_fname,
		$payer_aptm_member_lname){

		$session = \Config\Services::session();
		$paymentModel = new MembershipFeePaymentModel();

		// datetime
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m, d, Y");

		$data = [
			't_paypal_id' => $paypal_id,
			't_paypal_payer_fname' => $paypal_payer_fname,
			't_paypal_payer_lname' => $paypal_payer_lname,
			't_paypal_payer_email' => $paypal_payer_email,
			't_paypal_payer_id' => $paypal_payer_id,
			't_paypal_currency' => $paypal_currency,
			't_paypal_amount' => $paypal_amount,
			't_paypal_payee_email' => $paypal_payee_email,
			't_paypal_payee_merchant_id' => $paypal_payee_merchant_id,
			't_paypal_reference_id' => 'aptm_official_website_membersip_payment_by_member_email_'.$paypal_reference_id,
			't_paypal_status' => $paypal_status,
			't_paypal_date' => $paypal_date,
			't_payer_aptm_member_id' => $payer_aptm_member_id
		];

		if($paymentModel->insert(esc($data))){

			// find the member that matches the name and email from the payer
			$membersModel = new MembersModel();

			$where = [
				'm_email' => $paypal_reference_id,
				'm_fname' => $payer_aptm_member_fname,
				'm_lname' => $payer_aptm_member_lname
			];
			
			$m_data = $membersModel->where($where)->orderBy('m_id', 'DESC')->findAll();

			if($m_data > 0){
				foreach($m_data as $m_datum){
					$data = ['m_membership_fee' => 'paid'];
					if($membersModel->update(esc($m_datum['m_id']), esc($data))){
						// unset($_SESSION['signed_up_m_id']);
						// unset($_SESSION['signed_up_email']);
						// unset($_SESSION['signed_up_fname']);
						// unset($_SESSION['signed_up_lname']);
						$session->destroy();
						$this->index();
					}
				}
			}
		}
	}

// x

// x
}
