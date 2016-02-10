<style>
    .all_bk .table>tbody>tr>td{ vertical-align: middle !important;}
    .all_bk .table thead tr th{ font-size:13px; text-align:center;}
    .all_bk .table-bordered>tbody>tr>td{ font-size:12px;}
    .all_bk .md-checkbox label > .box{height: 15px;width: 15px;}
    .all_bk .btn{ font-size:12px;}
    .all_bk .form-control{ font-size:12px;height: auto;padding: 2px;}
    .all_bk .portlet.box > .portlet-title > .caption {
        padding: 18px 0 9px 0;
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
    td.sorting_1  {
        height: 60px;
        width: 60px;
        text-align: center;
        padding:0;
    }
    td.sorting_1 img {
        text-align: center;
        margin: 0 auto;
        padding:0;
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



    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->




        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>List of All Assets
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
                            <div class="btn-group">
                                <a href="<?php echo base_url();?>dashboard/add_asset">
                                    <button  class="btn green">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
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

                <table class="table table-striped table-hover table-bordered table-scrollable" id="sample_editable_1">
                    <thead>
                    <tr>
                        <!--<th scope="col">
                            Select
                        </th>-->
                        <th scope="col">
                            Asset ID
                        </th>
                        <th scope="col">
                            Asset Image
                        </th>
                        <th scope="col">
                            Asset Type
                        </th>
                        <th scope="col">
                            Asset Name
                        </th>
                        <th scope="col">
                            Asset First Hand
                        </th>
                        <th scope="col">
                            Asset Bought On
                        </th>
                        <th scope="col">
                            Asset Description
                        </th>
                        <th scope="col">
                            Asset Registration Number
                        </th>
                        <th scope="col">
                            Asset Purchased From
                        </th>
                        <th scope="col">
                            Asset Seller Contact Number
                        </th>
                        <th scope="col">
                            Asset Service Contact Number
                        </th>
                        <th scope="col">
                            Asset Incharge
                        </th>
                        <th scope="col">
                            Asset Cost
                        </th>
                        <th scope="col">
                            Asset Annual Depreciation
                        </th>
                        <th scope="col">
                            Asset Decomission Date
                        </th>
                        <th scope="col">
                            Asset AMC
                        </th>
                        <th scope="col">
                            Asset AMC Agency Name
                        </th>
                        <th scope="col">
                            Asset AMC Contact Number
                        </th>
                        <th scope="col">
                            Asset AMC Renewal Date
                        </th>
                        <th scope="col">
                            Asset AMC Charge
                        </th>
                        <th scope="col">
                            Action
                        </th>                    


                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($assets) && $assets):
                        foreach($assets as $assets):
                            
                            $a_id = $assets->a_id;
                            $a_type = $assets ->a_type;
                            $assets_id= $a_type.$a_id;
                            ?>
                            <tr>

                                <td> 
                                    <?php echo $assets_id; ?>
                                </td>

                                <td> 
                                    <img  width="60px" height="60px" src="<?php echo base_url();?>upload/asset/<?php if( $assets->a_asset_image== '') { echo "no_images.png"; } else { echo $assets->a_asset_image; }?>" alt=""/>
                                </td>

                                <td>  
                                    <?php echo $assets->a_type; ?>                                  
                                </td>

                                <td>  
                                    <?php echo $assets->a_name; ?>                                  
                                </td>

                                <td>  
                                    <?php echo $assets->a_first_hand; ?>                                  
                                </td>

                                <td> 
                                    <?php echo $assets->a_bought_date; ?>                                   
                                </td>

                                <td> 
                                    <?php echo $assets->a_description; ?>                                     
                                </td>

                                <td> 
                                    <?php echo $assets->a_reg_number; ?>                                     
                                </td>

                                <td>
                                    <?php echo $assets->a_purchased_from; ?>                                      
                                </td>

                                <td>
                                    <?php echo $assets->a_seller_contact_no; ?>                                      
                                </td>

                                <td> 
                                    <?php echo $assets->a_service_contact_no; ?>                                     
                                </td>

                                <td>         
                                    <?php echo $assets->a_incharge; ?>                            
                                </td>

                                <td>  
                                    <?php echo $assets->a_cost; ?>                                   
                                </td>

                                <td>  
                                    <?php echo $assets->a_annual_depreciation; ?>                                   
                                </td>

                                <td> 
                                    <?php echo $assets->a_decomission_date; ?>                                    
                                </td>

                                <td>    
                                    <?php echo $assets->a_amc; ?>                                
                                </td>

                                <td> 
                                    <?php echo $assets->a_amc_agency_name; ?>                                   
                                </td>

                                <td>  
                                    <?php echo $assets->a_amc_reg_contact_no; ?>                                  
                                </td>

                                <td> 
                                    <?php echo $assets->a_amc_renewal_date; ?>                                   
                                </td>

                                <td> 
                                    <?php echo $assets->a_amc_charge; ?>                                   
                                </td>

                                <td>
                                    <!--<button class="btn btn-danger pull-right" data-toggle="confirmation" data-singleton="true">Delete</button>-->
                                    <a href="" class="btn btn-danger pull-right" data-toggle="modal" style="margin-left:55px;">Delete</a>
                                    <a href="" class="btn blue pull-left" data-toggle="modal" style="margin-top:-31px;" >Edit</a>
                                </td>
                            </tr>


                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
