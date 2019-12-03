<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample_model extends CI_model {
	
	//Getting fixed numerics from settings table
	Public function get_calcs(){
		$this->db->select('*');
		$this->db->from('settings_hrs');
		$q = $this->db->get();
		return $q->result_array();
	} 
	//Getting fixed numerics from settings table
	//cron codes
	Public function get_repeating_weeks($lastsun,$today_time){
		$this->db->select('weekly_work_hrs.*,user.desgn_id');
		$this->db->from('weekly_work_hrs');
		$this->db->join('user','user.user_id=weekly_work_hrs.user_id');
		$this->db->where('date >=', $lastsun);
		$this->db->where('date <=', $today_time);
		$query = $this->db->get();		
		return $query->result_array();
	}

	public function get_repeating_months($lastsun,$today_time){
		$this->db->select('*');
		$this->db->from('weekly_work_hrs');
		$this->db->where('user_id', 430);
		$this->db->order_by('wrk_id','desc');
		$this->db->limit(1,0);
		$query = $this->db->get();		
		return $query->result_array();
	}
	
	Public function create_new_row($rep_data){
		$q = $this->db->insert('weekly_work_hrs',$rep_data);
//		return($q);
	}
	//Close cron codes
	Public function selectalllog(){		
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->where('punchin >', 1522000000);
		$this->db->group_by('user_id');
		$query = $this->db->get();
		return $query->result_array();
	}
	Public function selectsumwork($user_id){		
	
	$this->db->select('SUM(worked_time) as sumof');
		$this->db->from('attendance_log');
		$this->db->where('punchin >', 1526848261);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	Public function create_function_hr($user_id){
		$this->db->select('SUM(worked_time) as sumof');
		$this->db->from('attendance_log');
		$this->db->where('punchin >', 1525030457);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->row();

	}
	Public function create_function_hr_new($data){
			
		 return($this->db->insert('weekly_work_hrs',$data));
		 
	}
	Public function selectattlog($month1,$month2){
		$ips = array('103.61.12.146', '202.83.55.157', '50.7.126.205', '45.58.123.7', '45.58.123.8', '45.58.123.12','45.58.123.11','45.58.123.9','50.7.126.205','69.12.84.231','139.162.214.101','199.195.142.172');
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->join('user','user.user_id=attendance_log.user_id');
		$this->db->join('team','user.team_id=team.team_id');
		$this->db->where('attendance_log.punchin >=', $month1);
		$this->db->where('attendance_log.punchin <=', $month2);
		//$this->db->where_not_in('attendance_log.punchin_ip ', $ips);
		$this->db->order_by('att_id','desc');
		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result_array();

	}
//Cron code for 45 hours working
	Public function SelectAllLoginedUsers(){
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->join('user','user.user_id=attendance_log.user_id');
		$this->db->where('attendance_log.att_status',0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	Public function GetLastworkReportTime($user_id,$att_id){
		$this->db->select('date');
		$this->db->from('workreport');
		$this->db->where('user_id',$user_id);
		$this->db->where('att_id',$att_id);
		$this->db->order_by('workreport_id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	Public function ForcePuncout($update,$att_id){
		$this->db->where('att_id',$att_id);
		//$this->db->where('user_id',449);
		$this->db->update('attendance_log',$update);
		
	}
		Public function getAllRequestss(){
		$this->db->select('request.*,user.fullname');
		$this->db->from('request'); 
		$this->db->join('user','user.user_id=request.user_id');
		$this->db->where('lv_type','3');
		$this->db->order_by('lv_id','desc');   
		$query = $this->db->get();  
		return $query->result_array();
	}
		Public function getWorkReports($user_id){
		$this->db->select('*');
		$this->db->from('monthly_data'); 
		$this->db->join('daily_activities','monthly_data.daily_activity_ids=daily_activities.daily_act_id');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('monthly_data_id','desc');   
		//$this->db->limit(1);   		
		$query = $this->db->get();  
		return $query->result_array();
	}
	//SELECT SUM(lv_no) as SUM FROM `request` WHERE lv_date>1522545400 and lv_type <> 5 and user_id=397
	Public function leaveUpdate($user_id){
		$ips = array(5,3);
		$this->db->select('SUM(lv_no) as TotalLV');
		$this->db->from('request'); 
		$this->db->where('user_id',$user_id);
		$this->db->where('lv_date >',1525030457);
		//$this->db->where('lv_type !=',5);
		$this->db->where_not_in('lv_type', $ips);
		$query = $this->db->get();  
		return $query->row()->TotalLV;
	}
	Public function GetPending($user_id){
		$this->db->select('*');
		$this->db->from('weekly_work_hrs'); 
		$this->db->where('user_id',$user_id);
		$this->db->order_by('wrk_id','desc');   
		$this->db->limit(1);
		$query = $this->db->get();  
		return $query->row();
	}
	Public function UpdatePendingHrs($ttl,$id){
		$update['pending_hrs']=$ttl;
		
		$this->db->where('wrk_id',$id);
		//$this->db->where('user_id',397);
		return $this->db->update('weekly_work_hrs',$update);
	}

	public function reset_warning($date){
		$updated = $this->db
			->set('warning_level', 0)
			->where('warning_last_update', $date)
			->where('warning_level', 1)
			->update('user');

		$updated1 = $this->db
			->set('warning_level', 1)
			->set('warning_last_update', date('Y-m-d'))
			->where('warning_last_update', $date)
			->where('warning_level', 2)
			->update('user');

		if($updated!="" || $updated1 !=""){
			return (object)['status' => true, 'message' => 'Warning resetted'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again'];
		}

	}
}
