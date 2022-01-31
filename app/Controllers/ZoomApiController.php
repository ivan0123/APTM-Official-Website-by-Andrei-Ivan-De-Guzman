<?php namespace App\Controllers;

use App\Models\MeetingModel;
use App\Models\MembersModel;
use App\Models\LogModel;
use App\Models\NotifModel;
use App\Models\MeetingAttendeeModel;

// call the file for zoom api integration
// require_once base_url()."/public_html/vendor/autoload.php";
require('vendor/autoload.php');

 
// call the file Firebase - php plugin that helps to integrate zoom api
use \Firebase\JWT\JWT;

// call the file GuzzleHttp - php plugin that helps to send cURL request to zoom API
use GuzzleHttp\Client;
 
// pass to constant vars
// my zoom app - generated zoom api key and secret key
define('ZOOM_API_KEY', 'y3h4kiamSVCan9AGG5LBdA');
define('ZOOM_SECRET_KEY', '0wkS0YxRbb18MK584nvn6EVtTKZOqebPrFnP');


class ZoomApiController extends BaseController
{

// VIEW PAGE
    public function view_zoom() {
		$session = \Config\Services::session();
		if($session->get('l_id')){
			$data = [
				'meta_title' => 'Zoom Meetings',
				'b_svg' => base_url().'/public/assets/images/aptm/undraw_Video_call_re_4p26.svg',
				'b_title' => 'APTM Zoom Meetings',
				'b_descrip' => 'Create webinars, meetings and discussions using Zoom API,
									using this API to create meetings exclusively for APTM Members only. 
								</p>
								
								<button type="button" class="btn font-18 btn-primary btn-rounded mt-1" 
									title="click me, to create meeting now" data-bs-toggle="modal" 
									data-bs-target="#createZmeet">
									<i class="uil uil-video me-1"></i>create new meeting
								</button>
								'
			];
			
			$meetModel = new MeetingModel();
			$data['meet_all_data'] = $meetModel->fetch_data_per_app('Zoom');

			$membersModel = new MembersModel();
			$data['m_data'] = $membersModel->fetchdata();

			// count of not seen notif
			$notifModel = new NotifModel();
			$data['not_seen_notif_count'] = $notifModel->countNotSeen();
			// x

			$attendeeModel = new MeetingAttendeeModel();
			$data['meet_att_data'] = $attendeeModel->fetchdata();

			return view('admin_pages/zoom', $data);
		}else{
			return view('landing_page');
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
			'notif_data_id' => $data_id
		];

		$notifModel->insert(esc($notif));
	}

// 

// ZOOM MEETINGS METHODS

// CREATE INSTANT MEETING

	// to access zoom token
	public function getZoomAccessToken() {
		$key = ZOOM_SECRET_KEY;
		$payload = array(
			"iss" => ZOOM_API_KEY,
			'exp' => time() + 3600,
		);
		return JWT::encode($payload, $key);    
	}

	public function createZoom(){

		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();

		// time
		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date = date("m/d/Y");
		$time = date("h:i a");
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
			]
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
			
			$this->alert_session(
				'<p>'.$errorMsg1.'</p>'.'<p>'.$errorMsg2.'</p>'.'<p>'.$errorMsg3.'</p>'.
				'<p>'.$errorMsg4.'</p>'.'<p>'.$errorMsg5.'</p>'.'<p>'.$errorMsg6.'</p>'.
				$errorMsg7.'</p>'.'<p>'.$errorMsg8.'</p>',
				'Warning !',
				'danger'
			);
			return $this->view_zoom();
		}
		else
		{
			$meetingModel = new MeetingModel();

			
				// UPLOAD IMAGE IF THERE IS NO ERROR
				if($_POST){
					$target_dir = "public/uploads/zoom/";
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
							return $this->view_zoom();
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
						return $this->view_zoom();
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						$this->alert_session(
							'Sorry, only JPG, JPEG, PNG image file extension are allowed.',
							'Error!',
							'danger'
						);
						return $this->view_zoom();
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->alert_session(
							'Sorry, your image was not uploaded. Please try again.',
							'Error!',
							'danger'
						);
						return $this->view_zoom();
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
							// insert the data
							$img_filename = basename( $_FILES["txtImage"]["name"]);

							// create zoom meeting code
							$client = new Client([
								// Base URI is used with relative requests
								'base_uri' => 'https://api.zoom.us',
							]);
							
							// $meet_id = substr(number_format(time() * rand(),0,'',''),0,11);
							$meet_title = $postData['txtTitle'];
							$meet_agenda = $postData['txtWhat'];
							$meet_durationH = $postData['txtDurationH'];
							$meet_durationM = $postData['txtDurationM'];

							// duration in minutes
							$meet_duration = ($meet_durationH * 60) + $meet_durationM;
							$meet_pass = substr(md5(time()), 0, 3).'-'.substr(md5(time()), 0, 6);

							// if the duration inputed by admin is 0, restrict the creation of meeting
							if($meet_durationH == 0 && $meet_durationM == 0){
								$this->alert_session(
									'Can\'t create your meeting, You must choose how many hours and minutes for your meeting!',
									'Warning !',
									'danger'
								);
								return $this->view_zoom();
							}else{
								// creation of the meeting
								// send request to zoom app to create meeting
								$response = $client->request('POST', '/v2/users/me/meetings', [
									"headers" => [
										"Authorization" => "Bearer " . $this->getZoomAccessToken()
									],
									'json' => [
										"topic" => $meet_title,
										"agenda" => $meet_agenda,
										"type" => 2,
										"start_time" => "2021-01-30T20:30:00",
										"duration" => $meet_duration, // in minutes
										"password" => $meet_pass
									],
								]);
							 
								// pass the json vars to zoom app
								$data = json_decode($response->getBody());
								// generate meeting url
								$join_url = $data->join_url;
								// meeting password
								$join_pass = $data->password;
								$meet_id = $data->id;
								
								$data = [
									'meet_zoom_id' => $meet_id,
									'meet_title' => $meet_title,
									'meet_content_who' => $postData['txtWho'],
									'meet_content_where' => 'Zoom',
									'meet_content_what' => $postData['txtWhat'],
									'meet_division' => $postData['txtDivision'],
									'meet_duration' => $postData['txtDurationH'].' h '.$postData['txtDurationM'].' min',
									'meet_image' => base_url().'/public/uploads/zoom/'.$img_filename,
									'meet_link' => $join_url,
									'meet_password' => $join_pass,
									'meet_status' => 'Ongoing',
									'meet_time_started' => $date.' '.$time,
									'meet_time_created' => $date.' '.$time,
									'meet_creator_id' => $session->get('l_id')
								];
	
								// save the meeting
								## Insert
								if($meetingModel->insert(esc($data))){
									// display alert msg with join meeting url
									echo '<div id="msg_alert" class="alert modal-filled bg-success card fade show" role="alert">
											<i class="uil-video h1 mt-2"></i>
											<h4 id="msg_head" class="mt-2">Zoom Meeting was Created</h4>
												<a href="'.$join_url.'" class="btn btn-light m-2" 
                                                	title="click to launch this meeting">Launch Meeting Now
                                                </a>
											<hr>
											<small class="mb-0">APTM Official Website</small>
										</div>
									<div class="alert_backdrop"></div>';

									return $this->view_zoom();

									// record log (initialize the record log method)
									$this->record_log(
										'Created new Zoom Meeting titled '.$postData['txtTitle'].
										' for '.$postData['txtDivision'].' scheduled to '.$date.' '.$time
									);

									// save notif 
									$this->save_notif(
										'Admin created a Jitsi Meeting : '.$postData['txtTitle'].' for '.$postData['txtDivision'],
										'pages/zoomMeetSingle',
										$postData['txtDivision'],
										'member_treasurer',
										$join_pass
									);

								}else{
									$this->alert_session(
									'Something went wrong, please try again!',
									'Warning !',
									'danger'
									);
									return $this->view_zoom();
								}
							}
						} else {
							$this->alert_session(
								'Sorry, there was an error uploading the image, please try again.',
								'Error !',
								'danger'
							);
							return $this->view_zoom();
						}
					}
				}
		}
	}

// x

// DELETE ZOOM MEETING

	public function deleteZoomMeeting() {
		// delete meeting from the db
		$meetingModel = new MeetingModel();
		$session = \Config\Services::session();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);
		$date_now = date("h:i a  m/d/Y");

		$request = service('request');
		$postData = $request->getPost();

		// delete meeting from the zoom app
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://api.zoom.us',
		]);
	
		$meet_id = $postData['txt_id'];
		// send request to delete the meeting
		$response = $client->request("DELETE", "/v2/meetings/$meet_id", [
			"headers" => [
				"Authorization" => "Bearer " . $this->getZoomAccessToken()
			]
		]);
	
		if (204 == $response->getStatusCode()) {
			if($meetingModel->where('meet_zoom_id', $postData['txt_id'])->delete()){
				$this->alert_session(
					'Zoom Meeting has been Deleted !',
					'Deleted!',
					'success'
				);

				// record log (initialize the record log method)
				$this->record_log(
					'Deleted the Zoom Meeting with id'.$postData['txt_id'].' '
				);

				// save notif 
				$this->save_notif(
					'Admin deleted the Jitsi Meeting : '.$postData['txtTitle'].' for '.$postData['txtDivision'],
					'pages/zoomMeetSingle',
					$postData['txtDivision'],
					'member_treasurer',
					$postData['txt_id']
				);
				
				return $this->view_zoom();
			}
		}
	}

// x

// OPEN ZOOM MEETING ROOM

	public function openMeetingRoom(){
		$meetingModel = new MeetingModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['meet_room_status' => 'Open'];

		if($meetingModel->update(esc($postData['txt_meet_id']), esc($data))){
			$this->alert_session(
				'Zoom Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Opened.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Zoom Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Opened.'
			);

			// save notif 
			$this->save_notif(
				'Zoom Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Opened.',
				'pages/jitsiMeet',
				$postData['txt_meet_division'],
				'member_treasurer',
				$postData['txt_meet_id']
			);
			
			return $this->view_zoom();
		}
	}

// x

// CLOSE ZOOM MEETING ROOM

	public function closeMeetingRoom(){
		$meetingModel = new MeetingModel();

		$timezone = "Asia/Manila";
		date_default_timezone_set($timezone);

		$request = service('request');
		$postData = $request->getPost();

		$data = ['meet_room_status' => 'Closed'];

		if($meetingModel->update(esc($postData['txt_meet_id']), esc($data))){
			$this->alert_session(
				'Zoom Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Closed.',
				'Success!',
				'success'
			);

			// record log (initialize the record log method)
			$this->record_log(
				'Zoom Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Closed.'
			);

			// save notif 
			$this->save_notif(
				'Zoom Meeting Room with title: | '.htmlspecialchars_decode($postData['txt_meet_title']).
				' for '.$postData['txt_meet_division']
				.' | has been Closed.',
				'pages/jitsiMeet',
				$postData['txt_meet_division'],
				'member_treasurer',
				$postData['txt_meet_id']
			);
			
			return $this->view_zoom();
		}
	}

// x
}

?>