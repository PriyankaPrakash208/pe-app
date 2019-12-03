<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hashadmin extends CI_Controller {
	
/* function __construct() {
	 	parent::__construct();
	 	if(!empty($this->session->userdata('logged_in'))){
	 		redirect(base_url().'admin/home');
	 	}
	}*/
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
		$this->load->helper('url');
		$this->load->view('admin_login'); 
		
	}	
	public function loginvalidation()
	{		
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$this->load->model('Admin_model');
		$result=$this->Admin_model->login($data);
			if(isset($result[0]->email)){
		
		$result['status']=true;
		$sessdata = array(
		'id'  =>$result[0]->id,                
			'email'     =>$result[0]->email,
			'role' => $result[0]->role,
			'adminname' => $result[0]->name,
			'admin'=>true,
			'logged_in' => TRUE
               );
		$this->session->set_userdata($sessdata);	
		
		}
		else{  $result['status']=false;		}
		
		echo(json_encode($result));		
	}

	
}

