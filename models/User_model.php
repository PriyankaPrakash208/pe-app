<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {



	Public function login($data)
	{		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $data['email']);
		$this->db->where('password', MD5($data['password']));
		$query = $this->db->get();
        return $query->result();
	}
		
	Public function getuser($id)
	{		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
//		print_r($query);
        return $query->result();
	}

	Public function getall($id){
		$this->db->select('*');
		$this->db->from('user ');
		$this->db->join('department ', 'user.dep_id=department.dep_id');
		$this->db->join('performance ', 'performance.user_id=user.user_id');
		$this->db->join('team', 'team.team_id=user.team_id');
		$this->db->where('user.user_id',$id);
		$this->db->order_by("performance_id", "desc");
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query->row();
	}

	public function getAdminDetails($id){
		$this->db
			->select()
			->from('admin_login')
			->where('id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
/*	per-history of pe with Month picker
	Public function history($month_id,$uid){//		
		$a 		 = strtotime("01-".$month_id);	
		$nor 	 = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1   = date('d-m-Y',$a);
		// $time2   = date($lastday."-".$month_id);
		$time2   = date($lastday."-".$month_id." 11:59 p\m");

		$this->db->select('*');
		$this->db->from('user ');
		$this->db->join('department ', 'user.dep_id=department.dep_id');
		$this->db->join('performance ', 'performance.user_id=user.user_id');
		$this->db->join('performance_history ', 'performance_history.performance_id=performance.performance_id');
	
		$this->db->where('user.user_id',$uid);
		//Extra codes
		// $this->db->where('performance.date >=', strtotime($time1));
		// $this->db->where('performance.date <=', strtotime($time2));
		// $this->db->order_by('performance.date','desc');
		// $this->db->limit(1);
		//Close extra codes
		$this->db->where('performance_history.time >=', strtotime($time1));
		$this->db->where('performance_history.time <=', strtotime($time2));
		$this->db->where('status',1);
		$query1 = $this->db->get(); 	
		$res['pe_dats'] = $query1->result_array();
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('user_id',$uid);
		$this->db->where('comments.time >=', strtotime($time1));
		$this->db->where('comments.time <=', strtotime($time2));
		$query2 = $this->db->get();
		$res['comments'] = $query2->result_array();
		
		return $res; 
		
		// if($query->num_rows() > 0){
		// return $query->result_array();
		// }
		// else{
		// $stat[0] = 0;
		// return($stat);
		// }
		// return $this->db->last_query();

	}*/
	
Public function history_ids($month_id,$uid){
		$a 		 = strtotime("01-".$month_id);	
		$nor 	 = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1   = date('d-m-Y',$a);
//		$time2   = date($lastday."-".$month_id);
		$time2   = date($lastday."-".$month_id." 11:59 p\m");

		$this->db->select('performance_id');
		$this->db->from('performance');
//		$this->db->join('performance_history ', 'performance_history.performance_id=performance.performance_id');
	
		$this->db->where('performance.user_id',$uid);
//		$this->db->where('performance_history.time >=', strtotime($time1));
//		$this->db->where('performance_history.time <=', strtotime($time2));
		$this->db->where('performance.date >=', strtotime($time1));
		$this->db->where('performance.date <=', strtotime($time2));
		$this->db->order_by('performance_id','desc');
//		$this->db->where('status',1);
		$query1 = $this->db->get(); 	
		$res = $query1->result_array();
		
//		$this->db->select('*');
//		$this->db->from('comments');
//		$this->db->where('user_id',$uid);
//		$this->db->where('comments.time >=', strtotime($time1));
//		$this->db->where('comments.time <=', strtotime($time2));
//		$query2 = $this->db->get();
//		$res['comments'] = $query2->result_array();
		return $res; 

//		return $this->db->last_query();

	}
	
	Public function history($per_id,$month_id){
		$a 		 = strtotime("01-".$month_id);	
		$nor 	 = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1   = date('d-m-Y',$a);
//		$time2   = date($lastday."-".$month_id);
		$time2   = date($lastday."-".$month_id." 11:59 p\m");
		
//		print_r($time2);
		$this->db->select('*');
		$this->db->from('performance_history');
		$this->db->where('performance_id',$per_id);
		$this->db->where('time >=', strtotime($time1));
		$this->db->where('time <=', strtotime($time2));
		$this->db->order_by('ph_id','desc');
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
		
	}
	
	Public function Getting_comments($session_id,$month_id){
	   $a 		 = strtotime("01-".$month_id);	
		$nor 	 = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1   = date('d-m-Y',$a);
//		$time2   = date($lastday."-".$month_id);
		$time2   = date($lastday."-".$month_id." 11:59 p\m");
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('user_id',$session_id);
		$this->db->where('comments.time >=', strtotime($time1));
		$this->db->where('comments.time <=', strtotime($time2));
		$this->db->order_by('com_id','desc');
		$query2 = $this->db->get();
		return $query2->result_array();
	}
	//	per-history of ce with Month picker
	
	Public function edit_model($data,$id){

		$this->db->where('user_id',$id);
		$query1 = $this->db->update('user',$data);
		if($query1 == 1){
			$this->db->select('*');
			$this->db->from('user u');
			$this->db->where('user_id',$id);
			$query = $this->db->get(); 
			return $query->result();
		}
		else
		{
			$status = "Please try again";
			return $status;
		}
		
		
	}
	
	Public function fetch_current_pe($id,$session_id){
		$month_id = date('m-Y');
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('performance_history');
//		$this->db->where('performance_id',$id);
		$this->db->where('status',1);
		$this->db->where('time >=', strtotime($time1));
		$this->db->where('time <=', strtotime($time2));
		$this->db->order_by('performance_id','desc');
		$query1 = $this->db->get(); 	
		$res['pe_dats'] = $query1->result_array();
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('user_id',$session_id);
	/*	$this->db->where('comments.time >=', strtotime($time1));
		$this->db->where('comments.time <=', strtotime($time2));*/
		$query2 = $this->db->get();
		$res['comments'] = $query2->result_array();
//		
		return $res;
		
	
//		return $query->result_array();
	}
//	Fetch history no need of this
	Public function getallss($id){
		$this->db->select('*');
		$this->db->from('user ');
		$this->db->join('department ', 'user.dep_id=department.dep_id');
		$this->db->where('user.user_id',$id);
		$query = $this->db->get(); 
		return $query->result();
	}

	Public function get_designation($user_id){
		$this->db->select('designation');
		$this->db->from('designation');
		$this->db->join('user','desgn_id=desg_id');
		$this->db->where('user.user_id',$user_id);
		
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
	}
	
//   Forgot password 
	Public function forgot_pass($email){
		$this->db->select('*');
		$this->db->from('user');
//		$this->db->join('department ', 'user.dep_id=department.dep_id');
		$this->db->where('email',$email);
		$query = $this->db->get(); 
//		return($query);
		return $query->result();
	}
	
	//   Forgot password 
	Public function update_pass($email,$data){
		$this->db->where('email',$email);
		$query1 = $this->db->update('user',$data);
	}
	
	Public function sumofc1_latest($id){
		$d1 = strtotime(date("Y-m-01 0:0:0"));
		$d2 = strtotime(date("Y-m-31 12:59:59"));
		$this->db->select_sum('point');
		$this->db->from('performance_history');
 		$this->db->where('time >=', $d1);
		$this->db->where('time <=', $d2);
		$this->db->where('cri_type',1); 
		$this->db->where('performance_id',$id); 
		$query = $this->db->get(); 
//		return($id);
		return $query->result_array();
//		return $this->db->last_query();
	}
	Public function sumofc2_latest($id){
		$d1 = strtotime(date("Y-m-01 0:0:0"));
		$d2 = strtotime(date("Y-m-31 12:59:59"));
		$this->db->select_sum('point');
		$this->db->from('performance_history');
 		$this->db->where('time >=', $d1);
		$this->db->where('time <=', $d2);
		$this->db->where('cri_type',2); 
		$this->db->where('performance_id',$id); 
		$query = $this->db->get(); 
		return $query->result_array();
//		return $this->db->last_query();
	}
	
	Public function sumofc3_latest($id){
		$d1 = strtotime(date("Y-m-01 0:0:0"));
		$d2 = strtotime(date("Y-m-31 12:59:59"));
		$this->db->select_sum('point');
		$this->db->from('performance_history');
 		$this->db->where('time >=', $d1);
		$this->db->where('time <=', $d2);
		$this->db->where('cri_type',3); 
		$this->db->where('performance_id',$id); 
		$query = $this->db->get(); 
		return $query->result_array();
//		return $this->db->last_query();
	}
	
	Public function total_pe($id){
		//$a = ' SUM(cquality) + SUM(treplies) +SUM(pviolation) ';
		//$this->db->select($a .'as total', FALSE);
		$this->db->select('SUM(preview + creview + tquality + cquality + pviolation + cypviolation + slaviolation + wreport + warning + suspension + awards + ChallengeOfTheDay + trialpperf + servicecancellation)  as total_pe', FALSE);
		$this->db->from('performance');
		$this->db->where('performance_id', $id);
		$query = $this->db->get(); 
//		return($id);
		return $query->result_array();
//		return $this->db->last_query();
	}

	Public function total_ie($id){
		//$a = ' SUM(cquality) + SUM(treplies) +SUM(pviolation) ';
		//$this->db->select($a .'as total', FALSE);
		$this->db->select('SUM(goldenresponse + treplies + blogpost + training + interviews + certifications + seminars)  as total_ie', FALSE);
		$this->db->from('performance');
		$this->db->where('performance_id', $id);
		$query = $this->db->get(); 
//		return($id);
		return $query->result_array();
//		return $this->db->last_query();
	}
	
	Public function total_ce($id){
		$this->db->select('SUM(codeof + ssmedia + extracurricular)  as total_ce', FALSE);
		$this->db->from('performance');
		$this->db->where('performance_id', $id);
		$query = $this->db->get(); 
//		return($id);
		return $query->result_array();
//		return $this->db->last_query();
	}
//	Public function sum_hisory_pe($month_id,$id){
//		$a = strtotime("01-".$month_id);
////		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
////		$time2 = date($lastday.'-m-Y',$a);
//
//		$this->db->select_sum('*');
//		$this->db->from('user ');
//		$this->db->join('department ', 'user.dep_id=department.dep_id');
//		$this->db->join('performance ', 'performance.user_id=user.user_id');
//		$this->db->join('performance_history ', 'performance_history.performance_id=performance.performance_id');
//	
//		$this->db->where('user.user_id',$id);
//		$this->db->where('performance_history.time >=', strtotime($time1));
//		
//		$this->db->where('status',1);
//	}


//Attendance module  stats	
	Public function check_monthExistOrNot($user_id,$month){
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('user_id',$user_id);
		$this->db->where('at_month',$month);
		$query=$this->db->get(); 
		return $query->result_array();
		
		
	}
	
	Public function ins_attendance($data){
		$this->db->insert('attendance',$data);
		return $this->db->insert_id();
	}
	Public function update_attendance($data,$at_id){
		$this->db->where('at_id',$at_id);	
		$this->db->update('attendance',$data);
	}
	Public function get_at_data($user_id,$at_id){
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('at_month',$at_id);		
		$this->db->where('user_id',$user_id);
		$query=$this->db->get(); 
		return $query->result_array();
	}
	Public function getallAttendance($user_id){
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('user_id',$user_id);				
		$this->db->where('at_month',date('mY'));				
		$this->db->limit(1);	
		$this->db->order_by("at_id", "desc");		
		$query=$this->db->get(); 
		return $query->row();
	}
//	Attendance module  ends

//	Request module  starts
	Public function insert_into_request($request){
		$this->db->insert('request',$request);
	}
	Public function get_all_request($user_id,$getLeaveResetDate){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where('user_id',$user_id);	
		$this->db->where('lv_date>=',$getLeaveResetDate);
		$this->db->order_by("lv_id", "desc");	
		$query=$this->db->get(); 
		return $query->result_array();
		//return $this->db->last_query();
	}
	Public function Noofcasualleaves($session_id,$getLeaveResetDate){			
			$this->db->select('sum(lv_no) as total');
			$this->db->from('request');
			$this->db->where('user_id',$session_id);	
			$this->db->where('lv_type',1);
			$this->db->where('lv_date>=',$getLeaveResetDate);
			$this->db->where('lv_status',1);					
			$query=$this->db->get(); 
			return $query->row();
			//return $this->db->last_query();
			
		}
		Public function Noofsickleaves($session_id,$getLeaveResetDate){
			$this->db->select('sum(lv_no) as total');
			$this->db->from('request');
			$this->db->where('user_id',$session_id);	
			$this->db->where('lv_type',2);
			$this->db->where('lv_date>=',$getLeaveResetDate);
			$this->db->where('lv_status',1);					
			$query=$this->db->get(); 
			return $query->row();
			
		}
		/*Public function NoofWFH($session_id){
			$this->db->select('sum(lv_no) as total');
			$this->db->from('request');
			$this->db->where('user_id',$session_id);	
			$this->db->where('lv_type',3);
			$this->db->where('lv_status',1);					
			$query=$this->db->get(); 
			return $query->row();
			
		}*/

		public function NoofWFH($session_id,$getLeaveResetDate){
			//$dates = $this->get_year_start_end();
			$this->db
				->select('count(att_id) as total')
				->from('attendance_log')
				->where('user_id', $session_id)
				->where('work_loc', 2)
				->where('punchin >=', $getLeaveResetDate);
			$query = $this->db->get()->row();
			return $query;
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
		// public function get_year_start_end(){
		// 	$year = date("Y");
		// 	$first_date = date('Y-m-1', strtotime($year.'-1-05'));
		// 	$last_date = date('Y-m-t', strtotime($year.'-12-01'));
		// 	$first_date = strtotime($first_date);
		// 	$last_date = strtotime($last_date);
		// 	return (object)['start_date' => $first_date, 'end_date' => $last_date];
		// }

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

		public function NooSwap($session_id,$getLeaveResetDate){
			// return (object)['total' => $getLeaveResetDate];
			$this->db->select('sum(lv_no) as total');
			$this->db->from('request');
			$this->db->where('user_id',$session_id);	
			$this->db->where('lv_type',5);		
			$this->db->where('lv_date>=',$getLeaveResetDate);		
			$this->db->where('lv_status',1);				
			$query=$this->db->get(); 
			return $query->row();
		}
//	Request module  ends
//certifications
public function get_certificates(){
	$this->db
		->select()
		->from('certifications_list')
		->where('is_active', 1);
	$query = $this->db->get()->result();
	return $query;
}
//	Activity module  ends
	Public function checklist($user_id){
		$this->db->select('*');
		$this->db->from('activities');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('activity_id','asc');
//		$this->db->where('status',0);
		$query = $this->db->get();
		return $query->result_array();
		
	}
	Public function get_Daily_Acts($user_id,$dep_id){
		//$d1 = strtotime(date("Y-m-01 0:0:0"));
		//$d2 = strtotime(date("Y-m-31 12:59:59"));
		$this->db->select('*');
		$this->db->from('daily_activities');
		//$this->db->join('monthly_data', 'daily_activities.daily_act_id = monthly_data.daily_activity_ids');
		//$this->db->where('monthly_data.user_id',$user_id);
		$this->db->where('dep_id',$dep_id);
		//$this->db->where('monthly_data.activity_date >=',$d1);
		//$this->db->where('monthly_data.activity_date <=',$d2);
		$this->db->order_by('daily_act_id','ASC');
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
	}
		Public function get_ids_daily($user_id,$dep_id){
		$this->db->select('daily_act_id');
		$this->db->from('daily_activities');
		$this->db->where('dep_id',$dep_id);
		$query = $this->db->get();
		return $query->result_array();
		
	}
	//Start Insert new month's daily ids into monthly_data
	Public function Ins_Dailyact_MonthlyData($data){
		$query = $this->db->insert('monthly_data',$data);
		return $this->db->last_query();
	}
	//Close Insert new month's daily ids into monthly_data
	//Start Fetching daily datas
	Public function Fetch_monthly_datas($user_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
		$day1 = date("01-".'m-Y');
		
		$this->db->select('*');
		$this->db->from('monthly_data');
		$this->db->join('daily_activities','daily_activities.daily_act_id=monthly_data.daily_activity_ids');
		$this->db->where('user_id',$user_id);
		$this->db->where('monthly_data.activity_date >=', strtotime($day1));
		$query = $this->db->get();
//		return $query->result_array();
		return $this->db->last_query(); 
	}
	Public function Fetch_weekly_activity($dep_id){
		$this->db->select('*');
		$this->db->from('weekly_activity');
		$this->db->where('dep_id',$dep_id);		
		$query = $this->db->get();
		return $query->result_array();
	}
//Close fetching daily datas 
	Public function alter_dailyStatus($m_act_id){ 
		$this->db->select('activity_array');
		$this->db->from('monthly_data');
		$this->db->where('monthly_data.monthly_data_id',$m_act_id);
		$query = $this->db->get();
		return $query->result_array();
	}
//	Close altering
	
	Public function insertImgData($img){
		$query = $this->db->insert('desk_images',$img);
		return $query;
	}
/*	Public function update_dailyStatus($ser_dat,$monthly_data_id){
		$this->db->where('monthly_data_id',$monthly_data_id);		
		$q = $this->db->update('monthly_data',$ser_dat);
		return($q);
		//return $this->db->last_query();
		
	}*/
	Public function checkWeekStatus($user_id,$lastsun,$wa_id){
		
		$this->db->select('*');		
		$this->db->from('weekly_data');		
		$this->db->where('wd_date >=',$lastsun);			
		$this->db->where('weekly_id',$wa_id);			
		$this->db->where('user_id',$user_id);			
		$query = $this->db->get();
		return $query->result_array();
	}
	Public function updateAssiStatus($Assi_activity){
		echo $this->db->insert('activities',$Assi_activity);
	}
	Public function check_weekrow_in_data($wactvity,$lastsun){
		$this->db->select('*');
		$this->db->from('weekly_data');
		$this->db->where('wd_date >=',$lastsun);
		$this->db->where('weekly_id',$wactvity['weekly_id']);
		$this->db->where('user_id',$wactvity['user_id']);
		$query = $this->db->get();
		return $query->result_array();
	}
	Public function update_w_status($weekData,$week_id){
		$this->db->where('wd_id',$week_id);
		$query = $this->db->update('weekly_data',$weekData);
		if($query==1){
			return(1);
		}
		else{
			return(0);
		}
//		return $this->db->last_query();
	}
	Public function ins_week_row($W_Dat){
		$query = $this->db->insert('weekly_data',$W_Dat);
		if($query==1){
			return(1);
		}
		else{
			return(0);
		}
	}
	Public function updateWeeklyStatus($wactvity){
		echo $this->db->insert('weekly_data',$wactvity);
	}
	Public function Update_Tickets_done($tickets){		
		$query = $this->db->insert('tickets',$tickets);
		return $query;
	}
	Public function Update_Tickets_resolved($tickets){		
		$query = $this->db->insert('tickets',$tickets);
		return $query;
	}
	Public function Update_Tickets_pending($tickets){	
		$query = $this->db->insert('tickets',$tickets);
		return $query;
	}
	
	Public function Add_workreport($data){
		
		$this->db->insert('workreport',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	Public function Delete_workreport($workreport_id){
		$this->db->where('workreport_id',$workreport_id);
		$query = $this->db->delete('workreport');
		return $query;
	}
	
	Public function Get_work_report($user_id,$day){
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("workreport_id", "desc");
//		$this->db->where('time LIKE '.$day.'%'); 
		$this->db->like('time',$day);
		$this->db->from('workreport');
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
		
		
	}
	
	Public function viewAll_work_report($user_id){
		$this->db->select('*');
		$this->db->from('workreport');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("workreport_id", "desc");
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	Public function alterStatus($user_id,$act_id,$reply_date){
		$this->db->where('user_id',$user_id);
		$this->db->where('activity_id',$act_id);
		$datas['work_status'] = 1 ;
		$datas['status'] = 1;
		$datas['reply_date'] = strtotime($reply_date);
		$this->db->update('activities',$datas);
//		return $this->db->last_query();
	} 
//	Activity module  ends
	
	Public function Compare_date_work($c_date,$user_id){
//		$day = strtotime($date);
		$this->db->select('*');
		$this->db->from('workreport');
		$this->db->where('user_id',$user_id);
		$this->db->where('date',$c_date);
		$this->db->order_by("workreport_id", "desc");
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
		
	}
	
	Public function Insert_task_list($data){
		$query = $this->db->insert('tasks_list',$data);
		return $query;
//		return $this->db-last_query();
		
	}
	
	Public function fetch_monthly_activities($dep_id){
		$this->db->select('*');
		$this->db->from('monthly_activity');
		$this->db->where('dep_id',$dep_id);
		$query1 = $this->db->get();
		return $query1->result_array();
//		return $this->db->last_query();

	}
	
	Public function check_monthly_datas($user_id,$mid,$date){
		$d1 = strtotime(date("Y-m-01 0:0:0"));
		$d2 = strtotime(date("Y-m-t 12:59:59"));
		$this->db->select('*');
		$this->db->from('repeat_monthly_data');
		$this->db->where('user_id',$user_id);
		$this->db->where('monthly_id',$mid);
		$this->db->where('md_date >=',$d1);
		$this->db->where('md_date <=',$d2);
//		$this->db->where('md_date>=',$date);
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result();
	}
	
	Public function checkrow($mid,$user_id){
		$d1 = strtotime(date("Y-m-01 0:0:0"));
		$d2 = strtotime(date("Y-m-t 12:59:59"));
		$this->db->select('*');
		$this->db->from('repeat_monthly_data');
		$this->db->where('monthly_id',$mid);
		$this->db->where('user_id',$user_id);
		$this->db->where('md_date >=',$d1);
		$this->db->where('md_date <=',$d2);
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	
	Public function update_m_status($data,$md_id){
		$this->db->where('md_id',$md_id);
		$this->db->where('user_id',$data['user_id']);
		$q = $this->db->update('repeat_monthly_data',$data);
		return($q);
//		return $this->db->last_query();
	}
	Public function insert_m_status($data){
		$q = $this->db->insert('repeat_monthly_data',$data);
		return($q);
	}
	Public function cheching_row_att($uid,$test_month){
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('user_id',$uid);
		$this->db->where('at_month',$test_month);
		$q = $this->db->get();
		return $q->result_array();
		
	}
	
	Public function insert_new_row_att($data){
		$query = $this->db->insert('attendance',$data);
		return $query;
	}
	
	Public function get_all_users_id(){
		$this->db->select('user_id');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//Mailing section
	
	Public function getmail_ids($team_id){
		$this->db->select('mail_ids');
		$this->db->from('team');
		$this->db->where('team_id',$team_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//Start daily work report for mailing
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
	//Close daily work report for mailing to team managers
	//Get daily checklist reports
	Public function full_daily_checklist($id,$month_id){
//		$a = strtotime("01-".$month_id);
//		$lastday = date('t',strtotime($month_id));		
//		$time1 = date('d-m-Y',$a);
//		$time2 = date($lastday.'-m-Y',$a);
//		$month_id = "19-01-2018 00:00:00";
//		$a = strtotime($month_id."00:00:00");
		
		$a = strtotime("01-".$month_id);	
		$nor = date('Y-m-d',$a);
		$lastday = date('t',strtotime($nor));
		$time1 = date('d-m-Y',$a);
		$time2 = date($lastday."-".$month_id);
		
		$this->db->select('*');
		$this->db->from('monthly_data');
		$this->db->join('daily_activities','daily_activities.daily_act_id=monthly_data.daily_activity_ids');
		$this->db->where('user_id',$id);
		$this->db->where('daily_activities.field_type',0);
//		$this->db->where('monthly_data.activity_date',strtotime($month_id));
		$this->db->where('monthly_data.activity_date >=', strtotime($time1));
		$this->db->where('monthly_data.activity_date <=', strtotime($time2));
		$this->db->order_by('monthly_data.monthly_data_id','desc');
		$query = $this->db->get();		
		return $query->result_array();
//		return $this->db->last_query();
	}
	//Close daily checklist
	
		// get daily work report
	Public function get_emp_work_report($id,$mon_4Wrpt,$att_id){
		$this->db->select('*');
		$this->db->from('workreport');		
		$this->db->where('user_id',$id);
		$this->db->where('att_id',$att_id);
		$this->db->where('date', strtotime($mon_4Wrpt));
//		$this->db->order_by('date','desc');
		$this->db->order_by('workreport_id','desc');
		$query = $this->db->get();
		return $query->result_array();
		
	}
	// get daily work report
	//Start weekly full reports
	Public function full_weekly_checklist($id,$month_id){
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
		$this->db->from('weekly_data');
		$this->db->join('weekly_activity','weekly_activity.wa_id=weekly_data.weekly_id');
		$this->db->where('user_id',$id);
		$this->db->where('weekly_activity.wa_field_type',0);
		$this->db->where('weekly_data.wd_date >=', strtotime($time1));
		$this->db->where('weekly_data.wd_date <=', strtotime($time2));
		$query = $this->db->get();		
		return $query->result_array();
	}
	
	Public function full_weekly_workreport($id,$month_id){
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
		$this->db->from('weekly_data');
		$this->db->join('weekly_activity','weekly_activity.wa_id=weekly_data.weekly_id');
		$this->db->where('user_id',$id);
		$this->db->where('weekly_activity.wa_field_type >=',1);
		$this->db->where('weekly_data.wd_date >=', strtotime($time1));
		$this->db->where('weekly_data.wd_date <=', strtotime($time2));
		$query = $this->db->get();		
		return $query->result_array();
	}
	//Ends weekly reports
	//Ends monthly reports
	Public function full_monthly_checklist($id,$month_id){
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
		$this->db->from('repeat_monthly_data');
		$this->db->join('monthly_activity','monthly_activity.ma_id=repeat_monthly_data.monthly_id');
		$this->db->where('user_id',$id);
		$this->db->where('monthly_activity.ma_field_type',0);
		$this->db->where('repeat_monthly_data.md_date >=', strtotime($time1));
		$this->db->where('repeat_monthly_data.md_date <=', strtotime($time2));
		$query = $this->db->get();		
		return $query->result_array();
	}
	//Close monthly reports
	
	Public function full_monthly_workreport($id,$month_id){
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
		$this->db->from('repeat_monthly_data');
		$this->db->join('monthly_activity','monthly_activity.ma_id=repeat_monthly_data.monthly_id');
		$this->db->where('user_id',$id);
		$this->db->where('monthly_activity.ma_field_type >=',1);
		$this->db->where('repeat_monthly_data.md_date >=', strtotime($time1));
		$this->db->where('repeat_monthly_data.md_date <=', strtotime($time2));
		$query = $this->db->get();		
		return $query->result_array();
	}
	//Close Monthly
	//Attendance
	Public function get_attendance($uid,$month_id){
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('user_id',$uid);
		$this->db->where('at_month',$month_id);
		$query = $this->db->get();
//		return $this->db->last_query();
		return $query->result_array();
	}
	//Close attendance
	// Start mailing to team managers
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
		$this->db->order_by('weekly_data.wd_date','desc');
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
	
	//Close mailing
	
//Test code for 45 hours working
		//Getting hrs wrkd form db
	Public function get_hrs_wrkd($user_id,$lastsun,$today){
		$this->db->select('weekly_work_hrs.*,user.desgn_id');
		$this->db->from('weekly_work_hrs');
		$this->db->join('user','user.user_id=weekly_work_hrs.user_id');
		$this->db->where('weekly_work_hrs.user_id',$user_id);
		$this->db->where('date >=', $lastsun);
		//$this->db->where('date <=', $today);
		$this->db->order_by('wrk_id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
	}
	//Getting hrs wrkd form db
	//Getting fixed numerics from settings table
	Public function get_calcs(){
		$this->db->select('*');
		$this->db->from('settings_hrs');
		$q = $this->db->get();
		return $q->result_array();
	}
	//Getting fixed numerics from settings table
	//Insert working hours
	Public function update_wrk_hrs($user_id,$data,$w_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('wrk_id',$w_id);
		$this->db->update('weekly_work_hrs',$data);
		return $this->db->last_query();
	}
	
	Public function insert_wrk_hrs($data){
		$this->db->insert('weekly_work_hrs',$data);
	}
	
	//Insert working hours
	//For displaying dashboard
	Public function get_pending_working($lastsun,$today_time,$user_id){
		$this->db->select('*');
		$this->db->from('weekly_work_hrs');
		$this->db->where('user_id', $user_id);
		$this->db->where('date >=', $lastsun);
		//$this->db->where('date <=', $today_time); //cmntd renjith
		$this->db->order_by('wrk_id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
	}
	//Close working and pending hour for displaying
	//cron codes
	Public function get_repeating_weeks($lastsun,$today_time){
		$this->db->select('*');
		$this->db->from('weekly_work_hrs');
		$this->db->where('date >=', $lastsun);
		$this->db->where('date <=', $today_time);
		$query = $this->db->get();
		return $query->result_array();
//		return $this->db->last_query();
	}
	
	Public function create_new_row($rep_data){
		$q = $this->db->insert('weekly_work_hrs',$rep_data);
		return($q);
	}
	//Close cron codes
	
//Test code for 45 hours working

//notification

	Public function Insert_notifn($data){
		
		$status=$this->db->insert('linkedin_notify',$data);
		return($status);
		
	}
	
	Public function check_notifstatus($userid){
		
		$this->db->select('*');
		$this->db->from('linkedin_notify');
		$this->db->where('not_user', $userid);
		$this->db->where('not_status', 1);
		$query = $this->db->get();
		return $query->result_array();
		
	}
		//----------------------------New punchin code-----------------------------------
	Public function Ins_punchindatas($data){
		// print_r($data);
		// exit();
		$this->db->insert('attendance_log',$data);
		$insert_id = $this->db->insert_id();
		if(($data['work_loc'] == 2) && ($insert_id != "")){
			$insert_a['p_id'] = $insert_id;
			$insert_a['user_id'] = $data['user_id'];
			$this->insert_wfh_break($insert_a);
		}
		return $insert_id;
	}

	public function insert_wfh_break($data){
		$this->db->insert('wfh_break', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return true;
		}else{
			return false;
		}
	}
	
	Public function Get_att_log($user_id){
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->where('att_status',0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	Public function insert_brk($user_id,$at_id,$data){
		$this->db->where('user_id',$user_id);
		$this->db->where('att_status',0);
		//$this->db->set('break',false);
		$this->db->update('attendance_log',$data);
		
//		return $this->db->last_query();
	}
//Inserting punchout time and ip
	Public function Ins_punchout($data,$user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('att_status',0); 
		$this->db->update('attendance_log',$data);
//		return $this->db->last_query();
	}
	
	Public function Get_All_att_log($user_id){
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->where('att_status',0);
		$this->db->limit(1);	
		$this->db->order_by("att_id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	Public function Get_All_att_logs($user_id){
		$this->db->select('*');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->limit(1);	
		$this->db->order_by("att_id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//Save total Break 
	Public function Update_break($total_diff,$at_id,$user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('att_id',$at_id);
		$this->db->update('attendance_log',$total_diff);
	}
	
	//Close new punchin code
	//Insert daily act work report for first time
	Public function Insert_wrk_rpt($data,$user_id,$att_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('att_id',$att_id);
		$this->db->update('attendance_log',$data);
	}
	
		Public function getallattLog($user_id,$crntMonth){
		$this->db->select('at.*, wl.loc_title, wb.total_time');
		$this->db->from('attendance_log at');
		$this->db->join('work_loc wl', 'wl.id = at.work_loc', 'inner');
		$this->db->join('wfh_break wb', 'wb.user_id = at.user_id and wb.p_id = at.att_id', 'left');
		$this->db->where('at.user_id',$user_id);
		$this->db->where("at.punchin_date LIKE '%$crntMonth'");
		$this->db->order_by("at.att_id", "desc");
		$query=$this->db->get(); 
		return $query->result_array();
}
	Public function get_dailyStatus($user_id){ 
		$this->db->select('work_report, att_id,sla_violation');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->where('att_status',0);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_dailyStatus_with_date($user_id, $start_date, $end_date){
		$this->db->select('work_report, att_id,sla_violation');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->where('punchin >=',$start_date);
		$this->db->where('punchin <=',$end_date);
		$query = $this->db->get()->row();
		// return $this->db->last_query();
		return $query;
			
	}
	
	 
	Public function update_dailyStatus($ser_dat,$user_id){
		$this->db->where('user_id',$user_id);		
		$this->db->where('att_status',0);		
		$q = $this->db->update('attendance_log',$ser_dat);
		return($q);
	}
	
	Public function Get_att_bfr_punchout($user_id){
		$this->db->select('att_id');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);		
		$this->db->where('att_status',0);
		$this->db->order_by('att_id','desc'); 
		$this->db->limit(1);
//		$this->db->where('punchin_date',date('d-m-Y'));
		$query = $this->db->get();
		return $query->row();
	}
	
	Public function NoCasualLeave($user_id,$new_joining_date){
		$this->db->select_sum('lv_no');
		$this->db->from('request');
		$this->db->where('user_id',$user_id);
		$this->db->where('lv_type',1);
		$this->db->where('lv_status',1);
		$this->db->where('lv_date>=',$new_joining_date);
		$query = $this->db->get();
		return $query->row(); 
	}
	Public function NoMedicalLeave($user_id,$new_joining_date){
		$this->db->select_sum('lv_no');
		$this->db->from('request');
		$this->db->where('user_id',$user_id);
		$this->db->where('lv_type',2);
		$this->db->where('lv_status',1);
		$this->db->where('lv_date>=',$new_joining_date);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function NoHolidaysLeave($user_id,$new_joining_date){
		$this->db->select_sum('lv_no');
		$this->db->from('request');
		$this->db->where('user_id',$user_id);
		$this->db->where('lv_type',7);
		$this->db->where('lv_status',1);
		$this->db->where('lv_date>=',$new_joining_date);
		$query = $this->db->get();
		return $query->row(); 	
	}

	public function getCurrentTeam($user_id){

		$this->db
			->select('u.team_id, t.have_phpbb, t.phpbbUsername, t.phpbbPassword')
			->from('user u')
			->join('team t', 't.team_id = u.team_id', 'inner')
			->where('u.user_id', $user_id);

		$query = $this->db->get()->row();

		return $query;
	}

	public function getTeamMemberCount($teamId){
		$this->db
			->select('count(team_id) as mem_count')
			->from('user')
			->where('team_id', $teamId);

		$query = $this->db->get()->row();
		return $query->mem_count;
	}

	public function getPunchedLoc($userid){
		$this->db
			->select('*')
			->from('attendance_log')
			->where('user_id', $userid)
			->order_by('att_id', 'desc');

		$query = $this->db->get()->row();
		return $query;
	}

	public function getAllL1($start_date, $end_date){
		// return ['start_date' => $start_date, 'end_date' => $end_date];
		$this->db
			->select('user.*, d.designation, t.name as team_name')
			->from('user')
			->join('designation d', 'd.desg_id = user.desgn_id', 'inner')
			->join('team t', 't.team_id = user.team_id', 'inner')
			->join('promotion_notification pn', 'pn.user_id = user.user_id', 'left')
			->where('pn.user_id', null)
			->where('desgn_id', 1)
			->where('date_of_join >=', $start_date)
			->where('date_of_join <=', $end_date);

		$query = $this->db->get()->result();
		return $query;
	}

	public function update_promotion_status($user_id, $full_name){
		$insert_a = ['user_id' => $user_id, 'fullname' => $full_name];
		$this->db->insert('promotion_notification', $insert_a);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return true;
		}else{
			return false;
		}
	}

	public  function retrieve_un_breaked_users($start_date, $end_date){
		// return ['start_date' => $start_date, 'end_date' => $end_date];
		$this->db
			->select('al.*, u.fullname, d.designation, t.name as team_name')
			->from('attendance_log al')
			->join('user u', 'u.user_id = al.user_id', 'inner')
			->join('team t', 't.team_id = u.team_id', 'inner')
			->join('designation d', 'd.desg_id = u.desgn_id', 'inner')
			->where('al.punchin >= ', $start_date)
			->where('al.punchin <= ', $end_date)
			->where('al.punchout != ""')
			->where('al.total_break < 30')
			->order_by('t.team_id', 'asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_wfh_cl_count($user_id, $callback=""){
		$this->db
			->select('wfh_count')
			->from('wfh_cl_manage')
			->where('user_id', $user_id)
			->where('is_active', 1);

		$query = $this->db->get()->row();
		if($callback == ""){
			if(!$query){
				return 1;
			}else{
				return $query->wfh_count;
			}
		}else{
			return $query;
		}
	}

	public function update_wfh_cl($user_id){
		$check_wfh = $this->get_wfh_cl_count($user_id, 'model');
		if(!$check_wfh){
			$insert_a = ['user_id' => $user_id, 'wfh_count' => 2];
			$this->db->insert('wfh_cl_manage', $insert_a);
			$insert_id = $this->db->insert_id();
			if($insert_id){
				return true;
			}else{
				return false;
			}
		}else{
			$wfh_count = $check_wfh->wfh_count;
			$wfh_count = intval($wfh_count);
			$wfh_count++;
			$updated = $this->db
				->set('wfh_count', $wfh_count)
				->where('user_id', $user_id)
				->update('wfh_cl_manage');

			if($updated){
				return true;
			}else{
				return false;
			}
		}
	}

	public function punchin_with_leave($data){
		$this->db->insert('request', $data);
		$insert_id = $this->db->insert_id();

		if($insert_id){
			return true;
		}else{
			return false;
		}
	}

	public function get_last_wfh_break($user_id){
		$this->db
			->select()
			->from('wfh_break')
			->where('user_id', $user_id)
			->order_by('id', 'desc');

		$query = $this->db->get()->row();
		return $query;
	}
	
	public function update_wfh_break($where_cond, $update_a){
		$updated = $this->db
					->where($where_cond)
					->update('wfh_break', $update_a);

		if($updated){
			return true;
		}else{
			return false;
		}
	}

	public function update_ticket_details($ticket_details_a){

		$this->db->insert_batch('ticket_details', $ticket_details_a);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return true;
		}else{
			return false;
		}
	}

	public function get_ticket_details($user_id, $att_id, $date, $from_flag=""){
		// if($from_flag == ""){
		// 	$this->db
		// 		->select()
		// 		->from('ticket_details')
		// 		->where('DATE(created)', $date)
		// 		->where('user_id', $user_id);
		// 	$query = $this->db->get()->result();
		// }else{
			$this->db
				->select()
				->from('ticket_details')
				->where('att_id', $att_id)
				->where('user_id', $user_id);
			$query = $this->db->get()->result();
		//}
		
		if($query){
			return (object)['status' => true, 'data' => $query];
		}else{
			return (object)['status' => false, 'message' => 'Sorry no records available'];
		}
	}

	public function getSkillSets($user_id){
		$this->db->select();
		$this->db->from("jd_skill_updater");
		$this->db->where("user_id",$user_id);
		$this->db->order_by('skill_id', 'desc');
		$query = $this->db->get()->result_array();
		if($query){
			return (object)['status' => true, 'data' => $query];
		}else{
			return (object)['status' => false, 'message' => 'Sorry no records available!'];
		}
	}
	public function skillStatusUpdater($skill_id){
		$updated = $this->db
		->set('skill_update_status',1)
		->where('skill_id',$skill_id)
		->update('jd_skill_updater');
		if($updated){
			return (object)['status' => true, 'message' => "Successfully Updated!"];
		}else{
			return (object)['status' => false, 'message' => 'Sorry, Please try again.'];
		}
	}
	public function getEmployeeInfo($skill_id){
		$this->db->select();
		$this->db->from("jd_skill_updater");
		$this->db->join("user","user.user_id=jd_skill_updater.user_id");
		$this->db->where("skill_id",$skill_id);
		$this->db->order_by('skill_id', 'desc');
		$query = $this->db->get()->row();
		return $query;
	}

	public function get_submited_ticket_details($user_id, $att_id){
		$this->db
			->select()
			->from('ticket_details')
			->where('att_id', $att_id)
			->where('user_id', $user_id)
			->order_by('id', 'desc');
		$query = $this->db->get()->result();
		return $query;
	}
	//Dashboard graph 
	public function UserWorkAndBreakTime($user_id){
		$this->db->select();
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('punchin','asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_notice_board($user_id){
		$this->db
			->select('nb.*, n.notice')
			->from('notice_board nb')
			->join('notice n', 'n.id = nb.notice_id', 'inner')
			->where('nb.user_id', $user_id)
			->where('nb.is_active', 1);

		$query = $this->db->get()->result();
		return $query;
	}
	public function scoreAdjustmentGraph($user_id){
		$this->db->select('performance_history.*');
		$this->db->from('performance_history');
		$this->db->join('performance','performance.performance_id=performance_history.performance_id');
		$this->db->where('performance.user_id',$user_id);
		$this->db->order_by('performance_history.time','asc');
		$query = $this->db->get()->result();
		return $query;
	}
	public function workReportGraph($user_id){
		$this->db->select('work_report,punchin,sla_violation');
		$this->db->from('attendance_log');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('punchin','asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_inteview_with_userid($user_id){
		$date_time_stamp = strtotime('now');
		$date = date('Y-m-d', $date_time_stamp);
		// return $date;
		$this->db
			->select()
			->from('exam')
			->where('examiner', $user_id)
			->where('DATE(exam_date)', $date);

		$query = $this->db->get()->result();
		// return $this->db->last_query();
		return $query;
	}

	public function get_response_with_ticket_id($ticket_id){
		$this->db
			->select('')
			->from('ticket_details')
			->where('id', $ticket_id);
		$query = $this->db->get()->row();
		if($query){
			return (object)['status' => true, 'data' => $query];
		}else{
			return (object)['status' => false, 'message' => 'No ticekt response available'];
		}
	}

	public function update_ticekt_response($response, $ticket_id){
		$updated = $this->db
			->set('response', $response)
			->where('id', $ticket_id)
			->update('ticket_details');

		if($updated){
			return (object)['status' => true, 'message' => 'Ticket response updated'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}
	public function getDobDetails(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('team_id !=',42);
		$this->db->order_by('fullname','asc');
		$query = $this->db->get();
		return $query->result(); 	
	}

		//assignments 

		public function ifTaskCreator($user_id){
			$this->db->select('user_id');
			$this->db->from('user');
			$this->db->where_not_in('team_id',array(22,21,0));
			$this->db->where('user_id',$user_id);
			$query = $this->db->get()->result();
			return $query;
		}
	
		public function getTeamData($user_id){
			$this->db->select('user_id,fullname');
			$this->db->from('user');
			$this->db->where_not_in('user_id',array(430,478,509,434,441,462));
			//$this->db->where('user_id !=',$user_id);
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
	
		public function getTaskList($user_id){
			$this->db->select("assignments.*,user.fullname,DATE_FORMAT(time_stamp,'%d-%M-%Y %h:%i %p, %a') as realDate");
			$this->db->from('assignments');		
			$this->db->join('user','user.user_id=assignments.assign_to','left');
			$this->db->where('creator_id',$user_id);
			$this->db->order_by('asgnmnt_id','desc');
			$query = $this->db->get()->result();
			return $query;
		}
	
		public function getOwnTaskList($user_id){
			$this->db->select("assignments.*,user.fullname,DATE_FORMAT(time_stamp,'%d-%M-%Y %h:%i %p, %a') as realDate");
			$this->db->from('assignments');		
			$this->db->join('user','user.user_id=assignments.creator_id','left');
			$this->db->where('assign_to',$user_id);
			$this->db->order_by('asgnmnt_id','desc');
			$this->db->order_by('status','asc');
			$query = $this->db->get()->result();
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
	
		public function deleteTask($asgnmnt_id){
			$this->db->where('asgnmnt_id', $asgnmnt_id);
			$query=$this->db->delete('assignments'); 
			return $query;
		}
	
	//assignments 
}
