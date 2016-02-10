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
</style>
<!--<script src="../../../../assets/common/js/jquery.min.js" type="text/javascript"></script>-->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
    	 $("#chk").hide();
		 $("#b_agency_name").hide()
		 //$("#ag_name").attr("required","false");
		 $("#ct_name").attr("required","true");	
    });
	
	function hideShow(t)
	{
		if($('#agency_yn').val() == '5')
		{
			$("#chk").show();
			$("#b_agency_name").show();
			$("#b_contact_name").hide();
			$("#ct_name").removeAttr("required");
			$("#ag_name").attr("required","true");
		 	//$("#ct_name").attr("required","false");
		}
		else
		{
			$("#chk").hide();
			$("#b_agency_name").show();
			$("#b_contact_name").show();
			//$("#ag_name").attr("required","false");
		 	$("#ct_name").attr("required","true")
			$("#ag_name").removeAttr("required");
			$("#ag_name").val("");
		}
	}
	
</script>
			<div class="row ds">
				<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Add Broker</span>
							</div>
						</div>
                    <?php

                    $form = array(
                        'class' 			=> 'form-body',
                        'id'				=> 'form',
                        'method'			=> 'post'
                    );

                    echo form_open_multipart('dashboard/add_broker',$form);

                    ?>
						<div class="portlet-body form">

								<div class="form-body">
                                
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
                                
                                
								<div class="row">
									<div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="6">No</option>	
                                            <option value="5">Yes</option>
										</select>
										<label for="form_control_2">Agency? <span class="required">*</span></label>
									</div>
                                    
									<div class="form-group form-md-line-input form-md-floating-label col-md-4" id="chk">
									
										<input autocomplete="off" type="text" class="form-control" id="ag_name" name="b_agency_name" onkeypress="return onlyLtrs(event, this);">
										<label>Agency Name <span class="required" id="b_agency_name">*</span></label>
										<span class="help-block">Enter Agency Name...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" autocomplete="off" class="form-control" id="ct_name" name="b_name"  onkeypress="return onlyLtrs(event, this);">
										<label>	Contact Name<span class="required" id="b_contact_name">*</span></label>
										<span class="help-block">Contact Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_address" required="required" >
										<label>Address <span class="required">*</span></label>
										<span class="help-block">Enter Full Address...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_contact" required="required" onkeypress="return onlyNos(event, this);" maxlength="10" >
										<label>Mobile No. <span class="required">*</span></label>
										<span class="help-block">Enter Mobile No...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input  type="email" autocomplete="off" class="form-control" id="form_control_1" name="b_email" >
										<label>Email </label>
										<span class="help-block">Enter Email Adress...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-3">
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="b_website">
										<label>Website </label>
										<span class="help-block">Enter Website...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="b_pan" required="required">
										<label>Pan Card No. <span class="required">*</span></label>
										<span class="help-block">Enter Pan Card No...</span>
									</div>
								
									<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="b_bank_acc_no" required="required" onkeypress="return onlyNos(event, this);">
										<label>Bank Account no. <span class="required">*</span></label>
										<span class="help-block">Enter Bank Account no...</span>
									</div>
								
									<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_bank_ifsc" required="required">
										<label>IFSC Code <span class="required">*</span></label>
										<span class="help-block">Enter IFSC Code...</span>
									</div>
                                    
                                    <div class="form-group form-md-line-input form-md-floating-label col-md-3">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_commission" required="required">
										<label>Commission % <span class="required">*</span></label>
										<span class="help-block">Enter commission %...</span>
									</div>
								
									<div class="form-group form-md-line-input form-md-floating-label col-md-12">
									<p><strong>Upload Photo</strong></p>
			<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>-->
                    					<!-- 17.11.2015 -->
                    					<?php echo form_upload('image_photo');?>
                                        <!-- 17.11.2015 -->
						</div>
							

</div>
<div class="form-actions noborder">
									<button type="submit" class="btn blue">Submit</button>
									<button  type="reset" class="btn default">Reset</button>
								</div>
</div>
                            <?php form_close(); ?>
	<!-- END CONTENT -->
</div>

</div>
</div>
	<!-- END CONTENT -->
	</div>
    
    