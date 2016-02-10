<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Hotel Objects | <?php if(isset($heading) && $heading) echo $heading; else echo "Dashboard";?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/clock/flipclock.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/dashboard/sweetdate/sweetalert.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-----9/12-2015------->
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico"/>

<!-- 03/11/15 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<?php 
if(isset($css_files)){
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; }
if(isset($css_files)){ ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; } ?>

</head>
<!-- END HEAD -->