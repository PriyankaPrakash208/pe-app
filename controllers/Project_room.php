<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Project_room extends CI_Controller{

		

	//Update chatRoom every 3Sec	
	Public function DoUpdate(){
		$pr_id=$this->input->post('pr_id');
		$chatType = $this->input->post('chatType');
		$user_id      = $this->session->userdata('user_id');
		$this->load->model('Project_model');
		$chatsIdArray    =   $this->session->userdata('chatsIdArray');
		$data['sound_flag'] = 0;
		
		if (empty($chatsIdArray)) { 
			echo 'empty';
			$chatsIdArray=array('1');
		}

		switch ($chatType) {
			case 'project':
				
				if($user_id){
					$data['chats']=$this->Project_model->UpdateRoom($chatsIdArray, $pr_id, $user_id);
					$status_sound = $this->Project_model->Get_sound_status($pr_id,$user_id); 
				}else{
					$user_id      = $this->session->userdata('id');
					$data['chats'] = $this->Project_model->UpdateRoomAdmin($chatsIdArray, $pr_id, $user_id);
					$status_sound = $this->Project_model->Get_sound_status($pr_id,$user_id);
				}
				
				if(count($status_sound) > 0){
					$data['sound_flag']   = 1 ;  
					$datas['view_status'] = 2 ;
					foreach($status_sound as $sound){
						$this->Project_model->Update_sound_status($sound['pr_id'],$sound['user_id'],$sound['pru_id']);
					}
				    
				}	
				else{
					$data['sound_flag'] = 0 ;
				}	

				break;
			
			case 'team':
				if(!$user_id){
					$user_id      = $this->session->userdata('id');
				}
				$data['chats'] = $this->Project_model->teamMessageWithoutLimit($chatsIdArray, $pr_id, $user_id);
				
				$data['status'] = 'success';
				

				if(!empty($data['chats'])){
					$data['sound_flag']   = 1 ;
				}else{
					$data['sound_flag']   = 0 ;
				}

				break;
		}

			
		
		echo json_encode($data);
		//Create Session array for chat			
		foreach($data['chats'] as $row){
				$chatsIdArray[]=$row['pd_id'];
		}
		$this->session->set_userdata('chatsIdArray',$chatsIdArray);
	}

	public function getMessages(){

		$pr_id=$this->input->post('pr_id');
		$chatType = $this->input->post('chatType');
		$user_id      = $this->session->userdata('user_id');
		$this->load->model('Project_model');
		$chatsIdArray    =   $this->session->userdata('chatsIdArray');
		$data['sound_flag'] = 0;
		$chatWithoutLimit = [];

		if($this->input->post('limit')) { $limit =  $this->input->post('limit'); } else { $limit =  10; }
		if($this->input->post('offset')) { $offset =  $this->input->post('offset'); } else { $offset =  0; }

		if (empty($chatsIdArray)) { 
			$chatsIdArray=array('1');
		}

		switch ($chatType) {
			case 'project':
			
				if($user_id){
					$chats = $this->Project_model->getMessagesWithLimit($pr_id, $user_id, $limit, $offset);
					$chatWithoutLimit = $this->Project_model->UpdateRoom($chatsIdArray, $pr_id, $user_id);
				}else{
					$user_id      = $this->session->userdata('id');
					$chats = $this->Project_model->getMessagesWithLimit($pr_id, $user_id, $limit, $offset);
					$chatWithoutLimit = $this->Project_model->UpdateRoomAdmin($chatsIdArray, $pr_id, $user_id);
				}

				if(!$chats){
					$data = ['status' => 'fail', 'message' => 'No Messages'];
					echo json_encode($data);
					exit;
				}

				$status_sound = $this->Project_model->Get_sound_status($pr_id,$user_id); 

				$data['status'] = 'success';
				$data['chats'] = $chats;

				if(count($status_sound) > 0){
					$data['sound_flag']   = 1 ;  
					$datas['view_status'] = 2 ;
					foreach($status_sound as $sound){
						$this->Project_model->Update_sound_status($sound['pr_id'],$sound['user_id'],$sound['pru_id']);
					}
				    
				}	
				else{
					$data['sound_flag'] = 0 ;
				}

				break;
			
			case 'team':
				if(!$user_id){
					$user_id      = $this->session->userdata('id');
				}
				$chats = $this->Project_model->getTeamMessageWithLimit($pr_id, $user_id, $limit, $offset);
				$chatWithoutLimit = $this->Project_model->teamMessageWithoutLimit($chatsIdArray, $pr_id, $user_id);
				
				if(!$chats){
					$data = ['status' => 'fail', 'message' => 'No Messages'];
					echo json_encode($data);
					exit;
				}

				$data['status'] = 'success';
				$data['chats'] = $chats;

				$data['sound_flag']   = 0 ; 

				break;
		}

		echo json_encode($data);

		foreach($chatWithoutLimit as $row){
			$chatsIdArray[]=$row['pd_id'];
		}

		$this->session->set_userdata('chatsIdArray',$chatsIdArray);

		
	}
	
	/**
	 * insert new msg
	 */
	Public function DoSend(){
		$user_id = $this->session->userdata('user_id');
		$fullname = $this->session->userdata('name');
		$pr_id=$this->input->post('pr_id');
		$pd_msg=$this->input->post('pr_msg');
		$chatType=$this->input->post('chatType');
		$this->load->model('Project_model');

		if(!$fullname){
			$fullname = $this->session->userdata('adminname');
		}

		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}

		switch ($chatType) {
			case 'project':
				$data['pd_msg']=$pd_msg;
				$data['pd_user']=$user_id;		
				$data['pd_date']=strtotime('now');
				$data['pr_id']=$pr_id;
				$data['pd_day']=date('dmy');
				$data['chatType']='group';
				
				$chatId=$this->Project_model->DoSend($data);

				$data['chatId'] = $chatId;
				
				$updating_status      = $this->Project_model->Updating_status_pro_users($user_id,$pr_id);

				$getempid = $this->Project_model->getempid($user_id);
				if($getempid){
					$data['emp_id']=$this->Project_model->getempid($user_id)->emp_id;
					$data['fullname']=$fullname;
				}else{
					$data['emp_id'] = $user_id;
					$data['fullname']=$fullname;
				}

				$chatsIdArray    =   $this->session->userdata('chatsIdArray');
				
				$chatsIdArray[]  =   $chatId;
				$this->session->set_userdata('chatsIdArray',$chatsIdArray);

				/**
				 * for sending push notification
				 */
				// print_r($chatsIdArray);
				$this->pushNotify($chatType, $pr_id, $user_id, $pd_msg, $fullname, $data);
				$this->markUnreadMessage($data, 'project');

				break;
			
			case 'team':

				$insert_a['td_msg']=$pd_msg;
				$insert_a['td_user']=$user_id;		
				$insert_a['td_date']=strtotime('now');
				$insert_a['team_id']=$pr_id;
				$insert_a['td_day']=date('dmy');
				$data['chatType']='group';
				
				$chatId = $this->Project_model->doSendWithTeam($insert_a);

				$data['chatId'] = $chatId;
				
				$getempid = $this->Project_model->getempid($user_id);
				if($getempid){
					$data['emp_id']=$this->Project_model->getempid($user_id)->emp_id;
				}else{
					$data['emp_id'] = $user_id;
				}

				$data['fullname']=$fullname;

				$data['pd_msg']=$pd_msg;
				$data['pd_user']=$user_id;		
				$data['pd_date']=strtotime('now');
				$data['pr_id']=$pr_id;
				$data['pd_day']=date('dmy');

				$chatsIdArray    =   $this->session->userdata('chatsIdArray');
				$chatsIdArray[]  =   $chatId;
				$this->session->set_userdata('chatsIdArray',$chatsIdArray);

				/**
				 * for sending push notification
				 */
				
				$this->pushNotify($chatType, $pr_id, $user_id, $pd_msg, $fullname, $data);
				$this->markUnreadMessage($data, 'team');

				break;
		}
		
		
		echo json_encode($data);
		
	}

	public function pushNotify($chatType, $pr_id, $user_id, $pd_msg, $fullname, $chatData){
		$sender_id = $this->session->userdata('user_id');
		if(!$sender_id){
			$sender_id = $this->session->userdata('id');
		}
		$this->load->model('Admin_model');
		switch ($chatType) {

			/**
			 * send push notification with project discusion
			 */
			case 'project':
				
				$roomData              =    $this->Project_model->getRoomData($pr_id);
				$pr_userids = unserialize($roomData->pr_userids);

				$userid_a = [];
				$registrationIds = [];

				foreach($pr_userids as $row){
					if($user_id != $row['userid']){
						$userid_a[]=$row['userid'];
					}
				}

				$token_result = $this->Project_model->getTokens($userid_a);

				foreach($token_result as $row){
					$registrationIds[]=$row['fcm_token'];
				}

				$extra_data['sender'] = $fullname;
				$extra_data['sender_id'] = $sender_id;
				$extra_data['chatType'] = 'group';
				$extra_data['chatTime'] = $chatData['pd_date'];
				$extra_data['emp_id'] = $chatData['emp_id'];
				$extra_data['room_id'] = $chatData['pr_id'];

				$this->sendPushNotification($registrationIds, $pd_msg, $extra_data);

				break;
			
			/**
			 * send push notification with team discussion
			 */
			case 'team':
				$pr_userids = $this->Project_model->getTeamMembers($pr_id);
				$admins = $this->Admin_model->getAdmins();
				// print_r($admins);
				$userid_a = [];
				$registrationIds = [];

				foreach($pr_userids as $row){
					if($user_id != $row['userid']){
						$userid_a[]=$row['userid'];
					}
				}

				foreach ($admins as $row) {
					if($user_id != $row['id']){
						$userid_a[]=$row['id'];
					}
				}

				$token_result = $this->Project_model->getTokens($userid_a);

				foreach($token_result as $row){
					$registrationIds[]=$row['fcm_token'];
				}

				$extra_data['sender'] = $fullname;
				$extra_data['sender_id'] = $sender_id;
				$extra_data['chatType'] = 'group';
				$extra_data['chatTime'] = $chatData['pd_date'];
				$extra_data['emp_id'] = $chatData['emp_id'];
				$extra_data['room_id'] = $chatData['pr_id'];

				$this->sendPushNotification($registrationIds, $pd_msg, $extra_data);

				break;

			/**
			 * send push notification with individual discussion
			 */
			case 'individual':

				$token_result = $this->Project_model->getSingleToken($user_id);

				if(!$token_result){
					return;
				}
				$extra_data['sender_id'] = $sender_id;
				$extra_data['chatType'] = 'individual';
				$extra_data['chatTime'] = $chatData['pd_date'];
				$extra_data['emp_id'] = $chatData['emp_id'];

				$registrationIds = [];
				foreach ($token_result as $key => $value) {
					$registrationIds[] = $value['fcm_token'];
				}

				$extra_data['sender'] = $fullname;
				$this->sendPushNotification($registrationIds, $pd_msg, $extra_data);

				break;
		}
	}
	
	/**
	 * clear chat Array
	 */
	Public function DoRefresh(){
		$this->session->unset_userdata('chatsIdArray');
	}	
	
	/**
	 * Fetch Room data
	 */
	Public function getRoomData(){
		$pr_id	           =	$this->input->post('pr_id');
		$type			   = 	$this->input->post('type');
		$user_id	       =	$this->session->userdata('user_id');	
		$this->load->model('Project_model');

		switch ($type) {
			case 'project':
				$data              =    $this->Project_model->getRoomData($pr_id);
				$ActiveStatus	   =	$this->Project_model->UpdateActiveRoom($pr_id,$user_id);
				
				if(!empty($data->pr_userids) && $data->pr_userids!=NULL){			
					$data->pr_userids=unserialize($data->pr_userids);
					$data->totalusers=count($data->pr_userids);		
				}else{
					$data->totalusers=0;				
				}
				break;
			
			case 'team':
				
				$data = $this->Project_model->getTeamData($pr_id);
				$data->pr_userids = $this->Project_model->getTeamMembers($pr_id);
				/*print_r($totalUsers);*/
				$data->totalusers = count($data->pr_userids);


				break;
		}

		

		echo json_encode($data);
	}
	
	/**
	 * remove pr msg
	 */
	Public function DoRemove(){
		$pd_id=$this->input->post('pd_id');
		$user_id = $this->session->userdata('user_id');
		if(!empty($pd_id)){
			$this->load->model('Project_model');
			$this->Project_model->DoRemove($pd_id,$user_id);	
			$msg="Removed successfully";			
		}else{
			$msg= "Empty pd_id/You have't enough permission";
		}
		$data['msg']=$msg;
		echo json_encode($data);
	}
	
	/**
	 * Get All rooms
	 */
	Public function getallrooms(){
		$user_id = $this->session->userdata('user_id');
		if(!$user_id){
			$user_id  = $this->session->userdata('id');
		}
		$this->load->model('Project_model');
		$data['prRoom'] = $this->Project_model->GetAllRooms($user_id);	
		$data['teRoom'] = $this->Project_model->getTeamRoom($user_id);

		if(!$data['teRoom']){
			$data['teRoom'] = $this->Project_model->getAllTeamRoom();
		}
		echo json_encode($data);
	} 

	/**
	 * Save firebase tokens for notification
	 */
	
	public function saveNotification(){
		$this->load->model('Project_model');
		$user_id = $this->session->userdata('user_id');
		$fullname = $this->session->userdata('name');
		$token = $this->input->post('token');

		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}
		$insert_res = $this->Project_model->saveFirebaseToken($user_id, $token);

		/*$registrationIds = $this->Project_model->getAllTokens($user_id);
		$message = $fullname." is online";
		$extra_data['sender'] = $message;
		$extra_data['chatType'] = 'online_list';
		$extra_data['online_status'] = 'online';
		$extra_data['id'] = $user_id;
		$data_response = $this->sendPushNotification($registrationIds, $message, $extra_data);*/
		echo json_encode($insert_res);
	}

	/**
	 * send push notification with firebase
	 */
	private function sendPushNotification($registrationIds, $message, $extra_data = []){
		
		$msg = array
        (
            'alert'   => $extra_data['sender'],
            'body'   => $message,
            'message'   => $message,
            'title'     => 'Hashroot',
            'subtitle'  => '',
            'tickerText'    => $message,
            'vibrate'   => 1,
            'sound'     => 'default',
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon',
        );

        /**
         * managing notification alert box in browser
         */
	    $notification = new stdClass;
	    $notification->title = $extra_data['sender'];
	    $notification->body = $message;
	    $notification->click_action = 'https://www.hashroot.com/';
	    $notification->icon = 'https://www.hashroot.com/assets/images/logo-white.png';
	    
	    
	    $msg = array_merge($msg, $extra_data);
	 
	    $fields = array
	    (
	        'registration_ids' => $registrationIds,
	        'priority'         => 'high',
	        'data'             => $msg,
	        'notification'     => $notification
	    );
	    $headers = array
	    (
	        'Authorization: key=' . API_ACCESS_KEY,
	        'Content-Type: application/json'
	    );
	    $ch = curl_init();
	    curl_setopt( $ch,CURLOPT_URL, FCM_LINK );
	    curl_setopt( $ch,CURLOPT_POST, true );
	    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	    $result = curl_exec($ch );
	    curl_close( $ch );
	    return $result;
	}

	public function listAllUsers(){
		$this->load->model('Project_model');
		$user_id = $this->session->userdata('user_id');
		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}
		$username = $this->input->post('username');
		$users = $this->Project_model->listAllUsers($user_id, $username);
		if($users){
			echo json_encode(['status' => 'success', 'data' => $users]);
		}else{
			echo json_encode(['status' => 'fail', 'message' => 'Sorry no users availabe']);
		}
	}

	/**
	 * list of individual chat history
	 */
	public function chatHistory(){
		$this->load->model('Project_model');
		$user_id = $this->session->userdata('user_id');
		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}
		$data = $this->Project_model->individualChatHistoryList($user_id);
		if($data){
			echo json_encode(['status' => 'success', 'data' => $data]);
		}else{
			echo json_encode(['status' => 'fail', 'message' => 'Sorry no users availabe']);
		}
	}

	public function openChat(){
		$this->load->model('Project_model');
		$user_id = $this->session->userdata('user_id');
		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}
		$to_id = $this->input->post('to_id');
  		if($this->input->post('limit')) { $limit =  $this->input->post('limit'); } else { $limit =  10; }
		if($this->input->post('offset')) { $offset =  $this->input->post('offset'); } else { $offset =  0; }
		/**
		 * check room status if exist or not
		 */
		$checkStatus = $this->Project_model->checkIndividualChatRoom($user_id, $to_id);
		
		if($checkStatus['status'] == 'fail'){
			$data['sender_id']=$user_id;
			$data['reciever_id']=$to_id;
			$data['date']=strtotime('now');
			$data['day']=date('dmy');
			$checkStatus['room_id'] = $this->Project_model->createIndividualRoom($data);
		}

		$message = $this->Project_model->getIndividualMessages($checkStatus['room_id'], $user_id, $limit, $offset, 'individual');
		echo json_encode($message);
		
	}

	/**
	 * send message in individual chat
	 */
	public function doSendWithIndividual(){
		$this->load->model('Project_model');
		$user_id = $this->session->userdata('user_id');
		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}
		$fullname = $this->session->userdata('name');
		if(!$fullname){
			$fullname = $this->session->userdata('adminname');
		}
		$to_id = $this->input->post('to_id');
		$message = $this->input->post('message');
		$getRoomData = $this->Project_model->checkIndividualChatRoom($user_id, $to_id);
		
		$data['pd_msg']=$message;
		$data['pd_user']=$user_id;		
		$data['pd_date']=strtotime('now');
		$data['pr_id']=$getRoomData['room_id'];
		$data['pd_day']=date('dmy');
		$data['chatType']='individual';

		$chatId=$this->Project_model->DoSend($data);
		$data['chatId'] = $chatId;
		if($chatId){
			$data['status'] = 'success';
		}else{
			$data['status'] = 'fail';
			echo json_encode($data);
			exit;
		}

		$data['to_id'] = $to_id;

		$getempid = $this->Project_model->getempid($user_id);
		if($getempid){
			$data['emp_id']=$this->Project_model->getempid($user_id)->emp_id;
			$data['fullname']=$fullname;
		}else{
			$data['emp_id'] = $user_id;
			$data['fullname']=$fullname;
		}

		
		//insert chatid to session
		$chatsIdArray    =   $this->session->userdata('chatsIdArray');
		$chatsIdArray[]  =   $chatId;
		$this->session->set_userdata('chatsIdArray',$chatsIdArray);

		/**
		 * for sending push notification
		 */
		
		$this->pushNotify('individual', $getRoomData['room_id'], $to_id, $message, $fullname, $data);
		$this->markUnreadMessage($data, 'individual');
		echo json_encode($data);
		
	}

	/**
	 * mark unread message count
	 */
	public function markUnreadMessage($data, $chatType){
		$this->load->model('Project_model');
		$this->load->model('Admin_model');
		
		switch ($chatType) {
			case 'project':
				
				$user_id = $this->session->userdata('user_id');
				$insert_a = [];
				$pr_id = $data['pr_id'];
				$roomDetails = $this->Project_model->getRoomData($pr_id);
				$roomDetails->pr_userids=unserialize($roomDetails->pr_userids);
				
				foreach ($roomDetails->pr_userids as $row) {
					$insert_a[] = ['room_id' => $data['pr_id'], 'user_id' => $row['userid'], 'chatType' => 'project'];
				}

				$this->Project_model->markUnreadMessage($insert_a, $data['pr_id'], 'project', $user_id);
				
				break;

			case 'team':

				$pr_userids = '';
				$insert_a = [];
				$pr_id = $data['pr_id'];
				$user_id = $this->session->userdata('user_id');
				$pr_userids = $this->Project_model->getTeamMembers($pr_id);
				$admins = $this->Admin_model->getAdmins();

				foreach ($pr_userids as $row) {
					$insert_a[] = ['room_id' => $data['pr_id'], 'user_id' => $row['userid'], 'chatType' => 'team'];
				}

				foreach ($admins as $row) {
					$insert_a[] = ['room_id' => $data['pr_id'], 'user_id' => $row['id'], 'chatType' => 'team'];
				}

				$this->Project_model->markUnreadMessage($insert_a, $data['pr_id'], 'team', $user_id);
				
				break;

			case 'individual':

				$users_a = [];
				$insert_a = [];
				$pr_id = $data['pr_id'];
				$user_id = $this->session->userdata('user_id');
				if(!$user_id){
					$user_id = $this->session->userdata('id');
				}
				$users_a[]['user_id'] = $data['to_id'];
				$users_a[]['user_id'] = $user_id;

				foreach ($users_a as $row) {
					$insert_a[] = ['room_id' => $data['pr_id'], 'user_id' => $row['user_id'], 'chatType' => 'individual'];
				}

				$this->Project_model->markUnreadMessage($insert_a, $data['pr_id'], 'individual', $user_id);
			
		}
	}

	public function markReadMessage(){
		$this->load->model('Project_model');
		$room_id = $this->input->post('room_id');
		$chatType = $this->input->post('chatType');
		$user_id = $this->session->userdata['user_id'];
		if(!$user_id){
			$user_id = $this->session->userdata('id');
		}

		$data = ['room_id' => $room_id, 'user_id' => $user_id, 'chatType' => $chatType];
		$data = $this->Project_model->markRead($data);
		echo json_encode($data);
	}

	public function logoutChat(){
		$this->load->model('Project_model');
		$user_id = $this->session->userdata['user_id'];
		$update_res = $this->Project_model->logoutFromFcm($user_id);

		/*$fullname = $this->session->userdata('name');
		$registrationIds = $this->Project_model->getAllTokens($user_id);
		$message = $fullname." is offline";
		$extra_data['sender'] = $message;
		$extra_data['chatType'] = 'online_list';
		$extra_data['online_status'] = 'offline';
		$extra_data['id'] = $user_id;
		$stats_res = $this->sendPushNotification($registrationIds, $message, $extra_data);*/

		echo json_encode($update_res);
	}
}