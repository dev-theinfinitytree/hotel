	<?php 
	    foreach ($rooms as $room) {  

				//Cost calculation
            $room_id=$room->room_id;
				$total_cost=$room->room_rent_total_amount;
				$total_tax=$room->room_rent_tax_amount;
				$grand_total=$room->room_rent_sum_total;
				if($grand_total==0){
					$grand_total=$total_cost;
				}
				//End Cost Calculation
	            $room_no = $room->room_no;
				$booking_id = $room->booking_id;
				$cust_name = $room->cust_name;
				$checkin_time=$room->checkin_time;
				$checkout_time=$room->checkout_time;
				$cust_address = $room->cust_address;
				$cust_contact_no = $room->cust_contact_no;
				$cust_from_date = $room->cust_from_date;
				$cust_end_date = $room->cust_end_date;
				$diff = abs(strtotime($cust_from_date) - strtotime($cust_end_date));
				$years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				//$d1 = strtotime($cust_from_date);
				//$dt1 = date_create($d1,'Y-m-d H:i:s');
				//$d2 = strtotime($cust_end_date);
				//$dt2 = date_create($d2,'Y-m-d H:i:s');
				//$diff=date_diff($cust_from_date,$cust_end_date);
				//$cust_booking_status = $room->cust_booking_status;
				//$cust_payment_initial = $room->cust_payment_initial;
				$base_room_rent = $room->base_room_rent;
				$rent_mode_type = $room->rent_mode_type;
				$mod_room_rent = $room->mod_room_rent;
				$booking_status_id = $room->booking_status_id;
			$booking_status_id_secondary = $room->booking_status_id_secondary;
				$booking_checkout_time = $room->checkout_time;
				$no_of_guest=$room->no_of_guest;
                 $no_of_adult=$room->no_of_adult;
                $no_of_child=$room->no_of_child;
				$booking_source=$room->booking_source;
				if($room->broker_id !=0){
                    $broks=$this->dashboard_model->get_broker_details($room->broker_id);
                    foreach($broks as $b) {
                        $broker_name = $b->b_name;
                    }
				}
				else{
					$broker_name="N/A";
				}
            if($room->channel_id !=0){

                $chns=$this->dashboard_model->get_channel_details($room->channel_id);
                /*print_r($chns);
                exit();*/
                foreach($chns as $c) {
                    $channel_name = $chns->channel_name;
                }
            }
            else{
                $channel_name="N/A";
            }
				if($rent_mode_type == 'p')
				{
					$total_amount = ($base_room_rent + $mod_room_rent)*$days;
				}
				else
				{
					$total_amount = ($base_room_rent - $mod_room_rent)*$days;
				}
				//print_r($room);
				//exit();
	         }
		$paid_amount=0;	 
		foreach ($transaction as $transaction)
		{
			$paid_amount = $paid_amount=0	+ $transaction->t_amount;
		}
		$due_amount = $grand_total - $paid_amount;
		
		if($booking_status_id == 6)
		{
			$flag =1;
		}
	?>
	<!DOCTYPE html>

	<html lang="en">
	<input type="hidden" id="curr_date" value="<?php echo $cust_from_date; ?>">
	<input type="hidden" id="dueamount" value="<?php echo $due_amount; ?>">
	<head>
	<meta charset="utf-8"/>
	<title>Metronic | Form Stuff - Form Wizard</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>


	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/dashboard/daypilot/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

        <!-- daypilot libraries -->
        <script src="<?php echo base_url();?>assets/dashboard/daypilot/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
	<script type="text/javascript">


        window.onload = function() {
            $("#master").attr("disabled", "disabled").off('click');
        };


	$(document).ready(function(){
		 //var cur_dt = '<?php echo date('Y-m-d',strtotime($cust_from_date)); ?>';
		 //var d = '<?php echo date('Y-m-d'); ?>';
		 //alert(cur_dt);
		 //alert(d);
		 /*if(cur_dt == d)
		 {
		 	$("#check_intab").show();	 
		 }
		 else
		 {
		 	$("#check_intab").hide();	
		 }*/
		 
		 $("#tab5").hide();
		 $("#tab2").hide();
		 
		 $("#tab3").hide();
		 $("#tab6").hide();
		 //$("#check_intab").hide();
		
		 
		/* var amount = $("#dueamount").val();
		
		 //alert(a);
		 if(amount=='0')
		 {
			
			 $("#checkout").show();
			 
		 }
		
		 
		 var status =$("#statusid").val();
		 //alert(status);
		  if(status == 1)
		 {
			 $("#check_intab").hide();
			 $("#checkout").hide();
		 }
		  if(status == 8)
		 {
			 $("#check_intab").hide();
			 $("#checkout").hide();
		 }
		 if(status == 6)
		 {
			 $("#check_intab").show();
			 $("#checkout").hide();
		 }
		 
		 if(status == 4)
		 {
			 $("#check_intab").show();
			 $("#checkout").hide();
		 }
		 
		 if(status == 5)
		 {
			 $("#check_intab").hide();
		if(amount==0)
		 { alert(amount);
			 $("#checkout").show();
			 
		 }
		 else{
			 $("#checkout").hide();
		 }
		 }
		 */
		 
		  var amount = $("#due_amount").val();
		  
		  var date_checkin = $("#checkindate").val();
		  var date_checkout = $("#checkoutdate").val();
		
		 //alert(a);
		/* if(amount=='0')
		 {
			
			 $("#checkout").show();
			 
		 }*/
		$("#another-booking").hide();
		 
		 var status =$("#statusid").val();
		 //alert(status);
		  if(status == 1)
		 {
			  $("#edit-btn").hide();
			 $("#add_transaction").hide();
			 $("#invoice_billing").hide();
			 $("#checkout").hide();
		 }
		  if(status == 2)
		 {
			var d1 = new Date();
            var d2 = new Date(date_checkin);
             var d3 = new Date(date_checkout);
			if((d1.getTime() < d2.getTime()) || (d1.getTime()>d3.getTime())){
				$("#checkin-btn").hide();
			}
			$("#checkout").hide();
		 }
		 if(status == 4)
		 {
			var d1 = new Date();
            var d2 = new Date(date_checkin);
             var d3 = new Date(date_checkout);
			if((d1.getTime() < d2.getTime()) || (d1.getTime()>d3.getTime()) ){
				$("#checkin-btn").hide();
			}
			$("#checkout").hide();
			$("#cancel-booking").hide();
             if(d1.getTime()>d3.getTime()){
                 $("#cancel_booking_reataintion").show();

             }
		 }
		  if(status == 5)
		 {  
			$("#checkin-btn").hide();
			if(parseInt(amount)<=0)
			{
			
				$("#checkout").show();
			 
			}
			else{
				$("#checkout").hide();
			}
			$("#cancel-booking").hide();
		 }
		 if(status == 6)
		 {  
			$("#edit-btn").hide();
			 $("#add_transaction").hide();
			 $("#checkin-btn").hide();
			 $("#checkout").hide();
			 $("#cancel-booking").hide();

             var d1 = new Date();
             var month = d1.getMonth() + 1; //months from 1-12
             var day = d1.getDate();
             var year = d1.getFullYear();
             var hours = d1.getHours(); //returns 0-23
             var minutes = d1.getMinutes(); //returns 0-59
             var seconds = d1.getSeconds(); //returns 0-59

             var newdate = year + "/" + month + "/" + day+" "+hours+":"+minutes;

            // var newdate1 = year + "/" + month + "/" + day;

             var d2 = new Date(date_checkout);
             var month2 = d2.getMonth() + 1; //months from 1-12
             var day2 = d2.getDate();
             var year2 = d2.getFullYear();
             var hours2 = d2.getHours(); //returns 0-23
             var minutes2 = d2.getMinutes(); //returns 0-59
             var seconds2 = d2.getSeconds(); //returns 0-59

             var newdate2 = year2 + "/" + month2 + "/" + day2+" "+hours2+":"+minutes2;

//alert(newdate+"  "+newdate2);

             if(newdate<newdate2) {
                 $("#another-booking").show();
             }
		 }
		 if(status == 7)
		 {  
			$("#cancel-booking").hide();
			$("#edit-btn").hide();
			 $("#add_transaction").hide();
			 $("#checkin-btn").hide();
			 $("#checkout").hide();
			 $("#cancel-booking").hide();
			 $("#another-booking").show();
			 $("#invoice_billing").hide();
		 }
		 if(status == 8)
		 {  
			$("#cancel-booking").show();
			$("#edit-btn").show();
			 $("#add_transaction").hide();
			 $("#checkin-btn").hide();
			 $("#checkout").hide();
			 //$("#cancel-booking").hide();
			 $("#another-booking").hide();
			 $("#invoice_billing").hide();
		 }
		 if(status == 3)
		 {  
			$("#edit-btn").hide();
			 $("#add_transaction").hide();
			 $("#invoice_billing").hide();
			 $("#checkout").hide();
		 }


		
		 
				
	});
	</script>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/sweetdate/sweetalert.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/select2/select2.css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
	<script src="<?php echo base_url();?>assets/dashboard/daypilot/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
	<style>
	h1{

		font-size: 17px;
		margin-left:12px;
	    color: #45B6AF;
	   margin-top: 11px;
	    margin-bottom: 22px;
	    font-weight: bold;
	    text-align: left;
	}
	.btn-lg {
	   
	    margin-left: -13px;
	}
	.portlet.box.blue {
	    border:none;
	}
	.portlet.box.blue > .portlet-title {
	    background-color: #3598DC;
	    display: none;
	}
	.page-boxed .page-footer {
	    padding-left: 10px;
	    padding-right: 10px;
	    display: none;
	}
	.nav-justified > li {
	    float: left;
	    display: block;
		margin: -22px;
	}
	.form-wizard .steps > li > a.step {
	    background-color: #FFF;
	    background-image: none;
	    filter: none;
	    border: 0px none;
	    box-shadow: none;
	    display: block;
	}
	.form .form-actions {
	    padding: 0px 12px;
	    margin: 0px;
	    background: none;
	    border: none;
	}
	.page-footer, .page-boxed .page-footer {
	    padding-left: 10px;
	    padding-right: 10px;
	    display: none;
	}
	.form-wizard .steps {
	    /* width: 50px; */
	    padding: 0px 0px 0px 0px;
		margin-top: 0px;
	   margin-bottom: 19px;
	    
	    background-color: #fff;
	    background-image: none;
	    filter: none;
	    border: 0px;
	    box-shadow: none;
	}
	.nav-pills>li+li {
	    margin-left: 11px;
	}
	.form-wizard .steps > li > a.step > .number {
	   
	    margin-right: 4px;
	    
	}
	.form-wizard .progress {
	    /* margin-bottom: 30px; */
	    background: #45B6AF;
	    /* opacity: 0.8; */
	}
	.progress {
	    border: 0;
	    background-image: none;
	    filter: none;
	    box-shadow: none;
	    -webkit-box-shadow: none;
	    -moz-box-shadow: none;
	    box-shadow: none;
	}
	.progress {
	    height: 2px;
	    margin-bottom: 20px;
	    overflow: hidden;
	    background-color: #f5f5f5;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	}
	.form-wizard .progress {
	    margin-bottom: 0px;
	}
	.red.btn {
	    color: #FFFFFF;
	   /* background-color: rgba(45, 103, 121, 0.86)!important;*/
	   background:#A1A4AA;
		width: 100%;
		margin: 0 auto;
		border-radius:5px !important;
		-webkit-transition: 0.2s;
    -moz-transition: 0.2s;
    -o-transition: 0.2s;
    transition: 0.2s;
	
	    /* border-radius: 32px !important; */
	}
	button.btn.red.btn-lg.scnd {
	    background: #A1A4AA !important;
		width: 100%;
		margin-top:15px;
	}
	button.btn.red.btn-lg.scnd:hover,button.btn.red.btn-lg.scnd:active,button.btn.red.btn-lg.scnd:focus,button.btn.red.btn-lg.scnd.active{
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#d4bf93+0,cba28e+100 */
background: rgb(212,191,147)!important; /* Old browsers */
background: -moz-linear-gradient(45deg,  rgba(212,191,147,1) 0%, rgba(203,162,142,1) 100%)!important; /* FF3.6-15 */
background: -webkit-linear-gradient(45deg,  rgba(212,191,147,1) 0%,rgba(203,162,142,1) 100%)!important; /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(45deg,  rgba(212,191,147,1) 0%,rgba(203,162,142,1) 100%)!important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d4bf93', endColorstr='#cba28e',GradientType=1 )!important; /* IE6-9 fallback on horizontal gradient */

	}

.red.btn:hover,.red.btn:focus, .red.btn:active, .red.btn.active {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fca9b8+0,d67c7d+100 */
background: rgb(252,169,184)!important; /* Old browsers */
background: -moz-linear-gradient(45deg,  rgba(252,169,184,1) 0%, rgba(214,124,125,1) 100%)!important; /* FF3.6-15 */
background: -webkit-linear-gradient(45deg,  rgba(252,169,184,1) 0%,rgba(214,124,125,1) 100%)!important; /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(45deg,  rgba(252,169,184,1) 0%,rgba(214,124,125,1) 100%)!important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fca9b8', endColorstr='#d67c7d',GradientType=1 )!important; /* IE6-9 fallback on horizontal gradient */



}
	button.btn.red.btn-lg.thrd {
	    background: #A1A4AA !important;
		
		margin-top:15px;
		width: 100%;
   
	}
	
	button.btn.red.btn-lg.thrd:hover,button.btn.red.btn-lg.thrd:active,button.btn.red.btn-lg.thrd:focus,button.btn.red.btn-lg.thrd.active{
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#92d6e8+0,6d9baf+100 */
background: rgb(146,214,232)!important; /* Old browsers */
background: -moz-linear-gradient(45deg, rgba(146,214,232,1) 0%, rgba(109,155,175,1) 100%)!important; /* FF3.6-15 */
background: -webkit-linear-gradient(45deg, rgba(146,214,232,1) 0%,rgba(109,155,175,1) 100%)!important; /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(45deg, rgba(146,214,232,1) 0%,rgba(109,155,175,1) 100%)!important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#92d6e8', endColorstr='#6d9baf',GradientType=1 )!important; /* IE6-9 fallback on horizontal gradient */


	}
	
	button.btn.red.btn-lg.frth {
	    background:#A1A4AA !important;
		
		margin-top:15px;
		width: 100%;
   
	}
button.btn.red.btn-lg.frth:hover,button.btn.red.btn-lg.frth:active,button.btn.red.btn-lg.frth:focus,button.btn.red.btn-lg.frth.active{
		
		
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e0c0c6+0,ef0b0b+100 */
background: rgb(224,192,198)!important;; /* Old browsers */
background: -moz-linear-gradient(45deg, rgba(224,192,198,1) 0%, rgba(239,11,11,1) 100%)!important;; /* FF3.6-15 */
background: -webkit-linear-gradient(45deg, rgba(224,192,198,1) 0%,rgba(239,11,11,1) 100%)!important;; /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(45deg, rgba(224,192,198,1) 0%,rgba(239,11,11,1) 100%)!important;; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0c0c6', endColorstr='#ef0b0b',GradientType=1 )!important;; /* IE6-9 fallback on horizontal gradient */
	}

button.btn.red.btn-lg.ch {
   background:#A1A4AA !important;
	
	
}
button.btn.red.btn-lg.ch:hover,button.btn.red.btn-lg.ch:active,button.btn.red.btn-lg.ch:focus,button.btn.red.btn-lg.ch.active{
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#55edc7+0,39b9a1+100 */
background: rgb(85,237,199)!important; /* Old browsers */
background: -moz-linear-gradient(45deg,  rgba(85,237,199,1) 0%, rgba(57,185,161,1) 100%)!important; /* FF3.6-15 */
background: -webkit-linear-gradient(45deg,  rgba(85,237,199,1) 0%,rgba(57,185,161,1) 100%)!important; /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(45deg,  rgba(85,237,199,1) 0%,rgba(57,185,161,1) 100%)!important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#55edc7', endColorstr='#39b9a1',GradientType=1 )!important; /* IE6-9 fallback on horizontal gradient */



	
}



	</style>
   <!--  <script>
	 $("#add_transaction").click(function() {
			$('html, body').animate({
				scrollTop: $("#tab2").offset().top
			}, 2000);
		});
	</script> -->

     <script>
 
	$(document).ready(function(){
	$("#add_transaction").click(function() {
    $('html, body').animate({
        scrollTop: $(".form-actions").offset().top
    }, 2000);
    });
 	$("#invoice_billing").click(function() {
    $('html, body').animate({
        scrollTop: $(".form-actions").offset().top
    }, 2000);
    });
});
	</script>
	</head>
	<body class="page-header-fixed page-quick-sidebar-over-content ">
	
	<!-- BEGIN HEADER -->

	<!-- END HEADER -->
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
	<input type="hidden" id="statusid" value="<?php echo $booking_status_id ?>">
	<input type="hidden" id="checkindate" value="<?php echo $cust_from_date ?>">
	<input type="hidden" id="checkoutdate" value="<?php echo $cust_end_date ?>">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			
			<div class="page-sidebar navbar-collapse collapse">
				
			</div>
		</div>
		
		<div class="page-content-wrapper">
			<div class="page-content">
				
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue"  id="form_wizard_1">
							<div class="portlet-title">
								
								
							</div>
							<div class="portlet-body form">
								
									<div class="form-wizard">
										<div class="form-body" >
											<!--<ul class="nav nav-pills nav-justified steps">
												<li class="active">
													<a href="#tab1" data-toggle="tab" class="step">
													<span class="number">
													1 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Step1 </span>
													</a>
												</li>
												<li>
													<a href="#tab2" data-toggle="tab" class="step">
													<span class="number">
													2 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Step2 </span>
													</a>
												</li>
												<li>
													<a href="#tab3" data-toggle="tab" class="step active">
													<span class="number">
													3 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Step3 </span>
													</a>
												</li>
	                                            <li>
													<a href="#tab4" data-toggle="tab" class="step active">
													<span class="number">
													4 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Step4</span>
													</a>
												</li>
												
											</ul>
	                                        
											<div id="bar" class="progress progress-striped" role="progressbar">
												<div class="progress-bar progress-bar-success">
												</div>
											</div>-->
											<div class="modal-header" style="border:0px solid;padding-bottom: 0px;">
											<a href="javascript:close();">
						<i class="fa fa-times" style="float:right;font-size: 20px;color: black;opacity: 0.5;margin-top: -25px;margin-right: -18px;cursor: pointer;"> </i></a>
													
												 </div>
	                                        
											<div class="tab-content" id="Modal_Details">
											
												 
												
												<form action="bookings/hotel_backend_create" class="form-horizontal" id="f1" method="POST">
											<div class="tab-pane active" id="tab1">
                                            
													<h1><i class="icon-pin font-green"></i> Reservation Details</h1>
	                                                <table class=""  width="470" style="margin-left:13px;">
                                                        <tr>
                                                            <td>Booking Id: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php echo 'HM0'.$this->session->userdata('user_hotel').'00'.$booking_id ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Booking Status: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php
                                                                $status = $booking_status_id;
                                                                if($status==4){
                                                                    $status_data="Confirmed";
                                                                }else if($status==1){
                                                                    $status_data="Confirmed";
                                                                }else if($status==2){
                                                                    $status_data="Advance";
                                                                }else if($status==3){
                                                                    $status_data="Pending";
                                                                }else if($status==5){
                                                                    $status_data="Checked-In";
                                                                }else if($status==6){
                                                                    $status_data="Checked-Out";
                                                                }else if($status==8){
                                                                    $status_data="Incomplete";
                                                                }
                                                                else if($status==7){
                                                                    $status_data="Cancelled";
                                                                }
                                                                else{
                                                                    $status_data="undefined";
                                                                }


                                                                echo $status_data; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Booking Secondary Status: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php
                                                                $status_secondary = $booking_status_id_secondary;
                                                                if($status_secondary==3){
                                                                    $status_data2="Pending";
                                                                }
                                                                else if($status_secondary==9){
                                                                    $status_data2="Payment Due";
                                                                }
                                                                else{
                                                                    $status_data2="N/A";
                                                                }


                                                                echo $status_data2; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Guest Name:</td>
                                                            <td style="color:#364150; padding-left:50px;"><?php echo $cust_name; ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Guest Address:</td>
                                                            <td style="color:#364150; padding-left:50px;"><?php echo $cust_address; ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Guest Number:</td>
                                                            <td style="color:#364150;padding-left:50px;" ><?php echo $cust_contact_no; ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Check in date:</td>
                                                            <td style="color:#364150;padding-left:50px;" ><?php 
															$date_s =  date_create($cust_from_date);
															
															echo date_format($date_s,"d.M.Y") ; ?></td>
															
                                                        </tr>
														<tr>
                                                        	<td>Check in time:</td>
                                                            <td style="color:#364150;padding-left:50px;" ><?php 
															
															
															echo $checkin_time ; ?></td>
															
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Check Out date: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php 
															$date_e =  date_create($cust_end_date);
															echo date_format($date_e,"d.M.Y") ; ?></td>
                                                        </tr>
														<tr>
                                                        	<td>Check Out time: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php 
															echo $checkout_time ;  ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Room No: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php echo $room_no; ?></td>
                                                        </tr>
                                                        


														<tr>
                                                        	<td>Number of Guests:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $no_of_guest; ?> (Adult: <?php echo $no_of_adult; ?> + Child: <?php echo $no_of_child; ?> )</td>
                                                        </tr>
														
														<tr>
                                                        	<td>Booking Source:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $booking_source; ?></td>
                                                        </tr>
														<tr>
                                                        	<td>Broker name:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $broker_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Channel name:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $channel_name; ?></td>
                                                        </tr>
                                                        
                                                         <tr>
                                                        	<td>Total Amount:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $total_cost; ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Total Tax:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px; font-weight:normal;"></i>&nbsp;<?php echo $total_tax; ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Total Amount Payable : </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px; font-weight:normal;"></i>&nbsp;<?php echo $grand_total; ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td>Pending Amount: </td>
                                                    <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $due_amount; ?></td>
                                                        </tr>
                                                    </table>
                                                    <br><br>
												<?php 
														$cur_dt =  date('Y-m-d',strtotime($cust_from_date)); 
														$d =   date('Y-m-d');
												?>
												<?php if($cur_dt == $d ) { ?>
												<?php if(($booking_status_id=='2' || $booking_status_id=='3' || $booking_status_id=='4')) {  ?>
                                                 <!--<div class="form-actions" id="check_intab">
	                                                <div class="row">
	                                                     <div class="col-md-offset-3 col-md-9">
	                                                                
	                                                        <button class="btn red btn-lg ch" type="button" onClick="checkIn()" data-toggle="dropdown">Check In</button>
														   
														 </div>
													</div>
	                                               
													
												</div>-->
												<?php } ?>
												<?php } ?>
											</br>
													
	                                                	<!--action-->
	                                                    <div class="form-actions" id="checkin">
	                                                        <div class="row">
	                                                            <div class="col-md-offset-3 col-md-9">
	                                                                
	                                                                <!--<a href="javascript:;" class="btn blue button-next">
	                                                                Continue <i class="m-icon-swapright m-icon-white"></i>
	                                                                </a>-->
                                                                       <button class="btn red btn-lg ch" id="checkin-btn" type="button" onClick="checkIn()" data-toggle="dropdown"><div style="width:30px;float:left;"><i class="fa fa-bed" style="font-size:16px;"></i></div> Check In</button><br><br>
                                                                       
	                                                                 <button class="btn red btn-lg" id="edit-btn" type="button"  data-toggle="dropdown">
						<div style="width:30px;float:left;"> <i class="fa fa-pencil" style="font-size:16px;"></i> </div>
 Edit

															</button>
	                                                        
	                                      <!--<div class="tab-pane active" id="tab5">
												<form action="" class="form-horizontal" id="form1st" method="POST">
													<h1><i class="icon-pin font-green"></i> New Reservation</h1>
	                                                
	                                                <div>
	                                                <label>Room:</label>
	                                                    
	                                                <label>100 </label>
	                                                    <input type="hidden" id="room_id" name="room_id" value="" />
	                                                </div>
	                                             
													<div class="form-group">
													
													<!--<div class="form-actions">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
	                                                                <button class="btn red btn-lg " type="button" data-toggle="dropdown">Check In</button>
															</div>
														</div>
													</div>
													
													
														<label class="control-label col-md-3">Booking Type:</label>
														<div class="col-md-4">
															<select name="booking_type" id="booking_type" class="form-control" >
																<option value="">Select Booking Type</option>
																<!--<option value="AF">Temporary Hold</option>
																<option value="AL">Advance Booking</option>
																<option value="DZ">Current Booking</option>
																<!--<option value="AS">Group Booking</option>
																
																
																
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Guest Name: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="cust_name" id="cust_name" 
	                                                        placeholder="Guest Name"/>
															
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Guest Address: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="cust_address"
	                                                         placeholder=" Guest Address"/>
														</div>	
													</div>
	                                                
													<div class="form-group">
														<label class="control-label col-md-3">Guest Number: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="cust_contact_no"
	                                                         placeholder="Guest Number"/>
														</div>	
													</div>
	                                                
	                                                <div class="form-group">
														<label class="control-label col-md-3">Check in date: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="start_dt" value=""
	                                                         />
														</div>	
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Check Out date: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="end_dt"
	                                                         value=""/>
														</div>	
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Check in Time: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="start_time" value=""
	                                                         />
														</div>	
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Check Out Time: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="end_time"
	                                                         value=""/>
														</div>	
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Nature of visit:</label>
														<div class="col-md-4">
															<select name="nature_visit" id="nature_visit" class="form-control" placeholder=" Booking Type">
																
																<option value="AF">Travel & Leisure</option>
																<option value="AL">Business</option>
															</select>
														</div>
													</div>
	                                                
	                                                <div class="form-group">
														<label class="control-label col-md-3">Next Destination <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="next_destination"
	                                                         placeholder="Next Destination"/>
														</div>	
													</div>
	                                                
	                                        	
	                                        `<div class="form-actions">
	                                                        <div class="row">
	                                                            <div class="col-md-offset-3 col-md-9">
	                                                                
	                                                               <!-- <a href="javascript:void(0);"  id="submit" class="btn blue button-next">
	                                                                Continue <i class="m-icon-swapright m-icon-white"></i>
	                                                                </a>
																	<input name="Submit1" id="submit1" type="submit" class="btn blue button-next" value="Continue" style="margin-left:-10px;"/>
	                                                                 <a href="javascript:close();" class="btn default button-previous">
	                                                                
	                                                                 <i class="m-icon-swapright"></i> Cancel </a>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                              </form>  
												</div>-->                
	                                                        
	                                                        
	                                      <button id="add_transaction" class="btn red btn-lg scnd" type="button" data-toggle="dropdown" >
		<div style="width:30px;float:left;"> 		<i class="fa fa-plus-square" style="font-size:16px;"></i></div>
					Add Transaction 
									      </button>
	                              <div class="tab-pane" id="tab2">
								  
	                                      <div class="tab-pane" >
													<h1><i class="fa fa-money"></i> Add Transaction</h1>	
													<div class="form-group">
														<label class="control-label col-md-3">Booking Id<span class="required">*</span></label>
														<div class="col-md-4">
															<!--<select name="country" id="country_list" class="form-control" placeholder=" Booking Type"> 
	                                                       
																
																<option value="">----- Select Booking Id -----</option>
	                                                            <option value="">fdsdsdsds</option>
																
	                                                            
															</select>-->
															<input type="text" class="form-control" id="" name="card_number" value="<?php echo 'HM0'.$this->session->userdata('user_hotel').'00'.$booking_id ?>" 
	                                                        disabled="disabled"/>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Total Amount Paybale<span class="required">*</span></label>
														<div class="col-md-4">
															<!--<select name="country" id="country_list" class="form-control" placeholder=" Booking Type"> 
	                                                       
																
																<option value="">----- Select Booking Id -----</option>
	                                                            <option value="">fdsdsdsds</option>
																
	                                                            
															</select>-->
															<input type="text" required class="form-control" id="" name="card_number" value="<?php echo $grand_total; ?>" 
	                                                        disabled="disabled"/>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Due Amount<span class="required">*</span></label>
														<div class="col-md-4">
															<!--<select name="country" id="country_list" class="form-control" placeholder=" Booking Type"> 
	                                                       
																
																<option value="">----- Select Booking Id -----</option>
	                                                            <option value="">fdsdsdsds</option>
																
	                                                            
															</select>-->
															<input type="text" class="form-control" id="due_amount"  name="card_number" value="<?php echo $due_amount; ?>" 
	                                                        disabled="disabled"/>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Amount <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" id="add_amount" class="form-control" required name="card_number" placeholder="Give Amount" onblur="check_amount();"  required="required" />
                                                            <input type="hidden" id="booking_id" value="<?php  echo $booking_id; ?>">
															<input type="hidden" id="booking_status_id" value="<?php  echo $booking_status_id; ?>">
															<span class="help-block">
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Payment Mode <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<select name="country" class="form-control" placeholder=" Booking Type" id="pay_mode" onchange="swap_bank()">
	                                                       
																
																<option value="">----- Select Payment Mode -----</option>
	                                                            <option value="cash">Cash</option>
	                                                            <option value="debit">Debit Card</option>
	                                                            <option value="credit">Credit Card</option>
																
	                                                            
															</select>
														</div>
													</div>

													<div class="form-group" id="bank" style="display: none;">
														<label class="control-label col-md-3">Bank Name <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" placeholder="Bank name" id="bankname" >
														</div>
													</div>

													<!--<div class="form-group">
														<label class="control-label col-md-3">Payment Status <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<select name="payment_status" id="payment_status" class="form-control"> 
	                                                       
																
																<option value="">----- Select Payment Status  -----</option>
	                                                            <option value="pending">Pending</option>
	                                                            <option value="confirmed">Confirmed</option>
	                                                            
																
	                                                            
															</select>
														</div>
													</div>-->

													<div class="form-group">
														
														<div class="col-md-4">
															<button onclick=" return ajax_hotel_submit();" class="btn btn-primary" id="add_submit">Submit</button>
														</div>
													</div>

											
													<div class="form-group">
														<label class="control-label col-md-3">
														</label>
														<div class="col-md-4">
															<div class="checkbox-list">
																<label>
																  </label>
																<label>
																 </label>
															</div>
															<div id="form_payment_error">
															</div>
														</div>
													</div>
	                                                
	                                                		<!--action-->
	                                                           <!-- <div class="form-actions">
	                                                                <div class="row">
	                                                                    <div class="col-md-offset-3 col-md-9">
	                                                                        <a href="javascript:;" class="btn default button-previous" 
	                                                                        style=" margin-left:-10px;">
	                                                                       
	                                                                        <i class="m-icon-swapleft"></i> Back </a>
	                                                                        
	                                                                        <a href="javascript:;" class="btn green button-submit">
	                                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
	                                                                        </a>
	                                                                    </div>
	                                                                </div>
	                                                            </div>-->
										  
										  
											</div>
                                  </div>											
	                                        <!--end of action-->
												                 
	                                      
	                                                                 <button id="invoice_billing" class="btn red btn-lg thrd" type="button" data-toggle="dropdown">
                                 <div style="width:30px;float:left;"> <i class="fa fa-inr" style="font-size:16px;"></i> </div>                                   
															Invoice & Billing
															</button>
	                                                        
	                                                        <div class="tab-pane active" id="tab3">
												<h1 style="color: #32CFE0 !important;"> <i class="eicon-doc-text-inv"></i>Invoice & Billing</h1>	
	                                                           <div class="form-group">
	                                                             <label class="control-label col-md-3"></label>
	                                                              	<div class="col-md-4">
	                                                                  <label><b>Name:</b>&nbsp;&nbsp;<b style="color:#32CFE0;"><?php echo $cust_name; ?></b></label><br>
	                                                                  <label><b>Mobile no:</b>&nbsp;&nbsp;<b style="color:#32CFE0;"><?php echo $cust_contact_no;?></b></label><br>
	                                                                  <label><b>Address:</b>&nbsp;&nbsp;<b style="color:#32CFE0;"><?php echo $cust_address ?></b></label>
	                                         					<div class="col-xs-12">
							<table class="table table-striped table-hover">
							<thead>
								
							<tr>
								<th>#</th>
								<th>Transaction Id </th>
								<th>Payment Mode </th>
                                <th>Bank name </th>
                                <th>Amount </th>	
							</tr>
							</thead>
                            <?php 
							$count =  1;
							if($view_transaction){
							foreach($view_transaction as $row){ ?>
                            <tr>
                            	<td><?php echo $count;?></td>
                                <td><?php echo $row->t_id; ?></td>
                                <td><?php echo $row->t_payment_mode; ?></td>
                                <td><?php echo $row->t_bank_name; ?></td>
                                <td><?php echo $row->t_amount; ?></td>
                            </tr>
							<tbody>
							<tr>
							<?php 
							$count++;
							}}?>	
							<!--<tr>
								<td>
									1
								</td>
								<td>
									goods
								</td>
								<td >
									$556
								</td>
								<td class="hidden-480">
									 
								</td>
								<td class="hidden-480">
									
								</td>
								<!--<td>
									 $2152
								</td>-
							</tr>
							
							<tr>
								<td>
									 2
								</td>
								<td>
									 Furniture
								</td>
								<td class="hidden-480">
									 Office furniture purchase
								</td>
								<td class="hidden-480">
									 15
								</td>
								<td class="hidden-480">
									 $169
								</td>
								<td>
									 $4169
								</td>
							</tr>
							<tr>
								<td>
									 3
								</td>
								<td>
									 Foods
								</td>
								<td class="hidden-480">
									 Company Anual Dinner Catering
								</td>
								<td class="hidden-480">
									 69
								</td>
								<td class="hidden-480">
									 $49
								</td>
								<td>
									 $1260
								</td>
							</tr>
							<tr>
								<td>
									 3
								</td>
								<td>
									 Software
								</td>
								<td class="hidden-480">
									 Payment for Jan 2013
								</td>
								<td class="hidden-480">
									 149
								</td>
								<td class="hidden-480">
									 $12
								</td>
								<td>
									 $866
								</td>
							</tr>-->
							</tbody>
							</table>
						</div> 
	                    <ul class="list-unstyled amounts">
								<li>
									<strong>Total amount Paid: &nbsp;<b style="color:rgb(227, 91, 90);"><?php echo $paid_amount; ?></b></strong> 
								</li>
								<li>
									
								</li>
								<!--<li>
									<strong>VAT:</strong> -----
								</li>-->
								<li>
									<strong>Total Amount Remaining :&nbsp;<b style="color:rgb(227, 91, 90);"><?php echo ($grand_total - $paid_amount  ); ?></b></strong> 
								</li>
						</ul>                               
	                         <a class="btn btn-lg blue hidden-print" id="dwn_link" onclick="download_pdf();" style="margin-top:10px; float:right;">
							Download <i class="fa fa-download"></i>  </a>                                              
	                                                                         
	                                                                         
	                                                                    </div>
	                                                                    <div id="form_payment_error">
	                                                                    </div>
	                                                                </div>
	                                                            
													
													    
	                                                
	                                                		<!--action-->
	                                                            `<!--<div class="form-actions">
	                                                                <div class="row">
	                                                                    <div class="col-md-offset-3 col-md-9">
	                                                                        <a href="javascript:;" class="btn default button-previous">
	                                                                        <i class="m-icon-swapleft"></i> Back </a>
	                                                                        
	                                                                        <a href="javascript:;" class="btn green button-submit">
	                                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
	                                                                        </a>
	                                                                    </div>
	                                                                </div>
	                                                            </div>-->
	                                        	         <!--end of action-->
	                                            </div>
	                                       
												                
	                                                        
	                                                        
	       <button class="btn red btn-lg frth" id="checkout" onClick="return checkOut(<?php echo $total_cost; ?>,<?php echo $paid_amount; ?>,<?php echo $due_amount; ?>);" type="button" data-toggle="modal" href="#responsive">

		  <div style="width:30px;float:left;"><span class="glyphicon glyphicon-unchecked" style="font-size:16px;"></span>	</div>Checkout
															</button>

						<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Stay Details</h4>
										</div>
										<div class="modal-body">
											<div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
												<div class="row">
													<div class="col-md-12">
											<div class="beautyfull_msg" style="width:96%;padding:20px;border:1px solid rgb(148, 140, 140);border-radius: 8px !important;background:rgb(28, 175, 154); text-align:center;color:white;margin-bottom:20px !important; margin:0 auto;font-size: 23px;">
											Thank You So Much For Staying Here
											</div>

														<!--stay details things-->


														<table class=""  width="470" style="margin-left:13px;">
                                                        <tr>
                                                            <td>Booking Id: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php echo 'HM0'.$this->session->userdata('user_hotel').'00'.$booking_id ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Booking Status: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php
                                                                $status = $booking_status_id;
                                                                if($status==4){
                                                                    $status_data="Confirmed";
                                                                }else if($status==1){
                                                                    $status_data="Confirmed";
                                                                }else if($status==2){
                                                                    $status_data="Advance";
                                                                }else if($status==3){
                                                                    $status_data="Pending";
                                                                }else if($status==5){
                                                                    $status_data="Checked-In";
                                                                }else if($status==6){
                                                                    $status_data="Checked-Out";
                                                                }else if($status==8){
                                                                    $status_data="Incomplete";
                                                                }
                                                                else if($status==7){
                                                                    $status_data="Cancelled";
                                                                }
                                                                else{
                                                                    $status_data="undefined";
                                                                }


                                                                echo $status_data; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Booking Secondary Status: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php
                                                                $status_secondary = $booking_status_id_secondary;
                                                                if($status_secondary==3){
                                                                    $status_data2="Pending";
                                                                }
                                                                else if($status_secondary==9){
                                                                    $status_data2="Payment Due";
                                                                }
                                                                else{
                                                                    $status_data2="N/A";
                                                                }


                                                                echo $status_data2; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Guest Name:</td>
                                                            <td style="color:#364150; padding-left:50px;"><?php echo $cust_name; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Guest Address:</td>
                                                            <td style="color:#364150; padding-left:50px;"><?php echo $cust_address; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Guest Number:</td>
                                                            <td style="color:#364150;padding-left:50px;" ><?php echo $cust_contact_no; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Check in date:</td>
                                                            <td style="color:#364150;padding-left:50px;" ><?php
															$date_s =  date_create($cust_from_date);

															echo date_format($date_s,"d.M.Y") ; ?></td>

                                                        </tr>
														<tr>
                                                        	<td>Check in time:</td>
                                                            <td style="color:#364150;padding-left:50px;" ><?php


															echo $checkin_time ; ?></td>

                                                        </tr>

                                                        <tr>
                                                        	<td>Check Out date: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php
															$date_e =  date_create($cust_end_date);
															echo date_format($date_e,"d.M.Y") ; ?></td>
                                                        </tr>
														<tr>
                                                        	<td>Check Out time: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php
															echo $checkout_time ;  ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Room No: </td>
                                                            <td style="color:#364150;padding-left:50px;"><?php echo $room_no; ?></td>
                                                        </tr>



														<tr>
                                                        	<td>Number of Guests:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $no_of_guest; ?> (Adult: <?php echo $no_of_adult; ?> + Child: <?php echo $no_of_child; ?> )</td>
                                                        </tr>

														<tr>
                                                        	<td>Booking Source:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $booking_source; ?></td>
                                                        </tr>
														<tr>
                                                        	<td>Broker name:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $broker_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Channel name:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa " style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $channel_name; ?></td>
                                                        </tr>

                                                         <tr>
                                                        	<td>Total Amount:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $total_cost; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Total Tax:  </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px; font-weight:normal;"></i>&nbsp;<?php echo $total_tax; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Total Amount Payable : </td>
                                                            <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px; font-weight:normal;"></i>&nbsp;<?php echo $grand_total; ?></td>
                                                        </tr>

                                                        <tr>
                                                        	<td>Pending Amount: </td>
                                                    <td style="color:#364150;padding-left:50px;"><i class="fa fa-inr" style="font-size:12px;font-weight:normal;"></i>&nbsp;<?php echo $due_amount; ?></td>
                                                        </tr>
                                                    </table>
													<div style="margin-top:20px; width:100%; padding:10px;">

													<button type="button" onclick="send_mail()" class="btn blue pull-left">Send Mail</button>
                                                        <a class="btn green hidden-print" id="dwn_link2" onclick="download_pdf3();" style=" float:right;">
                                                            Generate Pdf <i class="fa fa-download"></i>  </a>
                                                    </div>

														<!--end stay deatails things-->
													</div>

												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Close</button>
											<button type="button" class="btn green">Save changes</button>
										</div>
									</div>
								</div>
							</div>




























	                                                        <div class="tab-pane" id="tab6">
												<h1 style="color: #755252 !important;"><span class="glyphicon glyphicon-check"></span>" Checkout</h1>

													<div class="form-group">
														<label class="control-label col-md-3">Total Amount <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="card_number" placeholder="Total Amount"/>


														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Pay Amount <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="card_number" placeholder="Pay Amount"/>


														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Pending Amount <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="card_number" placeholder="Pending Amount"/>


														</div>
													</div>




	                                                		<!--action-->
	                                                            `<div class="form-actions">
	                                                                <div class="row">
	                                                                    <div class="col-md-offset-3 col-md-9">
	                                                                        <a href="javascript:;" class="btn green "
	                                                                        style="width:80px;margin-left:-10px;"> Pay </a>

	                                                                        <!--<a href="javascript:;" class="btn green button-submit">
	                                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
	                                                                        </a>-->
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                        <!--end of action-->
												</div>
	                                              <button class="btn red btn-lg frth" id="cancel-booking" type="button" data-toggle="dropdown" onClick="return cancel();">
													<div style="width:30px;float:left;"> <i class="fa fa-times" style="font-size:16px;"> </i> </div> Cancel Booking
															</button>

												<!--<a href="<?php echo base_url();?>bookings/hotel_new_booking">-->

	                                              <button class="btn red btn-lg frth" id="another-booking"  type="button" data-toggle="modal" onClick="return another_booking();">
													<div style="width:30px;float:left;"><span class="fa fa-user-plus" style="font-size:16px;"></span>	</div>Take Another Booking
															</button>


							<div id="Add_Booking" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Responsive & Scrollable</h4>
										</div>
										<div class="modal-body">
                                            <?php

                                            $form = array(
                                                'class' 			=> 'form-body',
                                                'id'				=> 'form',
                                                'method'			=> 'post'
                                            );

                                            echo form_open_multipart('bookings/hotel_backend_create_basic',$form);

                                            ?>

                                            <div class="scroller" style="height:300px" width="700px" data-always-visible="1" data-rail-visible1="1">
											<!--pop new booking test-->



                                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                                        <input type="text" autocomplete="off" class="form-control" name="cust_name" required="required">
                                                        <label>Event Name <span class="required">*</span></label>
                                                        <span class="help-block">Enter Event Name...</span>
                                                    </div>

                                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                                        <input type="text" autocomplete="off" required="required" name="start_dt" class="form-control date-picker "  id="c_valid_from" >
                                                        <label>Event From <span class="required">*</span></label>


                                                        <label for="form_control_3"></label>
                                                        <span class="help-block">Enter Valid Date... </span>
                                                    </div>
                                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                                        <input type="text" autocomplete="off" required="required" name="end_dt" class="form-control date-picker" id="c_valid_upto" >
                                                        <label>Event Up to <span class="required">*</span></label>
                                                        <label for="form_control_2"></label>
                                                        <span class="help-block">Enter Valid Up to Date...  </span>
                                                    </div>
                                                <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">



                                                <br>


                                                <div class="clearfix"></div>


                                            </div>
                                            <br>
                                            <div class="form-actions noborder">
                                                <button type="submit" class="btn blue" >Submit</button>
                                                <button type="button" class="btn default">Reset</button>
                                            </div>
                                            <?php form_close(); ?>

											<!--pop new booking test-->
											</div>
										</div>
										<!--<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Close</button>
											<button type="button" class="btn green">Save changes</button>
										</div>-->
									</div>
								</div>



									 <button id="cancel_booking_reataintion" class="btn red btn-lg frth" type="button" data-toggle="dropdown" style="display:none;">
		<div style="width:30px;float:left;"> 		<i class="fa fa-times" style="font-size:16px;"></i></div>
					Cancel Booking
									      </button>
	                              <div class="tab-pane" id="tab12" style="display:none;">

	                                      <div class="tab-pane" >
													<h1 style="text-align:center;"><i class="fa fa-times"></i> Cancel Booking With Retaintion</h1>
													<div class="form-group">
														<label class="control-label col-md-3">Total Amount Due<span class="required">*</span></label>
														<div class="col-md-4">

															<input type="text" class="form-control" id="" name="" value="<?php echo $due_amount ?>" disabled="disabled"/>

														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Do you want to take Retaintion ?<span class="required">*</span></label>
														<div class="col-md-4">
															<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" onClick="yes()" > Yes </label>
											<label class="radio-inline">
											<input type="radio" name="optionsRadios" id="optionsRadios5" value="option2" onClick="no()" checked> No </label>

										</div>

														</div>
													</div>
                                              <div class="form-group" style="margin-top:20px;">

                                                  <div id="normal_cancel" class="col-md-4">
                                                      <button onclick=" cancel()" class="btn btn-primary" id="cancel_normal">Cancel Booking</button>
                                                  </div>
                                              </div>
									<div id="block" style="display:none;">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Enter Retintion Money<span class="required">*</span></label>
														<div class="col-md-4">

															<input type="text" class="form-control" id="ret_amount"  name="" value=""
	                                                        />
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Payment Mode <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<select id="ret_payment_mode" class="form-control" placeholder=" Booking Type">


																<option value="">----- Select Payment Mode -----</option>
	                                                            <option value="cash">Cash</option>
	                                                            <option value="debit">Debit Card</option>
	                                                            <option value="credit">Credit Card</option>


															</select>
														</div>
													</div>

													<div class="form-group" id="bank">
														<label class="control-label col-md-3">Bank Name
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" placeholder="Bank name" id="ret_bank" >
														</div>
													</div>

                                        <div class="form-group" style="margin-top:20px;">

                                            <div class="col-md-4">
                                                <button onclick="cancel_retention() " class="btn btn-primary" id="">Cancel Booking With Retention</button>
                                            </div>
                                        </div>


                                      </div>




													<div class="form-group">
														<label class="control-label col-md-3">
														</label>
														<div class="col-md-4">
															<div class="checkbox-list">
																<label>
																  </label>
																<label>
																 </label>
															</div>
															<div id="form_payment_error">
															</div>
														</div>
													</div>

	                                                		<!--action-->
	                                                          <!--  <div class="form-actions">
	                                                                <div class="row">
	                                                                    <div class="col-md-offset-3 col-md-9">
	                                                                        <a href="javascript:;" class="btn default button-previous"
	                                                                        style=" margin-left:-10px;">

	                                                                        <i class="m-icon-swapleft"></i> Back </a>

	                                                                        <a href="javascript:;" class="btn green button-submit">
	                                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
	                                                                        </a>
	                                                                    </div>
	                                                                </div>
	                                                            </div>-->


											</div>
                                  </div>








							</div>










	                                                        <!--end of button check out-->
	                                                            </div>
	                                                        </div>
	                                                    </div>

	                                        <!--end of action-->

												</div>
	                                            </form>
												<!--<div class="tab-pane" id="tab2">
													<div>
	                                                <label>Room:</label>

	                                                <label>102</label>
	                                                    <input type="hidden" id="room_id" name="room_id" value="" />
	                                                </div>

													<div class="form-group">
														<label class="control-label col-md-3">Booking Type:</label>
														<div class="col-md-4">
															<select name="country" id="country_list" class="form-control" placeholder=" Booking Type" disabled="disabled">

																<option value="AF">Temporary Hold</option>
																<option value="AL">Advance Booking</option>
																<option value="DZ">Current Booking</option>
																<option value="AS">Group Booking</option>



															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Guest Name: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="password" id="submit_form_password"
	                                                        placeholder=" Guest Name" disabled="disabled"/>

														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Guest Address: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder=" Guest Address" disabled="disabled"/>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Guest Number: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Guest Number" disabled="disabled"/>
														</div>
													</div>

	                                                <div class="form-group">
														<label class="control-label col-md-3">Check in date: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="01-10-2015" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Check Out date: <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="02-10-2015" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Nature of visit:</label>
														<div class="col-md-4">
															<select name="country" id="country_list" class="form-control" placeholder=" Booking Type"
	                                                        disabled="disabled">

																<option value="AF">Travel & Leisure</option>
																<option value="AL">Business</option>
															</select>
														</div>
													</div>

	                                                <div class="form-group">
														<label class="control-label col-md-3">Next Destination <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Next Destination" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Base Room Rent <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Base Room Rent" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Room rent modifier <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Room rent modifier" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Discount Coupon <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Discount Coupon" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Broker Name <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Broker Name" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Broker commission <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="rpassword"
	                                                         placeholder="Broker commission" disabled="disabled"/>
														</div>
													</div>
	                                                <div class="form-group">
														<label class="control-label col-md-3">Additional Services <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<div class="checkbox-list">
																<label>
																<input type="checkbox" name="payment[]" value="1" data-title="Auto-Pay with this
	                                                            Credit Card." disabled="disabled"/> AC </label>
																<label>
																<input type="checkbox" name="payment[]" value="2" data-title="Email me monthly
	                                                            billing." disabled="disabled"/> Additional Bed </label>
	                                                            <label>
																<input type="checkbox" name="payment[]" value="3" data-title="Email me monthly
	                                                            billing." disabled="disabled"/> Room Service </label>
	                                                            <label>
																<input type="checkbox" name="payment[]" value="4" data-title="Email me monthly
	                                                            billing." disabled="disabled"/> Breakfast </label>
	                                                            <label>
																<input type="checkbox" name="payment[]" value="5" data-title="Email me monthly
	                                                            billing." disabled="disabled"/> Swimming Pool </label>


															</div>
															<div id="form_payment_error">
															</div>
														</div>
													</div>

	                                                <div class="form-group">
														<label class="control-label col-md-3">Comment for booking</label>
														<div class="col-md-4">
															<textarea class="form-control" rows="3" name="remarks" disabled="disabled"></textarea>
														</div>
													</div>
	                                                	<!--action
	                                        	`<div class="form-actions">
	                                                <div class="row">
	                                                    <div class="col-md-offset-3 col-md-9">
	                                                        <a href="javascript:;" class="btn default button-previous">
	                                                        <i class="m-icon-swapleft"></i> Back </a>
	                                                        <a href="javascript:;" class="btn blue button-next">
	                                                        Continue <i class="m-icon-swapright m-icon-white"></i>
	                                                        </a>

	                                                    </div>
	                                                </div>
	                                            </div>

	                                        <!--end of action
												</div>-->

												<!--<div class="tab-pane" id="tab3">

													<div class="form-group">
														<label class="control-label col-md-3">Payment Mode</label>
														<div class="col-md-4">
															<select name="country" id="country_list" class="form-control" placeholder=" Booking Type"
	                                                        disabled="disabled">

																<option value="cod">COD</option>
																<option value="Debit Card">Debit Card</option>
	                                                            <option value="Credit Card">Credit Card</option>

															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Bank Name <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="card_number" placeholder="Bank Name"
	                                                        disabled="disabled"/>
															<span class="help-block">
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Payment Amount <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" placeholder="" class="form-control" name="card_cvc"
	                                                        placeholder= "Payment Amount " disabled="disabled"/>
															<span class="help-block">
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">
														</label>
														<div class="col-md-4">
															<input type="text"  maxlength="7" class="form-control" name="card_expiry_date" style="border:none;"/>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">
														</label>
														<div class="col-md-4">
															<div class="checkbox-list">
																<label>
																  </label>
																<label>
																 </label>
															</div>
															<div id="form_payment_error">
															</div>
														</div>
													</div>

	                                                		<!--action
	                                                            `<div class="form-actions">
	                                                                <div class="row">
	                                                                    <div class="col-md-offset-3 col-md-9">
	                                                                        <a href="javascript:;" class="btn default button-previous">
	                                                                        <i class="m-icon-swapleft"></i> Back </a>

	                                                                        <a href="javascript:;" class="btn green button-submit">
	                                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
	                                                                        </a>
	                                                                    </div>
	                                                                </div>
	                                                            </div>

	                                        <!--end of action
												</div>-->

											</div>
										</div>

									</div>

							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>

	</div>

	<script type="text/javascript">
	        function close(result) {
	            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                    window.parent.location.reload();
                    //$( "#booking_calendar" ).load( "<?php echo base_url() ?>dashboard/calendar_load" );
	                //parent.DayPilot.ModalStatic.close(result);




	            }
	        }



	        $("#f").submit(function () {
	            var f = $("#f");
	            $.post(f.attr("action"), f.serialize(), function (result) {
	                close(eval(result));
	            });
	            return false;
	        });


	        $(document).ready(function () {

	            $("#name").focus();

	            $("#add_transaction").click(function(){

	            	$("#tab2").toggle();
	            });

	    $("#invoice_billing").click(function(){

	  	$("#tab3").toggle();

	  });

	  $("#cancel_booking_reataintion").click(function(){

	  	$("#tab12").toggle();

	  });

	    $("#add_submit").click(function(){

	    	//alert("submit");

	    });

	    /*$("#add_submit").click(function(){


	  	//alert("bbbb");

		//alert(booking_id);

			return false;
	 	});*/


});//end of document.ready

	        </script>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->

	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>

	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
	jQuery(document).ready(function() {
	   // initiate layout and plugins
	   Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	   FormWizard.init();

});
	</script>
    <script type="text/javascript">
		function ajax_hotel_submit()
		{
				//alert($("#add_amount").val());
				var booking_id = $("#booking_id").val();
				var booking_status_id = $("#booking_status_id").val();
				var add_amount = $("#add_amount").val();
				var pay_mode   = $("#pay_mode").val();
				var bankname   = $("#bankname").val();
				var payment_status = $("#payment_status").val();
				if($("#add_amount").val() == null || $("#add_amount").val() ==0 )
				{
					//alert('Error');
					swal({
                                    title: "Error",
                                    text: "An Error Occurd",
                                    type: "warning"
                                },
                                function(){
                                    //location.reload();
                                });
					return false;
				}
				else{
				jQuery.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>bookings/add_booking_transaction",
					dataType: 'json',
					data: {t_booking_id:booking_id,t_booking_status_id:booking_status_id,t_amount:add_amount,t_payment_mode:pay_mode,t_bank_name:bankname,t_status:payment_status },
					success: function(data){
						//alert('Add Successfull');
						swal({
                                    title: "Add Successfull",
                                    text: "Your Payment Is Taken",
                                    type: "success"
                                },
                                function(){
									
										
						$("#booking_id").val(' ');
						$("#booking_status_id").val(' ');
						$("#add_amount").val(' ');
						$("#pay_mode").val(' ');
						$("#bankname").val(' ');
						$("#payment_status").val(' ');
						$('#tab2').hide();
						location.reload();
                                    
                                });
					
					}
				});
				}
	    	return false;
		}
	</script>

    <script>

function download_pdf2()
{
	$.ajax(
		{
			type: "POST",
			url: "<?php echo base_url();?>Dashboard/",
			data:
			{
				term:a
			}
		}
	).done(
		function(data)
		{
			//console.log(data);
			//$("#d").html(data);
		}
	);

	$("#bank_name").hide();

	  $("#pay_mode").change(function(){

	    if($("#pay_mode").val()=='debit' || $("#pay_mode").val()=='credit')
	    {
			$("#bank_name").show();
	    }

	    else
	    {
	    	$("#bank_name").hide();
	    }
	  });

}


function download_pdf() {
	var booking_id = $('#booking_id').val();
	 //$.post("<?php echo base_url();?>bookings/pdf_generate");
	$("#dwn_link").attr("href", "<?php echo base_url();?>bookings/pdf_generate?booking_id=" + booking_id);
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
	 return false;
}
function download_pdf3() {

    var booking_id = $('#booking_id').val();
    //$.post("<?php echo base_url();?>bookings/pdf_generate");
    $("#dwn_link2").attr("href", "<?php echo base_url();?>bookings/pdf_generate?booking_id=" + booking_id);
    var f = $("#f");
    $.post(f.attr("action"), f.serialize(), function (result) {
        close(eval(result));
    });
    return false;
}


function checkIn()
{
	var booking_id =  $("#booking_id").val();
	$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>dashboard/checkin_submission",
			data:{booking_id:booking_id},
			success:function(data)
			{
				//alert("Checked-In Successfully");
				//location.reload();
				swal({
                                    title: "Checked-In Successfully",
                                    text: "You Are Checked-In Successfully",
                                    type: "success"
                                },
                                function(){
                                    location.reload();
                                });
			}
		});
}

function checkOut(total, paid,due)
{
	var booking_id =  $("#booking_id").val();
    var date_checkout = $("#checkoutdate").val();
	if((parseInt(due))<=0)
	{
		//alert('Checkedout Successful');
		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>dashboard/checkout_submission",
			data:{booking_id:booking_id,date_checkout:date_checkout},
			success:function(data)
			{
				//alert("Checked Out");
				swal({
                                    title: "Checked Out",
                                    text: "You Are Checked Out ",
                                    type: "success"
                                },
                                function(){
                                   // location.reload();
                                });



			}
		});
	}
	else
	{
		$('#tab2').show();
	}
}
function send_mail(){
    var booking_id =  $("#booking_id").val();
    var date_checkin = $("#checkindate").val();
    var date_checkout = $("#checkoutdate").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url()?>dashboard/send_mail",
        data: {booking_id: booking_id},
        success: function (data) {
          //  alert(data);
            swal({
                    title: data,
                    text: "Email Sent Sucessfully",
                    type: "success"
                },
                function(){
                    location.reload();
                });
        }
    });


}
function cancel()
{ var booking_id =  $("#booking_id").val();
    var date_checkin = $("#checkindate").val();
    var date_checkout = $("#checkoutdate").val();
    var d1 = new Date();
    var d2 = new Date(date_checkin);
    var d3 = new Date(date_checkout);



        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>dashboard/cancel_submission",
            data: {booking_id: booking_id},
            success: function (data) {
                swal({
                        title: "Booking Cancelled",
                        text: "Booking is cancelled",
                        type: "warning"
                    },
                    function(){
                        location.reload();
                    });
            }
        });


}

function cancel_retention()
{ var booking_id =  $("#booking_id").val();
    var date_checkin = $("#checkindate").val();
    var date_checkout = $("#checkoutdate").val();
    var amount=$("#ret_amount").val();
    var mode=$("#ret_payment_mode").val();
    var bank=$("#ret_bank").val();
    var d1 = new Date();
    var d2 = new Date(date_checkin);
    var d3 = new Date(date_checkout);



    $.ajax({
        type: "POST",
        url: "<?php echo base_url()?>dashboard/cancel_submission_retention",
        data: {booking_id: booking_id, amount:amount,mode:mode,bank:bank},
        success: function (data) {
            swal({
                    title: "Retention Money Taken",
                    text: "Retention  money is taken and a transaction is added",
                    type: "success"
                },
                function(){
                    location.reload();
                });
        }
    });


}

function another_booking()
{
   // alert("dasd");
   // var booking_id =  $("#booking_id").val();

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    }

    if(mm<10) {
        mm='0'+mm
    }

    today = yyyy+'-'+mm+'-'+dd;
    //alert(today);


    $.ajax({
        type:"POST",
        url: "<?php echo base_url()?>bookings/hotel_backend_create_basic",
        data:{room_id:<?php echo $room_id ?>,start_dt:today,end_dt:today, cust_name: 'New Guest'},
        success:function(data)
        {
           // alert('Booking Event Generated');
            //location.reload();
			swal({
                                    title: "Booking Event Generated",
                                    text: "A blank booking event is created",
                                    type: "success"
                                },
                                function(){
                                    location.reload();
                                });
        }
    });


}

/*function another_booking()
{
    dp.onEventClick = function(args) {
        var modal = new DayPilot.Modal();
        modal.closed = function() {
            // reload all events
            var data = this.result;
            if (data && data.result === "OK") {
                loadEvents();
            }
        };
        modal.showUrl("<?php echo base_url();?>bookings/hotel_new_booking?id=" + args.e.id());
    };

}*/
function swap_bank(){
    var mode= $('#pay_mode').val();

    if(mode=="debit" || mode=="credit"){
        document.getElementById("bank").style.display="block";
    }
    else{
        document.getElementById("bank").style.display="none";
    }
}

function check_amount()
{
	var amount = $("#add_amount").val();
	//alert(amount);
	var due_amount  = $("#due_amount").val();
	//alert(due_amount);
	if(parseInt(amount) > parseInt(due_amount))
	{
		//alert("The amount should be less than the due amount Rs: "+due_amount);
		swal({
                                    title: "Amount Should Be Smaller",
                                    text: "(The amount should be less than the due amount Rs: +due_amount)",
                                    type: "warning"
                                },
                                function(){
                                    //location.reload();
                                });
		$("#add_amount").val("");
		return false;
	}
	else{
		return true;
	}
}
function yes()
{
document.getElementById('block').style.display= 'block';
    document.getElementById('cancel_normal').style.display= 'none';
}
function no()
{
    document.getElementById('cancel_normal').style.display= 'block';
document.getElementById('block').style.display= 'none';
}
$(this).modal({
    backdrop: 'static',
    keyboard: false
})
</script>


    <script type="text/<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/clockface/js/clockface.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/admin/pages/scripts/components-pickers.js"></script>
    <script src="<?php echo base_url();?>assets/dashboard/sweetdate/sweetalert.min.js" type="text/javascript"/></script>





    </body>
	<!-- END BODY -->
	</html>