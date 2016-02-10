<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    text-align: center;
}
.list-unstyled li{
padding:5px 0px 5px 0px;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
    font-size: 14px;
}
.dwn {
    margin-top: 49px;
}
ul.style {
    list-style-type: none;
    padding: 5px 5px;
}
ul.style li{
	padding:3px;
}
button[disabled], html input[disabled] {
    cursor: default;
    width: 70%;
    height: 25px;
}
ul.style-one {
    list-style-type: none;
    padding: 5px 5px;
}
ul.style-one li{
	padding:2px;
}
ul.style-three {
    list-style-type: none;
    padding: 2px 5px;
}
ul.style-three li{
	padding:2px;
}
 select,input {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    width: 70%;
	height:25px;
}
.dwn-two {
    margin-top: 10px;
}
button.btn.blue.pull-left.bam {
    margin-left: 0px;
}
button.btn.green.pull-right.dan {
    margin-left: 51px;
    margin-top: -34px;
}

.side {
    /* padding-left: 79px; */
    margin: 0 auto;
    width: 91%;
}
.side-one{
    /* padding-left: 79px; */
    margin: 0 auto;
    width: 63%;
}
button.btn.green.pull-left.dana {
    margin-left: 61px;
    margin-top: -35px;
}
.side-two{
    /* padding-left: 79px; */
    margin: 0 auto;
    width: 43%;
}
.dwn-gain {
    margin-top: 22px;
}
.col-xs-12.stay {
    border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
    /* padding-top: 10px; */
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
}
.col-xs-12.gnrl{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
}
.col-xs-12.payment{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
}
.col-xs-12.extra{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
}
.col-xs-12.pkg{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
}
.col-xs-12.bill{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
}
.col-xs-12.gst{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
}

</style>
<?php 
$details = $this->dashboard_model->get_hotel_room($bookingDetails->room_id);
$amountPaid = $this->dashboard_model->get_amountPaidByBookingID($_GET['b_id']);
//print_r($amountPaid);
?>
<div class="invoice" style="width:90%; margin: 0 auto; margin-top:0px;">
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
			
		<div class="row">
			 <div class="col-xs-12 gst">			
					<div class="col-xs-2">
						<h3>Guest:</h3>
						<ul class="list-unstyled">
							<li>
								<b>Guest Id:</b> 
							<li>
								<b>Guest Name:</b> 
							</li> 
							<li>
								 <b>Phone Number:</b> 
							</li>
							<li>
								 <b>Guest Address:</b> 
							</li>

						</ul>
					</div>

					<div class="col-xs-6">
						<div class="dwn">
							<ul class="style" >
								<li>
									<label><?php echo $bookingDetails->guest_id ;?></label>
								</li> 
								<li>
									<!--<input type="text" class="" disabled="true" id="guest_name" value="<?php echo $bookingDetails->g_name ;?>"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o" style="color:gray;" onClick='edit_name()' ></i></span>-->
								<label style="margin-top:1px;"><?php echo $bookingDetails->g_name ;?></label>
								</li> 
								<li>
									<!--<input type="text" class="" disabled id="guest_contact"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o" style="color:gray;" onClick='edit_contact()' ></i></span>-->
									<label style="margin-top:1px;"><?php echo $bookingDetails->g_contact_no ;?></label>
								</li>
								<li>
									<!--<input type="text" class="" disabled id="guest_address"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;" onClick='edit_address()' ></i></span>-->
									<label ><?php echo $bookingDetails->g_address ;?></label>
								</li>

							</ul>
						</div>	
					</div>
					
					
				
					<div class="col-xs-4 invoice-payment">
						
						<div class="pic" style="width:118px;height:118px;border:1px solid gray;float: right;margin-top: 29px;">
						<?php if(isset($bookingDetails->g_photo_thumb) && $bookingDetails->g_photo_thumb != '') { ?>
							<img src="<?php echo base_url();?>upload/guest/<?php echo $bookingDetails->g_photo_thumb;?>" height="100%" width="100%"/>
						<?php } else { ?>
							<img src="<?php echo base_url();?>upload/guest/no_images.png" width="100%"/>
						<?php } ?>
					    </div><br><div class="clearfix"></div>
					<h4 style="float:right;"><b>Room No:</b><labe><?php echo $details->room_no ;?></labe>&nbsp;&nbsp;&nbsp;<span>(<?php echo $details->hotel_name ;?>)</span></h4>
				   </div><br>
				   
				   <br><br>
				   
				   
				<div class="row">
					<div class="col-xs-12">
					<h3>Guest Details</h3> <i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='tabel_show()'></i>
					<div class="first-tabel" id="guest_details_first">
						<table class="table table-striped table-hover" >
							<tbody>
								<tr>
									<th>
										 Id
									</th>
									<th>
										 Name
									</th>
									<th>
										Check In Date
									</th>
									<th>
										 Check Out Date
									</th>
									<th>
										Mobile Number
									</th>
									<th>
										Type
									</th>
									<th>
										Charge
									</th>
									<!--<th>
										Action
									</th>-->
								</tr>
								

								<tr>
									<td>
									<label><?php echo $bookingDetails->guest_id ;?></label>
									</td>
									<td>
										<label><?php echo $bookingDetails->g_name ;?></label>
									</td>
									<td class="hidden-480">
									<label><?php echo date('d-m-Y',strtotime($bookingDetails->cust_from_date)); ?></label>
									</td>
									<td class="hidden-480">
										<label><?php echo date('d-m-Y',strtotime($bookingDetails->cust_end_date)); ?></label>
									</td>
									<td class="hidden-480">
									<label><?php echo $bookingDetails->g_contact_no ;?></label>
									</td>
									<td class="hidden-480">
										<label></label>
									</td>
									<td class="hidden-480">
										<label></label>
									</td>
									<!--<td class="hidden-480">
									<button class="btn blue pull-left bam" >Edit</button>
									<button class="btn green pull-right dan">Save</button>
									</td>-->

								</tr>
							</tbody>
						</table>
					</div>	 
														<!--guest details edit field-->
					<div class="edit_tabel" id="guest_details_edit" style="display:none;">									
						<table class="table table-striped table-hover" id="guest_details">
							<tbody>
								<tr>
									<th>
										 Id
									</th>
									<th>
										 Name
									</th>
									<th>
										Check In Date
									</th>
									<th>
										 Check In Out
									</th>
									<th>
										Mobile Number
									</th>
									<th>
										Type
									</th>
									<th>
										Charge
									</th>
									<!--<th>
										Action
									</th>-->
								</tr>
								

								<tr>
									<td>
									<label><?php echo $bookingDetails->guest_id ;?></label>
									</td>
									<td>
										<input type="text" value="<?php echo $bookingDetails->g_name ;?>">
									</td>
									<td class="hidden-480">
									<input type="text" value="<?php echo date('d-m-Y',strtotime($bookingDetails->cust_from_date)); ?>">
									</td>
									<td class="hidden-480">
										<input type="text" value="<?php echo date('d-m-Y',strtotime($bookingDetails->cust_end_date)); ?>">
									</td>
									<td class="hidden-480">
									<input type="text" value="<?php echo $bookingDetails->g_contact_no ;?>">
									</td>
									<td class="hidden-480">
										<input type="text" value="">
									</td>
									<td class="hidden-480">
										<input type="text" value="">
									</td>
									<!--<td class="hidden-480">
									<button class="btn blue pull-left bam" >Edit</button>
									<button class="btn green pull-right dan">Save</button>
									</td>-->

								</tr>
							</tbody>
						</table>				
														
														
														
														
														
														
														
														
														
														
														
						<button class="btn green pull-right" onclick="add_row()">Add More Guests</button>
					</div>
					                     <!--end of guest details edit field-->
						<br><br>
						<h3>preference</h3><br>
						<textarea class="form-control" rows="3" name="comment"></textarea>
						<br><br>
						<div id='hd' style="display:none;">
						<button class="btn green pull-right" style="margin-top:15px;margin-bottom:15px;">Save</button>
						<button class="btn blue" onClick='tabel_show_hide()' style="margin-top:15px;margin-bottom:15px;">Cancel</button>
						</div>
					</div>
				</div>
				  
			</div>
			
		</div>
		
		<br><br>
			
			
			<div class="row">
				<div class="col-xs-12 stay">
					<h3>Stay Details</h3><i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='stay_show()'></i><br>
				<div class="stay_details" id="stay_details">	
					<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 Check In Date
							</th>
							<th>
								 Check In Time
							</th>
							<th>
								Arrival Mode
							</th>
							<th>
								Coming From
							</th>
							<!--<th>
								Action
							</th>-->
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<label><?php echo date('d-m-Y',strtotime($bookingDetails->cust_from_date)); ?></label>
							</td>
							<td>
								<label><?php echo $bookingDetails->confirmed_checkin_time; //date('h : i',strtotime($bookingDetails->confirmed_checkin_time));?></label>
							</td>
							<td class="hidden-480">
							<label><?php echo $bookingDetails->arrival_mode;?></label> 
							</td>
							<td class="hidden-480">
								<label><?php echo $bookingDetails->coming_from;?></label>
							</td>
							<!--<td class="hidden-480">
							  <div class="side">
								<button class="btn blue pull-left ">Edit</button>
							    <button class="btn green pull-left ">Save</button>
							</div>
							</td>-->

						</tr>

						</tbody>
						</table>
					<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 Check out Date
							</th>
							<th>
								 Check Out Time
							</th>

							<th>
								Departure Mode
							</th>
							<th>
								Next Destination
							</th>
							<!--<th>
								Action
							</th>-->

						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<label><?php echo date('d-m-Y',strtotime($bookingDetails->cust_end_date)); ?></label>
							</td>
							<td>
								<label><?php echo $bookingDetails->confirmed_checkout_time ; //date('h : i',strtotime($bookingDetails->confirmed_checkout_time));?></label>
							</td>
							<td class="hidden-480">
							<label><?php echo $bookingDetails->dept_mode;?></label>
							</td>
							<td class="hidden-480">
								<label><?php echo $bookingDetails->next_destination ;?></label>
							</td>
							<!--<td class="hidden-480">
								<div class="side">
									<button class="btn blue pull-left" >Edit</button>
								   <button class="btn green pull-left">Save</button>
							   </div>
							</td>-->

						</tr>

						</tbody>
						</table>
						
					</div>
					
									<!--stay details again-->
									
									
									
									
									
				<div class="stay_details_again" id="stay_details_again" style="display:none;">
					                <?php
                $form = array(
                    'class' 			=> 'form-body form-horizontal form-row-sepe',
                    'id'				=> 'form',
                    'method'			=> 'post',
                );
                echo form_open_multipart('dashboard/add_stay_details',$form);
                ?>
				<input type="hidden" name="booking_id" value="<?php echo $_GET['b_id'];?>">
					<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 Check In Date
							</th>
							<th>
								 Check In Time
							</th>
							<th>
								Arrival Mode
							</th>
							<th>
								Coming From
							</th>
							<!--<th>
								Action
							</th>-->
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<input type="text" name="cust_from_date" value="<?php echo date('d-m-Y',strtotime($bookingDetails->cust_from_date)); ?>">
							</td>
							<td>
								<input type="text" name="confirmed_checkin_time" value="<?php echo $bookingDetails->confirmed_checkin_time;?>">
							</td>
							<td class="hidden-480">
							<input type="text" name="arrival_mode" value="<?php echo $bookingDetails->arrival_mode;?>">	 
							</td>
							<td class="hidden-480">
								<input type="text" name="coming_from" value="<?php echo $bookingDetails->coming_from;?>">
							</td>
							<!--<td class="hidden-480">
							  <div class="side">
								<button class="btn blue pull-left ">Edit</button>
							    <button class="btn green pull-left ">Save</button>
							</div>
							</td>-->

						</tr>

						</tbody>
						</table>
					<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 Check out Date
							</th>
							<th>
								 Check Out Time
							</th>

							<th>
								Departure Mode
							</th>
							<th>
								Next Destination
							</th>
							<!--<th>
								Action
							</th>-->

						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<input type="text" name="cust_end_date" value="<?php echo date('d-m-Y',strtotime($bookingDetails->cust_end_date)); ?>">	
							</td>
							<td>
								<input type="text" name="confirmed_checkout_time" value="<?php echo $bookingDetails->confirmed_checkout_time;?>">
							</td>
							<td class="hidden-480">
							<input type="text" name="dept_mode" value="<?php echo $bookingDetails->dept_mode;?>">
							</td>
							<td class="hidden-480">
								<input type="text" name="next_destination" value="<?php echo $bookingDetails->next_destination ;?>">
							</td>
						<!--	<td class="hidden-480">
								<div class="side">
									<button class="btn blue pull-left" >Edit</button>
								   <button class="btn green pull-left">Save</button>
							   </div>
							</td>-->

						</tr>

						</tbody>
						</table>
						 <button type="submit" class="btn green pull-right" onclick="" style="margin-top:12px;">Save</button>	
						 <button class="btn blue" type="button" onClick='stay_hide()' style="margin-top:12px;">Cancel</button>
						 <?php form_close(); ?>
					</div>	
								
				</div>	
					 
				<div class="col-xs-12 gnrl">					
									
									
									<!--stay details again end-->
									
					
					
					 <h3>Genarel Information</h3><i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='gnrl_info()'></i>
					 
					        <div id="genarel_information">
								<div class="col-xs-12" style="margin-top:10px;">
									
									<ul class="list-unstyled">
										<li>
											<b>Nature Of Visit:</b> <label style="margin-left:20px;"><?php echo $bookingDetails->nature_visit ;?></label>
										</li>
										<li>
											<b>Booking Source:</b> <label style="margin-left:17px;"><?php echo $bookingDetails->booking_source ;?></label>
										</li> 
										<li>
											 <b>Booking Note:</b> <label style="margin-left:30px;"><?php echo $bookingDetails->comment ;?></label>
										</li>
										<?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source == 'Broker'){
												$broker = $this->dashboard_model->get_brokerNameByID($bookingDetails->broker_id);
										?>
										<li>
											 <b>Broker Name:</b> <label style="margin-left:30px;"><?php echo $broker->b_name ;?></label>
										</li>
										<li>
											<b>% Commision:</b> <label style="margin-left:29px;"><?php $com = (($bookingDetails->broker_commission/$bookingDetails->room_rent_sum_total)*100); echo round($com);?></label>
										</li>
										<li>
											<b> Broker Ammount:</b> <label style="margin-left:3px;"><?php echo $bookingDetails->broker_commission ;?></label>
										</li>
										<?php } ?>
									</ul>
								</div>
									
								<!--<div class="col-xs-8">
									<div class="dwn-two">
										<ul class="style-one" >
											<li>
												<label>hjgjgkhkh</label>
											</li> 
											<li>
												<label>hjgjgkhkh</label>
											</li> 
											<li>
												<label>hjgjgkhkh</label>
											</li>
											<li>
												<label>hjgjgkhkh</label>
											</li>
											<li>
												<label>hjgjgkhkh</label>
											</li>
											<li>
												<label>hjgjgkhkh</label>
											</li>

										</ul>
									</div>	
								</div>-->
							</div>	
								
							 <!--gnrl information-again start-->

							<div id="genarel_information_again" style="display:none;">
								<div class="col-xs-2" style="margin-top:10px;">
									
									<ul class="list-unstyled">
										<li>
											<b>Nature Of Visit:</b> 
										</li>
										<li>
											<b>Booking Source:</b> 
										</li> 
										<li>
											 <b>Booking Note:</b> 
										</li>
										<li>
											 <b>Broker Name:</b> 
										</li>
										<li>
											<b>% Commision:</b>
										</li>
										<li>
											<b> Broker Ammount:</b>
										</li>
									</ul>
								</div>
									
								<div class="col-xs-8">
									<div class="dwn-two">
										<ul class="style-one" >
											<li>
												<!--<input type="text" class=""  id="guest_nature">--> 
												<select   class="" placeholder=" Booking Type">

													<option value="Travel &amp; Leisure">Travel &amp; Leisure</option>
													<option value="Business">Business</option>
												</select>
											</li> 
											<li>
												 <select  class="">
													<option value="" disabled="" selected="">Select Source</option>
													<option value="Frontdesk">Frontdesk</option>
													<option value="Online">Online</option>
													<option value="Telephonic">Telephonic</option>
													<option value="Broker">Broker</option>
												</select>
											</li> 
											<li>
												<input type="text" class=""  > 
											</li>
											<li>
												<input type="text" class="" > 
											</li>
											<li>
												<input type="text" class=""  > 
											</li>
											<li>
												<input type="text" class=""  > 
											</li>

										</ul>
									</div>	
								</div>
								<br><br>
								<button class="btn green pull-right" style="margin-top:15px;">Save</button>	
				 <button class="btn blue" onClick='gnrl_info_hide()' style="margin-top:15px;">Cancel</button>
							</div>


                             <!--end gnrn info again-->

									
						<br><br>
									 
				</div>

			</div>
				
				
				<div class="row">
					<div class="col-xs-12 payment">
					<h3>Payment Information</h3><i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='payment_info()'></i>
					
			<div id="payment_information">			
				<div class="col-xs-12" style="margin-top:10px;">
						
						<ul class="list-unstyled">
							<li>
								<b>Room Rent Type:</b><label style="margin-left:20px;"></label>
							</li>
							<li>
								<b>Actual Room Rent Amount:</b><label style="margin-left:17px;">
								<?php if($bookingDetails->rent_mode_type == 'add'){ 
								    $val = $bookingDetails->base_room_rent-$bookingDetails->mod_room_rent;
								} else {
									$val = $bookingDetails->base_room_rent+$bookingDetails->mod_room_rent;
								}	echo $val?> / Day</label> 
							</li> 
							<li>
								 <b>Room Rent Modifier:</b><label style="margin-left:30px;"><?php echo $bookingDetails->mod_room_rent;?> <?php if($bookingDetails->rent_mode_type == 'add'){ echo '(Premium)'; }else { echo '(Discount)'; }?></label> 
							</li>
							<li>
								<b>Room Rent Amount:</b><label style="margin-left:17px;"><?php echo $bookingDetails->base_room_rent;?> / Day</label> 
							</li>
							<li>
								<b>Number Of Days:</b><label style="margin-left:17px;"><?php echo $bookingDetails->stay_days;?></label> 
							</li>
							<li>
								<b>Total Room Rent:</b> <label style="margin-left:3px;"><?php echo $bookingDetails->base_room_rent*$bookingDetails->stay_days;?></label>
							</li>							
							<li>
								 <b>Tax Type:</b> <label style="margin-left:30px;"></label>
							</li>
							<li>
								<b>Tax Ammount:</b><label style="margin-left:29px;"><?php echo $bookingDetails->room_rent_tax_amount;?></label>
							</li>
							<li>
								<b>Total Room Rent(Incl Tax):</b> <label style="margin-left:3px;"><?php echo $bookingDetails->room_rent_sum_total;?></label>
							</li>
					
						</ul>
				</div>
						
					<!--<div class="col-xs-8">
						<div class="dwn-two">
							<ul class="style-one" >
								<li>
									<input type="text" class="" disabled id="guest_nature"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;"onClick='edit_nature()'></i></span>
								</li> 
								<li>
									<input type="text" class="" disabled id="booking_source"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;"onClick='edit_source()'></i></span>
								</li> 
								<li>
									<input type="text" class="" disabled id="booking_note"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o" style="color:gray;"onClick='edit_note()'></i></span>
								</li>
								<li>
									<input type="text" class="" disabled id="broker_name"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;" onClick='edit_broker_name()'></i></span>
								</li>
								<li>
									<input type="text" class="" disabled id="commision"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;" onClick='edit_commision()'></i></span>
								</li>
								<li>
									<input type="text" class="" disabled> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;"></i></span>
								</li> 

							</ul>
						</div>	
					</div>-->
						
						
			</div>		
					<!--payment information again-->

			<div id="payment_information_again" style="display:none">			
				<div class="col-xs-3" style="margin-top:10px;">
				<input type="hidden" name="booking_id" value="<?php echo $_GET['b_id'];?>">
				<?php
				$trr= $bookingDetails->base_room_rent*$bookingDetails->stay_days;
				$tax = $bookingDetails->room_rent_tax_amount;
				$tax_percent = ($tax/$trr)*100;
				?>
<input type="hidden" name="tax_percent" value="<?php echo $tax_percent;?>">	
<input type="hidden" name="actual_room_rent" value="<?php echo $val;?>">				
						<ul class="list-unstyled">
							<li>
								<b>Room Rent Type:</b> 
							</li>
							<li>
								<b>Room Rent Amount:</b> 
							</li> 
							<li>
								 <b>Room Rent Modifier:</b> 
							</li>
							<li>
								 <b>Tax Type:</b> 
							</li>
							<li>
								<b>Tax Ammount:</b>
							</li>
							<li>
								<b>Total Room Rent:</b> 
							</li>
					
						</ul>
				</div>
						
					<div class="col-xs-8">
						<div class="dwn-two">
							<ul class="style-one" >
								<li>
									<select  class="" >
                                <option value="" disabled="" selected="">--Rent Type--</option>
                                <option value="Base Room Rent">Base Room Rent</option>
                                <option value="Weekend Room Rent">Weekend Room Rent</option>
                                <option value="Seasonal Room Rent">Seasonal Room Rent</option>
                            </select>
									
								</li> 
								<li>
									<input type="text" class=""  > 
								</li> 
								<li>
									<input type="text" class=""  > 
								</li>
								<li>
									<select class="" >
                                <option value="" disabled="" selected="">--tax Type--</option>
                                <option value="No Tax">No Tax</option>
                                <option value="Service tax">Service tax</option>
                                <option value="Luxury tax">Luxury tax</option>
                            </select>
								</li>
								<li>
									<input type="text" class="" > 
								</li>
								<li>
									<input type="text" class="" > 
								</li> 

							</ul>
						</div>	
					</div>
					<button class="btn green pull-right" style="margin-top:15px;">Save</button>	
				 <button class="btn blue" onClick='payment_info_hide()' style="margin-top:15px;">Cancel</button>	
						
			</div>	


					
					<!--end payment informatin again-->	
						
					
					
								
						
						<br><br>
						
					</div>
					
					<br><br>
					
				<div class="col-xs-12 extra">
					 <h3>Extra service Information</h3>
					 <h4 style="color:red;margin-top:20px;">Not Availabe</h4>
					 <!--<i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='extra_info()'></i>-->
				<div id="extra" style="display:none;">	 
					<table class="table table-striped table-hover" >
						<thead>

						<tr>
							<th>
								Extra Service Type
							</th>
							<th>
								Extra Service Ammount
							</th>
							<th>
								Extra Service Tax
							</th>
							
							
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<label>hkgbkbk</label>
							</td>
							<td>
								<label>hkgbkbk</label>
							</td>
							<td class="hidden-480">
							<label>hkgbkbk</label>
							</td>
							
							

						</tr>

						</tbody>
						</table>
					    
				</div>
				        <!--extra agn-->
						
				<div id="extra_again" style="display:none;">	 
					<table class="table table-striped table-hover" id="extra_service">
						<thead>

						<tr>
							<th>
								Extra Service Type
							</th>
							<th>
								Extra Service Ammount
							</th>
							<th>
								Extra Service Tax
							</th>
							
							
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<input type="text">
							</td>
							<td>
								<input type="text">
							</td>
							<td class="hidden-480">
							<input type="text">	 
							</td>
							
							

						</tr>

						</tbody>
						</table>
					    <button class="btn green pull-right" onclick="add_row_again()" >Add Extra Service</button><br><br>
				</div>
						<!--end extra agn-->
				
				
				
				
				
				
				
				
				
				
				
				
							<div class="col-xs-3" style="margin-top:10px; display:none">
						
								<ul class="list-unstyled">
									<li>
										<b>Total Extra Service:</b> 
									</li>
									
								</ul>
							</div>
							<div class="col-xs-7 pull-left">
						<div class="dwn-two" style="display:none">
							<ul class="style-one" >
								<li>
									<input type="text" class="" disabled> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;"></i></span>
								</li> 
								
							</ul>
						</div>	
					</div>
						
						<br><br>
						
				</div>
				
				
				
				<div class="col-xs-12 pkg">
					 <h3>Package Information</h3>
					  <h4 style="color:red;margin-top:20px;">Not Availabe</h4>
					<!--<table class="table table-striped table-hover" id="package_details">
						<thead>

						<tr>
							<th>
								Package  Type
							</th>
							<th>
								Package Ammount
							</th>
							<th>
								Payment done/not done
							</th>
							
							<th>
								Action
							</th>
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<input type="text"readonly>
							</td>
							<td>
								<input type="text"readonly>
							</td>
							<td class="hidden-480">
							<input type="text"readonly>	 
							</td>
							
							<td class="hidden-480">
							  <div class="side-two">
								<button class="btn blue pull-left bam">Edit</button>
							    <button class="btn green pull-left dana">Save</button>
							</div>
							</td>

						</tr>

						</tbody>
						</table>
					    <button class="btn green pull-right" onclick="add_row_package()" >Add Package</button><br><br>
					
							<div class="col-xs-3" style="margin-top:10px;">
						
								<ul class="list-unstyled">
									<li>
										<b>Total Package Ammount:</b> 
									</li>
									
								</ul>
							</div>
							<div class="col-xs-7 pull-left">
						<div class="dwn-two">
							<ul class="style-one" >
								<li>
									<input type="text" class="" disabled> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;"></i></span>
								</li> 
								
							</ul>
						</div>	
					</div>-->
						
						<br><br>
						
				</div>
				
				
				
						<div class="col-xs-12 bill">
					 <h3>Bill Tax Information</h3>
					  <h4 style="color:red;margin-top:20px;">Not Availabe</h4>
					<!--<table class="table table-striped table-hover" id="bill_details">
						<thead>

						<tr>
							<th>
								Restrurent Bill
							</th>
							<th>
								 Bill Ammount
							</th>
							<th>
								Payment done/not done
							</th>
							
							<th>
								Action
							</th>
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							<input type="text"readonly>
							</td>
							<td>
								<input type="text"readonly>
							</td>
							<td class="hidden-480">
							<input type="text"readonly>	 
							</td>
							
							<td class="hidden-480">
							  <div class="side-two">
								<button class="btn blue pull-left bam">Edit</button>
							    <button class="btn green pull-left dana">Save</button>
							</div>
							</td>

						</tr>

						</tbody>
						</table>
					    <button class="btn green pull-right" onclick="add_row_bill()">Add Bill</button><br><br>
					
							<div class="col-xs-4" style="margin-top:10px;">
						
								<ul class="list-unstyled">
									<li>
										<b>Total Restrurent Bill Ammount:</b> 
									</li>
									
								</ul>
							</div>
							<div class="col-xs-7 pull-left">
						<div class="dwn-two">
							<ul class="style-one" >
								<li>
									<input type="text" class="" disabled> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;"></i></span>
								</li> 
								
							</ul>
						</div>	
					</div>-->
						
						<br><br>
						
				</div>
					
					
					
				</div>
				<br>
				<div class="row">
					<div class="col-xs-2">
						
						<ul class="list-unstyled">
							
							<li>
								<b>Total Amount:</b> 
							</li> 
							<li>
								 <b>Amount Paid:</b> 
							</li>
							<li>
								 <b>Pending Amount:</b> 
							</li>

						</ul>
					</div>
				
				
							<div class="col-xs-6">
								<div class="">
									<ul class="style-three" >
										 
										<li>
											<label><?php echo $bookingDetails->room_rent_sum_total;?></label>
										</li> 
										<li>
											<label><?php echo $amountPaid->tm;?></label>
										</li>
										<li>
											<label>
											<?php $pa = $bookingDetails->room_rent_sum_total - $amountPaid->tm;
												  echo $pa;	
											?>
											</label>
										</li>

									</ul>
								</div>	
							</div>
							   <?php
							    $totalAmount = $bookingDetails->room_rent_sum_total;
							    $amountPaid=$amountPaid->tm;
							    $percentPaid = (($amountPaid/$totalAmount)*100);
								$percentPending = (($pa/$totalAmount)*100);
								?>
								<div class="col-xs-4">
									 <div class="dwn-gain">
										<ul class="list-unstyled">
											
											<li>
												<b>% Paid:</b>&nbsp;&nbsp; <label><?php echo round($percentPaid);?></label> 
											</li> 
											<li>
												 <b>% pending:</b>&nbsp;&nbsp; <label><?php echo round($percentPending);?></label>
											</li>
											
										</ul>
									</div>
								</div>
				
				</div>
				
				
				
				
	</div>


	<script type="text/javascript">
		function add_row()
		{
			$('#guest_details').append('<tr><td><label>4546546</label></td><td><input type="text" ></td><td class="hidden-480"><input type="text" ></td><td class="hidden-480"><input type="text"></td><td class="hidden-480"><input type="text"></td><td class="hidden-480"><input type="text" ></td><td class="hidden-480"><input type="text"></td></tr>');
		}
	function add_row_again()
		{
			$('#extra_service').append('<tr><td><input type="text" ></td><td><input type="text" ></td><td class="hidden-480"><input type="text" ></td></tr>');
		}
		function add_row_package()
		{
			$('#package_details').append('<tr><td><input type="text" readonly></td><td><input type="text" readonly></td><td class="hidden-480"><input type="text" readonly></td><td class="hidden-480"><div class="side-two"><button class="btn blue pull-left bam">Edit</button><button class="btn green pull-left dana">Save</button></div></td></tr>');
		}		
function add_row_bill()
		{
			$('#bill_details').append('<tr><td><input type="text" readonly></td><td><input type="text" readonly></td><td class="hidden-480"><input type="text" readonly></td><td class="hidden-480"><div class="side-two"><button class="btn blue pull-left bam">Edit</button><button class="btn green pull-left dana">Save</button></div></td></tr>');
		}			
		function edit_name(){
			document.getElementById('guest_name').disabled = false;
		}	
		function edit_contact(){
			document.getElementById('guest_contact').disabled = false;
		}
		function edit_address(){
			document.getElementById('guest_address').disabled = false;
		}
		function edit_nature(){
			document.getElementById('guest_nature').disabled = false;
		}
		function edit_source(){
			document.getElementById('booking_source').disabled = false;
		}
		function edit_note(){
			document.getElementById('booking_note').disabled = false;
		}
		
		function edit_broker_name(){
			document.getElementById('broker_name').disabled = false;
		}
		function edit_commision(){
			document.getElementById('commision').disabled = false;
		}
		function edit_broker_ammount(){
			document.getElementById('broker_ammount').disabled = false;
		}
		function tabel_show(){
			document.getElementById('guest_details_edit').style.display= 'block';
	        document.getElementById('guest_details_first').style.display= 'none';
			document.getElementById('hd').style.display= 'block';
		}
		function tabel_show_hide(){
			document.getElementById('guest_details_edit').style.display= 'none';
	        document.getElementById('guest_details_first').style.display= 'block';
			document.getElementById('hd').style.display= 'none';
		}		
		function stay_show(){
			document.getElementById('stay_details_again').style.display= 'block';
	        document.getElementById('stay_details').style.display= 'none';
		}
		function stay_hide(){
			document.getElementById('stay_details_again').style.display= 'none';
	        document.getElementById('stay_details').style.display= 'block';
		}		
		function gnrl_info(){
			document.getElementById('genarel_information_again').style.display= 'block';
	        document.getElementById('genarel_information').style.display= 'none';
		}
		function gnrl_info_hide(){
			document.getElementById('genarel_information_again').style.display= 'none';
	        document.getElementById('genarel_information').style.display= 'block';
		}		
		function payment_info(){
			document.getElementById('payment_information_again').style.display= 'block';
	        document.getElementById('payment_information').style.display= 'none';
		}
		function payment_info_hide(){
			document.getElementById('payment_information_again').style.display= 'none';
	        document.getElementById('payment_information').style.display= 'block';
		}		
		function extra_info(){
			//document.getElementById('extra_again').style.display= 'block';
	       // document.getElementById('extra').style.display= 'none';
		}
		
	</script>