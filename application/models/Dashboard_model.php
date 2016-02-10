<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



 class Dashboard_model extends CI_Model {
    /* Add Hotel */
    function add_hotel($hotel,$hotel_contact_details,$hotel_tax_details,$hotel_billing_settings,$hotel_general_preference){
		$query=$this->db->insert(TABLE_PRE.'hotel_details',$hotel);
		$hotel_id = $this->db->insert_id();
		$data = array(
			'hotel_id' => $hotel_id
		);
		$new_hotel_contact_details = array_merge($hotel_contact_details, $data);
		$new_hotel_tax_details = array_merge($hotel_tax_details , $data);
		$new_hotel_billing_settings = array_merge($hotel_billing_settings,$data);
		$new_hotel_general_preference = array_merge($hotel_general_preference,$data);
		$query_contact = $this->db->insert(TABLE_PRE.'hotel_contact_details',$new_hotel_contact_details);
		$query_tax = $this->db->insert(TABLE_PRE.'hotel_tax_details',$new_hotel_tax_details);
		$query_billing = $this->db->insert(TABLE_PRE.'hotel_billing_setting',$new_hotel_billing_settings);
		$query_general = $this->db->insert(TABLE_PRE.'hotel_general_preference',$new_hotel_general_preference);

        if($query){
				if($query_contact){
					if($query_tax){
						if($query_billing){
							if($query_general){
								return true;
							}else{
								return false;
							}
						}
						else{
							return false;
						}
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
				
        }else{
            return false;
        }
	}
	
	/* Ajax Hotel Email Check */
	function hotel_email_check($email){
		$query=$this->db->get_where(TABLE_PRE.'hotel_details',$email);
		
        if($query->num_rows()==1){
			
			$a = $this->db->insert_id();
			echo $a;
			exit();
            return $query->row();
        }else{ 
            return false;
        }
		
	}

    // Task Assigner Return

    function task_assiger(){
        $this->db->select('*');
        $this->db->from('hotel_admin_details');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    function task_add($task_entry){
        $query=$this->db->insert(TABLE_PRE.'tasks',$task_entry);
        if($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    function tasks_pending(){
        $this->db->select('*');
        $this->db->where('status=','0');
        $this->db->order_by('priority','asc');
        $this->db->from(TABLE_PRE.'tasks');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    function get_task_user($from){
        $this->db->select('*');
        $this->db->where('admin_id=',$from);
        $this->db->from(TABLE_PRE.'admin_details');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    function task_complete($task_id){     
        $this->db->set('status','1');     
        $this->db->where('id', $task_id);  
        $query_details = $this->db->update(TABLE_PRE.'tasks'); 
        if($query_details){
            return true;
        }
        else{
            return false;
        }
    }

    //End Assigner
	
	/* Ajax Hotel Phone Check */
	function hotel_phone_check($phone){
		$query=$this->db->get_where(TABLE_PRE.'hotel_details',$phone);
        if($query->num_rows()==1){
            return $query->row();
        }else{ 
            return false;
        }
	}
	
	/* Number of All Hotels */
	function all_hotels_row(){
		//$this->db->where('hotel_status!=','D');
        $query=$this->db->get(TABLE_PRE.'hotel_details');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }
    
	/* All Hotels With Pagination */
    function all_hotels(){
		/*$this->db->where('hotel_status!=','D');
        $this->db->order_by('hotel_id','desc');
		//$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'hotel_details');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }*/

        /*$this->db->select('*');
        $this->db->from('hotel_hotel_billing_setting');
        $this->db->join('hotel_hotel_contact_details', 'hotel_hotel_billing_setting.hotel_id = hotel_hotel_contact_details.hotel_id');*/
		
		
		$this->db->select('*');
        $this->db->from('hotel_hotel_contact_details');
		$this->db->join('hotel_hotel_details', 'hotel_hotel_contact_details.hotel_id = hotel_hotel_details.hotel_id');
        $query=$this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    /* All Hotels */
    function total_hotels()
    {
        $this->db->where('hotel_status!=','D');
        $this->db->order_by('hotel_id','desc');
        $query=$this->db->get(TABLE_PRE.'hotel_details');
        if($query->num_rows()>0){
            return $query->result();
        }
        else
        {
            return false;
        }
    }
	
	/* Get Particular Hotel Information */
	function get_hotel($hotel_id)
    {
        $this->db->where('hotel_id',$hotel_id);
        $query=$this->db->get(TABLE_PRE.'hotel_details');
        if($query->num_rows()==1){
            return $query->row();
        }else{
            return false;
        }

        

    }
	
	function get_admin($admin_id)
    {
        $this->db->where('admin_id',$admin_id);
        $query=$this->db->get(TABLE_PRE.'admin_details');
        if($query->num_rows()==1){
		
            return $query->result();
        }else{
            return false;
        }

        

    }
	
	function check_unlock($pw)
    {
        $this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('user_password',sha1(md5($pw)));
		
        $query=$this->db->get(TABLE_PRE.'login');
        if($query->num_rows()==1){
		
            return true;
        }else{
            return false;
        }

        

    }
	
	
	
	/* Update Hotel */
	function update_hotel($hotel){
        $this->db->where('hotel_id',$hotel['hotel_id']);
        $query=$this->db->update(TABLE_PRE.'hotel_details',$hotel);
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
	/* Delete Hotel (Only Status Changed) */
	function delete_hotel($hotel_id,$hotel){
        $this->db->where_in('hotel_id',$hotel_id);
        $query=$this->db->update(TABLE_PRE.'hotel_details',$hotel);
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
	/* Ajax Hotel Status Update */
	function hotel_status_update($status){
		$this->db->where('hotel_id',$status['hotel_id']);
        $query=$this->db->update(TABLE_PRE.'hotel_details',$status);
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	/* All Hotel */
	function all_hotel_list(){
		$this->db->where('hotel_status!=','D');
        $this->db->order_by('hotel_name','asc');
        $query=$this->db->get(TABLE_PRE.'hotel_details');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	/* Get All User Types */
	function get_user_type(){
		$this->db->where('user_type_slug!=','SUPA');
        $query=$this->db->get(TABLE_PRE.'user_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	
	/* Add Permission */
	function add_permission($permission){
		$query=$this->db->insert_batch(TABLE_PRE.'permission_types',$permission);
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	/* Number of All Permissions */
	function all_permissions_row(){
		$this->db->group_by('permission_label');
		$this->db->where('permission_status!=','D');
        $query=$this->db->get(TABLE_PRE.'permission_types');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }
    
	/* All Permissions */
    function all_permissions(){
		$this->db->group_by('permission_label');
		$this->db->where('permission_status!=','D');
        $this->db->order_by('permission_label','asc');
		//$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'permission_types');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	/* Particular User Type Information */
	function get_user_type_by_id($user){
		$this->db->where('user_type_id',$user);
		 $query=$this->db->get(TABLE_PRE.'user_type');
        if($query->num_rows()==1){
            return $query->row();
        }else{
            return false;
        }
	}
	
	/* Particular Permission */
	function get_permission($permission_id){
        $this->db->where('permission_id',$permission_id);
        $query=$this->db->get(TABLE_PRE.'permission_types');
        if($query->num_rows()==1){
            return $query->row();
        }else{
            return false;
        }
    }
	
	/* Get All Permission By Label */
	function get_permission_info($label){
		$this->db->where('permission_label',$label);
        $query=$this->db->get(TABLE_PRE.'permission_types');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	
	/* Update Permission */
	function update_permission($permission){
       	$query=$this->db->update_batch(TABLE_PRE.'permission_types', $permission, 'permission_id');
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
	/* Add Admin */
    function add_admin($admin){
		$query=$this->db->insert(TABLE_PRE.'admin_details',$admin);
        if($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
	
	/* Add User For Login */
    function add_user($user){
		$query=$this->db->insert(TABLE_PRE.'login',$user);
        if($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
	
	/* Add User For Login */
    function get_country(){
		$this->db->order_by('country_name','asc');
		$query=$this->db->get(TABLE_PRE.'countries');
        if($query){
            return $query->result();
        }else{
            return false;
        }
	}
	
	/* Add User For Login */
    function get_star_rating(){
		$this->db->order_by('star_rating_value','asc');
		$query=$this->db->get(TABLE_PRE.'star_rating');
        if($query){
            return $query->result();
        }else{
            return false;
        }
	}
	
	/* Ajax Username Check */
	function username_check($username){
		$query=$this->db->get_where(TABLE_PRE.'login',$username);
        if($query->num_rows()==1){
            return $query->row();
        }else{ 
            return false;
        }
	}
	
	/* Ajax Email Check */
	function email_check($email){
		$query=$this->db->get_where(TABLE_PRE.'login',$email);
        if($query->num_rows()==1){
            return $query->row();
        }else{ 
            return false;
        }
	}
	
	/* All Permission Label Applicable*/
	function admin_permission_label($permission_users){
		$this->db->like('permission_users',$permission_users,'both');
		$this->db->group_by('permission_label');
		$query=$this->db->get(TABLE_PRE.'permission_types');
        if($query->num_rows()>0){
            return $query->result();
        }else{ 
            return false;
        }
	}
	
	/* All Permissions Depending on Label for Admin */
	function get_permission_by_label($permission_label){
		$this->db->where('permission_label',$permission_label);
		$query=$this->db->get(TABLE_PRE.'permission_types');
        if($query->num_rows()>0){
            return $query->result();
        }else{ 
            return false;
        }
	}
	
	/*Add User Permission */
	function add_user_permission($permission){
		$query=$this->db->insert(TABLE_PRE.'user_permission',$permission);
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
	/* Check Admin Status */
	function admin_status($id){
		$this->db->where('admin_id',$id);
		$query = $this->db->get(TABLE_PRE.'admin_details');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	/* Admin Registration */
	function admin_registration($admin){
        $this->db->where('admin_id',$admin['admin_id']);
        $query=$this->db->update(TABLE_PRE.'admin_details',$admin);
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
	/* Update Login Information */
	function update_login($data){
        $this->db->where('login_id',$data['login_id']);
        $query=$this->db->update(TABLE_PRE.'login',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    /*Add Booking */
    function  add_booking($data){
        $query=$this->db->insert(TABLE_PRE.'bookings',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }

    /* All Bookings */
    function  all_bookings(){

        $this->db->order_by('cust_from_date','asc');
		$this->db->where('booking_status_id !=',7);
		
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'bookings');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    /* Return a particular booking under a booking id */
    function  particular_booking($booking_id){

        $this->db->where('booking_id=',$booking_id);
        $this->db->where('booking_status_id !=',7);

        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'bookings');
        if($query->num_rows()>=0){
            return $query->result();
        }else{
            return false;
        }


    }
	function  all_recent_bookings(){
		$today = new DateTime('now-1 day');
		$today_str = $today->format('Y-m-d H:i:s');
        $this->db->order_by('cust_from_date','asc');
		$this->db->where('cust_from_date>=',$today_str);
		$this->db->where('booking_status_id !=',8);
		$this->db->where('booking_status_id !=',7);
		
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'bookings');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	function  get_status($id){
		
		$this->db->where('status_id',$id);
		
		
        //$this->db->limit($limit,$start);
        $query=$this->db->get('booking_status_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	function  all_bookings_report(){

        $this->db->order_by('cust_from_date','asc');
		$this->db->join('hotel_guest', 'hotel_guest.g_id = hotel_bookings.guest_id');
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'bookings');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }



    /* Get Room Id*/
    function get_room_id($hotel_id, $room_no){

        $this->db->where('hotel_id=',$hotel_id);
        $this->db->where('room_no=',$room_no);
        $query=$this->db->get(TABLE_PRE.'room');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    /* Get Room Number */

    function get_room_number($room_id){

        $this->db->where('room_id=',$room_id);
        $query=$this->db->get(TABLE_PRE.'room');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }



	
	 /* Add Room */
    function add_room($data){
		//echo '<pre>';
		//print_r($data['feature']);
		//exit;
		$query=$this->db->insert(TABLE_PRE.'room',$data['room']);
		$insert_id = $this->db->insert_id();
		foreach($data['feature'] as $key => $value)
		{
		  $roomFeature['room_feature_id'] = $key;
		  $roomFeature['room_feature_type'] = $value;
		  $roomFeature['room_id'] = $insert_id;
		  $qry=$this->db->insert(TABLE_PRE.'room_room_features',$roomFeature);
		}		
        if($query){
            return true;
        }else{
            return false;
        }
	}
	
    function get_room_feature_type($room_feature_id){
		$this->db->select('room_feature_type');
        $this->db->where('room_feature_id=',$room_feature_id);
        $query=$this->db->get(TABLE_PRE.'room_room_features');
        if($query->num_rows()> '0'){
            return $query->row();
        }else{
            return false;
        }
    }
	/* Number of All Rooms */
	function all_rooms_row(){
		$this->db->where('room_status!=','D');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'room');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }
    
	/* All Hotels With Pagination */
   public  function all_rooms(){
		$this->db->where('room_status!=','D');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $this->db->order_by('room_no','asc');
		//$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'room');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    /* Get Particular Hotel Information */
    function get_room($room_id){
        $this->db->where('room_id=',$room_id);
        $query=$this->db->get(TABLE_PRE.'room');
        if($query->num_rows()==1){

            return $query->row();
        }else{
            return false;
        }
    }

    /* Update Hotel */
    function update_room($room){

        $this->db->where('room_id=',$room['room_id']);
        $query=$this->db->update(TABLE_PRE.'room',$room);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function  add_transaction($data){
        $query=$this->db->insert(TABLE_PRE.'transactions',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }

    function all_transactions(){
        $this->db->order_by('t_id','asc');
        $query=$this->db->get(TABLE_PRE.'transactions');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	/*function all_transactions_report(){
        $this->db->order_by('t_id','asc');
		join(TABLE_PRE.'guest', 'hotel_guest.g_id = credentials.cid');
        $query=$this->db->get(TABLE_PRE.'transactions');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }*/

    /* Number of All Transactions */
    function all_transactions_row(){
        $query=$this->db->get(TABLE_PRE.'transactions');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }

    /* All Hotels With Transactions */
    /*
    function all_transactions_limit(){
        $this->db->order_by('t_id','desc');
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'transactions');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    */

    function all_transactions_limit()
    {
        $this->db->select('*');
        $this->db->from(TABLE_PRE.'transactions');
        $this->db->join('hotel_transaction_type', 'hotel_transactions.transaction_releted_t_id = hotel_transaction_type.hotel_transaction_type_id');        
        $query=$this->db->get();

        /*
        $this->db->select('*');
        $this->db->where('hotel_id=',$hotel_id);
        $query=$this->db->get(TABLE_PRE.'hotel_details');*/
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function find_name($get_id_name){
        $this->db->where('hotel_entity_type_id=',$get_id_name);
        $query=$this->db->get(TABLE_PRE.'entity_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function  add_compliance($data){
        $query=$this->db->insert(TABLE_PRE.'compliance',$data);
        if($query){
			
            return true;
        }else{
			
            return false;
        }



    }

    function all_compliance(){
        $this->db->order_by('c_id','asc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'compliance');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    /* Number of All Transactions */
    function all_compliance_row(){
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'compliance');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }

    /* All Hotels With Transactions */
    function all_compliance_limit(){
        $this->db->order_by('c_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'compliance');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function  add_guest($data){
        $query=$this->db->insert(TABLE_PRE.'guest',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }

    function  add_broker($data){
        $query=$this->db->insert(TABLE_PRE.'broker',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }


    function all_broker(){
        $this->db->order_by('b_id','asc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'broker');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    /* Number of All Transactions */
    function all_broker_row(){
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'broker');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }

    /* All Hotels With Transactions */
    function all_broker_limit(){
        $this->db->order_by('b_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'broker');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function all_guest(){
        $this->db->order_by('g_id','asc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'guest');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function  add_event($data){
        $query=$this->db->insert(TABLE_PRE.'events',$data);
        if($query){
            return true;
        }else{
            return false;
        }

    }

    function all_events(){
        $this->db->order_by('e_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->where('e_notify=',1);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'events');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function all_events_limit(){
        $this->db->order_by('e_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $this->db->where('e_notify=',1);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'events');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }



    /* Number of All Transactions */
    function all_guest_row(){
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'guest');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }
    }

    /* All Hotels With Transactions */
    function all_guest_limit()
    {
        //$this->db->order_by('g_id','desc');
        //$this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->limit($limit,$start);
		$today = date('Y-m-d');
		$this->db->where('cust_from_date',$today);
        $this->db->where('hotel_id',$this->session->userdata('user_hotel'));
		$this->db->select_sum('no_of_guest');
		$query = $this->db->get(TABLE_PRE.'bookings');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }

        /*$this->db->select_sum('age');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $this->db->where($date,'');*/
    }
	
	/* 18.11.2015 */
	
	function all_guest_limit_view()
    {
        $this->db->order_by('g_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'guest');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }

        /*$this->db->select_sum('age');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $this->db->where($date,'');*/
    }
	
	function get_guest_details($g_id_edit)
	{
		//echo "In Model";
		//echo  $g_id_edit;
		//exit();
		$this->db->select('*');
        $this->db->where('g_id=',$g_id_edit);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'guest');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

    function get_room_details($room_id)
    {
        //echo "In Model";
        //echo  $g_id_edit;
        //exit();
        $this->db->select('*');
        $this->db->where('room_id=',$room_id);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'room');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }


    function get_hotel_details($hotel_id)
    {

        $this->db->select('*');
        $this->db->from('hotel_hotel_contact_details');
        $this->db->join('hotel_hotel_details', 'hotel_hotel_contact_details.hotel_id = hotel_hotel_details.hotel_id', 'inner');
        $this->db->join('hotel_hotel_tax_details' , 'hotel_hotel_tax_details.hotel_id = hotel_hotel_details.hotel_id', 'inner');
        $this->db->join('hotel_hotel_billing_setting' , 'hotel_hotel_billing_setting.hotel_id = hotel_hotel_details.hotel_id', 'inner');
        $this->db->join('hotel_hotel_general_preference' , 'hotel_hotel_general_preference.hotel_id = hotel_hotel_details.hotel_id', 'inner');       

        $this->db->where('hotel_hotel_details.hotel_id=',$hotel_id);
        $this->db->group_by('hotel_hotel_details.hotel_id');
        $query=$this->db->get();

        /*
        $this->db->select('*');
        $this->db->where('hotel_id=',$hotel_id);
        $query=$this->db->get(TABLE_PRE.'hotel_details');*/
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    function get_hotel_details2($hotel_id)
    {

        $this->db->select('*');
        $this->db->from('hotel_hotel_details');

        $this->db->where('hotel_id=',$hotel_id);
        $query=$this->db->get();

        /*
        $this->db->select('*');
        $this->db->where('hotel_id=',$hotel_id);
        $query=$this->db->get(TABLE_PRE.'hotel_details');*/
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }

    function edit_hotel_details($hotel_edit,$h_id)
    {
        $this->db->where('hotel_id', $h_id);        
        $query_details = $this->db->update(TABLE_PRE.'hotel_details', $hotel_edit); 
        if($query_details){
            return true;
        }
        else{
            return false;
        }
    }

    function edit_hotel_contact($hotel_contact_details_edit,$h_id)
    {
        $this->db->where('hotel_id', $h_id);       
        $query_contact = $this->db->update(TABLE_PRE.'hotel_contact_details', $hotel_contact_details_edit);
        if ($query_contact) {
            return true;
        }
        else{
            return false;
        }
    }

    function edit_hotel_tax($hotel_tax_details_edit,$h_id)
    {
        $this->db->where('hotel_id', $h_id);
        $query_tax = $this->db->update(TABLE_PRE.'hotel_tax_details', $hotel_tax_details_edit);
        if ($query_tax) {
            return true;
        }
        else{
            return false;
        }
    }

    function edit_hotel_billing($hotel_billing_settings_edit,$h_id)
    {
        $this->db->where('hotel_id', $h_id);
        $query_billing = $this->db->update(TABLE_PRE.'hotel_billing_setting', $hotel_billing_settings_edit);
        if ($query_billing) {
            return true;
        }
        else{
            return false;
        }
    }


    function edit_hotel_preferences($hotel_general_preference_edit,$h_id)
    {
        $this->db->where('hotel_id', $h_id);
        $query_preference = $this->db->update(TABLE_PRE.'hotel_general_preference', $hotel_general_preference_edit);           
        if ($query_preference) {
            return true;
        }
        else{
            return false;
        }
    }

	
	function get_broker_details($b_id_edit)
	{
		//echo "In Model";
		//echo  $b_id_edit;
		//exit();
		$this->db->select('*');
        $this->db->where('b_id=',$b_id_edit);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'broker');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
 /*   function get_channel_details($c_id_edit)
    {
        //echo "In Model";
        //echo  $b_id_edit;
        //exit();
        $this->db->select('*');
        $this->db->where('channel_id=',$c_id_edit);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'channel');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }*/
	
	function get_c_details($c_id_edit)
	{
		//echo "In Model";
		//echo  $b_id_edit;
		//exit();
		$this->db->select('*');
        $this->db->where('c_id=',$c_id_edit);
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'compliance');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	
	
	function edit_guest($guest_edit,$g_id)
	{
		$this->db->where('g_id', $g_id);
		$query = $this->db->update(TABLE_PRE.'guest', $guest_edit);
		//echo  $this->db->last_query();
		if($query){
			return true;
		}else{
			return false;
		}
		
	}

    function edit_room($room_edit,$room_id)
    {
        $this->db->where('room_id', $room_id);
        $query = $this->db->update(TABLE_PRE.'room', $room_edit['room']);
		$this->db->where_in('room_id', $room_id);
        $query=$this->db->delete(TABLE_PRE.'room_room_features');
		foreach($room_edit['feature'] as $key => $value)
		{
		  $roomFeature['room_feature_id'] = $key;
		  $roomFeature['room_feature_type'] = $value;
		  $roomFeature['room_id'] = $room_id;
		  $qry=$this->db->insert(TABLE_PRE.'room_room_features',$roomFeature);
		}
        //echo  $this->db->last_query();
        if($query){
            return true;
        }else{
            return false;
        }
        
    }

    function delete_room($room_id){
        $this->db->where_in('room_id',$room_id);
        $query=$this->db->delete(TABLE_PRE.'room');
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function delete_broker($b_id){
        $this->db->where_in('b_id',$b_id);
        $query=$this->db->delete(TABLE_PRE.'broker');
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function delete_event($e_id){
        $this->db->where_in('e_id',$e_id);
        $query=$this->db->delete(TABLE_PRE.'events');
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function delete_guest($g_id){
        $this->db->where_in('g_id',$g_id);
        $query=$this->db->delete(TABLE_PRE.'guest');
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function delete_compliance($c_id){
        $this->db->where_in('c_id',$c_id);
        $query=$this->db->delete(TABLE_PRE.'compliance');
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
	function edit_broker($broker_edit,$b_id)
	{
		//echo "In model".$b_id;
		//print_r($broker_edit);
		//exit();
		$this->db->where('b_id', $b_id);
		$query = $this->db->update(TABLE_PRE.'broker', $broker_edit);
		//echo  $this->db->last_query();
		if($query){
			return true;
		}else{
			return false;
		}
	}

    function edit_compliance($compliance_edit,$c_id)
    {
        $this->db->where('c_id', $c_id);
        $query = $this->db->update(TABLE_PRE.'compliance', $compliance_edit);
        //echo  $this->db->last_query();
        if($query){
            return true;
        }else{
            return false;
        }
        
    }
	
	function all_booking_id()
	{
		$this->db->select('booking_id');
		//$this->db->from(TABLE_PRE.'bookings');
		$this->db->where('hotel_id',$this->session->userdata('user_hotel'));
		$query = $this->db->get(TABLE_PRE.'bookings');
		if($query->num_rows() > 0){
   			foreach($query->result_array() as $row){
    		$data[] = $row;
   			}
   			return $data;
  		}
		else
		{
			return false;
		}
	}
	
	/* 18.11.2015 */
	/* 19.11.2015*/
	function all_t_amount($val)
	{
		/*$agr = array(
			'hotel_id' => $this->session->userdata('user_hotel'),
			'booking_id'=> $val);
		$this->db->select('*');
		$this->db->where($agr);
		$query = $this->db->get(TABLE_PRE.'bookings');
		if($query->num_rows() > 0){
   			foreach($query->result_array() as $row){
    		$data[] = $row;
   			}
   			return $data;
  		}
		else
		{
			return false;
		}*/
		
		$this->db->select('base_room_rent,rent_mode_type,mod_room_rent');
		$this->db->from('hotel_bookings');
		$this->db->where('booking_id',$val);
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
   			/*foreach($query->result_array() as $row1){
    		//$data1[] = $row1;
   			}
   			return $data1;*/
			return $query->result();
  		}
		else
		{
			return false;
		}
	}
	/*19.11.2015*/
	
	function  all_bookings_unique(){


        /*$this->db->distinct();

        $this->db->select('room_id');

        $this->db->order_by('cust_from_date','asc');
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'bookings');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        } 4.12.2015 by sandip */ 
        /*$time = date('Y-m-d');
        $arr = array('t_date'=>$time);
        $this->db->select_sum('t_amount');
        $this->db->from(TABLE_PRE.'transactions');
        $this->db->where($arr);
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
        else
        {
            return false;
        }*/
		//$this->db->where('t_booking_id',$booking_id);
		//$time = date('Y-m-d');
		//$this->db->where(DATE_FORMAT('t_date',"%Y-%m-%d"),$time);
        $this->db->select('*');
        $this->db->from('hotel_transactions');
        $this->db->join('hotel_bookings', 'hotel_transactions.t_booking_id = hotel_bookings.booking_id', 'inner');
        $date = date("Y-m-d");
        $this->db->where('hotel_transactions.transaction_releted_t_id=',1);
        //$this->db->or_where('hotel_transactions.transaction_releted_t_id=', 6);

        //$this->db->where('hotel_transactions.transaction_releted_t_id=',6);
        $this->db->where('hotel_bookings.hotel_id=',$this->session->userdata('user_hotel'));
		$this->db->select_sum('hotel_transactions.t_amount');
        //$this->db->from(TABLE_PRE.'transactions');
		//$query = $this->db->get_where(TABLE_PRE.'transactions',array('t_date' => $date));
        $this->db->like('hotel_transactions.t_date', $date, 'after');
        $query = $this->db->get();
        //$str = $this->db->last_query();
        //echo $str;
        //exit();
		if($query->num_rows()>0)
        {
			return $query->result();	 
        }
		else
        {
            return false;
		}
    }


 function report_search($visit,$room_id, $date_1,$date_2,$status,$r_hotel){


        $this->db->like('nature_visit',$visit);
        $this->db->like('room_id',$room_id);

//     $sql = "SELECT * FROM ".TABLE_PRE."bookings WHERE  ( ((cust_end_date <= '".$date_2."') AND (cust_from_date >= '".$date_1."')) OR (nature_visit LIKE '%".$visit."%') OR  (room_id LIKE '".$room_id."') ) ";
if($status=="5"){
	$this->db->where('booking_status_id',5);
}

if($r_hotel!=""){
	$this->db->where('hotel_id',$r_hotel);
}


if($date_1  && $date_2)

{
    if($date_2=="1970-01-01")
    {
        $date_2="3000-01-01";


    }

    $this->db->where('cust_from_date >=', $date_1);
    $this->db->where('cust_end_date <=', $date_2);

}
       // $this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'bookings');




        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }



    }


function fetch_all_address($pincode)
{
        $this->db->distinct();
        $this->db->select('area_0,area_1,area_4');
        $this->db->from('hotel_area_code');
        $this->db->where('pincode',$pincode);
        $query=$this->db->get();

        if($query->num_rows() >0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
}
function all_f_reports(){
    $this->db->where('t_amount !=',0);
        $this->db->order_by('t_booking_id','desc');
        $this->db->like('t_date',date("Y-m-d"));
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'transactions');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	function all_f_types(){
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'transaction_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	function all_f_entity(){
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'entity_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
		function add_booking_transaction($t_transaction){
				//echo "In Model";
				//print_r($t_transaction);
				//exit();
				$query=$this->db->insert(TABLE_PRE.'transactions',$t_transaction);
				$sql = $this->db->last_query();
				//echo $sql;
				//exit();
        		if($query){
            			return true;
        		}else{
            			return false;
        		}
		}
		
		function get_data_for_excel()
		{
			$this->db->select('booking_id,cust_name,room_id,cust_from_date,cust_end_date,cust_contact_no,mod_room_rent,nature_visit');
        	$this->db->from(TABLE_PRE.'bookings');
        	$query=$this->db->get();

        	if($query->num_rows() >0){
            	return $query->result();
        	}
        	else{
            	return false;
        	}
		}
		
		function update_checkout_status($booking_id,$date_checkout)
		{
            //checkin time logic
            $times=$this->dashboard_model->checkin_time();
            foreach($times as $time) {
                if($time->hotel_check_in_time_fr=='PM') {
                    $modifier = ($time->hotel_check_in_time_hr + 12);
                }
                else{
                    $modifier = ($time->hotel_check_in_time_hr);
                }
            }

            date_default_timezone_set('Asia/Kolkata');
            $time_date_data=date('Y-m-d H:i:s');
            $current_date = date('Y-m-d H:i:s', strtotime($time_date_data) - 60 * 60 * $modifier);
            $date_checkout_modified = date('Y-m-d H:i:s', strtotime($date_checkout) +60 * 60 * $modifier);

            /*echo $time_date_data."".$date_checkout_modified;
            exit();*/

            if($time_date_data>$date_checkout_modified){
                $current_date=$date_checkout;
            }


			$data = array(

               'booking_status_id' => '6',
                'cust_end_date' => $current_date,
                'checkout_time' => date("H:i:s"),
			   'booking_status_id_secondary' => ''
               );
			 $this->db->where('booking_id', $booking_id);
			 $query=$this->db->update(TABLE_PRE.'bookings',$data);
			 if($query)
			 {
				 return true;
			 }
			 else{
				 return false;
			 }
		}
		function update_cancel_status($booking_id)
		{
			$data = array(
               'booking_status_id' => '7',
			   'booking_status_id_secondary' => ''
               );
			 $this->db->where('booking_id', $booking_id);
			 $query=$this->db->update(TABLE_PRE.'bookings',$data);
			 if($query)
			 {
				 return true;
			 }
			 else{
				 return false;
			 }
		}
		
		function update_checkin_status($booking_id)
		{
            //checkin time logic
            $times=$this->dashboard_model->checkin_time();
            foreach($times as $time) {
                if($time->hotel_check_in_time_fr=='PM') {
                    $modifier = ($time->hotel_check_in_time_hr + 12);
                }
                else{
                    $modifier = ($time->hotel_check_in_time_hr);
                }
            }

            date_default_timezone_set('Asia/Kolkata');
            $time_date_data=date('Y-m-d H:i:s');
            $current_date = date('Y-m-d H:i:s', strtotime($time_date_data) - 60 * 60 * $modifier);
			$data = array(
               'booking_status_id' => '5',
                'cust_from_date'=> $current_date,
			   'checkin_time' => date("H:i:sa"),
			   'booking_status_id_secondary' => ''
               );
			 $this->db->where('booking_id', $booking_id);
			 $query=$this->db->update(TABLE_PRE.'bookings',$data);
			 if($query)
			 {
				 return true;
			 }
			 else{
				 return false;
			 }
		}
		
		function guest_check($id){
			
			$query=$this->db->where(TABLE_PRE.'guest',$id);
        if($query->num_rows()==1){
            return true;
        }else{ 
            return false;
        }
		}

    //Get Hotel Checkin Time
    function checkin_time(){
        $this->db->where('hotel_id',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'hotel_general_preference');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function update_broker_commission($id,$commission){


        $query="UPDATE `".TABLE_PRE."broker` SET `broker_commission_total` = `broker_commission_total` + '".$commission."' WHERE `b_id`='".$id."' ";
        $result=$this->db->query($query);

        if($result)
        {
            return true;
        }
        else{
            return false;
        }

    }
   function update_channel_commission2($id,$commission){


        $query="UPDATE `".TABLE_PRE."channel` SET `channel_commission_total` = `channel_commission_total` + '".$commission."' WHERE `channel_id`='".$id."' ";
        $result=$this->db->query($query);

        if($result)
        {
            return true;
        }
        else{
            return false;
        }

    }

    function update_broker_booking($data){
        $this->db->where('booking_id',$data['booking_id']);
        $query=$this->db->update(TABLE_PRE.'bookings',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }


    function pay_broker($id,$commission){
        $query="UPDATE `".TABLE_PRE."broker` SET `broker_commission_payed` = `broker_commission_payed` + '".$commission."' WHERE `b_id`='".$id."' ";
        $result=$this->db->query($query);
        if($result)
        {
            return true;
        }
        else{
            return false;
        }

    }
	
	
	function get_guest_name($val){
		$this->db->select('g_name');
		$this->db->like('g_name', $val);
        $query=$this->db->get(TABLE_PRE.'guest');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
		
	}
	
	
	
	
	function  remove_online($id){


        $this->db->where('u_id', $id);
        $query=$this->db->delete(TABLE_PRE.'online');
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function  all_onlines(){
        date_default_timezone_set('Asia/Kolkata');

        $this->db->group_by('u_id');
        $this->db->order_by('online_id', "desc");
        $this->db->where('online_from >', date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))-60*60*8));
        $this->db->where('u_id!=', $this->session->userdata('user_id'));
        $query=$this->db->get(TABLE_PRE.'online');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }

    }

    function get_user_details($id){

        $this->db->where('admin_id=',$id);
        $query=$this->db->get(TABLE_PRE.'admin_details');
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
	
	function  add_feedback($data){
        $query=$this->db->insert(TABLE_PRE.'feedback',$data);
        if($query){
            return true;
        }else{
            return false;
        }

    }
	function all_feedback(){
        $this->db->order_by('id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'feedback');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

	function delete_feedback($fid){
        $this->db->where_in('id',$fid);
        $query=$this->db->delete(TABLE_PRE.'feedback');
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
    function send_message($data){
    $query=$this->db->insert(TABLE_PRE.'message',$data);
    if($query){
        return true;
    }else{
        return false;
    }
}

    function get_message($from,$to){
        $this->db->where('u_from_id=',$from);
        $this->db->where('u_to_id=',$to);
        $this->db->where('m_seen!=',1);
        $this->db->group_by('m_id');
        $query=$this->db->get(TABLE_PRE.'message');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function update_message($from,$to,$id){
        $query="UPDATE `".TABLE_PRE."message` SET `m_seen` = 1  WHERE `u_from_id`='".$from."' AND `u_to_id`='".$to."'  AND `m_id`='".$id."'";
        $result=$this->db->query($query);
        if($result)
        {
            return true;
        }
        else{
            return false;
        }

    }

    function all_messages($to){
        $this->db->where('u_to_id=',$to);
        //$this->db->where('u_to_id=',$to);
        $this->db->where('m_seen!=',1);
        $this->db->group_by('m_id');
        $query=$this->db->get(TABLE_PRE.'message');
        if($query->num_rows()>=0){
            return $query->num_rows();
        }else{
            return false;
        }
    }
    function all_messages_unseen($to){
        $this->db->where('u_to_id=',$to);
        //$this->db->where('u_to_id=',$to);
        $this->db->where('m_seen!=',1);
        $this->db->group_by('m_id');
        $query=$this->db->get(TABLE_PRE.'message');
        if($query->num_rows()>=1){
            return $query->result();
        }else{
            return false;
        }
    }

    function  all_pending(){
        $this->db->where('booking_status_id_secondary=',3);

        $this->db->or_where('booking_status_id_secondary=',9);
       // $this->db->group_by('booking_id');
        $query=$this->db->get(TABLE_PRE.'bookings');

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }

    }

	function  add_unit_type($data){
        $query=$this->db->insert(TABLE_PRE.'unit_type',$data);
        if($query){
            return true;
        }else{
            return false;
        }

    }
	function all_unit_type(){
        $this->db->order_by('id','desc');
        $query=$this->db->get(TABLE_PRE.'unit_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	function delete_unit_type($fid){
        $this->db->where('id=',$fid);
        $query=$this->db->delete(TABLE_PRE.'unit_type');
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
	function get_unit_name($unt){
		$this->db->select('id,unit_name');
        $this->db->where('unit_type=',$unt);
        $query=$this->db->get(TABLE_PRE.'unit_type');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }
	function get_unit_class($untID){
		$this->db->select('unit_class');
        $this->db->where('id=',$untID);
        $query=$this->db->get(TABLE_PRE.'unit_type');
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }	
	
	function get_all_room_feature(){
		$this->db->select('room_feature_id,room_feature_name');
        $query=$this->db->get(TABLE_PRE.'room_features');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }	

	function get_unit_details($untID){
		$this->db->select('*');
        $this->db->where('id=',$untID);
        $query=$this->db->get(TABLE_PRE.'unit_type');
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }
	
	function get_all_room_feature_id($untID){
		$this->db->select('*');
        $this->db->where('room_id=',$untID);
        $query=$this->db->get(TABLE_PRE.'room_room_features');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }

	
	function get_booking_details($bookingID){
		$this->db->select('hotel_bookings.*,hotel_guest.*');
        $this->db->from('hotel_bookings');
		$this->db->where('hotel_bookings.booking_id=',$bookingID);
		$this->db->join('hotel_guest', 'hotel_bookings.guest_id = hotel_guest.g_id');
        $query=$this->db->get();
        //echo "<pre>";
        //print_r($query->result());
        //exit;
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    function get_service_details($id){
        $this->db->select('*');
        $this->db->where('s_id=',$id);
        $query=$this->db->get(TABLE_PRE.'service');
        //echo "<pre>";
        //print_r($query->result());
        //exit;
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
	
	function get_hotel_room($roomID){
		$this->db->select('hotel_room.room_no,hotel_hotel_details.hotel_name');
        $this->db->from('hotel_room');
		$this->db->where('hotel_room.room_id=',$roomID);
		$this->db->join('hotel_hotel_details', 'hotel_room.hotel_id = hotel_hotel_details.hotel_id');
        $query=$this->db->get();
        //echo "<pre>";
        //print_r($query->result());
        //exit;
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }	
	
	function get_brokerNameByID($brokerID){
		$this->db->select('*');
        $this->db->where('b_id=',$brokerID);
        $query=$this->db->get(TABLE_PRE.'broker');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

	function get_brokerName(){
		$this->db->select('b_id,b_name');
        $query=$this->db->get(TABLE_PRE.'broker');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
	function get_amountPaidByBookingID($amountPaid){
		$sql = "SELECT SUM(t_amount) as tm FROM `hotel_transactions` WHERE t_booking_id ='$amountPaid' GROUP BY t_booking_id";
		$query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }


    function add_stay_details($stay,$booking_id){
        $this->db->where('booking_id', $booking_id);
        $query = $this->db->update(TABLE_PRE.'bookings', $stay);
        //echo  $this->db->last_query();
		//exit;
        if($query){
            return true;
        }else{
            return false;
        }
        
    }
    function add_pay_info($payInfo,$booking_id){
        $this->db->where('booking_id', $booking_id);
        $query = $this->db->update(TABLE_PRE.'bookings', $payInfo);
        //echo  $this->db->last_query();
		//exit;
        if($query){
            return true;
        }else{
            return false;
        }
        
    }
	

	function get_booking_status($sID){
		$this->db->select('*');
        $this->db->where('status_id=',$sID);
        $query=$this->db->get('booking_status_type');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    function add_guest_info($guest,$guest_id,$preference,$booking_id){
		$this->db->where('booking_id', $booking_id);
        $qry = $this->db->update(TABLE_PRE.'bookings', $preference);
        $this->db->where('g_id', $guest_id);
        $query = $this->db->update(TABLE_PRE.'guest', $guest);
        //echo  $this->db->last_query();
		//exit;
        if($query){
            return true;
        }else{
            return false;
        }
        
    }	
	
	
	function all_feedbackByID($booking_id){
		$this->db->select('*,(sleep_quality + room_quality + env_quality+ food_quality+extra+package+service+ambience+cleanliness+staff+reception+ease_booking) as tot');
        $this->db->where('booking_id', $booking_id);
        $query=$this->db->get(TABLE_PRE.'feedback');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	
    function  add_channel($data){
        $query=$this->db->insert(TABLE_PRE.'channel',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }	
	
	function all_channels(){
        $this->db->order_by('channel_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'channel');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
	
	
	function get_channel_details($b_id_edit){
		$this->db->select('*');
        $this->db->where('channel_id=',$b_id_edit);
        $query=$this->db->get(TABLE_PRE.'channel');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
	}	
	
	
	function edit_channel($channel,$channel_id){
		$this->db->where('channel_id', $channel_id);
		$query = $this->db->update(TABLE_PRE.'channel', $channel);
		if($query){
			return true;
		}else{
			return false;
		}
	}	
	
	
    function delete_channel($channel_id){
        $this->db->where_in('channel_id',$channel_id);
        $query=$this->db->delete(TABLE_PRE.'channel');
        if($query){
            return true;
        }else{
            return false;
        }
    }	

    function all_channel_limit(){
        $this->db->order_by('channel_id','desc');
        $this->db->where('hotel_id=',$this->session->userdata('user_hotel'));
        //$this->db->limit($limit,$start);
        $query=$this->db->get(TABLE_PRE.'channel');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function update_channel_commission($channel_id,$commission)
    {
        $query="UPDATE `".TABLE_PRE."channel` SET `channel_commission_total` = `channel_commission_total` + '".$commission."' WHERE `channel_id`='".$channel_id."' ";
        $result=$this->db->query($query);

        if($result)
        {
            return true;
        }
        else{
            return false;
        }

    }

    function update_channel_booking($data){
        $this->db->where('booking_id',$data['booking_id']);
        $query=$this->db->update(TABLE_PRE.'bookings',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
	
    function pay_channel($channel_id,$commission){
        $query="UPDATE `".TABLE_PRE."channel` SET `channel_commission_payed` = `channel_commission_payed` + '".$commission."' WHERE `channel_id`='".$channel_id."' ";
        $result=$this->db->query($query);
        if($result)
        {
            return true;
        }
        else{
            return false;
        }

    }

    function  rule_create($data){

        $query=$this->db->insert(TABLE_PRE.'service_rule',$data);
        if($query){
            return $this->db->insert_id();

        }else{
            return 'Some Database Error Occurred';
        }

       // return 'ok';

    }

    function  insert_service($data){

        $query=$this->db->insert(TABLE_PRE.'service',$data);
        if($query){
            return $this->db->insert_id();

        }else{
            return 'Some Database Error Occurred';
        }

        // return 'ok';

    }

    function add_asset($asset){
        $query=$this->db->insert(TABLE_PRE.'assets',$asset);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function all_assets_limit(){
        $this->db->order_by('a_id','desc');
        $this->db->where('a_hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'assets');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    function all_services(){
       // $this->db->order_by('a_id','desc');
       // $this->db->where('a_hotel_id=',$this->session->userdata('user_hotel'));
        $query=$this->db->get(TABLE_PRE.'service');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    function  service_booking_match($booking_id,$service_rule){

        $sql = "SELECT * FROM `hotel_bookings` LEFT OUTER JOIN `hotel_guest` ON `hotel_bookings`.`guest_id`=`hotel_guest`.`g_id`  LEFT OUTER JOIN `hotel_room` ON `hotel_bookings`.`room_id`= `hotel_room`.`room_id`
WHERE booking_id=".$booking_id." AND ".$service_rule." ";

        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function  add_service_to_booking_db($data){

        $sql1="UPDATE `hotel_bookings` SET service_price = service_price +'".$data['service_price']."'    WHERE booking_id ='".$data['booking_id']."' ";
        $sql2="UPDATE `hotel_bookings` SET  service_id=concat(service_id,'".$data['service_id']."')  WHERE booking_id ='".$data['booking_id']."' ";


        /* $this->db->where('booking_id',$data['booking_id']);*/
        $query1=$this->db->query($sql1);
        $query2=$this->db->query($sql2);
        if($query1 && $query2){
            return 'Service Added Successfully';
        }else{
            return 'DB Error';
        }

    }

    function add_asset_type($asset_type){
        $query=$this->db->insert(TABLE_PRE.'asset_type',$asset_type);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function all_assets_tasks(){
        $this->db->order_by('asset_type_id','desc');
        $query=$this->db->get(TABLE_PRE.'asset_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function all_assets_types(){
        $this->db->order_by('asset_type_id','desc');
        $query = $this->db->get(TABLE_PRE.'asset_type');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function  add_maid($data){
        $query=$this->db->insert(TABLE_PRE.'housekeeping_maid',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }

    function  assign_maid($data){
        $query=$this->db->insert(TABLE_PRE.'housekeeping_matrix',$data);
        if($query){
            return true;
        }else{
            return false;
        }



    }
    function all_maids(){
       // $this->db->order_by('asset_type_id','desc');
        $query = $this->db->get(TABLE_PRE.'housekeeping_maid');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    function all_maids_limit(){
        $this->db->where('maid_status =',0);
        $query = $this->db->get(TABLE_PRE.'housekeeping_maid');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    function update_maid($maid){

        $this->db->where('maid_id=',$maid['maid_id']);
        $query=$this->db->update(TABLE_PRE.'housekeeping_maid',$maid);
        if($query){
            return true;
        }else{
            return false;
        }
    }

}



?>