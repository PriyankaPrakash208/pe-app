<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Testcontroller extends CI_Controller{

	

	Public function test(){

//		$this->load->model('test_contr_model');

//		$res = $this->test_contr_model->test_model();

//		echo('<pre>');

//		print_r($res);

//		echo('</pre>');

		$this->load->model('Sample_model');

		$Users = $this->Sample_model->SelectAllLoginedUsers();

		$LastworkTimeOf = 0;

		foreach($Users as $user){

			$LastworkTime = $this->Sample_model->GetLastworkReportTime($user['user_id'],$user['att_id']);

//			echo('<pre>');

//			print_r($LastworkTime);

//			echo('</pre>');

			$LastworkTimeOf=$LastworkTime[0]['date'];

			if($LastworkTimeOf == 0){

				echo('Hiii<br/>');

			}

			else{

				print_r(date('d-m-Y',$LastworkTimeOf)."<br/>");

			}

		}

	}

	

	Public function countrylist(){

		$this->load->view('test/countrylist.php');

	}

	

	Public function check_req_date(){

		

		$this->load->model('Test_contr_model');

		$cur_date   	= 	date('d-m-Y 23:59:59');

		$today    		=	strtotime('tomorrow'); //today 12 am

		//echo $time = date("m/d/Y H:i:s A",$today);

		$res        		= 	$this->Test_contr_model->check_request($today);

			echo count($res);

		if(count($res)<1){exit(); }

		

		foreach($res as $row){ 

			$data				=	$this->Test_contr_model->get_rem_hours($row['user_id']);

			$total_sec_lv			=	$row['total_lv']*28800;		

			print_r($row['user_id']);

			if($data->wrk_id){	

			echo $total_sec_lv;			

				$pending_hrs['pending_hrs']		=	$data->pending_hrs - $total_sec_lv;

				$wrk_id			=	$data->wrk_id;

				echo "<br />".$row['user_id']."===".$row['total_lv']."==".$pending_hrs['pending_hrs'];

				echo $Update_status	=	$this->Test_contr_model->Update_pending_hrs($wrk_id,$pending_hrs);

			}

//test mail

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

			$this->email->to('renjith.kr@hashroot.com');

			//$this->email->cc('hr@hashroot.com');

			$this->email->subject("TEST Hashroot PE Portal - Leave testing -");	

			$this->email->message('<br/> USER ID '.$row['user_id'].' <br />');

			$this->email->send();

		}



	}

	

	Public function test_pdf(){

//		$this->load->view('test/html_pdf.php');

//		$this->load->view('test/test_view2.php');

		$this->load->view('test/pdf_view.php');

	}

	

	Public function user_det(){

	

		$this->load->view('test/user_details.php');

	}

	Public function getUsers(){

		$this->load->model('Test_contr_model');

		$data['users']	=	$this->Test_contr_model->get_all_users1();

		echo json_encode($data);

	}

	function GetRealTime($sec){

		$minte    = round($sec/60);

		$min      = ($minte%60);

		$hrs      = (($minte-$min)/60);

		$realtime = " ".($hrs)." hrs ".abs($min)." min";

		return $realtime;

	} 

	

	

	Public function getAllAttendDet(){

	    $user 			= $this->input->post('users');

		$from 			= $this->input->post('from_date');

		$to   			= $this->input->post('to_date');

		$time1          = strtotime($from);

		$time2          = strtotime($to." 23:59:59");

		$dat            = '';

//		print_r($time2);

		$this->load->model('Test_contr_model');

//		$res['users']   = $this->Test_contr_model->get_attendance($user,$time1,$time2);

		$getPendingHrs  = $this->Test_contr_model->getPendingHrs($user);

		if(count($getPendingHrs)>0){

			foreach($getPendingHrs as $pending){

				$dat 	.="Pending/Extra : ".$this->GetRealTime($pending['pending_hrs'])." ";

				$dat 	.="|  upto ".date('d-m-Y',$pending['date'])."</br> ";

			}

//			echo('<pre>');

//			print_r($getPendingHrs);

//			echo('</pre>');

		}

		$res            = $this->Test_contr_model->get_attendance($user,$time1,$time2);

		

//		$dat 	.="Last week Pending/Extra : ".$this->GetRealTime($getPendingHrs[1]['pending_hrs'])."<br >";

		$sum            = 0;

		if(count($res)>0){ 

			$dat       .= "<br/>Name :".$res[0]['fullname']." | ";

			$dat       .= "User id :".$res[0]['user_id']." <br/><br/> ";

			foreach($res as $details){

				$dat       .= " Date :".date('d-m-Y h:i a',$details['punchin'])."  ";

				$dat       .= "| Wrkd hrs :".$this->GetRealTime($details['worked_time'])." <br/>";

				$sum       += $details['worked_time'];

			}

				$dat	   .= "<br/> Total hrs wrkd :".$this->GetRealTime($sum)."<br/><br/>"; 

		}

		$lvs                = $this->Test_contr_model->getLeaveRecords($user,$time1,$time2);

		if(count($lvs)>0){

			$tot_no_lv      = 0;

			foreach($lvs as $leaverec){

				$dat  		.= "Leaves taken from <span style='color:#9161c5;'>".date('d-m-Y',$leaverec['lv_date'])." </span>to " ;

				if($leaverec['lv_date_to'] == 0){

					$dat  	.= "<span style='color:red;'> Not given </span> " ;

				}

				else{

					$dat  	.= "<span style='color:#9161c5;'>".date('d-m-Y',$leaverec['lv_date_to'])."</span>" ;

				} 

				if($leaverec['lv_type']== 1){

					$dat        .= " | Type : Casual<br/>";

				}

				elseif($leaverec['lv_type']== 2){

					$dat        .= " | Type : Medical<br/>";

				}

				elseif($leaverec['lv_type']== 3){

					$dat        .= " | Type : WFH<br/>";

				}

				elseif($leaverec['lv_type']== 4){

					$dat        .= " | Type : LOP<br/>";

				}

				elseif($leaverec['lv_type']== 5){

					$dat        .= " | Type : Swap<br/>";

				}

				

				$tot_no_lv  += $leaverec['lv_no'];

			}

			    $dat        .= "Tot no lvs :".$tot_no_lv."<br/>";

		}

		$no_days_worked      =  count($res);

		$dat                .=  "No. shifts done : ".$no_days_worked;

		$seconds_wrkd        =  $no_days_worked * 29340;

//		$dat       			.=  " <br/> Time one should work  :".$this->GetRealTime($seconds_wrkd);

//		$extra_hrs           =  $seconds_wrkd - $sum;

//		$dat				.= "Extra hrs :".$this->GetRealTime($extra_hrs);

		echo json_encode($dat); 

	}

	

	

//	Public function getAllAttendDet22(){

//	    $user 			= $this->input->post('users');

//		$from 			= $this->input->post('from_date');

//		$to   			= $this->input->post('to_date');

//		$from           = $from."-01";

////		print_r("01-".$from."<br/>");

////		print_r(date('t-m-Y',strtotime($from)));

//		$time1          = strtotime($from);

//		$time2          = date('t-m-Y',strtotime($from))." 23:59:59";

//		$time2          = strtotime($time2);

//		

////		print_r($time1."<br/>");

////		print_r($time2);

////		die();

//		

//		$this->load->model('Test_contr_model');

////		$res['users']   = $this->Test_contr_model->get_attendance($user,$time1,$time2);

//		$getPendingHrs  = $this->Test_contr_model->getPendingHrs($user);

//		

//		$res            = $this->Test_contr_model->get_attendance($user,$time1,$time2);

//		$dat            = '';

//		$dat .="Last week Pending/Extra : ".$this->GetRealTime($getPendingHrs[1]['pending_hrs'])."<br >";

//		$sum            = 0;

//		if(count($res)>0){ 

//			$dat       .= "Name :".$res[0]['fullname']." | ";

//			$dat       .= "User id :".$res[0]['user_id']." <br/><br/> ";

//			foreach($res as $details){

//				$dat       .= " Date :".date('d-m-Y h:i a',$details['punchin'])."  ";

//				$dat       .= "| Wrkd hrs :".$this->GetRealTime($details['worked_time'])." <br/>";

//				$sum       += $details['worked_time'];

//			}

//				$dat	   .= "<br/> Total hrs wrkd :".$this->GetRealTime($sum)."<br/><br/>"; 

//		}

//		$lvs                = $this->Test_contr_model->getLeaveRecords($user,$time1,$time2);

//		if(count($lvs)>0){

//			$tot_no_lv      = 0;

//			foreach($lvs as $leaverec){

//				$dat  		.= "Leaves taken from <span style='color:#9161c5;'>".date('d-m-Y',$leaverec['lv_date'])." </span>to " ;

//				if($leaverec['lv_date_to'] == 0){

//					$dat  	.= "<span style='color:red;'> Not given </span> " ;

//				}

//				else{

//					$dat  	.= "<span style='color:#9161c5;'>".date('d-m-Y',$leaverec['lv_date_to'])."</span>" ;

//				} 

//				if($leaverec['lv_type']== 1){

//					$dat        .= " | Type : Casual<br/>";

//				}

//				elseif($leaverec['lv_type']== 2){

//					$dat        .= " | Type : Medical<br/>";

//				}

//				elseif($leaverec['lv_type']== 3){

//					$dat        .= " | Type : WFH<br/>";

//				}

//				elseif($leaverec['lv_type']== 4){

//					$dat        .= " | Type : LOP<br/>";

//				}

//				elseif($leaverec['lv_type']== 5){

//					$dat        .= " | Type : Swap<br/>";

//				}

//				

//				$tot_no_lv  += $leaverec['lv_no'];

//			}

//			    $dat        .= "Tot no lvs :".$tot_no_lv."<br/>";

//		}

//		$no_days_worked      =  count($res);

//		$dat                .=  "No. shifts done : ".$no_days_worked;

//		$seconds_wrkd        =  $no_days_worked * 29340;

//		$dat       			.=  " <br/> Time one should work  :".$this->GetRealTime($seconds_wrkd);

//		$extra_hrs           =   $seconds_wrkd - $sum;

////		$dat				.= "Extra hrs :".$this->GetRealTime($extra_hrs);

//		echo json_encode($dat); 

//	}

	Public function getAllAttendDet22(){

	    $user 			= $this->input->post('users');

		$from 			= $this->input->post('from_date');

		$to   			= $this->input->post('to_date');

		$time1          = strtotime($from);

		$time2          = strtotime($to." 23:59:59");

//		print_r($time2);

		$this->load->model('Test_contr_model');

//		$res['users']   = $this->Test_contr_model->get_attendance($user,$time1,$time2);

		$getPendingHrs  = $this->Test_contr_model->getPendingHrs($user);

		

		$res            = $this->Test_contr_model->get_attendance($user,$time1,$time2);

		$dat            = '';

		$dat 	.="Last week Pending/Extra : ".$this->GetRealTime($getPendingHrs[1]['pending_hrs'])."<br >";

		$sum            = 0;

		if(count($res)>0){ 

			$dat       .= "Name :".$res[0]['fullname']." | ";

			$dat       .= "User id :".$res[0]['user_id']." <br/><br/> ";

			foreach($res as $details){

				$dat       .= " Date :".date('d-m-Y h:i a',$details['punchin'])."  ";

				$dat       .= "| Wrkd hrs :".$this->GetRealTime($details['worked_time'])." <br/>";

				$sum       += $details['worked_time'];

			}

				$dat	   .= "<br/> Total hrs wrkd :".$this->GetRealTime($sum)."<br/><br/>"; 

		}

		$lvs                = $this->Test_contr_model->getLeaveRecords($user,$time1,$time2);

		if(count($lvs)>0){

			$tot_no_lv      = 0;

			foreach($lvs as $leaverec){

				$dat  		.= "Leaves taken from <span style='color:#9161c5;'>".date('d-m-Y',$leaverec['lv_date'])." </span>to " ;

				if($leaverec['lv_date_to'] == 0){

					$dat  	.= "<span style='color:red;'> Not given </span> " ;

				}

				else{

					$dat  	.= "<span style='color:#9161c5;'>".date('d-m-Y',$leaverec['lv_date_to'])."</span>" ;

				} 

				if($leaverec['lv_type']== 1){

					$dat        .= " | Type : Casual<br/>";

				}

				elseif($leaverec['lv_type']== 2){

					$dat        .= " | Type : Medical<br/>";

				}

				elseif($leaverec['lv_type']== 3){

					$dat        .= " | Type : WFH<br/>";

				}

				elseif($leaverec['lv_type']== 4){

					$dat        .= " | Type : LOP<br/>";

				}

				elseif($leaverec['lv_type']== 5){

					$dat        .= " | Type : Swap<br/>";

				}

				

				$tot_no_lv  += $leaverec['lv_no'];

			}

			    $dat        .= "Tot no lvs :".$tot_no_lv."<br/>";

		}

		$no_days_worked      =  count($res);

		$dat                .=  "No. shifts done : ".$no_days_worked;

		$seconds_wrkd        =  $no_days_worked * 29340;

//		$dat       			.=  " <br/> Time one should work  :".$this->GetRealTime($seconds_wrkd);

//		$extra_hrs           =  $seconds_wrkd - $sum;

//		$dat				.= "Extra hrs :".$this->GetRealTime($extra_hrs);

		echo json_encode($dat); 

	}

    Public function user_det_monthpicker(){

		$this->load->view('test/user_details_monthly.php');

	}

	Public function test_mailing(){
		$subject = "test";
		echo("Test message !!!");
		$config = array(

			'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'

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

		   $this->email->from('gg@gmail.com','HashRoot PE Portal');

		   $this->email->to('priyanka.prakash@hashroot.com');

		   $this->email->subject($subject);			

		   $this->email->message('hiii This is a test message !!');

		   $this->email->send();	
	}
		

	

	

}  

?>