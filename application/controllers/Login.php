<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	/* Session Check Start */
	function __construct(){
		parent::__construct();
		if($this->session->userdata('is_logged_in')){
			redirect('dashboard');
        }
		
		/* URL Value Encryption Start */
		function base64url_encode($data) { 
		  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
		} 
		/* URL Value Encryption End */
		
		/* URL Value Decryption Start */
		function base64url_decode($data) { 
		  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
		} 
		/* URL Value Decryption End */
    }
	/* Session Check End */

	/* Login Page Start */
	function index()
	{
		$this->load->view('backend/login/index');
	}

    function get_transaction(){
        // ini_set('memory_limit', '-1');
        $users_sql=$this->dashboard_model->all_transactions();
        //  print_r($users_sql);


        $users=json_encode($users_sql);


        print_r($users);



    }
	/* Login Page End */
	
	/* User Login Validation and Verification Start */
	function user_login(){
			$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[5]|max_length[50]|xss_clean');
			if($this->form_validation->run() == FALSE){
                $data['msg']=validation_errors();
                $this->load->view('backend/login/index',$data);
               
              
			}else {
                $data = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => sha1(md5($this->input->post('user_password'))),
                    'user_status' => 'A'
                );

                $login_data = $this->login_model->login($data);






                    //$user_type_data = $this->login_model->login_user_type($login_data->user_type_id);

                    if (isset($login_data) && $login_data) {

                        $user_id = $login_data->user_id;

                        $permission = $this->login_model->get_permission($user_id);

                      $String = $permission->user_permission_type;


                        $per = explode(",", $String);



                        $x = $login_data->user_type_id;
                        if ($x == 1) {
                            $admin_status = "SUPA";
                        } elseif ($x == 2) {
                            $admin_status = "AD";
                        }
                        elseif ($x == 4) {
                            $admin_status = "G";
                        }
                        else {
                            $admin_status = "SUB";
                        }
                        /* $userdata=array(
                             //'user_type'=> $user_type_data->user_type_name,
                             'user_type_slug'=> $admin,
                             'is_logged_in'=> true,
                             'user_name'=> $login_data->user_name,
                             'user_hotel'=>$login_data->hotel_id,
                             'user_id'=> $login_data->user_id,
                             'user_permission' => $permission->user_permission_type,
                             'login_id'=> $login_data->login_id
                             ); */


                        //search array for permission::

                        $key1 = in_array("1", $per);

                        if ($key1) {
                            $admin = '1';
                        } else {
                            $admin = '0';
                        }


                        $key2 = in_array("10", $per);
                        if ($key2) {
                            $room = '1';
                        } else {
                            $room = '0';
                        }

                        $key3 = in_array("19", $per);

                        if ($key3) {
                            $broker = '1';
                        } else {
                            $broker = '0';
                        }

                        $key4 = in_array("25", $per);

                        if ($key4) {
                            $booking = '1';
                        } else {
                            $booking = '0';
                        }

                        $key5 = in_array("13", $per);

                        if ($key5) {
                            $compliance = '1';
                        } else {
                            $compliance = '0';
                        }

                        $key6 = in_array("28", $per);

                        if ($key6) {
                            $ta = '1';
                        } else {
                            $ta = '0';
                        }

                        $key7 = in_array("7", $per);

                        if ($key7) {
                            $guest = '1';
                        } else {
                            $guest = '0';
                        }

                        $key8 = in_array("37", $per);

                        if ($key8) {
                            $hotel_m = '1';
                        } else {
                            $hotel_m = '0';
                        }

                        $key9 = in_array("38", $per);

                        if ($key9) {
                            $report = '1';
                        } else {
                            $report = '0';
                        }

                        $key10 = in_array("41", $per);

                        if ($key10) {
                            $chat = '1';
                        } else {
                            $chat = '0';
                        }

                        $key11 = in_array("44", $per);

                        if ($key11) {

                            $Event = '1';
                        } else {
                            $Event = '0';
                        }

                        $key12 = in_array("48", $per);

                        if ($key12) {
                            $Feedback = '1';
                        } else {
                            $Feedback = '0';
                        }

                        $key13 = in_array("51", $per);

                        if ($key13) {
                            $Channel = '1';
                        } else {
                            $Channel = '0';
                        }

                        $key14 = in_array("54", $per);

                        if ($key14) {
                            $Service = '1';
                        } else {
                            $Service = '0';
                        }


                        $userdata = array(
                            //'user_type'=> $user_type_data->user_type_name,
                            'user_type_slug' => $admin_status,
                            'is_logged_in' => true,
                            'user_name' => $login_data->user_name,
                            'user_hotel' => $login_data->hotel_id,
                            'user_id' => $login_data->user_id,
                            'user_permission' => $permission->user_permission_type,
                            'login_id' => $login_data->login_id,
                            'admin' => $admin,
                            'room' => $room,
                            'broker' => $broker,
                            'booking' => $booking,
                            'compliance' => $compliance,
                            'transaction' => $ta,
                            'guest' => $guest,
                            'hotel_m' => $hotel_m,
                            'event' => $Event,
                            'report' => $report,
                            'chat' => $chat,
                            'feedback' => $Feedback,
                            'channel' => $Channel,
                            'service' => $Service
                        );
                        $this->session->set_userdata($userdata);

                        date_default_timezone_set('Asia/Kolkata');
                       // $_SESSION['loginTime'] = time();



                        $online=array(

                            'u_id' => $this->session->userdata('user_id'),
                            'online_from' => date("Y-m-d H:i:s"),
                        );
                        $insert_online=$this->login_model->online_insert($online);
                        //$this->session->set_userdata($permission);


                        //end of set all user-data including permission

                        if ($this->input->post('remember')) {

                            $cookie = array(
                                'name' => 'login',
                                'value' => 'User Login Data',
                                'expire' => time() + (86400 * 30),
                                'domain' => '.' . $_SERVER['HTTP_HOST'],
                                'path' => '/',
                                'prefix' => $userdata['user_name'] . '_',
                            );

                            set_cookie($cookie);
                        }
                        if ($admin_status == "AD" || $admin_status == "SUB" || $admin_status == "G") {
                            redirect('dashboard');
                        } else {
                            redirect('superadmin');
                        }


                    } else {
                        $data['msg'] = "Wrong Username or Password!";
                        $data['password'] = $this->input->post('user_password');
                        if ($this->input->post('remember')) {
                            $data['remember'] = $this->input->post('remember');
                        }
                        $this->load->view('backend/login/index', $data);
                        //redirect('login/user_login');


                    }
                }



			
    }
	/* User Login Validation and Verification End */
	
	/* After Logout Page Start */
	function logged_out(){
		$this->load->view('backend/login/index');
	}
	/* After Logout Page End */


	/* Activate Admin Account Start */
	function activate_admin(){
		$id=base64url_decode($this->uri->segment(3));
		$user_info=$this->login_model->get_user_info($id);
		if(isset($user_info) && $user_info->user_status!='I'){
			$data['msg']="You can not Activate your account again.";
            $this->load->view('backend/login/index',$data);
		}else{
			$status=array(
				'login_id'=>$id,
				'user_status'=>'A'
				);
			$activate=$this->login_model->activate_admin($status);
			
			$admin=array(
				'admin_id'=>$id,
				'admin_status'=>'A'
			);
			$admin_activate=$this->login_model->activate_admin_status($admin);
			
			if(isset($activate) && $activate && isset($admin_activate) && $admin_activate){
				$data['msg']="Account Activated Successfully! Login to continue.";
				$this->load->view('backend/login/index',$data);
			}else{
				$data['msg']="Account Already Activated or is Suspended!";
				$this->load->view('backend/login/index',$data);
			}
		}
	}
	/* Activate Admin Account End */
}