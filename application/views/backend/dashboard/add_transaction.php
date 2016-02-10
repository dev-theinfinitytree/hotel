<!-- BEGIN PAGE CONTENT-->
<div class="row ds">
    <div class="col-md-12">
<!----->
<style>
.ds .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px;}
.ds .form-group.form-md-line-input .form-control{font-size: 15px;}
</style>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){
	 $("#bank_name").hide();
});
function hideShow()
{
	$.value = $('#myID').val();
	if($.value == 'CASH' || $.value == '' )
	{
		$("#bank_name").hide();
	}
	else
	{
		$("#bank_name").show();
	}
}
	
function getAmount()
{
	var booking_id = $('#booking_no').val();
	//alert(booking_id);
	//alert( booking_id);
	$.ajax(
		{
			type: "POST",
			url: "<?php echo base_url();?>index.php/Dashboard/showAmount",
			data:{ term:booking_id } 
		}
	).done(
		function(data){
			//console.log(data);
			//$("#d").html(data);
			//alert(data.room_id);
			$('#t_amount').val(data.room_id);
		}
	);
}
</script>
<!---->
<!--<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Add Transaction</span>
							</div>
							
						</div>
						<div class="portlet-body form">
							<form role="form">
								<div class="form-body">
								<div class="row">
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control">
										
										<label>Booking Id <span class="required">*</span></label>
										<span class="help-block">Enter Booking Id...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<input type="text" class="form-control">
										<label>Amount  <span class="required">*</span></label>
										<span class="help-block">Enter Amount Here...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label has-info col-md-6">
										<select class="form-control" id="form_control_2">
											<option value=""></option>
											<option value="1">Select Payment Mode</option>
											<option value="2">Credit Card</option>
											<option value="3">Debit Card</option>
											<option value="4">Cash</option>
										</select>
										<label for="form_control_2">Payment Mode <span class="required">*</span></label>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label has-info col-md-6">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="1">Select Payment Status</option>
											<option value="2">Pending</option>
											<option value="3">Confirmed</option>
											
										</select>
										<label for="form_control_1">Payment Status <span class="required">*</span></label>
									</div>
									<div class="clearfix"></div>
										
									</div>
								</div>
								<div class="form-actions noborder">
									<button type="button" class="btn blue">Submit</button>
									<button type="button" class="btn default">Reset</button>
								</div></div>
							</form>
						</div>-->
					</div>


<!---->


<div class="clearfix"></div>

<!------>
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-money"></i>Add Transaction
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

				/*$this->load->model('Dashboard_model');
				 $t_booking_id['dtls'] = $this->Dashboard_model->all_booking_id();*/
				
                $t_booking_id = array(
				
								
				
					
                    //'type'			=> 'text',
                    //'class'			=> 'form-control input-circle-right',
                    //'name'       	=> 't_booking_id',
                    //'placeholder' 	=> 'Booking Id',
                    //'required'		=> 'required'
                );

                $t_amount = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	=> 't_amount',
                    'placeholder' 	=> 'Enter Amount Here',
                    'required'		=> 'required',
					'onkeypress'		=> 'return onlyNos(event,this);'
                );
					
                $t_date = array(
                    'type'			=> 'text',
                    'class'			=> 'form-control input-circle-right',
                    'name'       	 	=> 't_date',
                    'placeholder' 	=> 'Date',
                    'required'		=> 'required'
                );

                $t_payment_mode = array(
					
                    ''					=> '--Select Payment Mode--',
                    'CREDIT CARD'		=> 'Credit Card',
                    'DEBIT CARD'		=> 'Debit Card',
                    'CASH'              => 'Cash',
					//'onChange'
					//'required'		    => 'required',
					//'id'				=> 'kl'
					//'name'				=> 'payment_mode'

                );

                $t_payment_status = array(
                    ''					=> '--Select Payment Status--',
                    'PENDING'			=> 'Pending',
                    'CONFIRMED'			=> 'Confirmed'
                );




                $js = 'class="form-control input-circle-right"';

                $submit = array(
                    'class'			=> 'btn btn-circle blue',
                    'value'			=> 'Submit',
					'id'			=> 'submit'
					//'onclick'		=> 'return validDrop();'
                );
                $reset = array(
                    'name' 			=> 'reset',
                    'id'		    => 'reset',
                    'value' 		=> 'true',
                    'type' 			=> 'reset',
                    'content' 		=> 'Reset',
                    'class'			=> 'btn btn-circle red',
                );



                echo form_open_multipart('dashboard/add_transaction',$form);
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
                            Booking Id <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-hotel"></i>
															</span>
                                
                                
                                <select class="form-control input-circle-right" id="t_booking_id" name="t_booking_id" >
                                	<option value="">----- Select Booking Id -----</option>
                                	<?php foreach ($booking as $row){?>
                                    	<option value="<?php echo $row['booking_id']; ?>"><?php echo 'HM0'.$this->session->userdata('user_hotel').'00'.$row['booking_id']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Amount <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bed"></i>
															</span>
                                
                      <input type="text" class="form-control input-circle-right"  name="t_amount" id="t_amount" placeholder="Enter Amount Here" required onkeypress="return onlyNos(event,this);" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Payment Mode <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
								<span class="input-group-addon input-circle-left">
									<i class="fa fa-bookmark"></i>
									</span>
                                    
                                    <select id="myID" name="t_payment_mode" class="form-control input-circle-right" onchange="hideShow()">
                                    	<option value="">--Select Payment Mode--</option>
                                        <option value="CREDIT CARD">Credit Card</option>
                                        <option value="DEBIT CARD">Debit Card</option>
                                        <option value="CASH">Cash</option>
                                    </select>
                                <?php 
								// 17.11.2015
								//$fun = "onChange=hideShow()";
								//echo form_dropdown( 't_payment_mode',$t_payment_mode , '' ,$js);
								
								//echo form_dropdown('t_payment_mode',$t_payment_mode, $js, 'id'="myId" ') ;
								//echo form_dropdown('t_payment_mode',$t_payment_mode, $js , 'id="myId" ');
								
								?>
                                
                            </div>
                        </div>
                    </div>
					
					<div class="form-group" id="bank_name">
                        <label class="col-md-3 control-label">
                            Bank Name <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bookmark"></i>
															</span>
                                <input type="text"  required="required" onkeypress="return onlyLtrs();" class="form-control input-circle-right" name="t_bank_name" placeholder="Bank Name" />
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Payment Status <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-rupee"></i>
															</span>
                                <?php echo form_dropdown('t_payment_status', $t_payment_status, '', $js);?>
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
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>

    
$(document).ready(function(){

    $("#t_amount").keyup(function(){
        var length = $("#t_amount").val().length;
        //alert(length);
        if(length==1)
        {
            if($("#t_amount").val()==0)
            {
                    $("#t_amount").val("");
            }
        }
    });

});

</script>