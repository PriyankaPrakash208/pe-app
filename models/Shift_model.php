<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_model extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}

	/**
	 * returning a weekId of current week
	 */
	public function getWeekId($team_id){
		$this->db
			->select('id')
			->from('shift_week_manager')
			->where('date_from <= CURDATE()')
            ->where('date_to >= CURDATE()')
            ->where('team_id', $team_id);
		$query = $this->db->get()->row();
		return $query;
	}

	/**
	 * Return weekId for a preview section
	 * @param  [type] $team_id [description]
	 * @param  [type] $date    [description]
	 * @return [type]          [description]
	 */
	public function getWeekIdForPreview($team_id, $date){
		$this->db
			->select('id')
			->from('shift_week_manager')
			->where("date_from <= '".$date."'")
            ->where("date_to >= '".$date."'")
            ->where('team_id', $team_id);
		$query = $this->db->get()->row();
		return $query;
	}

	/**
	 * return teamId from user_id
	 */
	public function getTeamId($user_id){
		$this->db
			->select('u.team_id')
			->from('user u')
			->where('u.user_id', $user_id);
		$query = $this->db->get()->row();
		return $query->team_id;
	}

	/**
	 * return team members with teamId
	 */
	public function getTeamMembers($team_id){
		$this->db
			->select('u.fullname, u.user_id')
			->from('user u')
			->where('u.team_id', $team_id);
		$query = $this->db->get()->result_array();

		if($query){
			return ['status' => 'success', 'data' => $query];
		}else{
			return ['status' => 'fail', 'message' => 'Sorry no memebers'];
		}

	}

	/**
	 * Create a shift new week
	 */
	public function createShiftWeek($date_a, $team_id, $date){

		/**
		 * checking if there are any shift available in this week
		 */
		
		// $check_shift_status = $this->getWeekId($team_id);
		$check_shift_status = $this->getWeekIdForPreview($team_id, $date);

		if($check_shift_status){
			return ['status' => 'success', 'weekId' => $check_shift_status->id];
		}

		$this->db->insert('shift_week_manager', $date_a);
		$ishift_recordsnsert_id = $this->db->insert_id();
		return ['status' => 'success', 'weekId' => $ishift_recordsnsert_id];
	}

	public function createShiftDay($week_id, $day, $comment, $order){
		$data_a = ['week_id' => $week_id, 'day' => $day, 'order_by' => $order];
		$this->db
			->select('id')
			->from('week_master')
			->where($data_a);

		$query = $this->db->get()->row();
		if($query){
			return $query->id;
		}

		$data_a['comment'] = $comment;
		$this->db->insert('week_master', $data_a);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	/**
	 * Creating new shift records
	 */
	public function createShift($data){

		$this->db->insert_batch('shift_records', $data);
		if ($this->db->affected_rows() != 1) {
			return ['status' => 'success', 'message' => 'Shift successfully created'];
		}else{
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}

	}

	/**
	 * return shift records with weekId and dayId
	 */
	public function getShiftRecords($weekId, $day, $user_id){
		$this->db
			->select('sr.*, IF (sr.created_by = '.$user_id.', 1, 0)as own_shift, u.fullname as created_by')
			->from('shift_records sr')
			->join('user u', 'u.user_id = sr.created_by', 'left')
			->where('sr.week_id', $weekId)
			->where('sr.day', $day);

		$query = $this->db->get()->result_array();
		return $query;
	}

	/**
	 * return shift day details with weekId
	 */
	public function getShiftDay($weekId){

		$this->db
			->select('id, day, comment')
			->from('week_master')
			->where('week_id', $weekId)
			->order_by('order_by');;

		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function getSwaps($shiftId){
		$this->db
			->select('swap_user')
			->from('shift_records')
			->where('id', $shiftId);
		$query = $this->db->get()->row();
		return $query;
	}

	/**
	 * Swap a shift
	 * @param  [type] $insert_a [description]
	 * @param  [type] $shiftId  [description]
	 * @return [type]           [description]
	 */
	public function swapShift($insert_a, $shiftId){

		$this->db->insert('shift_swap', $insert_a);
		$insert_id = $this->db->insert_id();

		if($insert_id){
			$this->db
				->set('swap_user', 1)
				->where('id', $shiftId)
				->update('shift_records');

			return ['status' => 'success', 'message' => 'Successfully swapped', 'swap_id' => $insert_id];
		}else{
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}
	}

	/**
	 * return shift details 
	 */
	public function getShiftDetails($shiftId){
		$this->db
			->select('*')
			->from('shift_records')
			->where('id', $shiftId);

		$query = $this->db->get()->row();
		return $query;
	}

	public function updateShift($data_a, $shiftId){
		$this->db
			->set($data_a)
			->where('id', $shiftId)
			->update('shift_records');

		if ($this->db->affected_rows() != 1) {
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}else{
			return ['status' => 'success', 'message' => 'Successfully updated'];
		}
	}

	public function checkShiftRecord($weekId, $day){
		$this->db
			->select('id')
			->from('shift_records')
			->where('week_id', $weekId)
			->where('day', $day);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getSwapDetails($shiftId){
		$this->db
			->select('swap_user, DATE_FORMAT(swap_date, "%d-%m-%Y") as swap_date, id')
			->from('shift_swap')
			->where('shift_id', $shiftId)
			->where('is_active', 1);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function deleteSwap($swapId, $shiftId){
		$this->db
			->set('is_active', 0)
			->where('id', $swapId)
			->where('shift_id', $shiftId)
			->update('shift_swap');
			
		if ($this->db->affected_rows() != 1) {
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}else{
			return ['status' => 'success', 'message' => 'Swap Deleted'];
		}
	}

	/**
	 * Return an array have days which already recorded with the given weekId
	 */
	public function getWeekDaysWithWeekId($weekId){
		$this->db
			->select('day')
			->from('week_master')
			->where('week_id', $weekId);

		$query = $this->db->get()->result_array();
		$days_a = [];

		foreach ($query as $row) {
			$days_a[] = $row['day'];
		}

		if($days_a){
			return ['status' => 'success', 'data' => $days_a];
		}else{
			return ['status' => 'fail', 'No week days found'];
		}
	}

	/**
	 * update shift comment
	 * @param  [type] $comment [description]
	 * @param  [type] $id      [description]
	 * @return [type]          [description]
	 */
	public function updateComment($comment, $id){
		$this->db
			->set('comment', $comment)
			->where('id', $id)
			->update('week_master');
			
		if ($this->db->affected_rows() != 1) {
			return ['status' => 'fail', 'message' => 'Sorry some error occured'];
		}else{
			return ['status' => 'success', 'message' => 'Successfully updated'];
		}
	}

	/**
	 * Shift weeks
	 * @param  [type] $team_id [description]
	 * @return [type]          [description]
	 */
	public function getWeeks($team_id){
		$this->db
			->select('CONCAT(date_from, " - ", date_to) as date, id')
			->from('shift_week_manager')
			->where('team_id', $team_id);
		$query =  $this->db->get()->result_array();

		if($query){
			return ['status' => 'success', 'data' => $query];
		}else{
			return ['status' => 'success', 'message' => 'Sorry no weeks avaiilable'];
		}
	}

	public function getAllTeams(){
		$this->db
			->select('team_id, name')
			->from('team');

		$query = $this->db->get()->result_array();
		return $query;
	}
}