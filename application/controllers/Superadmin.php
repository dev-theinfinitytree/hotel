<?php
/*
  Created by PhpStorm.
 User: subhabrata
 Date: 11/11/2015
 Time: 12:08 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

    function index()
    {
        $data['hotels'] = $this->dashboard_model->total_hotels();
        $this->load->view('backend/superadmin/index', $data);
    }

    function redirect(){
		
		/*$alls=$this->dashboard_model->total_hotels();
		foreach($alls as $hot){
			
			if(isset($this->input->post('user_hotel'.$hot->hotel_id))){
				$target=$hot->hotel_id;
				
			}
		}*/
		

        $userdata=array(
            //'user_type'=> $user_type_data->user_type_name,

            'user_hotel'=>$this->input->post('user_hotel'),

        );
        //print_r($userdata);
        //exit();
        $this->session->set_userdata($userdata);
        redirect('dashboard');
    }

}