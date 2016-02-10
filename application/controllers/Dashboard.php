<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        /* Session Checking Start*/
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }
        /* Session Checking End*/

        /* URL Value Encryption Start */
        function base64url_encode($data)
        {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }

        /* URL Value Encryption End */

        /* URL Value Decryption Start */
        function base64url_decode($data)
        {
            return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
        }
        /* URL Value Decryption End */
    }

    /* Dashboard Page Start */
   function index()
    {

        $id = $this->session->userdata('user_id');
        $data['admin_status'] = $this->dashboard_model->admin_status($id);


            $data['heading'] = "Dashboard";
            $data['description'] ='Welcome '.$this->session->userdata('user_name').' to Hotel Objects Dashboard';
            $data['active'] = 'dashboard';
            $data['page'] = 'backend/dashboard/index';
            $data['bookings'] = $this->dashboard_model->all_bookings();
			$data['recent_bookings'] = $this->dashboard_model->all_recent_bookings();
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            $data['unique_room_bookings'] = $this->dashboard_model->all_bookings_unique();
            //echo "<pre>";
            //print_r($data);
            //echo $data['unique_room_bookings'];
            //exit();
            $data['all_rooms'] = $this->dashboard_model->all_rooms();
            $data['guests'] =$this->dashboard_model->all_guest_limit_view();
            $data['tasks_assign'] = $this->dashboard_model->task_assiger();
            $data['tasks_assigee'] = $this->dashboard_model->task_assiger();
            $data['tasks_pending'] = $this->dashboard_model->tasks_pending();

        if ($this->input->post('hotel_image_upload') ){
            echo $this->upload->do_upload('hotel_image_upload');
            echo $this->upload->display_errors();
            exit();
        $this->upload->initialize($this->set_upload_options());
        if ($this->upload->do_upload('hotel_image_upload') )
        {
            $s_image = $this->upload->data('file_name');
            $filename = $s_image;
            $source_path = './upload/' . $filename;
            $target_path = './upload/hotel/';

            $config_manip = array(
                //'file_name' => 'myfile',
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path,
                'maintain_ratio' => TRUE,
                'create_thumb' => TRUE,
                'thumb_marker' => '_thumb',
                'width' => 100,
                'height' => 100
            );
            $this->load->library('image_lib', $config_manip);

            if (!$this->image_lib->resize())
            {
                //$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                echo $this->image_lib->display_errors();
                exit();
               // redirect('common/index');
            }
            else
            {
                $thumb_name = explode(".", $filename);
                $hotel_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                $this->image_lib->clear();


                $data = array(
                    'hotel_logo_images_thumb' =>$filename,

                );



            }

            $query=$this->dashboard_model->edit_hotel_details($data,$this->session->userdata('user_hotel'));
            if($query){
                $this->session->set_flashdata('succ_msg', 'Upload Sucessfully');
            }
            else{
                $this->session->set_flashdata('err_msg', 'Database Error');
            }
            $data['page'] = 'backend/dashboard/index';
            $id = $this->session->userdata('user_id');
            $data['admin_status'] = $this->dashboard_model->admin_status($id);

            $data['heading'] = "Dashboard";
            $data['description'] = 'Welcome2 '.$this->session->userdata('user_name').' to Hotel Objects Dashboard';
            $data['active'] = 'dashboard';
            $data['page'] = 'backend/dashboard/index';
            $data['bookings'] = $this->dashboard_model->all_bookings();
            $data['recent_bookings'] = $this->dashboard_model->all_recent_bookings();
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            $data['unique_room_bookings'] = $this->dashboard_model->all_bookings_unique();
            $data['tasks_assign'] = $this->dashboard_model->task_assiger();
            //echo "<pre>";
            //print_r($data);
            //echo $data['unique_room_bookings'];
            //exit();
            $data['all_rooms'] = $this->dashboard_model->all_rooms();
            $data['guests'] =$this->dashboard_model->all_guest_limit_view();
            $this->load->view('backend/common/index', $data);

        }}

        else {


            $this->load->view('backend/common/index', $data);
        }
        //}

    }





    /* Dashboard Page End */

    /* Logout Start */
    function logout()
    { $this->dashboard_model->remove_online($this->session->userdata('user_id'));
        $this->session->sess_destroy();
        redirect('login/logged_out');
    }
    /* Logout End */

    function add_task()
    {
        if($this->input->post())
        {
            $task_entry = array(
                'from_id' => $this->input->post('asign_from'),
                'to_id' => $this->input->post('asign_to'),
                'task' => $this->input->post('task_desc'),
                'status' => '0',
                'priority' => $this->input->post('task_priority'),                
                'due_date' => date("y-m-d",strtotime($this->input->post('due_date'))),
                'added_date' => date("Y-m-d H:i:s")
            );

            $query = $this->dashboard_model->task_add($task_entry);
            redirect('dashboard');

        }
    }

    function complete_task(){
        $task_id = $_GET['task_id'];
        $query = $this->dashboard_model->task_complete($task_id);
        redirect('dashboard');
    }

    /* Add Admin Start */
    function add_admin()
    {
        if($this->session->userdata('admin') =='1') {
            $data['heading'] = 'Admin';
            $data['sub_heading'] = 'Add Admin';
            $data['description'] = 'Add Admin Here';
            $data['active'] = 'add_admin';
            $data['hotel'] = $this->dashboard_model->all_hotel_list();
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            $permission_users = '2';
            $data['permission'] = $this->dashboard_model->admin_permission_label($permission_users);
            if ($this->input->post()) {
                $table = TABLE_PRE . 'admin_details';
                $table1 = TABLE_PRE . 'login';
              //  $this->form_validation->set_rules('admin_hotel', 'Hotel Name', 'trim|required|xss_clean');
               // $this->form_validation->set_rules('admin_first_name', 'First Name', 'trim|required|xss_clean');

               // $this->form_validation->set_rules('admin_middle_name', 'Middle Name', 'trim|xss_clean');
               // $this->form_validation->set_rules('admin_last_name', 'Last Name', 'trim|required|xss_clean');
               // $this->form_validation->set_rules('admin_email', 'Email Address', 'trim|required|valid_email|xss_clean|is_unique[' . $table . '.admin_email]');
                //$this->form_validation->set_rules('admin_username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[20]|is_unique[' . $table1 . '.user_name]');
               // $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[50]');
               // $this->form_validation->set_rules('admin_retype_password', 'Retype Password', 'trim|required|xss_clean|min_length[5]|max_length[50]|matches[admin_password]');
               // $this->form_validation->set_rules('permission[]', 'Permission', 'required');

                    date_default_timezone_set("Asia/Kolkata");
                    if($this->session->userdata('user_type_slug') == "SUPA"){
                        $admin_hotel=$this->input->post('admin_hotel');
                    }
                    else{

                        $admin_hotel=$this->session->userdata('user_hotel');
                    }

                if($this->session->userdata('user_type_slug')=="SUPA"){
                    $type1=2;
                }
                elseif($this->session->userdata('user_type_slug')=="AD"){
                    $type1=3;
                }
                    $admin = array(
                        'admin_hotel' => $admin_hotel,
                        'admin_first_name' => $this->input->post('admin_first_name'),
                        'admin_middle_name' => $this->input->post('admin_middle_name'),
                        'admin_last_name' => $this->input->post('admin_last_name'),
                        'admin_email' => $this->input->post('admin_email'),
                        'admin_user_type' => $type1,
                        'admin_create_date' => date("Y-m-d H:i:s"),
                        'admin_modification_date' => date("Y-m-d H:i:s")
                    );
                    $query1 = $this->dashboard_model->add_admin($admin);

                if($this->session->userdata('user_type_slug')=="SUPA"){
                    $type=2;
                }
                elseif($this->session->userdata('user_type_slug')=="AD"){
                    $type=3;
                }

                    if (isset($query1) && $query1) {
                        $user = array(
                            'user_id' => $query1,
                            'hotel_id' => $admin_hotel,
                            'user_name' => $this->input->post('admin_username'),
                            'user_password' => sha1(md5($this->input->post('admin_password'))),
                            'user_email' => $this->input->post('admin_email'),
                            'user_type_id' => $type,
                            'user_status' => 'A'
                        );
                        $query2 = $this->dashboard_model->add_user($user);

                        $hotel = array(
                            'hotel_id' => $this->input->post('admin_hotel'),
                            'hotel_status' => 'A'
                        );
                        $update = $this->dashboard_model->update_hotel($hotel);

                        $permission_id = implode(",", $this->input->post('permission'));
                        if($this->session->userdata('user_type_slug')=="SUPA"){
                            $type3="AD";
                        }
                        elseif($this->session->userdata('user_type_slug')=="AD"){
                            $type3="SUB";
                        }
                        $permission = array(
                            'user_id' => $query1,
                            'user_type' => $type3,
                            'user_permission_type' => $permission_id
                        );
                        $user_permission = $this->dashboard_model->add_user_permission($permission);
                    }

                    if (isset($query2) && $query2) {
                        $this->session->set_flashdata('succ_msg', "Admin Added Successfully!");
                        $msg =
                            "<p>Hello</p>
							<p>You are registered with Hotel Objects. Please click here to activate your account:-" . base_url() . "login/activate_admin/" . base64url_encode($query2) . "</p>
							<p>Username:" . $this->input->post('admin_username') . "</p>
							<p>Password:" . $this->input->post('admin_password') . "</p>
							<p>--Hotel Object Team</p>";
                        $config['protocol'] = 'smtp';
                        $config['smtp_host'] = 'smtp.webartmedialabs.com';
                        $config['mailtype'] = 'html';
                        $this->email->initialize($config);
                        $this->email->from('sayak@webartmedialabs.com', 'Hotel Objects');
                        $this->email->to($this->input->post('admin_email'), $this->input->post('admin_first_name'));
                        $this->email->subject('Registering With Hotel Objects');
                        $this->email->message($msg);
                        if ($this->email->send()) {
                            redirect('dashboard/add_admin');
                        } else {
                            $this->session->set_flashdata('err_msg', $this->email->print_debugger());
                            redirect('dashboard/add_admin');
                        }
                        redirect('dashboard/add_admin');
                    } else {
                        $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                        redirect('dashboard/add_admin');
                    }

            } else {
                $data['page'] = 'backend/dashboard/add_admin';
                $this->load->view('backend/common/index', $data);
            }
        } else {
            redirect('dashboard');
        }
    }
    /* Add Admin End */

    /* Ajax Username Checking During User Addition Start */
    function username_check()
    {
        $username['user_name'] = $this->input->post('username');
        $query = $this->dashboard_model->username_check($username);
        if (isset($query) && $query) {
            die('<img src=' . base_url() . 'assets/dashboard/images/dislike-icon.png style="height:40px;">');
        } else {
            die('<img src=' . base_url() . 'assets/dashboard/images/like-icon.png style="height:40px;">');
        }
    }
    /* Ajax Username Checking During User Addition End */

    /* Ajax Email Checking During User Addition Start */
    function email_check()
    {
        $email['user_email'] = $this->input->post('email');
        $query = $this->dashboard_model->email_check($email);
        if (isset($query) && $query) {
            die('<img src=' . base_url() . 'assets/dashboard/images/dislike-icon.png style="height:40px;">');
        } else {
            die('<img src=' . base_url() . 'assets/dashboard/images/like-icon.png style="height:40px;">');
        }
    }
    /* Ajax Email Checking During User Addition End */

    /* Ajax Email Checking During Admin Registration Start */
    function admin_email_check()
    {
        $email['user_email'] = $this->input->post('email');
        if ($this->input->post('email') == $this->input->post('hemail')) {
            die('<img src=' . base_url() . 'assets/dashboard/images/like-icon.png style="height:40px;">');
        } else {
            $query = $this->dashboard_model->email_check($email);
            if (isset($query) && $query) {
                die('<img src=' . base_url() . 'assets/dashboard/images/dislike-icon.png style="height:40px;">');
            } else {
                die('<img src=' . base_url() . 'assets/dashboard/images/like-icon.png style="height:40px;">');
            }
        }
    }
    /* Ajax Email Checking During Admin Registration End */

    /* Admin Registration Start */
    function admin_registration()
    {
        if($this->session->userdata('admin') =='1') {
            $table = TABLE_PRE . 'login';
            $this->form_validation->set_rules('admin_first_name', 'First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_first_name', 'Middle Name', 'trim|xss_clean');
            $this->form_validation->set_rules('admin_last_name', 'Last Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_address', 'Address', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_city', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_district', 'District', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_state', 'State', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_country', 'Country', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_pin', 'Pin', 'trim|required|xss_clean');
            if ($this->input->post('admin_email') == $this->input->post('admin_email_hidden')) {
                $this->form_validation->set_rules('admin_email', 'Email Address', 'trim|required|valid_email|xss_clean');
            } else {
                $this->form_validation->set_rules('admin_email', 'Email Address', 'trim|required|valid_email|xss_clean|is_unique[' . $table . '.user_email]');
            }
            $this->form_validation->set_rules('admin_phone1', 'Phone Number', 'trim|required|numeric|max_length[10]|xss_clean');
            $this->form_validation->set_rules('admin_phone2', 'Alternative Phone Number', 'trim|numeric|max_length[10]|xss_clean');
            $this->form_validation->set_rules('admin_dob', 'Date of Birth', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_mother_tongue', 'Mother Tongue', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_comm_language', 'Mother Tongue', 'trim|required|xss_clean');
            $this->form_validation->set_rules('admin_idproof1_type', 'ID Proof 1', 'trim|xss_clean');
            $this->form_validation->set_rules('admin_idproof2_type', 'ID Proof 2', 'trim|xss_clean');
            $this->form_validation->set_rules('admin_idproof3_type', 'ID Proof 3', 'trim|xss_clean');

            $admin_idproof1_path = $admin_idproof2_path = $admin_idproof3_path = '';

            $this->upload->initialize($this->set_upload_options());

            if ($this->input->post('admin_idproof1_type')) {
                if ($this->upload->do_upload('userdata1')) {
                    $admin_idproof1_path = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                    redirect('dashboard');
                }
            }

            if ($this->input->post('admin_idproof2_type')) {
                if ($this->upload->do_upload('userdata2')) {
                    $admin_idproof2_path = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                    redirect('dashboard');
                }
            }

            if ($this->input->post('admin_idproof3_type')) {
                if ($this->upload->do_upload('userdata3')) {
                    $admin_idproof3_path = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                    redirect('dashboard');
                }
            }

            if ($this->upload->do_upload('image')) {
                $admin_image = $this->upload->data('file_name');
            } else {
                $admin_image = "user.png";
            }

            date_default_timezone_set("Asia/Kolkata");

            $var = $this->input->post('admin_dob');
            if (strpos(".", $var)) {
                $date = str_replace('.', '-', $var);
            } else {
                if (strpos("/", $var)) {
                    $date = str_replace('/', '-', $var);
                } else {
                    $date = $var;
                }
            }
            $date = date('Y-m-d', strtotime($date));

            $admin = array(
                'admin_id' => $this->session->userdata('user_id'),
                'admin_first_name' => $this->input->post('admin_first_name'),
                'admin_middle_name' => $this->input->post('admin_middle_name'),
                'admin_last_name' => $this->input->post('admin_last_name'),
                'admin_email' => $this->input->post('admin_email'),
                'admin_address' => $this->input->post('admin_address'),
                'admin_city' => $this->input->post('admin_city'),
                'admin_district' => $this->input->post('admin_district'),
                'admin_state' => $this->input->post('admin_state'),
                'admin_country' => $this->input->post('admin_country'),
                'admin_pin' => $this->input->post('admin_pin'),
                'admin_phone1' => $this->input->post('admin_phone1'),
                'admin_phone2' => $this->input->post('admin_phone2'),
                'admin_dob' => $date,
                'admin_mother_tongue' => $this->input->post('admin_mother_tongue'),
                'admin_comm_language' => $this->input->post('admin_comm_language'),
                'admin_idproof1_type' => $this->input->post('admin_idproof1_type'),
                'admin_idproof1_path' => $admin_idproof1_path,
                'admin_idproof2_type' => $this->input->post('admin_idproof2_type'),
                'admin_idproof2_path' => $admin_idproof2_path,
                'admin_idproof3_type' => $this->input->post('admin_idproof3_type'),
                'admin_idproof3_path' => $admin_idproof3_path,
                'admin_image' => $admin_image,
                'admin_modification_date' => date("Y-m-d H:i:s"),
                'admin_status' => 'A'
            );

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('err_msg', validation_errors());
                redirect('dashboard');
            } else {
                $update = $this->dashboard_model->admin_registration($admin);
                $login_data = array(
                    'login_id' => $this->session->userdata('login_id'),
                    'user_email' => $this->input->post('admin_email')
                );
                $login = $this->dashboard_model->update_login($login_data);
                if (isset($update) && $update && isset($login) && $login) {
                    $this->session->set_flashdata('succ_msg', "Your registration completed successfully.");
                } else {
                    $this->session->set_flashdata('err_msg', "Your registration is incomplete. Try again!");
                }
                redirect('dashboard');
            }
        } else {
            redirect('dashboard');
        }
    }
    /* Admin Registration End */

    /* Add Hotel Start */
    function add_hotel_m()
    {
        if($this->session->userdata('hotel_m') =='1') {
            $data['heading'] = 'Hotel Management';
            $data['sub_heading'] = 'Add Hotel Management';
            $data['description'] = 'Add Hotel Here';
            $data['active'] = 'add_hotel_m';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if ($this->input->post()) {
					
					$hotel_type = $this->input->post('hotel_type');
					$hotel_type_string = "";
					$hotel_type_string =  $hotel_type_string.implode(',' , $hotel_type);

					$guest_option = $this->input->post('guest');
					$guest_option_string = "";
					$guest_option_string =$guest_option_string . implode(',' , $guest_option);
					
					$broker_option = $this->input->post('broker');
					$broker_option_string = "";
					$broker_option_string = $broker_option_string . implode(',' , $broker_option);  
					/*Start Logo Upload*/
					
					$this->upload->initialize($this->set_upload_options());
					if ($this->upload->do_upload('image_photo') ) {
							//echo "uploaded"; exit();
							$hotel_logo = $this->upload->data('file_name');
							$filename = $hotel_logo;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/hotel/';
                        	
							$config_manip = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);
							
							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_hotel_m');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$logo_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
					}
					else{
						redirect('dashboard/add_hotel_m');
					}
					/*End Logo Upload*/
					//exit();
                    date_default_timezone_set("Asia/Kolkata");
                    $hotel = array(
                        'hotel_name' => $this->input->post('hotel_name'),
						'hotel_year_established' => $this->input->post('hotel_year_established'),
						'hotel_ownership_type' => $this->input->post('hotel_ownership_type'),
						'hotel_type' => $hotel_type_string,
						'hotel_rooms' => $this->input->post('hotel_rooms'),
						'hotel_logo_images' => $hotel_logo,
						'hotel_logo_images_thumb' => $logo_thumb ,
						'hotel_logo_text' => $this->input->post('images_text'),
						'hotel_status' => 'A'
                    );
					
					$hotel_contact_details = array(
						'hotel_street1' => $this->input->post('hotel_street1'),
						'hotel_street2' => $this->input->post('hotel_street2'),
						'hotel_landmark' => $this->input->post('hotel_landmark'),
						'hotel_district' => $this->input->post('hotel_district'),
						'hotel_pincode' => $this->input->post('hotel_pincode'),
						'hotel_state'=> $this->input->post('hotel_state'),
						'hotel_country' => $this->input->post('hotel_country'),
						'hotel_branch_street1' => $this->input->post('hotel_branch_street1'),
						'hotel_branch_street2' => $this->input->post('hotel_branch_street2'),
						'hotel_branch_landmark' => $this->input->post('hotel_branch_landmark'),
						'hotel_branch_district' => $this->input->post('hotel_branch_district'),
						'hotel_branch_pincode' => $this->input->post('hotel_branch_pincode'),
						'hotel_branch_state' => $this->input->post('hotel_branch_state'),
						'hotel_branch_country' => $this->input->post('hotel_branch_country'),
						'hotel_booking_street1' => $this->input->post('hotel_booking_street1'),
						'hotel_booking_street2' => $this->input->post('hotel_booking_street2'),
						'hotel_booking_landmark' => $this->input->post('hotel_booking_landmark'),
						'hotel_booking_district' => $this->input->post('hotel_booking_district'),
						'hotel_booking_pincode' => $this->input->post('hotel_booking_pincode'),
						'hotel_booking_state' => $this->input->post('hotel_booking_state'),
						'hotel_booking_country' => $this->input->post('hotel_booking_country'),
						'hotel_frontdesk_name' => $this->input->post('hotel_frontdesk_name'),
						'hotel_frontdesk_mobile' => $this->input->post('hotel_frontdesk_mobile'),
						'hotel_frontdesk_mobile_alternative' => $this->input->post('hotel_frontdesk_mobile_alternative'),
						'hotel_frontdesk_email' => $this->input->post('hotel_frontdesk_email'),
						'hotel_owner_name' => $this->input->post('hotel_owner_name'),
						'hotel_owner_mobile' => $this->input->post('hotel_owner_mobile'),
						'hotel_owner_mobile_alternative' => $this->input->post('hotel_owner_mobile_alternative'),
						'hotel_owner_email' => $this->input->post('hotel_owner_email'),
						'hotel_hr_name' => $this->input->post('hotel_hr_name'),
						'hotel_hr_mobile' => $this->input->post('hotel_hr_mobile'),
						'hotel_hr_mobile_alternative' => $this->input->post('hotel_hr_mobile_alternative'),
						'hotel_hr_email' => $this->input->post('hotel_hr_email'),
						'hotel_accounts_name' => $this->input->post('hotel_accounts_name'),
						'hotel_accounts_mobile' => $this->input->post('hotel_accounts_mobile'),
						'hotel_accounts_mobile_alternative' => $this->input->post('hotel_accounts_mobile_alternative'),
						'hotel_accounts_email' => $this->input->post('hotel_accounts_email'),
						'hotel_near_police_name' => $this->input->post('hotel_near_police_name'),
						'hotel_near_police_mobile' => $this->input->post('hotel_near_police_mobile'),
						'hotel_near_police_mobile_alternative' => $this->input->post('hotel_near_police_mobile_alternative'),
						'hotel_near_police_email' => $this->input->post('hotel_near_police_email'),
						'hotel_near_medical_name' => $this->input->post('hotel_near_medical_name'),
						'hotel_near_medical_mobile' => $this->input->post('hotel_near_medical_mobile'),
						'hotel_near_medical_mobile_alternative' => $this->input->post('hotel_near_medical_mobile_alternative'),
						'hotel_near_medical_email' => $this->input->post('hotel_near_medical_email'),
						'hotel_fax' => $this->input->post('hotel_fax'),
						'hotel_website' => $this->input->post('hotel_website'),
						'hotel_working_from' => '',
						'hotel_working_upto' => ''
					);
					
					$hotel_tax_details = array(
						'hotel_tax_applied' => $this->input->post('hotel_tax_applied'),
						'hotel_service_tax' => $this->input->post('hotel_service_tax'),
						'hotel_luxury_tax' => $this->input->post('hotel_luxury_tax'),
						'hotel_service_charge' =>$this->input->post('hotel_service_charge'),
						'hotel_stander_tac' => $this->input->post('hotel_stander_tac')
					);
					
					$hotel_billing_settings = array(
						'billing_name' => $this->input->post('billing_name'),
						'billing_street1' => $this->input->post('billing_street1'),
						'billing_street2' => $this->input->post('billing_street2'),
						'billing_landmark' => $this->input->post('billing_landmark'),
						'billing_district' => $this->input->post('billing_district'),
						'billing_pincode' => $this->input->post('billing_pincode'),
						'billing_state' => $this->input->post('billing_state'),
						'billing_country' => $this->input->post('billing_country'),
						'billing_email' => $this->input->post('billing_email'),
						'billing_phone' => $this->input->post('billing_phone'),
						'billing_fax' => $this->input->post('billing_fax'),
						'billing_vat' => $this->input->post('billing_vat'),
						'billing_bank_name' => $this->input->post('billing_bank_name'),
						'billing_account_no'=> $this->input->post('billing_account_no'),
						'billing_ifsc_code' => $this->input->post('billing_ifsc_code')
						
						
					);
					$hotel_general_preference = array(
					
						'hotel_check_in_time_hr' => $this->input->post('hotel_check_in_time_hr'),
						'hotel_check_in_time_mm' => $this->input->post('hotel_check_in_time_mm'),
						'hotel_check_in_time_fr' => $this->input->post('hotel_check_in_time_fr'),
						'hotel_check_out_time_hr' => $this->input->post('hotel_check_out_time_hr'),
						'hotel_check_out_time_mm' => $this->input->post('hotel_check_out_time_mm'),
						'hotel_check_out_time_fr' => $this->input->post('hotel_check_out_time_fr'),
						'hotel_guest' => $guest_option_string,
						'hotel_broker'=> $broker_option_string,
						'hotel_broker_commission' => 0,
						'hotel_date_format' => $this->input->post('hotel_date_format'),
						'hotel_time_format' => $this->input->post('hotel_time_format')
					);
					
                    $query = $this->dashboard_model->add_hotel($hotel,$hotel_contact_details,$hotel_tax_details,$hotel_billing_settings,$hotel_general_preference);
                	if($query){
                    	$data['page'] = 'backend/dashboard/add_hotel_m';
                    	$this->load->view('backend/common/index', $data);
					}
                	else{
                    	echo "php error";
					}


            } else {
                $data['country'] = $this->dashboard_model->get_country();
                $data['star'] = $this->dashboard_model->get_star_rating();
                $data['page'] = 'backend/dashboard/add_hotel_m';
                $this->load->view('backend/common/index', $data);
            }
        } else {
            redirect('dashboard');
        }
    }
    /* Add Hotel End */

    /* Ajax Email Checking During Hotel Addition Start */
    function hotel_email_check()
    {
        if($this->session->userdata('admin') =='1') {
            $email['hotel_email'] = $this->input->post('email');
            $query = $this->dashboard_model->hotel_email_check($email);
            if (isset($query) && $query) {
                die('<img src=' . base_url() . 'assets/dashboard/images/dislike-icon.png style="height:40px;">');
            } else {
                die('<img src=' . base_url() . 'assets/dashboard/images/like-icon.png style="height:40px;">');
            }
        } else {
            redirect('dashboard');
        }
    }
    /* Ajax Email Checking During Hotel Addition End */

    /* Ajax Phone No. Checking During Hotel Addition Start */
    function hotel_phone_check()
    {
        if($this->session->userdata('admin') =='1') {
            $phone['hotel_phone'] = $this->input->post('phone');
            $query = $this->dashboard_model->hotel_phone_check($phone);
            if (isset($query) && $query) {
                die('<img src=' . base_url() . 'assets/dashboard/images/dislike-icon.png style="height:40px;">');
            } else {
                die('<img src=' . base_url() . 'assets/dashboard/images/like-icon.png style="height:40px;">');
            }
        } else {
            redirect('dashboard');
        }
    }
    /* Ajax Phone No. Checking During Hotel Addition End */

    /* All Hotel Start */
    function all_hotel_m()
    {
        if($this->session->userdata('hotel_m') =='1') {
            $data['heading'] = 'Hotel Management';
            $data['sub_heading'] = 'All Hotels';
            $data['description'] = 'Added Hotel List';
            $data['active'] = 'all_hotel_m';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_hotel_m';
            $config['total_rows'] = $this->dashboard_model->all_hotels_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;*/

            //$data['hotels'] = $this->dashboard_model->all_hotels($config['per_page'], $segment);
            //$data['pagination'] = $this->pagination->create_links();
		    $data['hotels'] = $this->dashboard_model->all_hotels();
			//print_r($data);
			//exit();
            $data['page'] = 'backend/dashboard/all_hotel_m';
            $this->load->view('backend/common/index', $data);
        } else {
            redirect('dashboard');
        }
    }
    /* All Hotel End */


    /* Delete Hotel Start */
    function hotel_delete()
    {
        if($this->session->userdata('hotel_m') =='1') {
            $this->form_validation->set_rules('delete[]', 'Select Hotel', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('err_msg', validation_errors());
                redirect('dashboard/all_hotels');
            } else {
                $hotel_id = $this->input->post('delete');
                $hotel = array(
                    'hotel_status' => 'D'
                );
                $update = $this->dashboard_model->delete_hotel($hotel_id, $hotel);
                if (isset($update) && $update) {
                    $this->session->set_flashdata('succ_msg', "Hotels Deleted!");
                    redirect('dashboard/all_hotels');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try Again Later!");
                    redirect('dashboard/all_hotels');
                }
            }
        } else {
            redirect('dashboard');
        }

    }
    /* Delete Hotel End */

    /* Ajax Hotel Update Status Start */
    function hotel_update_status()
    {
        if($this->session->userdata('hotel_m') =='1') {
            $status = array(
                'hotel_id' => $this->input->post('id'),
                'hotel_status' => $this->input->post('value'),
            );
            $query = $this->dashboard_model->hotel_status_update($status);
            if (isset($query) && $query) {
                echo '<div class="alert alert-success alert-dismissible text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Status Updated Successfully!</strong>
                                </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Database Error. Try Again Later!</strong>
                                </div>';
            }

        } else {
            redirect('dashboard');
        }
    }
    /* Ajax Hotel Update Status End */

    /* Add Permission Start */
    function add_permission()
    {
        if ($this->session->userdata('user_type_slug') !== 'SUPA') {
            $data['heading'] = 'Permissions';
            $data['sub_heading'] = 'Add Permission';
            $data['description'] = 'Add Access Permission Here';
            $data['active'] = 'add_permission';
            $data['users'] = $this->dashboard_model->get_user_type();
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            if ($this->input->post()) {
                $table = TABLE_PRE . 'permission_types';
                $this->form_validation->set_rules('permission_label', 'Permission Label', 'trim|required|xss_clean|is_unique[' . $table . '.permission_label]');
                $this->form_validation->set_rules('permission_description', 'Permission Description', 'trim|xss_clean');
                $this->form_validation->set_rules('permission_users[]', 'Permission Users', 'trim|required|xss_clean');
                $this->form_validation->set_rules('permission_val', 'Permission Values', 'trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('err_msg', validation_errors());
                    redirect('dashboard/add_permission');
                } else {
                    $permission_users = implode(",", $this->input->post('permission_users'));
                    $permission_val = explode(",", $this->input->post('permission_val'));
                    $i = 0;
                    foreach ($permission_val as $per) {
                        $permission[$i] = array(
                            'permission_label' => $this->input->post('permission_label'),
                            'permission_description' => $this->input->post('permission_description'),
                            'permission_users' => $permission_users,
                            'permission_value' => $per
                        );
                        $i++;
                    }

                    $query = $this->dashboard_model->add_permission($permission);

                    if (isset($query) && $query) {
                        $this->session->set_flashdata('succ_msg', "Permission Added Successfully!");
                        redirect('dashboard/add_permission');
                    } else {
                        $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                        redirect('dashboard/add_permission');
                    }
                }
            } else {
                $data['page'] = 'backend/dashboard/add_permission';
                $this->load->view('backend/common/index', $data);
            }
        } else {
            redirect('dashboard');
        }
    }
    /* Add Permission End */

    /* All Permission Start */
    function all_permissions()
    {
        if ($this->session->userdata('user_type_slug') !== 'SUPA') {
            $data['heading'] = 'Permissions';
            $data['sub_heading'] = 'All Permissions';
            $data['description'] = 'Added Permissions List';
            $data['active'] = 'all_permissions';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_permissions';
            $config['total_rows'] = $this->dashboard_model->all_permissions_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['permissions'] = $this->dashboard_model->all_permissions($config['per_page'], $segment);
            $data['pagination'] = $this->pagination->create_links();

            $data['page'] = 'backend/dashboard/all_permissions';
            $this->load->view('backend/common/index', $data);
        } else {
            redirect('dashboard');
        }
    }
    /* All Permission End */

    /* Edit Permission Start */
    function edit_permission()
    {
        if ($this->session->userdata('user_type_slug') !== 'SUPA') {
            $data['heading'] = 'Permissions';
            $data['sub_heading'] = 'Edit Permission';
            $data['description'] = 'Edit Permission Here';
            $data['active'] = 'edit_permission';
            $data['users'] = $this->dashboard_model->get_user_type();
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            if ($this->input->post()) {
                $table = TABLE_PRE . 'permission_types';

                $this->form_validation->set_rules('permission_description', 'Permission Description', 'trim|xss_clean');
                $this->form_validation->set_rules('permission_users[]', 'Permission Users', 'trim|required|xss_clean');
                $this->form_validation->set_rules('permission_val', 'Permission Values', 'trim|required|xss_clean');
                if ($this->input->post('permission_label_hidden') != $this->input->post('permission_label')) {
                    $this->form_validation->set_rules('permission_label', 'Permission Label', 'trim|required|xss_clean|is_unique[' . $table . '.permission_label]');
                } else {
                    $this->form_validation->set_rules('permission_label', 'Permission Label', 'trim|required|xss_clean');
                }
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('err_msg', validation_errors());
                    redirect('dashboard/edit_permission/' . base64url_encode($this->input->post('permission_id')));
                } else {
                    $permission_id = explode(",", $this->input->post('permission_id'));
                    $permission_users = implode(",", $this->input->post('permission_users'));
                    $permission_val = explode(",", $this->input->post('permission_val'));
                    $i = 0;
                    foreach ($permission_id as $per) {
                        $permission[$i] = array(
                            'permission_id' => $per,
                            'permission_label' => $this->input->post('permission_label'),
                            'permission_description' => $this->input->post('permission_description'),
                            'permission_users' => $permission_users,
                            'permission_value' => $permission_val[$i]
                        );
                        $i++;
                    }
                    $update = $this->dashboard_model->update_permission($permission);
                    $data['permission'] = $this->dashboard_model->get_permission($per);
                    $this->session->set_flashdata('permission', $data['permission']);
                    if (isset($update) && $update) {
                        $this->session->set_flashdata('succ_msg', "Updated Successfully!");
                        redirect('dashboard/edit_permission/' . base64url_encode($permission_id[0]));
                    } else {
                        $this->session->set_flashdata('err_msg', "Database Error. Try Again Later!");
                        redirect('dashboard/edit_permission/' . base64url_encode($permission_id[0]));
                    }
                }
            }
            $permission_id = (isset($permission) && $permission) ? $permission['permission_id'] : base64url_decode($this->uri->segment(3));
            $data['permission'] = $this->dashboard_model->get_permission($permission_id);
            if (!$data['permission'] || !$permission_id) {
                redirect('dashboard/all_permissions');
            }
            $data['page'] = 'backend/dashboard/edit_permission';
            $this->load->view('backend/common/index', $data);
        } else {
            redirect('dashboard');
        }
    }
    /* Edit Permission End */

    /*Start Lock Screen*/
    function lock_screen()
    {

    }

    /* Add Room Start */
    function add_room()
    {
        if($this->session->userdata('room') =='1') {
            $data['heading'] = 'Room';
            $data['sub_heading'] = 'Add Room';
            $data['description'] = 'Add Room Here';
            $data['active'] = 'add_room';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
			
			if ($this->input->post()) {
				
					$room_feature = $this->input->post('room_feature');
					//print_r($room_feature); 
					foreach($room_feature as $key => $value)
					{
					  $ft[$value] = $this->input->post('feature_type_'.$value);
					}
					//print_r($ft);
					//exit;
					$room_feature_string = "";
					$room_feature_string =  $room_feature_string.implode(',' , $room_feature);
					
					$room_image = "";
					$room_thumb="";
					$this->upload->initialize($this->set_upload_options());
					if ($this->upload->do_upload('image')) {
                        $room_image = $this->upload->data('file_name');
                        $filename = $room_image;
                        $source_path = './upload/' . $filename;
                        $target_path = './upload/thumb/';
                        $config_manip = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        );
                        $this->load->library('image_lib', $config_manip);
                        if (!$this->image_lib->resize()) {
                            $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            redirect('dashboard/add_room');
                        }
                        // clear //
                        $thumb_name = explode(".", $filename);
                        $room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        $this->image_lib->clear();
                    } 
					date_default_timezone_set("Asia/Kolkata");
                    $room = array(
                        'hotel_id' => $this->session->userdata('user_hotel'),
                        //'unit_type' => $this->input->post('unit_type'),
                        'unit_id'  => $this->input->post('unit_name'),
                        //'unit_class' => $this->input->post('unit_class'),						
                        'floor_no' => $this->input->post('floor_no'),
                        'room_no'  => $this->input->post('room_no'),
                        'room_bed' => $this->input->post('room_bed'),
                        'room_features' => $room_feature_string,
                        'room_rent' => $this->input->post('room_rent'),
						'room_rent_seasonal' => $this->input->post('room_rent_seasonal'),
						'room_rent_weekend' => $this->input->post('room_rent_weekend'),
                        'room_image' => $room_image,
                        'room_image_thumb' =>  $room_thumb,
                        'room_add_date' => date("Y-m-d H:i:s"),
                        'room_modification_date' => date("Y-m-d H:i:s")
                    );
                    //print_r($room);
					//exit();
					$dt['room']=$room;
					$dt['feature']=$ft;
					$query = $this->dashboard_model->add_room($dt);

                    if (isset($query) && $query) {
                        $this->session->set_flashdata('succ_msg', "Room Added Successfully!");
                        redirect('dashboard/add_room');
                    } else {
                        $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                        redirect('dashboard/add_room');
                    }
			
			
			
			
			
			} else {
				$data['room_feature'] = $this->dashboard_model->get_all_room_feature();
                $data['page'] = 'backend/dashboard/add_room';
                $this->load->view('backend/common/index', $data);
            }
           
        } else {
            redirect('dashboard');
        }
    }
    /* Add Room End */

    /* All Rooms Start */
    function all_rooms()
    {
        if($this->session->userdata('room') =='1') {
            $data['heading'] = 'Room';
            $data['sub_heading'] = 'All Rooms';
            $data['description'] = 'Added Rooms List';
            $data['active'] = 'all_rooms';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

           /* if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_rooms';
            $config['total_rows'] = $this->dashboard_model->all_rooms_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;*/

            //$data['rooms'] = $this->dashboard_model->all_rooms($config['per_page'], $segment);
			$data['rooms'] = $this->dashboard_model->all_rooms();
            //$data['pagination'] = $this->pagination->create_links();

            $data['page'] = 'backend/dashboard/all_rooms';
            $this->load->view('backend/common/index', $data);
        } else {
            redirect('dashboard');
        }
    }
    /* All Rooms End */

    /* Upload Start */
    function set_upload_options()
    {
        $config = array(
            'upload_path' => './upload/',
            'allowed_types' => 'gif|jpg|png',
            'overwrite' => FALSE
        );
        return $config;
    }

    /* Upload End */

    function test($abc)
    {
        echo $abc;
    }




    public function add_booking(){

        if($this->session->userdata('booking') =='1'){
            $data['heading']='Booking';
            $data['sub_heading']='Add Booking';
            $data['description']='Add Booking Here';
            $data['active']='add_booking';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            if($this->input->post()) {


                $rooms = $this->dashboard_model->get_room_id($this->session->userdata('user_hotel'), $this->input->post('room_no'));
                if (!$rooms) {

                    $this->session->set_flashdata('err_msg', "Room Number for this hotel not found. Please add new room. ");
                    $data['page'] = 'backend/dashboard/add_booking';
                    $this->load->view('backend/common/index', $data);

                } else {

                    foreach ($rooms as $room) {

                        $room_id = $room->room_id;

                    }

                    date_default_timezone_set("Asia/Kolkata");
                    $bookings = array(

                        'room_id' => $room_id,
                        'cust_name' => $this->input->post('cust_name'),
                        'cust_address' => $this->input->post('cust_address'),
                        'cust_contact_no' => $this->input->post('cust_contact_no'),
                        'cust_from_date' => $this->input->post('cust_from_date'),
                        'cust_end_date' => $this->input->post('cust_end_date'),
                        'cust_booking_status' => $this->input->post('cust_booking_status'),
                        'cust_payment_initial' =>$this->input->post('cust_payment_initial'),

                    );
                    $query = $this->dashboard_model->add_booking($bookings);

                    if (isset($query) && $query) {
                        $this->session->set_flashdata('succ_msg', "Booking Added Successfully!");
                        redirect('dashboard/add_booking');
                    } else {
                        $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                        redirect('dashboard/add_booking');
                    }

                }}
            else{
                $data['page'] = 'backend/dashboard/add_booking';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }

	public function add_booking_calendar(){

        if($this->session->userdata('booking') =='1'){
            $data['heading']='Booking';
            $data['sub_heading']='Add Booking Calendar';
            $data['description']='Add Booking Here';
            $data['active']='add_booking_calendar';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            
           
            $data['page'] = 'backend/dashboard/add_booking_calendar';
            $this->load->view('backend/common/index', $data);
          
        }else{
            redirect('dashboard');
        }
    }
    function all_bookings()
    {
        if($this->session->userdata('booking') =='1') {
            $data['heading'] = 'Booking';
            $data['sub_heading'] = 'All Bookings';
            $data['description'] = 'Bookings List';
            $data['active'] = 'all_bookings';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_rooms';
            $config['total_rows'] = $this->dashboard_model->all_rooms_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;*/

            //$data['bookings'] = $this->dashboard_model->all_bookings($config['per_page'], $segment);
			$data['bookings'] = $this->dashboard_model->all_bookings();
            $data['transactions'] = $this->dashboard_model->all_transactions();
            //$data['pagination'] = $this->pagination->create_links();

            $data['page'] = 'backend/dashboard/all_bookings';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }
	

	
	
	
	
    /* All Bookings End */

    // Transaction starts (Add Transaction)

    public function add_transaction(){
		
        if($this->session->userdata('transaction') =='1'){
            $data['heading']='Transaction';
            $data['sub_heading']='Add Transaction';
            $data['description']='Add Transaction Here';
            $data['active']='add_transaction';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
			//19.11.2015
			/*if($this->input->post('term'))
			{
				echo $this->input->post('term');
			}*/

            if($this->input->post()) {

                date_default_timezone_set("Asia/Kolkata");
                $transactions = array(


                    't_booking_id' => $this->input->post('t_booking_id'),
                    't_amount' => $this->input->post('t_amount'),
                    //'t_date' => date("Y-m-d H:i:s"),
                    't_payment_mode' => $this->input->post('t_payment_mode'),
                    't_status' =>$this->input->post('t_payment_status'),

                );
                $query = $this->dashboard_model->add_transaction($transactions);

                if (isset($query) && $query) {
                    $this->session->set_flashdata('succ_msg', "Transaction Added Successfully!");
                    redirect('dashboard/add_transaction');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/add_transaction');
                }

            }
            else{
				
				//$this->load->model('Dashboard_model');
				
				//echo $book_id;
				$data['booking'] =  $this->dashboard_model->all_booking_id();
                $data['page'] = 'backend/dashboard/add_transaction';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }

    function all_transactions()
    {
        if($this->session->userdata('transaction') =='1') {
            $data['heading'] = 'Transaction';
            $data['sub_heading'] = 'All Transactions';
            $data['description'] = 'Transaction List';
            $data['active'] = 'all_transactions';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_transactions';
            $config['total_rows'] = $this->dashboard_model->all_transactions_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;*/

            //$data['transactions'] = $this->dashboard_model->all_transactions_limit($config['per_page'], $segment);
            //$data['pagination'] = $this->pagination->create_links();
			$data['transactions'] = $this->dashboard_model->all_transactions_limit();
            $data['page'] = 'backend/dashboard/all_transactions';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }


    /* Edit Hotel Start */
    function edit_hotel()
    {
        if($this->session->userdata('hotel_m') =='1') {
            $data['heading'] = 'Hotel';
            $data['sub_heading'] = 'Edit Hotel';
            $data['description'] = 'Edit Hotel Here';
            $data['active'] = 'edit_hotel';
            $data['country'] = $this->dashboard_model->get_country();
            $data['star'] = $this->dashboard_model->get_star_rating();
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            
            if($this->input->post()){
                date_default_timezone_set("Asia/Kolkata");
                $hotel_type = $this->input->post('hotel_type');
                $hotel_type_string = "";
               $hotel_type_string =  $hotel_type_string.implode(',' , $hotel_type);

                $guest_option = $this->input->post('guest');
                $guest_option_string = "";
                $guest_option_string =$guest_option_string . implode(',' , $guest_option);
                
                $broker_option = $this->input->post('broker');
                $broker_option_string = "";
                $broker_option_string = $broker_option_string . implode(',' , $broker_option);

                //Image Upload Start Now

                $this->upload->initialize($this->set_upload_options());

                if ($this->upload->do_upload('image_photo') )
                {
                    $hotel_image = $this->upload->data('file_name');
                    $filename = $hotel_image;
                    $source_path = './upload/' . $filename;
                    $target_path = './upload/hotel/';
                    
                    $config_manip = array(
                    //'file_name' => 'myfile',
                    'image_library' => 'gd2',
                    'source_image' => $source_path,
                    'new_image' => $target_path,
                    'maintain_ratio' => TRUE,
                    'create_thumb' => TRUE,
                    'thumb_marker' => '_thumb',
                    'width' => 100,
                    'height' => 75
                    );
                    $this->load->library('image_lib', $config_manip);
                    
                    if (!$this->image_lib->resize())
                    {
                            $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            redirect('dashboard/add_compliance');
                    } 
                    else
                    {
                            $thumb_name = explode(".", $filename);
                            $hotel_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                            $this->image_lib->clear();


                            $hotel_edit = array(
                                'hotel_name' => $this->input->post('hotel_name'),
                                'hotel_year_established' => $this->input->post('hotel_year_established'),
                                'hotel_ownership_type'  => $this->input->post('hotel_ownership_type'),
                                'hotel_type' => $hotel_type_string,
                                'hotel_rooms' => $this->input->post('hotel_rooms'),
                                'hotel_logo_images' => $hotel_image,
                                'hotel_logo_images_thumb' => $hotel_thumb,
                                'hotel_logo_text' => $this->input->post('images_text')                                
                            );
                  
                    }

                }

                //Image Upload Section Closed
                else 
                {
                    $hotel_edit = array(
                        'hotel_name' => $this->input->post('hotel_name'),
                        'hotel_year_established' => $this->input->post('hotel_year_established'),
                        'hotel_ownership_type'  => $this->input->post('hotel_ownership_type'),
                        'hotel_type' => $hotel_type_string,
                        'hotel_rooms' => $this->input->post('hotel_rooms'),
                        'hotel_logo_text' => $this->input->post('images_text')
                    );
                    
                    
                    $hotel_contact_details_edit = array(
                        'hotel_street1' => $this->input->post('hotel_street1'),
                        'hotel_street2' => $this->input->post('hotel_street2'),
                        'hotel_landmark' => $this->input->post('hotel_landmark'),
                        'hotel_district' => $this->input->post('hotel_district'),
                        'hotel_pincode' => $this->input->post('hotel_pincode'),
                        'hotel_state'=> $this->input->post('hotel_state'),
                        'hotel_country' => $this->input->post('hotel_country'),
                        'hotel_branch_street1' => $this->input->post('hotel_branch_street1'),
                        'hotel_branch_street2' => $this->input->post('hotel_branch_street2'),
                        'hotel_branch_landmark' => $this->input->post('hotel_branch_landmark'),
                        'hotel_branch_district' => $this->input->post('hotel_branch_district'),
                        'hotel_branch_pincode' => $this->input->post('hotel_branch_pincode'),
                        'hotel_branch_state' => $this->input->post('hotel_branch_state'),
                        'hotel_branch_country' => $this->input->post('hotel_branch_country'),
                        'hotel_booking_street1' => $this->input->post('hotel_booking_street1'),
                        'hotel_booking_street2' => $this->input->post('hotel_booking_street2'),
                        'hotel_booking_landmark' => $this->input->post('hotel_booking_landmark'),
                        'hotel_booking_district' => $this->input->post('hotel_booking_district'),
                        'hotel_booking_pincode' => $this->input->post('hotel_booking_pincode'),
                        'hotel_booking_state' => $this->input->post('hotel_booking_state'),
                        'hotel_booking_country' => $this->input->post('hotel_booking_country'),
                        'hotel_frontdesk_name' => $this->input->post('hotel_frontdesk_name'),
                        'hotel_frontdesk_mobile' => $this->input->post('hotel_frontdesk_mobile'),
                        'hotel_frontdesk_mobile_alternative' => $this->input->post('hotel_frontdesk_mobile_alternative'),
                        'hotel_frontdesk_email' => $this->input->post('hotel_frontdesk_email'),
                        'hotel_owner_name' => $this->input->post('hotel_owner_name'),
                        'hotel_owner_mobile' => $this->input->post('hotel_owner_mobile'),
                        'hotel_owner_mobile_alternative' => $this->input->post('hotel_owner_mobile_alternative'),
                        'hotel_owner_email' => $this->input->post('hotel_owner_email'),
                        'hotel_hr_name' => $this->input->post('hotel_hr_name'),
                        'hotel_hr_mobile' => $this->input->post('hotel_hr_mobile'),
                        'hotel_hr_mobile_alternative' => $this->input->post('hotel_hr_mobile_alternative'),
                        'hotel_hr_email' => $this->input->post('hotel_hr_email'),
                        'hotel_accounts_name' => $this->input->post('hotel_accounts_name'),
                        'hotel_accounts_mobile' => $this->input->post('hotel_accounts_mobile'),
                        'hotel_accounts_mobile_alternative' => $this->input->post('hotel_accounts_mobile_alternative'),
                        'hotel_accounts_email' => $this->input->post('hotel_accounts_email'),
                        'hotel_near_police_name' => $this->input->post('hotel_near_police_name'),
                        'hotel_near_police_mobile' => $this->input->post('hotel_near_police_mobile'),
                        'hotel_near_police_mobile_alternative' => $this->input->post('hotel_near_police_mobile_alternative'),
                        'hotel_near_police_email' => $this->input->post('hotel_near_police_email'),
                        'hotel_near_medical_name' => $this->input->post('hotel_near_medical_name'),
                        'hotel_near_medical_mobile' => $this->input->post('hotel_near_medical_mobile'),
                        'hotel_near_medical_mobile_alternative' => $this->input->post('hotel_near_medical_mobile_alternative'),
                        'hotel_near_medical_email' => $this->input->post('hotel_near_medical_email'),
                        'hotel_fax' => $this->input->post('hotel_fax'),
                        'hotel_website' => $this->input->post('hotel_website'),
                        'hotel_working_from' => '',
                        'hotel_working_upto' => ''
                    );
                    
                    $hotel_tax_details_edit = array(
                        'hotel_tax_applied' => $this->input->post('hotel_tax_applied'),
                        'hotel_service_tax' => $this->input->post('hotel_service_tax'),
                        'hotel_luxury_tax' => $this->input->post('hotel_luxury_tax'),
                        'hotel_service_charge' =>$this->input->post('hotel_service_charge'),
                        'hotel_stander_tac' => $this->input->post('hotel_stander_tac')
                    );
                    
                    $hotel_billing_settings_edit = array(
                        'billing_name' => $this->input->post('billing_name'),
                        'billing_street1' => $this->input->post('billing_street1'),
                        'billing_street2' => $this->input->post('billing_street2'),
                        'billing_landmark' => $this->input->post('billing_landmark'),
                        'billing_district' => $this->input->post('billing_district'),
                        'billing_pincode' => $this->input->post('billing_pincode'),
                        'billing_state' => $this->input->post('billing_state'),
                        'billing_country' => $this->input->post('billing_country'),
                        'billing_email' => $this->input->post('billing_email'),
                        'billing_phone' => $this->input->post('billing_phone'),
                        'billing_fax' => $this->input->post('billing_fax'),
                        'billing_vat' => $this->input->post('billing_vat'),
                        'billing_bank_name' => $this->input->post('billing_bank_name'),
                        'billing_account_no'=> $this->input->post('billing_account_no'),
                        'billing_ifsc_code' => $this->input->post('billing_ifsc_code')
                        
                        
                    );
                    $hotel_general_preference_edit = array(
                    
                        'hotel_check_in_time_hr' => $this->input->post('hotel_check_in_time_hr'),
                        'hotel_check_in_time_mm' => $this->input->post('hotel_check_in_time_mm'),
                        'hotel_check_in_time_fr' => $this->input->post('hotel_check_in_time_fr'),
                        'hotel_check_out_time_hr' => $this->input->post('hotel_check_out_time_hr'),
                        'hotel_check_out_time_mm' => $this->input->post('hotel_check_out_time_mm'),
                        'hotel_check_out_time_fr' => $this->input->post('hotel_check_out_time_fr'),
                        'hotel_guest' => $guest_option_string,
                        'hotel_broker'=> $broker_option_string,
                        'hotel_broker_commission' => 0,
                        'hotel_date_format' => $this->input->post('hotel_date_format'),
                        'hotel_time_format' => $this->input->post('hotel_time_format')
                    );
                    
                    
                }



                //$query = $this->dashboard_model->edit_hotel_1($hotel_edit,$this->input->post('h_id'));
                $query = $this->dashboard_model->edit_hotel_details($hotel_edit,$this->input->post('h_id'));
                $query = $this->dashboard_model->edit_hotel_contact($hotel_contact_details_edit,$this->input->post('h_id'));
                $query = $this->dashboard_model->edit_hotel_tax($hotel_tax_details_edit,$this->input->post('h_id'));
                $query = $this->dashboard_model->edit_hotel_billing($hotel_billing_settings_edit,$this->input->post('h_id'));
                $query = $this->dashboard_model->edit_hotel_preferences($hotel_general_preference_edit,$this->input->post('h_id'));


                $hotel_id = $this->input->post('h_id');

                if (isset($query) && $query) {

                    $this->session->set_flashdata('succ_msg', "Hotel Accounts Info Updated Successfully!");
                    //$data['value'] = $this->dashboard_model->get_c_details($room_id );

                    $data['value'] = $this->dashboard_model->get_hotel_details($hotel_id);
                    $data['page'] = 'backend/dashboard/all_hotel_m';
                    $this->load->view('backend/common/index', $data);
                    
                }
                else{
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    //$data['value'] = $this->dashboard_model->get_c_details($c_id);

                    $data['value'] = $this->dashboard_model->get_hotel_details($hotel_id);
                    $data['page'] = 'backend/dashboard/all_hotel_m';
                    $this->load->view('backend/common/index', $data);                     
                }
            }
            else{

                $hotel_id = $_GET['hotel_id'];
                $data['value'] = $this->dashboard_model->get_hotel_details($hotel_id);
                $data['page'] = 'backend/dashboard/edit_hotel';
                $this->load->view('backend/common/index', $data);

            }
            
        }
        else {
            redirect('dashboard');
        }
    }
    /* Edit Hotel End */


    function tasks_add()
    {

    }

    function tasks_delete()
    {

    }



    function edit_room()
    {

        if($this->session->userdata('room') == '1'){
        $data['heading']='Room';
        $data['sub_heading']='Edit Room';
        $data['description']='Edit Room Here';
        $data['active']='edit_room';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
        
            if($this->input->post()){
                date_default_timezone_set("Asia/Kolkata");
                    
                    $room_feature = $this->input->post('room_feature');
					foreach($room_feature as $key => $value)
					{
					  $ft[$value] = $this->input->post('feature_type_'.$value);
					}					
                    $room_feature_string = "";
                    $room_feature_string =  $room_feature_string.implode(',' , $room_feature);
                    
                    $this->upload->initialize($this->set_upload_options());
                        if ($this->upload->do_upload('image_room') ) {
                            /*  Image Upload 18.11.2015 */
                            $room_image = $this->upload->data('file_name');
                            $filename = $room_image;
                            $source_path = './upload/' . $filename;
                            $target_path = './upload/thumb/';
                            
                            $config_manip = array(
                            //'file_name' => 'myfile',
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                            );
                            $this->load->library('image_lib', $config_manip);
                            
                            if (!$this->image_lib->resize()) {
                                    $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                    redirect('dashboard/add_compliance');
                            } else{
                                // clear //
                                    $thumb_name = explode(".", $filename);
                                    $room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                                    $this->image_lib->clear();
                                /* Images Upload  18.11.2015 */ 
                                    
                                    

                                    $room_edit = array(
                                        'hotel_id' => $this->session->userdata('user_hotel'),
										'unit_id'  => $this->input->post('unit_name'),
                                        'floor_no' => $this->input->post('floor_no'),
                                        'room_no'  => $this->input->post('room_no'),
                                        'room_bed' => $this->input->post('room_bed'),
                                        'room_features' => $room_feature_string,
                                        'room_rent' => $this->input->post('room_rent'),
                                        'room_rent_seasonal' => $this->input->post('room_rent_seasonal'),
                                        'room_rent_weekend' => $this->input->post('room_rent_weekend'),
                                        'room_image' => $room_image,
                                        'room_image_thumb' =>  $room_thumb,
                                        'room_add_date' => date("Y-m-d H:i:s"),
                                        'room_modification_date' => date("Y-m-d H:i:s")
                                );
                          
                        }}
                        else 
                        {
                            $room_edit = array(
                                'hotel_id' => $this->session->userdata('user_hotel'),
								'unit_id'  => $this->input->post('unit_name'),
                                'floor_no' => $this->input->post('floor_no'),
                                'room_no'  => $this->input->post('room_no'),
                                'room_bed' => $this->input->post('room_bed'),
                                'room_features' => $room_feature_string,
                                'room_rent' => $this->input->post('room_rent'),
                                'room_rent_seasonal' => $this->input->post('room_rent_seasonal'),
                                'room_rent_weekend' => $this->input->post('room_rent_weekend'),
                                'room_add_date' => date("Y-m-d H:i:s"),
                                'room_modification_date' => date("Y-m-d H:i:s")
                            );
                        }
                    
 					$dt['room']=$room_edit;
					$dt['feature']=$ft;                       
                        $query = $this->dashboard_model->edit_room($dt,$this->input->post('room_id'));
                       
                        $room_id = $this->input->post('room_id');

                        if (isset($query) && $query) {

                            $this->session->set_flashdata('succ_msg', "Rooms  Updated Successfully!");
                            //$data['value'] = $this->dashboard_model->get_c_details($room_id );

                            $data['rooms'] = $this->dashboard_model->all_rooms();
                            $data['page'] = 'backend/dashboard/all_rooms';
                            $this->load->view('backend/common/index', $data);
                            
                        }
                        else{
                            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                            //$data['value'] = $this->dashboard_model->get_c_details($c_id);

                            $data['rooms'] = $this->dashboard_model->all_rooms();
                            $data['page'] = 'backend/dashboard/all_rooms';
                            $this->load->view('backend/common/index', $data);                       
                        }
            
            }else{

                $room_id = $_GET['room_id'];
                $data['value'] = $this->dashboard_model->get_room_details($room_id);
				$data['room_feature'] = $this->dashboard_model->get_all_room_feature();
				$data['rf'] = $this->dashboard_model->get_all_room_feature_id($room_id);
                $data['page'] = 'backend/dashboard/edit_room';
                $this->load->view('backend/common/index', $data);
                
            }
    
        }else{
            redirect('dashboard');
        }
        
        
    }



    /*Add Compliance */

    public function add_compliance(){

        if($this->session->userdata('compliance') =='1'){
            $data['heading']='Compliance';
            $data['sub_heading']='Add Compliance';
            $data['description']='Add Compliance Here';
            $data['active']='add_compliance';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {
				
					/*20.11.2015 _ Images Upload */
					$this->upload->initialize($this->set_upload_options());
					if ($this->upload->do_upload('image_certificate') ) {
						
							$certificate_image = $this->upload->data('file_name');
							$filename = $certificate_image;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/certificate/';
                        	
							$config_manip = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);
							
							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_compliance');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$certificate_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
					}
					else{
						
                        $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                        redirect('dashboard/add_compliance');
                    }
					
					/*20.11.2015 _ Images Upload */

                	
					
					
					date_default_timezone_set("Asia/Kolkata");
                	$compliance = array(

                    'hotel_id' => $this->session->userdata('user_hotel'),
                    'c_valid_for' => $this->input->post('c_valid_for'),
                    'c_name' => $this->input->post('c_name'),
                    'c_owner' => $this->input->post('c_owner'),
                    'c_description' => $this->input->post('c_description'),
                    'c_type' => $this->input->post('c_type'),
                    'c_importance' => $this->input->post('c_importance'),
                    'c_valid_from' => $this->input->post('c_valid_from'),
                    'c_valid_upto' => $this->input->post('c_valid_upto'),
                    'c_renewal' => $this->input->post('c_renewal'),
                    'c_file' => $certificate_image,
					'c_file_thumb' => $certificate_thumb, 
                    'c_primary_notif_period' => $this->input->post('c_primary'),
                    'c_secondary_notif_period' => $this->input->post('c_secondary'),

					'c_authority' => $this->input->post('c_authority'),



                	);
                    /*echo "<pre>";
                    print_r($compliance);
                    exit();*/
                	$query = $this->dashboard_model->add_compliance($compliance);

                	if (isset($query) && $query) {
                    	$this->session->set_flashdata('succ_msg', "Compliance Added Successfully!");
                    	redirect('dashboard/add_compliance');
                	} else {
                    	$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    	redirect('dashboard/add_compliance');
                	}

            	}
            	else{ 
                	$data['page'] = 'backend/dashboard/add_compliance';
                	$this->load->view('backend/common/index', $data);
            	}
        }else{
            redirect('dashboard');
        }
    }


    function all_compliance()
    {
        if($this->session->userdata('compliance') =='1') {
            $data['heading'] = 'Compliance';
            $data['sub_heading'] = 'All compliance';
            $data['description'] = 'Compliance List';
            $data['active'] = 'all_compliance';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_transactions';
            $config['total_rows'] = $this->dashboard_model->all_compliance_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;*/

            //$data['compliance'] = $this->dashboard_model->all_compliance_limit($config['per_page'], $segment);
            //$data['pagination'] = $this->pagination->create_links();
			
			$data['compliance'] = $this->dashboard_model->all_compliance_limit();
            $data['page'] = 'backend/dashboard/all_compliance';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }


    function add_hrm(){

        $data['page'] = 'backend/dashboard/add_hrm';
        $this->load->view('backend/common/index', $data);
    }
    function all_hrm(){
        $data['page'] = 'backend/dashboard/all_hrm';
        $this->load->view('backend/common/index', $data);
    }
    /*function add_hotel_m(){
        $data['page'] = 'backend/dashboard/add_hotel_m';
        $this->load->view('backend/common/index', $data);
    }*/

   /* function all_hotel_m(){
        $data['page'] = 'backend/dashboard/all_hotel_m';
        $this->load->view('backend/common/index', $data);
    } */
    public function add_guest(){
		
	/*18.11.2015 */
	if($this->session->userdata('guest') == '1')
	{
		$data['heading']='Guests';
        $data['sub_heading']='Add Guest';
        $data['description']='Add Guest Here';
        $data['active']='add_guest';
		$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
			if($this->input->post())
			{	
			        $id_g = $this->input->post('g_contact_no');
					/* Images Upload */
						$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_photo') ) {
							/*  Image Upload 18.11.2015 */
							$room_image = $this->upload->data('file_name');
							$filename = $room_image;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/guest/';
                        	
							$config_manip = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);
							
							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_guest');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
						   /* Images Upload  18.11.2015 */ 
						  
						}
						else 
						{
                        	$this->session->set_flashdata('err_msg', $this->upload->display_errors());
                        	redirect('dashboard/add_guest');
                    	}
					
					
						/* Id Proof Upload*/ 
						$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_idpf')) {
						/*  Image Upload 18.11.2015 */
						$room_image1 = $this->upload->data('file_name');
						$filename1 = $room_image1;
                    	$source_path1 = './upload/' . $filename1;
                    	$target_path1 = './upload/guest/';
                    	
						$config_manip1 = array(
                        'image_library' => 'gd2',
                        'source_image' => $source_path1,
                        'new_image' => $target_path1,
                        'maintain_ratio' => TRUE,
                        'create_thumb' => TRUE,
                        'thumb_marker' => '_thumb',
                        'width' => 100,
                        'height' => 100
                    	);
                    	$this->load->library('image_lib', $config_manip1);
						
						if (!$this->image_lib->resize()) {
                        		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                        		redirect('dashboard/add_guest');
                    	}
                    		// clear //
            			$thumb_name1 = explode(".", $filename1);
            			$room_thumb1 = $thumb_name1[0] . $config_manip1['thumb_marker'] . "." . $thumb_name1[1];
            			$this->image_lib->clear();
						   /* Images Upload  18.11.2015 */ 
						  
						}
						else 
						{
                        	$this->session->set_flashdata('err_msg', $this->upload->display_errors());
                        	redirect('dashboard/add_guest');
                    	}
						/* Id Proof Upload*/
					
					
					/* Images Upload*/ 
					date_default_timezone_set("Asia/Kolkata");
					$guest = array(

					'hotel_id' => $this->session->userdata('user_hotel'),
					'g_name' => $this->input->post('g_name'),
					'g_place' => '',
					'g_address' => $this->input->post('g_address'),
					'g_contact_no' => $this->input->post('g_contact_no'),
					'g_email' => $this->input->post('g_email'),
					'g_gender' => $this->input->post('g_gender'),
					'g_dob' =>   date("Y-m-d", strtotime($this->input->post('g_dob'))),
					'g_occupation' => $this->input->post('g_occupation'),
					'g_married' => $this->input->post('g_married'),
					'g_id_type' => $this->input->post('g_id_type'),
					'g_photo' => $room_image,
					'g_id_proof' => $room_image1,
					'g_photo_thumb' => $room_thumb,
					'g_id_proof_thumb' => $room_thumb1,
					'g_pincode' => $this->input->post('g_place'),
					'g_city' => $this->input->post('g_city'),
					'g_state' => $this->input->post('g_state'),
					'g_country' => $this->input->post('g_country')
					);
				    
                    /*print_r($guest);
                    exit();*/
            		$query = $this->dashboard_model->add_guest($guest);
					if (isset($query) && $query) 
					{
                		$this->session->set_flashdata('succ_msg', "Guest Added Successfully!");
                		redirect('dashboard/add_guest');
            		} 
					else 
					{
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                		redirect('dashboard/add_guest');
            		}
					
			}
			else
			{
            	$data['page'] = 'backend/dashboard/add_guest';
            	$this->load->view('backend/common/index', $data);
        	}
		
	}
	else
	{
		redirect('dashboard');
	}
	
	
	
	/* 18.11.2015 */

    /*if($this->session->userdata('guest') =='1'){
        $data['heading']='Guests';
        $data['sub_heading']='Add Guest';
        $data['description']='Add Guest Here';
        $data['active']='add_guest';

        		if($this->input->post()) {
						
					date_default_timezone_set("Asia/Kolkata");
					$guest = array(

					'hotel_id' => $this->session->userdata('user_hotel'),
					'g_name' => $this->input->post('g_name'),
					'g_place' => $this->input->post('g_place'),
					'g_address' => $this->input->post('g_address'),
					'g_contact_no' => $this->input->post('g_contact_no'),
					'g_email' => $this->input->post('g_email'),
					'g_gender' => $this->input->post('g_gender'),
					'g_dob' => $this->input->post('g_dob'),
					'g_occupation' => $this->input->post('g_occupation'),
					'g_married' => $this->input->post('g_married'),
					'g_id_type' => $this->input->post('g_id_type'),
					'g_photo' => '',
					'g_id_proof' => '',
					);
				
            		$query = $this->dashboard_model->add_guest($guest);

            		if (isset($query) && $query) {
                		$this->session->set_flashdata('succ_msg', "Guest Added Successfully!");
                		redirect('dashboard/add_guest');
            		} else {
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                		redirect('dashboard/add_guest');
            		}

	        }
        	else{
            	$data['page'] = 'backend/dashboard/add_guest';
            	$this->load->view('backend/common/index', $data);
        	}
    }else{
        redirect('dashboard');
    }*/
}


    function all_guest()
    {
        if($this->session->userdata('guest') =='1') {
            $data['heading'] = 'Guests';
            $data['sub_heading'] = 'All Guest';
            $data['description'] = 'Guest List';
            $data['active'] = 'all_guest';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_guest';
            $config['total_rows'] = $this->dashboard_model->all_guest_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['guest'] = $this->dashboard_model->all_guest_limit($config['per_page'], $segment);
            $data['pagination'] = $this->pagination->create_links();*/
			$data['guest'] = $this->dashboard_model->all_guest_limit_view();
            $data['page'] = 'backend/dashboard/all_guest';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

    public function add_broker(){

        if($this->session->userdata('broker') =='1'){
            $data['heading']='Broker & Channel';
            $data['sub_heading']='Add Broker';
            $data['description']='Add Broker Here';
            $data['active']='add_broker';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {
				
				//$id_b = $this->input->post('b_contact');
				/* Images Upload */
						$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_photo') ) {
							/*  Image Upload 18.11.2015 */
							$room_image = $this->upload->data('file_name');
							$filename = $room_image;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/broker/';
                        	
							$config_manip = array(
							//'file_name' => 'myfile',
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);
							
							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_broker');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
						   /* Images Upload  18.11.2015 */ 
						  
						}
						else 
						{
                        	$this->session->set_flashdata('err_msg', $this->upload->display_errors());
                        	redirect('dashboard/add_broker');
                    	}

                date_default_timezone_set("Asia/Kolkata");
				/*$files = $_FILES['image_photo'];
				print_r($files);
				$this->load->library('upload');
				$new_name = str_replace(".","",microtime());		
				$config1['upload_path'] =FCPATH . 'upload/';
				$config1['allowed_types'] = 'gif|jpg|png|jpeg';
				$config1['file_name']=$new_name;*/
                $broker = array(

                    'hotel_id' => $this->session->userdata('user_hotel'),
                    'b_agency' => $this->input->post('b_agency'),
                    'b_agency_name' => $this->input->post('b_agency_name'),
                    'b_name' => $this->input->post('b_name'),
                    'b_address' => $this->input->post('b_address'),
                    'b_contact' => $this->input->post('b_contact'),
                    'b_email' => $this->input->post('b_email'),
                    'b_website' => $this->input->post('b_website'),
                    'b_pan' => $this->input->post('b_pan'),
                    'b_bank_acc_no' => $this->input->post('b_bank_acc_no'),
                    'b_bank_ifsc' => $this->input->post('b_bank_ifsc'),
                    'b_photo' => $room_image,
					'b_photo_thumb' => $room_thumb , 
					'broker_commission' =>  $this->input->post('b_commission')
					
					);
                $query = $this->dashboard_model->add_broker($broker);

                if (isset($query) && $query) {
                    $this->session->set_flashdata('succ_msg', "Broker Added Successfully!");
                    redirect('dashboard/add_broker');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/add_broker');
                }

            }
            else{
                $data['page'] = 'backend/dashboard/add_broker';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }

    function all_broker()
    {
        if($this->session->userdata('broker') =='1') {
            $data['heading'] = 'Broker';
            $data['sub_heading'] = 'All Broker';
            $data['description'] = 'Broker List';
            $data['active'] = 'all_broker';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_broker';
            $config['total_rows'] = $this->dashboard_model->all_broker_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['broker'] = $this->dashboard_model->all_broker_limit($config['per_page'], $segment);
            $data['pagination'] = $this->pagination->create_links();*/
			$data['broker'] = $this->dashboard_model->all_broker_limit();
            $data['page'] = 'backend/dashboard/all_broker';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }
	
	function broker_payments()
    {
        if($this->session->userdata('broker') =='1') {
            $data['heading'] = 'Broker Payment';
            $data['sub_heading'] = 'Broker Payment';
            $data['description'] = '';
            $data['active'] = 'broker_payments';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            $data['broker'] = $this->dashboard_model->all_broker_limit();
            if($this->input->post()) {


                date_default_timezone_set("Asia/Kolkata");

                /*$commission = array(


                    'broker_commssion_payed' => $this->input->post('b_amount'),



                );*/
                $commission=$this->input->post('b_amount');
                $id=$this->input->post('b_id');
                $query = $this->dashboard_model->pay_broker($id,$commission);

                $data=array(
                    't_amount' =>$commission,
                    't_date' => date("Y-m-d H:i:s"),
                    't_payment_mode' => $this->input->post('b_payment_mode'),
                    't_bank_name' => $this->input->post('b_bank_name'),
                    'transaction_releted_t_id'=>3,
                    'transaction_from_id' =>4,
                    'transaction_to_id' =>3

                );
                $query2 = $this->dashboard_model->add_transaction($data);

                if (isset($query) && $query  && $query2 && isset($query2)) {
                    $this->session->set_flashdata('succ_msg', "Broker Payed Successfully!");
                    redirect('dashboard/broker_payments');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/broker_payments');
                }

            }
            else {
                //$data['broker'] = $this->dashboard_model->all_broker_limit();
                $data['page'] = 'backend/dashboard/broker_payments';
                $this->load->view('backend/common/index', $data);

            }} else {
            redirect('dashboard');
        }
    }
    function broker_booking()
    {




                date_default_timezone_set("Asia/Kolkata");

                /*$commission = array(


                    'broker_commssion_payed' => $this->input->post('b_amount'),



                );*/
                //$commission=$this->input->get('broker_amount');
                $commission=$_GET["broker_amount"];
                $b_id=$_GET["broker_id"];
                $booking_id=$_GET["booking_id"];
                //$b_id=$this->input->get('broker_id');
                //$booking_id=$this->input->get('booking_id');
                $query = $this->dashboard_model->update_broker_commission($b_id,$commission);

               $data=array(
                    'booking_id' =>intval(substr($booking_id, -4)),
                    'broker_id' => $b_id,
                    'broker_commission' => $commission,
                    'booking_source' => 'Broker',


                );

              $query2 = $this->dashboard_model->update_broker_booking($data);

                if (isset($query) && $query && $query2 && isset($query2)  ) {
                    $this->session->set_flashdata('succ_msg', "Broker Booking Added Successfully!");
                   // redirect('dashboard/broker_payments');
                    echo "success";
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    //redirect('dashboard/broker_payments');
                    echo "failure";
                }


    }

	function showAmount()
	{
		$a = $this->input->post('term')	;
		//$this->load->model('Dashboard);
		$book = $this->dashboard_model->all_t_amount($a);
		//echo $book;
		foreach($book as $row1){

    		$data1 = $row1->base_room_rent;
			$data2 = $row1->rent_mode_type;
			$data3 = $row1->mod_room_rent;
   		}

		if($data2 == 'P' || $data2 == 'p')
		{
		 echo "Hello";
		 exit();
		}

		$data = array(
				'base_room' => $data1,
				'aa'=> $data2,
				'bb'=> $data3
				);
		header('Content-Type: application/json');
		echo json_encode($data1);
		//print_r($book);
		//$this->load->view('backend/dashboard/add_transaction',$book);
		//echo $a;
	}

    function all_reports()
    {
        if($this->session->userdata('booking') =='1') {
            $data['heading'] = 'Reports';
            $data['sub_heading'] = 'All Report';
            $data['description'] = 'Report List';
            $data['active'] = 'all_reports';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()){


                $visit=$this->input->post('r_visit');
                $room=$this->input->post('r_room');
				$status=$this->input->post('checked_in_guest');
				$r_hotel=$this->input->post('r_hotel');

                $all_room=$this->dashboard_model->get_room_id($this->session->userdata('user_hotel'),$room);

                if($all_room) {
                    foreach ($all_room as $r) {
                        $room_id = $r->room_id;

                    }

                }
                else{

                    $room_id=NULL;
                }



                $date_1=date('Y-m-d',strtotime($this->input->post('r_date_1')));
                $date_2=date('Y-m-d',strtotime($this->input->post('r_date_2')));

                $data['bookings'] = $this->dashboard_model->report_search($visit,$room_id,$date_1,$date_2,$status,$r_hotel);
                $data['transactions'] = $this->dashboard_model->all_transactions();
                //$data['pagination'] = $this->pagination->create_links();

                $data['page'] = 'backend/dashboard/all_reports';
                $this->load->view('backend/common/index', $data);



            }


            else {


                $data['bookings'] = $this->dashboard_model->all_bookings_report();
                $data['transactions'] = $this->dashboard_model->all_transactions();
                //$data['pagination'] = $this->pagination->create_links();

                $data['page'] = 'backend/dashboard/all_reports';
                $this->load->view('backend/common/index', $data);

            }} else {
            redirect('dashboard');
        }
    }

    function report_search(){



    }
	function all_f_reports()
    {
        if($this->session->userdata('transaction') =='1') {
            $data['heading'] = 'Reports';
            $data['sub_heading'] = 'Daily transaction Report';
            $data['description'] = 'Report List';
            $data['active'] = 'all_f_reports';
$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_transactions';
            $config['total_rows'] = $this->dashboard_model->all_transactions_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;*/

            //$data['transactions'] = $this->dashboard_model->all_transactions_limit($config['per_page'], $segment);
            //$data['pagination'] = $this->pagination->create_links();
            $data['transactions'] = $this->dashboard_model->all_f_reports();
			$data['types'] = $this->dashboard_model->all_f_types();
			$data['entity'] = $this->dashboard_model->all_f_entity();
            $data['page'] = 'backend/dashboard/all_f_reports';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

	function generate_excel()
	{
				$this->load->library('excel');
				$this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Reports');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'All Report');
                $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Booking Id');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Name');
                $this->excel->getActiveSheet()->setCellValue('D4', 'Room Number');
                $this->excel->getActiveSheet()->setCellValue('E4', 'From And Upto Date');
                $this->excel->getActiveSheet()->setCellValue('F4', 'Address');
                $this->excel->getActiveSheet()->setCellValue('G4', 'Contact Number');
                $this->excel->getActiveSheet()->setCellValue('H4', 'Total Amount');
                $this->excel->getActiveSheet()->setCellValue('I4', 'Amount Dus');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:I1');
                //set aligment to center for that merged cell (A1 to C1)

				$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');

				for($col = ord('A'); $col <= ord('I'); $col++){
                	//set column dimension
                	$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 	//change the font size
                	$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
				$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        		}
				$rs = $this->dashboard_model->get_data_for_excel();

				//print_r($rs);
				//exit();

				 $exceldata="";
        		foreach ($rs as $row){
                	$exceldata[] = $row;
        		}

				$this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');

                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


				$filename='PHPExcelDemo.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
	}

    function edit_guest()
    {
        if($this->session->userdata('guest') == '1'){
        $data['heading']='Guests';
        $data['sub_heading']='Edit Guest';
        $data['description']='Edit Guest Here';
        $data['active']='edit_guest';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
        date_default_timezone_set("Asia/Kolkata");

            if($this->input->post()){

                $this->upload->initialize($this->set_upload_options());

                if (($this->upload->do_upload('image_idpf')) && ($this->upload->do_upload('image_photo')))
                {

                    if ($this->upload->do_upload('image_photo'))
                    {
                        $guest_image = $this->upload->data('file_name');
                        $filename = $guest_image;
                        $source_path = './upload/' . $filename;
                        $target_path = './upload/guest/';

                        $config_manip = array(
                        'image_library' => 'gd2',
                        'source_image' => $source_path,
                        'new_image' => $target_path,
                        'maintain_ratio' => TRUE,
                        'create_thumb' => TRUE,
                        'thumb_marker' => '_thumb',
                        'width' => 100,
                        'height' => 100
                        );

                        $this->load->library('image_lib', $config_manip);

                        if (!$this->image_lib->resize()) {
                                $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                redirect('dashboard/edit_guest');
                        }

                        // clear //
                        $thumb_name = explode(".", $filename);
                        $guest_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        $this->image_lib->clear();

                    }

                    if ($this->upload->do_upload('image_idpf'))
                    {

                        $guest_id = $this->upload->data('file_name');
                        $filename1 = $guest_id;
                        $source_path1 = './upload/' . $filename1;
                        $target_path1 = './upload/guest/';

                        $config_manip1 = array(
                        'image_library' => 'gd2',
                        'source_image' => $source_path1,
                        'new_image' => $target_path1,
                        'maintain_ratio' => TRUE,
                        'create_thumb' => TRUE,
                        'thumb_marker' => '_thumb',
                        'width' => 100,
                        'height' => 100
                        );

                        $this->load->library('image_lib', $config_manip1);

                        if (!$this->image_lib->resize()) {
                                $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                redirect('dashboard/edit_guest');
                        }
                        // clear //
                        $thumb_name1 = explode(".", $filename1);
                        $guest_thumb1 = $thumb_name1[0] . $config_manip1['thumb_marker'] . "." . $thumb_name1[1];
                        $this->image_lib->clear();
                    }

                    $guest_edit = array(
                        'g_name' => $this->input->post('g_name'),
                        'g_address' => $this->input->post('g_address'),
                        'g_contact_no' => $this->input->post('g_contact_no'),
                        'g_email' => $this->input->post('g_email'),
                        'g_gender' => $this->input->post('g_gender'),
                        'g_dob' => date("Y-m-d", strtotime($this->input->post('g_dob'))),
                        'g_occupation' => $this->input->post('g_occupation'),
                        'g_married' => $this->input->post('g_married'),
                        'g_pincode' => $this->input->post('g_place'),
                        'g_city' => $this->input->post('g_city'),
                        'g_state' => $this->input->post('g_state'),
                        'g_country' => $this->input->post('g_country'),
                        'g_photo' => $guest_image,
                        'g_id_proof' => $guest_id,
                        'g_photo_thumb' => $guest_thumb,
                        'g_id_proof_thumb' => $guest_thumb1
                    );                           

                }
                elseif ($this->upload->do_upload('image_photo') ) {
                        /*  Image Upload 18.11.2015 */
                        $guest_image = $this->upload->data('file_name');
                        $filename = $guest_image;
                        $source_path = './upload/' . $filename;
                        $target_path = './upload/guest/';

                        $config_manip = array(
                        'image_library' => 'gd2',
                        'source_image' => $source_path,
                        'new_image' => $target_path,
                        'maintain_ratio' => TRUE,
                        'create_thumb' => TRUE,
                        'thumb_marker' => '_thumb',
                        'width' => 100,
                        'height' => 100
                        );
                        $this->load->library('image_lib', $config_manip);

                        if (!$this->image_lib->resize()) {
                                $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                redirect('dashboard/edit_guest');
                        }
                        // clear //
                        $thumb_name = explode(".", $filename);
                        $guest_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        $this->image_lib->clear();

                        $guest_edit = array(
                            'g_name' => $this->input->post('g_name'),
                            'g_address' => $this->input->post('g_address'),
                            'g_contact_no' => $this->input->post('g_contact_no'),
                            'g_email' => $this->input->post('g_email'),
                            'g_gender' => $this->input->post('g_gender'),
                            'g_dob' => date("Y-m-d", strtotime($this->input->post('g_dob'))),
                            'g_occupation' => $this->input->post('g_occupation'),
                            'g_married' => $this->input->post('g_married'),
                            'g_pincode' => $this->input->post('g_place'),
                            'g_city' => $this->input->post('g_city'),
                            'g_state' => $this->input->post('g_state'),
                            'g_country' => $this->input->post('g_country'),
                            'g_photo' => $guest_image,                                
                            'g_photo_thumb' => $guest_thumb                                
                        );                           

                }

                elseif ($this->upload->do_upload('image_idpf') ) {

                    $guest_id = $this->upload->data('file_name');
                    $filename1 = $guest_id;
                    $source_path1 = './upload/' . $filename1;
                    $target_path1 = './upload/guest/';

                    $config_manip1 = array(
                    'image_library' => 'gd2',
                    'source_image' => $source_path1,
                    'new_image' => $target_path1,
                    'maintain_ratio' => TRUE,
                    'create_thumb' => TRUE,
                    'thumb_marker' => '_thumb',
                    'width' => 100,
                    'height' => 100
                    );

                    $this->load->library('image_lib', $config_manip1);

                    if (!$this->image_lib->resize()) {
                            $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            redirect('dashboard/edit_guest');
                    }
                    // clear //
                    $thumb_name1 = explode(".", $filename1);
                    $guest_thumb1 = $thumb_name1[0] . $config_manip1['thumb_marker'] . "." . $thumb_name1[1];
                    $this->image_lib->clear();

                    $guest_edit = array(
                        'g_name' => $this->input->post('g_name'),
                        'g_address' => $this->input->post('g_address'),
                        'g_contact_no' => $this->input->post('g_contact_no'),
                        'g_email' => $this->input->post('g_email'),
                        'g_gender' => $this->input->post('g_gender'),
                        'g_dob' => date("Y-m-d", strtotime($this->input->post('g_dob'))),
                        'g_occupation' => $this->input->post('g_occupation'),
                        'g_married' => $this->input->post('g_married'),
                        'g_pincode' => $this->input->post('g_place'),
                        'g_city' => $this->input->post('g_city'),
                        'g_state' => $this->input->post('g_state'),
                        'g_country' => $this->input->post('g_country'),                                
                        'g_id_proof' => $guest_id,                                
                        'g_id_proof_thumb' => $guest_thumb1
                    );                           

                }

                
                else
                {
                    $guest_edit = array(
                        'g_name' => $this->input->post('g_name'),
                        'g_address' => $this->input->post('g_address'),
                        'g_contact_no' => $this->input->post('g_contact_no'),
                        'g_email' => $this->input->post('g_email'),
                        'g_gender' => $this->input->post('g_gender'),
                        'g_dob' => date("Y-m-d", strtotime($this->input->post('g_dob'))),
                        'g_occupation' => $this->input->post('g_occupation'),
                        'g_married' => $this->input->post('g_married'),
                        'g_pincode' => $this->input->post('g_place'),
                        'g_city' => $this->input->post('g_city'),
                        'g_state' => $this->input->post('g_state'),
                        'g_country' => $this->input->post('g_country')
                    );
                }
        
                    
                //print_r($guest_edit);
                //exit();

                $query = $this->dashboard_model->edit_guest($guest_edit,$this->input->post('guest_id'));
                $g_id = $this->input->post('guest_id');
                 if (isset($query) && $query) {
                    $this->session->set_flashdata('succ_msg', "Guest  Update Successfully!");
                     $data['value'] = $this->dashboard_model->get_guest_details($g_id);
                    $data['page'] = "backend/dashboard/edit_guest";
                    $this->load->view('backend/common/index', $data);


                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                     $data['value'] = $this->dashboard_model->get_guest_details($g_id);
                    $data['page'] = 'backend/dashboard/edit_guest';
                    $this->load->view('backend/common/index', $data);

                }


            }
            else
            {
                $g_id = $_GET['g_id'];
                $data['value'] = $this->dashboard_model->get_guest_details($g_id);
                $data['page'] = 'backend/dashboard/edit_guest';
                $this->load->view('backend/common/index', $data);
            }



        }else{
            redirect('dashboard');
        }


    }


	

	function edit_broker()
	{
		/*$b_id = $_GET['b_id'];
		echo $b_id;
		exit();*/
		if($this->session->userdata('guest') == '1'){
		$data['heading']='Brokers';
        $data['sub_heading']='Edit Broker';
        $data['description']='Edit Broker Here';
        $data['active']='edit_broker';
		$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

			if($this->input->post()){
				date_default_timezone_set("Asia/Kolkata");


					$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_photo') ) {
							/*  Image Upload 18.11.2015 */
							$room_image = $this->upload->data('file_name');
							$filename = $room_image;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/broker/';

							$config_manip = array(
							//'file_name' => 'myfile',
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);

							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_broker');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
						   /* Images Upload  18.11.2015 */

						   $broker_edit = array(
                    		'b_agency' => $this->input->post('b_agency'),
                    		'b_agency_name' => $this->input->post('b_agency_name'),
                    		'b_name' => $this->input->post('b_name'),
                    		'b_address' => $this->input->post('b_address'),
                    		'b_contact' => $this->input->post('b_contact'),
                    		'b_email' => $this->input->post('b_email'),
                    		'b_website' => $this->input->post('b_website'),
                    		'b_pan' => $this->input->post('b_pan'),
                    		'b_bank_acc_no' => $this->input->post('b_bank_acc_no'),
                    		'b_bank_ifsc' => $this->input->post('b_bank_ifsc'),
							'b_photo' => $room_image,
							'b_photo_thumb' => $room_thumb ,
							'broker_commission' =>  $this->input->post('b_commission')

							);

						}
						else
						{
                        	$broker_edit = array(
                    		'b_agency' => $this->input->post('b_agency'),
                    		'b_agency_name' => $this->input->post('b_agency_name'),
                    		'b_name' => $this->input->post('b_name'),
                    		'b_address' => $this->input->post('b_address'),
                    		'b_contact' => $this->input->post('b_contact'),
                    		'b_email' => $this->input->post('b_email'),
                    		'b_website' => $this->input->post('b_website'),
                    		'b_pan' => $this->input->post('b_pan'),
                    		'b_bank_acc_no' => $this->input->post('b_bank_acc_no'),
                    		'b_bank_ifsc' => $this->input->post('b_bank_ifsc'),
							'broker_commission' =>  $this->input->post('b_commission')

							);
                    	}


                	$query = $this->dashboard_model->edit_broker($broker_edit,$this->input->post('broker_id'));

					 if (isset($query) && $query) {
                    	$this->session->set_flashdata('succ_msg', "Broker  Update Successfully!");
						$data['value'] = $this->dashboard_model->get_broker_details($this->input->post('broker_id'));
						$data['page'] = 'backend/dashboard/edit_broker';
       					$this->load->view('backend/common/index', $data);

                	} else {
                    	$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
						$data['value'] = $this->dashboard_model->get_broker_details($b_id);
						$data['page'] = 'backend/dashboard/edit_broker';
       					$this->load->view('backend/common/index', $data);

                	}

			}else{
				$b_id = $_GET['b_id'];
				$data['value'] = $this->dashboard_model->get_broker_details($b_id);
				$data['page'] = 'backend/dashboard/edit_broker';
       			$this->load->view('backend/common/index', $data);

			}

		}else{
			redirect('dashboard');
		}


	}

    

    function add_hotel_submit()
    {
        $booking_id = $this->input->post('booking_id');
        $add_amount = $this->input->post('add_amount');
        $pay_mode   = $this->input->post('pay_mode');
        $bankname   = $this->input->post('bankname');
        $payment_status = $this->input->post('bankname');

        echo $booking_id,$add_amount,$pay_mode,$bankname,$payment_status;
    }


	function pdf_reports(){

		$data['bookings'] = $this->dashboard_model->all_bookings();
        $data['transactions'] = $this->dashboard_model->all_transactions();
		//print_r($data);
		//exit();
        $this->load->view("backend/dashboard/all_reports_pdf",$data);
		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("all_report.pdf");
	}

	function checkout_submission()
	{
		//echo "hello bunty";
		//$a = $_POST['booking_id'];
		$booking_id  = $this->input->post('booking_id');
        $date_checkout  = $this->input->post('date_checkout');

		$this->dashboard_model->update_checkout_status($booking_id,$date_checkout);
	}
	function cancel_submission()
	{
		//echo "hello bunty";
		//$a = $_POST['booking_id'];
		$booking_id  = $this->input->post('booking_id');
		$this->dashboard_model->update_cancel_status($booking_id);
	}
    function cancel_submission_retention()
    {
        //echo "hello bunty";
        //$a = $_POST['booking_id'];
        date_default_timezone_set('America/Los_Angeles');
        $booking_id  = $this->input->post('booking_id');
        $amount=$this->input->post('amount');
        $mode=$this->input->post('mode');
        $bank=$this->input->post('bank');

        $data=array(

            't_booking_id'=>$booking_id,
            't_amount' => $amount,
            't_date' =>  date("Y-m-d H:i:s"),
            't_payment_mode' => $mode,
            't_bank_name' => $bank,
            't_status' =>' done',
            'transaction_from_id' => 2,
            'transaction_to_id' => 4,
            'transaction_releted_t_id' => 6

        );
       $query= $this->dashboard_model->add_transaction($data);
       $query2= $this->dashboard_model->update_cancel_status($booking_id);
        if($query && isset($query)){

            echo 'Retention Money Taken';
        }
        else{
            echo 'Database Error';
        }
    }
	function checkin_submission()
	{
		$booking_id  = $this->input->post('booking_id');
		$this->dashboard_model->update_checkin_status($booking_id);

        $booking_details= $this->dashboard_model->get_booking_details($booking_id);
        $guest_id= $booking_details->guest_id;

        $guest_details=$this->dashboard_model->get_guest_details($guest_id);

        foreach($guest_details as $guest){
           $g_name=$guest->g_name;
            $g_number=$guest->g_contact_no;
        }

        $admin = array(
            'admin_hotel' => $this->session->userdata('user_hotel'),
            'admin_first_name' => $g_name,
            // 'admin_middle_name' => $this->input->post('admin_middle_name'),
            // 'admin_last_name' => $this->input->post('admin_last_name'),
            // 'admin_email' => $this->input->post('admin_email'),
            'admin_user_type' => 4,
            'admin_create_date' => date("Y-m-d H:i:s"),
            'admin_modification_date' => date("Y-m-d H:i:s"),
            'admin_booking_id' => $booking_id,
        );
        $query1 = $this->dashboard_model->add_admin($admin);

        $user = array(
            'user_id' => $query1,
            'hotel_id' => $this->session->userdata('user_hotel'),
            'user_name' => $g_name,
            'user_password' => sha1(md5($g_number)),
            //'user_email' => $this->input->post('admin_email'),
            'user_type_id' => 4,
            'user_status' => 'A'
        );
        $query2 = $this->dashboard_model->add_user($user);




    }
	function myprofile()
	{

            $data['heading'] = 'My Profile';
            $data['sub_heading'] = '';
            $data['description'] = '';
            $data['active'] = 'myprofile';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));




                $data['page'] = 'backend/dashboard/profile';
                $this->load->view('backend/common/index', $data);


	}
		function lockscreen()
	{


            $data['heading'] = 'Lockscreen';
            $data['sub_heading'] = '';
            $data['description'] = '';
            $data['active'] = 'myprofile';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

			$data['admin_name'] = $this->dashboard_model->get_admin($this->session->userdata('user_id'));


                $data['page'] = 'backend/dashboard/lockscreen';
                $this->load->view('backend/common/lockscreen',$data);


	}

	function profile()
	{


            $data['heading'] = 'Profile';
            $data['sub_heading'] = '';
            $data['description'] = '';
            $data['active'] = 'myprofile';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

			$data['admin_name'] = $this->dashboard_model->get_admin($this->session->userdata('user_id'));


                $data['page'] = 'backend/dashboard/profile';
                $this->load->view('backend/common/index',$data);


	}

	function unlock()
	{

		if($this->dashboard_model->check_unlock($this->input->post('p_lock'))){

		header('Location:  '.base_url().'dashboard');
		}
		else{
		header('Location:  '.base_url().'dashboard/lockscreen');
		}


	}

    function delete_room()
    {
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $room_id = $_GET['room_id'];

        $query = $this->dashboard_model->delete_room($room_id);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Room Deleted Successfully!");
            $data['rooms'] = $this->dashboard_model->all_rooms();
            $data['page'] = 'backend/dashboard/all_rooms';
            $this->load->view('backend/common/index', $data);

        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            $data['rooms'] = $this->dashboard_model->all_rooms();
            $data['page'] = 'backend/dashboard/all_rooms';
            $this->load->view('backend/common/index', $data);
        }
    }


    function delete_guest()
    {
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $g_id = $_GET['g_id'];

        $query = $this->dashboard_model->delete_guest($g_id);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Guest Deleted Successfully!");
            $data['guest'] = $this->dashboard_model->all_guest_limit_view();
            $data['page'] = 'backend/dashboard/all_guest';
            $this->load->view('backend/common/index', $data);

        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            $data['guest'] = $this->dashboard_model->all_guest_limit_view();
            $data['page'] = 'backend/dashboard/all_guest';
            $this->load->view('backend/common/index', $data);
        }
    }

    function delete_broker()
    {
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $b_id = $_GET['b_id'];

        $query = $this->dashboard_model->delete_broker($b_id);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Broker Information Deleted Successfully!");
            $data['broker'] = $this->dashboard_model->all_broker_limit();
            $data['page'] = 'backend/dashboard/all_broker';
            $this->load->view('backend/common/index', $data);

        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            $data['broker'] = $this->dashboard_model->all_broker_limit();
            $data['page'] = 'backend/dashboard/all_broker';
            $this->load->view('backend/common/index', $data);
        }
    }

    function delete_compliance()
    {
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $c_id = $_GET['c_id'];

        $query = $this->dashboard_model->delete_compliance($c_id);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Compliance Deleted Successfully!");
            $data['compliance'] = $this->dashboard_model->all_compliance_limit();
            $data['page'] = 'backend/dashboard/all_compliance';
            $this->load->view('backend/common/index', $data);

        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            $data['compliance'] = $this->dashboard_model->all_compliance_limit();
            $data['page'] = 'backend/dashboard/all_compliance';
            $this->load->view('backend/common/index', $data);
        }
    }

    function delete_event()
    {
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $e_id = $_GET['e_id'];

        $query = $this->dashboard_model->delete_event($e_id);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Event Information Deleted Successfully!");
            $data['events'] = $this->dashboard_model->all_events();
            $data['page'] = 'backend/dashboard/all_events';
            $this->load->view('backend/common/index', $data);

        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            $data['events'] = $this->dashboard_model->all_events();
            $data['page'] = 'backend/dashboard/all_events';
            $this->load->view('backend/common/index', $data);
        }
    }

	/* 23/12/2015 subha */
	function edit_compliance()
	{

        if($this->session->userdata('compliance') == '1'){
		$data['heading']='Compliance';
        $data['sub_heading']='Edit Compliance';
        $data['description']='Edit Compliance Here';
        $data['active']='edit_compliance';
		$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

			if($this->input->post()){
				date_default_timezone_set("Asia/Kolkata");


					$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_compliance') ) {
							/*  Image Upload 18.11.2015 */
							$compliance_img = $this->upload->data('file_name');
							$filename = $compliance_img;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/certificate/';

							$config_manip = array(
							//'file_name' => 'myfile',
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);

							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_compliance');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$compliance_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
    						    /* Images Upload  18.11.2015 */



        						   $compliance_edit = array(
                                    'c_valid_for' => $this->input->post('c_valid_for'),
                                    'c_name' => $this->input->post('c_name'),
                                    'c_owner' => $this->input->post('c_owner'),
                                    'c_description' => $this->input->post('c_description'),
                                    'c_type' => $this->input->post('c_type'),
                                    'c_importance' => $this->input->post('c_importance'),
                                    'c_valid_from' => $this->input->post('c_valid_from'),
                                    'c_valid_upto' => $this->input->post('c_valid_upto'),
                                    'c_renewal' => $this->input->post('c_renewal'),
                                    'c_file' => $compliance_img,
                                    'c_file_thumb' => $compliance_thumb,
                                    'c_primary_notif_period' => $this->input->post('c_primary'),
                                    'c_secondary_notif_period' => $this->input->post('c_secondary'),
                                    'c_authority' => $this->input->post('c_authority')

    							);

						}
						else
						{
                        	$compliance_edit = array(
                    		    'c_valid_for' => $this->input->post('c_valid_for'),
                                'c_name' => $this->input->post('c_name'),
                                'c_owner' => $this->input->post('c_owner'),
                                'c_description' => $this->input->post('c_description'),
                                'c_type' => $this->input->post('c_type'),
                                'c_importance' => $this->input->post('c_importance'),
                                'c_valid_from' => $this->input->post('c_valid_from'),
                                'c_valid_upto' => $this->input->post('c_valid_upto'),
                                'c_renewal' => $this->input->post('c_renewal'),
                                'c_primary_notif_period' => $this->input->post('c_primary'),
                                'c_secondary_notif_period' => $this->input->post('c_secondary'),
                                'c_authority' => $this->input->post('c_authority')
							);
                    	}


                	    $query = $this->dashboard_model->edit_compliance($compliance_edit,$this->input->post('compliance_id'));

                        $c_id = $this->input->post('c_id');

    					if (isset($query) && $query) {
                        	$this->session->set_flashdata('succ_msg', "Compliances  Update Successfully!");
    						$data['value'] = $this->dashboard_model->get_c_details($c_id );
                            $data['compliance'] = $this->dashboard_model->all_compliance_limit();
    						$data['page'] = 'backend/dashboard/all_compliance';
           					$this->load->view('backend/common/index', $data);

                    	}
                        else{
                        	$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
    						$data['value'] = $this->dashboard_model->get_c_details($c_id);
                            $data['compliance'] = $this->dashboard_model->all_compliance_limit();
    						$data['page'] = 'backend/dashboard/all_compliance';
           					$this->load->view('backend/common/index', $data);
                	    }

			}else{
				$c_id = $_GET['c_id'];
				$data['value'] = $this->dashboard_model->get_c_details($c_id);
				$data['page'] = 'backend/dashboard/edit_compliance';
       			$this->load->view('backend/common/index', $data);

			}

		}else{
			redirect('dashboard');
		}


	}

    public function add_event(){

        if($this->session->userdata('broker') =='1'){
            $data['heading']='Events';
            $data['sub_heading']='Add Event';
            $data['description']='Add Event Here';
            $data['active']='add_event';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

                //$id_b = $this->input->post('b_contact');
                /* Images Upload */
               /* $this->upload->initialize($this->set_upload_options());
                if ($this->upload->do_upload('image_photo') ) {
                    /*  Image Upload 18.11.2015 */
                  /*  $room_image = $this->upload->data('file_name');
                    $filename = $room_image;
                    $source_path = './upload/' . $filename;
                    $target_path = './upload/broker/';

                    $config_manip = array(
                        //'file_name' => 'myfile',
                        'image_library' => 'gd2',
                        'source_image' => $source_path,
                        'new_image' => $target_path,
                        'maintain_ratio' => TRUE,
                        'create_thumb' => TRUE,
                        'thumb_marker' => '_thumb',
                        'width' => 100,
                        'height' => 100
                    );
                    $this->load->library('image_lib', $config_manip);

                    if (!$this->image_lib->resize()) {
                        $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                        redirect('dashboard/add_broker');
                    }
                    // clear //
                    $thumb_name = explode(".", $filename);
                    $room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                    $this->image_lib->clear();
                    /* Images Upload  18.11.2015 */

  /*              }
                else
                {
                    $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                    redirect('dashboard/add_broker');
                }
*/
                date_default_timezone_set("Asia/Kolkata");
                /*$files = $_FILES['image_photo'];
                print_r($files);
                $this->load->library('upload');
                $new_name = str_replace(".","",microtime());
                $config1['upload_path'] =FCPATH . 'upload/';
                $config1['allowed_types'] = 'gif|jpg|png|jpeg';
                $config1['file_name']=$new_name;*/
                $event = array(

                    'e_name' => $this->input->post('e_name'),
                    'e_from' => date("y-m-d",strtotime($this->input->post('e_from'))),
                    'e_upto' => date("y-m-d",strtotime($this->input->post('e_upto'))),
                    'e_notify' => $this->input->post('e_notify'),
                    'hotel_id' => $this->session->userdata('user_hotel'),
                    'event_color' => $this->input->post('e_event_color'),
                    'event_text_color' => $this->input->post('e_event_text_color')

                );
                
                $query = $this->dashboard_model->add_event($event);

                if (isset($query) && $query) {
                    $this->session->set_flashdata('succ_msg', "Event Added Successfully!");
                    redirect('dashboard/add_event');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/add_event');
                }

            }
            else{
                $data['page'] = 'backend/dashboard/add_event';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }

    function all_events()
    {
        if($this->session->userdata('event') =='1') {
            $data['heading'] = 'Events';
            $data['sub_heading'] = 'All Events';
            $data['description'] = 'Events List';
            $data['active'] = 'all_events';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            /*if ($this->input->post('pages')) {
                $pages = $this->input->post('pages');
            } else {
                if ($this->session->flashdata('pages')) {
                    $pages = $this->session->flashdata('pages');
                } else {
                    $pages = 5;
                }
            }

            $this->session->set_flashdata('pages', $pages);

            $config['base_url'] = base_url() . 'dashboard/all_broker';
            $config['total_rows'] = $this->dashboard_model->all_broker_row();
            $config['per_page'] = $pages;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";


            $this->pagination->initialize($config);

            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['broker'] = $this->dashboard_model->all_broker_limit($config['per_page'], $segment);
            $data['pagination'] = $this->pagination->create_links();*/
            $data['events'] = $this->dashboard_model->all_events_limit();
            $data['page'] = 'backend/dashboard/all_events';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }


    public function add_feedback(){

        if($this->session->userdata('broker') =='1'){
            $data['heading']='Feedback';
            $data['sub_heading']='Add Feedback';
            $data['description']='Add Feedback Here';
            $data['active']='add_feedback';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

					//print_r($_POST);
					//exit;
					if($this->input->post('booking_id')){
						$booking_id = $this->input->post('booking_id');
					} else {
						$booking_id = '0';
					}
					$feedback = array(
					'hotel_id' => $this->session->userdata('user_hotel'),
					'guest_name' => $this->input->post('gName'),
					'booking_id' => $booking_id,
					'ease_booking' => $this->input->post('w1'),
					'reception' => $this->input->post('w2'),
					'staff' => $this->input->post('w3'),
					'cleanliness' => $this->input->post('w4'),
					'ambience' =>   $this->input->post('w5'),
					'sleep_quality' => $this->input->post('w6'),
					'room_quality' => $this->input->post('w7'),
					'food_quality' => $this->input->post('w8'),
					'env_quality' => $this->input->post('w9'),
					'service' => $this->input->post('w10'),
					'package' => $this->input->post('w11'),
					'extra' => $this->input->post('w12'),
					'come_back' => $this->input->post('or1'),
					'refer_friend' => $this->input->post('or2'),
					'reasonable_cost' => $this->input->post('or3'),
					'suggestion' => $this->input->post('or4'),
					'comment' => $this->input->post('comment'),
					'add_social_media' => $this->input->post('or5')					
					);
            		$query = $this->dashboard_model->add_feedback($feedback);
					if (isset($query) && $query) 
					{
                		$this->session->set_flashdata('succ_msg', "Feedback Added Successfully!");
						if($booking_id > 0){
							redirect('dashboard/booking_edit?b_id='.$booking_id);
						} else {
							redirect('dashboard/add_feedback');
						}
            		} 
					else 
					{
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
						if($booking_id > 0){
							redirect('dashboard/booking_edit?b_id='.$booking_id);
						} else {
							redirect('dashboard/add_feedback');
						}
            		}

            }
            else{
				if(isset($_GET['bID'])){
					$data['guest'] = $this->dashboard_model->get_booking_details($_GET['bID']);	
					$data['page'] = 'backend/dashboard/add_feedback';
					$this->load->view('backend/common/index', $data);
				} else {
					$data['page'] = 'backend/dashboard/add_feedback';
					$this->load->view('backend/common/index', $data);					
				}
            }
        }else{
            redirect('dashboard');
        }
    }

    function all_feedback()
    {
        if(1) {
            $data['heading'] = 'Feedback';
            $data['sub_heading'] = 'All Feedbacks';
            $data['description'] = 'Feedbacks List';
            $data['active'] = 'all_feedback';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            $data['feedback'] = $this->dashboard_model->all_feedback();
            $data['page'] = 'backend/dashboard/all_feedback';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

	function delete_feedback($fid){
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $query = $this->dashboard_model->delete_feedback($fid);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Feedback Deleted Successfully!");
            $data['feedback'] = $this->dashboard_model->all_feedback();
            $data['page'] = 'backend/dashboard/all_feedback';
            $this->load->view('backend/common/index', $data);
        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            $data['feedback'] = $this->dashboard_model->all_feedback();
            $data['page'] = 'backend/dashboard/all_feedback';
            $this->load->view('backend/common/index', $data);
        }
    }
    function get_guest_name($query){
        $data = $this->dashboard_model->get_guest_name($query);
		foreach($data as $row){
			$val[]=  implode(',', $row);
		}
		$val=  '['.'"'.implode('","', $val).'"'.']';
		print_r($val);		
		exit;
    }

    public function pay_broker(){

        if($this->session->userdata('broker') =='1'){
            $data['heading']='Pay Broker';
            $data['sub_heading']='Pay Broker';
            $data['description']='Pay Broker Here';
            $data['active']='add_broker';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

                //$id_b = $this->input->post('b_contact');
                /* Images Upload */
                /* $this->upload->initialize($this->set_upload_options());
                 if ($this->upload->do_upload('image_photo') ) {
                     /*  Image Upload 18.11.2015 */
                /*  $room_image = $this->upload->data('file_name');
                  $filename = $room_image;
                  $source_path = './upload/' . $filename;
                  $target_path = './upload/broker/';

                  $config_manip = array(
                      //'file_name' => 'myfile',
                      'image_library' => 'gd2',
                      'source_image' => $source_path,
                      'new_image' => $target_path,
                      'maintain_ratio' => TRUE,
                      'create_thumb' => TRUE,
                      'thumb_marker' => '_thumb',
                      'width' => 100,
                      'height' => 100
                  );
                  $this->load->library('image_lib', $config_manip);

                  if (!$this->image_lib->resize()) {
                      $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                      redirect('dashboard/add_broker');
                  }
                  // clear //
                  $thumb_name = explode(".", $filename);
                  $room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                  $this->image_lib->clear();
                  /* Images Upload  18.11.2015 */

                /*              }
                              else
                              {
                                  $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                                  redirect('dashboard/add_broker');
                              }
              */
                date_default_timezone_set("Asia/Kolkata");
                /*$files = $_FILES['image_photo'];
                print_r($files);
                $this->load->library('upload');
                $new_name = str_replace(".","",microtime());
                $config1['upload_path'] =FCPATH . 'upload/';
                $config1['allowed_types'] = 'gif|jpg|png|jpeg';
                $config1['file_name']=$new_name;*/
                $event = array(


                    'e_name' => $this->input->post('e_name'),
                    'e_from' => date("y-m-d",strtotime($this->input->post('e_from'))),
                    'e_upto' => date("y-m-d",strtotime($this->input->post('e_upto'))),
                    'e_notify' => $this->input->post('e_notify'),
                    'hotel_id' => $this->session->userdata('user_hotel'),


                );
                $query = $this->dashboard_model->add_event($event);

                if (isset($query) && $query) {
                    $this->session->set_flashdata('succ_msg', "Event Added Successfully!");
                    redirect('dashboard/add_event');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/add_event');
                }

            }
            else{
                $data['page'] = 'backend/dashboard/add_event';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }

    function  send_message(){

        $from=$_GET["from"];
        $to=$_GET["to"];
        $message=$_GET["message"];





       $data=array(

            'u_from_id' =>$from,
            'u_to_id' =>$to,
            'm_body' => $message,

        );


        $query=$this->dashboard_model->send_message($data);

        if($query){
            echo $query;
        }
        else{
            echo $query;
        }
    }

    function  get_message(){

        $from=$_GET["from"];
        $to=$_GET["to"];
        //$message=$_GET["message"];

        $msgs=$this->dashboard_model->get_message($from,$to);
        if(isset($msgs)&& $msgs){
            foreach($msgs as $msg){
                $text=$msg->m_body;
                $id=$msg->m_id;

            }
        }
        else{
            $id=0;
            $text="";
        }
        if($id!=0) {
            $this->dashboard_model->update_message($from, $to, $id);
        }

        if($text!="") {
            echo $text;
        }
        else{
            echo "";
        }

    }

    function unit_type(){
        $data['heading'] = 'Room';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['active'] = 'unit_type';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $data['admin_name'] = $this->dashboard_model->get_admin($this->session->userdata('user_id'));
		$data['unit'] = $this->dashboard_model->all_unit_type();

        $data['page'] = 'backend/dashboard/unit_type';
        $this->load->view('backend/common/index', $data);

    }

    public function add_unit_type(){
        $data['heading'] = 'Unit Type';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['active'] = 'room_type';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $data['admin_name'] = $this->dashboard_model->get_admin($this->session->userdata('user_id'));
            if($this->input->post()) {
					$unit = array(
					'unit_type' => $this->input->post('unit_type'),
					'unit_name' => $this->input->post('unit_name'),
					'unit_class' => $this->input->post('unit_class'),
					'unit_desc' => $this->input->post('desc')					
					);
            		$query = $this->dashboard_model->add_unit_type($unit);
					if (isset($query) && $query) 
					{
                		$this->session->set_flashdata('succ_msg', "Unit Type Added Successfully!");
                		redirect('dashboard/unit_type');
            		} 
					else 
					{
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                		redirect('dashboard/unit_type');
            		}

            }

	}
	
	function delete_unit_type($fid){
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
		$data['admin_name'] = $this->dashboard_model->get_admin($this->session->userdata('user_id'));
        $query = $this->dashboard_model->delete_unit_type($fid);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Unit Type Deleted Successfully!");
            redirect('dashboard/unit_type');
        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            redirect('dashboard/unit_type');
        }
    }

    function  get_amount_guest(){


        $booking_id=$_GET["booking_id"];

        $booking_id_actual = substr($booking_id, -4);
        $datas=$this->dashboard_model->particular_booking(intval($booking_id_actual));
        if(isset($datas) && $datas){
        foreach($datas as $data){

            $amount=$data->room_rent_sum_total;
        }}
        else{
            $amount =0;
        }

        echo $amount;
    }
	
	function get_unit_name(){
            $unit_type = $this->input->post('val');
            $query = $this->dashboard_model->get_unit_name($unit_type);
			//echo "<pre>";
			//print_r($query); //exit;
			echo '<select class="form-control" id="unit_name" name="unit_name" required="required" onchange="get_unit_class(this.value)">';
			echo '<option value="" disabled="" selected="">--Unit Name--</option>';
			foreach($query as $qry){
 				echo '<option value="'.$qry["id"].'">'.$qry["unit_name"].'</option>';
			}
            echo '</select>';
			echo '<label for="form_control_2">Unit Name<span class="required">*</span></label>';			
			//echo "<pre>";
			//print_r($qry);
			//exit;

    }
	
	function get_unit_class(){
            $unitID = $this->input->post('val');
            $qry = $this->dashboard_model->get_unit_class($unitID);
			//echo "<pre>";
			//print_r($qry);
 			echo '<input type="text" autocomplete="off" class="form-control" readonly id="unit_class" name="unit_class" required="required" value="'.$qry["unit_class"].'">';
			echo '<label>	Unit Class<span class="required" id="b_contact_name">*</span></label>';
			//exit;

    }	
	
	
	function booking_edit(){
        if($this->session->userdata('booking') =='1') {
            $data['heading'] = 'View Booking';
            $data['sub_heading'] = 'View Booking';
            $data['description'] = 'Bookings Details';
            $data['active'] = 'booking_edit';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            //echo $this->uri->segment(3);
			$bookingID = $_GET['b_id'];
            $services=$this->dashboard_model->all_services();
            if(isset($services) && $services){
                foreach($services as $service){
                 $match=   $this->dashboard_model->service_booking_match($bookingID,$service->s_rules);
                    if(isset($match)&& $match){
                        $data['s_id']= $service->s_id;
                        $data['s_name']= $service->s_name;
                        $data['s_category']= $service->s_category;
                        $data['s_price']= $service->s_price;
                        $data['s_tax']= $service->s_tax;
                        $data['s_discount']= $service->s_discount;

                    }
                    else{
                        $data['s_id']= "";
                    }
                }
            }
			$data['bookingDetails'] = $this->dashboard_model->get_booking_details($bookingID);
           // $data['service_details'] = $this->dashboard_model->get_service_details($bookingID);
			$data['feedback'] = $this->dashboard_model->all_feedbackByID($bookingID);
            //$data['transactions'] = $this->dashboard_model->all_transactions();

            $data['page'] = 'backend/dashboard/booking_edit';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }
    function  add_service_to_booking(){
        $s_id=$this->input->post("service_id");
        $s_price=$this->input->post("service_price");
        $s_tax= $this->input->post("service_tax");
        $booking_id=$this->input->post("booking_id");

        $data=array(
            'booking_id' => $booking_id,
            'service_id' => ','.$s_id,
            'service_price' =>$s_price+($s_price*($s_tax/100))

        );
        $query=$this->dashboard_model->add_service_to_booking_db($data);

        $data = array(
            'return' => $query
        );



        header('Content-Type: application/json');
        echo json_encode($data);

        return $query;

    }
	
    public function add_stay_details(){

            $data['heading']='';
            $data['sub_heading']='';
            $data['description']='';
            $data['active']='';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

					//print_r($_POST);
					//exit;
					
					$booking_id = $this->input->post('booking_id');
					
					$stay = array(
					'cust_from_date' => date('Y-m-d h:i:s',strtotime($this->input->post('cust_from_date'))),
					'confirmed_checkin_time' => $this->input->post('confirmed_checkin_time'),
					'arrival_mode' => $this->input->post('arrival_mode'),
					'coming_from' => $this->input->post('coming_from'),
					'cust_end_date' => date('Y-m-d h:i:s',strtotime($this->input->post('cust_end_date'))),
					'confirmed_checkout_time' => $this->input->post('confirmed_checkout_time'),
					'dept_mode' => $this->input->post('dept_mode'),
					'next_destination' => $this->input->post('next_destination')					
					);
					//print_r($stay);
				    //exit;					
            		$query = $this->dashboard_model->add_stay_details($stay,$booking_id);
					if (isset($query) && $query) 
					{
                		$this->session->set_flashdata('succ_msg', "Stay Details Added Successfully!");
                		redirect('dashboard/booking_edit?b_id='.$booking_id);
            		} 
					else 
					{
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                		redirect('dashboard/booking_edit?b_id='.$booking_id);
            		}

            }
            else{
                $data['page'] = 'backend/dashboard/booking_edit';
                $this->load->view('backend/common/index', $data);
            }

    }

    public function add_pay_info(){

            $data['heading']='';
            $data['sub_heading']='';
            $data['description']='';
            $data['active']='';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

					//print_r($_POST);
					//exit;
					//base_room_rent
					if($this->input->post('modifier_type') == 'add'){ 
						$val = $this->input->post('actual_room_rent')+$this->input->post('modifier_amount');
					} else {
						$val = $this->input->post('actual_room_rent')-$this->input->post('modifier_amount');
					}
					$tot_amt = $val*$this->input->post('stay_days');
					$tax_amt = $tot_amt*$this->input->post('tax_percent')/100;
					$tm = $tot_amt + $tax_amt;
					$booking_id = $this->input->post('booking_id');
					
					$payInfo = array(
					'base_room_rent' => $val,
					'rent_mode_type' => $this->input->post('modifier_type'),
					'mod_room_rent' => $this->input->post('modifier_amount'),
					'room_rent_total_amount' => $tot_amt,
					'room_rent_tax_amount' => $tax_amt,
					'room_rent_sum_total' => $tm					
					);
					//print_r($stay);
				    //exit;					
            		$query = $this->dashboard_model->add_pay_info($payInfo,$booking_id);
					if (isset($query) && $query) 
					{
                		$this->session->set_flashdata('succ_msg', "Payment Information Added Successfully!");
                		redirect('dashboard/booking_edit?b_id='.$booking_id);
            		} 
					else 
					{
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                		redirect('dashboard/booking_edit?b_id='.$booking_id);
            		}

            }
            else{
                $data['page'] = 'backend/dashboard/booking_edit';
                $this->load->view('backend/common/index', $data);
            }

    }
	
	
    public function add_guest_info(){

            $data['heading']='';
            $data['sub_heading']='';
            $data['description']='';
            $data['active']='';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

					//print_r($_POST);
					//exit;
					$address = $this->dashboard_model->fetch_all_address($this->input->post('g_pincode'));
					//print_r($address);
					//echo $address[0]->area_0;
					//exit;
					$booking_id = $this->input->post('booking_id');
					$guest_id = $this->input->post('guest_id');
					$guest = array(
					'g_name' => $this->input->post('g_name'),
					'g_contact_no' => $this->input->post('g_contact_no'),
					'g_pincode' => $this->input->post('g_pincode'),
					'g_city' => $address[0]->area_4,
					'g_state' => $address[0]->area_1,
					'g_country' => $address[0]->area_0					
					);					
					$preference = array(
					'preference' => $this->input->post('preference')					
					);
					//print_r($stay);
				    //exit;					
            		$query = $this->dashboard_model->add_guest_info($guest,$guest_id,$preference,$booking_id);
					if (isset($query) && $query) 
					{
                		$this->session->set_flashdata('succ_msg', "Guest Details Added Successfully!");
                		redirect('dashboard/booking_edit?b_id='.$booking_id);
            		} 
					else 
					{
                		$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                		redirect('dashboard/booking_edit?b_id='.$booking_id);
            		}

            }
            else{
                $data['page'] = 'backend/dashboard/booking_edit';
                $this->load->view('backend/common/index', $data);
            }

    }	
	

    public function add_channel(){

        if($this->session->userdata('broker') =='1'){
            $data['heading']='Channel';
            $data['sub_heading']='Add Channel';
            $data['description']='Add Channel Here';
            $data['active']='add_channel';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {
				
				//$id_b = $this->input->post('b_contact');
				/* Images Upload */
						$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_photo') ) {
							$room_image = $this->upload->data('file_name');
							$filename = $room_image;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/channel/';
                        	
							$config_manip = array(
							//'file_name' => 'myfile',
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);
							
							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_broker');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear(); 
						  
						}
						else 
						{
                        	$this->session->set_flashdata('err_msg', $this->upload->display_errors());
                        	redirect('dashboard/add_channel');
                    	}

                date_default_timezone_set("Asia/Kolkata");
                $channel = array(

                    'hotel_id' => $this->session->userdata('user_hotel'),
                    'channel_name' => $this->input->post('channel_name'),
                    'channel_contact_name' => $this->input->post('channel_contact_name'),
                    'channel_address' => $this->input->post('channel_address'),
                    'channel_contact' => $this->input->post('channel_contact'),
                    'channel_email' => $this->input->post('channel_email'),
                    'channel_website' => $this->input->post('channel_website'),
                    'channel_pan' => $this->input->post('channel_pan'),
                    'channel_bank_acc_no' => $this->input->post('channel_bank_acc_no'),
                    'channel_bank_ifsc' => $this->input->post('channel_bank_ifsc'),
                    'channel_commission' => $this->input->post('channel_commission'),
                    'channel_photo' => $room_image,
					'channel_photo_thumb' => $room_thumb 
					
					);
                $query = $this->dashboard_model->add_channel($channel);

                if (isset($query) && $query) {
                    $this->session->set_flashdata('succ_msg', "Channel Added Successfully!");
                    redirect('dashboard/add_channel');
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/add_channel');
                }

            }
            else{
                $data['page'] = 'backend/dashboard/add_channel';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }

    function all_channel()
    {
        if($this->session->userdata('broker') =='1') {
            $data['heading'] = 'Channel';
            $data['sub_heading'] = 'All Channel';
            $data['description'] = 'Channel List';
            $data['active'] = 'all_channel';
			$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            
			$data['channel'] = $this->dashboard_model->all_channels();
            $data['page'] = 'backend/dashboard/all_channel';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

    function channel_payments()
    {

        $data['heading'] = 'Channel Payment';
        $data['sub_heading'] = 'Channel Payment';
        $data['description'] = '';
        $data['active'] = 'channel_payments';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
        $data['channel'] = $this->dashboard_model->all_channel_limit();

        if($this->input->post()) {


            date_default_timezone_set("Asia/Kolkata");

            $commission=$this->input->post('b_amount');
            $channel_id=$this->input->post('b_id');
            $query = $this->dashboard_model->pay_channel($channel_id,$commission);

            $data=array(
                't_amount' =>$commission,
                't_date' => date("Y-m-d H:i:s"),
                't_payment_mode' => $this->input->post('b_payment_mode'),
                't_bank_name' => $this->input->post('b_bank_name'),
                'transaction_releted_t_id'=>3,
                'transaction_from_id' =>4,
                'transaction_to_id' =>3

            );
            $query2 = $this->dashboard_model->pay_channel($data);

            if (isset($query) && $query  && $query2 && isset($query2)) {
                $this->session->set_flashdata('succ_msg', "Channel Payed Successfully!");
                redirect('dashboard/channel_payments');
            } else {
                $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                redirect('dashboard/channel_payments');
            }

        }
        else 
        {
            $data['channel'] = $this->dashboard_model->all_channel_limit();
            $data['page'] = 'backend/dashboard/channel_payments';
            $this->load->view('backend/common/index', $data);

        }
        
    }

    function channel_booking()
    {

                date_default_timezone_set("Asia/Kolkata");
                $commission=$_GET["channel_amount"];
                $channel_id=$_GET["channel_id"];
                $booking_id=$_GET["booking_id"];
                $query = $this->dashboard_model->update_channel_commission($channel_id,$commission);

               $data=array(
                    'booking_id' =>intval(substr($booking_id, -4)),
                    'channel_id' => $channel_id,
                    'channel_commission' => $commission,
                    'booking_source' => 'Channel',


                );

              $query2 = $this->dashboard_model->update_channel_booking($data);

                if (isset($query) && $query && $query2 && isset($query2)  ) {
                    $this->session->set_flashdata('succ_msg', "Channel Booking Added Successfully!");
                   // redirect('dashboard/broker_payments');
                    echo "success";
                } else {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    //redirect('dashboard/broker_payments');
                    echo "failure";
                }


    }

	
	function edit_channel(){
		if($this->session->userdata('guest') == '1'){
		$data['heading']='Channel';
        $data['sub_heading']='Edit Channel';
        $data['description']='Edit Channel Here';
        $data['active']='edit_channel';
		$data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

			if($this->input->post()){
				date_default_timezone_set("Asia/Kolkata");


					$this->upload->initialize($this->set_upload_options());
						if ($this->upload->do_upload('image_photo') ) {
							/*  Image Upload 18.11.2015 */
							$room_image = $this->upload->data('file_name');
							$filename = $room_image;
                        	$source_path = './upload/' . $filename;
                        	$target_path = './upload/channel/';

							$config_manip = array(
							//'file_name' => 'myfile',
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                        	);
                        	$this->load->library('image_lib', $config_manip);

							if (!$this->image_lib->resize()) {
                            		$this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                            		redirect('dashboard/add_channel');
                        	}
                        		// clear //
                        			$thumb_name = explode(".", $filename);
                        			$room_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        			$this->image_lib->clear();
						   /* Images Upload  18.11.2015 */

							$channel = array(
								'hotel_id' => $this->session->userdata('user_hotel'),
								'channel_name' => $this->input->post('channel_name'),
								'channel_contact_name' => $this->input->post('channel_contact_name'),
								'channel_address' => $this->input->post('channel_address'),
								'channel_contact' => $this->input->post('channel_contact'),
								'channel_email' => $this->input->post('channel_email'),
								'channel_website' => $this->input->post('channel_website'),
								'channel_pan' => $this->input->post('channel_pan'),
								'channel_bank_acc_no' => $this->input->post('channel_bank_acc_no'),
								'channel_bank_ifsc' => $this->input->post('channel_bank_ifsc'),
								'channel_commission' => $this->input->post('channel_commission'),
								'channel_photo' => $room_image,
								'channel_photo_thumb' => $room_thumb 								
							);

						}
						else
						{
							$channel = array(
								'hotel_id' => $this->session->userdata('user_hotel'),
								'channel_name' => $this->input->post('channel_name'),
								'channel_contact_name' => $this->input->post('channel_contact_name'),
								'channel_address' => $this->input->post('channel_address'),
								'channel_contact' => $this->input->post('channel_contact'),
								'channel_email' => $this->input->post('channel_email'),
								'channel_website' => $this->input->post('channel_website'),
								'channel_pan' => $this->input->post('channel_pan'),
								'channel_bank_acc_no' => $this->input->post('channel_bank_acc_no'),
								'channel_bank_ifsc' => $this->input->post('channel_bank_ifsc'),
								'channel_commission' => $this->input->post('channel_commission') 
							);
                    	}


                	$query = $this->dashboard_model->edit_channel($channel,$this->input->post('channel_id'));

					 if (isset($query) && $query) {
                    	$this->session->set_flashdata('succ_msg', "Channel  Update Successfully!");
						//$data['value'] = $this->dashboard_model->get_channel_details($this->input->post('channel_id'));
						//$data['page'] = 'backend/dashboard/edit_channel';
       					//$this->load->view('backend/common/index', $data);
						redirect('dashboard/all_channel');

                	} else {
                    	$this->session->set_flashdata('err_msg', "Database Error. Try again later!");
						$data['value'] = $this->dashboard_model->get_channel_details($this->input->post('channel_id'));
						$data['page'] = 'backend/dashboard/edit_channel';
       					$this->load->view('backend/common/index', $data);

                	}

			}else{
				$channel_id = $_GET['channel_id'];
				$data['channel'] = $this->dashboard_model->get_channel_details($channel_id);
				$data['page'] = 'backend/dashboard/edit_channel';
       			$this->load->view('backend/common/index', $data);

			}

		}else{
			redirect('dashboard');
		}


	}	
	
    function delete_channel($channel_id){
        $data['heading'] = '';
        $data['sub_heading'] = '';
        $data['description'] = '';
        $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

        $query = $this->dashboard_model->delete_channel($channel_id);

        if (isset($query) && $query) {
            $this->session->set_flashdata('succ_msg', "Channel Information Deleted Successfully!");
            redirect('dashboard/all_channel');

        }
        else{
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            redirect('dashboard/all_channel');
        }
    }

    public function add_service(){


        if($this->session->userdata('service') =='1'){
            $data['heading']='Service';
            $data['sub_heading']='Add Service';
            $data['description']='Add Service Here';
            $data['active']='add_service';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            if($this->input->post()) {

              //  echo $this->input->post("rule_list_val");
               // exit();

                $rule= $this->input->post('rule_list_val');
                //echo $rule;
                //exit();



                //Image Upload Start Now

                $this->upload->initialize($this->set_upload_options());
                if ($this->upload->do_upload('s_image') )
                {
                    $s_image = $this->upload->data('file_name');
                    $filename = $s_image;
                    $source_path = './upload/' . $filename;
                    $target_path = './upload/service/';

                    $config_manip = array(
                        //'file_name' => 'myfile',
                        'image_library' => 'gd2',
                        'source_image' => $source_path,
                        'new_image' => $target_path,
                        'maintain_ratio' => TRUE,
                        'create_thumb' => TRUE,
                        'thumb_marker' => '_thumb',
                        'width' => 100,
                        'height' => 100
                    );
                    $this->load->library('image_lib', $config_manip);

                    if (!$this->image_lib->resize())
                    {
                        $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                        redirect('dashboard/add_service');
                    }
                    else
                    {
                        $thumb_name = explode(".", $filename);
                        $hotel_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                        $this->image_lib->clear();


                        $service = array(
                            's_name' => $this->input->post('s_name'),
                            's_category' => $this->input->post('s_category'),
                            's_description' => $this->input->post('s_description'),
                            's_no_member' => $this->input->post('s_no_member'),
                            's_periodicity' => $this->input->post('s_periodicity'),
                            's_image' => $hotel_thumb,
                            's_rules' => $rule,
                            's_price' => $this->input->post('s_price'),
                            's_price_weekend' => $this->input->post('s_price_weekend'),
                            's_price_holiday' => $this->input->post('s_price_holiday'),
                            's_price_special' => $this->input->post('s_price_special'),
                            's_tax_applied' => $this->input->post('s_tax_applied'),
                            's_tax' => $this->input->post('s_tax'),
                            's_discount_applied' => $this->input->post('s_discount_applied'),
                            's_discount' => $this->input->post('s_discount'),

                        );



                    }

                    $query=$this->dashboard_model->insert_service($service);
                    if($query){
                        $this->session->set_flashdata('succ_msg', 'Service Created Sucessfully');
                    }
                    else{
                        $this->session->set_flashdata('err_msg', 'Database Error');
                    }
                    $data['page'] = 'backend/dashboard/add_service';
                    $this->load->view('backend/common/index', $data);

                }

                //Image Upload Section Closed
                else {
                    $service = array(
                        's_name' => $this->input->post('s_name'),
                        's_category' => $this->input->post('s_category'),
                        's_description' => $this->input->post('s_description'),
                        's_no_member' => $this->input->post('s_no_member'),
                        's_periodicity' => $this->input->post('s_periodicity'),
                        's_rules' => $rule,
                        's_price' => $this->input->post('s_price'),
                        's_price_weekend' => $this->input->post('s_price_weekend'),
                        's_price_holiday' => $this->input->post('s_price_holiday'),
                        's_price_special' => $this->input->post('s_price_special'),
                        's_tax_applied' => $this->input->post('s_tax_applied'),
                        's_tax' => $this->input->post('s_tax'),
                        's_discount_applied' => $this->input->post('s_discount_applied'),
                        's_discount' => $this->input->post('s_discount'),

                    );
                    $query=$this->dashboard_model->insert_service($service);
                    if($query){
                        $this->session->set_flashdata('succ_msg', 'Service Created Sucessfully');
                    }
                    else{
                        $this->session->set_flashdata('err_msg', 'Database Error');
                    }
                    $data['page'] = 'backend/dashboard/add_service';
                    $this->load->view('backend/common/index', $data);
                }

                $data['page'] = 'backend/dashboard/add_service';
                $this->load->view('backend/common/index', $data);
            }
            else{
                $data['page'] = 'backend/dashboard/add_service';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
    }
    function  add_rule(){

        //echo $this->input->post();
        $data=array(
            /*General Rule */
            'r_name' => $this->input->post('r_name'),
            'r_apply_person' => $this->input->post('r_apply_person'),
            'r_apply_hotel' => $this->input->post('r_apply_hotel'),
            /* Guest Rule*/
            'r_guest_name' => $this->input->post('r_guest_name'),
            'r_guest_gender' => $this->input->post('r_guest_gender'),
            'r_guest_age' => $this->input->post('r_guest_age'),
            'r_guest_age_op' => $this->input->post('r_guest_age_op'),
            'r_guest_type' => $this->input->post('r_guest_type'),
            'r_guest_state' => $this->input->post('r_guest_state'),
            'r_guest_country' => $this->input->post('r_guest_country'),
            'r_guest_vip' => $this->input->post('r_guest_vip'),
            'r_guest_visit_count' => $this->input->post('r_guest_visit_count'),
            'r_guest_visit_count_op' => $this->input->post('r_guest_visit_count_op'),
            'r_guest_spent' => $this->input->post('r_guest_spent'),
            'r_guest_spent_op' => $this->input->post('r_guest_spent_op'),
            'r_guest_preffered' => $this->input->post('r_guest_preffered'),
            'r_guest_new' => $this->input->post('r_guest_new'),
            /*Room and Booking Rule */
            'r_room_no' => $this->input->post('r_room_no'),
            'r_room_bed' => $this->input->post('r_room_bed'),
            'r_room_floor' => $this->input->post('r_room_floor'),
            'r_room_category' => $this->input->post('r_room_category'),
            'r_room_bed' => $this->input->post('r_room_bed'),
            'r_booking_from' => $this->input->post('r_booking_from'),
            'r_booking_to' => $this->input->post('r_booking_to'),
            'r_booking_no_guest' => $this->input->post('r_booking_no_guest'),
            'r_booking_no_guest_op' => $this->input->post('r_booking_no_guest_op'),
            'r_booking_nature_visit' => $this->input->post('r_booking_nature_visit'),
            'r_booking_source' => $this->input->post('r_booking_source'),
            'r_booking_stay_days' => $this->input->post('r_booking_stay_days'),
            'r_booking_stay_days_op' => $this->input->post('r_booking_stay_days_op'),
            'r_booking_total' => $this->input->post('r_booking_total'),
            'r_booking_total_op' => $this->input->post('r_booking_total_op'),

        );
       /* $data=array(
            'r_name' =>'Test',

        );*/
        $query=$this->dashboard_model->rule_create($data);
        echo $query;
       // print_r( $data);

        //$query=$this->dashboard_model->rule_create($data);
       // echo $query;
    }

    function all_service()
    {
        if($this->session->userdata('broker') =='1') {
            $data['heading'] = 'Service';
            $data['sub_heading'] = 'All Events';
            $data['description'] = 'Events List';
            $data['active'] = 'all_service';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            $data['page'] = 'backend/dashboard/all_service';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }
	
    function add_asset(){

        if($this->session->userdata('broker') =='1'){
            $data['heading']='Assets';
            $data['sub_heading']='Add Asset';
            $data['description']='Add Asset Here';
            $data['active']='add_asset';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));
            date_default_timezone_set("Asia/Kolkata");

            if($this->input->post()) {

                $this->upload->initialize($this->set_upload_options());
                    if (($this->upload->do_upload('a_asset_image')) && ($this->upload->do_upload('a_proc_bill_1_imag')) && ($this->upload->do_upload('a_proc_bill_2_imag')))
                    {

                        $this->upload->initialize($this->set_upload_options());
                        if ($this->upload->do_upload('a_asset_image')) {

                            $asset_image = $this->upload->data('file_name');
                            $filename = $asset_image;
                            $source_path = './upload/' . $filename;
                            $target_path = './upload/asset/';                            
                            $config_manip = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                            );
                            $this->load->library('image_lib', $config_manip);
                            
                            if (!$this->image_lib->resize()) {
                                    $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                    redirect('dashboard/add_asset');
                            }
                            $thumb_name = explode(".", $filename);
                            $asset_thumb = $thumb_name[0] . $config_manip['thumb_marker'] . "." . $thumb_name[1];
                            $this->image_lib->clear();
                        }
                        else 
                        {
                            $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                            redirect('dashboard/add_asset');
                        }
                        
                        $this->upload->initialize($this->set_upload_options());
                        if ($this->upload->do_upload('a_proc_bill_1_imag')) {
                            $procurement_bill_1_image = $this->upload->data('file_name');
                            $filename = $procurement_bill_1_image;
                            $source_path = './upload/' . $filename;
                            $target_path = './upload/asset/Proc_bill_1/';                            
                            $config_manip_bill_1 = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                            );
                            $this->load->library('image_lib', $config_manip_bill_1);
                            
                            if (!$this->image_lib->resize()) {
                                    $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                    redirect('dashboard/add_asset');
                            }
                            $thumb_name = explode(".", $filename);
                            $procurement_bill_1_thumb = $thumb_name[0] . $config_manip_bill_1['thumb_marker'] . "." . $thumb_name[1];
                            $this->image_lib->clear();
                        }
                        else 
                        {
                            $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                            redirect('dashboard/add_asset');
                        }

                        $this->upload->initialize($this->set_upload_options());
                        if ($this->upload->do_upload('a_proc_bill_2_imag')) {
                            $procurement_bill_2_image = $this->upload->data('file_name');
                            $filename = $procurement_bill_2_image;
                            $source_path = './upload/' . $filename;
                            $target_path = './upload/asset/Proc_bill_2/';
                            
                            $config_manip_bill_2 = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'maintain_ratio' => TRUE,
                            'create_thumb' => TRUE,
                            'thumb_marker' => '_thumb',
                            'width' => 100,
                            'height' => 100
                            );
                            $this->load->library('image_lib', $config_manip_bill_2);
                            
                            if (!$this->image_lib->resize()) {
                                    $this->session->set_flashdata('err_msg', $this->image_lib->display_errors());
                                    redirect('dashboard/add_asset');
                            }
                            $thumb_name = explode(".", $filename);
                            $procurement_bill_2_thumb = $thumb_name[0] . $config_manip_bill_2['thumb_marker'] . "." . $thumb_name[1];
                            $this->image_lib->clear();
                        }
                        else 
                        {
                            $this->session->set_flashdata('err_msg', $this->upload->display_errors());
                            redirect('dashboard/add_asset');
                        }

                        $asset = array(

                                'a_hotel_id' => $this->session->userdata('user_hotel'),
                                'a_type' => $this->input->post('a_type'),
                                'a_name' => $this->input->post('a_name'),
                                'a_first_hand' => $this->input->post('a_first_hand'),
                                'a_bought_date' => date("Y-m-d", strtotime($this->input->post('a_bought_date'))) ,
                                'a_description' => $this->input->post('a_description'),
                                'a_reg_number' => $this->input->post('a_reg_number'),
                                'a_purchased_from' => $this->input->post('a_purchased_from'),
                                'a_seller_contact_no' => $this->input->post('a_seller_contact_no'),
                                'a_service_contact_no' => $this->input->post('a_service_contact_no'),
                                'a_incharge' => $this->input->post('a_incharge'),
                                'a_cost' => $this->input->post('a_cost'),
                                'a_annual_depreciation' => $this->input->post('a_annual_depreciation'),
                                'a_amc' => $this->input->post('a_amc'),
                                'a_amc_agency_name' => $this->input->post('a_amc_agency_name'),
                                'a_amc_reg_contact_no' => $this->input->post('a_amc_reg_contact_no'),
                                'a_amc_renewal_date' => date("Y-m-d", strtotime($this->input->post('a_amc_renewal_date'))) ,
                                'a_amc_charge' => $this->input->post('a_amc_charge'),
                                'a_decomission_date' => '',
                                'a_asset_image' => $asset_thumb,
                                'a_proc_bill_1_imag' => $procurement_bill_1_thumb,
                                'a_proc_bill_2_imag' => $procurement_bill_2_thumb                            
                        );

                    }

                

                    $query = $this->dashboard_model->add_asset($asset);
                    if (isset($query) && $query) 
                    {
                        $this->session->set_flashdata('succ_msg', "Asset Added Successfully!");
                        $data['asset_type'] = $this->dashboard_model->all_assets_types();
                        $data['page'] = 'backend/dashboard/add_asset';
                        $this->load->view('backend/common/index', $data);
                    } 
                    else 
                    {
                        $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                        $data['asset_type'] = $this->dashboard_model->all_assets_types();
                        $data['page'] = 'backend/dashboard/add_asset';
                        $this->load->view('backend/common/index', $data);
                    }



            }
            else{
                $data['asset_type'] = $this->dashboard_model->all_assets_types();
                $data['page'] = 'backend/dashboard/add_asset';
                $this->load->view('backend/common/index', $data);
            }
        }else{
            redirect('dashboard');
        }
        
    }

    function all_assets()
    {
        if($this->session->userdata('broker') =='1') {
            $data['heading'] = 'Assets';
            $data['sub_heading'] = 'All Assets';
            $data['description'] = 'Assets List';
            $data['active'] = 'all_assets';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            $data['assets'] = $this->dashboard_model->all_assets_limit();
            $data['page'] = 'backend/dashboard/all_assets';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

    function asset_type(){
        if($this->session->userdata('broker') =='1') {
            $data['heading'] = 'Assets';
            $data['sub_heading'] = 'All Assets';
            $data['description'] = 'Assets List';
            $data['active'] = 'asset_type';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

             if($this->input->post()) {
                $asset_type = array(
                    'asset_type_name' => $this->input->post('asset_type_name'),
                    'asset_type_description' => $this->input->post('asset_type_description'),
                    'asset_icon' => $this->input->post('asset_icon')
                                
                    );

                $query = $this->dashboard_model->add_asset_type($asset_type);
                if (isset($query) && $query) 
                {
                    $this->session->set_flashdata('succ_msg', "Asset Type Added Successfully!");
                    redirect('dashboard/asset_type');
                } 
                else 
                {
                    $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
                    redirect('dashboard/asset_type');
                }

            }

            $data['asset'] = $this->dashboard_model->all_assets_tasks();
            $data['page'] = 'backend/dashboard/assets_type';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

    function add_housekeeping(){
        if($this->session->userdata('user_type_slug') =='G') {
            $data['heading'] = 'Housekeeping';
            $data['sub_heading'] = 'Add Housekeeping';
            $data['description'] = 'Add Housekeeping here';
            //$data['active'] = 'asset_type';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            if($this->input->post()) {


            }

           // $data['asset'] = $this->dashboard_model->all_assets_tasks();
            $data['page'] = 'backend/dashboard/add_housekeeping';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

    function housekeeping(){
        if($this->session->userdata('user_type_slug') !='G') {
            $data['heading'] = 'Housekeeping';
            $data['sub_heading'] = 'Housekeeping';
            $data['description'] = 'Housekeeping Status here';
            //$data['active'] = 'asset_type';
            $data['hotel_name'] = $this->dashboard_model->get_hotel($this->session->userdata('user_hotel'));

            if($this->input->post()) {


            }

            // $data['asset'] = $this->dashboard_model->all_assets_tasks();
            $data['page'] = 'backend/dashboard/housekeeping';
            $this->load->view('backend/common/index', $data);

        } else {
            redirect('dashboard');
        }
    }

    function room_status(){



            $this->load->view('backend/dashboard/room_status');


    }

    function calendar_load(){


        $this->load->view('backend/dashboard/calendar_load');


    }


    function  send_mail(){

        $booking_id=$this->input->post('booking_id');
        $booking_details= $this->dashboard_model->get_booking_details($booking_id);
        $guest_id= $booking_details->guest_id;

        $guest_details=$this->dashboard_model->get_guest_details($guest_id);

        foreach($guest_details as $guest){
            if($guest->g_email !="") {
                $email = $guest->g_email;
                $name=$guest->g_name;
            }
            else{
                $email="subhabratamallick19@gmail.com";
                $name="No Email Address";
            }
        }





        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'subhabratamallick19@gmail.com';
        $config['smtp_pass']    = '23633062';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $this->email->from('subhabratamallick19@gmail.com', 'Admin Hotelobjects');
        $this->email->to($email);

        $this->email->subject('Thanks '.$name.' for  your Stay');
        $this->email->message('Thanks '.$name.' for your stay in our hotel. Hope you will come again');

        $this->email->send();

        //echo $this->email->print_debugger();

        header('Content-Type: application/json');
        echo json_encode('Email Sent Sucessfully');

       // $this->load->view('email_view');*/
    }

    function change_room_status(){

        $room_id=$this->input->post('room_id');
        $clean_status=$this->input->post('clean_status');
        $data=array(

            'room_id' => $room_id,

            'clean_id' =>$clean_status,

        );

        $this->dashboard_model->update_room($data);

        header('Content-Type: application/json');
        echo json_encode("Room Status Updated");
    }

    function  add_maid(){

        $data=array(

            'maid_name' =>$this->input->post('maid_name'),
            'maid_address' =>$this->input->post('maid_address'),
            'maid_contact' =>$this->input->post('maid_contact'),

        );

        $query=$this->dashboard_model->add_maid($data);
        if (isset($query) && $query)
        {
            $this->session->set_flashdata('succ_msg', "Maid Added Successfully!");
            redirect('dashboard/housekeeping');
        }
        else
        {
            $this->session->set_flashdata('err_msg', "Database Error. Try again later!");
            redirect('dashboard/housekeeping');
        }
    }

    function  assign_maid(){

        date_default_timezone_set("Asia/Kolkata");


        $data=array(

            'maid_id' =>$this->input->post('maid_id'),
            'room_id' =>$this->input->post('room_id'),
            'status' =>0,
            'date' =>date("d-m-Y H:i:s"),


        );

        $query=$this->dashboard_model->assign_maid($data);

        $data2=array(

            'maid_id' =>$this->input->post('maid_id'),
            'maid_status' =>1,

        );
        $query2=$this->dashboard_model->update_maid($data2);

       /* $data3=array(

            'room_id' => $this->input->post('room_id'),

            'clean_id' =>3,

        );

        $query3=$this->dashboard_model->update_room($data3);*/

        if (isset($query) && $query && $query2)
        {
            header('Content-Type: application/json');
            echo json_encode("Maid Assigned to the Room");
        }
        else
        {header('Content-Type: application/json');
            echo json_encode("Database Error");
        }
    }


	
	
	

}