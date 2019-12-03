<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_Controller
{


	/**
	 * run weekly, resets mandatory hours
	 */
	Public function WeeklyHrsCron()
	{
		$month_first_day = date('Y-m-01');
		$currentDay = date('Y-m-d');
		$this->load->model('Sample_model');
		$lastsun        = strtotime('last Monday');
		$today_time     = strtotime('-1 days');
		$repeating_rows = $this->Sample_model->get_repeating_weeks($lastsun,$today_time);
		echo "<pre>";
		print_r($repeating_rows);
		echo "</pre>";
		if(count($repeating_rows) > 0)
		{
			//print_r($repeating_rows);
			$get_calcs         = $this->Sample_model->get_calcs();
			$fixed_pending_hrs = $get_calcs[0]['pending_calc'] ;
			$time_conv         = explode(':', $fixed_pending_hrs);
			$fix_pend_minutes  = 148500;

			foreach($repeating_rows as $res)
			{
// Designation 22 for L1 experienced tech 49:30 Hr 
				if($res['desgn_id']==1 || $res['desgn_id']==0){
					$fix_pend_minutes  = 178200;
				}else{
					$fix_pend_minutes  = 148500;
				}
				$rep_data['user_id'] = $res['user_id'];

				//$sdata['hrs_worked'] = $this->Sample_model->selectsumwork($res['user_id'])->sumof;
				$rep_data['hrs_worked'] 	   = 0;
				$rep_data['extra_hrs'] 	   	   = $res['extra_hrs'] ;
				$rep_data['flexi_hrs']		   =  $res['flexi_hrs'];
				$rep_data['date']			   =	strtotime('now'); 
				$rep_data['pending_hrs'] 	   = ($res['pending_hrs']+ $fix_pend_minutes);
				$finish = $this->Sample_model->create_new_row($rep_data);   
				echo $finish;     
			}
		}
	}

	/**
	 * reset mandatory hours monthly , currently not in use 
	 */

	Public function MonthlyHrsCrone()
	{	
		$month_first_day = date('Y-m-01');
		$currentDay = date('Y-m-d');
		// $this->print_pr($currentDay);
		if($month_first_day != $currentDay){
			return false;
			exit();
		}
		$this->load->model('Sample_model');
		$lastsun        = strtotime('last Monday');
		//echo date('F jS Y h:i:s A',$lastsun);
		$today_time     = strtotime('-1 days');
		$repeating_rows = $this->Sample_model->get_repeating_months($lastsun,$today_time);
		// echo "<pre>";
		// print_r($repeating_rows);
		// echo "</pre>";

		if(count($repeating_rows) > 0)
		{

			// print_r($repeating_rows);

			$get_calcs         = $this->Sample_model->get_calcs();
			$fixed_pending_hrs = $get_calcs[0]['pending_calc'] ;
			$time_conv         = explode(':', $fixed_pending_hrs);
			$fix_pend_minutes  = $this->getMonthDays();

			foreach($repeating_rows as $res)
			{
				if($res['user_id'] == 430){
					$this->print_pr($res);
					$rep_data['user_id'] = $res['user_id'];
					//$sdata['hrs_worked'] = $this->Sample_model->selectsumwork($res['user_id'])->sumof;
					$rep_data['hrs_worked'] = 0;
					$rep_data['pending_hrs'] = ($res['pending_hrs'] + $fix_pend_minutes);
					$rep_data['date'] = strtotime('now');
					//$finish = $this->Sample_model->create_new_row($rep_data);     
					echo($finish);
				}
				
			}
		}
	
	}


	/**
	 * testing purpose
	 */

	Public function testcode()
	{
		$this->load->model('Sample_model');
		$data = $this->Sample_model->selectalllog();
		foreach($data as $row)
		{
		
			//	if($row['user_id']==405)	{
					
			echo "<pre>";
			echo $row['user_id'].">>>";
			$hrs_wrkd = $this->Sample_model->create_function_hr($row['user_id'])->sumof;
			echo round($hrs_wrkd / 60);
			$pending_hrs =(148500+148500+148500+148500) - ($hrs_wrkd);
			//$pending_hrs =(148500+148500+148500) - ($hrs_wrkd);
			echo "</pre>";
			echo "test".$this->GetRealTime($pending_hrs);
			$sdata['user_id'] = $row['user_id']; 
			$sdata['hrs_worked'] = $this->Sample_model->selectsumwork($row['user_id'])->sumof;
			//$sdata['hrs_worked'] =0;
			$sdata['pending_hrs'] = round($pending_hrs);
			//$sdata['date'] = 1524548313;
			$sdata['date'] = strtotime('now');
			//echo(">>>>".$this->Sample_model->create_function_hr_new($sdata)); 
			
			//	}
		
		
		}
	}
	
/**
 * resets leave
 */
	Public function Leave(){
		
		$this->load->model('Admin_model');
		$this->load->model('Sample_model');
		$data	=	$this->Admin_model->get_all_users();
		
		foreach($data as $row){
			echo  "<br />".$row['fullname']."====";
			$totallvSec=$this->Sample_model->leaveUpdate($row['user_id'])*28800;			
			if($totallvSec>0){
				$GetPending=$this->Sample_model->GetPending($row['user_id']);
				$ttlpdng=$GetPending->pending_hrs-$totallvSec;
				echo $this->GetRealTime($totallvSec)."====".$this->GetRealTime($ttlpdng)." status=";
				//if($row['user_id']==405){
				//echo $this->Sample_model->UpdatePendingHrs($ttlpdng,$GetPending->wrk_id);
			//	}		
			}
		
		}
	}
	
	
	Public function test_leave_User(){
		$this->load->model('Test_contr_model');
	    $tomorrow   	= 	strtotime('31-05-2018');
	    // $cur_date   	= 	date('d-m-Y 23:59:59');
		$today    		=	strtotime('tomorrow'); //today 12 am
		$res        	= 	$this->Test_contr_model->check_request_test($today);
		echo('<pre>');
		print_r($res);
		echo('</pre>');
		$tot           = 0 ;
		foreach($res as $row){
			echo($row['user_id']);
			$tot       = $tot + $row['lv_no'];
		}
		$tot_hrs       = $tot * 29700;
		echo($tot_hrs);
		foreach($res as $row){ 
			$data				=	$this->Test_contr_model->get_rem_hours($row['user_id']);
			$total_sec_lv	    =	$tot_hrs*28800;			
			if($data->wrk_id){				
				$pending_hrs['pending_hrs']	=	$data->pending_hrs - $total_sec_lv;
				$wrk_id			=	$data->wrk_id;
				echo "<br />".$row['user_id']."===".$row['total_lv']."==".$pending_hrs['pending_hrs'];
				//$Update_status	=	$this->Test_contr_model->Update_pending_hrs($wrk_id,$pending_hrs);
			}
		// test mail
	       /*$config = array(
				'protocol'    => 'smtp',// 'mail', 'sendmail', or 'smtp'
				'smtp_host'   => 'zimbra.hashroot.com',
				'smtp_port'   => 465,
				'smtp_user'   => 'site@hashroot.com',
				'smtp_pass'   => 'Jn^8wC4g',
				'smtp_crypto' => 'ssl',//can be 'ssl' or 'tls' for example
				'mailtype'    => 'html',//plaintext 'text' mails or 'html'
				'smtp_timeout'=> '4',//in seconds
				'charset'     => 'iso-8859-1',
				'wordwrap'    => TRUE
			); 
			$this->load->library('email',$config); 
			$this->email->from("site@hashroot.com",'Hashroot PE Portal');			
		
			// $this->email->cc('');
			$this->email->subject("TEST Hashroot PE Portal - Leave testing -");	
			$this->email->message('<br/> USER ID '.$row['user_id'].' <br />');
			$this->email->send();*/
		}
	}

	/**
	 * convert seconds to time format
	 */
	
	function GetRealTime($sec){
		$minte=round($sec/60);
		$min=($minte%60);
		$hrs=(($minte-$min)/60);
		$realtime=" ".($hrs)." hrs ".abs($min)." min";
		return $realtime;
	}

	/**
	 * If you run this function, it will delete screenshots except previous 3 month's.That is,if you run it in June, screenshots upto 31st Feb will be deleted.
	 */
	
	Public function delete_screenshots(){
		$this->load->model('Admin_model');
		echo " Deleting screenshots upto". date('t-m-Y',strtotime("-4 month"))."<br/><br/>";
		$date1      = date('t-m-Y',strtotime("-4 month"));
		$date2      = $date1." 23:59:59";
		$date3      = strtotime($date2);
		$data	    = $this->Admin_model->get_all_users();
		$flag       = 0;
		foreach($data as $row){
			$user_id         = $row['user_id'];
			$delete_det      = $this->Admin_model->delete_screenshots_2months($row['user_id'],$date3);
			
		}
		
	}
	
	Public function getScreenShots(){
		$this->load->model('Admin_model');
		$user_id            = 357;
		$full_screenshots   = $this->Admin_model->get_all_screenshots($user_id);
		echo "Existing screen shots <br/><br/>";
		foreach($full_screenshots as $img_det){
			echo("Date : ".date('d-m-Y',$img_det['di_date'])." | User name :".$img_det['user_id']."<br/>");
		}
	}

	public function getMonthDays(){
		
		$startDate = date('Y-m-01'); // return first day of current month
		$endDate = date('Y-m-'.date('t',strtotime($startDate)));; // return last day of current month
				
		$workingDays = $this->number_of_working_days($startDate, $endDate);
		$working_seconds = $workingDays*29340;
		// $this->print_pr($working_seconds);
		return $working_seconds;

	}

	public function print_pr($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}

	/**
	 * return number of working days from given start and end days.
	 * @param  [type] $startDate [description]
	 * @param  [type] $endDate   [description]
	 * @return [type]            [description]
	 */
	private function number_of_working_days($startDate, $endDate){
	    $workingDays = 0;
	    $startTimestamp = strtotime($startDate);
	    $endTimestamp = strtotime($endDate);
	    for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24)) {
	        if (date("N", $i) <= 5) $workingDays = $workingDays + 1;
	    }
	    return $workingDays;
	}


	/**
	 * Used to send a reminder to the admin about the pending promotion of l1 server engineers
	 * @return [type] [description]
	 */
	public function l1Promotion_reminder(){
		$this->load->model('User_model');
		$date = date("Y-d-m", strtotime('now'));
		$start_date = date('Y-m-d 00:00:00', strtotime("-6 month"));
		$end_date = date('Y-m-d 23:59:00', strtotime("-6 month"));


		// print_r(['start_date' => $start_date, 'end_date' => $end_date]);
		// exit();
		
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);

		$l1_eng = $this->User_model->getAllL1($start_date, $end_date);
		// $this->dd($l1_eng);
		if($l1_eng){

			
			$message_content = '<h3 style="text-align: center">New Promotion list</h3>';
			$count = 1;
			$team_name = '';
			foreach ($l1_eng as $key => $value) {
				
				if($team_name != $value->team_name){
					$team_name = $value->team_name;
					$count = 1;
					$message_content .= '</table>';

					$message_content .= '<h4 style="text-align: center;">'.$team_name.'</h4>';
					$message_content .= '<table border="1" style="text-align:center; float: none; margin: auto; width: 100%;">';
					$message_content .= '<thead>';
					$message_content .= '<tr>';
					$message_content .= '<td>No.</td>';
					$message_content .= '<td>Name</td>';
					$message_content .= '<td>Designation</td>';
					$message_content .= '</tr>';
					$message_content .= '</thead>';
					$message_content .= '<tbody>';
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';


				}else{
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';
				}

			
				$this->User_model->update_promotion_status($value->user_id, $value->fullname);
				$count++;
			}

			$date = date('d-m-Y');
			
			$message_content .= '</table>';

			$subject	   = "Promotion list - ".$date;			
			$config        = array(
			 'protocol'    => 'smtp', // 'mail', 'sendmail', or 'smtp'
			 'smtp_host'   => 'zimbra.hashroot.com',
			 'smtp_port'   => 465,
			 'smtp_user'   => 'site@hashroot.com',
			 'smtp_pass'   => 'Jn^8wC4g',
			 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
			 'mailtype'    => 'html', //plaintext 'text' mails or 'html'
			 'smtp_timeout'=> '4', //in seconds
			 'charset'     => 'iso-8859-1',
			 'wordwrap'    => TRUE
			); 

			$this->load->library('email',$config); 
			$this->email->from('site@hashroot.com','HashRoot PE Portal');
			$this->email->to('midhun.ps@hashroot.com');
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 300px;"><br>
				'.$message_content.'
			 </div>');
			$this->email->send();

		}else{
			echo 'No Promotion List available';
		}
	}

	/**
	 * used to send an email to admin about zero break time used employees list
	 * @return [type] [description]
	 */
	public function sendBreakTime(){
		$this->load->model('User_model');

		$date = date("Y-d-m", strtotime('now'));
		$start_date = date('Y-m-d 00:00:00');
		$end_date = date('Y-m-d 23:59:00');
		
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);

		$users = $this->User_model->retrieve_un_breaked_users($start_date, $end_date);
		$date = date('d-m-Y');
		if($users){
			
			$message_content = '';
			$count = 1;
			$team_name = '';
			foreach ($users as $key => $value) {
				
				if($team_name != $value->team_name){
					$team_name = $value->team_name;
					$count = 1;
					$message_content .= '</table>';

					$message_content .= '<h4 style="text-align: center">'.$team_name.'</h4>';
					$message_content .= '<table border="1" style="text-align:center; float: none; margin: auto;  width: 100%;">';
					$message_content .= '<thead>';
					$message_content .= '<tr>';
					$message_content .= '<td>No.</td>';
					$message_content .= '<td>Name</td>';
					$message_content .= '<td>Designation</td>';
					$message_content .= '</tr>';
					$message_content .= '</thead>';
					$message_content .= '<tbody>';
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';


				}else{
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';
				}

				$count++;
			}

			
			

			$subject	   = "Zero Break Time List - ".$date;			
			$config        = array(
			 'protocol'    => 'smtp', // 'mail', 'sendmail', or 'smtp'
			 'smtp_host'   => 'zimbra.hashroot.com',
			 'smtp_port'   => 465,
			 'smtp_user'   => 'site@hashroot.com',
			 'smtp_pass'   => 'Jn^8wC4g',
			 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
			 'mailtype'    => 'html', //plaintext 'text' mails or 'html'
			 'smtp_timeout'=> '4', //in seconds
			 'charset'     => 'iso-8859-1',
			 'wordwrap'    => TRUE
			); 

			$this->load->library('email',$config); 
			$this->email->from('site@hashroot.com','HashRoot PE Portal');
			$this->email->to('midhun.ps@hashroot.com');
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 300px;"><br>
				'.$message_content.'
			 </div>');
			$this->email->send();

		}else{
			echo 'No employees were available';
		}

	}

	public function reset_warning(){
		$this->load->model('Sample_model');
		$date = date("Y-m-d",strtotime("-1 year"));
		$result = $this->Sample_model->reset_warning($date);
		print_r($result);
	}

	public function test_mail(){

		$message_content = '<h3>Test Mail</h3>';
		$subject	   = "Zero Break Time List - ";			
		$config        = array(
		 'protocol'    => 'smtp', // 'mail', 'sendmail', or 'smtp'
		 'smtp_host'   => 'zimbra.hashroot.com',
		 'smtp_port'   => 465,
		 'smtp_user'   => 'site@hashroot.com',
		 'smtp_pass'   => 'Jn^8wC4g',
		 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
		 'mailtype'    => 'html', //plaintext 'text' mails or 'html'
		 'smtp_timeout'=> '4', //in seconds
		 'charset'     => 'iso-8859-1',
		 'wordwrap'    => TRUE
		); 

		$this->load->library('email',$config); 
		$this->email->from('site@hashroot.com','HashRoot PE Portal');
		$this->email->to('midhun.ps@hashroot.com');
		$this->email->subject($subject);			
		$this->email->message('<div style="font-family:calibri; max-width: 300px;"><br>
			'.$message_content.'
		 </div>');
		$this->email->send();
	}


	
/** Interview Scheduler */

	public function exam_register(){
		$userdata = $this->session->userdata();
		$creator_id = $userdata['id'];
		
		$this->load->model('Admin_model');
		if($this->input->post('interview_date') != ''){
			
			$insert_a['exam_date']       = $this->input->post('interview_date');
			$insert_a['exam_date_str']   = strtotime($this->input->post('interview_date'));
		}
		else{
			$insert_a['exam_date'] = NULL;
			$insert_a['exam_date_str'] = NULL;
		}
		
		$examiners_list_ids          = $this->input->post('examiner');
		$insert_a['candidate_name']  = $this->input->post('candidate_name');
		$insert_a['candidate_email'] = $this->input->post('candidate_email');
		$insert_a['candidate_phone'] = $this->input->post('candidate_phone');
		$insert_a['notice_period']   = $this->input->post('notice_period');
		$insert_a['expected_salary'] = $this->input->post('expected_salary');
		$insert_a['current_salary']  = $this->input->post('current_salary');
		$insert_a['comments']        = $this->input->post('comments');
		$insert_a['status']          = $this->input->post('interview_status');
		$insert_a['mode']            = $this->input->post('interview_mode');
		$insert_a['position']        = $this->input->post('candidate_position');
		$insert_a['time']        	 = time();
		$priority                    = $this->input->post('priority');

		if($priority){
			$insert_a['priority']    = 1;
		}
		else{
			$insert_a['priority']    = 0;
		}

		$insert_a['creator']         = $creator_id;

		// print_r($insert_a['creator']);
			

		if($insert_a['candidate_name'] == ''){
			echo json_encode(['status' => false, 'message' => 'Please enter candidate name.']);
			exit();
		}

		if($insert_a['candidate_email'] != '' && !preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$insert_a['candidate_email'])){ 
			echo json_encode(['status' => false, 'message' => 'Please enter a valid email']);
			exit();
		}

		if($insert_a['candidate_email'] != ''){
			$mail_status = $this->Admin_model->checkMailUnique($insert_a['candidate_email']);
			if(count($mail_status) > 0){
				echo json_encode(['status' => false, 'message' => 'Email Already Exists! Please try with another!']);
				exit();
			}
		}

		if($insert_a['position'] == ''){
			echo json_encode(['status' => false, 'message' => 'Please enter position.']);
			exit();
		}

		if($this->input->post('joining_date') != ''){
			$insert_a['joining_date']      = $this->input->post('joining_date');
			$insert_a['joining_date_str']  = strtotime($this->input->post('interview_date'));
		}
		else{
			$insert_a['joining_date']      = NULL;
			$insert_a['joining_date_str']  = NULL;
		}

		/** get creator email */
		if($creator_id){
			$get_creator   = $this->Admin_model->get_creator_interview($creator_id);
			$creator_email = $get_creator->email;
		}
		else{
			echo json_encode(['status' => false, 'message' => 'Please login again!']);
			exit();
		}
		
		
		$empl_details = array();
		$examiners_details = array();
		if(count($examiners_list_ids)>0){
			foreach ($examiners_list_ids as $examiners_id){
				array_push($empl_details,$this->Admin_model->get_examiners_details($examiners_id));
				$examiner_dets = $this->Admin_model->get_examiners_details($examiners_id);
				$examiner_details = array("user_id"=>$examiner_dets->user_id, "email"=>$examiner_dets->email, "dep_id"=>$examiner_dets->dep_id);  
				// $examiners_details[$examiner_dets->user_id] = $examiner_details;
				array_push($examiners_details,$examiner_details);
			}
			$insert_a['examiners_details']   = serialize($examiners_details);
			
		}
		else{
			$insert_a['examiners_details']   = NULL;
		}

		
		$interviewers_emails_array = array();
		$interviewers_name_array   = array();

		foreach ($empl_details as $emp_det){
			array_push($interviewers_emails_array,$emp_det->email);
			array_push($interviewers_name_array,$emp_det->fullname);
		}

		$interviewer_names = implode(',', $interviewers_name_array);
		$insert_a['examiners']         = $interviewer_names;

		$interviewer_emails = implode(',', $interviewers_emails_array);
		
		
		/** Resume upload */
		if(isset($_FILES['resume'])){  
			$config['upload_path']          = '../pe/assets/resumes'; 
			$config['allowed_types']        = '*';
			$config['max_size']             = 5024;
			$config['file_name']            = $insert_a['candidate_name'].'_cv_'.strtotime('now');

			
			$this->load->library('upload', $config);
			if($this->upload->do_upload('resume')){ 
				$data = $this->upload->data();
				$insert_a['resume'] = $data['file_name'];
			}
		}  
		/** close resume upload */
		
		$message_content  = '<table>';
		$message_content .= '<tr><td><h4>Scheduled Interviews</h4></td></tr>';
		$message_content .= '<tr><td>Interview Date : '.$insert_a["exam_date"].'</td></tr>';
		$message_content .= '<tr><td>Designation : '.$insert_a["position"].'</td></tr>';
		$message_content .= '<tr><td>Candidate Name : '.$insert_a["candidate_name"].'</td></tr>';
		$message_content .= '<tr><td>Candidate Email : '.$insert_a["candidate_email"].'</td></tr>';
		$message_content .= '<tr><td>Candidate Phone : '.$insert_a["candidate_phone"].'</td></tr>';
		$message_content .= '<tr><td>Mode of Interview : '.$insert_a["mode"].'</td></tr>';
		if($insert_a['resume'] != null){
			$message_content .= '<tr><td><a href="'.base_url()."assets/resumes/".$insert_a['resume'].'"> Download CV</a></span></td></tr>';
		}
		
		
		$message_content .= '</table>';

		
		$subject	   = "Interview Scheduled";
		$config        = array(
		 'protocol'    => 'smtp', // 'mail', 'sendmail', or 'smtp'
		 'smtp_host'   => 'zimbra.hashroot.com',
		 'smtp_port'   => 465,
		 'smtp_user'   => 'site@hashroot.com',
		 'smtp_pass'   => 'Jn^8wC4g',
		 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
		 'mailtype'    => 'html', //plaintext 'text' mails or 'html'
		 'smtp_timeout'=> '4', //in seconds
		 'charset'     => 'iso-8859-1',
		 'wordwrap'    => TRUE
		); 

		$this->load->library('email',$config); 
		$this->email->from('site@hashroot.com','HashRoot PE Portal');

		switch($insert_a['status']) {
			case "open":
				// $this->email->to('bibin.varghese@hashroot.com');
				$this->email->to('hr@hashroot.com,julia.jolly@hashroot.com');

				break;
			case "1st interview scheduled":
				if($creator_id == 1){ 
					$creator_email = 'anees@hashroot.com';
					$this->email->to($creator_email.','.$interviewer_emails);
				}
				else if($creator_id == 3 || $creator_id == 9 ){
					$this->email->to($interviewer_emails.',hr@hashroot.com,julia.jolly@hashroot.com');
				}
				else{
					$this->email->to($creator_email);
					// $this->email->to($creator_email.',hr@hashroot.com');
				}
				break;
			case "2nd interview scheduled":
				if($creator_id == 1){
					$creator_email = 'anees@hashroot.com';
					$this->email->to($creator_email.','.$interviewer_emails);
				}
				else if($creator_id == 3 || $creator_id == 9){
					$this->email->to($interviewer_emails.',hr@hashroot.com,julia.jolly@hashroot.com');
				}
				else{
					// $this->email->to($creator_email);
					$this->email->to($creator_email.',hr@hashroot.com');
				}
				break;
			case "for review":
				$subject = "For Review ".$insert_a["candidate_name"];
				$message_content = "The candidate, ".$insert_a["candidate_name"]." interviewed on ".$insert_a["exam_date"]. " for the position ".$insert_a["position"]." ,is selected for your review. Please add your review after closely examining the interviewers' comments and salary expectation and change the status accordingly";
				if($creator_id == 1){
					$creator_email = 'anees@hashroot.com';
					$this->email->to($creator_email.','.$interviewer_emails);

				}
				else if($creator_id == 3 || $creator_id == 9){
					$this->email->to($interviewer_emails.',hr@hashroot.com,julia.jolly@hashroot.com');
				}
				else{
					// $this->email->to($creator_email);
					$this->email->to($creator_email.',hr@hashroot.com');
				}
				break;
		}

 
		// $this->email->cc('shortlist@hashroot.com');
		$this->email->subject($subject);			
		$this->email->message('<div style="font-family:calibri; max-width: 600px;"><br>
			'.$message_content.'
		 </div>');
		$this->email->send();
		$result = $this->Admin_model->save_interview($insert_a);
		echo json_encode($result);

	}

	/** Edit and update Interview Scheduler */

	public function update_interview(){
		$this->load->model('Admin_model');
		if($this->input->post('interview_date') != ''){
			$update_a['exam_date']       = $this->input->post('interview_date');
			$update_a['exam_date_str']   = strtotime($this->input->post('interview_date'));
		}
		else{
			$update_a['exam_date'] = NULL;
			$update_a['exam_date_str'] = NULL;
		}

		$userdata = $this->session->userdata();
		// print_r($userdata);
		$creator_id = $userdata['id'];

		$candidate_id                =  $this->input->post('candidate_id');
		
		$examiners_list_ids          = $this->input->post('examiner');
		$update_a['candidate_name']  = $this->input->post('candidate_name');
		$update_a['candidate_email'] = $this->input->post('candidate_email');
		$update_a['candidate_phone'] = $this->input->post('candidate_phone');
		$update_a['notice_period']   = $this->input->post('notice_period');
		$update_a['expected_salary'] = $this->input->post('expected_salary');
		$update_a['current_salary']  = $this->input->post('current_salary');
		//$update_a['comments']        = $this->input->post('comments');
		$update_a['status']          = $this->input->post('interview_status');
		$update_a['mode']            = $this->input->post('interview_mode');
		$update_a['position']        = $this->input->post('candidate_position');
		$update_a['creator']         = $this->input->post('creator');
		$priority                     = $this->input->post('priority');
		$update_a['time']         = time();

		if($priority){
			$update_a['priority']    = 1;
		}
		else{
			$update_a['priority']    = 0;
		}

		if($update_a['candidate_name'] == ''){
			echo json_encode(['status' => false, 'message' => 'Please enter candidate name.']);
			exit();
		}

		if($update_a['candidate_email'] != '' && !preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$update_a['candidate_email'])){ 
			echo json_encode(['status' => false, 'message' => 'Please enter a valid email']);
			exit();
		}

		if($update_a['position'] == ''){
			echo json_encode(['status' => false, 'message' => 'Please enter position.']);
			exit();
		}

		if($this->input->post('joining_date') != ''){
			$update_a['joining_date']      = $this->input->post('joining_date');
			$update_a['joining_date_str']  = strtotime($this->input->post('interview_date'));
		}
		else{
			$update_a['joining_date']      = NULL;
			$update_a['joining_date_str']  = NULL;
		}

	
		$empl_details = array();
		$examiners_details = array();
		if(count($examiners_list_ids)>0){
			foreach ($examiners_list_ids as $examiners_id){
				array_push($empl_details,$this->Admin_model->get_examiners_details($examiners_id));
				$examiner_dets = $this->Admin_model->get_examiners_details($examiners_id);
			$examiner_details = array("user_id"=>$examiner_dets->user_id, "email"=>$examiner_dets->email, "dep_id"=>$examiner_dets->dep_id);  
				// $examiners_details[$examiner_dets->user_id] = $examiner_details;
				array_push($examiners_details,$examiner_details);
			}
			$update_a['examiners_details']   = serialize($examiners_details);
			
		}
		else{
			$update_a['examiners_details']   = NULL;
		}

		/** get creator email */
		$get_creator   = $this->Admin_model->get_creator_interview($creator_id);
		$creator_email = $get_creator->email;
		
		

		$interviewers_emails_array = array();
		$interviewers_name_array   = array();

		foreach ($empl_details as $emp_det){
			array_push($interviewers_emails_array,$emp_det->email);
			array_push($interviewers_name_array,$emp_det->fullname);
		}

		$interviewer_names = implode(',', $interviewers_name_array);
		$update_a['examiners']         = $interviewer_names;

		$interviewer_emails = implode(',', $interviewers_emails_array);
		
		/** Resume upload */
		if(isset($_FILES['resume'])){  
			$config['upload_path']          = '../pe/assets/resumes'; 
			$config['allowed_types']        = '*';
			$config['max_size']             = 5024;
			$config['file_name']            = $update_a['candidate_name'].'_cv_'.strtotime('now');
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload('resume')){ 
				$data = $this->upload->data();
				$update_a['resume'] = $data['file_name'];
			}
		}  
		/** close resume upload */
		
		$message_content  = '<table>';
		$message_content .= '<tr><td><h4>Updated Interview Schedule</h4></td></tr>';
		$message_content .= '<tr><td>Interview Date : '.$update_a["exam_date"].'</td></tr>';
		$message_content .= '<tr><td>Designation : '.$update_a["position"].'</td></tr>';
		$message_content .= '<tr><td>Candidate Name : '.$update_a["candidate_name"].'</td></tr>';
		$message_content .= '<tr><td>Candidate Email : '.$update_a["candidate_email"].'</td></tr>';
		$message_content .= '<tr><td>Candidate Phone : '.$update_a["candidate_phone"].'</td></tr>';
		$message_content .= '<tr><td>Mode of Interview : '.$update_a["mode"].'</td></tr>';
		if($update_a['resume'] != null){
			$message_content .= '<tr><td><a href="'.base_url()."assets/resumes/".$update_a['resume'].'"> Download CV</a></span></td></tr>';
		}
		
		$message_content .= '</table>'; 
		
		
		$subject	   = "Updated Interview Schedule";
		$config        = array(
		 'protocol'    => 'smtp', // 'mail', 'sendmail', or 'smtp'
		 'smtp_host'   => 'zimbra.hashroot.com',
		 'smtp_port'   => 465,
		 'smtp_user'   => 'site@hashroot.com',
		 'smtp_pass'   => 'Jn^8wC4g',
		 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
		 'mailtype'    => 'html', //plaintext 'text' mails or 'html'
		 'smtp_timeout'=> '4', //in seconds
		 'charset'     => 'iso-8859-1',
		 'wordwrap'    => TRUE
		); 

		$this->load->library('email',$config); 
		$this->email->from('site@hashroot.com','HashRoot PE Portal');

		switch($update_a['status']) {
			case "open":
				// $this->email->to('bibin.varghese@hashroot.com');
				$this->email->to('hr@hashroot.com,julia.jolly@hashroot.com');

				break;
			case "1st interview scheduled":
				if($creator_id == 1){
					$creator_email = 'anees@hashroot.com';
					$this->email->to($creator_email.','.$interviewer_emails);
				}
				else if($creator_id == 3 || $creator_id == 9 ){ 
					$this->email->to($interviewer_emails.',hr@hashroot.com,julia.jolly@hashroot.com');
				}
				else{
					$this->email->to($creator_email); 
					// $this->email->to($creator_email.',hr@hashroot.com');
				}
				break;

			case "2nd interview scheduled":
				if($creator_id == 1){
					$creator_email = 'anees@hashroot.com';
					$this->email->to($creator_email.','.$interviewer_emails);
				}
				else if($creator_id == 3 || $creator_id == 9){
					$this->email->to($interviewer_emails.',hr@hashroot.com,julia.jolly@hashroot.com');
				}
				else{
					// $this->email->to($creator_email);
					$this->email->to($creator_email.',hr@hashroot.com');
				}
				break;

			case "for review":
				$subject = "For Review - ".$update_a["candidate_name"];
				$message_content = "The candidate, ".$update_a["candidate_name"]." interviewed on ".$update_a["exam_date"]. ", for the position '".$update_a["position"]."' is selected for your review. Please add your review after closely examining the interviewer's comments and salary expectation and change the status accordingly";
				if($creator_id == 1){
					$creator_email = 'anees@hashroot.com';
					$this->email->to($creator_email.','.$interviewer_emails);

				}
				else if($creator_id == 3 || $creator_id == 9){
					$this->email->to($interviewer_emails.',hr@hashroot.com,julia.jolly@hashroot.com');
				}
				else{
					// $this->email->to($creator_email);
					$this->email->to($creator_email.',hr@hashroot.com');
				}
				break;
			}

		// $this->email->cc('shortlist@hashroot.com');
		$this->email->subject($subject);			
		$this->email->message('<div style="font-family:calibri; max-width: 600px;"><br>
			'.$message_content.'
		 </div>');
		$this->email->send();
		$result = $this->Admin_model->update_interview($candidate_id,$update_a);
		echo json_encode($result);

	}
/**
 * comment
 */
	public function add_new_comment(){
		$candidate_id		=	$this->input->post('candidate_id');
		$comment			=	$this->input->post('comment');
		$this->load->model('Admin_model');
		$userdata = $this->session->userdata();
		$newComment = array('comment' => $comment,
											'time'=>date("d F Y  h:i A"),
											"name"=>$userdata['adminname']);

		$comments 		   =	$this->Admin_model->get_comments($candidate_id);
		if($comments->comment_array){
			$comments	   =	unserialize($comments->comment_array);
			
		}else{
			$comments=[];	
		}
		array_push($comments,$newComment);
		$update_data['comment_array']=serialize($comments);
		$update_data['time'] = time();
		$result = $this->Admin_model->update_interview($candidate_id,$update_data);
		$result->data	=	$newComment;
		echo json_encode($result);
	}




}