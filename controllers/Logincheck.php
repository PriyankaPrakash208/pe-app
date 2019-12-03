<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logincheck extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		if(!empty($this->session->userdata('user_id'))){
	 		redirect('User/dashboard');
	 	}
		$this->load->helper('url');
		$this->load->view('login');
		
	}	
	
	public function loginvalidation()
	{		
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$this->load->model('User_model');
		$result=$this->User_model->login($data);		
		if(isset($result[0]->email)){	
		
		$result['status']=true;
		$sessdata = array(
			'user_id'  =>$result[0]->user_id,
			'name'  =>$result[0]->fullname,                   
			'email'     =>$result[0]->email,
			'logged_in' => TRUE
               );
		$this->session->set_userdata($sessdata);	
		
		}
		else{  $result['status']=false;		}
		
		echo(json_encode($result));		
	}
	
	Public function forgot_pw(){
		$email = $this->input->post('email2');
		$this->load->model('User_model');
		$req = $this->User_model->forgot_pass($email);
		if($req  != ''){
			$password = substr(hash('sha512',rand()),0,12);
			$data = array(
		    'password' => md5($password)
			);
			$this->load->model('User_model');
			$res = $this->User_model->update_pass($email,$data);
			$er      = array();
			$subject = "Hashroot PE Portal-Reset password";
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
			$this->email->to($email);
			//$this->email->cc('another@another - example.com');
			//$this->email->bcc('them@their - example.com');
  			$this->email->subject($subject);
			
			$this->email->message("Hi , <br/>You've ($email.) requested for a password change for your account in HashRoot PE Portal.<br/>Your new password is  :<b> ".$password." </b> .<br/> Please, keep it in your records so that you don't forget it. ");

			// $this->email->message("<b>Name :</b> ".$name."<br/><br/><b>  Email :</b> ".$email."<br/>br/><b> Message :<b> ".$message);

			//	$this->email->attach('./assets/cvs/'.$data['file_name']);
  		if($this->email->send())
			{
				$er['stat'] = 1;
				$er['stat_msg'] = "Successfully sent mail";
			}
			else
			{
				$er['stat'] = 0;
				$er['stat_msg'] = "Something went wrong! Please contact admin@hashroot.com";
			}

  	
	echo(json_encode($er));

	/** close email */

		}
	}

	
}
