<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
.invoice .invoice-logo-space {
    margin-bottom: 4px;
}
</style>
<div class="invoice" style="width:90%; margin: 0 auto; margin-top:20px;">
				<div class="row invoice-logo">
					<div class="col-xs-6 invoice-logo-space">
						
    					</div>
                        <div class="clear-fix"></div>
                        <?php 
                        	$chars = '0123456789';$r='';
                        	for($i=0;$i<7;$i++)
                        	{
                        		$r.=$chars[rand(0,strlen($chars)-1)];
                        	}
                        		$randomstring = $r."/"."  ";

                         ?>
					<div class="col-xs-6">
						<p>
							 <?php echo "All_Report",date("d M Y") ?>
						</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<?php //foreach($value as $row){ ?>
					
					<?php // } ?>
					
					<?php
					//foreach($value as $row3){ 
							
					 //} ?>
					
					<div class="col-xs-4 ">
						<!--<h3>About:</h3>
						<ul class="list-unstyled">
							<li>
								 Drem psum dolor sit amet
							</li>
							<li>
								 Laoreet dolore magna
							</li>
							<li>
								 Consectetuer adipiscing elit
							</li>
							<li>
								 Magna aliquam tincidunt erat volutpat
							</li>
							<li>
								 Olor sit amet adipiscing eli
							</li>
							<li>
								 Laoreet dolore magna
							</li>
						</ul>-->
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-hover table-bordered table-scrollable" border="1px">
						<thead>

						<tr>
							<th>
								 Sl.no
							</th>
							<th>
								 Booking Id
							</th>
							<!--<th class="hidden-480">
								 Amount
							</th>-->
							<th class="hidden-480">
								 Name
							</th>
							<th class="hidden-480">
								 Room Number
							</th>
							<th>
								 From and Upto Date
							</th>
                            <th>
                            	Address
                            </th>
                            <th>
                            	Contact Number
                            </th>
                            <th>
                            	Total Amount
                            </th>
                            <th>
                            	Amount Due
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

                                    //$status=$booking->cust_booking_status;

                                    /*if($status==0){

                                        $status_data="Booked";
                                    }
                                    else if($status==1){

                                        $status_data="Confirmed";
                                    }

                                    else if($status==2){

                                        $status_data="Checked In";
                                    }
                                    else if($status==3){

                                        $status_data="Checked Out";
                                    }

                                    /*Calculation End */


                                    $class = ($i%2==0) ? "active" : "success";

                                    $booking_id='HM0'.$this->session->userdata('user_hotel').'00'.$booking->booking_id;
                                    ?>

                                    <tr>
                                       	<td><?php echo $i;?></td>
                                        <td><?php echo $booking_id?></td>
                                        <td><?php echo $booking->cust_name;?></td>
                                        <td><?php echo $room_number; ?></td>
                                        <td><?php $date_s =  date_create ($booking->cust_from_date);
										
										echo date_format($date_s,"d.M.Y")." (". substr ($booking->checkin_time,0,5).")";
										
										?> <br /> <?php $date_e = date_create ($booking->cust_end_date);
										
										echo date_format($date_e,"d.M.Y")." (". substr ($booking->checkout_time,0,5).")";
										?></td>
                                        <td><?php echo $booking->cust_address;?></td>
                                        <td><?php echo $booking->cust_contact_no;?></td>
                                        <td><?php echo $total_cost; ?></td>
                                        <td><?php echo max($due,0); ?></td>

                                        
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
				<div class="row">
					<div class="col-xs-4">
						
					</div>
					
				</div>
			</div>
  <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
});
</script>          