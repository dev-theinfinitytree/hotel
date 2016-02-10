
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin_model extends CI_Model
{

    /* All Hotels With Pagination */
   public function all_hotels(){
        $this->db->where('hotel_status!=','D');
        $this->db->order_by('hotel_id','desc');
        $query=$this->db->get(TABLE_PRE.'hotel_details');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
}