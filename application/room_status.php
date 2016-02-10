<?php

$ci =& get_instance();

$rooms=$ci->dashboard_model->all_rooms();
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