<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    
	/* Login Authorization */
    function login($data){
        $query=$this->db->get_where(TABLE_PRE.'login',$data);
        if($query->num_rows()==1){
            return $query->row();
            echo "ok";
            exit();
        }else{ 
            return false;
        }
    }
	
	/* User Type Fetch */
	function login_user_type($data){
		$this->db->where('user_type_id',$data);
		$query=$this->db->get(TABLE_PRE.'user_type');
        if($query->num_rows()==1){
            return $query->row();
        }else{ 
            return false;
        }
	}
	
	/* Fetch User Info */
    function get_user_info($id){
		$this->db->get_where('login_id',$id);
        $query=$this->db->get(TABLE_PRE.'login');
        if($query->num_rows()==1){
            return $query->row();
        }else{ 
            return false;
        }
    }
	
	/* Admin Activate in Login Table */
	function activate_admin($status){
		$this->db->where('user_id',$status['login_id']);
        $query=$this->db->update(TABLE_PRE.'login',$status);
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	/* Admin Activate in Admin Table */
	function activate_admin_status($admin){
		$this->db->where('admin_id',$admin['admin_id']);
        $query=$this->db->update(TABLE_PRE.'admin_details',$admin);
        if($query){
            return true;
        }else{
            return false;
        }
	}

    function get_permission($id){

        $this->db->where('user_id',$id);
        $query=$this->db->get(TABLE_PRE.'user_permission');
        if($query->num_rows()==1){
            return $query->row();
        }else{
            return false;
        }
    }
    function online_insert($data){
        $query=$this->db->insert(TABLE_PRE.'online',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
}

?>