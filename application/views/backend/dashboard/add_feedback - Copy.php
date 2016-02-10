<!-- BEGIN PAGE CONTENT-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/js/star-rating.css"/>
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
.typeahead-devs, .tt-hint {
border: 2px solid #CCCCCC;
border-radius: 8px 8px 8px 8px;
font-size: 24px;
height: 45px;
line-height: 30px;
outline: medium none;
padding: 8px 12px;
width: 400px;
}

.tt-dropdown-menu {
width: 400px;
margin-top: 5px;
padding: 8px 12px;
background-color: #fff;
border: 1px solid #ccc;
border: 1px solid rgba(0, 0, 0, 0.2);
border-radius: 8px 8px 8px 8px;
font-size: 18px;
color: #111;
background-color: #F1F1F1;
}
.star-rating {
    width: 171px;
	float:left;
}
.caption{
	display:none !important;
}
</style>
<script>
$(document).ready(function() {
$('input.typeahead-devs').typeahead({
name: 'gName',
//local:['Sunday']
remote : '<?php echo base_url(); ?>dashboard/get_guest_name/%QUERY'
});
});		  

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
                    'class' 			=> 'form-body form-horizontal form-row-sepe',
                    'id'				=> 'form',
                    'method'			=> 'post',
                );
                echo form_open_multipart('dashboard/add_feedback',$form);
                ?>
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
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Hotel Name</label>
							<div class="radio-list">
								<label class="radio-inline">
								<?php echo  $hotel_name->hotel_name; ?> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Booking Id</label>
							<div class="radio-list">
								<label class="radio-inline">
								    <?php 
										  if(isset($_GET['bID'])){
											  echo $_GET['bID'];
											  echo '<input type="hidden" name="booking_id" value="'.$_GET["bID"].'">';
										  }	else {
											  echo 'N/A';
										  }
									?> 
									</label>
								
							</div>
						</div>	
						<div class="form-group form-md-line-input form-md-floating-label col-md-6 add">
							<label>Guest Name</label>
							<div class="radio-list">
								<label class="radio-inline">
								<?php 
								if(isset($_GET['bID'])){								
									echo '<input type="text" required="required" name="gName" size="20" class="typeahead-devs form-control" placeholder="Please Enter Name" value="'.$guest->g_name.'"> </label>';
								} else {
									echo '<input type="text" required="required" name="gName" size="20" class="typeahead-devs form-control" placeholder="Please Enter Name"> </label>';
								}
								?>
							</div>
						</div>						
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Ease of booking</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c2" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w1" value="" required="required"> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Reception</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w2" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Staff</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w3" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Cleanliness</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w4" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Ambience</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w5" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Sleep Quality</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w6" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Room Quality</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w7" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Food Quality</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w8" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Environment Quality</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w9" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Service</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w10" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Package</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w11" value=""> </label>
								
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Extra Amenities</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa" name="w12" value=""> </label>
								
							</div>
						</div>						
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Will you come back again?</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input type="radio" name="or1" id="or4" value="1" checked> Yes </label>
								<label class="radio-inline">
								<input type="radio" name="or1" id="or5" value="2"> Maybe </label>
								<label class="radio-inline">
								<input type="radio" name="or1" id="or6" value="0"> No </label>
							</div>
						</div>						
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Will you refer to a friend?</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input type="radio" name="or2" id="or4" value="1" checked> Yes </label>
								<label class="radio-inline">
								<input type="radio" name="or2" id="or5" value="2"> Maybe </label>
								<label class="radio-inline">
								<input type="radio" name="or2" id="or6" value="0"> No </label>
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Was the price reasonable?</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input type="radio" name="or3" id="or4" value="1" checked> Yes </label>
								<label class="radio-inline">
								<input type="radio" name="or3" id="or5" value="2"> Maybe </label>
								<label class="radio-inline">
								<input type="radio" name="or3" id="or6" value="0"> No </label>
							</div>
						</div>						
						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
							<label>Do you have a suggestion?</label>
							<div class="radio-list">
								<label class="radio-inline">
								<input type="radio" name="or4" id="or4" value="1" checked> Yes </label>
								<label class="radio-inline">
								<input type="radio" name="or4" id="or5" value="0"> No </label>
							</div>
						</div>	
                        <div class="form-group form-md-line-input form-md-floating-label col-md-6 add">
							<label>Comment </label>
							<div class="radio-list">
								<label class="radio-inline">
								<input autocomplete="off" type="text" class="form-control" id="form_control_1" name="comment" placeholder="Enter Comment..."></label>
								
							</div>
                        </div>
						<div class="form-group">
						
						<label class="col-md-3">Add to Social Media</label>
						  <div class="col-md-9">
							<div class="radio-list">
								<label class="radio-inline">
								<div class="radio"><input type="radio" checked="" value="1" id="optionsRadios25" name="or5"></div> Yes </label>
								<label class="radio-inline">
								<div class="radio"><input type="radio" checked="" value="0" id="optionsRadios26" name="or5"></div> No </label>
							</div>
						  </div>
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


