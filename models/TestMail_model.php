<?php


class TestMail_model extends CI_model {
	Public function GetRequestDta($lv_id){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('user','user.user_id=request.user_id'); 
		$this->db->where('lv_id',$lv_id);	
		$query=$this->db->get(); 
		return $query->row();
	}
	
	Public function requestStatus($lv_id,$data){
		$this->db->where('lv_id',$lv_id);	
		return $this->db->update('request',$data);
	}
	
	
	
}  
