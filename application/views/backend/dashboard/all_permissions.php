<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-check-square"></i>All Permissions
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                        	<?php  
							$form = array(
										   'class' 			=> 'form-horizontal',
										   'method'			=> 'post'
                                          );
										  
							$dropdown = array(
										  '5'  				=> '5',
										  '10'    			=> '10',
										  '25'   			=> '25',
										  '50'				=> '50',
										  '100'				=> '100'
										);
							
							$js = 'class="form-control" onChange="this.form.submit();"';
										
							$pages = ($this->session->flashdata('pages')) ? $this->session->flashdata('pages') : 5;		
										  
							echo form_open('dashboard/all_permissions',$form);
							?>
                        	<div class="form-group">
                                <label class="col-md-3 control-label">
                                    Permissions Per Page
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <?php echo form_dropdown('pages', $dropdown, $pages, $js);?>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close();?>
                            <?php if($this->session->flashdata('err_msg')):?>
                    
                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php echo $this->session->flashdata('err_msg');?></strong>
                            </div>
                                
                            <?php endif;?>
                            <?php if($this->session->flashdata('succ_msg')):?>
                    
                            <div class="alert alert-success alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php echo $this->session->flashdata('succ_msg');?></strong>
                            </div>
                                
                            <?php endif;?>
                            <div id="status_msg">
                                
                             </div>
                            <?php echo form_open('dashboard/permission_delete');?>
							<div class="table-scrollable">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Select
									</th>
									<th>
										 Label
									</th>
									<th>
										 Description
									</th>
									<th>
										 Users
									</th>
                                    <th>
										 Action
									</th>
								</tr>
								</thead>
								<tbody>
                               
								<?php if(isset($permissions) && $permissions):
								$i=1;
								foreach($permissions as $per): 
								$class = ($i%2==0) ? "active" : "success";
								
								$permission_id=$per->permission_id;
								?>
                                
                                    <tr class="<?php echo $class;?>">
                                        <td><input type="checkbox" name="delete[]" value="<?php echo $permission_id;?>" class="form-control" onclick="this.form.submit();"/></td>
                                        <td><?php echo $per->permission_label;?></td>
                                        <td><?php echo $per->permission_description;?></td>
                                        <td>
                                        	<?php 	$user =  explode(",",$per->permission_users);
													$j=0;
													foreach($user as $us){
														$user_type = $this->dashboard_model->get_user_type_by_id($us);
														if(isset($user_type) && $user_type){
															echo $user_type_name = ($j>0) ? ",&nbsp;".$user_type->user_type_name : $user_type->user_type_name;
														}
														$j++;
													}
											
											?>
											
                                        </td>
                                        <td>
                                        	
                                        	<a href="<?php echo base_url();?>dashboard/edit_permission/<?php echo base64url_encode($permission_id);?>" class="fa fa-edit"></a>
                                        <td>
                                    </tr>
                                <?php $i++;?>
                                <?php endforeach; ?>  
                                <?php endif;?>
								</tbody>
								</table>  
                                <p class="pull-right" style="padding-top:10px;">
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="javascript:return confirm('Are you sure that you want to delete the selected records?')"/>
                            </p>   
                            
                            <?php echo form_close();?>
								<?php if(isset($pagination) && $pagination)
                                        echo $pagination; ?>                            
							</div>  

                            
                            
                             
						</div>
                        
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->