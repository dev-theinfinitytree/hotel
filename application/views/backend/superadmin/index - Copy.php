
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    
    
    <link rel='stylesheet prefetch' href='http://fian.my.id/marka/static/marka/css/marka.css'>

        <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/drop-down/css/style.css">

  <style>
  #dropdown-menu li a:hover{
	  color:#33D0E1;
	  font-weight:bold;
  }
 
  </style> 
  
  
    
    
   <?php

          $form = array(
                'class' 			=> 'form-body',
                'id'				=> 'form',
                'method'			=> 'post'
          );

      echo form_open_multipart('superadmin/redirect',$form);

if(isset($hotels)&& $hotels):
?> 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://fian.my.id/marka/static/marka/js/marka.js'></script>
  <script src="<?php echo base_url();?>assets/dashboard/drop-down/js/index.js"></script>
  

   
		<div class="container">
			<!--<h1>Material Design Dropdown Button</h1>-->
     <img src="<?php echo base_url();?>assets/dashboard/assets/admin/layout/img/logo-hotel.png" alt="logo" class="logo-default" style="width:56%; margin-top: 29px; margin-left: -42px;"/>
            
			<div class="button-group">
			<i id="icon"></i>
			<a id="input" href="">Choose an option</a>
			  <ul id="dropdown-menu">
              <?php foreach($hotels as $hot):?>
			  
			   <script type="text/javascript">
  	function xyz(){
		 //document.getElementByClass("hidden_value").value=<?php $hot->hotel_id; ?>;
	 document.getElementById('form').submit();
	 }
  </script>
			 
			    <li><a onclick="xyz()" name="" style="cursor:pointer;" ><?php echo $hot->hotel_name; ?></a>
                <input type="hidden" value="<?php echo $hot->hotel_id; ?>"  name="user_hotel" class="hidden_value" />
                </li>
              <?php endforeach; ?>
			  </ul>
			</div>
            <?php endif; ?>
		</div>
	<?php form_close(); ?>
   

    
    
    
  
