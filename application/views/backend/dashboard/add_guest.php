<!-- BEGIN PAGE CONTENT-->
<style>
.ds .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px;}
.ds .form-group.form-md-line-input{ margin-bottom:15px;}
.ds .lt{line-height: 38px;}
  .ds .tld{  margin-bottom: 10px !important;  padding-top: 10px;}
	.tld_in{ background-color: #f8f8f8;    width: 100%;float: left;padding-top: 7px;}
	.tld_in:hover{ background-color: #f1f1f1;}
	.ds .dropzone .dz-default.dz-message{width: 100%;height: 50px;margin-left:0px; margin-top:0px;
    top: 0;left: 0;font-size: 50%;}
	.ds .dropzone{min-height: 130px;}

	.form-group.form-md-line-input.form-md-floating-label.col-md-6.full {
    width: 100%;
     }
    .form-group.form-md-line-input.form-md-floating-label.col-md-6.add{
    width: 100%;
     }
	 .form-group.form-md-line-input.form-md-floating-label.col-md-6.rght {
    width: 50%;
    margin-top: -85px;
    /* float: right; */
}
.form-group.form-md-line-input.form-md-floating-label.col-md-6.dwn {
    width: 51%;
    float: right;
}
</style>
<script>

function fetch_all_address()
{
	
	var pin_code = document.getElementById('pincode').value;
    
	jQuery.ajax(
	{
		type: "POST",
		url: "<?php echo base_url(); ?>bookings/fetch_address",
		dataType: 'json',
		data: {pincode: pin_code},
		success: function(data){
			//alert(data.country);
			document.getElementById("g_country").focus();
			$('#g_country').val(data.country);
			document.getElementById("g_state").focus();
			$('#g_state').val(data.state);
			document.getElementById("g_city").focus();
			$('#g_city').val(data.city);
		}

	});
}

</script>
			<div class="row ds">
				<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Add Guest</span>
							</div>
							
						</div>
						<div class="portlet-body form">
                            <?php

                            $form = array(
                                'class' 			=> 'form-body',
                                'id'				=> 'form',
                                'method'			=> 'post',
								
                            );
							
							

                            echo form_open_multipart('dashboard/add_guest',$form);

                            ?>

								<div class="form-body">
                                <!-- 17.11.2015-->
                                				<?php if($this->session->flashdata('err_msg')):?>
                                            	<div class="form-group">
                                                 	<div class="col-md-12 control-label">
                                                    	<div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            	<span aria-hidden="true">&times;</span>
                                                        	</button>
                                                        	<strong><?php echo $this->session->flashdata('err_msg');?></strong>
                                                    	</div>
												  	</div>
                                            	</div>
                                                <?php endif;?>
                                                <?php if($this->session->flashdata('succ_msg')):?>
                                            	<div class="form-group">
                                                 	<div class="col-md-12 control-label">
                                                    	<div class="alert alert-success alert-dismissible text-center" role="alert">
                                                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            	<span aria-hidden="true">&times;</span>
                                                        	</button>
                                                        	<strong><?php echo $this->session->flashdata('succ_msg');?></strong>
                                                    	</div>
												  	</div>
                                            	</div>
                                                <?php endif;?>
                                <!-- 17.11.2015-->
								<div class="row">
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-6 full">
									
										<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="g_name" onkeypress=" return onlyLtrs(event, this);" required="required" >
										<label>Full Name <span class="required">*</span></label>
										<span class="help-block">Enter Full Name...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-6 add">
									
										<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="g_address" required="required" >
										<label>Address <span class="required">*</span></label>
										<span class="help-block">Enter Full Address...</span>
									</div>
                                    
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="pincode" name="g_place"  required="required" onblur="fetch_all_address()"> 
										
										<label>Pincode<span class="required">*</span></label>
										<span class="help-block">Enter Pincode...</span>
	 								</div>
                                     
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="g_city" name="g_city" value=""  
                                        required= "required" />
                                       
										<label>City/ Town/ Village<span class="required">*</span></label>
										<span class="help-block">Enter City/ Town/ Village...</span>
	 								</div>
	 								
	 								<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="g_state"  name="g_state"  value=""  
                                        required ="required"/>
                                       
										<label> State<span class="required">*</span></label>
										<span class="help-block">Enter State Name...</span>
	 								</div>
                                    
	 								<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="g_country" name="g_country" value=""  required="required" />
										<label>Country<span class="required">*</span></label>
										<span class="help-block">Enter Country Name...</span>
	 								</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input autocomplete="off" type="text" class="form-control" id="mobile" name="g_contact_no"  required="required" maxlength="10" onkeypress=" return onlyNos(event, this);" >
										<label>Mobile No. <span class="required">*</span></label>
										<span class="help-block">Enter Mobile No...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input  autocomplete="off" type="email" class="form-control" id="form_control_1" name="g_email" >
										<label>Email</label>
										<span class="help-block">Enter Email Address...</span>
									</div>
									
									<!--<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1" >
										<label>Coming From <span class="required">*</span></label>
										<span class="help-block">Enter Coming From...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input type="text" class="form-control" id="form_control_1" >
										<label>Going To <span class="required">*</span></label>
										<span class="help-block">Enter Going To...</span>
									</div>-->
									<div class="form-group form-md-line-input col-md-6">
										<select class="form-control"  name="g_gender" required="required" >
                                        	<option value="">---Select Gender---</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
											<label>Gender <span class="required">*</span></label>
											<span class="help-block">Enter Gender...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-6">
									
										<input autocomplete="off" type="text" class="form-control  date-picker " id="form_control_1" name="g_dob" required="required">
										
                                        <!--<input  type="date" class="form-control" id="form_control_1" name="g_dob" required="required">-->
                                        <label> DOB <span class="required">*</span></label>
										<span class="help-block">Enter DOB...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="g_occupation" required="required" >
										<label>Occupation <span class="required">*</span></label>
										<span class="help-block">Enter Occupation...</span>
									</div>
								<div class="form-group form-md-line-input  has-info col-md-6">
										<select class="form-control" id="form_control_2" name="g_married" required="required">
                                        	<option value="">---Select Status---</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
										<label for="form_control_2">Married? <span class="required">*</span></label>
									</div>
									
									<div class="form-group form-md-line-input  has-info col-md-6">
										<select class="form-control" id="form_control_2" name="g_id_type" required="required">
                                        	<option value="">---Select ID Proof---</option>
											<option value="1">Passport</option>
											<option value="2">PAN card</option>
											<option value="3">Voter card</option>
											<option value="4">Adhar card</option>
											<option value="5">Driving License</option>
											<option value="6">Others</option>
										</select>

										<label for="form_control_2">ID Type <span class="required">*</span></label>
									</div>
									<!--<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									
										<input type="text" class="form-control" id="form_control_1" >
										<label id="form_control_1">Others <span class="required">*</span></label>
										<span class="help-block">Enter Others Option...</span>
									</div>-->
									<div class="form-group form-md-line-input form-md-floating-label col-md-6 dwn">
									<p><strong>Upload Photo</strong></p>
			<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>-->			<!-- 17.11.2015 -->
                    					<?php echo form_upload('image_photo');?>
                                        <!-- 17.11.2015 -->
						            </div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6 rght">
									<p><strong>Upload ID Proof</strong></p>
                                      <?php echo form_upload('image_photo');?>
			<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>-->
                    					<!-- 17.11.2015 -->
                    					
                                        <!-- 17.11.2015 -->
						</div>

</div>
<div class="form-actions noborder">
									<button type="submit" class="btn blue" >Submit</button> <!-- 18.11.2015  -- onclick="return check_mobile();" -->
									<button  type="reset" class="btn default">Reset</button>
								</div>
</div>
<?php form_close(); ?>
	<!-- END CONTENT -->
</div>
</div>
</div>
</div>
</div>	


