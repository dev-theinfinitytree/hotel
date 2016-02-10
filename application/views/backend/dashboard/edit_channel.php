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
</style>
<!--<script src="../../../../assets/common/js/jquery.min.js" type="text/javascript"></script>-->
<<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
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
								<span class="caption-subject bold uppercase"> Edit Channel</span>
							</div>
						</div>
                    <?php

                    $form = array(
                        'class' 			=> 'form-body',
                        'id'				=> 'form',
                        'method'			=> 'post'
                    );

                    echo form_open_multipart('dashboard/edit_channel',$form);

                    ?>
					<input type="hidden" name="channel_id" value="<?php echo $channel->channel_id; ?>" />
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
                                
                                
								<div class="row">
                                    
									<div class="form-group form-md-line-input col-md-4">
										<input type="text" autocomplete="off" class="form-control" id="ct_name" name="channel_name"  onkeypress="return onlyLtrs(event, this);" value="<?php echo $channel->channel_name;?>">
										<label>	Channel Name<span class="required" id="b_contact_name">*</span></label>
										<span class="help-block">Channel Name...</span>
									</div>
									
									<div class="form-group form-md-line-input col-md-4">
										<input type="text" autocomplete="off" class="form-control" id="ct_name" name="channel_contact_name"  value="<?php echo $channel->channel_contact_name;?>" onkeypress="return onlyLtrs(event, this);">
										<label>	Contact Name<span class="required" id="b_contact_name">*</span></label>
										<span class="help-block">Contact Name...</span>
									</div>
									<div class="form-group form-md-line-input col-md-4">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="channel_address" required="required" value="<?php echo $channel->channel_address;?>">
										<label>Address <span class="required">*</span></label>
										<span class="help-block">Enter Full Address...</span>
									</div>
									<div class="form-group form-md-line-input col-md-4">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="channel_contact" value="<?php echo $channel->channel_contact;?>" required="required" onkeypress="return onlyNos(event, this);" maxlength="10" >
										<label>Mobile No. <span class="required">*</span></label>
										<span class="help-block">Enter Mobile No...</span>
									</div>
									<div class="form-group form-md-line-input col-md-4">
										<input  type="email" autocomplete="off" class="form-control" id="form_control_1" name="channel_email" value="<?php echo $channel->channel_email;?>" >
										<label>Email </label>
										<span class="help-block">Enter Email Adress...</span>
									</div>
									
									<div class="form-group form-md-line-input col-md-3">
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="channel_website" value="<?php echo $channel->channel_website;?>">
										<label>Website </label>
										<span class="help-block">Enter Website...</span>
									</div>
									<div class="form-group form-md-line-input col-md-3">
									
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="channel_pan" value="<?php echo $channel->channel_pan;?>" required="required">
										<label>Pan Card No. <span class="required">*</span></label>
										<span class="help-block">Enter Pan Card No...</span>
									</div>
								
									<div class="form-group form-md-line-input col-md-3">
									
										<input type="text" autocomplete="off" class="form-control" id="form_control_1" name="channel_bank_acc_no" value="<?php echo $channel->channel_bank_acc_no;?>" required="required" onkeypress="return onlyNos(event, this);">
										<label>Bank Account no. <span class="required">*</span></label>
										<span class="help-block">Enter Bank Account no...</span>
									</div>
								
									<div class="form-group form-md-line-input col-md-3">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="channel_bank_ifsc" value="<?php echo $channel->channel_bank_ifsc;?>" required="required">
										<label>IFSC Code <span class="required">*</span></label>
										<span class="help-block">Enter IFSC Code...</span>
									</div>
                                    
                                    <div class="form-group form-md-line-input col-md-3">
									
										<input type="text"  autocomplete="off" class="form-control" id="form_control_1" name="channel_commission" value="<?php echo $channel->channel_commission;?>" required="required">
										<label>Commission % <span class="required">*</span></label>
										<span class="help-block">Enter commission %...</span>
									</div>
								
									<div class="form-group form-md-line-input form-md-floating-label col-md-12">
									<h3>Photo Proof</h3>
                                    <div class="upload-one" id="">
                                    	<img  onclick="return showChange();" src="<?php echo base_url();?>upload/channel/<?php if( $channel->channel_photo_thumb== '') { echo "no_images.png"; } else { echo $channel->channel_photo_thumb; }?>" alt=""/> <br /><br />
                                   
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
                            <?php form_close(); ?>
	<!-- END CONTENT -->
</div>

</div>
</div>
	<!-- END CONTENT -->
	</div>
    
    