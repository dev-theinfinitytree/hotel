<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>My Hotel</title>
    
      <!--  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/style.css">
        <script src='<?php echo base_url();?>assets/common/js/jquery.min.js'></script>-->
        
		
		
		
		<!----------------------------------->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>/assets/dashboard/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico"/>
  </head>

  <body class="login">
  <style>
  
  .alert-danger {
    background-color: rgba(243, 86, 137, 0.24);
    border: none;
    border-color: none;
    color: rgba(226, 222, 223, 0.41);
}
.login .content p, .login .content label {
    color: #fdfdfd;
}
  .login {
    background-color: #364150 !important;
}
 
  
  .login .logo {
    margin: 5px auto -20px auto;
    padding: 15px;
    text-align: center;
}
[class^="fa-"]:not(.fa-stack), [class^="glyphicon-"], [class^="icon-"], [class*=" fa-"]:not(.fa-stack), [class*=" glyphicon-"], [class*=" icon-"] {
   
    color: #C5B1B1;
    
}
form {
    
	background:none;
}
.login .content .form-actions .checkbox {
    margin-top: 10px;
    display: inline-block;
    margin-left: 21px;
}
  </style>

<style>
.has-error .help-block{ background:#f8f8f8; width:100%; padding:5px;}


/* 
 _____   _           _         _                        _                  
|_   _| | |         | |       | |                      | |                 
  | |   | |__   __ _| |_ ___  | |_ ___  _ __ ___   __ _| |_ ___   ___  ___ 
  | |   | '_ \ / _` | __/ _ \ | __/ _ \| '_ ` _ \ / _` | __/ _ \ / _ \/ __|
 _| |_  | | | | (_| | ||  __/ | || (_) | | | | | | (_| | || (_) |  __/\__ \
 \___/  |_| |_|\__,_|\__\___|  \__\___/|_| |_| |_|\__,_|\__\___/ \___||___/

Oh nice, welcome to the stylesheet of dreams. 
It has it all. Classes, ID's, comments...the whole lot:)
Enjoy responsibly!
@ihatetomatoes

*/

/* ==========================================================================
   Chrome Frame prompt
   ========================================================================== */

.chromeframe {
    margin: 0.2em 0;
    background: #ccc;
    color: #000;
    padding: 0.2em 0;
}

/* ==========================================================================
   Author's custom styles
   ========================================================================== */
p {
    line-height: 1.33em;
    color: #7E7E7E;
}
h1 {
    color: #EEEEEE;
}

#loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
}
#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
   /* border-top-color: #3498db;*/

    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */

    z-index: 1001;
}

    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;

        -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;

        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    @-webkit-keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

    #loader-wrapper .loader-section {
        position: fixed;
        top: 0;
        width: 51%;
        height: 100%;
        background: #222222;
        z-index: 1000;
        -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(0);  /* IE 9 */
        transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
    }

    #loader-wrapper .loader-section.section-left {
        left: 0;
    }

    #loader-wrapper .loader-section.section-right {
        right: 0;
    }

    /* Loaded */
    .loaded #loader-wrapper .loader-section.section-left {
        -webkit-transform: translateX(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateX(-100%);  /* IE 9 */
                transform: translateX(-100%);  /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #loader-wrapper .loader-section.section-right {
        -webkit-transform: translateX(100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateX(100%);  /* IE 9 */
                transform: translateX(100%);  /* Firefox 16+, IE 10+, Opera */

-webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }
    
    .loaded #loader {
        opacity: 0;
        -webkit-transition: all 0.3s ease-out;  
                transition: all 0.3s ease-out;
    }
    .loaded #loader-wrapper {
        visibility: hidden;

        -webkit-transform: translateY(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateY(-100%);  /* IE 9 */
                transform: translateY(-100%);  /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.3s 1s ease-out;  
                transition: all 0.3s 1s ease-out;
    }
    
    /* JavaScript Turned Off */
    .no-js #loader-wrapper {
        display: none;
    }
    .no-js h1 {
        color: #222222;
    }

    #content {
        margin: 0 auto;
        padding-bottom: 50px;
        width: 80%;
        max-width: 978px;
    }  






/* ==========================================================================
   Helper classes
   ========================================================================== */

/*
 * Image replacement
 */

.ir {
    background-color: transparent;
    border: 0;
    overflow: hidden;
    /* IE 6/7 fallback */
    *text-indent: -9999px;
}

.ir:before {
    content: "";
    display: block;
    width: 0;
    height: 150%;
}

/*
 * Hide from both screenreaders and browsers: h5bp.com/u
 */

.hidden {
    display: none !important;
    visibility: hidden;
}

/*
 * Hide only visually, but have it available for screenreaders: h5bp.com/v
 */

.visuallyhidden {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

/*
 * Extends the .visuallyhidden class to allow the element to be focusable
 * when navigated to via the keyboard: h5bp.com/p
 */

.visuallyhidden.focusable:active,
.visuallyhidden.focusable:focus {
    clip: auto;
    height: auto;
    margin: 0;
    overflow: visible;
    position: static;
    width: auto;
}

/*
 * Hide visually and from screenreaders, but maintain layout
 */

.invisible {
    visibility: hidden;
}

/*
 * Clearfix: contain floats
 *
 * For modern browsers
 * 1. The space content is one way to avoid an Opera bug when the
 *    `contenteditable` attribute is included anywhere else in the document.
 *    Otherwise it causes space to appear at the top and bottom of elements
 *    that receive the `clearfix` class.
 * 2. The use of `table` rather than `block` is only necessary if using
 *    `:before` to contain the top-margins of child elements.
 */

.clearfix:before,
.clearfix:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.clearfix:after {
    clear: both;
}

/*
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */

.clearfix {
    *zoom: 1;
}

/* ==========================================================================
   EXAMPLE Media Queries for Responsive Design.
   These examples override the primary ('mobile first') styles.
   Modify as content requires.
   ========================================================================== */

@media only screen and (min-width: 35em) {
    /* Style adjustments for viewports that meet the condition */
}

@media print,
       (-o-min-device-pixel-ratio: 5/4),
       (-webkit-min-device-pixel-ratio: 1.25),
       (min-resolution: 120dpi) {
    /* Style adjustments for high resolution devices */
}

/* ==========================================================================
   Print styles.
   Inlined to avoid required HTTP connection: h5bp.com/r
   ========================================================================== */

@media print {
    * {
        background: transparent !important;
        color: #000 !important; /* Black prints faster: h5bp.com/s */
        box-shadow: none !important;
        text-shadow: none !important;
    }

    a,
    a:visited {
        text-decoration: underline;
    }

    a[href]:after {
        content: " (" attr(href) ")";
    }

    abbr[title]:after {
        content: " (" attr(title) ")";
    }

    /*
     * Don't show links for images, or javascript/internal links
     */

    .ir a:after,
    a[href^="javascript:"]:after,
    a[href^="#"]:after {
        content: "";
    }

    pre,
    blockquote {
        border: 1px solid #999;
        page-break-inside: avoid;
    }

    thead {
        display: table-header-group; /* h5bp.com/t */
    }

    tr,
    img {
        page-break-inside: avoid;
    }

    img {
        max-width: 100% !important;
    }

    @page {
        margin: 0.5cm;
    }

    p,
    h2,
    h3 {
        orphans: 3;
        widows: 3;
    }

    h2,
    h3 {
        page-break-after: avoid;
    }
}

/* 
	Ok so you have made it this far, that means you are very keen to on my code. 
	Anyway I don't really mind it. This is a great way to learn so you actually doing the right thing:)
	Follow me @ihatetomatoes
*/



</style>
<!--

    <div class="wrapper">
	<div class="container">
		<h1>Welcome to Hotel Objects</h1>
        <?php if(isset($msg) && $msg){
			echo "<label>$msg</label>";
		}
		if(isset($user_name) && $user_name){
			$user = $user_name;
		}else{
			$user = '';
		}
		
		if(isset($user_name) && $user_name){
			$user = $user_name;
		}else{
			$user = '';
		}
		
		if(isset($password) && $password){
			$pass = $password;
		}else{
			$pass = '';
		}
		
		if(isset($remember) && $remember){
			$rem = TRUE;
		}else{
			$rem = FALSE;
		}
        
		$attributes = array(
				   'class' 			=> 'form',
				   'id'				=> 'loginForm',
				   'autocomplete'	=> 'off'
				);
		$username = array(
				  'type'			=> 'text',
				  'name'       	 	=> 'user_name',
				  'id'          	=> 'user_name',
				  'placeholder' 	=> 'Username',
				  'maxlength'   	=> '20',
				  'value'			=> $user
				);
				
		$password = array(
				  'type'			=> 'password',
				  'name'        	=> 'user_password',
				  'id'          	=> 'user_password',
				  'placeholder' 	=> 'Password',
				  'maxlength'   	=> '50',
				  'value'			=> $pass
				);
		$submit = array(
				  'id'				=> 'login-button',
				  'value'			=> 'Login'
				);
		echo form_open('login/user_login',$attributes);
		?>
			<p><?php echo form_input($username);?></p>
			<p><?php echo form_input($password);?></p>
            <p><?php echo form_checkbox('remember', 'remember', $rem);?>&nbsp;Remember Me </p>
            <p><a href="#">Forgot Password</a></p>
			<p><?php echo form_submit($submit);?></p>
		<?php echo form_close();?>
	</div>
	
	
</div>
-->





 <!------>
  <!-- BEGIN LOGO -->
<div class="logo">
	<!--<a href="index.html">
	<img src="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/img/logo-big.png" alt=""/>-->
	<h1 style="color:#fff;font-family:Antonio;letter-spacing: 3px;"><strong> <img src="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/img/hotel-object1.png" style="width: 23%; margin-top: 40px; margin-bottom: 33px;"></strong></h1>
	<!--</a>-->
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	 <?php

                            $form = array(
                                'class' 			=> 'form-body',
                                'id'				=> 'form',
                                'method'			=> 'post'
                            );

                            echo form_open_multipart('login/user_login',$form);

                            ?>
		<h3 class="form-title">Login to your account</h3>
		<?php if(isset($msg)&& $msg):
		?>
		<div class="alert alert-danger ">
			<button class="close" data-close="alert"></button>
			<span>
			<?php if(isset($msg) && $msg){
			echo "$msg"; }?>
		</span>
		</div>
		<?php endif; ?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="user_name"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="user_password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>
			<button type="submit" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<!--<div cslass="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="facebook" data-original-title="facebook" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="twitter" data-original-title="Twitter" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="googleplus" data-original-title="Goole Plus" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="linkedin" data-original-title="Linkedin" href="javascript:;">
					</a>
				</li>
			</ul>
		</div>-->
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="javascript:;" id="forget-password" style="color: #32CFE1; font-weight: bold;">
				here </a>
				to reset your password.
			</p>
		</div>
		<?php echo form_close(); ?>
		<!--<div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp; <a href="javascript:;" id="register-btn">
				Create an account </a>
			</p>
		</div>-->
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn blue pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
 <!--<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

		</div>-->
        
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 
 
 <script src="https://github.com/Modernizr/Modernizr/raw/master/modernizr.js"></script>
 <script>
  // Wait for window load
  $(window).load(function() {
   // Animate loader off screen
   $("#loader").animate({
    top: -200
   }, 1500);
  });
 </script>
 <img src="horizontal_loader.gif" id="loader">-->
</div>

<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2015 &copy; <a href="http://www.theinfinitytree.com/ title="The Infinity Tree" style="color:#fff;">The Infinity Tree</a>
</div>
<!-- END COPYRIGHT -->
  
  
  
  
  
  
  
  
  <!---->




   

    
    <!----------------------------->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/dashboard/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>/assets/dashboard/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/dashboard/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src='<?php echo base_url();?>assets/common/js/jquery.validate.min.js'></script>
 <script src="<?php echo base_url();?>assets/login/js/index.js"></script>
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
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
<!-- END JAVASCRIPTS -->
    
  </body>
</html>