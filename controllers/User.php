<?php

class User extends CI_Controller{

	private $ticket_details_flag = true;
	 function __construct() {
	 	parent::__construct();
	 	if(empty($this->session->userdata('user_id'))){
	 		redirect('');
	 	}
	 }

	

	Public function login(){
		$session_id = $this->session->userdata('user_id');
		//$this->load->view('maintenance.php');
		$this->load->view('login');
	}

	Public function tasks(){ 
		$session_id = $this->session->userdata('user_id');
		$this->load->model('Tasks_model');	
		$re = $this->Tasks_model->getcompleted($session_id);
		$data['comp'] = $re;
		$data['pend'] = $this->Tasks_model->getpending($session_id);
		$this->load->view('test/task',$data);
	}

	function clean($content) {
	//   $string = str_replace(' ', ' ', $content); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-_#!&@.$%=+():\n]/', ' ', $content); // Removes special chars. 
	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}

//function convert to real time()
	function GetRealTime($sec){
		$minte=round($sec/60);
		$min=($minte%60);
		$hrs=(($minte-$min)/60);
		$min=abs($min);
		if($min<10){
			$min="0".$min;
		}
		$realtime=" ".($hrs)." : ".$min."";
		return $realtime;
	}

	private function get_breaks($break){
		$unser = unserialize($break);
		$count  = count($unser);
		$timing_a = [];
		foreach ($unser as $row) {
			if(array_key_exists('on', $row) && array_key_exists('off', $row)){
				$break_time = date('h:i:s A', $row['on'])." to ".date('h:i:s A', $row['off']);
				array_push($timing_a, $break_time);

				/*$total_diff = $row['on'] - $row['off'];
				$brk_rem 		      = $total_diff % 60; 
				$brk_hrs              = $total_diff1 - $brk_rem;
				$tot_brk_hrs          = $brk_hrs/60;
				$total_break_hours    = round($tot_brk_hrs)."Hrs ".round($brk_rem)." min";
				print_r('expression');*/
			}
		}

		return $timing_a;
	}

	/** Displaying dashboard with all datas */

	Public function dashboard(){
//		if($this->session->userdata('user_id')){
			$session_id = $this->session->userdata('user_id');
			$this->load->model('User_model');
//			$result = $this->User_model->getuser($session_id);
			$result = array();
			$re = $this->User_model->getall($session_id);
		
			/** 
			 * current month sum
			 */
			$sumc1 = $this->User_model->sumofc1_latest($re->performance_id);
			$sumc2 = $this->User_model->sumofc2_latest($re->performance_id);
			$sumc3 = $this->User_model->sumofc3_latest($re->performance_id);

			$sumtotal_pe  = $this->User_model->total_pe($re->performance_id); 
			$sumtotal_ce  = $this->User_model->total_ce($re->performance_id); 
			$sumtotal_ie  = $this->User_model->total_ie($re->performance_id); 
			/**
			 * close current month sum
			 */	
			$result = $re;
			$result->sum1 = $sumc1;
			$result->sum2 = $sumc2;

			$result->sum3 = $sumtotal_pe;
			$result->sum4 = $sumtotal_ce;

			$result->sum5 = $sumc3;
			$result->sum6 = $sumtotal_ie;
			/**
			 * current month attendance status
			 */

		$All_att_log  			  = $this->User_model->Get_All_att_log($session_id);
		if(count($All_att_log)>0){
			$unseri_brk   		  = unserialize($All_att_log[0]['break']);
			$result->All_att_log  = $this->User_model->Get_All_att_log($session_id);
			$result->unseril_brk  = unserialize($All_att_log[0]['break']);
			/**
			 * Break Calculations starts here
			 */

				$total_diff  			 = 0;
				$att_break 				 = $this->User_model->Get_All_att_log($session_id);

				if(count($att_break)>0 && !empty($att_break[0]['break'])){

						$break_details           = unserialize($att_break[0]['break']);
						$count_break             = count($break_details);
						if($count_break>0){
							foreach($break_details as $row){

							if(array_key_exists('off',$row) && array_key_exists('on',$row)){
							$diff               = $row['off'] - $row['on'];
							$total_diff         = $total_diff + $diff;
							}
						}

				$total_diff			= $total_diff/60;
				$brk_rem 		    = $total_diff%60; 
				$brk_hrs            = $total_diff  - $brk_rem;
				$tot_brk_hrs        = $brk_hrs/60;
				$result->total_new_break = "<b>Total Break Taken : </b>".round($tot_brk_hrs)."hrs ".round($brk_rem)." min";
						}
						/**
						 * Close break calculations
						 */
				}	
			}
//::::::::::::::::::::::::::::::::::::Start::Get punching log ::::::::::::::::::::::::::::::::::::::::::::::::::::
			$crntMonth=date('m-Y');
			$crntMonthLastday=date("d", strtotime('last day of this month'));
			$tday=date("j", strtotime('now'));
	/**
	 * Create monthly array
	 */

		for($i=$tday;$i>0;$i--){
			$daily_logs[$i]=array();
		}

		$att_log=$this->User_model->getallattLog($session_id,$crntMonth);
		$shiftcount=0;
		foreach($att_log as $att_row){

			$cday=date('j',$att_row['punchin']);
			@$daily_log['loc_title'] = $att_row['loc_title'];
			@$daily_log['work_loc'] = $att_row['work_loc'];
			@$daily_log['punchin_time']=date('d MY  h:i a',$att_row['punchin']);
			@$daily_log['punchout_time']=date('d MY  h:i a',$att_row['punchout']) ?: "Haven't Punched Out";
			@$daily_log['punchin_ip']=$att_row['punchin_ip'] ?: "--";
			@$daily_log['punchout_ip']=$att_row['punchout_ip'] ?: "-- ";
			if($att_row['punchout'] && $att_row['punchout_ip']==""){
				$daily_log['punchout_ip']		= "Force Punchout";
			}
			@$daily_log['worked_time']=$this->GetRealTime($att_row['worked_time']);
			@$daily_log['total_break']=$this->GetRealTime($att_row['total_break']);
			@$daily_log['break_times']= $this->get_breaks($att_row['break']);
			@$daily_log['idle_time']=$this->GetRealTime($att_row['total_time']);
			$daily_logs[$cday][]=$daily_log;

			if($att_row['worked_time'] >10800){
				$shiftcount=$shiftcount+1;
			}
		}
		$result->daily_log=$daily_logs;
/**
 * :::::::::::::::::::::End::Get punching log :::::::::::::::::::::::::::::::::::::
 */

 /**
  * .....Start working hours and pending hours display....
  */
	
		$lastsun 			= strtotime('last Monday');
		$today_time 		= strtotime('now');
		$hours_rows 		= $this->User_model->get_pending_working($lastsun,$today_time,$session_id);	
		if(count($hours_rows) > 0){
			$wh_minute = ($hours_rows[0]['hrs_worked']);
			$wh_hr     = $wh_minute; 
			$wh_minute=round($wh_minute);
			$totalMinutes=abs($wh_minute%60);
			$totalHrs=($wh_minute-$totalMinutes)/60;
			$result->wrking_hrs=$this->GetRealTimeSecond($hours_rows[0]['hrs_worked']);
			$PendingHrs=round($hours_rows[0]['pending_hrs']);
			$ph_minute = $PendingHrs%60;
			$ph_hr     = ($PendingHrs - $ph_minute)/60;
			$result->pending_hrs =$this->GetRealTimeSecond($hours_rows[0]['pending_hrs']);
			$result->extra_hrs =$this->GetRealTimeSecond($hours_rows[0]['extra_hrs']);
			$result->overtime =$this->GetRealTimeSecond($hours_rows[0]['overtime']);
			$result->flexi_hrs =$this->GetRealTimeSecond($hours_rows[0]['flexi_hrs']);
		}else{
			$res                						 = $this->User_model->get_calcs();
			$result->wrking_hrs 				 = "00:00";
			$result->overtime 					 = "00:00";
			$result->extra_hrs  				 = "00:00";
			$result->flexi_hrs  					= "00:00";

			if($result->desgn_id==1){			
				$result->pending_hrs				 = $this->GetRealTimeSecond(178200);
			}else{
				$result->pending_hrs				 =$this->GetRealTimeSecond(148500);
			}
		}
            $desn  				 						=  $this->User_model->get_designation($session_id);
			$result->designn	 					=  $desn[0]['designation'];
		    $result->countshift 					= $shiftcount;
			@$result->casual->total				=0;
			@$result->sick->total				=0;
			
			//Section for leave
				$date_of_join				=	$result->date_of_join;
				$getLeaveResetDate		=$this->getLeaveResetDate($date_of_join);
			//Section for leave

			$result->casual							=$this->User_model->Noofcasualleaves($session_id,$getLeaveResetDate);
			$result->sick								=$this->User_model->Noofsickleaves($session_id,$getLeaveResetDate);
			$result->wfh								=$this->User_model->NoofWFH($session_id,$getLeaveResetDate);
			//remove future 
			$result->wfh->total						=$result->wfh->total+$this->User_model->NoofWFHfromRequest($session_id,$getLeaveResetDate)->total;
			$result->holiday = $this->User_model->NoHolidaysLeave($session_id, $getLeaveResetDate);
			//remove future 
			$result->lop								=$this->User_model->NoofLOP($session_id,$getLeaveResetDate);	
			$result->swap_count								=$this->User_model->NooSwap($session_id,$getLeaveResetDate);	
			$user_id 										= $this->session->userdata('user_id');
			$teamDetail 								= $this->User_model->getCurrentTeam($user_id);
			$result->temRoomMembersCount = $this->User_model->getTeamMemberCount($teamDetail->team_id);
			$result->currentTeamId 					= $teamDetail;
			$result->wfh_cl_count = $this->User_model->get_wfh_cl_count($user_id, 'count');
			//certifications 
			$result->certifications_a=$this->User_model->get_certificates();
			//notification
			$checkstatus=$this->User_model->check_notifstatus($session_id);	

			$result->notice_board = $this->User_model->get_notice_board($session_id);
			$result->todays_interviews = $this->User_model->get_inteview_with_userid($session_id);


			if(count($checkstatus)>0){
					$result->notif_flag=1;
				}else{  
					$result->notif_flag=0;
				}
			// $this->dd($result);
/**
 * Get pending and completed task
 */
			$this->load->model('Tasks_model');
			$result->comp = $this->Tasks_model->getcompleted($session_id);
			$result->pend = $this->Tasks_model->getpending($session_id);
			$this->load->view('user/dashboard.php',$result);
	} 

	function getLeaveResetDate($date_of_join){
		$year_previous			  =	  date('Y')-1;
		if($date_of_join>1515954600){// 1515954600-- Monday, January 15, 2018 12:00:00 AM 
			//$from_date				=	
			$joining_month		=	date('m',$date_of_join); 
			$joining_day		  =   date('d',$date_of_join); 
			$new_joining_date =   strtotime("$joining_day-$joining_month-$year_previous");
		}else{
			$new_joining_date =   strtotime("15-01-$year_previous");
		}
		$monthAndDay = date('md',$new_joining_date);
		$today = date('md');
		$_joining_month		=	date('m',$new_joining_date); 
		$_joining_day		  =   date('d',$new_joining_date); 
		if($today<$monthAndDay){ // compare date and adding year 
			$fromYear = date('Y')-1;
		}else{
			$fromYear = date('Y');
		}
		$fromDate = strtotime("$_joining_day-$_joining_month-$fromYear");
		return $fromDate;
	}

	function GetRealTimeSecond($sec){
		$minte=round($sec/60);
		$min=($minte%60); 
		$hrs=(($minte-$min)/60);
		$min = abs($min);
		if($hrs == 0){
			$hrs='00';
		}
		// if($min == 0){
		// 	$min = '00';
		// }
		if($min<10){
			$min = '0'.$min;
		}
		$realtime= $hrs.":".$min;
		return $realtime;
	}

Public function logout(){
		if($this->session->userdata('user_id')){
			$this->session->unset_userdata('user_id');
//			$this->session->unset_userdata('at_id');
			redirect('');
		}
	} 

Public function month_picker(){
			$session_id  = $this->session->userdata('user_id');
			$this->load->model('User_model');
			$history     = array();
			$re          = $this->User_model->getall($session_id);
//			fetching current month pe details
			$month_id    = $this->input->post('month_pick');
		    if($month_id ==''){
				$month_id =date('m-Y');
			}
		    $m           = strtotime("01-".$month_id);
			$history_ids = $this->User_model->history_ids($month_id,$re->user_id);
		    $cri_pe='';
			$cri_ce='';
			$sm_pe = 0;
			$sm_ce = 0;
			$month_name  =  date('F Y',$m);
            if(count($history_ids)>0){
//				$test2 = strtotime('first day of this month 00:00:00');
				foreach($history_ids as $hids){
				$pe_datas = $this->User_model->history($hids['performance_id'],$month_id);

        if(count($pe_datas)>0){

			foreach($pe_datas as $row){

				if($row['cri_type']==1){

					if($row['point']>=0){
						$cri_pe .= "<tr style='color:#000;'>";
						$cri_pe .= "<td>";
						$cri_pe .= $row['criteria'];
						$cri_pe .= "</td>";
						$cri_pe .= "<td><span class='custom_green'>+  ";
						$cri_pe .= $row['point'];
						$cri_pe .= "</span></td>";
						$cri_pe .= "<td>";
						$cri_pe .= date('d-m-Y',$row['time']);
						$cri_pe .= "</td></tr></div>";
						//	test
						$sm_pe = $sm_pe +$row['point'];
						//	close test
					}else{
						$cri_pe .= "<tr style='color:#000;'>";
						$cri_pe .= "<td>";
						$cri_pe .= $row['criteria'];
						$cri_pe .= "</td>";
						$cri_pe .= "<td><span class='custom_red'>";
						$cri_pe .= $row['point'];
						$cri_pe .= "</span></td>";
						$cri_pe .= "<td>";
						$cri_pe .= date('d-m-Y',$row['time']);
						$cri_pe .= "</td></tr></div>";
						$sm_pe = $sm_pe +$row['point'];
					}
				}elseif($row['cri_type']==2){

					if($row['point']>=0){
						$cri_ce .= "<tr style='color:#000;'>";
						$cri_ce .= "<td>";
						$cri_ce .= $row['criteria'];
						$cri_ce .= "</td>";
						$cri_ce .= "<td><span class='custom_green'>+  ";
						$cri_ce .= $row['point'];
						$cri_ce .= "</span></td>";
						$cri_ce .= "<td>";
						$cri_ce .= date('d-m-Y',$row['time']);
						$cri_ce .= "</td></tr></div>";
						$sm_ce   = $sm_ce +$row['point'];
					}else{
						$cri_ce .= "<tr style='color:#000;'>";
						$cri_ce .= "<td>";
						$cri_ce .= $row['criteria'];
						$cri_ce .= "</td>";
						$cri_ce .= "<td><span class='custom_red'>";
						$cri_ce .= $row['point'];
						$cri_ce .= "</span></td>";
						$cri_ce .= "<td>";
						$cri_ce .= date('d-m-Y',$row['time']);
						$cri_ce .= "</td></tr></div>";
						$sm_ce   = $sm_ce +$row['point'];
					}
				}
			}
	}
}

				

				

//	if(count($pe_datas) > 0){

			$tab1 = '';

		if(count($pe_datas)>0){

			$tab1 = "<div>

		<div class='row'>

			 <div class='col-md-6'>

						<h5 class='m--font-primary'>Performance Evaluation Of ".$month_name."</h5>

			 </div>

			 <div class='col-md-6' style='text-align:right'><span class='m-badge m-badge--danger m-badge--wide' style='font-size:15px;font-weight: 600;'>TOTAL SCORE : ".$sm_pe."</span></div>



			</div>   

										 

										 

		<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'>

		    <thead style='background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;'>

					<th>Criteria</th>

					<th>Points</th>

					<th>Date</th>

				</thead>";

		}		

			

		echo $tab1;		

		echo $cri_pe;

			$tabclose1 = '';	

				if(count($pe_datas)>0){

		$tabclose1 = "</tr></table>";

				}

				else{

					echo("<div style='color:#fff;border:1px solid #fff;padding:40px;background:#6c869d;text-align:center;'><b>Sorry...No records found</b></div>") ;

				}

				echo $tabclose1;

//		echo "Total : ".$sm_pe;

		

		//ce table

			$tab2 = '' ;

		if(count($pe_datas)>0){

			$tab2 = "<br/><br/><br/><div>

			<div class='row'>

 										 <div class='col-md-6'>

													<h5 class='m--font-primary'>Integrity Evaluation Of ".$month_name."</h5>

										 </div>

										 <div class='col-md-6' style='text-align:right'><span class='m-badge m-badge--danger m-badge--wide' style='font-size:15px;font-weight: 600;'>TOTAL SCORE : ".$sm_ce."</span></div>

  

										</div>

			<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'>

				<thead style='background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;'>

					

					

						<th>Criteria</th>

						<th>Points</th>

						<th>Date</th>

						

					</thead>";

		}

				

		echo $tab2;

		echo $cri_ce;

		$tabclose2 = '';	

				if(count($pe_datas)>0){

		 $tabclose2 = "</tr></table>";

				}

				

				

		echo $tabclose2;

				

//	}

}

		else{

			

				echo("<div style='color:#fff;border:1px solid #fff;padding:40px;background:#6c869d;text-align:center;'><b>Sorry...No records found</b></div>") ;

		}

			

		 

		//Comments display with month picker

		$comments = $this->User_model->Getting_comments($session_id,$month_id);

		  if(count($comments>0)){

				echo "<br/><br/>

				<div class'row'>

				 <div class='col-md-6'>

					<h5 class='m--font-primary' >Comments </h5>

				 </div> 

				</div>

			<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'>

				<thead style='background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;'>

					

					

						<th>Sl No :</th>

						<th>Comments</th>

						<th>Date</th>

						

					</thead>";

			   $sl =1;

			   foreach($comments as $coms){

				   echo "<tr><td>".$sl."</td>";

				   echo "<td>".$coms['comments']."</td>";

				   echo "<td>".date('d-m-Y',$coms['time'])."</td></tr>";

				   $sl++;

			   }
		echo "</table>";
		   }else{
			 echo("<div style='color:red;border:1px solid red;padding:40px;background:#d83c3c40;text-align:center;'><b>Sorry...No comments found</b></div>") ;
		 }
	//Comments display with mnth picker
	}  

	Public function edit(){

		$id = $this->session->userdata('user_id');
		$password = $this->input->post('password');
		$cert_list = $this->input->post('cert_list');
		/*if($cert_list){
			$cert_list = implode(",",$cert_list);
		}*/
		if($password == ''){
			$data = array(
			'fullname' => $this->input->post('name'),
			'dob' => strtotime($this->input->post('dob')),
			'phone' => $this->input->post('phone'),
			'bloodgroup' => $this->input->post('bloodgroup'),
			'cert_list' => $cert_list
		);
		}else{
			$data = array(
			'fullname' => $this->input->post('name'),
			'dob' 		 => strtotime($this->input->post('dob')),
			'phone' 	=> $this->input->post('phone'),
			'bloodgroup' => $this->input->post('bloodgroup'),
			'password' => md5($password),
			'cert_list'  => $cert_list
		);
		}

		// $this->dd($data);
		$this->load->model('User_model');
		$res = $this->User_model->edit_model($data,$id);
		$res[0]->dob = date('d M Y',$res[0]->dob);
		echo json_encode($res[0]);
	}
	Public function getdate(){
		$this->load->model('User_model');
		$sum = array();
		$sum['c1'] = $this->User_model->sumofc1_latest();
		$sum['c2'] = $this->User_model->sumofc2_latest();
		$this->load->view('user/test.php',$sum);
//		echo "<pre>";
//		print_r($q2);
//		echo "</pre>";
	}

//Attendance module   starts

	Public function attendance(){

		$session_id = $this->session->userdata('user_id');
		$this->load->model('User_model');
		$result = $this->User_model->getall($session_id);
		$result->attendance=$this->User_model->getallAttendance($session_id);
		$result->attendance=unserialize($result->attendance->at_timing);
		$count=count($result->attendance);	

		for($j=1;$j<=$count;$j++){
			$result->attendance[$j]['intime']=0;
			$result->attendance[$j]['outtime']=0;
			if(!empty($result->attendance[$j]['in'])){
				$result->attendance[$j]['intime']=date('dMY h:i a',$result->attendance[$j]['in']);
			}	
			if(!empty($result->attendance[$j]['out'])){
				$result->attendance[$j]['outtime']=date('dMY h:i a',$result->attendance[$j]['out']);
				$result->attendance[$j]['break']['diff']=0;
				$result->attendance[$j]['total']=0;
				foreach($result->attendance[$j]['break'] as $des){
					if($des['on']!=0 && $des['off']!=0){						
						$difference = $des['off'] - $des['on'];
						$result->attendance[$j]['break']['diff']=$result->attendance[$j]['break']['diff']+$difference;
					}
				}
				$total=$result->attendance[$j]['out']-$result->attendance[$j]['in'];
				$result->attendance[$j]['total']=round($total/60);
			}
		}
			$result->casual = $this->User_model->Noofcasualleaves($session_id);
			$result->sick	  = $result->date_of_join; 

			//$result->sick=$this->User_model->Noofsickleaves($session_id);
			$result->wfh=$this->User_model->NoofWFH($session_id);
			$result->lop=$this->User_model->NoofLOP($session_id);
			$this->load->view('user/attendance',$result);
	}

/**
 * Punchin method--------------
 */

	Public function punchin(){

		$this->load->model('User_model');
		$work_loc			     = $this->input->post('work_loc');
		$casual_leave				 = $this->input->post('casual_leave');
		if(!$casual_leave){
			$casual_leave = false;
		}else{
			$casual_leave = true;
		}
		$data['user_id']         = $this->session->userdata('user_id');
		$data['punchin']         = strtotime('now');
		$data['punchin_date']    = date('d-m-Y');
		$data['work_loc']        = $work_loc;
		$data['punchin_ip']      = $_SERVER['REMOTE_ADDR']; 
		$user_details = $this->User_model->getall($data['user_id']);
		$date_of_join				=	$user_details->date_of_join;
		$getLeaveResetDate		= $this->getLeaveResetDate($date_of_join);
		$wfh_permission = $user_details->no_wfh;
		if(($work_loc == 0) || ($work_loc == 1) || ($work_loc == 3)){

			$ip_a[] = '103.61.12.146';
			$ip_a[] = '202.83.55.157';
			$ip_a[] = '202.88.227.250';
			$ip_a[] = '69.12.78.213';

			if(!in_array($data['punchin_ip'], $ip_a)){
				$this->jsonOutput(['status' => false, 'message' => 'IP Mismatch! Action Restricted']);				
			}

			/*if($data['punchin_ip'] != '103.61.12.146') {
				if($data['punchin_ip'] != '202.83.55.157'){
					if($data['punchin_ip'] != '202.88.227.250'){
						$this->jsonOutput(['status' => false, 'message' => 'IP Mismatch! Action Restricted']);				
					}
				}
			}*/
		}

		if($wfh_permission == 1){
			if($work_loc == 2 && $casual_leave == false){
				
				$total_wofhm = $this->User_model->NoofWFH($data['user_id'], $getLeaveResetDate)->total;
				$total_wofhm = intval($total_wofhm);
				// $this->dd($total_wofhm);
				if($total_wofhm > WFHM_LIMIT){
					$this->jsonOutput(['status' => false, 'message' => 'home login exceeded']);
				}
			}

			if($work_loc == 2 && $casual_leave == true){
				$total_wofhm = $this->User_model->get_wfh_cl_count($data['user_id']);
				
				if($total_wofhm % 2 != 0){
					$this->User_model->update_wfh_cl($data['user_id']);
				}else{
					$casual_leave_no = $this->User_model->NoCasualLeave($data['user_id'], $getLeaveResetDate)->lv_no;
					$leave_a = [];
					if($casual_leave_no >= 6){
						$leave_a['lv_type'] = 4;
					}else{
						$leave_a['lv_type'] = 1;
					}
					$leave_a['lv_date'] 		= strtotime('now');
					$leave_a['lv_no']			 = 1;
					$leave_a['user_id']		    = $data['user_id'];
					$leave_a['lv_purpose'] = 'Home login exceeded';
					$leave_a['lv_aply_date'] = strtotime('now');
					$leave_a['lv_date_to'] = strtotime('now');
					$leave_a['lv_status'] = 1;
					$leave_a['appr_person'] = 'System';

					$leav_result = $this->User_model->punchin_with_leave($leave_a);
					if($leav_result == true){
						$this->User_model->update_wfh_cl($data['user_id']);
					}

					// $this->jsonOutput(['status' => false, 'message' => $casual_leave_no]);
				}
			}
		}
		// exit();
		//		$at_id 				     = $this->User_model->Ins_punchindatas($data);
		//		$session_data            = $this->session->userdata('punchin_'.$data['user_id']);
		//		$session_data['punchin'] = strtotime('now');
		//		$session_data['user_id'] = $data['user_id'];
		////		$session_data['at_id']   = $at_id;
		//		$this->session->set_userdata('sess_att_id',$at_id);
		//		$this->session->set_userdata('punchin_'.$data['user_id'], $session_data);
		//		echo (date('d M Y h:i a'));

		$att_det 				 = $this->User_model->Get_att_log($data['user_id']);

		if(count($att_det)>0){
			$at_id     					 = $att_det[0]['att_id'];
			$session_data            = $this->session->userdata('punchin_'.$data['user_id']);
			$this->session->set_userdata('sess_att_id',$at_id);
			$this->session->set_userdata('punchin_'.$data['user_id'], $session_data);
			$arrycount  		     = count($att_det);
			$time                      = $att_det[0]['punchin'];
			$this->jsonOutput(['status' => true, 'time' => date('d M Y h:i a',$time)]);
			// echo (date('d M Y h:i a',$time));
		}else{
			// $this->dd($data);
			$at_id 				     = $this->User_model->Ins_punchindatas($data);
			$session_data            = $this->session->userdata('punchin_'.$data['user_id']);
			$session_data['punchin'] = strtotime('now');
			$session_data['user_id'] = $data['user_id'];
			//		$session_data['at_id']   = $at_id;
			$this->session->set_userdata('sess_att_id',$at_id);
			$this->session->set_userdata('punchin_'.$data['user_id'], $session_data);
			// echo (date('d M Y h:i a'));
			$this->jsonOutput(['status' => true, 'time' => date('d M Y h:i a')]);
		}
	}

	Public function breaktime(){
		$this->load->model('User_model');
		$breakstatus   		= $this->input->post('breakstatus');
		$user_id	   		= $this->session->userdata('user_id');
		$ip = $_SERVER['REMOTE_ADDR'];
		$last_punching_details = $this->User_model->getPunchedLoc($user_id);
		$work_loc = $last_punching_details->work_loc;

		if(($work_loc == 0) || ($work_loc == 1) || ($work_loc == 3)){
			// $ip_a = [0=> '50.7.126.205', 1=> '45.58.123.5', 2=> '139.162.214.101', 3=> '202.83.55.157', 4=> '103.61.12.146' , 5=>'199.195.142.172', 6=>'54.148.154.57'];

			$ip_a[] = '50.7.126.205';
			$ip_a[] = '45.58.123.5';
			$ip_a[] = '139.162.214.101';
			$ip_a[] = '202.88.227.250';
			$ip_a[] = '202.83.55.157';
			$ip_a[] = '69.12.78.213';
			$ip_a[] = '103.61.12.146';
			$ip_a[] = '199.195.142.172';
			$ip_a[] = '54.148.154.57';
			$ip_a[] = '69.12.84.231';
			$ip_a[] = '45.58.123.1';
			$ip_a[] = '45.58.123.2';
			$ip_a[] = '45.58.123.3';
			$ip_a[] = '45.58.123.4';
			$ip_a[] = '45.58.123.5';
			$ip_a[] = '45.58.123.6';
			$ip_a[] = '45.58.123.7';
			$ip_a[] = '45.58.123.8';
			$ip_a[] = '45.58.123.9';
			$ip_a[] = '45.58.123.10';
			$ip_a[] = '45.58.123.11';
			$ip_a[] = '45.58.123.12';
			$ip_a[] = '45.58.123.13';
			$ip_a[] = '45.58.123.14';
			$ip_a[] = '45.58.123.15';
			$ip_a[] = '45.58.123.16';
			$ip_a[] = '104.145.233.19';
			$ip_a[] = '104.149.94.163';
			$ip_a[] = '199.43.207.163';
			


			if(!in_array($ip, $ip_a)){
				$this->jsonOutput(['status' => false, 'message' => 'Action Restricted']);				
			}
			/*if($ip != '103.61.12.146') {
				if($ip != '202.83.55.157'){
					$this->jsonOutput(['status' => false, 'message' => 'Action Restricted']);				
				}
			}*/
		}

		$get_punch_att      = $this->User_model->Get_att_bfr_punchout($user_id);
		$at_id     		    = $get_punch_att->att_id;
		if($breakstatus     == 'off'){ //Break is on :user is on break
			$break_det      = $this->User_model->Get_att_log($user_id,$at_id);	
//check  date for insert break 

			if((empty($break_det[0]['punchout'])  && !empty($break_det[0]['punchin']))){

//			$unserialized = unserialize($break_det[0]['break']);
					if(empty($break_det[0]['break'])){
							$breaks[0]['on']	 = strtotime('now');
							$data['break']     	 = serialize($breaks); 
							$this->User_model->insert_brk($user_id,$at_id,$data);
						}else{
							$unserialized 		 = unserialize($break_det[0]['break']);
							$count_breaks 		 = count($unserialized);

							if(array_key_exists('off',$unserialized[$count_breaks-1])){
								$unserialized[$count_breaks]['on']     = strtotime('now');
								$data['break']     			   	       = serialize($unserialized); 
								$this->User_model->insert_brk($user_id,$at_id,$data);
							}

							else{
								$unserialized[$count_breaks-1]['off']       = strtotime('now');
								$data['break']     			   	            = serialize($unserialized); 
								$this->User_model->insert_brk($user_id,$at_id,$data);
								if($user_id == 430){
//									$unserialized[$count_breaks-1]['off']   = strtotime('now');
//								    $data['break']     			   	        = serialize($unserialized); 
//								    $this->User_model->insert_brk($user_id,$at_id,$data);
									echo('hii');
									echo('<pre>');
									print_r("status :".$breakstatus);
									print_r($unserialized);
									echo('</pre>');
								}
//								echo('Breaktime mismatch');
//								exit();
							}
					}
				}else{
				echo "Punch in time and break time mismatch!";
				exit;
			}
		}else{ //Get in :- User is not on break but break status = 'on'
			$break_det  = $this->User_model->Get_att_log($user_id,$at_id);

			if((empty($break_det[0]['punchout'])  && !empty($break_det[0]['punchin']) )){
				$unser  = unserialize($break_det[0]['break']);
				$count  = count($unser);
				if((array_key_exists('on',$unser[$count-1]))&& !(array_key_exists('off',$unser[$count-1]))){
					$unser[$count-1]['off']	 = strtotime('now');
					$data['break']     	 	 = serialize($unser); 
					$this->User_model->insert_brk($user_id,$at_id,$data);
					$break_det 				 = $this->User_model->Get_att_log($user_id,$at_id);
					$unser     				 = unserialize($break_det[0]['break']);
				}
	// Start Break calculations of new code 
					$total_break_display     ='';
				    $total_diff  					 = 0;
					$att_break 				 = $this->User_model->Get_All_att_log($user_id);
					$break_details           = unserialize($att_break[0]['break']);
					$count_break             = count($break_details);
				    if($count_break>0){
						foreach($break_details as $row){							
							if(array_key_exists('off',$row) && array_key_exists('on',$row)){								
								$diff               = $row['off'] - $row['on'];								
								$total_diff         = $total_diff + $diff;	
							}	
						}
						$tdiff 				  = $total_diff;//in seconds
						$total_diff1		  = $total_diff / 60;//in min
						$brk_rem 		      = $total_diff1 % 60; 
						$brk_hrs              = $total_diff1 - $brk_rem;
						$tot_brk_hrs          = $brk_hrs/60;// in hrs
						$total_break_hours    = round($tot_brk_hrs)."Hrs ".round($brk_rem)." min";
						$data['total_break']  = $tdiff;
						$this->User_model->Update_break($data,$at_id,$user_id);
						$total_break_display  = "Total Break Taken : ".$total_break_hours;
						$this->jsonOutput(['status' => true, 'time' => $total_break_display]);
						// echo $total_break_display;
					}
	//Close break calculations  new code
			}
		}
	}
//::::::::::::::::::::::::::::::::::::::::::::::::::Punchout:start::::::::::

	Public function punchout(){

		$this->load->model('User_model');	
		$user_id                  	= $this->session->userdata('user_id');
		$session_data             = $this->session->userdata('punchin_'.$user_id);
		$at_data              	  	= $this->User_model->Get_att_log($user_id);
		// $this->dd($at_data);
		$ip = $_SERVER['REMOTE_ADDR'];
		$last_punching_details = $this->User_model->getPunchedLoc($user_id);
		$work_loc = $last_punching_details->work_loc;

		$dep_id = $this->User_model->get_dep_id($user_id)[0]['dep_id'];

		if($dep_id == 2 || $dep_id == 46 || $dep_id == 51 || $dep_id == 52){
			$error_flag = true;
			$attendance_log = $this->User_model->get_dailyStatus($user_id);
			if(array_key_exists('work_report',$attendance_log)){
				$work_report = unserialize($attendance_log->work_report);
				// $this->dd($work_report);
				$ticket_handled_no = 0;
				$tickets_pending_no = 0;
				$ticket_resolved_no = 0;
				foreach ($work_report as $key => $value) {
					switch ($key) {
						case 599:
						case 703:
						case 711:
						case 691:
							if($value['status'] != 1){
								$error_flag = false;
							}else{
								$ticket_handled_no = $value['reply'];
							}

						break;
						case 693:
						case 600:
						case 701:
						case 709:
							if($value['status'] != 1){
								$error_flag = false;
							}else{
								$ticket_resolved_no = $value['reply'];
							}
						break;
						case 694:
						case 702:
						case 710:
						case 601:
							if($value['status'] != 1){
								$error_flag = false;
							}else{
								$tickets_pending_no = $value['reply'];
							}						
							break;	
					}
				}

				if(intval($tickets_pending_no) + intval($ticket_resolved_no) != intval($ticket_handled_no) ){
					$this->jsonOutput(['status' => false, 'message' => 'Enter exact number of resolved and pending tickets. Tickets Handled = Tickets Resolved + Tickets Pending']);
				}

			}else{
				$error_flag = false;
			}
			
			/*if($error_flag == false){
				$this->jsonOutput(['status' => false, 'message' => 'Please update daily activities']);
			}*/
		}
		if(($work_loc == 0) || ($work_loc == 1) || ($work_loc == 3)){

			$ip_a[] = '103.61.12.146';
			$ip_a[] = '202.83.55.157';
			$ip_a[] = '202.88.227.250';
			$ip_a[] = '69.12.78.213';

			if(!in_array($ip, $ip_a)){
				$this->jsonOutput(['status' => false, 'message' => 'IP Mismatch! Action Restricted']);				
			}
			
			/*if($ip != '103.61.12.146') {
				if($ip != '202.83.55.157'){
					$this->jsonOutput(['status' => false, 'message' => 'Action Restricted']);				
				}
			}*/
		}

        if((empty($at_data[0]['punchout'])) && (!empty($at_data[0]['punchin']))){
			$get_punch_att       	 = $this->User_model->Get_att_bfr_punchout($user_id);
			$att_id_4_wrkRpt      = $get_punch_att->att_id;
			$data['punchout']     	= strtotime('now');
			$data['punchout_ip']  = $_SERVER['REMOTE_ADDR'];
			$data['att_status']   	= 1;
//Total work time
			$tot_brk 			  = 0;
			$punchin     		  = $at_data[0]['punchin'];
			$punchout    		  = strtotime('now');

			if(!empty($at_data[0]['total_break'])){
				$tot_brk 		  = $at_data[0]['total_break'];
			}

			$time 				  = $punchout - $punchin;
			$worked_time 	      = $time 	  - $tot_brk;
			$worked_times 	      = $time 	  - $tot_brk;
			$data['worked_time']  = $worked_time;
			$this->User_model->Ins_punchout($data,$user_id);
			$datas['punchout']    = date('d M Y h:i a',$punchout);  
			$worked_time          = $worked_time/60;
			$worked_time_rem	  = $worked_time%60;
			$worked_time          = $worked_time - $worked_time_rem;
			$worked_time		  = $worked_time/60;
			$datas['worked']      = round($worked_time)." hrs ".round($worked_time_rem)." min";
			$tot_brk         	  	= $tot_brk/60;
			$tot_brk_rem	 	  = $tot_brk%60;
			$tot_brk              = $tot_brk - $tot_brk_rem;
			$tot_brk		      = $tot_brk/60;
			$datas['break']       = round($tot_brk)." hrs".round($tot_brk_rem)." min";
			$datas['punchin']     = date('d M Y',$punchin);
			$punchin_time		  = date('d-m-Y h:i a',$punchin);
			$punchout_time		  = date('d M Y',$punchout);

//:::::::::::::::::::::::::::::::start: Weekly working hrs ::::::::::::::::::::::

			$total_break_tim 	= $tot_brk;
			$tot_wrkd_time 		= $worked_times;
			$lastsun 			= strtotime('last Monday');
			$today   			= strtotime('now');
			$get_wrkd_hrs 		= $this->User_model->get_hrs_wrkd($user_id,$lastsun,$today);
			$get_calcs 			= $this->User_model->get_calcs();
			$fixed_pending_hrs 	= $get_calcs[0]['pending_calc'] ;
			$time_conv 			= explode(':',$fixed_pending_hrs);
			$user_data  = $this->User_model->getuser($user_id);
// Designation 22 for L1 experienced tech 49:30 Hr 
			// $this->dd($user_data);
			if($user_data[0]->desgn_id==1){
				$fix_pend_minutes  = 178200;
			}else{
				$fix_pend_minutes  = 148500;
			}
			if(count($get_wrkd_hrs) > 0){
				$w_id  							 = $get_wrkd_hrs[0]['wrk_id'];
				$sum 							= $get_wrkd_hrs[0]['hrs_worked'] + ($tot_wrkd_time) ;
				$data_Wrk['extra_hrs']  =$get_wrkd_hrs[0]['extra_hrs'];
				$data_Wrk['flexi_hrs']    =$get_wrkd_hrs[0]['flexi_hrs'];
				$data_Wrk['hrs_worked'] 	=    $get_wrkd_hrs[0]['hrs_worked'];
				$data_Wrk['pending_hrs'] 	= $get_wrkd_hrs[0]['pending_hrs'];
				if($work_loc==3){
					$data_Wrk['extra_hrs']=$data['worked_time'] +$data_Wrk['extra_hrs'];
				}elseif($work_loc==4){
					// if flexi hrs punchin saving time 
						$data_Wrk['flexi_hrs']=$data['worked_time'] +$get_wrkd_hrs[0]['flexi_hrs'];
				}else{

					$data_Wrk['hrs_worked'] 	= round($sum);    
					$data_Wrk['pending_hrs'] 	= round($get_wrkd_hrs[0]['pending_hrs'] - $tot_wrkd_time);
				}
				// $data_Wrk['date'] 		    = strtotime('now'); 
				$upd = $this->User_model->update_wrk_hrs($user_id,$data_Wrk,$w_id);
				$overtime=$get_wrkd_hrs[0]['overtime'];
			}else{
				$sum 							 = $tot_wrkd_time;
				$data_Wrk['user_id'] 	   = $user_id;
				$data_Wrk['extra_hrs']   =0;
				$data_Wrk['flexi_hrs']    =0;
				$data_Wrk['hrs_worked']=0;
				$data_Wrk['pending_hrs'] = $fix_pend_minutes;
				// if extra hrs punchin saving time 
				if($work_loc==3){
					$data_Wrk['extra_hrs']=$data['worked_time'] +0;
					$data_Wrk['hrs_worked']=0;
				}elseif($work_loc==4){
				// if flexi hrs punchin saving time 
					$data_Wrk['flexi_hrs']=$data['worked_time'] +0;
				}else{
					$data_Wrk['hrs_worked']     = round($sum) ;
					$data_Wrk['pending_hrs']    = round($fix_pend_minutes - $sum);
				}
				$data_Wrk['date'] 		    = strtotime('now'); 
				$this->User_model->insert_wrk_hrs($data_Wrk);
				$overtime ="00 : 00";
			}

			$datas['wrking_hrs']        = $this->GetRealTime($data_Wrk['hrs_worked']);
			$datas['pending_hrs']       = $this->GetRealTime($data_Wrk['pending_hrs']);
			$datas['flexi_hrs']       	  = $this->GetRealTime($data_Wrk['flexi_hrs']);
			$datas['extra_hrs']          = $this->GetRealTime($data_Wrk['extra_hrs']);
			$datas['overtime']       	= $overtime;

			echo json_encode(['status' => true, 'data' => $datas]);
			// echo json_encode($datas);

//::::::::::::::::::::::::::::end: Weekly working hrs ::::::::::::
			$team_id    = $user_data[0]->team_id;
			$mail_ids   = $this->User_model->getmail_ids($team_id);
			$mail__ids = $mail_ids[0]['mail_ids'] ;
			$att_datas     = $this->User_model->Get_All_att_logs($user_id);
			/**
			 * -------------work location-------------------------
			 */
			$wrk_loc       = $att_datas[0]['work_loc'];
			$wrk_lc_dt     = '';
			if($wrk_loc    == 0){
				$wrk_lc_dt .= "Regular";
			}elseif($wrk_loc == 1){
				$wrk_lc_dt .= "Swap Shift";
			}elseif($wrk_loc == 2){
				$wrk_lc_dt .= "Home Login";
			}elseif($wrk_loc == 3){
				$wrk_lc_dt .= "Extra Hours";
			}else{
				$wrk_lc_dt .= "Project Hours";
			}
//--------------close work location-----------------------			
			$punchin_ip      = $att_datas[0]['punchin_ip'];
			$punchout_ip     = $att_datas[0]['punchout_ip'];
//--------------------break time -------------------------

	$tot_brk		         = $att_datas[0]['total_break'];
	$tot_brk			     = $tot_brk/60;
	$tot_brk_min			 = $tot_brk%60;
	$tot_brk	             = $tot_brk - $tot_brk_min ;
	$tot_brk	             = $tot_brk/60;
	$tot_break		         = round($tot_brk)." : ".round($tot_brk_min)." Hrs";		

//--------------------close break time ------------------------

//--------------------todays work time ------------------------

	$worktime 			     = $att_datas[0]['worked_time'];		
	$worktime			     = $worktime/60;
	$worktime_min			 = $worktime%60;
	$worktime	             = $worktime - $worktime_min ;
	$worktime	             = $worktime/60;
	$tot_wrk		         = round($worktime)." : ".round($worktime_min)." Hrs"; 

//--------------------close todays work time ---------------------
//===================daily activities=============================	

	$daily_activity          = unserialize($att_datas[0]['work_report']);
	$dail_check_lst          = '';
    $dail_activity_lst       = '';
	if(count($daily_activity)>0 && !empty($daily_activity)){
		$dep_id_array = $this->User_model->get_dep_id($user_id);
		if($dep_id_array[0]['dep_id'] != 2){
		$dail_check_lst .= "<div class='m-portlet'>
							<div class='m-portlet__head'>
								<div class='m-portlet__head-caption'>
									<div class='m-portlet__head-title'>
										<h3 class='m-portlet__head-text'>
											<u>Daily Checklist </u>
										</h3>
									</div>
								</div>
							</div>
							<div class='m-portlet__body'>
								<!--begin::Section-->
								<div class='m-section'>
									<div class='m-section__content'>
										<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>
											<thead>
												<tr>
													<th>
														Activity
													</th>
													<th>
														Status
													</th>
													<th>
														Date & Time
													</th>
												</tr>
											</thead>
											<tbody>";

		}else{
			$dail_check_lst = "No Daily Checklists are assigned . ";
		}
			foreach($daily_activity as $row){
						if($row['field_type']==0){
							$dail_check_lst .= "<tr><td>".$row['activity']."</td>";
							if($row['status']==1){
								$dail_check_lst .= "<td>Done</td>";
								$dail_check_lst .= "<td>".date('d-m-Y h:i a',$row['time'])."</td>";
							}else{
								$dail_check_lst .= "<td>---</td>";
								$dail_check_lst .= "<td>---</td>";
							} 
						}
			}
			$dail_check_lst .= "</tr></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>";
//-----------daily text area and number fields------//

	$dail_activity_lst ='';
	$dail_activity_lst .= "<div class='m-portlet'>
							<div class='m-portlet__head'>
								<div class='m-portlet__head-caption'>
									<div class='m-portlet__head-title'>
										<h3 class='m-portlet__head-text'>
											<u>Daily Report</u>
										</h3>
									</div>
								</div>
							</div>
							<div class='m-portlet__body'>
								<!--begin::Section-->
								<div class='m-section'>
									<div class='m-section__content'>
										<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>
											<thead>
												<tr>
													<th>
														Activity
													</th>
													<th>
														Status
													</th>
													<th>
														Date & Time
													</th>
												</tr>
											</thead>
											<tbody>";

			
			if(intval($att_datas[0]['sla_violation']) > 0){
				$slaviolation_a['activity'] = 'SLA Violation';
				$slaviolation_a['status'] = 1;
				$slaviolation_a['field_type'] = 1;
				$slaviolation_a['reply'] = $att_datas[0]['sla_violation'];
				$slaviolation_a['time'] = '';
				$daily_activity[] = $slaviolation_a;
			}

			foreach($daily_activity as $row){

						if($row['field_type']>0){

							$dail_activity_lst .= "<tr><td>".$row['activity']."</td>";

							if($row['status']   ==1){

								$dail_activity_lst .= "<td>".$row['reply']."</td>";

								$dail_activity_lst .= "<td>".date('d-m-Y h:i a',$row['time'])."</td>";

								

							}

							else{

								$dail_activity_lst .= "<td>---</td>";

								$dail_activity_lst .= "<td>---</td>";

							} 

						}

				

			}

			$dail_activity_lst .= "</tr></tbody>

					</table>

				</div>

			</div>



		</div>



	</div>";	


	/**
	 * ----close daily text area and number fields------
	 */
	}	

/**
 * ======= close daily activities (including checklist and text area and number fields)====
 * starts----------------------- weekly and monthly reports----------------------------------
 */
			
	$weekly_check_rep ='';	
	$mon_id4weekly = date('m-Y');	
	$dep_ids = $this->User_model->get_dep_id($user_id);  

	$dep_id = $dep_ids[0]['dep_id'];

	$weekly_checklist = $this->User_model->full_weekly_checklist_act($dep_id);	

	if(count($weekly_checklist)>0){

			$weekly_check_rep .= "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											<u> Weekly Checklist </u>

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			$weekly_check_rep .= "<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>

											<thead>

												<tr>

													

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

														Status

													</th>

												</tr>

											</thead><tbody>"; 

				foreach($weekly_checklist as $rpt_row){  

					$week_che_stat = $this->User_model->stat_week_chk($user_id,$mon_id4weekly,$rpt_row['wa_id']);

					

					

					if(count($week_che_stat)==0){

						$weekly_check_rep .= "<tr>";

						$weekly_check_rep .= "<td>".$rpt_row['wa_activity']."</td>";

						$weekly_check_rep .= "<td>---</td>";

						$weekly_check_rep .= "<td>---</td>";

						$weekly_check_rep .= "</tr>";

					}

					else{

						

						foreach($week_che_stat as $wk_ch){ 

							$weekly_check_rep .= "<tr>";

							$weekly_check_rep .= "<td>".$rpt_row['wa_activity']."</td>";

							$weekly_check_rep .= "<td>".date('d-m-Y',$wk_ch['wd_date'])."</td>"; 

							$weekly_check_rep .= "<td>  Done </td>";

							$weekly_check_rep .= "</tr>";

						}

						

					}

					

					

				}

				$weekly_check_rep .="</tbody></table></div></div>";

		}

		else{

			

			$weekly_check_rep = "No weekly Checklists are assigned . ";

		}


/**
 * .......Weekly Report Starting.............
 */

	$weekly_reports ='';	

	$weekly_workreport = $this->User_model->full_weekly_rep_act($dep_id);	 	



		if(count($weekly_workreport)>0){ 

			$weekly_reports .= "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											 <u>Weekly work Report</u>

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			$weekly_reports .= "<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>

											<thead>

												<tr>

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

													Report	

													</th>

												</tr>

											</thead><tbody>"; 

			//......................................................

			 

			foreach($weekly_workreport as $rpt_row2){ 

				$week_rep_stat = $this->User_model->stat_week_rep($user_id,$mon_id4weekly,$rpt_row2['wa_id']);

//					echo('<pre>');

//					print_r($week_rep_stat);

//					echo('</pre>');

//					exit();

					if(count($week_rep_stat)!=0){ 

						foreach($week_rep_stat as $rep){

							$weekly_reports .= "<tr>";

							$weekly_reports .= "<td>".$rep['wa_activity']."</td>";

							$weekly_reports .= "<td>".date('d-m-Y',$rep['wd_date'])."</td>";

//							echo('<pre>');

//							print_r($week_rep_stat);

//							echo('</pre>');

							$weekly_reports .= "<td>".nl2br($rep['wd_status'])."</td>";

							$weekly_reports .= "</tr>";

						}

						

					}

					else{

						$weekly_reports .= "<tr>";

						$weekly_reports .= "<td>".$rpt_row2['wa_activity']."</td>";

						$weekly_reports .= "<td>---</td>";

						$weekly_reports .= "<td>---</td>";

						

						$weekly_reports .= "</tr>";

					}

					

					

				}

				$weekly_reports .="</tbody></table></div></div>";



		}	

		else{

			$weekly_reports = "<br/>No weekly work reports are assigned . ";

		}

			

//..................................Closing weekly work reports............................

//...........................Start Monthly reports..............................

		$month_chk_datasss = '';

		$monthly_checklist = $this->User_model->full_monthly_checklist_act($dep_id);

		if(count($monthly_checklist)>0){

			$month_chk_datasss .= "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											<u>Monthly Checklist</u>

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

			$month_chk_datasss .= "<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>

											<thead>

												<tr>

													<th>

														Task 

													</th>

													<th>

														Time

													</th>

													<th>

														Status

													</th>

												</tr>

											</thead><tbody>";

			foreach($monthly_checklist as $rpt_row){

				$month_chk_stat = $this->User_model->stat_month_chk($user_id,$mon_id4weekly,$rpt_row['ma_id']);

//					print_r($month_rep_stat);

					if(count($month_chk_stat)==0){

						$month_chk_datasss .="<tr>";

						$month_chk_datasss .= "<td>".$rpt_row['ma_activity']."</td>";

						$month_chk_datasss .="<td>-----</td>";

						$month_chk_datasss .="<td>-----</td>";

						$month_chk_datasssk_dat .="</tr>";

					}

					else{

						foreach($month_chk_stat as $m_ch){

							$month_chk_datasss .= "<tr>";

							$month_chk_datasss .= "<td>".date('d-m-Y',$m_ch['md_date'])."</td>";

							$month_chk_datasss .= "<td>".$rpt_row['ma_activity']."</td>";

							$month_chk_datasss .= "<td>Done</td>";

							$month_chk_datasss .= "</tr>";

						}

					}

					

				}

				$month_chk_datasss .="</tbody></table></div></div>";

		} 

		else{

			$month_chk_datasss .= "</br>No monthly checklist are assigned ."; 

		}

		

		$month_rep_datasss = '';

		$monthly_workreport_act = $this->User_model->full_monthly_rep_act($dep_id);		

		//Close  view of Daily checklists 

		if(count($monthly_workreport_act)>0){

			$month_rep_datasss .= "<div class='m-portlet'>

							<div class='m-portlet__head'>

								<div class='m-portlet__head-caption'>

									<div class='m-portlet__head-title'>

										<h3 class='m-portlet__head-text'>

											 <u>Monthly work Report</u>

										</h3>

									</div>

								</div>

							</div>

							<div class='m-portlet__body'>";

		$month_rep_datasss .= "<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>

											<thead>

												<tr>

													<th>

														Task

													</th>

													<th>

														Time

													</th>

													<th>

													Report	

													</th>

												</tr>

											</thead><tbody>";

		foreach($monthly_workreport_act as $mon_rep){

				

			$month_rep_stat = $this->User_model->stat_month_rep($user_id,$mon_id4weekly,$mon_rep['ma_id']);

				if(count($month_rep_stat)==0){

					$month_rep_datasss .= "<tr>";

					$month_rep_datasss .= "<td>".$mon_rep['ma_activity']."</td>";

					$month_rep_datasss .= "<td>----</td>";

					$month_rep_datasss .= "<td>----</td>";

					$month_rep_datasss .= "</tr>";

				}

				else{

					foreach($month_rep_stat as $mn_st){

						$month_rep_datasss .= "<tr>";

						$month_rep_datasss .= "<td>".$mon_rep['ma_activity']."</td>";

						$month_rep_datasss .= "<td>".date('d-m-Y',$mn_st['md_date'])."</td>";

						$month_rep_datasss .= "<td>".nl2br($mn_st['md_status'])."</td>";

						$month_rep_datasss .= "</tr>";

					}

					

				}

			}

				$month_rep_datasss .="</tbody></table></div></div>";

		}

		else{

			$month_rep_datasss .= "</br>No monthly reports are assigned ."; 

		}		

		

//..........................Close monthly reports...................................		

			

//----------------------- close  weekly and monthly reports-------------------------

//-----------------------   ticket reports-------------------------

		$getdep = $this->User_model->get_dep_id($user_id);	

		$work_det='';

		if($getdep[0]['dep_id']==2 || $getdep[0]['dep_id']==46 || $getdep[0]['dep_id']==51 || $getdep[0]['dep_id']==52 ){

		$mon_4_det_tikt = date('d-m-Y');

		$work_det='';

		$work_reports = $this->User_model->get_emp_work_report($user_id,$mon_4_det_tikt,$att_id_4_wrkRpt);

//		$work_reports = $this->User_model->get_emp_work_report($user_id,$at_id);

	

/*if(count($work_reports) > 0){

			$work_det .= "<div class='m-portlet'>

								<div class='m-portlet__head'>

									<div class='m-portlet__head-caption'>

										<div class='m-portlet__head-title'>

											<h3 class='m-portlet__head-text'>

												<u>Details of Tickets Worked </u>

											</h3>

										</div>

									</div>

								</div>";

			$work_det .= "<div class='m-portlet__body'>

								<!--begin::Section-->

								<div class='m-section'>

									<div class='m-section__content'>

										<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>

											<thead>

												<tr>

													<th class='col-md-3'>

														Daily report

													</th>

													<th class='col-md-9'>

														Time

													</th>

												</tr>

											</thead><tbody>";

				foreach($work_reports as $rpt_row){

					$work_det .= "<tr>"; 

					$work_det .= "<td style='text-overflow: ellipsis; white-space: normal; word-break:break-all; ' >".nl2br($rpt_row['workreport'])."</td>";

					$work_det .= "<td>".$rpt_row['time']."</td>";

					$work_det .= "</tr>";

				}

				$work_det .="</tbody></table></div></div></div>";

		}
		else{

			   $work_det .="Didn't Update Ticket Details "; 

		}*/

		if($getdep[0]['dep_id']==2 || $getdep[0]['dep_id']==46 || $getdep[0]['dep_id']==51 || $getdep[0]['dep_id']==52 ){
		$mon_4_det_tikt = date('Y-m-d');
		$work_det='';
		$work_reports = $this->User_model->get_emp_work_report($user_id,$mon_4_det_tikt,$att_id_4_wrkRpt);

		if($getdep[0]['dep_id']==2 || $getdep[0]['dep_id']==46 || $getdep[0]['dep_id']==51 || $getdep[0]['dep_id']==52 ){
			$ticket_details = $this->User_model->get_ticket_details($user_id, $att_id_4_wrkRpt, $mon_4_det_tikt);
			if($ticket_details->status == true){
				$ticket_data = $ticket_details->data;
				$work_det .= "<div class='m-portlet'>
								<div class='m-portlet__head'>
									<div class='m-portlet__head-caption'>
										<div class='m-portlet__head-title'>
											<h3 class='m-portlet__head-text'>
												<u>Details of Tickets Worked </u>
											</h3>
										</div>
									</div>
								</div>";
				$work_det .= "<div class='m-portlet__body'>
									<!--begin::Section-->
									<div class='m-section'>
										<div class='m-section__content'>
											<table class='table table-striped m-table' border='1' style='border-collapse:collapse;'>
												<thead>
													<tr>
														<th class='col-md-3'>
															Ticket Url
														</th>
														<th class='col-md-9'>
															Ticket Response
														</th>
														<th class='col-md-9'>
															Response Time
														</th>
													</tr>
												</thead><tbody>";
					foreach($ticket_data as $row){
						$work_det .= "<tr>"; 
						$work_det .= "<td style='text-overflow: ellipsis; white-space: normal; word-break:break-all; ' >".$row->ticket_id."</td>";
						$work_det .= "<td>".$row->response."</td>";
						$work_det .= "<td>".$row->sla."</td>";
						$work_det .= "</tr>";
					}
			}else{
				$work_det .="Didn't Update Ticket Details ";
			}
			
		}
	}

		

	}

			 

//----------------------- close  ticket reports-------------------------

			

			$user_data     = $this->User_model->getallss($user_id);
			$subject	   = "Work Report  -  ".$user_data[0]->fullname;			
			$config        = array(
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
			$this->email->from($user_data[0]->email,'HashRoot PE Portal');
			$this->email->to($mail__ids);
  			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri;"><br><b>Employee : ' .$user_data[0]->fullname. '  ('.$user_data[0]->email.')  <br> <br/><b>Punch In Time : </b>'.$punchin_time.'<br/><br/><b>Punch Out Time : </b>'.date('d-m-Y h:i a').'<br/><br/><b>Working Location : </b>'.$wrk_lc_dt.'<br/><br/><b>Punch in IP : </b>'.$punchin_ip.'<br/><br/><b>Punch out IP : </b>'.$punchout_ip.'<br/><br/><b>Total Hours Worked Today:</b> '.$tot_wrk.'<br/><br/><b>Total Break Taken : </b>'.$tot_break.'<br/><br/><b>Total Hours Worked : </b>'.$datas['wrking_hrs'].'<br/><br/><b>Pending Hours : </b>'.$datas['pending_hrs'].'<br/><br/>'.$dail_check_lst.'<br/><br/>'.$dail_activity_lst.'<br/><br/>'.$weekly_check_rep.'<br/><br/>'.$weekly_reports.'<br/><br/>'.$month_chk_datasss.'<br/><br/>'.$month_rep_datasss.'<br/><br/>'.$work_det.'</div>');
  			$this->email->send();			
		//mail function Ends
//	::::::::::::::::::::::Close Mailing code::::::::::::::::	
		}
		else{
			echo "Punch in time and Punch out time mismatch!";
		}
		$this->session->unset_userdata('at_id');
	}

	

//::::::::::::::::::::::::::::::::::::::::::::::::::Punchout:end:::::::::::::::::::::::::::::::::::::::::::::::::

//::::::::::::::::::::::::::::::::::::::::::::::::::Attendance module:end:::::::::::::::::::::::::::::::::::::::::::::::::





//::::::::::::::::::::::::::::::::::::::::::::::::::Request module:start:::::::::::::::::::::::::::::::::::::::::::::::::

	function RequestType($type){
		switch($type){
			case 1:$text="CL";
			break;
			case 2:$text="ML";
			break;
			case 3:$text="WFH";
			break;
			case 4:$text="LOP";
			break;			
			case 5:$text="SWAP";
			break;
			case 6:$text="Restricted WFH";
			break;
			case 7:$text="Holiday";
			break;
		}
		return $text;
	}

	/**Request */

	Public function request(){
			$user_id           				= $this->session->userdata('user_id');
			$this->load->model('User_model');
			$user_data					  = $this->User_model->getuser($user_id);
			$date_of_join				 = $user_data[0]->date_of_join;
			$request['user_id']			= $user_id;
			$request['lv_type']			= $this->input->post('requesttype');		
			$request['lv_purpose']	  = $this->input->post('reason');
			$request['approvedby']   = $this->input->post('approvedby');
			$request['lv_no'] 			 = $this->input->post('requestdays');
			$date							 = strtotime($this->input->post('date'));
			$dateto							= strtotime($this->input->post('dateto'));
			$request['lv_aply_date'] =strtotime('now');
			$request['lv_date']			=$date;
			$request['lv_date_to']	  =$dateto;
//validation
		if($request['lv_type']==0){
			$out['error']="Please select request type!";
			$out['status']=1;
			echo json_encode($out);
			exit();
		}	

//if admin skip date 
		if($this->session->userdata('admin')!='true'){
		$today = strtotime('today');
		if(empty($this->input->post('date')) || ($date<$today) ){
			$out['error']="Wrong from date !";
			$out['status']=1;
			echo json_encode($out);
			exit();
		}		

		if($dateto < $today){
			$out['error']="Wrong to date !";
			$out['status']=1;
			echo json_encode($out);
			exit();
		}}
		
		if($this->session->userdata('admin')=='true' && $request['lv_type']	== 4){
			$request['is_admin']		=	1;
		}

		if(empty($request['lv_purpose'])){
			$out['error']="You didn't mention purpose !";
			$out['status']=1;
			echo json_encode($out);
			exit();
		}

		//Open Limiting CL upto 6
		if(empty($request['lv_no'])){
			$out['error']="You didn't mention the number of days !";
			$out['status']=1;
			echo json_encode($out);
			exit();
		}else{ 

			if($request['lv_type']     == 1){
				$new_joining_date =$this->getLeaveResetDate($date_of_join);
				$no_cl                  = $this->User_model->NoCasualLeave($user_id,$new_joining_date);
				if(count($no_cl)>0){
					$applied_no_cl      = $request['lv_no'];
					$prev_tot_cl        = $no_cl->lv_no;
					$sum_cls            = $applied_no_cl + $prev_tot_cl;
					$CL_left            = 6 - $prev_tot_cl ; 
					if($sum_cls>6){
						$cl_flag = 0;
						$out['error']   = $CL_left." Casual Leaves left.";
						$out['status']  = 1;
						echo json_encode($out);
						exit();
					}
				}
			}
//rewrite code --renjith for //leave ML
			if($request['lv_type'] == 2){
				$new_joining_date = $this->getLeaveResetDate($date_of_join);
				$no_cl                   = $this->User_model->NoMedicalLeave($user_id,$new_joining_date);
				if(count($no_cl)>0){
					$applied_no_cl      = $request['lv_no'];
					$prev_tot_cl        = $no_cl->lv_no;
					$sum_cls            = $applied_no_cl + $prev_tot_cl;
					$CL_left            = 6 - $prev_tot_cl ; 
					if($sum_cls>6){
						$cl_flag = 0;
						$out['error']   = $CL_left."  Medical Leaves left.";
						$out['status']  = 1;
						echo json_encode($out);
						exit();
					}
				}
			}

			if($request['lv_type'] == 7){
				$new_joining_date = $this->getLeaveResetDate($date_of_join);
				$no_holidays                   = $this->User_model->NoHolidaysLeave($user_id,$new_joining_date);
				if(count($no_holidays)>0){
					$applied_no_holiday      = $request['lv_no'];
					$prev_tot_holiday        = $no_holidays->lv_no;
					$sum_holidays            = $applied_no_holiday + $prev_tot_holiday;
					$HOLIDAYS_left            = 10 - $prev_tot_holiday ; 
					if($sum_holidays>10){
						$holiday_flag = 0;
						$out['error']   = $HOLIDAYS_left."  Medical Leaves left.";
						$out['status']  = 1;
						echo json_encode($out);
						exit();
					}
				}
			}
		}

	//Close Limiting CL upto 6
		if(empty($request['approvedby'])){
			$out['error']="Who approved the leave!";
			$out['status']=1;
			echo json_encode($out);
			exit();
		}
			$config['upload_path']          = '/home/hashroot/pe/assets/userfiles';
			$config['allowed_types']        = 'pdf|doc|docx|txt|dot|png|jpg';
			$config['max_size']             = 5024;
			$config['file_name']            = $user_id.'_'.strtotime('now');
			// $config['max_width']         = 1024;
			// $config['max_height']        = 768;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('userfile')){
				$data=$this->upload->data();
				$request['lv_img']=$data['file_name'];
			};

//date difference 

		if(!empty($dateto) && $dateto!=$date ){
		//$datediff = date('d',$dateto) - date('d',$date);
		$days='<span class="float-left"> <b>Date: </b>'.date('d M Y',$date).' <b>To  Date: </b>'.date('d M Y',$dateto).'</span>';
		//$request['lv_no']= floor($datediff / (60 * 60 * 24));
		//$request['lv_no']=$datediff+1;
		}else{
			$days='<span class="float-left"> <b>Date: </b>'.date('d M Y',$date).'</span>';
			//$request['lv_no']=1;
		}
		if($request['lv_type']==5){
			$request['lv_status']=1;
		}
		else{
			$request['lv_status']=0;
		}
		$this->User_model->insert_into_request($request);		
		//echo $requesttype;
		$rqtype=$this->RequestType($request['lv_type']);
		$out['msg']="Your request has been sent succesfully!";
		$out['status']=0;
		$out['html']='<div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air alert-dark" role="alert" style="margin-right: 20px; display: flow-root;">	
								<div style="width: 100%;display:block;">
								<span class="m-badge m-badge--primary m-badge--wide m-badge--rounded float-left m--font-bold">Type : ' .$rqtype.'</span>
								<span class="m-badge m-badge--primary m-badge--wide m-badge--rounded float-right m--font-bold">Status : Pending </span>
								</div> <br /><br/>
								<p style="width: 100%;">
								<span class="float-left m--font-bold"> '.$days.'</span>
								<span class="float-right m--font-bold">Consent of : '.$request['approvedby'].'</span>
								</p>
								<br/>
								<p><span class="float-left m--font-bold">Reason : '.nl2br($request['lv_purpose']).'</span></p> 
						</div>';
//mail function 
			$subject = $rqtype." Request : ".$user_data[0]->fullname;	 		
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
			$this->email->from($user_data[0]->email,'HashRoot PE Portal');
			$email4 = "requests@hashroot.com";
			//$email4 = "renjith.kr@hashroot.com";
			$team_emails = $this->User_model->getmail_ids($user_data[0]->team_id);
			$team_emails = explode(",", $team_emails[0]['mail_ids']);
			foreach ($team_emails as $key => $value) {
				$cc_a[] = $value;
			}
			$cc_a[] = 'hr@hashroot.com';
			$this->email->to($email4);
			$this->email->cc($cc_a);
			// $this->email->cc('hr@hashroot.com');
  			$this->email->subject($subject);			
			$this->email->message('Hi , <br/><br/> '.$user_data[0]->fullname.'  ('.$user_data[0]->email.') has requested '. $rqtype.'. <br> <br />
							'. $days.'<br /><br />
							<b>Consent of : </b>'.$request['approvedby'].'
							<br/>
							<p><b>Reason : </b>'.nl2br($request['lv_purpose']).'</p> 
							');
  			$this->email->send();	
  			// log_message('error', 'request sending');	
  			// log_message( 'error', print_r($this->email->print_debugger(), TRUE) );		
		//mail function Ends
		echo json_encode($out);
	}

	Public function viewallrequests(){
		$user_id= $this->session->userdata('user_id');
		$this->load->model('User_model');
		$user_data					  = $this->User_model->getuser($user_id);
		$date_of_join				 = $user_data[0]->date_of_join;
		$new_joining_date 		  = $this->getLeaveResetDate($date_of_join);
		$requests=$this->User_model->get_all_request($user_id,$new_joining_date);
		$output=' ';

		foreach($requests as $request){
			$rqtype=$this->RequestType($request['lv_type']);
			if($request['lv_status']==0){
				$status="Pending";
			}elseif($request['lv_status']==1){
				$status="Approved";
			}else{
				$status="Rejected";
			}

			if(!empty($request['lv_date_to']) && $request['lv_date_to']!=$request['lv_date'] ){
			$days='<span class="float-left"> From : '.date('d M Y',$request['lv_date']).'  To : '.date('d M Y',$request['lv_date_to']).'</span>';			
			}else{
				$days='<span class="float-left"> Date : '.date('d M Y',$request['lv_date']).'</span>';
			}
			$output .='<div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air alert-dark" role="alert" style="margin-right: 20px; display: flow-root;">	
								<div style="width: 100%;display:block;">
								<span class="m-badge m-badge--primary m-badge--wide m-badge--rounded float-left m--font-bold">Type : ' .$rqtype.'</span>';
			if($status == "Approved"){
				$output .='<span class="m-badge m-badge--success m-badge--wide m-badge--rounded float-right m--font-bold">Status : '.$status.' </span>';
			}
			elseif($status == "Rejected"){
				$output .='<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded float-right m--font-bold">Status : '.$status.' </span>';
			}
			else{
				$output .='<span class="m-badge m-badge--primary m-badge--wide m-badge--rounded float-right m--font-bold">Status : '.$status.' </span>';
			}
			$output .='</div> <br /><br/>
								<p style="width: 100%;">
								<span class="float-left m--font-bold"> '.$days.'</span>
								<span class="float-right m--font-bold">Consent of : '.$request['approvedby'].'</span>
								</p>
								<br/>
								<p><span class="float-left m--font-bold">Reason : '.nl2br($request['lv_purpose']).'</span></p> 
						</div>';
		}	
		echo $output;
	}

/**
 * Request  module ends here......
 */


 /**
  * Starts activity module ...........
  */
    Public function get_check(){
		$user_id = $this->input->post('user_id');
		$this->load->model('User_model');
		$checklist = $this->User_model->checklist($user_id);
		$a = ''; 
		foreach($checklist as $list){
	        $a .="<tr><td>";
			$a .=$list['activity_name'];
			$a .="</td><td>";			
			$a .=$list['activity_desc'];
			$a .="</td><td>";			
//			$a .= date('d-m-Y',$list['assign_date']);
			$a .="</td>";
			if($list['work_status']==0){

				if($list['ass_act_fieldType']==0){

					$a .="<td><button id='status_btn_";
					$a .=$list['activity_id'];
					$a .= "' type='button' class='btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x' onclick=alter_checklist_stat(";
					$a .= $list['user_id'];
					$a .= ",";
					$a .= $list['activity_id'];
					$a .=");><i id='check_btn_";
					$a .=$list['activity_id'];
					$a .="'class='fa fa-times'></i></button>";
					$a .="</td></tr>";
				}else{
					//no need if text box
					$input_data = '';
					$weekstatus= '';
					//close no need
					$a  .='<td class="text-center"  id="check_btn_'.$list['activity_id'].'"> 
					<div class="row">
					<div class="col-md-4" style="margin-right: 0;padding: 0;"> <textarea style="background:#fff;border:1px solid #cecece;" class="form-control m-input m-input--solid" '.$weekstatus.' id="act_input_'.$list['activity_id'].'"  >'.$input_data.'</textarea></div>
					<div class="col-md-2 text-center"> <button id="as_act_btn'.$list['activity_id'].'"  onclick="update_as_act('.$list['activity_id'].')" type="button" '.$weekstatus.'  class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x"><i class="fa fa-save"></i></button></div> </div> </td>';
				}
			}else{
				$weekstatus = "disabled='true'";
				$statusclass="fa-check";
				$input_data=$list['reply'];
				$a  .='<td class="text-center"  id="check_btn_'.$list['activity_id'].'"> 
					<div class="row">
					<div class="col-md-4" style="margin-right: 0;padding: 0;"> <textarea style="background:#fff;border:1px solid #cecece;" class="form-control m-input m-input--solid" '.$weekstatus.' id="act_input_'.$list['activity_id'].'"  >'.$input_data.'</textarea></div>
					<div class="col-md-2 "> <button onclick="updateweekly('.$list['activity_id'].')" type="button" '.$weekstatus.'  class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x"><i class="fa fa-save"></i></button></div> </div> </td>';
			}
		}
	}

Public function get_daily_activities(){
		$user_id   =  $this->session->userdata('user_id');
		$this->load->model('User_model');
		$details    = $this->User_model->getallss($user_id);
		$dep_id    = $details[0]->dep_id;
		$skills		 = $this->User_model->getSkillSets($user_id);
		// echo"<div class='row'>
		// 		<div class='col-sm-12'>
		// 		<h5 class='m--font-primary'>JOB DESCRIPTION</h5>
		// 		<div style='padding: 20px; margin: 10px 0px 30px; border: 4px solid rgb(239, 239, 239);' class='text-justify'>";
		// echo nl2br($details[0]->job_desc); 
		// echo"</div> </div> </div> ";
		
//if ServerAdmins, then fetch tickets count 
		 if($dep_id==2 || $dep_id==46  || $dep_id==51  || $dep_id==52){ 
			$ticketCount = $this->getTicketsCount($dep_id);
			echo '<div id="hours_12">
				<div class="col-12 ">
					<div class="row">
						<div class="col-xs-4 col m-badge m-badge--rounded m-badge--handledtickets">
							<div class="panel status panel-danger">
								<div class="panel-heading text-left" >                        
									<h6>Handled Tickets</h6>
								</div>
								<div class="panel-body">
									<h1 class="panel-title text-left">'.$ticketCount['handled'].'</h1>
								</div>
							</div>
						</div>          
						<div class="col-xs-4 col m-badge m-badge--grey m-badge--rounded m-badge--resolvedtickets">
							<div class="panel status panel-lightblue">
								<div class="panel-heading text-left">
									<h6>Resolved Tickets</h6>
								</div>
								<div class="panel-body">                        
								<h1 class="panel-title text-left">'.$ticketCount['resolved'].'</h1>
								</div>
							</div>
						</div>
						<div class="col-xs-3 col m-badge m-badge--yellow m-badge--rounded m-badge--pendingtickets">
							<div class="panel status panel-success">
								<div class="panel-heading text-left">
									<h6>Pending Tickets</h6>
								</div>
								<div class="panel-body">                        
								<h1 class="panel-title text-left">'.$ticketCount['pending'].'</h1>
								</div>
							</div>
						</div>
						<div class="col-xs-3 col m-badge m-badge--blue m-badge--rounded m-badge--slavio">
							<div class="panel status panel-info">
								<div class="panel-heading text-left">
									<h6>SLA Violations</h6>
								</div>
								<div class="panel-body">                        
								<h1 class="panel-title text-left" id="sla_violation">'.$ticketCount['sla'].'</h1>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>';
				 } 
//----------------------------- Skilll updater starts ------------------------------
if($skills->status){
	echo '<div class="row">';
	echo '<div class="col-md-12">';
	echo '<h5 class="m--font-primary">SKILLS</h5>';
	echo '<div class="progress" style="margin-bottom: 15px;"><div class="progress-bar m--bg-info" role="progressbar" style="width: 20%; height: 1px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div></div>';
	echo "<div class='row'>";
	foreach ($skills->data as $skill){
		echo '<div class="col-md-4">
					<div style="float:left;" class="form-group m-form__group"> 
						<label for="exampleTextarea">'.$skill['skill_name'].'</label>
					</div>';
		if($skill['skill_update_status']==0 && $skill['skill_verify_status']==0){
			echo '<button style="float:right;    background-color: #e20e0ef7;border-color: #e20e0ef7;" onclick="skillStatusUpdater('.$skill['skill_id'].')" type="button" class="btn btn-sm skill'.$skill['skill_id'].'">
						<i style="font-size: 1.1rem;color:#fff" class="fa fa-square"></i>
					</button>';
		}
		if($skill['skill_update_status']==1 && $skill['skill_verify_status']==0){
			echo '<button style="float:right;background-color: #13bb29;border-color: #13bb29;" disabled="disabled"  type="button" class="btn btn-primary btn-sm">
						<i class="fa fa-check"></i>
					</button>';
		}
		if($skill['skill_update_status']==1 && $skill['skill_verify_status']==1){
			echo '<button style="float:right;background-color: #13bb29;border-color: #13bb29;"  type="button" class="btn btn-primary btn-sm">
						<i class="fa fa-check"></i>
					</button>';
		}
		echo '</div>';
	}
	echo"</div>";
	echo"</div>";
	echo"</div>";
}
//----------------------------- Skilll updater ends ------------------------------

//#######################daily Activity starts##################################

		$dat         = ''; 
		$dat1        = ''; 
		$dat2        = '';
		$statusfield =  0;	
		$daily_act_id_list ='';  
		$new_monthly_dat   = $this->User_model->get_ids_daily($user_id,$dep_id);
		foreach($new_monthly_dat as $new_mmarray){
			$daily_act_id_list[]=$new_mmarray['daily_act_id'];
		}
		$datas = $this->User_model->get_Daily_Acts($user_id,$dep_id);
		if(count($datas)>0){ 
			$att_det		       = $this->User_model->Get_All_att_log($user_id);
		if((!empty($att_det[0]['punchin'])) && (empty($att_det[0]['punchout']))){ 	
			$att_id   			   = $att_det[0]['att_id'];
			if((count($att_det)>0) && !empty($att_det[0]['work_report'])){
				$unser_work_report = unserialize($att_det[0]['work_report']);
			}else{ 
				$i=0;
				foreach($datas as $daily_act){
					$act_data[$daily_act['daily_act_id']]['field_type']  = $daily_act['field_type'] ;
					$act_data[$daily_act['daily_act_id']]['activity']    = $daily_act['daily_act'] ;
					$act_data[$daily_act['daily_act_id']]['status']      = 0 ;
					$act_data[$daily_act['daily_act_id']]['reply']       = '';
					$data['work_report']        						 = serialize($act_data);
					$this->User_model->Insert_wrk_rpt($data,$user_id,$att_id);
					$i++;
				}
			} 
			$unser = unserialize($att_det[0]['work_report']);
			//$this->dd($datas);
			 foreach($datas as $daily_acts){
				if($daily_acts['field_type']==0 ){
					$dat .=	"<div class='col-md-4'><div style='float:left;' class='form-group m-form__group'> <label for='exampleTextarea'>";
					
					$dat .=	$daily_acts['daily_act'];
					$dat .=	"</label></div>";
					if(!isset($unser[$daily_acts['daily_act_id']]['reply']) || $unser[$daily_acts['daily_act_id']]['reply']!=1){ 
						$dat .="<button style='float:right;' onclick='alter_daily_stat(";
						$dat .= $daily_acts['daily_act_id'];
						$dat .= ",".$att_id;
						$dat .=")' type='button' id='daily_status_btn_";
						$dat .= $daily_acts['daily_act_id'];
						$dat .="'class='btn btn-primary btn-sm text-right'><i id='daily_btn_";
						$dat .= $daily_acts['daily_act_id'];
						$dat .= "' class='fa fa-times'></i></button>";
					}else{	
						$dat .="<button style='float:right;' onclick='alter_daily_stat(".$daily_acts['daily_act_id'].")' type='button'class='btn btn-primary btn-sm'><i class='fa fa-check'></i></button>";
					}
							$dat .='</div>';
				}elseif($daily_acts['field_type']==1){
					$dat1 .= "<div class='col-md-12'><div id='ticket_details_div' class='hide'>hided div</div></div>";
					if($this->ticket_details_flag == true){
						$this->ticket_details_flag = false;
						$dat1 .= "<div class='col-md-12'><div id='submited_ticket_details'>".$this->submited_ticket_details()."</div></div>";
					}
					$dat1 .="<div class='col-md-12'><div class='form-group m-form__group'> <label for='exampleTextarea'>";
					$dat1 .=$daily_acts['daily_act'];
					$dat1 .="</label></div>";
					 if(!isset($unser[$daily_acts['daily_act_id']]['reply']) ||$unser[$daily_acts['daily_act_id']]['status']==0){ 

						$dat1 .="<textarea class='form-control m-input text-left' rows='4' id='daily_input_".$daily_acts['daily_act_id']."'  ></textarea>
						<div class='form-group m-form__actions text-right'> <br/> <button onclick='alter_daily_stat(";
						$dat1 .= $daily_acts['daily_act_id'];
						$dat1 .=")' type='button' id='daily_status_btn_";
						$dat1 .= $daily_acts['daily_act_id'];
						$dat1 .="'class='btn btn-primary btn-sm' style='height: auto;margin: auto;'>";
						$dat1 .= "<span>SAVE</span></button></div>";
				}else{	

					$dat1 .="<textarea  rows='4' class='form-control m-input text-left' id='daily_input_".$daily_acts['daily_act_id']."'  >".$unser[$daily_acts['daily_act_id']]['reply']."</textarea>
					<div class='form-group m-form__actions text-right'> <br/> <button onclick='alter_daily_stat(";
					$dat1 .= $daily_acts['daily_act_id'];
					$dat1 .=")' type='button' id='daily_status_btn_";
					$dat1 .= $daily_acts['daily_act_id'];
					$dat1 .="'class='btn btn-primary btn-sm' style='height: auto;margin: auto;'";
					$dat1 .= "<span>SAVE</span></button></div>";
				}
				$dat1 .="</div>";
				}else{ //For text field = 2 = number
				$dat2 .="<div class='col-md-3' style='margin-bottom:20px;'><div style='float:left;' class='form-group m-form__group col-md-12'> <label for='exampleTextarea'>";
				$dat2 .=$daily_acts['daily_act'];
				$dat2 .="</label></div>";

					if(!isset($unser[$daily_acts['daily_act_id']]['reply']) || $unser[$daily_acts['daily_act_id']]['status']!=0){
						

						switch ($daily_acts['daily_act_id']) {
							case 599:
							case 691:
							case 703:
							case 711:
								$dat2 .="<input style='width:35%;float:left;margin-left: 15px;' class='form-control m-input' type='text' disabled='true' value='".$unser[$daily_acts['daily_act_id']]['reply']."' id='daily_input_".$daily_acts['daily_act_id']."'/>";
								$dat2 .="<button style='float:left;margin-left: 15px;' onclick='alter_daily_stat(";
								$dat2 .= $daily_acts['daily_act_id'];
								$dat2 .=")' type='button' id='daily_status_btn_";
								$dat2 .= $daily_acts['daily_act_id'];
								$dat2 .="'class='btn btn-primary btn-sm text-right'>";
								$dat2 .= "<span>ADD</span></button>";
								break;

							case 693:
							case 600:
							case 701:
							case 709:
								$dat2 .="<input style='width:35%;float:left;margin-left: 15px;' class='form-control m-input' type='tel' value='".$unser[$daily_acts['daily_act_id']]['reply']."' id='daily_input_".$daily_acts['daily_act_id']."'/>";
								break;
							
							default:
								$dat2 .="<input style='width:35%;float:left;margin-left: 15px;' class='form-control m-input' type='tel' value='".$unser[$daily_acts['daily_act_id']]['reply']."' id='daily_input_".$daily_acts['daily_act_id']."'/>";
								$dat2 .="<button style='float:left;margin-left: 15px;' onclick='alter_daily_stat(";
								$dat2 .= $daily_acts['daily_act_id'];
								$dat2 .=")' type='button' id='daily_status_btn_";
								$dat2 .= $daily_acts['daily_act_id'];
								$dat2 .="'class='btn btn-primary btn-sm text-right'>";
								$dat2 .= "<span>SAVE TICKETS</span></button>";
								break;
						}

					}else{	

						switch ($daily_acts['daily_act_id']) {
							case 599:
							case 691:
							case 703:
							case 711:
								$dat2 .="<input style='width:35%;float:left;margin-left: 15px;' type='tel' disabled='true' class='form-control m-input' value='0' id='daily_input_".$daily_acts['daily_act_id']."' >";

								$dat2 .="<button onclick='alter_daily_stat(".$daily_acts['daily_act_id'].")' style='float:left;margin-left: 15px;' type='button' class='btn btn-primary btn-sm'><span>ADD</span></button>";
								break;

							case 600:
							case 693:
							case 701:
							case 709:
								$dat2 .="<input style='width:35%;float:left;margin-left: 15px;' type='tel' class='form-control m-input' id='daily_input_".$daily_acts['daily_act_id']."' >";
								break;
							
							default:
								$dat2 .="<input style='width:35%;float:left;margin-left: 15px;' type='tel' class='form-control m-input' id='daily_input_".$daily_acts['daily_act_id']."' >";

								$dat2 .="<button onclick='alter_daily_stat(".$daily_acts['daily_act_id'].")' style='float:left;margin-left: 15px;' type='button' class='btn btn-primary btn-sm'><span>SAVE TICKETS</span></button>";
								break;
						}

					}

						$dat2 .='</div>';



				}

	//			$dat .="Sttaatt";



				

			}

				echo '<br /> <div class="row">

			 <div class="col-md-12">

				<h5 class="m--font-primary">DAILY ACTIVITIES</h5>

				<div class="progress" style="    margin-bottom: 15px;">

									<div class="progress-bar m--bg-warning" role="progressbar" style="width: 20%; height: 1px;"  aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>

								</div>

			 </div></div>';
			 echo "<div  class='row mat1'>$dat</div><br/>";
		     echo "<div  class='row mat2'>$dat2</div><br/>";
			 echo "<div  class='row mat3'>$dat1</div><br/>"; 
			//  if($dep_id==2){
			//  echo '<a onclick="reports_user_mod()"><button style="float:left;" id="view_all_rpt" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  >View All Reports</button></a> <br /> <br /> ';
			// }//Details of tickets
			 if($dep_id==16  || $dep_id==18 ){
				echo '<form id="addJD_form22" action="'. base_url("admin/change_jd").'" method="post">
									<div class="modal-body" style="padding-left: 0; padding-right: 0;padding-top: 0;">
										<div class="m-portlet__body" style="padding-left: 0;padding-right: 0;padding-top: 0;">
											<div class="form-group ">
											<div class="row">
											<div class="col-md-12">
											<div class="form-group m-form__group "  id="add_daily_container">
													<div id="add_daily" >
														<label class="form-control-label ">
															 Details of tickets worked
														</label>
														<textarea placeholder="You can add reports for additional tasks if you`ve done any." rows="6" style="border-color: #6867dd;"  class="form-control m-input" name="daily_act" id="work_report"></textarea>											
													</div>
											</div>
									<div class="form-group m-form__group text-right">
										<button id="add_work_button" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  onclick="add_workreport()">Save </button>
									</div>
										<div id="new_acct"></div>
									</div>
									<div class="col-md-12">
										<div id="work_lists" style="max-height: 250px;overflow: auto; text-overflow: ellipsis; white-space: normal; word-break:break-all;" > 
										</div>
									</div>
									</div>
									</div>
								</div>
							</div>
						</form>';

	}
			//Close details of tickets
			}
			else{
				echo('<div  class="row"><div class="col-md-12"><span style="color: red;border: 1px solid #dedede;display: block;padding: 15px;">You have to punchin to view your daily reports </span> </div></div><br />
				<a onclick="reports_user_mod()"><button style="float:left;" id="view_all_rpt" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  >View All Reports</button></a>
				<br /> <br /> ');
			}
		}

#######################daily Activity Ends##################################



#######################weekly Activity starts#################################

$lastsun=strtotime('last Sunday');
$weekly_activity= $this->User_model->Fetch_weekly_activity($dep_id);

			

			if(count($weekly_activity)>0){

				$weeks  =' ';

				$weeks2 = '';

				$weeks3 = '';

				foreach($weekly_activity as $week){

						/*echo "<pre>";

						print_r($week);

						echo "</pre>";*/

						

						$weekly_data= $this->User_model->checkWeekStatus($user_id,$lastsun,$week['wa_id']);

						$weekstatus =" ";

						$statusclass="fa-times";

						$input_data='';

//for testing

		/*				if($user_id==360){

							echo "<pre>";

							print_r($weekly_data);

							echo "</pre>";

						}*/

//for testing	

						if(count($weekly_data)>0){
							$weekstatus =" ";
							$statusclass="fa-check";
							$input_data=$weekly_data[0]['wd_status'];
						}
						//check field type
//						$weeks  .="<td>".nl2br($week['wa_activity'])."</td>";
						if($week['wa_field_type']==0){ //field type checkbox
							$weeks  .="<div class='col-md-4'>";
							$weeks  .="<div style='float:left;'' class='form-group m-form__group'><label for='exampleTextarea'>".($week['wa_activity'])."</label></div>";
							$weeks  .='<div class="form-group m-form__group text-left"  id="weekly_act_'.$week['wa_id'].'"> <button style="float:right;" onclick="updateweekly('.$week['wa_id'].')" type="button" '.$weekstatus.'  class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x"><i id="weekly_act_btn'.$week['wa_id'].'" class="fa '.$statusclass.'"></i></button> </div> </div>';
						}elseif($week['wa_field_type']==1){ //Field type text area
							$weeks2  .="<div class='col-md-12'>";
							$weeks2  .="<div class='form-group m-form__group'><label for='exampleTextarea'>".nl2br($week['wa_activity'])."</label></div>";
							$weeks2 .='<div class="text-center"  id="weekly_act_'.$week['wa_id'].'"><textarea rows="4"  class="form-control m-input" '.$weekstatus.' id="weekly_input_'.$week['wa_id'].'"  >'.$input_data.'</textarea></div> <br/><div class="form-group m-form__grou text-right"><button onclick="updateweekly('.$week['wa_id'].')" type="button" '.$weekstatus.'  class="btn btn-primary btn-sm text-right"><span>SAVE</span></button></div></div>';
				}else{ //Field type number
						$weeks3  .="<div class='col-md-6'>";
						$weeks3  .="<div style='float:left;'' class='form-group m-form__group'><label for='exampleTextarea'>".($week['wa_activity'])."</label></div>";
						$weeks3  .='<div class="form-group m-form__group text-left"  id="weekly_act_'.$week['wa_id'].'"><input style="width:45%;float:left;"  class="form-control m-input" type="number" value="'.$input_data.'" id="weekly_input_'.$week['wa_id'].'"/><button style="float:right;" onclick="updateweekly('.$week['wa_id'].')" type="button" '.$weekstatus.'  class="btn btn-primary btn-sm text-right"><span>SAVE</span></button> </div> </div>';				
						}

				}
			echo '<br/> <div ><div class="row">
			 <div class="col-md-12">
				<h5 class="m--font-primary">WEEKLY ACTIVITIES</h5>
				<div class="progress" style="    margin-bottom: 15px;">
			<div class="progress-bar m--bg-danger" role="progressbar" style="width: 20%; height: 1px;"  aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

			 </div></div>';

			 echo "<div  class='row'>$weeks</div><br/>

			 		<div  class='row'> $weeks2</div><br/>

			 		<div class='row'> $weeks3</div>

					</div></div>";		

			

			}

//weekly activity ends



#######################weekly Activity Ends##################################		

//Starts Monthly activity	

		$user_id = $this->session->userdata('user_id');

		$this->load->model('User_model');

		$user_data = $this->User_model->getallss($user_id);

//		echo('<pre>');

//		print_r($user_data[0]->dep_id);

//		echo('</pre>');

		$monthly_act = $this->User_model->fetch_monthly_activities($user_data[0]->dep_id);
		if(count($monthly_act)>0){
			$month_a = ' ';
			$month_a2 = ' ';
			$month_a3 = ' ';
			$weekstatus = '';
			foreach($monthly_act as $m_act){
				$date = strtotime('01-m-Y');
				$this->load->model('User_model');
				$res = $this->User_model->check_monthly_datas($user_id,$m_act['ma_id'],$date);
					$M_input_data = "";

				if(count($res)>0){
				    $M_statusclass="fa-check";
					$M_input_data = $res[0]->md_status;
					if($m_act['ma_field_type']==0){	//field type Checkbox					
						$month_a  .="<div  class='col-md-4'><div style='float:left;' class='form-group m-form__group'><label for='exampleTextarea'>".nl2br($m_act['ma_activity'])."</label></div>";
						$month_a  .='<div style="float:right;" class="form-group m-form__grou text-right "  id="monthly_act_'.$m_act['ma_id'].'"> <button style="float:right" onclick="updatemonthly('.$m_act['ma_id'].')" type="button" '.$weekstatus.' class="btn btn-primary btn-sm text-right"><i id="m_stat_btn_'.$m_act['ma_id'].'" class="fa '.$M_statusclass.'"></i></button> </div></div>';
					}elseif($m_act['ma_field_type']==1){ //Field type Text area
						$month_a2 .="<div class='col-md-12'><div class='form-group m-form__group'><label for='exampleTextarea'>".nl2br($m_act['ma_activity'])."</label></div>";
						$month_a2 .='<div class="text-center"  id="monthly_act_'.$m_act['ma_id'].'"><textarea rows="4" style="background:#fff;border:1px solid #cecece;" class="form-control m-input" id="monthly_input_'.$m_act['ma_id'].'">'.$M_input_data.'</textarea></div><div class="form-group m-form__group text-right" style="margin-right: 0;padding: 0;" > <br/><button onclick="updatemonthly('.$m_act['ma_id'].')" type="button" class="btn btn-primary btn-sm text-right"><span>SAVE</span></button> </div></div>';
					}else{
						$month_a3 .="<div class='col-md-4'><div class='form-group m-form__group'><label for='exampleTextarea'>".nl2br($m_act['ma_activity'])."</label></div>";
						$month_a3 .='<div class="text-center"  id="monthly_act_'.$m_act['ma_id'].'"><input style="width:45%;float:left;"  class="form-control m-input" type="number" value="'.$input_data.'" id="monthly_input_'.$m_act['ma_id'].'"/><button style="float:right;" onclick="updatemonthly('.$m_act['ma_id'].')" type="button" '.$weekstatus.'  class="btn btn-primary btn-sm text-right"><span>SAVE</span></button> </div></div>';
					}
					//Close if
				}else{
						$M_statusclass="fa-times";
						$M_statusclass = 'fa-times' ;
						if($m_act['ma_field_type']==0){
							$month_a  .="<div class='col-md-4'><div  style='float:left;' class='form-group m-form__group'>
		<label for='exampleTextarea'>".nl2br($m_act['ma_activity'])."</label></div>";
							$month_a  .='<div style="float:right;" class="form-group m-form__group"  id="monthly_act_'.$m_act['ma_id'].'"> <button  onclick="updatemonthly('.$m_act['ma_id'].')" type="button" '.$weekstatus.' class="btn btn-primary btn-sm "><i id="m_stat_btn_'.$m_act['ma_id'].'" class="fa '.$M_statusclass.'"></i></button> </div></div>';
						}elseif($m_act['ma_field_type']==1){
							$month_a2 .="<div class='col-md-12'><div class='form-group m-form__group'>
		<label for='exampleTextarea'>".nl2br($m_act['ma_activity'])."</label></div>";
							$month_a2 .='<div class="text-center"  id="weekly_act_'.$m_act['ma_id'].'">
							 <textarea rows="4" style="background:#fff;border:1px solid #cecece;" class="form-control m-input" id="monthly_input_'.$m_act['ma_id'].'">'.$M_input_data.'</textarea></div>
							<br/>	<div class="form-group m-form__group text-right" style="margin-right: 0;padding: 0;"> <button onclick="updatemonthly('.$m_act['ma_id'].')" type="button" class="btn btn-primary btn-sm text-right"><span>SAVE</span></button></div> </div>';
						}
					   else{
						   	$month_a3 .="<div class='col-md-4'><div class='form-group m-form__group'>
		<label for='exampleTextarea'>".$m_act['ma_activity']."</label></div>";
						$month_a3 .='<div class="text-center"  id="monthly_act_'.$m_act['ma_id'].'"> 
						 <input style="width:45%;float:left;"  class="form-control m-input" type="number" value="'.$input_data.'" id="monthly_input_'.$m_act['ma_id'].'"/> 
						<button style="float:right;" onclick="updatemonthly('.$m_act['ma_id'].')" type="button" '.$weekstatus.'  class="btn btn-primary btn-sm text-right"><span>SAVE</span></button> </div></div>';
					   }
				}
			}
			echo '<br/> <div><div class="row">
			 <div class="col-md-12">
				<h5 class="m--font-primary">MONTHLY ACTIVITIES</h5>
				<div class="progress" style="    margin-bottom: 15px;">
									<div class="progress-bar m--bg-success" role="progressbar" style="width: 20%; height: 1px;"  aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
			 </div></div>';
			 echo "<div class='row'>$month_a</div><br/><div class='row'>$month_a2</div><br/><div class='row'>$month_a3</div></div>";
		}
//Close Monthly activity

	}

/**
 * Update monthly activity datas..........
 */
	Public function checkrow_in_monthlydata(){
		$input_data = $this->input->post('monthly_inputValue');
		$mid = $this->input->post('mid');
		$user_id = $this->session->userdata('user_id');
		$this->load->model('User_model');
		$res = $this->User_model->checkrow($mid,$user_id);
		if( count($res) >0 ){
			foreach($res as $result){
				$md_id = $result['md_id'];
				$data['user_id'] = $this->session->userdata('user_id');
				$data['md_status'] = $input_data;
				$data['monthly_id'] = $mid;
				$reply = $this->User_model->update_m_status($data,$md_id);
				print_r($reply);
			}
		}else{
				$data['md_date'] = strtotime('now');
				$data['user_id'] = $this->session->userdata('user_id');
				$data['md_status'] = $input_data;
				$data['monthly_id'] = $mid;				
				$rep = $this->User_model->insert_m_status($data); 
				print($rep);
		}
	}

	public function get_saved_ticket_details(){
		$result = $this->submited_ticket_details();
		echo $result;
	}

	public function submited_ticket_details(){
		$this->load->model('User_model');
		$user_id = $this->session->userdata('user_id');
		$current_timestamp = strtotime('now');
		$attendance_log = $this->User_model->get_dailyStatus($user_id);
		$att_id = $attendance_log->att_id;
		$date = date('Y-m-d', $current_timestamp);
		$result = $this->User_model->get_submited_ticket_details($user_id, $att_id);
		if(!$result){
			return '';
		}
		
		$message_content = '<table class="table m-table m-table--head-bg-brand table-striped">';
		$message_content .= '<thead>';
		$message_content .= '<tr>';
		$message_content .= '<th width="80px">Ticket Url</th>';
		$message_content .= '<th width="400px">Response</th>';
		$message_content .= '<th width="80px">SLA</th>';
		$message_content .= '<th width="80px">Action</th>';
		$message_content .= '</tr>';
		$message_content .= '</thead>';
		$message_content .= '<tbody>';

		foreach ($result as $key => $value) {
			$message_content .= '<tr>';
			$message_content .= '<td><a target="_blank" href="'.$value->ticket_id.'">'.$value->ticket_id.'</a></td>';
			$message_content .= '<td>'.$value->response.'</td>';
			$message_content .= '<td>'.$value->sla.'</td>';
			$message_content .= '<td><a href="javascript:void(0)" onclick="view_ticket_details_edit('.$value->id.')">Update Response</a></td>';
			$message_content .= '</tr>';
		}

		$message_content .= '</tbody>';
		$message_content .= '</table>';
		$message_content .= '<p><a onclick="reports_user_mod()"><button style="float:left;margin-bottom: 20px;" id="view_all_rpt" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  >View All Reports</button></a></p> ';


		return $message_content;
		
	}

	public function get_ticket_response(){
		$this->load->model('User_model');
		$ticket_id = $this->input->post('ticket_id');
		$response = $this->User_model->get_response_with_ticket_id($ticket_id);
		$this->jsonOutput($response);
	}

	public function update_ticket_response(){
		$this->load->model('User_model');
		$ticket_id = $this->input->post('ticket_id');
		$response = $this->input->post('response');

		$result = $this->User_model->update_ticekt_response($response, $ticket_id);
		$this->jsonOutput($result);
	}

	//Updating reply of assigned activities
	Public function update_assigned_Act_stat(){

		$Assi_activity['user_id'] = $this->session->userdata('user_id');

//		$Assi_activity['activity_id']=$this->input->post('last_act_id');

//		$Assi_activity['reply_date']=strtotime('now');

		$Assi_activity['work_status']= 1;

		$Assi_activity['status']= 1;

		$Assi_activity['reply']=$this->input->post('act_inputValue');

		$this->load->model('User_model');

		echo $this->User_model->updateAssiStatus($Assi_activity);

	}

	//Close reply of assigned activities

	Public function update_weekly(){

		$wactvity['user_id'] = $this->session->userdata('user_id');

		$wactvity['weekly_id']=$this->input->post('wa_id');

		$wactvity['wd_date']=strtotime('now');

		$wactvity['wd_status']=$this->input->post('weekly_inputValue');

		$this->load->model('User_model');

		$lastsun=strtotime('last Sunday');

//		echo $this->User_model->updateWeeklyStatus($wactvity);

		$w_data = $this->User_model->check_weekrow_in_data($wactvity,$lastsun);

		if(count($w_data) >0 ){

			foreach($w_data as $wdat){

//				print_r($wdat);

				$week_id = $wdat['wd_id'];

				$weekData['wd_status'] = $this->input->post('weekly_inputValue');;

				$this->load->model('User_model');

				$w_data1 = $this->User_model->update_w_status($weekData,$week_id);

				

			}

			echo($w_data1);

		}

		else{

				$W_Dat['user_id'] = $this->session->userdata('user_id');

				$W_Dat['weekly_id'] = $this->input->post('wa_id');

				$W_Dat['wd_date']=strtotime('now');

				$W_Dat['wd_status']=$this->input->post('weekly_inputValue');

				$w_data2 = $this->User_model->ins_week_row($W_Dat);

				echo($w_data2);

		}

		

	}
/** Alter ticket updates and monthly weekly activity updates etc. */
Public function alter_daily_status(){ 	

		$daily_data_id     = $this->input->post('daily_act_id');
		$att_id           	   = $this->input->post('att_id');
		$daily_input        = $this->input->post('daily_inputValue');
		$ticket_details_a  = $this->input->post('ticket_details_a');

		if($ticket_details_a){
			$details_update_res = $this->update_ticket_details($ticket_details_a);
			if($details_update_res == false){
				$this->jsonOutput(['status' => false, 'message' => 'Ticket details update failed']);
			}
		}
		$this->load->model('User_model');
		$user_id 											   = $this->session->userdata('user_id');
		$daily_datas_stat  			    				   = $this->User_model->get_dailyStatus($user_id);
		$unser_data        			  					    = unserialize($daily_datas_stat->work_report);	
		$sla_violation										 = $daily_datas_stat->sla_violation;
		$unser_data[$daily_data_id]['status']	  = 1;
		$daily_input   										  = $this->clean($daily_input);
		$unser_data[$daily_data_id]['reply'] 	   = html_escape($daily_input);
		$unser_data[$daily_data_id]['time'] 	  = strtotime('now');
		$ser_dat      										   = serialize($unser_data);	
		$result['sla']										  = 0;
		if($ticket_details_a[0]['sla']=="30 - 35 min" || $ticket_details_a[0]['sla']=="35 - 40 min" || $ticket_details_a[0]['sla']=="40 - 45 min" || $ticket_details_a[0]['sla']=="45 - 50 min" || $ticket_details_a[0]['sla']=="50 - 55 min" || $ticket_details_a[0]['sla']=="55 - 60 min" || $ticket_details_a[0]['sla']=="above 1 hour"){
			$ser['sla_violation']							= $sla_violation+1;
			$result['sla']										=$ser['sla_violation'];
		}
		$ser['work_report']								  = $ser_dat; 
		$result['status']									= $this->User_model->update_dailyStatus($ser,$user_id);
		echo json_encode($result);
	}

	private function update_ticket_details($ticket_details_a){
		$this->load->model('User_model');
		$user_id = $this->session->userdata('user_id');
		$attendance_log = $this->User_model->get_dailyStatus($user_id);
		$att_id = $attendance_log->att_id;
		$ticket_ins = [];
		foreach ($ticket_details_a as $key => $value) {
			$insert_a = new stdClass();
			$insert_a->att_id = $att_id;
			$insert_a->user_id = $user_id;
			$insert_a->ticket_id = $value['ticket_id'];
			$insert_a->response = htmlspecialchars($value['response']);
			$insert_a->sla = $value['sla'];
			array_push($ticket_ins, $insert_a);
		}
		$result = $this->User_model->update_ticket_details($ticket_ins);
		return $result;
	}

	//Tickets Done
	Public function Save_Tickets_done(){
		$user_id		    = $this->session->userdata('user_id');
		$ticket_handled = $this->input->post('ticket_handled'); 
//		print_r($no_tickets_done);
		if($ticket_handled==''){
			echo($data['stat']=0);
		}
		else{
			$this->load->model('User_model');

			$tickets['user_id'] = $user_id;

			$tickets['tk_count'] = $ticket_handled;

			$tickets['tk_type'] = 'HANDLED';			

			$tickets['tk_date'] = strtotime('now');	

			

			$save_ticket = $this->User_model->Update_Tickets_done($tickets);

			if($save_ticket==1){

				echo($data['stat']=2);

			}

			else{

				echo($data['stat']=0);

			}

//			echo($data['stat']=1);

		}

		

		

	}

	//Close tickets done


	//Tickets resolved

		Public function Save_Tickets_resolved(){

		$user_id = $this->session->userdata('user_id');

		$ticket_resolved = $this->input->post('ticket_resolved'); 

//		print_r($no_tickets_done);

		if($ticket_resolved==''){

			echo($data['stat']=0);

		}

		else{

			

			$this->load->model('User_model');

			$tickets['user_id'] = $user_id;

			$tickets['tk_count'] = $ticket_resolved;

			$tickets['tk_type'] = 'RESOLVED';			

			$tickets['tk_date'] = strtotime('now');	

			

			$save_ticket = $this->User_model->Update_Tickets_resolved($tickets);

			if($save_ticket==1){

				echo($data['stat']=2);

			}

			else{

				echo($data['stat']=0);

			}

//			echo($data['stat']=1);

		}

		

		

	}

	//Close Tickets resolved

	

	//Tickets Done

	Public function Save_Tickets_Pending(){

		$user_id = $this->session->userdata('user_id');

		$no_tickets_pending = $this->input->post('tickets_pending'); 

//		print_r($no_tickets_done);

		if($no_tickets_pending==''){

			echo($data['stat']=0);

		}

		else{

			

			$this->load->model('User_model');

			$tickets['user_id'] = $user_id;

			$tickets['tk_count'] = $no_tickets_pending;

			$tickets['tk_type'] = 'PENDING';			

			$tickets['tk_date'] = strtotime('now');			

			$save_ticket = $this->User_model->Update_Tickets_pending($tickets);

			if($save_ticket==1){

				echo($data['stat']=2);

			}

			else{

				echo($data['stat']=0);

			}

//			echo($data['stat']=1);

		}
	}
	//Close Tickets done
	//Start Work report

	Public function add_work_report(){
		$this->load->model('User_model');
		$work_rep			  = $this->input->post('work_reports');
		$user_id             	= $this->session->userdata('user_id');
		$session_data        = $this->session->userdata('punchin_'.$user_id);
		//$at_id 		     	 = $session_data['at_id'];
		$get_punch_att      = $this->User_model->Get_att_bfr_punchout($user_id);
		$att_id              	 = $get_punch_att->att_id;
		$data['att_id']      	= $att_id;
		$data['user_id']      = $user_id;
		$data['att_id']      	= $att_id;
		$data['workreport']  = $work_rep;
		$data['time']        = date('dS M Y h:i a');
		$now                   = date('d-m-Y');
		$data['date']        = strtotime($now);
//		$last_ins_id         = $this->User_model->Add_workreport($data);
		$last_ins_id         = $this->User_model->Add_workreport($data);
		$ret_data['last_ins_id'] = $last_ins_id;
		$ret_data['time']    = date('h:i a');
//		echo($last_ins_id);
		echo json_encode($ret_data);
	}
	//Close Work report
	//Delete Work report
	Public function delete_work_report(){
		$workreport_id = $this->input->post('workreport_id');
		$this->load->model('User_model');
		$del_stat = $this->User_model->Delete_workreport($workreport_id);
		echo($del_stat);
	}

	//Close deleting

	

	//Get work report

	Public function get_work_report(){
		$user_id = $this->session->userdata('user_id');
		$day = date('dS M Y');
		$this->load->model('User_model');
		$w_report = $this->User_model->Get_work_report($user_id,$day);
//		print_r($w_report);
		echo json_encode($w_report);
	}
	//Close getting work report
	//View all work reports

	Public function ViewAllReports(){
		$user_id = $this->session->userdata('user_id');		
		$this->load->model('User_model');
		$all_info						 = $this->User_model->getall($user_id);
		$date_of_join				 =	$all_info->date_of_join;
		$getLeaveResetDate		= $this->getLeaveResetDate($date_of_join);
		$data 							= $all_info;
		$data->all_reports 		  = $this->User_model->viewAll_work_report($user_id);
		$data->casual				= $this->User_model->Noofcasualleaves($user_id, $getLeaveResetDate);
		$data->sick					= $this->User_model->Noofsickleaves($user_id, $getLeaveResetDate);
		$data->wfh					= $this->User_model->NoofWFH($user_id, $getLeaveResetDate);
		$data->lop					=$this->User_model->NoofLOP($user_id,$getLeaveResetDate);
		$this->load->view('user/work_reports',$data);
	}

	Public function alter_Status(){
		$user_id 			= $this->input->post('user_id');
		$act_id				 = $this->input->post('act_id');
		$reply_date		  = date('d-m-Y');
		$this->load->model('User_model');
		$this->User_model->alterStatus($user_id,$act_id,$reply_date);
	} 

	Public function View_all_workreports(){
		$user_id = $this->session->userdata('user_id');
		echo json_encode($all_reports);
	}
	// Close view all work reports
//Activity module   ends
/**
 * screen shots upload
 */
Public function workscreenshort(){
	$this->load->model('User_model');
	$user_id			   = $this->session->userdata('user_id');
	$session_data       = $this->session->userdata('punchin_'.$user_id);
	$get_punch_att     = $this->User_model->Get_att_bfr_punchout($user_id);
	@$at_id      		   = $get_punch_att->att_id;	
	if(empty($at_id)){
		echo "<b style='color:red'>Please Punchin! </b>";
		exit;
	}
	if($_POST['image_form_submit'] == 1){
	$images_arr = array();
	if(array_key_exists('images',$_FILES)){
		foreach($_FILES['images']['name'] as $image){		
		  $imageFileType = pathinfo($image,PATHINFO_EXTENSION);
		  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "PNG"  && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "Only JPG, JPEG & PNG files are allowed.";
			exit;
		  }
		}
		foreach($_FILES['images']['name'] as $key=>$val){	
			$image_name 				= $_FILES['images']['name'][$key];
			$tmp_name 					= $_FILES['images']['tmp_name'][$key];
			$size 						      = $_FILES['images']['size'][$key];
			$type 							 = $_FILES['images']['type'][$key];
			$error 						   	 = $_FILES['images']['error'][$key];
			############ Remove comments if you want to upload and store images into the "uploads/" folder #############
			$target_dir					    = FCPATH."/assets/screenshort/";
			$temp							= explode(".", $_FILES["images"]["name"][$key]);
			$newfilename 				= strtotime('now').'sc_'.$user_id.'_'.$key. '.' . end($temp);
			$img['di_image_name']  =$newfilename;
			$img['di_date']				 = strtotime('now');
			$img['user_id']				 = $user_id;
			$img['att_id']				  = $at_id;
			$target_file		   	  	   = $target_dir.$newfilename;
			$compress_upload 	     = $this->compress_image($_FILES['images']['tmp_name'][$key], $target_file, 20);
			if($compress_upload == true){
				$images_arr[]			= $target_file;
				$this->load->model('User_model');
				$this->User_model->insertImgData($img);
			}
		}
	}
	else{
			echo "Please retry";
		}
	//Generate images view
	if(!empty($images_arr)){
		echo  "Successfully uploaded!";		
	}else{
		echo "Please retry";
	}
}
}

public function compress_image($source_url, $destination_url, $quality) {

  $info = getimagesize($source_url);

  if ($info['mime'] == 'image/jpeg')
  $image = imagecreatefromjpeg($source_url);

  elseif ($info['mime'] == 'image/gif')
  $image = imagecreatefromgif($source_url);

  elseif ($info['mime'] == 'image/png')
  $image = imagecreatefrompng($source_url);

  $result = imagejpeg($image, $destination_url, $quality);
  
  if($result == 1){
  	return true;
  }else{
  	return false;
  }
  
}

//screen short upload
	Public function reports_user(){
		$date 		= $this->input->post('date_of_report');
		if($date ==''){
			$date = date('d-m-Y');
		}
		$user_id 	= $this->session->userdata('user_id');
		$this->load->model('User_model');
		$c_date = strtotime($date);
		$compare_dates = $this->User_model->Compare_date_work($c_date,$user_id);
//		print_r(count($compare_dates));
		$list_report = ''; 
		$error_msg = '';
		if(count($compare_dates)==0){
//			$error_msg .= "<div style='color:red;border:1px solid red;padding:10px;' class='text-center'>Sorry !!! No records found </div>";
//			$list_report = '';
			$error_msg .= "<div style='color:#083aad;border:1px solid #fff;padding:40px;background:#c5c5c6;text-align:center;'><b>Sorry...No records found</b></div>";
		}else{
			    $error_msg   = '';
				foreach($compare_dates as $list){
					$list_report  .= "<tr><td style='text-overflow: ellipsis; white-space: normal; word-break:break-all; '>";
					$list_report  .= nl2br($list['workreport']);
					$list_report  .= "<td>";
					$list_report  .= $list['time'];
					$list_report  .= "</td></tr>";
			}
		}
		//ce table

			echo"<div class='m-portlet container-fluid'>
							<div class='m-portlet__body'>
								<!--begin::Section-->
								<div class='m-section'>
									<div class='m-section__content'>
			<div class='row'>
			<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'>
				<thead style='background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;'>
						<th>Report</th>
						<th>Date & Time</th>
					</thead>";
		echo $list_report;
		echo "</tr></table>	</div>";
		echo $error_msg;
		echo"</div></div></div></div>"; 
	}
	Public function save_tasks(){
		$data['tasks_list'] = $this->input->post('task_list');
		$data['tasks_label'] = $this->input->post('task_label');
		$data['user_id'] = $this->session->userdata('user_id');
//		print_r($data['user_id']);
//		$date = date('d-m-Y');
		$data['time'] = strtotime('now');
//		print_r(date('d-m-Y h:i:s a',$time));
		$this->load->model('User_model');		
		$listing = $this->User_model->Insert_task_list($data);
//		print_r($listing);
		echo $listing;
	}

	

	Public function MonthlyActivities(){
		$user_id = $this->session->userdata('user_id');
		$this->load->model('User_model');
		$user_data = $this->User_model->getallss($user_id);
		$monthly_act = $this->User_model->fetch_monthly_activities($user_data[0]->dep_id);
		if(count($monthly_act)>0){
			$month_a = '';
			foreach($monthly_act as $m_act){
			    $date = strtotime('01-m-Y');
				$this->load->model('User_model');
				$res = $this->User_model->check_monthly_datas($user_id,$m_act['ma_id'],$date);
				if(count($res)>0){
//					echo('nothing');
					$reply = "";
						$month_a  .="<tr>";						
//						$weeks  .="<td>".nl2br($week['wa_activity'])."</td>";
						if($m_act['ma_field_type']==0){
						$weeks  .="<td>".nl2br($m_act['ma_activity'])."</td>";
						$weeks  .='<td class="text-left"  id="monthly_act_'.$m_act['ma_id'].'"> <button onclick="updateweekly('.$m_act['ma_id'].')" type="button" '.$weekstatus.'  class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x"><i class="fa '.$statusclass.'"></i></button> </td></tr>';
				}else{
					$month_a2  .="<tr><td>".nl2br($m_act['ma_activity'])."</td>";
					$month_a2 .='<td class="text-center"  id="weekly_act_'.$m_act['wa_id'].'"> 
					<div class="row">
					<div class="col-md-10" style="margin-right: 0;padding: 0;"> <textarea style="background:#fff;border:1px solid #cecece;" class="form-control m-input m-input--solid" '.$weekstatus.' id="weekly_input_'.$m_act['wa_id'].'"  >'.$reply.'</textarea></div>
					<div class="col-md-2 text-center"> <button onclick="updateweekly('.$m_act['wa_id'].')" type="button" '.$weekstatus.'  class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x"><i class="fa fa-save"></i></button></div> </div> </td>';
				}
				}else{

//					echo('YY?');
//					$dat['user_id']    = $user_id;
//					$dat['monthly_id'] = $m_act['ma_id'];
//					$dat['md_date']    = $m_act['ma_date'];
//					$this->User_model->ins_repeat_monthly_datas($dat);
				}

			}
//			$this->load->model('User_model');
//			$user_data = $this->User_model->check_monthly_datas($user_id);
		}
			echo "<br><div class='row'>
			 <div class='col-sm-9'>
				<h5 class='m--font-primary'>MONTHLY ACTIVITIES</h5>
			 </div>
			 <div> ";
			 echo"</span></div>
		</div>
		<table class='table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover'>
				<tr>
				<thead style='background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;'>
					<th>Activities</th>
					<th>Status</th>
					</thead>
				</tr>
				<tbody>";
//				echo $weeks;
//				echo $weeks2; 
		echo "<tbody></table>";
	}
	Public function add_new_att_row(){ 
		$this->load->model('User_model');
		$user_ids     = $this->User_model->get_all_users_id();
		$nxt_month 	  = strtotime('first day of next month'); //To get next month 
		$next_month   = date('mY',$nxt_month);
		foreach($user_ids as $uids){ 
				$user_id = $uids['user_id'];
//				$user_id 		   = 434;  
				$this->load->model('User_model');
				$checking_rowCM    = $this->User_model->cheching_row_att($user_id,$next_month);

				if(count($checking_rowCM)==0){			
					$last_day 		   = strtotime('last day of next month'); 
					$last_day 		   = date('j',$last_day);
					for($i=1;$i<=$last_day;$i++){ 
						$at_timing[$i] = array(); 
					} 
					$data['at_timing'] = serialize($at_timing);
					$data['user_id']   = $user_id;
					$data['at_month']  = $next_month;
					$this->load->model('User_model');
					$result = $this->User_model->insert_new_row_att($data);

			}
		}
	}

//Code for working and pending hours

	Public function Pending_working(){ 

		$session_id = $this->session->userdata('user_id');

		if($session_id == 441 || $session_id == 405 || $session_id == 434){

						

// ..........Start working hours and pending hours display..................

		

		$lastsun 			= strtotime('last Sunday');

		$today_time 		= strtotime('now');

		$hours_rows 		= $this->User_model->get_pending_working($lastsun,$today_time,$session_id);

//		echo('<pre>');

//		print_r($hours_rows);

//		echo('</pre>');

		

		if(count($hours_rows) > 0){

//			$wh_minute = ($hours_rows[0]['hrs_worked'])%60;

			$wh_minute = ($hours_rows[0]['hrs_worked']);

			$wh_hr     = $wh_minute; 

			$wh_minute=round($wh_minute);

			$totalMinutes=($wh_minute%60);

			$totalHrs=($wh_minute-$totalMinutes)/60;

			$result->wrking_hrs=$totalHrs.":".$totalMinutes." Hrs";

//			$wh_hr = (($hours_rows[0]['hrs_worked']) - $wh_minute)/60;

		//	$result->wrking_hrs = date(' H:i', mktime(0, $wh_minute))." Hrs ";

//			$result->wrking_hrs = $wh_hr." Hrs";

//			$result->wrking_hrs = round($wh_hr,2)." Hrs";

			$PendingHrs=round($hours_rows[0]['pending_hrs']);

			$ph_minute = $PendingHrs%60;

			$ph_hr     = ($PendingHrs - $ph_minute)/60;

//			$result->wrking_hrs  = date(' H : i', mktime(0, $wh))." Hrs";

//			$result->pending_hrs = $ph_hr." Hrs";

			$result->pending_hrs = $ph_hr.":".$ph_minute." Hrs";

			//$result->pending_min = $ph_minute." Hrs";

//			$result->pending_hrs = date(' H : i', mktime(0, $hours_rows[0]['pending_hrs']))." Hrs";

			

		} 

		else{

			$res                 = $this->User_model->get_calcs();

			$result->wrking_hrs  = "00:00 Hrs";

			$result->pending_hrs = $res[0]['pending_calc']." Hrs";

		}

		 

// ..........End working hours and pending hours display..................

		} 

	

	}

//close code for working and pending hours

	

	//.........................start Code for cron..............................

	Public function repeat_working_hrs(){

//		$session_id = $this->session->userdata('user_id');

//		if($session_id == 441){

			

		$this->load->model('User_model');

		$lastsun 			= strtotime('last Sunday');

		$today_time 		= strtotime('now');

		$repeating_rows 	= $this->User_model->get_repeating_weeks($lastsun,$today_time);

//		print_r($repeating_rows);

		

		if(count($repeating_rows) > 0){

//			print_r($repeating_rows);

			

			$get_calcs 			= $this->User_model->get_calcs();

			$fixed_pending_hrs 	= $get_calcs[0]['pending_calc'] ;

			$time_conv 			= explode(':', $fixed_pending_hrs);

			$fix_pend_minutes 	= ($time_conv[0]*60) + ($time_conv[1]);

			

			foreach($repeating_rows as $res){

				

				$rep_data['user_id'] 		= $res['user_id'];

				$rep_data['hrs_worked'] 	= 0;

				$rep_data['pending_hrs'] 	= round(($res['pending_hrs'] + $fix_pend_minutes),2); 

				$rep_data['date'] 			= strtotime('now');

				

				$finish = $this->User_model->create_new_row($rep_data);

//				echo($finish);

			}

			//mail function

			$subject = "Work Report  -  ";			

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

			$this->email->from('gg@gmail.com','HashRoot PE Portal');

			//$this->email->to('renjith.kr@hashroot.com');

  			$this->email->subject($subject);			

			$this->email->message('hiii This is a  test mail from cron job');

  			$this->email->send();			

		//mail function Ends

	
		}

		

//		}

		

		

	}

	

//.........................Close code for cron........................

	

//notification

	Public function notification(){ 

  	

		if($this->input->post('linkd_notify')){ 

							

				$data['not_user']=$this->session->userdata('user_id');

				$data['not_status']=1;

				$this->load->model('User_model');

				$not_data['status'] = $this->User_model->Insert_notifn($data);

				}

		

		else{

				$data['not_user']=$this->session->userdata('user_id');

				$data['not_status']=0;

		}

				

		echo(json_encode($data));

	}

	

	Public function notfound(){ 

	$this->load->view('404');

	}

	public function l1Promotion_reminder(){
		$this->load->model('User_model');
		$date = date("Y-d-m", strtotime('now'));
		$start_date = date('Y-m-d 00:00:00');
		$end_date = date('Y-m-d 23:59:00');
		
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);

		$l1_eng = $this->User_model->getAllL1($start_date, $end_date);
		// $this->dd($l1_eng);
		if($l1_eng){

			
			$message_content = '<h3 style="text-align: center">New Promotion list</h3>';
			$count = 1;
			$team_name = '';
			foreach ($l1_eng as $key => $value) {
				
				if($team_name != $value->team_name){
					$team_name = $value->team_name;
					$count = 1;
					$message_content .= '</table>';

					$message_content .= '<h4 style="text-align: center;">'.$team_name.'</h4>';
					$message_content .= '<table border="1" style="text-align:center; float: none; margin: auto; width: 100%;">';
					$message_content .= '<thead>';
					$message_content .= '<tr>';
					$message_content .= '<td>No.</td>';
					$message_content .= '<td>Name</td>';
					$message_content .= '<td>Designation</td>';
					$message_content .= '</tr>';
					$message_content .= '</thead>';
					$message_content .= '<tbody>';
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';


				}else{
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';
				}

			
				$this->User_model->update_promotion_status($value->user_id, $value->fullname);
				$count++;
			}

			$date = date('d-m-Y');
			
			$message_content .= '</table>';

			$subject	   = "Promotion list - ".$date;			
			$config        = array(
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
			$this->email->from('site@hashroot.com','HashRoot PE Portal');
			$this->email->to('requests@hashroot.com');
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 300px;"><br>
				'.$message_content.'
			 </div>');
			$this->email->send();

		}else{
			echo 'No Promotion List available';
		}
	}

	public function sendBreaTime(){
		$this->load->model('User_model');

		$date = date("Y-d-m", strtotime('now'));
		$start_date = date('Y-m-d 00:00:00');
		$end_date = date('Y-m-d 23:59:00');
		
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);

		$users = $this->User_model->retrieve_un_breaked_users($start_date, $end_date);
		$date = date('d-m-Y');
		if($users){
			
			$message_content = '';
			$count = 1;
			$team_name = '';
			foreach ($users as $key => $value) {
				
				if($team_name != $value->team_name){
					$team_name = $value->team_name;
					$count = 1;
					$message_content .= '</table>';

					$message_content .= '<h4 style="text-align: center">'.$team_name.'</h4>';
					$message_content .= '<table border="1" style="text-align:center; float: none; margin: auto;  width: 100%;">';
					$message_content .= '<thead>';
					$message_content .= '<tr>';
					$message_content .= '<td>No.</td>';
					$message_content .= '<td>Name</td>';
					$message_content .= '<td>Designation</td>';
					$message_content .= '</tr>';
					$message_content .= '</thead>';
					$message_content .= '<tbody>';
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';


				}else{
					$message_content .= '<tr>';
					$message_content .= '<td>'.$count.'</td>';
					$message_content .= '<td>'.$value->fullname.'</td>';
					$message_content .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$value->designation.'</td>';
					$message_content .= '</tr>';
				}

				$count++;
			}

			
			

			$subject	   = "Zero Break Time List - ".$date;			
			$config        = array(
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
			$this->email->from('site@hashroot.com','HashRoot PE Portal');
			$this->email->to('hr@hashroot.com');
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 300px;"><br>
				'.$message_content.'
			 </div>');
			$this->email->send();

		}else{
			echo 'No employees were available';
		}

	}


	public function start_wfh_break(){
		$this->load->model('User_model');
		$current_time = strtotime('now');
		
		$user_id = $this->session->userdata('user_id');
		$wfh_a = $this->User_model->get_last_wfh_break($user_id);
		
		$where_a = ['user_id' => $user_id, 'id' => $wfh_a->id];
		$update_a = ['start_time' => $current_time];

		$update_res = $this->User_model->update_wfh_break($where_a, $update_a);
		if($update_res == true){
			$this->jsonOutput(['status' => true, 'message' => 'WFH break started']);
		}else{
			$this->jsonOutput(['status' => false, 'message' => 'Sorry some error occured']);
		}
	}

	public function end_wfh_break(){
		$this->load->model('User_model');
		$current_time = strtotime('now');
		$user_id = $this->session->userdata('user_id');
		$wfh_a = $this->User_model->get_last_wfh_break($user_id);

		$start_time = $wfh_a->start_time;
		$total_stored_time = $wfh_a->total_time;

		$total_time_taken = $current_time-$start_time;
		// $total_time_taken_sec = ($total_time_taken/60)%60;
		$total_time_taken_sec = $total_time_taken;

		$stored_total_time = $wfh_a->total_time;

		$total_time = $stored_total_time+$total_time_taken_sec;

		$where_a = ['user_id' => $user_id, 'id' => $wfh_a->id];
		$update_a = ['end_time' => $current_time, 'total_time' => $total_time];

		$update_res = $this->User_model->update_wfh_break($where_a, $update_a);

		if($update_res == true){
			$this->jsonOutput(['status' => true, 'message' => 'WFH break finished']);
		}else{
			$this->jsonOutput(['status' => false, 'message' => 'Sorry some error occured']);
		}
	}


	public function dd($val){
		echo '<pre>';
		print_r($val);
		echo '</pre>';
		exit();
	}
	

	public function jsonOutput($data){
		echo json_encode($data);
		exit();
	}


	public function get_work_loc(){
		$this->load->model('User_model');
		$user_id = $this->session->userdata('user_id');
		$work_loc = $this->User_model->Get_All_att_log($user_id);
		// $this->dd($work_loc);
		if($work_loc){
			$this->jsonOutput(['status' => true, 'work_loc' => $work_loc[0]['work_loc'] ]);
		}else{
			$this->jsonOutput(['status' => false, 'message' => 'No data found']);
		}
	}

	public function get_ticket_count(){
		$this->load->model('User_model');
		$user_id = $this->session->userdata('user_id');
		$attendance_log = $this->User_model->get_dailyStatus($user_id);
		if(array_key_exists('work_report',$attendance_log)){
			$log_a = unserialize($attendance_log->work_report);
			foreach ($log_a as $key => $value) {
				if(in_array($key,array(599,691,703,711))){
					$total_count = $value['reply'];
					$this->jsonOutput(['status' => true, 'total_count' => intval($total_count)]);
				}
			}
		}else{
			$this->jsonOutput(['status' => false, 'total_count' => 0]);
		}
	}

	public function get_own_work_report(){
		$this->load->model('User_model');
		$date = $this->input->post('date_of_report');
		$date = strtotime($date);
		$start_date = date('Y-m-d 00:00:00', $date);
		$start_date = strtotime($start_date);
		$end_date = date('Y-m-d 23:59:00', $date);
		$end_date = strtotime($end_date);

		// $this->dd(['start_date' => $start_date, 'end_date' => $end_date]);

		$user_id = $this->session->userdata('user_id');
		$attendance_log = $this->User_model->get_dailyStatus_with_date($user_id, $start_date, $end_date);
		// $this->dd($attendance_log);
		if(!$attendance_log){
			$this->jsonOutput(['status' => false, 'message' => 'Sorry no records found']);
		}

		$att_id = $attendance_log->att_id;
		$result = $this->User_model->get_ticket_details($user_id, $att_id, $date, 'own_work_report');
		$this->jsonOutput($result);
	}
	public function skillStatusUpdater(){
		$skill_id = $this->input->post('skill_id');
		$this->load->model('User_model');
		$result = $this->User_model->skillStatusUpdater($skill_id);
		//print_r($result->status); 
		if($result->status){
			$userDetails          = $this->User_model->getEmployeeInfo($skill_id);
			$subject	            = "Review Request from ".$userDetails->fullname;	
			$message_content =	$userDetails->skill_name;
			$config        = array(
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
			$this->email->from('site@hashroot.com','HashRoot PE Portal Review Request');
			$this->email->to('requests@hashroot.com');
			$this->email->subject($subject);			
			$this->email->message('<div style="font-family:calibri; max-width: 300px;"> Employee name : '.$userDetails->fullname.'<br /> Requested for Review :	<b>'.$message_content.' </b><br /> Request time : '.date("d F Y h.i A").'</div>');
			$this->email->send();
		}
		$this->jsonOutput($result);
	}

	public function send_alert_via_fcm($token){
		$msg = array
        (
            'alert'   => 'PE - Portal',
            'body'   => 'Please check PE-Portal for idle timer',
            'message'   => 'Please check PE-Portal for idle timer',
            'title'     => 'Hashroot',
            'subtitle'  => '',
            'tickerText'    => 'Please check PE-Portal for idle timer',
            'vibrate'   => 1,
            'sound'     => 'default',
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon',
        );

        /**
         * managing notification alert box in browser
         */
	    $notification = new stdClass;
	    $notification->title = 'PE - Portal';
	    $notification->body = 'Please check PE-Portal for idle timer';
	    $notification->click_action = 'javascript:void(0);';
	    $notification->icon = 'https://www.hashroot.com/assets/images/logo-white.png';
	    
	    
	    // $msg = array_merge($msg, $extra_data);
	 
	    $fields = array
	    (
	        'registration_ids' => [0=>$token],
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
	    $this->jsonOutput($result);
	}

	/**
	 * Dashboard Graph Starts ::For graph data
	 */
	public function getUserWorkAndBreakTime(){
		$user_id 						= $this->session->userdata('user_id');
		// $user_data					  = $this->User_model->getuser($user_id);
		// $date_of_join				 = $user_data[0]->date_of_join;
		// $getLeaveResetDate		= $this->getLeaveResetDate($date_of_join);
		$this->load->model('User_model');
		$datas=$this->User_model->UserWorkAndBreakTime($user_id);
		//get all days
		if(count($datas)<=0){
			exit();
		}
		$fromD=date('Y-m-d',$datas[0]->punchin);
		$ToD=date('Y-m-d');
		$period = new DatePeriod(
			new DateTime($fromD),
			new DateInterval('P1D'),
			new DateTime('tomorrow')
	   );
	   foreach ($period as $key => $value) {
		   $flag					 = 0;
		   $WT		   				= 0;
		   $BT						= 0;
		   $result[$key]['flexi']  	= 0;
		   $result[$key]['extra']     = 0;
		   $result[$key]['work']     = 0;
		foreach ($datas as $index=>$data){
			if(date("Y-m-d",$data->punchin)==$value->format('Y-m-d')){
				$flag								=1;
				$result[$key]['date'] 		= date("Y-m-d",$data->punchin);
				 $WT 							 = $WT+$data->worked_time;
				 $BT                               = $BT+$data->total_break;
				$workingTime			    = $this->convertToHour($data->worked_time);
				$BreakTime			 	     = $this->convertToHour($data->total_break);
				if($data->work_loc==4){
					$result[$key]['date']      = date("Y-m-d",$data->punchin);
					$result[$key]['break']    = round($BreakTime,2);
					$result[$key]['flexi']  	= round($workingTime,2);
					$result[$key]['status']     = "flexi";
				}elseif($data->work_loc==3){
					$result[$key]['date']      = date("Y-m-d",$data->punchin);
					$result[$key]['break']    = round($BreakTime,2);
					$result[$key]['extra']     = round($workingTime,2);
					$result[$key]['status']     = "extra";
				}else{
					$result[$key]['date']      = date("Y-m-d",$data->punchin);
					$result[$key]['work']     = round($workingTime,2);
					$result[$key]['break']    = round($BreakTime,2);
					$result[$key]['status']     = "regular";
				}

			}
		
		}
		if($flag==0){
			$result[$key]['date'] = $value->format('Y-m-d');
				$result[$key]['work'] 	= 0;
				$result[$key]['break'] = 0;
				$result[$key]['flexi']  	= 0;
				$result[$key]['extra']     = 0;
				$result[$key]['status']     = "none";
		}
	}
	echo json_encode($result); 
	}
function convertToHour($sec){
		$seconds		  = ($sec-($sec%60));
		$minutes		  = $seconds/60;
		$minMod			 = ($minutes%60);
		$min		 		= $minMod/100;
		$hrs			  	 = (($minutes-$minMod)/60);
		$realtime  		   = $hrs+$min;
		return $realtime;
	}
/**
 * Graph:  Performance score Vs Integirty score Vs Cultural score
 */
Public function scoreAdjustmentGraph(){
	$user_id 						= $this->session->userdata('user_id');
	$this->load->model('User_model');
	$data			= $this->User_model->scoreAdjustmentGraph($user_id);
	$total_ce	   = 0;
	$total_pe	   = 0;
	$total_ie		= 0;

	foreach ($data as $index => $score) {
		$result[$index]['date'] = date("Y-m-d",$score->time);
		if($score->cri_type==3){
			$total_ce				 		 = $total_ce+$score->point;
			$result[$index]['ce'] 		 = $total_ce;
			$result[$index]['pe'] 		 = $total_pe;
			$result[$index]['ie'] 		  = $total_ie;
			$result[$index]['ce_criteria'] = $score->criteria;
			$result[$index]['pe_criteria'] = "";
			$result[$index]['ie_criteria'] = "";
		}elseif($score->cri_type==1){
			$total_pe				  = $total_pe+$score->point;
			$result[$index]['pe'] = $total_pe;
			$result[$index]['ce'] = $total_ce;
			$result[$index]['ie'] = $total_ie;
			$result[$index]['ce_criteria'] = "";
			$result[$index]['pe_criteria'] = $score->criteria;
			$result[$index]['ie_criteria'] = "";
		}else{
			$total_ie				  = $total_ie+$score->point;
			$result[$index]['ie'] = $total_ie;
			$result[$index]['pe'] = $total_pe;
			$result[$index]['ce'] = $total_ce;
			$result[$index]['ce_criteria'] = "";
			$result[$index]['pe_criteria'] = "";
			$result[$index]['ie_criteria'] = $score->criteria;
		}
	}
	echo json_encode($result); 
}

/**
 * Graph : Handled tickets Vs Resolved tickets Vs Pending tickets Vs SLA errors 
 */
public function workReportGraph(){

	$this->load->model('User_model');
	$user_id   			= $this->session->userdata('user_id');
	$data				 = $this->User_model->workReportGraph($user_id);

	foreach ($data as $index => $report) {
		$tickets			 	  			    = (unserialize($report->work_report)); 
		$result[$index ]['date']     	  = date("Y-m-d",$report->punchin);
		$result[$index ]['resolved']    = ($tickets[600]['reply']) ? $tickets[600]['reply'] : 0;
		$result[$index ]['pending']     = ($tickets[601]['reply']) ? $tickets[601]['reply'] : 0;
		$result[$index ]['handled']     = ($tickets[599]['reply']) ? $tickets[599]['reply'] : 0;
		$result[$index ]['sla']     	   = (int)$report->sla_violation;
	}
	echo json_encode($result); 
}

/**
 * Dashboard Graph :End::For graph data
 */

	 function getTicketsCount($dep_id){
		$user_id   = $this->session->userdata('user_id');
		$this->load->model('User_model');
		$data		= $this->User_model->workReportGraph($user_id);
		$result['resolved'] =0;
		$result['pending'] =0;
		$result['handled'] =0;
		$result['sla'] =0;
		foreach ($data as $index => $report) {
			$tickets			 	   = (unserialize($report->work_report)); 
			if($dep_id==2){
				$result['resolved']    = $result['resolved']+$tickets[600]['reply'];
				$result['pending']     = $result['pending']+$tickets[601]['reply'];
				$result['handled']     = $result['handled']+$tickets[599]['reply'];
				$result['sla']     		  = $result['sla']+$report->sla_violation;
			}

			if($dep_id==51){
				$result['resolved']    = $result['resolved']+$tickets[701]['reply'];
				$result['pending']     = $result['pending']+$tickets[702]['reply'];
				$result['handled']     = $result['handled']+$tickets[703]['reply'];
				$result['sla']     		  = $result['sla']+$report->sla_violation;
			}
			if($dep_id==52){
				$result['resolved']    = $result['resolved']+$tickets[709]['reply'];
				$result['pending']     = $result['pending']+$tickets[710]['reply'];
				$result['handled']     = $result['handled']+$tickets[711]['reply'];
				$result['sla']     		  = $result['sla']+$report->sla_violation;
			}

		}
		return($result); 
	}

//assignment 
function ifTaskCreator(){
	$response = [];
	$user_id   = $this->session->userdata('user_id');
	$this->load->model('User_model');
	$data		= $this->User_model->ifTaskCreator($user_id);
	if(count($data)>0){
		$response['status'] = true;
	}else{
		$response['status'] = false;
	}
	echo json_encode($response); 
}

function getTeamData(){
	$user_id   = $this->session->userdata('user_id');
	$this->load->model('User_model');
	$data		= $this->User_model->getTeamData($user_id);
	echo json_encode($data); 
}


/** 
 * Creating a new task*
 */
function addNewAssignment(){

	$data					  =    [];
	$user_id 				 =	 $this->session->userdata('user_id');
	$title						=	$this->input->post('title');
	$body					 =	 $this->input->post('body');
	$assign_to		   		=	$this->input->post('user_id');
	$period		   			  =	 $this->input->post('period');
	$date		   			  =	  $this->input->post('date');

	if(!$title || $title=="" || $assign_to=="" || !$assign_to || !$period || $period==""){
		$data['status']=1;
		$data["message"]="Mandatory fields cannot be empty!";
		echo json_encode($data); 
		exit();
	}

	if(!$date || $title==""){
		$date			=	0;
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
				$data["message"]="Only JPG, PNG, DOC, DOCX & PDF files are allowed.";
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


	$this->load->model('User_model');
	$comments   = array(); 
	$comments	= serialize($comments);
	$insert_assignment = [
							'title' => $title,
							'body' => $body,
							'creator_id' => $user_id,
							'status' =>0,
							'period' =>$period,
							'assign_to'=>$assign_to,
							'comments'=>$comments,
							'date'		   =>$date,
							'task_attachment'=>$task_attachment
						];
	$data['record_id']		= $this->User_model->addNewAssignment($insert_assignment);
	if(!$data['record_id']){
		$data['status']=1;
		$data["message"]="Something went wrong! Please try again!";
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

	$task_creator		=	$this->User_model->getuser($user_id)[0]->fullname;
	$assignee			=	 $this->User_model->getuser($assign_to)[0]->fullname;
	$subject	        =  "PE Portal - Task Assigned";
	$date_created 		=  date("d M Y h:i:sa");
	$message_body 		=	" Hi ".$assignee.", 
										<p>
											A new  ".$period_text." task has been assigned by ".$task_creator." on ".$date_created."
											<h4>Task : </h4> ".$title."
											<h4>Task in detail : </h4><p>".$body."</p>
											".$date_text."
										</p>";

	$config       	= array(
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
	$this->email->to($this->User_model->getuser($assign_to)[0]->email);
	$this->email->subject($subject);			
	$this->email->message($message_body);
	$this->email->send();

	$data['status']		= 0;
	$data["message"]="New task created succesfuly!";
	echo json_encode($data); 
}

/**
 * Fetch tasks
 */
function getTaskList(){
	$user_id 				 =	 $this->session->userdata('user_id');
	$this->load->model('User_model');
	$data		= $this->User_model->getTaskList($user_id);
	if($data != ""){
		foreach($data as $key=>$value){
			if($data[$key]->task_attachment == ""){
				$data[$key]->task_attachment = "";
			}
			else{
				$data[$key]->task_attachment = unserialize($data[$key]->task_attachment);
			}
		}
	}
	echo json_encode($data); 
}




function getOwnTaskList(){
	$user_id 				 =	 $this->session->userdata('user_id');
	$this->load->model('User_model');
	$data		= $this->User_model->getOwnTaskList($user_id);
	if($data != ""){
		foreach($data as $key=>$value){
			if($data[$key]->task_attachment == ""){
				$data[$key]->task_attachment = "";
			}
			else{
				$data[$key]->task_attachment = unserialize($data[$key]->task_attachment);
			}
		}
	}
	echo json_encode($data); 
}

/** Update tasks reply or comments */
function updateTaskComment(){
	$user_id 				 =	 $this->session->userdata('user_id');
	$asgnmnt_id				=	$this->input->post('task_id');
	$comment				=	htmlspecialchars($this->input->post('comment'));
	$status					    =	$this->input->post('status');
	 if($status){
		 $status=1;
	 }else{
		$status=0;
	 }
	 if(!$comment || $comment==""){
		$response['status'] = false;
		$response['message']="comment field is mandatory!";
		echo json_encode($response);
		exit();
	 }

	

	$this->load->model('User_model');
	$data		= $this->User_model->getTask($asgnmnt_id);


	$getComment  = unserialize($data->comments);


	$newComment['date']							 = 	 date("dFY h:i:s a");
	$newComment['time_stamp']				=	strtotime("now");
	$newComment['comments']					=	$comment;
	$newComment['status']						=	$status;
	$newComment['name']						   =	$this->User_model->getuser($user_id)[0]->fullname;
	array_push($getComment,$newComment);
	
	$serializeComment	=	serialize($getComment);
	$serializeComment	=	["comments"=>$serializeComment,"status"=>$status];
	$updateStatus		   =	 $this->User_model->updateTaskComment($asgnmnt_id,$serializeComment);

	if($updateStatus){
		if($user_id==$data->creator_id){
			$Receiver			=	$this->User_model->getuser($data->assign_to)[0]->fullname;
			$Sender				=	$this->User_model->getuser($data->creator_id)[0]->fullname;
			$ReceiverEmail	 =	$this->User_model->getuser($data->assign_to)[0]->email;
		}elseif($data->creator_id==1){
			$Receiver			=	"Anees T";
			$Sender				=	$this->User_model->getuser($data->assign_to)[0]->fullname;
			$ReceiverEmail	 =	 "anees@hashroot.com";
		}elseif($data->creator_id==7){
			$Receiver			=	"Muneer Muhammad";
			$Sender				=	$this->User_model->getuser($data->assign_to)[0]->fullname;
			$ReceiverEmail	 =	 "muneer@hashroot.com";
		}else{
			$Receiver			=	$this->User_model->getuser($data->creator_id)[0]->fullname;
			$Sender				=	$this->User_model->getuser($data->assign_to)[0]->fullname;
			$ReceiverEmail	 =	 $this->User_model->getuser($data->creator_id)[0]->email;
		}


		$subject	               =  "PE  Tasker - New comment activity by ".$Sender;
		$date_created 			=  date("d M Y h:i:sa");
		$message_body 		 =	" Hi ".$Receiver.", 

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
		//$this->email->to('renjith.kr@hashroot.com');
		$this->email->to($ReceiverEmail);
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

function viewTaskDetails(){

	$asgnmnt_id				=	$this->input->post('asgnmnt_id');
	$this->load->model('User_model');
	$data		= $this->User_model->getTask($asgnmnt_id);
	if($data->status==1){
		$data->status = "Done";
	}else{
		$data->status = "In Progress";
	}
	
	if($data->creator_id==1){
		$data->fullname		=	"Anees T";
	}elseif($data->creator_id==7){
		$data->fullname		=	"Muneer";
	}else{
		$data->fullname =$this->User_model->getuser($data->creator_id)[0]->fullname;
	}
	if($data->period=="ONE"){
		$data->date = date('d F Y',strtotime($data->date));
	}
	$data->comments = unserialize($data->comments);
	$data->body = nl2br($data->body);
	if($data->task_attachment == ""){
		
		$data->task_attachment = "";
	}
	else{
		$data->task_attachment = unserialize($data->task_attachment);
	}

	echo json_encode($data);
}

function deleteTask(){

	$asgnmnt_id				=	$this->input->post('asgnmnt_id');
	$this->load->model('User_model');
	$data		= $this->User_model->deleteTask($asgnmnt_id);
	if($data){
		$response['status']	       =  $data;
		$response['message']	= "Removed successfuly";
	}else{
		$response['status']	 		= $data;
		$response['message']	= "Try again later!";
	}
	echo json_encode($response);
}

/**
 * Tasks ends here........
 */

/**
 * Score details 
 */
public function get_evaluation_details(){

	$performance_id = $this->input->post('performance_id');

	$field = $this->input->post('field');
     
	$this->load->model('Admin_model');
	$user_id = $this->session->userdata('user_id');
	$result = $this->Admin_model->pe_history($user_id);
	
	$output_a = [];

	foreach ($result as $value) {

		if(strtolower($value->criteria) == strtolower($field)){



			$insert_a = new stdClass();

			$insert_a->score = $value->point;

			$insert_a->date = date('Y-m-d',$value->time);

			$insert_a->comment = $value->comments;

			array_push($output_a, $insert_a);
			

		}

	}


	if(count($output_a)>0){

		echo json_encode(['status' => true, 'data' => $output_a]);

	}else{

		echo json_encode(['status' => false, 'message' => 'Sorry no data available.']);

	}

}

}

?>