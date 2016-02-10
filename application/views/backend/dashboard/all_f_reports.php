<script>
setTimeout(function() 
{ 
    document.getElementById("loader").style.display = "none"; 
	document.getElementById("body").style.display = "block"; 
}, 1500);


</script>


  <div id="loader">
  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Lato:700);


@keyframes flicker {
  0% {
    background: transparent;
  }
  50% {
    background: white;
  }
  100% {
    background: transparent;
  }
}
@keyframes neon {
  0% {
    text-shadow: none;
  }
  50% {
    text-shadow: rgba(255, 255, 255, 0.8) 0 0 8px;
  }
  100% {
    text-shadow: none;
  }
}
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.loader {
  padding: .5em;
  width: 5.5em;
  height: 9.5em;
  margin: 100px auto;
 background: rgb(51, 208, 225) none repeat scroll 0% 0%;
  position: relative;
  
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
.loader .hotel-sign {
  
    padding: 0.25em 0px;
    position: absolute;
    right: -1.5em;
    width: 1.3em;
    content: " ";
    text-align: center;
    background: rgb(191, 191, 191) none repeat scroll 0% 0%;
    font-family: sans-serif;
    font-weight: 700;
    border-radius: 4px;
   
    animation: 3s ease 0s normal none infinite running neon;

}
.loader .hotel-sign span {
  line-height: 1;
 color: rgb(255, 255, 255);
}
.loader .window {
  background: white;
  width: .5em;
  height: 1em;
  float: left;
  margin: 0 .5em .5em 0;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  animation: flicker 1s infinite ease;
}
.loader .window:nth-of-type(5n) {
  margin: 0 0 .5em 0;
}
.loader .window:nth-child(1) {
  animation-delay: 0.5s;
  animation-duration: 0.5s;
}
.loader .window:nth-child(2) {
  animation-delay: 1s;
  animation-duration: 1s;
}
.loader .window:nth-child(3) {
  animation-delay: 1.5s;
  animation-duration: 1.5s;
}
.loader .window:nth-child(4) {
  animation-delay: 2s;
  animation-duration: 2s;
}
.loader .window:nth-child(5) {
  animation-delay: 2.5s;
  animation-duration: 2.5s;
}
.loader .window:nth-child(5) {
  animation-delay: 1.25s;
  animation-duration: 1.25s;
}
.loader .window:nth-child(6) {
  animation-delay: 1.5s;
  animation-duration: 1.5s;
}
.loader .window:nth-child(7) {
  animation-delay: 1.75s;
  animation-duration: 1.75s;
}
.loader .window:nth-child(8) {
  animation-delay: 2s;
  animation-duration: 2s;
}
.loader .window:nth-child(9) {
  animation-delay: 2.25s;
  animation-duration: 2.25s;
}
.loader .window:nth-child(10) {
  animation-delay: 2.5s;
  animation-duration: 2.5s;
}
.loader .window:nth-child(10) {
  animation-delay: 1s;
  animation-duration: 1s;
}
.loader .window:nth-child(11) {
  animation-delay: 1.1s;
  animation-duration: 1.1s;
}
.loader .window:nth-child(12) {
  animation-delay: 1.2s;
  animation-duration: 1.2s;
}
.loader .window:nth-child(13) {
  animation-delay: 1.3s;
  animation-duration: 1.3s;
}
.loader .window:nth-child(14) {
  animation-delay: 1.4s;
  animation-duration: 1.4s;
}
.loader .window:nth-child(15) {
    animation-delay: 5.5s;
    animation-duration: 7.5s;
}
.loader .window:nth-child(16) {
  animation-delay: 1.6s;
  animation-duration: 1.6s;
}
.loader .window:nth-child(17) {
  animation-delay: 1.7s;
  animation-duration: 1.7s;
}
.loader .window:nth-child(18) {
  animation-delay: 1.8s;
  animation-duration: 1.8s;
}
.loader .window:nth-child(19) {
  animation-delay: 1.9s;
  animation-duration: 1.9s;
}
.loader .window:nth-child(20) {
  animation-delay: 2s;
  animation-duration: 2s;
}
.loader .window:nth-child(20) {
  animation-delay: 1.33333s;
  animation-duration: 1.66667s;
}
.loader .window:nth-child(21) {
  animation-delay: 1.4s;
  animation-duration: 1.75s;
}
.loader .window:nth-child(22) {
  animation-delay: 1.46667s;
  animation-duration: 1.83333s;
}
.loader .window:nth-child(23) {
  animation-delay: 1.53333s;
  animation-duration: 1.91667s;
}
.loader .window:nth-child(24) {
  animation-delay: 1.6s;
  animation-duration: 2s;
}
.loader .window:nth-child(25) {
  animation-delay: 1.66667s;
  animation-duration: 2.08333s;
}
.loader .window:nth-child(26) {
  animation-delay: 1.73333s;
  animation-duration: 2.16667s;
}
.loader .window:nth-child(27) {
  animation-delay: 1.8s;
  animation-duration: 2.25s;
}
.loader .window:nth-child(28) {
  animation-delay: 1.86667s;
  animation-duration: 2.33333s;
}
.loader .window:nth-child(29) {
  animation-delay: 1.93333s;
  animation-duration: 2.41667s;
}
.loader .window:nth-child(30) {
  animation-delay: 2s;
  animation-duration: 2.5s;
}

.loader .door {
  background: white;
  position: absolute;
  bottom: 0;
  width: 1em;
  height: 1.5em;
  left: 50%;
  margin-left: -.5em;
  -moz-border-radius-topleft: 3px;
  -webkit-border-top-left-radius: 3px;
  border-top-left-radius: 3px;
  -moz-border-radius-topright: 3px;
  -webkit-border-top-right-radius: 3px;
  border-top-right-radius: 3px;
}

    </style>

    
        

    




    <div class='loader'>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='window'></div>
  <div class='door'></div>
  <div class='hotel-sign'>
    <span>H</span>
    <span>O</span>
    <span>T</span>
    <span>E</span>
    <span>L</span>
  </div>
</div>    
</div>


<div id="body" style="display:none;">


<style>
    .all_bk .table>tbody>tr>td{ vertical-align: middle !important;}
    .all_bk .table thead tr th{ font-size:13px; text-align:center;}
    .all_bk .table-bordered>tbody>tr>td{ font-size:12px;}
    .all_bk .md-checkbox label > .box{height: 15px;width: 15px;}
    .all_bk .btn{ font-size:12px;}
    .all_bk .form-control{ font-size:12px;height: auto;padding: 2px;}
    .all_bk .portlet.box > .portlet-title > .caption {
        padding: 11px 0 9px 0;
    }
    .select2-search input {

        display: none;

    }
    button, input, select, textarea {
        display: none;

    }
    .select2-dropdown-open .select2-choice {

        display: none;

    }
    #s2id_autogen1{
        display:none;
    }

    #sample_editable_1_filter.all_bk .form-control {

        border-radius: 0px !important;
        font-size: 12px;
        height: auto;
        padding: 2px;
    }
    .all_bk .form-control {
        border-radius: 0px !important;

        font-size: 12px;
        height: auto;
        padding: 2px;
    }
</style>
<!---->
<div class="row all_bk">


    <!--popup-->
    <!--<div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirm Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                         Body goes here...
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
                                    <button data-dismiss="modal" class="btn blue">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>-->
    <!--popup end-->




    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->




        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-archive-o"></i>Reports of All Transactions Today
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <!--<div class="btn-group">
                                <a href="<?php echo base_url();?>dashboard/add_transaction"><button class="btn green">
                                        Add New <i class="fa fa-plus"></i>
                                    </button></a>
                            </div>-->
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:window.print();">
                                            Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                    <tr>
                        <!--<th>
                            Select
                        </th>-->
						
						<th>
                            #
                        </th>
                        <th>
                            Booking Id
                        </th>
                        <th>
                            Transaction Id
                        </th>
						<th>
                            Transaction Type
                        </th>
						<th>
                            Transaction From
                        </th>
						<th>
                            Transaction To
                        </th>

                        <th>
                            Payment Mode
                        </th>

                        <th>
                            Amount
                        </th>

                        <th>
                            Transaction Date
                        </th>


                    </tr>
                    </thead>
                    <tbody>
					<?php $daily_sum=0;
                    $broker_sum=0;
                    ?>
                    <?php if(isset($transactions) && $transactions):
                        $daily_sum=0;
                        $i=1;
                        $deposit=0;
						$srl_no=0;
                        foreach($transactions as $transaction):
							$srl_no++;


                            $class = ($i%2==0) ? "active" : "success";

                            $transaction_id='HM00TA00'.$transaction->t_id;
                            ?>

                            <tr >
                                <!--<td><input type="checkbox" name="delete[]" value="<?php //echo $transaction->t_id;?>" class="form-control" onclick="this.form.submit();"/></td>-->
								<td style="width: 27px;"><?php echo $srl_no; ?></td>
                                <td><?php echo 'HM0'.$this->session->userdata('user_hotel').'00'.$transaction->t_booking_id;?></td>
                                <td><?php echo $transaction_id;?></td>
								
								<?php foreach($types as $type): ?>
								<?php if($type->hotel_transaction_type_id==$transaction->transaction_releted_t_id): ?>
								<td><?php echo $type->hotel_transaction_type_name; ?></td>
								<?php endif; ?>
								<?php endforeach; ?>
								
								<?php foreach($entity as $ent): ?>
								<?php if($ent->hotel_entity_type_id==$transaction->transaction_from_id): ?>
								<td><?php echo $ent->entity_name; ?></td>
								<?php endif; ?>
								<?php endforeach; ?>
								
								<?php foreach($entity as $ent): ?>
								<?php if($ent->hotel_entity_type_id==$transaction->transaction_to_id): ?>
								<td><?php echo $ent->entity_name; ?></td>
								<?php endif; ?>
								<?php endforeach; ?>
								
                                <td><?php echo $transaction->t_payment_mode;?></td>
                                <td><?php echo $transaction->t_amount; ?></td>
                                <td><?php echo $transaction->t_date; ?></td>


                            </tr>
                            <?php

                            if($transaction->transaction_releted_t_id==1 ||$transaction->transaction_releted_t_id==6){
                            $i++;
                            $daily_sum=$daily_sum+$transaction->t_amount;
                            }
                            else if($transaction->transaction_releted_t_id==3){
                                $broker_sum=$broker_sum+$transaction->t_amount;
                            }
                            ?>

                        <?php endforeach; ?>
                    <?php endif;?>
                    </tbody>

                </table>
                <div class="col-md-3">

                </div>
                <div class="col-md-7">
                      <h3>Total Earning From Booking</h3>
                    </div>

               <h3> <i class="fa fa-inr" style="font-size: 21px;"> </i> <?php echo $daily_sum; ?> </h3>
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    <h3>Total Amount Given to Broker</h3>
                </div>

                <h3> <i class="fa fa-inr" style="font-size: 21px;"> </i> <?php echo $broker_sum; ?> </h3>
            </div>

        </div>

        <!-- END SAMPLE TABLE PORTLET-->


        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <!--
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-eye-slash"></i>All Rooms
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                        	<?php
        $form = array(
            'class' 			=> 'form-horizontal',
            'method'			=> 'post'
        );

        $dropdown = array(
            '5'  				=> '5',
            '10'    			=> '10',
            '25'   			=> '25',
            '50'				=> '50',
            '100'				=> '100'
        );

        $js = 'class="form-control" onChange="this.form.submit();"';

        $pages = ($this->session->flashdata('pages')) ? $this->session->flashdata('pages') : 5;

        echo form_open('dashboard/all_rooms',$form);
        ?>
                        	<div class="form-group">
                                <label class="col-md-3 control-label">
                                    Rooms Per Page
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <?php echo form_dropdown('pages', $dropdown, $pages, $js);?>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close();?>
                            <?php if($this->session->flashdata('err_msg')):?>

                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php echo $this->session->flashdata('err_msg');?></strong>
                            </div>

                            <?php endif;?>
                            <?php if($this->session->flashdata('succ_msg')):?>

                            <div class="alert alert-success alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php echo $this->session->flashdata('succ_msg');?></strong>
                            </div>

                            <?php endif;?>
                            <div id="status_msg">

                             </div>
                            <?php echo form_open('dashboard/room_delete');?>
							<div class="table-scrollable">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Select
									</th>
									<th>
										 Room No
									</th>
									<th>
										 Number of Beds
									</th>
									<th>
										 Rent
									</th>
									<th>
										 Image
									</th>
                                    <th>
										 Action
									</th>
								</tr>
								</thead>
								<tbody>
								<?php if(isset($rooms) && $rooms):
            $i=1;
            foreach($rooms as $rom):
                if($rom->hotel_id==$this->session->userdata('user_hotel')):
                    $class = ($i%2==0) ? "active" : "success";

                    $room_id=$rom->room_id;
                    ?>

                                    <tr class="<?php echo $class;?>">
                                        <td><input type="checkbox" name="delete[]" value="<?php echo $rom->room_id;?>" class="form-control" onclick="this.form.submit();"/></td>
                                        <td><?php echo $rom->room_no;?></td>
                                        <td><?php echo $rom->room_bed;?></td>
                                        <td>₹ <?php echo $rom->room_rent;?></td>
                                        <td><img src="<?php echo base_url();?>upload/thumb/<?php echo $rom->room_image_thumb;?>" alt=""/></td>
                                        <td>

                                        	<a href="<?php echo base_url();?>dashboard/edit_room/<?php echo base64url_encode($room_id);?>" class="fa fa-edit"></a>
                                        <td>
                                    </tr>
                                <?php $i++;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif;?>
								</tbody>
								</table>
                                <p class="pull-right" style="padding-top:10px;">
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="javascript:return confirm('Are you sure that you want to delete the selected records?')"/>
                            </p>

                            <?php echo form_close();?>
								<?php if(isset($pagination) && $pagination)
            echo $pagination; ?>
							</div>
						</div>
					</div>
					-->
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
</div>