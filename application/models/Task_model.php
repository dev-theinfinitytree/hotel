<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model {

    function  add_task($data){
        $query=$this->db->insert(TABLE_PRE.'tasks',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }

     function  all_tasks(){
        $this->db->where('status=','0');
        $query=$this->db->get(TABLE_PRE.'tasks');

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

	function update_task($task_id){
        $this->db->where('id',$task_id);
		$task['status'] = '1';
        $query=$this->db->update(TABLE_PRE.'tasks',$task);
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
     function  all_entity_type(){
        $query=$this->db->get(TABLE_PRE.'entity_type');

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

}



?>