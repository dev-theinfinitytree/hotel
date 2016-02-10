
<?php
date_default_timezone_set('Asia/Kolkata');


foreach ($rooms as $room) {
	$room_id= $room->room_id;
    $room_no = $room->room_no;
    $room_rent = $room->room_rent;
	$room_rent_seasonal=$room->room_rent_seasonal;
	if($room_rent_seasonal==0){
		$room_rent_seasonal=$room_rent;
	}
	$room_rent_weekend=$room->room_rent_weekend;
	if($room_rent_weekend==0){
		$room_rent_weekend=$room_rent;
	}
}



foreach ($taxes as $tax) {
	$hotel_service_tax=$tax->hotel_service_tax;
	$hotel_luxury_tax=$tax->hotel_luxury_tax;
	
}


$start_dt = date("d-m-Y", strtotime($start));
if($start_dt==date("d-m-Y")){

    $checkin_time=date("H:i");
}
else{

    foreach($times as $time) {
        if($time->hotel_check_in_time_fr=='PM') {
            $checkin_time = ($time->hotel_check_in_time_hr + 12) . ":" . $time->hotel_check_in_time_mm;
        }
        else{
            $checkin_time = ($time->hotel_check_in_time_hr) . ":" . $time->hotel_check_in_time_mm;
        }
    }
}

foreach($times as $time) {
    if($time->hotel_check_out_time_fr=='PM') {
        $checkout_time = ($time->hotel_check_out_time_hr + 12) . ":" . $time->hotel_check_out_time_mm;
    }
    else{
        $checkout_time = ($time->hotel_check_out_time_hr) . ":" . $time->hotel_check_out_time_mm;
    }
}
$end_dt = date("d-m-Y", strtotime($end));
$start_d = new DateTime($start_dt);
$end_d =  new DateTime($end_dt);
$dStart = new DateTime($start_dt);
   $dEnd  = new DateTime($end_dt);
   $dDiff = $dStart->diff($dEnd);
   
   $datediff= $dDiff->days;
//echo $start_dt;
//echo $end_dt;
//exit();


     $diff= floor($datediff/(60*60*24));

$start_time = date("H:i:s", strtotime($start));
$end_time = date("H:i:s", strtotime($end));

$event_name="No events today";
$event_color_bg="white";
$event_color_text="#b4bcc8";


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
			z-index:0 !important;
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
            min-height:480px;
        }
        .frm {
            width: 68%;
            float: right;
            margin-top: 30px;
        }
        .frm2{
            width: 68%;
            float: right;
            margin-top: 41px;
        }
        .frm3{
            width: 68%;
            float: right;
            margin-top: 41px;
        }
        .frm4{
            width: 68%;
            float: right;
            margin-top: 41px;
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
            margin-top: 20px;
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
            min-height: 520px;
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
        .form-group.hlf-one {
            width: 30%;
            float: left;
            margin-left: 20px;
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
            margin-left: 0px;
            margin-top: 0px;
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
            font-size: 10px;
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
        /*****4/12/15******/
        input.form-control.hlf {
            width: 78%;
        }

        .top {
            margin-top: -150px;
        }
        .form-group.hlf-two {
            width: 30%;
            float: left;
            margin-left: 20px;

        }
        .form-group.chto-one {
            width:25%;
            float: left;
			margin-left: 5px;
			margin-top: 2px;
			
        }
        .form-group.chto {
            width: 51%;
            float: left;
			
           
        }
		
		.form-group.chto-two {
    float: left;
    width: 39%;
	margin-top: 25px;
}

        .form-group.bks {
            width: 44%;
            float: left;
        }
		.pic img{
			width:100%;
			height:100%;
		}
		.col-xs-6.sm {
    width: 45%;
}
.col-xs-6.ex{
	 width: 53%;
	
}
/*.slimScrollBar{
	z-index:0 !important;
}*/
#popup {
  top: -50%; /*Put it on the very top*/
  transition: all .5s ease-in-out; /*make it smooth*/
}
label.control-label.col-md-2.tt {
    margin-left: 30px;
}
label.st {
    width: 40%;
}

label.control-label.col-md-3.sometotal {
    margin-left: 7px;
}
label.error {
    color: red;
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
        <a href="javascript:close();">
            <i class="fa fa-times" style="float:right;font-size: 20px;color: black;opacity: 0.5;margin-top: -25px;margin-right: -0px;cursor: pointer;"> </i></a>

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

            <?php if($events && isset($events)){
            foreach ($events as $event) {
            if(date("d-m-Y",strtotime($event->e_from))<$end_dt && date("d-m-Y",strtotime($event->e_upto))> $start_dt){

           ?>
                <div style="margin-left:16px;  width: 100%">
                    <label style="font-size:16px; padding:5px; border-radius:5px;text-transform: capitalize;background:<?php echo $event->event_color; ?>;color:<?php echo  $event->event_text_color; ?>"><b> <?php echo $event->e_name; ?></b></label>
                    <label><?php echo date("d-m-Y",strtotime($event->e_from))?> -</label>
                    <label><?php echo date("d-m-Y",strtotime($event->e_upto)) ?></label>

                </div>
            <?php
            }

            }

            }?>


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
                <input type="hidden" id="id_guest" name="id_guest" value="" />
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
                                    <input type="text" id="checkin_id" required class="form-control" name="start_time" value="<?php echo $checkin_time;?>" />
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
                                           value="<?php echo $checkout_time;?>"/>
                                    <!--<input type="hidden"  class="form-control" name="end_time" value="<?php echo $checkout_time; ?>" />-->
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
                            <label class="radio-inline col-md-5">
                                <input type="radio" name="booking_type" id="booking1" value="current" onclick="check_cur_date()" >
                                Current Booking</label>
                            <label class="radio-inline col-md-3">
                                <input type="radio" name="booking_type" id="booking1" value="advance" onclick="check_advance_date()">
                                Advance Booking</label>
                            <label class="radio-inline col-md-4">
                                <input type="radio" name="booking_type" id="booking2" value="temporaly" onclick=" check_temp_date()"> Temporary
                                Hold
                            </label>

                        </div>
                    </div>
                </div>
                <div class="line" style="float:left; width:100%; margin-top:10px;">
                    <div class="form-group bks ">
                        <label class="control-label col-md-3">Booking Source:</label>
                        <div class="col-md-4">
                            <select name="booking_source" id="booking_source" class="form-control" >
                                <option value=""disabled selected>Select Source</option>
                                <option value="Frontdesk">Frontdesk</option>
                                <option value="Online">Online</option>
                                <option value="Telephonic">Telephonic</option>
                                <option value="Broker">Broker</option>
                                <option value="Channel">Channel</option>
                            </select>
                        </div>
                    </div>
                    <input id="brokerchannel" value="" type="hidden">


                    <div class="form-group hlf-one ">
                        <label class="control-label col-md-3">No. of Adult: <span class="required">
													* </span>
                        </label>
                        <div class="col-md-4">
                            <input type="text" required  class="form-control" name="adult" value=""  />

                        </div>
                    </div>

                    <div class="form-group hlf-two ">
                        <label class="control-label col-md-3">No. of Child:<span class="required">
													* </span>
                        </label>
                        <div class="col-md-4">
                            <input type="text" required class="form-control" name="child" value="" />
                        </div>
                    </div>
                    <div class="clear" style="clear:both;"></div>
                </div>

				<div class="form-group chto">
                        <label class="control-label col-md-3">Rent Type:</label>
                        <div class="col-md-4">
                            <select name="booking_rent" id="booking_rent" class="form-control" onchange="check_sum2(this.value)">
                                <option value="" disabled selected>--Rent Type--</option>
                                <option value="<?php echo $room_rent; ?>" >Base Room Rent</option>
                                <option value="<?php echo $room_rent_weekend; ?>" >Weekend Room Rent</option>
                                <option value="<?php echo $room_rent_seasonal; ?>" >Seasonal Room Rent</option>
                            </select>
                        </div>
                    </div>
					
                
                <div class="form-group chto-one">
                      <label class="control-label col-md-3"></label>
                    <div class="col-md-4">


                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="rent_mode_type" id="rent_mode_type" value="add" >
                                +</label>
                            <label class="radio-inline">
                                <input type="radio" name="rent_mode_type" id="rent_mode_type" value="substract"> -
                            </label>

                        </div>
                    </div>
                </div>
                <div class="form-group chto-two">
                    <!--<label class="control-label col-md-3">Room rent modifier <span class="required">
                     </span>
                    </label>-->
                    <div class="col-md-4">
                        <input type="text"  class="form-control" id="mod_room_rent" name="mod_room_rent"
                               placeholder="Room rent modifier" value="" onkeypress="return onlyNos(event,this);" onblur="amount_check(this.value)" />
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label class="control-label col-md-3"> Room Rent:
                    </label> <label style="font-weight:normal;">Rs.</label><label id="target" style="font-weight:normal;"></label>
                    <div class="col-md-4">
                        <input type="hidden" class="form-control" id="base_room_rent" name="base_room_rent"  value="<?php echo $room_rent; ?>"/>
						<input type="hidden" class="form-control" id="room_id" name="room_id"  value="<?php echo $room_id; ?>"/>
						<input type="hidden" class="form-control" id="diff" name="stay_span"  value="<?php echo $datediff; ?>"/>
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
                        <textarea class="form-control" rows="1" name="comment"></textarea>
                    </div>
                </div>
                <!--action-->
                `<div class="modal-footer">
                    <input type="hidden" name="booking_1st" id="booking_1st" value="" />
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>-->
                    <input name="Submit2" id="submit2"  type="submit" class="btn btn-primary" value="Continue" />
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
                    <label class="control-label col-md-3">Broker/Channel Name<span class="required">
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
                        <input value="" type="text" class="form-control" name="broker_commission" id="broker_commission"
                               placeholder="Commision" />
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
				
                    <label class="control-label col-md-2">Total Rent:   <label style="font-weight:normal;margin-left:10px;" id="target2" >
					
					</label>  </label>
					
                        <label class="control-label col-md-2 tt">Tax Type:</label>
                        <label class="st">
                            <select name="booking_tax" id="booking_tax" class="form-control" onchange="check_sum3(this.value)">
                                <option value="" disabled selected>--tax Type--</option>
                                <option value="<?php echo 0; ?>" >No Tax</option>
                                <option value="<?php echo $hotel_service_tax; ?>" >Service tax</option>
                                <option value="<?php echo $hotel_luxury_tax; ?>" >Luxury tax</option>
                            </select>
                        </label><br><br>
                    <div class="col-xs-4">
                    <label class="control-label">Tax(<label id="target4"></label>):    <label style="font-weight:normal;margin-left: 10px;" id="target5"></label>  </label>
					</div>
					 <div class="col-xs-8 sm">
                    <label class="control-label col-md-3 sometotal">Sum Total: <label style="font-weight:normal;" id="target3"></label>   </label>
                    </div>
                  <input type="hidden" id="tax" name="tax"></input>
				<input type="hidden" id="total" name="total"></input>
			   </div>
				

                <div class="form-group">
                    <label class="control-label col-md-3">Payment Mode</label>
                    <div class="col-md-4">
                        <select name="t_payment_mode" id="t_payment_mode" class="form-control" placeholder="
                                                        Booking Type" onchange="payment_mode_change();" onclick="paymentamount_show">

                            <option value="Select The Payment Mode" disabled selected>Select The Payment Mode</option>
							<option value="Cash">Cash</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Fund Transfer">Fund Transfer</option>

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
                <div class="form-group" id="payment_amnt" style="display:none;" >
                    <label class="control-label col-md-3">Payment Amount <span class="required">
													* </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="payment_input" onkeypress="return onlyNos(event, this);" required value=""  class="form-control hlf" name="t_amount"
                               placeholder= "Payment Amount " autocomplete="off" />
														<span class="help-block">
														</span>
                    </div>
                </div>


                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>-->
                    <input type="hidden" name="booking_3rd" id="booking_3rd" value="" />
                    <input name="Submit4" id="submit4" type="submit" class="btn btn-primary" value="Submit"  onclick="show_hiden()" style="float: left;margin-left: -221px; display:none;"/> 
   
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
							  <div id="hidden-div" style="display:none;margin-top:10px;">
								<a class="btn green" id="dwn_link" href=""  onclick="download_pdf(); ">
									Download<i class="glyphicon glyphicon-download" style="margin-left:6px;"></i>
								</a>

								<a  onclick=
									"openview(); " class="btn green">
									View <i class="fa fa-eye" style="margin-left:4px;"></i>
								</a>
                              
								<a onclick= "openview2(); " class="btn green lst">

									Close </a>
							</div>
							
							<a onclick= "openview1();" class="btn green lst" id="hide-btn" style="margin-top:0px;float: left;margin-left: 91px display:block;">

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
                /*var booking_type = $("input[name=booking_type]:checked").val();
                 if()
                 return false;*/
                $.post("<?php echo base_url();?>bookings/hotel_backend_create2",
                    $("#form2nd").serialize(),
                    function(data){
                        var booking_source = data.booking_source;
                        if(booking_source == 'Broker')
                        {
                            $('#booking_1st12').val(data.bookings_id);
                            $('#brokerchannel').val('0');
                            $('#tab2').hide();
                            $('#tab3').show();
                            $('#print_tab').hide();
                            $('#2ndli').removeClass("active");
                            $('#3rdli').addClass("active");
                            return_broker();
                        }
                        else if(booking_source == 'Channel'){
                            $('#booking_1st12').val(data.bookings_id);
                            $('#brokerchannel').val('1');
                            $('#tab2').hide();
                            $('#tab3').show();
                            $('#print_tab').hide();
                            $('#2ndli').removeClass("active");
                            $('#3rdli').addClass("active");
                            return_channel();

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

                var flag=document.getElementById("brokerchannel").value;
                if(flag=='0'){
                    var url='hotel_backend_create_broker';
                }
                else if(flag=='1'){
                    var url='hotel_backend_create_channel';
                }

                var bookings_id = $('#booking_1st12').val();

                $.post("<?php echo base_url();?>bookings/"+url+"?booking_id_broker="+bookings_id,
                    $("#form3rd").serialize(),
                    function(data){
                        $('#booking_3rd').val(data.bookings_id);
                        $('#tab3').hide();
                        $('#tab4').show();
                        $('#3rdli').removeClass("active");
                        $('#5thli').addClass("active");

                    });
                return false;

               /* $('#booking_3rd').val(bookings_id);
                $('#tab3').hide();
                $('#tab4').show();
                $('#3rdli').removeClass("active");
                $('#5thli').addClass("active");


                return false; //don't let the page refresh on submit.*/

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
        if(p=='Cash')
        {
            $('#bank').hide();
			
        }
        else
        {
            $('#bank').show();
        }
		
		document.getElementById('payment_amnt').style.display= 'block';
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

            $.post("<?php echo base_url();?>bookings/hotel_backend_create4",
                $("#form4th").serialize(),
                function(data){
                    $('#booking_3rd').val(data.bookings_id);


                });

            close(eval(result));
        });
        return false;
    }
    function openview2() {
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

    function return_channel()
    {
        jQuery.ajax(
            {
                type:"POST",
                url:"<?php echo base_url(); ?>bookings/return_channel",
                datatype:'json',
                success:function(data)
                {
                    var resultHtml = '';
                    resultHtml+='<option value="">Select Channel</option>'
                    $.each(data, function(key,value){

                        resultHtml+='<option value="'+ value.channel_id +'">'+ value.channel_name +'</option>';

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
                        resultHtml+='<tr >';
                        resultHtml+='<td class="crsr" data-toggle="collapse" data-target="#toggleDemo'+value.g_id+'">'+ value.g_name +'</td>';
                        resultHtml+='<td>'+ value.g_address +'</td>';
                        resultHtml+='<td>'+ value.g_contact_no +'</td>';
                        resultHtml+='</tr><tr>';
                        resultHtml+='<td class="no-marin"  colspan="3"  cellpadding="0" cellspacing="0"><div id="toggleDemo'+value.g_id+'" class="mrgn">';
                        resultHtml += '<div class="side" style="width:100%;"><div class="col-xs-6 ex"><p><label style="font-size:12px;">Name:</label><label style="font-size:12px;">' + value.g_name + '</label><label>';

                        resultHtml+='<input type="hidden" id="g_id_hide"  value="'+value.g_id+'" ></input>';
                        resultHtml+='<label>Room No:</label><label>102</label><br><label>Last Check In Date:</label><label>'+value.cust_from_date+'</label><br> <button class="act active" name="g_id" id="g_id"" value="'+value.g_id+'" onclick="get_guest('+value.g_id+')" >Continue</button> </p></div>';
                        if(value.g_photo_thumb!='') {
                            resultHtml += '<div class="col-xs-6 sm"><div class="pic pull-right" style="width:100px; height:92px; border:1px solid #DDDDDD;margin-top:11px;">' +
                            '<img src="<?php echo base_url() ?>upload/guest/' + value.g_photo_thumb + '" > ' +
                            '</div></div><br>';
                        }
                        else{
                            resultHtml += '<div class="col-xs-6 sm"> <div class="pic pull-right" style="width:100px; height:92px; border:1px solid #DDDDDD;margin-top:11px;">' +
                            '<img src="<?php echo base_url() ?>upload/no_images.png" > ' +
                            '</div></div><br>';
                        }
                        //resultHtml+='<td><input type="radio" name="g_id" id="'+value.g_id+'" value="'+value.g_id+'" onclick="get_guest(this.value)" /></td>';
                        resultHtml+='</div></div></td></tr>';
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

    function check_cur_date()
    {
        var start_dt = '<?php echo date('Y-m-d',strtotime($start_dt)); ?>';
        var current_dt = '<?php echo date('Y-m-d'); ?>';
        if(start_dt != current_dt)
        {
            $("input:radio").attr("checked", false);
            alert('Current Booking can only be taken from Current Date');
        }
    }
	function check_temp_date()
    {
        var start_dt = '<?php echo date('Y-m-d',strtotime($start_dt)); ?>';
        var current_dt = '<?php echo date('Y-m-d'); ?>';
        if(start_dt != current_dt)
        {
            $("input:radio").attr("checked", false);
            alert('Temporary Booking can only be taken from Current Date');
        }
    }

    function check_advance_date()
    {
        var start_dt = '<?php echo date('Y-m-d',strtotime($start_dt)); ?>';
        var current_dt = '<?php echo date('Y-m-d'); ?>';
        if(start_dt == current_dt)
        {
            $("input:radio").attr("checked", false);
            alert('Advance Booking can not be taken from Current Date');
        }
    }

    function get_guest(id)
    {
        //var g_id = $('#g_id_hide').val();
        var g_id=id;
        //alert(g_id);
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
                    $('#id_guest').val(g_id);
                    $('#cust_name').val(data.g_name);
                    $('#cust_address').val(data.g_address);
                    $('#cust_contact_no').val(data.g_contact_no);
                }
            });
        return false;
    }

    function get_commision()
    { var flag=document.getElementById("brokerchannel").value;
        //alert(flag);
        var b_id = $('#broker_id').val();
        var booking_id = $('#booking_1st12').val();

            if(flag==0){
                var url='get_commision';
            }
        else if(flag==1){
            var url='get_commision2';
        }
        jQuery.ajax(
            {
                type:"POST",
                url:"<?php echo base_url(); ?>bookings/"+url+"",
                datatype:'json',
                data:{b_id:b_id,booking_id:booking_id},
                success:function(data)
                {
                    var room_rent = parseInt(data.base_room_rent);
                    var commision = parseInt(data.broker_commission);

                    var tot_commision = (room_rent * (commision/100));
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
<script>



function check_sum2(value2){
		
		var diff=document.getElementById("diff").value;
		var d=parseInt(diff);
		
		document.getElementById("base_room_rent").value=value2;
		document.getElementById("target").innerHTML=value2;
		document.getElementById("target2").innerHTML=value2*d;
		
	}
	
	
    function amount_check(value)
    {  //alert(value);
        
        var radio_val = document.getElementsByName('rent_mode_type');
        var base_rent = document.getElementById("base_room_rent").value;
		var diff=document.getElementById("diff").value;
		var d=parseInt(diff);

        for (var i = 0, length = radio_val.length; i < length; i++) {
			
            if (radio_val[i].checked) {
                
                var radio_selected = radio_val[i].value; 
                //alert(radio_selected);

                if (radio_selected == "add") 
                {
                    //alert('Add Function Call' + base_rent);
                    var sum_val = parseInt(base_rent) + parseInt(value);
                    document.getElementById("base_room_rent").value = sum_val;
					document.getElementById("target").innerHTML=document.getElementById("base_room_rent").value;
					document.getElementById("target2").innerHTML=parseInt(document.getElementById("base_room_rent").value)*d;
					
                    //alert(sum_val);
					document.cookie="rate="+document.getElementById("base_room_rent").value;
					
					
					

                }
                else
                {
                    //alert('Substract Function Call' + base_rent);
                    var sub_val = parseInt(base_rent) - parseInt(value);
                    document.getElementById("base_room_rent").value = sub_val;
					document.getElementById("target").innerHTML=document.getElementById("base_room_rent").value;
					document.getElementById("target2").innerHTML=parseInt(document.getElementById("base_room_rent").value)*d;
					
					
                    //alert(sub_val);
					document.cookie="rate="+document.getElementById("base_room_rent").value;
					
					
                }
                break;
				
            }
			
        }
        /*

        var radio_val = document.getElementsByName('rent_mode_type').value();

        if (radio_val == "add") 
        {
            alert('Add Function Call');
        }
        else
        {
            alert('Substract Function Call');
        }
        
        */
    }
	
	function check_sum3(tax){
		
		var diff=document.getElementById("diff").value;
		var base_rate=document.getElementById("base_room_rent").value;
		
		
		
		var total_rate=parseInt(base_rate)+( parseInt(base_rate)*(parseInt(tax)/100));
		var total_tax=(parseInt(base_rate)*(parseInt(tax)/100))*parseInt(diff);
		
		
		total_rate=total_rate*parseInt(diff);
		
		document.getElementById("target3").innerHTML=total_rate;
		document.getElementById("target4").innerHTML=tax+"%";
		document.getElementById("target5").innerHTML=total_tax;
		document.getElementById("tax").value=total_tax;
		document.getElementById("total").value=total_rate;
		
	}
	
</script>
<script type="text/javascript">
   function show_hiden()
{
	
	document.getElementById('hidden-div').style.display= 'block';
	document.getElementById('hide-btn').style.display= 'none';
}

$(function() {
    $('#payment_input').keypress(function() {
        var v = document.getElementById('payment_input').value;
		v = parseInt(v);
		if (v == ''){
			document.getElementById('submit4').style.display = "none";
		}
		else{
			document.getElementById('submit4').style.display = "block";
		}
    });
	
	
	
	$('#payment_input').blur(function() {
        var v = document.getElementById('payment_input').value;
		v = parseInt(v);
		if (v == ''){
			document.getElementById('submit4').style.display = "none";
		}
		else{
			document.getElementById('submit4').style.display = "block";
		}
    });
	
});


</script>