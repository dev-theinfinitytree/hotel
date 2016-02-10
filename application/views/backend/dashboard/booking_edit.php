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
	background:white;
}
.col-xs-12.gnrl{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
	background:white;
}
.col-xs-12.payment{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
	background:white;
}
.col-xs-12.extra{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
	background:white;
}
.col-xs-12.pkg{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
	background:white;
}
.col-xs-12.bill{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
	background:white;
}
.col-xs-12.gst{
border: 1px solid rgba(177, 175, 175, 0.52);
    /* padding: 20px; */
     padding-top: 5px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
	margin-top:34px;
	background:white;
}
.booking-ststs {
    width: 17%;
    /* height: 22%; */
    border: 2px solid white;
    background:#1caf9a;
    margin: 0 auto;
    padding: 10px;
    text-align: center;
    color: black;
    font-weight: bold;
    font-size: 14px;
    /* border-radius: 18px; */
}
.page-container-bg-solid .page-content {
    background: #F9F9F9;
}

</style>
<?php 
if(isset($bookingDetails->room_id)){
$details = $this->dashboard_model->get_hotel_room($bookingDetails->room_id);
}
$amountPaid = $this->dashboard_model->get_amountPaidByBookingID($_GET['b_id']);
//print_r($amountPaid);
if(isset($bookingDetails->booking_status_id_secondary)){
if($bookingDetails->booking_status_id_secondary > 0){
	$txtcol = $this->dashboard_model->get_booking_status($bookingDetails->booking_status_id_secondary);
}
}
if(isset($bookingDetails->booking_status_id)){
$bgcol = $this->dashboard_model->get_booking_status($bookingDetails->booking_status_id);
}
//print_r($bgcol);
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
<?php if(isset($bookingDetails->booking_status_id_secondary) && $bookingDetails->booking_status_id_secondary > 0){ ?>
<div class="booking-ststs" style="background-color:<?php if(isset($bgcol->body_color_code)){echo $bgcol->body_color_code;}?>!important; color:<?php if(isset($txtcol->bar_color_code)){echo $txtcol->bar_color_code;}?>!important;"><?php if(isset($bgcol->booking_status)){echo $bgcol->booking_status;}?></div>			 
			 <?php } else { ?>
				<div class="booking-ststs" style="background-color:<?php if(isset($bgcol->body_color_code)){echo $bgcol->body_color_code; }?>!important; color:<?php if(isset($bgcol->bar_color_code)){echo $bgcol->bar_color_code;}?>!important;"><?php if(isset($bgcol->booking_status)){echo $bgcol->booking_status;}?></div>			 
			 
			 <?php } ?>
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
									<label><?php if(isset($bookingDetails->guest_id)){echo $bookingDetails->guest_id;}?></label>
								</li> 
								<li>
									<!--<input type="text" class="" disabled="true" id="guest_name" value="<?php //echo $bookingDetails->g_name ;?>"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o" style="color:gray;" onClick='edit_name()' ></i></span>-->
								<label style="margin-top:1px;"><?php if(isset($bookingDetails->g_name)){echo $bookingDetails->g_name;}?></label>
								</li> 
								<li>
									<!--<input type="text" class="" disabled id="guest_contact"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o" style="color:gray;" onClick='edit_contact()' ></i></span>-->
									<label style="margin-top:1px;"><?php if(isset($bookingDetails->g_contact_no)){echo $bookingDetails->g_contact_no;}?></label>
								</li>
								<li>
									<!--<input type="text" class="" disabled id="guest_address"> <span style="cursor:pointer;"> <i class="fa fa-pencil-square-o"style="color:gray;" onClick='edit_address()' ></i></span>-->
									<label ><?php if(isset($bookingDetails->g_address)){echo $bookingDetails->g_address;}?></label>
								</li>

							</ul>
						</div>	
					</div>
					
					
				
					<div class="col-xs-4 invoice-payment">
						
						<div class="pic" style="width:118px;height:118px;border:1px solid gray;float: right;margin-top: 29px;">
						<?php if(isset($bookingDetails->g_photo_thumb) && $bookingDetails->g_photo_thumb != '') { ?>
							<img src="<?php echo base_url();?>upload/guest/<?php echo $bookingDetails->g_photo_thumb;?>" height="100%" width="100%"/>
						<?php } else { ?>
							<img src="<?php echo base_url();?>upload/guest/no_images.png" width="100%" height="100%"/>
						<?php } ?>
					    </div><br><div class="clearfix"></div>
					<h4 style="float:right;"><b>Room No:</b><labe><?php if(isset($details->room_no)){echo $details->room_no;}?></labe>&nbsp;&nbsp;&nbsp;<span>(<?php if(isset($details->hotel_name)){echo $details->hotel_name ;}?>)</span></h4>
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
										Pincode
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
									<label><?php if(isset($bookingDetails->guest_id)){echo $bookingDetails->guest_id;}?></label>
									</td>
									<td>
										<label><?php if(isset($bookingDetails->g_name)){echo $bookingDetails->g_name;}?></label>
									</td>
									<td class="hidden-480">
									<label><?php if(isset($bookingDetails->cust_from_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_from_date));} ?></label>
									</td>
									<td class="hidden-480">
										<label><?php if(isset($bookingDetails->cust_end_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_end_date));} ?></label>
									</td>
									<td class="hidden-480">
									<label><?php if(isset($bookingDetails->g_contact_no)){echo $bookingDetails->g_contact_no;}?></label>
									</td>
									<td class="hidden-480">
										<label><?php if(isset($bookingDetails->g_pincode)){echo $bookingDetails->g_pincode;}?></label>
									</td>
									<td class="hidden-480">
										<label>Yes</label>
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
									<?php
                $form2 = array(
                    'class' 			=> 'form-body form-horizontal form-row-sepe',
                    'id'				=> 'form2',
                    'method'			=> 'post',
					'name'			=> 'frm2'
                );
                echo form_open('dashboard/add_guest_info',$form2);
                ?>									
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
										Pincode
									</th>
									<th>
										Charge
									</th>
									<!--<th>
										Action
									</th>-->
								</tr>
								
								<input type="hidden" name="booking_id" value="<?php echo $_GET['b_id'];?>">
								<input type="hidden" name="guest_id" value="<?php if(isset($bookingDetails->guest_id)){echo $bookingDetails->guest_id;}?>">
								<tr>
									<td>
									<label><?php if(isset($bookingDetails->guest_id)){echo $bookingDetails->guest_id ;}?></label>
									</td>
									<td>
										<input type="text" value="<?php if(isset($bookingDetails->g_name)){echo $bookingDetails->g_name;}?>" name="g_name">
									</td>
									<td class="hidden-480">
									<input type="text" value="<?php if(isset($bookingDetails->cust_from_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_from_date));} ?>">
									</td>
									<td class="hidden-480">
										<input type="text" value="<?php if(isset($bookingDetails->cust_end_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_end_date));} ?>">
									</td>
									<td class="hidden-480">
									<input type="text" value="<?php if(isset($bookingDetails->g_contact_no)){echo $bookingDetails->g_contact_no;}?>" name="g_contact_no">
									</td>
									<td class="hidden-480">
										<input type="text" value="<?php if(isset($bookingDetails->g_pincode)){echo $bookingDetails->g_pincode;}?>" name="g_pincode">
									</td>
									<td class="hidden-480">
										<input type="text" value="Yes" readonly>
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
						<h3>Preference</h3><br>
						<textarea class="form-control" rows="3" name="preference"><?php if(isset($bookingDetails->preference)){echo $bookingDetails->preference;}?></textarea>
						<br><br>
						<div id='hd' style="display:none;">
						<button class="btn green pull-right" style="margin-top:15px;margin-bottom:15px;" type="submit">Save</button>
						<button class="btn blue pull-right" onClick='tabel_show_hide()' style="margin-top:15px;margin-bottom:15px; margin-right:10px" type="button">Cancel</button>
						</div>
						
						
					<?php echo form_close(); ?>	
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
							<label><?php if(isset($bookingDetails->cust_from_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_from_date));} ?></label>
							</td>
							<td>
								<label><?php if(isset($bookingDetails->confirmed_checkin_time)){echo $bookingDetails->confirmed_checkin_time;} //date('h : i',strtotime($bookingDetails->confirmed_checkin_time));?></label>
							</td>
							<td class="hidden-480">
							<label><?php if(isset($bookingDetails->arrival_mode)){echo $bookingDetails->arrival_mode;}?></label> 
							</td>
							<td class="hidden-480">
								<label><?php if(isset($bookingDetails->coming_from)){echo $bookingDetails->coming_from;}?></label>
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
							<label><?php if(isset($bookingDetails->cust_end_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_end_date));} ?></label>
							</td>
							<td>
								<label><?php if(isset($bookingDetails->confirmed_checkout_time)){echo $bookingDetails->confirmed_checkout_time ;} //date('h : i',strtotime($bookingDetails->confirmed_checkout_time));?></label>
							</td>
							<td class="hidden-480">
							<label><?php if(isset($bookingDetails->dept_mode)){echo $bookingDetails->dept_mode;}?></label>
							</td>
							<td class="hidden-480">
								<label><?php if(isset($bookingDetails->next_destination)){echo $bookingDetails->next_destination ;}?></label>
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
					'name'			=> 'frm'
                );
                echo form_open('dashboard/add_stay_details',$form);
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
							<input type="text" name="cust_from_date" value="<?php if(isset($bookingDetails->cust_from_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_from_date));} ?>">
							</td>
							<td>
								<input type="text" name="confirmed_checkin_time" value="<?php if(isset($bookingDetails->confirmed_checkin_time)){echo $bookingDetails->confirmed_checkin_time;}?>">
							</td>
							<td class="hidden-480">
							<input type="text" name="arrival_mode" value="<?php if(isset($bookingDetails->arrival_mode)){echo $bookingDetails->arrival_mode;}?>">	 
							</td>
							<td class="hidden-480">
								<input type="text" name="coming_from" value="<?php if(isset($bookingDetails->coming_from)){echo $bookingDetails->coming_from;}?>">
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
							<input type="text" name="cust_end_date" value="<?php if(isset($bookingDetails->cust_end_date)){echo date('d-m-Y',strtotime($bookingDetails->cust_end_date));} ?>">	
							</td>
							<td>
								<input type="text" name="confirmed_checkout_time" value="<?php if(isset($bookingDetails->confirmed_checkout_time)){echo $bookingDetails->confirmed_checkout_time;}?>">
							</td>
							<td class="hidden-480">
							<input type="text" name="dept_mode" value="<?php if(isset($bookingDetails->dept_mode)){echo $bookingDetails->dept_mode;}?>">
							</td>
							<td class="hidden-480">
								<input type="text" name="next_destination" value="<?php if(isset($bookingDetails->next_destination)){echo $bookingDetails->next_destination ;}?>">
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
						 <button class="btn blue pull-right" type="button" onClick='stay_hide()' style="margin-top:12px; margin-right:10px;">Cancel</button>
						 <?php echo form_close(); ?>
					</div>	
								
				</div>	
					 
				<div class="col-xs-12 gnrl">					
									
									
									<!--stay details again end-->
									
					
					
					 <h3>Genarel Information</h3><i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='gnrl_info()'></i>
					 
					        <div id="genarel_information">
								<div class="col-xs-12" style="margin-top:10px;">
									
									<ul class="list-unstyled">
										<li>
											<b>Nature Of Visit:</b> <label style="margin-left:20px;"><?php if(isset($bookingDetails->nature_visit)){echo $bookingDetails->nature_visit ;}?></label>
										</li>
										<li>
											<b>Booking Source:</b> <label style="margin-left:17px;"><?php if(isset($bookingDetails->booking_source)){echo $bookingDetails->booking_source ;}?></label>
										</li> 
										<li>
											 <b>Booking Note:</b> <label style="margin-left:30px;"><?php if(isset($bookingDetails->comment)){echo $bookingDetails->comment ;}?></label>
										</li>
										<?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source == 'Broker'){
												$broker = $this->dashboard_model->get_brokerNameByID($bookingDetails->broker_id);
										?>
										<li>
											 <b>Broker Name:</b> <label style="margin-left:30px;"><?php echo $broker->b_name ;?></label>
										</li>
										<li>
											<b>% Commision:</b> <label style="margin-left:29px;"><?php echo $broker->broker_commission ; ?></label>
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

													<option value="Travel & Leisure" <?php if(isset($bookingDetails->nature_visit) && $bookingDetails->nature_visit=='Travel & Leisure'){ echo 'selected="selected"';}?>>Travel &amp; Leisure</option>
													<option value="Business" <?php if(isset($bookingDetails->nature_visit) && $bookingDetails->nature_visit=='Business'){ echo 'selected="selected"';}?>>Business</option>
												</select>
											</li> 
											<li>
												 <select  class="">
													<option value="" disabled="" selected="">Select Source</option>
													<option value="Frontdesk" <?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source=='Frontdesk'){ echo 'selected="selected"';}?>>Frontdesk</option>
													<option value="Online" <?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source=='Online Website'){ echo 'selected="selected"';}?>>Online Website</option>
													<option value="Telephonic" <?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source=='Telephonic'){ echo 'selected="selected"';}?>>Telephonic</option>
													<option value="Broker" <?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source=='Broker'){ echo 'selected="selected"';}?>>Broker</option>
													<option value="Broker" <?php if(isset($bookingDetails->booking_source) && $bookingDetails->booking_source=='Booking Channel'){ echo 'selected="selected"';}?>>Booking Channel</option>
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
								<br><br> <div class="clearfix"></div>
								<button class="btn green pull-right" style="margin-top:15px;">Save</button>	
				             <button class="btn blue pull-right" onClick='gnrl_info_hide()' style="margin-top:15px;margin-right:10px;">Cancel</button>
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
								<?php 
								if(isset($bookingDetails->rent_mode_type)){
								if($bookingDetails->rent_mode_type == 'add'){ 
								    $val = $bookingDetails->base_room_rent-$bookingDetails->mod_room_rent;
								} else {
									$val = $bookingDetails->base_room_rent+$bookingDetails->mod_room_rent;
								}	
								echo $val;} else { echo "N/A"; }?> / Day</label> 
							</li> 
							<li>
								 <b>Room Rent Modifier:</b><label style="margin-left:30px;"><?php if(isset($bookingDetails->mod_room_rent)){echo $bookingDetails->mod_room_rent;}?> <?php if(isset($bookingDetails->rent_mode_type)){if($bookingDetails->rent_mode_type == 'add'){ echo '(Premium)'; }else { echo '(Discount)'; }} else {echo "N/A";}?></label> 
							</li>
							<li>
								<b>Room Rent Amount:</b><label style="margin-left:17px;"><?php if(isset($bookingDetails->base_room_rent)){echo $bookingDetails->base_room_rent;?> / Day<?php } else {echo "N/A";}?></label> 
							</li>
							<li>
								<b>Number Of Days:</b><label style="margin-left:17px;"><?php if(isset($bookingDetails->stay_days)){echo $bookingDetails->stay_days;}?></label> 
							</li>
							<li>
								<b>Total Room Rent:</b> <label style="margin-left:3px;"><?php if(isset($bookingDetails->base_room_rent)){echo $bookingDetails->base_room_rent*$bookingDetails->stay_days;}?></label>
							</li>							
							<li>
								 <b>Tax Type:</b> <label style="margin-left:30px;"></label>
							</li>
							<li>
								<b>Tax Ammount:</b><label style="margin-left:29px;"><?php if(isset($bookingDetails->room_rent_tax_amount)){echo $bookingDetails->room_rent_tax_amount;}?></label>
							</li>
							<li>
								<b>Total Room Rent(Incl Tax):</b> <label style="margin-left:3px;"><?php if(isset($bookingDetails->room_rent_sum_total)){echo $bookingDetails->room_rent_sum_total;}?></label>
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
                <?php
                $form1 = array(
                    'class' 			=> 'form-body',
                    'id'				=> 'form1',
                    'method'			=> 'post',
					'name'			=> 'frm1'
                );
                echo form_open('dashboard/add_pay_info',$form1);
                ?>			
				<div class="col-xs-3" style="margin-top:10px;">
				<input type="hidden" name="booking_id" value="<?php echo $_GET['b_id'];?>">
				<?php
				if(isset($bookingDetails->base_room_rent) && isset($bookingDetails->stay_days)){
				$trr= $bookingDetails->base_room_rent*$bookingDetails->stay_days;
				$tax = $bookingDetails->room_rent_tax_amount;
				$tax_percent = ($tax/$trr)*100;
				} else{
				$tax_percent=0;
				$val= 0;	
				}
				?>
				<input type="hidden" name="tax_percent" value="<?php echo $tax_percent;?>">	
				<input type="hidden" name="actual_room_rent" value="<?php echo $val;?>">
				<input type="hidden" name="stay_days" value="<?php if(isset($bookingDetails->stay_days)){echo $bookingDetails->stay_days;}?>">				
						<ul class="list-unstyled">

							<li>
								<b>Room Rent Modifier Type:</b> 
							</li> 
							<li>
								 <b>Room Rent Modifier Ammount:</b> 
							</li>
				
						</ul>
				</div>
						
					<div class="col-xs-8">
						<div class="dwn-two">
							<ul class="style-one" >

								<li>
									<select class="" name="modifier_type">
                                <option value="" disabled="" selected="">--tax Type--</option>
                                <option value="add">Premium</option>
                                <option value="substract">Discount</option>
                            </select>
								</li>
								<li>
									<input type="text" class="" name="modifier_amount"> 
								</li>


							</ul>
						</div>	
					</div><div class="clearfix"></div>
					<button class="btn green pull-right" style="margin-top:15px;" type="submit">Save</button>	
				 <button class="btn blue pull-right" onClick='payment_info_hide()' style="margin-top:15px; margin-right:10px;" type="button">Cancel</button>	
				<?php echo form_close(); ?>		
			</div>	


					
					<!--end payment informatin again-->	
						
					
					
								
						
						<br><br>
						
					</div>
					
					<br><br>
	

	
				<div class="col-xs-12 extra">
				<h3>All Feedbacks</h3><a href="<?php echo base_url() ?>dashboard/add_feedback?bID=<?php echo $_GET['b_id'];?>"><button class="btn blue pull-right" style="margin-top:15px;margin-right:10px;">Add Feadback</button></a>
					 <div id="extra" >	 
					<table class="table table-striped table-hover" >
						<thead>

						<tr>
							<th>
								Guest Name
							</th>
							<th>
								Overall Quality
							</th>
							<th>
								Come back <br>again
							</th>
							<th>
								Refer Friend
							</th>
							<th>
								Resonable Price
							</th>
							<th>
								Comment
							</th>							
							
						</tr>
						</thead>
						<tbody>
						
						<?php 
						if(!empty($feedback)){
						foreach($feedback as $feed){
						?>
						<tr>
							<td>
							<label><?php echo $feed->guest_name;?></label>
							</td>
							<td>
								<label><?php $ease = ceil($feed->tot/12);
										for ($x = 1; $x <= 5; $x++) {
											if($x <= $ease){
												echo '<i class="fa fa-star"style="color:red;"></i>';
											} else {
												echo '<i class="fa fa-star"style="color:black;"></i>';
											}
										}
									?></label>
							</td>
							<td class="hidden-480">
							<label><?php $ease = $feed->come_back;
										
											if($ease == '2'){
												echo 'Maybe';
											} else if($ease == '1'){
												echo 'Yes';
											} else {
												echo 'No';
											}
										
									?>  </label>
							</td>
							<td>
							<label><?php $ease = $feed->refer_friend;
										
											if($ease == '2'){
												echo 'Maybe';
											} else if($ease == '1'){
												echo 'Yes';
											} else {
												echo 'No';
											}
										
									?>  </label>
							</td>
							<td>
								<label><?php $ease = $feed->reasonable_cost;
										
											if($ease == '2'){
												echo 'Maybe';
											} else if($ease == '1'){
												echo 'Yes';
											} else {
												echo 'No';
											}
										
									?> </label>
							</td>
							<td class="hidden-480">
							<label><?php echo $feed->comment;?></label>
							</td>							
							

						</tr>
						<?php } } else {?>
						<tr>
							<td colspan="6">
							<label>No Feedback Available</label>
							</td>							
							

						</tr>
						<?php } ?>
						</tbody>
						</table>
					    
				</div>
				
					
						
						<br><br>
						
				</div>


				
				<div class="col-xs-12 extra">
					 <h3>Extra service Added:</h3>

					 <!--<i class="fa fa-pencil-square-o pull-right" style="color:gray;margin-top:-22px;font-size:20px;cursor:pointer;" onClick='extra_info()'></i>-->
				<div id="extra" style="display:block;">
					<table class="table table-striped table-hover" >
						<thead>

						<tr>
							<th>
								Extra Service Name
							</th>
							<th>
								Extra Service Ammount
							</th>
							<th>
								Extra Service Tax (%)
							</th>
							
							
						</tr>
						</thead>
						<tbody>

                        <?php
                        $bookings=$this->dashboard_model->get_booking_details($_GET['b_id']);

                            if(isset($bookings->service_id) && $bookings->service_id !='0') {
                                $service_id_array=explode(",",$bookings->service_id);

                               for($i=1;$i<sizeof($service_id_array);$i++) {

                                   $service_details=$this->dashboard_model->get_service_details($service_id_array[$i]);

                                   ?>
                                   <tr>
                                       <td>
                                           <label><?php echo $service_details->s_name ?></label>
                                       </td>
                                       <td>
                                           <label><?php echo $service_details->s_price ?></label>
                                       </td>
                                       <td class="hidden-480">
                                           <label><?php echo $service_details->s_tax ?></label>
                                       </td>


                                   </tr>

                               <?php
                               }}else{?>
                                <h4 style="color:red;margin-top:20px;">Not Availabe</h4>
                        <?php

                            }
                      ?>

						</tbody>
						</table>
					    
				</div>
				        <!--extra agn-->
						
				<div id="extra_again" style="display:block;">
                    <h3>Available Services:</h3>
					<table class="table table-striped table-hover" id="extra_service">
						<thead>


						<tr>
							<th>
								Extra Service Name
							</th>
							<th>
								Extra Service Amount
							</th>
							<th>
								Extra Service Tax (%)
							</th>
							
							
						</tr>
						</thead>
						<tbody>
                        <?php
                        $services=$this->dashboard_model->all_services();
                        if(isset($services) && $services){
                            foreach($services as $service){
                                $match=   $this->dashboard_model->service_booking_match( $_GET['b_id'],$service->s_rules);
                                if(isset($match)&& $match){

                                    ?>
                                    <tr>
                                        <td>
                                            <input id="s_id" type="hidden" value="<?php echo  $service->s_id; ?>">
                                            <input id="s_name" type="text" value="<?php echo  $service->s_name; ?>">
                                        </td>
                                        <td>
                                            <input id="s_price" type="text" value="<?php echo  $service->s_price; ?>">
                                        </td>
                                        <td class="hidden-480">
                                            <input id="s_tax" type="text" value="<?php echo  $service->s_tax; ?>">
                                        </td>

                                        <td><button class="btn green pull-right" onclick="add_service('<?php echo $service->s_id; ?>','<?php echo $service->s_price; ?>','<?php echo $service->s_tax; ?>')" >Add Service</button><br></td>

                                    </tr>

                            <?php
                                }

                            }
                        }
                        ?>
						



						</tbody>
						</table>

                   <!-- <button class="btn BLUE pull-right" onclick="add_row_again()" >Add Ano</button><br><br>-->
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
								Package  Name
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
										<b>Total Package Amount:</b>
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
					</div>
						
						<br><br>-->
						
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
											<label><i class="fa fa-inr"></i><?php
                                                if( isset($bookingDetails->room_rent_sum_total) && $bookingDetails->room_rent_sum_total !=0) {
                                                    $total=$bookingDetails->room_rent_sum_total;
                                                    echo $bookingDetails->room_rent_sum_total;
                                                }
                                                else{ 
												     if(isset($bookingDetails->room_rent_total_amount)){
                                                    $total=$bookingDetails->room_rent_total_amount;
                                                    echo $bookingDetails->room_rent_total_amount;
													 }
                                                }

                                                if(isset($amountPaid) && $amountPaid) {
                                                    $paid=$amountPaid->tm;
                                                }
                                                else{
                                                    $paid=0;
                                                }?></label>
										</li> 
										<li>
											<label><i class="fa fa-inr"></i><?php echo $paid;?></label>
										</li>
										<li>
											<label><i class="fa fa-inr"></i>
											<?php 
											if(isset($total)) {
											$pa = $total - $paid;
												  echo $pa;
											} else {
												echo '0';
											}	  
											?>
											</label>
										</li>

									</ul>
								</div>	
							</div>
							   <?php
							   if(isset($total)) {
							    $totalAmount = $total;
                                if(isset($amountPaid) && $amountPaid) {
                                    $amountPaid = $amountPaid->tm;
                                    $percentPaid = (($amountPaid / $total) * 100);
                                    $percentPending = (($pa / $total) * 100);
                                }
                                else{
                                   $percentPaid = 0;
                                   $percentPending = 100;
                                }
							   } else {
								   $percentPaid = 0;
								   $percentPending = 0; 
							   }
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
        function add_service(id,price,tax){
           /* var id=  $("#s_id").val();
            var price=  $("#s_price").val();
            var tax=  $("#s_tax").val();*/
            var id= id;
            var price= price;
            var tax=  tax;
            var booking_id=  <?php echo $_GET['b_id'] ?>;

            jQuery.ajax(
                {
                    type: "POST",
                    url: "<?php echo base_url(); ?>dashboard/add_service_to_booking",
                    dataType: 'json',
                    data: {booking_id:booking_id,service_id:id,service_price:price,service_tax:tax },
                    success: function(data){
                        alert(data.return);
                        location.reload();
                    }
                });

        }
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