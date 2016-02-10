<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-diamond"></i>Add Permission
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
                                        $permission_label = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'       	 	=> 'permission_label',
                                                  'placeholder' 	=> 'Permission Label',
												  'required'		=> 'required'
                                                );
                                                
                                        $permission_description = array(
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'permission_description',
                                                  'placeholder' 	=> 'Permission Description',
												  'cols'			=> '0',
												  'rows'			=> '0'
                                                );
										if(isset($users) && $users){
											foreach($users as $us){
												$permission_users[$us->user_type_id] = $us->user_type_name;
											}
										}
										$js = 'class="form-control input-circle-right"';
										
										$permission_value = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'permission_val',
                                                  'placeholder' 	=> 'Permission Values',
												  'required'		=> 'required'
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
										
										echo form_open('dashboard/add_permission',$form);
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
                                                    	Permission Label <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-diamond"></i>
															</span>
															<?php echo form_input($permission_label);?>
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
															<i class="fa fa-bookmark-o"></i>
															</span>
															<?php echo form_textarea($permission_description);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Applicable for the Users <span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-user"></i>
															</span>
															<?php echo form_dropdown('permission_users[]', $permission_users, $permission_users, $js);?>
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">
                                                    	Permission Values (Writes Comma Seperated Values)<span class="required">*</span>
                                                    </label>
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-pencil"></i>
															</span>
															<?php echo form_input($permission_value);?>
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