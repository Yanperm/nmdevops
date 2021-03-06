<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li>
                    <?php echo $clinic->CLINICNAME; ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <nav id="secondary_nav">
                    <div class="container">
                        <ul class="clearfix">
                            <li><a href="#section_1" class="active">ข้อมูลพื้นฐาน</a></li>
                            <!--                            <li class="ques_online_review_li"><a href="#section_2">รีวิว</a></li>-->
                            <li></li>
                        </ul>
                    </div>
                </nav>
                <div id="section_1">
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-5 col-md-4">
                                    <figure>
                                        <?php if ($clinic->image != ''): ?>
                                        <img src="<?php echo $clinic->image; ?>" alt="" class="img-fluid">
                                        <?php endif; ?>
                                        <?php if ($clinic->image == ''): ?>
                                        <img src="http://via.placeholder.com/565x565.jpg" alt="" class="img-fluid">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <small><?php echo $clinic->DETAIL; ?></small>
                                    <h1>
                                        <?php echo $clinic->DOCTORNAME; ?>
                                    </h1>
                                    <span class="rating">
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <small>(<?php echo number_format($clinic->view_count);?>)</small>
                  </span>
                                    <ul class="statistic">
                                        <li onclick="booking()" style="cursor: pointer">จองคิว</li>
                                        <li onclick="checkIn()" style="cursor: pointer">
                                            <!--  <a href="<?php echo base_url('checkin?clinic=' . $clinic->CLINICID); ?>" style="color: #ffffff;"> -->
                                            เช็คอิน
                                            <!-- </a> -->
                                        </li>
                                        <li onclick="getQues('<?php echo $clinic->IDCLINIC;?>')" style="cursor: pointer">ดูคิว</li>
                                        <li onclick="cancel('<?php echo $clinic->IDCLINIC;?>')" style="cursor: pointer">ยกเลิกคิว</li>
                                    </ul>


                                    <ul class="contacts">
                                        <li>
                                            <h6>ที่อยู่</h6>
                                            <?php echo $clinic->ADDRESS; ?>
                                            <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@<?php echo $clinic->LAT; ?>,<?php echo $clinic->LONG; ?>,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361"
                                                target="_blank"> <strong>ดูบนแผนที่</strong></a>
                                        </li>
                                        <li>
                                            <h6>ติดต่อสอบถามการบริการ</h6> โทร:
                                            <a href="tel:<?php echo $clinic->PHONE; ?>">
                                                <?php echo $clinic->PHONE; ?>
                                            </a> Line:
                                            <a href="http://line.me/ti/p/<?php echo $clinic->LINE; ?>" target="_blank">
                                                <?php echo $clinic->LINE; ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- /profile -->
                        <div class="indent_title_in">
                            <i class="pe-7s-user"></i>
                            <h3>สาขาวิชาที่เชี่ยวชาญ</h3>
                            <!--<p>สาขาวิชาที่เชี่ยวชาญ</p>-->
                        </div>

                        <div class="wrapper_indent">
                            <p>
                                <?php echo $clinic->PROFICIENT; ?>
                            </p>
                            <?php if ($clinic->SERVICE != ''): ?>
                            <h5>บริการของทางคลินิก</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="bullets">
                                        <?php foreach (explode(",", $clinic->SERVICE) as $item): ?>
                                        <li>
                                            <?php echo $item; ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- /row-->
                        <hr>
                        <div class="indent_title_in">
                            <i class="pe-7s-portfolio"></i>
                            <h3>สถานที่ทำงานปัจจุบัน</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="bullets">
                                        <?php foreach (explode(",", $clinic->WORKPLACE) as $item): ?>
                                        <li>
                                            <?php echo $item; ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="indent_title_in">
                            <i class="pe-7s-news-paper"></i>
                            <h3>ปริญญาบัตรและสถาบันการศึกษา</h3>
                            <!--<p>Mussum ipsum cacilds, vidis litro abertis.</p>-->
                        </div>
                        <div class="wrapper_indent">
                            <p>
                                <?php echo $clinic->DIPLOMA; ?>
                            </p>
                            <?php if ($clinic->DEGREE != ''): ?>
                            <h5>วุฒิบัตร </h5>
                            <ul class="list_edu">
                                <?php foreach (explode(",", $clinic->DEGREE) as $item): ?>
                                <li>
                                    <?php echo $item; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <!--  End wrapper indent -->

                        <hr>

                        <div class="indent_title_in">
                            <i class="icon-calendar-7"></i>
                            <h3>ตารางออกตรวจ</h3>
                            <!--                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>-->
                        </div>
                        <div class="wrapper_indent">
                            <!--                            <p>Zril causae ancillae sit ea. Dicam veritus mediocritatem sea ex, nec id agam eius. Te pri facete latine salutandi, scripta mediocrem et sed, cum ne mundi vulputate. Ne his sint graeco detraxit, posse exerci volutpat has in.</p>-->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>วันออกตรวจ</th>
                                            <th>เวลาออกตรวจ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $start = '';
                                    $end = '';
                                    $dayNow = date('N');
                                    if ($clinic->DAYOFF != 1):
                                        if ($dayNow == 1):
                                            $start = $clinic->TIME1;
                                            $end = $clinic->CLOSE1;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันจันทร์</td>
                                                <td>
                                                    <?php echo $clinic->TIME1; ?> -
                                                    <?php echo $clinic->CLOSE1; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันจันทร์</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>


                                            <?php if ($clinic->DAYOFF != 2):
                                        if ($dayNow == 2):
                                            $start = $clinic->TIME2;
                                            $end = $clinic->CLOSE2;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันอังคาร</td>
                                                <td>
                                                    <?php echo $clinic->TIME2; ?> -
                                                    <?php echo $clinic->CLOSE2; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันอังคาร</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($clinic->DAYOFF != 3):
                                        if ($dayNow == 3):
                                            $start = $clinic->TIME3;
                                            $end = $clinic->CLOSE3;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันพุธ</td>
                                                <td>
                                                    <?php echo $clinic->TIME3; ?> -
                                                    <?php echo $clinic->CLOSE3; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันพุธ</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($clinic->DAYOFF != 4):
                                        if ($dayNow == 4):
                                            $start = $clinic->TIME4;
                                            $end = $clinic->CLOSE4;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันพฤหัสบดี</td>
                                                <td>
                                                    <?php echo $clinic->TIME4; ?> -
                                                    <?php echo $clinic->CLOSE4; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันพฤหัสบดี</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($clinic->DAYOFF != 5):
                                        if ($dayNow == 5):
                                            $start = $clinic->TIME5;
                                            $end = $clinic->CLOSE5;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันศุกร์</td>
                                                <td>
                                                    <?php echo $clinic->TIME5; ?> -
                                                    <?php echo $clinic->CLOSE5; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันศุกร์</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($clinic->DAYOFF != 6):
                                        if ($dayNow == 6):
                                            $start = $clinic->TIME6;
                                            $end = $clinic->CLOSE6;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันเสาร์</td>
                                                <td>
                                                    <?php echo $clinic->TIME6; ?> -
                                                    <?php echo $clinic->CLOSE6; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันเสาร์</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($clinic->DAYOFF != 0):
                                        if ($dayNow == 0):
                                            $start = $clinic->TIME_OPEN;
                                            $end = $clinic->TIME_CLOSE;
                                        endif;
                                        ?>
                                            <tr>
                                                <td>วันอาทิตย์</td>
                                                <td>
                                                    <?php echo $clinic->TIME_OPEN; ?> -
                                                    <?php echo $clinic->TIME_CLOSE; ?>
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td>วันอาทิตย์</td>
                                                <td>วันหยุด</td>
                                            </tr>
                                            <?php endif; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--  /wrapper_indent -->
                    </div>
                    <!-- /section_1 -->
                    <input type="hidden" value="<?php echo $start; ?>" id="start">
                    <input type="hidden" value="<?php echo $end; ?>" id="end">
                    <input type="hidden" value="<?php echo $clinic->DAYOFF; ?>" id="day_off">
                </div>
                <!-- /box_general -->


                <!-- /section_2 -->
            </div>
            <!-- /col -->
            <aside class="col-xl-4 col-lg-4 " id="sidebar">
                <div class="box_general_3 booking" id="booking-section">
                    <form method="post" action="<?php echo base_url('time/' . $clinic->IDCLINIC); ?>">
                        <div class="title">
                            <h3>นัดหมายแพทย์</h3>
                            <small>บริการนัดหมายแพทย์ออนไลน์</small>
                        </div>


                        <!-- /row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="" name="email_booking" id="email_booking" value="<?php echo $clinic->CLINICNAME; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->


                        <!-- /row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="booking_date" id="book_date" required>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <!--                        <div class="row">-->
                        <!--                            <div class="col-lg-12">-->
                        <!--                                <div class="form-group">-->
                        <!--                                    <input type="text" class="form-control" name="booking_time" id="booking_time" required>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->


                        <!--                        <div class="row">-->
                        <!--                            <div class="col-6">-->
                        <!--                                <div class="form-group">-->
                        <!--                                    <input class="form-control" type="text" id="booking_date" data-lang="en" data-min-year="2017" data-max-year="2020" data-disabled-days="10/17/2017,11/18/2017">-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-6">-->
                        <!--                                <div class="form-group">-->
                        <!--                                    <input class="form-control" type="text" id="booking_time" value="9:00 am">-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->


                        <!--
                        <ul class="treatments clearfix">
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit1" name="visit1">
                                    <label for="visit1" class="css-label">Back Pain visit <strong>$55</strong></label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit2" name="visit2">
                                    <label for="visit2" class="css-label">Cardiovascular screen <strong>$55</strong></label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit3" name="visit3">
                                    <label for="visit3" class="css-label">Diabetes consultation <strong>$55</strong></label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit4" name="visit4">
                                    <label for="visit4" class="css-label">General visit <strong>$55</strong></label>
                                </div>
                            </li>
                        </ul>  -->

                        <hr>
                        <button class="btn_1 full-width" type="submit">นัดหมอทันที</button>
                    </form>
                </div>
                <!-- /box_general -->
            </aside>
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /wrapper indent -->


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <?php echo $clinic->CLINICNAME; ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="box_badges" id="stop" style="display: none">
                    <div id="badge_level_0"><span class="pe-7s-door-lock ques_online_icon"></span></div>
                    <h3 class="ques_online_text">หยุดทำการ</h3>
                </div>
                <div class="box_badges" id="close" style="display: none">
                    <div id="badge_level_0"><span class="pe-7s-door-lock ques_online_icon"></span></div>
                    <h3 class="ques_online_text">เวลาเปิดบริการ</h3>
                    <h3 class="ques_online_text" id="time_service">
                        <?php echo $start; ?>-
                        <?php echo $end; ?>
                    </h3>

                </div>
                <div class="box_badges" id="open" style="display: none">
                    <div id="badge_level_0"><span class="pe-7s-speaker ques_online_icon"></span></div>
                    <h3 class="ques_online_number" id="qber">A3</h3>
                    <ul>
                        <li style="font-size: 24px;"><span class="pe-7s-note2"></span> ช่องบริการ <span id="service_no">1</span></li>

                    </ul>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn_1 outline" data-dismiss="modal">ปิด</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="myModalCheckIn">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <?php echo $clinic->CLINICNAME; ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="show-1">
                    <p>คลินิก</p>
                    <input class="form-control" type="text" name="clinic_name" value="<?php echo $clinic->CLINICNAME; ?>" readonly>
                    <p class="mt-4">เมลล์</p>
                    <?php if (empty($this->session->userdata('authenticated'))): ?>
                    <input class="form-control" id="email" type="mail" name="email" value="">
                    <?php endif;?>

                    <?php if (!empty($this->session->userdata('authenticated'))): ?>
                    <input class="form-control" id="email" type="mail" name="email" value="<?php echo $this->session->userdata('email');?>">
                    <?php endif;?>
                </div>
                <div id="show-2" style="display: none">
                    <input type="hidden" value="" id="idBooking">
                    <p>คลินิก</p>
                    <input class="form-control" type="text" name="clinic_name" value="<?php echo $clinic->CLINICNAME; ?>" readonly>
                    <div class="row" id="result-checkin" style="    font-size: 16px;font-weight: 600;">
                        <div class="col-lg-6">
                            <p class="mt-5">วันที่ : <span id="date-show"></span></p>
                            <p>เวลา : <span id="time-show"></span></p>
                            <p>สถานะ : <span id="status-show"></span></p>
                        </div>
                        <div class="col-lg-6">
                            <p class="mt-5">คิวที่ : <span id="queue-show"></span></p>
                            <p class="mt-5" id="status"></p>
                        </div>
                    </div>
                    <div class="row" id="checkInNull">
                        <div class="col-md-12">
                            <p class="mt-5">ยังไม่มีคิวล่าสุดให้ทำการ Check-in</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="check" class="btn_1" onclick="check('<?php echo $clinic->IDCLINIC; ?>')">ตรวจสอบ</button>
                <button type="button" style="display: none" id="checkIn" class="btn_1" onclick="checkInconfirm('<?php echo $clinic->IDCLINIC; ?>')">เช็คอิน</button>
                <button type="button" class="btn_1 outline" data-dismiss="modal">ปิด</button>
            </div>

        </div>
    </div>
</div>


<div class="modal" id="myModalCancel">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ยกเลิกจองคิว
                    <?php echo $clinic->CLINICNAME; ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal" onclick="closeCancel()">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="show-1-cancel">
                    <p>คลินิก</p>
                    <input class="form-control" type="text" name="clinicCancel" value="<?php echo $clinic->CLINICNAME; ?>" readonly>
                    <p class="mt-4">เมลล์</p>
                    <?php if (empty($this->session->userdata('authenticated'))): ?>
                    <input class="form-control" id="emailCancel" type="mail" name="emailCancel" value="">
                    <?php endif;?>

                    <?php if (!empty($this->session->userdata('authenticated'))): ?>
                    <input class="form-control" id="emailCancel" type="mail" name="emailCancel" value="<?php echo $this->session->userdata('email');?>">
                    <?php endif;?>
                    <p class="mt-4">วันที่</p>
                    <input type="date" class="form-control" id="dateCancel" name="dateCancel" min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="mt-3" id="list-booking"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="cancel" class="btn_1" onclick="checkCancel('<?php echo $clinic->IDCLINIC; ?>')">ตรวจสอบ</button>
                <button type="button" class="btn_1 outline" data-dismiss="modal" onclick="closeCancel()">ปิด</button>
            </div>

        </div>
    </div>
</div>

<style>
    .text-modal {
        color: #e84e84;
        font-weight: bold;
        font-size: 18px
    }
    
    @-webkit-keyframes pulse {
        from {
            box-shadow: 0 0 0 0 rgba(3, 149, 229, 0.4);
        }
        to {
            box-shadow: 0 0 0 45px rgba(3, 149, 229, 0);
        }
    }
    
    @keyframes pulse {
        from {
            box-shadow: 0 0 0 0 rgba(3, 149, 229, 0.4);
        }
        to {
            box-shadow: 0 0 0 45px rgba(3, 149, 229, 0);
        }
    }
    
    .highlight:before,
    .highlight:after {
        content: "";
        width: 0%;
        height: 0%;
        position: absolute;
        visibility: hidden;
        border-radius: 2px;
    }
    
    .highlight:before {
        border-top: 1px solid #0395E5;
        border-right: 1px solid #0395E5;
        transition: width 0.1s ease 0.3s, height 0.1s ease 0.2s, visibility 0s 0.4s;
        top: 0;
        left: 0;
    }
    
    .highlight:after {
        border-left: 1px solid #0395E5;
        border-bottom: 1px solid #0395E5;
        bottom: 0;
        right: 0;
        transition: width 0.1s ease 0.1s, height 0.1s ease, visibility 0s 0.2s;
    }
    
    .highlight {
        position: relative;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-animation: pulse 1s ease-out 0.4s;
        animation: pulse 1s ease-out 0.4s;
        color: #0395E5;
    }
    
    .highlight:before,
    .highlight:after {
        width: 100%;
        height: 100%;
        visibility: visible;
    }
    
    .highlight:before {
        transition: width 0.1s ease, height 0.1s ease 0.1s;
    }
    
    .highlight:after {
        transition: width 0.1s ease 0.2s, height 0.1s ease 0.3s, visibility 0s 0.2s;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function checkIn() {
        $('#show-1').show();
        $('#show-2').hide();
        $('#check').show();
        $('#checkIn').hide();
        $('#myModalCheckIn').modal('show');
    }

    function check(idClinic) {
        $.ajax({
            url: '<?php echo base_url("checkinLast"); ?>',
            type: 'get',
            data: {
                idClinic: idClinic,
                email: $('#email ').val()
            },
            success: function(response) {
                console.log(response);
                if (response.length == 0) {
                    $('#result-checkin').hide();
                    $('#checkInNull').show();
                } else {
                    $('#result-checkin').show();
                    $('#checkInNull').hide();
                    $('#idBooking').val(response.BOOKINGID);
                    $('#date-show').html(response.BOOKDATE);
                    $('#time-show').html(response.BOOKTIME);
                    $('#queue-show').html(response.QUES);
                    if (response.CHECKIN == "0") {
                        $('#status-show').html(' <span class = "badge badge-warning"> รอการเช็คอิน </span>');
                        $('#checkIn').show();
                    } else if (response.CHECKIN == "1") {
                        $('#status-show').html(' <span class = "badge badge-success"> เช็คอินแล้ว </span>');
                        $('#checkIn').hide();
                    }
                    if (response.CONFIRM == "0") {
                        $('#status').html(' <span class = "badge badge-primary" > ยังไม่ยืนยันการจอง </span>');
                    } else if (response.CONFIRM == "1") {
                        $('#status').html(' <span class = "badge badge-info"> รอการเช็คอิน </span>');
                    }
                }
                $('#show-1').hide();
                $('#show-2').show();
                $('#check').hide();
            }
        });
    }

    function checkInconfirm(idClinic) {
        $.ajax({
            url: ' <?php echo base_url("checkinFast");?>',
            type: 'get',
            data: {
                idClinic: idClinic,
                id: $('#idBooking').val()
            },
            success: function(response) {
                check(idClinic);
            }
        });
    }

    function cancel(idClinic) {
        $('#emailCancel').val('');
        $('#dateCancel').val('<?php echo date("Y-m-d");?>');
        $('#myModalCancel').show();
    }

    function closeCancel(idClinic) {
        $('#emailCancel').val('');
        $('#dateCancel').val('<?php echo date("Y-m-d");?>');
        $('#myModalCancel').hide();
    }

    function checkCancel(idClinic) {
        $.ajax({
            url: '<?php echo base_url("list-booking"); ?>',
            type: 'get',
            data: {
                idClinic: idClinic,
                email: $('#emailCancel').val(),
                date: $('#dateCancel').val()
            },
            success: function(response) {
                $('#list-booking').html(response);
            }
        });
    }

    function cancelConfirm(id) {
        Swal.fire({
            title: 'ต้องการยกเลิกการจองหรือไม่?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ไม่ใช่'
        }).then((result) => {
            $.ajax({
                url: '<?php echo base_url("cancel-booking"); ?>',
                type: 'get',
                data: {
                    vn: id,
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'ยกเลิกสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#list-booking').html('');
                    $('#emailCancel').val('');
                    $('#dateCancel').val('<?php echo date("Y-m-d");?>');
                    $('#myModalCancel').hide();
                }
            });
        })
    }


    function getQues(id) {
        $.ajax({
            url: '<?php echo base_url("current-queue"); ?>',
            type: 'get',
            data: {
                clinic_id: id,
            },
            success: function(response) {
                let queue = "-";
                if (response.length > 0) {
                   queue = response[0].QUES
                }
                    $('#close').hide();
                    $('#open').show();
                    $('#stop').hide();
                    $('#qber').html(queue);
                    $('#myModal').modal('show');
               // }
               //  else {
                //     let today = new Date();
                //     let dateToday = ('0' + (today.getMonth() + 1)).slice(-2) + "/" + ('0' + today.getDate()).slice(-2) + "/" + today.getFullYear();
                //     let dayOff = $('#day_off').val();
                //     let start = Date.parse(dateToday + " " + $('#start').val());
                //     let end = Date.parse(dateToday + " " + $('#end').val());
                //     let currentTime = Date.parse(dateToday + " " + today.getHours() + ":" + today.getMinutes()); //let currentTime = Date.parse(dateToday + " " + "20:59");
                //     if (isNaN(dayOff) || today.getDay() == dayOff) {
                //         $('#stop').show();
                //         $('#close').hide();
                //         $('#open').hide();
                //     } else if (start > currentTime || end < currentTime) {
                //         $('#close').show();
                //         $('#open').hide();
                //         $('#stop').hide();
                //     } else if (start <= currentTime || end >= currentTime) {
                //         $('#close').hide();
                //         $('#open').show();
                //         $('#stop').hide();
                //         let minutesToAdd = 15;
                //         let time = start;
                //         let ques = 1;
                //         let quesShow = 0;
                //         while (time < end) {
                //             time = new Date(time + minutesToAdd * 60000);
                //             time = Date.parse(time);
                //             if (currentTime <= time && quesShow == 0) {
                //                 quesShow = ques;
                //             }
                //             ques++;
                //         }
                //         $('#qber').html("ไม่พบการเรียกคิว");
                //     }
                 //   $('#myModal').modal('show');
                // }
            }
        });
    }

    function booking() {
        $("html, body").animate({
            scrollTop: $('#booking-section').offset().top - 100
        }, 1000);
        setTimeout(function() {
            $('#booking-section').addClass("highlight");
        }, 1000);

        setTimeout(function() {
            $('#booking-section').removeClass("highlight");
        }, 3000);
    }
</script>