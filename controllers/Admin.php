<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller{

	

	var $lang;

	public function __construct(){

	 	parent::__construct();

	 	

	 	if(empty($this->session->userdata('logged_in') && $this->session->userdata('admin')=='true')){

	 		redirect(base_url().'hashadmin');

	 	}

	 	$this->load->model('Admin_model');

	 	$this->lang = array(

			'preview' => 'Public review',

			'creview' =>'Client review',

			'tquality' => 'Work Quality',

			'cquality' => 'Communication',

			'treplies' =>'Thanks replies',

			'pviolation' => 'Policy Violation',

			'cypviolation' => 'Company Policy Violation',			

			'slaviolation' => 'SLA Violation',

			'wreport' => 'Work Reports',

			'warning' => 'Warning',

			'suspension' => 'Suspension ',

			'blogpost' => 'Blog Posts',

			'seminars' => 'Seminars',

			'training' => 'Training',

			'codeof' =>  'Code of conduct',

			'linkedin' => 'Linkedin Engagements',

			'fb' =>  'Facebook Engagements',			

			'twitter' =>  'Twitter Engagements',

			'insta' =>  'Instagram Engagements',			 

			'ssmedia' =>  'Social Media Engagements',

			'awards' => 'Awards & Achievements',

			'goldenresponse' => 'Golden Responses',

			'ChallengeOfTheDay'  => 'Challenge Of The Day',

			'extracurricular'  => 'Extracurricular Activitiess',

			'interviews' => 'Interviews',

			'certifications' => 'certifications',

			'trialpperf' => 'Trial Period Performance',

			'servicecancellation' => 'Service Cancellation'

			

		);

	 } 

	 

	Public function category($key){

		$pe=array(

			'trialpperf' => 'Trial Period Performance',

			'servicecancellation' => 'Service Cancellation',

			'preview' => 'Public review',

			'creview' =>'Client review',

			'tquality' => 'Work Quality',

			'cquality' => 'Communication',			

			'pviolation' => 'Policy Violation',

			'cypviolation' => 'Company Policy Violation',

			'slaviolation' => 'SLA Violation',

			'wreport' => 'Work Reports',

			'ChallengeOfTheDay'  => 'Challenge Of The Day',			

			'warning' => 'Warning',

			'suspension' => 'Suspension ',			

			'awards' => 'Awards & Achievements'

			

		);

		

		$ie=array(

			'goldenresponse' => 'Golden Responses',

			'treplies' =>'Thanks replies',

			'blogpost' => 'Blog Posts',

			'interviews' => 'Interviews',

			'training' => 'Training',	

			'certifications' => 'Certifications',	

			'seminars' => 'Seminars'

		);



		$ce=array(

			'codeof' =>  'Code of conduct',

			'ssmedia' =>  'Social Media Engagements',

			'extracurricular'  => 'Extracurricular Activities',

			

			

		);



		if(array_key_exists($key,$pe)){

			return 1;

		}

		if(array_key_exists($key,$ie)){

			return 2;

		}

		if(array_key_exists($key,$ce)){

			return 3;

		}

		

	}

	 

	Public function home(){		

		$this->load->model('Admin_model');

		$data= $this->session->userdata();

		$data['employees'] = $this->Admin_model->getEmployee_daily();
		$data['current_employees'] = $this->Admin_model->getCurrentEmployees();

		$data['designation_det'] = $this->Admin_model->viewalldesignation();

		

		$this->load->view('admin/dashboard',$data); 

	}

	Public function index(){		

		redirect('/admin/home');

	}

	Public function userlist(){
		//echo $this->session->userdata('role');
		$data['dept'] = $result=$this->Admin_model->viewalldepts();
		$data['team'] = $result=$this->Admin_model->viewallteam();
		$data['designation_det'] = $result = $this->Admin_model->viewalldesignation();
		$data['certifications'] = $this->Admin_model->get_certificates();
		$this->load->view('admin/userlist',$data);

	}


/** get employee details for listing  */
	Public function userdata(){

			$sort  =  'asc';
			$field =  'user_id';	
			if($this->session->userdata('role')==4)	{
				$data = $this->Admin_model->getEachDepEmployees($sort,$field);	//1 == software department
			}else{
				$data = $this->Admin_model->getEmployees($sort,$field);	
			}	
			
			foreach($data as $key =>$employee){

				$date_of_join=$this->getLeaveResetDate($employee['date_of_join']);
				$user_id=$employee['user_id'];
				$wfh=$this->Admin_model->NoofWFH($user_id,$date_of_join);
				$data[$key]['WFH']			= $wfh->total + $this->Admin_model->NoofWFHfromRequest($user_id,$date_of_join)->total;
				$data[$key]['LOP']			 =$this->Admin_model->NoofLOP($user_id,$date_of_join)->total;	
				$data[$key]['SWAP']			= $this->Admin_model->NoofSWAP($user_id,$date_of_join)->total;
				$tickets							= $this->getTicketsCount($user_id);
				$data[$key]['handled']			=	$tickets['handled'];
				$data[$key]['resolved']			=	$tickets['resolved'];
				$data[$key]['pending']			=	$tickets['pending'];
				$data[$key]['sla']			=	$tickets['sla'];
				$data[$key]['mandatory_hours'] = $this->GetRealTime($this->Admin_model->getExtraHours($user_id)->pending_hrs); 
				$extra_hours_result = $this->Admin_model->getExtraHours($user_id);
				if($extra_hours_result){
					$data[$key]['extra_hours']	= $this->GetRealTime($this->Admin_model->getExtraHours($user_id)->extra_hrs);
				}else{
					$data[$key]['extra_hours']	= $this->GetRealTime(0);
				}


				

		}

			echo json_encode( $data, JSON_PRETTY_PRINT);

	}

	



	function getLeaveResetDate($date_of_join){

		$year_previous			  =	  date('Y')-1;

		if($date_of_join>1515954600){// 1515954600-- Monday, January 15, 2018 12:00:00 AM 

			//$from_date				=	

			$joining_month		=	date('m',$date_of_join); 

			$joining_day		  =   date('d',$date_of_join); 

			$new_joining_date =   strtotime("$joining_day-$joining_month-$year_previous");

		}else{

			$new_joining_date =   strtotime("15-01-$year_previous");

		}

		$monthAndDay = date('md',$new_joining_date);

		$today = date('md');

		$_joining_month		=	date('m',$new_joining_date); 

		$_joining_day		  =   date('d',$new_joining_date); 

		if($today<$monthAndDay){ // compare date and adding year 

			$fromYear = date('Y')-1;

		}else{

			$fromYear = date('Y');

		}

		$fromDate = strtotime("$_joining_day-$_joining_month-$fromYear");

		return $fromDate;

	}

	
/** Fetching user requests  */
	Public function userRequests(){ 

			$sort  								=  'desc';
			$field 								=  'lv_id';

			if($this->session->userdata('role')==4)	{
				$dep_id			=	1;
				$data = $this->Admin_model->getEachDepAllRequests($sort,$field,$dep_id);	//1 == software department
			}else{
				$data  								= $this->Admin_model->getAllRequests($sort,$field);	
			}	
			
		    for($i=0;$i<count($data);$i++){
			     $data[$i]['lv_aply_date'] 		 = date('d-m-Y',$data[$i]['lv_aply_date']);
				 $data[$i]['lv_date']      			= date('d-m-Y',$data[$i]['lv_date']);

				 if(!empty($data[$i]['lv_date_to'])){
				   $data[$i]['lv_date_to'] 		= date('d-m-Y',$data[$i]['lv_date_to']);
				 }
				 $leave_type =  $data[$i]['lv_type'] ;

				 switch($leave_type){
					 case 1: $data[$i]['lv_title']='CL';
						 break;
					 case 2:$data[$i]['lv_title']='ML';
						 break;
					 case 3:$data[$i]['lv_title']='WFH';
						 break;
					 case 4:$data[$i]['lv_title']='LOP';
						 break;
					 case 5:$data[$i]['lv_title']='SW';
						 break;
					 case 7:$data[$i]['lv_title']='HOLIDAY';
						 break;
				 }
			}
			echo json_encode( $data, JSON_PRETTY_PRINT );
	}

	
/** Delete a user , parameter should be id  */
	Public  function delete_emp($id){
		$this->load->model('Admin_model');

		$this->Admin_model->deleteemp($id);	

	} 

	Public  function view_data($id){



		$this->load->model('Admin_model');

		$result=$this->Admin_model->getEmployee($id);	

		$result[0]['date_of_join']=date('Y-m-d',$result[0]['date_of_join']);

		$result[0]['dob']=date('Y-m-d',$result[0]['dob']);

		echo json_encode( $result[0], JSON_PRETTY_PRINT );		

	

	} 

	Public  function performance($id){

		

		$result=array();

		$this->load->model('Admin_model');

		//$result['perf']=$this->Admin_model->getPerformance($id);

		$result								 = $this->Admin_model->getEmployee($id);	

		$result[0]['pe']				  = $this->Admin_model->pe_history($result[0]['performance_id']);	

		$result[0]['weekly_status'] = $this->Admin_model->getWeeklyStatus($id);
		
		if(isset($result[0]['weekly_status']->overtime)){

			$result[0]['weekly_status']->overtime=$this->GetRealTime($result[0]['weekly_status']->overtime);
			$result[0]['weekly_status']->extra_hrs=$this->GetRealTime($result[0]['weekly_status']->extra_hrs);
			$result[0]['weekly_status']->pending_hrs=$this->GetRealTime($result[0]['weekly_status']->pending_hrs);
			$result[0]['weekly_status']->wrk_id=$result[0]['weekly_status']->wrk_id;


		}else{
			$result[0]['weekly_status']=new stdClass();
			$result[0]['weekly_status']->overtime=$this->GetRealTime(0);
			$result[0]['weekly_status']->extra_hrs=$this->GetRealTime(0);
			$result[0]['weekly_status']->wrk_id=1;

		}

		$this->load->view('admin/performance',$result[0]);	

	} 



	function GetRealTime($sec){

		$minte=round($sec/60);

		$min=($minte%60);

		$hrs=(($minte-$min)/60);

		$realtime=" ".($hrs)." hrs ".abs($min)." min";

		return $realtime;

	}



	public function get_evaluation_details(){

		$performance_id = $this->input->post('performance_id');

		$field = $this->input->post('field');

		$result = $this->Admin_model->pe_history($performance_id);



		$output_a = [];

		foreach ($result as $value) {

			if(strtolower($value->criteria) == strtolower($field)){



				$insert_a = new stdClass();

				$insert_a->score = $value->point;

				$insert_a->date = date('Y-m-d',$value->time);

				$insert_a->comment = $value->comments;

				array_push($output_a, $insert_a);

			}

		}

		// echo json_encode($field);

		// exit();

		if($output_a){

			echo json_encode(['status' => true, 'data' => $output_a]);

		}else{

			echo json_encode(['status' => false, 'message' => 'Sorry no data available']);

		}

	}

	Public  function  addperformance($id){

		

		$data = array(

			'user_id' =>$id,

			'date' => strtotime("now"),

			'preview' => $this->input->post('preview'),

			'creview' => $this->input->post('creview'),

			'tquality' => $this->input->post('tquality'),

			'cquality' => $this->input->post('cquality'),

			'treplies' =>$this->input->post('treplies'),

			'pviolation' => $this->input->post('pviolation'),

			'cypviolation' => $this->input->post('cypviolation'),			

			'slaviolation' => $this->input->post('slaviolation'),

			'wreport' => $this->input->post('wreport'),

			'skypeactivity' => $this->input->post('skypeactivity'),

			'warning' => $this->input->post('warning'),

			'suspension' => $this->input->post('suspension'),

			'blogpost' => $this->input->post('blogpost'),

			'seminars' => $this->input->post('seminars'),

			'training' => $this->input->post('training'),

			'codeof' => $this->input->post('codeof'),

			'ssmedia' => $this->input->post('ssmedia'),

			'comments' => $this->input->post('comments'),	

			'awards' => $this->input->post('awards'),

			'goldenresponse' => $this->input->post('goldenresp'),

			'ChallengeOfTheDay' => $this->input->post('ChallengeOfTheDay'),

			'extracurricular' => $this->input->post('extracurricular'),

			'interviews' => $this->input->post('interviews'),

			'certifications' => $this->input->post('certifications'),

			'trialpperf' => $this->input->post('trialpperf'),

			'servicecancellation' => $this->input->post('servicecancellation')



		);

		$this->load->model('Admin_model');

		$result=$this->Admin_model->addperformance($data);

	}



	public function activate_notice_period(){



		$user_id=$this->input->post('user_id');

		$notice_period = $this->input->post('notice_period');

		$response = $this->Admin_model->make_notice_period($user_id, $notice_period);

		if($response == true){

			echo json_encode(['status' => true, 'message' => 'Employee notice period changed']);

		}else{

			echo json_encode(['status' => false, 'message' => 'Sorry some error occured!']);

		}

	}


/** Add or update user  */
	Public  function updateuser(){

		$user_id=$this->input->post('userid');

		$email=$this->Admin_model->mail_exists($this->input->post('email'));

		$empid=$this->Admin_model->empid_exists($this->input->post('empid'));
		//if new user 

		if(!isset($user_id) || trim($user_id) == ''){

			   if($email == TRUE){

			   	$stat['status'] = 0;

			   	$stat['msg'] = "Email id already exist";

			   	echo json_encode($stat);

			   	exit;

			   }

			   if($empid == TRUE){

			   	$stat['status'] = 0;

			   	$stat['msg'] = "EMP id already exist";

			   	echo json_encode($stat);

			   	exit;

			   }

													   

			//$password = substr(hash('sha512',rand()),0,12);

			$password =  $this->input->post('password');

				$data = array(

			'fullname' =>$this->input->post('fullname'),

			'emp_id' => $this->input->post('empid'),

			'email' => $this->input->post('email'),

			'password' => md5($password),

			'phone' => $this->input->post('phone'),			 

			'gender' => $this->input->post('gender'),			 

			'dep_id' => $this->input->post('dept'),			 

			'team_id' => $this->input->post('team'),

			'desgn_id' => $this->input->post('desgnn'),

			'desgn_id' => $this->input->post('desgnn'),

			'date_of_join' => strtotime($this->input->post('date_of_join')),			 

			'dob' => strtotime($this->input->post('dob')), 

			'cert_list' => $this->input->post('cert_list')

		);





		//Table insert 

			if(!$this->input->post('cert_list')){

				$data['cert_list'] ="NIL";

			}

		

			$result=$this->Admin_model->addNewUser($data);

			$data1['user_id']= $result;

			$data1['at_month']=date('mY');

				$this->load->model('User_model');

				$daysofthemonth = date('j',strtotime('last day of this month'));

				for($i=1;$i<=$daysofthemonth;$i++){	 				

					$at_timing[$i]=array();									

				}

			$data1['at_timing']=serialize($at_timing); 

			$at_id=$this->User_model->ins_attendance($data1);



			if(!empty($result)){		


				$stat['status']=1;

				$stat['msg']="New user added successfully!";

				echo json_encode($stat);

			}else{

				$stat['status']=0;

				$stat['msg']="Something went wrong!";

				echo json_encode($stat);

			}	

		}else{			



			// Existing  user 

			

				$data=array();

				if($this->input->post('fullname')){

					$data['fullname']=$this->input->post('fullname');

				}				

				if($this->input->post('empid')){

					$data['emp_id']=$this->input->post('empid');

				}								

				if($this->input->post('email')){

					$data['email']=$this->input->post('email');

				}												

				if($this->input->post('password')){

					$data['password']=md5($this->input->post('password'));

				}																

				if($this->input->post('phone')){

					$data['phone']=$this->input->post('phone');

				}																

				if($this->input->post('gender')){

					$data['gender']=$this->input->post('gender');

				}																

				if($this->input->post('dept')){

					$data['dep_id']=$this->input->post('dept');

				}																

				if($this->input->post('team')){

					$data['team_id']=$this->input->post('team');

				}	

			    if($this->input->post('desgnn')){

					$data['desgn_id']=$this->input->post('desgnn');

				}

				if($this->input->post('date_of_join')){

					$data['date_of_join']=strtotime($this->input->post('date_of_join'));

				}																				

				if($this->input->post('dob')){

					$data['dob']=strtotime($this->input->post('dob'));

				}																				

				if($this->input->post('buddy_assigned')){

					$data['buddy_assigned']=$this->input->post('buddy_assigned');

				}

				

				if($this->input->post('cert_list')){

					$data['cert_list'] = $this->input->post('cert_list');

				}



		//Table update 

			$result=$this->Admin_model->UpdateExistingUser($data,$user_id);	

			if($result==TRUE){	

				$stat['status']=2;

				$stat['msg']="User details successfully updated!";

				echo json_encode($stat);

			}else{

				$stat['status']=0;

				$stat['msg']="Something went wrong!";

				echo json_encode($stat);

			}	

			

		}

		 

	}



	public function manage_warning(){

		$user_id=$this->input->post('userid');

		

		$update_a['warning_level'] = $this->input->post('warning_level');

		$update_a['warning_last_update'] = date('Y-m-d');

		

		$result = $this->Admin_model->update_warning_level($user_id, $update_a);

		echo json_encode($result);

	}

	 

	Public function updatepoint($id){

		$field=$this->input->post('field');

		//print_r($this->lang[$field]);

		$history = array(

		'point' =>$this->input->post('value'),

		'criteria' =>$this->lang[$field],

		'time'=>strtotime('now'),

		'cri_type'=>$this->category($field),

		'performance_id'=>$id,

		'status'=>1,

		'comments'=>$this->input->post('comment')

		);

		

		

		$performance=array(

		$field =>$this->input->post('new_value')

		); 

				

			$user_id=$this->Admin_model->getUserId($id);		

			$day=strtotime('first day of this month 00:00:00');	 	

			$isMonthExist=$this->Admin_model->check_month($day,$user_id);

			// print_r($isMonthExist);

			// exit();

			if($isMonthExist==TRUE){

			$set=$this->Admin_model->updateperfHistory($performance,$id);

			}else{ 

			

			$data=$this->Admin_model->getperf($user_id);

						

			/*$data=array(

				'user_id'=>$user_id,

				'date'=>strtotime('now'),

				$field =>$this->input->post('new_value')

			);*/

			$data['performance_id']='';

			$data['user_id']=$user_id;

			$data['date']=strtotime('now');

			$data[$field]=$this->input->post('new_value');

			

			$insert_id=$this->Admin_model->createNewRow($data);	

			$history['performance_id']=$insert_id;// insert Id

			}

			$set=$this->Admin_model->updateTableHistory($history);			

		if($set==TRUE){echo 1;}else{echo 0;}	



	}

	

	

	

	Public function logout(){

		if($this->session->userdata('id')){

			$this->session->unset_userdata('logged_in');

			$this->session->unset_userdata('id');

			$this->session->unset_userdata('user_id');

			$this->session->sess_destroy();

			redirect(base_url().'hashadmin');

		}

	} 

	

	/** Add new department */

	Public function newdept(){

		$depname['dep_name']=$this->input->post('deptname');

		$result=$this->Admin_model->addNewDept($depname);

		echo $result;

	}

/** Add new team */
	Public function newteam(){

		$teamname['name']=$this->input->post('teamname');

		$result=$this->Admin_model->addNewteam($teamname);

		echo $result;

	}

	/** Listing teams */
	Public function viewteams(){
		$result=$this->Admin_model->viewallteam();
		echo json_encode($result);
	}

	
/** Delete teams */
	Public function delete_teams_nview(){
		$team_id = $this->input->post('team_id');
		$this->load->model('Admin_model');
		/** Only a concerned person can delete a team */
		if($this->session->userdata('role')!=4)	{
			$status['stat'] = $this->Admin_model->delete_teams_v($team_id);
		}else{
			$status['stat']==false;
			$status['message']=="You don't have the permission do this!";
		}
		echo json_encode($status);
	}

	
/** View departments */
	Public function viewdepts(){
		$result=$this->Admin_model->viewalldepts();
		echo json_encode($result);
	}

	Public function updateadmin(){

		$data['email']	=	$this->input->post('adminname');
		$admin_id		=	$this->input->post('admin_id');
		if($this->input->post('adminpass')){
			$data['password']=md5($this->input->post('adminpass'));
				}
		$result=$this->Admin_model->updateadminsettings($data,$admin_id);
		echo $result;

	}

	

	Public function gouser($id){

		

		$result=$this->Admin_model->fetchUserbyid($id);	

		$sessdata = array(

			'user_id'  =>$result[0]->user_id,

			'name'  =>$result[0]->fullname

               );

		$this->session->set_userdata($sessdata);	

		        

			//print_r($this->session->userdata());

		redirect("./user/dashboard");

			

	}

//===== Request module starts	

function RequestType($type){

		switch($type){

			case 1:$text="Casual Leaves";

			break;

			case 2:$text="Medical Leaves"; 

			break;

			case 3:$text="Work From Home";

			break;

			case 4:$text="LOP";

			break;			

			case 5:$text="Swap"; 

			break;

		}

		return $text;

	}

	

	Public function request(){

		if($this->session->userdata('role')!=2){
			$data['adminname']=$this->session->userdata('adminname');
			$this->load->view('admin/requests',$data);
		}else{
			echo("Access Denied!");
			exit();
		}

	}

	Public function requestapprove(){

		$lv_id=$this->input->post('id');

		$data['lv_status']=1;

		

	/*	$request=$this->Admin_model->GetRequestDta($lv_id);

		$rqtype=$this->RequestType($request->lv_type);

		//mail function

			$subject = "Hashroot PE Portal ".$rqtype;			

			$config = array(

			 'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'

			 'smtp_host' => 'zimbra.hashroot.com',

			 'smtp_port' => 465, 

			 'smtp_user' => 'site@hashroot.com',

			 'smtp_pass' => 'Jn^8wC4g',

			 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example

			 'mailtype' => 'html', //plaintext 'text' mails or 'html'

			 'smtp_timeout' => '4', //in seconds

			 'charset' => 'iso-8859-1',

			 'wordwrap' => TRUE

			);

			$this->load->library('email',$config);

			$this->email->from("site@hashroot.com",'PE-Portal');

			$email4 = "renjith.kr@hashroot.com";

			$this->email->to($request->email);

			$this->email->cc('another@another - example.com');

			$this->email->bcc('them@their - example.com');

  			$this->email->subject($subject);			

			$this->email->message('Hi , <br/>

			Requested date '.date('d M Y',$request->lv_aply_date).'<br />

			<p>Your '.$rqtype.' request has been approved</p> 

			 ');



  			$this->email->send();*/			

		//mail function Ends

		echo $this->Admin_model->requestStatus($lv_id,$data);

	}

	Public function requestreject(){

		$lv_id=$this->input->post('id');

		$data['lv_status']=2;

		echo $this->Admin_model->requestStatus($lv_id,$data);

		

	}

	/** Delete requests */

	Public function deleterequest(){

		$lv_id=$this->input->post('id');

		echo $this->Admin_model->deleteRequest($lv_id);		

	}

//=====	Request module ends 	

	//Add JD

Public function change_jd(){

		$dep_id = $this->input->post('select_dept2');

		

		if($dep_id ==''){

			

			$response = 0 ;

			echo $response;

		}

		else{

			

			$jobdesc = $this->input->post('jd_desc');

			

			$data = array(

				'job_desc'=>$jobdesc

			);

			$this->Admin_model->change_jdesc($data,$dep_id);

			

////			Starting Daily activity 

//			$daily_act = $this->input->post('daily_act');

//			$rs = $this->Admin_model->getUsersid($dep_id);

//			$info['users'] = $rs;

////			print_r($users_id);

//			$i=0;

//			foreach($rs as $ms)

//			{

////				$info['users'][$i]['daily_act'] = $daily_act;

//			 	$info['users'][$i]['dep_id'] = $dep_id;

//				$this->Admin_model->ins_daily_act($info['users'][$i]);

////				use the above if u use $this->db->insert(); in model

//				$i++;

//			}

////			

//			$rep = $this->Admin_model->ins_daily_act($info['users']);

////			print_r($rep);

//			$j=0;

//			foreach($rep as $re){

//				$d['daily_activity_ids'][$j]['daily_activity_ids'] = $re['daily_act_id'];

//				

//				$j++;

//			}

////			print_r($d['daily_activity_ids']);

//			$m_data = array(

//				

//						'daily_activity_ids'=>$d['daily_activity_ids']

//						

//			);

////			print_r($m_data);

//			 $this->Admin_model->ins_monthly($d['daily_activity_ids']);

////			closing daily activity

		}



	

	}

	

//Close add JD

//Start get jd

Public function getjd(){

		$dep_id = $this->input->post('dep_id');

		$jd = $this->Admin_model->get_jd($dep_id);

		$jd[0]['activities']=$this->Admin_model->GetDailyActivities($dep_id);

		echo json_encode($jd[0]);

	}

// close get jd

Public function getweeklyactivity(){

		$dep_id = $this->input->post('dep_id');

		$wact = $this->Admin_model->getweekly($dep_id);		

		echo json_encode($wact);

	}

Public function getmonthlyactivity(){

		$dep_id = $this->input->post('dep_id');

		$mact = $this->Admin_model->getmonthly($dep_id);		

		echo json_encode($mact);

	}



	

/** Add new daily activity for employees */

Public function add_new_act(){

		$daily_act=$this->input->post('daily_activity');

		$dep_id=$this->input->post('depmnt');

		$user_ids = $this->Admin_model->getUsersid($dep_id);

		$field_type = $this->input->post('field_type_id');

		$row['daily_act']=$daily_act;

		$row['dep_id']=$dep_id;

		$row['status']=0;

		$row['field_type'] = $field_type;

	

		$monthly_data['daily_activity_ids']=$this->Admin_model->InsertDailyActivity($row);	

		foreach($user_ids as $row){

					

			//print_r($row);

			$daysofthemonth = date('d',strtotime('last day of this month'));

				for($i=1;$i<=$daysofthemonth;$i++){

					$ActivityArray[$i]['status']=0;

				}

			$monthly_data['activity_date']=strtotime('now');

			$monthly_data['activity_array']=serialize($ActivityArray);

			$monthly_data['user_id']=$row['user_id'];

			

			$query = $this->Admin_model->InsertActivityMonthlyData($monthly_data);

			

		}

		echo($monthly_data['daily_activity_ids']);

		

	}



//  Activity methods Ends 

/** Delete daily activity */
	Public function delete_Activity(){
		$activity_id = $this->input->post('activity_id');
		$del = $this->Admin_model->delete_activity($activity_id);
		echo($del);
	}

/** Delete weekly activity */

	Public function delete_weekly_Activity(){
		$activity_id = $this->input->post('activity_id');
		$del = $this->Admin_model->delete_weekly_Activity($activity_id);
		echo($del);
	}

	
/** Delete monthly activity */
	Public function delete_monthly_Activity(){

		$activity_id = $this->input->post('activity_id');

		$del = $this->Admin_model->delete_monthly_Activity($activity_id);

		echo($del);
	}

//JD

Public function jd(){

		//$dep_id = array();

		$dep_id = $this->input->post('select_dept');

		$assign_date = strtotime($this->input->post('assign_date'));

//		print_r($assign_date);

		if(($dep_id =='')||($assign_date =='') ){

			

			$response = 0 ;

			echo $response;

		}

		else{

			

			$task = $this->input->post('task');

			$task_name = $this->input->post('task_name');



			$res = $this->Admin_model->getUsersid($dep_id);

			$assign_fieldType  = $this->input->post('ass_fieldType');



			$i = 0;

			$data['users']=$res;

			foreach($res as $m){



				//$res[$i];

				$data['users'][$i]['activity_name']=$task_name;

				$data['users'][$i]['activity_desc']=$task;

				$data['users'][$i]['ass_act_fieldType']=$assign_fieldType;

				

				$data['users'][$i]['assign_date']=$assign_date;



				$stat = $this->Admin_model->ins_test($data['users'][$i]);

				$i++;

			}

					$response =	$stat;

//				$response = 1 ;

				echo $response;

		}



	}

//Close JD

	

//Start Admin status for activities

	Public function view_stat(){

		$stat = $this->Admin_model->get_stat();



		$s='';

		foreach($stat as $details){

//			$details['activity_name'];

			$s .="<tr><td>";

			$s .=$details['fullname'];

			$s .="</td><td>";

			$s .= $details['dep_name'];

			$s .="</td><td>";

			$s .=$details['activity_name'];

			$s .="</td><td>";

			$s .=$details['activity_desc'];

			$s .="</td><td>";

			$s .=date('d-m-Y',$details['assign_date']);

			$s .="</td><td>";

			$s .=date('d-m-Y',$details['reply_date']);

			$s .="</td>";

	

		}

		

		

		echo"<div>

		<div class='row'>

			 <div class='col-sm-9'>

				<h5 class='m--font-primary'></h5>

			 </div>

			 <div> ";echo"</span></div>



		</div>

										 

										 

		<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'>

				<tr>

					<th>Employee Name</th>

					<th>Department Name</th>

					<th>Activity Name</th>

					<th>Activity Description</th>

					<th>Work Assigned On </th>

					<th>Work Completed On </th>

					

				</tr>";

		echo $s;

		echo "</tr></table>";	

	}

//	Ends admin status for activities

	

//	View Daily Status

	Public function view_daily_stat(){

		$daily_array 		= $this->Admin_model->get_daily_array();
//		$unserialized = unserialize($daily_array); 
		$i						 = 0;
		$j						 = 1;
		foreach($daily_array as $det){
			$unser			 = unserialize($daily_array[$i]['activity_array']);
		}
//		$data['arr'] = $unserialized;
if($this->session->userdata('role')==4)	{
	$dep_id		=		1;
	$data['emp']  		 = 		 $this->Admin_model->getEachDepEmployee_daily($dep_id);	//1 == software department
}else{
	$data['emp']  		 = 		 $this->Admin_model->getEmployee_daily();	
}	
		$this->load->view('admin/view_daily_stat',$data);
	}

//Close daily stat

/***  Fetching daily activity reports and details */
	Public function daily_datas(){

		$uid     		= $this->input->post('user_id');

		$month          = $this->input->post('date_daily');
		$daily_date = $month;
		if($month ==''){

			$month_id   = date('m-Y');

			$day        = date('j');

			$mon_4Wrpt  = date('d-m-Y');

			$mon_4shot  = date('mY');

			$month      = date('d-m-Y');

		}

		else{

			$m          = (explode("-",$month)[1]);

			$y          = (explode("-",$month)[2]);

			$month_id   = $m."-".$y;

			$day        = (explode("-",$month)[0]);

			$day        = (int)$day;	

			$mon_4Wrpt  = $month;

			$mon_4shot  = $m.$y;

			$month      = $month;

		}

		

/** ...................Start screen shots.................................... */

	    $attendance_det = $this->Admin_model->get_att($uid,$month);

		$user_name      = $this->Admin_model->getUsersname($uid);

		if(count($user_name)>0){

			echo"<div style='display:flex; justify-content:space-between'><span class='m-badge m-badge--primary m-badge--wide m--font-bolder' >Employee : ".$user_name[0]['fullname']."</span> &nbsp;  <span class='m-badge m-badge--metal m-badge--wide m--font-bolder'>Date : ".$month."</span> &nbsp;<span class='m-badge m-badge--danger m-badge--wide m--font-bolder'>No. of Shifts Done : ".count($attendance_det)."</span></div><br/>"; 

		}

		
		if(count($attendance_det) == 0){

			echo "";

		}

		else{

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											Daily Desk Shots 

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>

								<!--begin::Section-->

								<div class='m-section'>

									<div class='m-section__content'>

										<table class='table table-striped m-table'>

											<thead>

												<tr>

													

													<th>

														Punchin

													</th>

													<th>

														Punchout

													</th>

													<th>

														Desk shots

													</th>

												</tr>

											</thead>

											<tbody>";

			foreach($attendance_det as $row){

					$att_ids           = $row['att_id'];

				    if(!empty($row['punchin'])){

						echo "<tr><td>".date('d-m-Y h:i a',$row['punchin'])."</td>";

					}

					

				    if(!empty($row['punchout'])){

						echo "<td>".date('d-m-Y h:i a',$row['punchout'])."</td>";

					}

				else{

					 echo"<td>---</td>";

					}

//	$get_screen = $this->Admin_model->get_screen_shots($uid,$att_ids,$row['punchin'],$row['punchout']);

	$get_screen = $this->Admin_model->get_all_images($uid,$att_ids);			    

					if(count($get_screen)>0){ 

						echo"<td>";

						foreach($get_screen as $img){

							echo " <a class='custom-hover' target='_blank' href='".base_url()."assets/screenshort/".$img['di_image_name']."' ><i class='fa fa-file-image-o' aria-hidden='true'></i></a> &nbsp; &nbsp; ";

							

						}

						echo"</td>";

					}	

				    else{

						 echo"<td>---</td>";

				    }

				

			}

			echo "</tr></tbody>

				</table>

			</div>

		</div>

		<!--end::Section-->

	</div>

	<!--end::Form-->

</div>";

		}



		

//.....................................Close screen shots..............................................

		

//Toview daily checklists report

		$daily_checklist = $this->Admin_model->full_daily_checklist($uid,$month);

		if(count($daily_checklist)==0){

			echo '';

		}

		else{

			$flag = 0;

			$get_dep_id           = $this->Admin_model->get_dep_id($uid);

			$check_Activity_field = $this->Admin_model->GetDailyActivities($get_dep_id[0]['dep_id']);

 

			if(count($check_Activity_field)>0){

				foreach($check_Activity_field as $daily_Act){

					if($daily_Act['field_type']==0){

						$flag=1;

					}

				}

			

			}

		    if($flag ==1){

				echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											Daily Checklist 

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>

								<!--begin::Section-->

								<div class='m-section'>

									<div class='m-section__content'>

										<table class='table table-striped m-table'>

											<thead>

												<tr>

													<th>

														Activity

													</th>

													<th>

														Status

													</th>

													<th>

														Date & Time

													</th>

												</tr>

											</thead>

											<tbody>";

			foreach($daily_checklist as $full_d_c){

				$unser_daily_dat = unserialize($full_d_c['work_report']);

						if(count($unser_daily_dat)>0){

						 	foreach($unser_daily_dat as $row){

								if($row['field_type']==0 ){

									echo "<tr><td>".$row['activity']."</td>";

									if($row['status']==1){

										echo "<td><i class='fa fa-check' style='color:green;'></i></td>";

										echo "<td>".date('d-m-Y h:i:s a',$row['time'])."</td>"; 

									}

									else{

										echo "<td><i class='fa fa-times' style='color:red;'></i></td>";

										echo "<td>.....</td>";

									}

								}

							}

						}

					else{

						echo "<td>---</td>";

						echo "<td>...</td>";

					}

				

			}

			

		

						echo "</tr></tbody>

						</table>

					</div>

				</div>

				<!--end::Section-->

			</div>

			<!--end::Form-->

		</div>";

		}

		else{

			echo" No Checklists are assigned yet";

		}

			

		}

		//Close  view of Daily checklists 

		

		$input_data = '';

		$days 		= '';

		$input_time = '';

		if(count($daily_checklist)>0){

//			$rev_arr = array_reverse($daily_w_report);

			

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											Daily Report 

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>

								<!--begin::Section-->

								<div class='m-section'>

									<div class='m-section__content'>

										<table class='table table-striped m-table'>

											<thead>

												<tr>

													

													<th>

														Activity

													</th>

													<th>

														Report

													</th>

													<th>

														Date & Time

													</th>

												</tr>

											</thead>

											<tbody>";

		foreach($daily_checklist as $full_d_c){

			$unser_daily_dat = unserialize($full_d_c['work_report']);

			if(!empty($unser_daily_dat)){

				foreach($unser_daily_dat as $d_w_rpt){

					if($d_w_rpt['field_type'] > 0){

					   echo "<tr><td>".$d_w_rpt['activity']."</td>";

					   if($d_w_rpt['status'] == 1){

							echo "<td>".nl2br($d_w_rpt['reply'])."</td>";

							echo "<td>".date('d-m-Y h:i a',$d_w_rpt['time'])."</td>";

						}

						else{

							echo "<td>---</td>";

							echo "<td>---</td>";

						}

					}

				}

			}

		}

			echo "</tr></tbody>

								</table>

							</div>

						</div>

						<!--end::Section-->

					</div>

					<!--end::Form-->

				</div>";

			

		}

		else{

			echo '';

		}

		

//		$work_reports = $this->Admin_model->get_emp_work_report($uid,$month_id);

		

		$get_dep_id               = $this->Admin_model->get_dep_id($uid);

		

		if(count($get_dep_id)>0){

			if($get_dep_id[0]['dep_id']==2){

				

			$get_punchin_time     = $this->Admin_model->full_daily_checklist($uid,$month);

			

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											Details of Tickets Worked 

										</h3>

									</div>

								</div>

							</div>";

			echo "<div class='m-portlet__body'>

								<!--begin::Section-->

								<div class='m-section'>

									<div class='m-section__content'>

										<table class='table table-striped m-table'>

											<thead>

												<tr>

													<th class='col-md-3'>

														Daily report

													</th>

													<th class='col-md-9'>

														Time

													</th>

												</tr>

											</thead><tbody>";

		

				if(count($get_punchin_time)>0){ 

						foreach($get_punchin_time as $row){

							$att_id       = $row['att_id'];

							$work_reports = $this->Admin_model->get_emp_work_report($uid,$att_id);

//							if($uid == 457 ){

//								print_r($att_id."</br>" );

//								echo('<pre>');

//								print_r($work_reports);

//								echo('</pre>');

//							}

							

//				      $work_reports = $this->Admin_model->get_emp_work_report_p($uid,$month);

//							print_r($work_reports);

								if(count($work_reports)>0){

									foreach($work_reports as $rpt_row){

										echo "<tr>"; 

										echo "<td>".nl2br($rpt_row['workreport'])."</td>";

										echo "<td>".$rpt_row['time']."</td>";

										echo "</tr>"; 

								}

							}

						}



					}	 

					echo"</tbody></table></div></div></div></div>";

			}//Closing if for - depid 2

		}

		if($get_dep_id[0]['dep_id'] == 2){
			$daily_ticket_details = $this->get_daily_ticket_details($uid, $daily_date);
			
			if($daily_ticket_details->status == true){
				echo "<div class='m-portlet'>
							<div class='m-portlet__head'>
								<div class='m-portlet__head-caption'>
									<div class='m-portlet__head-title'>
										<h3 class='m-portlet__head-text'>
											Ticket Details 
										</h3>
									</div>
								</div>
							</div>";
				echo "<div class='m-portlet__body'>
							<!--begin::Section-->
							<div class='m-section'>
								<div class='m-section__content'>
									<table class='table table-striped m-table'>
										<thead>
											<tr>
												<th>
													Ticket Url
												</th>
												<th>
													Response
												</th>
												<th>
													SLA
												</th>
											</tr>
										</thead><tbody>";
				$daily_ticket_details_data = $daily_ticket_details->data;					
				foreach ($daily_ticket_details_data as $key => $row) {
					echo "<tr>"; 
					echo "<td><a target='_blank' href='".$row->ticket_id."'>".$row->ticket_id."</a></td>";
					echo "<td>".$row->response."</td>";
					echo "<td>".$row->sla."</td>";
					echo "</tr>";
				}

				echo"</tbody></table></div></div></div></div>";

			}else{
				echo "";
			}
			
		}
			

		

	}

	/**
	 * return daily ticket details 
	 * @param  [type] $user_id [description]
	 * @param  [type] $date    [description]
	 * @return [type]          [description]
	 */
	private function get_daily_ticket_details($user_id, $date){
		$this->load->model('User_model');
		
		if($date == ""){
			$date = date('Y-m-d 00:00:00');
		}

		$date = strtotime($date);
		$start_date = date('Y-m-d 00:00:00', $date);
		$start_date = strtotime($start_date);
		$end_date = date('Y-m-d 23:59:00', $date);
		$end_date = strtotime($end_date);

		
		$attendance_log = $this->User_model->get_dailyStatus_with_date($user_id, $start_date, $end_date);
		// $this->dd($attendance_log);
		if(!$attendance_log){
			return (object)['status' => false, 'message' => 'No login for today'];
		}

		$att_id = $attendance_log->att_id;
		$result = $this->User_model->get_ticket_details($user_id, $att_id, $date, 'own_work_report');
		return $result;
	}

//	Close Daily Status	

	

//Close Getting daily activity details form attendance table	

	

	

//Weekly Reports

	Public function view_weekly_stat(){

		$daily_array = $this->Admin_model->get_daily_array();
//		$unserialized = unserialize($daily_array); 
		$i=0;
		$j=1;
		foreach($daily_array as $det){
			$unser = unserialize($daily_array[$i]['activity_array']);
		}
		if($this->session->userdata('role')==4)	{
			$dep_id		=		1;
			$data['emp']  		 = 		 $this->Admin_model->getEachDepEmployee_daily($dep_id);	//1 == software department
		}else{
			$data['emp']  		 = 		 $this->Admin_model->getEmployee_daily();	
		}	
		$this->load->view('admin/view_weekly_stat',$data);

	}

	
/** Fetching weekly activity datas */
	Public function weekly_datas(){  

		$uid       = $this->input->post('user_id');

		$month     = $this->input->post('month_pick_admin1');

		if($month ==''){

			$month_id   = date('m-Y');

			$month_name = date('M Y');

		}

		else{ 

			$month_id   = $month;

//			$m          = (explode(" ",$month)[1]);

			$m          = substr($month_id, 0, 2);

			$y          = (explode("-",$month)[1]);

			$month_id   = $m."-".$y; 

			$f_month    = "01-".$m."-".$y;

			$str_fmonth = strtotime($f_month);

			$month_name = date('F Y',$str_fmonth);

		}

		

		$user_name      = $this->Admin_model->getUsersname($uid);

		if(count($user_name)>0){

			echo"<div style='display:flex; justify-content:space-between'><span class='m-badge m-badge--primary m-badge--wide m--font-bolder' >Employee : ".$user_name[0]['fullname']."</span> &nbsp;  <span class='m-badge m-badge--metal m-badge--wide m--font-bolder'>Month : ".$month_name."</span> &nbsp;</div><br/>"; 

		}

		 

//Toview daily checklists report  

		$dep_ids = $this->Admin_model->get_dep_id($uid); 

		if(count($dep_ids)>0){

			$dep_id  = $dep_ids[0]['dep_id'];

		    $weekly_checklist = $this->Admin_model->full_weekly_checklist_act($dep_id); 

		 	if(count($weekly_checklist)>0){

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											 Weekly Checklist

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			echo "<table class='table table-striped m-table'>

											<thead>

												<tr>

													

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

														Status

													</th>

												</tr>

											</thead><tbody>"; 

				foreach($weekly_checklist as $rpt_row){  

					$week_che_stat = $this->Admin_model->stat_week_chk($uid,$month_id,$rpt_row['wa_id']);

					if(count($week_che_stat)==0){

						echo "<tr>";

						echo "<td>".$rpt_row['wa_activity']."</td>";

						echo "<td>....</td>";

						echo "<td>....</td>";

						echo "</tr>";

					}

					else{

						foreach($week_che_stat as $wk_ch){ 

							echo "<tr>";

							echo "<td>".$rpt_row['wa_activity']."</td>";

							echo "<td>".date('d F Y',$wk_ch['wd_date'])."</td>"; 

							echo "<td><i class='fa fa-check' style='color:green;'></i></td>";

							echo "</tr>";

						}

						

					}

					

					

				}

				echo"</tbody></table></div></div>";

		}

		else{

			echo "No weekly Checklists are assigned . ";

		}

		}

		

		

	   

		

$weekly_workreport = $this->Admin_model->full_weekly_rep_act($dep_id);	 	

//$weekly_workreport = $this->Admin_model->full_weekly_workreport($uid,$month_id);		

		//Close  view of Daily checklists  

		if(count($weekly_workreport)>0){ 

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											 Weekly work Report

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			echo "<table class='table table-striped m-table'>

											<thead>

												<tr>

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

													Report	

													</th>

												</tr>

											</thead><tbody>"; 

			//......................................................

			 

				foreach($weekly_workreport as $rpt_row2){ 

					$week_rep_stat = $this->Admin_model->stat_week_rep($uid,$month_id,$rpt_row2['wa_id']);

//					echo('<pre>');

//					print_r($week_rep_stat);

//					echo('</pre>');

//					exit();

					if(count($week_rep_stat)!=0){ 

						foreach($week_rep_stat as $rep){

							echo "<tr>";

							echo "<td>".$rep['wa_activity']."</td>";

							echo "<td>".date('d F Y',$rep['wd_date'])."</td>";

//							echo('<pre>');

//							print_r($week_rep_stat);

//							echo('</pre>');

							echo "<td>".nl2br($rep['wd_status'])."</td>";

							echo "</tr>";

						}

						

					}

					else{

						echo "<tr>";

						echo "<td>".$rpt_row2['wa_activity']."</td>";

						echo "<td>---</td>";

						echo "<td>---</td>";

						

						echo "</tr>";

					}

					

					

				}

				echo"</tbody></table></div></div>";



		}	

		else{

			echo "<br/>No weekly work reports are assigned . ";  

		}

		

		//Close view of daily work report

	}

/** Monthly Reports display */
	Public function view_monthly_stat(){

		$daily_array = $this->Admin_model->get_daily_array();

		$i=0;

		$j=1;

		foreach($daily_array as $det){

			$unser = unserialize($daily_array[$i]['activity_array']);

		}


		if($this->session->userdata('role')==4)	{
			$dep_id		=		1;
			$data['emp']  		 = 		 $this->Admin_model->getEachDepEmployee_daily($dep_id);	//1 == software department
		}else{
			$data['emp']  		 = 		 $this->Admin_model->getEmployee_daily();	
		}	

		$this->load->view('admin/view_monthly_stat',$data);

	}

	
/** Listing monthly activity datas */
Public function monthly_datas(){

		$uid            = $this->input->post('user_id');

		$month          = $this->input->post('month_pick_admin1');

		if($month       ==''){

			$month_id   = date('m-Y');

			$month_name = date('M Y');

		}

		else{

			$month_id   = $month;

			$m          = substr($month_id, 0, 2);

			$y          = (explode("-",$month)[1]);

//			$month_id   = $m."-".$y; 

			$f_month    = "01-".$m."-".$y;

			$str_fmonth = strtotime($f_month);

			$month_name = date('F Y',$str_fmonth);

		}

//Toview daily checklists report 

	    $user_name      = $this->Admin_model->getUsersname($uid);

		if(count($user_name)>0){

			echo"<div style='display:flex; justify-content:space-between'><span class='m-badge m-badge--primary m-badge--wide m--font-bolder' >Employee : ".$user_name[0]['fullname']."</span> &nbsp;  <span class='m-badge m-badge--metal m-badge--wide m--font-bolder'>Month : ".$month_name."</span> &nbsp;</div><br/>"; 

		}

	

		$dep_ids 			    = $this->Admin_model->get_dep_id($uid);

//		$monthly_checklist      = $this->Admin_model->full_monthly_checklist($uid,$month_id);

		if(count($dep_ids)>0){

		    $dep_id 			= $dep_ids[0]['dep_id'];

		    $monthly_checklist  = $this->Admin_model->full_monthly_checklist_act($dep_id);

			

			if(count($monthly_checklist)>0){

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											Monthly Checklist

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			echo "<table class='table table-striped m-table'>

											<thead>

												<tr>

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

														Status

													</th>

												</tr>

											</thead><tbody>";

				foreach($monthly_checklist as $rpt_row){

					$month_chk_stat = $this->Admin_model->stat_month_chk($uid,$month_id,$rpt_row['ma_id']);

//					print_r($month_rep_stat);

					if(count($month_chk_stat)==0){

						echo"<tr>";

						echo "<td>".$rpt_row['ma_activity']."</td>";

						echo"<td>-----</td>";

						echo"<td>-----</td>";

						echo"</tr>";

					}

					else{

						foreach($month_chk_stat as $m_ch){

							echo "<tr>";

							echo "<td>".date('d-m-Y',$m_ch['md_date'])."</td>";

							echo "<td>".$rpt_row['ma_activity']."</td>";

							echo "<td><i class='fa fa-check' style='color:green;'></i></td>";

							echo "</tr>";

						}

					}

					

				

				}

				echo"</tbody></table></div></div>";

		} 

		else{

			echo "</br>No monthly checklist are assigned ."; 

		}

		

		$monthly_workreport_act = $this->Admin_model->full_monthly_rep_act($dep_id);		

		//Close  view of Daily checklists 

		if(count($monthly_workreport_act)>0){

			echo "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											 Monthly work Report

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			echo "<table class='table table-striped m-table'>

											<thead>

												<tr>

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

													Report	

													</th>

												</tr>

											</thead><tbody>";

			foreach($monthly_workreport_act as $mon_rep){

				

				$month_rep_stat = $this->Admin_model->stat_month_rep($uid,$month_id,$mon_rep['ma_id']);

				if(count($month_rep_stat)==0){

					echo "<tr>";

					echo "<td>".$mon_rep['ma_activity']."</td>";

					echo "<td>----</td>";

					echo "<td>----</td>";

					echo "</tr>";

				}

				else{

					foreach($month_rep_stat as $mn_st){

						echo "<tr>";

						echo "<td>".$mon_rep['ma_activity']."</td>";

						echo "<td>".date('d-m-Y',$mn_st['md_date'])."</td>";

						echo "<td>".nl2br($mn_st['md_status'])."</td>";

						echo "</tr>";

					}

					

				}

			}

				echo"</tbody></table></div></div>";

		}

		else{

			echo "</br>No monthly reports are assigned .";

		}

	}

//Close monthly reports

		}

	

	

//Close Monthly Report

	//View employees Worksheet status

	Public function employee_stat(){

		$result['datas'] = $this->Admin_model->activity_reply_list();

		

		$this->load->view('admin/employee_stat',$result);

	}

//Close View employees Worksheet status

	

//Ticket Reports

Public function ticket_reports(){

		$result['ticket_info'] = $this->Admin_model->get_all_users();

//		print_r($result);

		$this->load->view('admin/ticket_reports',$result);

}

//Close Ticket Reports

	//Needed dont delete the below method

//Public function ticket_info_monthly(){

//	$uid = $this->input->post('user_id');

//	$month = $this->input->post('month_pick_ticket');

////	print_r($month);

////	exit();

//	if($month==''){

//		$month_id = date('m-Y');

////		print_r($month_id);

//	}

//	else{

//		$month_id = $month;

////		print_r($month_id);

//	}

//	//REport infos start

//	$report_info = $this->Admin_model->full_report_det($uid,$month_id);

////	print_r($report_info);

//	$record = '';

//	$error = '';

//	if($report_info==0){

//		$error .="<div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div>";

//	}

//	else{

//		foreach($report_info as $list_rep_rec){

//			$record .= "<tr><td>";

//			$record .= nl2br($list_rep_rec['workreport']);

//			$record .= "<td>";

//			$record .= $list_rep_rec['time'];

//			$record .= "</td></tr>";

//		}

//	}

//

//	$ticket_info = $this->Admin_model->full_ticket_det($uid,$month_id);

//	$error2 ='';

//	if($ticket_info==0){

//		

//		$ticket_date =array();

//		$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

//	}

//	else{

//		

//		$ticket_date =array();

//		foreach($ticket_info as $tck){

//			$index=date('dmY',$tck['tk_date']);

//			$ticket_date[$index]['date']= date('d-m-Y',$tck['tk_date']);

//

//			if($tck['tk_type']=="RESOLVED"){			

//				$ticket_date[$index]['RESOLVED']= $tck['tk_count'];			

//			}

//			elseif($tck['tk_type']=="HANDLED"){			

//				$ticket_date[$index]['HANDLED']= $tck['tk_count'];			

//			}

//			elseif($tck['tk_type']=="PENDING"){			

//				$ticket_date[$index]['PENDING']= $tck['tk_count'];			

//			}

//	

//		}

//		

//	}

//	

//

//	echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>

//			

//			<th>Date</th>

//			<th>Tickets Resolved</th>

//			<th>Tickets Handled</th>

//			<th>Tickets Pending</th>

//			

//		</thead><tbody>";

////echo $error2;

//	if($ticket_info !=0){

//		foreach($ticket_date as $tr){

//		echo('<tr>');

//		echo "<td>".$tr['date']."</td>";

//		echo "<td>".$tr['RESOLVED']."</td>";

//		echo "<td>".$tr['HANDLED']."</td>";

//		echo "<td>".$tr['PENDING']."</td>";

//		echo('<tr>');

//		}

//	}

//	else{

//		echo $error2;

//	}

//	

//		

//	

//	

//	echo "</tbody>";

//	

//	

//	echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>

//			<th>Report</th>

//			<th>Date</th>

//		</thead>";

//	

//	$record .= "</table></div>";

//	echo $record;

//	echo $error;

//	

//}

	//needed pls dont delete the above methods

	

//test method of dept wise report

	Public function ticket_info_monthly(){

	$uid = $this->input->post('user_id');

	$month = $this->input->post('month_pick_ticket');

	$dep_id = $this->input->post('dep_id');

//	print_r($dep_id);

//		echo('go');

	if($month==''){

		$month_id = date('m-Y');

//		print_r($month_id);

	}

	else{

		$month_id = $month;

//		print_r($month_id);

	}

	//REport infos start

	$report_info = $this->Admin_model->full_report_det($uid,$month_id);

//	print_r($report_info);

	$record = '';

	$error = '';

	if($report_info==0){

		$error .="<div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div>";

	}

	else{

		foreach($report_info as $list_rep_rec){

			$record .= "<tr><td>";

			$record .= nl2br($list_rep_rec['workreport']);

			$record .= "<td>";

			$record .= $list_rep_rec['time'];

			$record .= "</td></tr>";

		}

	}

//		print_r($dep_id);

	$ticket_info = $this->Admin_model->full_task_det($uid,$month_id);

	if($dep_id==1){

		//start if

		$error2 ='';

//		print_r($month_id);

		if($ticket_info==0){



			$ticket_date =array();

			$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

		}

		else{



					$ticket_date =array();

				foreach($ticket_info as $tck){

		//			echo('<pre>');

		//			print_r($tck);

		//			echo('</pre>');



					$index=date('dmY',$tck['time']);

					$ticket_date[$index]['time']= date('d-m-Y',$tck['time']);

		//			echo('<pre>');

		//			print_r($ticket_date[$index]['time']);

		//			echo('</pre>');

					if($tck['tasks_label']=="list_clients_checked"){			

						$ticket_date[$index]['list_clients_checked'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="list_techs_checked"){			

						$ticket_date[$index]['list_techs_checked'][] = $tck['tasks_list'];			

					}



					elseif($tck['tasks_label']=="well_per_techs"){			

						$ticket_date[$index]['well_per_techs'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="under_per_techs"){			

						$ticket_date[$index]['under_per_techs'][] = $tck['tasks_list'];			

					}



				}





	//			echo('<pre>');

	//			print_r($ticket_date);

	//			echo('</pre>');

		}

		

		echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>



				<th>Time</th>

				<th>Clients Checked</th>

				<th>Techs Checked</th>

				<th>Well Perf Techs</th>

				<th>Under Perf Techs</th>



			</thead><tbody>";



			$list_tsk ="";

		if($ticket_info !=0){





			foreach($ticket_date as $row){

	//			$list_tsk .="";



	//			echo $ticket_date['time'];



				$j=0;

				foreach($row['list_clients_checked'] as $clients_chkd){



					echo "<tr><td>";

					echo ($row['time']);

					echo "</td>";

					echo "<td>";

					echo nl2br($clients_chkd);

					echo "</td>";

					echo "<td>";

					echo nl2br($row['list_techs_checked'][$j]);

					echo "</td>";

					echo "<td>";

					echo nl2br($row['well_per_techs'][$j]);

					echo "</td>";

					echo "<td>";

					echo nl2br($row['under_per_techs'][$j]);

					echo "</td>";



					$j++;

				}



			}

		}

		else{

			echo $error2;

		}

	

	}//Close if

	elseif($dep_id==2){

//		start if dep-id==2

		$error2 ='';

		if($ticket_info==0){



			$ticket_date =array();

			$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

		}

		else{



					$ticket_date =array();

				foreach($ticket_info as $tck){

		//			echo('<pre>');

		//			print_r($tck);

		//			echo('</pre>');



					$index=date('dmY',$tck['time']);

					$ticket_date[$index]['time']= date('d-m-Y',$tck['time']);

		//			echo('<pre>');

		//			print_r($ticket_date[$index]['time']);

		//			echo('</pre>');

					if($tck['tasks_label']=="ticket_handled"){			

						$ticket_date[$index]['ticket_handled'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="tickets_resolved"){			

						$ticket_date[$index]['tickets_resolved'][] = $tck['tasks_list'];			

					}



					elseif($tck['tasks_label']=="tickets_pending"){			

						$ticket_date[$index]['tickets_pending'][] = $tck['tasks_list'];			

					}

					



				}



//

//				echo('<pre>');

//				print_r($ticket_date);

//				echo('</pre>');

		}

		

		echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>



				<th>Time</th>

				<th>ticket_handled</th>

				<th>tickets_resolved</th>

				<th>tickets_pending</th>

				



			</thead><tbody>";



			$list_tsk ="";

		if($ticket_info !=0){



				$largest = 0;

			foreach($ticket_date as $row){

//				  echo('<pre>');

//				  print_r($row);

//				  echo('</pre>');

				//start finding largest count array

					

					$t_pendng_count = count($row['tickets_pending']);

					$t_res_count = count($row['tickets_resolved']);

					$t_handl_count = count($row['ticket_handled']);

//					echo(max($t_pendng_count,$t_res_count ,$t_handl_count));

				$largest = max($t_pendng_count,$t_res_count ,$t_handl_count);

//					if($t_pendng_count >= $t_res_count){

//						if($t_pendng_count >= $t_handl_count){

//							$largest = $t_pendng_count;

//						}

//						else{

//							$largest = $t_handl_count;

//						}

//						

//					}

//					else{

//						if($t_res_count >= $t_handl_count){

//							$largest =$t_res_count;

//						}

//						else{

//							$largest =$t_handl_count;

//							

//						}

//					}

//				echo $largest;

				//Close finding largest count array

				

				for($j=0;$j<$largest;$j++){

						echo "<tr><td>";

						echo $row['time'];

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['ticket_handled'])){

							echo nl2br($row['ticket_handled'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['tickets_resolved'])){

								echo nl2br($row['tickets_resolved'][$j]);

							}else{

								echo "0";

							}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['tickets_pending'])){

							echo nl2br($row['tickets_pending'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

					}



		

			}

		}

		else{

			echo $error2;

		}

	}//close if dep-id==2

		

	//Start if dep id == 13

	elseif($dep_id==13){

		$error2 ='';

		if($ticket_info==0){

			$ticket_date =array();

			$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

		}

		else{



					$ticket_date =array();

				foreach($ticket_info as $tck){

		

					$index=date('dmY',$tck['time']);

					$ticket_date[$index]['time']= date('d-m-Y',$tck['time']);

		//			echo('<pre>');

		//			print_r($ticket_date[$index]['time']);

		//			echo('</pre>');

					if($tck['tasks_label']=="list_clients_checked"){			

						$ticket_date[$index]['list_clients_checked'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="list_techs_checked"){			

						$ticket_date[$index]['list_techs_checked'][] = $tck['tasks_list'];			

					}



					elseif($tck['tasks_label']=="under_per_techs"){			

						$ticket_date[$index]['under_per_techs'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="well_per_techs"){			

						$ticket_date[$index]['well_per_techs'][] = $tck['tasks_list'];			

					}



				}





//				echo('<pre>');

//				print_r($ticket_date);

//				echo('</pre>');

			

		}

		

		echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>



				<th>Date</th>

				<th>list_clients_checked</th>

				<th>list_techs_checked</th>

				<th>under_per_techs</th>

				<th>well_per_techs</th>

				

			</thead><tbody>";



			$list_tsk ="";

		if($ticket_info !=0){



			$largest = 0;

			foreach($ticket_date as $row){

//				  echo('<pre>');

//				  print_r($row);

//				  echo('</pre>');

				//start finding largest count array

					

					$list_clients_count = count($row['list_clients_checked']);

					$list_techs_count = count($row['list_techs_checked']);

					$under_per_count = count($row['under_per_techs']);

					$well_per_count = count($row['well_per_techs']);

					

//					echo(max($t_pendng_count,$t_res_count ,$t_handl_count));

				$largest = max($list_clients_count,$list_techs_count ,$under_per_count,$well_per_count);

				

//					if($list_clients_count >= $list_techs_count){

//						if($list_clients_count >= $under_per_count){

//							$largest = $t_pendng_count;

//						}

//						else{

//							$largest = $t_handl_count;

//						}

//						

//					}

//					else{

//						if($t_res_count >= $t_handl_count){

//							$largest =$t_res_count;

//						}

//						else{

//							$largest =$t_handl_count;

//							

//						}

//					}

//				echo $largest;

				//Close finding largest count array

				

				for($j=0;$j<$largest;$j++){

						echo "<tr><td>";

						echo $row['time'];

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['list_clients_checked'])){

							echo $row['list_clients_checked'][$j];

						}else{

							echo "0";

						}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['list_techs_checked'])){

							echo $row['list_techs_checked'][$j];

						}else{

							echo "0";

						}

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['under_per_techs'])){

							echo $row['under_per_techs'][$j];

						}else{

							echo "0";

						}

						

						echo "</td>";

					    echo "<td>";

						if(array_key_exists($j,$row['well_per_techs'])){

							echo $row['well_per_techs'][$j];

						}else{

							echo "0";

						}

						

						echo "</td>";

					}



		

			}

		}

		else{

			echo $error2;

		}

	}//close if dep-id==13

	//Start if dep id == 14Technical manager

	elseif($dep_id==14){

		$error2 ='';

		if($ticket_info==0){

			$ticket_date =array();

			$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

		}

		else{



					$ticket_date =array();

				foreach($ticket_info as $tck){

		

					$index=date('dmY',$tck['time']);

					$ticket_date[$index]['time']= date('d-m-Y',$tck['time']);

		//			echo('<pre>');

		//			print_r($ticket_date[$index]['time']);

		//			echo('</pre>');

					if($tck['tasks_label']=="escalations_handled"){			

						$ticket_date[$index]['escalations_handled'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="interviews_handled"){			

						$ticket_date[$index]['interviews_handled'][] = $tck['tasks_list'];			

					}



					elseif($tck['tasks_label']=="reviews_from_clients"){			

						$ticket_date[$index]['reviews_from_clients'][] = $tck['tasks_list'];			

					}

					



				}





//				echo('<pre>');

//				print_r($ticket_date);

//				echo('</pre>');

			

		}

		

		echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>



				<th>Date</th>

				<th>Escalations Handled</th>

				<th>Interviews Handled</th>

				<th>Reviews From Clients</th>

				

				

			</thead><tbody>";



			$list_tsk ="";

		if($ticket_info !=0){



			$largest = 0;

			foreach($ticket_date as $row){

//				  echo('<pre>');

//				  print_r($row);

//				  echo('</pre>');

				//start finding largest count array

					

					$esc_handled_count = count($row['escalations_handled']);

					$inte_handled_count = count($row['interviews_handled']);

					$reviews_from_clients_count = count($row['reviews_from_clients']);

					

					

//					echo(max($t_pendng_count,$t_res_count ,$t_handl_count));

				$largest = max($esc_handled_count,$inte_handled_count ,$reviews_from_clients_count);



				//Close finding largest count array

				

				for($j=0;$j<$largest;$j++){

						echo "<tr><td>";

						echo $row['time'];

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['escalations_handled'])){

							echo nl2br($row['escalations_handled'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['interviews_handled'])){

							echo nl2br($row['interviews_handled'][$j]);

						}else{

							echo "0";

						}

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['reviews_from_clients'])){

							echo nl2br($row['reviews_from_clients'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

					

					}



		

			}

		}

		else{

			echo $error2;

		}

	}

	//close if technical manager

	//Start if dep id == 15 Operations

	elseif($dep_id==15){

		$error2 ='';

		if($ticket_info==0){

			$ticket_date =array();

			$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

		}

		else{



					$ticket_date =array();

				foreach($ticket_info as $tck){

		

					$index=date('dmY',$tck['time']);

					$ticket_date[$index]['time']= date('d-m-Y',$tck['time']);

		

					if($tck['tasks_label']=="details_clients_contacted"){			

						$ticket_date[$index]['details_clients_contacted'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="client_followups"){			

						$ticket_date[$index]['client_followups'][] = $tck['tasks_list'];			

					}



				

				}





		}

		

		echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>



				<th>Date</th>

				<th>Clients Contacted</th>

				<th>Clients Followups</th>

		

			</thead><tbody>";



			$list_tsk ="";

		if($ticket_info !=0){



			$largest = 0;

			foreach($ticket_date as $row){

//				  echo('<pre>');

//				  print_r($row);

//				  echo('</pre>');

				//start finding largest count array

					

					$det_cli_cont_count = count($row['details_clients_contacted']);

					$det_clients_follow_count = count($row['client_followups']);

				

//					echo(max($t_pendng_count,$t_res_count ,$t_handl_count));

				$largest = max($det_cli_cont_count,$det_clients_follow_count);



				//Close finding largest count array

				

				for($j=0;$j<$largest;$j++){

						echo "<tr><td>";

						echo $row['time'];

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['details_clients_contacted'])){

							echo nl2br($row['details_clients_contacted'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['client_followups'])){

							echo nl2br($row['client_followups'][$j]);

						}

						else{

							echo "0";

						}

						echo "</td>";

					

					

					}



		

			}

		}

		else{

			echo $error2;

		}

	}

	//close dep - id 15 if for Operations

	//sTART IF DEP-ID = 16// Business DEvp Manager

	elseif($dep_id==16){

		$error2 ='';

		if($ticket_info==0){

			$ticket_date =array();

			$error2 .="<tr><td colspan='4'><div class='text-center' style='border:1px solid red;padding:10px;'>No Records Found </div><td></tr>";

		}

		else{



					$ticket_date =array();

				foreach($ticket_info as $tck){

		

					$index=date('dmY',$tck['time']);

					$ticket_date[$index]['time']= date('d-m-Y',$tck['time']);

		

					if($tck['tasks_label']=="contacted_clients"){			

						$ticket_date[$index]['contacted_clients'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="followed_up_clients"){			

						$ticket_date[$index]['followed_up_clients'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="Quara_submissions"){			

						$ticket_date[$index]['Quara_submissions'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="companies_partnership"){			

						$ticket_date[$index]['companies_partnership'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="articles_submitted"){			

						$ticket_date[$index]['articles_submitted'][] = $tck['tasks_list'];			

					}

					elseif($tck['tasks_label']=="articles_prepared"){			

						$ticket_date[$index]['articles_prepared'][] = $tck['tasks_list'];			

					}

				

				}





		}

		

		echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>



				<th>Date</th>

				<th>Clients Contacted</th>

				<th>Clients Followed up</th>

				<th>Submissions</th>

				<th>Companies Partnership </th>

				<th>Articles Submitted</th>

				<th>Articles Prepared</th>

		

			</thead><tbody>";



			$list_tsk ="";

		if($ticket_info !=0){



			$largest = 0;

			foreach($ticket_date as $row){

//				  echo('<pre>');

//				  print_r($row);

//				  echo('</pre>');

				//start finding largest count array

					

					$det_cli_cont_count = count($row['contacted_clients']);

					$det_clients_follow_count = count($row['followed_up_clients']);

					$det_clients_follow_count = count($row['Quara_submissions']);

					$det_clients_follow_count = count($row['companies_partnership']);

					$det_clients_follow_count = count($row['articles_submitted']);

					$det_clients_follow_count = count($row['articles_prepared']);

				

//					echo(max($t_pendng_count,$t_res_count ,$t_handl_count));

				$largest = max($det_cli_cont_count,$det_clients_follow_count);



				//Close finding largest count array

				

				for($j=0;$j<$largest;$j++){

						echo "<tr><td>";

						echo $row['time'];

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['contacted_clients'])){

							echo nl2br($row['contacted_clients'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['followed_up_clients'])){

							echo nl2br($row['followed_up_clients'][$j]);

						}

						else{

							echo "0";

						}

						echo "</td>";

					    echo "<td>";

						if(array_key_exists($j,$row['Quara_submissions'])){

							echo nl2br($row['Quara_submissions'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

					    echo "<td>";

						if(array_key_exists($j,$row['companies_partnership'])){

							echo nl2br($row['companies_partnership'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

					    echo "<td>";

						if(array_key_exists($j,$row['articles_submitted'])){

							echo nl2br($row['articles_submitted'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

						echo "<td>";

						if(array_key_exists($j,$row['articles_prepared'])){

							echo nl2br($row['articles_prepared'][$j]);

						}else{

							echo "0";

						}

						

						echo "</td>";

					

					

					}



		

			}

		}

		else{

			echo $error2;

		}

	}

	//Close if dep-id=16 // Business devp manager

	

	

	

	echo "</tbody>";

	

	

	echo "<div><table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><thead>

			<th>Report</th>

			<th>Date</th>

		</thead>";

	

	$record .= "</table></div>";

	echo $record;

	echo $error;

	

}

//Close method dept wise report



//Attendance module

	public function attendance(){				

//		$data['arr'] = $unserialized;
if($this->session->userdata('role')==4)	{
	$dep_id		=		1;
	$data['emp']  		 = 		 $this->Admin_model->getEachDepEmployee_daily($dep_id);	//1 == software department
}else{
	$data['emp']  		 = 		 $this->Admin_model->getEmployee_daily();	
}	
//		$data['emp'] = $this->Admin_model->getEmployee_daily();
		$this->load->view('admin/attendance',$data);

		

	}

	
/** Fetching attendance datas */

	Public function attendance_datas(){  

		$uid = $this->input->post('user_id'); 

		$month = $this->input->post('month_pick_attendancedat');

		if($month ==''){

			$month_id   = date('m-Y');

			$month_name = date('F Y');

		}

		else{ 

			$month_id   = $month;

			$m          = substr($month_id, 0, 2);

			$y          = substr($month_id, 2, 4); 

			$f_month    = "01-".$m."-".$y;

			$str_fmonth = strtotime($f_month);

			$month_name = date('F Y',$str_fmonth);

			$month_id   = $m."-".$y;

		}

		$attendance_det = $this->Admin_model->get_attendance($uid,$month_id);

		$user_name = $this->Admin_model->getUsersname($uid);

		$count = 0;

		$count = count($attendance_det);

		
		echo"<div style='display:flex; justify-content:space-between'><span class='m-badge m-badge--primary m-badge--wide m--font-bolder' >Employee : ".$user_name[0]['fullname']."</span> &nbsp;  <span class='m-badge m-badge--metal m-badge--wide m--font-bolder'>Month : ".$month_name."</span> &nbsp;<span class='m-badge m-badge--danger m-badge--wide m--font-bolder'>No. of Shifts Done : ".$count."</span></div><br/>"; 

		 

		if(count($attendance_det)>0){ 

			$getting_dep = $this->Admin_model->get_dep_id($uid);

			

			echo "<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><th>Punch in time</th><th>Punch out time</th><th>Work Place</th><th>Break Time</th><th>Work Time</th>";

			if($getting_dep[0]['dep_id']==2){

				echo "<th>Tickets Handled</th><th>Tickets Resolved</th><th>Tickets Pending</th>";

			}

			echo"<th>Desk Shots</th>";

			

			$wrk_loc = '';

			foreach($attendance_det as $attendance){

				echo "<tr><td>";

				echo date('d-m-Y h:i a',$attendance['punchin']);

				echo "<br/> IP :".$attendance['punchin_ip'];

				echo "</td><td>";

				if(!empty($attendance['punchout'])){

					echo date('d-m-Y h:i a',$attendance['punchout']);

					echo "<br/> IP :".$attendance['punchout_ip'];

				}

			    echo"</td>";

				echo "<td>";

				$wrk_loc = $attendance['work_loc'];

				if($wrk_loc == 0){

					echo "Regular";

				}

				elseif($wrk_loc == 1){

					echo "Swap Shift";

				}

				elseif($wrk_loc == 2){

					echo "Home Login";

				}

				elseif($wrk_loc == 3){

					echo "Extra Hours";

				}

				else{

					echo "Project";

				}

				echo"</td><td>";

						

						if(!empty($attendance['total_break'])){

							$brk 	 = $attendance['total_break'];

							$brk     = $brk/60;

							$brk_rem = $brk%60;

							$brk_rem = round($brk_rem);

							$brk     = ($brk - $brk_rem)/60;

							$brk     = round($brk);

							echo $brk." hrs".$brk_rem." minutes";

						}  

					    else{ 

							echo "00 Hrs";

						}

						echo "</td><td>";

						if(!empty($attendance['worked_time'])){

							$work     = $attendance['worked_time'];

							$working1 = round(($work/60),2);

							$working  = date('H:i', mktime(0, $working1));

							echo $working." Hrs";

						} 

				       echo"</td>";

				        if(!empty($attendance['work_report'])){

							$unser_wrk = unserialize($attendance['work_report']);

							 

//							echo('<pre>');

//							print_r($unser_wrk);

//							echo('</pre>'); 

							

							if($getting_dep[0]['dep_id']==2){	

								if((array_key_exists('599',$unser_wrk)) && (!empty($unser_wrk['599']['reply'])) ){

									 echo"<td>".$unser_wrk[599]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('600',$unser_wrk)) && (!empty($unser_wrk['600']['reply']))){

									 echo"<td>".$unser_wrk[600]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('601',$unser_wrk))  && (!empty($unser_wrk['601']['reply']))){

									 echo"<td>".$unser_wrk[601]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

							}

						 

						} 

					elseif(($getting_dep[0]['dep_id']==2) && (empty($attendance['work_report']))){

				               echo"<td>---</td>";

				               echo"<td>---</td>";

				               echo"<td>---</td>";

						} 

						if(array_key_exists('punchout',$attendance)){ 

							$att_id = $attendance['att_id'];

			$user_imgs=$this->Admin_model->get_all_images($uid,$att_id);

//							echo count($user_imgs)."<br/>";

							if(count($user_imgs)>0){

								echo"<td>";

								foreach($user_imgs as $img){

									echo " <a class='custom-hover' target='_blank' href='".base_url()."assets/screenshort/".$img['di_image_name']."' ><i class='fa fa-file-image-o' aria-hidden='true'></i></a> &nbsp; ";

								}

								echo"</td>";

							}

							else{

								echo"<td>---</td>";

							}

						}

						echo"</tr>";

				

			}

			echo "</table>";

			

		}

	}



	/** Assigning Weekly activity */

	Public function addNewWeeklyActivity(){

		

		$data['dep_id'] = $this->input->post('select_dept2');

		$data['wa_activity'] = $this->input->post('weekly_act');

		$data['wa_field_type'] = $this->input->post('fieldType');

		$data['wa_date']= date('now');

		

		if($data['dep_id']==0){

		 	$msg['msg']="Please Select Department";

		 	$msg['status']=0;

			echo json_encode($msg);

		 	exit;

		}elseif($data['wa_activity']==''){

			$msg['msg']="Activity field must not be empty";

			$msg['status']=0;

			echo json_encode($msg);

		 	exit;

		}

		$msg['msg']="New Activity Added!";

		$msg['last_id']=$this->Admin_model->ins_weekly_activity($data);	

		$msg['activity']=$data['wa_activity'];

		$msg['status']=1;	

		echo json_encode($msg);

		

	}

	//weekly Activity  ends

	
/** Add new monthly activity */

	Public function addNewMonthlyActivity(){

		

		$data['dep_id'] = $this->input->post('select_dept2');

		$data['ma_activity'] = $this->input->post('monthly_act');

		$data['ma_field_type'] = $this->input->post('monthlyfieldType');

		$data['ma_date']= strtotime('now');

		

		if($data['dep_id']==0){

		 	$msg['msg']="Please Select Department";

		 	$msg['status']=0;

			echo json_encode($msg);

		 	exit;

		}elseif($data['ma_activity']==''){

			$msg['msg']="Activity field must not be empty";

			$msg['status']=0;

			echo json_encode($msg);

		 	exit;

		}

		$msg['msg']="New Activity Added!";

		$msg['last_id']=$this->Admin_model->ins_monthly_activity($data);	

		$msg['activity']=$data['ma_activity'];

		$msg['status']=1;	

		echo json_encode($msg);

		

	}

	//Close Monthly activity

	Public function dailyreports(){

		$daily_array = $this->Admin_model->get_daily_array();

//		$unserialized = unserialize($daily_array); 

			foreach($daily_array as $det){

				$unser = unserialize($det['activity_array']);

			}		

//		$data['arr'] = $unserialized;

		if($this->session->userdata('role')==4)	{
	$dep_id		=		1;
	$data['emp']  		 = 		 $this->Admin_model->getEachDepEmployee_daily($dep_id);	//1 == software department
}else{
	$data['emp']  		 = 		 $this->Admin_model->getEmployee_daily();	
}	

		$this->load->view('admin/dailyreports',$data);

	}



/** Edit department names */
  	Public function editdepts(){
		$dep_id = $this->input->post('dep_id');
		$input_text = $this->input->post('text2');
		$data['dep_name'] = $input_text;
		$this->Admin_model->edit_department($dep_id,$data);

	}

/** Edit team details */
  	Public function editteams(){
		$team_id = $this->input->post('team_id');  

		$mail_ids = $this->input->post('mail_ids');

		$m_ids = explode(",",$mail_ids);

		foreach($m_ids as $mids){

			if (!filter_var($mids, FILTER_VALIDATE_EMAIL)){

			  $err['flag'] = 0;

			  $err['msg'] = "Invalid mail id";

				break;
			}

			else{
				 $err['flag'] = 1;

				$err['msg'] = "Successfully updated ";
			}
		}
		if( $err['flag'] == 1){

			$input_text = $this->input->post('text2');

			$data['name'] = $input_text;

			$data['mail_ids'] = $mail_ids;
			$this->Admin_model->edit_team($team_id,$data);

		}
		echo json_encode($err); 
	}


/** Delete departments  */

	Public function delete_depts(){ 
		if($this->session->userdata('role')!=4)	{
			$dep_id			  		   = $this->input->post('dep_id');
			$data['dep_id'] 		= $dep_id;
			$data['status']			 = $this->Admin_model->delete_dept($dep_id,$data); 
			
		}else{
			$data['status']			= false;
			$data['message']	 = "You do not have permission to delete!";
		}

		echo json_encode($data);
	}

	
/** start Commenting section */ 
	Public function add_comments_c(){  

		$cmnts   		  = $this->input->post('comments');

		$user_id          = $this->input->post('uid');
		$data['comments'] = $cmnts;

		$data['time']     = strtotime('now');

		$data['user_id']  = $user_id ;

		$this->load->model('Admin_model');

		$res['last_id']   = $this->Admin_model->Ins_comments($data);

		$res['time']      = date('d-m-Y H:i a');

		echo json_encode($res);

	}   

	 

/*** Delete comments */

	Public function delete_Comments(){ 

		$user_id     = $this->input->post('uid');

		$last_ins_id = $this->input->post('ins_id');

		$this->load->model('Admin_model');

		$del['stat']         = $this->Admin_model->Delete_comments($user_id,$last_ins_id);

		echo json_encode($del);

	}

	

	Public function ViewAllComments($uid){

//		$id = $_GET['id'];

//		$data['user_id']  = $this->input->get('id');

		$data['user_id']  = $uid;

		$this->load->view('admin/view_comments',$data);

		

		

	}

	Public function getAllComments(){ 

//		$id = $_GET['id'];

		$user_id  = $this->input->post('uid');

		$this->load->model('Admin_model');

		$allComments = $this->Admin_model->Get_all_comments($user_id);

//		echo('<pre>');

//		print_r($allComments);

//		echo('</pre>');

		

		echo "<div class='m-portlet'>

							

							<div class='m-portlet__body'>

								<!--begin::Section-->

								<div class='m-section'>

									<div class='m-section__content'>

										<table class='table table-striped m-table'>

											<thead>

												<tr>

													<th>

														Date & Time

													</th>

													<th>

														 Comments

													</th>

												</tr>

											</thead>

											<tbody>";

		if(count($allComments)>0){

			foreach($allComments as $row){

				echo "<tr><td>".date('d-m-Y H:i a',$row['time'])."</td>";

				echo "<td>".nl2br($row['comments'])."</td></tr>";

			}

			

		}

	

										echo "</tbody>

										</table>

									</div>

								</div>

								<!--end::Section-->

							</div>

							<!--end::Form-->

						</div>";

		

	}

//Commenting section



	



//=================================== test method ==================================

	Public function testfun(){

		

	/*	$result=$this->Admin_model->getperf();	

			print_r($result);*/

		        

		$request=$this->Admin_model->GetRequestDta(50);

		$rqtype=$this->RequestType($request->lv_type);

		//mail function

			$subject = "Hashroot PE Portal ".$rqtype;			

			$config = array(

			 'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'

			 'smtp_host' => 'zimbra.hashroot.com',

			 'smtp_port' => 465, 

			 'smtp_user' => 'site@hashroot.com',

			 'smtp_pass' => 'Jn^8wC4g',

			 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example

			 'mailtype' => 'html', //plaintext 'text' mails or 'html'

			 'smtp_timeout' => '4', //in seconds

			 'charset' => 'iso-8859-1',

			 'wordwrap' => TRUE

			);

			$this->load->library('email',$config);

			$this->email->from("site@hashroot.com",'PE-Portal');

			$email4 = "renjith.kr@hashroot.com";

			$this->email->to($request->email);

			$this->email->cc('another@another - example.com');

			$this->email->bcc('them@their - example.com');

  			$this->email->subject($subject);			

			$this->email->message('Hi , <br/>

			Requested date '.date('d M Y',$request->lv_aply_date).'<br />

			<p>Your '.$rqtype.' request has been approved</p> 

			 ');



  			$this->email->send();	

			

	}

	

	//Daily datas history with month picker
	Public function Daily_history(){
		$data['emp'] = $this->Admin_model->getEmployee_daily();
		$this->load->view('admin/daily_history',$data);
	}

	
/** Daily ticket datas, only for servera adminz */
	Public function daily_History_datas(){

		$uid = $this->input->post('user_id'); 

		$month = $this->input->post('month_pick_attendancedat');

		if($month ==''){

			$month_id   = date('m-Y');

			$month_name = date('F Y');

		}

		else{ 

			$month_id   = $month;

			$m          = substr($month_id, 0, 2);

			$y          = substr($month_id, 2, 4); 

			$f_month    = "01-".$m."-".$y;

			$str_fmonth = strtotime($f_month);

			$month_name = date('F Y',$str_fmonth);

			$month_id   = $m."-".$y;

		}

		$attendance_det = $this->Admin_model->get_attendance($uid,$month_id);

		$user_name      = $this->Admin_model->getUsersname($uid);

		$count          = 0;
		$count          = count($attendance_det);
		echo"<div style='display:flex; justify-content:space-between'><span class='m-badge m-badge--primary m-badge--wide m--font-bolder' >Employee : ".$user_name[0]['fullname']."</span> &nbsp;  <span class='m-badge m-badge--metal m-badge--wide m--font-bolder'>Month : ".$month_name."</span> &nbsp;<span class='m-badge m-badge--danger m-badge--wide m--font-bolder'>No. of Shifts Done : ".$count."</span></div><br/>"; 

		 

		if(count($attendance_det)>0){ 

			$getting_dep = $this->Admin_model->get_dep_id($uid);

			if($getting_dep[0]['dep_id']==2){

				echo "<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><th>Punch in time</th><th>Punch out time</th>";

				echo "<th>Tickets Handled</th><th>Tickets Resolved</th><th>Tickets Pending</th>";
			}

			elseif($getting_dep[0]['dep_id']==44){

				echo "<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'><th>Punch in time</th><th>Punch out time</th>";

				echo "<th>DA of ServerAdminz</th><th>Daily visitors of ServerAdminz</th><th>PA of ServerAdminz</th><th>Alexa Rank of ServerAdminz</th>";

			}

			else{

				echo"Not Applicable To This Department";

			}

			foreach($attendance_det as $attendance){

				 if(!empty($attendance['work_report'])){

							$unser_wrk = unserialize($attendance['work_report']);

							if($getting_dep[0]['dep_id']==2){

								echo "<tr><td>";

								echo date('d-m-Y h:i a',$attendance['punchin']);

								echo "</td><td>";

								if(!empty($attendance['punchout'])){

									echo date('d-m-Y h:i a',$attendance['punchout']);

								}

								echo"</td>";

								if((array_key_exists('599',$unser_wrk)) && (!empty($unser_wrk['599']['reply'])) ){

									 echo"<td>".$unser_wrk[599]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('600',$unser_wrk)) && (!empty($unser_wrk['600']['reply']))){

									 echo"<td>".$unser_wrk[600]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('601',$unser_wrk))  && (!empty($unser_wrk['601']['reply']))){

									 echo"<td>".$unser_wrk[601]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

							}

							elseif($getting_dep[0]['dep_id']==44){

								echo "<tr><td>";

								echo date('d-m-Y h:i a',$attendance['punchin']);

								echo "</td><td>";

								if(!empty($attendance['punchout'])){

									echo date('d-m-Y h:i a',$attendance['punchout']);

								}

								echo"</td>";

								

								if((array_key_exists('615',$unser_wrk)) && (!empty($unser_wrk['615']['reply'])) ){

									 echo"<td>".$unser_wrk[615]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('610',$unser_wrk)) && (!empty($unser_wrk['610']['reply']))){

									 echo"<td>".$unser_wrk[610]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('613',$unser_wrk))  && (!empty($unser_wrk['613']['reply']))){

									 echo"<td>".$unser_wrk[613]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								if((array_key_exists('609',$unser_wrk))  && (!empty($unser_wrk['609']['reply']))){

									 echo"<td>".$unser_wrk[609]['reply']."</td>";

								}

								else{

									 echo"<td>---</td>";

								}

								

							}

							

						}


						echo"</tr>";

			}

			echo "</table>";
		}

	}

	

/** Add new project room */
	Public function add_new_projectroom(){  

	 $admin = [];

	 $udet  = [];

	 $this->load->model('Admin_model');

	 $pr_users  = $this->input->post('emps_dataflex');

	 $admin_id = $this->session->userdata('id');

	 $admin_name = $this->session->userdata('adminname');

	 $admin_a = $this->Admin_model->admin_a();

	 /**

	  * inject admin users to the project rooms

	  */

	 foreach ($admin_a as $key => $row) {

	 	$udet[$row['id']]['userid']      = $row['id'];

		$udet[$row['id']]['emplid']      = $row['id'];

		$udet[$row['id']]['name']        = $row['name'];

		$udet[$row['id']]['role']        = 'admin';

	 }



	    if($this->input->post('pr_name') == ''){

		 	$flag['stat'] = 0;

			$flag['msg'] = "Please add project name .";

			echo json_encode($flag);

			exit();

		 }   

		if($pr_users == ''){

			$data['stat'] = 0;

			$data['msg'] = "PLease add users";

			echo json_encode($data);

			exit();

		}

	

		/**

		 * Add users to the project room and make the role as users

		 */

		$userdet       =  $this->Admin_model->getUserdet($pr_users);

		

		 if(count($userdet)>0){

			  foreach($userdet as $users){ 

				$udet[$users['user_id']]['userid']      = $users['user_id'];

				$udet[$users['user_id']]['emplid']      = $users['emp_id'];

				$udet[$users['user_id']]['name']        = $users['fullname'];

				$udet[$users['user_id']]['role']        = 'user';



		      }  



		/*print_r($udet);

		exit();*/



		$data['pr_userids']       = serialize($udet);

		$data['pr_name']   		  = $this->input->post('pr_name');

		$data['pr_description']   = $this->input->post('pr_desc');

		$data['pr_createdby']     = $admin_name;

		$data['pr_createddate']   = strtotime('now');



		$lastid     			  = $this->Admin_model->ins_userdatas($data);

		

            /**

             * add admin into chat room users and making his role as admin

             */

            $datas[] = [

            		'pr_id' => $lastid, 

            		'user_id' => $admin_id, 

            		'pru_status' => 0, 

            		'pru_title' => $this->input->post('pr_name'),

            		'role' => 'admin'

            	];

			

			/**

			 * adding users to the chat room users table, and user as the role

			 */

			foreach($pr_users as $us_lst){

				$datas[]=array('pr_id'  => $lastid,

							  	'user_id'    => $us_lst,

							 	'pru_status' => 0,

							  	'pru_title'  => $this->input->post('pr_name'),

							  	'role' => 'user'

								);

				

			}



			$ret = $this->Admin_model->InsAllUsers($datas);

		    

			if($ret >=1){

				$flag['stat'] = 1;

				$flag['msg'] = "Project room added successfully .";

			}

			else{

				$flag['stat'] = 0;

				$flag['msg'] = "Something went wrong .";

			}



			echo json_encode($flag); 

			

		}

	   

		

	}

	

	

	Public function view_projectrooms(){  

		$this->load->model('Admin_model');

		$result['res']       = $this->Admin_model->viewProjectRooms();

		$result['employees'] = $this->Admin_model->getEmployee_daily();

		$this->load->view('admin/view_projectrooms.php',$result);

	}

	

	Public function get_project_details(){   

		$this->load->model('Admin_model');

		$id               = $this->input->post('id');

		$det['project']   = $this->Admin_model->get_proj_det($id);

		$det['user_list'] = unserialize($det['project'][0]['pr_userids']); 

		//		echo('<pre>');

		//		print_r($det['user_list']);

		//		echo('</pre>'); 

		$det['users']     = ''; 

		foreach($det['user_list'] as $users){

			 $det['users'][] = $users['name'];

			 $det['user_ids'][] = $users['userid'];

		} 

		echo json_encode($det);

	}





	Public function edit_projectroom(){

		 $admin = [];

		 $udet  = [];

		 $this->load->model('Admin_model');

		 $pr_id     = $this->input->post('proj_id');

		 $admin_id = $this->session->userdata('id');

		 $admin_name = $this->session->userdata('name');



		 $admin_a = $this->Admin_model->getAdmins();



		 /**

		  * inject admin users to the project rooms

		  */

		 foreach ($admin_a as $key => $row) {

		 	$udet[$row['id']]['userid']      = $row['id'];

			$udet[$row['id']]['emplid']      = $row['id'];

			$udet[$row['id']]['name']        = $row['name'];

			$udet[$row['id']]['role']        = 'admin';

		 }



		 $pr_name   = $this->input->post('pr_name');

		 $pr_users  = $this->input->post('emp_input_dtflx');

		 $created   = $this->input->post('createdby');

		 $pr_desc   = $this->input->post('pr_desc:');



		 if($this->input->post('pr_name') == ''){

		 	$flag['stat'] = 0;

			$flag['msg'] = "Please add project name .";

			echo json_encode($flag);

			exit();

		 }   

		if($pr_users == ''){

			$data['stat'] = 0;

			$data['msg'] = "PLease add users";

			echo json_encode($data);

			exit();

		}



		/**

		 * add users to the project room

		 */

		$userdet       =  $this->Admin_model->getUserdet($pr_users);



		if(count($userdet)>0){

			foreach($userdet as $users){ 

				$udet[$users['user_id']]['userid']      = $users['user_id'];

				$udet[$users['user_id']]['emplid']      = $users['emp_id'];

				$udet[$users['user_id']]['name']        = $users['fullname'];



			}

		}



		$data['pr_userids']       = serialize($udet);

		$data['pr_name']   		  = $this->input->post('pr_name');

		$data['pr_description']   = $this->input->post('pr_desc');

		$data['pr_createddate']   = strtotime('now');



		$ret = $this->Admin_model->edit_project_room($data, $pr_id);



		if($ret['status'] == 'success'){

			$flag['stat'] = 1;

			$flag['msg'] = "Project room added successfully .";

			$flag['pr_id'] = $pr_id;

		}

		else{

			$flag['stat'] = 0;

			$flag['msg'] = "Something went wrong .";

		}



		echo json_encode($flag); 



	}

	

//===================================test method==================================

		Public function viewemployees(){

		

		$result=$this->Admin_model->viewlinkedin();

		echo json_encode($result);

	}



	public function getEmployees(){

		$this->load->model('Admin_model');

		$data['employees'] = $this->Admin_model->getEmployee_daily();

		if($data['employees']){

			$data['status'] = 'success';

		}else{

			unset($data['employees']);

			$data['status'] = 'fail';

		}

	echo json_encode($data);

}



	public function admin_chat(){

		$this->load->view('admin/admin_chat'); 

	}



	public function view_shifts(){

		$this->load->model('Shift_model');

		$data['team'] = $this->Shift_model->getAllTeams();

		$this->load->view('admin/view_shift_det', $data);

	}



	


	public function interview_list(){
		$this->load->model('Admin_model');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$type     = $this->input->post('type');
		$data['current_employees'] = $this->Admin_model->getCurrentEmployees();
		$this->load->view('admin/candidatelist',$data);
	}

	Public function candidates_data(){
		$data = $this->Admin_model->get_default_interview_list();
		echo json_encode( $data, JSON_PRETTY_PRINT);
    }

	/** Get interview details of one candidate */
	public function get_candidate_details(){
		$examiner_array = array();
		$interview_id = $this->input->post('interview_id');
		$result = $this->Admin_model->get_candidate_dets($interview_id);
		
		$result->data->examiners_details = unserialize($result->data->examiners_details);
		$result->data->comment_array	 = unserialize($result->data->comment_array);
		 
		echo json_encode($result);
	}



	public function manage_wfh(){

		$this->load->model('Admin_model');

		$user_id = $this->input->post('user_id');

		$wfh = $this->input->post('wfh');



		$result = $this->Admin_model->manage_wfh($user_id, $wfh);

		echo json_encode($result);



	}

	public function overtime_reset(){

		$wrk_id = $this->input->post('wrk_id');

		$this->load->model('Admin_model');

		$result = $this->Admin_model->OvertimeReset($wrk_id);

		echo json_encode($result);

	}

//JD Skill set update 

	public function getEmployeeSkillSet(){

		$user_id = $this->input->post('user_id');

		$this->load->model('Admin_model');  

		$result=[];

		//skills  added 

		$skill_update_status  = false;

		$skill_verify_status    = false;

		$result['added'] = $this->Admin_model->getEmployeeSkillSet($user_id,$skill_update_status,$skill_verify_status);

		//skills  for review  

		$skill_update_status  = true;

		$skill_verify_status    = false;

		$result['review'] = $this->Admin_model->getEmployeeSkillSet($user_id,$skill_update_status,$skill_verify_status);

		//Completed Skills

		$skill_update_status  = true;

		$skill_verify_status    = true;

		$result['completed'] = $this->Admin_model->getEmployeeSkillSet($user_id,$skill_update_status,$skill_verify_status);

		echo json_encode($result);

	}

	function removeSkill(){

		$skill_id = $this->input->post('skill_id');

		$this->load->model('Admin_model');

		$result=$this->Admin_model->removeEmployeeSkill($skill_id);

		echo json_encode($result);

	}

	function changeSkillStatus(){

		$skill_id                   = $this->input->post('skill_id');

		$skill_update_status = $this->input->post('skill_update_status');

		$skill_verify_status   = $this->input->post('skill_verify_status');

		$result                     = $this->Admin_model->changeSkillStatus($skill_id,$skill_update_status,$skill_verify_status);

		echo json_encode($result);

	}

	/** Add new skill */
	function addNewSkill(){

		$user_id    = $this->input->post('user_id');

		$skillname = $this->input->post('skillname');

		$data = array(

			'user_id'=>$user_id,

			'skill_name'=>$skillname

		);

		$result                     = $this->Admin_model->addNewSkill($data);

		echo json_encode($result);

	}

//JD Skill set update 



	

	public function cancel_interview(){
		$this->load->model('Admin_model');
		$interview_id = $this->input->post('interview_id');
		$result = $this->Admin_model->cancel_interview($interview_id);
		echo json_encode($result);
	}





	public function get_notice_users(){

		$userType = $this->input->post('notice_usertype');



		switch ($userType) {

			case 'individual':

					$employees = $this->Admin_model->getEmployee_daily();

					echo json_encode(['status' => true, 'data' => $employees, 'userType' => 'individual']);

				break;

			case 'team':

					$teams = $this->Admin_model->viewallteam();

					echo json_encode(['status' => true, 'data' => $teams, 'userType' => 'team']);

				break;

			case 'department':

					$departments = $this->Admin_model->viewalldepts();

					echo json_encode(['status' => true, 'data' => $departments, 'userType' => 'department']);

				break;

		}

	}


/** Create notice or announcements */
	public function save_notice(){

		$this->load->model('Admin_model');

		$usertype = $this->input->post('notice_usertype');

		$users_a = $this->input->post('notice_user');

		$notice = $this->input->post('notice_text');

		$notice_color = $this->input->post('notice_color');



		switch ($usertype) {

			case 'individual':

				$insert_a = [];

				$notice_id = $this->Admin_model->create_notice($notice);

				foreach ($users_a as $key => $value) {

					$row = new stdClass();

					$row->user_id = $value;

					$row->notice_id = $notice_id;

					$row->color = $notice_color;

					$row->type = $usertype;

					array_push($insert_a, $row);

				}



				$result = $this->Admin_model->update_notice_table($insert_a);

				break;



			case 'team':

				$insert_a = [];

				$notice_id = $this->Admin_model->create_notice($notice);

				$team_users = $this->Admin_model->get_users_with_teamids($users_a);

				foreach ($team_users as $key => $value) {

					$row = new stdClass();

					$row->user_id = $value->user_id;

					$row->notice_id = $notice_id;

					$row->type = $usertype;

					$row->color = $notice_color;

					$row->team_id = $value->team_id;

					$row->deps_id = $value->dep_id;

					array_push($insert_a, $row);

				}

				$result = $this->Admin_model->update_notice_table($insert_a);

				

				break;



			case 'department':

				$insert_a = [];

				$notice_id = $this->Admin_model->create_notice($notice);

				$dep_users = $this->Admin_model->get_users_with_depIds($users_a);

				foreach ($dep_users as $key => $value) {

					$row = new stdClass();

					$row->user_id = $value->user_id;

					$row->notice_id = $notice_id;

					$row->type = $usertype;

					$row->color = $notice_color;

					$row->deps_id = $value->dep_id;

					$row->team_id = $value->team_id;

					array_push($insert_a, $row);

				}

				$result = $this->Admin_model->update_notice_table($insert_a);

				

				break;



			case 'all':

				$insert_a = [];

				$notice_id = $this->Admin_model->create_notice($notice);

				$employees = $this->Admin_model->getEmployee_daily();

				foreach ($employees as $key => $value) {



					$row = new stdClass();

					$row->user_id = $value['user_id'];

					$row->notice_id = $notice_id;

					$row->type = $usertype;

					$row->color = $notice_color;

					$row->deps_id = $value['dep_id'];

					$row->team_id = $value['team_id'];

					array_push($insert_a, $row);

				}

				$result = $this->Admin_model->update_notice_table($insert_a);

				

				break;

			

			default:

				# code...

				break;

		}



		echo json_encode($result);

	}


/** Get list of notices or announcements */
	public function notice_boards_list(){
		$this->load->model('Admin_model');

		$data = $this->Admin_model->notice_board_list();

		if($data){

			echo json_encode(['status' => true, 'data' => $data]);

		}else{

			echo json_encode(['status' => false, 'data' => 'Sorry no notice available']);

		}

	}


/** delete notices or announcement */
	public function delete_notice(){
		$this->load->model('Admin_model');

		$notice_id = $this->input->post('notice_id');

		$type = $this->input->post('type');

		$id = $this->input->post('id');

		$result = $this->Admin_model->delete_notice($notice_id, $type, $id);

		echo json_encode($result);

	}



	public function notice_board_details($notice_id, $type){

		$this->load->model('Admin_model');

		$result = $this->Admin_model->get_notice_board_details($notice_id, $type);
		$users_a = [];
		$notice = '';
		$result_a=[];
		$color = '';

		

		if($type == 'team'){

			foreach ($result as $key => $value) {

				if(!in_array($value->team_id, $users_a)){

					array_push($users_a, $value->team_id);

				}

				$notice = $value->notice;
				$color = $value->color;

			}



			$result_a = ['type' => $type, 'users_a' => $users_a, 'notice' => $notice, 'color' => $color];

		}



		if($type == 'department'){

			foreach ($result as $key => $value) {

				if(!in_array($value->deps_id, $users_a)){

					array_push($users_a, $value->deps_id);

				}

				$notice = $value->notice;
				$color = $value->color;

			}



			$result_a = ['type' => $type, 'users_a' => $users_a, 'notice' => $notice, 'color' => $color];	

		}



		if($type == 'individual'){

			foreach ($result as $key => $value) {

				if(!in_array($value->user_id, $users_a)){
					array_push($users_a, $value->user_id);
				}
				$notice = $value->notice;
				$color = $value->color;
			}
			$result_a = ['type' => $type, 'users_a' => $users_a, 'notice' => $notice, 'color' => $color];
		}
		if($type == 'all'){
			$result_a = ['type' => $type, 'notice' => $result[0]->notice, 'color' => $result[0]->color];
		}
		if($result_a){
			echo json_encode(['status' => true, 'data' => $result_a]);
		}else{
			echo json_encode(['status' => false, 'message' => 'Sorry no data found']);
		}

	}


/** Update notices or announcements */
	public function update_notice_board(){

		$this->load->model('Admin_model');
		$usertype = $this->input->post('notice_usertype');
		$users_a = $this->input->post('notice_user');
		$notice = $this->input->post('notice_text');
		$notice_color = $this->input->post('notice_color');
		$notice_id = $this->input->post('notice_id');
		$update_res = $this->Admin_model->update_notice_post($notice, $notice_id);
		$deleted_res = $this->Admin_model->delete_notice_bord_data($notice_id);



		if($deleted_res == true){

			switch ($usertype) {
				case 'individual':
					$insert_a = [];
					foreach ($users_a as $key => $value) {

						$row = new stdClass();
						$row->user_id = $value;
						$row->notice_id = $notice_id;
						$row->color = $notice_color;
						$row->type = $usertype;
						array_push($insert_a, $row);

					}

					$result = $this->Admin_model->update_notice_table($insert_a);
					break;
				case 'team':

					$insert_a = [];

					$team_users = $this->Admin_model->get_users_with_teamids($users_a);

					foreach ($team_users as $key => $value) {

						$row = new stdClass();
						$row->user_id = $value->user_id;
						$row->notice_id = $notice_id;
						$row->type = $usertype;
						$row->color = $notice_color;
						$row->team_id = $value->team_id;
						$row->deps_id = $value->dep_id;
						array_push($insert_a, $row);

					}

					$result = $this->Admin_model->update_notice_table($insert_a);

					

					break;



				case 'department':

					$insert_a = [];

					$dep_users = $this->Admin_model->get_users_with_depIds($users_a);

					foreach ($dep_users as $key => $value) {

						$row = new stdClass();
						$row->user_id = $value->user_id;
						$row->notice_id = $notice_id;
						$row->type = $usertype;
						$row->color = $notice_color;
						$row->deps_id = $value->dep_id;
						$row->team_id = $value->team_id;
						array_push($insert_a, $row);

					}

					$result = $this->Admin_model->update_notice_table($insert_a);

					

					break;



				case 'all':

					$insert_a = [];

					$employees = $this->Admin_model->getEmployee_daily();

					foreach ($employees as $key => $value) {
						$row = new stdClass();
						$row->user_id = $value['user_id'];
						$row->notice_id = $notice_id;
						$row->type = $usertype;
						$row->color = $notice_color;
						$row->deps_id = $value['dep_id'];
						$row->team_id = $value['team_id'];
						array_push($insert_a, $row);

					}

					$result = $this->Admin_model->update_notice_table($insert_a);

					

					break;

				

			}



			echo json_encode($result);

		}

	}


/** Create designation */
	public function create_designation(){

		$this->load->model('Admin_model');

		$designation['designation'] = $this->input->post('designation');

		$result = $this->Admin_model->create_new_designation($designation);

		echo json_encode($result);

	}



	public function get_designation_list(){

		$this->load->model('Admin_model');

		$result = $this->Admin_model->viewalldesignation();

		if($result){

			echo json_encode(['status' => true, 'data' => $result]);

		}else{

			echo json_encode(['status' => false, 'message' => 'Sorry no designation available']);

		}

	}


/*** Edit and update designation details */
	public function edit_designation(){

		$this->load->model('Admin_model');

		$desig_id = $this->input->post('design_id');

		$designation = $this->input->post('designation');

		$result = $this->Admin_model->update_designation($designation, $desig_id);

		echo json_encode($result);

	}



	function getTicketsCount($user_id){

		// $user_id   = $this->session->userdata('user_id');

		$this->load->model('Admin_model');

		$data		= $this->Admin_model->workReportGraph($user_id);

		$result['resolved'] =0;

		$result['pending'] =0;

		$result['handled'] =0;

		$result['sla'] =0;

		foreach ($data as $index => $report) {

			$tickets			 	   = (unserialize($report->work_report)); 

			if(isset($tickets[600])){
				$result['resolved']    = $result['resolved']+$tickets[600]['reply'];
			}
			if(isset($tickets[601])){
				$result['pending']     = $result['pending']+$tickets[601]['reply'];
			}
			if(isset($tickets[599])){
				$result['handled']     = $result['handled']+$tickets[599]['reply'];
			}

			$result['sla']     		  = $result['sla']+$report->sla_violation;

		}

		return($result); 

	}


/** To update core employee */
	public function make_core_employee(){

		$this->load->model('Admin_model');

		$user_id = $this->input->post('user_id');

		$core_status = $this->input->post('core_status');

		$result = $this->Admin_model->update_core_employee($user_id, $core_status);

		echo json_encode($result);

	}

	/** Task management */
	Public function taskManagement(){	
		$data				    = $this->session->userdata();
		$data['taskListOwn']	= $this->Admin_model->getTaskList($this->session->userdata('id'));
		if($data['taskListOwn'] != ""){
			foreach($data['taskListOwn'] as $key=>$value){
				if($data['taskListOwn'][$key]->task_attachment == ""){
					$data['taskListOwn'][$key]->task_attachment = "";
				}
				else{
					$data['taskListOwn'][$key]->task_attachment = unserialize($value->task_attachment);
				}
			}
		}
		$data['tasklistOthers'] = $this->Admin_model->getTasklistOthers();
		if($data['tasklistOthers'] != ""){
			foreach($data['tasklistOthers'] as $key=>$value){
				if($data['tasklistOthers'][$key]->task_attachment == ""){
					$data['tasklistOthers'][$key]->task_attachment = "";
				}
				else{
					$data['tasklistOthers'][$key]->task_attachment = unserialize($value->task_attachment);
				}
			}
		}
		$data['employee_list'] 	= $this->Admin_model->getTeamData();
		$this->load->view('admin/managetask',$data); 
	}


/** Delete tasks */
	function deleteTask(){

		$asgnmnt_id				=	$this->input->post('asgnmnt_id');
		$data						=   $this->Admin_model->deleteTask($asgnmnt_id);

		if($data){
			$response['status']	       =  $data;
			$response['message']	= "Removed successfuly";
		}else{
			$response['status']	 		= $data;
			$response['message']	= "Try again later!";
		}
		echo json_encode($response);
	}

	//edit deadline

	function editdeadline(){

		$asgnmnt_id				=	$this->input->post('asgnmnt_id');
		$data						=   $this->Admin_model->editdeadline($asgnmnt_id);

		if($data){
			$response['status']	       =  $data;
			$response['message']	= "Removed successfuly";
		}else{
			$response['status']	 		= $data;
			$response['message']	= "Try again later!";
		}
		echo json_encode($response);
	}



	function viewTaskDetails(){

		$asgnmnt_id				=	$this->input->post('asgnmnt_id');
		$data		= $this->Admin_model->getTask($asgnmnt_id);
		if($data->status==1){
			$data->status = "Done";
		}else{
			$data->status = "In Progress";
		}
		if($data->creator_id==1){ 
			$data->assignee = $this->session->userdata('adminname');
		}elseif($data->creator_id==7){
			$data->assignee = "Muneer";
		}else{
			$data->assignee = $this->Admin_model->getFullName($data->creator_id)->fullname;
		}
		$data->assigner = $this->Admin_model->getFullName($data->assign_to)->fullname;
		if($data->period=="ONE"){
			$data->date = date('d F Y',strtotime($data->date));
		}
		$data->comments = unserialize($data->comments);
		$data->body = nl2br($data->body);
		if($data->task_attachment == ""){
		
			$data->task_attachment = ""; 
		}
		else{
			$data->task_attachment = unserialize($data->task_attachment);
		}

		echo json_encode($data);
	}


//update date tasl
	function updateTaskdate(){

		
		$date = $this->input->post('date');
		$taskid = $this->input->post('taskid');
		if($date=='' || $taskid==''){
			$response['status'] = false;
			$response['message'] = "Field cannot be empty";
			echo json_encode($response);
			exit;
		}
		
		$this->load->model('Tasks_model');

		$data['date']=$date;
		$response['status'] =$this->Tasks_model->updateTaskdate($data,$taskid);

		if($response['status'])
		{
			$response['message'] ="Success";
			$response['date'] =date("d M Y",strtotime($date));
			$response['taskid'] =$taskid;
		}

		else {
			$response['message'] ="Error";
		}

		echo json_encode($response);
		
	}

	 function resetMandatory(){
		$work_id = $this->input->post('work_id');
		$response = array('status' =>0 ,
									'message'=>"Something went wrong." 
								);
		if($work_id){
			$designationId	=	$this->Admin_model->getDesignation($work_id);
			
			if($designationId==1 || $designationId==0){
				$fix_pend_minutes  = 178200;
			}else{
				$fix_pend_minutes  = 148500;
			}

			if($this->Admin_model->updateMandatory($work_id,$fix_pend_minutes)){
				$response['status']     =  1;
				$response['new']        =  $this->GetRealTime($fix_pend_minutes);
				$response['message'] = "Updated Successfuly";
			}
		}
		echo json_encode($response);
	}

	function updateMandatory(){
		$work_id  = $this->input->post('work_id');
		$seconds       = $this->input->post('seconds');
		$response = array('status' =>0 ,
									'message'=>"Something went wrong. Please try again!" 
								);
		if($work_id && isset($seconds)){
			$pendingHours	=	$this->Admin_model->getPendingHours($work_id);
			 $reduceHours     =  $pendingHours - $seconds;
			if($this->Admin_model->updateMandatory($work_id,$reduceHours)){
				$response['status']     =  1;
				$response['new']        =  $this->GetRealTime($reduceHours);
				$response['message'] = "Updated Successfuly";
			 }
		}
		echo json_encode($response);
	}
//moved to Tasks controller
	// function updateTaskComment(){
	// 	//$user_id 				 =	 $this->session->userdata('user_id');  
	// 	$asgnmnt_id				=	$this->input->post('task_id');
	// 	$comment				=	$this->input->post('comment');
	// 	$status					    =	$this->input->post('status');
	// 	 if($status){
	// 		 $status=1;
	// 	 }
		
	// 	$data		= $this->Admin_model->getTask($asgnmnt_id);


	// 	$getComment  = unserialize($data->comments);

	// 	$newComment['date']							 = 	 date("dFY h:i:s a");
	// 	$newComment['time_stamp']				=	strtotime("now");
	// 	$newComment['comments']					=	$comment;
	// 	$newComment['status']						=	$status;
	// 	$newComment['name']						   =	$this->session->userdata('adminname');
	// 	array_push($getComment,$newComment);
		
	// 	$serializeComment	=	serialize($getComment);
	// 	$serializeComment   =	["comments"=>$serializeComment,"status"=>$status];
	// 	$updateStatus		   =   $this->Admin_model->updateTaskComment($asgnmnt_id,$serializeComment);

	// 	if($updateStatus){
	// 		$response['status'] 		= $updateStatus;
	// 		$response['comment']	 = $newComment;
	// 		$response['task_status'] = $status;
	// 		$response['message']	="Comment added Succesfuly!";
	// 		echo json_encode($response);
	// 	}else{
	// 		$response['status'] = $updateStatus;
	// 		$response['message']="Something went wrong!";
	// 		echo json_encode($response);
	// 	}


	// }
}

