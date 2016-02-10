<!---->
					<!--<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Theme Style </span>
						<select class="layout-style-option form-control input-sm">
							<option value="square" selected="selected">Square corners</option>
							<option value="rounded">Rounded corners</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>-->
					
<style>
.long{
	width:100%;
	
	background:white;
	margin-bottom:30px;
}
/**********khatnir kaj (1/12/30)************/
			
			.scheduler_default_corner div  div:first-child {
			 
				   
 
    /* position: absolute !important; */
    top: 0px !important;
    /* color: #fdfdfd; */
    /* padding: 0px !important; */
    color: black;
    /* width: 100% !important; */
			}
    .scheduler_default_corner div  div:last-child {
			 
				   
 
    
    /* position: absolute !important; */
    /* right: -53px; */
    /* width: 100% !important; */
			}	
			
			
			.scheduler_default_corner div:last-child{
   
    /*z-index: 999999999;*/
    height: 0px;
    position: absolute !important;
    width: 100%;
    /* opacity: 0; */
    top: -21px !important;
    /* background: #FFFFFF; */
    /* margin-top: 0px; */
    /* color: #fdfdfd; */
    /* padding: 0px !important; */
    /* color: red; */
}
.form-group{
	padding-bottom:10px!important;
}
</style>	


 
	
					
					<!----><div class="alert alert-info text-center" role="alert">
<div class="page-toolbar">
					
   <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php $guest=0; ?>
                               <?php if(isset($bookings) && $bookings):
                                    $i=0;
								
                                    $deposit=0;

                                    foreach($bookings as $booking):
                                if($booking->user_id==$this->session->userdata('user_id') && $booking->booking_status_id==5):


                                        $rooms=$this->dashboard_model->get_room_number($booking->room_id);
                                        foreach($rooms as $room):



                                            if($room->hotel_id==$this->session->userdata('user_hotel')):

                                                $date1=date_create($booking->cust_from_date);
                                                $date2=date_create($booking->cust_end_date);
                                                $current_date= new DateTime('now');
                                                $diff=date_diff($current_date, $date1);

                                                if($date1 <=$current_date && $date2>=$current_date):
												
												$guest=$guest+$booking->no_of_guest;






                                                ?>


                                                <?php $i++;?>
                                                    <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif;?>
                                <?php echo $guest; ?>

							</div>
							<div class="desc">
								 Total Guests At Presnt
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>dashboard/all_reports">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-inr"></i>
						</div>
						<div class="details">
							<div class="number">
                                <?php $revenue=0; ?>

                               <?php /* <?php if(isset($bookings) && $bookings):
                                    $i=1;
                                    $deposit=0;
									$revenue=0;
                                    foreach($bookings as $booking):
                                        if($booking->user_id==$this->session->userdata('user_id')):

                                        $rooms=$this->dashboard_model->get_room_number($booking->room_id);
                                        foreach($rooms as $room):

                                            if($room->hotel_id==$this->session->userdata('user_hotel')):





                                                /*Calculation start 
                                                $room_number=$room->room_no;
                                                $room_cost=$room->room_rent;
                                                /* Find Duration 
                                                $date1=date_create($booking->cust_from_date);
                                                $date2=date_create($booking->cust_end_date);
                                                $diff=date_diff($date1, $date2);
                                                $cust_duration= $diff->format("%a");

                                                /*Cost Calculations
                                                $total_cost=$cust_duration*$room_cost;
                                                $total_cost=$total_cost+$total_cost*0.15;

                                               $revenue=$revenue+$total_cost;
                                               $due=$total_cost-$booking->cust_payment_initial-$deposit;


                                                /*Calculation End 


                                                $class = ($i%2==0) ? "active" : "success";

                                                //$booking_id='HM0'.$this->session->userdata('user_hotel').'00'.$booking->booking_id;
                                                ?>


                                                <?php $i++;?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                            <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif;?>

                                <?php echo "Rs  ".$revenue; ?> */ ?>
                                <?php //echo "Rs  ".$unique_room_bookings; ?>
								<?php 
								$revenue=0;
								
								foreach($unique_room_bookings as $row)
								{
									if($row->t_amount!=''){
									echo $row->t_amount;
									}
									else{
										echo 0;
									}
								}
								
									?>
                            </div>
							<div class="desc">
								 Total Revenue
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>dashboard/all_f_reports">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-book"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php $i=0; ?>
                                <?php if(isset($bookings) && $bookings):
                                    $i=0;
                                    $deposit=0;
                                date_default_timezone_set('Asia/Kolkata');

                                    foreach($bookings as $booking):
                                if($booking->user_id==$this->session->userdata('user_id')):


                                        $rooms=$this->dashboard_model->get_room_number($booking->room_id);
                                        foreach($rooms as $room):



                                            if($room->hotel_id==$this->session->userdata('user_hotel')):

                                                //$date1=date_create($booking->cust_from_date);
                                                $date1=date("Y-m-d",strtotime($booking->cust_from_date));
                                                $date2=date("Y-m-d",strtotime($booking->cust_end_date));
                                                $current_date= date("Y-m-d");
                                                //$diff=date_diff($current_date, $date1);

                                                if($date1 >$current_date):
                                                    


                                                ?>


                                                <?php $i++;?>
                                                    <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif;?>
                                <?php echo $i; ?>

                            </div>
							<div class="desc">
								 New Bookings
							</div>
						</div>
						<a class="more" href="javascript:;">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-building"></i>
						</div>
						<div class="details">
							<div class="number">
                                <?php if(isset($unique_room_bookings) && $bookings):
                                    $i=0;
                                    $deposit=0;

                                    foreach($bookings as $booking):


                                        $rooms=$this->dashboard_model->get_room_number($booking->room_id);
                                        foreach($rooms as $room):



                                            if($room->hotel_id==$this->session->userdata('user_hotel')):

                                                $date1=date_create($booking->cust_from_date);
                                                $date2=date_create($booking->cust_end_date);
                                                $current_date= new DateTime('now');


                                                if($date1 <=$current_date && $date2>=$current_date):




                                                    ?>


                                                    <?php $i++;?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                <?php endif;?>

                                <?php
                                $j=0;
                                if(isset($all_rooms) && $all_rooms):
                                foreach($all_rooms as $r):

                                $j++;

                                endforeach;
                                endif;

                                ?>

                                <?php

                                if($j!=0) {
                                    echo round((($j - $i) * 100 / $j)) . " %";
                                }
                                else{

                                    echo "100 %";
                                }
                                ?>


							</div>
							<div class="desc">
								 Room Vaccancy today
							</div>
						</div>
						<a class="more" href="javascript:;">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
					<div class="long">
					<!-- BEGIN PAGE CONTENT-->
<style>
.ds .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px;}
</style>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/daypilot/media/layout.css" />

	<!-- helper libraries -->
	<script src="<?php echo base_url();?>assets/dashboard/daypilot/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
	
	<!-- daypilot libraries -->
        <script src="<?php echo base_url();?>assets/dashboard/daypilot/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

        <style type="text/css">
            .scheduler_default_rowheader 
            {
                background: -webkit-gradient(linear, left top, left bottom, from(#eeeeee), to(#dddddd));
                background: -moz-linear-gradient(top, #eeeeee 0%, #dddddd);
                background: -ms-linear-gradient(top, #eeeeee 0%, #dddddd);
                background: -webkit-linear-gradient(top, #eeeeee 0%, #dddddd);
                background: linear-gradient(top, #eeeeee 0%, #dddddd);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr="#eeeeee", endColorStr="#dddddd");

            }
			 .scheduler_default_rowheader_inner 
            {
                    border-right: 7px solid #f9ba25;
				
            }
            
            .scheduler_default_rowheadercol2
            {
                background: White;
            }
            .scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner 
            {
                top: 2px;
                bottom: 2px;
                left: 2px;
                background-color: transparent;
                    border-left: 5px solid #1a9d13; /* green */
                    border-right: 0px none;
            }
            .status_dirty.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                    border-left: 5px solid #ea3624; /* red */
            }
            .status_cleanup.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                    border-left: 5px solid #f9ba25; /* orange */
            }
/*********today add**************/
			.colr ul li {
			    float: left;
    padding: 5px 10px 7px 10px;
    list-style-type: none;
    font-size: 14px;
    width: 100px;
    text-align: left;
			}
			
				.brdr {
   width: 10px;
    height: 10px;
    border: 1px;
    background: red;
    position: absolute;
    margin: 6px 0px 14px -19px;
}
			
 .page-footer {
    background: #2B3643;
 	}
 .page-footer a {
    color: #fff;
 	}
	.rm{
	width: 102px;
    height: 20px;
   
    z-index:9999;
    position: absolute;
    margin-top: 21px;
    color: black;
    text-align: left;
    padding-left: 4px;
    padding-top: 2px;
    font-weight: bold;
    font-size: 12px;
	}

        </style>
<div class="row ds">
    <div class="col-md-12">
<!---->
        <div id="booking_calendar">
<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Add Booking</span>
							</div>
							
						</div>
						<div class="portlet-body form">
							<form role="form">
								<div class="form-body">
								<div class="main">

                <div class="space">
                      <div class="lft" style="float:left;">
                        Show rooms:
                        <select id="filter">
                            <option value="0">All</option>
                            <option value="1">Single</option>
                            <option value="2">Double</option>
                            <!--<option value="4">Family</option>-->
                        </select>
                         </div>
                    
                  <div class="clearfix"></div>
                    <div class="space">
                          <div class="rgt" style="float:left;  ">
    
  
                            Start date: <span id="start"></span> <a href="#" onclick="picker.show(); return false;">Select</a> 
                            Time range: 
                            <select id="timerange">
                                <option value="week">Week</option>
                                <option value="2weeks">2 Weeks</option>
                                <option value="month" selected>Month</option>
                                <option value="2months">2 Months</option>
                            </select>
                            <label for="autocellwidth"><input type="checkbox" id="autocellwidth">Auto Cell Width</label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="colr" style="float:right;   margin-top: -96px; margin-right: -29px;">
    
                            <ul >
                            <li><div class="brdr" style="background:#75509B;"></div>Temp Hold</li>&nbsp;&nbsp;
                            <li><div class="brdr" style="background:#C04A67;"></div>Advance</li>&nbsp;&nbsp;
                            <li><div class="brdr" style="background:#f52929;"></div>Pending</li>
                            </ul>
                            <ul>
                            <li><div class="brdr" style="background:#0FD906;"></div>Confirmed</li>
                            <li><div class="brdr" style="background:#39B9A1;"></div>Checked-in</li>
                            <li><div class="brdr" style="background:#297cac;"></div>Checked-out</li> 
                            </ul>
                            </div>
                    </div> 

                    <script type="text/javascript">
						$(document).ready(function() {
								dp.cellWidth = 100; 
								dp.cellWidthSpec = $(this).is(":checked") ? "Auto" : "Fixed";
								dp.update();
								//dp.cell.enabled = false;
								/*if (start.getTime() < today.getTime())
									{ dp.Cell.Enabled = false; e.Day.IsSelectable = false; }*/
								//alert(start.getTime());
								
						});
                        var picker = new DayPilot.DatePicker({
                            target: 'start', 
                            pattern: 'M/d/yyyy', 
                            date: new DayPilot.Date().firstDayOfMonth(),
                            onTimeRangeSelected: function(args) { 
                                //dp.startDate = args.start;
                                loadTimeline(args.start);
                                loadEvents();
                            }
                        });
                        
                        $("#timerange").change(function() {
                            switch (this.value) {
                                case "week":
                                    dp.days = 7;
                                    break;
                                case "2weeks":
                                    dp.days = 14;
                                    break;
                                case "month":
                                    dp.days = dp.startDate.daysInMonth();
                                    break;
                                case "2months":
                                    dp.days = dp.startDate.daysInMonth() + dp.startDate.addMonths(1).daysInMonth();
                                    break;
                            }
                            loadTimeline(DayPilot.Date.today());
                            loadEvents();
                        });
                        
                        $("#autocellwidth").click(function() {
                            dp.cellWidth = 100;  // reset for "Fixed" mode
                            dp.cellWidthSpec = $(this).is(":checked") ? "Auto" : "Fixed";
                            dp.update();
                        });
                    </script>                    
                </div>
				<div class="rm" id="rm"> Room</div>
                <div id="dp"> </div>
				
				
              
                

                <script>
                    var dp = new DayPilot.Scheduler("dp");

                    dp.allowEventOverlap = false;

                    //dp.scale = "Day";
                    //dp.startDate = new DayPilot.Date().firstDayOfMonth();
                    dp.days = dp.startDate.daysInMonth();
                    //loadTimeline(DayPilot.Date.today(-3));
					loadTimeline(DayPilot.Date.today().addDays(-3));
                    
                    dp.eventDeleteHandling = "Update";

                    dp.onBeforeTimeHeaderRender = function(args) {
                        if (args.header.start == DayPilot.Date.today()) {
                            args.header.backColor  = "#33D0E1";
                        }

                    };

                    dp.timeHeaders = [
                        { groupBy: "Month", format: "MMMM yyyy" },
                        { groupBy: "Day", format: "d" },
                        { groupBy: "Day", format: "dddd" },
                    ];

                    dp.eventHeight = 50;
                    dp.bubble = new DayPilot.Bubble({});
                    
                    dp.rowHeaderColumns = [
                        {title: "Room", width: 100}
                        //{title: "Capacity", width: 80},
                        //{title: "Status", width: 80}
                    ];
                    
                    dp.onBeforeResHeaderRender = function(args) {
                        var beds = function(count) {
                            return count + " bed" + (count > 1 ? "s" : "");
                        };
                        
                        /*args.resource.columns[0].html = beds(args.resource.capacity);
                        args.resource.columns[1].html = args.resource.status;
                        switch (args.resource.status) {
                            case "D":
                                args.resource.cssClass = "status_dirty";
                                break;
                            case "A":
                                args.resource.cssClass = "status_cleanup";
                                break;
                        }*/
                    };
                                        
                    // http://api.daypilot.org/daypilot-scheduler-oneventmoved/ 
                    dp.onEventMoved = function (args) {
                        if ( args.newStart < DayPilot.Date.today() ) {
                            swal({
                                    title: "Message",
                                    text: "Sorry !! Booking Events can not be moved in past dates",
                                    type: "warning"
                                },
                                function(){
                                    $( "#booking_calendar" ).load( "<?php echo base_url() ?>dashboard/calendar_load" );
                                });
                            return false;

                        }

                        $.post("<?php echo base_url();?>bookings/booking_backend_move",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString(),
                                newResource: args.newResource
                            },
                            function(data) {
                                dp.message(data.message);
                            });
                    };

                    // http://api.daypilot.org/daypilot-scheduler-oneventresized/ 
                    dp.onEventResized = function (args) {
                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            dp.clearSelection();

                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };





                        if ( args.newStart < DayPilot.Date.today() ) {
                            swal({
                                    title: "Message",
                                    text: "Sorry !! Booking Events can not be resized in past dates",
                                    type: "warning"
                                },
                                function(){
                                    $( "#booking_calendar" ).load( "<?php echo base_url() ?>dashboard/calendar_load" );
                                });

                            return false;

                        }
                        else
                        {
                            modal.showUrl("<?php echo base_url();?>bookings/hotel_booking_resize?id="+args.e.id()+"&newStart="+args.newStart.toString()+"&newEnd="+args.newEnd.toString()+"");



                        }



                        /* $.post("<?php echo base_url();?>bookings/booking_backend_resize",
                         {
                         id: args.e.id(),
                         newStart: args.newStart.toString(),
                         newEnd: args.newEnd.toString()
                         },
                         function(response) {
                         alert(response.message);
                         // location.reload();
                         });*/
                    };
                    
                    dp.onEventDeleted = function(args) {
                        $.post("<?php echo base_url();?>bookings/booking_delete", 
                        {
                            id: args.e.id()
                        }, 
                        function() {
                            dp.message("Deleted.");
                        });
                    };
                    
                    // event creating
                    // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                    dp.onTimeRangeSelected = function (args) {
                        //var name = prompt("New event name:", "Event");
                        //if (!name) return;

                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            dp.clearSelection();
                            
                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };
						
						if (args.start >= DayPilot.Date.today() && DayPilot.Date.today() < args.end) 
						{
							//args.cell.backColor = "#EAFAFC";
						//}
                        modal.showUrl("<?php echo base_url();?>bookings/hotel_new_booking?start=" + args.start + "&end=" + args.end + "&resource=" + args.resource);
						}
						else
						{
                            swal({
                                    title: "Invalid Date",
                                    text: "No Booking Can be taken in past dates",
                                    type: "warning"
                                },
                                function(){
                                    $( "#booking_calendar" ).load( "<?php echo base_url() ?>dashboard/calendar_load" );
                                });
							return false;
						}
                    };

                    dp.onEventClick = function(args) {
                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };
                        modal.showUrl("<?php echo base_url();?>bookings/hotel_edit_booking?id=" + args.e.id());
                    };
                    
                    dp.onBeforeCellRender = function(args) {
						if (args.cell.start <= DayPilot.Date.today() && DayPilot.Date.today() < args.cell.end) 
						{
							args.cell.backColor = "#EAFAFC";
						}
						if (args.cell.start < DayPilot.Date.today()) 
						{
							args.cell.backColor = "#f5f5dc";
						}
						else 
						{
                        var dayOfWeek = args.cell.start.getDayOfWeek();
                        if (dayOfWeek === 6 || dayOfWeek === 0) {
                            args.cell.backColor = "#f8f8f8";
                        }
						}
                    };

                    dp.onBeforeEventRender = function(args) {
                        var start = new DayPilot.Date(args.e.start);
                        var end = new DayPilot.Date(args.e.end);
                        
                        var today = new DayPilot.Date().getDatePart();
                        
                        //args.e.html = args.e.text + " (" + start.toString("M/d/yyyy") + " - " + end.toString("M/d/yyyy") + ")"; 
                        args.e.html = args.e.cust_name;
						//args.e.html = args.e.html + "<br /><span style=''>" + args.e.cust_name + "</span>";
                        switch (args.e.status) {
							 case "7":
                                /*var in2days = today.addDays(1);
                                
                                if (start.getTime() < in2days.getTime()) {
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                }
                                else {*/
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                               // }
                                break;
							 case "1":
                                /*var in2days = today.addDays(1);
                                
                                if (start.getTime() < in2days.getTime()) {
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                }
                                else {*/
                                    args.e.barColor = args.e.bar_color_code;
                                 if(args.e.booking_status_secondary!='') {
                                     args.e.toolTip = args.e.booking_status + " (" + args.e.booking_status_secondary + ")";
                                 }
                                 else {
                                     args.e.toolTip = args.e.booking_status;
                                 }
									args.e.backColor = args.e.body_color_code;
                               // }
                                break;
                            case "2":
                                /*var in2days = today.addDays(1);
                                
                                if (start.getTime() < in2days.getTime()) {
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                }
                                else {*/
                                    args.e.barColor = args.e.bar_color_code;
                                if(args.e.booking_status_secondary!='') {
                                    args.e.toolTip = args.e.booking_status + " (" + args.e.booking_status_secondary + ")";
                                }
                                else {
                                    args.e.toolTip = args.e.booking_status;
                                }
									args.e.backColor = args.e.body_color_code;
                               // }
                                break;
							case "3":
                                                        
									args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                
                                break;
							case "5":
                                    args.e.barColor = args.e.bar_color_code;
                                if(args.e.booking_status_secondary!='') {
                                    args.e.toolTip = args.e.booking_status + " (" + args.e.booking_status_secondary + ")";
                                }
                                else {
                                    args.e.toolTip = args.e.booking_status;
                                }
									args.e.backColor = args.e.body_color_code;
                                
                                break;
							case "8":
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                
                                break;	
                            case "4":
                               /* var arrivalDeadline = today.addHours(18);

                                if (start.getTime() < today.getTime() || (start.getTime() === today.getTime() && now.getTime() > arrivalDeadline.getTime())) { // must arrive before 6 pm
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                }
                                else {*/
                                    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                //args.e.children ='dqwd';
                                //}
                                break;
                            /*case 'Arrived': // arrived
                                var checkoutDeadline = today.addHours(10);

                                if (end.getTime() < today.getTime() || (end.getTime() === today.getTime() && now.getTime() > checkoutDeadline.getTime())) { // must checkout before 10 am
                                    args.e.barColor = "#f41616";  // red
                                    args.e.toolTip = "Late checkout";
                                }
                                else
                                {
                                    args.e.barColor = "#1691f4";  // blue
                                    args.e.toolTip = "Arrived";
                                }
                                break;*/
                            case '6': // checked out
									args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
                                break;
                            /*default:
                                args.e.toolTip = "Unexpected state";
                                break; */   
                        }
                        
                        args.e.html = args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span>";
                        
                        var paid = args.e.paid;
                        var paidColor = args.e.paid_color;

                        args.e.areas = [
                            //{ bottom: 10, right: 4, html: "<div style='color:" + paidColor + "; font-size: 8pt;'>Paid: " + paid + "</div>", v: "Visible"},
                            { left: 4, bottom: 8, right: 4, height: 2, html: "<div style='background-color:" + paidColor + "; height: 100%; width:" + paid + "'></div>", v: "Visible" }
                        ];

                    };


                    dp.init();

                    loadResources();
                    loadEvents();
                    
                    function loadTimeline(date) {
                        dp.scale = "Manual";
                        dp.timeline = [];
                        var start = date.getDatePart().addHours(0);
                        
                        for (var i = 0; i < dp.days; i++) {
                            dp.timeline.push({start: start.addDays(i), end: start.addDays(i+1)});
                        }
                        dp.update();
                    }

                    function loadEvents() {
                        var start = dp.visibleStart();
                        var end = dp.visibleEnd();

                        $.post("<?php echo base_url();?>bookings/hotel_backend_events", 
                            {
                                start: start.toString(),
                                end: end.toString()
                            },
                            function(data) {
                                dp.events.list = data;
                                dp.update();
                            }
                        );
                    }

                    function loadResources() {
                        $.post("<?php echo base_url();?>bookings/hotel_backend_rooms", 
                        { capacity: $("#filter").val() },
                        function(data) {
                            dp.resources = data;
                            dp.update();
                        });
                    }
                    
                    $(document).ready(function() {
                        $("#filter").change(function() {
                            $.post("<?php echo base_url();?>bookings/hotel_backend_onchange_room", 
                        { capacity: $("#filter").val() },
                        function(data) {
                            dp.resources = data;
                            dp.update();
                        });
                        });
                    });

                </script>
				
            </div>
            
								</div>
								<!--<div class="form-actions noborder">
									<button type="button" class="btn blue">Submit</button>
									<button type="button" class="btn default">Reset</button>
								</div>-->
								
							</form>
						</div>
					


<!---->
	
	
	<div class="clearfix"></div>
	

   </div>

    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
                    </div>
					<!--<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp hide"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Site Visits</span>
								<span class="caption-helper">weekly stats...</span>
							</div>
							<div class="actions">
								<div class="btn-group btn-group-devided" data-toggle="buttons">
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
									<input type="radio" name="options" class="toggle" id="option1">New</label>
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
									<input type="radio" name="options" class="toggle" id="option2">Returning</label>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="<?php echo base_url("assets/dashboard/images/loading.gif"); ?>">
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="col-md-6 col-sm-6">
					
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo hide"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
								<span class="caption-helper">monthly stats...</span>
							</div>
							<div class="actions">
								<div class="btn-group">
									<a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									Filter Range<span class="fa fa-angle-down">
									</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Q1 2014 <span class="label label-sm label-default">
											past </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Q2 2014 <span class="label label-sm label-default">
											past </span>
											</a>
										</li>
										<li class="active">
											<a href="javascript:;">
											Q3 2014 <span class="label label-sm label-success">
											current </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Q4 2014 <span class="label label-sm label-warning">
											upcoming </span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="<?php echo base_url("assets/dashboard/images/loading.gif"); ?>"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 228px;">
								</div>
							</div>
							<div style="margin: 20px 0 10px 30px">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-success">
										Revenue: </span>
										<h3>$13,234</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-info">
										Tax: </span>
										<h3>$134,900</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Shipment: </span>
										<h3>$1,134</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-warning">
										Orders: </span>
										<h3>235090</h3>
									</div>
								</div>
							</div>
						</div>
					</div>-->
					
				</div>
			</div>
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-blue-steel hide"></i>
								<span class="caption-subject font-blue-steel bold uppercase">Recent Bookings</span>
							</div>
							<!--
							<div class="actions">
								<div class="btn-group">
									<a class="btn btn-sm btn-default btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									Filter By <i class="fa fa-angle-down"></i>
									</a>
									<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox"/> Finance</label>
										<label><input type="checkbox" checked=""/> Membership</label>
										<label><input type="checkbox"/> Customer Support</label>
										<label><input type="checkbox" checked=""/> HR</label>
										<label><input type="checkbox"/> System</label>
									</div>
								</div>
							</div>
							-->
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
								 <?php 
								
								 if(isset($recent_bookings) && $recent_bookings):
								 foreach($recent_bookings as $rb):
								 ?>
								
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
														 <?php 
														  $room_number=$this->dashboard_model->get_room_number($rb->room_id);
														 echo $hotel_name->hotel_name; ?> : <?php echo $rb->cust_name; ?> 
														 
														 <span class="label label-sm label-warning "> Room:
														 <?php foreach($room_number as $r): ?>
														 <?php echo $r->room_no; ?>
														 <?php endforeach; ?>
														 <i class="fa fa-share"></i>
														
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												<?php echo $rb->stay_days ?> days
												<?php
												$status=$this->dashboard_model->get_status($rb->booking_status_id);
												foreach($status as $stat){
												echo $stat->booking_status;
												}
												?>
											</div>
										</div>
									</li>
									<?php endforeach;
											endif;									
											?>
									
									
									
									
									
									
								</ul>
							</div>
							<div class="scroller-footer">
								<div class="btn-arrow-link pull-right">
									<a href="javascript:;">See All Records</a>
									<i class="icon-arrow-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="portlet light tasks-widget">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-green-haze hide"></i>
								<span class="caption-subject font-green-haze bold uppercase">Tasks</span>
								<span class="caption-helper">tasks summary...</span>
							</div>
							<div class="actions">
								<div class="btn-group">
							<button class="btn green-haze btn-circle btn-sm"  data-toggle="modal" href="#responsive"> Add Task </button>
									
									<!-- /.modal -->
							<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<?php

				                            $form = array(
				                                'class' 			=> 'form-body',
				                                'id'				=> 'form',
				                                'method'			=> 'post',
												
				                            );
				                            echo form_open_multipart('dashboard/add_task',$form);
			                            ?>
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">Assign a Task</h4>
											</div>
											<div class="modal-body">
												<div class="scroller" style="height:350px" data-always-visible="1" data-rail-visible1="1">
													<div class="row">
														<div class="col-md-12">
															  <div class="form-group">
																	<label class="control-label pull-left" style="margin-left:15px;">Assign From:</label>
																	<div class="col-md-12">
																		<select name="asign_from" id="booking_rent" class="form-control">
																			<option value="" disabled selected>--Assigner--</option>
																				
																				<option value="<?php echo $this->session->userdata('user_id'); ?>"> <?php echo $this->session->userdata('user_name'); ?></option>
																																											
																		</select>
																		
																	</div>
																</div>
																<br><br>
																<div class="form-group"style="margin-top:10px;">
																	<label class="control-label pull-left" style="margin-left:15px;">Assign To:</label>
																	<div class="col-md-12">
																		<select name="asign_to" id="booking_rent" class="form-control">
																			<option value="" disabled selected>--Assignee--</option>
																			<?php
																				if(isset($tasks_assigee) && $tasks_assigee):
																				foreach($tasks_assigee as $tasks_assigee):
																			?>
																				
																				<option value="<?php echo $tasks_assigee->admin_id; ?>"> <?php echo $tasks_assigee->admin_first_name .' '. $tasks_assigee->admin_middle_name .' '. $tasks_assigee->admin_last_name; ?></option>
																			
																			<?php 
																				endforeach; 
																				endif;
																			?>
																		</select>
																	</div>
																</div>
																<br><br>
																<div class="form-group"style="margin-top:10px;">
																	<label class="control-label pull-left" style="margin-left:15px;">Task Description:</label>
																	<div class="col-md-12">
																		<textarea name="task_desc" class="form-control" style="overflow:hidden"row="3">
																			
																		</textarea>
																	</div>
																</div>

																<div class="form-group"style="margin-top:10px;">
																	<div class="col-md-6">
																		<label class="control-label pull-left" style="margin-left:15px;">Priority:</label>
																		<select name="task_priority" id="task_priority" class="form-control">
																			<option value="" disabled selected>--Select Prority--</option>
																			<option value="1">1(Best Prority)</option>
																			<option value="2">2(Medium Prority)</option>
																			<option value="3">3(Low Prority)</option>
																		</select>
																	</div>

																	<div class="col-md-6">
																		<label class="control-label pull-left" style="margin-left:15px;">Due Date:</label>
																		<input type="text" autocomplete="off" name="due_date" class="form-control date-picker" id="due_date" >
																	</div>
																</div>

																<div class="form-group"style="margin-top:5px;">
																	
																</div>
														</div>
														
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn default">Close</button>
												<button type="submit" class="btn green">Assign Task</button>
											</div>
										<?php form_close(); ?>
									</div>
								</div>
							</div>
							

								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="task-content">
								<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
									<!-- START TASK LIST -->
									<ul class="task-list">

										<?php
											if(isset($tasks_pending) && $tasks_pending):
											foreach($tasks_pending as $tasks_pending):

												$priority = $tasks_pending->priority;
												$from = $tasks_pending->from_id;
												$to = $tasks_pending->to_id;

												$from_details = $this->dashboard_model->get_task_user($from);
												$to_details = $this->dashboard_model->get_task_user($to);
										?>
										
										<li>
											<div class="task-checkbox" style="margin-top:1%;">	
												<?php 
													if ($priority == '1')											
													{
														?><span class="label label-sm label-danger">High</span><?php
													}
													else if ($priority == '2') 
													{
														?><span class="label label-sm label-warning">Medium</span><?php	
													}
													else
													{
														?><span class="label label-sm label-info">Low</span><?php
													}
												?>
											</div>
											<div class="task-title" style="margin-left:13%;">
												<span class="task-title-sp">
												<?php echo $tasks_pending->task; 
													foreach ($from_details as $from_details) 
													{
													 	echo '('. $from_details->admin_first_name .' '. $from_details->admin_middle_name .' '. $from_details->admin_last_name;
													}
													echo "->";
													foreach ($to_details as $to_details) 
													{
													 	echo $to_details->admin_first_name .' '. $to_details->admin_middle_name .' '. $to_details->admin_last_name .')';
													}
												?> </span>
												<span class="label label-sm label-warning">Pending</span>
												<span class="task-bell">
													<i class="fa fa-bell-o"></i>
													<?php echo date('d/m/Y', strtotime($tasks_pending->due_date)); ?>
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
													<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="<?php base_url()?>dashboard/complete_task?task_id=<?php echo $tasks_pending->id; ?>">
															<i class="fa fa-check"></i> Complete </a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										
										<?php 
											endforeach; 
											endif;
										?>	
										
										
										


									</ul>
									<!-- END START TASK LIST -->
								</div>
							</div>
							<div class="task-footer">
								<div class="btn-arrow-link pull-right">
									<a href="javascript:;">See All Records</a>
									<i class="icon-arrow-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>
			<!--<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-cursor font-purple-intense hide"></i>
								<span class="caption-subject font-purple-intense bold uppercase">General Stats</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
								<i class="fa fa-repeat"></i> Reload </a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number transactions" data-percent="55">
											<span>
											+55 </span>
											%
										</div>
										<a class="title" href="javascript:;">
										Transactions <i class="icon-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number visits" data-percent="85">
											<span>
											+85 </span>
											%
										</div>
										<a class="title" href="javascript:;">
										New Visits <i class="icon-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
											-46 </span>
											%
										</div>
										<a class="title" href="javascript:;">
										Bounce <i class="icon-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-equalizer font-purple-plum hide"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Server Stats</span>
								<span class="caption-helper">monthly stats...</span>
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-4">
									<div class="sparkline-chart">
										<div class="number" id="sparkline_bar"></div>
										<a class="title" href="javascript:;">
										Network <i class="icon-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="sparkline-chart">
										<div class="number" id="sparkline_bar2"></div>
										<a class="title" href="javascript:;">
										CPU Load <i class="icon-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="sparkline-chart">
										<div class="number" id="sparkline_line"></div>
										<a class="title" href="javascript:;">
										Load Rate <i class="icon-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>-->
			<!--<div class="clearfix">
			</div>-->
			<!--<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN REGIONAL STATS PORTLET
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Regional Stats</span>
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
								<i class="icon-cloud-upload"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
								<i class="icon-wrench"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
								<i class="icon-trash"></i>
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="region_statistics_loading">
								<img src="<?php echo base_url("assets/dashboard/images/loading.gif"); ?>" alt="loading"/>
							</div>
							<div id="region_statistics_content" class="display-none">
								<div class="btn-toolbar margin-bottom-10">
									<div class="btn-group btn-group-circle" data-toggle="buttons">
										<a href="" class="btn grey-salsa btn-sm active">
										Users </a>
										<a href="" class="btn grey-salsa btn-sm">
										Orders </a>
									</div>
									<div class="btn-group pull-right">
										<a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										Select Region <span class="fa fa-angle-down">
										</span>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:;" id="regional_stat_world">
												World </a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_usa">
												USA </a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_europe">
												Europe </a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_russia">
												Russia </a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_germany">
												Germany </a>
											</li>
										</ul>
									</div>
								</div>
								<div id="vmap_world" class="vmaps display-none">
								</div>
								<div id="vmap_usa" class="vmaps display-none">
								</div>
								<div id="vmap_europe" class="vmaps display-none">
								</div>
								<div id="vmap_russia" class="vmaps display-none">
								</div>
								<div id="vmap_germany" class="vmaps display-none">
								</div>
							</div>
						</div>
					</div>
					<!-- END REGIONAL STATS PORTLET
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET
					<div class="portlet light">
						<div class="portlet-title tabbable-line">
							<div class="caption">
								<i class="icon-globe font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
							</div>
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">
									System </a>
								</li>
								<li>
									<a href="#tab_1_2" data-toggle="tab">
									Activities </a>
								</li>
								<li>
									<a href="#tab_1_3" data-toggle="tab">
									Recent Users </a>
								</li>
							</ul>
						</div>
						<div class="portlet-body">
							<!--BEGIN TABS
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_1">
									<div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
										<ul class="feeds">
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 You have 4 pending tasks. <span class="label label-sm label-info">
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
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New version v1.4 just lunched!
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
																<i class="fa fa-bolt"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 Database server #12 overloaded. Please fix the issue.
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
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
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
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 40 mins
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 1.5 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
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
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-default">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 3 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 5 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 18 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-default">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 21 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 22 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-default">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 21 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 22 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-default">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 21 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 22 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-default">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 21 hours
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-bullhorn"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received. Please take care of it.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 22 hours
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane" id="tab_1_2">
									<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
										<ul class="feeds">
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New order received
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 10 mins
													</div>
												</div>
												</a>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-danger">
																<i class="fa fa-bolt"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 Order #24DOP4 has been rejected. <span class="label label-sm label-danger ">
																Take action <i class="fa fa-share"></i>
																</span>
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
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																 New user registered
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														 Just now
													</div>
												</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane" id="tab_1_3">
									<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
										<div class="row">
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Robert Nilson </a>
														<span class="label label-sm label-success label-mini">
														Approved </span>
													</div>
													<div>
														 29 Jan 2013 10:45AM
													</div>
												</div>
											</div>
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Lisa Miller </a>
														<span class="label label-sm label-info">
														Pending </span>
													</div>
													<div>
														 19 Jan 2013 10:45AM
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
													</div>
													<div>
														 19 Jan 2013 12:45PM
													</div>
												</div>
											</div>
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
													</div>
													<div>
														 19 Jan 2013 11:55PM
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
													</div>
													<div>
														 19 Jan 2013 12:45PM
													</div>
												</div>
											</div>
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
													</div>
													<div>
														 19 Jan 2013 11:55PM
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
													</div>
													<div>
														 19 Jan 2013 12:45PM
													</div>
												</div>
											</div>
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
													</div>
													<div>
														 19 Jan 2013 11:55PM
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
													</div>
													<div>
														 19 Jan 2013 12:45PM
													</div>
												</div>
											</div>
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
													</div>
													<div>
														 19 Jan 2013 11:55PM
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
													</div>
													<div>
														 19 Jan 2013 12:45PM
													</div>
												</div>
											</div>
											<div class="col-md-6 user-info">
												<img alt="" src="<?php echo base_url("assets/dashboard/images/avatar1.png"); ?>" class="img-responsive"/>
												<div class="details">
													<div>
														<a href="javascript:;">
														Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
													</div>
													<div>
														 19 Jan 2013 11:55PM
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							END TABS
						</div>
					</div>
					END PORTLET
				</div>
			</div>-->

			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light calendar ">
						<div class="portlet-title ">
							<div class="caption">
								<i class="icon-calendar font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Booking Count</span>
							</div>
						</div>
						<div class="portlet-body">
							<div id="calendar">
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>



				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bubble font-red-sunglo"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Chats</span>
							</div>
							<div class="actions">
								<div class="portlet-input input-inline">
									<div class="input-icon right">
										<i class="icon-magnifier"></i>
										<input type="text" class="form-control input-circle" placeholder="search...">
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-body" id="chats">
							<div class="scroller" style="height: 341px;" data-always-visible="1" data-rail-visible1="1">
								<ul class="chats">
									<li class="in">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar1.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Bob Nilson </a>
											<span class="datetime">
											at 20:09 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="out">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar2.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Lisa Wong </a>
											<span class="datetime">
											at 20:11 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="in">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar3.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Bob Nilson </a>
											<span class="datetime">
											at 20:30 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="out">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar1.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Richard Doe </a>
											<span class="datetime">
											at 20:33 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="in">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar3.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Richard Doe </a>
											<span class="datetime">
											at 20:35 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="out">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar1.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Bob Nilson </a>
											<span class="datetime">
											at 20:40 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="in">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar3.jpg"); ?>"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Richard Doe </a>
											<span class="datetime">
											at 20:40 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
										</div>
									</li>
									<li class="out">
										<img class="avatar" alt="" src="<?php echo base_url("assets/dashboard/images/avatar1.jpg"); ?>" />
										<div class="message">
											<span class="arrow">
											</span>
											<a href="javascript:;" class="name">
											Bob Nilson </a>
											<span class="datetime">
											at 20:54 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>
										</div>
									</li>
								</ul>
							</div>
							<div class="chat-form">
								<div class="input-cont">
									<input class="form-control" type="text" placeholder="Type a message here..."/>
								</div>
								<div class="btn-cont">
									<span class="arrow">
									</span>
									<a href="" class="btn blue icn-only">
									<i class="fa fa-check icon-white"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
		</div>
	</div>
</div>


<script>

function update_task(val){
	var result = confirm("are you want to delete this task?");
	var linkurl = '<?php echo base_url() ?>dashboard/update_task/'+val;
	if (result) {
		alert(linkurl);
	}
	
}
$(window).scroll(function() {
    if ($(window).scrollTop() > 460) {
        // > 100px from top - show div
		document.getElementById('rm').style.display= 'none';
    }
    else {
        // <= 100px from top - hide div
		document.getElementById('rm').style.display= 'block';
    }
});
</script>