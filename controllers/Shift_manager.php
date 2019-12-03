<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Shift_manager extends CI_Controller{

	private $user_id = 0;
	private $team_id = 0;

	public function __construct(){
		parent::__construct();
		$this->load->model('Shift_model');
		$this->user_id = $this->session->userdata('user_id');
		if($this->user_id){
			$this->team_id = $this->Shift_model->getTeamId($this->user_id);
		}else{
			$this->user_id = $this->session->userdata('id');
		}
	}

	/**
	 * create a new shift
	 */
	public function createShift(){
		$curr_date = date("y-m-d");
		$curr_day = date('l', strtotime($curr_date));

		$date_a['date_from'] = $this->getWeekStartDate($curr_date, $curr_day);

		$morning_shift = $this->input->post('morning_shift');
		$evening_shift = $this->input->post('evening_shift');
		$night_shift = $this->input->post('night_shift');
		$off = $this->input->post('off');
		$day = $this->input->post('day');
		$comment = $this->input->post('comment');

		/**
		 * fetching end date with add 6 days
		 */
		
		$date = date_create($date_a['date_from']);
		date_add($date,date_interval_create_from_date_string("6 days"));
		$date_a['date_to'] = date_format($date,"Y-m-d");
		$date_a['team_id'] = $this->team_id;

		switch ($curr_day) {
			case 'Saturday':
				$date = date_create($curr_date);
				date_add($date,date_interval_create_from_date_string("2 days"));
			    $date = date_format($date,"Y-m-d");
			    $week_res = $this->Shift_model->createShiftWeek($date_a, $this->team_id, $date);
				break;

			case 'Sunday':
				$date = date_create($curr_date);
				date_add($date,date_interval_create_from_date_string("1 days"));
			    $date = date_format($date,"Y-m-d");
			    $week_res = $this->Shift_model->createShiftWeek($date_a, $this->team_id, $date);
				break;
			
			default:
				$week_res = $this->Shift_model->createShiftWeek($date_a, $this->team_id, $curr_date);
				break;
		}

		// $week_res = $this->Shift_model->createShiftWeek($date_a, $this->team_id);

		$weekId = $week_res['weekId'];
		$order = $this->getShiftOrder($day);
		$shiftDay = $this->Shift_model->createShiftDay($weekId, $day, $comment, $order);

		$checkShiftRecord = $this->Shift_model->checkShiftRecord($weekId, $shiftDay);

		if($checkShiftRecord){
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry, this shift already exists!']);
		}

		$mng_a = [];
		$eve_a = [];
		$ngt_a = [];
		$off_a = [];

		if($morning_shift){
			$mng_a = $this->getShiftArray($morning_shift, $weekId, $shiftDay, $comment, 'morning');
		}else{
			$mng_a = $this->dummyShift( $weekId, $shiftDay, $comment, 'morning');
		}

		if($evening_shift){
			$eve_a = $this->getShiftArray($evening_shift, $weekId, $shiftDay, $comment, 'evening');
		}else{
			$eve_a = $this->dummyShift( $weekId, $shiftDay, $comment, 'evening');
		}

		if($night_shift){
			$ngt_a = $this->getShiftArray($night_shift, $weekId, $shiftDay, $comment, 'night');
		}else{
			$ngt_a = $this->dummyShift( $weekId, $shiftDay, $comment, 'night');
		}

		if($off){
			$off_a = $this->getShiftArray($off, $weekId, $shiftDay, $comment, 'off');
		}else{
			$off_a = $this->dummyShift( $weekId, $shiftDay, $comment, 'off');
		}

		$insert_a = array_merge($mng_a, $eve_a, $ngt_a, $off_a);
		$shift_res = $this->Shift_model->createShift($insert_a);

		$this->jsonOutput($shift_res);

	}

	/**
	 * function which used for find week start date, in case of saturday will find the next start date of week.
	 */
	
	private function getWeekStartDate($date, $day){
		switch ($day) {
			case 'Sunday':

				$date = date_create($date);
				date_add($date,date_interval_create_from_date_string("1 days"));
			    return date_format($date,"Y-m-d");

				break;
			
			case 'Monday':
			
				return $date;

				break;

			case 'Tuesday':

				$date = date_create($date);
				date_sub($date,date_interval_create_from_date_string("1 days"));
			    return date_format($date,"Y-m-d");

				break;

			case 'Wednesday':

				$date = date_create($date);
				date_sub($date,date_interval_create_from_date_string("2 days"));
			    return date_format($date,"Y-m-d");

				break;

			case 'Thursday':

				$date = date_create($date);
				date_sub($date,date_interval_create_from_date_string("3 days"));
			    return date_format($date,"Y-m-d");

				break;

			case 'Friday':

				$date = date_create($date);
				date_sub($date,date_interval_create_from_date_string("4 days"));
			    return date_format($date,"Y-m-d");

				break;

			case 'Friday':

				$date = date_create($date);
				date_sub($date,date_interval_create_from_date_string("5 days"));
			    return date_format($date,"Y-m-d");

				break;

			case 'Saturday':

				$date = date_create($date);
				date_add($date,date_interval_create_from_date_string("2 days"));
			    return date_format($date,"Y-m-d");

				break;
		}
	}

	private function getShiftOrder($day){
		switch ($day) {
			case 'Sunday':

				return 7;

				break;
			
			case 'Monday':
			
				return 1;

				break;

			case 'Tuesday':

				return 2;

				break;

			case 'Wednesday':

				return 3;

				break;

			case 'Thursday':

				return 4;

				break;

			case 'Friday':

				return 5;

				break;

			
			case 'Saturday':

				return 6;

				break;
		}
	}

	/**
	 * generate an array with shift record.
	 */
	private function getShiftArray($data, $weekId, $day, $comment, $shift){
		$shift_a = [];

		$users = implode(", ", $data);
		$shift_a[0]['week_id'] = $weekId;
		$shift_a[0]['shift'] = $shift;
		$shift_a[0]['users'] = $users;
		$shift_a[0]['team_id'] = $this->team_id;
		$shift_a[0]['created_by'] = $this->user_id;
		$shift_a[0]['day'] = $day;		


		return $shift_a;
	}

	/**
	 * return a dummy shift for plain shift
	 */
	private function dummyShift( $weekId, $day, $comment, $shift){
		$shift_a = [];

		$shift_a[0]['week_id'] = $weekId;
		$shift_a[0]['shift'] = $shift;
		$shift_a[0]['users'] = '-';
		$shift_a[0]['team_id'] = $this->team_id;
		$shift_a[0]['created_by'] = $this->user_id;
		$shift_a[0]['day'] = $day;	

		return $shift_a;
	}

	/**
	 * return next shift result
	 * @return [type] [description]
	 */
	public function previewShift(){
		$date = date("Y-m-d");
		$day = date('l', strtotime($date));

		switch ($day) {
			case 'Saturday':
				$date = date_create($date);
				date_add($date,date_interval_create_from_date_string("2 days"));
			    $date = date_format($date,"Y-m-d");
				break;

			case 'Sunday':
				$date = date_create($date);
				date_add($date,date_interval_create_from_date_string("1 days"));
			    $date = date_format($date,"Y-m-d");
				break;
			
			default:
				$date = $this->getWeekStartDate($date, $day);
				break;
		}

		$weekId = $this->Shift_model->getWeekIdForPreview($this->team_id, $date);

		if(!$weekId){
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry! No records found']);
		}
		$shiftDay = $this->Shift_model->getShiftDay($weekId->id);

		$data_a = [];
		$i = 0;
		/**
		 * Creating and design an array for table display in frontend
		 */
		foreach ($shiftDay as $row) {
			$j = 0;
			$data_a[$i]['day'] = $row['day'];
			$data_a[$i]['comment'] = $row['comment'];
			$data_a[$i]['id'] = $row['id'];
			$data_a[$i]['shift'] = $this->Shift_model->getShiftRecords($weekId->id, $row['id'], $this->user_id);
			foreach ($data_a[$i]['shift'] as $value) {

				if($value['swap_user'] != 0){
					$data_a[$i]['shift'][$j]['swap'] = $this->Shift_model->getSwapDetails($value['id']);
				}else{
					$data_a[$i]['shift'][$j]['swap'] = [];
				}

				$j++;
			}
			$i++;
		}

		if($data_a){
			$this->jsonOutput(['status' => 'success', 'data' => $data_a]);
		}else{
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry no records available']);
		}
	}

	/**
	 * load all shifts
	 */
	public function loadShifts(){
		$date = date("y-m-d");
		$day = date('l', strtotime($date));

		$weekId = $this->Shift_model->getWeekId($this->team_id);
		if(!$weekId){
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry! No records found']);
		}
		$shiftDay = $this->Shift_model->getShiftDay($weekId->id);

		$data_a = [];
		$i = 0;
		foreach ($shiftDay as $row) {
			$j = 0;
			$data_a[$i]['day'] = $row['day'];
			$data_a[$i]['comment'] = $row['comment'];
			$data_a[$i]['id'] = $row['id'];
			$data_a[$i]['shift'] = $this->Shift_model->getShiftRecords($weekId->id, $row['id'], $this->user_id);
			foreach ($data_a[$i]['shift'] as $value) {

				if($value['swap_user'] != 0){
					$data_a[$i]['shift'][$j]['swap'] = $this->Shift_model->getSwapDetails($value['id']);
				}else{
					$data_a[$i]['shift'][$j]['swap'] = [];
				}

				$j++;
			}
			$i++;
		}

		if($data_a){
			$this->jsonOutput(['status' => 'success', 'data' => $data_a]);
		}else{
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry, no records available!']);
		}
	}

	public function swapShift(){
		$shift = $this->input->post('shift');
		$swap = $this->input->post('swap');
		$shift_id = $this->input->post('shiftId');
		$swapDate = $this->input->post('swapDate');

		$swaping = $shift." swapped with ".$swap;
		$inset_a = [
			'shift_id' => $shift_id,
			'swap_user' => $swaping,
			'swap_date' => $swapDate
		];

		$swap_res = $this->Shift_model->swapShift($inset_a, $shift_id);

		if($swap_res['status'] == 'success'){
			$swap_res['shift_id'] = $shift_id;
			$swap_res['swaped'] = $swaping;
			$swap_res['swapDate'] = $swapDate;
		}

		$this->jsonOutput($swap_res);
	}

	/**
	 * providing team members 
	 */
	public function getTeamMembers(){
		
		$data = $this->Shift_model->getTeamMembers($this->team_id);
		$this->jsonOutput($data);
	}

	/**
	 * convert and print data array as json data.
	 */
	public function jsonOutput($data){
		echo json_encode($data);
		exit;
	}

	/**
	 * edit shifts
	 */
	
	public function editShifts(){
		$users = $this->input->post('users');
		$shiftId = $this->input->post('shiftId');

		$shiftDetails = $this->Shift_model->getShiftDetails($shiftId);
		$created_by = $shiftDetails->created_by;

		if($created_by != $this->user_id){
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry! you do not have permission to edit this shift']);
		}

		$users_str = implode(",", $users);
		$curDateTime = date('Y-m-d h:i:s');
		$update_a = [
			'users' => $users_str,
			'modified_by' => $this->user_id,
			'modified' => $curDateTime,
			'swap_user' => ''
		];

		$update_res = $this->Shift_model->updateShift($update_a, $shiftId);
		if($update_res['status'] == 'success'){
			$update_res['shiftId'] = $shiftId;
			$update_res['users'] = $users_str;
		}
		$this->jsonOutput($update_res);
	}

	
	/**
	 * Delete swap
	 */
	public function deleteSwap(){
		$users = $this->input->post('users');
		$swapId = $this->input->post('swapId');
		$shiftId = $this->input->post('shiftId');

		$shiftDetails = $this->Shift_model->getShiftDetails($shiftId);
		$created_by = $shiftDetails->created_by;

		if($created_by != $this->user_id){
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry! you do not have permission to edit this shift']);
		}

		$delete_res = $this->Shift_model->deleteSwap($swapId, $shiftId);
		if($delete_res['status'] == 'success'){
			$delete_res['shiftId'] = $shiftId;
			$delete_res['swapId'] = $swapId;
		}
		$this->jsonOutput($delete_res);
	}

	/**
	 * Return an array have days which already recorded 
	 */
	public function getDays(){
		$date = date("y-m-d");
		$day = date('l', strtotime($date));
		
		if($day == 'Sunday'){
			$this->jsonOutput(['status' => 'fail', 'No week days found']);
		}

		$weekId = $this->Shift_model->getWeekId($this->team_id);
		$days_a = $this->Shift_model->getWeekDaysWithWeekId($weekId->id);
		$this->jsonOutput($days_a);
	}

	/**
	 * update shift comment
	 * @return [type] [description]
	 */
	public function updateComment(){
		$commentId = $this->input->post('commentId');
		$comment = $this->input->post('comment');
		$update_res = $this->Shift_model->updateComment($comment, $commentId);
		if($update_res['status'] == 'success'){
			$update_res['commentId'] = $commentId;
			$update_res['comment'] = $comment;
		}
		$this->jsonOutput($update_res);
	}

	public function getWeeks(){
		$team_id = $this->input->post('team_id');
		if(!$team_id){
			$team_id = $this->team_id;
		}

		$data = $this->Shift_model->getWeeks($team_id);
		$this->jsonOutput($data);
	}

	public function loadPreviousShift(){
		$weekId = $this->input->post('weekId');
		$shiftDay = $this->Shift_model->getShiftDay($weekId);

		$data_a = [];
		$i = 0;
		foreach ($shiftDay as $row) {
			$j = 0;
			$data_a[$i]['day'] = $row['day'];
			$data_a[$i]['comment'] = $row['comment'];
			$data_a[$i]['id'] = $row['id'];
			$data_a[$i]['shift'] = $this->Shift_model->getShiftRecords($weekId, $row['id'], $this->user_id);
			foreach ($data_a[$i]['shift'] as $value) {

				if($value['swap_user'] != 0){
					$data_a[$i]['shift'][$j]['swap'] = $this->Shift_model->getSwapDetails($value['id']);
				}else{
					$data_a[$i]['shift'][$j]['swap'] = [];
				}

				$j++;
			}
			$i++;
		}

		if($data_a){
			$this->jsonOutput(['status' => 'success', 'data' => $data_a]);
		}else{
			$this->jsonOutput(['status' => 'fail', 'message' => 'Sorry no records available']);
		}
	}
}