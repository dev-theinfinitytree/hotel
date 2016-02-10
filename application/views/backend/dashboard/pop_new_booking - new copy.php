<?php 
foreach ($rooms as $room) {
    $room_no = $room->room_no;   
	$room_rent = $room->room_rent;
}
$start_dt = date("d-m-Y", strtotime($start));
$end_dt = date("d-m-Y", strtotime($end));
$start_time = date("H:i:s", strtotime($start));
$end_time = date("H:i:s", strtotime($end));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link href="<?php echo base_url();?>assets/dashboard/bookingpopup/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/dashboard/bookingpopup/src/bootstrap-wizard.css" rel="stylesheet" />
	
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

 <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>





<style>
.slimScrollBar{
	background:none !important;
}
h1{

	font-size: 24px;
    color: #45B6AF;
	margin-top: 18px;
    margin-left: 14px;
    font-weight: 500;
}
.long {
    
   background-color: #F5F5F5;
    width: 32%; 
    padding: 0;
    margin-left: -20px;
    margin-top: -20px;
	float:left;
	min-height:380px;
}
.frm {
    width: 68%;
    float: right; 
	    margin-top: 30px;
}
.frm2{
	 width: 68%;
    float: right; 
}
.frm3{
	 width: 68%;
    float: right; 
}
.frm4{
	 width: 68%;
    float: right; 
}
.modal-body {
    position: relative;
    padding: 20px;
    float: left;
    width: 100%;
	padding-bottom: 0px !important;
}
.clear{
	clear:both;
}
.modal-footer {
    padding: 0px ;
    width: 50%;
    float: right;
  margin-top: 0px;
    text-align: right;
    border-top: 0px solid #e5e5e5; 
}
.modal-content {
    position: absolute;
    width: 100%;
    background-color: #fff;
    border: 0px solid #999;
    border: 0px solid rgba(0,0,0,0.2);
    border-radius: 0px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,0.5);
    box-shadow: 0 3px 9px rgba(0,0,0,0.5);
    background-clip: padding-box;
	min-height:380px;
}

.nav>li>a:hover, . nav>li>a:focus{
    text-decoration: none;
  background: none !important;
   /*color:white;*/
   cursor: default !important;
  
}
li.wizard-nav-item:hover .glyphicon-chevron-right {
   /* opacity: 1 !important;*/
	/*color:none!important;*/
	
}

.wizard-nav-list > li > a {
    background-color: #f5f5f5;
   padding: 3px 17px 3px 20px;
    cursor: default;
    color: #B4B4B4;
}
.form-group.hlf {
    width: 50%;
    float: left;
}
.btn {
   
    margin-left: -32px;
   
}
.required{
	color:red;
}
.clear{
	clear:both;
}
.brdr-box{
	width: 100%;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 5px;
    padding-bottom: 5px;
    border: 0px solid #1caf9a;
   /* border-radius: 12px;*/
    font-weight: normal;
    font-size: 9px;
    font-family: Arial, Helvetica, sans-serif;
}
.table-responsive {
   
     margin-bottom: 0px; 
   
}
.lbl-dwn{
	margin-top:10px;
}
button.nxt {
    margin-left: 16px;
    margin-top: 15px;
    color:#333;
    border: 1px solid #1CAF9A;
    border-radius: 3px;
    font-size: 13px;
    padding: 5px;
	background:#FFF;
	
}
button.nxt:hover{
	
	
	 background: #1CAF9A;
	 color:#FFF;
}
.table {
    width: 100%;
    margin-bottom: 20px;
    font-size: 10px;
}
.table-responsive {
    margin-left: 14px;
    /* margin-right: 22px; */
	padding: 0px;
    width: 94%;
    margin-bottom: 15px;
    overflow-x: scroll;
    overflow-y: hidden;
    border: 1px solid #ddd;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    -webkit-overflow-scrolling: touch;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    color: #FFF;
    background-color: #1CAF9A;
    border-color: #1CAF9A;
}
.btn-default.active, .btn-default.focus, .btn-default:active, .btn-default:focus,.btn-default:hover .open>.dropdown-toggle.btn-default {
    color: #FFF;
	background:none;
	
    background-color: #1CAF9A;
    border-color: #1CAF9A;
}
/***************today edit***************************/
.modal-title {
    margin: 0;
    line-height: 1.42857143;
    color: #33D0E1;
    font-weight: 700;
}
.form-control.styl{
	border: 0px solid #ccc;
    border-radius: 0px;
    -webkit-box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
     box-shadow: inset 0 0px 0px rgba(0,0,0,.075); 
	 cursor:default;
}
.form-control.styl:focus{
	cursor:text;
	border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
     box-shadow: inset 0 1px 1px rgba(0,0,0,.075); 
}
.form-control.styl:hover{
	cursor:text;
	border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
     box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
}
label#cust_name-error {
    color: red;
    font-weight: 400;
    font-size: 14px;
}
button.act{
	margin-left: 16px;
    margin-top: 15px;
    color:#333;
    border: 1px solid #1CAF9A;
    border-radius: 3px;
    font-size: 13px;
    padding: 5px;
	background:#FFF;
}
td.crsr {
    cursor: pointer;
}
.mrgn { 
	display:none; 
}
.table>tbody>tr>td.mrgn {
    padding-top: 0px;
    padding-bottom: 0px;
}
.no-marin {
	padding-top:0px !important;
	padding-bottom:0px !important;
}
.collapse.in {
    display: block;
    
    
}
 p {
    margin: 10px 0 7px;
	font-size: 12px;
}
.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
    background: rgb(245, 245, 245);
}
/*button.act .active{
	 background: #1CAF9A;
}*/
/*::-webkit-scrollbar {
    width: 12px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
*/

.green.btn {
    color: #FFFFFF;
    background-color: #1CAF9A !important;
	margin-top: 42px;
	margin-left: 10px;
}
.green.btn.lst{
	margin-left: 226px;
    margin-top: -58px;
}
.reservation-title {
	    border-bottom: 1px solid #e5e5e5;
    position: fixed;
    height: 47px;
    width: 100%;
    top: 0px;
    /* bottom: 0px; */
    z-index: 999;
    background: white;
}
.sidebar-title {
   margin-top: 27px;
    float: left;
    position: fixed;
}
.frm3 { 
    margin-top: 35px;
}
.new-gest {
    min-width: 170px;
}
</style>
 <script>

function download_pdf()
{
	$.ajax(
		{
			type: "POST",
			url: "<?php echo base_url();?>Dashboard/",
			data: 
			{ 
				term:a
			} 
		}
	).done(
		function(data)
		{
			//console.log(data);
			//$("#d").html(data);
		}
	);
}

</script>
  </head>
  <body>
              
             
                <div class="modal-content">
                
                  <div class="modal-header reservation-title">
                    <!--<button type="button" onclick="close()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                    <h4 class="modal-title " id="exampleModalLabel">New Reservation</h4>
                  </div>
                 
                  <div class="modal-body col-md-6 ">
                   <div class="long sidebar-title col-md-6">
                    <ul class="nav wizard-nav-list">
<li class="wizard-nav-item" id="istli"><a class="wizard-nav-link active" ><span class="glyphicon glyphicon-chevron-right"></span> Guest Details</a></li>
<li class="wizard-nav-item" id="2ndli"><a class="wizard-nav-link"><span class="glyphicon glyphicon-chevron-right"></span> Booking Preference</a></li>
<li class="wizard-nav-item" id="3rdli"><a class="wizard-nav-link"><span class="glyphicon glyphicon-chevron-right"></span> Broker</a></li>
<!--<li class="wizard-nav-item" id="4thli"><a class="wizard-nav-link"><span class="glyphicon glyphicon-chevron-right"></span> Summary</a></li>-->
<li class="wizard-nav-item" id="5thli"><a class="wizard-nav-link"><span class="glyphicon glyphicon-chevron-right"></span> Advance Payment</a></li>

</ul>
                   
                  </div>
								  <div class="frm col-md " id="tab1">
									
									 <h1>New Reservation</h1>
                                                
                                                <div style="margin-left:16px;">
                                                <label>Room Number: </label>
                                                    
                                                <label> <?php echo $room_no; ?></label>
                                                    
                                                </div>
                                             
												<!--<div class="form-group">
													<label class="control-label col-md-3">Booking Type:</label>
													<div class="col-md-4">
														<!--<select name="booking_type" id="booking_type" class="form-control" >
															
															<option value="AL"> Normal Booking</option>
															<option value="DZ">Temporary Hold</option>
														
															
															
															
														</select>
                                                        <div class="radio-list">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="booking" id="booking1" value="option1" > 
                                                        Normal Booking</label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="booking" id="booking2" value="option2"> Temporary 
                                                        Hold
                                                        </label>
                                                        
                                                         </div>
													</div>
												</div><div class="clear"></div>-->
												<div class="form-group">
													<label class="control-label col-md-3">Guest Type:</label>
													<div class="col-md-4">
														<!--<select name="booking_type" id="booking_type" class="form-control" >
															<option value="">Select Booking Type</option>
														
															<option value="AL">Existing Guest</option>
															<option value="DZ">Returning Guest</option>
														
															
															
															
														</select>-->
                                                         <!--<div class="radio-list">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="new" id="new" value="new" onclick="new_form()"> 
                                                        New Customer</label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="new" id="returning" value="returning" onclick="returning_form()"> Returning 
                                                        customer
                                                        </label>
                                                        
                                                         </div>-->
                                                         
                                                        <div class="btn-group btn-toggle"  > 
														<button class="btn btn-lg btn-default new-gest" name="new" id="new" value="new" onclick="new_form()" >New Guest</button>
														<button class="btn btn-lg btn-default new-gest" name="new" id="returning" value="returning" onclick="returning_form()">Returning Guest</button>
													  </div>
													</div>
												</div>
                                                
                                                
												
                                       
                                     </div>  
                                        
								<div class="frm col-md " id="tab11">
                                   	
									<div class="form-group">
													<label class="control-label col-md-3">Search Guest: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text"  class="form-control" name="cust_search" id="cust_search" 
                                                        placeholder="Search Guest"/>
														
													</div>
													<button class="nxt" onclick="return_guest_search()">Search</button>
									</div>
                                    <div class="form-group">
													
													<div class="col-md-4  " id="return_guest" >
                                                    
                                                            
                       <!--<label style="font-weight:normal;" >Name :</label>   <label style="font-weight:normal;" > </label>
                      <label style="font-weight:normal; margin-left:105px; " >Address :</label>  <label style="font-weight:normal;" ></label><br>                      <label style="font-weight:normal;" >Mobile No :</label>  <label style="font-weight:normal;" ></label>
                       <label style="font-weight:normal;margin-left:88px;" >Occupation :</label>  <label style="font-weight:normal;" ></label><br>                       <label style="font-weight:normal;" >Last date :</label>  <label style="font-weight:normal;" ></label>
                       <label style="font-weight:normal;margin-left:90px;" >Last Room :</label>  <label style="font-weight:normal;" ></label>-->
                                                                   
                                                                         
                                                                 <!-- <table class="table table-bordered" cellpadding="0" cellspacing="0" >
                                                                        <thead>
                                                                          <tr>
                                                                          
                                                                            <th>Name</th>
                                                                            <th>Address</th>
                                                                            <th>Mobile No</th>
                                                                            
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          <tr>
                                                                           
																			<td class="crsr" data-toggle="collapse" data-target="#toggleDemo">Anna</td>
                                                       
                                                            
                                                                            <td>sodepur,kolkata</td>
                                                                            <td>9831788098</td>
                                                                           
                                                                          </tr>
                                                                          <tr>
                                                                           
                                                      
                                                       
                                                            
                                                                     <td class="no-marin"  colspan="3"  cellpadding="0" cellspacing="0"  > 
                                              
                                                                     <div id="toggleDemo" class="mrgn"  >
                                                                            <p><label>Name:</label>
                                                                            <label>Anamik chowdhury</label><br>
                                                                            <label> Room No:</label><label>102</label><br><label>Last Chek In Date:</label>
                                                                            <label>01-02-2015</label> </p>
                                                                    </div>
                                                            </td>
                                                                            
                                                                           
                                                                          </tr>
                                                                          <tr>
                                                                           
                                                       <td >Anna</td>
                                                       
                                                            
                                                                            <td>sodepur,kolkata</td>
                                                                            <td>9831788098</td>
                                                                           
                                                                          </tr>
                                                                          
                                                                        </tbody>
                                                                </table>-->
                                                        
                                                        
                                                         
                                                        
                                                         
                                                         
                                                         
                                                         
                                                         
                                                            
                                  
                                                          
                                                            
                                                        
													</div>	
													
												</div>
                                    
												
                                     </div>  

									<div class="frm3" id="tab12">
											 <form action="" class="form-horizontal" id="form1st" method="POST">
													<input type="hidden" id="room_id" name="room_id" value="<?php echo $resource; ?>" />
												<div class="form-group">
													<label class="control-label col-md-3">Guest Name: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required onkeypress="return onlyLtrs(event, this);" class="form-control" name="cust_name" id="cust_name" 
                                                        placeholder="Guest Name" value="" />
														
													</div>
												</div>
												<div class="row">  
                                                 <div class="col-xs-6">
												<div class="form-group">
													<label class="control-label col-md-3">  Address: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required class="form-control" name="cust_address" id="cust_address"
                                                         placeholder="Guest Address" value=""/>
													</div>	
												</div>
                                                </div>
                                                 <div class="col-xs-6">
												<div class="form-group">
													<label class="control-label col-md-3">Mobile Number: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required maxlength="10" onkeypress="return onlyNos(event,this);" class="form-control" name="cust_contact_no" id="cust_contact_no"
                                                         placeholder="Guest Number" value=""/>
													</div>	
												</div>
                                                </div>
                                                </div>
                                   <div class="line" style="float:left; width:100%;">  
                                   <div class="row">  
                                               <div class="col-xs-6">         
                                                <div class="form-group ">
													<label class="control-label col-md-3">Check in date: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required  class="form-control" name="start_dt" value="<?php echo $start_dt; ?>"  />
                                                       
													</div>	
												</div>
                                                </div>
                                                <div class="col-xs-6"> 
                                                <div class="form-group  ">
													<label class="control-label col-md-3">Check in Time: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
													<input type="text" required class="form-control" name="start_time" value="11.00" />
													<!--<input type="hidden"  class="form-control" name="start_time" value="<?php echo $start_time; ?>" />-->
													</div>	
                                                   </div>
												</div>
                                            </div>
                                            <div class="clear"></div>
                                  </div>    
                                    <div class="line" style="float:left; width:100%;">  
                                     <div class="row">  
                                               <div class="col-xs-6">          
                                                <div class="form-group  ">
													<label class="control-label col-md-3">Check Out date: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input  required="required" type="text" class="form-control" name="end_dt"
                                                         value="<?php echo $end_dt; ?>"/>
													</div>	
												</div>
												</div>
                                                <div class="col-xs-6">  
                                                <div class="form-group  ">
													<label class="control-label col-md-3">Check Out Time: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required class="form-control" name="end_time"
                                                         value="11.00"/>
														 <!--<input type="hidden"  class="form-control" name="end_time" value="<?php echo $end_time; ?>" />-->
													</div>
                                                  </div>	
												</div>
									</div>         
                                    </div>  
                                    <div class="row">
                                     <div class="col-xs-6">
                                                <div class="form-group">
													<label class="control-label col-md-3">Nature of visit:</label>
													<div class="col-md-4">
														<select name="nature_visit" id="nature_visit" class="form-control" placeholder=" Booking Type">
															
															<option value="Travel & Leisure">Travel & Leisure</option>
															<option value="Business">Business</option>
														</select>
													</div>
												</div>
                                                </div>
                                              <div class="col-xs-6">   
                                                <div class="form-group">
													<label class="control-label col-md-3">Next Destination <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required class="form-control" name="next_destination"
                                                         placeholder="Next Destination"/>
													</div>	
												</div>
                                                </div>
                                                </div>
                                                 <div class="modal-footer">
												 <input name="Submit1" id="submit1" type="submit" class="btn btn-primary" value="Continue" />
                                                                 <a href="javascript:close();" class="btn btn-default">
                                                                 <i class="m-icon-swapright"></i> Cancel </a>
                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>-->
                                                  </div>	
											 
											 </form>
									</div>		 
										
                                  <div class="frm2" id="tab2">
											<form action="" class="form-horizontal" id="form2nd" method="POST">	
												<div class="form-group">
													<label class="control-label col-md-3">Booking Type:</label>
													<div class="col-md-4">
														<!--<select name="booking_type" id="booking_type" class="form-control" >
															
															<option value="AL"> Normal Booking</option>
															<option value="DZ">Temporary Hold</option>
														
															
															
															
														</select>-->
                                                        <div class="radio-list">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="booking_type" id="booking1" value="current" > 
                                                        Current Booking</label>
														<label class="radio-inline">
                                                        <input type="radio" name="booking_type" id="booking1" value="advance" > 
                                                        Advance Booking</label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="booking_type" id="booking2" value="temporaly"> Temporary 
                                                        Hold
                                                        </label>
                                                        
                                                         </div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Booking Source:</label>
													<div class="col-md-4">
														<select name="booking_source" id="booking_source" class="form-control" >
															<option value="">Select Source</option>
															<option value="Frontdesk">Frontdesk</option>
															<option value="Online">Online</option>
															<option value="Telephonic">Telephonic</option>
															<option value="Broker">Broker</option>
														</select>
                                                        													</div>
												</div>
												<div class="clear"></div>
												<div class="line" style="float:left; width:100%;">             
                                                <div class="form-group hlf">
													<label class="control-label col-md-3">No. of Adult: <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required  class="form-control" name="adult" value=""  />
                                                       
													</div>	
												</div>
                                                
                                                <div class="form-group hlf ">
													<label class="control-label col-md-3">No. of Child:<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
													<input type="text" required class="form-control" name="child" value="" />
													</div>	
												</div><div class="clear"></div>
												</div> 
												<div class="form-group">
													<label class="control-label col-md-3">Base Room Rent <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="base_room_rent" readonly
                                                         placeholder="Base Room Rent" value="<?php echo $room_rent; ?>"/>
													</div>	
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Room rent Action <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<!--<input type="radio" class="form-control" name="rent_mode_type" id="rent_mode_type" value="p" /> Addition
														<input type="radio" class="form-control" name="rent_mode_type" id="rent_mode_type" value="s" /> Substraction-->
													
                                                                <div class="radio-list">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="rent_mode_type" id="rent_mode_type" value="p" > 
                                                        Addition</label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="rent_mode_type" id="rent_mode_type" value="s"> Substraction 
                                                        </label>
                                                        
                                                           </div>
                                                     </div>      	
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Room rent modifier <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<input type="text"  class="form-control" name="mod_room_rent"
                                                         placeholder="Room rent modifier" value="" onkeypress="return onlyNos(event,this);" />
													</div>	
												</div>
                                               <!-- <div class="form-group">
													<label class="control-label col-md-3">Discount Coupon <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="rpassword"
                                                         placeholder="Discount Coupon"/>
													</div>	
												</div>-->
                                                <!--<div class="form-group">
													<label class="control-label col-md-3">Broker Name <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="rpassword"
                                                         placeholder="Broker Name"/>
													</div>	
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Broker commission <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="rpassword"
                                                         placeholder="Broker commission"/>
													</div>	
												</div>-->
                                                <!--<div class="form-group">
													<label class="control-label col-md-3">Additional Services <span class="required">
													 </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="checkbox" name="addition_services[]" value="AC" data-title="Auto-Pay with this 
                                                            Credit Card."/> AC </label>
															<label>
															<input type="checkbox" name="addition_services[]" value="Additional Bed" data-title="Email me monthly 
                                                            billing."/> Additional Bed </label>
                                                            <label>
															<input type="checkbox" name="addition_services[]" value="Room Service" data-title="Email me monthly 
                                                            billing."/> Room Service </label>
                                                            <label>
															<input type="checkbox" name="addition_services[]" value="Breakfast" data-title="Email me monthly 
                                                            billing."/> Breakfast </label>
                                                            <label>
															<input type="checkbox" name="addition_services[]" value="Swimming Pool" data-title="Email me monthly 
                                                            billing."/> Swimming Pool </label>
                                                            
															
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>-->
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Comment for booking</label>
													<div class="col-md-4">
														<textarea class="form-control" rows="3" name="comment"></textarea>
													</div>
												</div>
                                                	<!--action-->
                                                    `<div class="modal-footer">
													<input type="hidden" name="booking_1st" id="booking_1st" value="" /> 
                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>-->
													<input name="Submit2" id="submit2" type="submit" class="btn btn-primary" value="Continue" />
                                                                 <a href="javascript:close();" class="btn btn-default">
                                                                 <i class="m-icon-swapright"></i> Cancel </a>
                                                  </div>
                                        	
                                        <!--end of action-->
											</form>
                                     </div>  
                                     
                                  <div class="frm3" id="tab3">
								  <form action="" class="form-horizontal" id="form3rd" method="POST">	
											<!--<div class="form-group">
													<label class="control-label col-md-3">Add Broker:</label>
													<div class="col-md-4">
														<!--<select name="booking_type" id="booking_type" class="form-control" >
															
															<option value="AL"> Normal Booking</option>
															<option value="DZ">Temporary Hold</option>
														
															
															
															
														</select>
                                                        <div class="radio-list">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="broker" id="broker1" value="Y" onclick="showbroker()" > 
                                                        Yes</label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="broker" id="broker2" value="N" onclick="hidebroker()" checked> No
                                                        </label>
                                                        
                                                         </div>
													</div>
												</div>--><div class="clear"></div>
												<div class="form-group" id="broker_name">
													<label class="control-label col-md-3">Broker Name<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select name="broker_id" id="broker_id" class="form-control" onchange="get_commision()" >															
														
														
														
														</select>
													</div>	
												</div>
                                    `
												<div class="form-group" id="broker_commision">
													<label class="control-label col-md-3">Commision <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="broker_commission" id="broker_commission" 
                                                         placeholder="Commision" value=""/>
													</div>	
												</div>
												<div class="modal-footer">
													<input type="hidden" name="booking_1st12" id="booking_1st12" value="" /> 
                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>-->
													<input name="Submit3" id="submit3" type="submit" class="btn btn-primary" value="Continue" />
                                                                 <a href="javascript:close();" class="btn btn-default">
                                                                 <i class="m-icon-swapright"></i> Cancel </a>
                                                  </div>
											</form>	
                                     </div>  
                                     
                                  <div class="frm4" id="tab4">
                                   <form action="" class="form-horizontal" id="form4th" method="POST">	
											<div class="form-group">
													<label class="control-label col-md-3">Payment Mode</label>
													<div class="col-md-4">
														<select name="t_payment_mode" id="t_payment_mode" class="form-control" placeholder=" 
                                                        Booking Type" onchange="payment_mode_change();">
															
															<option value="Cash">Cash</option>
															<option value="Debit Card">Debit Card</option>
                                                            <option value="Credit Card">Credit Card</option>
                                                            
														</select>
													</div>
												</div>
												<div class="form-group" id="bank">
													<label class="control-label col-md-3">Bank Name <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text"  required="required" onkeypress="return onlyLtrs();" class="form-control" name="t_bank_name" placeholder="Bank Name" />
                                                        
														<span class="help-block">
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Payment Amount <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" required onkeypress="return onlyNos(event, this);" placeholder="" class="form-control" name="t_amount" 
                                                        placeholder= "Payment Amount " />
														<span class="help-block">
														</span>
													</div>
												</div>
												
												
                                                 <div class="modal-footer">
                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>-->
													<input type="hidden" name="booking_3rd" id="booking_3rd" value="" /> 
																		<input name="Submit4" id="submit4" type="submit" class="btn btn-primary" value="Submit" />
                                                  </div>
                                                
                                                		
                                                            `
												</form>
												<form action="<?php echo base_url();?>bookings/popup_close" class="form-horizontal" id="f" method="POST">	
												<div class="new-btn" id="print_tab">  
												<input type="hidden" name="booking_3rd" id="booking_3rd" value="" /> 
                                                                     <!--<button class="btn green frst" type="button" data-toggle="dropdown" 
                                                                      onclick="javascript:window.print();">
                                                                    Print<i class="glyphicon glyphicon-print" style="margin-left:10px;"></i>
                                                                    </button>-->
                                                                    
                                                                    <a class="btn green" id="dwn_link" href=""  onclick="download_pdf();">
                                                                    Download<i class="glyphicon glyphicon-download" style="margin-left:6px;"></i>
                                                                    </a>
																	
                                                                    <a  onclick=
                                                                            "openview()" class="btn green"> 
                                                                    View <i class="fa fa-eye" style="margin-left:4px;"></i>
                                                                    </a>
																	
																	<a onclick= "openview1()" class="btn green lst">
                                                                           
																	 Close </a>
                                                                    </div>
																	</form>
												
                                     </div>    	  	
                     </div>
                                        `
                 
            </div>
            
           

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/pages/scripts/components-pickers.js"></script>
  </body>
</html>
<script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }
		
		/*function submit_1st() {
           var f1 = $("#form1st");
             $.ajax({
    type: "POST",
    url: "bin/process.php",
    data: dataString,
    success: function() {
      //display message back to user here
    }
  });
  return false;
			 
            //return false;
        }*/
$(document).ready(function() {
	
	$('#tab11').hide();
	$('#tab12').hide();
	$('#tab2').hide();
	$('#tab3').hide();
	$('#tab4').hide();
	//$('#broker_name').hide();
	//$('#broker_commision').hide();
	
	
	
	$('#bank').hide();
	$('#istli').addClass("active");
	
	
	$("#form1st").validate({
		//alert("xxxxxxx");
		submitHandler: function() {
			$.post("<?php echo base_url();?>bookings/hotel_backend_create", 
				$("#form1st").serialize(), 
				function(data){
					$('#booking_1st').val(data.bookings_id);
					$('#tab12').hide();
					$('#tab2').show();
					$('#istli').removeClass("active");
					$('#2ndli').addClass("active");
			});
			return false; //don't let the page refresh on submit.
			
		}
	}); 
	
	$("#form2nd").validate({
		submitHandler: function() {
			$.post("<?php echo base_url();?>bookings/hotel_backend_create2", 
				$("#form2nd").serialize(), 
				function(data){
					var booking_source = data.booking_source;
					if(booking_source == 'Broker')
					{
						$('#booking_1st12').val(data.bookings_id);
						$('#tab2').hide();
						$('#tab3').show();
						$('#print_tab').hide();
						$('#2ndli').removeClass("active");
						$('#3rdli').addClass("active");
						return_broker();
					}
					else
					{
						$('#booking_3rd').val(data.bookings_id);
						$('#tab2').hide();
						$('#tab4').show();
						$('#2ndli').removeClass("active");
						$('#5thli').addClass("active");
					}
					
			});
			return false; //don't let the page refresh on submit.
			
		}
	}); 
	
	$("#form3rd").validate({
		submitHandler: function() {
			
					var bookings_id = $('#booking_1st12').val();
					
					$('#booking_3rd').val(bookings_id);
					$('#tab3').hide();
					$('#tab4').show();
					$('#3rdli').removeClass("active");
					$('#5thli').addClass("active");
					
			
			return false; //don't let the page refresh on submit.
			
		}
	});
	$("#form4th").validate({
		submitHandler: function() {
			$.post("<?php echo base_url();?>bookings/hotel_backend_create4", 
				$("#form4th").serialize(), 
				function(data){
					$('#booking_3rd').val(data.bookings_id);
					$("#submit4").prop("disabled", true);
					$('#print_tab').show();
					
			});
			return false; //don't let the page refresh on submit.
			
		}
	}); 
	
}); 

function returning_form() {
		
		$('#tab1').hide();
		$('#tab11').show();
		
	}	
function showbroker() {
		
		$('#broker_name').show();
		return_broker();
		$('#broker_commision').show();
		
	}	

function hidebroker() {
		
		$('#broker_name').hide();
		$('#broker_commision').hide();
		
	}		
function new_form()
{
	$('#tab1').hide();
	$('#tab12').show();
}

        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
		
		<script>
		function submit_form()
{
	
	  var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
	
}
function download_pdf() {
	var booking_id = $('#booking_3rd').val();
	 //$.post("<?php echo base_url();?>bookings/pdf_generate");
	$("#dwn_link").attr("href", "<?php echo base_url();?>bookings/pdf_generate?booking_id=" + booking_id);
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
	 return false;
}

function payment_mode_change()
{
	var p = $('#t_payment_mode').val();
	//alert(p);
	if(p=='cod')
	{
		$('#bank').hide();
	}
	else
	{
		$('#bank').show();
	}	
}	

function openview() {
	var booking_id = $('#booking_3rd').val();
	 window.open("<?php echo base_url();?>bookings/invoice_generate?booking_id=" + booking_id);
	//$('#f').submit();
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
	//alert(booking_id);
	//submit_form();
   
	
	/*$("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });*/
}

function openview1() {
	//var booking_id = $('#booking_3rd').val();
	 //window.open("<?php echo base_url();?>bookings/invoice_generate?booking_id=" + booking_id);
	//$('#f').submit();
	var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
}
</script>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->




<script>
function onlyNos(e, t) {
	try {
		if (window.event) {
			var charCode = window.event.keyCode;
		}
		else if (e) {
			var charCode = e.which;
		}
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	catch (err) {
		alert(err.Description);
	}
}
/* 11.17.2015*/
function onlyLtrs(e, t)
{
		
	try {
		if (window.event) {
			var charCode = window.event.keyCode;
		}
		else if (e) {
			var charCode = e.which;
		}
		else { return true; }
		if ( charCode > 32 && (charCode < 64 &&  charCode < 90)) {
			return false;
		}
		return true;
	}
	catch (err) {
		alert(err.Description);
	}
}

function return_broker()
{
	jQuery.ajax(
		{
			type:"POST",
			url:"<?php echo base_url(); ?>bookings/return_broker",
			datatype:'json',
			success:function(data)
			{
				var resultHtml = '';
				resultHtml+='<option value="">Select Broker</option>'
				$.each(data, function(key,value){ 
					
					resultHtml+='<option value="'+ value.b_id +'">'+ value.b_name +'</option>';
					
				});
				$('#broker_id').html(resultHtml);
				//alert(data);
				 // console.log(data);	
				//$('#dtls').html(data);
			}
		});
	return false;


}


function return_guest_search()
{
	var guest_name = $('#cust_search').val();
	//alert(guest_name);

	jQuery.ajax(
		{
			type:"POST",
			url:"<?php echo base_url(); ?>bookings/return_guest_search",
			datatype:'json',
			data:{guest:guest_name},
			success:function(data)
			{
				var resultHtml = '';
				resultHtml+='<table class="table table-bordered" cellpadding="0" cellspacing="0" ><thead><tr><th>Name</th><th>Address</th><th>Mobile No</th></tr></thead><tbody>';
				$.each(data, function(key,value){ 
					resultHtml+='<tr>';
					resultHtml+='<td class="crsr" data-toggle="collapse" data-target="#toggleDemo'+value.g_id+'">'+ value.g_name +'</td>';
					resultHtml+='<td>'+ value.g_address +'</td>';
					resultHtml+='<td>'+ value.g_contact_no +'</td>';
					resultHtml+='</tr><tr>';
					resultHtml+='<td class="no-marin"  colspan="3"  cellpadding="0" cellspacing="0"><div id="toggleDemo'+value.g_id+'" class="mrgn">';
					resultHtml+='<p><label>Name:</label><label>'+ value.g_name +'</label><br>';
					resultHtml+='<label>Room No:</label><label>102</label><br><label>Last Chek In Date:</label><label>01-02-2015</label> <button class="act active" name="g_id" id="g_id" value="'+value.g_id+'" onclick="get_guest(this.value)" >Action</button> </p></div></td>';
					//resultHtml+='<td><input type="radio" name="g_id" id="g_id" value="'+value.g_id+'" onclick="get_guest(this.value)" /></td>';
					resultHtml+='</tr>';
				});
				resultHtml+='</tbody></table>';
				$('#return_guest').html(resultHtml);
				//alert(data);
				 // console.log(data);	
				//$('#dtls').html(data);
			}
		});
	return false;


}

function get_guest()
{
	var g_id = $('#g_id').val();
	jQuery.ajax(
		{
			type:"POST",
			url:"<?php echo base_url(); ?>bookings/return_guest_get",
			datatype:'json',
			data:{guest_id:g_id},
			success:function(data)
			{
				$('#tab11').hide();
				$('#tab12').show();
				$('#cust_name').val(data.g_name);
				$('#cust_address').val(data.g_address);
				$('#cust_contact_no').val(data.g_contact_no);
			}
		});
	return false;	
}

function get_commision()
{
	var b_id = $('#broker_id').val();
	var booking_id = $('#booking_1st12').val();
	jQuery.ajax(
		{
			type:"POST",
			url:"<?php echo base_url(); ?>bookings/get_commision",
			datatype:'json',
			data:{b_id:b_id,booking_id:booking_id},
			success:function(data)
			{
				var room_rent = parseInt(data.base_room_rent);
				var commision = parseInt(data.broker_commission);
				
				var tot_commision = (room_rent * commision)/100;
				$('#broker_commission').val(tot_commision);
			}
		});
	return false;	
}

</script>
<script>
$("#returning").hover(function() {
   //alert("nnn");
 $("#returning").css("background-color", "");
});
</script>
