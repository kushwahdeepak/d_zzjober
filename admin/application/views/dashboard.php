<style type="text/css">
.event-tooltip {
    width: 175px;
    background: rgba(0, 0, 0, 0.9);
    color: #FFF;
    padding: 8px;
    position: absolute;
    z-index: 10001;
    border-radius: 4px;
    cursor: pointer;
    font-size: 11px;
    line-height: 18px;
}
.service-inactive-status {
    background-color: #D8534F;
    border-color: #D8534F;
    font-size: 12px;
}
.service-status-icon {
    border: 1px solid;
    color: #fff !important;
    text-align: center;
    padding-top: 4px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 4px;
}
.red {
    background: rgb(254, 81, 81);
    color: white;
    padding-left: 8px;
    padding-right: 8px;
}
.green {
    background: rgb(0, 128, 0);
    color: white;
    padding-left: 8px;
    padding-right: 8px;
}
.yellow {
    background: rgb(255, 255, 0);
    color: black;
    padding-left: 8px;
    padding-right: 8px;
}
.lightblue {
    background: #3a87ad;
    color: white;
    padding-left: 8px;
    padding-right: 8px;
}
.darkblue {
    background: rgb(71, 71, 228);
    color: white;
    padding-left: 8px;
    padding-right: 8px;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php if(!empty($data['noOfpendingAppointment'])) echo $data['noOfpendingAppointment']; ?></h3>
                        <p>New Appointment</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php if(!empty($data['noOfVendor'])) echo $data['noOfVendor']; ?></h3>
                        <p>Vendors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php if(!empty($data['noOfCustomer'])) echo $data['noOfCustomer']; ?></h3>
                        <p>Customers </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php if(!empty($data['noOfServices'])) echo $data['noOfServices']; ?></h3>
                        <p>Services</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-md-12">
                <div class="box box-primary">
                 
                   





                  <div class="row">

                    <div class="col-md-12">

                        <select style="width: 100%; margin-bottom: 20px;color: #fff;background-color: #1d77bf;" class="form-control col-md-12" id="employee_select_for_calendar">
                            <option value="all">All Vendor</option>
                            <?php if (isset($data['vendorList'])) {
                                foreach ($data['vendorList'] as $vendor) { ?>
                                <option value="<?php echo $vendor->user_id; ?>">
                                    <?php if($vendor->first_name) echo $vendor->first_name; ?>
                                    <?php if($vendor->last_name) echo $vendor->last_name; ?>
                                </option>
                                <?php }
                            } ?>
                        </select>
                        




                        <div id="calendar_admin"></div>
                        
                        <br>
                        <div style="float: right;">
                            <label class="red">Cancelled</label>
                            <label class="green">Reviewed</label>
                            <label class="yellow">Pending</label>
                            <label class="lightblue">In Proccess</label>
                            <label class="darkblue">Completed</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>
    <!-- /.row -->
</section>
</div>



