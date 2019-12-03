<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Samplecron extends CI_Controller
{

/**
 * Force punchout 
 */
	Public function PunchoutCheckCron(){
		
		ini_set('display_errors', 1);

		//send mail: interview Reminder
		$this->interview_reminder();
		/**
		 * Sending mail: List of employees who didn't take break 
		 */
		$this->sendBreakTime();
		/**
		 * Sending mail: Promotion -  1 year 
		 */
		$this->l1Promotion_reminder();
		//interview Reminder

		// task reminder mail
		$this->taskReScheduler();
		// task re scheduler 

		$this->load->model('Sample_model');
		$Users = $this->Sample_model->SelectAllLoginedUsers();
		foreach($Users as $user){
			$totaltime	=strtotime('now')-$user['punchin'];
			$TotalHrs	=round($totaltime/3600);
			if($TotalHrs>=12){
				
				$work_reports		=	unserialize($user['work_report']);
				$lastActivityTime	=	0;
				foreach($work_reports as $report){
					if($lastActivityTime < $report['time']){
						$lastActivityTime 	= $report['time'];
					}	
				} 
//break adjustments 
				$totalbr=0;
				if(!isset($break) || trim($break) === ''){
					$break=unserialize($user['break']);
					if(count($break)>0){
						foreach($break as $br){
							if(!empty($br['off']) && !empty($br['on'])){
									$totalbr	=	($br['off']-$br['on'])+$totalbr;
								}
						}
					}
				}
				
				$lastActivityTimeDifference	 =	strtotime('now')-$lastActivityTime;
				$lastActivityRealTime		   =  round($lastActivityTimeDifference/3600);
				if($lastActivityTime<=0){
					//punchout 
					$update['punchout']			=	strtotime('now');
					$update['worked_time']	  =	 (8*3600)-$totalbr;
					$update['total_break']		=	$totalbr;
					$update['att_status']		 =	1;
					$this->Sample_model->ForcePuncout($update,$user['att_id']);	
				}elseif($lastActivityRealTime>3){
					$update['punchout']			=	$lastActivityTime;
					$update['worked_time']    =	 ($lastActivityTime-$user['punchin'])-$totalbr;
					$update['total_break']		=	$totalbr;
					$update['att_status']		 =	 1;
					$this->Sample_model->ForcePuncout($update,$user['att_id']);	
				}
				
//:::::::::::::::::::::::::::::::start: Weekly working hrs ::::::::::::::::::::::
				$this->load->model('User_model');
				$tot_wrkd_time 			= $update['worked_time'];
				$lastsun 				= strtotime('last Monday');
				$today   				= strtotime('now');
				$get_wrkd_hrs 			= $this->User_model->get_hrs_wrkd($user['user_id'],$lastsun,$today);
				$get_calcs 				= $this->User_model->get_calcs();
				$fixed_pending_hrs 		= $get_calcs[0]['pending_calc'] ;
				$time_conv 				= explode(':',$fixed_pending_hrs);
				$fix_pend_minutes 		= 148500;
				
			if(count($get_wrkd_hrs) > 0){
				$w_id					= $get_wrkd_hrs[0]['wrk_id'];
				$sum 					= $get_wrkd_hrs[0]['hrs_worked'] + ($tot_wrkd_time) ;
				$data1['hrs_worked']	= round($sum);    
				$data1['pending_hrs']	= round($get_wrkd_hrs[0]['pending_hrs'] - $tot_wrkd_time);
				$upd = $this->User_model->update_wrk_hrs($user['user_id'],$data1,$w_id);
		
			}else{
				$sum 					= $tot_wrkd_time;
				$data1['user_id'] 		= $user['user_id'];
				$data1['hrs_worked']    = round($sum) ;
				$data1['pending_hrs']   		= round($fix_pend_minutes - $sum);
				$data1['date'] 			= strtotime('now'); 
				$this->User_model->insert_wrk_hrs($data1);
			}
			//echo date('dMy H:m A',$update['punchout']);
//::::::::::::::::::::::::::::end: Weekly working hrs ::::::::::::
			$config = array(
				'protocol'    => 'smtp',// 'mail', 'sendmail', or 'smtp'
				'smtp_host'=> 'zimbra.hashroot.com',
				'smtp_port'   => 465,
				'smtp_user'   => 'site@hashroot.com',
				'smtp_pass'   => 'Jn^8wC4g',
				'smtp_crypto' => 'ssl',//can be 'ssl' or 'tls' for example
				'mailtype'=> 'html',//plaintext 'text' mails or 'html'
				'smtp_timeout'=> '4',//in seconds
				'charset'=> 'iso-8859-1',
				'wordwrap'    => TRUE
			); 
			$this->load->library('email',$config); 
			$this->email->from("site@hashroot.com",'Hashroot PE Portal');			
			$this->email->to($user['email']);
			$send_to_cc[0]="hr@hashroot.com";
			$send_to_cc[1]="aparna.r@hashroot.com";
			$this->email->cc($send_to_cc);
			$this->email->subject("Hashroot PE Portal - Force Punch Out -".$user['fullname']);	
			$this->email->message('<br/>You have been punched out of your PE Portal automatically, since you were idle for 12 hours! <br />');
			$this->email->send();	
		//		}		
			}
		}
	//////////////////////////////////////////////////////////////////////////////////////////
	$this->load->model('Test_contr_model');
	$cur_date   	= 	date('d-m-Y 23:59:59');
	$today    		=	strtotime('tomorrow'); //today 12 am
	//echo $time = date("m/d/Y H:i:s A",$today);
	$res        	= 	$this->Test_contr_model->check_request($today);
			if(count($res)<1){exit('------ No leaves to update  !'); }
		
		foreach($res as $row){ 
			$data				=	$this->Test_contr_model->get_rem_hours($row['user_id']);
			$total_sec_lv	    =	$row['lv_no']*29700;	
			if(count($data)<=0)	{
				echo "weekly work  hours empty";
				continue;
			}
			if($data->wrk_id){				
				$pending_hrs['pending_hrs']	=	$data->pending_hrs - $total_sec_lv;
				$wrk_id			=	$data->wrk_id;
				//echo "<br />".$row['user_id']."===".$row['lv_no']."==".$pending_hrs['pending_hrs'];
				$Update_status	=	$this->Test_contr_model->Update_pending_hrs($wrk_id,$pending_hrs);
				if($Update_status==1){
					$this->Test_contr_model->UpdateRequestStatus($row['user_id'],$today);
					$config = array(
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
					$this->email->to('renjith.kr@hashroot.com');
					$send_cc[0]="bibin.varghese@hashroot.com";
					$send_cc[1]="aparna.r@hashroot.com";
					$send_cc[2]="hr@hashroot.com";
					$this->email->cc($send_cc);
					$fullname=$this->Test_contr_model->getUserName($row['user_id'])->fullname;
					$this->email->subject(" Hashroot PE Portal - Leave Request  Reference-".$fullname);	
					$this->email->message("::::::::::::::::::::<br />
														Name === ".$fullname." <br />
														User Id=== ".$row['user_id']." <br />
														Leave Id=== ".$row['lv_id']." <br />
														Leave Date=== ".date('d F Y',$row['lv_date'])." <br />
														Total No of leave === ".$row['lv_no']."<br />
														Previous Pending ==== ".$this->GetRealTime($data->pending_hrs)."<br />
														New pending == ".$this->GetRealTime($pending_hrs['pending_hrs'])."<br />
														
														:::::::::::::::::::::::::"
													);
					$this->email->send();
				} 
			}
//test mail

		}
	

		
	}
 
	function GetRealTime($sec)
	{
		$minte    = round($sec / 60);
		$min      = ($minte % 60);
		$hrs      = (($minte - $min) / 60);
		$realtime = "".($hrs).":".abs($min)."";
		return $realtime;
	}
	public function usertest($day)
	{
		$date=explode('-',$day);
		$this->load->model('Sample_model');

		$day1   = date($date[1].'/'.$date[0].'/'.$date[2].' 00:00:00');
		$day2   = date($date[1].'/'.$date[0].'/'.$date[2].' 23:59:59');
		$month1 = strtotime($day1);
		$month2 = strtotime($day2);
		//echo date('d / m / y',$month1);
		$data   = $this->Sample_model->selectattlog($month1,$month2);
		//echo $data;
		foreach($data as $key => $value)
		{
			$data[$key]['punchin'] = date('h:i A',$data[$key]['punchin']);
			$data[$key]['punchout'] = date('h:i A',$data[$key]['punchout']);
			$data[$key]['worked_time'] = $this->GetRealTime($data[$key]['worked_time']);
			$data[$key]['total_break'] = $this->GetRealTime($data[$key]['total_break']);
		}
		echo(json_encode($data));
	}

	Public function getallusersinfo(){
			$this->load->model('Admin_model');
			$sort  =  'asc';
			$field = 'user_id';			
			$data = $this->Admin_model->getEmployees($sort,$field);	
			echo json_encode( $data, JSON_PRETTY_PRINT );
	}
	Public function testtable(){

			$this->load->view('test/table');
	}

	Public function getAllRequests(){
			$this->load->model('Sample_model');					
			$data = $this->Sample_model->getAllRequestss();
				echo '<table><tr><th style=""><b>Name</b></th><th style=""><b>From</b></th><th>To</th><th>No of </th></tr>';
			foreach($data as $row){
				echo "<tr>";
				echo "
				<td style=''>".$row['fullname']." </td>
				<td style=''>".date('dM Y',$row['lv_date'])."</td>
				<td style='    padding: 0 15px 0 15px;'>".date('dM Y',$row['lv_date_to'])."</td>
				<td style=''>".$row['lv_no']."</td>";
				echo "</tr>";
			}
				echo "</table>";
	}

	/**
	 * Get work reports of employees
	 */
		Public function getWorkReport(){
			$this->load->model('Sample_model');					
			$data = $this->Sample_model->getWorkReports(437);
		
			$row1=unserialize($data[3]['activity_array']);
			$row2=unserialize($data[4]['activity_array']);
			$row3=unserialize($data[5]['activity_array']);
			$row4=unserialize($data[6]['activity_array']);
			
			echo "<style>
table {
   font-family: calibri;
    border-collapse: collapse;
   
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>";
			
			echo "<p><h3>BINU</h3></p>";
			
				echo '<table><tr style="color:red">
				<th style="">DATE</th>
				<th style="padding: 0 35px 0 15px;">HANDLED</th>
				<th style="padding: 0 35px 0 15px;">PENDING</th><th>RESOLVED</th>
				<th>GOLDEN </th></tr>';
			foreach($row1 as $key=>$value){
				echo "<tr>";
				echo "
				<td style=''>".$key." </td>
				<td style=''>".$value['input']."</td>
				<td >".$row2[$key]['input']."</td>
				<td >".$row4[$key]['input']."</td>
				<td style=''>".$row3[$key]['input']."</td>";
				echo "</tr>";
				if($key==16)break;
				
			}
				echo "</table>";
				
			$data = $this->Sample_model->getWorkReports(444);		
			
			$row1=unserialize($data[3]['activity_array']);
			$row2=unserialize($data[4]['activity_array']);
			$row3=unserialize($data[5]['activity_array']);
			$row4=unserialize($data[6]['activity_array']);
				echo "<p><h3>ANOOP</h3></p>";
			
				echo '<table><tr style="color:red">
				<th style="">DATE</th>
				<th style="padding: 0 35px 0 15px;">HANDLED</th>
				<th style="padding: 0 35px 0 15px;">PENDING</th><th>RESOLVED</th>
				<th>GOLDEN </th></tr>';
			foreach($row1 as $key=>$value){
				echo "<tr>";
				echo "
				<td style=''>".$key." </td>
				<td style=''>".$value['input']."</td>
				<td >".$row2[$key]['input']."</td>
				<td >".$row4[$key]['input']."</td>
				<td style=''>".$row3[$key]['input']."</td>";
				echo "</tr>";
				if($key==16)break;
				
			}
				echo "</table>";		
			$data = $this->Sample_model->getWorkReports(438);		
			$row1=unserialize($data[3]['activity_array']);
			$row2=unserialize($data[4]['activity_array']);
			$row3=unserialize($data[5]['activity_array']);
			$row4=unserialize($data[6]['activity_array']);
			
			
				echo "<p><h3>JISHNU</h3></p>";
			
				echo '<table><tr style="color:red">
				<th style="">DATE</th>
				<th style="padding: 0 35px 0 15px;">HANDLED</th>
				<th style="padding: 0 35px 0 15px;">PENDING</th><th>RESOLVED</th>
				<th>GOLDEN </th></tr>';
			foreach($row1 as $key=>$value){
				echo "<tr>";
				echo "
				<td style=''>".$key." </td>
				<td style=''>".$value['input']."</td>
				<td >".$row2[$key]['input']."</td>
				<td >".$row4[$key]['input']."</td>
				<td style=''>".$row3[$key]['input']."</td>";
				echo "</tr>";
				if($key==16)break;
				
			}
				echo "</table>";
	}

	/**
	 * Send reminder mail to interview schedulers and HR
	 */
	public function interview_reminder(){
		
		$this->load->model('Admin_model');
		$start = strtotime(date("Y-m-d 00:00:00"));
		$end  = strtotime(date("Y-m-d 23:59:59"));
		$current_date = strtotime('now');
		$current_date = date('d-m-Y', $current_date);

		$result = $this->Admin_model->get_today_interview($start,$end);

		
		if(!$result){
			return false;
		}

		foreach ($result as $key => $value) {
			$message_content	=	"";
			$message_content = '<h2 style="text-align: center;">Today`s Interviews</h2>';
			$message_content .= '<table border="1">';
			$message_content .= '<tr>';
			$message_content .= '<td>Sl</td>';
			$message_content .= '<td>Date</td>';
			$message_content .= '<td>Candidate Name</td>';
			$message_content .= '<td>Candidate Position</td>';
			$message_content .= '<td>Candidate Email</td>';
			$message_content .= '<td>Candidate Phone</td>';
			$message_content .= '<td>Current Status</td>';
			$message_content .= '<td>Interviewer</td>';
			$message_content .= '<td>Mode of Interview</td>';
			$message_content .= '</tr>';
			$count = 1;
			$to_a = [];

			$message_content .= '<tr>';
			$message_content .= '<td>'.$count.'</td>';
			$message_content .= '<td>'.$value->exam_date.'</td>';
			$message_content .= '<td>'.$value->candidate_name.'</td>';
			$message_content .= '<td>'.$value->position.'</td>';
			$message_content .= '<td>'.$value->candidate_email.'</td>';
			$message_content .= '<td>'.$value->candidate_phone.'</td>';
			$message_content .= '<td>'.$value->status.'</td>';
			
			
			$examiner_name	=	"";
			if($value->examiners_details){
				$unserCandidate		=	unserialize($value->examiners_details);
				foreach ($unserCandidate as $key => $candidate) {
					array_push($to_a,$candidate['email']);
					//array_push($to_a,"renjith.kr@hashroot.com");
					$examiner_name		.= $this->Admin_model->getFullName($candidate['user_id'])->fullname;
					$examiner_name		.= "<br />";
					
				}
			}else{
					array_push($to_a,"hr@hashroot.com");
					$examiner_name		.= "Not assigned";
			}

			$message_content .= '<td>'.$examiner_name.'</td>';
			$message_content .= '<td>'.$value->mode.'</td>';
			$message_content .= '</tr>';
			$count++;

			$message_content .= '<table>';
			// echo $message_content;
	
			$subject	   = "Interview Reminder";
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
			$this->email->to($to_a);
			//$this->email->cc('renjith.kr@hashroot.com');
			$this->email->cc('shortlist@hashroot.com');
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 1000px;"><br>
				'.$message_content.'
			 </div>');
			$this->email->send();
		}

	}


	/**
	 * used to send an email to admin about zero break time used employees list
	 * @return [type] [description]
	 */
	public function sendBreakTime(){
		if(11>date('H') || date('H')>13){
			return;
		}

		$yesterday		=	 date('d',strtotime("-1 days"));
		$this->load->model('User_model');

		$date = date("Y-d-m", strtotime('now'));
		$start_date = date('Y-m-'.$yesterday.' 00:00:00');
		$end_date = date('Y-m-'.$yesterday.' 23:59:59');
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);

		$users = $this->User_model->retrieve_un_breaked_users($start_date, $end_date);
		$date = date($yesterday.'-m-Y');
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
					$message_content .= '<table border="1" style="text-align:center; float: none; margin: auto;  width: 330px;">';
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
			$send_to[0]="hr@hashroot.com";
			$send_to[1]="aparna.r@hashroot.com";
			$send_to[2]="renjith.kr@hashroot.com";
			$this->email->to($send_to);
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 300px;"><br>
				'.$message_content.'
			 </div>');
			$this->email->send();
		}else{
			echo 'No employees were available';
		}

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

			$send_to[0]="anees@hashroot.com";
			$send_to[1]="sandeep@hashroot.com";
			$send_to[2]="sachin@hashroot.com";
			$send_to[3]="krishnaprasad@hashroot.com";
			$send_to[4]="renjith.kr@hashroot.com";
			$send_to[5]="requests@hashroot.com";

			$this->email->to($send_to);
			$this->email->cc("hr@hashroot.com");
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
	 * Task reminder msil 
	 */

	public function taskReScheduler(){

			$this->load->model('Admin_model');
			$taskList			       =	$this->Admin_model->getAllTasks();

			foreach ($taskList as $key => $value) {
				switch ($value->period) {
					case 'Weekly':
							
							if($value->date<date('w') || ($value->date==6 && date('w') ==0)){
								$status		=	$this->Admin_model->changeTaskStatus($value->asgnmnt_id);
							}
					break;
					case 'Daily':
							if(11<date('H') && date('H')<13){
								$status		=	$this->Admin_model->changeTaskStatus($value->asgnmnt_id);
							}
					break;
					case 'Monthly':
							$lastDayOfTheMonth =	date('d',strtotime('last day of this month'));
							$current_day			=	 date('d');
							if($lastDayOfTheMonth==$current_day){
								$status		=	$this->Admin_model->changeTaskStatus($value->asgnmnt_id);
							}
						break;
					case 'ONE':
							$taskData	=	$value;
							$assignee	=	$this->Admin_model->getFullName($taskData->assign_to)->fullname;
							if($value->date==date("Y-m-d",strtotime('tomorrow'))){
								$taskData->message 	=	" Hi ".$assignee."<p>This is a reminder from PE Portal regarding the deadline associated with the task assigned to you via PE. You have one day left to complete the task </p>";
								$this->notifyUpdater($taskData);
							}
							if($value->date==date("Y-m-d",strtotime('yesterday'))){
								$assigner	=	$this->Admin_model->getFullName($taskData->creator_id)->fullname;
								$taskData->message 	=	"Hi ".$assignee."<p>Please note that you haven't completed the task assigned to you, by  ".$assigner." within the deadline</p>";
								$this->notifyUpdater($taskData);
							}
						break;
					default:$flag="nothing done";
					break;
				}

			//	$this->notifyUpdater($value->asgnmnt_id);
				// if($status==false || !$flag){

				// }
			}
	}

	/**
	 * Send mail to admin if task is not completed
	 */
	public function notifyUpdater($taskData){
		if(11>date('H') || date('H')>13){
			return;
		}
		$this->load->model('Admin_model');
		if($taskData->creator_id==1){
			$taskData->assigner	=	'anees@hashroot.com';
		}elseif($taskData->creator_id==7){
			$taskData->assigner	=	'muneer@hashroot.com';
		}else{
			$taskData->assigner	=	$this->Admin_model->getEmpEmail($taskData->creator_id);
		}
			$taskData->assignee = $this->Admin_model->getEmpEmail($taskData->assign_to);

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
		$this->email->from('site@hashroot.com',' PE Portal Task Manager');
		$this->email->to($taskData->assignee);
		$this->email->subject("PE Tasker - Deadline Reminder");			
		$this->email->message($taskData->message."<br /> Task : ".$taskData->title);
		return $this->email->send();
	}


//for testing purpose only===================testpunchout
	public function testpunchout(){

			$this->load->model('Sample_model');
			$Users = $this->Sample_model->SelectAllLoginedUsers();
			foreach($Users as $user){
				$totaltime	=	strtotime('now')-$user['punchin'];
				$TotalHrs	=	round($totaltime/3600);
				if($TotalHrs>=12){
					$work_reports		=	unserialize($user['work_report']);
					$lastActivityTime	=	0;
					foreach($work_reports as $report){
						if($lastActivityTime < $report['time']){
							$lastActivityTime 	= $report['time'];
						}	
					} 
//break adjustments 
					$totalbr=0;
					if(!isset($break) || trim($break) === ''){
						$break=unserialize($user['break']);
						if(count($break)>0){
							foreach($break as $br){
								if(!empty($br['off']) && !empty($br['on'])){
										$totalbr	=	($br['off']-$br['on'])+$totalbr;
									}
							}
						}
					}
					
					$lastActivityTimeDifference	 =	strtotime('now')-$lastActivityTime;
					$lastActivityRealTime		   =  round($lastActivityTimeDifference/3600);
					if($lastActivityTime<=0){
						//punchout 
						$update['punchout']			=	strtotime('now');
						$update['worked_time']	  =	 (8*3600)-$totalbr;
						$update['total_break']		=	$totalbr;
						$update['att_status']		 =	1;
						//$this->Sample_model->ForcePuncout($update,$user['att_id']);	
					}elseif($lastActivityRealTime>12){
						$update['punchout']			=	$lastActivityTime;
						$update['worked_time']    =	 ($lastActivityTime-$user['punchin'])-$totalbr;
						$update['total_break']		=	$totalbr;
						$update['att_status']		 =	 1;
						//$this->Sample_model->ForcePuncout($update,$user['att_id']);	
					}
				}
			}
	}
	
}


