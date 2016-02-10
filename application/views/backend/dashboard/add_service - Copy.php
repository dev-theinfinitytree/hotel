<!-- BEGIN PAGE CONTENT-->
<style>
    .ds .required {
        color: #e02222;
        font-size: 12px;
        padding-left: 2px;
    }
    .ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px; top:14px;}
    .ds .form-group.form-md-line-input{ margin-bottom:25px; margin-left:0px; margin-right:0px;}
    .ds .lt{    color: #999;font-size: 16px;}
    .ds .tld{  margin-bottom: 10px !important;  padding-top: 10px;}
    .tld_in{   width: 100%;float: left;padding-top: 7px;}
    .ds .form-group.form-md-line-input.form-md-floating-label .form-control.edited ~ label{top: -10px;}

    .nav>li>a {
        position: relative;
        display: block;
        padding: 10px 11px;
    }
    .col-md-10 {
        width: 83.33333333%;
        margin-top: 8px;
    }
    ::-webkit-input-placeholder {
        font-size: 11px;
        padding-top: 2px;
    }
    ::-moz-placeholder{
        font-size: 11px;
        padding-top: 2px;
    }
	.master {
    width: 100%;
    height: 36px;
}
.dropdown-menu {
    min-width: 100%!important;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    list-style: none;
    /* text-shadow: none; */
    padding: 0px;
    background-color: white;
    margin: 10px 0px 0px 0px;
     box-shadow: 0px 0px rgba(102, 102, 102, 0.1) !important; 
    border: 1px solid #eee;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
}
.dropdown > .dropdown-menu, .dropdown-toggle > .dropdown-menu, .btn-group > .dropdown-menu {
    margin-top: 0px !important;
}
select option { padding:10px 10px 10px 10px ; }
input,
input::-webkit-input-placeholder {
    font-size: 16px;
    
}

/**background:rgba(160, 159, 159, 0.42);**/
	
</style>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/select/dist/css/bootstrap-select.css">
<script src="<?php echo base_url();?>assets/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>



  <script src="<?php echo base_url();?>assets/dashboard/select/dist/js/bootstrap-select.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $("#service_tax").hide();
        $("#service_tax1").hide();
        $("#service_tax2").hide();
        $("#service_tax3").hide();
        $("#upload_logo").hide();
        $("#upload_text").hide();
    });

    function hideShowLogo()
    {
        //alert(document.getElementById('st_logo'));
        if($('#st_logo').val() == 'Yes')
        {
            $('#upload_logo').show();
            $('#upload_text').hide();
            $("#text").removeAttr("required");
            $("#logo").attr("required","true");
        }
        else if ($('#st_logo').val() == 'No')
        {
            $('#upload_logo').hide();
            $('#upload_text').show();
            $("#logo").removeAttr("required");
            $("#text").attr("required","true");
        }
        else
        {
            $('#upload_logo').hide();
            $('#upload_text').hide();
            $("#logo").removeAttr("required");
            $("#text").removeAttr("required");
        }
    }
    function hideShow()
    {
        if($('#tax').val() == 'Yes')
        {
            $("#service_tax").show();
            $("#service_tax1").show();
            $("#service_tax2").show();
            $("#service_tax3").show();
        }
        else
        {
            $("#service_tax").hide();
            $("#service_tax1").hide();
            $("#service_tax2").hide();
            $("#service_tax3").hide();
        }
    }

</script>


<script>

    function fetch_all_address_hotel(pincode,g_country,g_state,g_city)
    {
        var pin_code = document.getElementById(pincode).value;
        //alert(pincode + "/" + g_country + "/" + g_state + "/" + g_city+"=" + pin_code);


        jQuery.ajax(
            {
                type: "POST",
                url: "<?php echo base_url(); ?>bookings/fetch_address",
                dataType: 'json',
                data: {pincode: pin_code},
                success: function(data){
                    //alert(data.country);
                    $(g_country).val(data.country);
                    $(g_state).val(data.state);
                    $(g_city).val(data.city);
                }

            });
    }




</script>
<script type="text/javascript">

    /*$("#submit_form").validate({
     submitHandler: function() {
     $.post("<?php echo base_url();?>dashboard/add_hotel_m",
     $("#submit_form").serialize(),
     function(data){
     //$('#booking_3rd').val(data.bookings_id);
     //$("#submit4").prop("disabled", true);
     //$('#print_tab').show();

     });
     return false; //don't let the page refresh on submit.

     }
     });*/
    function submit_form()
    {
        document.getElementById('submit_form').submit();
    }
</script>
<!-- BEGIN PAGE CONTENT-->

<div class="row">
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
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-pin font-green"></i> ADD SERVICE - <span class="step-title">
								Step 1 of 4 </span>
                </div>
                <!--<div class="tools hidden-xs">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>-->
            </div>
            <div class="portlet-body form">
                <form action="<?php echo base_url();?>dashboard/add_service" class="form-horizontal"  enctype="multipart/form-data" id="submit_form" method="POST">

                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Service Information </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Eligibility criteria 1 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Price and Tax   </span>
                                    </a>
                                </li>

                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success">
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    Your form validation is successful!
                                </div>
                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block">Service Information</h3>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Service Name<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="s_name"  />
                                            <span class="help-block">Enter Service Name... </span>
                                        </div>
                                        <label class="control-label col-md-2">Service Category <span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="s_category" >
                                                <option value="">---Select An Option ---</option>
                                                <option value="food & drink">Food and Drink</option>
                                                <option value="travel & tour">Travel and Tour</option>
                                                <option value="room service">Room Service</option>
                                                <option value="transport">Transport</option>
                                                <option value="honeymoon">Honeymoon</option>
                                                <option value="mixed">Mixed</option>
                                            </select>
                                            <span class="help-block">Enter Service Category...</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-2">Service Description<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="s_description" />
                                            <span class="help-block">Enter Service Description... </span>
                                        </div>
                                        <label class="control-label col-md-2">Service Applied For <span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="s_no_member" >
                                                <option value="">---Select An Option ---</option>
                                                <option value="1">One Member</option>
                                                <option value="2">All Member</option>
                                                <option value="3">Custoem Number of Member</option>

                                            </select>
                                            <span class="help-block">Enter Service Applied For...</span>
                                        </div>
                                        <label class="control-label col-md-2">Custom Member<span > </span></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="s_no_member_custom"  />
                                            <span class="help-block">Enter Custom Member... </span>
                                        </div>

                                        <label class="control-label col-md-2">Service Periodicity<span class="required">* </span></label>   															<div class="col-md-4">
                                            <div class="col-md-9">
                                                <select class="form-control"  name="s_periodicity" >
                                                    <option value="">---Select An Option ---</option>
                                                    <option value="1">Once per half day</option>
                                                    <option value="2">Once per day</option>
                                                    <option value="3">Once Per visit</option>
                                                    <option value="4">Once every month</option>
                                                    <option value="5">Once every year</option>

                                                </select>
                                                <span class="help-block">Enter Service Periodicity...</span>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Service Image<span class="required">* </span></label>
                                            <div class="form-md-line-input form-md-floating-label col-md-4">
                                                <input type="file" name="s_image" />
                                                <!-- <div action="<?php //echo base_url();?>/assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">-->
                                            </div>
                                            <label class="control-label col-md-2">Service Icon<span class="required">* </span></label>
                                            <div class=" form-md-line-input form-md-floating-label col-md-4">
                                                <input type="file" name="s_icon" />
                                                <!-- <div action="<?php //echo base_url();?>/assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">-->
                                            </div>
                                        </div>


                                        <div class="form-group" id="upload_logo">

                                            <div class="col-md-6">

                                            </div>
                                            <label class="control-label col-md-2">Upload Logo<span class="required">* </span></label>   															<div class="col-md-3">
                                                <input type="file" class="form-control" id="logo" name="image_photo" >
                                                <span class="help-block">Upload Logo...</span>
                                            </div>
                                        </div>

                                        <div class="form-group" id="upload_text">

                                            <div class="col-md-6">

                                            </div>
                                            <label class="control-label col-md-2">Logo As Text<span class="required">* </span></label>   															<div class="col-md-3">
                                                <input type="text" class="form-control" id="text" name="images_text"  >
                                                <span class="help-block">Enter Logo Text...</span>
                                            </div>
                                        </div>


                                    </div>


                                    <!--<div class="form-group">
                                        <label class="control-label col-md-3">Hotel Name<span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="username"/>
                                            <span class="help-block">
                                            Enter Hotel Name... </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Year Established<span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="password" id="submit_form_password"/>
                                            <span class="help-block">
                                            Enter Year Established...</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Confirm Password <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" name="rpassword"/>
                                            <span class="help-block">
                                            Confirm your password </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="email"/>
                                            <span class="help-block">
                                            Provide your email address </span>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="tab-pane" id="tab2">
                                  <!--  <div id="rule_entry">

                                    <h3 class="block">Preference Rule Create </h3>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Rule Name<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="r_name"  />
                                            <span class="help-block">Enter Rule Name... </span>
                                        </div>
                                        <label class="control-label col-md-2">Rule Apply For<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="r_apply_person" />
                                            <span class="help-block">Enter The Person Name... </span>
                                        </div>
                                        <label class="control-label col-md-2">Rule for Hotel <span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="r_apply hotel" >
                                                <option  value="0">All</option>
                                                <?php
                                                $hotels = $this->dashboard_model->total_hotels();
                                                foreach($hotels as $hot):
                                                    ?>
                                                    <option  value="<?php echo $hot->hotel_id; ?>"><?php echo $hot->hotel_name; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                            <span class="help-block">Enter Name of the hotel...</span>
                                        </div>
                                    </div>


                                    <h3 class="block">Preference Rule Create for Guest </h3>
                                    <div id="guest_container">
                                    <div class="form-group" id="guest">
                                        <label class="control-label col-md-2">Guest Name<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="r_guest_name"  />
                                            <span class="help-block">Enter Guest Name... </span>
                                        </div>
                                        <label class="control-label col-md-2">Guest Gender <span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="r_guest_gender" >
                                                <option  value=""> N/A </option>
                                                <option  value="male"> Male </option>
                                                <option  value="female"> Female </option>



                                            </select>
                                            <span class="help-block">Enter Gender...</span>
                                        </div>
                                        <label class="control-label col-md-2">Guest Age <span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="r_guest_age_op" >
                                                <option  value="0"> ">" </option>
                                                <option  value="1"> "<" </option>
                                                <option  value="2"> "=" </option>
                                                <option  value="3"> ">=" </option>
                                                <option  value="4"> "<=" </option>


                                            </select>
                                            <span class="help-block">Enter Relation...</span>
                                            <input type="text" class="form-control" name="r_guest_age"  />
                                            <span class="help-block">Enter Guest Age...</span>
                                        </div>
                                        <label class="control-label col-md-2">Guest Type<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="r_guest_type" />
                                            <span class="help-block">Enter The Guest Type... </span>
                                        </div>
                                        <label class="control-label col-md-2">Guest Country<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="r_guest_country" />
                                            <span class="help-block">Enter The Guest Country... </span>
                                        </div>
                                        <label class="control-label col-md-2">Guest State<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="r_guest_state"  />
                                            <span class="help-block">Enter The Guest State... </span>
                                        </div>
                                        <label class="control-label col-md-2">Guest Visit Count<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="r_guest_visit_count_op" >
                                                <option  value="0"> ">" </option>
                                                <option  value="1"> "<" </option>
                                                <option  value="2"> "=" </option>
                                                <option  value="3"> ">=" </option>
                                                <option  value="4"> "<=" </option>


                                            </select>

                                            <input type="text" class="form-control" name="r_guest_visit_count"  />
                                            <span class="help-block">Enter The Guest Visit Count... </span>

                                        </div>
                                        <label class="control-label col-md-2">Guest Total Spent<span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="r_guest_spent_op" >
                                                <option  value="0"> ">" </option>
                                                <option  value="1"> "<" </option>
                                                <option  value="2"> "=" </option>
                                                <option  value="3"> ">=" </option>
                                                <option  value="4"> "<=" </option>


                                            </select>
                                            <input type="text" class="form-control" name="r_guest_spent"  />
                                            <span class="help-block">Enter The Guest Total Spent... </span>
                                        </div>
                                        <label class="control-label col-md-2">VIP ? <span class="required">* </span></label>
                                        <div class="col-md-4">
                                            <select class="form-control"  name="r_guest_vip" >
                                                <option  value="0" selected> No </option>
                                                <option  value="1"> Yes </option>



                                            </select>
                                            </div>
                                            <label class="control-label col-md-2">PREFERRED ? <span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_guest_preffered" >
                                                    <option  value="0" selected> No </option>
                                                    <option  value="1"> Yes </option>



                                                </select>
                                                </div>

                                                <label class="control-label col-md-2">New Guest ? <span class="required">* </span></label>

                                                <div class="col-md-4">
                                                    <select class="form-control"  name="r_guest_new" >
                                                        <option  value="0" selected> No </option>
                                                        <option  value="1"> Yes </option>



                                                    </select>


                                                </div>
                                            </div>

</div>
                                    <h3 class="block">Preference Rule Create for Room and Booking </h3>
                                    <div id="guest_container">
                                        <div class="form-group" id="guest">
                                            <label class="control-label col-md-2">Room Number<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="r_room_no" />
                                                <span class="help-block">Enter Room Number... </span>
                                            </div>
                                            <label class="control-label col-md-2">Number of Bedr<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="r_room_bed"  />
                                                <span class="help-block">Enter Number of Bed in Room... </span>
                                            </div>
                                            <label class="control-label col-md-2">Room Floor<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="r_room_floor"  />
                                                <span class="help-block">Enter the Floor Number... </span>
                                            </div>
                                            <label class="control-label col-md-2">Room Category <span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_room_category" >
                                                    <option  value="0" disabled> N/A </option>



                                                </select>
                                                <span class="help-block">Enter Room Gategory...</span>
                                            </div>
                                            <label class="control-label col-md-2">Booking From Date<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control " name="r_booking_from"  />
                                                <span class="help-block">Enter Booking From Date... </span>
                                            </div>
                                            <label class="control-label col-md-2">Booking To Date<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="r_booking_to"  />
                                                <span class="help-block">Enter Booking To Date... </span>
                                            </div>

                                            <label class="control-label col-md-2">Number of Guest<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_booking_no_guest_op" >
                                                    <option  value="0"> ">" </option>
                                                    <option  value="1"> "<" </option>
                                                    <option  value="2"> "=" </option>
                                                    <option  value="3"> ">=" </option>
                                                    <option  value="4"> "<=" </option>


                                                </select>

                                                <input type="text" class="form-control" name="r_booking_no_guest"  />
                                                <span class="help-block">Enter The Number of Guest... </span>

                                            </div>
                                            <label class="control-label col-md-2">Nature of Visit <span class="required">* </span></label>

                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_booking_nature_visit" >
                                                    <option   selected> ---Nature of Visit--- </option>
                                                    <option  value="bussiness" > Bussiness </option>
                                                    <option  value="Travel and Leisure"> Travel and Leisure </option>



                                                </select>


                                            </div>
                                            <label class="control-label col-md-2">Booking Source<span class="required">* </span></label>

                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_booking_source" >
                                                    <option   selected> ---Booking Source --- </option>
                                                    <option  value="frontdesk" > Frontdesk </option>
                                                    <option  value="online"> Online </option>
                                                    <option  value="telephonic"> Telephonic </option>
                                                    <option  value="broker"> Broker </option>
                                                    <option  value="channel"> Channel </option>
                                                </select>


                                            </div>
                                            <label class="control-label col-md-2">Is Applied For Today?<span class="required">* </span></label>

                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_system_date" >
                                                    <option  value="0" selected> No </option>
                                                    <option  value="1"> Yes </option>

                                                </select>


                                            </div>
                                            <label class="control-label col-md-2">Stay Days<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_booking_stay_days_op" >
                                                    <option  value="0"> ">" </option>
                                                    <option  value="1"> "<" </option>
                                                    <option  value="2"> "=" </option>
                                                    <option  value="3"> ">=" </option>
                                                    <option  value="4"> "<=" </option>


                                                </select>

                                                <input type="text" class="form-control" name="r_booking_stay_days"d />
                                                <span class="help-block">Enter The Stay Days... </span>

                                            </div>
                                            <label class="control-label col-md-2">Total Booking Amount<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_booking_total_op" >
                                                    <option  value="0"> ">" </option>
                                                    <option  value="1"> "<" </option>
                                                    <option  value="2"> "=" </option>
                                                    <option  value="3"> ">=" </option>
                                                    <option  value="4"> "<=" </option>


                                                </select>

                                                <input type="text" class="form-control" name="r_booking_total" />
                                                <span class="help-block">Total Booking Amount... </span>

                                            </div>
                                            <label class="control-label col-md-2">Guest Total Spent<span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_guest_spent_op" >
                                                    <option  value="0"> ">" </option>
                                                    <option  value="1"> "<" </option>
                                                    <option  value="2"> "=" </option>
                                                    <option  value="3"> ">=" </option>
                                                    <option  value="4"> "<=" </option>


                                                </select>
                                                <input type="text" class="form-control" name="r_guest_spent" />
                                                <span class="help-block">Enter The Guest Total Spent... </span>
                                            </div>
                                            <label class="control-label col-md-2">VIP ? <span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_guest_vip" >
                                                    <option  value="0" selected> No </option>
                                                    <option  value="1"> Yes </option>



                                                </select>
                                            </div>
                                            <label class="control-label col-md-2">PREFERRED ? <span class="required">* </span></label>
                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_guest_preffered" >
                                                    <option  value="0" selected> No </option>
                                                    <option  value="1"> Yes </option>



                                                </select>
                                            </div>

                                            <label class="control-label col-md-2">New Guest ? <span class="required">* </span></label>

                                            <div class="col-md-4">
                                                <select class="form-control"  name="r_guest_new">
                                                    <option  value="0" selected> No </option>
                                                    <option  value="1"> Yes </option>



                                                </select>


                                            </div>
                                        </div>

                                    </div>


                                    <div id='hd' >
                                        <button onclick="save_rule()" id="save_rule_btn" type="button" class="btn green pull-right" style="margin-top:15px;margin-bottom:15px;" >Save</button>
                                        <button onclick="add_row()" id="another_rule_btn" type="button" class="btn red pull-right" style="margin-top:15px;margin-bottom:15px; display: none;" >Add Another Rule</button>
                                        <button class="btn blue pull-right" onclick="" style="margin-top:15px;margin-bottom:15px; margin-right:10px" type="button">Cancel</button>
                                    </div>

    </div>-->           
						<div id="add_service_step2">
                             <div class="row">
                                <div class="col-md-12" style="margin-bottom:15px;"> 
									<div class="col-md-4" style="width:230px;height:465px;background:rgba(160, 159, 159, 0.42);padding:5px; margin-bottom:20px;">
									
									
                                          
												<select id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Master Category" data-live-search="true" onchange="master_catagory(this.value)">
												
													<!--<optgroup disabled="disabled" label="disabled">
													  <option>Hidden</option>
													</optgroup>-->
													<option  value="" disabled selected> Mastre Category</option>
                                                    <option  value="Genaral Category" > Genaral Category</option>
                                                    <option  value="Guest"> Guest</option>
                                                    <option  value="Booking"> Booking </option>
                                                    <option  value="Unit"> Unit </option>
                                                    <option  value="Event"> Event</option>
													
													
												</select>	
												
																				
									
									
									</div>
				<div class="col-md-4" id="gn" style="width:230px;height:465px;background:rgba(160, 159, 159, 0.42);padding:5px;margin-left:20px;margin-bottom:20px; display:none;">
									
									      

									<select id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Genaral Category" data-live-search="true" onchange="open_oparetor()">

													<option  value="" disabled selected> Genaral Category</option>
                                                    <option  value="Total Bill" > Total Bill</option>
                                                    <option  value="date('Y-m-d')"> System Date</option>
                                                    
													
													
												</select>	
									
									
									
									
									</div>
			<div class="col-md-4" id="guest"style="width:230px;height:465px;padding:5px;margin-left:20px;background:rgba(160, 159, 159, 0.42);margin-bottom:20px;display:none;">
									
	
												<select name="s_guest" id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Guest" data-live-search="true" onchange="open_oparetor()">
												
													<!--<optgroup disabled="disabled" label="disabled">
													  <option>Hidden</option>
													</optgroup>-->
													<option  value="" disabled selected> Guest</option>
                                                    <option  value="g_name" > Guest name</option>
                                                    <option  value="g_gender"> Guest gender</option>
													<option  value="g_age" > Guest age</option>
                                                    <option  value="g_type"> Guest Type</option>
													<option  value="g_state" > Guest State</option>
                                                    <option  value="g_vip=1"> VIP?</option>
													<option  value="g_preffered=1?" > Preferred?</option>
                                                    <option  value="g_no_times"> No of times visited</option>
													<option  value="g_total_spending" > Total spending</option>
                                                    <option  value="g_no_times=1"> New Guest?</option>
													<option  value="Global category"> Global category</option>
                                                    
													
													
												</select>	
												
									
									
									
									
									
									</div>
	<div class="col-md-4" id="booking" style="width:230px;height:465px;background:rgba(160, 159, 159, 0.42);padding:5px;margin-left:20px;margin-bottom:20px;display:none;">
									
									      
                                               <!-- <div class="dropdown">
													  <button class="master" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														Booking
														<span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenu4" onclick="open_oparetor()">
													  <li><a href="#">Booking start date</a></li>
													  <li><a href="#">Booking end date</a></li>
													  <li><a href="#">No of Guest</a></li>
													  <li><a href="#"> Family?</a></li>
													  <li><a href="#">Individual?</a></li>
													  <li><a href="#">Nature of visit</a></li>
													  <li><a href="#">Booking source</a></li>
													  <li><a href="#">No of stay days</a></li>
													  <li><a href="#">Total Rent</a></li>
													  <li><a href="#">Global category </a></li>
													  <li><a href="#">Weekend</a></li>
													  
													 
													</ul>
											    </div>-->
												
												
												<select name="s_booking" id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Booking" data-live-search="true" onchange="open_oparetor()">
												
													<!--<optgroup disabled="disabled" label="disabled">
													  <option>Hidden</option>
													</optgroup>-->
													<option  value="" disabled selected> Booking</option>
                                                    <option  value="cust_from_date" > Booking start date</option>
                                                    <option  value="cust_end_date"> Booking end date</option>
													<option  value="no_of_guest" > No of Guest</option>
                                                    <option  value="no_of_guest >1"> Family?</option>
													<option  value="no_of_guest =1" > Individual?</option>
                                                    <option  value="nature_visit"> Nature of visit</option>
													<option  value="booking_source" > Booking source</option>
                                                    <option  value="stay_days"> No of stay days</option>
													<option  value="room_rent_total_amount" > Total Rent</option>
                                                    <option  value="Global category"> Global category</option>
													<option  value="Weekend"> Weekend</option>
                                                    
													
													
												</select>	
									
									
									
									
									
									</div>
			<div class="col-md-4" id="unit" style="width:230px;height:465px;background:rgba(160, 159, 159, 0.42);padding:5px;margin-left:20px;margin-bottom:20px;display:none">
									
									      
                                               <!-- <div class="dropdown">
													  <button class="master" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														Unit
														<span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenu4" onclick="open_oparetor()">
													  <li><a href="#">Room/ Unit no</a></li>
													  <li><a href="#"> No of Bed</a></li>
													  <li><a href="#"> Floor</a></li>
													  <li><a href="#">Room category</a></li>
													  <li><a href="#">Global category</a></li>
													 
													  
													 
													</ul>
											    </div>-->
									
									<select name="s_unit" id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Unit" data-live-search="true" onchange="open_oparetor()">
												
													<!--<optgroup disabled="disabled" label="disabled">
													  <option>Hidden</option>
													</optgroup>-->
													<option  value="" disabled selected> Unit</option>
                                                    <option  value="room_no" > Room/ Unit no</option>
                                                    <option  value="room_bed"> No of Bed</option>
													<option  value="floor_no" > Floor</option>
                                                    <option  value="Room category"> Room category</option>
													<option  value="Global category" > Global category</option>
                                                    
                                                    
													
													
												</select>	
									
									
									
					</div>
					<div class="col-md-4" id="event" style="width:230px;height:465px;background:rgba(160, 159, 159, 0.42);padding:5px;margin-left:20px;margin-bottom:20px;display:none">
									
									      
                                               <!-- <div class="dropdown">
													  <button class="master" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														Event
														<span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenu4" onclick="open_oparetor()">
													  <li><a href="#">Event Name</a></li>
													  <li><a href="#">is Event?</a></li>
													  
													 
													</ul>
											    </div>-->
									
									
									<select name="s_event" id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Event" data-live-search="true" onchange="open_oparetor()">
												
													<!--<optgroup disabled="disabled" label="disabled">
													  <option>Hidden</option>
													</optgroup>-->
													<option  value="" disabled selected> Event</option>
                                                    <option  value="e_name" > Event Name</option>
                                                    <option  value="e_from <=DATE() OR DATE() >=e_upto "> is Event?</option>
													
                                                    
                                                    
													
													
												</select>	
									
									
									</div>
									
									
									
		<div class="col-md-4" id="oparetor"style="width:230px;height:465px;background:rgba(160, 159, 159, 0.42);margin-left:20px;margin-bottom:20px;padding:5px;display:none;" >
									
									<!--<div class="dropdown">
													  <button class="master" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														Oparetor
														<span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenu4" onclick="open_value()">
													  <li><a href="#">=</a></li>
													  <li><a href="#">IN</a></li>
													  <li><a href="#">LIKE</a></li>
													  <li><a href="#">NOT EQUAL TO</a></li>
													  <li><a href="#">NOT IN</a></li>
													  <li><a href="#">IS NULL</a></li>
													  <li><a href="#">IS NOT NULL</a></li>
													  <li><a href="#">NOT LIKE</a></li>
													  
													 
													</ul>
											    </div>-->
									<!--<select class="form-control"  onclick="open_value()" >
                                                     <option  value="" disabled selected> Oparetor</option>
                                                    <option  value="frontdesk" > =</option>
                                                    <option  value="online"> IN </option>
                                                    <option  value="telephonic"> LIKE </option>
                                                    <option  value="broker"> NOT EQUAL TO </option>
                                                    <option  value="channel"> NOT IN </option>
													<option  value="channel"> IS NULL </option>
													<option  value="channel"> IS NOT NULL </option>
													<option  value="channel"> NOT LIKE </option>
                                                </select>-->
												
							<select name="s_operator" id="first-disabled" class="selectpicker"  data-hide-disabled="true" title="Oparetor" data-live-search="true" onchange= "open_value()">
												
													<!--<optgroup disabled="disabled" label="disabled">
													  <option>Hidden</option>
													</optgroup>-->
													<option  value="" disabled selected> oparetor</option>
                                                    <option  value="=" > =</option>
                                                    <option  value=">" > > </option>
                                                    <option  value="<" > < </option>
                                                    <option  value="IN "> IN </option>
                                                    <option  value="LIKE"> LIKE </option>
                                                    <option  value="NOT EQUAL TO"> NOT EQUAL TO </option>
                                                    <option  value="NOT IN"> NOT IN </option>
													<option  value="IS NULL"> IS NULL </option>
													<option  value="IS NOT NULL"> IS NOT NULL </option>
													<option  value="NOT LIKE"> NOT LIKE </option>
													
												  </select>									
									
									
									</div>
					<div class="col-md-4" id="value_one" style="width:290px;height:465px;background:rgba(160, 159, 159, 0.42); margin-left:20px; margin-bottom:20px; padding-left:29px;padding-right:29px;padding-top:5px; display:none;" >
                         
						 
						 
											<div class="form-group">
												<!--<label class="control-label" style="font-weight:bold; color:white;">Value</label>-->
												<div class="">
													<input type="text" class="form-control" name="s_value" placeholder="value" onkeypress="open_tgl_btn()"/>
													
												</div>
												
												
											</div>

						 
						 
					</div>
									
									
									
							<div class="col-md-4"  id="value_two"style="width:290px;height:465px;background:rgba(160, 159, 159, 0.42); margin-left:20px; margin-bottom:20px; padding-left:29px;padding-right:29px;padding-top:5px; display:none;">
                         
						 
						 
											<div class="form-group">
												<!--<label class="control-label" style="font-weight:bold; color:white;">Value</label>-->
												<div class="">
													<input type="text" class="form-control" name=""  placeholder="value"/>
													
												</div>
												
												
											</div>
											
											<div class="form-group" style="margin-top:20px;">
												<!--<label class="control-label" style="font-weight:bold; color:white;">Value</label>-->
												<div class="">
													<input type="text" class="form-control" name=""  placeholder="value"/>
													
												</div>
												
												
											</div>

						 
						 
									   </div>
								
								
								
								
								
								
								
								</div>		
								
								
	
							</div>
							
							
	                   </div>
	
							      <div class="clearfix"></div>
														
												<button class="btn blue  pull-right" onclick="append_div()" style="margin-right:10px; margin-bottom:10px;">
																		Add Another <i class=""></i>
														</button>
														<div class="clearfix"></div>
														
													<div id="tgl_btn" style="width:6%;border:1px solid rgba(160, 159, 159, 0.42);  margin: 0 auto; margin-top:5px;margin-bottom:10px; display:none;">	
													<input style=""  type="checkbox" checked data-toggle="toggle" data-on="And" data-off="or" data-onstyle="success" data-offstyle="danger">
													</div>	
							
							
							
	   </div>
	               
	
	

                          


                                <div class="tab-pane" id="tab3">
                                    <input type="hidden" name="s_rules" id="s_rules">

                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                        <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="s_price" required="required" onkeypress="return onlyNos(event, this);" >
                                        <label>Base Price <span class="required">*</span> </label>
                                        <span class="help-block">Enter Base Price...</span>

                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                        <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="s_price_weekend" required="required" onkeypress="return onlyNos(event, this);" >
                                        <label>Weekend Price<span class="required">*</span> </label>
                                        <span class="help-block">Enter Weekend  Price...</span>

                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                        <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="s_price_holiday" required="required" onkeypress="return onlyNos(event, this);" >
                                        <label>Holiday Price <span class="required">*</span> </label>
                                        <span class="help-block">Holiday Price...</span>

                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                        <input  type="type" autocomplete="off" class="form-control" id="form_control_1" name="s_price_special" required="required" onkeypress="return onlyNos(event, this);" >
                                        <label>Special Price <span class="required">*</span> </label>
                                        <span class="help-block">Special Price...</span>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Tax Applied?</label>
                                        <div class="col-md-4">
                                            <select id="tax" onchange="return hideShow();" name="s_tax_applied">
                                                <option>--- Select An Option ---</option>
                                                <option value="y">Yes</option>
                                                <option value="n">No</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group" id="s_tax" style="display: none;">
                                        <label class="control-label col-md-2"> Tax %</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="s_tax" />
                                            <span class="help-block">Enter Tax... </span>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Discount Applied?</label>
                                        <div class="col-md-4">
                                            <select id="discount" onchange="return hideShow2();" name="s_discount_applied">
                                                <option>--- Select An Option ---</option>
                                                <option value="y">Yes</option>
                                                <option value="n">No</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group" id="service_discount" style="display: none;">
                                        <label class="control-label col-md-2">Discount %</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="s_discount" />
                                            <span class="help-block">Enter Discount... </span>
                                        </div>

                                    </div>








                                </div>
                                <div class="clear" style="clear:both;"></div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="m-icon-swapleft"></i> Back </a>
                                            <a href="javascript:;" class="btn blue button-next" onclick="check();">
                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit" onclick="submit_form()">
                                                Submit <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                            <!--<input type="submit" value="Submit" onclick="submit_form()" class="btn green button-submit" />-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <script type="text/javascript">
                    function save_rule(){
                        //alert($("#submit_form").serialize());

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>dashboard/add_rule",
                            data: $("#submit_form").serialize(),
                            success: function(msg) {
                                var s_rules=document.getElementById("s_rules").value;
                                if(s_rules!='') {
                                    document.getElementById("s_rules").value = document.getElementById("s_rules").value + "," + msg;
                                }
                                else{
                                    document.getElementById("s_rules").value = msg;
                                }
                                alert( 'Rule Saved Successfully');
                                document.getElementById("save_rule_btn").disabled = true;
                                document.getElementById("another_rule_btn").style.display = 'block';
                            }
                        });
                    }
                    function add_row()
                    {
                        document.getElementById("rule_entry").style.display = 'none';
                        $('#tab2').load('<?php echo base_url() ?>assets/html_static/rule_entry.html');

                    }
                    function hideShow()
                    {
                        if($('#tax').val() == 'y')
                        {
                            $("#s_tax").show();

                        }
                        else
                        {
                            $("#s_tax").hide();

                        }
                    }
                    function hideShow2()
                    {
                        if($('#discount').val() == 'y')
                        {
                            $("#service_discount").show();

                        }
                        else
                        {
                            $("#service_discount").hide();

                        }
                    }
					
					 function open_gn()
						{
							
							document.getElementById('gn').style.display= 'block';
							document.getElementById('guest').style.display= 'none';
							document.getElementById('booking').style.display= 'none';
							document.getElementById('unit').style.display= 'none';
							document.getElementById('event').style.display= 'none';
							
						}
						function open_guest()
						{
							
							document.getElementById('guest').style.display= 'block';
							document.getElementById('gn').style.display= 'none';
							document.getElementById('booking').style.display= 'none';
							document.getElementById('unit').style.display= 'none';
							document.getElementById('event').style.display= 'none';
							
						}
						function open_book()
						{
							
							document.getElementById('booking').style.display= 'block';
							document.getElementById('gn').style.display= 'none';
							document.getElementById('guest').style.display= 'none';
							document.getElementById('unit').style.display= 'none';
							document.getElementById('event').style.display= 'none';
							
						}
						function open_unit()
						{
							document.getElementById('unit').style.display= 'block';
							document.getElementById('booking').style.display= 'none';
							document.getElementById('gn').style.display= 'none';
							document.getElementById('guest').style.display= 'none';
							document.getElementById('event').style.display= 'none';
							
						}
						function open_event()
						{
							document.getElementById('event').style.display= 'block';
							document.getElementById('unit').style.display= 'none';
							document.getElementById('booking').style.display= 'none';
							document.getElementById('gn').style.display= 'none';
							document.getElementById('guest').style.display= 'none';
							
						}
						function open_oparetor()
						{
							document.getElementById('oparetor').style.display= 'block';
							
							
						}
						function open_value()
						{
							document.getElementById('value_one').style.display= 'block';
							
							
						}
						function open_tgl_btn()
						{
							document.getElementById('tgl_btn').style.display= 'block';
							
							
						}
						 
						 
                </script>
				
				<script>
					function master_catagory(val_mc)
					{
						
						val_mc = val_mc.toString();
						
					
						
						if(val_mc == "Genaral Category"){
							document.getElementById('gn').style.display = "block";
							document.getElementById('guest').style.display = "none";
							document.getElementById('booking').style.display = "none";
							document.getElementById('unit').style.display = "none";
							document.getElementById('event').style.display = "none";
						}
						
						else if(val_mc == "Guest"){
							document.getElementById('guest').style.display = "block";
							document.getElementById('gn').style.display = "none";
							document.getElementById('booking').style.display = "none";
							document.getElementById('unit').style.display = "none";
							document.getElementById('event').style.display = "none";
						}
						
						else if(val_mc == "Booking"){
							document.getElementById('booking').style.display = "block";
							document.getElementById('gn').style.display = "none";
							document.getElementById('guest').style.display = "none";
							document.getElementById('unit').style.display = "none";
							document.getElementById('event').style.display = "none";
						}
						else if(val_mc == "Unit"){
							document.getElementById('unit').style.display = "block";
							document.getElementById('booking').style.display = "none";
							document.getElementById('gn').style.display = "none";
							document.getElementById('guest').style.display = "none";
							document.getElementById('event').style.display = "none";
						}
						else{
							document.getElementById('event').style.display = "block";
							document.getElementById('unit').style.display = "none";
							document.getElementById('booking').style.display = "none";
							document.getElementById('gn').style.display = "none";
							document.getElementById('guest').style.display = "none";
						}
						
						/*
						$('#add_another').on('click', function(){
						   $('#add_service_step2').append( $('#add_service_step2') ); // append -> object
						});
						*/						
					}
					
					function append_div(){
						document.getElementById("add_service_step2").style.display = 'none';
						$('#tab2').load('<?php echo base_url() ?>assets/html_static/rule_add.html');
					}
				</script>
  

            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->