<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="description" content="<?php
    if (empty($meta)):
      echo getMetaDesc('');
    else:
      echo $meta;
    endif;
    ?>">
    <meta name="author" content="nutmor">
    <title><?php
    if (empty($title)):
      echo getTitle('');
    else:
      echo $title;
    endif;
    ?></title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/nutmor_logo_icon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/menu.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/vendors.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/tables.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/modernizr_tables.js"></script>
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url() ?>assets/css/custom.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200&display=swap" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/jquery-2.2.4.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5ZNQMXS8F4"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-5ZNQMXS8F4');
</script>

<!-- Hotjar Tracking Code for nutmor.com -->
<script>
(function(h,o,t,j,a,r){
h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
h._hjSettings={hjid:2347664,hjsv:6};
a=o.getElementsByTagName('head')[0];
r=o.createElement('script');r.async=1;
r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<script data-ad-client="ca-pub-1310150499142891" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body style="font-family: 'Mitr', sans-serif;">

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="<?php echo base_url() ?>" title="ค้นหาแพทย์">นัดหมอ</a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href=""><span>เมนูของระบบ</span></a>
                <ul id="top_access">
                    <!--                            <li><a href="--><?php //echo base_url('login')?><!--"><i class="icon-user-7"></i> คนไข้ล็อคอิน/สมัครสมาชิก</a></li>-->
                    <!--                            <li><a href="--><?php //echo base_url('link/signin')?><!--"><i class="pe-7s-user"></i></a></li>-->
                    <!--                            <li><a href="--><?php //echo base_url('link/signup')?><!--"><i class="pe-7s-add-user"></i></a></li>-->
                </ul>
                <div class="main-menu">

                    <ul>
                        <li><a href="<?php echo base_url() ?>">หน้าหลัก</a></li>
                        <li><a href="<?php echo base_url('checkin') ?>">เช็คอิน</a></li>
                        <?php if (!empty($this->session->userdata('authenticated')) && $this->session->userdata('authenticated') && $this->session->userdata('type') == 'member'): ?>
                            <li><a href="<?php echo base_url('member/profile') ?>">จัดการนัดหมาย</a></li>
                        <?php endif ?>
                        <li><a href="<?php echo base_url('physician') ?>" target="_blank">สำหรับคลินิก</a></li>
                        <!--                        <li><a href="--><?php //echo base_url('link/package')?><!--">แพ็คเก็จใช้งาน</a></li>-->
                        <!--                        <li class="submenu">-->
                        <!--                            <a class="show-submenu">คู่มือการใช้งาน<i class="icon-down-open-mini"></i></a>-->
                        <!--                            <ul>-->
                        <!--                                <li><a href="--><?php //echo base_url('link/manual')?><!--">การลงทะเบียน</a></li>-->
                        <!--                                <li><a href="--><?php //echo base_url('link/manual')?><!--">การยืนยันบัญชีสมาชิก</a></li>-->
                        <!--                                <li><a href="--><?php //echo base_url('link/manual')?><!--">การเปลี่ยนแปลงรหัสผ่าน</a></li>-->
                        <!--                            </ul>-->
                        <!--                        </li>-->
                        <!--                        <li><a href="--><?php //echo base_url('link/contact')?><!--">ติดต่อเรา</a></li>-->
                        <?php if (empty($this->session->userdata('authenticated'))): ?>
                            <li><a href="<?php echo base_url('login') ?>"><i class="icon-user-7"></i> คนไข้ล็อคอิน/สมัครสมาชิก</a></li>
                        <?php endif; ?>
                        <?php if (!empty($this->session->userdata('authenticated')) && $this->session->userdata('authenticated')): ?>
                            <li class="submenu">
                                <a class="show-submenu">
                                    <?php if ($this->session->userdata('image') == ''): ?>
                                        <i class="icon-user-7"></i>
                                    <?php endif; ?>
                                    <?php if ($this->session->userdata('image') != ''): ?>
                                        <img class="avatar-header" src="<?php echo $this->session->userdata('image'); ?>">
                                    <?php endif; ?>
                                    <?php echo $this->session->userdata('name'); ?>
                                    <i class="icon-down-open-mini"></i>
                                </a>
                                <ul>
                                    <?php if ($this->session->userdata('type') == 'member'): ?>
                                        <li><a href="<?php echo base_url('member/profile'); ?>">บัญชีผู้ใช้</a></li>
                                    <?php endif; ?>
                                    <?php if ($this->session->userdata('type') == 'clinic'): ?>
                                        <li><a href="<?php echo base_url('physician/dashboard'); ?>">บัญชีผู้ใช้</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo base_url('logout') ?>">ออกจากระบบ</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
