<style>
.all_bk .portlet.box > .portlet-title > .caption {
    padding: 11px 0 15px 0;
}
 .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
 .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px;}
 .form-group.form-md-line-input{ margin-bottom:15px;}
 .lt{line-height: 38px;}
 .tld{  margin-bottom: 10px !important;  padding-top: 10px;}
	.tld_in{ background-color: #67809F;    width: 100%;float: left;padding-top: 7px;}
	.tld_in:hover{ background-color: #f1f1f1;}
	 .dropzone .dz-default.dz-message{width: 100%;height: 50px;margin-left:0px; margin-top:0px;
    top: 0;left: 0;font-size: 50%;}
	 .dropzone{min-height: 130px;}
	 .form-group.form-md-line-input .form-control.edited:not([readonly]) ~ .help-block, .form-group.form-md-line-input .form-control:focus:not([readonly]) ~ .help-block, .form-group.form-md-line-input .form-control.focus:not([readonly]) ~ .help-block {
    color: #67809F;
    opacity: 1;
    filter: alpha(opacity=100);
}
.form-control:focus {
    border-color: #67809F !important;
    outline: 0;
    /* -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6); */
    /* box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6); */
}
select option:first-child {
    color: #888888;
}
 .radio-inline {
    position: relative;
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 16px;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
    margin-left: -32px;
    margin-top: 10px;
}
 .radio-inline+.radio-inline {
    margin-top: 10px !important ; 
    margin-left: 0px !important;
}
</style>
<!-- BEGIN PAGE CONTENT-->
			<div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">                                    
              <span class="caption-subject bold uppercase"><i class="fa fa-plus-square"></i>&nbsp; Add Asset</span>
            </div>  
        </div> 

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

                  <?php
                  $form = array(
                      'class'       => 'form-body',
                      'id'        => 'form',
                      'method'      => 'post',
      
                  ); 
                  echo form_open_multipart('dashboard/add_asset',$form);
                  ?>

                    <div class="form-group form-md-line-input  has-info col-md-4">
                      <select name="a_type" id="unit_type" class="form-control" required="required">
                        <option value="" disabled="" selected="">--Asset Type--</option>
                        <?php foreach ($asset_type as $asset_type) 
                        {
                        ?>
                            <option value="<?php echo $asset_type->asset_type_name ?>"> <?php echo $asset_type->asset_type_name ?> </option>
                        <?php 
                        } 
                        ?>
                        
                      </select>
                      <label for="form_control_2">Asset Type <span class="required">*</span></label>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_name" required="required">
                      <label> Asset Name<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Name</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">                      
                      <label> Asset First Hand<span class="required" id="b_contact_name">*</span></label>
                      <input type="radio" id="" class="md-check" name="a_first_hand" value="yes">Yes
                      <input type="radio" id="" class="md-check" name="a_first_hand" value="no">No
                      <span class="help-block">Asset Hand</span>
                    </div>                    

                    <div class="form-group form-md-line-input col-md-4">
                        
                    </div>

                    <div class="form-group form-md-line-input col-md-4">
                        <input type="text" autocomplete="off" required="required" name="a_bought_date" class="form-control date-picker "  id="c_valid_from" >
                        <label>Asset Bought On <span class="required">*</span></label>
                        <label for="form_control_3"></label>
                        <span class="help-block">Date when your asset was bought.. </span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_description" required="required">
                      <label> Asset Description<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Description</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_reg_number" required="required">
                      <label> Asset Registration Number<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Registration Number</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_purchased_from" required="required">
                      <label> Asset Purchased From<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Purchased From Seller Name</span>
                    </div>


                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" onkeypress="return onlyNos(event,this)" class="form-control" id="ct_name" name="a_seller_contact_no" required="required" maxlength="10">
                      <label> Asset Seller Contact Number<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Seller Contact Number</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" onkeypress="return onlyNos(event,this)" class="form-control" id="ct_name" name="a_service_contact_no" required="required" maxlength="10">
                      <label> Asset Service Contact Number<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Service Contact Number</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_incharge" required="required">
                      <label> Asset In Charge<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset In Charge</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_cost" required="required">
                      <label> Asset Cost<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Cost</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                      <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_annual_depreciation" required="required">
                      <label> Asset Annual Depreciation<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset Annual Depreciation(in %)</span>
                    </div>

                    <div class="form-group form-md-line-input col-md-4">
                      <input type="text" autocomplete="off" class="form-control date-picker" id="ct_name" name="a_decomission_date" required="required">
                      <label>Asset AMC Decomission Date<span class="required" id="b_contact_name">*</span></label>
                      <span class="help-block">Asset AMC Decomission Date</span>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">                      
                      <label> Asset AMC<span class="required" id="b_contact_name">*</span></label>
                      <input type="radio" id="" class="md-check" onclick="amc_open()" name="a_amc" value="yes">Yes
                      <input type="radio" id="" class="md-check" onclick="amc_close()" name="a_amc" value="no">No
                      <span class="help-block">Asset AMC</span>
                    </div>

                    <div id="AMC" style="display:none">

                      <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                        <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_amc_agency_name" >
                        <label>Asset AMC Agency Name</label>
                        <span class="help-block">Asset AMC Agency Name</span>
                      </div>

                      <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                        <input type="text" autocomplete="off" onkeypress="return onlyNos(event,this)" class="form-control" id="ct_name" name="a_amc_reg_contact_no" maxlength="10">
                        <label>Asset AMC Contact Number</label>
                        <span class="help-block">Asset AMC Contact Number</span>
                      </div>

                      <div class="form-group form-md-line-input col-md-4">
                        <input type="text" autocomplete="off" class="form-control date-picker" id="ct_name" name="a_amc_renewal_date">
                        <label>Asset AMC Renewal Date</label>
                        <span class="help-block">Asset AMC Renewal Date</span>
                      </div>

                      <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                        <input type="text" autocomplete="off" class="form-control" id="ct_name" name="a_amc_charge">
                        <label>Asset AMC Renewal Charge</label>
                        <span class="help-block">Asset AMC Renewal Charge</span>
                      </div>
                      <!--
                      
                      -->
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                      <p><strong>Upload Asset Image</strong></p>  
                        <?php echo form_upload('a_asset_image');?>                           
                        <!--<input type="file"  name="a_asset_image" />-->
                    </div>



                    <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                      <p><strong>Upload Asset Procurement Bill 1</strong></p>
                        <?php echo form_upload('a_proc_bill_1_imag');?>         
                        <!--<input type="file"  name="a_proc_bill_1_imag" />-->
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                      <p><strong>Upload Asset Procurement Bill 2</strong></p>  
                        <?php echo form_upload('a_proc_bill_2_imag');?>       
                        <!--<input type="file"  name="a_proc_bill_2_imag" />-->
                    </div>

                    <div class="col-md-4">
                      
                    </div>

                    <div class="form-actions noborder col-md-4">
                        <button type="submit" class="btn blue">Submit</button>
                        <button  type="reset" class="btn default">Reset</button>
                    </div>
                  <?php form_close(); ?>
                </div>
            </div>

        </div>

      </div>

<!-- END CONTENT -->						
<script>
function amc_open(){
  document.getElementById('AMC').style.display='block';
}
function amc_close(){
  document.getElementById('AMC').style.display='none';
}
</script>
