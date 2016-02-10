<?php
/**
 * Created by PhpStorm.
 * User: subhabrata
 * Date: 2/9/2016
 * Time: 5:55 PM
 *
 */

$rooms=$this->dashboard_model->all_rooms();?>

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


<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Room Status</span>
                </div>
                <button class="btn btn-md green hidden-print" data-toggle="modal" href="#responsive" id="dwn_link" onclick="show_modal();" style="margin-top:10px; float:right;">
                    Add Maid <i class="fa fa-plus-circle"></i>  </button>
            </div>




            <div class="portlet-body">

                <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4>Add Maid</h4>
                            </div>
                            <div class="modal-body">
                                <div class="portlet-body form">


                                    <?php

                                    $form = array(
                                        'class' 			=> 'form-body',
                                        'id'				=> 'form',
                                        'method'			=> 'post'
                                    );

                                    echo form_open_multipart('dashboard/add_maid',$form);

                                    ?>
                                    <div class="row">

                                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                            <input type="text" autocomplete="off" class="form-control" name="maid_name" required="required">
                                            <label>Maid Name <span class="required">*</span></label>
                                            <span class="help-block">Enter Maid Name...</span>
                                        </div>

                                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                            <input type="text" autocomplete="off" class="form-control" name="maid_address" >
                                            <label>Maid Address <span class="required"></span></label>
                                            <span class="help-block">Enter Maid Address...</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                            <input type="text" autocomplete="off" class="form-control" name="maid_contact" required="required">
                                            <label>Maid Phone <span class="required">*</span></label>
                                            <span class="help-block">Enter Maid Phone Number...</span>
                                        </div>



                                    </div>
                                    <div class="form-actions noborder">
                                        <button type="submit" class="btn blue" >Submit</button>
                                        <button type="submit" class="btn default">Reset</button>
                                    </div>
                                    <?php form_close(); ?>




                                </div>
                            </div>

                        </div>
                        </div>

                </div>
                <div id="responsive2" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4>Assign Maid</h4>
                            </div>
                            <div class="modal-body">
                                <div class="portlet-body form">


                                    <?php

                                    $form = array(
                                        'class' 			=> 'form-body',
                                        'id'				=> 'form',
                                        'method'			=> 'post'
                                    );

                                    echo form_open_multipart('dashboard/assign_maid',$form);

                                    ?>
                                    <div class="row">

                                        <div class="form-group form-md-line-input form-md-floating-label col-md-4">

                                            <input type="text" autocomplete="off" class="form-control" name="room_no" id="room_no" disabled required="required">
                                            <input type="hidden" autocomplete="off" class="form-control" name="room_id" id="room_id"  required="required">
                                            <label><span class="required"></span></label>
                                            <span class="help-block">Room No...</span>
                                        </div>

                                        <div class="form-group form-md-line-input  has-info col-md-6">
                                            <select class="form-control" id="maid_id" name="maid_id">

                                                <?php $maids=$this->dashboard_model->all_maids();
                                                if(isset($maids) && $maids){
                                                    foreach($maids as $maid){

                                                        ?>

                                                        <option value="<?php echo $maid->maid_id ?>"><?php echo $maid->maid_name ?></option>
                                                    <?php }} ?>
                                            </select>
                                            <label for="form_control_2">Maid Name <span class="required">*</span></label>
                                        </div>



                                    </div>
                                    <div class="form-actions noborder">
                                        <button type="submit" onclick="assign_maid();" class="btn blue" >Assign</button>
                                    </div>
                                    <?php form_close(); ?>




                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row" id="refresh">

                    <?php
                    foreach($rooms as $room){
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-bottom: 2%;">
                        <a data-toggle="modal" href="#responsive2" onclick="set_value('<?php echo $room->room_id; ?>','<?php echo $room->room_no; ?>');">
                        <?php if($room->clean_id==1){ ?>
                        <div class="dashboard-stat green-seagreen">
                            <?php } else if($room->clean_id==2){ ?>

                            <div class="dashboard-stat yellow-lemon">
                                <?php  } else if($room->clean_id==3){  ?>
                                <div class="dashboard-stat blue-dark">
                            <?php  } else if($room->clean_id==4){  ?>
                                    <div class="dashboard-stat grey-gallery">
                                <?php  } else{  ?>
                                        <div class="dashboard-stat red-flamingo">
                                    <?php } ?>


                            <div class="visual">
                                <i class="fa fa-building-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">

                                    <?php echo $room->room_no; ?>

                                </div>
                                </a>
                                <div class="desc">
                                    Status

                                        <select style="color: black;" onchange="status_change('<?php echo $room->room_id; ?>',this.value);">
                                            <?php if($room->clean_id==1){ ?>
                                                <option value="0" disabled>Undefined</option>
                                                <option value="1" selected>Clean</option>
                                                <option value="2">Dirty</option>
                                                <option value="3">Under Maintenance</option>
                                                <option value="4">Under Repair</option>
                                                <?php } else if($room->clean_id==2){ ?>

                                                <option value="0" disabled>Undefined</option>
                                                <option value="1">Clean</option>
                                                <option value="2" selected>Dirty</option>
                                                <option value="3">Under Maintenance</option>
                                                <option value="4">Under Repair</option>
                                                    <?php  } else if($room->clean_id==3){  ?>
                                                <option value="0" disabled>Undefined</option>
                                                <option value="1">Clean</option>
                                                <option value="2">Dirty</option>
                                                <option value="3" selected>Under Maintenance</option>
                                                <option value="4">Under Repair</option>
                                                        <?php  } else if($room->clean_id==4){  ?>
                                                <option value="0" disabled>Undefined</option>
                                                <option value="1">Clean</option>
                                                <option value="2">Dirty</option>
                                                <option value="3">Under Maintenance</option>
                                                <option value="4" selected>Under Repair</option>
                                                            <?php  } else{  ?>
                                                <option value="0" selected disabled>Undefined</option>
                                                <option value="1">Clean</option>
                                                <option value="2">Dirty</option>
                                                <option value="3">Under Maintenance</option>
                                                <option value="4">Under Repair</option>
                                                                <?php } ?>


                                        </select>

                                </div>
                            </div>
                            <!--<a class="more" href="<?php echo base_url() ?>dashboard/all_reports">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>-->
                        </div>
                    </div>

                    <?php }?>
            </div>
        </div>

    </div>
</div>
</div>

    <script>
        function status_change(r_id,r_status){

           // alert(r_id+'  '+r_status);
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>dashboard/change_room_status",
                data:{room_id:r_id,clean_status:r_status},
                success:function(data)
                {
                    // alert('Booking Event Generated');
                    //location.reload();
                    swal({
                            title: data,
                            text: "",
                            type: "success"
                        },
                        function(){
                            //location.reload();
                            $( "#refresh" ).load( "<?php echo base_url() ?>dashboard/room_status" );
                        });
                }
            });


        }

        function assign_maid(){
            var room_id=document.getElementById('room_id').value;
            var maid_id=document.getElementById('maid_id').value;
            alert(room_id+"  "+maid_id);
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>dashboard/assign_maid",
                data:{room_id:room_id ,maid_id:maid_id},
                success:function(data)
                {
                    // alert('Booking Event Generated');
                    //location.reload();
                    swal({
                            title: data,
                            text: "",
                            type: "success"
                        },
                        function(){
                            $( "#refresh" ).load( "<?php echo base_url() ?>dashboard/room_status" );
                        });
                }
            });

        }
        function show_modal(){
            document.getElementById('responsive').style.display="block";
        }
        function set_value(id,no){
           // alert(id+' '+no);
            document.getElementById('room_id').value=id;
            document.getElementById('room_no').value=no;


        }
        </script>
