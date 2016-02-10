<?php

class Room {}
class Result {}
class Event {}
class bookings  extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();

		$this->load->database();
                //$login_id=$this->session->userdata('admin_id');
                //if(!$login_id>0){redirect(base_url('admin/login')); }
		$this->load->model('mod_common');
		$this->load->model('bookings_model');
		$this->load->model('dashboard_model');
		$this->load->library('grocery_CRUD');
	}
	 public function customer()
    {
        $data=array();
        $data['page_title']='Adminpanel : Content customer management';
        $data['success_message']=$this->session->flashdata('success_message');
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('customer_details')
        ->set_subject('customer')
        ->columns('customer_id','name','identification','zender','city','state','country_id' )
        ->required_fields('name')
        ->display_as('name','Name')
        ->display_as('country_id','Country')
        ->display_as('is_deleated','Deleated')  
        ->display_as('customer_id','ID')          
        ->display_as('date_added','Created on')
		->set_rules('email_id','Email','valid_email|required')
		->set_rules('postal_code','Postal Code','integer|max_length[6]')
        ->add_fields('name','identification','zender' ,'contact_number','email_id','address','city','state','country_id','postal_code','date_added')    
        ->edit_fields('name','identification','zender' ,'contact_number','email_id','address','city','state','country_id','postal_code')
        ->field_type('is_deleated','dropdown',array('1'=>'yes', '0'=>'No', ''=>'No'), 0)         
        ->field_type('date_added', 'hidden', date("Y-m-d H:i:s"))
        ->set_relation('country_id','hotel_countries','country_name')
        ->unset_delete()         
        ->add_action('remove', base_url('resources/images/erase.png') , 'admin/index/delete_customer')  
               
       ->where('is_deleated',0);

        $output = $crud->render();
        foreach($output as $key=>$val){ $data
        	[$key]=$val;}
        $this->mod_common->display_admin('dashbord',$data);
    }
	public function hotel_room()
    {
        $data=array();
        $data['page_title']='Adminpanel : Room management';
        $data['success_message']=$this->session->flashdata('success_message');
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('hotel_room')
        ->set_subject('Room')
        ->columns('room_id','hotel_id','room_bed','room_image_thumb','room_rent','hotel_city','hotel_country','room_availability' )
        ->required_fields('hotel_id','room_bed','room_availability','room_rent')
		->set_field_upload('room_image_thumb','assets/uploads/room_thumb')    
		->set_field_upload('room_image','assets/uploads/room') 
        ->display_as('hotel_id','Hotel')
		
        ->display_as('room_modification_date','Modified on')
        ->display_as('is_deleated','Deleated')  
        ->display_as('room_id','ID')          
        ->display_as('room_add_date','Created on')
		->set_rules('room_rent','Email','decimal|required')
        ->add_fields('hotel_id','room_bed','room_image_thumb','room_image','ac_availability','room_rent','room_availability','room_add_date')    
        ->edit_fields('hotel_id','room_bed','room_image_thumb','room_image','ac_availability','room_rent','room_availability')      
        ->field_type('room_add_date', 'hidden', date("Y-m-d H:i:s"))
        ->set_relation('hotel_id','hotel_hotel_details','hotel_name');

        $output = $crud->render();
        foreach($output as $key=>$val){ $data[$key]=$val;}

                $this->mod_common->display_admin('dashbord',$data);
    }
	public function events()
    {
        $data=array();
        $data['page_title']='Adminpanel : Event management';
        $data['success_message']=$this->session->flashdata('success_message');
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('event_list')
        ->set_subject('Event')
        ->columns('event_id','name','date','to_date','city','country_id' )
        ->required_fields('name','date','city','country_id')
		->set_field_upload('room_image_thumb','assets/uploads/room_thumb')    
		->set_field_upload('room_image','assets/uploads/room') 
        ->display_as('hotel_id','Hotel')
		
		->display_as('date','From Date')
		->display_as('to_date','To Date')
		
        ->display_as('room_modification_date','Modified on')
        ->display_as('country_id','Country')  
        ->display_as('event_id','ID')          
        ->display_as('date_added','Created on')
		->set_rules('room_rent','Email','decimal|required')
		->set_rules('to_date','To Date','callback_range_validation')
        ->add_fields('name','date','to_date','city','country_id' ,'description','date_added')    
        ->edit_fields('name','date','to_date','city','country_id' ,'description')      
        ->field_type('date_added', 'hidden', date("Y-m-d H:i:s"))
        ->set_relation('country_id','hotel_countries','country_name');

        $output = $crud->render();
        foreach($output as $key=>$val){ $data[$key]=$val;}

                $this->mod_common->display_admin('dashbord',$data);
    }
	function range_validation()
	{
		$date1=date_create($this->input->post('date'));
		$date2=date_create($this->input->post('to_date'));
		$diff=date_diff($date1,$date2);
		if($diff>0)
		{
			return true;
		}
		$this->form_validation->set_message("range_validation", 'To date should be grater than from date');
		return false;
		 
	}	
	/*  start on 05/11/15   */
	function hotel_backend_rooms()
	{
		//$id = $this->session->userdata('user_id');
		//$data = $this->dashboard_model->admin_status($id);
			//if(isset($data) && $data){
			 	$hotel_id = $this->session->userdata('user_hotel');
				/*}else{
				$hotel_id = '';
				}*/
		$rooms = $this->bookings_model->all_rooms_hotelwise($hotel_id);
		$result = array();
		foreach($rooms as $room) {
		  $r = new Room();
		  $r->id = $room->room_id;
		  $s = "";
		  $style = "<div style=".$s."></div>";
		  $r->name = $room->room_no."<br/><br/>".$room->room_bed." Bed".$style;
		  $r->capacity = $room->room_bed;
		  $r->status = $room->room_status;
		  $result[] = $r;	  
		}
		header('Content-Type: application/json');
		echo json_encode($result);		
	}	
	function hotel_backend_onchange_room()
	{
		/*$id = $this->session->userdata('user_id');
		$data = $this->dashboard_model->admin_status($id);
			if(isset($data) && $data){
				$hotel_id = $this->session->userdata('user_hotel');
				}else{
				$hotel_id = '';
				}*/
		$hotel_id = $this->session->userdata('user_hotel');		
		$capacity = $this->input->post('capacity');
		if($capacity == 1 || $capacity == 2)
		{
			$rooms = $this->bookings_model->all_rooms_onchange_hotelwise($hotel_id,$capacity);
		}
		else
		{
			$rooms = $this->bookings_model->all_rooms_hotelwise($hotel_id);
		}
		$result = array();
		foreach($rooms as $room) {
		  $r = new Room();
		  $r->id = $room->room_id;
		  $r->name = $room->room_no;
		  $r->capacity = $room->room_bed;
		  $r->status = $room->room_status;
		  $result[] = $r;	  
		}
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	
	function hotel_new_booking()
	{
		
		//$data['page'] = 'backend/dashboard/add_hrm';
		/*$id = $this->session->userdata('user_id');
		$data1 = $this->dashboard_model->admin_status($id);
			if(isset($data1) && $data1){
				$hotel_id = $this->session->userdata('user_hotel');
				}else{
				$hotel_id = '';
				}*/
		$hotel_id = $this->session->userdata('user_hotel');		
		$data['resource'] = $_GET['resource'];
		$data['rooms'] = $this->bookings_model->room_hotelwise($hotel_id,$_GET['resource']);
        $data['events'] = $this->dashboard_model->all_events_limit();
		$data['taxes'] = $this->bookings_model->room_tax($hotel_id);
        $data['times']=$this->dashboard_model->checkin_time();
		$data['start'] = $_GET['start'];
		$data['end'] = $_GET['end'];
		
        $this->load->view("backend/dashboard/pop_new_booking",$data);
	}



    function hotel_new_booking2()
    {

        //$data['page'] = 'backend/dashboard/add_hrm';
        /*$id = $this->session->userdata('user_id');
        $data1 = $this->dashboard_model->admin_status($id);
            if(isset($data1) && $data1){
                $hotel_id = $this->session->userdata('user_hotel');
                }else{
                $hotel_id = '';
                }*/
        $hotel_id = $this->session->userdata('user_hotel');


        $this->load->view("backend/dashboard/pop_new_booking");
    }
	
	function return_broker()
	{
		
		
		$hotel_id = $this->session->userdata('user_hotel');		
		$broker = $this->bookings_model->broker_hotelwise($hotel_id);
		header('Content-Type: application/json');
	  	echo json_encode($broker);
	}
    function return_channel()
    {


        $hotel_id = $this->session->userdata('user_hotel');
        $broker = $this->bookings_model->channel_hotelwise($hotel_id);
        header('Content-Type: application/json');
        echo json_encode($broker);
    }

    function  hotel_backend_create_basic(){

        $times=$this->dashboard_model->checkin_time();
        foreach($times as $time) {
            if($time->hotel_check_in_time_fr=='PM') {
                $modifier = ($time->hotel_check_in_time_hr + 12);
            }
            else{
                $modifier = ($time->hotel_check_in_time_hr);
            }
        }

        $hotel_id = $this->session->userdata('user_hotel');
        $id = $this->session->userdata('user_id');
        $from_date = date('Y-m-d',strtotime($this->input->post('start_dt')));
        $from_date_final=date('Y-m-d H:i:s', strtotime($from_date));

        $end_date = date('Y-m-d',strtotime($this->input->post('end_dt')));
        $end_date_final=date('Y-m-d H:i:s', strtotime($end_date)+60*60*24);
        $new_book = array(
            'hotel_id' => $hotel_id,
            'user_id' => $id,
            'room_id' => $this->input->post('room_id'),
           // 'guest_id' => $guest_id,
            'cust_name' => $this->input->post('cust_name'),
            //'cust_address' => $this->input->post('cust_address'),
           // 'cust_contact_no' => $this->input->post('cust_contact_no'),
            'cust_from_date' => $from_date_final, //$cust_from_date,
            'cust_end_date' => $end_date_final,//$cust_end_date,
            //'checkin_time' => $checkin_time,
           // 'confirmed_checkin_time' => $checkin_time,
           // 'checkout_time' => $checkout_time,
           // 'confirmed_checkout_time' => $checkout_time,
           // 'nature_visit' => $this->input->post('nature_visit'),
           // 'next_destination' => $this->input->post('next_destination'),
            'booking_status_id' => 8,
            //'cust_payment_initial' => $this->input->post('cust_payment_initial')
        );





        $bookings_id = $this->bookings_model->add_new_room($new_book);
        $data = array(
            'bookings_id' => $bookings_id
        );


    }
	
	function hotel_backend_create()
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



		$id2=$this->input->post('id_guest');
		$id = $this->session->userdata('user_id');
		/*$data1 = $this->dashboard_model->admin_status($id);
			if(isset($data1) && $data1){
				$hotel_id = $data1->admin_hotel;
				}else{
				$hotel_id = '';
				}*/
		$hotel_id = $this->session->userdata('user_hotel');			
		//date_default_timezone_set("Asia/Kolkata");
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
       /* if($end_time<$modifier){
            exit();
        }*/



		$start_hour = round($start_time);
		$end_hour = round($end_time);
		
		$final_start_hour = $start_hour - $modifier;
		$final_end_hour = $end_hour - $modifier;
		
		$final_start_time = $final_start_hour.":00:00";
		$final_end_time = $final_end_hour.":00:00";
		
		$checkin_time = date("H:i:s", strtotime($start_time));
		$checkout_time = date("H:i:s", strtotime($end_time));
		
		/*$cust_from_date = date('Y-m-d',strtotime($this->input->post('start_dt')));
		$cust_end_date = date('Y-m-d',strtotime($this->input->post('end_dt')));*/
		
		$cust_from_date = date('Y-m-d',strtotime($this->input->post('start_dt')))."T".date("H:i:s", strtotime($final_start_time));
		$cust_end_date = date('Y-m-d',strtotime($this->input->post('end_dt')))."T".date("H:i:s", strtotime($final_end_time));
		
/*Subha's calculation */
        $from_date = date('Y-m-d',strtotime($this->input->post('start_dt')))."T".date("H:i:s", strtotime($start_time));
        $from_date_final=date('Y-m-d H:i:s', strtotime($from_date) - 60 * 60 * $modifier);

        $end_date = date('Y-m-d',strtotime($this->input->post('end_dt')))."T".date("H:i:s", strtotime($end_time));
        $end_date_final=date('Y-m-d H:i:s', strtotime($end_date) - 60 * 60 * $modifier);
		
		
		/*$today = date("Y-m-d");
		$current_date = date('Y-m-d',strtotime($this->input->post('start_dt')));
		if($today == $current_date)
		{ $booking_status_id = 5; }
		else
		{ $booking_status_id = 2; }*/
		$booking_status_id = 8;
		$guest = array(
                //'g_id' => $this->input->post('id_guest'),
                'hotel_id' => $hotel_id,
                'g_name' => $this->input->post('cust_name'),
                //'g_place' => $this->input->post('g_place'),
                'g_address' => $this->input->post('cust_address'),
                'g_contact_no' => $this->input->post('cust_contact_no'),
                //'g_email' => $this->input->post('g_email'),
                //'g_gender' => $this->input->post('g_gender'),
                //'g_dob' => $this->input->post('g_dob'),
                //'g_occupation' => $this->input->post('g_occupation'),
                //'g_married' => $this->input->post('g_married'),
                //'g_id_type' => $this->input->post('g_id_type'),
                //'g_photo' => '',
                //'g_id_proof' => '',




            );
			
			
			
			if($id2==""){
				
				$guest_id = $this->bookings_model->add_guest($guest);
			}
			else{
				$guest_id=$id2;
			}
			
			
			
			
			
				
				
				$new_book = array(
                'hotel_id' => $hotel_id,
				'user_id' => $id,
                'room_id' => $this->input->post('room_id'),
				'guest_id' => $guest_id,
                'cust_name' => $this->input->post('cust_name'),
                'cust_address' => $this->input->post('cust_address'),
                'cust_contact_no' => $this->input->post('cust_contact_no'),
                'cust_from_date' => $from_date_final, //$cust_from_date,
                'cust_end_date' => $end_date_final,//$cust_end_date,
				'checkin_time' => $checkin_time,
				'confirmed_checkin_time' => $checkin_time,
				'checkout_time' => $checkout_time,
                    'confirmed_checkout_time' => $checkout_time,
				'nature_visit' => $this->input->post('nature_visit'),
				'next_destination' => $this->input->post('next_destination'),
                'booking_status_id' => $booking_status_id
                //'cust_payment_initial' => $this->input->post('cust_payment_initial')
            );
			
			
			
			
				
				$bookings_id = $this->bookings_model->add_new_room($new_book);
			
			
			
			
			
			
           
		
            
            
			
			
			
            /*if (isset($query) && $query) {
                $this->session->set_flashdata('succ_msg', "Reservation Added Successfully!");
                redirect('dashboard/add_booking_calendar');
            } else {
                $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                redirect('dashboard/add_booking_calendar');
            }*/
			//$response = new Result();
			$data = array(
				'bookings_id' => $bookings_id
				);
			
			

			header('Content-Type: application/json');
			echo json_encode($data);
	}
	
	
	function hotel_backend_create2()
	{
		
		/*$id = $this->session->userdata('user_id');
		$data1 = $this->dashboard_model->admin_status($id);
			if(isset($data1) && $data1){
				$hotel_id = $data1->admin_hotel;
				}else{
				$hotel_id = '';
				}*/
			$bookings_id = $this->input->post('booking_1st');
			$hotel_id = $this->session->userdata('user_hotel');	
			$no_of_guest = $this->input->post('adult') + $this->input->post('child');
			$booking_type = $this->input->post('booking_type');
			
			if($booking_type == 'current')
			{
				$booking_status_id = 5;
			}
			else if($booking_type=='temporaly'){
				$booking_status_id = 1;
			}
			else
			{
				$booking_status_id = 2;
			}

        date_default_timezone_set('Asia/Kolkata');



        /*
        $rent=$this->input->post('booking_rent');
        $room_id=$this->input->post('room_id');
        $rents=$this->bookings_model->rate($room_id);

        foreach($rents as $r){

        if($rent=="weekend"){

            $base_room_rent=$r->room_rent_weekend;

        }
        else if($rent=="seasonal"){

            $base_room_rent=$r->room_rent_seasonal;

        }
        else{

            $base_room_rent=$r->room_rent;
        }
        }*/
			
            $new_book = array(
				'booking_id' => $bookings_id,
				'no_of_guest' => $no_of_guest,
                'no_of_adult' => $this->input->post('adult'),
                'no_of_child' => $this->input->post('child'),
				'booking_source' => $this->input->post('booking_source'),
                'base_room_rent' => $this->input->post('base_room_rent'),
				'rent_mode_type' => $this->input->post('rent_mode_type'),
				'room_rent_total_amount' => $this->input->post('base_room_rent')*$this->input->post('stay_span'),
				'stay_days' => $this->input->post('stay_span'),
                'mod_room_rent' => $this->input->post('mod_room_rent'),
				'booking_status_id' => $booking_status_id,
                'comment' => $this->input->post('comment'),
				'booking_taking_time' => date("h:i:s")
            );
            $query = $this->bookings_model->add_new_room2($new_book);
			
			
			/*$source = $this->bookings_model->get_booking_details($bookings_id);
			foreach($source as $row)
				{
					$country = $row->area_0;
				}*/
			
			
			$data = array(
				'bookings_id' => $bookings_id,
				'booking_source' => $this->input->post('booking_source')
				);
			
			

			header('Content-Type: application/json');
			echo json_encode($data);
	}
	
	
	function hotel_backend_create4()
	{
		
		/*$id = $this->session->userdata('user_id');
		$data1 = $this->dashboard_model->admin_status($id);
			if(isset($data1) && $data1){
				$hotel_id = $data1->admin_hotel;
				}else{
				$hotel_id = '';
				}*/
			$bookings_id = $this->input->post('booking_3rd');
			$hotel_id = $this->session->userdata('user_hotel');	
			
			$select_bookings = $this->bookings_model->get_booking_details($bookings_id);
			foreach($select_bookings as $row)
			{
				$booking_status_id_pre = $row->booking_status_id;
			}

		if( $this->input->post('t_amount')!='') {
			if ($booking_status_id_pre == 2 || $booking_status_id_pre == 8) {
				$booking_status_id = 4;
			} else {
				$booking_status_id = 5;
			}
		}
		else{
			$booking_status_id =$booking_status_id_pre;
		}
			
			$new_book1 = array(
				'booking_id' => $bookings_id,
				'booking_status_id' => $booking_status_id
            );
            $query = $this->bookings_model->add_new_room2($new_book1);
			
            $new_book = array(
				't_booking_id' => $bookings_id,
                't_payment_mode' => $this->input->post('t_payment_mode'),
				't_bank_name' => $this->input->post('t_bank_name'),
                't_amount' => $this->input->post('t_amount'),
				'transaction_from_id' => 2,
				'transaction_to_id' => 4,
				'transaction_releted_t_id' => 1,
               
            );
            $query = $this->bookings_model->add_new_room4($new_book);
			
			 $new_book2 = array(
				'booking_id' => $bookings_id,

                'room_rent_sum_total' => $this->input->post('total'),
				'room_rent_tax_amount' => $this->input->post('tax'),
			
               
            );
            $query = $this->bookings_model->add_new_room5($new_book2);
			
			
			
			$data = array(
				'bookings_id' => $bookings_id
				);
			
			

			header('Content-Type: application/json');
			echo json_encode($data);
	}
	
	//For tax Calculation
	function hotel_backend_create5(){
		$bookings_id = $this->input->post('booking_3rd');
		
		 $new_book2 = array(
				'booking_id' => $bookings_id,
                'room_rent_sum_total' => $this->input->post('total'),
				'room_rent_tax_amount' => $this->input->post('tax'),
			
               
            );
            $query = $this->bookings_model->add_new_room5($new_book2);
			
			
			
			$data = array(
				'bookings_id' => $bookings_id
				);
			
			

			header('Content-Type: application/json');
			echo json_encode($data);
	}

    function hotel_backend_create_broker(){
        $bookings_id = $_GET['booking_id_broker'];

        $new_book3 = array(
            'booking_id' => $bookings_id,
            'broker_id' => $this->input->post('broker_id'),
            'broker_commission' => $this->input->post('broker_commission'),


        );
        $query = $this->bookings_model->add_new_room_broker($new_book3);

        $new_book8 = array(

            'broker_id' => $this->input->post('broker_id'),
            'broker_commission' => $this->input->post('broker_commission'),


        );

        $query = $this->dashboard_model->update_broker_commission($new_book8['broker_id'],$new_book8['broker_commission']);

        $data = array(
            'bookings_id' => $bookings_id
        );



        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function hotel_backend_create_channel(){
        $bookings_id = $_GET['booking_id_broker'];

        $new_book3 = array(
            'booking_id' => $bookings_id,
            'channel_id' => $this->input->post('broker_id'),
            'channel_commission' => $this->input->post('broker_commission'),


        );
        $query = $this->bookings_model->add_new_room_channel($new_book3);

        $new_book8 = array(

            'channel_id' => $this->input->post('broker_id'),
            'channel_commission' => $this->input->post('broker_commission'),


        );

        $query = $this->dashboard_model->update_channel_commission2($new_book8['channel_id'],$new_book8['channel_commission']);

        $data = array(
            'bookings_id' => $bookings_id
        );



        header('Content-Type: application/json');
        echo json_encode($data);
    }


    function hotel_backend_events()
	{

        $times=$this->dashboard_model->checkin_time();
        foreach($times as $time) {
            if($time->hotel_check_in_time_fr=='PM') {
                $modifier = ($time->hotel_check_in_time_hr + 12);
            }
            else{
                $modifier = ($time->hotel_check_in_time_hr);
            }
        }
		/*$id = $this->session->userdata('user_id');
		$data = $this->dashboard_model->admin_status($id);
			if(isset($data) && $data){
				$hotel_id = $this->session->userdata('user_hotel');
				}else{
				$hotel_id = '';
				}*/

		$hotel_id = $this->session->userdata('user_hotel');			
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		
		$result = $this->bookings_model->all_rooms_bookings_event($hotel_id,$start,$end);
		
		//change all temp hold to pending after 2 hr.
		foreach ($result as $rs){
			if($rs->booking_status_id==1){
                date_default_timezone_set('Asia/Kolkata');
				//$span=date('h:i:s')
				$time_checkin = strtotime($rs->booking_taking_time);
				$time=date("H:i", strtotime($time_checkin)+60*60*2);
				//$time=date('h:i:s', (strtotime($rs->booking_taking_time)+(100)));
				$current_time=date("H:i");
				if($time<$current_time){
					
					$data5 = array(
				'booking_status_id_secondary' => 3,
				);
				$query=$this->bookings_model->change_book_id2($rs->booking_id,$data5);
				
					
				}
				
			}
		}
		//change all advance to pending after checkin time passes.
		foreach ($result as $rs2){
			if($rs2->booking_status_id==2){


				
				/*$date_checkin = date('d-m-Y',strtotime($rs2->cust_from_date));
				$date_checkin_timestamp=strtotime($rs2->cust_from_date);
				$date=date("d-m-Y h:i:s", strtotime('+12 hours', $date_checkin_timestamp));
				
				$current_date=date("d-m-Y h:i:s");*/
				
				//$date_checkin = date("Y-m-d h:i:s",strtotime($rs2->cust_from_date));
				//$current_date=date("Y-m-d h:i:s");
                date_default_timezone_set('Asia/Kolkata');
				if(date("Y-m-d H:i:s",strtotime($rs2->cust_from_date)+60*60*$modifier+60*60*2)<date("Y-m-d H:i:s")){
					
					
					$data6 = array(
				'booking_status_id_secondary' => 3,
				);
				$query=$this->bookings_model->change_book_id2($rs2->booking_id,$data6);
				
					
				}
				
			}
		}
//change all confirmed to pending after checkout time passes.
       foreach ($result as $rs5){
            if($rs5->booking_status_id==4){



               date_default_timezone_set('Asia/Kolkata');
                if(date("Y-m-d H:i:s",strtotime($rs5->cust_end_date)+60*60*$modifier+60*60*2)<date("Y-m-d H:i:s")){


                    $data8 = array(
                        'booking_status_id_secondary' => 3,
                    );
                    $query=$this->bookings_model->change_book_id2($rs5->booking_id,$data8);


                }

            }
        }
		//change all checkin to due after checkout date passes.
		foreach ($result as $rs3) {
			if ($rs3->booking_status_id == 5) {

                date_default_timezone_set('Asia/Kolkata');
				if (date("Y-m-d H:i:s", strtotime($rs3->cust_end_date)+60*60*$modifier+60*60*2) < date("Y-m-d h:i:s")) {


					$data7 = array(
						'booking_status_id_secondary' => 9,
					);
					$query = $this->bookings_model->change_book_id2($rs3->booking_id, $data7);


				}


			}
		}

		
		
		
		$events = array();

		date_default_timezone_set("UTC");
		$now = new DateTime("now");
		$today = $now->setTime(0, 0, 0);

		foreach($result as $row) {
            date_default_timezone_set('Asia/Kolkata');
			$e = new Event();
			$e->id = $row->booking_id;
			$e->cust_name =$row->cust_name;
			$e->text = $row->cust_name." ( ".$row->cust_contact_no." ) ";
			$e->amt_till = $row->cust_payment_initial;
			$e->start = $row->cust_from_date;
			$e->source = $row->booking_source;
			$e->end = $row->cust_end_date;
			$e->resource = $row->room_id;
			$e->status = $row->booking_status_id;
			$e->status_secondary = $row->booking_status_id_secondary;
			if($e->status==5){
				$time="Checkin Time:".$row->checkin_time;
			}
			else if($e->status==6){
				$time="Checkout Time:".$row->checkout_time;
			}
			else{
				$time="Not arrived ";
			}
			$e->bubbleHtml = "".$e->text."<br/>  ".$time."<br/> Source: Front Desk";
			//$e->bubbleHtml = "Reservation details: <br/>".$e->text."<br/> Source:";
			// additional properties
			
			$e->booking_status = $row->booking_status;
			if($row->booking_status_id_secondary !=0){
				$codes=$this->bookings_model->fetch_color($row->booking_status_id_secondary);
				foreach($codes as $color){
					$e->booking_status_secondary = $color->booking_status_slug;
				}
			}
			else{
				$e->booking_status_secondary = '';
			}

			if($row->booking_status_id_secondary !=0){
				$codes=$this->bookings_model->fetch_color($row->booking_status_id_secondary);
				foreach($codes as $color){
					$e->bar_color_code = $color->bar_color_code;
				}
				
			}
			else{
			$e->bar_color_code = $row->bar_color_code;
			}

            $transaction = $this->bookings_model->get_total_payment($row->booking_id);

               if (isset($transaction) && $transaction) {
                   if($row->room_rent_sum_total==0) {
                       $grand_total = $row->room_rent_total_amount;
                   }
                   else{
                      $grand_total= $row->room_rent_sum_total;
                   }

                    $paid_amount = 0;
                    foreach ($transaction as $transaction) {
                        $paid_amount = $paid_amount  + $transaction->t_amount;
                    }
                   if($grand_total !=0) {
                       $paid = ($paid_amount / $grand_total) * 100;
                   }
                   else{
                       $paid=0;
                   }

                    if ($paid <= 30) {
                        $e->paid_color = "red";
                    } else if ($paid > 30 && $paid <= 70) {
                        $e->paid_color = "orange";
                    } else {
                        $e->paid_color = "green";
                    }
                    $e->paid = $paid . '%';
                }



			$e->body_color_code = $row->body_color_code;
			$events[] = $e;
			}
		header('Content-Type: application/json');
		echo json_encode($events);
	}
	
	
	function hotel_edit_booking()
	{
		$booking_id = $_GET['id'];
		$data['rooms'] = $this->bookings_model->room_edit_hotelwise($booking_id);		
		$data['transaction'] = $this->bookings_model->get_total_payment($booking_id);
        $data['view_transaction'] = $this->bookings_model->get_transaction_details($booking_id);
		//print_r($data);
		//exit();
		
		$this->load->view("backend/dashboard/pop_edit_booking",$data);
	}
	
	
	function hotel_backend_edit()
	{
		//date_default_timezone_set("Asia/Kolkata");
		
            $edit_book = array(
                'booking_id' => $this->input->post('booking_id'),
                
                'cust_name' => $this->input->post('cust_name'),
                'cust_address' => $this->input->post('cust_address'),
                'cust_contact_no' => $this->input->post('cust_contact_no'),
                'cust_from_date' => $this->input->post('cust_from_date'),
                'cust_end_date' => $this->input->post('cust_end_date'),
                'booking_status_id' => $this->input->post('cust_booking_status'),
                'cust_payment_initial' => $this->input->post('cust_payment_initial')
            );
			
            $query = $this->bookings_model->add_edit_room($edit_book);

           
			$response = new Result();
			$response->result = 'OK';
			
			

			header('Content-Type: application/json');
			echo json_encode($response);
	}
	
	
	function booking_delete()
	{
		$booking_id = $this->input->post('id');
		$query = $this->bookings_model->delete_booking_room($booking_id);
		$response = new Result();
		$response->result = 'OK';
		$response->message = 'Delete successful';

		header('Content-Type: application/json');
		echo json_encode($response);
	}

    function hotel_booking_resize()
    {

        $hotel_id = $this->session->userdata('user_hotel');
        // $data['resource'] = $_GET['resource'];
        //$data['rooms'] = $this->bookings_model->room_hotelwise($hotel_id,$_GET['resource']);
        //$data['events'] = $this->dashboard_model->all_events_limit();
        //$data['taxes'] = $this->bookings_model->room_tax($hotel_id);
        //$data['times']=$this->dashboard_model->checkin_time();
        //$data['start'] = $_GET['start'];
        //$data['end'] = $_GET['end'];

        $start = $_GET['newStart'];
        $end = $_GET['newEnd'];

        $datetime1 = date("d-m-Y",strtotime($start));
        $datetime2 =date("d-m-y",strtotime($end));

        $days_updated=$datetime2-$datetime1;






        $booking_id = $_GET['id'];
        $days_prev_obj=$this->bookings_model->get_stay_days($booking_id);
        if(isset($days_prev_obj)){
            foreach($days_prev_obj as $d){

                $days_prev=$d->stay_days;
            }

        }
        else{
            $days_prev=3;
        }

        $days_ratio=$days_updated/$days_prev;

        $data['ratio']=$days_ratio;
        $data['room_rent_sum_total']=$this->bookings_model->get_total_amount($booking_id);
        $data['id']=$_GET['id'];
        $data['start']=$start;
        $data['end']=$end;


        $this->load->view("backend/dashboard/hotel_booking_resize",$data);
    }
	
	function booking_backend_resize()
	{
		$start = $this->input->post('newStart');
		$end = $this->input->post('newEnd');

        $datetime1 = date("d-m-Y",strtotime($start));
        $datetime2 =date("d-m-y",strtotime($end));

        $days_updated=$datetime2-$datetime1;






		$booking_id = $this->input->post('id');
        $days_prev_obj=$this->bookings_model->get_stay_days($booking_id);
        if(isset($days_prev_obj)){
            foreach($days_prev_obj as $d){

                $days_prev=$d->stay_days;
            }

        }
        else{
            $days_prev=3;
        }

        $days_ratio=$days_updated/$days_prev;

		
		$result = $this->bookings_model->update_rooms_bookings_event($booking_id,$start,$end,$days_ratio,$days_updated);
		
		$response = new Result();
		$response->result = 'OK';
		$response->message =$result;

       // $this->load->view("backend/dashboard/index",$data);

		//header('Content-Type: application/json');
        $data['message']=$response->message;
        $this->load->view("backend/dashboard/hotel_booking_resize",$data);
		//echo $response->message;
	}	
	
	function booking_backend_move()
	{
		$start = $this->input->post('newStart');
		$end = $this->input->post('newEnd');
		$booking_id = $this->input->post('id');
		$room_id = $this->input->post('newResource');
		
		$overlaps = $this->bookings_model->count_rooms_bookings_event($booking_id,$room_id,$start,$end) > 0;

			if ($overlaps) 
			{
				$response = new Result();
				$response->result = 'Error';
				$response->message = 'This reservation overlaps with an existing reservation.';

				header('Content-Type: application/json');
				echo json_encode($response);
				exit;
			}
		
		$result = $this->bookings_model->update_rooms_bookings_move($booking_id,$room_id,$start,$end);
			
		$response = new Result();
		$response->result = 'OK';
		$response->message = 'Update successful';

		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function get_guest(){
	  $keyword = $this->input->post('keyword');
      $data = $this->bookings_model->get_guest($keyword);
	  header('Content-Type: application/json');
	  echo json_encode($data);
	}
  
	function invoice_generate(){
		
		
		$id = $this->session->userdata('user_id');
		/*$data = $this->dashboard_model->admin_status($id);
			if(isset($data) && $data){
				$hotel_id = $data->admin_hotel;
				}else{
				$hotel_id = '';
				}*/
		$booking_id = $_GET['booking_id'];
		
		$data['booking_details']  = $this->bookings_model->get_booking_details($booking_id);
		$data['hotel_name'] = $this->dashboard_model->get_hotel($data['booking_details'][0]->hotel_id);
		$data['hotel_contact']  = $this->bookings_model->get_hotel_contact_details($data['booking_details'][0]->hotel_id);
		//echo "<pre>";
		//print_r($data['booking_details'][0]->hotel_id);
		$data['transaction_details']  = $this->bookings_model->get_transaction_details($booking_id);
		$data['payment_details']  = $this->bookings_model->get_payment_details($booking_id);
		$data['total_payment']  = $this->bookings_model->get_total_payment($booking_id);
        $this->load->view("backend/dashboard/invoice_generate",$data);
        //$this->load->view("backend/dashboard/pop_edit_booking",$data);
	}
	
	/*function pdf_generate(){
		$booking_id = $_GET['booking_id'];
		$data['booking_details']  = $this->bookings_model->get_booking_details($booking_id);
		$data['transaction_details']  = $this->bookings_model->get_transaction_details($booking_id);
		$data['payment_details']  = $this->bookings_model->get_payment_details($booking_id);
		$data['total_payment']  = $this->bookings_model->get_total_payment($booking_id);
        $this->load->view("backend/dashboard/invoice_copy",$data);
		  $html = $this->output->get_output();
		  $this->load->library('dompdf_gen');
		  $this->dompdf->load_html($html);
		  $this->dompdf->render();
		  $this->dompdf->stream("invoice.pdf");
	}*/
	
	function pdf_generate(){
		$booking_id = $_GET['booking_id'];
		$data['booking_details']  = $this->bookings_model->get_booking_details($booking_id);
		$data['hotel_name'] = $this->dashboard_model->get_hotel($data['booking_details'][0]->hotel_id);
		$data['hotel_contact']  = $this->bookings_model->get_hotel_contact_details($data['booking_details'][0]->hotel_id);
		//echo "<pre>";
		//print_r($data['booking_details'][0]->hotel_id);
		$data['transaction_details']  = $this->bookings_model->get_transaction_details($booking_id);
		$data['payment_details']  = $this->bookings_model->get_payment_details($booking_id);
		$data['total_payment']  = $this->bookings_model->get_total_payment($booking_id);
        $this->load->view("backend/dashboard/invoice_pdf",$data);
		  $html = $this->output->get_output();
		  $this->load->library('dompdf_gen');
		  $this->dompdf->load_html($html);
		  $this->dompdf->render();
		  $this->dompdf->stream("invoice.pdf");
	}
		
	
	
	function popup_close(){
		$response = new Result();
		$response->result = 'OK';
   
   

	   header('Content-Type: application/json');
	   echo json_encode($response);
	}	

	function fetch_address()
	{
		$pincode = $this->input->post('pincode');
		//echo $pincode;
		//exit();
		$address = $this->dashboard_model->fetch_all_address($pincode);

		foreach($address as $row)
		{
			$country = $row->area_0;
			$state = $row->area_1;
			$city = $row->area_4;
		}
		$data = array(
			'country' => $country,
			'state'   => $state,
			'city'    => $city
		);
		echo json_encode($data);
		//exit();
		
	}
	
	
	function add_booking_transaction()
	{
		$datetime = date("Y/m/d")." ". date("h:i:s");
		$t_transaction = array(
			't_booking_id' => $this->input->post('t_booking_id') ,
			't_amount' =>$this->input->post('t_amount'),
			't_date' => $datetime,
			't_payment_mode' => $this->input->post('t_payment_mode'),
			't_bank_name' => $this->input->post('t_bank_name'),
			'transaction_from_id' => 2,
			'transaction_to_id' => 4,
			'transaction_releted_t_id' => 1,
		);
		//print_r($t_transaction);
		//exit();
		$query =$this->dashboard_model->add_booking_transaction($t_transaction);
		
		$booking_status = $this->input->post('t_booking_status_id') ;
		if($booking_status=='2'){
			$book = array(
			'booking_status_id' => 4 ,
			
			);
			
			$query =$this->bookings_model->change_book_id($this->input->post('t_booking_id'),$book);
		}
		
	}

	function return_guest_search()
	{
		$guest_name = $this->input->post('guest');
      	$guest = $this->bookings_model->get_guest($guest_name);
		//$bookings = $this->bookings_model->get_book($guest_name);
		
		/*$data = array();
		foreach($guest as $row)
		{
			$data .= 
			'g_name' => $row->g_name,
			'g_address'   => $row->g_address,
			'g_contact_no'    => $row->g_contact_no,
			'g_occupation'  => $row->g_occupation
		
		
		}*/
		
		
		
	  	header('Content-Type: application/json');
	  	echo json_encode($guest);
		
	}
	function return_guest_get()
	{
		$guest_id = $this->input->post('guest_id');
      	$guest = $this->bookings_model->get_guest_details($guest_id);
		//$bookings = $this->bookings_model->get_book_details($guest_id);
		
		foreach($guest as $row)
		{
			$g_name = $row->g_name;
			$g_address = $row->g_address." , ".$row->g_city." , ".$row->g_pincode;
			$g_contact_no = $row->g_contact_no;
		}
		
		$data = array(
			'g_name' => $g_name,
			'g_address'   => $g_address,
			'g_contact_no'    => $g_contact_no,
			
		);
		
		header('Content-Type: application/json');
	  	echo json_encode($data);
	}	
	
	function get_commision()
	{
		$b_id = $this->input->post('b_id');
      	$broker = $this->bookings_model->get_broker_details($b_id);
		
		foreach($broker as $row)
		{
			$b_name = $row->b_name;
			$b_id = $row->b_id;
			$broker_commission = $row->broker_commission;
		}
		
		$bookings_id = $this->input->post('booking_id');
		$booking = $this->bookings_model->get_booking_details($bookings_id);
		
		foreach($booking as $row)
		{
			$room_rent_total_amount = $row->room_rent_total_amount;
		}
		
		
		
		$data = array(
			'b_name' => $b_name,
			'broker_commission' => round($broker_commission),
			'base_room_rent' => $room_rent_total_amount,
		);
		
		header('Content-Type: application/json');
	  	echo json_encode($data);
	}

    function get_commision2()
    {
        $b_id = $this->input->post('b_id');
        $broker = $this->bookings_model->get_channel_details($b_id);

        foreach($broker as $row)
        {
            $b_name = $row->channel_name;
            $b_id = $row->channel_id;
            $broker_commission = $row->channel_commission;
        }

        $bookings_id = $this->input->post('booking_id');
        $booking = $this->bookings_model->get_booking_details($bookings_id);

        foreach($booking as $row)
        {
            $room_rent_total_amount = $row->room_rent_total_amount;
        }



        $data = array(
            'b_name' => $b_name,
            'broker_commission' => round($broker_commission),
            'base_room_rent' => $room_rent_total_amount,
        );

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    /* end  */
}
	




?>