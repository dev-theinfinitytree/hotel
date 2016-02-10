<?php 
foreach ($rooms as $room) {
    $room_no = $room->room_no;   
	$room_rent = $room->room_rent;
}
$start_dt = date("d-m-Y", strtotime($start));
$end_dt = date("d-m-Y", strtotime($end));
$start_time = date("H:i:s", strtotime($start));
$end_time = date("H:i:s", strtotime($end));
?>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
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

.form-body {
    height: auto !important;
}
h1{

	font-size: 24px;
    color: #45B6AF;
	margin-top: 13px;
    font-weight: 500;
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
.btn red{
	margin-top:10px;
}

.green.btn {
    color: #FFFFFF;
    background-color: #1CAF9A !important;
	margin-top: 42px;
	margin-left: 10px;
}
.green.btn.frst{
	margin-left: 87px;
}
.radio-inline {
    padding-top: 7px;
    margin-left: 23px;
    margin-top: 0;
    margin-bottom: 0;
}
</style>

<script>

function download_pdf()
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
}

</script>
<!-- BEGIN HEADER -->

<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container" style="height:auto;">
	<!-- BEGIN SIDEBAR -->
	
	
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue">
						
						<div class="portlet-body form">
							
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li id="istli">
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Step1 </span>
												</a>
											</li>
											<li id="2ndli">
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Step2 </span>
												</a>
											</li>
											<li id="3rdli">
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Step3 </span>
												</a>
											</li>
											<!--<li>
												<a href="#tab4" data-toggle="tab" class="step active">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Step4 </span>
												</a>
											</li>-->
											
										</ul>
										<!--<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>-->
										<div class="tab-content">
											
											
											<div class="tab-pane active" id="tab1">
											<form action="" class="form-horizontal" id="form1st" method="POST">
												<h1>New Reservation</h1>
                                                
                                                <div>
                                                <label>Room:</label>
                                                    
                                                <label><?php echo $room_no; ?> </label>
                                                    <input type="hidden" id="room_id" name="room_id" value="<?php echo $resource; ?>" />
                                                </div>
                                             
												<div class="form-group">
													<label class="control-label col-md-3">Booking Type:</label>
													<div class="col-md-4">
														<select name="booking_type" id="booking_type" class="form-control" >
															<option value="">Select Booking Type</option>
															<!--<option value="AF">Temporary Hold</option>-->
															<option value="AL">Advance Booking</option>
															<option value="DZ">Current Booking</option>
															<!--<option value="AS">Group Booking</option>-->
															
															
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Guest Type:</label>
													<div class="col-md-4">
														<select name="booking_type" id="booking_type" class="form-control" >
															<option value="">Select Booking Type</option>
															<!--<option value="AF">Temporary Hold</option>-->
															<option value="AL">Advance Booking</option>
															<option value="DZ">Current Booking</option>
															<!--<option value="AS">Group Booking</option>-->
															
															
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Guest Name: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" onkeypress="return onlyLtrs(event, this);" class="form-control" name="cust_name" id="cust_name" 
                                                        placeholder="Guest Name"/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Guest Address: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" class="form-control" name="cust_address"
                                                         placeholder=" Guest Address"/>
													</div>	
												</div>
                                                
												<div class="form-group">
													<label class="control-label col-md-3">Mobile Number: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" maxlength="10" onkeypress="return onlyNos(event,this);" class="form-control" name="cust_contact_no"
                                                         placeholder="Guest Number"/>
													</div>	
												</div>
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Check in date: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required"  class="form-control" name="start_dt" value="<?php echo $start_dt; ?>"
                                                         />
													</div>	
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Check Out date: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input  required="required" type="text" class="form-control" name="end_dt"
                                                         value="<?php echo $end_dt; ?>"/>
													</div>	
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Check in Time: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<!--<input type="text" required="required" class="form-control" name="start_time" value="<?php echo $start_time; ?>"
                                                         />-->

													</div>	
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Check Out Time: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" class="form-control" name="end_time"
                                                         value="<?php echo $end_time; ?>"/>
													</div>	
												</div>
                                             
                                                <div class="form-group">
													<label class="control-label col-md-3">Nature of visit:</label>
													<div class="col-md-4">
														<select name="nature_visit" id="nature_visit" class="form-control" placeholder=" Booking Type">
															
															<option value="Travel & Leisure">Travel & Leisure</option>
															<option value="Business">Business</option>
														</select>
													</div>
												</div>
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Next Destination <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" class="form-control" name="next_destination"
                                                         placeholder="Next Destination"/>
													</div>	
												</div>
                                                
                                        	
                                        `<div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                
                                                               <!-- <a href="javascript:void(0);"  id="submit" class="btn blue button-next">
                                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                                                </a>-->
																<input name="Submit1" id="submit1" type="submit" class="btn blue button-next" value="Continue" />
                                                                 <a href="javascript:close();" class="btn default button-previous">
                                                                 <i class="m-icon-swapright"></i> Cancel </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </form>  
											</div>
                                            
											
											
											
											<div class="tab-pane" id="tab2">
											<form action="" class="form-horizontal" id="form2nd" method="POST">	
												<div class="form-group">
													<label class="control-label col-md-3">Base Room Rent <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="base_room_rent"
                                                         placeholder="Base Room Rent" value="<?php echo $room_rent; ?>"/>
													</div>	
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Room rent Action <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<!--<input type="radio" class="form-control" name="rent_mode_type" id="rent_mode_type" value="p" /> Addition
														<input type="radio" class="form-control" name="rent_mode_type" id="rent_mode_type" value="s" /> Substraction-->
													
                                                                <div class="radio-list">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> 
                                                        Addition</label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Substraction 
                                                        </label>
                                                        
                                                           </div>
                                                     </div>      	
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Room rent modifier <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" class="form-control" name="mod_room_rent"
                                                         placeholder="Room rent modifier" value="" onkeypress="return onlyNos(event,this);" />
													</div>	
												</div>
                                               <!-- <div class="form-group">
													<label class="control-label col-md-3">Discount Coupon <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="rpassword"
                                                         placeholder="Discount Coupon"/>
													</div>	
												</div>-->
                                                <!--<div class="form-group">
													<label class="control-label col-md-3">Broker Name <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="rpassword"
                                                         placeholder="Broker Name"/>
													</div>	
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Broker commission <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="rpassword"
                                                         placeholder="Broker commission"/>
													</div>	
												</div>-->
                                                <!--<div class="form-group">
													<label class="control-label col-md-3">Additional Services <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="checkbox" name="addition_services[]" value="AC" data-title="Auto-Pay with this 
                                                            Credit Card."/> AC </label>
															<label>
															<input type="checkbox" name="addition_services[]" value="Additional Bed" data-title="Email me monthly 
                                                            billing."/> Additional Bed </label>
                                                            <label>
															<input type="checkbox" name="addition_services[]" value="Room Service" data-title="Email me monthly 
                                                            billing."/> Room Service </label>
                                                            <label>
															<input type="checkbox" name="addition_services[]" value="Breakfast" data-title="Email me monthly 
                                                            billing."/> Breakfast </label>
                                                            <label>
															<input type="checkbox" name="addition_services[]" value="Swimming Pool" data-title="Email me monthly 
                                                            billing."/> Swimming Pool </label>
                                                            
															
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>-->
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Comment for booking</label>
													<div class="col-md-4">
														<textarea class="form-control" rows="3" name="comment"></textarea>
													</div>
												</div>
                                                	<!--action-->
                                                    `<div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                
                                                                <!--<a href="javascript:;" class="btn blue button-next">
                                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                                                </a>-->
																<input type="hidden" name="booking_1st" id="booking_1st" value="" /> 
																<input name="Submit2" id="submit2" type="submit" class="btn blue button-next" value="Continue" />
                                                                 <a href="javascript:close();" class="btn default button-previous">
                                                                 <i class="m-icon-swapright"></i> Cancel </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                        	
                                        <!--end of action-->
											</form>
											</div>
											
											<!--<div class="tab-pane" id="tab3">
												
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
												
                                        	
                                       
											</div>-->
											
											
											<div class="tab-pane"  id="tab4">
											<form action="" class="form-horizontal" id="form4th" method="POST">	
											<div class="form-group">
													<label class="control-label col-md-3">Payment Mode</label>
													<div class="col-md-4">
														<select name="t_payment_mode" id="t_payment_mode" class="form-control" placeholder=" 
                                                        Booking Type" onchange="payment_mode_change();">
															
															<option value="cod">COD</option>
															<option value="Debit Card">Debit Card</option>
                                                            <option value="Credit Card">Credit Card</option>
                                                            
														</select>
													</div>
												</div>
												<div class="form-group" id="bank">
													<label class="control-label col-md-3">Bank Name <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text"  required="required" onkeypress="return onlyLtrs();" class="form-control" name="t_bank_name" placeholder="Bank Name" 
                                                        />
														<span class="help-block">
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Payment Amount <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required="required" onkeypress="return onlyNos(event, this);" placeholder="" class="form-control" name="t_amount" 
                                                        placeholder= "Payment Amount " />
														<span class="help-block">
														</span>
													</div>
												</div>
												
												
                                                
                                                
                                                		<!--action-->
                                                            `<div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <!--<a href="javascript:;" class="btn default button-previous">
                                                                        <i class="m-icon-swapleft"></i> Back </a>-->
                                                                        <input type="hidden" name="booking_3rd" id="booking_3rd" value="" /> 
																		<input name="Submit4" id="submit4" type="submit" class="btn blue button-next" value="Submit" />
                                                                        <!--<a href="javascript:;" class="btn green button-submit">
                                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
                                                                        </a>-->
                                                                    <div class="clearfix"></div> 
                                                                    
                                                             
                                                                    </div>
                                                                </div>
                                                            </div>
												</form>
												<form action="<?php echo base_url();?>bookings/popup_close" class="form-horizontal" id="f" method="POST">	
												<div class="new-btn" id="print_tab">  
												<input type="hidden" name="booking_3rd" id="booking_3rd" value="" /> 
                                                                     <!--<button class="btn green frst" type="button" data-toggle="dropdown" 
                                                                      onclick="javascript:window.print();">
                                                                    Print<i class="glyphicon glyphicon-print" style="margin-left:10px;"></i>
                                                                    </button>-->
                                                                    
                                                                    <a class="btn green" id="dwn_link" href=""  onclick="download_pdf();">
                                                                    Download<i class="glyphicon glyphicon-download" style="margin-left:6px;"></i>
                                                                    </a>
																	
                                                                    <a  onclick=
                                                                            "openview()" class="btn green"> 
                                                                    View <i class="fa fa-eye" style="margin-left:4px;"></i>
                                                                    </a>
																	
																	<a onclick=
                                                                            "openview1()" class="btn green">
																	 Close </a>
                                                                    </div>
																	</form>
											</div>
                                            
                                              
                                            
										
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
	
	
</div>


<script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }
		
		/*function submit_1st() {
           var f1 = $("#form1st");
             $.ajax({
    type: "POST",
    url: "bin/process.php",
    data: dataString,
    success: function() {
      //display message back to user here
    }
  });
  return false;
			 
            //return false;
        }*/
$(document).ready(function() {
	$('#bank').hide();
	$('#istli').addClass("active");
	
	
	$("#form1st").validate({
		submitHandler: function() {
			$.post("<?php echo base_url();?>bookings/hotel_backend_create", 
				$("#form1st").serialize(), 
				function(data){
					$('#booking_1st').val(data.bookings_id);
					$('#tab1').hide();
					$('#tab2').show();
					$('#istli').removeClass("active");
					$('#2ndli').addClass("active");
			});
			return false; //don't let the page refresh on submit.
			
		}
	}); 
	
	$("#form2nd").validate({
		submitHandler: function() {
			$.post("<?php echo base_url();?>bookings/hotel_backend_create2", 
				$("#form2nd").serialize(), 
				function(data){
					$('#booking_3rd').val(data.bookings_id);
					$('#tab2').hide();
					$('#tab4').show();
					$('#print_tab').hide();
					$('#2ndli').removeClass("active");
					$('#3rdli').addClass("active");
			});
			return false; //don't let the page refresh on submit.
			
		}
	}); 
	
	$("#form4th").validate({
		submitHandler: function() {
			$.post("<?php echo base_url();?>bookings/hotel_backend_create4", 
				$("#form4th").serialize(), 
				function(data){
					$('#booking_3rd').val(data.bookings_id);
					$("#submit4").prop("disabled", true);
					$('#print_tab').show();
					
			});
			return false; //don't let the page refresh on submit.
			
		}
	}); 
	
}); 




        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
		
		<script>
		function submit_form()
{
	
	  var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
	
}
function download_pdf() {
	var booking_id = $('#booking_3rd').val();
	 //$.post("<?php echo base_url();?>bookings/pdf_generate");
	$("#dwn_link").attr("href", "<?php echo base_url();?>bookings/pdf_generate?booking_id=" + booking_id);
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
	 return false;
}

function payment_mode_change()
{
	var p = $('#t_payment_mode').val();
	//alert(p);
	if(p=='cod')
	{
		$('#bank').hide();
	}
	else
	{
		$('#bank').show();
	}	
}	

function openview() {
	var booking_id = $('#booking_3rd').val();
	 window.open("<?php echo base_url();?>bookings/invoice_generate?booking_id=" + booking_id);
	//$('#f').submit();
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
	//alert(booking_id);
	//submit_form();
   
	
	/*$("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });*/
}

function openview1() {
	//var booking_id = $('#booking_3rd').val();
	 //window.open("<?php echo base_url();?>bookings/invoice_generate?booking_id=" + booking_id);
	//$('#f').submit();
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
}
</script>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
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




function onlyNos(e, t) {
	try {
		if (window.event) {
			var charCode = window.event.keyCode;
		}
		else if (e) {
			var charCode = e.which;
		}
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	catch (err) {
		alert(err.Description);
	}
}
/* 11.17.2015*/
function onlyLtrs(e, t)
{
		
	try {
		if (window.event) {
			var charCode = window.event.keyCode;
		}
		else if (e) {
			var charCode = e.which;
		}
		else { return true; }
		if ( charCode > 32 && (charCode < 64 &&  charCode < 90)) {
			return false;
		}
		return true;
	}
	catch (err) {
		alert(err.Description);
	}
}



</script>

<!-- END JAVASCRIPTS -->

<!-- END BODY -->
