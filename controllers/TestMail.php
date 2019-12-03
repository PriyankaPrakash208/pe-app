<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestMail extends CI_Controller{

	Public function requestapprove(){
		$lv_id = $this->input->post('id');
		$appr_person = $this->input->post('approve_per');
		$data['appr_person'] = $appr_person ;
		$data['lv_status']=1;
		$this->load->model('TestMail_model');
	    $request=$this->TestMail_model->GetRequestDta($lv_id);
		$rqtype=$this->RequestType($request->lv_type);

		//  start Mail function
			$subject = " Request Approved for ".$rqtype;			
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
			$this->email->from("requests@hashroot.com",'HashRoot PE Portal');
			$this->email->to($request->email);
  			$this->email->subject($subject);			
			$this->email->message('Hi '.$request->fullname.',<br/><br/><b>Requested date : </b>'.date('d M Y',$request->lv_aply_date).'<br/>
			<p>Your '.$rqtype.' request has been approved. </p>');

  			$this->email->send();	
		
			echo $this->TestMail_model->requestStatus($lv_id,$data);
		/** Ends mail function */
//::::::::::::::::::::::::::::::: Close Mail :::::::::::::::::::::::::::::::::::::::::::::::::::
	}
	
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
	
	Public function requestreject(){ 
		$this->load->model('TestMail_model');
		$lv_id=$this->input->post('id');
		$rej_person = $this->input->post('rejected_per');
		$data['appr_person']=$rej_person;
		$data['lv_status']=2;
	    $request=$this->TestMail_model->GetRequestDta($lv_id);
		$rqtype=$this->RequestType($request->lv_type);
		// starting  mail
			$subject = "Request Rejected for ".$rqtype;			
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
//			$this->email->from("requests@hashroot.com",'PE-Portal');
			$this->email->from("requests@hashroot.com",'HashRoot PE Portal');
//			$email4 = "requests@hashroot.com";
//		    $email4 = 'renjith.kr@hashroot.com';
//			$this->email->to('priyanka.prakash@hashroot.com');
			$this->email->to($request->email);
//			$this->email->to($mail__ids);
			//$this->email->cc('renjith.kr@hashroot.com');
			//$this->email->bcc('them@their - example.com');
  			$this->email->subject($subject);			
			$this->email->message('Hi '.$request->fullname.',<br/><br/><b>Requested date :</b>'.date('d M Y',$request->lv_aply_date).'<br/>
			<p>Your '.$rqtype.' request has been rejected</p>');

  			$this->email->send();	
		
		//mail function Ends
		
		echo $this->TestMail_model->requestStatus($lv_id,$data);
		
	}
//:::::::::::::::::::::::::::::::Start Mail :::::::::::::::::::::::::::::::::::::::::::::::::::	
	//mail function
//	Public function test(){
//			$subject = "testing of req  Report -";			
//			$config = array(
//			 'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//			 'smtp_host' => 'zimbra.hashroot.com',
//			 'smtp_port' => 465,
//			 'smtp_user' => 'site@hashroot.com',
//			 'smtp_pass' => 'Jn^8wC4g',
//			 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
//			 'mailtype' => 'html', //plaintext 'text' mails or 'html'
//			 'smtp_timeout' => '4', //in seconds
//			 'charset' => 'iso-8859-1',
//			 'wordwrap' => TRUE
//			);
//			$this->load->library('email',$config);
////			$this->email->from("requests@hashroot.com",'PE-Portal');
//			$this->email->from('test','workreport@hashroot.com (PE Portal Work Report)');
////			$email4 = "requests@hashroot.com";
////		    $email4 = 'renjith.kr@hashroot.com';
//			$this->email->to('priyanka.prakash@hashroot.com');
////			$this->email->to($mail__ids);
//			//$this->email->cc('renjith.kr@hashroot.com');
//			//$this->email->bcc('them@their - example.com');
//  			$this->email->subject($subject);			
//			$this->email->message('Hiiiiiiii');
//
//  			$this->email->send();	  		
//		//mail function Ends
////::::::::::::::::::::::::::::::: Close Mail :::::::::::::::::::::::::::::::::::::::::::::::::::
//		}
						




}
	
