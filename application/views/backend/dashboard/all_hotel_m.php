<!-- BEGIN PAGE CONTENT-->
<style>
.all_bk .table>tbody>tr>td{ vertical-align: middle !important;}
.all_bk .table thead tr th{ font-size:13px; text-align:center;}
.all_bk .table-bordered>tbody>tr>td{ font-size:12px;}
.all_bk .md-checkbox label > .box{height: 15px;width: 15px;}
.all_bk .btn{ font-size:12px;}
.all_bk .form-control{ font-size:12px;height: auto;padding: 2px;}
.all_bk .portlet.box > .portlet-title > .caption {
    padding: 18px 0 9px 0;
}
.select2-search input {
   
    display: none;
    
}
button, input, select, textarea {
    display: none;
    
}
.select2-dropdown-open .select2-choice {
   
    display: none; 
    
}
#s2id_autogen1{
	display:none;
}

#sample_editable_1_filter.all_bk .form-control {
	
    border-radius: 0px !important;
    font-size: 12px;
    height: auto;
    padding: 2px;
}
.all_bk .form-control {
    border-radius: 0px !important;
	
    font-size: 12px;
    height: auto;
    padding: 2px;
}

</style>
			<div class="row all_bk">
				<div class="col-md-12">
				
				<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-hotel"></i>List of All Hotels
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th scope="col">
										Select
									</th>
									<th>
										 Hotel
									</th>
									<th>
										 Address
									</th>
									<th>
										 No Of Rooms
									</th>
									<th>
										 Phone
									</th>
                                    <th>
										 Action
									</th>
							</tr>
							</thead>
							<tbody>
							<?php if(isset($hotels) && $hotels):
								$i=1;
								foreach($hotels as $hot): 
								$class = ($i%2==0) ? "active" : "success";
								
								$hotel_id=$hot->hotel_id;
								?>
								<tr>
									<td>
										<input type="checkbox" name="delete[]" value="<?php echo $hot->hotel_id;?>" class="form-control" onclick="this.form.submit();"/>
									</td>
									<td><?php echo $hot->hotel_name;?></td>  
                                    <td><?php echo $hot->hotel_street1." ".$hot->hotel_street2." ".$hot->hotel_landmark." ".$hot->hotel_district." ".$hot->hotel_pincode." , ".$hot->hotel_state." ".$hot->hotel_country;?></td>
                                    <td><?php echo $hot->hotel_rooms;?></td>
                                    <td><?php echo $hot->hotel_frontdesk_mobile;?></td>
									
									
									<td>
										<!--<a href="<?php echo base_url();?>dashboard/edit_hotel/<?php echo base64url_encode($hotel_id);?>" class="fa fa-edit"></a>-->
										<a href="<?php echo base_url();?>dashboard/edit_hotel?hotel_id=<?php echo $hot->hotel_id ?>" class="btn blue pull-right" data-toggle="modal">Edit</a>
									</td>
								</tr>
								  <?php $i++;?>
                               
                                <?php endforeach; ?>  
                                <?php endif;?>
							
							</tbody>
							</table>
						</div>
					
					</div>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<!--<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-hotel"></i>All Hotels
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
							/*$form = array(
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
										  
							echo form_open('dashboard/all_hotels',$form);*/
							?>
                        	<div class="form-group">
                                <label class="col-md-3 control-label">
                                    Hotels Per Page
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <?php //echo form_dropdown('pages', $dropdown, $pages, $js);?>
                                    </div>
                                </div>
                            </div>
                            <?php //echo form_close();?>
                            <?php //if($this->session->flashdata('err_msg')):?>
                    
                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php //echo $this->session->flashdata('err_msg');?></strong>
                            </div>
                                
                            <?php //endif;?>
                            <?php //if($this->session->flashdata('succ_msg')):?>
                    
                            <div class="alert alert-success alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php //echo $this->session->flashdata('succ_msg');?></strong>
                            </div>
                                
                            <?php //endif;?>
                            <div id="status_msg">
                                
                             </div>
                            <?php //echo form_open('dashboard/hotel_delete');?>
							<div class="table-scrollable">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Select
									</th>
									<th>
										 Hotel
									</th>
									<th>
										 Address
									</th>
									<th>
										 Email
									</th>
									<th>
										 Phone
									</th>
                                    <th>
										 Action
									</th>
								</tr>
								</thead>
								<tbody>
                               
								<?php /*if(isset($hotels) && $hotels):
								$i=1;
								foreach($hotels as $hot): 
								$class = ($i%2==0) ? "active" : "success";
								
								$hotel_id=$hot->hotel_id;*/
								?>
                                
                                    <tr class="<?php //echo $class;?>">
                                        <td><input type="checkbox" name="delete[]" value="<?php echo $hot->hotel_id;?>" class="form-control" onclick="this.form.submit();"/></td>
                                        <td><?php ///echo $hot->hotel_name;?></td>
                                        <td><?php //echo $hot->hotel_address;?></td>
                                        <td><?php //echo $hot->hotel_email;?></td>
                                        <td><?php //echo $hot->hotel_phone;?></td>
                                        <td>
                                        	
                                        	<a href="<?php //echo base_url();?>dashboard/edit_hotel/<?php //echo base64url_encode($hotel_id);?>" class="fa fa-edit"></a>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="status<?php //echo $hotel_id;?>" value="A" onclick="updateStatus(this.value, <?php //echo $hotel_id;?>);" <?php //if($hot->hotel_status=="A") echo "checked='checked'";?>> Active 
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="status<?php echo $hotel_id;?>" value="I" onclick="updateStatus(this.value, <?php //echo $hotel_id;?>);" <?php //if($hot->hotel_status=="I") echo "checked='checked'";?>> Inactive 
                                                </label>
                                            </div>
                                        <td>
                                    </tr>
                                <?php //$i++;?>
                                <?php //endforeach; ?>  
                                <?php //endif;?>
								</tbody>
								</table>  
                                <p class="pull-right" style="padding-top:10px;">
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="javascript:return confirm('Are you sure that you want to delete the selected records?')"/>
                            </p>   
                            
                            <?php //echo form_close();?>
								<?php //if(isset($pagination) && $pagination)
                                        //echo $pagination; ?>                            
							</div>  

                            
                            
                             
						</div>
                        
					</div>-->
						
					<!--<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-hotel"></i>All Hotels
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
									<th>
										 Select
									</th>
									<th>
										 Hotel
									</th>
									<th>
										 Address
									</th>
									<th>
										 Email
									</th>
									<th>
										 Phone
									</th>
                                    <th>
										 Action
									</th>
								</tr>
							</thead>
							<tbody>
							<?php /*if(isset($hotels) && $hotels):
								$i=1;
								foreach($hotels as $hot): 
								$class = ($i%2==0) ? "active" : "success";
								
								$hotel_id=$hot->hotel_id;*/
								?>
								<tr>
                                        <td><input type="checkbox" name="delete[]" value="<?php echo $hot->hotel_id;?>" class="form-control" onclick="this.form.submit();"/></td>
                                        <td><?php //echo $hot->hotel_name;?></td>
                                        <td><?php //echo $hot->hotel_address;?></td>
                                        <td><?php //echo $hot->hotel_email;?></td>
                                        <td><?php //echo $hot->hotel_phone;?></td>
                                        <td>
                                        	
                                        	<a href="<?php //.echo base_url();?>dashboard/edit_hotel/<?php //echo base64url_encode($hotel_id);?>" class="fa fa-edit"></a>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="status<?php //echo $hotel_id;?>" value="A" onclick="updateStatus(this.value, <?php //echo $hotel_id;?>);" <?php //if($hot->hotel_status=="A") echo "checked='checked'";?>> Active 
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="status<?php //echo $hotel_id;?>" value="I" onclick="updateStatus(this.value, <?php //echo $hotel_id;?>);" <?php //if($hot->hotel_status=="I") echo "checked='checked'";?>> Inactive 
                                                </label>
                                            </div>
                                        <td>
                                    </tr>
								  <?php //$i++;?>
                                <?php //endforeach; ?>  
                                <?php //endif;?>
							
							</tbody>
							</table>
						</div>
					
					</div>-->
					
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->