<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_common
 *
 * @author sekhar
 */
class mod_common  extends CI_Model  {
    //put your code here
    function __construct()
    {
        parent::__construct();
    }
    function display_admin($templatename,$data=  array())
    {
        $this->load->view('backend/common/header',$data);
		$this->load->view('backend/common/header_menu',$data);
		$this->load->view('backend/common/side_menu',$data);
		$this->load->view('backend/common/customizer',$data);
		$this->load->view($templatename,$data);
		$this->load->view('backend/common/quick_sidebar',$data);
		$this->load->view('backend/common/footer_text',$data);
		$this->load->view('backend/common/footer',$data);
    }
    function encrypt($text)
    {
        return base64_encode($text);
    }
    function decrypt($text)
    {
        return base64_decode($text);
    }
    function gccrud_output($input)
    {
        //print_r($input);
        //ob_start();
        $this->load->view('gcblank.php',$input);
       // $output = ob_get_contents();
      //  ob_end_clean();
       // return $output;
    }
    function update($condition,$table,$value)
    {
     return   $this->db->where($condition)->update($table,$value);
    }
    
}
