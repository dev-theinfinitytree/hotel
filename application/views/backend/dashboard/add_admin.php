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
</style>
<!-- 20.11.2015
<script src="<?php //echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php //echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php //echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript">
	
		jQuery.validator.setDefaults({
  			debug: true,
  			success: "valid"
		});
		$( "#form" ).validate({
  			rules: {
    			admin_password: "required",
    			admin_retype_password: {
      			equalTo: "$admin_password";
			//alert($("#admin_password").val());
			//console.log();
    	}
		});
  	
</script>

<!--20.11.2015-->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
    $("form").submit(function(){
		
			$.password = $('#admin_password').val();
			$.password_again =$('#admin_retype_password').val();
			if($.password != $.password_again)
			{
				alert('Password Does Not Matched');
				return false;
			}
			else
			{
				return true;
			}
		
		});
	});
</script>

			<div class="row ds">
				<div class="col-md-12">
<!---->
<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Add Admin</span>
							</div>
							
						</div>
						<div class="portlet-body form">
                            <?php

                            $form = array(
                                'class' 			=> 'form-body',
                                'id'				=> 'form',
                                'method'			=> 'post'
                            );

                            if(isset($permission) && $permission){
                                foreach($permission as $per){
                                    $admin_permission=$this->dashboard_model->get_permission_by_label($per->permission_label);
                                    if(isset($admin_permission) && $admin_permission){
                                        $i=0;
                                        foreach($admin_permission as $admin_perm){
                                            $permission_types[$per->permission_label][$i]=array(
                                                'value'=>$admin_perm->permission_value,
                                                'id'=>$admin_perm->permission_id
                                            );
                                            $i++;
                                        }
                                    }
                                }
                            }
                            $key=array_keys($permission_types);

                            echo form_open_multipart('dashboard/add_admin',$form);

                            ?>
								<div class="form-body">
								<div class="row">
                                    <?php if($this->session->userdata('user_type_slug')=="SUPA"):  ?>
									<div class="form-group form-md-line-input form-md-floating-label has-info col-md-6">
										<select name="admin_hotel" class="form-control" id="form_control_2">
											<option value=""></option>

                                            <?php $hotels=$this->dashboard_model->all_hotels();
                                        if(isset($hotels) && $hotels){
                                            foreach($hotels as $hotel){

                                            ?>

											<option value="<?php echo $hotel->hotel_id ?>"><?php echo $hotel->hotel_name ?></option>
                                            <?php }} ?>
										</select>
										<label for="form_control_2">Hotel Name <span class="required">*</span></label>
									</div>
                                    <?php endif; ?>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input name="admin_first_name" type="text" class="form-control" id="form_control_1" required="required" onkeypress=" return onlyLtrs(event,this);">
										<label>First Name <span class="required">*</span></label>
										<span class="help-block">Enter First Name...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input name="admin_middle_name" type="text" class="form-control" id="form_control_1" onkeypress="return onlyLtrs(event, this);" >
										<label>Middle Name</label>
										<span class="help-block">Enter Middle Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input name="admin_last_name" type="text" class="form-control" id="form_control_1" required="required" onkeypress="return onlyLtrs(event, this);" >
										<label>Last Name <span class="required">*</span></label>
										<span class="help-block">Enter Last Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input name="admin_email" type="email" class="form-control" id="form_control_1" required="required" >
										<label>Email <span class="required">*</span></label>
										<span class="help-block">Enter Email Adress...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input name="admin_username" type="text" class="form-control" id="form_control_1" required="required" >
										<label>Uesr Name <span class="required">*</span></label>
										<span class="help-block">Enter Uesr Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input name="admin_password" type="password" class="form-control" id="admin_password"  required="required">
										<label>Password <span class="required">*</span></label>
										<span class="help-block">Enter Password...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input  name="admin_retype_password" type="password" class="form-control" id="admin_retype_password" required="required" >
										<label>Retype Password <span class="required">*</span></label>
										<span class="help-block">Enter Retype Password...</span>
									</div>



                                    <?php
                                    foreach($key as $keys):
                                    ?>
									
									<div class="form-group form-md-line-input col-md-6 tld">
									 <div class="tld_in">
										<label class="col-md-5 control-label lt" for="form_control_1"><?php echo $keys;?></label>
										<div class="col-md-7">
											<div class="md-checkbox-inline">
                                                <?php $i=1; ?>
                                                <?php foreach($permission_types[$keys] as $per=>$value):?>

                                                    <input class="md-check" id="checkbox<?php echo $value['id'];?>" type="checkbox" name="permission[]" value="<?php echo $value['id'];?>" checked/>

                                                    <label for="checkbox4">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        <?php echo $value['value'];?></label>


                                                    <?php $i++; ?>


                                                <?php endforeach;?>

											</div>
										</div>
								  </div>	
								</div>
								
                                    <?php
                                    endforeach;
                                    ?>

									
									<div class="clearfix"></div>
										
									</div>
								</div>
								<div class="form-group full">
									<p><strong>Upload Photo</strong></p>
			<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>-->			<!-- 17.11.2015 -->
                    					<?php echo form_upload('image_photo');?>
                                        <!-- 17.11.2015 -->
						            </div>
									
								<div class="form-actions noborder">
									<button type="submit" class="btn blue">Submit</button>
									<button type="button" class="btn default">Reset</button>
								</div></div>
							<?php echo form_close(); ?>
						</div>
					<div class="clearfix"></div>







								<!--<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-user-plus"></i>Add Admin
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="javascript:;" class="reload" onclick="$('#reset').trigger('click');">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<!--


				

				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->