<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
	
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                
				<li class="sidebar-search-wrapper">
					<form class="sidebar-search " action="#" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					
				</li>
                
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
				<li <?php if(isset($heading) && $heading=='Dashboard'):?> class="start active open" <?php endif;?>>
					<a href="<?php echo base_url();?>dashboard">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
                    <?php if(isset($active) && $active=='dashboard'):?>
					<span class="selected"></span>
                    <?php endif;?>
					<!--<span class="arrow open"></span>-->
					</a>
					<!--<ul class="sub-menu">
						<li class="active">
							<a href="#">
							<i class="icon-bar-chart"></i>
							Default Dashboard</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-bulb"></i>
							New Dashboard #1</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-graph"></i>
							New Dashboard #2</a>
						</li>
					</ul>-->
				</li>
               
                <!--<li <?php if(isset($heading) && $heading=='Permissions'):?> class="start active open" <?php endif;?>>
					<a href="javascript:;">
					<i class="fa fa-diamond"></i>
					<span class="title">Permissions</span>
                    <?php if(isset($active) && ($active=='add_permission' || $active=='all_permissions')):?>
					<span class="selected"></span>
                    <?php endif;?>
					<span class="arrow <?php if(isset($active) && ($active=='add_permission' || $active=='all_permissions')) echo 'open';?>"></span>
					</a>
					<ul class="sub-menu">
						<li <?php if(isset($active) && $active=='add_permission') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/add_permission">
							<i class="fa fa-plus-square"></i>
							Add Permission</a>
						</li>
                        <li <?php if(isset($active) && $active=='all_permissions') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/all_permissions">
							<i class="fa fa-check-square"></i>
							All Permissions</a>
						</li>
					</ul>
				</li>-->
                
               <!--
                <li <?php if(isset($heading) && $heading=='Hotel'):?> class="start active open" <?php endif;?>>
					<a href="javascript:;">
					<i class="fa fa-hotel"></i>
					<span class="title">Hotel</span>
                    <?php if(isset($active) && ($active=='add_hotel' || $active=='all_hotels')):?>
					<span class="selected"></span>
                    <?php endif;?>
					<span class="arrow <?php if(isset($active) && ($active=='add_hotel' || $active=='all_hotels')) echo 'open';?>"></span>
					</a>
					<ul class="sub-menu">
						<li <?php if(isset($active) && $active=='add_hotel') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/add_hotel">
							<i class="fa fa-hotel"></i>
							Add Hotel</a>
						</li>
                        <li <?php if(isset($active) && $active=='all_hotels') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/all_hotels">
							<i class="fa fa-hotel"></i>
							All Hotels</a>
						</li>
					</ul>
				</li>
                -->

                <?php if($this->session->userdata('user_type_slug')=="SUPA" || $this->session->userdata('user_type_slug')=="AD"):  ?>
                    <?php if($this->session->userdata('admin') =="1"):  ?>
                <li <?php if(isset($heading) && $heading=='Admin'):?> class="start active open" <?php endif;?>>
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Admin</span>
                    <?php if(isset($active) && ($active=='add_admin' || $active=='all_admin')):?>
					<span class="selected"></span>
                    <?php endif;?>
					<span class="arrow <?php if(isset($active) && ($active=='add_admin' || $active=='all_admin')) echo 'open';?>"></span>
					</a>
					<ul class="sub-menu">
                        <?php if($this->session->userdata('user_type_slug')=="SUPA") :  ?>
						<li <?php if(isset($active) && $active=='add_admin') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/add_admin">
							<i class="icon-user-follow"></i>
							Add Admin</a>
						</li>
                        <?php else:  ?>
                        <li <?php if(isset($active) && $active=='add_admin') echo "class='active'";?>>
                            <a href="<?php echo base_url();?>dashboard/add_admin">
                                <i class="icon-user-follow"></i>
                                Add Subadmin</a>
                        </li>
                        <?php endif; ?>
					</ul>
				</li>
                <?php endif; ?>
                <?php endif; ?>




                <?php if($this->session->userdata('room') =='1'):  ?>
                <li <?php if(isset($heading) && $heading=='Room'):?> class="start active open" <?php endif;?>>
					<a href="javascript:;">
					<i class="glyphicon glyphicon-bed"></i>
					<span class="title">Room</span>
                    <?php if(isset($active) && ($active=='add_room' || $active=='all_rooms')):?>
					<span class="selected"></span>
                    <?php endif;?>
					<span class="arrow <?php if(isset($active) && ($active=='add_room' || $active=='all_rooms')) echo 'open';?>"></span>
					</a>
					<ul class="sub-menu">
						<li <?php if(isset($active) && $active=='add_room') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/add_room">
							<i class="glyphicon glyphicon-bed"></i>
							Add Room </a>
						</li>
                        <li <?php if(isset($active) && $active=='all_rooms') echo "class='active'";?>>
							<a href="<?php echo base_url();?>dashboard/all_rooms">
							<i class="glyphicon glyphicon-bed"></i>
							All Rooms</a>
						</li>
                        <li <?php if(isset($active) && $active=='all_rooms') echo "class='active'";?>>
                            <a href="<?php echo base_url();?>dashboard/unit_type">
                                <i class="glyphicon glyphicon-bed"></i>
                                Unit Type</a>
                        </li>
					</ul>
				</li>
                <?php endif; ?>

                <?php if($this->session->userdata('booking') =='1'):  ?>
                    <li <?php if(isset($heading) && $heading=='Booking'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-archive"></i>
                            <span class="title">Booking</span>
                            <?php if(isset($active) && ($active=='add_booking' || $active=='add_booking_calendar' || $active=='all_bookings' )):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_booking' || $active=='add_booking_calendar' || $active=='all_bookings')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">
                           <!-- <li <?php if(isset($active) && $active=='add_booking') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_booking">
                                    <i class="fa fa-archive"></i>
                                    Add Booking</a>
                            </li> -->
							<li <?php if(isset($active) && $active=='add_booking_calendar') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_booking_calendar">
                                    <i class="fa fa-archive"></i>
                                    Frontdesk</a>
                            </li>
                            <li <?php if(isset($active) && $active=='all_bookings') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_bookings">
                                    <i class="fa fa-file-archive-o"></i>
                                    All Bookings</a>
                            </li>
							 <!--<li <?php if(isset($active) && $active=='booking_edit') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/booking_edit">
                                    <i class="fa fa-file-archive-o"></i>
                                    Booking Edit</a>
                            </li>-->
                        </ul>
                    </li>
                <?php endif; ?>


                <?php if($this->session->userdata('transaction') =='1'):  ?>
                    <li <?php if(isset($heading) && $heading=='Transaction'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-money"></i>
                            <span class="title">Transaction</span>
                            <?php if(isset($active) && ($active=='add_transaction' || $active=='all_transactions')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_transaction' || $active=='all_transactions')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if(isset($active) && $active=='add_transaction') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_transaction">
                                    <i class="fa fa-money"></i>
                                    Add Transaction</a>
                            </li>
                            <li <?php if(isset($active) && $active=='all_transactions') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_transactions">
                                    <i class="fa fa-file-archive-o"></i>
                                    All Transactions</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if($this->session->userdata('compliance') =='1'):  ?>
                    <li <?php if(isset($heading) && $heading=='Compliance'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-check-square-o"></i>
                            <span class="title">Compliance System</span>
                            <?php if(isset($active) && ($active=='add_compliance' || $active=='all_compliance')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_compliance' || $active=='all_compliance')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if(isset($active) && $active=='add_compliance') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_compliance">
                                    <i class="fa fa-pencil"></i>
                                    Add Certificate</a>
                            </li>
							<li <?php if(isset($active) && $active=='all_compliance') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_compliance">
                                    <i class="fa fa-file-archive-o"></i>
                                   Show all Certificates</a>
                            </li>
                        
							
							
                        </ul>
                    </li>
                <?php endif; ?>
                

                    <!--<li <?php if(isset($heading) && $heading=='HR Management'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span class="title">HR Management</span>
                            <?php if(isset($active) && ($active=='add_hrm' || $active=='all_hrm')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_hrm' || $active=='all_hrm')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if(isset($active) && $active=='add_hrm') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_hrm">
                                    <i class="fa fa-pencil"></i>
                                    Add Employee</a>
                            </li>
							<li <?php if(isset($active) && $active=='all_hrm') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_hrm">
                                    <i class="fa fa-file-archive-o"></i>
                                   View All Employee</a>
                            </li>
                        
							
							
                        </ul>
                    </li>-->
                <?php if($this->session->userdata('hotel_m') =='1'):  ?>

                    <li <?php if(isset($heading) && $heading=='Hotel Management'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-university"></i>
                            <span class="title">Hotel Management</span>
                            <?php if(isset($active) && ($active=='add_hotel_m' || $active=='all_hotel_m')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_hotel_m' || $active=='all_hotel_m')) echo 'open';?>"></span>
                        </a>

                        <ul class="sub-menu">

                            <?php if($this->session->userdata('user_type_slug')=="SUPA"):  ?>

                            <li <?php if(isset($active) && $active=='add_hotel_m') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_hotel_m">
                                    <i class="fa fa-pencil"></i>
                                    Add Hotels</a>
                            </li>
                            <?php endif; ?>

							<li <?php if(isset($active) && $active=='all_hotel_m') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_hotel_m">
                                    <i class="fa fa-file-archive-o"></i>
                                   View Hotels</a>
                            </li>	
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if($this->session->userdata('guest') =='1'):  ?>
                    <li <?php if(isset($heading) && $heading=='Guests'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-user-plus"></i>
                            <span class="title">Guest</span>
                            <?php if(isset($active) && ($active=='add_guest' || $active=='all_guest')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_guest' || $active=='all_guest')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if(isset($active) && $active=='add_guest') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_guest">
                                    <i class="fa fa-pencil"></i>
                                    Add Guest</a>
                            </li>
							<li <?php if(isset($active) && $active=='all_guest') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_guest">
                                    <i class="fa fa-file-archive-o"></i>
                                   View Guests</a>
                            </li>	
                        </ul>
                    </li>

                <?php endif; ?>

                <?php if($this->session->userdata('broker') =='1'):  ?>
                    <li <?php if(isset($heading) && $heading=='Broker'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-user-plus"></i>
                            <span class="title">Broker</span>
                            <?php if(isset($active) && ($active=='add_broker' || $active=='all_broker')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_broker' || $active=='all_broker')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if(isset($active) && $active=='add_broker') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/add_broker">
                                    <i class="fa fa-pencil"></i>
                                    Add Broker</a>
                            </li>
							<li <?php if(isset($active) && $active=='all_broker') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_broker">
                                    <i class="fa fa-file-archive-o"></i>
                                   View Broker</a>
                            </li>
							<li <?php if(isset($active) && $active=='broker_payments') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/broker_payments">
                                    <i class="fa fa-file-archive-o"></i>
                                   Broker Payments</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li <?php if(isset($heading) && $heading=='Events'):?> class="start active open" <?php endif;?>>
                    <a href="javascript:;">
                        <i class="fa fa-anchor"></i>
                        <span class="title">Events</span>
                        <?php if(isset($active) && ($active=='add_event' || $active=='all_events')):?>
                            <span class="selected"></span>
                        <?php endif;?>
                        <span class="arrow <?php if(isset($active) && ($active=='add_event' || $active=='all_events')) echo 'open';?>"></span>
                    </a>
                    <ul class="sub-menu">

                        <li <?php if(isset($active) && $active=='all_reports') echo "class='active'";?>>
                            <a href="<?php echo base_url();?>dashboard/add_event">
                                <i class="fa fa-file-archive-o"></i>
                                Add an Event</a>
                        </li>
                        <li <?php if(isset($active) && $active=='all_reports') echo "class='active'";?>>
                            <a href="<?php echo base_url();?>dashboard/all_events">
                                <i class="fa fa-file-archive-o"></i>
                                All Events</a>
                        </li>
                    </ul>
                </li>


                    <li <?php if(isset($heading) && $heading=='Reports'):?> class="start active open" <?php endif;?>>
                        <a href="javascript:;">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="title">Reports</span>
                            <?php if(isset($active) && ($active=='add_report' || $active=='all_reports')):?>
                                <span class="selected"></span>
                            <?php endif;?>
                            <span class="arrow <?php if(isset($active) && ($active=='add_report' || $active=='all_reports')) echo 'open';?>"></span>
                        </a>
                        <ul class="sub-menu">

                            <li <?php if(isset($active) && $active=='all_reports') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_reports">
                                    <i class="fa fa-file-archive-o"></i>
                                    Customer Report</a>
                            </li>
							<li <?php if(isset($active) && $active=='all_reports') echo "class='active'";?>>
                                <a href="<?php echo base_url();?>dashboard/all_f_reports">
                                    <i class="fa fa-file-archive-o"></i>
                                    Daily Financial Reports</a>
                            </li>
                        </ul>
                    </li>
                <li <?php if(isset($heading) && $heading=='Feedback'):?> class="start active open" <?php endif;?>>
                    <a href="javascript:;">
                        <i class="fa fa-newspaper-o"></i>
                        <span class="title">Feedback</span>
                        <?php if(isset($active) && ($active=='add_report' || $active=='all_reports')):?>
                            <span class="selected"></span>
                        <?php endif;?>
                        <span class="arrow <?php if(isset($active) && ($active=='add_report' || $active=='all_reports')) echo 'open';?>"></span>
                    </a>
                    <ul class="sub-menu">

                        <li <?php if(isset($active) && $active=='all_reports') echo "class='active'";?>>
                            <a href="<?php echo base_url();?>dashboard/add_feedback">
                                <i class="fa fa-file-archive-o"></i>
                                Add Feedback</a>
                        </li>
                        <li <?php if(isset($active) && $active=='all_reports') echo "class='active'";?>>
                            <a href="<?php echo base_url();?>dashboard/all_feedback">
                                <i class="fa fa-file-archive-o"></i>
                                All Feedback</a>
                        </li>
                    </ul>
                </li>



              
                <!--
				<li>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">eCommerce</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<i class="icon-home"></i>
							Dashboard</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-basket"></i>
							Orders</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-tag"></i>
							Order View</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-handbag"></i>
							Products</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">Page Layouts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Horizontal & Sidebar Menu</a>
						</li>
						<li>
							<a href="#">
							Dashboard & Mega Menu</a>
						</li>
						<li>
							<a href="#">
							Horizontal Mega Menu 1</a>
						</li>
						<li>
							<a href="#">
							Horizontal Mega Menu 2</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
						</li>
						<li>
							<a href="#">
							Layout with Glyphicon</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-success">new</span>Full Height Portlet</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
						</li>
						<li>
							<a href="#">
							Search Box On Header 1</a>
						</li>
						<li>
							<a href="#">
							Search Box On Header 2</a>
						</li>
						<li>
							<a href="#">
							Sidebar Search Option 1</a>
						</li>
						<li>
							<a href="#">
							Sidebar Search Option 2</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-warning">new</span>Right Sidebar Page</a>
						</li>
						<li>
							<a href="#">
							Sidebar Fixed Page</a>
						</li>
						<li>
							<a href="#">
							Sidebar Closed Page</a>
						</li>
						<li>
							<a href="#">
							Content Loading via Ajax</a>
						</li>
						<li>
							<a href="#">
							Disabled Menu Links</a>
						</li>
						<li>
							<a href="#">
							Blank Page</a>
						</li>
						<li>
							<a href="#">
							Boxed Page</a>
						</li>
						<li>
							<a href="#">
							Language Switch Bar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">UI Features</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							General Components</a>
						</li>
						<li>
							<a href="#">
							Buttons</a>
						</li>
						<li>
							<a href="#">
							Popover Confirmations</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>Font Icons</a>
						</li>
						<li>
							<a href="#">
							Flat UI Colors</a>
						</li>
						<li>
							<a href="#">
							Typography</a>
						</li>
						<li>
							<a href="#">
							Tabs, Accordions & Navs</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>Tree View</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-warning">new</span>Page Progress Bar</a>
						</li>
						<li>
							<a href="#">
							Block UI</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-warning">new</span>Bootstrap Growl Notifications</a>
						</li>
						<li>
							<a href="#">
							Notific8 Notifications</a>
						</li>
						<li>
							<a href="#">
							Toastr Notifications</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>Alerts & Dialogs API</a>
						</li>
						<li>
							<a href="#">
							Session Timeout</a>
						</li>
						<li>
							<a href="#">
							User Idle Timeout</a>
						</li>
						<li>
							<a href="#">
							Modals</a>
						</li>
						<li>
							<a href="#">
							Extended Modals</a>
						</li>
						<li>
							<a href="#">
							Tiles</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-success">new</span>Date Paginator</a>
						</li>
						<li>
							<a href="#">
							Nestable List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">UI Components</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Date & Time Pickers</a>
						</li>
						<li>
							<a href="#">
							Context Menu</a>
						</li>
						<li>
							<a href="#">
							Custom Dropdowns</a>
						</li>
						<li>
							<a href="#">
							Form Widgets & Tools</a>
						</li>
						<li>
							<a href="#">
							Form Widgets & Tools 2</a>
						</li>
						<li>
							<a href="#">
							Markdown & WYSIWYG Editors</a>
						</li>
						<li>
							<a href="#">
							Ion Range Sliders</a>
						</li>
						<li>
							<a href="#">
							NoUI Range Sliders</a>
						</li>
						<li>
							<a href="#">
							jQuery UI Sliders</a>
						</li>
						<li>
							<a href="#">
							Knob Circle Dials</a>
						</li>
					</ul>
				</li>
				
				<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
					<a href="angularjs" target="_blank">
					<i class="icon-paper-plane"></i>
					<span class="title">
					AngularJS Version </span>
					</a>
				</li>
				
				<li class="heading">
					<h3 class="uppercase">Features</h3>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">Form Stuff</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>Material Design<br>
							Form Controls</a>
						</li>
						<li>
							<a href="#">
							Bootstrap<br>
							Form Controls</a>
						</li>
						<li>
							<a href="#">
							iCheck Controls</a>
						</li>
						<li>
							<a href="#">
							Form Layouts</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
						</li>
						<li>
							<a href="#">
							Form Wizard</a>
						</li>
						<li>
							<a href="#">
							Form Validation</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>Image Cropping</a>
						</li>
						<li>
							<a href="#">
							Multiple File Upload</a>
						</li>
						<li>
							<a href="#">
							Dropzone File Upload</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Data Tables</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Basic Datatables</a>
						</li>
						<li>
							<a href="#">
							Tree Datatables</a>
						</li>
						<li>
							<a href="#">
							Responsive Datatables</a>
						</li>
						<li>
							<a href="#">
							Managed Datatables</a>
						</li>
						<li>
							<a href="#">
							Editable Datatables</a>
						</li>
						<li>
							<a href="#">
							Advanced Datatables</a>
						</li>
						<li>
							<a href="#">
							Ajax Datatables</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-wallet"></i>
					<span class="title">Portlets</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							General Portlets</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>New Portlets #1</a>
						</li>
						<li>
							<a href="#">
							<span class="badge badge-roundless badge-danger">new</span>New Portlets #2</a>
						</li>
						<li>
							<a href="#">
							Ajax Portlets</a>
						</li>
						<li>
							<a href="#">
							Draggable Portlets</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-bar-chart"></i>
					<span class="title">Charts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							amChart</a>
						</li>
						<li>
							<a href="#">
							Flotchart</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Pages</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<i class="icon-paper-plane"></i>
							<span class="badge badge-warning">2</span>New Timeline</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-user-following"></i>
							<span class="badge badge-success badge-roundless">new</span>New User Profile</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-check"></i>
							Todo</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-envelope"></i>
							<span class="badge badge-danger">4</span>Inbox</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-question"></i>
							FAQ</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-calendar"></i>
							<span class="badge badge-danger">14</span>Calendar</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-flag"></i>
							Coming Soon</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-speech"></i>
							Blog</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-link"></i>
							Blog Post</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-eye"></i>
							<span class="badge badge-success">9</span>News</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-bell"></i>
							News View</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-paper-plane"></i>
							<span class="badge badge-warning">2</span>Old Timeline</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-user"></i>
							Old User Profile</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-present"></i>
					<span class="title">Extra</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							About Us</a>
						</li>
						<li>
							<a href="#">
							Contact Us</a>
						</li>
						<li>
							<a href="#">
							Search Results</a>
						</li>
						<li>
							<a href="#">
							Invoice</a>
						</li>
						<li>
							<a href="#">
							Portfolio</a>
						</li>
						<li>
							<a href="#">
							Pricing Tables</a>
						</li>
						<li>
							<a href="#">
							404 Page Option 1</a>
						</li>
						<li>
							<a href="#">
							404 Page Option 2</a>
						</li>
						<li>
							<a href="#">
							404 Page Option 3</a>
						</li>
						<li>
							<a href="#">
							500 Page Option 1</a>
						</li>
						<li>
							<a href="#">
							500 Page Option 2</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-folder"></i>
					<span class="title">Multi Level Menu</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
							<i class="icon-settings"></i> Item 1 <span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="javascript:;">
									<i class="icon-user"></i>
									Sample Link 1 <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#"><i class="icon-power"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-star"></i> Sample Link 1</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-camera"></i> Sample Link 1</a>
								</li>
								<li>
									<a href="#"><i class="icon-link"></i> Sample Link 2</a>
								</li>
								<li>
									<a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-globe"></i> Item 2 <span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#"><i class="icon-tag"></i> Sample Link 1</a>
								</li>
								<li>
									<a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
								</li>
								<li>
									<a href="#"><i class="icon-graph"></i> Sample Link 1</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
							<i class="icon-bar-chart"></i>
							Item 3 </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Login Options</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Login Form 1</a>
						</li>
						<li>
							<a href="#">
							Login Form 2</a>
						</li>
						<li>
							<a href="#">
							Login Form 3</a>
						</li>
						<li>
							<a href="#">
							Login Form 4</a>
						</li>
						<li>
							<a href="#">
							Lock Screen 1</a>
						</li>
						<li>
							<a href="#">
							Lock Screen 2</a>
						</li>
					</ul>
				</li>
				<li class="heading">
					<h3 class="uppercase">More</h3>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-logout"></i>
					<span class="title">Quick Sidebar</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Push Content</a>
						</li>
						<li>
							<a href="#">
							Over Content</a>
						</li>
						<li>
							<a href="#">
							Over Content & Transparent</a>
						</li>
						<li>
							<a href="#">
							Boxed Layout</a>
						</li>
					</ul>
				</li>

				<li class="last ">
					<a href="javascript:;">
					<i class="icon-pointer"></i>
					<span class="title">Maps</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Google Maps</a>
						</li>
						<li>
							<a href="#">
							Vector Maps</a>
						</li>
					</ul>
				</li>
                -->
            
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->