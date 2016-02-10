<!-- BEGIN PAGE CONTENT-->
<style>
    .ds .required {
        color: #e02222;
        font-size: 12px;
        padding-left: 2px;
    }
    .ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px; top:14px;}
    .ds .form-group.form-md-line-input{ margin-bottom:25px; margin-left:0px; margin-right:0px;}
    .ds .lt{    color: #999;font-size: 16px;}
    .ds .tld{  margin-bottom: 10px !important;  padding-top: 10px;}
    .tld_in{   width: 100%;float: left;padding-top: 7px;}
    .ds .form-group.form-md-line-input.form-md-floating-label .form-control.edited ~ label{top: -10px;}
	
	.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 11px;
}
.col-md-10 {
    width: 83.33333333%;
    margin-top: 8px;
}
::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 2px;
}
::-moz-placeholder{
	 font-size: 11px;
    padding-top: 2px;
}
</style>

<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

	$(document).ready(function(){
    	 $("#service_tax").hide();
		 $("#service_tax1").hide();
		 $("#service_tax2").hide();
		 $("#service_tax3").hide();
		 $("#upload_logo").hide();	
    	 $("#upload_text").hide();
    });

	function hideShowLogo()
	{
		//alert(document.getElementById('st_logo'));
		if($('#st_logo').val() == 'Yes')
		{
			$('#upload_logo').show();	
    	 	$('#upload_text').hide();
			$("#text").removeAttr("required");
			$("#logo").attr("required","true");
		}
		else if ($('#st_logo').val() == 'No')
		{
			$('#upload_logo').hide();	
    	 	$('#upload_text').show();
			$("#logo").removeAttr("required");
			$("#text").attr("required","true");
		}
		else
		{
			$('#upload_logo').hide();	
    	 	$('#upload_text').hide();
			$("#logo").removeAttr("required");
			$("#text").removeAttr("required");
		}
	}
	function hideShow()
	{
		if($('#tax').val() == 'Yes')
		{
			$("#service_tax").show();
			$("#service_tax1").show();
			$("#service_tax2").show();
			$("#service_tax3").show();
		}
		else
		{
			$("#service_tax").hide();
			$("#service_tax1").hide();
			$("#service_tax2").hide();
			$("#service_tax3").hide();
		}
	}
	
</script>


<script>

function fetch_all_address_hotel(pincode,g_country,g_state,g_city)
{
	var pin_code = document.getElementById(pincode).value;
	//alert(pincode + "/" + g_country + "/" + g_state + "/" + g_city+"=" + pin_code);
	

	jQuery.ajax(
	{
		type: "POST",
		url: "<?php echo base_url(); ?>bookings/fetch_address",
		dataType: 'json',
		data: {pincode: pin_code},
		success: function(data){
			//alert(data.country);
			$(g_country).val(data.country);
			$(g_state).val(data.state);
			$(g_city).val(data.city);
		}

	});
}




</script>
<script type="text/javascript">

function submit_form()
{
	document.getElementById('submit_form').submit();
}
</script>
<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pin font-green"></i> ADD HOTELS - <span class="step-title">
								Step 1 of 4 </span>
							</div>
						</div>
						<div class="portlet-body form">
							

						<form action="<?php echo base_url();?>dashboard/edit_hotel_Account" class="form-horizontal"  enctype="multipart/form-data" id="submit_form" method="POST">

								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Account Edit </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Profile Edit </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Billing Edit </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Preferences Edit </span>
												</a>
											</li>
                                            <li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Confirm </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">General Details</h3>
                                                	
												<?php
													if (isset($value)) {
													
													foreach ($value as $h_edit) { 	

													?>

                                                	<div class="form-group">
														<label class="control-label col-md-2">Hotel Name<span class="required">* </span></label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="hotel_name" value="<?php echo $h_edit->hotel_name; ?>" required />
																<span class="help-block">Enter Hotel Name... </span>
															</div>
                                                         <label class="control-label col-md-2">Year Established<span class="required">* </span></label>   															<div class="col-md-4">
																<input type="text" class="form-control" name="hotel_year_established" value="<?php echo $h_edit->hotel_year_established; ?>" required maxlength="4" onkeypress="return onlyNos(event,this)" >
																<span class="help-block">Enter Year Established...</span>
															</div>
													</div>
                                                    

                                                    <input type="hidden" value="<?php echo $h_edit->hotel_id; ?>" name="h_id">

                                                    <div class="form-group">
														<label class="control-label col-md-2">Hotel Ownership Type <span class="required">* </span></label>
															<div class="col-md-4">
																 	<select class="form-control"  name="hotel_ownership_type" required>

																 		<option selected="true" value="<?php echo $h_edit->hotel_ownership_type; ?>"> <?php echo $h_edit->hotel_ownership_type; ?> </option>							                                       
                                            							<option value="Sole Proprietorship">Sole Proprietorship</option>
                                            							<option value="Partnership">Partnership</option>
                                            							<option value="Cooperative Business">Cooperative Business</option>
													

                                        							</select>
																<span class="help-block">Enter Hotel Ownership Type...</span>
															</div>
												

                                                         <label class="control-label col-md-2">Hotel Type<span class="required">* </span></label>   															<div class="col-md-4">
																<div class="col-md-9">
                                                					<div class="md-checkbox-inline">
                                                    					<div class="md-checkbox">
                                                        					<input type="checkbox" value="Business Hotel" id="checkbox1" class="md-check" name="hotel_type[]">
                                                        					<label for="checkbox1">
                                                            				<span></span>
                                                            				<span class="check"></span>
                                                            				<span class="box"></span>
                                                            				Business Hotel</label>
                                                    					</div>
                                                    					<div class="md-checkbox "><!--has-error-->
                                                        					<input type="checkbox" value="Airport Hotel" id="checkbox2" class="md-check" name="hotel_type[]" >
                                                        					<label for="checkbox2">
                                                            				<span></span>
                                                            				<span class="check"></span>
                                                            				<span class="box"></span>
                                                            				Airport Hotel </label>
                                                    					</div>
                                                    					<div class="md-checkbox "><!--has-info-->
                                                        					<input type="checkbox" value="Suite Hotel" id="checkbox3" class="md-check" name="hotel_type[]">
                                                        					<label for="checkbox3">
                                                            				<span></span>
                                                            				<span class="check"></span>
                                                            				<span class="box"></span>
                                                            				Suite Hotel</label>
                                                    					</div>
                                                    					<div class="md-checkbox "><!--has-info-->
                                                        					<input type="checkbox" value="Extended Stay Hotel" id="checkbox4" class="md-check" name="hotel_type[]">
                                                        					<label for="checkbox4">
                                                            				<span></span>
                                                            				<span class="check"></span>
                                                            				<span class="box"></span>
                                                            				Extended Stay Hotel</label>
                                                    					</div>
                                                    					<div class="md-checkbox "><!--has-info-->
                                                        					<input type="checkbox" value="Resort Hotel" id="checkbox5" class="md-check" name="hotel_type[]">
                                                        					<label for="checkbox5">
                                                            				<span></span>
                                                            				<span class="check"></span>
                                                            				<span class="box"></span>
                                                            				Resort Hotel</label>
                                                    					</div>
                                                				</div>
                                            				</div>
														</div>
                                                        
                                                        <div class="form-group">
														<label class="control-label col-md-2">No of Rooms<span class="required">* </span></label>
															<div class="col-md-4">
																 	<select class="form-control" id="" name="hotel_rooms" required>
																 		<option selected="true" value="<?php echo $h_edit->hotel_rooms; ?>"> <?php echo $h_edit->hotel_rooms; ?> </option>							                                                                                                           	
                                            							<option value="Under 20">Under 20</option>
                                            							<option value="20-49">20 - 49</option>
                                            							<option value="50-99">50 - 99</option>
                                            							<option value="100-199">100 - 199</option>
                                                                        <option value="200-399">200 - 399</option>
                                                                        <option value="400-699">400 - 699</option>
                                                                        <option value="More than 700">More than 700</option>
                                        							</select>
																<span class="help-block">Enter No. Of Rooms...</span>
															</div>
                                                            
                                                          <label class="control-label col-md-2">Logo Applied?</label>
															<div class="col-md-3">
																 <select class="form-control" id="st_logo" onchange="return hideShowLogo();">
                                                                 	<option value="">---Select An Option---</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                 </select>
																
															</div>
                                                        </div>

                                                        <div class="row">
                                                        	<div class="col-md-6">

                                                        		<?php if ($h_edit->hotel_logo_images_thumb== ''){

																}
																else{
																	?>
																		<label class="control-label col-md-4">Hotel Image</label>
																		<div class="col-md-8">
																			<img  width="30%"  src="<?php echo base_url();?>upload/hotel/<?php if( $h_edit->hotel_logo_images_thumb== '') { echo "no_images.png"; } else { echo $h_edit->hotel_logo_images_thumb; }?>" alt=""/>
																		</div>	
																		
																	<?php
																}
																?>
																
															</div>
															
															<div class="col-md-6">
																
																<?php if ($h_edit->hotel_logo_text== ''){

																}
																else{
																	
																}
																?>
															</div>
                                                        </div>
                                                        	
                                                        
                                                         <div class="form-group" id="upload_logo">
														
															<div class="col-md-6">
																
															</div>
                                                         <label class="control-label col-md-2">Upload Logo<span class="required">* </span></label>   															<div class="col-md-3">
																<input type="file" class="form-control" id="logo" name="image_photo" >
																<span class="help-block">Upload Logo...</span>
															</div>
														</div>
                                                        
                                                        <div class="form-group" id="upload_text">
														
															<div class="col-md-6">
																
															</div>
                                                         <label class="control-label col-md-2">Logo As Text<span class="required">* </span></label>   															<div class="col-md-3">
																<input type="text" class="form-control" value="<?php echo $h_edit->hotel_logo_text; ?>" id="text" name="images_text"  >
																<span class="help-block">Enter Logo Text...</span>
															</div>
														</div>
                                                       <!--<button class="btn green button-next" style="margin-left:50%;">Save</button>-->
                                                       <!--<input type="submit" class="btn green button-next" style="margin-left:50%;" value="Save!">-->
                                                        
													</div>

												</div>

												


											<div class="tab-pane" id="tab2">
												<h3 class="block">Contact Details </h3>
                                                	<div class="form-group">
													<label class="control-label col-md-2">Hotel Address<span class="required">* </span></label>
															<div class="col-md-5">
											<input type="text" class="form-control" name="hotel_street1" value="<?php echo $h_edit->hotel_street1; ?>" placeholder="Street Details Line 1"  required="required"/>
															<!--	<span class="help-block">Street Details Line 1 </span>-->
															</div>
                                                            
                                                        <div class="col-md-5">
                                               <input type="text" class="form-control" name="hotel_street2" value="<?php echo $h_edit->hotel_street2; ?>" placeholder="Street Details Line 2"  required="required"/>
                                                            <!--<span class="help-block">Street Details Line 2 </span>-->
                                                        </div>
                                                  </div> 
                                                  <div class="form-group"> 
                                                            <div class="col-md-2">
																
															</div>        
                                                            <div class="col-md-2">
															<input type="text" class="form-control" value="<?php echo $h_edit->hotel_landmark; ?>" name="hotel_landmark" placeholder="Landmark" />
																<!--<span class="help-block">Landmark</span>-->
															</div>
                                                            
															
															 <div class="col-md-2">
											<input type="text" class="form-control" maxlength="6" value="<?php echo $h_edit->hotel_pincode; ?>" name="hotel_pincode" id="pincode" placeholder="Pincode" onkeypress="return onlyNos(event,this);" required onblur='fetch_all_address_hotel("pincode","#g_country","#g_state","#g_city")' />
																<!--<span class="help-block">Pincode</span>-->
															</div>
															
															
															
                                                            <div class="col-md-2">
													<input type="text" class="form-control" id="g_city" value="<?php echo $h_edit->hotel_district; ?>" name="hotel_district" placeholder="District"  required="required" />
																<!--<span class="help-block">District</span>-->
															</div>
                                                            
                                                           
                                                            
                                                           
                                                            
                                                             <div class="col-md-2">
													<input type="text" class="form-control" id="g_state" value="<?php echo $h_edit->hotel_state; ?>"  name="hotel_state" placeholder="State" required>
																<!--<span class="help-block">State</span>-->
															</div>
                                                            
                                                             <div class="col-md-2">
												<input type="text" class="form-control"  id="g_country" value="<?php echo $h_edit->hotel_country; ?>" name="hotel_country" placeholder="Country" required />
																<!--<span class="help-block">Country</span>-->
															</div>
                                                         
													</div>
                                                    
                                                    <div class="form-group">
											<label class="control-label col-md-2">Branch Office Address</label>
															<div class="col-md-5">
									<input type="text" class="form-control" name="hotel_branch_street1" placeholder="Street Details Line 1" />
																<!--<span class="help-block">Street Details Line 1 </span>-->
															</div>
                                                            
                                                            <div class="col-md-5">
									<input type="text" class="form-control" value="<?php echo $h_edit->hotel_branch_street2; ?>" name="hotel_branch_street2" placeholder="Street Details Line 2" />
																<!--<span class="help-block">Street Details Line 2 </span>-->
															</div>
                                                  </div>  
                                                   <div class="form-group"> 
                                                            <div class="col-md-2">
																
															</div>       
                                                            <div class="col-md-2">
											<input type="text" class="form-control" value="<?php echo $h_edit->hotel_branch_landmark; ?>" name="hotel_branch_landmark" placeholder="Landmark" />
																<!--<span class="help-block">Landmark</span>-->
															</div>
                                                            
                                                             <div class="col-md-2">
									<input type="text" class="form-control" maxlength="6" value="<?php echo $h_edit->hotel_branch_pincode; ?>" name="hotel_branch_pincode" id="pincode_branch" placeholder="Pincode" onkeypress="return onlyNos(event,this)" onblur='fetch_all_address_hotel("pincode_branch","#branch_country","#branch_state","#branch_city")' />
																<!--<span class="help-block">Pincode</span>-->
															</div>
                                                            
                                                            <div class="col-md-2">
													<input type="text" class="form-control" id="branch_city" value="<?php echo $h_edit->hotel_branch_district; ?>" name="hotel_branch_district" placeholder="District"/>
																<!--<span class="help-block">District</span>-->
															</div>
                                                            
                                                        
                                                            
                                                            
                                                            
                                                             <div class="col-md-2">
												<input type="text" class="form-control" id="branch_state" value="<?php echo $h_edit->hotel_branch_state; ?>" name="hotel_branch_state" placeholder="State" />
																<!--<span class="help-block">State</span>-->
															</div>
                                                            
                                                             <div class="col-md-2">
													<input type="text" class="form-control"  id="branch_country" value="<?php echo $h_edit->hotel_branch_country; ?>" name="hotel_branch_country" placeholder="Country" />
															<!--	<span class="help-block">Country</span>-->
															</div>
                                                         
													</div>
                                                    
                                                    <div class="form-group">
										<label class="control-label col-md-2">Booking Office Address</label>
															<div class="col-md-5">
									<input type="text" class="form-control" name="hotel_booking_street1" value="<?php echo $h_edit->hotel_booking_street1; ?>" placeholder="Street Details Line 1" />
																<!--<span class="help-block">Street Details Line 1 </span>-->
															</div>
                                                            
                                                            <div class="col-md-5">
									<input type="text" class="form-control" value="<?php echo $h_edit->hotel_booking_street2; ?>" name="hotel_booking_street2" placeholder="Street Details Line 2" />
																<!--<span class="help-block">Street Details Line 2 </span>-->
															</div>
                                                 </div> 
                                                  <div class="form-group"> 
                                                            <div class="col-md-2">
																
															</div>
                                                                     
                                                            <div class="col-md-2">
													<input type="text" class="form-control" value="<?php echo $h_edit->hotel_booking_landmark; ?>" name="hotel_booking_landmark" placeholder="Landmark" />
																<!--<span class="help-block">Landmark</span>-->
															</div>
                                                            
                                                            
                                                            <div class="col-md-2">
									<input type="text" class="form-control" maxlength="6" id="pincode_booking" value="<?php echo $h_edit->hotel_booking_pincode; ?>" name="hotel_booking_pincode" placeholder="Pincode" onkeypress="return onlyNos(event,this)" onblur='fetch_all_address_hotel("pincode_booking","#booking_country","#booking_state","#booking_city")' />
																<!--<span class="help-block">Pincode</span>-->
															</div>
                                                            
                                                            
                                                            <div class="col-md-2">
											<input type="text" class="form-control" id="booking_city" value="<?php echo $h_edit->hotel_booking_district; ?>" name="hotel_booking_district"  placeholder="District"/>
															<!--	<span class="help-block">District</span>-->
															</div>
                                                            
                                                            
                                                           
                                                             <div class="col-md-2">
														<input type="text" class="form-control" value="<?php echo $h_edit->booking_state; ?>" id="booking_state" name="hotel_booking_state" placeholder="State"/>
                                                        
																<!--<span class="help-block">State</span>-->
															</div>
                                                            
                                                             <div class="col-md-2">
												<input type="text" class="form-control" id="booking_country" value="<?php echo $h_edit->hotel_booking_country; ?>" name="hotel_booking_country" placeholder="Country" />
																<!--<span class="help-block">Country</span>-->
															</div>
                                                         
													</div>
                                                    <div class="form-group">
													<label class="control-label col-md-2">Front Desk<span class="required">* </span></label>
                                                    
                                                    	<div class="col-md-2">
											<input type="text" class="form-control" value="<?php echo $h_edit->hotel_frontdesk_name; ?>" name="hotel_frontdesk_name" placeholder="Contact Person" required />
																<!--<span class="help-block">Contact Person</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
											<input type="text" class="form-control" required value="<?php echo $h_edit->hotel_frontdesk_mobile; ?>" name="hotel_frontdesk_mobile" placeholder="Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10">
																<!--<span class="help-block">Mobile No.</span>-->
														</div>
                                                        
                                                         <div class="col-md-2">
					<input type="text" class="form-control" name="hotel_frontdesk_mobile_alternative" value="<?php echo $h_edit->hotel_frontdesk_mobile_alternative; ?>" required="required" placeholder="Alternative Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10"/>
																<!--<span class="help-block">Alternative Mobile No.</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
									<input type="email" class="form-control" value="<?php echo $h_edit->hotel_frontdesk_email; ?>" name="hotel_frontdesk_email" required placeholder="Email"/>
																<!--<span class="help-block">Email</span>-->
														</div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
													<label class="control-label col-md-2">Owner<span class="required">* </span></label>
                                                    
                                                 <div class="col-md-2">
												<input type="text" class="form-control" value="<?php echo $h_edit->hotel_owner_name; ?>" name="hotel_owner_name" required placeholder="Contact Person" />
																<!--<span class="help-block">Contact Person</span>-->
												</div>
                                                        
                                                <div class="col-md-2">
                                            <input type="text" class="form-control" value="<?php echo $h_edit->hotel_owner_mobile; ?>" name="hotel_owner_mobile" placeholder="Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10"/>
                                                        <!--<span class="help-block">Mobile No.</span>-->
                                                </div>
                                                        
                                         <div class="col-md-2">
                             <input type="text" class="form-control" value="<?php echo $h_edit->hotel_owner_mobile_alternative; ?>" name="hotel_owner_mobile_alternative" placeholder="Alternative Mobile No." onkeypress="return onlyNos(event,this)" maxlength="10"/>
                                                <!--<span class="help-block">Alternative Mobile No.</span>-->
                                        </div>
                                        
                                                        <div class="col-md-2">
											<input type="email"  required="required" class="form-control" value="<?php echo $h_edit->hotel_owner_email; ?>" name="hotel_owner_email" placeholder="Email" />
																<!--<span class="help-block">Email</span>-->
														</div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
													<label class="control-label col-md-2">HR</label>
                                                    
                                                    	<div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_hr_name; ?>" name="hotel_hr_name" placeholder="Contact Person" />
																<!--<span class="help-block">Contact Person</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_hr_mobile; ?>" name="hotel_hr_mobile" placeholder="Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10"/>
																<!--<span class="help-block">Mobile No.</span>-->
														</div>
                                                        
                                                         <div class="col-md-2">
						<input type="text" class="form-control" value="<?php echo $h_edit->hotel_hr_mobile_alternative; ?>" name="hotel_hr_mobile_alternative" placeholder="Alternative Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10" />
																<!--<span class="help-block">Alternative Mobile No.</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_hr_email; ?>" name="hotel_hr_email" placeholder="Email"/>
																<!--<span class="help-block">Email</span>-->
														</div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
													<label class="control-label col-md-2">Accounts</label>
                                                    
                                                    	<div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_accounts_name; ?>" name="hotel_accounts_name" placeholder="Contact Person" />
																<!--<span class="help-block">Contact Person</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
												<input type="text" class="form-control" value="<?php echo $h_edit->hotel_accounts_mobile; ?>" name="hotel_accounts_mobile" placeholder="Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10" />
																<!--<span class="help-block">Mobile No.</span>-->
														</div>
                                                        
                                                 <div class="col-md-2">
                         <input type="text" class="form-control" name="hotel_accounts_mobile_alternative" value="<?php echo $h_edit->hotel_accounts_mobile_alternative; ?>" placeholder="Alternative Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10"/>
                                                       <!-- <span class="help-block">Alternative Mobile No.</span>-->
                                                </div>
                                                        
                                                        <div class="col-md-2">
											<input type="text" class="form-control" name="hotel_accounts_email" value="<?php echo $h_edit->hotel_accounts_email; ?>" placeholder="Email" />
																<!--<span class="help-block">Email</span>-->
														</div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
									<label class="control-label col-md-2">Nearest Police Station<span class="required">* </span></label>
                                                    
                                                    	<div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_near_police_name; ?>" name="hotel_near_police_name" placeholder="Contact Person"/>
																<!--<span class="help-block">Contact Person</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_near_police_mobile; ?>" name="hotel_near_police_mobile" placeholder="Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10" />
																<!--<span class="help-block">Mobile No.</span>-->
														</div>
                                                        
                                                         <div class="col-md-2">
				<input type="text" class="form-control" name="hotel_near_police_mobile_alternative" value="<?php echo $h_edit->hotel_near_police_mobile_alternative; ?>" placeholder="Alternative Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10" />
																<!--<span class="help-block">Alternative Mobile No.</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
				  <input type="text" class="form-control" name="hotel_near_police_email" value="<?php echo $h_edit->hotel_near_police_email; ?>" placeholder="Email"/>
																<!--<span class="help-block">Email</span>-->
														</div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    <div class="form-group">
													<label class="control-label col-md-2">Nearest Medial Establishment</label>
                                                    
                                                    	<div class="col-md-2">
										<input type="text" class="form-control" value="<?php echo $h_edit->hotel_near_medical_name; ?>" name="hotel_near_medical_name" placeholder="Contact Person"/>
																<!--<span class="help-block">Contact Person</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
										<input   type="text" class="form-control" value="<?php echo $h_edit->hotel_near_medical_mobile; ?>" name="hotel_near_medical_mobile"  placeholder="Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10"/>
																<!--<span class="help-block">Mobile No.</span>-->
														</div>
                                                        
                                                         <div class="col-md-2">
				<input type="text" class="form-control" name="hotel_near_medical_mobile_alternative" value="<?php echo $h_edit->hotel_near_medical_mobile_alternative; ?>" placeholder="Alternative Mobile No." onkeypress="return onlyNos(event,this)"/ maxlength="10" />
																<!--<span class="help-block">Alternative Mobile No.</span>-->
														</div>
                                                        
                                                        <div class="col-md-2">
			  <input type="text" class="form-control" name="hotel_near_medical_email" value="<?php echo $h_edit->hotel_near_medical_email; ?>" placeholder="Email" />
																<!--<span class="help-block">Email</span>-->
														</div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
														<label class="control-label col-md-2">Fax</label>
															<div class="col-md-4">
												<input type="text" class="form-control" name="hotel_fax" value="<?php echo $h_edit->hotel_fax; ?>" placeholder="Enter Fax..."/>
															<!--	<span class="help-block">Enter Fax... </span>-->
															</div>
                                                        
													</div>
                                                    
                                                    <div class="form-group">
														<label class="control-label col-md-2">Website</label>
															<div class="col-md-4">
											<input type="text" class="form-control" name="hotel_website" value="<?php echo $h_edit->hotel_website; ?>" placeholder="Enter Website..." />
																<!--<span class="help-block">Enter Website... </span>-->
															</div>
                                                       <!-- <button class="btn green button-next" style="margin-left:50%;">Save</button>-->
													</div>
               
											</div>

											
												<?php
												}
											}

											
										?>
											




											<div class="tab-pane" id="tab3">
												<h3 class="block">Tax Details</h3>
                                                
                                                
                                                	<div class="form-group">
														<label class="control-label col-md-2">Tax Applied?</label>
															<div class="col-md-4">
																<select id="tax" onchange="return hideShow();" name="hotel_tax_applied">
                                                                	<option>--- Select An Option ---</option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
															</div>
                                                        
													</div>
                                                    
                                                    <div class="form-group" id="service_tax">
														<label class="control-label col-md-2">Service Tax %</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="hotel_service_tax" />
																<span class="help-block">Enter Service Tax... </span>
															</div>
                                                        
													</div>
                                                    
                                                    <div class="form-group" id="service_tax1">
														<label class="control-label col-md-2">Luxury Tax %</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="hotel_luxury_tax" />
																<span class="help-block">Enter Luxury Tax %... </span>
															</div>
                                                        
													</div>
                                                    
                                                     <div class="form-group" id="service_tax2">
														<label class="control-label col-md-2">Service Charge %</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="hotel_service_charge" />
																<span class="help-block">Enter Service Charge %... </span>
															</div>
                                                        
													</div>
                                                    
                                                     <div class="form-group" id="service_tax3">
														<label class="control-label col-md-2">Standard TAC %</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="hotel_stander_tac" />
																<span class="help-block">Enter Standard TAC %... </span>
															</div>
                                                        <button class="btn green button-next" style="margin-left:50%;">Save</button>
													</div>

											</div>

											<div class="tab-pane" id="tab4">
												<h3 class="block">Billing Settings</h3>
                                                
                                                
                                                
                                                 	<div class="form-group">
														<label class="control-label col-md-2">Name On Invoice<span class="required">* </span></label>
															<div class="col-md-4">
											<input type="text" class="form-control" name="billing_name" required placeholder="Enter Name On Invoice..." />
																<!--<span class="help-block">Enter Name On Invoice... </span>-->
															</div>
                                                        
													</div>
                                                    
                                                    
                                                    
                                                 <div class="form-group ">
													<label class="control-label col-md-2">Address on Invoice<span class="required">* </span></label>
															<div class="col-md-5">
											<input type="text" class="form-control" name="billing_street1" required placeholder="Street Details Line 1" />
													<!--<span class="help-block">Street Details Line 1 </span>-->
															</div>
                                                            
                                                            <div class="col-md-5">
							<input type="text" class="form-control" name="billing_street2" placeholder="Street Details Line 2" required />
															<!--<span class="help-block">Street Details Line 1 </span>-->
															</div>
                                        </div>   
                                         <div class="form-group "> 
                                         
                                                           <div class="col-md-2">
																
															</div>
                                                                            
                                                            <div class="col-md-2">
								<input type="text" class="form-control" name="billing_landmark"  placeholder="Landmark"/>
																<!--<span class="help-block">Landmark</span>-->
															</div>
                                                            
                                                            <div class="col-md-2">
										<input type="text" class="form-control" name="billing_district" required id="billing_city" placeholder="District" />
																<!--<span class="help-block">District</span>-->
															</div>
                                                            
                                                            <div class="col-md-2">
									<input type="text" class="form-control" maxlength="6" name="billing_pincode"  id="pincode_billing" required onkeypress="return onlyNos(event,this);" placeholder="Pincode"  onblur='fetch_all_address_hotel("pincode_billing","#billing_country","#billing_state","#billing_city")'/>
																<!--<span class="help-block">Pincode</span>-->
															</div>
                                                            
                                                           
                                                            
                                                             <div class="col-md-2">
											<input type="text" class="form-control" required  id="billing_state" name="billing_state" placeholder="State" />
																<!--<span class="help-block">State</span>-->
															</div>
                                                            
                                                             <div class="col-md-2">
							<input type="text" class="form-control"  name="billing_country" id="billing_country" required placeholder="Country" />
																<!--<span class="help-block">Country</span>-->
															</div>
                                                         
													</div>
                                                    
                                                    
                                                    <div class="form-group">
														<label class="control-label col-md-2">Email On Invoice<span class="required">* </span></label>
															<div class="col-md-4">
												<input type="email" required class="form-control" name="billing_email" placeholder="Enter Email ..." />
																<!--<span class="help-block">Enter Email ... </span>-->
															</div>
                                                        
                                                        <label class="control-label col-md-2">Phone On Invoice<span class="required">* </span></label>
															<div class="col-md-4">
										<input type="text" class="form-control" name="billing_phone" placeholder="Enter Phone ..." required maxlength="10" onkeypress="return onlyNos(event,this)" />
																<!--<span class="help-block">Enter Phone ... </span>-->
															</div>
                                                        
													</div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
														<label class="control-label col-md-2">Fax No. On Invoice</label>
															<div class="col-md-4">
											<input type="text" class="form-control" name="billing_fax" placeholder="Enter Fax No ..." />
																<!--<span class="help-block">Enter Fax No ... </span>-->
															</div>
                                                        
                                                        <label class="control-label col-md-2">VAT No.<span class="required">* </span></label>
															<div class="col-md-4">
								<input type="text" class="form-control" name="billing_vat" placeholder="Enter VAT No ..." />
																<!--<span class="help-block">Enter VAT No ... </span>-->
															</div>
                                                        
													</div>
                                                    
                                                    
                                                    <div class="form-group">
														<label class="control-label col-md-2">Bank Name<span class="required">* </span></label>
															<div class="col-md-4">
									<input type="text" class="form-control" name="billing_bank_name" required placeholder="Enter Bank Name ..." />
																<!--<span class="help-block">Enter Bank Name ... </span>-->
															</div>
                                                        
                                                        <label class="control-label col-md-2">Account No.<span class="required">* </span></label>
															<div class="col-md-4">
									<input type="text" class="form-control" name="billing_account_no" required onkeypress="return onlyNos(event,this);"  placeholder="Enter Account No ... "/>
																<!--<span class="help-block">Enter Account No ... </span>-->
															</div>
                                                        
													</div>
                                                    
                                                    <div class="form-group">
														<label class="control-label col-md-2">IFSC Code</label>
															<div class="col-md-4">
								<input type="text" class="form-control" name="billing_ifsc_code" placeholder="Enter IFSC Coad ..." />
																<!--<span class="help-block">Enter IFSC Coad ... </span>-->
															</div>
                                                       
                                                        <button class="btn green button-next" style="margin-left:50%;">Save</button>
													</div>

											</div>
                                                <div class="tab-pane" id="tab5">
                                            
                                                <h3 class="block">General Preferences</h3>
                                                
                                                	<div class="form-group col-md-6">
											<label class="control-label col-md-5">Default Check In Time</label>
												<div class="col-md-2">
													<input type="text" class="form-control" name="hotel_check_in_time_hr" placeholder="HH" />
																
												</div>
                                                            
                                                       <div class="col-md-2">
													<input type="text" class="form-control" name="hotel_check_in_time_mm"  placeholder="MM"/>
																
															</div>
                                                            
                                                             <div class="col-md-3">
																<select class="form-control" name="hotel_check_in_time_fr">
                                                                	<option></option>
                                                                	<option>AM</option>
                                                                    <option>PM</option>
                                                                </select>
																
															</div>
                                                   </div>
                                                 <div class="form-group col-md-6">       
                                                        <label class="control-label col-md-5">Default Check Out Time</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="hotel_check_out_time_hr" placeholder="HH" />
																
															</div>
                                                            
                                                            <div class="col-md-2">
																<input type="text" class="form-control" name="hotel_check_out_time_mm"  placeholder="MM"/>
																
															</div>
                                                            
                                                             <div class="col-md-3">
																<select class="form-control" name="hotel_check_out_time_fr">
                                                                	<option></option>
                                                                	<option>AM</option>
                                                                    <option>PM</option>
                                                                </select>
																
															</div>
                                                        
													</div>
                                                    
                                                       
                                                    <div class="form-group col-md-6">
                                                    
														<label class="control-label col-md-2"> Guest<span class="required">* </span></label>
															<div class="col-md-10">
																
          <input type="checkbox" name="guest[]"  value="Guest must be present in system for booking purpose"/> Guest must be present in system for booking purpose
																
															</div>
                                                 </div>
                                                   
                                                  <div class="form-group col-md-6" style="margin-top:9px;">         
                                                            <div class="col-md-4">
																
                                                                <input type="checkbox"  name="guest[]" value="Take Duplicate Entry"/>Take Duplicate Entry
																
															</div>
                                                            
                                                             <div class="col-md-4">
																
                                                                <input type="checkbox"  name="guest[]"  value="Photo Mandatory"/>Photo Mandatory
																
															</div>
                                                            
                                                            <div class="col-md-4">
																
                                                                <input type="checkbox"  name="guest[]" value="Id Mandatory"/>Id Mandatory
																
															</div>
                                                        
                                                        
                                                        
													</div>
                                                    
                                                    
                                                     <div class="form-group col-md-6">
														<label class="control-label col-md-2">Broker<span class="required">* </span></label>
															<div class="col-md-10">
																
                                                                <input type="checkbox" name="broker[]"/> Broker must be present in system for booking purpose
																
															</div>
                                                   </div>  
                                                   <div class="form-group col-md-6" style="margin-top:9px;">       
                                                            <div class="col-md-4">
																
                                                                <input type="checkbox"  name="broker[]" value="Photo Mandatory"/>Photo Mandatory
																
															</div>
                                                            
                                                             <div class="col-md-4">
																
                                                                <input type="checkbox"  name="broker[]" value="Id Mandatory"/>Id Mandatory
																
															</div>
                                                            
                                                            <div class="col-md-4">
																
                                                                <input type="checkbox" name="broker[]" value="Change Commission%" />Change Commission%
																
															</div>
                                                        
                                                        
                                                        
													</div>
                                                    
                                                    
                                                    
                                                    <div class="form-group col-md-6">
														<label class="control-label col-md-4">Date Format<span class="required">* </span></label>
															<div class="col-md-8">
																<select class="form-control" required name="hotel_date_format" >
                                                                	<option>---Select Date Format---</option>
                                                                	<option>DD-MM-YYYY</option>
                                                                    <option>MM-DD-YYYY</option>
                                                                    <option>YYYY-MM-DD</option>
                                                                </select>
																<span class="help-block">Select Date Format ... </span>
															</div>
                                                  </div> 
                                                  
                                                    <div class="form-group col-md-6">     
                                                        <label class="control-label col-md-5">Default Check Out Time<span class="required">* </span></label>
															<div class="col-md-7">
																<select class="form-control" required name="hotel_time_format"  >
                                                                	<option>---Select Date Format---</option>
                                                                	<option>12 Hours</option>
                                                                    <option>24 Hours</option>
                                                                    
                                                                </select>
																<span class="help-block">Select Time Format... </span>
															</div>
                                                        <button class="btn green button-next" style="margin-left:50%;">Save</button>
													</div>
                                                    
                                                
                                                
										</div>
									          <div class="clear" style="clear:both;"></div>                          
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                        <i class="m-icon-swapleft"></i> Back </a>
                                                        <a href="javascript:;" class="btn blue button-next" onclick="check();">
                                                        Continue <i class="m-icon-swapright m-icon-white"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn green button-submit" onclick="submit_form()">
                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->