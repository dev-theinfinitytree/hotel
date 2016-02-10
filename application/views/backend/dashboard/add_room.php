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
                                                
                                      <span class="caption-subject bold uppercase"><i class="glyphicon glyphicon-bed"></i>&nbsp; Add Room</span>
                                            </div>
							
						                </div> <br/>
									
									
                                
                                
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
                                              
                                                
                                     	<form action="<?php echo base_url();?>/dashboard/add_room" method="post" enctype="multipart/form-data" id="form">
                                    <!--<div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="6">102</option>	
                                            <option value="5">103</option>
										</select>
										<label for="form_control_2">ROOM N0 <span class="required">*</span></label>
									</div>-->
									<!-- add unit type---->

                                                
                                    <div class="form-group form-md-line-input  has-info col-md-4">
										<select name="unit_type" id="unit_type" class="form-control" required="required" onchange="get_unit_name(this.value)">
											<option value="" disabled="" selected="">--Unit Type--</option>
											<option value="Room">Room</option>
											<option value="Bunglow">Bunglow</option>
											<option value="Villa">Villa</option>
										</select>
										<label for="form_control_2">Unit Type <span class="required">*</span></label>
                                    </div>
                                                
                                                
                                        
                                    <div class="form-group form-md-line-input  has-info col-md-4" id="unitName">
										<select class="form-control" id="unit_name" name="unit_name" required="required" >
											<option value="" disabled="" selected="">--Unit Name--</option>
										</select>
										<label for="form_control_2">Unit Name<span class="required">*</span></label>
									</div>

									<div class="form-group form-md-line-input form-md-floating-label col-md-4" id="unitClass">
										<input type="text" autocomplete="off" class="form-control" readonly id="unit_class" name="unit_class" required="required">
										<label>	Unit Class<span class="required" id="b_contact_name">*</span></label>
										<span class="help-block">Unit Class...</span>
                                    </div>									
									
									<!-- end add unit type---->
									
                                                
                                                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                    <input type="text" autocomplete="off" class="form-control" id="ct_name" name="room_no"  onkeypress="return onlyNos(event, this);" required="required">
                                                    <label>	Room No<span class="required" id="b_contact_name">*</span></label>
                                                    <span class="help-block">Room No...</span>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="floor_no" value="lala"  required="required" >
                                            <option disabled selected> Select The Floor </option>
											<!--<option value="select the floor" disabled="disabled">--Select The Floor--</option>-->
                                            <option value="0">Ground Floor</option>	
                                            <option value="1">First Floor</option>
                                            <option value="2">Second Floor</option>	
                                            <option value="3">Third Floor</option>
										</select>
										<label for="form_control_2">Floor No <span class="required">*</span></label>
                                        </div>
                                                
                                                
                                        
                                     <div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="room_bed" required="required" >
											<option value="1">1</option>	
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
										</select>
										<label for="form_control_2">Bed No<span class="required">*</span></label>
									</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                    <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="room_rent" required="required" onkeypress="return onlyNos(event, this);" >
                                                    <label>Base Room Rent <span class="required">*</span> </label>
                                                    <span class="help-block">Enter Base Room Rent...</span>
                                                    
                                                </div>
												  <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                    <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="room_rent_weekend" required="required" onkeypress="return onlyNos(event, this);" >
                                                    <label>Weekend Room Rent <span class="required">*</span> </label>
                                                    <span class="help-block">Enter Weekend  Room Rent...</span>
                                                    
                                                </div>
												  <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                    <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="room_rent_seasonal" required="required" onkeypress="return onlyNos(event, this);" >
                                                    <label>Seasonal Room Rent <span class="required">*</span> </label>
                                                    <span class="help-block">Enter Seasonal Room Rent...</span>
                                                    
                                                </div>
                                                
                                                
                                                
                                  <div class="form-group form-md-line-input  has-info col-md-12">
										<!--<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="9">--Select Room Type--</option>	
                                            <option value="10">Ac Room</option>
                                            <option value="11">Non Ac Room</option>
										</select>
										<label for="form_control_2">AC Availability <span class="required">*</span></label>-->
                                          <div class="form-group form-md-checkboxes ">
                                                 <label style=" font-size:16px;">Available Features</label>
                                                 <div class="md-checkbox-inline">
												 <?php foreach($room_feature as $qry){ ?>
                                                              <div class="md-checkbox col-md-3" style="width:30%">
                                                               <input type="checkbox" id="chk_<?php echo $qry->room_feature_id; ?>" class="md-check" name="room_feature[]" value="<?php echo $qry->room_feature_id;?>" onclick="showType('<?php echo $qry->room_feature_id;?>')">
                                                               <label for="chk_<?php echo $qry->room_feature_id; ?>">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               <?php echo $qry->room_feature_name; ?> </label>
															<div class="radio-list col-md-12 showhidetarget" id="featureType_<?php echo $qry->room_feature_id;?>">
																<label class="radio-inline">
																	<input type="radio" name="feature_type_<?php echo $qry->room_feature_id; ?>" id="feature_type_<?php echo $qry->room_feature_id; ?>" value="0" checked="checked" >
																	Free</label>
																<label class="radio-inline">
																	<input type="radio" name="feature_type_<?php echo $qry->room_feature_id; ?>" id="feature_type_<?php echo $qry->room_feature_id; ?>" value="1">
																	Chargeable</label>
															  

															</div>
                                                            </div>
												 <?php } ?>			  
                                                              
                                                              <!--<div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox2" class="md-check" name="room_feature[]" value="Television">
                                                               <label for="checkbox2">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Television</label>
                                                              </div>
                                                              <div class="md-checkbox col-md-4">
                                                               <input type="checkbox" id="checkbox3" class="md-check" name="room_feature[]" value="Extra Bed Availabel on Demand">
                                                               <label for="checkbox3">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Extra Bed Availabel on Demand </label>
                                                             </div>	-->														 
                                                            
                                               </div>
                                       </div>
                                        
                              </div>             
                                                
                                                
                                                
                                    <!--<div class="form-group form-md-line-input  has-info col-md-12">
										<!--<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="9">--Select Room Type--</option>	
                                            <option value="10">Ac Room</option>
                                            <option value="11">Non Ac Room</option>
										</select>
										<label for="form_control_2">AC Availability <span class="required">*</span></label>-->
                                          <!--<div class="form-group form-md-checkboxes">
                                                 <label></label>
                                                 <div class="md-checkbox-inline">
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox7" class="md-check" name="room_feature[]" value="Balcony">
                                                               <label for="checkbox7">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Balcony </label>
                                                              </div>
                                                              
                                                             <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox4" class="md-check" name="room_feature[]" value="Premium View">
                                                               <label for="checkbox4">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Premium View</label>
                                                              </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox5" class="md-check" name="room_feature[]" value="Telephone">
                                                               <label for="checkbox5">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Telephone </label>
                                                              </div>
                                                              
                                                             
                                               </div>
                                       </div>
                                        
                              </div>--> 
                              
                              <!--<div class="form-group form-md-line-input  has-info col-md-12">
										<!--<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="9">--Select Room Type--</option>	
                                            <option value="10">Ac Room</option>
                                            <option value="11">Non Ac Room</option>
										</select>
										<label for="form_control_2">AC Availability <span class="required">*</span></label>-->
                                          <!--<div class="form-group form-md-checkboxes">
                                                 <label></label>
                                                 <div class="md-checkbox-inline">
                                                              
                                                             
                                                            <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox6" class="md-check" name="room_feature[]" value="Geyser (Hot Water)">
                                                               <label for="checkbox6">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                              Geyser (Hot Water) </label>
                                                             </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox8" class="md-check" name="room_feature[]"  value="Room Heater">
                                                               <label for="checkbox8">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Room Heater </label>
                                                              </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox9" class="md-check" name="room_feature[]" value="Honeymoon Suite ">
                                                               <label for="checkbox9">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Honeymoon Suite </label>
                                                             </div>
                                               </div>
                                       </div>
                                        
                              </div> -->        
                                                
                                                
                                                
                                            
                                                <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                                                <p><strong>Upload Photo</strong></p>
                        <!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
                                </div>-->
                                                    <!-- 17.11.2015 -->
                                        <input type="file"  name="image" />                                                    <!-- 17.11.2015 -->
                                               </div>
                                               
                                               
                                        
            
                  </div>
                                    <div class="form-actions noborder">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button  type="reset" class="btn default">Reset</button>
                                            </div>
                                            
                             </div>
                           
	<!-- END CONTENT -->

				
					
				
			</div>
			<!-- END PAGE CONTENT-->
		</div>
<script>
function get_unit_name(val){
	//alert(val);
	$.ajax({
	   type: "POST",
	   url: "<?php echo base_url();?>dashboard/get_unit_name",
	   data: "val="+val,
	   success: function(msg){
		    $("#unitName").html(msg);
	   }
	});
}
function get_unit_class(val){
	//alert(val);
	$.ajax({
	   type: "POST",
	   url: "<?php echo base_url();?>dashboard/get_unit_class",
	   data: "val="+val,
	   success: function(msg){
		    $("#unitClass").html(msg);
	   }
	});
}
function showType(val){
	//alert(val);
	$("#featureType_"+val).toggle();
}
$(document).ready(function () {
	$('.showhidetarget').hide();
});
</script>
	<!-- END CONTENT -->