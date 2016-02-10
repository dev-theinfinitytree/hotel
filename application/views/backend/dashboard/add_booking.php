<!-- BEGIN PAGE CONTENT-->
<style>
.ds .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px;}
</style>
<div class="row ds">
    <div class="col-md-12">
<!---->
<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Add Booking</span>
							</div>
							
						</div>
						<div class="portlet-body form">
							<form role="form">
								<div class="form-body">
								<div class="row">
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control">
										
										<label>Room Number <span class="required">*</span></label>
										<span class="help-block">Enter Room Number...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input type="text" class="form-control">
										<label>Customer Name <span class="required">*</span></label>
										<span class="help-block">Enter Customer Name...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" >
										<label>Customer Address <span class="required">*</span></label>
										<span class="help-block">Enter Customer Address...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input type="text" class="form-control" >
										<label>Customer Contact Number <span class="required">*</span></label>
										<span class="help-block">Enter Customer Contact Number...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" >
										<label>Booking From <span class="required">*</span></label>
										<span class="help-block">Enter Booking From...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input type="text" class="form-control" >
										<label>Booking Upto <span class="required">*</span></label>
										<span class="help-block">Enter Booking Upto...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" >
										<label>Booking Status <span class="required">*</span></label>
										<span class="help-block">Enter Customer Booking Status...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input type="text" class="form-control" >
										<label>Initial Down Payment <span class="required">*</span></label>
										<span class="help-block">Enter Customer Initial Down Payment...</span>
									</div>
									<div class="clearfix"></div>
										
									</div>
								</div>
								<div class="form-actions noborder">
									<button type="button" class="btn blue">Submit</button>
									<button type="button" class="btn default">Reset</button>
								</div></div>
							</form>
						</div>
					


<!---->
	
	
	<div class="clearfix"></div>
	
	
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-archive"></i>Add Booking
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


                $room_no = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'room_no',
                    'placeholder' 	=> 'Room Number',
                    'required'		=> 'required'
                );

                $cust_name = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'cust_name',
                    'placeholder' 	=> 'Customer Name',
                    'required'		=> 'required'
                );

                $cust_address = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'cust_address',
                    'placeholder' 	=> 'Customer Address',
                    'required'		=> 'required'
                );

                $cust_contact_no = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'cust_contact_no',
                    'placeholder' 	=> 'Customer Contact Number',
                    'required'		=> 'required'
                );

                $cust_from_date = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	=> 'cust_from_date',
                    'placeholder' 	=> 'Booking From',
                    'required'		=> 'required'
                );

                $cust_end_date = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'cust_end_date',
                    'placeholder' 	=> 'Booking Upto',
                    'required'		=> 'required'
                );

                $cust_booking_status = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'cust_booking_status',
                    'placeholder' 	=> 'Customer Booking Status',
                    'required'		=> 'required'
                );
                $cust_payment_initial = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 'cust_payment_initial',
                    'placeholder' 	=> 'Customer Initial DownPayment',
                    'required'		=> 'required',

                );




                $js = 'class="form-control input-circle-right"';

                $submit = array(
                    'class'			=> 'btn btn-circle blue',
                    'value'			=> 'Submit'
                );
                $reset = array(
                    'name' 			=> 'reset',
                    'id'		    => 'reset',
                    'value' 		=> 'true',
                    'type' 			=> 'reset',
                    'content' 		=> 'Reset',
                    'class'			=> 'btn btn-circle red',
                );



                echo form_open_multipart('dashboard/add_booking',$form);
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
                            Customer Name <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bed"></i>
															</span>
                                <?php echo form_input($cust_name);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Customer Address <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bookmark"></i>
															</span>
                                <?php echo form_input($cust_address);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Customer Contact Number <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
                                <?php echo form_input($cust_contact_no);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Booking From <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
                                <?php echo form_input($cust_from_date);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Booking Upto <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
                                <?php echo form_input($cust_end_date);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Booking Status <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
                                <?php echo form_input($cust_booking_status);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Initial Down Payment <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
                                <?php echo form_input($cust_payment_initial);?>
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
            </div>


        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->