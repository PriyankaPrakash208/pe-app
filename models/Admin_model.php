<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model {

	
Public function login($data)
	{		
		$this->db->select('*');
		$this->db->from('admin_login');
		$this->db->where('email', $data['email']);
		$this->db->where('password', MD5($data['password']));
		$query = $this->db->get();
       		 return $query->result();
		}
		
	Public function getEmployees($sort,$field){

			$query = $this->db->query('SELECT user.*,team.*,department.*,designation.*,
			(SELECT sum(lv_no) from request WHERE user_id=user.user_id AND lv_type=4 AND lv_status=1) as LOP,
			(SELECT sum(lv_no) from request WHERE user_id=user.user_id AND lv_type=3 AND lv_status=1) as WFH,
			(SELECT sum(lv_no) from request WHERE user_id=user.user_id AND lv_type=5 AND lv_status=1) as SWAP,
			performance.preview+performance.creview+performance.tquality+performance.cquality+performance.pviolation+performance.cypviolation+performance.slaviolation+performance.wreport+performance.warning+performance.suspension+performance.awards+performance.ChallengeOfTheDay+performance.trialpperf+performance.servicecancellation as PE, performance.goldenresponse+performance.treplies+performance.blogpost+performance.training+performance.interviews+performance.certifications+performance.seminars as IE, performance.codeof+performance.ssmedia+performance.extracurricular as CE FROM `user` JOIN `designation` ON `user`.`desgn_id`=`designation`.`desg_id` JOIN `department` ON `department`.`dep_id`=`user`.`dep_id` JOIN `team` ON `team`.`team_id`=`user`.`team_id` LEFT JOIN `performance` ON `performance`.`performance_id` = (select max(performance.performance_id) from performance where performance.user_id=user.user_id) ORDER BY user.'.$field.' '.$sort); 
	
	       return $query->result_array();
		
	}
	Public function getEachDepEmployees($sort,$field){

		$query = $this->db->query('SELECT user.*,team.*,department.*,designation.*,
		(SELECT sum(lv_no) from request WHERE user_id=user.user_id AND lv_type=4 AND lv_status=1) as LOP,
		(SELECT sum(lv_no) from request WHERE user_id=user.user_id AND lv_type=3 AND lv_status=1) as WFH,
		(SELECT sum(lv_no) from request WHERE user_id=user.user_id AND lv_type=5 AND lv_status=1) as SWAP,
		performance.preview+performance.creview+performance.tquality+performance.cquality+performance.pviolation+performance.cypviolation+performance.slaviolation+performance.wreport+performance.warning+performance.suspension+performance.awards+performance.ChallengeOfTheDay+performance.trialpperf+performance.servicecancellation as PE, performance.goldenresponse+performance.treplies+performance.blogpost+performance.training+performance.interviews+performance.certifications+performance.seminars as IE, performance.codeof+performance.ssmedia+performance.extracurricular as CE FROM `user` JOIN `designation` ON `user`.`desgn_id`=`designation`.`desg_id` JOIN `department` ON `department`.`dep_id`=`user`.`dep_id` JOIN `team` ON `team`.`team_id`=`user`.`team_id` LEFT JOIN `performance` ON `performance`.`performance_id` = (select max(performance.performance_id) from performance where performance.user_id=user.user_id) where user.dep_id="1" OR  user.dep_id="18" ORDER BY user.'.$field.' '.$sort); 

			 return $query->result_array();
	
}
	Public function NoofLOP($session_id,$getLeaveResetDate){
		$this->db->select('sum(lv_no) as total');
		$this->db->from('request');
		$this->db->where('user_id',$session_id);	
		$this->db->where('lv_type',4);		
		$this->db->where('lv_date>=',$getLeaveResetDate);		
		$this->db->where('lv_status',1);				
		$query=$this->db->get(); 
		return $query->row();
		
	}	
	Public function NoofSWAP($session_id,$getLeaveResetDate){
		$this->db->select('sum(lv_no) as total');
		$this->db->from('request');
		$this->db->where('user_id',$session_id);	
		$this->db->where('lv_type',5);		
		$this->db->where('lv_date>=',$getLeaveResetDate);		
		$this->db->where('lv_status',1);				
		$query=$this->db->get(); 
		return $query->row();	
	}	
	Public function NoofWFHfromRequest($session_id,$getLeaveResetDate){
		$this->db->select('sum(lv_no) as total');
		$this->db->from('request');
		$this->db->where('user_id',$session_id);	
		$this->db->where('lv_type',3);		
		$this->db->where('lv_date>=',$getLeaveResetDate);		
		$this->db->where('lv_date<=',1547445316);		
		$this->db->where('lv_status',1);				
		$query=$this->db->get(); 
		return $query->row();	
	}	
	public function getExtraHours($user_id){
		$this->db->select('extra_hrs,pending_hrs');
		$this->db->from('weekly_work_hrs');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('wrk_id','desc'); 
		$query=$this->db->get()->row(); 

		return $query;	
	}
	public function NoofWFH($user_id,$getLeaveResetDate){
		//$dates = $this->get_year_start_end();
		$this->db
			->select('count(att_id) as total')
			->from('attendance_log')
			->where('user_id', $user_id)
			->where('work_loc', 2)
			->where('punchin >=', $getLeaveResetDate);
		$query = $this->db->get()->row();
		return $query;
	}
	public function make_notice_period($user_id, $notice_period){
		$query = $this->db
			->set('notice_period', $notice_period)
			->where('user_id', $user_id)
			->update('user');
		if($query){
			return true;
		}else{
			return false;
		}

	}
	
	Public function getAllRequests($sort,$field){
		$this->db->select('request.*,user.fullname');
		$this->db->from('request'); 
		$this->db->join('user','user.user_id=request.user_id');
		$this->db->order_by($field,$sort);   
		$query = $this->db->get();  
		return $query->result_array();
	}

	Public function getEachDepAllRequests($sort,$field,$dep_id){
		$this->db->select('request.*,user.fullname');
		$this->db->from('request'); 
		$this->db->join('user','user.user_id=request.user_id');
		$this->db->where("dep_id",$dep_id);
		$this->db->order_by($field,$sort);   
		$query = $this->db->get();  
		return $query->result_array();
	}
	
	Public function deleteemp($empid){
		$this->db->where('user_id',$empid);
		$this->db->delete('user');
		
		$this->db->where('user_id',$empid);
		$this->db->delete('performance');
	}
	
	Public function getEmployee($empid){
		$this->db->select('user.*');
		$this->db->select('performance.*');
		$this->db->select('performance.preview+performance.creview+performance.tquality+performance.cquality+performance.pviolation+performance.cypviolation+performance.slaviolation+performance.wreport+performance.warning+performance.suspension+performance.awards+performance.ChallengeOfTheDay+performance.trialpperf+performance.servicecancellation as PE', FALSE);
		$this->db->select('performance.goldenresponse+performance.treplies+performance.blogpost+performance.training+performance.interviews+performance.certifications+performance.seminars as IE', FALSE);
		$this->db->select('performance.codeof+performance.ssmedia+performance.extracurricular as CE', FALSE);
		$this->db->from('user'); 		
		$this->db->join('performance','user.user_id=performance.user_id'); 
		$this->db->where('user.user_id',$empid);
		$this->db->order_by('performance.performance_id','desc');    		
		$this->db->limit(1); 
		$query = $this->db->get(); 
		return $query->result_array();
	}
	Public function getPerformance($empid){
		$this->db->select('*');
		$this->db->from('performance'); 
		$this->db->where('user_id',$empid);
		$query = $this->db->get(); 
		return $query->result_array();
	}
	Public function addperformance($data){
		$this->db->insert('performance',$data);
	}
	Public function addNewUser($data){
		$this->db->insert('user',$data);	
		$insert_id = $this->db->insert_id();
		$pe=array(
			'user_id'=>$insert_id,
			'date' => strtotime("now")
		);		
		$this->db->insert('performance',$pe);	
		return $insert_id;
	}
	public function updateTableHistory($history){
		// $this->db->insert('performance_history',$history);
		// return $this->db->last_query();
		return $this->db->insert('performance_history',$history);
	}
	Public function createNewRow($data){
		$this->db->insert('performance',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function updateperfHistory($performance,$id){
		$this->db->where('performance_id', $id);
   		return $this->db->update('performance', $performance);
	}
	public function UpdateExistingUser($data,$id){
		$this->db->where('user_id', $id);
	    return $this->db->update('user', $data);
		   
		
	}
	public function pe_history($id){
		$this->db->select('performance_history.*,performance.user_id');
		$this->db->from('performance_history'); 
		$this->db->join('performance','performance_history.performance_id=performance.performance_id'); 
		$this->db->where('performance.user_id',$id);
		$this->db->order_by('ph_id','desc');   
		$query = $this->db->get(); 
		return $query->result();
	}
	public function mail_exists($key) {
	   	$this->db->where('email',$key);
	   	$query = $this->db->get('user');
	   	if($query->num_rows() > 0)  	{
	   		return true;	   	}
	   	else{
	   		return false;
	   	}
	   } 
	   
	   public function empid_exists($key) {
	   	$this->db->where('emp_id',$key);
	   	$query = $this->db->get('user');
	   	if($query->num_rows() > 0)  	{
	   		return true;	   	}
	   	else	   	{
	   		return false;
	   	}
	   }
	Public function check_month($day,$id){
		$this->db->where('user_id',$id);
		$this->db->where('date >=',$day);
	   	$query = $this->db->get('performance');
	   	if($query->num_rows() > 0)  	{
	   		return TRUE;	   	}
	   	else	   	{
	   		return FALSE;
	   	}
	}
	Public function getUserId($perf_id){
		$this->db->select('user_id');
		$this->db->from('performance'); 
		$this->db->where('performance_id',$perf_id);
		$query = $this->db->get(); 
		$result= $query->row();
		return $result->user_id;
	}
	// New departmnt
	Public function addNewDept($depname){
		return $this->db->insert('department',$depname);
	}
	// New Team
	Public function addNewteam($teamname){
		return $this->db->insert('team',$teamname);
	}
	Public function viewallteam(){
		$this->db->select('*');
		$this->db->from('team');
		$query = $this->db->get(); 
		$result= $query->result();
		return $result;
	}
	Public function viewalldepts(){
		$this->db->select('*');
		$this->db->from('department');
		$this->db->order_by('dep_id','asc');   
		$query = $this->db->get(); 
		$result= $query->result();
		return $result;
	}
	
	Public function viewalldesignation(){
		$this->db->select('*');
		$this->db->from('designation');
		$this->db->order_by('desg_id','asc');   
		$query = $this->db->get(); 
		$result= $query->result();
		return $result;
	}
	Public function updateadminsettings($data,$admin_id){
		$this->db->where('id', $admin_id);
		return $this->db->update('admin_login', $data);
	}

	Public function getweekly($dep_id){
		$this->db->select('*');
		$this->db->from('weekly_activity');
		$this->db->where('dep_id',$dep_id);
		$this->db->order_by('wa_id','desc');   
		$query =$this->db->get();
		$result= $query->result();
		return $result;
	}
	Public function getmonthly($dep_id){
		$this->db->select('*');
		$this->db->from('monthly_activity');
		$this->db->where('dep_id',$dep_id);
		$this->db->order_by('ma_id','desc');   
		$query =$this->db->get();
		$result= $query->result();
		return $result;
	}
	Public function getperf($user_id){
		$this->db->select('*');
		$this->db->from('performance');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('performance_id','desc');   
		$this->db->limit(1);
		$query = $this->db->get(); 
		$result= $query->result_array();
		return $result[0];
	}
	Public function fetchUserbyid($user_id)
	{		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $user_id);		
		$query = $this->db->get();
        		return $query->result();
	}
	
	
	
	Public function testoff(){
	  return $this->db->last_query();
	}
	
//=====	Request module starts 	
	Public function requestStatus($lv_id,$data){
		$this->db->where('lv_id',$lv_id);	
		return $this->db->update('request',$data);
	}	
	
	Public function deleteRequest($lv_id){
		$this->db->where('lv_id',$lv_id);	
		return $this->db->delete('request');
	}
	
	public function GetRequestDta($lv_id){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('user','user.user_id=request.user_id'); 
		$this->db->where('lv_id',$lv_id);	
		$query=$this->db->get(); 
		return $query->row();
	}
	
//=====	Request module ends 
// Change jd
	Public function change_jdesc($data,$dep_id){
		$this->db->where('dep_id',$dep_id);
		$query = $this->db->update('department',$data);
		return($query);
	}
// Close change jd
	
//Get jd
	Public function get_jd($dep_id){
		$this->db->select('job_desc');
		$this->db->from('department');
		$this->db->where('dep_id', $dep_id);
		$query = $this->db->get();
//		return $result = $query->row();
		return $result = $query->result_array();
	}
	
	//Close get jd
	Public function GetDailyActivities($dep_id){
		$this->db->select('*');
		$this->db->from('daily_activities');
		$this->db->where('dep_id', $dep_id);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	
	Public function getUsersid($dep_id){
		$this->db->select('user_id');
		$this->db->from('user');
		$this->db->where_in('dep_id', $dep_id);
		$query = $this->db->get();
		return $result= $query->result_array();
	}
	
	Public function getUsersname($user_id){
		$this->db->select('fullname');
		$this->db->from('user');
		$this->db->where_in('user_id', $user_id);
		$query = $this->db->get();
		return $result= $query->result_array();
	}

	//activity module
	Public function InsertDailyActivity($row){
		$this->db->insert('daily_activities',$row);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}	
	
	Public function InsertActivityMonthlyData($monthly_data){
		$query = $this->db->insert('monthly_data',$monthly_data);
		
	}
	//Close activity module
	
	//	start Delete activity 
	Public function delete_activity($activity_id){
		$this->db->where('daily_act_id',$activity_id);
		$this->db->delete('daily_activities');
		$this->db->where('daily_activity_ids',$activity_id);
		$query = $this->db->delete('monthly_data');
		return($query);
	}
	
	Public function delete_weekly_Activity($activity_id){
		$this->db->where('wa_id',$activity_id);
		$this->db->delete('weekly_activity');
		$this->db->where('weekly_id',$activity_id);
		$query = $this->db->delete('weekly_data');
		return($query);
	}
	
	Public function delete_monthly_Activity($activity_id){
		$this->db->where('ma_id',$activity_id);
		$this->db->delete('monthly_activity');
		$this->db->where('monthly_id',$activity_id);
		$query = $this->db->delete('repeat_monthly_data');
//		return $this->db->last_query();
		return($query);
	}

//	end delete activity
	Public function ins_test($data){
		$query = $this->db->insert('activities',$data);
		return($query);
	}
	
//	Start view status of worksheet 
	Public function get_stat(){
		$this->db->select('*');
		$this->db->from('activities');
		$this->db->join('user','user.user_id=activities.user_id');
		$this->db->join('department','user.dep_id=department.dep_id');
		$this->db->where('activities.status',1);
		$this->db->order_by('activities.activity_id','desc');
		$query = $this->db->get();
	
		$stat['status']=2;
		$this->db->update('activities',$stat);

		return $query->result_array();
	}
	
//	Ends view status of worksheet
	Public function activity_reply_list(){
		$this->db->select('*');
		$this->db->from('activities');
//		$this->db->from($this->activities);
		$this->db->join('user','user.user_id=activities.user_id');
		$this->db->join('department','user.dep_id=department.dep_id');
		$this->db->order_by('activities.activity_id','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//	Get all employees
	Public function getEmployee_daily(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('fullname','asc');
		$query = $this->db->get();
		return $query->result_array();
	}

		//	Get all employees department base
		Public function getEachDepEmployee_daily($dep_id){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('dep_id',$dep_id);
			$this->db->order_by('fullname','asc');
			$query = $this->db->get();
			return $query->result_array();
		}

//	Close Employee lists
	Public function get_daily_array(){
		$this->db->select('*');
		$this->db->from('monthly_data');
		$query = $this->db->get();
		return $query->result_array();
	}
	//Get daily checklist reports
//	Public function full_daily_checklist($id,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
////		$month_id = "19-01-2018 00:00:00";
////		$a = strtotime($month_id."00:00:00");
//		$this->db->select('*');
//		$this->db->from('monthly_data');
//		$this->db->join('daily_activities','daily_activities.daily_act_id=monthly_data.daily_activity_ids');
//		$this->db->where('user_id',$id);
//		$this->db->where('daily_activities.field_type',0);
////		$this->db->where('monthly_data.activity_date',strtotime($month_id));
//		$this->db->where('monthly_data.activity_date >=', strtotime($time1));
//		$this->db->where('monthly_data.activity_date <=', strtotime($time2));
//		$this->db->order_by('monthly_data.monthly_data_id','desc');
//		$query = $this->db->get();		
//		return $query->result_array();
////		return $this->db->last_query();
//	}
	//Close daily checklist
	//Start daily work report
	Public function full_daily_w_report($id,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('monthly_data');
		$this->db->join('daily_activities','daily_activities.daily_act_id=monthly_data.daily_activity_ids');
		$this->db->where('user_id',$id);
		$this->db->where('daily_activities.field_type>=',1);
		$this->db->where('monthly_data.activity_date >=', strtotime($time1));
		$this->db->where('monthly_data.activity_date <=', strtotime($time2));
		$this->db->order_by('monthly_data.monthly_data_id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
		
	}
	//Close daily work report
	//Start screen shots
	Public function full_daily_shots($uid,$mon_4shot){
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('user_id',$uid);
		$this->db->where('attendance.at_month',$mon_4shot);
		$this->db->order_by('attendance.at_id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	}
	Public function get_screenshots($p_in,$p_out,$uid){
		$this->db->select('*');
		$this->db->from('desk_images');
		$this->db->where('user_id',$uid);
		$this->db->where('di_date >=',$p_in);
		$this->db->where('di_date <=',$p_out);
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Close screen shots
	//Start weekly full reports
//	Public function full_weekly_checklist($id,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
//		$this->db->select('*');
//		$this->db->from('weekly_data');
//		$this->db->join('weekly_activity','weekly_activity.wa_id=weekly_data.weekly_id');
//		$this->db->where('user_id',$id);
//		$this->db->where('weekly_activity.wa_field_type',0);
//		$this->db->where('weekly_data.wd_date >=', strtotime($time1));
//		$this->db->where('weekly_data.wd_date <=', strtotime($time2));
//		$query = $this->db->get();		
//		return $query->result_array();
//	}
//........................................test for weekly ............................................
	//Start weekly full reports
	Public function get_dep_id($uid){ 
		$this->db->select('dep_id');
		$this->db->from('user');
		$this->db->where('user_id',$uid);
		$dep = $this->db->get();
		return $dep->result_array();
	}
	
	Public function full_weekly_checklist_act($dep_id){
		$this->db->select('*');
		$this->db->from('weekly_activity');
		$this->db->where('weekly_activity.wa_field_type',0);
		$this->db->where('dep_id',$dep_id);
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	Public function stat_week_chk($uid,$month_id,$we_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('weekly_activity');
		$this->db->join('weekly_data','weekly_activity.wa_id=weekly_data.weekly_id');
		
		$this->db->where('weekly_activity.wa_field_type',0);
		$this->db->where('user_id',$uid);
		$this->db->where('weekly_id',$we_id);
		$this->db->order_by('weekly_data.wd_date',desc);
		$this->db->where('weekly_data.wd_date >=', strtotime($time1));
		$this->db->where('weekly_data.wd_date <=', strtotime($time2));
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	Public function full_weekly_rep_act($dep_id){
		$this->db->select('*');
		$this->db->from('weekly_activity');
		$this->db->where('weekly_activity.wa_field_type',1);
		$this->db->where('dep_id',$dep_id);
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Ends weekly reports 

	Public function stat_week_rep($uid,$month_id,$we_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('weekly_activity');
		$this->db->join('weekly_data','weekly_activity.wa_id=weekly_data.weekly_id');
		
		$this->db->where('weekly_activity.wa_field_type',1);
		$this->db->where('user_id',$uid);
		$this->db->where('weekly_id',$we_id);
		$this->db->where('weekly_data.wd_date >=', strtotime($time1));
		$this->db->where('weekly_data.wd_date <=', strtotime($time2));
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	
	Public function full_monthly_checklist_act($dep_id){
		$this->db->select('*');
		$this->db->from('monthly_activity');
		$this->db->where('monthly_activity.ma_field_type',0);
		$this->db->where('dep_id',$dep_id);
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	Public function stat_month_chk($uid,$month_id,$mo_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('monthly_activity');
		$this->db->join('repeat_monthly_data','monthly_activity.ma_id=repeat_monthly_data.monthly_id');
		$this->db->where('monthly_activity.ma_field_type',0);
		$this->db->where('user_id',$uid);
		$this->db->where('monthly_id',$mo_id);
		$this->db->where('repeat_monthly_data.md_date >=', strtotime($time1));
		$this->db->where('repeat_monthly_data.md_date <=', strtotime($time2));
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	Public function full_monthly_rep_act($dep_id){
		$this->db->select('*');
		$this->db->from('monthly_activity');
		$this->db->where('monthly_activity.ma_field_type',1);
		$this->db->where('dep_id',$dep_id);
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}

	Public function stat_month_rep($uid,$month_id,$mo_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('monthly_activity');
		$this->db->join('repeat_monthly_data','monthly_activity.ma_id=repeat_monthly_data.monthly_id');
		
		$this->db->where('monthly_activity.ma_field_type',1);
		$this->db->where('user_id',$uid);
		$this->db->where('monthly_id',$mo_id);
		$this->db->where('repeat_monthly_data.md_date >=', strtotime($time1));
		$this->db->where('repeat_monthly_data.md_date <=', strtotime($time2));
		$query = $this->db->get();		
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Ends weekly reports 
//	$d1 = strtotime(date("Y-m-01 0:0:0"));
//	$d2 = strtotime(date("Y-m-t 12:59:59"));
	Public function full_monthly_workreport($id,$month_id){
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('repeat_monthly_data');
		$this->db->join('monthly_activity','monthly_activity.ma_id=repeat_monthly_data.monthly_id');
		$this->db->where('user_id',$id);
		$this->db->where('monthly_activity.ma_field_type >=',1);
		$this->db->where('repeat_monthly_data.md_date >=', strtotime($time1));
		$this->db->where('repeat_monthly_data.md_date <=', strtotime($time2));
		$query = $this->db->get();	
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Close Monthly
	// get daily work report
	Public function get_emp_work_report($id,$at_id){
		$this->db->select('*');
		$this->db->from('workreport');		
		$this->db->where('user_id',$id);
//		$this->db->where('date', strtotime($mon_4Wrpt));
		$this->db->where('att_id',$at_id);
//		$this->db->order_by('date','desc');
		$this->db->order_by('workreport_id','desc');
		$query = $this->db->get();
		return $query->result_array();
		
	}
	// get daily work report
	
	
	Public function get_all_users(){
		$this->db->select('*');
		$this->db->from('user');
	
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	
	Public function full_report_det($uid,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('workreport');
		$this->db->where('user_id',$uid);
//		$this->db->join('tickets','tickets.user_id=workreport.user_id');
			
		
		$this->db->where('workreport.date >=', strtotime($time1));
		$this->db->where('workreport.date <=', strtotime($time2));
		
		$this->db->order_by("workreport_id", "desc");

		$query = $this->db->get();
//		return $this->db->last_query();
		$num = $query->num_rows();
		if($num == 0){
			return $num;
		}
		else{
//			return $this->db->last_query();
			return $query->result_array();
		}
//		return $this->db->last_query();
	
	}
	//Dont delete it please
//Public function full_ticket_det($uid,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
	
//		$this->db->select('*');
//		$this->db->from('tickets');
//		$this->db->where('user_id',$uid);
////		$this->db->join('tickets','tickets.user_id=workreport.user_id');
//			
//		
//		$this->db->where('tickets.tk_date >=', strtotime($time1));
//		$this->db->where('tickets.tk_date <=', strtotime($time2));
//		
//		$this->db->order_by("tk_id", "desc");
//
//		$query = $this->db->get();
////		return $query->result_array();
////		return $this->db->last_query();
//		$num = $query->num_rows();
//		if($num == 0){
//			return $num;
//		}
//		else{
////			return $this->db->last_query();
//			return $query->result_array();
//		}
////		return $this->db->last_query();
//	}
	//Needed ///Please dont delete it 
	Public function full_task_det($uid,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('tasks_list');
		$this->db->where('user_id',$uid);
//		$this->db->join('tickets','tickets.user_id=workreport.user_id');
			
		
		$this->db->where('tasks_list.time >=', strtotime($time1));
		$this->db->where('tasks_list.time <=', strtotime($time2));
		
		$this->db->order_by("tasks_list_id", "desc");

		$query = $this->db->get();
//		return $query->result_array();
//		return $this->db->last_query();
		$num = $query->num_rows();
		if($num == 0){
			return $num;
		}
		else{
//			return $this->db->last_query();
			return $query->result_array();
		}
//		return $this->db->last_query();
	}
	
	//Weekly activity starts
	Public function ins_weekly_activity($data){
		 $this->db->insert('weekly_activity',$data);
		return $this->db->insert_id();
	}
	//Weekly activity ends
	//Monthly activity starts
	
	Public function ins_monthly_activity($data){
		$this->db->insert('monthly_activity',$data);
		return $this->db->insert_id();
	}
	//Close Monthly activity
	//Att module new code
Public function get_attendance($uid,$month_id){
		$this->db->select('*');
		$this->db->from('attendance_log'); 
		$this->db->where('user_id',$uid);
//		$this->db->where('at_month',$month_id);
		$this->db->where("punchin_date LIKE '%$month_id%'");
		$this->db->order_by('att_id','desc');
		$query = $this->db->get();
		
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Attendance module close new code
	Public function get_all_images($uid,$att_id){
		$this->db->select('*');
		$this->db->from('desk_images');
		$this->db->where('user_id',$uid);
		$this->db->where('att_id',$att_id);
//		$this->db->where('di_date >=',$in);
//		$this->db->where('di_date <=',$out); 
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Close attendance module
	
	//Edit department
	Public function edit_department($dep_id,$data){
		$this->db->where('dep_id',$dep_id);
		$this->db->update('department',$data);
	}
	
	//Close edit department
	
	//Edit team
	Public function edit_team($team_id,$data){
		$this->db->where('team_id',$team_id);
		$this->db->update('team',$data);
	}
	
	//Close edit edit_team
	
	
	//Delete department
	Public function delete_dept($dep_id,$data){
//		return(1);
		$this->db->select('daily_act_id');
		$this->db->from('daily_activities');
		$this->db->where('dep_id',$dep_id);
		$daily_act_ids = $this->db->get();
		$daily_ids = $daily_act_ids->result_array();
//		print_r($daily_ids);
//		
//		$this->db->where('dep_id',$dep_id);
		$this->db->select('daily_activity_ids');
		$this->db->from('monthly_data');
		$this->db->where_in('daily_activity_ids',$daily_ids);
		$res = $this->db->get();
//		$result = $this->db->last_query();
		$result = $res->result_array();
		print_r($result);
		 
		
//		$q1 = $this->db->delete('daily_activities');
//		if($q1 != 0){
		   	
			
			
//			$this->db->where('dep_id',$dep_id);
//			$q2 = $this->db->delete('monthly_data');
//			if($q2 != 0){
//				$this->db->where('dep_id',$dep_id);
//				$q3 = $this->db->delete('weekly_activity');
//				if($q3 != 0){
//					$this->db->where('dep_id',$dep_id);
//					$q4 = $this->db->delete('weekly_data');
//					if( $q4 != 0){
//						$this->db->where('dep_id',$dep_id);
//						$q5 = $this->db->delete('monthly_activity');
//						if($q5 != 0){
//							$this->db->where('dep_id',$dep_id);
//							$q6 = $this->db->delete('repeat_monthly_data');
//							if($q6 != 0){
//								$this->db->where('dep_id',$dep_id);
//								$q7 = $this->db->update('user',$data);
//								if($q7 != 0){
//									$this->db->where('dep_id',$dep_id);
//									$q8 = $this->db->delete('department');
//									return(1);
//								}
//								else{
//									return(0);
//								}
//							}
//							else{
//								return(0);
//							}
//						}
//					}
//					else{
//						return(0);
//					} 
//				}
//				else{
//					return(0);
//				} 
//			}
//			else{
//				return(0);
//			}
//		}
//		else{
//			return(0);
//		}
	}
	//Close delete department
	
	
	//Delete team
	Public function delete_teams_v($team_id){
		$this->db->select('*');
		$this->db->from('inventory');
		$this->db->where('inv_team',$team_id);
		$inv   = $this->db->get();
		$inv_q = $inv->result_array();
		
		if(count($inv_q)>0){ //If inv items found
			$data['inv_team'] = 5;
			$this->db->where('inv_team',$team_id);
			$inv_up = $this->db->update('inventory',$data);
				if($inv_up == 1){//If inv table is updated
					$this->db->where('team_id',$team_id);
					$this->db->select('*');
					$this->db->from('user');
					$user   = $this->db->get();
					$user_q = $user->result_array();
					if(count($user_q)>0){ //if user items found
						$this->db->where('team_id',$team_id);
						$datas['team_id'] = 5;
						$user_up 		  = $this->db->update('user',$datas);
							if($user_up   == 1){ //If  user table updated
								$this->db->where('team_id',$team_id);
								$team_del         = $this->db->delete('team');
								if($team_del      == 1 ){
									$stat['flag'] = 1; 
									$stat['msg']  = "Team deleted Successfully!"; 
									return($stat);
								}
								else{
									$stat['flag'] = 0; 
									$stat['msg']  = "Sorry, this team can't be deleted !"; 
									return($stat);
								}
						}
						else{//If  user table not updated
							$stat['flag'] = 0; 
							$stat['msg']  = "Sorry, this team can't be deleted !"; 
							return($stat);
						}
					}	
					
			}
			else{//if inv table is not updated
				$stat['flag'] = 0; 
				$stat['msg']  = "Sorry, this team can't be deleted !"; 
				return($stat);
			}
			
		}
		else{ //if no inv items found
				$this->db->where('team_id',$team_id);
				$this->db->select('*');
				$this->db->from('user');
				$user   = $this->db->get();
				$user_q = $user->result_array();
				if(count($user_q)>0){ 
					$this->db->where('team_id',$team_id);
					$datas['team_id'] = 5;
					$user_up 		  = $this->db->update('user',$datas);
						if($user_up   == 1){
							$this->db->where('team_id',$team_id);
							$team_del         = $this->db->delete('team');
							if($team_del      == 1 ){
								$stat['flag'] = 1; 
								$stat['msg']  = "Team deleted Successfully!"; 
								return($stat);
							}
							else{
								$stat['flag'] = 0; 
								$stat['msg']  = "Sorry, this team can't be deleted !"; 
								return($stat);
							}
					}
				}
			else{
					$this->db->where('team_id',$team_id);
					$team_del         = $this->db->delete('team');
					if($team_del      == 1 ){
						$stat['flag'] = 1; 
						$stat['msg']  = "Team deleted Successfully!"; 
						return($stat);
					}
					else{
						$stat['flag'] = 0; 
						$stat['msg']  = "Sorry, this team can't be deleted !"; 
						return($stat);
					}
				
			}
		}
		
		
	}
	//Close deleting teams
	
	
	
	//Add comments
	
	Public function Ins_comments($data){
//		$this->db->where('user_id',$user_id);
		$this->db->insert('comments',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	//Delete comments
	Public function Delete_comments($user_id,$last_ins_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('com_id',$last_ins_id);
		$del = $this->db->delete('comments');
		return($del);
	}
	
	Public function Get_all_comments($user_id){
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('com_id','desc');
		$query = $this->db->get();
		return $query->result_array();
		
	}
		// View LinkedIn Employees
	Public function viewlinkedin(){
		$this->db->select('*');
		$this->db->from('linkedin_notify');
		$this->db->join('user','linkedin_notify.not_user=user.user_id');
		$query = $this->db->get(); 
		$result= $query->result();
		return $result;
	}
	
	Public function get_att($uid,$month_id){
		$this->db->select('*');
		$this->db->from('attendance_log'); 
		$this->db->where('user_id',$uid);
		$this->db->where('punchin_date',$month_id);
		$this->db->order_by('att_id','desc');
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	Public function get_screen_shots($uid,$att_ids){
		$this->db->select('*');
		$this->db->from('desk_images');
		$this->db->where('user_id',$uid);
//		$this->db->where('di_date >=',$p_in);
//		$this->db->where('di_date <=',$p_out);
		$this->db->where('att_id',$att_ids);
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	
		//Get daily checklist reports
	Public function full_daily_checklist($id,$month_id){
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$id);
		$this->db->where('punchin_date',$month_id);
		$query = $this->db->get();		
		return $query->result_array();
//		return $this->db->last_query();
	}
	//Close daily checklist
	
	
	// get daily work report
	Public function get_emp_work_report_p($id,$month){
		$this->db->select('*');
		$this->db->from('workreport');		
		$this->db->where('user_id',$id);
//		$this->db->where('att_id',$att_id);
//		$this->db->where('date>=',$punchin);
//		$this->db->where('date<=',$punchout);
		$this->db->where('date',strtotime($month));
		$this->db->order_by('workreport_id','desc');
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
	}
	// get daily work report
//	
	Public function delete_screenshots_2months($user_id,$date3){
		$this->db->where('user_id',$user_id);
		$this->db->where('di_date<=',$date3);
		$query = $this->db->delete('desk_images');
		return $query;
	}
	
	Public function get_all_screenshots($user_id){
		$this->db->select('*');
		$this->db->from('desk_images');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->result_array();
	}


	Public function getUserdet($userlist){ 
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where_in('user_id',$userlist);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	Public function ins_userdatas($data){
		$this->db->insert('project_room',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	
	Public function InsAllUsers($data){

		$ret =  $this->db->insert_batch('project_room_users',$data);
		return $ret;
	}
	
	Public function viewProjectRooms(){ 
		$this->db->select('*');
		$this->db->from('project_room');
//		$this->db->join('users');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	Public function get_proj_det($id){
		$this->db->select('*');
		$this->db->from('project_room');
		$this->db->where('pr_id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	Public function get_userids(){
		$this->db->select('*');
		$this->db->from('user');
		//$this->db->where_in('user_id',$users);
		$query = $this->db->get()->result_array();
		return $this->db->last_query();
//		return $query->result_array();
	}

	public function edit_project_room($data, $pr_id){
		$updated =	$this->db
				->set($data)
				->where('pr_id', $pr_id)
				->update('project_room');

		if($updated){
			return ['status' => 'success', 'message' => 'Successfully project room updated'];
		}else{
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}
	}
	
	/**
	 * admins list
	 */
	public function getAdmins(){
		$this->db
			->select('id, name')
			->from('admin_login');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function admin_a(){
		$this->db
			->select('id, name')
			->from('admin_login')
			->where('id', 1);
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function update_warning_level($user_id, $update_a){
		$updated = $this->db
			->set($update_a)
			->where('user_id', $user_id)
			->update('user');

		if($updated){
			return (object)['status' => true, 'message' => 'Warning level updated'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured. Please try again later'];
		}
	}

	public function get_user_details($user_id){
		$this->db
			->select('*')
			->from('user')
			->where('user_id', $user_id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function get_designation_details($desg_id){
		$this->db
			->select('*')
			->from('designation')
			->where('desg_id', $desg_id);
		$query = $this->db->get()->row();
		return $query;
	}

	// exam / interview

	public function checkMailUnique($email){
		$this->db
			->select('*')
			->from('exam')
			->where('candidate_email', $email);
			$query = $this->db->get()->result();
			return $query;
	}

	public function save_interview($data){
		$this->db->insert('exam', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return (object)['status' => true, 'message' => 'Interview has been scheduled succesfully!'];
		}else{
			return (object)['status' => false, 'message' => 'Something went wrong. Please try again later'];
		}
	}

	public function update_interview($candidate_id, $update_a){
		$updated = $this->db
			->where('id', $candidate_id)
			->update('exam',$update_a);
		if($updated){
			return (object)['status' => true, 'message' => 'Interview has been updated!'];
		}else{
			return (object)['status' => false, 'message' => 'Something went wrong. Please try again later'];
		}
	}
	public function get_comments($id){
		$this->db
			->select('comment_array')
			->from('exam')
			->where('id', $id);
			$query = $this->db->get()->row();
			return $query;
	}
// 	public function get_interview_list($start_date, $end_date){
// 		//	$d1 = strtotime(date("Y-m-01 0:0:0"));
// //	$d2 = strtotime(date("Y-m-t 12:59:59"));
// 		$start_date = date("Y-m-d 0:0:0", strtotime($start_date));
// 		$end_date = date("Y-m-d 23:59:59", strtotime($end_date));

// 		// return (object)['start_date' => $start_date, 'end_date' => $end_date];

// 		$this->db
// 			->select('e.candidate_email, e.candidate_name, e.candidate_phone, e.exam_date, e.id, u.fullname as examiner, d.designation')
// 			->from('exam e')
// 			->join('user u', 'u.user_id = e.examiner', 'inner')
// 			->join('designation d', 'd.desg_id = e.desg_id', 'inner')
// 			->where('e.is_active', 1)
// 			->where('e.exam_date >=', $start_date)
// 			->where('e.exam_date <=', $end_date);

// 		// $this->db->query("SELECT * FROM `exam` WHERE `exam_date` BETWEEN '2018-12-25' AND '2018-12-31'");

//         $query = $this->db->get()->result();
//         if($query){
//         	return (object)['status' => true, 'data' => $query];
//         }else{
//         	return (object)['status' => false, 'message' => 'Sorry no data available'];
//         }
// 	}


public function get_interview_list($start_date, $end_date){
	$start_date = strtotime($start_date);
	$end_date   = strtotime($end_date);
	$end_date_str = strtotime(date("d-m-Y 23:59:59", $end_date));
	$ignored_status = array('not interested', 'unqualified', 'declined', 'joined');
	$this->db
		->select('*')
		->from('exam e')
		->where('e.is_active', 1)
		->where('e.exam_date_str >=', $start_date)
		->where('e.exam_date_str <=', $end_date_str)
		->where_not_in('status', $ignored_status)
		->order_by('id','desc');

	// $this->db->query("SELECT * FROM `exam` WHERE `exam_date` BETWEEN '2018-12-25' AND '2018-12-31'");
	
	$query = $this->db->get()->result();
	// return $this->db->last_query();
	if($query){
		return (object)['status' => true, 'data' => $query];
	}else{
		return (object)['status' => false, 'message' => 'Sorry no data available'];
	}
}

// public function get_default_interview_list(){
// 	$ignored_status = array('not interested', 'unqualified', 'declined', 'joined');
// 	$this->db
// 		->select('*')
// 		->from('exam e')
// 		->where('e.is_active', 1)
// 		->where_not_in('status', $ignored_status)
// 		->order_by('id','desc');
// 		// ->limit(10);
// 	$query = $this->db->get()->result();
// 	if($query){
// 		return (object)['status' => true, 'data' => $query];
// 	}else{
// 		return (object)['status' => false, 'message' => 'Sorry no data available'];
// 	}
// }

public function get_default_interview_list(){
	// $ignored_status = array('not interested', 'unqualified', 'declined', 'joined');
	$this->db
		->select('*')
		->from('exam e')
		->where('e.is_active', 1)
		// ->where_not_in('status', $ignored_status)
		->order_by('time','desc');
		// ->limit(10);
	$query = $this->db->get();
	return $query->result_array();
	// if($query){
	// 	return (object)['status' => true, 'data' => $query];
	// }else{
	// 	return (object)['status' => false, 'message' => 'Sorry no data available'];
	// }
}

public function get_candidate_dets($interview_id){
	$this->db
		// ->select('e.candidate_email, e.candidate_name, e.candidate_phone, e.exam_date, e.id, u.fullname as examiner, d.designation')
		->select('*')
		->from('exam e')
		->where('e.is_active', 1)
		->where('e.id', $interview_id);
		
	$query = $this->db->get()->row();
	if($query){
		return (object)['status' => true, 'data' => $query];
	}else{
		return (object)['status' => false, 'message' => 'Something Went Wrong!'];
	}
}

	public function get_creator_interview($creator_id){
		$this->db
			->select('*')
			->from('admin_login')
			->where('id', $creator_id);
		$query = $this->db->get()->row();
		return $query;
	}


	public function get_examiners_details($examiners_id){
		$this->db
			->select('*')
			->from('user')
			->where('user_id', $examiners_id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function getCurrentEmployees(){
		$this->db
			->select('*')
			->from('user')
			->order_by('fullname','asc')
			->where('team_id !=',42);//42=> resigned employee
		$query = $this->db->get()->result_array();
		return $query;
	}

	// public function get_today_interview($date){
	// 	$this->db
	// 		->select('e.*, d.designation, u.fullname as examiner_name, u.email as examiner_email')
	// 		->from('exam e')
	// 		->join('designation d', 'd.desg_id = e.desg_id', 'inner')
	// 		->join('user u', 'u.user_id = e.examiner', 'inner')
	// 		->where('DATE(e.exam_date)', $date)
	// 		->where('e.is_active', 1);

	// 	$query = $this->db->get()->result();
	// 	return $query;
	// }
	public function get_today_interview($start,$end){

		$this->db
			->select('*')
			->from('exam')
			->where('exam.exam_date_str >', $start)
			->where('exam.exam_date_str <', $end)
			->where('exam.is_active', 1);

		$query = $this->db->get()->result();
		return $query;
	}

	public function manage_wfh($user_id, $wfh){
		$updated = $this->db
			->set('no_wfh', $wfh)
			->where('user_id', $user_id)
			->update('user');

		if($updated){
			return (object)['status' => true, 'message' => 'WFH updated'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}

	public function getWeeklyStatus($user_id){
		$this->db->select();
		$this->db->from('weekly_work_hrs');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('wrk_id','desc');
		$this->db->limit(1);
		$query = $this->db->get()->row();
		return $query;
	}
	public function OvertimeReset($wrk_id){
		$data = array(
			"overtime" => 0,
			"extra_hrs" => 0
 ); 
		$updated = $this->db
		->where('wrk_id', $wrk_id)
		->update('weekly_work_hrs',$data);

		if($updated){
			return (object)['status' => true, 'message' => 'Overtime reset successfully!'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}

	}
	//JD Skill updates
	public function getEmployeeSkillSet($user_id,$skill_update_status,$skill_verify_status){
		$this->db->select();
		$this->db->from("jd_skill_updater");
		$this->db->where('skill_update_status',$skill_update_status);
		$this->db->where('skill_verify_status',$skill_verify_status);
		$this->db->where('user_id',$user_id);
		$this->db->order_by('skill_id','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return false;
		}
	}
	public function removeEmployeeSkill($skill_id){
		$this->db->where('skill_id',$skill_id);
		$result = $this->db->delete('jd_skill_updater');
		if($result){
			return array("status"=>true,"message"=>"skill removed successfully.");
		}else{
			return array("status"=>false,"message"=>"Please try again!");
		}
	}
	public function changeSkillStatus($skill_id,$skill_update_status,$skill_verify_status){
		$this->db->where('skill_id',$skill_id);
		$this->db->set('skill_update_status',$skill_update_status);
		$this->db->set('skill_verify_status',$skill_verify_status);
		$result = $this->db->update('jd_skill_updater');
		if($result){
			return array("status"=>true,"message"=>"skill updated successfully.");
		}else{
			return array("status"=>false,"message"=>"Please try again!");
		}
	}
	public function addNewSkill($data){
		$result=$this->db->insert('jd_skill_updater',$data);
		$insert_id = $this->db->insert_id();
		if($result){
			return array("status"=>true,"message"=>"skill added successfully.","skill_id"=>$insert_id,"skill_name"=>$data['skill_name']);
		}else{
			return array("status"=>false,"message"=>"Please try again!");
		}
	}

	public function get_certificates(){
		$this->db
			->select()
			->from('certifications_list')
			->where('is_active', 1);
		$query = $this->db->get()->result();
		return $query;
	}

	public function cancel_interview($id){
		$deleted = $this->db
			->set('is_active', 0)
			->where('id', $id)
			->update('exam');

		if($deleted){
			return (object)['status' => true, 'message' => 'Interview has been cancelled!'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured. Please try again later'];
		}
	}

	public function create_notice($notice){
		$insert_a['notice'] =  $notice;
		$this->db->insert('notice', $insert_a);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_notice_table($data){
		$inserted = $this->db->insert_batch('notice_board', $data);
		$insert_id = $this->db->insert_id();

		if($insert_id){
			return (object)['status' => true, 'message' => 'Notice board created'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}

	public function get_users_with_teamids($team_a){
		$this->db
			->select()
			->from('user')
			->where_in('team_id', $team_a);

		$query = $this->db->get()->result();
		return $query;

	}

	public function get_users_with_depIds($deps_a){
		$this->db
			->select()
			->from('user')
			->where_in('dep_id', $deps_a);

		$query = $this->db->get()->result();
		return $query;
	}

	public function notice_board_list(){
		/**
		 * retrieving notice board which creacted for all users
		 */
		$this->db
			->select('nb.*, n.notice, u.fullname, t.name as team_name, d.dep_name, DATE_FORMAT(n.created, "%d-%m-%Y") as notice_date')
			->from('notice_board nb')
			->join('notice n', 'n.id = nb.notice_id')
			->join('user u', 'u.user_id = nb.user_id')
			->join('team t', 't.team_id = nb.team_id', 'left')
			->join('department d', 'd.dep_id = nb.deps_id', 'left')
			->where('nb.type', 'all')
			->where('nb.is_active', 1)
			->group_by('nb.notice_id');

		$all = $this->db->get()->result();
		
		/**
		 * retrieving notice board which created with team
		 */
		$this->db
			->select('nb.*, n.notice, u.fullname, t.name as team_name, d.dep_name, DATE_FORMAT(n.created, "%d-%m-%Y") as notice_date')
			->from('notice_board nb')
			->join('notice n', 'n.id = nb.notice_id')
			->join('user u', 'u.user_id = nb.user_id')
			->join('team t', 't.team_id = nb.team_id', 'left')
			->join('department d', 'd.dep_id = nb.deps_id', 'left')
			->where('nb.type', 'team')
			->where('nb.is_active', 1)
			->group_by('nb.team_id, nb.notice_id');

		$team = $this->db->get()->result();

		/**
		 * retrieving notice board which created with deepartment
		 */
		$this->db
			->select('nb.*, n.notice, u.fullname, t.name as team_name, d.dep_name, DATE_FORMAT(n.created, "%d-%m-%Y") as notice_date')
			->from('notice_board nb')
			->join('notice n', 'n.id = nb.notice_id')
			->join('user u', 'u.user_id = nb.user_id')
			->join('team t', 't.team_id = nb.team_id', 'left')
			->join('department d', 'd.dep_id = nb.deps_id', 'left')
			->where('nb.type', 'department')
			->where('nb.is_active', 1)
			->group_by('nb.deps_id, nb.notice_id');

		$department = $this->db->get()->result();

		/**
		 * retrieving notice board with individual users
		 */
		$this->db
			->select('nb.*, n.notice, u.fullname, t.name as team_name, d.dep_name, DATE_FORMAT(n.created, "%d-%m-%Y") as notice_date')
			->from('notice_board nb')
			->join('notice n', 'n.id = nb.notice_id')
			->join('user u', 'u.user_id = nb.user_id')
			->join('team t', 't.team_id = nb.team_id', 'left')
			->join('department d', 'd.dep_id = nb.deps_id', 'left')
			->where('nb.type', 'individual')
			->where('nb.is_active', 1);

		$individual = $this->db->get()->result();

		$result = array_merge($all, $team, $department, $individual);
		return $result;
		
	}

	/**
	 * function used to delete notice board with type and notice_id
	 * @param  [type] $notice_id [description]
	 * @param  [type] $type      [description]
	 * @param  [type] $id        [description]
	 * @return [type]            [description]
	 */
	public function delete_notice($notice_id, $type, $id){
		
		switch ($type) {

			case 'team':
				$this->db
					->select('team_id')
					->from('notice_board')
					->where('id', $id)
					->where('type', $type);

				$query = $this->db->get()->row();
				$team_id = $query->team_id;

				$deleted = $this->db
							->set('is_active', 0)
							->where('team_id', $team_id)
							->where('notice_id', $notice_id)
							->update('notice_board');

				break;

			case 'department':

				$this->db
					->select('deps_id')
					->from('notice_board')
					->where('id', $id)
					->where('type', $type);

				$query = $this->db->get()->row();
				$deps_id = $query->deps_id;

				$deleted = $this->db
							->set('is_active', 0)
							->where('deps_id', $deps_id)
							->where('notice_id', $notice_id)
							->update('notice_board');

				break;

			case 'all':

				$deleted = $this->db
							->set('is_active', 0)
							->where('notice_id', $notice_id)
							->where('type', $type)
							->update('notice_board');

				break;


			case 'individual':

				$deleted = $this->db
							->set('is_active', 0)
							->where('notice_id', $notice_id)
							->where('type', $type)
							->where('id', $id)
							->update('notice_board');

				break;

		}

		if($deleted){
			return (object)['status' => true, 'message' => 'Notice deleted'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured, please try again later'];
		}

	}

	public function get_notice_board_details($notice_id, $type){

		$this->db
			->select('nb.*, n.notice')
			->from('notice_board nb')
			->join('notice n', 'n.id = nb.notice_id', 'inner')
			->where('nb.is_active', 1)
			->where('nb.type', $type)
			->where('nb.notice_id', $notice_id);

		$query = $this->db->get()->result();
		return $query;
	}

	public function update_notice_post($notice, $notice_id){
		$updated = $this->db
					->set('notice', $notice)
					->where('id', $notice_id)
					->update('notice');
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	public function delete_notice_bord_data($notice_id){
		$deleted = $this->db
			->where('notice_id', $notice_id)
			->delete('notice_board');

		if($deleted){
			return true;
		}else{
			return false;
		}
	}

	public function create_new_designation($designation){
		$this->db->insert('designation', $designation);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return (object)['status' => true, 'message' => 'New designation created'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}

	public function update_designation($designation, $desig_id){
		$updated = $this->db
			->set('designation', $designation)
			->where('desg_id', $desig_id)
			->update('designation');

		if($updated){
			return (object)['status' => true, 'message' => 'Designation updated'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}


	public function workReportGraph($user_id){
		$this->db->select('work_report,punchin,sla_violation');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('punchin','asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function update_core_employee($user_id, $core_status){
		$updated = $this->db
			->set('core', $core_status)
			->where('user_id', $user_id)
			->update('user');

		if($updated){
			if($core_status == 1){
				$this->manage_wfh($user_id, 0);
			}else{
				$this->manage_wfh($user_id, 1);
			}
			return (object)['status' => true, 'message' => 'Core employee updated'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}

	//Task Assignments start========

	public function getTaskList($admin_id){
			$this->db->select('assignments.*,user.fullname as assignee');
			$this->db->from('assignments');
			$this->db->join('user',"user.user_id=assignments.assign_to");
			$this->db->where('creator_id',$admin_id);
			$this->db->order_by('assignments.status','asc');
			$this->db->order_by('assignments.asgnmnt_id','desc');
			$query = $this->db->get()->result();
			return $query;
	}
	public function getTasklistOthers(){
			$this->db->select('assignments.*,user.fullname,(SELECT fullname from user WHERE user_id=creator_id) as assigner');
			$this->db->from('assignments');
			$this->db->join('user',"user.user_id=assignments.assign_to");
			$this->db->where('creator_id !=',1);
			$this->db->order_by('assignments.asgnmnt_id','desc');
			$this->db->order_by('assignments.status','asc');
			$query = $this->db->get()->result();
			return $query;
	}

	public function getTeamData(){
		$this->db->select('user_id,fullname');
		$this->db->from('user');
		$this->db->where('team_id !=',42);//42=> resigned employee
		$this->db->order_by('fullname','asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function addNewAssignment($data){
		$this->db->insert('assignments', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function deleteTask($asgnmnt_id){
		$this->db->where('asgnmnt_id', $asgnmnt_id);
		$query=$this->db->delete('assignments'); 
		return $query;
	}

	public function editdeadline($asgnmnt_id,$newdate){
		$this->db->set('date',$newdate);
		$this->db->where('asgnmnt_id', $asgnmnt_id);
		$query=$this->db->update('assignments'); 
		return $query;
	}


	public function getFullName($user_id){
		
		$this->db->select('fullname');
		$this->db->from('user');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get()->row();
		return $query;
	}
	public function getEmpEmail($user_id){
		
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get()->row()->email;
		return $query;
	}

	public function getTask($asgnmnt_id){
		$this->db->select("assignments.*,user.fullname as name,DATE_FORMAT(time_stamp,'%d-%M-%Y %h:%i %p, %a') as realDate");
		$this->db->from('assignments');	
		$this->db->join('user','user.user_id=assignments.assign_to','left');
		$this->db->where('asgnmnt_id',$asgnmnt_id);
		$query = $this->db->get()->row();
		return $query;
	}
	public function updateTaskComment($asgnmnt_id,$serializeComment){
		
		$this->db->where("asgnmnt_id",$asgnmnt_id);
		$response = $this->db->update('assignments', $serializeComment);
		return $response;
	}

// for cron select all task without onetime
	public function getAllTasks(){
		$this->db->select('*');
		$this->db->from('assignments');
		$this->db->where('status',0);
		$query = $this->db->get()->result();
		return $query;
	}
	public function changeTaskStatus($asgnmnt_id){
		$status		     =	["status"=>0];
		$this->db->where("asgnmnt_id",$asgnmnt_id);
		$update_status	=	$this->db->update("assignments",$status);
		return($update_status);
	}
	//Task Assignments ends =====

	public function updateMandatory($workId,$fix_pend_minutes){

		$data = array(
			"pending_hrs" => $fix_pend_minutes
 			); 
		$updated = $this->db
		->where('wrk_id', $workId)
		->update('weekly_work_hrs',$data);
		return $updated;

	}

	public function getDesignation($workId){
		$this->db->select("user.desgn_id");
		$this->db->from('weekly_work_hrs');	
		$this->db->join('user','user.user_id=weekly_work_hrs.user_id');
		$this->db->where('wrk_id',$workId);
		$query = $this->db->get()->row()->desgn_id;
		return $query;
	}

	public function getPendingHours($workId){
		$this->db->select("pending_hrs");
		$this->db->from('weekly_work_hrs');	
		$this->db->where('wrk_id',$workId);
		$query = $this->db->get()->row()->pending_hrs;
		return $query;
	}

}
