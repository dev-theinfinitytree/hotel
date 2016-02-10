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
<table width="100%">
<tr><td><table width="222"><tr><td style="text-align:center"><img src="upload/hotel/<?php echo $hotel_name->hotel_logo_images;?>" alt="logo" class="logo-default" 
                        style="width: 82%;margin-top: 0px; margin-left: -63px;"/></td></tr></table>
						</td>
	                        <?php 
                        	$chars = '0123456789';$r='';
                        	for($i=0;$i<7;$i++)
                        	{
                        		$r.=$chars[rand(0,strlen($chars)-1)];
                        	}
                        		$randomstring = $r."/"."  ";

                         ?>					
	<td width="50%" style="text-align:right"><?php echo "INVC","$randomstring",date("d M Y") ?></td>
</tr>
<tr>
   <td>					<?php foreach($booking_details as $row){ ?>
					<div class="col-xs-4">
						<h3>Guest:</h3>
						<ul class="list-unstyled">
							<li>
								<b>Name:</b> <?php echo $row->cust_name ?>
							</li>
							<li>
								<b>Mobile no:</b> <?php echo $row->cust_contact_no ?>
							</li>
							<li>
								 <b>Address:</b> <?php echo $row->cust_address ?>
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
					<?php } ?>
						</td>
					
	<td>					<?php
					foreach($total_payment as $row3){ 
							 $total_amount = $row3->t_amount;
					 } ?>
					<div class="col-xs-4 invoice-payment">
						<h3>Payment Details:</h3>
						<ul class="list-unstyled">
							<?php foreach($payment_details as $row2){ ?>
							<li>
								<strong>Room No:</strong><?php echo $row2->room_no ?> <!--542554(DEMO)78-->
							</li>
							<li>
								<strong>CheckIn Date:</strong> <?php echo date('d M , Y',strtotime($row2->cust_from_date)); ?> at <?php echo date('h : i A',strtotime($row2->confirmed_checkin_time));?>
							</li>
							<li>
								<strong>Checkout Date:</strong> <?php echo date('d M , Y',strtotime($row2->cust_end_date)); ?> at <?php echo date('h : i A',strtotime($row2->confirmed_checkout_time));?>
							</li>
							<li>
								<strong>Room Rent Amount:</strong> 
								<?php echo $row2->room_rent_total_amount;?>
							</li>
							<li>
								
								<?php 
									$grand_total=$row2->room_rent_sum_total;
									$roomRent = $row2->room_rent_total_amount;
									if($grand_total==0){
										$tax = '0';
										$taxPercent = 'N/A';
									} else {
										$taxAmount = $row2->room_rent_tax_amount;
										if($taxAmount == '0'){
											$tax = '0';
											$taxPercent = 'N/A';											
										} else {
											$tax = $taxAmount;
											$taxPercent = (($taxAmount/$roomRent)*100).'%';
										}
									}
									
								?>
								<strong>Tax Amount (<?php echo $taxPercent;?>):</strong>
									<?php echo $tax;?>
							</li>							
							<li>
								<strong>Total Payment Amount:</strong> 
								<?php 
									$grand_total=$row2->room_rent_sum_total;
								if($grand_total==0){
									$grand_total=$row2->room_rent_total_amount;
								}
									
									echo $grand_total;
									?> <!--542554(DEMO)78-->
							</li>
							<li>
								<strong>Pending Amount:</strong> <!--FoodMaster Ltd--><?php echo $pending_amount = $grand_total - $total_amount; ?>
							</li>
							<li>
								<strong>Payment Status:</strong> <!--45454DEMO545DEMO-->
								<?php
									if($pending_amount == 0 || $pending_amount < 0)
									{
										echo "Complete";
									}
									else
									{
										echo "Incomplete";
									}
								?>
							</li>
						</ul>
						<?php } ?></td></tr><tr>
<td colspan="2" width="100%">						<table width="100%">
						<thead>

						<tr>
							<th width="20%">
								 #
							</th>
							<th width="20%">
								 Transaction Id
							</th>
							<!--<th class="hidden-480">
								 Amount
							</th>-->
							<th width="20%">
								 Payment Mode
							</th>
							<th width="20%">
								 Bank name
							</th>
							<th width="20%">
								 Amount
							</th>
						</tr>
						</thead>
						<tbody>
						<?php $i = 1; $sum =0;foreach($transaction_details as $row1){  ?>

						<tr>
							<td width="20%" style="text-align:center">
								 <?php echo $i; ?>
							</td>
							<td width="20%" style="text-align:center">
								 <?php echo "HM00TA00",$row1->t_id; ?>
							</td>
							<td width="20%" style="text-align:center">
								 <?php echo $row1->t_payment_mode; ?>
							</td>
							<td width="20%" style="text-align:center">
								 <?php echo $row1->t_bank_name ;?>
							</td>
							<td width="20%" style="text-align:center">
								 <?php echo $row1->t_amount ;?>
							</td>
							<!--<td>
								 $2152
							</td>-->
						</tr>
						<?php $i++; $sum=$sum + $row1->t_amount; } ?>
						<tr>
							<td colspan="4" style="text-align:right" width="80%">
								 Total amount: 
							</td>
							<td width="20%" style="text-align:center">
								 <?php echo $sum; ?>
							</td>
							<!--<td>
								 $2152
							</td>-->
						</tr>
						</tbody>
						</table></td>						
</tr>
<tr><td colspan="2">						<div class="well">
							<address>
							<strong><?php echo  $hotel_name->hotel_name; ?></strong><br/>
							<?php echo  $hotel_contact['hotel_street1']; ?><br/>
							<?php echo  $hotel_contact['hotel_district']; ?>, <?php echo  $hotel_contact['hotel_state']; ?> , <?php echo  $hotel_contact['hotel_pincode']; ?><br/>
							<abbr title="Phone">Phone:</abbr> <?php echo  $hotel_contact['hotel_frontdesk_mobile']; ?><br/> 
							<abbr title="Phone">Mail:</abbr> <?php echo  $hotel_contact['hotel_frontdesk_email']; ?></address>
						</div></td></tr>
</table>


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