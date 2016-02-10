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
.all_bk .table>tbody>tr>td {
    vertical-align: middle !important;
    text-align: center;
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




    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->




        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>List of All Bookings
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
                                 <a href="<?php echo base_url();?>dashboard/add_booking_calendar"><button class="btn green">
                                    Add New <i class="fa fa-plus"></i>
                                </button></a>
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
                            <th>
                                Select
                            </th>
                            <th>
                                Booking Id
                            </th>
                            <th>
                                Customer Name
                            </th>
                            <th>
                                Room Number
                            </th>
                            <th>
                                From and Upto Date
                            </th>
                            <th>
                                Customer Address
                            </th>
                            <th>
                                Customer Contact Number
                            </th>
                            <th>
                                Amount to be paid
                            </th>
                            <th>
                                Booking Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($bookings) && $bookings):
                            $i=1;
                            $deposit=0;
                            foreach($bookings as $booking):


                                $rooms=$this->dashboard_model->get_room_number($booking->room_id);
                                foreach($rooms as $room):



                                    if($room->hotel_id==$this->session->userdata('user_hotel')):


                                        foreach($transactions as $transaction):

                                            if($transaction->t_booking_id=='HM0'.$this->session->userdata('user_hotel').'00'.$booking->booking_id):

                                                $deposit=$deposit+$transaction->t_amount;
                                            endif;
                                        endforeach;



                                        /*Calculation start */
                                        $room_number=$room->room_no;
                                        $room_cost=$room->room_rent;
                                        /* Find Duration */
                                        $date1=date_create($booking->cust_from_date);
                                        $date2=date_create($booking->cust_end_date);
                                        $diff=date_diff($date1, $date2);
                                        $cust_duration= $diff->format("%a");

                                        /*Cost Calculations*/
                                        $total_cost=$cust_duration*$room_cost;
                                        $total_cost=$total_cost+$total_cost*0.15;
                                        $due=$total_cost-$booking->cust_payment_initial-$deposit;

                                        $status=$booking->booking_status_id;

                                        if($status==4){

                                            $status_data="Confirmed";
                                        }
                                        else if($status==1){

                                            $status_data="Confirmed";
                                        }

                                        else if($status==2){

                                            $status_data="Advance";
                                        }
                                        else if($status==3){

                                            $status_data="Pending";
                                        }
										else if($status==5){

                                            $status_data="Checked-In";
                                        }
										else if($status==6){

                                            $status_data="Checked-Out";
                                        }
										else if($status==8){

                                            $status_data="Incomplete";
                                        }
                                        /*Calculation End */


                                        $class = ($i%2==0) ? "active" : "success";

                                        $booking_id='HM0'.$this->session->userdata('user_hotel').'00'.$booking->booking_id;
                                        ?>

                                        <tr>
                                            <td><input type="checkbox" name="delete[]" value="<?php echo $booking->booking_id;?>" class="form-control" onclick="this.form.submit();"/></td>
                                            <td><a href="<?php echo base_url();?>dashboard/booking_edit?b_id=<?php echo $booking->booking_id ?>"><?php echo $booking_id?></a></td>
                                            <td><?php echo $booking->cust_name;?></td>
                                            <td><?php echo $room_number; ?></td>
                                            <td><?php echo $booking->cust_from_date;?> - <?php echo $booking->cust_end_date;?></td>
                                            <td><?php echo $booking->cust_address;?></td>
                                            <td><?php echo $booking->cust_contact_no;?></td>
                                            <td><?php echo max($due,0); ?></td>
                                            <td><?php echo $status_data; ?></td>
                                            <td>
                                                <!--<button class="btn btn-danger pull-right" data-toggle="confirmation" data-singleton="true">Delete</button>-->
                                                <button data-toggle="modal" href="#large" class="btn blue pull-right" >Edit</button>
                                            </td>
                                        </tr>
                                        <?php $i++;?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endif;?>

                        </tbody>
                    </table>
                
            </div>


        </div>
		
		<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Modal Title</h4>
										</div>
										<div class="modal-body">
	    <div class="invoice" style="width:90%; margin: 0 auto; margin-top:0px;">
				
				
				<div class="row">
					
					<div class="col-xs-6">
						<h3>Guest:</h3>
						<ul class="list-unstyled">
							<li>
								<b>Guest Id:</b> 
							</li>
							<li>
								<b>Guest Name:</b> 
							</li> 
							<li>
								 <b>Phone Number:</b> 
							</li>
							<li>
								 <b>Guest Address:</b> 
							</li>
							<!--<li>
								 Madrid
							</li>
							<li>
								 Spain
							</li>
							<li>
								 1982 OOP
							</li>-->
						</ul>
					</div>
					
				
					<div class="col-xs-6 invoice-payment">
						
						<div class="pic" style="width:100px;height:100px;border:1px solid gray;float: right;margin-top: 29px;">
						<img src="#" width="100%">
					    </div><br><div class="clearfix"></div>
					<h4 style="float:right;"><b>Room No:</b><labe>102</labe>&nbsp;&nbsp;&nbsp;<span>(Annapurna Hotel)</span></h4>
				   </div><br><br>
				   
				   
				<div class="row">
					<div class="col-xs-12">
					<h3>Guest Details</h3>
						<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 Id
							</th>
							<th>
								 Name
							</th>
							<!--<th class="hidden-480">
								 Amount
							</th>-->
							<th>
								Check In Date
							</th>
							<th>
								 Check In Out
							</th>
							<th>
								Night
							</th>
							<th>
								Type
							</th>
							<th>
								Charge
							</th>
							<th>
								Action
							</th>
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							dd	
							</td>
							<td>
								dd 
							</td>
							<td class="hidden-480">
							dd	 
							</td>
							<td class="hidden-480">
								dd
							</td>
							<td class="hidden-480">
							dd	 
							</td>
							<td class="hidden-480">
								dd 
							</td>
							<td class="hidden-480">
								dd 
							</td>
							<td class="hidden-480">
							dd	 
							</td>
							<!--<td>
								 $2152
							</td>-->
						</tr>

						<!--<tr>
							<td>
								 2
							</td>
							<td>
								 Furniture
							</td>
							<td class="hidden-480">
								 Office furniture purchase
							</td>
							<td class="hidden-480">
								 15
							</td>
							<td class="hidden-480">
								 $169
							</td>
							<td>
								 $4169
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Foods
							</td>
							<td class="hidden-480">
								 Company Anual Dinner Catering
							</td>
							<td class="hidden-480">
								 69
							</td>
							<td class="hidden-480">
								 $49
							</td>
							<td>
								 $1260
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Software
							</td>
							<td class="hidden-480">
								 Payment for Jan 2013
							</td>
							<td class="hidden-480">
								 149
							</td>
							<td class="hidden-480">
								 $12
							</td>
							<td>
								 $866
							</td>
						</tr>-->
						</tbody>
						</table>
						<button class="btn green pull-right ">Add More Guests</button>
						<br><br>
						<h3>preference</h3><br>
						<textarea class="form-control" rows="3" name="comment"></textarea>
					</div>
				</div>
				
			</div><br><br>
			
			
			<div class="row">
					<div class="col-xs-12">
					<h3>Stay Details</h3>
					<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 Check In Date
							</th>
							<th>
								 Check In Time
							</th>
							<!--<th class="hidden-480">
								 Amount
							</th>-->
							<th>
								Arrival Mode
							</th>
							<th>
								Coming From
							</th>
							<!--<th>
								Night
							</th>
							<th>
								Type
							</th>
							<th>
								Charge
							</th>
							<th>
								Action
							</th>-->
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							dd	
							</td>
							<td>
								dd 
							</td>
							<td class="hidden-480">
							dd	 
							</td>
							<td class="hidden-480">
								dd
							</td>
							
							<!--<td>
								 $2152
							</td>-->
						</tr>

						<!--<tr>
							<td>
								 2
							</td>
							<td>
								 Furniture
							</td>
							<td class="hidden-480">
								 Office furniture purchase
							</td>
							<td class="hidden-480">
								 15
							</td>
							<td class="hidden-480">
								 $169
							</td>
							<td>
								 $4169
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Foods
							</td>
							<td class="hidden-480">
								 Company Anual Dinner Catering
							</td>
							<td class="hidden-480">
								 69
							</td>
							<td class="hidden-480">
								 $49
							</td>
							<td>
								 $1260
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Software
							</td>
							<td class="hidden-480">
								 Payment for Jan 2013
							</td>
							<td class="hidden-480">
								 149
							</td>
							<td class="hidden-480">
								 $12
							</td>
							<td>
								 $866
							</td>
						</tr>-->
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
							<!--<th class="hidden-480">
								 Amount
							</th>-->
							<th>
								Departure Mode
							</th>
							<th>
								Next Destination
							</th>
							<!--<th>
								Night
							</th>
							<th>
								Type
							</th>
							<th>
								Charge
							</th>
							<th>
								Action
							</th>-->
						</tr>
						</thead>
						<tbody>
						

						<tr>
							<td>
							dd	
							</td>
							<td>
								dd 
							</td>
							<td class="hidden-480">
							dd	 
							</td>
							<td class="hidden-480">
								dd
							</td>
							
							<!--<td>
								 $2152
							</td>-->
						</tr>

						<!--<tr>
							<td>
								 2
							</td>
							<td>
								 Furniture
							</td>
							<td class="hidden-480">
								 Office furniture purchase
							</td>
							<td class="hidden-480">
								 15
							</td>
							<td class="hidden-480">
								 $169
							</td>
							<td>
								 $4169
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Foods
							</td>
							<td class="hidden-480">
								 Company Anual Dinner Catering
							</td>
							<td class="hidden-480">
								 69
							</td>
							<td class="hidden-480">
								 $49
							</td>
							<td>
								 $1260
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Software
							</td>
							<td class="hidden-480">
								 Payment for Jan 2013
							</td>
							<td class="hidden-480">
								 149
							</td>
							<td class="hidden-480">
								 $12
							</td>
							<td>
								 $866
							</td>
						</tr>-->
						</tbody>
						</table>
						
						
						
						
						
						
						<br><br>
						
					</div>
				</div>
	</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button" class="btn blue">Save changes</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
		

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
