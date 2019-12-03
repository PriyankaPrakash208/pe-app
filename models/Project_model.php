<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_model {
	
	
//Insert new message
	Public function DoSend($data){		
		$this->db->insert('project_discussion',$data);
		return $this->db->insert_id();
	}

	/**
	 * team discussion
	 */
	public function doSendWithTeam($data){
		$this->db->insert('team_discussion', $data);
		return $this->db->insert_id();
	}
	//Update chatroom
	Public function UpdateRoom($chatsIdArray, $pr_id, $user_id){
		$this->db->select('project_discussion.*,user.fullname,user.emp_id, IF(project_discussion.pd_user = '.$user_id.', 1, 0) as own_message, admin_login.name as admin_name, admin_login.id as admin_id');
		$this->db->from('project_discussion');
		$this->db->join('user','project_discussion.pd_user=user.user_id', 'left');
		$this->db->join('admin_login', 'admin_login.id = project_discussion.pd_user', 'left');
		$this->db->where('pr_id',$pr_id);
		$this->db->where('project_discussion.is_active', 1);
		$this->db->where_not_in('pd_id',$chatsIdArray);
		$this->db->order_by('pd_id','asc');
		$query = $this->db->get();
		// return $this->db->last_query();		
		return $query->result_array(); 
	}

	/**
	 * update room with admin user
	 */
	
	public function UpdateRoomAdmin($chatsIdArray, $pr_id, $user_id){
		$this->db->select('project_discussion.*,admin_login.name as admin_name,admin_login.id as admin_id, IF(project_discussion.pd_user = '.$user_id.', 1, 0) as own_message,user.fullname,user.emp_id');
		$this->db->from('project_discussion');
		$this->db->join('admin_login','project_discussion.pd_user=admin_login.id', 'left');
		$this->db->join('user','project_discussion.pd_user=user.user_id', 'left');
		$this->db->where('pr_id',$pr_id);
		$this->db->where('project_discussion.is_active', 1);
		$this->db->where_not_in('pd_id',$chatsIdArray);
		$this->db->order_by('pd_id','asc');
		$query = $this->db->get();
		// return $this->db->last_query();		
		return $query->result_array(); 
	}

	public function getMessagesWithLimit($pr_id, $user_id, $limit, $offset){

		$this->db
			->select('pd.*, u.fullname,u.emp_id, IF(pd.pd_user = '.$user_id.', 1, 0) as own_message, ad.name as admin_name, ad.id as admin_id, "project"')
			->from('project_discussion pd')
			->join('user u', 'pd.pd_user = u.user_id', 'left')
			->join('admin_login ad', 'ad.id = pd.pd_user', 'left')
			->where('pd.pr_id', $pr_id)
			->where('pd.is_active', 1)
			->where('pd.chatType', 'group')
			->order_by('pd.pd_id', 'desc')
			->limit($limit, $offset);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getAdminDetails($user_id){
		$this->db
			->select('name')
			->from('admin_login')
			->where('id', $user_id);
			
		return $this->db->get()->row()->name;
	}

	/**
	 * Get message for the admin user
	 */
	
	public function getMessagesWithLimitAdmin($pr_id, $user_id, $limit, $offset){
		$this->db
			->select('pd.*, u.fullname,u.emp_id,ad.name as admin_name,ad.id as admin_id, IF(pd.pd_user = '.$user_id.', 1, 0) as own_message')
			->from('project_discussion pd')
			->join('admin_login ad', 'pd.pd_user = ad.id', 'left')
			->join('user u', 'pd.pd_user = u.user_id', 'left')
			->where('pd.pr_id', $pr_id)
			->where('pd.is_active', 1)
			->where('pd.chatType', 'group')
			->order_by('pd.pd_id', 'desc')
			->limit($limit, $offset);

		$query = $this->db->get()->result_array();
		return $query;
	}

	/**
	 * messages with team chat
	 */

	public function getTeamMessageWithLimit($team_id, $user_id, $limit, $offset){
		$this->db
			->select('td.td_id as pd_id, td_date as pd_date, td_day as pd_day, td_user as pd_user, td.team_id as pr_id, td.td_msg as pd_msg, u.fullname,u.emp_id, IF(td.td_user = '.$user_id.', 1, 0) as own_message, ad.name as admin_name, ad.id as admin_id')
			->from('team_discussion td')
			->join('user u', 'td.td_user = u.user_id', 'left')
			->join('admin_login ad', 'ad.id = td.td_user', 'left')
			->where('td.team_id', $team_id)
			->where('td.is_active', 1)
			->order_by('td.td_id', 'desc')
			->limit($limit, $offset);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function teamMessageWithoutLimit($chatsIdArray, $team_id, $user_id){
		$this->db
			->select('td.td_id as pd_id, td_date as pd_date, td_day as pd_day, td_user as pd_user, td.team_id as pr_id, td.td_msg as pd_msg, u.fullname,u.emp_id, IF(td.td_user = '.$user_id.', 1, 0) as own_message, ad.name as admin_name, ad.id as admin_id')
			->from('team_discussion td')
			->join('user u', 'td.td_user = u.user_id', 'left')
			->join('admin_login ad', 'ad.id = td.td_user', 'left')
			->where('td.team_id', $team_id)
			->where('td.is_active', 1)
			->where_not_in('td.td_id',$chatsIdArray)
			->order_by('td.td_id', 'asc');

		$query = $this->db->get()->result_array();
		// print_r($this->db->last_query());
		return $query;
	}

	//Get sound status
	Public function Get_sound_status($pr_id,$user_id){
		$this->db->select('*');
		$this->db->from('project_room_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('pr_id',$pr_id);
		$this->db->where('view_status',1);
		$query  = $this->db->get();
		return 	$query->result_array();
	}

	Public function Update_sound_status($pr_id,$user_id,$pru_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('pr_id',$pr_id);
		$this->db->where('pru_id',$pru_id);
		$this->db->where('view_status',1);
		$datas['view_status'] = 2;
		$this->db->update('project_room_users',$datas);
	}

	//Update status for new msg
	Public function Updating_status_pro_users($user_id,$pr_id){
		$this->db->where('user_id !=',$user_id,FALSE);
		$this->db->where('pr_id',$pr_id);
		$datas['view_status'] = 1;
		$res = $this->db->update('project_room_users',$datas);
		return $res ;
		//return $this->db->last_query();
	}
	
	//Remove MSG_DONTROUTE
	Public function DoRemove($pd_id,$user_id){
		/*$this->db->where('pd_id',$pd_id);
		$this->db->where('pd_user',$user_id);
		$this->db->delete('project_discussion');*/

		/**
		 * partially removing message from db (not removing from db)
		 */

		$delete_a = ['is_active' => 0, 'is_delete' => 1];

		$this->db
			->set($delete_a)
			->where('pd_user',$user_id)
			->where('pd_id', $pd_id)
			->update('project_discussion');
	}	
//list rooms
	Public function GetAllRooms($user_id){
		$this->db->select('*, "project" as type, (select unreaded from chat_read where room_id = project_room_users.pr_id and chatType = "project" and user_id = '.$user_id.' ) as unread_count');
		$this->db->from('project_room_users');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();		
		return $query->result_array(); 
	}

	public function getTeamRoom($user_id){
		$this->db
			->select('t.name, t.team_id, "team" as type, (select unreaded from chat_read where room_id = t.team_id and chatType = "team" and user_id = '.$user_id.' ) as unread_count ')
			->from('user u')
			->join('team t', 't.team_id = u.team_id', 'inner')
			->where('u.user_id', $user_id);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getAllTeamRoom(){
		$this->db
			->select('t.name, t.team_id, "team" as type')
			->from('team t');
		$query = $this->db->get()->result_array();
		return $query;
	}

	Public function getRoomData($pr_id){
		$this->db->select('*');
		$this->db->from('project_room');
		$this->db->where('pr_id',$pr_id);
		$query = $this->db->get();		
		return $query->row(); 
	}

	public function getTeamData($team_id){
		$this->db
			->select('name as pr_name, "Team" as pr_tag')
			->from('team')
			->where('team_id', $team_id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function getTeamMembers($team_id){
		$this->db
			->select('user_id as userid, emp_id as emplid, fullname as name')
			->from('user')
			->where('team_id', $team_id);
		$query = $this->db->get()->result_array();
		return $query;
	}

	Public function getempid($user_id){
		$this->db->select('emp_id');
		$this->db->from('user');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();		
		return $query->row(); 
	}
	
	Public function UpdateActiveRoom($pr_id,$user_id){
		
		$data=array('pru_status'=>0);
		$this->db->where('user_id',$user_id);
		$this->db->update('project_room_users',$data);
		
		$data=array('pru_status'=>1);
		$this->db->where('user_id',$user_id);
		$this->db->where('pr_id',$pr_id);
		return $this->db->update('project_room_users',$data);
	}

	Public function Get_room_name($user_id,$pr_id){
		$this->db->select('*');
		$this->db->from('project_room_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('pr_id',$pr_id);
		$query = $this->db->get();		
		return $query->result_array(); 
	}

	/**
	 * Get tokens for sending push notification
	 */
	public function getTokens($userId_a){
		$this->db
			->select('fcm_token')
			->from('fcm_tokens')
			->where_in('user_id', $userId_a);

		$query = $this->db->get()->result_array();
		return $query;
	}

	/**
	 * get token for a single user
	 */
	
	public function getSingleToken($user_id){
		$this->db
			->select('fcm_token')
			->from('fcm_tokens')
			->where('user_id', $user_id);

		$query = $this->db->get()->result_array();
		return $query;
	}

	/**
	 * Save firebase token
	 */
	public function saveFirebaseToken($userid, $token){

		$this->db
			->select('fcm_token')
			->from('fcm_tokens')
			->where('fcm_token', $token);
		$query = $this->db->get()->result_array();
		
		if($query){
			$this->db
				->where('fcm_token', $token)
				->delete('fcm_tokens');
		}
		
		$insert_a = ['user_id' => $userid, 'fcm_token' => $token];

		$this->db->insert('fcm_tokens', $insert_a);
		$lastId = $this->db->insert_id();

		if($lastId){
			return ['status' => 'success', 'message' => 'Successfully token updated'];
		}else{
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}
	}

	/**
	 * get all users for the individual chat
	 */
	public function listAllUsers($user_id, $username){

		$this->db
			->select('u.user_id, u.fullname, u.emp_id, fcm.status as online_status')
			->from('user u')
			->join('fcm_tokens fcm', 'fcm.user_id = u.user_id', 'left')
			->where_not_in('u.user_id', $user_id)
			->like('u.fullname', $username)
			->order_by('u.fullname', 'asc')
			->group_by('u.fullname');

		$data = $this->db->get()->result_array();

		$this->db
			->select('"" as emp_id, a.id as user_id, a.name as fullname, fcm.status as online_status')
			->join('fcm_tokens fcm', 'fcm.user_id = a.id', 'left')
			->from('admin_login a')
			->where('a.id', 1)
			->where_not_in('a.id', $user_id);

		$adminz = $this->db->get()->result_array();
		$data_res = array_merge($data, $adminz);

		return $data_res;
	}

	/**
	 * individual chat history list
	 */
	
	public function individualChatHistoryList($user_id){
		$this->db
			->select('icr.id as room_id, recieve.fullname as fullname, recieve.user_id, (select unreaded from chat_read where room_id = pd.pr_id and chatType = "individual" and user_id = '.$user_id.' ) as unread_count, fcm.status as online_status, a.name as admin_name, a.id as admin_id')
			->from('individual_chat_room icr')
			->join('user recieve', 'recieve.user_id = icr.reciever_id', 'left')
			->join('admin_login a', 'a.id = icr.reciever_id', 'left')
			->join('project_discussion pd', 'pd.pr_id = icr.id and pd.chatType = "individual"')
			->join('fcm_tokens fcm', 'fcm.user_id = recieve.user_id', 'left')
			->where_in('icr.sender_id', $user_id)
			->group_by('icr.id');
		
		$send = $this->db->get()->result_array();

		$this->db
			->select('icr.id as room_id, send.fullname as fullname, send.user_id, (select unreaded from chat_read where room_id = pd.pr_id and chatType = "individual" and user_id = '.$user_id.' ) as unread_count, fcm.status as online_status, a.name as admin_name, a.id as admin_id')
			->from('individual_chat_room icr')
			->join('user send', 'send.user_id = icr.sender_id and send.user_id != '.$user_id.'', 'left')
			->join('admin_login a', 'a.id = icr.sender_id', 'left')
			->join('project_discussion pd', 'pd.pr_id = icr.id and pd.chatType = "individual"')
			->join('fcm_tokens fcm', 'fcm.user_id = send.user_id', 'left')
			->where_in('icr.reciever_id', $user_id)
			->group_by('icr.id');

		$recieved = $this->db->get()->result_array();

		$result = array_merge($send, $recieved);

		$data = [];
		foreach ($result as $key => $value) {
			$data[$value['room_id']] = $value;
		}
		rsort($data);
		return $data;
	}

	

	

	/**
	 * checking individual chat room (exist or not)
	 */
	public function checkIndividualChatRoom($user_id, $to_id){
		$where_cond1 = ['sender_id' => $user_id, 'reciever_id' => $to_id];
		$where_cond2 = ['sender_id' => $to_id, 'reciever_id' => $user_id];
		
		/**
		 * check in case of current user as the sender
		 */
		$this->db
			->select('id')
			->from('individual_chat_room')
			->where($where_cond1);
		$room_details = $this->db->get()->row();

		if($room_details){
			return ['status' => 'room_exist', 'room_id' => $room_details->id];
		}

		/**
		 * check in case of current user as the reciever
		 */
		$this->db
			->select('id')
			->from('individual_chat_room')
			->where($where_cond2);
		$room_details = $this->db->get()->row();

		if($room_details){
			return ['status' => 'room_exist', 'room_id' => $room_details->id];
		}

		return ['status' => 'fail', 'message' => 'Room not exist'];

	}

	/**
	 * create individual chat rooms for personal chat
	 */
	public function createIndividualRoom($data){
		$this->db->insert('individual_chat_room', $data);
		$lastId = $this->db->insert_id();
		return $lastId;
	}

	/**
	 * Get individual chat messages
	 */
	
	public function getIndividualMessages($roomId, $user_id, $limit, $offset, $chatType='individual'){
		$this->db
			->select('pd.*, u.fullname,u.emp_id, IF(pd.pd_user = '.$user_id.', 1, 0) as own_message, a.name as admin_name, a.id as admin_id')
			->from('project_discussion pd')
			->join('user u', 'u.user_id = pd.pd_user', 'left')
			->join('admin_login a', 'a.id = pd.pd_user', 'left')
			->where('pr_id', $roomId)
			->where('pd.is_active', 1)
			->where('chatType', $chatType)
			->order_by('pd.pd_id', 'desc')
			->limit($limit, $offset);

		$data = $this->db->get()->result_array();
		
		if($data){
			return ['status' => 'success', 'data' => $data];
		}else{
			return ['status' => 'fail', 'message' => 'sorry no messages'];
		}

	}

	public function markUnreadMessage($data, $room_id, $chatType, $user_id){
		$this->db
			->select('id')
			->from('chat_read')
			->where('room_id', $room_id)
			->where('chatType', $chatType);
		$query = $this->db->get()->result_array();

		if(!$query){
			$this->db->insert_batch('chat_read', $data);
		}else{
			$this->db
				->set('unreaded', 'unreaded+1', FALSE)
				->where('room_id', $room_id)
				->where('chatType', $chatType)
				->where_not_in('user_id', $user_id)
				->update('chat_read');
		}
	}

	public function markRead($condition){
		$updated = $this->db
						->set('unreaded', 0)
						->where($condition)
						->update('chat_read');

		if($updated){
			return ['status' => 'success', 'message' => 'Message marked as read'];
		}else{
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}
	}

	public function logoutFromFcm($user_id){
		$this->db
			->set('status', 'offline')
			->where('user_id', $user_id)
			->update('fcm_tokens');

		if ($this->db->affected_rows() != 1) {
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}else{
			return ['status' => 'success', 'message' => 'Successfully logout from fcm'];
		}
	}

	public function getAllTokens($user_id){
		$this->db
			->select('fcm_token')
			->from('fcm_tokens')
			->where('status', 'online')
			->where_not_in('user_id', $user_id);
		$query = $this->db->get()->result_array();
		
		$registrationIds = [];
		foreach ($query as $row) {
			$registrationIds[] = $row['fcm_token'];
		}

		return $registrationIds;
	}
		
}