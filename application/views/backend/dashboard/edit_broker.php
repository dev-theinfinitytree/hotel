<!-- BEGIN PAGE CONTENT-->
<style>
.ds .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px;}
.ds .form-group.form-md-line-input{ margin-bottom:15px;}
.ds .lt{line-height: 38px;}
  .ds .tld{  margin-bottom: 10px !important;  padding-top: 10px;}
	.tld_in{ background-color: #f8f8f8;    width: 100%;float: left;padding-top: 7px;}
	.tld_in:hover{ background-color: #f1f1f1;}
	.ds .dropzone .dz-default.dz-message{width: 100%;height: 50px;margin-left:0px; margin-top:0px;
    top: 0;left: 0;font-size: 50%;}
	.ds .dropzone{min-height: 130px;}
	.upload-one{
	width:20%;
	height:200px;
	float:left;
	border:0px solid red;
}
.imageP {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
   /* -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);*/
    display: inline-block;
}
.imageP  img{
	width:100%;
}


</style>
<!--<script src="../../../../assets/common/js/jquery.min.js" type="text/javascript"></script>-->
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
    	 $("#pic").hide();
		 if($('#agency_yn').val() == '5')
		 {
			 //alert($('#agency_yn').val());
			 //$("#b_agency_name").show();
		 }
		 else{
			$("#chk").hide();
		 	$("#b_agency_name").hide();
		 	$("#ct_name").attr("required","true");	
		 }
    });
	
	function hideShow(t)
	{
		if($('#agency_yn').val() == '5')
		{
			$("#chk").show();
			$("#b_agency_name").show();
			$("#b_contact_name").hide();
			$("#ct_name").removeAttr("required");
			$("#ag_name").attr("required","true");
		 	//$("#ct_name").attr("required","false");
		}
		else
		{
			$("#chk").hide();
			$("#b_agency_name").show();
			$("#b_contact_name").show();
			//$("#ag_name").attr("required","false");
		 	$("#ct_name").attr("required","true")
			$("#ag_name").removeAttr("required");
			$("#ag_name").val("");
		}
	}
	function showChange()
	{
		$("#pic").show();
		$("#btnchange").hide();
		return false;
	}
	
	
	
	/*$(function() {
    	$("#uploadFile").on("change", function()
    	{
        	var files = !!this.files ? this.files : [];
       		if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
	        if (/^image/.test( files[0].type)){ // only image file
    	        var reader = new FileReader(); // instance of the FileReader
        	    reader.readAsDataURL(files[0]); // read the local file
 
            	reader.onloadend = function(){ // set image data as background of div
                	$("#imagePreview").css("background-image", "url("+this.result+")");
            	}
        	}
    	});
	  });*/
	  
	  
	   $(function () {
    $("#uploadFile").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#imagePreview");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "height:100px;width: 100px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
	
</script>
			<div class="row ds">
				<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase"> Edit Broker</span>
							</div>
						</div>
                    <?php

                    $form = array(
                        'class' 			=> 'form-body',
                        'id'				=> 'form',
                        'method'			=> 'post'
                    );

                    echo form_open_multipart('dashboard/edit_broker',$form);
					
                    ?>
						<div class="portlet-body form">

								<div class="form-body">
                                			<?php if($this->session->flashdata('err_msg')):?>
                                            	<div class="form-group">
                                                 	<div class="col-md-12 control-label">
                                                    	<div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            	<span aria-hidden="true">&times;</span>
                                                        	</button>
                                                        	<strong><?php echo $this->session->flashdata('err_msg');?></strong>
                                                    	</div>
												  	</div>
                                            	</div>
                                                <?php endif;?>
                                                <?php if($this->session->flashdata('succ_msg')):?>
                                            	<div class="form-group">
                                                 	<div class="col-md-12 control-label">
                                                    	<div class="alert alert-success alert-dismissible text-center" role="alert">
                                                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            	<span aria-hidden="true">&times;</span>
                                                        	</button>
                                                        	<strong><?php echo $this->session->flashdata('succ_msg');?></strong>
                                                    	</div>
												  	</div>
                                            	</div>
                                                <?php endif;?>
                                
                                
                                <?php
								foreach($value as $broker_edit)
								{
						
										if($broker_edit->b_agency==5){
										$agnc = "Yes";}
										else{
										$agnc = "No";
								}
								?>
								<div class="row">
									<div class="form-group form-md-line-input  has-info col-md-4">
										<select class="form-control" id="agency_yn" name="b_agency" onchange="hideShow();" >
                                        	<option value="<?php echo$broker_edit->b_agency; ?>"><?php echo $agnc; ?></option>
											<?php if($broker_edit->b_agency == 5 ){ ?>
                                            	<option value="6">No</option>
                                            <?php } else {?>
                                            	<option value="5">Yes</option>
                                            <?php } ?>
										</select>
										<label for="form_control_2">Agency? <span class="required">*</span></label>
									</div>
									<div class="form-group form-md-line-input  col-md-4" id="chk">
									
										<input autocomplete="off" type="text" class="form-control" id="ag_name" name="b_agency_name" onkeypress="return onlyLtrs(event, this);" value="<?php echo $broker_edit->b_agency_name; ?>">
										<label>Agency Name <span class="required" id="b_agency_name">*</span></label>
										<span class="help-block">Enter Agency Name...</span>
									</div>
									
									<div class="form-group form-md-line-input  col-md-4">
										<input type="text" autocomplete="off" class="form-control" id="ct_name" name="b_name"  onkeypress="return onlyLtrs(event, this);" value="<?php echo $broker_edit->b_name; ?>">
										<label>	Contact Name<span class="required" id="b_contact_name">*</span></label>
										<span class="help-block">Contact Name...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-4">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_address" required value="<?php echo $broker_edit->b_address; ?>" >
										<label>Address <span class="required">*</span></label>
										<span class="help-block">Enter Full Address...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-4">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_contact" required onkeypress="return onlyNos(event, this);" maxlength="10" value="<?php echo $broker_edit->b_contact; ?>" >
										<label>Mobile No. <span class="required">*</span></label>
										<span class="help-block">Enter Mobile No...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-4">
										<input  type="email" autocomplete="off" class="form-control" id="form_control_1" name="b_email" value="<?php echo $broker_edit->b_email; ?>" >
										<label>Email </label>
										<span class="help-block">Enter Email Adress...</span>
									</div>
									
									<div class="form-group form-md-line-input  col-md-3">
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="b_website" value="<?php echo $broker_edit->b_website; ?>">
										<label>Website </label>
										<span class="help-block">Enter Website...</span>
									</div>
									<div class="form-group form-md-line-input  col-md-3">
									
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="b_pan" required value="<?php echo $broker_edit->b_pan; ?>">
										<label>Pan Card No. <span class="required">*</span></label>
										<span class="help-block">Enter Pan Card No...</span>
									</div>
								
									<div class="form-group form-md-line-input  col-md-3">
									
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="b_bank_acc_no" required onkeypress="return onlyNos(event, this);" value="<?php echo $broker_edit->b_bank_acc_no; ?>">
										<label>Bank Account no. <span class="required">*</span></label>
										<span class="help-block">Enter Bank Account no...</span>
									</div>
								
										<div class="form-group form-md-line-input  col-md-3">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_bank_ifsc" required value="<?php echo $broker_edit->b_bank_ifsc; ?>">
										<label>IFSC Code <span class="required">*</span></label>
										<span class="help-block">Enter IFSC Code...</span>
                                        <input type="hidden" name="broker_id" value="<?php echo $broker_edit->b_id; ?>" />
									</div>
                                    
                                    <div class="form-group form-md-line-input  col-md-3">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="b_commission" required="required" value="<?php echo $broker_edit->broker_commission; ?>">
										<label>Commission <span class="required">*</span></label>
										<span class="help-block">Enter commission...</span>
									</div>
								
									<div class="form-group form-md-line-input form-md-floating-label col-md-12">
									<h3>Photo Proof</h3>
                                    <div class="upload-one" id="">
                                    	<img  onclick="return showChange();" src="<?php echo base_url();?>upload/broker/<?php if( $broker_edit->b_photo_thumb== '') { echo "no_images.png"; } else { echo $broker_edit->b_photo_thumb; }?>" alt=""/> <br /><br />
                                   
                                   <br />
                                    <div class="fileupld" id="pic"> <input  type="file" id="uploadFile" name="image_photo" />   </div>
                                    
                                      
                                    </div>
                                    <div id="imagePreview" class="imageP"  ></div>
                                    
                                    
                                    
			<!--<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>-->
                    					<!-- 17.11.2015 -->
                    					
                                        <!-- 17.11.2015 -->
						</div>
							

</div>
<div class="form-actions noborder">
									<button type="submit" class="btn blue">Submit</button>
									<button  type="reset" class="btn default">Reset</button>
								</div>
</div>
                            <?php 
							}
							form_close(); ?>
	<!-- END CONTENT -->
</div>

</div>
</div>
	<!-- END CONTENT -->
	</div>
    
    