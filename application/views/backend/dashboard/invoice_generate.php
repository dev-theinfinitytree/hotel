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
						<!--<img src="<?php //echo base_url();?>assets/dashboard/assets/admin/layout/img/logo-hotel.png" alt="logo" class="logo-default" 
                        style="width: 82%;margin-top: 0px; margin-left: -63px;"/>-->
					<?php //echo "<pre>"; print_r($hotel_name->hotel_logo_images);?>
                    <img src="<?php echo base_url();?>upload/hotel/<?php echo $hotel_name->hotel_logo_images;?>" alt="logo" class="logo-default" 
                        style="width: 82%;margin-top: 0px; margin-left: -63px;"/>
					
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
							 <?php echo "INVC","$randomstring",date("d M Y") ?>
						</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<?php foreach($booking_details as $row){ ?>
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
					
					<?php
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
						<?php } ?>
					</div>
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
						<table class="table table-striped table-hover">
						<thead>

						<tr>
							<th>
								 #
							</th>
							<th>
								 Transaction Id
							</th>
							<!--<th class="hidden-480">
								 Amount
							</th>-->
							<th class="hidden-480">
								 Payment Mode
							</th>
							<th class="hidden-480">
								 Bank name
							</th>
							<th>
								 Amount
							</th>
						</tr>
						</thead>
						<tbody>
						<?php $i = 1; $sum =0;foreach($transaction_details as $row1){  ?>

						<tr>
							<td>
								 <?php echo $i; ?>
							</td>
							<td>
								 <?php echo "HM00TA00",$row1->t_id; ?>
							</td>
							<td class="hidden-480">
								 <?php echo $row1->t_payment_mode; ?>
							</td>
							<td class="hidden-480">
								 <?php echo $row1->t_bank_name ;?>
							</td>
							<td class="hidden-480">
								 <?php echo $row1->t_amount ;?>
							</td>
							<!--<td>
								 $2152
							</td>-->
						</tr>
						<?php $i++; $sum=$sum + $row1->t_amount; } ?>

						</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<div class="well">
							<address>
							<strong><?php echo  $hotel_name->hotel_name; ?></strong><br/>
							<?php echo  $hotel_contact['hotel_street1']; ?><br/>
							<?php echo  $hotel_contact['hotel_district']; ?>, <?php echo  $hotel_contact['hotel_state']; ?> , <?php echo  $hotel_contact['hotel_pincode']; ?><br/>
							<abbr title="Phone">Phone:</abbr> <?php echo  $hotel_contact['hotel_frontdesk_mobile']; ?><br/> 
							<abbr title="Phone">Mail:</abbr> <?php echo  $hotel_contact['hotel_frontdesk_email']; ?></address>
						</div>
						<!--<div class="well">
							<address>
							<strong>Doc Hotel Blue</strong><br/>
							795 Park Ave, Suite 120<br/>
							San Francisco, CA 94107<br/>
							<abbr title="Phone">P:</abbr> (234) 145-1810 </address>
							<address>
							<strong>Doc Admin</strong><br/>
							<a href="mailto:#">
							docadmin@email.com </a>
							</address>
						</div>-->
					</div>
					<div class="col-xs-8 invoice-block">
						<ul class="list-unstyled amounts">
							<li>
								<strong>Total amount:</strong> <?php echo $sum; ?>
							</li>
							<!--<li>
								<strong>Tax:</strong> 10%
							</li>
							<!--<li>
								<strong>VAT:</strong> -----
							</li>
							<li>
								<strong>Grand Total:</strong> <?php echo ($sum+($sum * .1)) ?>
							</li>-->
						</ul>
						<br/>
						<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
						Print <i class="fa fa-print"></i>
						</a>
						<!--<a class="btn btn-lg green hidden-print margin-bottom-5">
						Submit Your Invoice <i class="fa fa-check"></i>
						</a>-->
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