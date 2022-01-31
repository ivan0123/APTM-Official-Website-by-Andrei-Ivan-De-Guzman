<?php namespace App\Controllers;

use App\Models\AnnModel;
use App\Models\NewsModel;
use App\Models\ForumModel;
use App\Models\MeetingModel;
use App\Models\MembersModel;
use App\Models\LogModel;
use App\Models\MeetingAttendeeModel;
use App\Models\NotifModel;

class AdminController extends BaseController
{

// VIEW PAGES
    public function view_home()
	{
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'Home',
				'banner_svg' => base_url().'/public/assets/images/aptm/undraw_Dashboard_re_3b76.svg',
				'banner_title' => 'Admin Panel',
				'banner_descrip' => 'This is server side page, only the admin of APTM Official Website can access this page.'
			];

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			// fetch all notif data from db
			$notifModel = new NotifModel();

			// for members online list
			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();
	
			$where_notif = ['notif_creator_id' => $session->get('l_id')];
			$data['notif_data'] = $notifModel->orderBy('notif_id', 'DESC')
								->where($where_notif)
								->findAll();
			// x

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

				// meetings count
				$meetModel = new MeetingModel();
				$data['meetings_count'] = count($meetModel->fetchdata());
				// x

				// forums count
				$forumModel = new ForumModel();
				$data['forums_count'] = count($forumModel->fetchdata());
				// x
			// xx
	
			return view('admin_pages/home', $data);
		}else{
			return view('landing_page');
		}
	}

	public function view_announcement() {
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'Announcements',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_ideas_flow_cy7b.svg',
				'b_title' => 'APTM Announcements',
				'b_descrip' => 'All records of Announcementis displayed in tables according 
								to it\'s Division. 
								</p>
								<button type="button" class="btn btn-rounded btn-primary font-18 mt-1" 
									title="click me, to create new announcement" data-bs-toggle="modal" 
									data-bs-target="#createAnn">
									<i class="uil uil-plus-circle me-1 font-18"></i>create new
								</button>'
			];
			$annModel = new AnnModel();

			$data['ann_all_data'] = $annModel->fetch_data_per_division('All Divisions');
			$data['ann_ori_data'] = $annModel->fetch_data_per_division('APTM Oriental Mindoro');
			$data['ann_occ_data'] = $annModel->fetch_data_per_division('APTM Occidental Mindoro');
			$data['ann_cal_data'] = $annModel->fetch_data_per_division('APTM Calapan City');
			$data['ann_mar_data'] = $annModel->fetch_data_per_division('APTM Marinduque');
			$data['ann_rom_data'] = $annModel->fetch_data_per_division('APTM Romblon');
			$data['ann_pal_data'] = $annModel->fetch_data_per_division('APTM Palawan');
			$data['ann_pue_data'] = $annModel->fetch_data_per_division('APTM Puerto Princesa');

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('admin_pages/announcement', $data);
		}else{
			return view('landing_page');
		}
	}

	public function view_news() {
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'News',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_newspaper_k72w.svg',
				'b_title' => 'APTM News',
				'b_descrip' => 'All records of News displayed in tables according 
								to it\'s Division. 
								</p>
								<button type="button" class="btn btn-rounded btn-primary font-18 mt-1" 
									title="click me, to create news" data-bs-toggle="modal" 
									data-bs-target="#createNews">
									<i class="uil uil-plus-circle me-1 font-18"></i>create news
								</button>'
			];
			
			// news model
			$newsModel = new NewsModel();

			$data['news_all_data'] = $newsModel->fetch_data_per_division('All Division');
			$data['news_ori_data'] = $newsModel->fetch_data_per_division('APTM Oriental Mindoro');
			$data['news_occ_data'] = $newsModel->fetch_data_per_division('APTM Occidental Mindoro');
			$data['news_cal_data'] = $newsModel->fetch_data_per_division('APTM Calapan City');
			$data['news_mar_data'] = $newsModel->fetch_data_per_division('APTM Marinduque');
			$data['news_rom_data'] = $newsModel->fetch_data_per_division('APTM Romblon');
			$data['news_pal_data'] = $newsModel->fetch_data_per_division('APTM Palawan');
			$data['news_pue_data'] = $newsModel->fetch_data_per_division('APTM Puerto Princesa');

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('admin_pages/news', $data);
		}else{
			return view('landing_page');
		}
	}

	public function view_forum() {
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'Forum',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_online_discussion_5wgl.svg',
				'b_title' => 'APTM Forum',
				'b_descrip' => 'All records of Forums displayed in tables according 
								to it\'s Division. 
								</p>'
			];
			
			// news model
			$forumModel = new ForumModel();

			$data['forum_all_data'] = $forumModel->fetch_data_per_division('All Division');
			$data['forum_ori_data'] = $forumModel->fetch_data_per_division('APTM Oriental Mindoro');
			$data['forum_occ_data'] = $forumModel->fetch_data_per_division('APTM Occidental Mindoro');
			$data['forum_cal_data'] = $forumModel->fetch_data_per_division('APTM Calapan City');
			$data['forum_mar_data'] = $forumModel->fetch_data_per_division('APTM Marinduque');
			$data['forum_rom_data'] = $forumModel->fetch_data_per_division('APTM Romblon');
			$data['forum_pal_data'] = $forumModel->fetch_data_per_division('APTM Palawan');
			$data['forum_pue_data'] = $forumModel->fetch_data_per_division('APTM Puerto Princesa');

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('admin_pages/forum', $data);
		}else{
			return view('landing_page');
		}
	}

	public function view_members() {	
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'Members',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_meet_the_team_e5b7.svg',
				'b_title' => 'APTM Members',
				'b_descrip' => 'All information of the Members is displayed in table according to it\' Division.
				                </p>
								<button type="button" class="btn btn-rounded btn-primary font-18 mt-1" 
									title="click me, to add new member" data-bs-toggle="modal" 
									data-bs-target="#addMember">
									<i class="uil uil-plus-circle me-1 font-18"></i>add Member
								</button>'
			];
			
			$membersModel = new MembersModel();

			$data['m_ori_data'] = $membersModel->fetch_data_per_division('APTM Oriental Mindoro');
			$data['m_occ_data'] = $membersModel->fetch_data_per_division('APTM Occidental Mindoro');
			$data['m_cal_data'] = $membersModel->fetch_data_per_division('APTM Calapan City');
			$data['m_mar_data'] = $membersModel->fetch_data_per_division('APTM Marinduque');
			$data['m_rom_data'] = $membersModel->fetch_data_per_division('APTM Romblon');
			$data['m_pal_data'] = $membersModel->fetch_data_per_division('APTM Palawan');
			$data['m_pue_data'] = $membersModel->fetch_data_per_division('APTM Puerto Princesa');

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x
			
			return view('admin_pages/members', $data);
		}else{
			return view('landing_page');
		}
	}

	
	public function view_activityLog() {	
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

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('admin_pages/activityLog', $data);
			
		}else{
			return view('landing_page');
		}
	}

	public function view_jitsiMeet() {
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'Jitsi Meetings',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_video_call_kxyp.svg',
				'b_title' => 'APTM Jitsi Meetings',
				'b_descrip' => 'Create webinars, meetings and discussions using Jitsi Meet API,
									using this API to build private meetings exclusively for APTM Members only. 
								</p>
								
								<button type="button" class="btn font-18 btn-primary btn-rounded mt-1" 
									title="click me, to create meeting now" data-bs-toggle="modal" 
									data-bs-target="#createGmeet">
									<i class="uil uil-video me-1"></i>create new meeting
								</button>
								'
			];
			
			$meetModel = new MeetingModel();
			$data['meet_all_data'] = $meetModel->fetch_data_per_app('Jitsi Meet');

			$attendeeModel = new MeetingAttendeeModel();
			$data['meet_att_data'] = $attendeeModel->fetchdata();

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('admin_pages/jitsiMeet', $data);
		}else{
			return view('landing_page');
		}
	}

	public function view_charts() {	
		$session = \Config\Services::session();
		if($session->get('l_id') && $session->get('l_type') == 'admin'){
			$data = [
				'meta_title' => 'Charts',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_All_the_data_re_hh4w.svg',
				'b_title' => 'Charts (Data Visualization)',
				'b_descrip' => 'To visualize data, we use different types of charts.'
			];

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			return view('admin_pages/charts', $data);
			
		}else{
			return view('landing_page');
		}
	}

// X

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

	public function record_log($log_activity){
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

// 

// SEND EMAIL FUNCTION

	public function sendMail($sendTo, $subject, $message) { 
		$email = \Config\Services::email();

		$email->setTo($sendTo);
		$email->setFrom('aptmMimaropa@gmail.com', 'APTM Official Website');
		
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

// x 

// MEMBERS PAGE 

//  CREATE NEW MEMBER ACCOUNT

    public function addMember(){

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
					'required' => 'You must input the name of School where the member was currently working.',
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
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>'.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				'<p>'.$errorMsg7.'<p>'.'</p>'.$errorMsg8.'<p>'.'</p>'.$errorMsg9.'</p>'.
				'<p>'.$errorMsg10.'<p>'.'</p>'.$errorMsg11.'<p>'.'</p>'.$errorMsg12.'</p>'.
				'<p>'.$errorMsg13.'</p>'.'<p>'.$errorMsg14.'</p>',
				'Warning !',
				'danger'
			);
			return $this->view_members();
		}
		else
		{
			
			$membersModel = new MembersModel();

			//verify if there is an existing email in db 
			$m_email = $membersModel->where('m_email', esc($postData['txtEmail']))->findAll();

			// if there's no same email form db save the info
			if(count($m_email) > 0){
				$this->alert_session(
					'The Email you provided was already used by another member, make sure if this is your email!',
					'Email Address Already Used!',
					'danger'
					);
				return $this->view_members();
			}else{
                $encrypter = \Config\Services::encrypter();

				if($postData['txtGender'] == 'Male'){
					$sample_profile_pic = base_url('public/assets/images/aptm/undraw_male_avatar_323b.svg');
				}else{
					$sample_profile_pic = base_url('public/assets/images/aptm/undraw_female_avatar_w3jk.svg');
				}

                $gen_password = substr(md5(time()), 0, 4).'-'.substr(md5(time()), 0, 8);

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
					'm_password' => bin2hex($encrypter->encrypt($gen_password)),
					'm_prc_id' => "This member is registered by Admin. PRC ID is not needed.",
					'm_profile_pic' => $sample_profile_pic,
					'm_membership_fee' => "paid",
					'm_status' => "approved"
				];

				## Insert
			    if($membersModel->insert(esc($data))){
                    $this->alert_session(
                        $postData['txtFname'].' '.$postData['txtLname'].' Account was created, an email confirmation was sent to his email: '.$postData['txtEmail'],
                        'Success !',
                        'success'
				    );

                    $this->record_log(
                        'Admin created '.$postData['txtFname'].' '.$postData['txtLname'].'\'s member account.'
                    );

                    // save notif 
                    $this->save_notif(
                        'Admin created '.$postData['txtFname'].' '.$postData['txtLname'].'\'s member account.',
                        NULL,
                        $postData['txt_division'],
                        'member_treasurer',
                        NULL
                    );
              
                    // send confirmation email to the user
                    $this->sendMail(
                        $postData['txtEmail'],
                        'APTM Official Website\'s Admin created your Member Account.',
                        'Good Day '.$postData['txtFname'].' '.$postData['txtLname'].
                        '. Thank you for your cooperation, your account was created successfully.
                        After answering the registration google form, we immediately created your account. 
                        You can now login your account to the website using your email and this 
                        random generated password:'.$gen_password.'
                        You can access the website through this link: www.aptm.online'
                    );

                    return $this->view_members();		
                }	
			}
		}

	}

// x

// DELETE MEMBER

	public function deleteMember(){
		$session = \Config\Services::session();

		// identify if the user role is admin
		if($session->get('l_type') == 'admin'){
			$membersModel = new MembersModel();

			$timezone = "Asia/Manila";
			date_default_timezone_set($timezone);
			$date_now = date("h:i a  m/d/Y");

			$request = service('request');
			$postData = $request->getPost();

			if($membersModel->where('m_id', $postData['txt_d_id'])->delete()){
				$this->alert_session(
					'Member Account has been deleted, his/her information can\'t be retrieve back !',
					'Deleted!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log(
					'Deleted the Member\'s Account of'.' '
					.$postData['txt_d_fname'].' '.$postData['txt_d_lname']
				);
				
				return $this->view_members();
			}
		}else{
			$this->alert_session(
				'This action is strictly for admin access only.',
				'Invalid Action !',
				'danger'
			);
			return $this->view_members();
		}
	}

// X

// MAKE APTM TREASURER

	public function make_aptm_treasurer($m_division_table){
		$session = \Config\Services::session();
		$membersModel = new MembersModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($session->get('l_type') == 'admin'){
			$data = ['m_type' => 'treasurer'];

			$where = "m_type='treasurer' AND m_division='$m_division_table'";
	
			$member_info = $membersModel->where($where)->findAll();
			if(count($member_info) == 1){
				$this->alert_session(
					'There was an existing treasurer in '.$postData['txt_m_division'],
					'Warning !',
					'danger'
				);
				return $this->view_members();
			}else{
				if($membersModel->update(esc($postData['txt_m_id']), esc($data))){
					$this->alert_session(
						$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
							' is the new Treasurer for'.' '.$postData['txt_m_division'].' !',
						'Success!',
						'success'
					);
		
					// record log (initialize the record log method)
					$this->record_log(
						'Choosed '.$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
						' as a Treasurer of '.' '.$postData['txt_m_division']
					);
	
					// save notif 
					$this->save_notif(
						'The Admin Appointed you to become'.
						' a Treasurer of '.' '.$postData['txt_m_division'],
						'pages/treasurerTask',
						$postData['txt_m_division'],
						'treasurer'.$postData['txt_m_id'],
						NULL
	
					);
					
					return $this->view_members();
				}
			}
		}else{
			$this->alert_session(
				'This action is strictly for admin access only.',
				'Invalid Action !',
				'danger'
			);
			return $this->view_members();
		}
	}

// X

// APPROVE APTM MEMBER ACCOUNT

	public function approveMember(){
		$membersModel = new MembersModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($session->get('l_type') == 'admin'){
			// if(esc($postData['txt_m_membership']) == 'unpaid'){
			// 	$this->alert_session(
			// 		$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
			// 			'\'s account was not yet paid for the Membership Fee !',
			// 		'Warning!',
			// 		'danger'
			// 	);
			// 	return $this->view_members();
			// }else{

				// approve the account registration
				$data = ['m_status' => 'approved'];
	
				if($membersModel->update(esc($postData['txt_m_id']), esc($data))){
					$this->sendMail(
						$postData['txt_m_email'],
						'Account Registration Verified and Approved.',
						'Good Day '.$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
						'.This is APTM Official Website your account registration has been 
						verified and approved. Please pay for the Membership Fee to your 
						division treasurer. You cannot login your account while your not paid for
						the Membership Fee. This is our website link: www.aptm.online'
					);
					
					$this->alert_session(
						$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
							'\'s account has been approved !',
						'Success!',
						'success'
					);
		
					// record log (initialize the record log method)
					$this->record_log(
						'Admin approved the account registration of '
						.$postData['txt_m_fname'].' '.$postData['txt_m_lname'].
						'of'.'<br>'.$postData['txt_m_division']
					);
	
					// save notif 
					$this->save_notif(
						'The Admin Approved your account registration.',
						'pages/home',
						$postData['txt_m_division'],
						'member_treasurer'.$postData['txt_m_id'],
						NULL
					);
					
					return $this->view_members();
				}
			//}
		}else{
			$this->alert_session(
				'This action is strictly for admin access only.',
				'Invalid Action !',
				'danger'
			);
			return $this->view_members();
		}
	}

// X

// XX

// ACTIVITY LOG PAGE

// DELETE ACTIVITY

	public function deleteActivity(){
		$logModel = new LogModel();
		$request = service('request');
		$postData = $request->getPost();
		$session = \Config\Services::session();

		if($session->get('l_type') == 'admin'){
			if($logModel->where('log_id', $postData['txt_d_id'])->delete()){
				$this->alert_session(
					'Activity Log has been deleted!',
					'Deleted!',
					'success'
				);
				return $this->view_activityLog();
			}
		}else{
			$this->alert_session(
				'This action is strictly for admin access only.',
				'Invalid Action !',
				'danger'
			);
			return $this->view_activityLog();
		}
	}

// X

// XX

// ANNOUNCEMENT METHODS

// CREATE NEW ANNOUNCEMENT

	public function createAnn(){

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
			'txtWho' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the respondents of your announcement.',
				]
			],
			'txtWhere' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the place.',
				]
			],
			'txtDate' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the date when it will happen.',
				]
			],
			'txtDivision' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the APTM Division.',
				]
			],
			'txtWhat' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input what is your announcement content.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtWho');
			$errorMsg2 = $validation->getError('txtWhere');
			$errorMsg3 = $validation->getError('txtDate');
			$errorMsg5 = $validation->getError('txtDivision');
			$errorMsg6 = $validation->getError('txtWhat');
			$errorMsg7 = $validation->getError('txtImage');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				'<p>'.$errorMsg7,
				'Warning !',
				'danger'
			);
			return $this->view_announcement();
		}
		else
		{
			$annModel = new AnnModel();

			
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/announcement/";
					$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtImage"]["name"]));
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["btn_publish"])) {
						$check = getimagesize($_FILES["txtImage"]["tmp_name"]);
						if($check !== false) {
							$uploadOk = 1;
						} else {
							$this->alert_session(
								'File is not an image.',
								'Error!',
								'danger'
							);
							return $this->view_announcement();
							$uploadOk = 0;
						}
					}
					// Check file size
					if ($_FILES["txtImage"]["size"] > 500000) {
						$this->alert_session(
							'Sorry, your image file size is too large, please choose an image below 500KB file size.',
							'Error!',
							'danger'
						);
						return $this->view_announcement();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_announcement();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your image was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_announcement();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtImage"]["name"]);

							$data = [
								'ann_content_who' => $postData['txtWho'],
								'ann_content_when_date' => $postData['txtDate'],
								'ann_content_where' => $postData['txtWhere'],
								'ann_content_what' => $postData['txtWhat'],
								'ann_image' => base_url().'/public/uploads/announcement/'.$img_filename,
								'ann_division' => $postData['txtDivision'],
								'ann_time_created' => $date_now,
								'ann_creator_id' => $session->get('l_id')
							];

							## Insert
							if($annModel->insert(esc($data))){
								$this->alert_session(
								'Announcement has been Published!',
								'Success !',
								'success'
								);

								// record log (initialize the record log method)
								$this->record_log(
									'Admin created new Announcement: '.$postData['txtWhat'].' for '.$postData['txtDivision']
								);

								// save notif 
								$this->save_notif(
									'Admin created new Announcement: '.$postData['txtWhat'].' for '.$postData['txtDivision'],
									'pages/announcementSingle',
									$postData['txtDivision'],
									'member_treasurer',
									$postData['txtWhat']
								);

								return $this->view_announcement();
							}else{
								$this->alert_session(
								'Something went wrong, please try again!',
								'Warning !',
								'danger'
								);
							return $this->view_announcement();
							}

						} else {
							$this->alert_session(
								'Sorry, there was an error uploading the image, please try again.',
								'Error !',
								'danger'
							);
							return $this->view_announcement();
						}
					}
				}
		}
	}
// x

// UNPUBLISH ANNOUNCEMENT

	public function unpublishAnn(){
		$annModel = new AnnModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = ['ann_status' => 'unpublish'];

		if($annModel->update(esc($postData['txt_ann_id']), esc($data))){
			$this->alert_session(
				'Announcement has been unpublished !',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Announcement with id '.$postData['txt_ann_id'].' was unpublished.'
			);
			
			return $this->view_announcement();
		}
	}

// x

// PUBLISH ANNOUNCEMENT

	public function publishAnn(){
		$annModel = new AnnModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = ['ann_status' => 'published'];

		if($annModel->update(esc($postData['txt_ann_id']), esc($data))){
			$this->alert_session(
				'Announcement has been re-published !',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Announcement with id '.$postData['txt_ann_id'].' was re-published.'
			);
			
			return $this->view_announcement();
		}
	}

// x

// EDIT ANNOUNCEMENT

	public function editAnn(){

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
			'txtWho_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the respondents of your announcement.',
				]
			],
			'txtWhere_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the place.',
				]
			],
			'txtDate_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the date when it will happen.',
				]
			],
			'txtDivision_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the APTM Division.',
				]
			],
			'txtWhat_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input what is your announcement content.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtWho');
			$errorMsg2 = $validation->getError('txtWhere');
			$errorMsg3 = $validation->getError('txtDate');
			$errorMsg5 = $validation->getError('txtDivision');
			$errorMsg6 = $validation->getError('txtWhat');
			$errorMsg7 = $validation->getError('txtImage');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'
				.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				'<p>'.$errorMsg7,
				'Warning !',
				'danger'
			);
			return $this->view_announcement();
		}
		else
		{
			$annModel = new AnnModel();

			
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/announcement/";
					$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtImage_e"]["name"]));
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["btn_publish"])) {
						$check = getimagesize($_FILES["txtImage_e"]["tmp_name"]);
						if($check !== false) {
							$uploadOk = 1;
						} else {
							$this->alert_session(
								'File is not an image.',
								'Error!',
								'danger'
							);
							return $this->view_announcement();
							$uploadOk = 0;
						}
					}
					// Check file size
					if ($_FILES["txtImage_e"]["size"] > 500000) {
						$this->alert_session(
							'Sorry, your image file size is too large, please choose an image below 500KB file size.',
							'Error!',
							'danger'
						);
						return $this->view_announcement();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_announcement();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your image was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_announcement();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtImage_e"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtImage_e"]["name"]);

							$data = [
								'ann_content_who' => $postData['txtWho_e'],
								'ann_content_when_date' => $postData['txtDate_e'],
								'ann_content_where' => $postData['txtWhere_e'],
								'ann_content_what' => $postData['txtWhat_e'],
								'ann_image' => base_url().'/public/uploads/announcement/'.$img_filename,
								'ann_division' => $postData['txtDivision_e'],
								'ann_time_updated' => $date_now,
								'ann_creator_id' => $session->get('l_id')
							];

							## Insert
							if($annModel->update(esc($postData['txt_ann_id_e']), $data)){
								$this->alert_session(
								'Announcement has been Edited',
								'Success !',
								'success'
								);

								// record log (initialize the record log method)
								$this->record_log(
									'Admin edited his announcement to: 
									'.htmlspecialchars_decode($postData['txtWhat_e']).'  for '.$postData['txtDivision_e'].
									' posted at '.date("h:i a  m/d/Y", strtotime($postData['txtDate_e'])).'.'
								);

								// save notif 
								$this->save_notif(
									'Admin edited his announcement to: 
									'.htmlspecialchars_decode($postData['txtWhat_e']).'  for '.$postData['txtDivision_e'].
									' posted at '.date("h:i a  m/d/Y", strtotime($postData['txtDate_e'])).'.',
									'pages/announcementSingle',
									$postData['txtDivision_e'],
									'member_treasurer',
									$postData['txt_ann_id_e']
								);

								return $this->view_announcement();
							}else{
								$this->alert_session(
								'Something went wrong, please try again!',
								'Warning !',
								'danger'
								);
							return $this->view_announcement();
							}

						} else {
							$this->alert_session(
								'Sorry, there was an error uploading the image, please try again.',
								'Error !',
								'danger'
							);
							return $this->view_announcement();
						}
					}
				}
		}
	}
	// x


// X

// DELETE ANNOUNCEMENT

	public function deleteAnn(){
		$annModel = new AnnModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($annModel->where('ann_id', $postData['txt_ann_id_d'])->delete()){
			$this->alert_session(
				'Announcement has been deleted, it can\'t be retrieve back !',
				'Deleted!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Deleted the Announcement: '
				.htmlspecialchars_decode($postData['txt_ann_what_d']).' '.'posted at '
				.date("h:i a  m/d/Y", strtotime($postData['txt_ann_when_d'])).'.'
			);

			
			
			return $this->view_announcement();
		}
	}

// X

// XX


// NEWS METHODS

// CREATE NEWS

	public function createNews(){

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
			'txtHeadline' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input Headline for News.',
				]
			],
			'txtCategory' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input News Category.',
				]
			],
			'txtDivision' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the APTM Division.',
				]
			],
			'txtContent' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input what is your announcement content.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtHeadline');
			$errorMsg2 = $validation->getError('txtCategory');
			$errorMsg3 = $validation->getError('txtDivision');
			$errorMsg4 = $validation->getError('txtContent');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>',
				'Warning !',
				'danger'
			);
			return $this->view_news();
		}
		else
		{
			$newsModel = new NewsModel();

			
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/news/";
					$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtImage"]["name"]));
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["btn_publish"])) {
						$check = getimagesize($_FILES["txtImage"]["tmp_name"]);
						if($check !== false) {
							$uploadOk = 1;
						} else {
							$this->alert_session(
								'File is not an image.',
								'Error!',
								'danger'
							);
							return $this->view_news();
							$uploadOk = 0;
						}
					}
					// Check file size
					if ($_FILES["txtImage"]["size"] > 500000) {
						$this->alert_session(
							'Sorry, your image file size is too large, please choose an image below 500KB file size.',
							'Error!',
							'danger'
						);
						return $this->view_news();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_news();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your image was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_news();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtImage"]["name"]);

							$data = [
								'news_title' => $postData['txtHeadline'],
								'news_content' => $postData['txtContent'],
								'news_image' => base_url().'/public/uploads/news/'.$img_filename,
								'news_category' => $postData['txtCategory'],
								'news_division' => $postData['txtDivision'],
								'news_status' => 'published',
								'news_time_created' => $date_now,
								'news_creator_id' => $session->get('l_id')
							];

							## Insert
							if($newsModel->insert(esc($data))){
								$this->alert_session(
								'News has been created and published!',
								'Success !',
								'success'
								);

								// record log (initialize the record log method)
								$this->record_log(
									'Created new News Content with Headline: '.$postData['txtHeadline']
									.' for '.$postData['txtDivision']
								);

								// save notif 
								$this->save_notif(
									'Admin written news with headline: '.$postData['txtHeadline'].' for '.$postData['txtDivision'],
									'pages/newsSingle',
									$postData['txtDivision'],
									'member_treasurer',
									$postData['txtHeadline']
								);

								return $this->view_news();
							}else{
								$this->alert_session(
								'Something went wrong, please try again!',
								'Warning !',
								'danger'
								);
							return $this->view_news();
							}

						} else {
							$this->alert_session(
								'Sorry, there was an error uploading the image, please try again.',
								'Error !',
								'danger'
							);
							return $this->view_news();
						}
					}
				}
		}
	}	

// x

// UNPUBLISH NEWS

	public function unpublishNews(){
		$newsModel = new NewsModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['news_status' => 'unpublish'];

		if($newsModel->update(esc($postData['txt_news_id']), esc($data))){
			$this->alert_session(
				'News with headline: | '.$postData['txt_news_head'].' | has been unpublished.',
				'Success!',
				'primary'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'News with headline '.$postData['txt_news_head']
				.' in'.$postData['txt_m_division'].' was unpublished.'
			);
			
			return $this->view_news();
		}
	}

// x

// PUBLISH NEWS

	public function publishNews(){
		$newsModel = new NewsModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['news_status' => 'published'];

		if($newsModel->update(esc($postData['txt_news_id']), esc($data))){
			$this->alert_session(
				'News with headline: | '.$postData['txt_news_head'].' | has been re-published.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'News with headline '.$postData['txt_news_head']
				.' in'.$postData['txt_m_division'].' has been re-published.'
			);
			
			return $this->view_news();
		}
	}

// x

// EDIT NEWS

	public function editNews(){

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
			'txtHeadline_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input Headline for News.',
				]
			],
			'txtCategory_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input News Category.',
				]
			],
			'txtDivision_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the APTM Division.',
				]
			],
			'txtContent_e' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input what is your announcement content.',
				]
			]
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtHeadline_e');
			$errorMsg2 = $validation->getError('txtCategory_e');
			$errorMsg3 = $validation->getError('txtDivision_e');
			$errorMsg4 = $validation->getError('txtContent_e');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>',
				'Warning !',
				'danger'
			);
			return $this->view_news();
		}
		else
		{
			$newsModel = new NewsModel();

			
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/news/";
					$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtImage_e"]["name"]));
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["btn_publish"])) {
						$check = getimagesize($_FILES["txtImage_e"]["tmp_name"]);
						if($check !== false) {
							$uploadOk = 1;
						} else {
							$this->alert_session(
								'File is not an image.',
								'Error!',
								'danger'
							);
							return $this->view_news();
							$uploadOk = 0;
						}
					}
					// Check file size
					if ($_FILES["txtImage_e"]["size"] > 500000) {
						$this->alert_session(
							'Sorry, your image file size is too large, please choose an image below 500KB file size.',
							'Error!',
							'danger'
						);
						return $this->view_news();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_news();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your image was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_news();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtImage_e"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtImage_e"]["name"]);

							$data = [
								'news_title' => $postData['txtHeadline_e'],
								'news_content' => $postData['txtContent_e'],
								'news_image' => base_url().'/public/uploads/news/'.$img_filename,
								'news_category' => $postData['txtCategory_e'],
								'news_division' => $postData['txtDivision_e'],
								'news_time_updated' => $date_now,
								'news_creator_id' => $session->get('l_id')
							];

							## Insert
							if($newsModel->update(esc($postData['txt_news_id_e']),$data)){
								$this->alert_session(
								'News has been Edited!',
								'Success !',
								'success'
								);

								// record log (initialize the record log method)
								$this->record_log(
									'Edited News Content with Headline: '.$postData['txtHeadline_e']
									.' for '.$postData['txtDivision_e']
								);

								// save notif 
								$this->save_notif(
									'Admin edited his written news with headline: '.$postData['txtHeadline_e'].
									' for '.$postData['txtDivision_e'],
									'pages/newsSingle',
									$postData['txtDivision_e'],
									'member_treasurer',
									$postData['txt_news_id_e']
								);

								return $this->view_news();
							}else{
								$this->alert_session(
								'Something went wrong, please try again!',
								'Warning !',
								'danger'
								);
							return $this->view_news();
							}

						} else {
							$this->alert_session(
								'Sorry, there was an error uploading the image, please try again.',
								'Error !',
								'danger'
							);
							return $this->view_news();
						}
					}
				}
		}
	}	

// x

// DELETE NEWS

	public function deleteNews(){
		$newsModel = new NewsModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($newsModel->where('news_id', $postData['txt_news_id_d'])->delete()){
			$this->alert_session(
				'News with headline: | '.$postData['txt_news_head'].' | has been deleted.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'News with headline '.$postData['txt_news_head']
				.' in'.$postData['txt_m_division'].' has been deleted.'
			);
			
			return $this->view_news();
		}
	}

// X

// XX

// FORUM METHODS

// APPROVE FORUM

	public function approveForum(){
		$forumModel = new ForumModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['forum_status' => 'published'];

		if($forumModel->update(esc($postData['txt_forum_id']), esc($data))){
			$this->alert_session(
				'Forum with Content: | '.htmlspecialchars_decode($postData['txt_forum_content']).
				' for '.$postData['txt_division']
				.' | has been approved.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Forum with Content: | '.htmlspecialchars_decode($postData['txt_forum_content']).
				' for '.$postData['txt_division']
				.' | has been approved.'
			);

			// save notif 
			$this->save_notif(
				'Admin approved your forum: '.$postData['txt_forum_content'].' for '.
				$postData['txt_division'],
				'pages/forumSingle',
				$postData['txt_division'],
				'member_treasurer',
				$postData['txt_forum_id']
			);
			
			return $this->view_forum();
		}
	}

// x

// DELETE FORUM

	public function deleteForum(){
		$forumModel = new ForumModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		if($forumModel->where('forum_id', $postData['txt_forum_id_d'])->delete()){
			$this->alert_session(
				'Forum with Content: | '.htmlspecialchars_decode($postData['txt_forum_content']).' for '.
				$postData['txt_division']
				.' | has been deleted.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Forum with Content: | '.htmlspecialchars_decode($postData['txt_forum_content']).' for '.
				$postData['txt_division']
				.' | has been deleted.',
			);

			// save notif 
			$this->save_notif(
				'Admin deleted your forum: '.$postData['txt_forum_content'].
				' for '.$postData['txt_division'].
				' because it contains inappropriate subject.',
				'pages/forumSingle',
				$postData['txt_division'],
				'member_treasurer',
				$postData['txt_forum_id_d']
			);
			
			return $this->view_forum();
		}
	}

// x

// XX

//

// SAVE JITSI MEET 

	public function createJitsi(){

		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("Y-m-d\TH:i");

		// post request
		$request = service('request');
		$postData = $request->getPost();

		$error = $this->validate([
			'txtTitle' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the Title.',
				]
			],
			'txtWho' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the respondents of your announcement.',
				]
			],
			'txtDivision' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the APTM Division.',
				]
			],
			'txtWhat' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input atleast short description.',
				]
			],
			'txtDurationH' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the Duration Hours of the Meeting.',
				]
			],
			'txtDurationM' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the Duration Minutes of the Meeting.',
				]
			],
			'txtDate' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'You must input the Date where the Meeting is schedule to.',
				]
			],
		]);
			
		if(!$error)
		{
			$errorMsg1 = $validation->getError('txtTitle');
			$errorMsg2 = $validation->getError('txtWho');
			$errorMsg3 = $validation->getError('txtWhere');
			$errorMsg4 = $validation->getError('txtDivision');
			$errorMsg5 = $validation->getError('txtWhat');
			$errorMsg6 = $validation->getError('txtImage');
			$errorMsg7 = $validation->getError('txtDurationH');
			$errorMsg8 = $validation->getError('txtDurationM');
			$errorMsg9 = $validation->getError('txtDate');
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>'.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				$errorMsg7.'</p>'.'<p>'.$errorMsg8.'</p>'.'<p>'.$errorMsg9.'</p>', 
				'Warning !',
				'danger'
			);
			return $this->view_jitsiMeet();
		}
		else
		{
			$meetingModel = new MeetingModel();

			
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/jitsi/";
					$target_file = $target_dir . htmlspecialchars(basename($_FILES["txtImage"]["name"]));
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["btn_start"])) {
						$check = getimagesize($_FILES["txtImage"]["tmp_name"]);
						if($check !== false) {
							$uploadOk = 1;
						} else {
							$this->alert_session(
								'File is not an image.',
								'Error!',
								'danger'
							);
							return $this->view_jitsiMeet();
							$uploadOk = 0;
						}
					}
					// Check file size
					if ($_FILES["txtImage"]["size"] > 500000) {
						$this->alert_session(
							'Sorry, your image file size is too large, please choose an image below 500KB file size.',
							'Error!',
							'danger'
						);
						return $this->view_jitsiMeet();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_jitsiMeet();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your image was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_jitsiMeet();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtImage"]["name"]);
							
							// $meet_id = substr(number_format(time() * rand(),0,'',''),0,11);
							$meet_durationH = $postData['txtDurationH'];
							$meet_durationM = $postData['txtDurationM'];

							// duration in minutes
							$meet_duration = ($meet_durationH * 60) + $meet_durationM;
							$meet_pass = 'AP-'.substr(md5(time()), 0, 15);

							// if the duration inputed by admin is 0, restrict the creation of meeting
							if($meet_durationH == 0 && $meet_durationM == 0){
								$this->alert_session(
									'Can\'t create your meeting, You must choose how many hours and minutes is your meeting!',
									'Warning !',
									'danger'
								);
								return $this->view_jitsiMeet();
							}else{
								// put random string to title for jitsi link
								$meet_link = $postData['txtTitle'].'-'.$meet_pass;

								$data = [
									'meet_zoom_id' => 'null',
									'meet_title' => $postData['txtTitle'],
									'meet_content_who' => $postData['txtWho'],
									'meet_content_where' => 'Jitsi Meet',
									'meet_content_what' => $postData['txtWhat'],
									'meet_division' => $postData['txtDivision'],
									'meet_duration' => $meet_duration, // in minutes
									'meet_image' => base_url().'/public/uploads/jitsi/'.$img_filename,
									'meet_link' => 'https://meet.jit.si/'.$meet_link,
									'meet_password' => $meet_pass,
									'meet_status' => 'Scheduled',
									'meet_time_started' => $postData['txtDate'],
									'meet_time_created' => $date_now,
									'meet_creator_id' => $session->get('l_id')
								];

								// save the meeting
								## Insert
								if($meetingModel->insert(esc($data))){
									$this->alert_session(
										'Your meeting was created ! Please start your meeting 
											on your scheduled date and time.',
										'Meeting Scheduled !',
										'success'
									);

									return $this->view_jitsiMeet();

									// record log (initialize the record log method)
									$this->record_log(
										'Created new Jitsi Meeting titled '.$postData['txtTitle'].
										' for '.$postData['txtDivision'].' scheduled to '.$date_now
									);

									// save notif 
									$this->save_notif(
										'Admin created new Jitsi Meeting : '.$postData['txtTitle'].' for '.$postData['txtDivision'],
										'pages/jitsiMeetSingle',
										$postData['txtDivision'],
										'member_treasurer',
										$meet_pass
									);
								}else{
									$this->alert_session(
										'Something went wrong, please try again!',
										'Warning !',
										'danger'
									);
									return $this->view_jitsiMeet();
								}
							}
						} else {
							$this->alert_session(
								'Sorry, there was an error uploading the image, please try again.',
								'Error !',
								'danger'
							);
							return $this->view_jitsiMeet();
						}
					}
				}
		}
	}

// x

// UPDATE THE MEET STATUS TO MEETING OVER - END JITSI MEETING
	public function endJitsiMeet(){
		$meetingModel = new MeetingModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		$data = [
			'meet_status' => 'Ended',
			'meet_room_status' => 'Close'
		];

		if($meetingModel->update(esc($postData['txt_id']), esc($data))){
			$this->alert_session(
				'Meeting has been Ended !',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Ended the Meeting Entitled: '.$postData['txt_title'].' for '.$postData['txt_division']
			);

			// save notif 
			$this->save_notif(
				'Admin ended the Jitsi Meeting : '.$postData['txt_title'].' for '.$postData['txt_division'],
				'pages/jitsiMeetSingle',
				$postData['txt_division'],
				'member_treasurer',
				$postData['txt_id']
			);
			return $this->view_jitsiMeet();
		}
	}
// x

// DELETE JITSI MEETING
	public function deleteJitsiMeet() {
		// delete meeting from the db
		$meetingModel = new MeetingModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		if($meetingModel->where('meet_id', $postData['txt_id'])->delete()){
			$this->alert_session(
				'Jitsi Meeting has been Deleted !',
				'Deleted!',
				'success'
			);
			// record log (initialize the record log method)
			$this->record_log(
				'Deleted the Jitsi Meeting Entitled '.$postData['txt_title'].'.'
			);

			// save notif 
			$this->save_notif(
				'Admin deleted the Jitsi Meeting : '.$postData['txt_title'].' for '.$postData['txt_division'],
				'pages/jitsiMeetSingle',
				$postData['txt_division'],
				'member_treasurer',
				$postData['txt_id']
			);
				
			return $this->view_jitsiMeet();
		}
		
	}
// x

// OPEN JITSI MEETING ROOM

	public function openMeetingRoom(){
		$meetingModel = new MeetingModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['meet_room_status' => 'Open'];

		if($meetingModel->update(esc($postData['txt_meet_id']), esc($data))){
			$this->alert_session(
				'Jitsi Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Opened.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Jitsi Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Opened.'
			);

			// save notif 
			$this->save_notif(
				'Jitsi Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Opened.',
				'pages/jitsiMeet',
				$postData['txt_meet_division'],
				'member_treasurer',
				$postData['txt_meet_id']
			);
			
			return $this->view_jitsiMeet();
		}
	}

// x

// CLOSE JITSI MEETING ROOM

	public function closeMeetingRoom(){
		$meetingModel = new MeetingModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['meet_room_status' => 'Closed'];

		if($meetingModel->update(esc($postData['txt_meet_id']), esc($data))){
			$this->alert_session(
				'Jitsi Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Closed.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Jitsi Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Closed.'
			);

			// save notif 
			$this->save_notif(
				'Jitsi Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Closed.',
				'pages/jitsiMeet',
				$postData['txt_meet_division'],
				'member_treasurer',
				$postData['txt_meet_id']
			);
			
			return $this->view_jitsiMeet();
		}
	}

// x

//

// OPEN JITSI MEETING ONCE IT WAS STARTED

	public function openMeetingRoomOnceStart($meet_id, $meet_title, $meet_division){
		$meetingModel = new MeetingModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['meet_room_status' => 'Open', 'meet_status' => 'Ongoing'];

		if($meetingModel->update(esc($meet_id), esc($data))){
			$this->alert_session(
				'Jitsi Meeting Room with title: | '.$meet_title.
				' for '.$meet_division
				.' | has been Opened.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Jitsi Meeting Room with title: | '.$meet_title.
				' for '.$meet_division
				.' | has been Opened.'
			);

			// save notif 
			$this->save_notif(
				'Jitsi Meeting Room with title: | '.$meet_title.
				' for '.$meet_division
				.' | has been Opened.',
				'pages/jitsiMeet',
				$meet_division,
				'member_treasurer',
				$meet_id
			);
		}
	}

// x

}// class end bracket