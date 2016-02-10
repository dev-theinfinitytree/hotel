<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-user"></i>Complete Your Profile
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
                                        $admin_first_name = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_first_name',
                                                  'placeholder' 	=> 'First Name',
												  'value'			=> $admin_status->admin_first_name,
												  'required'		=> 'required'
                                                );
												
										$admin_middle_name = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_middle_name',
                                                  'placeholder' 	=> 'Middle Name',
												  'value'			=> $admin_status->admin_middle_name
                                                );
												
										$admin_last_name = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_last_name',
                                                  'placeholder' 	=> 'Last Name',
												  'value'			=> $admin_status->admin_last_name
                                                );
												
										$admin_email = array(
                                                  'type'			=> 'email',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_email',
												  'id'				=> 'email',
                                                  'placeholder' 	=> 'Email',
												  'value'			=> $admin_status->admin_email,
												  'required'		=> 'required',
												  'onkeyup'         => 'adminEmailCheck();'
                                                );
												
										$admin_email_hidden = array(
                                                  'type'			=> 'hidden',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_email_hidden',
												  'id'				=> 'email_hidden',
                                                  'placeholder' 	=> 'Email',
												  'value'			=> $admin_status->admin_email,
												  'required'		=> 'required'
                                                );
                                                
                                        $admin_address = array(
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_address',
                                                  'placeholder' 	=> 'Address',
												  'required'		=> 'required',
												  'cols'			=> '0',
												  'rows'			=> '0'
                                                );
												
										$admin_city = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_city',
                                                  'placeholder' 	=> 'City',
												  'required'		=> 'required'
                                                );
												
										$admin_district = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_district',
                                                  'placeholder' 	=> 'District',
												  'required'		=> 'required'
                                                );	
												
										$admin_state = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_state',
                                                  'placeholder' 	=> 'State',
												  'required'		=> 'required'
                                                );
												
										$admin_pin = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'admin_pin',
												  'onkeypress'		=> 'return onlyNos(event,this);',
                                                  'placeholder' 	=> 'Pin',
												  'maxlength'		=> '6',
												  'required'		=> 'required'
                                                );	
										$admin_country[''] = "--Select Country--";		
										if(isset($country) && $country){
											foreach($country as $con){
												$admin_country[$con->id] = $con->country_name;
											}
										}
										$js = 'class="form-control input-circle-right"';	
										
										$admin_phone1 = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_phone1',
												  'id'				=> 'phone',
                                                  'placeholder' 	=> 'Phone Number',
												  'required'		=> 'required',
												  'onkeypress'		=> 'return onlyNos(event,this);',
												  'maxlength'		=> '10'
                                                );
												
										$admin_phone2 = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_phone2',
                                                  'placeholder' 	=> 'Alternative Phone Number',
												  'onkeypress'		=> 'return onlyNos(event,this);',
												  'maxlength'		=> '10'
                                                );
												
										$admin_dob = array(
                                                  'type'			=> 'date',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_dob',
												  'id'				=> 'date',
                                                  'placeholder' 	=> 'dd/mm/yyyy',
												  'required'		=> 'required'
                                                );
												
										$admin_mother_tongue = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_mother_tongue',
                                                  'placeholder' 	=> 'Mother Tongue',
												  'required'		=> 'required'
                                                );
												
										$admin_comm_language = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_comm_language',
                                                  'placeholder' 	=> 'Communication Language',
												  'required'		=> 'required'
                                                );
												
										$admin_idproof1_type = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_idproof1_type',
                                                  'placeholder' 	=> 'ID Proof Name (eg. Voter ID Card)'
                                                );
												
										$admin_idproof2_type = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_idproof2_type',
                                                  'placeholder' 	=> 'ID Proof Name (eg. Pan Card)'
                                                );
												
										$admin_idproof3_type = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'admin_idproof3_type',
                                                  'placeholder' 	=> 'ID Proof Name (eg. Passport)'
                                                );
										
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
										
										echo form_open_multipart('dashboard/admin_registration',$form);
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
                                                    	First Name <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-user"></i>
															</span>
															<?php echo form_input($admin_first_name);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Middle Name 
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-user"></i>
															</span>
															<?php echo form_input($admin_middle_name);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Last Name <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-user"></i>
															</span>
															<?php echo form_input($admin_last_name);?>
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
															<?php echo form_textarea($admin_address);?>
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
															<?php echo form_input($admin_city);?>
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
															<?php echo form_input($admin_district);?>
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
															<?php echo form_input($admin_state);?>
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
															<?php echo form_dropdown('admin_country', $admin_country, '', $js);?>
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
															<?php echo form_input($admin_pin);?>
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
															<?php echo form_input($admin_email);?>
														</div>
													</div>
                                                    <div class="col-md-2" id="email_res"></div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Phone Number <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-phone"></i>
															</span>
															<?php echo form_input($admin_phone1);?>
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
															<?php echo form_input($admin_phone2);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Date of Birth <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-calendar"></i>
															</span>
															<?php echo form_input($admin_dob);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Mother Tongue <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-language"></i>
															</span>
															<?php echo form_input($admin_mother_tongue);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Communication Language <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-language"></i>
															</span>
															<?php echo form_input($admin_comm_language);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	ID Proof Name
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-check"></i>
															</span>
															<?php echo form_input($admin_idproof1_type);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Upload ID Proof
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<?php echo form_upload('userdata1');?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Alternative ID Proof Name
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-check"></i>
															</span>
															<?php echo form_input($admin_idproof2_type);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Alternative Upload ID Proof
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<?php echo form_upload('userdata2');?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	2nd Alternative ID Proof Name
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-check"></i>
															</span>
															<?php echo form_input($admin_idproof3_type);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	2nd Alternative Upload ID Proof
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<?php echo form_upload('userdata3');?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Your Image
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
                                                            <?php echo form_input($admin_email_hidden);?>
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