<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<!--<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">-->
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/dashboard') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <h1 class="mr-2"><?php echo number_format($countClinic);?></h1>
                                    </div>
                                    <div class="media-body">
                                        <h4>Clinic Subscription</h4>
                                        <span>update now</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="ri-hospital-line danger font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <h1 class="mr-2">฿<?php echo number_format($countClinic*59000, 2);?></h1>
                                    </div>
                                    <div class="media-body">
                                        <h4>Subscription</h4>
                                        <span>update now</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-wallet success font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="ri-empathize-line info font-large-2 mr-2"></i>
<!--                                        <i class="icon-pencil primary font-large-2 mr-2"></i>-->
                                    </div>
                                    <div class="media-body">
                                        <h4>Patient</h4>
                                        <span>update now</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1><?php echo number_format($countPatient);?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="ri-health-book-line warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Booking</h4>
                                        <span>update now</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1><?php echo number_format($countBooking);?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ri-checkbox-circle-line success font-large-2 float-left"></i>
<!--                                        <i class="icon-pencil primary font-large-2 float-left"></i>-->
                                    </div>
                                    <div class="media-body text-right">
                                        <h3><?php echo number_format($countBookingChecked);?></h3>
                                        <span>Checked</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ri-checkbox-line  warning font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>156</h3>
                                        <span>Booking Confirm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ri-calendar-event-line info font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3><?php echo number_format($countQueueToday);?></h3>
                                        <span>Queue</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ri-calendar-2-fill danger font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3><?php echo number_format($countQueueTomorrow);?></h3>
                                        <span>Tomorrow</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </section>


        <div class="row">
<!--            <div class="col-xl-3 col-sm-6 mb-3">-->
<!--                <div class="card dashboard text-white bg-warning o-hidden h-100">-->
<!--                    <div class="card-body">-->
<!--                        <div class="card-body-icon">-->
<!--                            <i class="fa fa-fw fa-star"></i>-->
<!--                        </div>-->
<!--                        <div class="mr-5"><h5> --><?php //echo number_format($todayBooking);?><!-- คิววันนี้</h5></div>-->
<!--                    </div>-->
<!--                    <a class="card-footer text-white clearfix small z-1" href="--><?php //echo base_url('physician/ques')?><!--">-->
<!--                        <span class="float-left">รายละเอียด</span>-->
<!--                        <span class="float-right">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-3 col-sm-6 mb-3">-->
<!--                <div class="card dashboard text-white bg-primary o-hidden h-100">-->
<!--                    <div class="card-body">-->
<!--                        <div class="card-body-icon">-->
<!--                            <i class="fa fa-fw fa-envelope-open"></i>-->
<!--                        </div>-->
<!--                        <div class="mr-5"><h5>--><?php //echo number_format($allBooking);?><!-- คิวทั้งหมด</h5></div>-->
<!--                    </div>-->
<!--                    <a class="card-footer text-white clearfix small z-1" href="--><?php //echo base_url('physician/ques/manage');?><!--">-->
<!--                        <span class="float-left">รายละเอียด</span>-->
<!--                        <span class="float-right">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-xl-3 col-sm-6 mb-3">-->
<!--                <div class="card dashboard text-white bg-success o-hidden h-100">-->
<!--                    <div class="card-body">-->
<!--                        <div class="card-body-icon">-->
<!--                            <i class="fa fa-fw fa-calendar-check-o"></i>-->
<!--                        </div>-->
<!--                        <div class="mr-5"><h5>80 New Clinic</h5></div>-->
<!--                    </div>-->
<!--                    <a class="card-footer text-white clearfix small z-1" href="bookings.html">-->
<!--                        <span class="float-left">รายละเอียด</span>-->
<!--                        <span class="float-right">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-3 col-sm-6 mb-3">-->
<!--                <div class="card dashboard text-white bg-warning o-hidden h-100">-->
<!--                    <div class="card-body">-->
<!--                        <div class="card-body-icon">-->
<!--                            <i class="fa fa-fw fa-calendar-check-o"></i>-->
<!--                        </div>-->
<!--                        <div class="mr-5"><h5>80 New Patient</h5></div>-->
<!--                    </div>-->
<!--                    <a class="card-footer text-white clearfix small z-1" href="bookings.html">-->
<!--                        <span class="float-left">รายละเอียด</span>-->
<!--                        <span class="float-right">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-3 col-sm-6 mb-3">-->
<!--                <div class="card dashboard text-white bg-info o-hidden h-100">-->
<!--                    <div class="card-body">-->
<!--                        <div class="card-body-icon">-->
<!--                            <i class="fa fa-fw fa-calendar-check-o"></i>-->
<!--                        </div>-->
<!--                        <div class="mr-5"><h5>8,000 LIKE</h5></div>-->
<!--                    </div>-->
<!--                    <a class="card-footer text-white clearfix small z-1" href="bookings.html">-->
<!--                        <span class="float-left">รายละเอียด</span>-->
<!--                        <span class="float-right">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-3 col-sm-6 mb-3">-->
<!--                <div class="card dashboard text-white bg-danger o-hidden h-100">-->
<!--                    <div class="card-body">-->
<!--                        <div class="card-body-icon">-->
<!--                            <i class="fa fa-fw fa-calendar-check-o"></i>-->
<!--                        </div>-->
<!--                        <div class="mr-5"><h5>8,000 LIKE</h5></div>-->
<!--                    </div>-->
<!--                    <a class="card-footer text-white clearfix small z-1" href="bookings.html">-->
<!--                        <span class="float-left">รายละเอียด</span>-->
<!--                        <span class="float-right">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <!-- /cards -->
        <h2></h2>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-bar-chart"></i>สถิติการเข้าชมคลินิกทั้งหมด</h2>
            </div>
            <input type="hidden" id="data" value="<?php echo json_encode($statData);?>">
            <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
        </div>
    </div>
    <!-- /.container-fluid-->
</div>

<style>
    .card .card-content .card-body{
        min-height: 113px;
    }
    .card-body h1 {
        font-size: 2rem;
    }
    .card .card-body{
        min-height: 50px;
    }

</style>
