
<div id="master">
<?php
date_default_timezone_set('Asia/Kolkata');
$this->load->view('backend/common/header');
$this->load->view('backend/common/header_menu');
$this->load->view('backend/common/side_menu');
$this->load->view('backend/common/customizer');
$this->load->view($page);
$this->load->view('backend/common/quick_sidebar');
$this->load->view('backend/common/footer_text');
$this->load->view('backend/common/footer');
date_default_timezone_set('Asia/Kolkata');


/*if($_SESSION['loginTime'] < time()+60){
    $this->dashboard_model->remove_online($this->session->userdata('user_id'));
    $this->session->sess_destroy();
    redirect('login/logged_out');


}else{
    $_SESSION['loginTime'] = time();
}*/


?>
    </div>
<!--<script type = "text/javascript" > $(document).keydown(function(e) { var element = e.target.nodeName.toLowerCase(); if (e.keyCode === 8) { return false; } }); </script>-->

<script>
/*setTimeout(onUserInactivity, 1000*60*5  )
function onUserInactivity() {
   window.location.href = "<?php echo base_url() ?>dashboard/lockscreen"
}*/
</script>