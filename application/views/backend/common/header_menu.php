<?php $onlines=$this->dashboard_model->all_onlines();

$admin_data=$this->dashboard_model->get_user_details($this->session->userdata('user_id'));
$num_messages=0;
$num_messages=$this->dashboard_model->all_messages($this->session->userdata('user_id'));

foreach($admin_data as $ad){

    $name=$ad->admin_first_name;
    $image=$ad->admin_image;
    $image_url=base_url("upload/".$ad->admin_image);
}

?>
<?php
$notifications = $this->dashboard_model->all_compliance_limit();
$pending=$this->dashboard_model->all_pending();
$i=0;
if(isset($notifications)&&$notifications){
foreach($notifications as $noti) {

    if (date('Y-m-d', strtotime($noti->c_valid_upto . "-" . $noti->c_primary_notif_period . " days")) <= date("Y-m-d")){


        $i++;
    }}}



?>
<?php
$notifications = $this->dashboard_model->all_compliance_limit();
$i=0;
if(isset($notifications)&&$notifications){
foreach($notifications as $noti) {

    if (date('Y-m-d', strtotime($noti->c_valid_upto . "-" . $noti->c_primary_notif_period . " days")) <= date("Y-m-d")){

?>
 <link href="assets/build/toastr.min.css" rel="stylesheet" type="text/css" />

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="assets/build/toastr.min.js"></script>

            <script type="text/javascript">


                window.setInterval(function(){


                    toastr.options = { "closeButton": true, "debug": false, "positionClass": "toast-bottom-right", "onclick": null, "showDuration": "5000", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut" }
                    toastr.warning('Renew Certificate <?php echo $noti->c_name ?>');
                    //sound
                    var audio = new Audio('assets/build/notification.mp3');
                    audio.play();
                }, <?php echo $noti->c_secondary_notif_period*60000 ?>);
            </script>
<?php
        $i++;
    }}}

?>
<?php
if(isset($pending)&&$pending){

    foreach($pending as $pend) {
        $booking_id_noti='HM0'.$this->session->userdata('user_hotel').'00'.$pend->booking_id;
        ?>

        <link href="assets/build/toastr.min.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="assets/build/toastr.min.js"></script>

        <script type="text/javascript">


            window.setInterval(function(){


                toastr.options = { "closeButton": true, "debug": false, "positionClass": "toast-bottom-right", "onclick": null, "showDuration": "10000", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut" }
                toastr.warning('<?php echo $booking_id_noti; ?> booking id goes to pending as customer has not checked in');
                //sound
                var audio = new Audio('assets/build/notification.mp3');
                audio.play();
            }, 1000*60*30);
        </script>
<?php

        $i=$i+1;
    }}
?>
<style>
.page-header.navbar .top-menu {
    margin: 0;
    padding: 0;
    float: right;
    width: 28%;
	margin-top:-51px !important;
}
@media only screen and (min-device-width:320px) and (max-device-width:479px) {
     .page-header.navbar .top-menu {
    margin: 0;
    padding: 0;
    float: right;
    width: 100%;
     margin-top: 0px !important; 
	 margin-right: 34px;
} 
.clint_logo{
width: 40% !important;
}
.page-quick-sidebar-open .page-quick-sidebar-wrapper {
    transition: right 0.3s;
    right: 0;
    margin-top: 84px;
}
    }
@media only screen and (min-device-width:480px) and (max-device-width:559px) {
     .page-header.navbar .top-menu {
    margin: 0;
    padding: 0;
    float: right;
    width: 100%;
     margin-top: 0px !important; 
	 margin-right: 0px;
} 
.clint_logo{
width: 40% !important;
}
.page-header.navbar .menu-toggler.responsive-toggler {
   
    float: left;
   
}
.page-quick-sidebar-open .page-quick-sidebar-wrapper {
    transition: right 0.3s;
    right: 0;
    margin-top: 84px;
    }
}

@media only screen and (min-device-width:768px) and (max-device-width:900px) {
    .page-header.navbar .top-menu {
    margin: 0;
    padding: 0;
    float: right;
    width: 43%;
    margin-top: -48px !important;
	margin-right: -46px;
}
.clint_logo{
width:18% !important;
}
.page-header.navbar .menu-toggler.responsive-toggler {
   
    
	padding-bottom:10px !important;
   
}
    }


</style>
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url();?>">
			<!--<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>-->
            <div class="logo-default" alt="Hotel Objects Logo">
            	<!--<h3><font color="#00FFFF">Hotel</font> <font color="#999900">Objects</font></h3>-->
				<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/img/logo-hotel.png" alt="logo" class="logo-default" style="                width: 275px; margin-top: -9px; margin-left: -42px;"/>
				
            </div>
			</a>
				
			<div class="menu-toggler sidebar-toggler hide">
			</div>
			
		</div>
									<!--<div style="margin:0 auto; width:5%;cursor:pointer;"onclick="offscrene()" id="cl_logo" cursor="pointer">
								 <img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/img/clint_logo.png" alt="logo" class="logo-default"  style=""  /> 
					
								
				   
							   </div>-->
							   
							   <!--<div class="inbld_input" id="in_cl_logo" style="margin:0 auto; width:5%; padding-top:10px; display:none;">
								
					
								<input type="file" id="in_cl_logo"/>

				   
							   </div>-->

								<div class="clint_logo" style="margin:0 auto; width:5%;cursor:pointer;"onclick="offscrene()" id="cl_logo" >

                                        <?php
                                        /*$form = array(
                                            'class'       => 'form-body', 
                                            'id'        => 'form',
                                            'method'      => 'post',

                                        );
                                        echo form_open_multipart('dashboard',$form);*/

                                        $details_hotel=$this->dashboard_model->get_hotel_details2($this->session->userdata('user_hotel'));

                                        foreach($details_hotel as $hot){
                                            if($hot->hotel_logo_images_thumb !=""){?>

                                                <label for="file-input">
                                                    <img src="<?php echo base_url();?>upload/hotel/<?php echo $hot->hotel_logo_images_thumb ?>" style="cursor:pointer;" />
                                                </label>

                                        <?php
                                            }
                                            else{?>

                                                <label for="file-input">
                                                    <img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/img/clint_logo.png" style="cursor:pointer;" />
                                                </label>

                                    <?php

                                            }
                                        }

                                        ?>




									<input id="file-input" name="hotel_image_upload" type="file" style=" display: none;"/>
                                  <!--  <input type="submit" value="Upload" >-->
                                    <?php //echo form_close(); ?>

                                </div>

<div class="clearfix"></div>
               
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <?php

                $notifications = $this->dashboard_model->all_compliance_limit();
                            ?>



				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default">
					<?php echo $i; ?></span>
					</a>
					<ul class="dropdown-menu">

                       <li class="external">
                        <h3><span class="bold"><?php echo $i; ?> pending</span> notifications</h3>
							<a href="#">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">

                                <?php
                                if(isset($notifications)&&$notifications):
                                foreach($notifications as $noti):

                                if(date('Y-m-d',strtotime($noti->c_valid_upto."-".$noti->c_primary_notif_period." days"))<=date("Y-m-d")):

                                ?>
								<li>
									<a href="<?php echo base_url(); ?>dashboard/edit_compliance?c_id=<?php echo $noti->c_id; ?>">
									<span class="time"><?php echo $noti->c_renewal; ?></span>
									<span class="details">
									<span class="label label-sm label-icon label-warning">
									<i class="fa fa-exclamation"></i>
									</span>
									<?php echo $noti->c_name ?> requires renewal</span>
									</a>
								</li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if(isset($pending)&&$pending){

                                foreach($pending as $pend) {
                                    $booking_id_noti = 'HM0' . $this->session->userdata('user_hotel') . '00' . $pend->booking_id;
                                    ?>
                                    <li>
                                        <a href="">
                                            <span class="time"><?php echo $booking_id_noti; ?></span>
									<span class="details">
									<span class="label label-sm label-icon label-warning">
									<i class="fa fa-exclamation"></i>
									</span>
                                        <?php echo $pend->cust_name ?>'s booking goes to pending <?php
                                        if($pend->booking_status_id_secondary ==9){
                                            echo "as payment is due";
                                        }else {
                                            echo " as he/she hasn't  checked in";
                                        }

                                        ?>.</span>
                                        </a>
                                    </li>
                                <?php
                                }}
                                ?>

							</ul>
						</li>
					</ul>
				</li>
                
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-envelope-open"></i>
					<span class="badge badge-default">
					<?php
                    $num_messages=0;
                    $num_messages=$this->dashboard_model->all_messages($this->session->userdata('user_id'));
                    $all_messages=$this->dashboard_model->all_messages_unseen($this->session->userdata('user_id'));
                    echo $num_messages; ?>
                    </span>
					</a>
					
					<ul class="dropdown-menu">
						<li class="external">
							<h3>You have <span class="bold"><?php echo $num_messages; ?> New</span> Messages</h3>
							<a href="#">view all</a>
                            <?php
                            if($num_messages !=0){

                                $soundfile = "assets/build/message.mp3";


echo "<embed src =\"$soundfile\" hidden=\"true\" autostart=\"true\"></embed>";
                            }
                            ?>
						</li>

                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">

                            <?php
                            if(isset($all_messages)&&$all_messages):
                                foreach($all_messages as $msg):


                                        ?>
                                        <li class=" dropdown dropdown-quick-sidebar-toggler">
                                            <a href="javascript:;" class="dropdown-toggle">
                                                <span class="time"></span>
									<span class="details">
									<span class="label label-sm label-icon label-warning">

									<i class="fa fa-envelope">


                                    </i>
                                        <?php
                                        $admin_details=$this->dashboard_model->get_admin($msg->u_from_id);
                                        foreach($admin_details as $det) {
                                            echo $det->admin_first_name;
                                        }
                                        ?>
									</span>
                                        <?php echo "     ".$msg->m_body ?></span>
                                            </a>
                                        </li>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
						
					</ul>
					
					<!--
					<ul class="dropdown-menu">
						<li class="external">
							<h3>You have <span class="bold">7 New</span> Messages</h3>
							<a href="#">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
								<li>
									<a href="#">
									<span class="photo">
									<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Lisa Wong </span>
									<span class="time">Just Now </span>
									</span>
									<span class="message">
									Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="photo">
									<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Richard Doe </span>
									<span class="time">16 mins </span>
									</span>
									<span class="message">
									Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="photo">
									<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Bob Nilson </span>
									<span class="time">2 hrs </span>
									</span>
									<span class="message">
									Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="photo">
									<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Lisa Wong </span>
									<span class="time">40 mins </span>
									</span>
									<span class="message">
									Vivamus sed auctor 40% nibh congue nibh... </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="photo">
									<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Richard Doe </span>
									<span class="time">46 mins </span>
									</span>
									<span class="message">
									Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li> -->
                
				<!-- END INBOX DROPDOWN -->
				<!-- BEGIN TODO DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
				
				<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-calendar"></i>
					
					<span class="badge badge-default"> 0 </span>
					</a>
					<ul class="dropdown-menu extended tasks">
						<li class="external">
							<h3>You have <span class="bold">0 pending</span> tasks</h3>
							<a href="#">view all</a>
						</li>
					</ul>
				</li>	

				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <?php if($this->session->userdata('user_type_slug')=="SUPA"):?>
					<img alt="" class="img-circle" src="<?php echo base_url();?>upload/user.png"/>
					<span class="username username-hide-on-mobile">
					Super Admin </span>
                    <?php endif;?>
                    <?php 
					$id=$this->session->userdata('user_id');
					$admin_info=$this->dashboard_model->admin_status($id);
					if($this->session->userdata('user_type_slug')=="AD" && isset($admin_info) && $admin_info):?>
					<img alt="" class="img-circle" src="<?php echo base_url();?>upload/<?php echo $admin_info->admin_image;?>"/>
					<span class="username username-hide-on-mobile">
					<?php echo $admin_info->admin_first_name;?> </span>
                    <?php endif;?>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo base_url();?>dashboard/profile">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-desktop"></i> My Theme </a>
						</li>
						<li>
							<a href="#">
							<i class="icon-calendar"></i> My Calendar </a>
						</li>
						<li>
							<a href="#">
							<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
							<?php echo $num_messages; ?></span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="<?php echo base_url();?>dashboard/lockscreen">
							<i class="icon-lock"></i> Lock Screen </a>
						</li>
						<li>
							<a href="<?php echo base_url();?>dashboard/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
                
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="page-quick-sidebar-wrapper">
		<div class="page-quick-sidebar">
			<div class="nav-justified">
				<ul class="nav nav-tabs nav-justified">
					<li class="active">
						<a href="#quick_sidebar_tab_1" data-toggle="tab">
						Users
                            <?php
                            $i=0;
                            if(isset($onlines) && $onlines): ?>
                            <?php foreach($onlines as $online):
                                   date_default_timezone_set('Asia/Kolkata');
                                   /* echo $online->online_from;
                                    echo  date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))-60*5);*/

                            $details=$this->dashboard_model->get_user_details($online->u_id);
                            ?>

                            <?php if(isset($details) && $details): ?>
                            <?php foreach($details as $d):

                                        $i++;

                            ?>
                            <?php
                            endforeach;
                            endif;
                                endforeach;
                            endif;
                            ?>
                            <span class="badge badge-danger"><?php echo $i; ?></span>
						</a>
					</li>
					<li>
						<a href="#quick_sidebar_tab_2" data-toggle="tab">
						Alerts <span class="badge badge-success">7</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						More<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-bell"></i> Alerts </a>
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-info"></i> Notifications </a>
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-speech"></i> Activities </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-settings"></i> Settings </a>
							</li>
						</ul>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
						<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
							<h3 class="list-heading">Staff</h3>
							<ul class="media-list list-items">
                                <?php if(isset($onlines) && $onlines): ?>
                                    <?php foreach($onlines as $online):

                                        $details=$this->dashboard_model->get_user_details($online->u_id);
                                        ?>

                                        <?php if(isset($details) && $details): ?>
                                        <?php foreach($details as $d):

                                            ?>
								<li class="media" onclick="return chat_fetch(<?php echo $d->admin_id; ?>,'<?php echo $d->admin_first_name; ?>','<?php echo base_url("upload/".$d->admin_image); ?>')">
									<div class="media-status">
										<span class="badge badge-success"><?php echo "1"; ?></span>
									</div>
									<img class="media-object" src="<?php echo base_url("upload/".$d->admin_image); ?>" alt="...">
									<div class="media-body">
										<h4 class="media-heading"><?php echo $d->admin_first_name." ".$d->admin_last_name ?></h4>
										<div class="media-heading-sub">
											 <?php
                                             if($d->admin_user_type==1){
                                                 echo "Super Admin";
                                             }
                                             else if($d->admin_user_type==2){
                                                 echo "Admin";
                                             }
                                             else if ($d->admin_user_type==3){
                                                 echo "Sub Admin";
                                             }
                                             else{
                                                 echo "Sub Admin";
                                             }
                                             $hot=$this->dashboard_model->get_hotel($d->admin_hotel);

                                             echo ": ".$hot->hotel_name;

                                             ?>
										</div>
									</div>
								</li>
                                <?php
                                endforeach;
                                endif;
                                    endforeach;
                                endif;
                                        ?>

							</ul>


						</div>
						<div class="page-quick-sidebar-item">
							<div class="page-quick-sidebar-chat-user">
								<div class="page-quick-sidebar-nav">
									<a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
								</div>
								<div class="page-quick-sidebar-chat-user-messages">

								</div>

								<div class="page-quick-sidebar-chat-user-form">
									<div class="input-group">
                                        <input type="hidden" name="to_id" id="u_id" value="">
                                        <input type="hidden" name="to_uname" id="u_name" value="">
                                        <input type="hidden" name="to_image" id="u_image" value="">
										<input type="text" id="msg_box" class="form-control" placeholder="Type a message here..." onkeypress="return send_message(event)">
										<div class="input-group-btn">
											<button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
						<div class="page-quick-sidebar-alerts-list">
							<h3 class="list-heading">General</h3>
							<ul class="feeds list-items">
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 4 pending tasks. <span class="label label-sm label-warning ">
													Take action <i class="fa fa-share"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 Just now
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Finance Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-danger">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-shopping-cart"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 New order received with <span class="label label-sm label-success">
													Reference Number: DR23923 </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 30 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-bell-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
													Overdue </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 2 hours
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-default">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 IPO Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
							</ul>
							<h3 class="list-heading">System</h3>
							<ul class="feeds list-items">
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 4 pending tasks. <span class="label label-sm label-warning ">
													Take action <i class="fa fa-share"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 Just now
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-danger">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Finance Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-default">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-shopping-cart"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 New order received with <span class="label label-sm label-success">
													Reference Number: DR23923 </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 30 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-warning">
													<i class="fa fa-bell-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
													Overdue </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 2 hours
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 IPO Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
					
		
			<!--	<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
						<div class="page-quick-sidebar-settings-list">
							<h3 class="list-heading">General Settings</h3>
							<ul class="list-items borderless">
								<li>
									 Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
							</ul>
							<h3 class="list-heading">System Settings</h3>
							<ul class="list-items borderless">
								<li>
									 Security Level
									<select class="form-control input-inline input-sm input-small">
										<option value="1">Normal</option>
										<option value="2" selected>Medium</option>
										<option value="e">High</option>
									</select>
								</li>
								<li>
									 Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
								</li>
								<li>
									 Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
								</li>
								<li>
									 Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
							</ul>
							<div class="inner-content">
								<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">



    function chat_fetch(id,name,image){
        //alert(name);
        document.getElementById("u_id").value=id;
        document.getElementById("u_name").value=name;
        document.getElementById("u_image").value=image;
    }

    function send_message(e) {
        if (e.keyCode == 13) {
           //alert("dada");

            var to= document.getElementById("u_id").value;
            var msg= document.getElementById("msg_box").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                //alert(xhttp.readyState);
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    //alert(xhttp.response);
                }
            };
            xhttp.open("GET", "dashboard/send_message?from=<?php echo $this->session->userdata('user_id'); ?>&to="+to+"&message="+msg+"", true);
            xhttp.send();


        }
    }


    /**
     Core script to handle the entire theme and core functions
     **/
    var QuickSidebar = function () {

        // Handles quick sidebar toggler
        var handleQuickSidebarToggler = function () {
            // quick sidebar toggler
            $('.top-menu .dropdown-quick-sidebar-toggler a, .page-quick-sidebar-toggler').click(function (e) {
                $('body').toggleClass('page-quick-sidebar-open');
            });
        };

        // Handles quick sidebar chats
        var handleQuickSidebarChat = function () {
            var wrapper = $('.page-quick-sidebar-wrapper');
            var wrapperChat = wrapper.find('.page-quick-sidebar-chat');

            var initChatSlimScroll = function () {
                var chatUsers = wrapper.find('.page-quick-sidebar-chat-users');
                var chatUsersHeight;

                chatUsersHeight = wrapper.height() - wrapper.find('.nav-justified > .nav-tabs').outerHeight();

                // chat user list
                Metronic.destroySlimScroll(chatUsers);
                chatUsers.attr("data-height", chatUsersHeight);
                Metronic.initSlimScroll(chatUsers);

                var chatMessages = wrapperChat.find('.page-quick-sidebar-chat-user-messages');
                var chatMessagesHeight = chatUsersHeight - wrapperChat.find('.page-quick-sidebar-chat-user-form').outerHeight() - wrapperChat.find('.page-quick-sidebar-nav').outerHeight();

                // user chat messages
                Metronic.destroySlimScroll(chatMessages);
                chatMessages.attr("data-height", chatMessagesHeight);
                Metronic.initSlimScroll(chatMessages);
            };

            initChatSlimScroll();
            Metronic.addResizeHandler(initChatSlimScroll); // reinitialize on window resize

            wrapper.find('.page-quick-sidebar-chat-users .media-list > .media').click(function () {
                wrapperChat.addClass("page-quick-sidebar-content-item-shown");
            });

            wrapper.find('.page-quick-sidebar-chat-user .page-quick-sidebar-back-to-list').click(function () {
                wrapperChat.removeClass("page-quick-sidebar-content-item-shown");
            });

            var handleChatMessagePost = function (e) {
                e.preventDefault();

                var chatContainer = wrapperChat.find(".page-quick-sidebar-chat-user-messages");
                var input = wrapperChat.find('.page-quick-sidebar-chat-user-form .form-control');

                var text = input.val();
                if (text.length === 0) {
                    return;
                }

                var preparePost = function(dir, time, name, avatar, message) {
                    var tpl = '';
                    tpl += '<div class="post '+ dir +'">';
                    tpl += '<img class="avatar" alt="" src="' + avatar +'"/>';
                    tpl += '<div class="message">';
                    tpl += '<span class="arrow"></span>';
                    tpl += '<a href="#" class="name">'+name+'</a>&nbsp;';
                    tpl += '<span class="datetime">' + time + '</span>';
                    tpl += '<span class="body">';
                    tpl += message;
                    tpl += '</span>';
                    tpl += '</div>';
                    tpl += '</div>';

                    return tpl;
                };

                // handle post
                var n=document.getElementById("u_name").value;
                var av=document.getElementById("u_image").value;
                var time = new Date();
                var message = preparePost('out', (time.getHours() + ':' + time.getMinutes()), '<?php echo $this->session->userdata('user_name'); ?>', '<?php echo  $image_url; ?>', text);
                message = $(message);
                chatContainer.append(message);

                var getLastPostPos = function() {
                    var height = 0;
                    chatContainer.find(".post").each(function() {
                        height = height + $(this).outerHeight();
                    });

                    return height;
                };

                chatContainer.slimScroll({
                    scrollTo: getLastPostPos()
                });

                input.val("");

                // simulate reply
               /* setTimeout(function(){

                    var preparePost = function(dir, time, name, avatar, message) {
                        var tpl = '';
                        tpl += '<div class="post '+ dir +'">';
                        tpl += '<img class="avatar" alt="" src="' + avatar +'"/>';
                        tpl += '<div class="message">';
                        tpl += '<span class="arrow"></span>';
                        tpl += '<a href="#" class="name">'+name+'</a>&nbsp;';
                        tpl += '<span class="datetime">' + time + '</span>';
                        tpl += '<span class="body">';
                        tpl += message;
                        tpl += '</span>';
                        tpl += '</div>';
                        tpl += '</div>';

                        return tpl;
                    };

                    var time = new Date();

                    var from= document.getElementById("u_id").value;

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        //alert(xhttp.readyState);
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            alert(xhttp.response);
                        }
                    };
                    xhttp.open("GET", "dashboard/get_message?to=<?php echo $this->session->userdata('user_id'); ?>&from="+from+"", true);
                    xhttp.send();

                   /* var message = preparePost('in', (time.getHours() + ':' + time.getMinutes()), 'dada', 'avatar2', 'Subha ipsum doloriam nibh...');
                    message = $(message);
                    chatContainer.append(message);*/

                 /*   chatContainer.slimScroll({
                        scrollTo: getLastPostPos()
                    });
                }, 1000);*/
            };

            wrapperChat.find('.page-quick-sidebar-chat-user-form .btn').click(handleChatMessagePost);
            wrapperChat.find('.page-quick-sidebar-chat-user-form .form-control').keypress(function (e) {
                if (e.which == 13) {
                    handleChatMessagePost(e);
                    return false;
                }
            });
        };

        // Handles quick sidebar tasks
        var handleQuickSidebarAlerts = function () {
            var wrapper = $('.page-quick-sidebar-wrapper');
            var wrapperAlerts = wrapper.find('.page-quick-sidebar-alerts');

            var initAlertsSlimScroll = function () {
                var alertList = wrapper.find('.page-quick-sidebar-alerts-list');
                var alertListHeight;

                alertListHeight = wrapper.height() - wrapper.find('.nav-justified > .nav-tabs').outerHeight();

                // alerts list
                Metronic.destroySlimScroll(alertList);
                alertList.attr("data-height", alertListHeight);
                Metronic.initSlimScroll(alertList);
            };

            initAlertsSlimScroll();
            Metronic.addResizeHandler(initAlertsSlimScroll); // reinitialize on window resize
        };

        // Handles quick sidebar settings
        var handleQuickSidebarSettings = function () {
            var wrapper = $('.page-quick-sidebar-wrapper');
            var wrapperAlerts = wrapper.find('.page-quick-sidebar-settings');

            var initSettingsSlimScroll = function () {
                var settingsList = wrapper.find('.page-quick-sidebar-settings-list');
                var settingsListHeight;

                settingsListHeight = wrapper.height() - wrapper.find('.nav-justified > .nav-tabs').outerHeight();

                // alerts list
                Metronic.destroySlimScroll(settingsList);
                settingsList.attr("data-height", settingsListHeight);
                Metronic.initSlimScroll(settingsList);
            };

            initSettingsSlimScroll();
            Metronic.addResizeHandler(initSettingsSlimScroll); // reinitialize on window resize
        };

        return {

            init: function () {
                //layout handlers
                handleQuickSidebarToggler(); // handles quick sidebar's toggler
                handleQuickSidebarChat(); // handles quick sidebar's chats
                handleQuickSidebarAlerts(); // handles quick sidebar's alerts
                handleQuickSidebarSettings(); // handles quick sidebar's setting
            }
        };

    }();

    //get message

    setInterval(function(){

        var wrapper = $('.page-quick-sidebar-wrapper');
        var wrapperChat = wrapper.find('.page-quick-sidebar-chat');

        var initChatSlimScroll = function () {
            var chatUsers = wrapper.find('.page-quick-sidebar-chat-users');
            var chatUsersHeight;

            chatUsersHeight = wrapper.height() - wrapper.find('.nav-justified > .nav-tabs').outerHeight();

            // chat user list
            Metronic.destroySlimScroll(chatUsers);
            chatUsers.attr("data-height", chatUsersHeight);
            Metronic.initSlimScroll(chatUsers);

            var chatMessages = wrapperChat.find('.page-quick-sidebar-chat-user-messages');
            var chatMessagesHeight = chatUsersHeight - wrapperChat.find('.page-quick-sidebar-chat-user-form').outerHeight() - wrapperChat.find('.page-quick-sidebar-nav').outerHeight();

            // user chat messages
            Metronic.destroySlimScroll(chatMessages);
            chatMessages.attr("data-height", chatMessagesHeight);
            Metronic.initSlimScroll(chatMessages);
        };

        initChatSlimScroll();
        Metronic.addResizeHandler(initChatSlimScroll); // reinitialize on window resize

        wrapper.find('.page-quick-sidebar-chat-users .media-list > .media').click(function () {
            wrapperChat.addClass("page-quick-sidebar-content-item-shown");
        });

        wrapper.find('.page-quick-sidebar-chat-user .page-quick-sidebar-back-to-list').click(function () {
            wrapperChat.removeClass("page-quick-sidebar-content-item-shown");
        });
        var chatContainer = wrapperChat.find(".page-quick-sidebar-chat-user-messages");

     var preparePost = function(dir, time, name, avatar, message) {
     var tpl = '';
     tpl += '<div class="post '+ dir +'">';
     tpl += '<img class="avatar" alt="" src="' + avatar +'"/>';
     tpl += '<div class="message">';
     tpl += '<span class="arrow"></span>';
     tpl += '<a href="#" class="name">'+name+'</a>&nbsp;';
     tpl += '<span class="datetime">' + time + '</span>';
     tpl += '<span class="body">';
     tpl += message;
     tpl += '</span>';
     tpl += '</div>';
     tpl += '</div>';

     return tpl;
     };

     var time = new Date();

     var from= document.getElementById("u_id").value;

     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
     //alert(xhttp.readyState);
     if (xhttp.readyState == 4 && xhttp.status == 200) {
    // alert(xhttp.response);

         var u_id=document.getElementById("u_id").value;
         var u_name=document.getElementById("u_name").value;
         var u_image=document.getElementById("u_image").value;
       if(xhttp.response!="") {
           var message = preparePost('in', (time.getHours() + ':' + time.getMinutes()), '' + u_name + '', '' + u_image + '', '' + xhttp.response + '');
           //alert(message);



           message = $(message);
           chatContainer.append(message);
       }
     }
     };
     xhttp.open("GET", "dashboard/get_message?to=<?php echo $this->session->userdata('user_id'); ?>&from="+from+"", true);
     xhttp.send();
        var getLastPostPos = function() {
            var height = 0;
            chatContainer.find(".post").each(function() {
                height = height + $(this).outerHeight();
            });

            return height;
        };


      chatContainer.slimScroll({
     scrollTo: getLastPostPos()
     });
     }, 1000);

function offscrene()
{
	document.getElementById('in_cl_logo').style.display= 'block';
	document.getElementById('cl_logo').style.display= 'none';
}


    </script>