<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion_model extends CI_model {
	
	/**
	 * inserting data array of discussion into the database table 'discussion_title'
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function create_title($data){
		$this->db->insert('discussion_title', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return (object)['status' => true, 'message' => 'Title Created'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! Title is not created, please try again later'];
		}
	}

	public function create_subtitle($data){
		$this->db->insert('discussion_subtopics', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return (object)['status' => true, 'message' => 'Subtitle Created'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! Subtitle is not created, please try again later'];
		}
	}

	public function get_all_title($limit, $offset, $cond){
			
		$this->db
			->select('dt.title, DATE_FORMAT(dt.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, al.name, dt.id, dt.user_id')
			->from('discussion_title dt')
			->join('user u', 'u.user_id = dt.user_id', 'left')
			->join('admin_login al', 'al.id = dt.user_id', 'left')
			->where($cond)
			->where('dt.is_active', 1)
			->where('type', 'main')
			->order_by('dt.id', 'desc');

		$rows = $this->db->get()->num_rows();

		$this->db
			->select(' DATE_FORMAT(dt.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, al.name, dt.id, dt.user_id, SUBSTR(dt.title, 1, 400) AS title')
			->from('discussion_title dt')
			->join('user u', 'u.user_id = dt.user_id', 'left')
			->join('admin_login al', 'al.id = dt.user_id', 'left')
			->where($cond)
			->where('dt.is_active', 1)
			->where('type', 'main')
			->limit($limit, $offset)
			->order_by('dt.id', 'desc');

		$query = $this->db->get()->result();
		if($query){
			return (object)['status' => true, 'data' => $query, 'total_row' => $rows];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! No topics available'];
		}
	}

	public function get_all_subtitle($dt_id, $limit, $offset, $cond){

		$this->db
			->select('dt.title, DATE_FORMAT(ds.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, al.name, dt.id, dt.user_id, ds.sub_topic, ds.id as ds_id')
			->from('discussion_subtopics ds')
			->join('discussion_title dt', 'dt.id = ds.dt_id and dt.is_active = 1', 'inner')
			->join('user u', 'u.user_id = ds.user_id', 'left')
			->join('admin_login al', 'al.id = ds.user_id', 'left')
			->where($cond)
			->where('ds.dt_id', $dt_id)
			->where('ds.is_active', 1)
			->order_by('ds.id', 'desc');

		$rows = $this->db->get()->num_rows();

		$this->db
			->select('dt.title, DATE_FORMAT(ds.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, al.name, dt.id, dt.user_id, ds.sub_topic, ds.id as ds_id')
			->from('discussion_subtopics ds')
			->join('discussion_title dt', 'dt.id = ds.dt_id and dt.is_active = 1', 'inner')
			->join('user u', 'u.user_id = ds.user_id', 'left')
			->join('admin_login al', 'al.id = ds.user_id', 'left')
			->where($cond)
			->where('ds.dt_id', $dt_id)
			->where('ds.is_active', 1)
			->limit($limit, $offset)
			->order_by('ds.id', 'desc');

		$query = $this->db->get()->result();
		if($query){
			return (object)['status' => true, 'data' => $query, 'total_row' => $rows];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! No topics available'];
		}
	}

	public function get_discussion_details($d_id){
		$this->db
			->select('dt.title, DATE_FORMAT(dt.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, al.name, dt.id')
			->from('discussion_title dt')
			->join('user u', 'u.user_id = dt.user_id', 'left')
			->join('admin_login al', 'al.id = dt.user_id', 'left')
			->where('dt.id', $d_id);

		$query = $this->db->get()->row();
		return $query;
	}

	public function post_discussion($data){
		$this->db->insert('discussion', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return (object)['status' => true, 'message' => 'Your discussion has posted'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! Discussion is not posted, please try again later'];
		}
	}


	public function get_discussion_list($limit, $offset, $d_id){

		$this->db
			->select('d.discussion, DATE_FORMAT(d.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, a.name, d.id')
			->from('discussion d')
			->where('d.d_id', $d_id)
			->join('user u', 'u.user_id = d.user_id', 'left')
			->join('admin_login a', 'a.id = d.user_id', 'left')
			->order_by('d.id', 'desc');

		$rows = $this->db->get()->num_rows();

		$this->db
			->select('d.discussion, DATE_FORMAT(d.created, "%M %d %Y %h:%i %p") as date, u.fullname, u.emp_id, a.name, d.id')
			->from('discussion d')
			->where('d.d_id', $d_id)
			->join('user u', 'u.user_id = d.user_id', 'left')
			->join('admin_login a', 'a.id = d.user_id', 'left')
			->limit($limit, $offset)
			->order_by('d.id', 'desc');

		$query = $this->db->get()->result();
		if($query){
			return (object)['status' => true, 'data' => $query, 'total_row' => $rows];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! No topics available'];
		}
	}

	public function get_authers(){
		$this->db
			->select('u.fullname, dt.user_id, a.name')
			->from('discussion_title dt')
			->join('user u', 'u.user_id = dt.user_id', 'left')
			->join('admin_login a', 'a.id = dt.user_id', 'left')
			->group_by('dt.user_id');

		$query = $this->db->get()->result();
		return $query;
	}

	public function remove_title($title_id){
		$deleted = $this->db
						->set('is_active', 0)
						->where('id', $title_id)
						->update('discussion_title');

		if($deleted){
			return (object)['status' => true, 'message' => 'Title Deleted'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! some error occured, please try again'];
		}
	}

	public function remove_subtitle($ds_id){
		$deleted = $this->db
						->set('is_active', 0)
						->where('id', $ds_id)
						->update('discussion_subtopics');
		
		if($deleted){
			return (object)['status' => true, 'message' => 'Subtitle Deleted'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry! some error occured, please try again'];
		}
	}

	public function get_subtitles($dt_id){
		$this->db
			->select('id, SUBSTR(title, 1, 20) AS sub_topic')
			->from('discussion_title')
			->where('subtitle_id', $dt_id)
			->where('type', 'sub')
			->where('is_active', 1);

		$query = $this->db->get()->result();
		return $query;
	}

	public function update_title($title_id, $title){
		$updated = $this->db
			->set('title', $title)
			->where('id', $title_id)
			->update('discussion_title');

		if($updated){
			return (object)['status' => true, 'message' => 'Title updated'];
		}else{
			return (object)['status' => false, 'message' => 'Sorry some error occured! Please try again later'];
		}
	}
}

?>