<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus-square"></i>Add Hotel
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
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
                                        <?php
                                        $form = array(
                                                   'class' 			=> 'form-horizontal',
                                                   'id'				=> 'form',
												   'method'			=> 'post'
                                                );
                                        $hotel_name = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'hotel_name',
                                                  'placeholder' 	=> 'Hotel Name',
												  'required'		=> 'required'
                                                );
                                                
                                        $hotel_address = array(
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_address',
                                                  'placeholder' 	=> 'Address',
												  'required'		=> 'required',
												  'cols'			=> '0',
												  'rows'			=> '0'
                                                );
												
										$hotel_city = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'hotel_city',
                                                  'placeholder' 	=> 'City',
												  'required'		=> 'required'
                                                );
												
										$hotel_district = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'hotel_district',
                                                  'placeholder' 	=> 'District',
												  'required'		=> 'required'
                                                );	
												
										$hotel_state = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'hotel_state',
                                                  'placeholder' 	=> 'State',
												  'required'		=> 'required'
                                                );
												
										$hotel_pin = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'hotel_pin',
												  'onkeypress'		=> 'return onlyNos(event,this);',
                                                  'placeholder' 	=> 'Pin',
												  'required'		=> 'required'
                                                );	
										$hotel_country[''] = "--Select Country--";		
										if(isset($country) && $country){
											foreach($country as $con){
												$hotel_country[$con->id] = $con->country_name;
											}
										}
										$js = 'class="form-control input-circle-right"';	
												
										$hotel_email = array(
                                                  'type'			=> 'email',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_email',
												  'id'				=> 'hotel_email',
                                                  'placeholder' 	=> 'Email',
												  'required'		=> 'required',
												  'onkeyup'			=> 'emailCheck();'
                                                );
										$hotel_phone = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_phone',
												  'id'				=> 'hotel_phone',
                                                  'placeholder' 	=> 'Phone Number',
												  'required'		=> 'required',
												  'onkeypress'		=> 'return onlyNos(event,this);',
												  'onkeyup'			=> 'phoneCheck();',
												  'maxlength'		=> '10'
                                                );
												
										$hotel_phone_alternative1 = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_phone_alternative1',
                                                  'placeholder' 	=> 'Alternative Phone Number-1',
												  'onkeypress'		=> 'return onlyNos(event,this);',
												  'maxlength'		=> '10'
                                                );
												
										$hotel_phone_alternative2 = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_phone_alternative2',
                                                  'placeholder' 	=> 'Alternative Phone Number-2',
												  'onkeypress'		=> 'return onlyNos(event,this);',
												  'maxlength'		=> '10'
                                                );
												
										$hotel_fax = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_fax',
                                                  'placeholder' 	=> 'Fax',
												  'onkeypress'		=> 'return onlyNos(event,this);',
												  'maxlength'		=> '10'
                                                );
												
										$hotel_url = array(
                                                  'type'			=> 'url',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_url',
                                                  'placeholder' 	=> 'URL',
                                                );
												
										$hotel_description = array(
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'hotel_description',
                                                  'placeholder' 	=> 'Description',
												  'cols'			=> '0',
												  'rows'			=> '0'
                                                );
												
										$hotel_star_rating[''] = "--Select Star Rating--";		
										if(isset($star) && $star){
											foreach($star as $str){
												$hotel_star_rating[$str->star_rating_id] = $str->star_rating_value;
											}
										}
										
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
										
										echo form_open('dashboard/add_hotel',$form);
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
                                                    	Name of the Hotel <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-hotel"></i>
															</span>
															<?php echo form_input($hotel_name);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Address <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_textarea($hotel_address);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	City <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_input($hotel_city);?>
														</div>
													</div>
												</div>
                                                 <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	District <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_input($hotel_district);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	State <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_input($hotel_state);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Country <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-flag"></i>
															</span>
															<?php echo form_dropdown('hotel_country', $hotel_country, '', $js);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Pin <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_input($hotel_pin);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Email Address <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_input($hotel_email);?>
														</div>
													</div>
                                                    <div class="col-md-2" id="email"></div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Phone <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-phone">+91-</i>
															</span>
															<?php echo form_input($hotel_phone);?>
														</div>
													</div>
                                                    <div class="col-md-2" id="phone"></div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Alternative Phone Number
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-phone"></i>
															</span>
															<?php echo form_input($hotel_phone_alternative1);?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Alternative Phone Number
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-phone"></i>
															</span>
															<?php echo form_input($hotel_phone_alternative2);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Fax Number
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-fax"></i>
															</span>
															<?php echo form_input($hotel_fax);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Website
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>
															<?php echo form_input($hotel_url);?>
														</div>
													</div>
												</div>
                                                 <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Description
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-briefcase"></i>
															</span>
															<?php echo form_textarea($hotel_description);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Star Rating
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-star"></i>
															</span>
															<?php echo form_dropdown('hotel_star_rating', $hotel_star_rating, '', $js);?>
														</div>
													</div>
												</div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <?php echo form_submit($submit);?>
                                                            <?php echo form_button($reset);?>
                                                        </div>
                                                    </div>
                                                </div>
										<?php echo form_close();?>
									</div>
								</div>
				
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->