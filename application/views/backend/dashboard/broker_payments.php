    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/select2/select2.css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
	<script src="<?php echo base_url();?>assets/dashboard/daypilot/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>




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
        height: 80px;
        width: 80px;
        text-align: ;
        padding:0;
	
    }
    td.sorting_1 img {
        text-align: ;
        margin: 0 auto;
        padding:0;
		width:80px;
		width:80px;
    }
	
	
.btn.btn-danger.pull-right.sd {
   margin-left: 111px;
}
.btn.blue.pull-left.up {
   margin-top: -31px;
    margin-left: 5px;
}
.form-group {
    margin-bottom: 15px !important;
}

.all_bk .form-control {
    border-radius: 0px !important;
    font-size: 13px;
    height: auto;
    padding: 6px;
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
                    <i class="fa fa-edit"></i>Broker Payment
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
                                <a href="<?php echo base_url();?>dashboard/add_broker">
                                    <button  class="btn green">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </a>
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

                <table class="table table-striped table-hover table-bordered table-scrollable" id="sample_editable_1">
                    <thead>
                    <tr>
                        <!--<th scope="col">
                            Select
                        </th>-->
                        <th scope="col">
                            Picture Of Broker
                        </th>
                        <th scope="col">
                            Broker Type
                        </th>
                        <th scope="col">
                            Broker Name
                        </th>
                        <th scope="col">
                            Total Booking
                        </th>
                        <th scope="col">
                            Booking This Month
                        </th>
                        <th scope="col">
                            Total Amount Payed
                        </th>
                        <th scope="col">
                            Total Amount Pending
                        </th>

                        <th scope="col">
                             Total Amount Pending This Month
                        </th>
                        <!--<th scope="col">
                            Broker Address
                        </th>
                        <th scope="col">
                            Broker Contact
                        </th>
                        <th scope="col">
                            Broker Email
                        </th>
                        <th scope="col">
                            Broker Website
                        </th>

                        <th scope="col">
                            Broker Pan Id
                        </th>
                        <th scope="col">
                            Broker Bank Account
                        </th>
                        <th scope="col">
                            Broker Bank IFSC Code
                        </th>
                        <th scope="col">
                            Broker Photo
                        </th>-->
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($broker) && $broker):
                        $i=1;
                        foreach($broker as $brk):
                            $class = ($i%2==0) ? "active" : "success";

                            $b_id=$brk->b_id;
                            ?>
                            <tr>
                                <!-- <td width="50">
                                     <div class="md-checkbox pull-left">
                                         <input type="checkbox" id="checkbox1" class="md-check">
                                         <label for="checkbox1">
                                             <span></span>
                                             <span class="check"></span>
                                             <span class="box"></span>
                                         </label>
                                     </div>
                                 </td>-->
                                <td class="again">
                                    <img  width="80px" height="80px"   src="<?php echo base_url();?>upload/broker/<?php if( $brk->b_photo_thumb == '') { echo "business-man-hi.png"; } else { echo $brk->b_photo_thumb; }?>" alt=""/>
                                    <?php //echo $brk->b_photo ?>
                                </td>
                                <td>
                                    <?php if($brk->b_agency == 5)
                                    { echo "Agency";
                                    }else{
                                        echo "Self";
                                    }?>
                                </td>
                                <td>
                                    <?php echo $brk->b_name ?>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <?php echo $brk->broker_commission_payed; ?>
                                </td>
                                <!--<td>
                                        <?php //echo $brk->b_email ?>
                                    </td>-->
                                <td>
                                    <?php echo ( $brk->broker_commission_total- $brk->broker_commission_payed); ?>
                                </td>
                                <td>

                                </td>
                                <!--<td>
                                        <?php //echo $brk->b_pan ?>
                                    </td>
                                    <td>
                                        <?php //echo $brk->b_bank_acc_no ?>
                                    </td>
                                    <td>
                                        <?php //echo $brk->b_bank_ifsc ?>
                                    </td>-->



                                <td width="100%">
                                    <!--<button class="btn btn-danger pull-right" data-toggle="confirmation" data-singleton="true">Delete</button>-->
                                    <button class="btn btn-danger pull-right sd" data-toggle="modal" href="#Make_Payment" onclick="return give_broker_id(<?php echo $brk->b_id ?>, <?php echo $brk->broker_commission_payed; ?>, <?php echo $brk->broker_commission_total; ?>,<?php echo $brk->broker_commission; ?>)">Make Payment</button>
									
									
									

									
							<div id="Make_Payment" class="modal fade" tabindex="-1" aria-hidden="true">
                                <?php

                                $form = array(
                                    'class' 			=> 'form-body',
                                    'id'				=> 'form',
                                    'method'			=> 'post'
                                );

                                echo form_open_multipart('dashboard/broker_payments',$form);

                                ?>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Make Payment</h4>
										</div>
										<div class="modal-body">
											<div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">


												<div class="form-group">
														<label class="control-label col-md-12">Total Pending Amount<span class="required">*</span></label>
														<div class="col-md-12">
															<input type="hidden" name="b_id" value="" id="broker_id_final" >
															<input type="text" class="form-control" id="broker_payed" name="b_pending" value=""
	                                                        disabled="disabled"/>
														</div>
												</div>
												<br><br><br>
												<div class="form-group" >
														<label class="control-label col-md-12">Last Payment Made To That Broker<span class="required">*</span></label>
														<div class="col-md-12">
															
															<input type="text" class="form-control" id=""  name="b_last_payment"
	                                                        disabled="disabled"/>
														</div>
												</div>
												<br><br><br>
												<div class="form-group">
														<label class="control-label col-md-12">Total Booking This Month<span class="required">*</span></label>
														<div class="col-md-12">
															
															<input type="text" class="form-control" id=""  name="b_booking_m"
	                                                        disabled="disabled"/>
														</div>
												</div>
												
												<br><br><br>
												<div class="form-group">
														<label class="control-label col-md-12">Total Pending This Month<span class="required">*</span></label>
														<div class="col-md-12">
															
															<input type="text" class="form-control" id=""  name="b_pending_m"
	                                                        disabled="disabled"/>
														</div>
												</div>
												<br><br><br>
												<div class="form-group">
														<label class="control-label col-md-12">Amount <span class="required">
														* </span>
														</label>
														<div class="col-md-12">
															<input type="text" id="add_amount" class="form-control"  placeholder="Give Amount" name="b_amount" />
                                                            <input type="hidden" id="booking_id" >
															<input type="hidden" id="booking_status_id" >
															
														</div>
													</div>
													<br><br><br>
													<div class="form-group">
														<label class="control-label col-md-12">Payment Mode <span class="required">
														* </span>
														</label>
														<div class="col-md-12">
															<select class="form-control" placeholder=" Booking Type" name="b_payment_mode"
															id="t_payment_mode" onchange="payment_mode_change(this.value);"> 
															
	                                                       
																
														<option value="" disabled selected>----- Select Payment Mode -----</option>
	                                                            <option value="cash">Cash</option>
	                                                            <option value="check">Check/Draft</option>
	                                                            <option value="Debit">Debit Card/Credit Card</option>
																
	                                                            
															</select>
														</div>
													</div>
													<br><br><br>
													 <div class="form-group" id="bank" style="display:none;">
														<label class="control-label col-md-12">Bank Name <span class="required">
																						* </span>
														</label>
														<div class="col-md-12">
															<input type="text"  onkeypress="return onlyLtrs();" class="form-control" name="b_bank_name" placeholder="Bank Name" />

																							<span class="help-block">
																							</span>
														</div>
													</div>

												
												
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Cancel</button>
											<button type="submit" class="btn green">Pay</button>
										</div>

									</div>
								</div>
                                <?php form_close(); ?>
							</div>

							
									
									
									
									
                                    <button class="btn blue pull-left up" data-toggle="modal" href="#Add_Booking" onclick="return give_broker_commission('<?php echo $brk->b_id ?>','<?php echo $brk->broker_commission ?>');">Add Booking</button>
									
									<div id="Add_Booking" class="modal fade" tabindex="-1" aria-hidden="true">

								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Booking</h4>
										</div>
										<div class="modal-body">
											<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
												<div class="row">
													<div class="form-group">
														<label class="control-label col-md-12">Booking Id <span class="required">
														* </span>
														</label>
														<div class="col-md-8">
															<select class="form-control" name="booking_id"
															id="t_payment_mode" onchange="booking_mode_show(this.value);" onblur="return calculator(this.value);">

                                                                <option value="" disabled selected>----- Select Booking Id  -----</option>
															
	                                                       <?php

                                                           $all_bookings=$this->dashboard_model->all_bookings();

                                                           if($all_bookings && isset($all_bookings)){

                                                           foreach($all_bookings as $booking){

                                                               $booking_id='HM0'.$this->session->userdata('user_hotel').'00'.$booking->booking_id;


                                                           ?>
																

	                                                            <option  value="<?php echo  $booking_id; ?>"><?php echo $booking_id; ?></option>


                                                                <?php }} ?>
																
	                                                            
															</select>
														</div>
														<div class="col-md-4">
													<input type="text" id="show_id" class="form-control"  placeholder="Booking Id" name="booking_id" />
														</div>
													</div>
													<br><br><br><br>
													<div class="form-group col-md-6">
														<label class="control-label ">% Commision <span class="required">
														* </span>
														</label>
														<div class="">
                                                            <input type="text" id="commission" class="form-control"  placeholder="% Commision" name="" value=""/>
                                                        </div>
												</div>
												
												<div class="form-group col-md-6">
														<label class="control-label ">The Calculated Amount <span class="required">
														* </span>
														</label>
														<div class="">
													<input type="text" id="total_brok" class="form-control" value=""  placeholder="Calculated Amount" name="broker_amount" />
														<input type="hidden" name="booking_id_final" id="booking_id_final" >
                                                            <input type="hidden" name="broker_id" id="broker_id" value="<?php echo $brk->b_id; ?>">
                                                        </div>
											   </div>
													
													
												</div>
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Close</button>
											<button type="button" class="btn green" onclick="return save_broker()">Save changes</button>
										</div>
									</div>
								</div>

							</div>
							
                                </td>
                            </tr>


                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>


        </div>

        <!-- END SAMPLE TABLE PORTLET-->


        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <!--
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-eye-slash"></i>All Rooms
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

        echo form_open('dashboard/all_rooms',$form);
        ?>
                        	<div class="form-group">
                                <label class="col-md-3 control-label">
                                    Rooms Per Page
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
                            <?php echo form_open('dashboard/room_delete');?>
							<div class="table-scrollable">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Select
									</th>
									<th>
										 Room No
									</th>
									<th>
										 Number of Beds
									</th>
									<th>
										 Rent
									</th>
									<th>
										 Image
									</th>
                                    <th>
										 Action
									</th>
								</tr>
								</thead>
								<tbody>
								<?php if(isset($rooms) && $rooms):
            $i=1;
            foreach($rooms as $rom):
                if($rom->hotel_id==$this->session->userdata('user_hotel')):
                    $class = ($i%2==0) ? "active" : "success";

                    $room_id=$rom->room_id;
                    ?>

                                    <tr class="<?php echo $class;?>">
                                        <td><input type="checkbox" name="delete[]" value="<?php echo $rom->room_id;?>" class="form-control" onclick="this.form.submit();"/></td>
                                        <td><?php echo $rom->room_no;?></td>
                                        <td><?php echo $rom->room_bed;?></td>
                                        <td>₹ <?php echo $rom->room_rent;?></td>
                                        <td><img src="<?php echo base_url();?>upload/thumb/<?php echo $rom->room_image_thumb;?>" alt=""/></td>
                                        <td>

                                        	<a href="<?php echo base_url();?>dashboard/edit_room/<?php echo base64url_encode($room_id);?>" class="fa fa-edit"></a>
                                        <td>
                                    </tr>
                                <?php $i++;?>
                                <?php endif; ?>
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
					-->
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/respond.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/excanvas.min.js"></script> 
	
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/admin/pages/scripts/form-wizard.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
 function payment_mode_change(y)
    {
        //var p = $('#t_payment_mode').val();
       //alert(y);
        if(y=="cash")
        {
            //$('#bank').hide();
			document.getElementById('bank').style.display= 'none';
			
        }
        else
        {
            $('#bank').show();
        }
    }
    function give_broker_id(data,payed,total,commission){
        //alert(data);
        document.getElementById("broker_id_final").value=data;
        document.getElementById("broker_payed").value=parseInt(total)-parseInt(payed);
        document.getElementById("broker_total").value=total;
        document.getElementById("commission").value=commission;
    }

 function give_broker_commission(id,commission){
     //alert(data);
     document.getElementById("commission").value=commission;
     document.getElementById("broker_id").value=id;
 }
	function booking_mode_show(x)
    {
        
        //alert(x);
		document.getElementById('show_id').value=x;
    }
</script>
    <script>
    function calculator(id){


        var b_id=id;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

           // alert(xhttp.status);

            if (xhttp.readyState == 4 && xhttp.status == 200) {

                //alert(xhttp.response);

               var percentage=(parseInt(xhttp.response)*parseInt(document.getElementById("commission").value))/100;

                document.getElementById("total_brok").value=percentage;
                //document.getElementById("booking_id_final").value=percentage;

                }

        };
        xhttp.open("GET", "<?php echo base_url(); ?>dashboard/get_amount_guest?booking_id="+b_id, true);
        xhttp.send();
        /*$.ajax({
            type: 'post',
            url: 'dashboard/get_amount_guest',
            data: "booking_id="+ id,
            dataType: 'json',
            success: function(response) {
                //here I'd like back the php query
                alert("asda");
                alert(JSON.stringify(response));

            }*/

    }

    function save_broker(){




        var broker_id=document.getElementById("broker_id").value;
        var booking_id=document.getElementById("show_id").value;
        var broker_amount=document.getElementById("total_brok").value;
        //alert(booking_id);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

           // alert(xhttp.status);

            if (xhttp.readyState == 4 && xhttp.status == 200) {

                alert('booking add is '+xhttp.response);

                //document.getElementById("booking_id_final").value=percentage;

            }

        };
        xhttp.open("GET", "<?php echo base_url(); ?>dashboard/broker_booking?booking_id="+booking_id+"&broker_id="+broker_id+"&broker_amount="+broker_amount, true);
        xhttp.send();


    }
    </script>