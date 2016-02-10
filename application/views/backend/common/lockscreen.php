<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->


<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/pages/css/lock2.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url();?>assets/dashboard/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
		<img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/img/logo-hotel.png" alt="logo" style="                width: 275px; margin-top: -9px; margin-left: -38px;"/>
		</a>
	</div>
	<div class="page-body">
	<?php if(isset($admin_name)): ?>
	<?php ?>
		<img class="page-lock-img" src="<?php echo base_url();?>upload/no_images.png" alt="">
		<div class="page-lock-info">
		
		
		
			<h1><?php echo $admin_name->admin_first_name ?> <?php echo $admin_name->admin_last_name ?></h1>
			<span class="email">
			<?php echo $admin_name->admin_email ?> </span>
			<span class="locked">
			Locked </span>
			<form method="post" class="form-inline" action="<?php echo base_url() ?>dashboard/unlock">
				<div class="input-group input-medium">
					<input type="password" name="p_lock" class="form-control" placeholder="Password">
					<span class="input-group-btn">
					<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
					</span>
				</div>
				<!-- /input-group -->
				<div class="relogin">
					<a href="<?php echo base_url() ?>/dashboard/logout">
					Not <?php echo $admin_name->admin_first_name ?> ?</a>
				</div>
			</form>
			
		<?php endif; ?>
		</div>
	</div>
	<div class="page-footer-custom">
		 2015 © The Infinity Tree
	</div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/assets/admin/pages/scripts/lock.js"></script>

<!-- END JAVASCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
   Lock.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "<?php echo base_url();?>/assets/dashboard/images/1.jpg",
        "<?php echo base_url();?>/assets/dashboard/images/2.jpg",
        "<?php echo base_url();?>/assets/dashboard/images/3.jpg",
        "<?php echo base_url();?>/assets/dashboard/images/4.jpg"
        ], {
          fade: 1500,
          duration: 5000
    }
    );
});
</script>