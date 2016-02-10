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

        </style>
<div class="row ds">
    <div class="col-md-12">
<!---->
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
                    Show rooms:
                    <select id="filter">
                        <option value="0">All</option>
                        <option value="1">Single</option>
                        <option value="2">Double</option>
                        <!--<option value="4">Family</option>-->
                    </select>
                    
                    <div class="space">
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

                <div id="dp"></div>
                

                <script>
                    var dp = new DayPilot.Scheduler("dp");

                    dp.allowEventOverlap = false;

                    //dp.scale = "Day";
                    //dp.startDate = new DayPilot.Date().firstDayOfMonth();
                    dp.days = dp.startDate.daysInMonth();
                    //loadTimeline(DayPilot.Date.today(-3));
					loadTimeline(DayPilot.Date.today().addDays(-3));
                    
                    dp.eventDeleteHandling = "Update";
                    dp.onBeforeTimeHeaderRender=function(args){


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

                            //args.resource.backColor = "red";

                        
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

                    dp.onBeforeTimeHeaderRender = function(args) {
                        if (args.header.start == DayPilot.Date.today()) {
                            args.header.backColor  = "#33D0E1";
                            args.header.level ="zero-based row index";
                            //args.header.html = "";
                        }

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
                                    location.reload();
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
                                    location.reload();
                                });
                            return false;

                        }
                        else
                        {
                            modal.showUrl("<?php echo base_url();?>bookings/hotel_booking_resize?id="+args.e.id()+"&newStart="+args.newStart.toString()+"&newEnd="+args.newEnd.toString()+"");



                        }




                            //args.cell.backColor = "#EAFAFC";
                            //}






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
                                    location.reload();
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
						else if (args.cell.start < DayPilot.Date.today())
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
                                   
                               // }
							    args.e.barColor = args.e.bar_color_code;
                                    args.e.toolTip = args.e.booking_status;
									args.e.backColor = args.e.body_color_code;
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
                        var paidColor = args.e.paid_color;;

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