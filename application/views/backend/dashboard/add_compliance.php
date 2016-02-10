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
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
    $("form").submit(function(){
        
		$.valid_from = Date.parse($('#c_valid_from').val());
		$.valid_upto = Date.parse($('#c_valid_upto').val());
		$.renewal = Date.parse($('#c_renewal').val());
		$.value = $.now();
		
		if($.valid_from > $.value)
		{
			alert('Valid Date Should Be Lesser Than The System Date');
			return false;
		}else if($.valid_upto < $.value)
		{
			alert('Valid Upto Date Should Be Greater Than The Todays Date');
			return false;
		}
		else if ($.renewal < $.value)
		{
			alert('Renewal Date Should Be Greater Than The Todays Date');
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
                    <span class="caption-subject bold uppercase"> Add Certificate</span>
                </div>

            </div>
            <div class="portlet-body form">


                    <?php

                    $form = array(
                    'class' 			=> 'form-body',
                    'id'				=> 'form',
                    'method'			=> 'post'
                    );

                    echo form_open_multipart('dashboard/add_compliance',$form);

                    ?>
                    <div class="row">
                        <div class="form-group form-md-line-input  has-info col-md-6">
                            <select class="form-control" id="form_control_2" name="c_valid_for">
                                <option value="Self">Self </option>
                                <option value="Hotel">Hotel</option>
                            </select>
                            <label for="form_control_2">Valid for  <span class="required">*</span></label>
                        </div>
                        <div class="form-group form-md-line-input  has-info col-md-6">
                            <select class="form-control" id="form_control_2">

                                <?php $hotels=$this->dashboard_model->all_hotels();
                                if(isset($hotels) && $hotels){
                                    foreach($hotels as $hotel){

                                        ?>

                                        <option value="<?php echo $hotel->hotel_id ?>"><?php echo $hotel->hotel_name ?></option>
                                    <?php }} ?>
                            </select>
                            <label for="form_control_2">Hotel Name <span class="required">*</span></label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                            <input type="text" autocomplete="off" class="form-control" name="c_name" required="required">
                            <label>Certificate Name <span class="required">*</span></label>
                            <span class="help-block">Enter Certificate Name...</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                            <input type="text" autocomplete="off" class="form-control" name="c_authority" required="required">
                            <label>Certificate Authority <span class="required">*</span></label>
                            <span class="help-block">Enter Certificate Authority Name...</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                            <input type="text" autocomplete="off" class="form-control" name="c_owner" required="required">
                            <label>Certificate Owner <span class="required">*</span></label>
                            <span class="help-block">Enter Certificate Owner...</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                            <textarea class="form-control" name="c_description" required="required"></textarea>
                            <label>Description <span class="required">*</span></label>
                            <span class="help-block">Enter Description...</span>
                        </div>
                        <div class="form-group form-md-line-input  has-info col-md-4">
                            <select class="form-control" id="form_control_2" name="c_type">
                                <option value="Pollution">Pollution</option>
                                <option value="Fire">Fire</option>
                                <option value="Trade">Trade</option>
                                <option value="Food">Food</option>
                                <option value="Income Tax">Income Tax</option>
                                <option value="Others">Others </option>
                            </select>
                            <label for="form_control_2">Certificate Type <span class="required">*</span></label>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                            <input type="text" autocomplete="off" class="form-control" name="c_type">
                            <label>Others Certificate Type </label>
                            <span class="help-block">Enter Others Certificate Type...</span>
                        </div>

                        <div class="form-group form-md-line-input  has-info col-md-4">
                            <select class="form-control" id="form_control_2" name="c_importance">
                                <option value="y">Low</option>
                                <option value="o">Medium</option>
                                <option value="r">High</option>
                            </select>
                            <label for="form_control_2">Importance <span class="required">*</span></label>
                        </div>
                        <div class="form-group form-md-line-input  col-md-4">
                       
                            <input type="text" autocomplete="off" required="required" name="c_valid_from" class="form-control date-picker "  id="c_valid_from" >
                             <label>Valid From <span class="required">*</span></label>
                             
                             
                            <label for="form_control_3"></label>
                            <span class="help-block">Enter Valid Date... </span>
                        </div>
                        <div class="form-group form-md-line-input  col-md-4">
                                 
                            <input type="text" autocomplete="off" required="required" name="c_valid_upto" class="form-control date-picker" id="c_valid_upto" >
								<label>Valid Up to <span class="required">*</span></label>					
                            <label for="form_control_2"></label>
                            <span class="help-block">Enter Valid Up to Date...  </span>
                        </div>
                        <div class="form-group form-md-line-input  col-md-4">
                            <input type="text" autocomplete="off" name="c_renewal" required="required" class="form-control date-picker" id="c_renewal" >
                            <label>Renewal Date  <span class="required">*</span></label>	
                            <label for="form_control_1"></label>
                            <span class="help-block">Enter Renewal Date...<span class="required">*</span></span>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                        	<input type="file" name="image_certificate" />
                           <!-- <div action="<?php //echo base_url();?>/assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">-->
                            </div>
                        </div>
						<br>
                        <div class="form-group form-md-line-input form-md-floating-label col-md-6">
                            <label style="width:100%;color: #999;font-size: 16px;">Primary Notification period (Days) <span class="required">*</span></label>
                            <input name="c_primary" class="knob" data-width="40%" value="50" data-rotation="clockwise">

                        </div>


                        <div class="form-group form-md-line-input form-md-floating-label col-md-6">
                            <label style="width:100%;color: #999;font-size: 16px;">Secondary  Notification period (Hours) <span class="required">*</span></label>
                            <input name="c_secondary" class="knob" data-width="40%" data-fgColor="#66EE66" data-rotation="clockwise" value="35">

                        </div>


                        <div class="clearfix"></div>


                    </div>
					<br>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue" >Submit</button>
                        <button type="submit" class="btn default">Reset</button>
                    </div>
                <?php form_close(); ?>
                </div>

        </div>
        <div class="clearfix"></div>
        <!---->

    </div>
    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->