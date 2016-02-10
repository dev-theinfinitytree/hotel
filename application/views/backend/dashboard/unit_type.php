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
    td.sorting_1  {
        height: 60px;
        width: 60px;
        text-align: center;
        padding:0;
    }
    td.sorting_1 img {
        text-align: center;
        margin: 0 auto;
        padding:0;
    }
</style>
<!---->
<div class="row all_bk">


    <!--popup-->
    <!--<div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirm Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                         Body goes here...
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
                                    <button data-dismiss="modal" class="btn blue">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>-->
    <!--popup end-->

    <div class="form-body">
        <!-- 17.11.2015-->
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
    </div>


    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->




        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>List of All Unit Type's
                </div>
                <div class="tools">
                    <!--<a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="remove"></a>-->
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body">

                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                    <button class="btn green"  data-toggle="modal" href="#responsive">
                                        Add New  <i class="fa fa-plus"></i>
                                    </button>
                            </div>
                        </div>
                        <!--<div class="col-md-6">
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
                        </div>-->
                    </div>
                </div>

                <table class="table table-striped table-hover table-bordered table-scrollable" id="sample_editable_1">
                    <thead>
                    <tr>
                        <th scope="col">
                             Unit Name
                         </th>
                        <th scope="col">
                            Unit Type
                        </th>
                        <th scope="col">
                            Unit Class
                        </th>
                        <th scope="col">
                            Unit Description
                        </th>						
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($unit) && $unit):

                        $i=1;
                        foreach($unit as $gst):
                            $class = ($i%2==0) ? "active" : "success";
                            $g_id=$gst->id;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $gst->unit_name; ?>
                                </td>
                                
                                <td>
                                      <?php echo $gst->unit_type; ?>                                
                                </td>

                                <td>
                                     <?php echo $gst->unit_class;?>                                        
                                </td>
                                <td>
                                     <?php echo $gst->unit_desc;?>                                        
                                </td>


                                <td>
                                    <!--<button class="btn btn-danger pull-right" data-toggle="confirmation" data-singleton="true">Delete</button>-->
                                    <a href="javascript:void(0);" onclick="delete_unit_type('<?php echo $gst->id; ?>');" class="btn btn-danger pull-right" data-toggle="modal">Delete</a>
                                    <!--<a href="<?php echo base_url();?>dashboard/edit_unit_type/<?php echo $gst->id; ?>" class="btn blue pull-right" data-toggle="modal">Edit</a>-->
                                    <!--<a href="#responsive-<?php echo $gst->id; ?>" class="btn blue pull-right" data-toggle="modal">Edit</a>-->
								</td>
                            </tr>
							
							<!------ Modal------->
                       <!--<div id="responsive-<?php echo $gst->id; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
								<?php

                                $form = array(
                                    'class' 			=> 'form-body1',
                                    'id'				=> 'form1',
                                    'method'			=> 'post'
                                );

                                echo form_open_multipart('dashboard/edit_unit_type',$form);

                                ?>						
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Unit Type<?php echo $gst->id; ?></h4>
										</div>
										<div class="modal-body">
											<div class="scroller" style="height:280px" data-always-visible="1" data-rail-visible1="1">
												<div class="row">
													<div class="col-md-12">
														  <div class="form-group">
																<label class="control-label pull-left" style="margin-left:15px;">Unit Type:</label>
																<div class="col-md-12">
																	<select name="unit_type" id="unit_type" class="form-control" required="required">
																		<option value="" disabled="" selected="">--Unit Type--</option>
																		<option value="Room">Room</option>
																		<option value="Bunglow">Bunglow</option>
																		<option value="Villa">Villa</option>
																	</select>
																</div>
															</div>
															<br><br>
															<div class="form-group"style="margin-top:10px;">
																<label class="control-label pull-left" style="margin-left:15px;">Unit Name:</label>
																<div class="col-md-12">
																	<input type="text" class="form-control" name="unit_name" id="unit_name" required="required">
																		
																	
																</div>
															</div>
															<br><br>		
															<div class="form-group"style="margin-top:10px;">
																<label class="control-label pull-left" style="margin-left:15px;">Unit Class:</label>
																<div class="col-md-12">
																	<select name="unit_class" id="unit_class" class="form-control" required="required">
																		<option value="" disabled="" selected="">--Unit Class--</option>
																		<option value="Premium">Premium</option>
																		<option value="Delux">Delux</option>
																		<option value="Super">Super</option>
																		<option value="Regular">Regular</option>
																	</select>
																</div>
															</div>
															<br><br>
															<div class="form-group"style="margin-top:10px;">
																<label class="control-label pull-left" style="margin-left:15px;">Description:</label>
																<div class="col-md-12">
																	<textarea class="form-control""row="3" name="desc" id="desc"></textarea>
																</div>
															</div>

															
															
													</div>
													
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Close</button>
											<button type="submit" class="btn green">Save</button>
										</div>
									</div>
								</div>
								<?php form_close(); ?>
							</div>-->
                                                                <!-- Modal ----->
                        <?php endforeach; ?>
                    <?php endif; ?>


                    </tbody>
                </table>

            </div>


        </div>

        <!-- END SAMPLE TABLE PORTLET-->
		</div>
</div>
									<!-- /.modal -->
							<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
								<?php

                                $form = array(
                                    'class' 			=> 'form-body',
                                    'id'				=> 'form',
                                    'method'			=> 'post'
                                );

                                echo form_open_multipart('dashboard/add_unit_type',$form);

                                ?>						
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Unit Type</h4>
										</div>
										<div class="modal-body">
											<div class="scroller" style="height:280px" data-always-visible="1" data-rail-visible1="1">
												<div class="row">
													<div class="col-md-12">
														  <div class="form-group">
																<label class="control-label pull-left" style="margin-left:15px;">Unit Type:</label>
																<div class="col-md-12">
																	<select name="unit_type" id="unit_type" class="form-control" required="required">
																		<option value="" disabled="" selected="">--Unit Type--</option>
																		<option value="Room">Room</option>
																		<option value="Bunglow">Bunglow</option>
																		<option value="Villa">Villa</option>
																	</select>
																</div>
															</div>
															<br><br>
															<div class="form-group"style="margin-top:10px;">
																<label class="control-label pull-left" style="margin-left:15px;">Unit Name:</label>
																<div class="col-md-12">
																	<input type="text" class="form-control" name="unit_name" id="unit_name" required="required">
																		
																	
																</div>
															</div>
															<br><br>		
															<div class="form-group"style="margin-top:10px;">
																<label class="control-label pull-left" style="margin-left:15px;">Unit Class:</label>
																<div class="col-md-12">
																	<select name="unit_class" id="unit_class" class="form-control" required="required">
																		<option value="" disabled="" selected="">--Unit Class--</option>
																		<option value="Premium">Premium</option>
																		<option value="Delux">Delux</option>
																		<option value="Super">Super</option>
																		<option value="Regular">Regular</option>
																	</select>
																</div>
															</div>
															<br><br>
															<div class="form-group"style="margin-top:10px;">
																<label class="control-label pull-left" style="margin-left:15px;">Description:</label>
																<div class="col-md-12">
																	<textarea class="form-control""row="3" name="desc" id="desc"></textarea>
																</div>
															</div>

															
															
													</div>
													
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Close</button>
											<button type="submit" class="btn green">Save</button>
										</div>
									</div>
								</div>
								<?php form_close(); ?>
							</div>
							
															<!-- /.modal End-->
<script>
function delete_unit_type(val){
	var result = confirm("Are you want to delete this unit?");
	var linkurl = '<?php echo base_url() ?>dashboard/delete_unit_type/'+val;
	if (result) {
		//alert(linkurl);
		window.location.href= linkurl;
	}
	
}
</script>															