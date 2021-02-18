<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>นัดหมอ - นัดหมายแพทย์ เช็คอิน ดูคิวออนไลน์ ไม่ต้องรอนาน</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url() ?>assets/physician/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="<?php echo base_url() ?>assets/physician/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="<?php echo base_url() ?>assets/physician/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="<?php echo base_url() ?>assets/physician/css/admin.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="<?php echo base_url() ?>assets/physician/css/admin.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url('physician')?>"><img src="<?php echo base_url() ?>assets/img/nutmor_logo.png" data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo base_url('physician/dashboard');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                <a class="nav-link" href="<?php echo base_url('physician/manage');?>">
                    <i class="fa fa-fw fa-calendar-check-o"></i>
                    <span class="nav-link-text">จัดการนัดหมาย
<!--                        <span class="badge badge-pill badge-primary">26 New</span>-->
                    </span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="<?php echo base_url('physician/ques');?>">
                    <i class="fa fa-fw fa-envelope-open"></i>
                    <span class="nav-link-text">เรียกคิว</span>
                </a>
            </li>
            <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
              <a class="nav-link" href="bookings.html">
                <i class="fa fa-fw fa-calendar-check-o"></i>
                <span class="nav-link-text">Bookings <span class="badge badge-pill badge-primary">6 New</span></span>
              </a>
            </li>-->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                <a class="nav-link" href="<?php echo base_url('physician/ques/show');?>" target="_blank">
                    <i class="fa fa-fw fa-bullhorn"></i>
                    <span class="nav-link-text">ประกาศคิว</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                <a class="nav-link" href="<?php echo base_url('physician/time');?>">
                    <i class="fa fa-fw fa-clock-o"></i>
                    <span class="nav-link-text">ตั้งค่าวันเวลา</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                <a class="nav-link" href="<?php echo base_url('physician/youtube');?>">
                    <i class="fa fa-fw fa-youtube"></i>
                    <span class="nav-link-text">ตั้งค่าYoutube</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">ตั้งค่าบัญชีผู้ใช้งาน</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProfile">
                    <li>
                        <a href="<?php echo base_url('physician/clinic');?>">ข้อมูลคลินิก</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('physician/doctor');?>">ข้อมูลแพทย์</a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>