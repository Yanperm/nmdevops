<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li><?php echo $clinic->CLINICNAME ?? ''; ?></li>
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
                            <li class="ques_online_review_li"><a href="#section_2">รีวิว</a></li>
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
                                        <img src="<?php echo $clinic->image ?? 'http://via.placeholder.com/565x565.jpg'; ?>" alt="" class="img-fluid">
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <small><?php echo $clinic->DETAIL ?? ''; ?></small>
                                    <h1><?php echo $clinic->DOCTORNAME ?? ''; ?></h1>


                                    <span class="rating">
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<small>(145)</small>
                                        <!--<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>-->
										</span>


                                    <ul class="statistic">
                                        <li><a href="<?php echo base_url('checkin?clinic=' . $clinic->CLINICID); ?>" style="color: #ffffff;">เช็คอิน</a></li>
                                        <li onclick="getQues()" style="cursor: pointer">ดูคิว</li>
                                    </ul>


                                    <ul class="contacts">
                                        <li>
                                            <h6>ที่อยู่</h6>
                                            <?php echo $clinic->PROVINCE ?? ''; ?>
                                            <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@<?php echo $clinic->LAT ?? ''; ?>,<?php echo $clinic->LONG ?? ''; ?>,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"> <strong>ดูบนแผนที่</strong></a>
                                        </li>
                                        <li>
                                            <h6>Contact</h6> โทร:<a href="tel://006<?php echo $clinic->PHONE ?? ''; ?>"> <?php echo $clinic->PHONE ?? ''; ?></a> Line: <a href="http://line.me/ti/p/<?php echo $clinic->LINE ?? ''; ?>" target="_blank"> <?php echo $clinic->LINE ?? ''; ?></a></li>
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
                            <p><?php echo $clinic->PROFICIENT ?? ''; ?></p>
                            <?php if ($clinic->SERVICE != ''): ?>
                                <h5>บริการของทางคลินิก</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            <?php foreach (explode(",", $clinic->SERVICE) as $item): ?>
                                                <li><?php echo $item; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- /row-->


                        <hr>

                        <div class="indent_title_in">
                            <i class="pe-7s-news-paper"></i>
                            <h3>ปริญญาบัตรและสถาบันการศึกษา</h3>
                            <!--<p>Mussum ipsum cacilds, vidis litro abertis.</p>-->
                        </div>
                        <div class="wrapper_indent">
                            <p><?php echo $clinic->DIPLOMA ?? ''; ?></p>
                            <?php if ($clinic->DEGREE != ''): ?>
                                <h5>วุฒิบัตร </h5>
                                <ul class="list_edu">
                                    <?php foreach (explode(",", $clinic->DEGREE) as $item): ?>
                                        <li><?php echo $item; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!--  End wrapper indent -->

                        <hr>

                        <div class="indent_title_in">
                            <i class="icon-calendar-7"></i>
                            <h3>ตารางออกตรวจ</h3>
                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                        </div>
                        <div class="wrapper_indent">
                            <p>Zril causae ancillae sit ea. Dicam veritus mediocritatem sea ex, nec id agam eius. Te pri facete latine salutandi, scripta mediocrem et sed, cum ne mundi vulputate. Ne his sint graeco detraxit, posse exerci volutpat has in.</p>
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
                                            <td><?php echo $clinic->TIME1; ?> - <?php echo $clinic->CLOSE1; ?></td>
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
                                            <td><?php echo $clinic->TIME2; ?> - <?php echo $clinic->CLOSE2; ?></td>
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
                                            <td><?php echo $clinic->TIME3; ?> - <?php echo $clinic->CLOSE3; ?></td>
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
                                            <td><?php echo $clinic->TIME4; ?> - <?php echo $clinic->CLOSE4; ?></td>
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
                                            <td><?php echo $clinic->TIME5; ?> - <?php echo $clinic->CLOSE5; ?></td>
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
                                            <td><?php echo $clinic->TIME6; ?> - <?php echo $clinic->CLOSE6; ?></td>
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
                                            <td><?php echo $clinic->TIME_OPEN; ?> - <?php echo $clinic->TIME_CLOSE; ?></td>
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

                <div id="section_2">
                    <div class="box_general_3">
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>4.7</strong>
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        <small>Based on 4 reviews</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>5 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>4 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>3 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>2 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>1 stars</strong></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->

                            <hr>

                            <!--<div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Admin – April 03, 2016:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End review-box -->

                            <!--<div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Ahsan – April 01, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Sara – March 31, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->
                        </div>
                        <!-- End review-container -->
                        <hr>
                        <div class="text-right"><a href="submit-review.html" class="btn_1">Submit review</a></div>
                    </div>
                </div>
                <!-- /section_2 -->
            </div>
            <!-- /col -->
            <aside class="col-xl-4 col-lg-4" id="sidebar">
                <div class="box_general_3 booking">
                    <form method="post" action="<?php echo base_url('time/' . $clinic->CLINICNAME); ?>">
                        <div class="title">
                            <h3>นัดหมายแพทย์</h3>
                            <small>บริการนัดหมายแพทย์ออนไลน์</small>
                        </div>


                        <!-- /row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="" name="email_booking" id="email_booking" value="<?php echo $clinic->CLINICNAME ?? ''; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->


                        <!-- /row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="date"  class="form-control" name="booking_date" id="book_date" required>
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
                        <button class="btn_1 full-width" type="submit">เลือก</button>
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
                <h4 class="modal-title"><?php echo $clinic->CLINICNAME ?? ''; ?></h4>
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
                    <h3 class="ques_online_text" id="time_service"><?php echo $start; ?>-<?php echo $end; ?></h3>

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

<script>

    function getQues() {
        let today = new Date();
        let dateToday = ('0' + (today.getMonth() + 1)).slice(-2) + "/" + ('0' + today.getDate()).slice(-2) + "/" + today.getFullYear();
        let dayOff = $('#day_off').val();
        let start = Date.parse(dateToday + " " + $('#start').val());
        let end = Date.parse(dateToday + " " + $('#end').val());
        let currentTime = Date.parse(dateToday + " " + today.getHours() + ":" + today.getMinutes());
        //let currentTime = Date.parse(dateToday + " " + "20:59");
        if (isNaN(dayOff) || today.getDay() == dayOff) {
            $('#stop').show();
            $('#close').hide();
            $('#open').hide();
        } else if (start > currentTime || end < currentTime) {
            $('#close').show();
            $('#open').hide();
            $('#stop').hide();
        } else if (start <= currentTime || end >= currentTime) {
            $('#close').hide();
            $('#open').show();
            $('#stop').hide();

            let minutesToAdd = 15;
            let time = start;
            let ques = 1;
            let quesShow = 0;

            while (time < end) {
                time = new Date(time + minutesToAdd * 60000);
                time = Date.parse(time);
                if (currentTime <= time && quesShow == 0) {
                    quesShow = ques;
                }
                ques++;
            }

            $('#qber').html("A" + quesShow);
        }

        $('#myModal').modal('show');
    }
</script>


