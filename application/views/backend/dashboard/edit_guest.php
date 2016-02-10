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
    margin-top: -234px;
   
    float: right;
}
.form-group.form-md-line-input.form-md-floating-label.col-md-6.dwn {
    width: 51%;
   
}
.upload-one{
	width:50%;
	height:200px;
	border:0px solid red;
}
.upload-two{
	width:50%;
	height:200px;
	border:0px solid red;
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
			$('#g_country').val(data.country);
			$('#g_state').val(data.state);
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
								<span class="caption-subject bold uppercase"> Edit Guest</span>
							</div>
							
						</div>
						<div class="portlet-body form">
                        
                            <?php

                            $form = array(
                                'class' 			=> 'form-body',
                                'id'				=> 'form',
                                'method'			=> 'post'
                            );
							
							

                            echo form_open_multipart('dashboard/edit_guest',$form);
							
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
									<?php 
								if (isset($value))

								{

									foreach ($value as $g_edit) { ?>
									<div class="form-group form-md-line-input  col-md-6 full">
									
										<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="g_name" onkeypress=" return onlyLtrs(event, this);" required  value="<?php echo $g_edit->g_name; ?>">
										<label>Full Name <span class="required">*</span></label>
										<span class="help-block">Enter Full Name...</span>
									</div>
									
									<div class="form-group form-md-line-input  col-md-6 add">
									
										<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="g_address" required   value="<?php echo $g_edit->g_address; ?>">
										<label>Address <span class="required">*</span></label>
										<span class="help-block">Enter Full Address...</span>
									</div>
                                    
									<div class="form-group form-md-line-input  col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="pincode" name="g_place"  required="required" onblur="fetch_all_address()"   value="<?php echo $g_edit->g_pincode; ?>">
										<label>Pincode<span class="required">*</span></label>
										<span class="help-block">Enter Pincode...</span>
	 								</div>
                                     
									<div class="form-group form-md-line-input  col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="g_city" name="g_city"  value="<?php echo $g_edit->g_city; ?>"  
                                        required= "required"/ >
                                       
										<label>City/ Town/ Village<span class="required">*</span></label>
										<span class="help-block">Enter City/ Town/ Village...</span>
	 								</div>
	 								
	 								<div class="form-group form-md-line-input  col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="g_state"  name="g_state"   value="<?php echo $g_edit->g_state; ?>"  
                                        required ="required"/>
                                       
										<label> State<span class="required">*</span></label>
										<span class="help-block">Enter State Name...</span>
	 								</div>
                                    
	 								<div class="form-group form-md-line-input  col-md-6">
										<input autocomplete="off" type="text" class="form-control" id="g_country" name="g_country"  value="<?php echo $g_edit->g_country; ?>"  required="required" />
										<label>Country<span class="required">*</span></label>
										<span class="help-block">Enter Country Name...</span>
	 								</div>
									
									<div class="form-group form-md-line-input  col-md-6">
									
										<input autocomplete="off" type="text" class="form-control" id="mobile" name="g_contact_no"  required="required" maxlength="10" onkeypress=" return onlyNos(event, this);"  value="<?php echo $g_edit->g_contact_no; ?>" >
										<label>Mobile No. <span class="required">*</span></label>
										<span class="help-block">Enter Mobile No...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-6">
										<input  autocomplete="off" type="email" class="form-control" id="form_control_1" name="g_email"  value="<?php echo $g_edit->g_email; ?>" >
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
										<select class="form-control"  name="g_gender" >
											<option value="<?php echo $g_edit->	g_gender; ?>"><?php echo $g_edit->g_gender; ?></option>
                                            <?php 
											if($g_edit->g_gender =='Male')
											{
											?>
                                            <option value="Female">Female</option>
                                            <?php }
											else if($g_edit->g_gender == 'Female'){?>
											<option value="Male">Male</option>
                                            <?php } else{?>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
											<?php }?>
										</select>
										</select>
											<label>Gender <span class="required">*</span></label>
											<span class="help-block">Enter Gender...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-6">
									
										<input autocomplete="off" type="text" class="form-control  date-picker " id="form_control_1"  value="<?php echo $g_edit->g_dob; ?>" name="g_dob" required>
										
                                        <!--<input  type="date" class="form-control" id="form_control_1" name="g_dob" required="required">-->
                                        <label> DOB <span class="required">*</span></label>
										<span class="help-block">Enter DOB...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-6">
									
										<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="g_occupation" required  value="<?php echo $g_edit->g_occupation; ?>" >
										<label>Occupation <span class="required">*</span></label>
										<span class="help-block">Enter Occupation...</span>
									</div>
									<div class="form-group form-md-line-input  has-info col-md-6">
										<select class="form-control" id="form_control_2" name="g_married">
											<option value="<?php echo $g_edit->	g_married; ?>"><?php echo $g_edit->	g_married; ?></option>
                                            <?php 
											if($g_edit->g_married =='Yes')
											{
											?>
                                            <option value="No">No</option>
                                            <?php }
											else if($g_edit->g_married == 'No'){?>
											<option value="Yes">Yes</option>
                                            <?php } 
											else{?>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <?php }?>
										</select>
										<label for="form_control_2">Married? <span class="required">*</span></label>
                                        <input type="hidden" name="guest_id" value="<?php echo $g_edit->g_id; ?>" />
									</div>
									
									
									<!--<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									
										<input type="text" class="form-control" id="form_control_1" >
										<label id="form_control_1">Others <span class="required">*</span></label>
										<span class="help-block">Enter Others Option...</span>
									</div>-->
									<div class="form-group form-md-line-input form-md-floating-label col-md-6 dwn">
									<!--<p><strong>Upload Photo</strong></p>
									<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
											</div>			
                    					<?php echo form_upload('image_photo');?>
                                         17.11.2015 -->
                                         <div class="upload-one ">
                                         
                                         	<center><h3>Photo Proof</h3></center>
                                        	<img  width="30%"  src="<?php echo base_url();?>upload/guest/<?php if( $g_edit->g_photo_thumb== '') { echo "no_images.png"; } else { echo $g_edit->g_photo_thumb; }?>" alt=""/>

                                         </div>
                                         <!--<input type="file" id="photo-proof" name="g_photo">-->
                                         <?php echo form_upload('image_photo');?>
									</div>
									<div class="clear">
										
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6 rght">
									<!--<p><strong>Upload ID Proof</strong></p>
                                    
									<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
											</div>
										 17.11.2015 -->                    					
                                         
                                    <div class="upload-two pull-right ">
                                     
                                    	<center><h3>ID Proof</h3></center>
                                    	<img  width="30%"  src="<?php echo base_url();?>upload/guest/<?php if( $g_edit->g_id_proof_thumb== '') { echo "no_images.png"; } else { echo $g_edit->g_id_proof_thumb; }?>" alt=""/>
                                    </div>
                                    <?php echo form_upload('image_idpf');?>
                                    <!--<input type="file" id="g_id_proof" name="g_id_proof">-->
                                        
                                         
									</div>

									</div>
									<div class="form-actions noborder">
										<br />
										<button type="submit" class="btn blue" >Submit</button> <!-- 18.11.2015  -- onclick="return check_mobile();" -->
										<button  type="reset" class="btn default">Reset</button>
									</div>
								</div>
								<?php 
								}
							}

									
form_close(); ?>
	<!-- END CONTENT -->
</div>
</div>
</div>
</div>
</div>	

