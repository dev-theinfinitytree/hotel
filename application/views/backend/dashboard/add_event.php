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

</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dashboard/Colorpicker/farbtastic.css">
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/Colorpicker/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dashboard/Colorpicker/farbtastic.js" type="text/javascript"></script>



<script type="text/javascript">

   /* $(document).ready(function() {
        $('#picker').farbtastic('#color');
    });
   */
   /* $(document).ready(function(){
        $("form").submit(function(){

            $.valid_from = Date.parse($('#c_valid_from').val());
            $.valid_upto = Date.parse($('#c_valid_upto').val());
            $.renewal = Date.parse($('#c_renewal').val());
            $.value = $.now();

            if($.valid_from > $.value)
            {
                alert('Valid Date Should Be Lesser Than The System Date');
                return false;
            }else if($.valid_upto < $.value)
            {
                alert('Valid Upto Date Should Be Greater Than The Todays Date');
                return false;
            }
            else if ($.renewal < $.value)
            {
                alert('Renewal Date Should Be Greater Than The Todays Date');
                return false;
            }
            else
            {
                return true;
            }

        });
    });*/

</script>
<div class="form-body">
    <!-- 17.11.2015-->
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
</div>

<div class="row ds">
    <div class="col-md-12">
        <!---->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-pin font-green"></i>
                    <span class="caption-subject bold uppercase"> Add Event</span>
                </div>

            </div>
            <div class="portlet-body form">


                <?php

                $form = array(
                    'class' 			=> 'form-body',
                    'id'				=> 'form',
                    'method'			=> 'post'
                );

                echo form_open_multipart('dashboard/add_event',$form);

                ?>
                <div class="row">

                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                        <input type="text" autocomplete="off" class="form-control" name="e_name" required="required">
                        <label>Event Name <span class="required">*</span></label>
                        <span class="help-block">Enter Event Name...</span>
                    </div>

                    <div class="form-group form-md-line-input col-md-4">

                        <input type="text" autocomplete="off" required="required" name="e_from" class="form-control date-picker "  id="c_valid_from" >
                        <label>Event From <span class="required">*</span></label>


                        <label for="form_control_3"></label>
                        <span class="help-block">Enter Valid Date... </span>
                    </div>
                    <div class="form-group form-md-line-input col-md-4">

                        <input type="text" autocomplete="off" required="required" name="e_upto" class="form-control date-picker" id="c_valid_upto" >
                        <label>Event Up to <span class="required">*</span></label>
                        <label for="form_control_2"></label>
                        <span class="help-block">Enter Valid Up to Date...  </span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                        <input type="checkbox" autocomplete="off"  name="e_notify" class="form-control " value="1"  >
                        <label>Notify While Taking Booking? <span class="required">*</span></label>
                        <label for="form_control_2"></label>
                        <span class="help-block">Notify While Taking Booking?..  </span>
                    </div>

                    <div class="form-group form-md-line-input col-md-4 last">

                        <input type="text" name="e_event_color" required="required" placeholder="#FFFFFF" id="pickcolor" class="form-control call-picker">
                        <div class="color-holder call-picker"></div>
                        <div class="color-picker" id="color-picker" style="display: none"></div>

                        <label>Mention the Color You want to Apply To Your Event<span class="required">*</span></label>
                        <label for="form_control_2"></label>
                        <span class="help-block">Want Your Event to Be colorful?..  </span>
                    </div>
                    <div class="form-group form-md-line-input col-md-4 last">

                        <input type="text" name="e_event_text_color" required="required" placeholder="#FFFFFF" id="pickcolor2" class="form-control call-picker2">
                        <div class="color-holder call-picker2"></div>
                        <div class="color-picker" id="color-picker2" style="display: none"></div>

                        <label>Mention the Color You want to Apply To Your Text <span class="required">*</span></label>
                        <label for="form_control_2"></label>
                        <span class="help-block">Want Your Event to Be more colorful?..  </span>
                    </div>



                    </div>




                </div>

                <div class="row">

                    <div class="color-wrapper">
                       
                        
                        
                    </div>
                                                            
                </div>


                <br>


                <div class="clearfix"></div>


            </div>
            <br>
            <div class="form-actions noborder">
                <button type="submit" class="btn blue" >Submit</button>
                <button type="submit" class="btn default">Reset</button>
            </div>
            <?php form_close(); ?>
        </div>

    </div>
    <div class="clearfix"><?php  $this->session->flashdata('succ_msg') ?></div>
    <!---->

</div>
<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->

<style>
    .color-wrapper {
        position: relative;
        width: 250px;
        margin: 20px auto;
    }

    .color-wrapper p {
        margin-bottom: 5px;
    }

    input.call-picker {
        border: 1px solid #AAA;
        color: #666;
        text-transform: uppercase;
        float: left;
        outline: none;
        padding: 10px;
        text-transform: uppercase;
        width: 85px;
    }

    .color-picker {
        width: 130px;
        background: #F3F3F3;
        height: 103px;
        padding: 5px;
        border: 5px solid #fff;
        box-shadow: 0px 0px 3px 1px #DDD;
        position: absolute;
        top: 61px;
        left: 2px;
    }

    .color-holder {
    background: #fff;
    cursor: pointer;
    border: 1px solid #AAA;
    width: 20px;
    height: 20px;
    float: left;
    /* margin-left: 16px; */
    margin-top: 9px;
}

    .color-picker .color-item {
        cursor: pointer;
        width: 10px;
        height: 10px;
        list-style-type: none;
        float: left;
        margin: 2px;
        border: 1px solid #DDD;
    }

    .color-picker .color-item:hover {
        border: 1px solid #666;
        opacity: 0.8;
        -moz-opacity: 0.8;
        filter: alpha(opacity=8);
    }
	.form-group.form-md-line-input.help-block.last {
   
    margin-top: 37px;
    
}
</style>

<script>
    var colorList = ['000000', '993300', '333300', '003300', '003366', '000066', '333399', '333333',
        '660000', 'FF6633', '666633', '336633', '336666', '0066FF', '666699', '666666', 'CC3333', 'FF9933', '99CC33', '669966', '66CCCC', '3366FF', '663366', '999999', 'CC66FF', 'FFCC33', 'FFFF66', '99FF66', '99CCCC', '66CCFF', '993366', 'CCCCCC', 'FF99CC', 'FFCC99', 'FFFF99', 'CCffCC', 'CCFFff', '99CCFF', 'CC99FF', 'FFFFFF'
    ];
    var picker = $('#color-picker');

    for (var i = 0; i < colorList.length; i++) {
        picker.append('<li class="color-item" data-hex="' + '#' + colorList[i] + '" style="background-color:' + '#' + colorList[i] + ';"></li>');
    }

    $('body').click(function() {
        picker.fadeOut();
    });

    $('.call-picker').click(function(event) {
        event.stopPropagation();
        picker.fadeIn();
        picker.children('li').hover(function() {
            var codeHex = $(this).data('hex');

            $('.color-holder').css('background-color', codeHex);
            $('#pickcolor').val(codeHex);
        });
    });

    var picker2 = $('#color-picker2');

    for (var i2 = 0; i2 < colorList.length; i2++) {
        picker2.append('<li class="color-item" data-hex="' + '#' + colorList[i2] + '" style="background-color:' + '#' + colorList[i2] + ';"></li>');
    }

    $('body').click(function() {
        picker2.fadeOut();
    });

    $('.call-picker2').click(function(event) {
        event.stopPropagation();
        picker2.fadeIn();
        picker2.children('li').hover(function() {
            var codeHex = $(this).data('hex');

            $('.color-holder2').css('background-color', codeHex);
            $('#pickcolor2').val(codeHex);
        });
    });
</script>