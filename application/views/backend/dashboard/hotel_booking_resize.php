<?php
/**
 * Created by PhpStorm.
 * User: subhabrata
 * Date: 1/25/2016
 * Time: 3:43 PM
 */


if(isset($room_rent_sum_total)){
foreach($room_rent_sum_total as $total){

    if($total->room_rent_sum_total!=0){
        $total_sum= $total->room_rent_sum_total;
    }
    else{
        $total_sum= $total->room_rent_total_amount;
    }
}};

?>
<head>

 <link href="<?php echo base_url();?>assets/dashboard/bookingpopup/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/dashboard/bookingpopup/src/bootstrap-wizard.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
   
    <link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>


    

<style>
.close {
    float: right;
    font-size: 32px;
    font-weight: 700;
    line-height: 1;
    color: black;
   
    
}
.modal-header {
    min-height: 16.43px;
    padding: 15px;
    border-bottom: 0px solid #e5e5e5;
}
.dropdown > .dropdown-menu, .dropdown-toggle > .dropdown-menu, .btn-group > .dropdown-menu {
    margin-top: 0px;
    width: 100% !important;
}
.dropdown-menu {
    min-width: 100%;
    
}
.open>.dropdown-menu {
    display: block;
    width: 100%;
}
</style>
   
    


</head>
<body>
<div class="modal-header">
<a onclick="javascript:window.parent.location.reload();">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
        
  </div>
<?php if(isset($room_rent_sum_total) &&isset($ratio)): ?>
<div class="modal-body">
		<form action="<?php echo base_url() ?>bookings/booking_backend_resize" method="post">
		<input type="hidden" value="<?php echo $start ?>" name="newStart">
		<input type="hidden" value="<?php echo $end?>" name="newEnd">
		<input type="hidden" value="<?php echo $id ?>" name="id">
		Your Amount was : <?php echo $total_sum; ?> </br>
		After resizing Amount Will be multiplied by <?php echo $ratio ?> and will be: <?php echo $total_sum*$ratio;?>

			</br>

		Do You Want to change this amount? <input type="submit" value="Yes" /> </button>
			<button type="button"  onclick="javascript: window.parent.location.reload();" > No </button>
			<a href="javascript:;" class="page-quick-sidebar-toggler"></a>
			</form>
</div>
<?php endif; ?>
<?php if(isset($message)): ?>
<div class="modal-body">
    <h3><?php echo $message; ?></h3>
<?php endif; ?>
    </div>
<script>
    function close(){
        alert("sadasd");
       /* if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
            window.parent.location.reload();
           // parent.DayPilot.ModalStatic.close(result);


        }*/
    }
</script>


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->


</body>