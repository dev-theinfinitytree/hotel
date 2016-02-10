<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-diamond"></i>Edit Permission
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
                                        <?php
										if(isset($permission) && $permission){
											$id = $permission->permission_id;
											$label = $permission->permission_label;
											$description = $permission->permission_description;
											$user =  explode(",",$permission->permission_users);
										}else{
											if($this->session->flashdata('permission')){
												$id = $this->session->flashdata('permission')->permission_id;
												$label = $this->session->flashdata('permission')->permission_label;
												$description = $this->session->flashdata('permission')->permission_description;
												$user =  explode(",",$this->session->flashdata('permission')->permission_users);
											}else{
												$id="";
												$label="";
												$description="";
												$user=array();
											}
										}
										$j=0;
										if(isset($user) && $user){
											foreach($user as $us){
												$user_type = $this->dashboard_model->get_user_type_by_id($us);
												if(isset($user_type) && $user_type){
													$user_type_name = ($j>0) ? $user_type_name.",".$user_type->user_type_name : $user_type->user_type_name;
												}
												$j++;
											}
										}
										$per_value = $this->dashboard_model->get_permission_info($label);
										$j=0;
										$value="";
										if(isset($per_value) && $per_value){
											foreach($per_value as $val){
												$value = ($j==0) ? $val->permission_value : $value.",".$val->permission_value;
												$id = ($j==0) ? $val->permission_id : $id.",".$val->permission_id;
												$j++;
											}
										}
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
												  'required'		=> 'required',
												  'value'			=> $label
                                                );
                                                
                                        $permission_description = array(
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'permission_description',
                                                  'placeholder' 	=> 'Permission Description',
												  'cols'			=> '0',
												  'rows'			=> '0',
												  'value'			=> $description
                                                );
										if(isset($users) && $users){
											foreach($users as $us){
												$permission_users[$us->user_type_id] = $us->user_type_name;
											}
										}
										$js = 'class="form-control input-circle-right" multiple="multiple"';
										
										$permission_value = array(
                                                  'type'			=> 'text',
												  'class'			=> 'form-control input-circle-right',
                                                  'name'        	=> 'permission_val',
                                                  'placeholder' 	=> 'Permission Values',
												  'required'		=> 'required',
												  'value'			=> $value
                                                );
												
										$permission_id = array(
                                                  'type'			=> 'hidden',
                                                  'name'        	=> 'permission_id',
												  'value'			=> $id
                                                );
												
										$permission_label_hidden = array(
                                                  'type'			=> 'hidden',
                                                  'name'        	=> 'permission_label_hidden',
												  'value'			=> $label
                                                );
												
                                        $submit = array(
                                                  'class'			=> 'btn btn-circle blue',
                                                  'value'			=> 'Update'
                                                );
										
										echo form_open('dashboard/edit_permission',$form);
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
															<?php echo form_dropdown('permission_users[]', $permission_users, $user, $js);?>
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
                                                        <?php echo form_input($permission_id);?>
                                                        <?php echo form_input($permission_label_hidden);?>
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