<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookings_model extends CI_Model {
    

/* Select rooms hotel wise */
	function all_rooms_hotelwise($hotel_id){
		$this->db->where('hotel_id',$hotel_id);
		$query = $this->db->get(TABLE_PRE.'room');
		if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	}

	
	function all_rooms_onchange_hotelwise($hotel_id,$capacity){
		$this->db->where('room_bed',$capacity);
		$this->db->where('hotel_id',$hotel_id);
		$query = $this->db->get(TABLE_PRE.'room');
		if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	}
	
	function room_hotelwise($hotel_id,$room_id){
		$this->db->where('hotel_id',$hotel_id);
		$this->db->where('room_id',$room_id);
		$query = $this->db->get(TABLE_PRE.'room');
		if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	}
	
	function broker_hotelwise($hotel_id){
		$this->db->where('hotel_id',$hotel_id);
		$query = $this->db->get(TABLE_PRE.'broker');
		if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	}
    function channel_hotelwise($hotel_id){
        $this->db->where('hotel_id',$hotel_id);
        $query = $this->db->get(TABLE_PRE.'channel');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	function add_new_room($data){
		$query=$this->db->insert(TABLE_PRE.'bookings',$data);
		$last_id = $this->db->insert_id();
        if($query){
            return $last_id;
        }else{
            return false;
        }
	}
	
	function add_new_room2($data){
		$this->db->where('booking_id',$data['booking_id']);
	    $query=$this->db->update(TABLE_PRE.'bookings',$data); 
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	function add_new_room4($data){
		$query=$this->db->insert(TABLE_PRE.'transactions',$data);
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	function add_new_room5($data){
		$this->db->where('booking_id',$data['booking_id']);
	    $query=$this->db->update(TABLE_PRE.'bookings',$data); 
        if($query){
            return true;
        }else{
            return false;
        }
	}
    function add_new_room_broker($data){
        $this->db->where('booking_id',$data['booking_id']);
        $query=$this->db->update(TABLE_PRE.'bookings',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    function add_new_room_channel($data){
        $this->db->where('booking_id',$data['booking_id']);
        $query=$this->db->update(TABLE_PRE.'bookings',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
	/* For advance to Confirmed After payment */
	function change_book_id($id,$data){
		$this->db->where('booking_id',$id);
	    $query=$this->db->update(TABLE_PRE.'bookings',$data); 
        if($query){
            return true;
        }else{
            return false;
        }
	}
	// For temp hold and advance change to pending
	function change_book_id2($id,$data){
		$this->db->where('booking_id',$id);
	    $query=$this->db->update(TABLE_PRE.'bookings',$data); 
        if($query){
            return true;
        }else{
            return false;
        }
	}
	function fetch_color($id){
		$this->db->select('*');
        $this->db->where('status_id=',$id);
        //$this->db->limit($limit,$start);
        $query=$this->db->get('booking_status_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	
	function all_rooms_bookings_event($hotel_id,$start,$end)
	{
		 $sql = "SELECT * FROM ".TABLE_PRE."bookings A
		 JOIN booking_status_type B ON A.booking_status_id = B.status_id
		 WHERE NOT ((A.cust_end_date <= '".$start."') OR (A.cust_from_date >= '".$end."')) AND A.hotel_id='".$hotel_id."' AND A.booking_status_id!='7'";
		/*$sql = "SELECT * FROM ".TABLE_PRE."bookings WHERE NOT ((cust_end_date <= '".$start."') OR (cust_from_date >= '".$end."')) AND hotel_id='".$hotel_id."'";*/
		 $query=$this->db->query($sql);
		 if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	}
	
	function room_edit_hotelwise($booking_id){
		$sql = "SELECT * FROM ".TABLE_PRE."bookings A 
					JOIN ".TABLE_PRE."room B ON A.room_id = B.room_id   WHERE  A.booking_id='".$booking_id."'"; 
		 $query=$this->db->query($sql);
		if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	}
	
	function add_edit_room($data){
		$this->db->where('booking_id',$data['booking_id']);
	    $query=$this->db->update(TABLE_PRE.'bookings',$data); 
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	function delete_booking_room($booking_id){
		
		$sql = "DELETE  FROM ".TABLE_PRE."bookings WHERE  booking_id='".$booking_id."'"; 
		 $query=$this->db->query($sql);		
        if($query){
            return true;
        }else{
            return false;
        }
	}
	function update_rooms_bookings_event($booking_id,$start,$end,$ratio,$days_updated){
		
		$sql = "UPDATE ".TABLE_PRE."bookings SET room_rent_sum_total=room_rent_sum_total*'".$ratio."', room_rent_total_amount=room_rent_total_amount*'".$ratio."', room_rent_tax_amount=room_rent_tax_amount*'".$ratio."', stay_days='".$days_updated."' , cust_from_date='".$start."',cust_end_date='".$end."' WHERE  booking_id='".$booking_id."'";
		$query=$this->db->query($sql);		
        if($query){
            return 'Booking Dates and Amount Updated';
        }else{
            return 'failed';
        }
	}
    function get_stay_days($id){

        $this->db->select('stay_days');
        $this->db->where('booking_id=',$id);
        //$this->db->limit($limit,$start);
        $query=$this->db->get('hotel_bookings');
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }

    }
	
	function count_rooms_bookings_event($booking_id,$room_id,$start,$end){
		
		$sql = "SELECT * FROM ".TABLE_PRE."bookings WHERE NOT ((cust_end_date <= '".$start."') OR (cust_from_date >= '".$end."'))
				AND booking_id <> '".$booking_id."' AND room_id = '".$room_id."'"; 
		$query=$this->db->query($sql);	
        if($query){
            return $query->num_rows();
        }else{
            return false;
        }
	}
	
	function update_rooms_bookings_move($booking_id,$room_id,$start,$end){
		
		$sql = "UPDATE ".TABLE_PRE."bookings SET cust_from_date='".$start."',cust_end_date='".$end."',room_id='".$room_id."' WHERE  booking_id='".$booking_id."'"; 
		$query=$this->db->query($sql);		
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	function  add_guest($data){
        $query=$this->db->insert(TABLE_PRE.'guest',$data);
		$last_id = $this->db->insert_id();
        if($query){
            return $last_id;
        }else{
            return false;
        }
    }
	
	function get_guest($keyword){
		 //$sql = "SELECT * FROM ".TABLE_PRE."guest where g_name like'".$keyword."%'";  
		 //$query=$this->db->query($sql);
		 $this->db->select('*');    
$this->db->from(TABLE_PRE.'guest');
$this->db->join(TABLE_PRE.'bookings', TABLE_PRE.'guest.g_id = '.TABLE_PRE.'bookings.guest_id');
$this->db->like('g_name', $keyword);
$this->db->distinct();
$this->db->group_by('g_id');
$this->db->order_by('cust_end_date', 'ASC');

$query = $this->db->get();
		
		 if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	
	}
	
	
	function get_guest_details($guest_id){
		 $sql = "SELECT * FROM ".TABLE_PRE."guest where g_id='".$guest_id."'";  
		 $query=$this->db->query($sql);
		
		 if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	
	}
	
	
	function get_broker_details($b_id){
		 $sql = "SELECT * FROM ".TABLE_PRE."broker where b_id='".$b_id."'";  
		 $query=$this->db->query($sql);
		
		 if($query->num_rows()>0){
			 return $query->result();
		}else{
			return false;
		}
	
	}
    function get_channel_details($b_id){
        $sql = "SELECT * FROM ".TABLE_PRE."channel where channel_id='".$b_id."'";
        $query=$this->db->query($sql);

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }

    }

	function get_booking_details($book_id)
	{
		$this->db->where('booking_id',$book_id);
		$query = $this->db->get(TABLE_PRE.'bookings');

		if($query->num_rows()>0){
			return $query->result();	 
		}
		else{
			return false;
		}
		
	}

	function get_transaction_details($book_id)
	{
		$this->db->where('t_booking_id',$book_id);
		$query = $this->db->get(TABLE_PRE.'transactions');

		if($query->num_rows()>0){
			return $query->result();	 
		}
		else{
			return false;
		}
	}

	function get_transaction_total_amount($book_id)
	{
		$this->db->select_sum('t_amount');
		$this->db->where('t_booking_id',$book_id);
		$query = $this->db->get(TABLE_PRE.'transactions');

		if($query->num_rows()>0){
			return $query->result();	 
		}
		else{
			return false;
		}
	}

	function get_payment_details($book_id)
	{
		$this->db->select('*');
		$this->db->from(TABLE_PRE.'room');
		$this->db->join(TABLE_PRE.'bookings', 'hotel_room.room_id = hotel_bookings.room_id');
		$this->db->where('booking_id',$book_id);
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->result();	 
		}
		else{
			return false;
		}
	}

	function get_total_payment($booking_id)
	{
		
		$this->db->where('t_booking_id',$booking_id);
		$this->db->select_sum('t_amount');
		$query = $this->db->get(TABLE_PRE.'transactions');

		if($query->num_rows()>0){
			return $query->result();	 
		}
		else{
			return false;
		}
	}


    function get_total_amount($booking_id)
    {

        $this->db->where('booking_id',$booking_id);
        $this->db->select('*');
        $query = $this->db->get(TABLE_PRE.'bookings');

        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
	
	function rate($id){
		$this->db->where('room_id',$id);
		 $query=$this->db->query($sql);
		
		 if($query->num_rows()==1){
			 return $query->result();
		}else{
			return false;
		}
	}
	
	function room_tax($hotel_id){
		$this->db->where('hotel_id',$hotel_id);
		 $query = $this->db->get(TABLE_PRE.'hotel_tax_details');
		
		 if($query->num_rows()>=1){
			 return $query->result();
		}else{
			return false;
		}
		
	}

	function get_hotel_contact_details($hotel_id){
		$this->db->where('hotel_id',$hotel_id);
		$query = $this->db->get(TABLE_PRE.'hotel_contact_details');
		if($query->num_rows()>0){
			return $query->row_array();	 
		}
		else{
			return false;
		}
		
	}

	function get_hotel_logo($hotel_id){
		$this->db->where('hotel_id',$hotel_id);
		$query = $this->db->get(TABLE_PRE.'hotel_details');
		if($query->num_rows()>0){
			return $query->row_array();	 
		}
		else{
			return false;
		}
		
	}	
	
}

?>