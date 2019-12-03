<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_model {
	
	Public function viewallteam(){
		$this->db->select('*');
		$this->db->from('team');
		$query = $this->db->get(); 
		$result= $query->result();
		return $result;
	}
	


	// Start add inventory
	Public function add_inv($data){
		$res = $this->db->insert('inventory',$data);
		return($res);
	}
	//Close add inventory
	 Public function get_teams($team_id){
		 $this->db->select('*');
		 $this->db->from('team');
		 $this->db->where('team_id',$team_id);
	     $query = $this->db->get(); 
		 $result= $query->row();
		 return $result;
	 }
	
	//Getting inventory
	Public function get_inventories($type){
		$this->db->select('*');
		$this->db->from('inventory');
		$this->db->where('inv_type',$type);
		$this->db->order_by('inv_id','desc');
		$q = $this->db->get();
//		return $this->db->last_query();
		return $q->result_array();
	}
	public function get_inventoriesByTeam($type){
		$this->db->select('*');
		$this->db->from('inventory');
		$this->db->where('inv_type',$type);
		$this->db->where('inv_team',"30");
		$this->db->order_by('inv_id','desc');
		$q = $this->db->get();
//		return $this->db->last_query();
		return $q->result_array();
	}
	//Close getting inventory
	
	Public function deleteInventory($invId){
		 $this -> db -> where('inv_id', $invId);
 		 $this -> db -> delete('inventory');
		
	}
}