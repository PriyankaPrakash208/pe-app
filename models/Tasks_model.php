<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks_model extends CI_model {


Public function getcompleted($id)
	{		
		$this->db->select('COUNT(*) as count');
		$this->db->from('assignments');
        $this->db->where('assign_to',$id);
        $this->db->where('status',1);
		$query = $this->db->get()->row();
        return $query;
        

    }

    Public function getpending($id)
	{		
		$this->db->select('COUNT(*) as count');
		$this->db->from('assignments');
        $this->db->where('assign_to',$id);
        $this->db->where('status',0);
		$query = $this->db->get()->row();
        return $query;
        

    }

    Public function updateTaskdate($data,$taskid)
	{		
		$this->db->where('asgnmnt_id',$taskid);
       $query= $this->db->update('assignments',$data);
		return $query;
        

    }

    
}