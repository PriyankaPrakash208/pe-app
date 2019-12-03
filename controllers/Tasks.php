<?php

class Tasks extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('logged_in') && $this->session->userdata('admin')=='true')){
            redirect(base_url().'hashadmin');
		}
		$this->load->model('Admin_model');
    }

	public function addNewTask(){
		
		$data					  =   [];
		$title						=	$this->input->post('title');
		$body					 =	 $this->input->post('body');
		$assign_to		   		=	$this->input->post('user_id');
		$period		   			  =	 $this->input->post('period');
		$date		   			  =	  $this->input->post('date');
		if(!$date){$date 	 =	"";}

		if(!$title || $title=="" || $assign_to=="" || !$assign_to || !$period || $period==""){
			$data['status']=1;
			$data["message"]="Mandatory fields cannot be empty!";
			echo json_encode($data); 
			exit();
		}

		/**
	 * starts Multiple attachments
	 */
	$task_attachment_array = array();
	$task_attachment = "";
	if(array_key_exists('task_attachments',$_FILES)){
		foreach($_FILES['task_attachments']['name'] as $image){		
			$imageFileType = pathinfo($image,PATHINFO_EXTENSION);
			  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "PNG"  && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
				$data['status']=1;
				$data["message"]="Only JPG, JPEG, PNG, DOC, DOCX & PDF files are allowed.";
				echo json_encode($data); 
				exit();
			}
		}
		
			$config = array(
				'upload_path'   => '../pe/assets/tasks_attachments',
				'allowed_types' => 'pdf|doc|docx|txt|dot|png|jpg', 
				'max_size'     => 5024               
			);
	
			$this->load->library('upload', $config);
			foreach($_FILES['task_attachments']['name'] as $key=>$val){	
				$_FILES['task_att[]']['name'] 	  = $_FILES['task_attachments']['name'][$key];
				$_FILES['task_att[]']['tmp_name'] = $_FILES['task_attachments']['tmp_name'][$key];
				$_FILES['task_att[]']['size'] 	  = $_FILES['task_attachments']['size'][$key];
				$_FILES['task_att[]']['type']	  = $_FILES['task_attachments']['type'][$key];
				$_FILES['task_att[]']['error']	  = $_FILES['task_attachments']['error'][$key];
				
				$temp							  = explode(".", $_FILES["task_attachments"]["name"][$key]);
				$fileName 			= strtotime('now').'_'.$assign_to.'_'.$key. '.' . end($temp);
				array_push($task_attachment_array, $fileName);
				$config['file_name'] = $fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('task_att[]')) {
					$this->upload->data();
					$task_attachment = serialize($task_attachment_array);
				} else {
					$data['status']=1;
					$data["message"]="Upload failed!";
					echo json_encode($data); 
					exit();
				}
			}

	}else{
		$task_attachment = "";
	}
/** -------ends multiple attachment--------- */


		/** upload attachments*/
		// $task_attachment="";
		// if(isset($_FILES)){  
		// 	$config['upload_path']          = '../pe/assets/tasks_attachments'; 
		// 	$config['allowed_types']        = 'pdf|doc|docx|txt|dot|png|jpg';
		// 	$config['max_size']             = 5024;
		// 	$config['file_name']            = $assign_to.'_'.strtotime('now');

			
		// 	$this->load->library('upload', $config);
		// 	if($this->upload->do_upload('task_attachment')){ 
		// 		$data = $this->upload->data();
		// 		$task_attachment = $data['file_name'];
		// 	}
		// }
		/** ends upload attachment*/

		$comments  			  = array(); 
		$comments			  = serialize($comments);
		$insert_assignment = [
										'title'         => $title	,
										'body'        => $body,
										'creator_id' =>$this->session->userdata('id'),
										'status'      =>0,
										'period'      =>$period,
										'assign_to' =>$assign_to,
										'comments'=>$comments,
										'date'		   =>$date,
										'task_attachment'=>$task_attachment
									];


		$data['record_id']				= $this->Admin_model->addNewAssignment($insert_assignment);
		if(!$data['record_id']){
			$data['status']				 = 1;
			$data["message"]		 = "Something went wrong! Please try again!";
			echo json_encode($data); 
			exit();
		}

		$date_text	=	"";
		switch ($period) {
			case 'ONE':$period_text		=	"one time ";
							 $date = date('d F Y',strtotime($date));
							 $date_text	= "<h4> Deadline : </h4><p>".$date."</p>";
				break;
			case 'DAY':$period_text		=	"daily";# code...
				break;
			case 'WEEK':$period_text	=	"weekly";# code...
				break;
			case 'MONTH':$period_text  = "Monthly";# code...
				break;
			default:$period_text		   ="not specified";
				break;
		}

		$task_creator			=	$this->session->userdata('adminname');
		$assignee				  =	 $this->Admin_model->getFullName($assign_to)->fullname;
		$subject	               =  "PE Portal - Task Assigned";
		$date_created 			=  date("d M Y h:i:sa");
		$message_body 		 =	" Hi ".$assignee.", 
											<p>
											    A new  ".$period_text." task has been assigned by ".$task_creator." on ".$date_created."
												<h4>Task : </h4> ".$title."
												<h4>Task in detail : </h4><p>".$body."</p>
												".$date_text."
											</p>";

		$config       			   = array(
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
		$this->email->from('site@hashroot.com','HashRoot PE Portal Task Manager');
		//$this->email->to('bibin.varghese@hashroot.com');
		$this->email->to($this->Admin_model->getEmpEmail($assign_to));
		$this->email->subject($subject);			
		$this->email->message($message_body);
		$this->email->send();

		$data['status']			= 0;
		$data["message"]	= "New task has been assigned succesfully!";
		$data["data"]			= $insert_assignment;
		$data["assignee"]	  = $this->Admin_model->getFullName($assign_to)->fullname;

		if($task_attachment  == ""){
			$data["tasks_attached_files"] = "";
		}
		else{
			$data["tasks_attached_files"] = unserialize($task_attachment);
		}
		echo json_encode($data); 
	}

	function updateTaskComment(){
		//$user_id 				 =	 $this->session->userdata('user_id');
		$asgnmnt_id				=	$this->input->post('task_id');
		$comment				=	htmlspecialchars($this->input->post('comment'));
		$status					    =	$this->input->post('status');
		 if($status){
			 $status=1;
		 }else{
			$status=0;
		 }
		
		$data		= $this->Admin_model->getTask($asgnmnt_id);


		$getComment  = unserialize($data->comments);

		$newComment['date']							 = 	 date("dFY h:i:s a"); 
		$newComment['time_stamp']				=	strtotime("now");
		$newComment['comments']					=	$comment;
		$newComment['status']						=	$status;
		$newComment['name']						   =	$this->session->userdata('adminname');
		array_push($getComment,$newComment);
		
		$serializeComment	=	serialize($getComment);
		$serializeComment   =	["comments"=>$serializeComment,"status"=>$status];
		$updateStatus		   =   $this->Admin_model->updateTaskComment($asgnmnt_id,$serializeComment);

		if($updateStatus){
			$assign_to				   = $data->assign_to;
			$task_creator			=  $this->session->userdata('adminname');
			$assignee				  =	 $this->Admin_model->getFullName($assign_to)->fullname;
			$subject	               =  "PE  Tasker - New comment activity";
			$date_created 			=  date("d M Y h:i:sa");
			$message_body 		 =	" Hi ".$assignee.", 

												<p> A new comment activity has been detected on the task which you've been assigned to.
													
												</p>
												<p><b>Task : </b>".$data->title."
													
												</p>
												<p><b>Comment : </b>".$comment."
													
												</p>";
	
			$config       			   = array(
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
			$this->email->from('site@hashroot.com','HashRoot PE Portal Task Manager');
			//$this->email->to('bibin.varghese@hashroot.com');
			$this->email->to($this->Admin_model->getEmpEmail($assign_to));
			$this->email->subject($subject);			
			$this->email->message($message_body);
			$this->email->send();


			$response['status'] 		= $updateStatus;
			$response['comment']	 = $newComment;
			$response['task_status'] = $status;
			$response['message']	="Comment added Succesfuly!";
			echo json_encode($response);
		}else{
			$response['status'] = $updateStatus;
			$response['message']="Something went wrong!";
			echo json_encode($response);
		}


	}
}