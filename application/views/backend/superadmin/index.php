<!--
/**
 * Created by PhpStorm.
 * User: subhabrata
 * Date: 11/11/2015
 * Time: 12:13 AM
 */
 -->
 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 <style>
 body{
	 background:#364150;
	/* background-image: -webkit-gradient(
	linear,
	left bottom,
	right top,
	color-stop(0, #3C3C3D),
	color-stop(1, #8F8D99)
);
background-image: -o-linear-gradient(right top, #3C3C3D 0%, #8F8D99 100%);
background-image: -moz-linear-gradient(right top, #3C3C3D 0%, #8F8D99 100%);
background-image: -webkit-linear-gradient(right top, #3C3C3D 0%, #8F8D99 100%);
background-image: -ms-linear-gradient(right top, #3C3C3D 0%, #8F8D99 100%);
background-image: linear-gradient(to right top, #3C3C3D 0%, #8F8D99 100%);*/
 }
/* body{
	background: linear-gradient(270deg, #dcc2f5, #0d032d);
background-size: 400% 400%;

-webkit-animation: AnimationName 30s ease infinite;
-moz-animation: AnimationName 30s ease infinite ;
-o-animation: AnimationName 30s ease  infinite;
animation: AnimationName 30s ease infinite ;


@-webkit-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@-o-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@keyframes AnimationName { 
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
 }*/
 
 .center{
	border: 0px solid red;
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
   margin-top: 180px !important;
    vertical-align: middle !important;
    width: 460px;
	text-align:center;
	
 }
 .center p{
	 font-size:22px;
	
	 color:#FFF;
	font-family: "Open Sans", sans-serif;
	letter-spacing: 1px;
 }
 select{
	/*background: #1caf9a;*/
	background: #33d0e1;
   /* width: 188px;
    height: 52px;*/
    /* border-radius: 18px; */
    font-size: 20px;
    padding: 15px;
   font-family: "Open Sans", sans-serif;
    outline: none;
    border: 2px solid white;
    color: #0C0C0C;
	letter-spacing: 1px;
 }

 .opt{
	 border-radius: 8px;
    
 }
 .btn:hover{
	color:#333333;
	background:#099;
	border:1px solid black; 
 }
.opt:hover{
	 background:yellow !important;
 }
 
 </style>

 <script>
 
 function xyz(){
	 
	 document.getElementById('form').submit();
	 
	 
	 }
 </script>


<?php

                            $form = array(
                                'class' 			=> 'form-body',
                                'id'				=> 'form',
                                'method'			=> 'post'
                            );

                            echo form_open_multipart('superadmin/redirect',$form);

if(isset($hotels)&& $hotels):
?>


<div class="center">
<h1 style="font-family:Antonio; color:#fff; letter-spacing: 3px;"> <img src="<?php echo base_url();?>/assets/dashboard/assets/admin/layout/img/hotel-object1.png" style="width: 44%; margin-top: 24px; margin-left: 7px;"></h1>
<p>Select hotel you want to enter</p>
    <select  name="user_hotel" onchange="xyz()" >
    <option class="opt" value="">Select Hotel</option>
        <?php foreach($hotels as $hot):
    ?>
        <option  value="<?php echo $hot->hotel_id; ?>"><?php echo $hot->hotel_name; ?></option>
        <?php endforeach; ?>
    </select>


    <!--<button class="btn" type="submit" id="go">Go to preffered hotel</button>-->


<?php endif; ?>
</div>


<?php form_close(); ?>
