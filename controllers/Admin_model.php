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
			performance.preview+performance.creview+performance.tquality+performance.cquality+performance.treplies+performance.pviolation+performance.cypviolation+performance.slaviolation+performance.wreport+performance.skypeactivity+performance.warning+performance.suspension+performance.blogpost+performance.awards+performance.goldenresponse+performance.ChallengeOfTheDay+performance.interviews+performance.certifications as PE, performance.seminars+performance.seminars+performance.training+performance.codeof+performance.ssmedia +performance.extracurricular as CE FROM `user` JOIN `designation` ON `user`.`desgn_id`=`designation`.`desg_id` JOIN `department` ON `department`.`dep_id`=`user`.`dep_id` JOIN `team` ON `team`.`team_id`=`user`.`team_id` LEFT JOIN `performance` ON `performance`.`performance_id` = (select max(performance.performance_id) from performance where performance.user_id=user.user_id) ORDER BY user.'.$field.' '.$sort); 
		
	       return $query->result_array();
		
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
	
	Public function deleteemp($empid){
		$this->db->where('user_id',$empid);
		$this->db->delete('user');
		
		$this->db->where('user_id',$empid);
		$this->db->delete('performance');
	}
	
	Public function getEmployee($empid){
		$this->db->select('user.*');
		$this->db->select('performance.*');
		$this->db->select('performance.preview+performance.creview+performance.tquality+performance.cquality+performance.treplies+performance.pviolation+performance.slaviolation+performance.cypviolation+performance.wreport+performance.skypeactivity+performance.warning+performance.suspension+performance.blogpost+performance.awards+performance.goldenresponse+performance.ChallengeOfTheDay+performance.interviews+performance.certifications as PE', FALSE);
		$this->db->select('performance.seminars+performance.seminars+performance.training+performance.codeof+performance.ssmedia + performance.extracurricular as CE', FALSE);
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
		$this->db->select('*');
		$this->db->from('performance_history'); 
		$this->db->where('performance_id',$id);
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
	Public function updateadminsettings($data){
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
}
