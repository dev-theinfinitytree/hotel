<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>My Hotel</title>
    
        <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/style.css">
        <script src='<?php echo base_url();?>assets/common/js/jquery.min.js'></script>
        <script src='<?php echo base_url();?>assets/common/js/jquery.validate.min.js'></script>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico"/>

  </head>

  <body>
  <style>
  form{ background:rgba(256,256,256,.1)}
  .container {
    margin: 50% auto 0;
    margin-top: 84px;
  }
  </style>

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
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
        <li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

    <script src="<?php echo base_url();?>assets/login/js/index.js"></script>

    
    
    
  </body>
</html>
