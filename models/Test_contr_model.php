<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_contr_model extends CI_model{
	
	Public function test_model(){
		$this->db->select('*');
		$this->db->from('user');
//		$this->db->from('user');
		$this->db->where('user_id',357);
//		$this->db->where('att_id',2250);
		$query = $this->db->get();
		return $query->result_array(); 
		 
	}
	
	
	Public function check_request($today){ 
		$types = array(5,3);//WFH and SWAP
		$this->db->select('*');
//		$this->db->select('user_id,SUM(lv_no) as total_lv');
//		$this->db->select('*');
		$this->db->from('request');
		$this->db->where('lv_date <',$today);
		$this->db->where('lv_hrs_status',0);
		$this->db->where('lv_status',1);
		$this->db->where('is_admin',0);
		$this->db->where_not_in('lv_type', $types);
//		$this->db->group_by('user_id');
		$query   = $this->db->get();
		return $query->result_array(); 
	}
	
	
	
	Public function get_rem_hours($user_id){
		$this->db->select('*');
		$this->db->from('weekly_work_hrs');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('wrk_id','desc');
		$this->db->limit(1);
		$query   = $this->db->get();
		return $query->row(); 
	}
	
	Public function Update_pending_hrs($wrk_id,$pending_hrs){ 
		$this->db->where('wrk_id',$wrk_id);
		$stat = $this->db->update('weekly_work_hrs',$pending_hrs);
		return $stat;
	}
	public function UpdateRequestStatus($user_id,$today){
			$datas['lv_hrs_status']=1;
			$this->db->where('lv_hrs_status',0);
			$this->db->where('lv_date <',$today);
			$this->db->where('lv_status',1);
			$this->db->where('user_id',$user_id);
			$this->db->update('request',$datas);
	}

	Public function get_all_users1(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('fullname','asc');
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array(); 
	}
	
	Public function get_attendance($user,$time1,$time2){ 
		$this->db->select('*');
//		$this->db->select('SUM(worked_time)');
		$this->db->from('attendance_log');
		$this->db->join('user','user.user_id=attendance_log.user_id');
		$this->db->where('attendance_log.user_id',$user);
		$this->db->where('user.user_id',$user);
		$this->db->where('punchin>=',$time1);
		$this->db->where('punchin<=',$time2);  
		$this->db->order_by('att_id','asc');
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
			
	}
	
	public function getLeaveRecords($user,$time1,$time2){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where('user_id',$user);
		$this->db->where('lv_status',1);
		$this->db->where('lv_date>=',$time1);
		$this->db->where('lv_date<=',$time2);
		$this->db->where('lv_date_to<=',$time2);
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}	
	public function getPendingHrs($user){
		$this->db->select('*');
		$this->db->from('weekly_work_hrs');
		$this->db->where('user_id',$user);
		$this->db->order_by('wrk_id','desc');
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	
	Public function getUserName($user_id){
		$this->db->select('fullname');
		$this->db->from('user');
		$this->db->where('user_id',$user_id);
		$this->db->limit(1);
		$query   = $this->db->get();
		return $query->row(); 
	}
	
} 