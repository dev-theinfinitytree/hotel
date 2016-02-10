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
</style>
<!-- BEGIN PAGE CONTENT-->
			

								<div class="portlet light bordered">
                                		<div class="portlet-title">
                                            <div class="caption font-green">
                                                
                                      <span class="caption-subject bold uppercase"><i class="glyphicon glyphicon-bed"></i>&nbsp; Add Room</span>
                                            </div>
							
						                </div> <br />
									
									<!--<div class="portlet-body form">
										
                                        <?php
										$id = $this->session->userdata('user_id');
										$data = $this->dashboard_model->admin_status($id);
										if(isset($data) && $data){
											$hotel_id = $data->admin_hotel;
										}else{
											$hotel_id = '';
										}
                                        $form = array(
                                                   'class' 			=> 'form-horizontal',
                                                   'id'				=> 'form',
												   'method'			=> 'post'
                                                );
										
										$hotel_id = array(
                                                  'type'			=> 'hidden',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'hotel_id',
												  'value'			=> $hotel_id
                                                );
										
                                        $floor_no = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'floor_no',
                                                  'placeholder' 	=> 'Floor Number',
												  'maxlength'       =>  '3',
												  'required'		=> 'required',
												  'onkeypress'		=> 'return onlyNos(event,this)',
                                                );
                                                
                                        $room_no = array(
												  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'room_no',
                                                  'placeholder' 	=> 'Room Number',
												  'required'		=> 'required',
												  'onkeypress'		=> 'return onlyNos(event,this)'
                                                );
												
										$room_bed = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'room_bed',
                                                  'placeholder' 	=> 'Bed Number',
												  'maxlength'       => '1',
												  'required'		=> 'required',
												  'onkeypress'		=> 'return onlyNos(event,this);',
                                                );
														
										$ac_availability = array(
												''					=> '--Select Room Type--',
												'AC'				=> 'AC Room',
												'NON-AC'			=> 'Non-AC Room'
												);
										$js = 'class="form-control input-circle-right"';	
										
                                        $submit = array(
                                                  'class'			=> 'btn btn-circle blue',
                                                  'value'			=> 'Submit'
                                                );
										$reset = array(
                                                  'name' 			=> 'reset',
												  'id'				=> 'reset',
												  'value' 			=> 'true',
												  'type' 			=> 'reset',
												  'content' 		=> 'Reset',
												  'class'			=> 'btn btn-circle red',
                                                );
												
										$room_rent = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'room_rent',
                                                  'placeholder' 	=> 'Room Rent',
												  'required'		=> 'required',
												  'onkeypress'		=> 'return onlyNos(event,this);',
                                                );
										
										echo form_open_multipart('dashboard/add_room',$form);
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
                                            	<div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Floor No <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-building"></i>
															</span>
															<?php echo form_input($floor_no);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Room No <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-hotel"></i>
															</span>
															<?php echo form_input($room_no);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Number of Beds <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bed"></i>
															</span>
															<?php echo form_input($room_bed);?>
														</div>
													</div>
												</div>
                                                 <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	AC Availability <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bookmark"></i>
															</span>
															<?php echo form_dropdown('ac_availability', $ac_availability, '', $js);?>
														</div>
													</div>
												</div>
                                                 <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Room Rent <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
															<?php echo form_input($room_rent);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Room Image <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<?php echo form_upload('image');?>
														</div>
													</div>
												</div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <?php echo form_submit($submit);?>
                                                            <?php echo form_button($reset);?>
                                                            <?php echo form_input($hotel_id);?>
                                                        </div>
                                                    </div>
                                                </div>
										<?php echo form_close();?>
									</div>
								</div>-->
                                
                                
                                <div class="portlet-body form">

                                     <div class="form-body">
                                            <div class="row">
                                              
                                                
                                     
                                    <!--<div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="6">102</option>	
                                            <option value="5">103</option>
										</select>
										<label for="form_control_2">ROOM N0 <span class="required">*</span></label>
									</div>-->
                                                
                                                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                    <input type="text" autocomplete="off" class="form-control" id="ct_name" name="b_name"  onkeypress="return onlyNos(event, this);">
                                                    <label>	Room No<span class="required" id="b_contact_name">*</span></label>
                                                    <span class="help-block">Room No...</span>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="b_agency" value="lala" onchange="hideShow();" >
                                            <option disabled selected> Select The Floor </option>
											<!--<option value="select the floor" disabled="disabled">--Select The Floor--</option>-->
                                            <option value="7">Ground Floor</option>	
                                            <option value="8">First Floor</option>
                                            <option value="9">Second Floor</option>	
                                            <option value="10">Third Floor</option>
										</select>
										<label for="form_control_2">Floor No <span class="required">*</span></label>
                                        </div>
                                                
                                                
                                        
                                     <div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="6">1</option>	
                                            <option value="5">2</option>
                                            <option value="4">3</option>
                                            <option value="3">4</option>
										</select>
										<label for="form_control_2">Bed No<span class="required">*</span></label>
									</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                    <input  type="email" autocomplete="off" class="form-control" id="form_control_1" name="b_email" >
                                                    <label>Room Rent <span class="required">*</span> </label>
                                                    <span class="help-block">Enter Room Rent...</span>
                                                    
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
                                                              <div class="md-checkbox col-md-3" >
                                                               <input type="checkbox" id="checkbox1" class="md-check">
                                                               <label for="checkbox1">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                              Air Conditioner </label>
                                                              </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox2" class="md-check">
                                                               <label for="checkbox2">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Television</label>
                                                              </div>
                                                              <div class="md-checkbox col-md-4">
                                                               <input type="checkbox" id="checkbox3" class="md-check">
                                                               <label for="checkbox3">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Extra Bed Availabel on Demand </label>
                                                             </div>
                                                            
                                               </div>
                                       </div>
                                        
                              </div>             
                                                
                                                
                                                
                                    <div class="form-group form-md-line-input  has-info col-md-12">
										<!--<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="9">--Select Room Type--</option>	
                                            <option value="10">Ac Room</option>
                                            <option value="11">Non Ac Room</option>
										</select>
										<label for="form_control_2">AC Availability <span class="required">*</span></label>-->
                                          <div class="form-group form-md-checkboxes">
                                                 <label></label>
                                                 <div class="md-checkbox-inline">
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox7" class="md-check">
                                                               <label for="checkbox7">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Balcony </label>
                                                              </div>
                                                              
                                                             <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox4" class="md-check">
                                                               <label for="checkbox4">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Premium View</label>
                                                              </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox5" class="md-check">
                                                               <label for="checkbox5">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Telephone </label>
                                                              </div>
                                                              
                                                             
                                               </div>
                                       </div>
                                        
                              </div> 
                              
                              <div class="form-group form-md-line-input  has-info col-md-12">
										<!--<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
											<option value="9">--Select Room Type--</option>	
                                            <option value="10">Ac Room</option>
                                            <option value="11">Non Ac Room</option>
										</select>
										<label for="form_control_2">AC Availability <span class="required">*</span></label>-->
                                          <div class="form-group form-md-checkboxes">
                                                 <label></label>
                                                 <div class="md-checkbox-inline">
                                                              
                                                             
                                                            <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox6" class="md-check">
                                                               <label for="checkbox6">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                              Geyser (Hot Water) </label>
                                                             </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox8" class="md-check">
                                                               <label for="checkbox8">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Room Heater </label>
                                                              </div>
                                                              <div class="md-checkbox col-md-3">
                                                               <input type="checkbox" id="checkbox9" class="md-check">
                                                               <label for="checkbox9">
                                                               <span></span>
                                                               <span class="check"></span>
                                                               <span class="box"></span>
                                                               Honeymoon Suite </label>
                                                             </div>
                                               </div>
                                       </div>
                                        
                              </div>         
                                                
                                                
                                                
                                            
                                                <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                                                <p><strong>Upload Photo</strong></p>
                        <!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
                                </div>-->
                                                    <!-- 17.11.2015 -->
                                                   <?php echo form_upload('image');?>
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
			<!-- END PAGE CONTENT-->
		</div>

	<!-- END CONTENT -->