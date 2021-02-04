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
                            <li><a href="#section_2">รีวิว</a></li>
                            <li><a href="#sidebar">จองคิว</a></li>
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
                                        <li>เว็บ</li>
                                        <li>มือถือ</li>
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
                        </div>
                        <?php endif; ?>
                        <!-- /row-->

                        <!-- /wrapper indent -->

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
                                    <?php if ($clinic->DAYOFF != 1): ?>
                                        <tr>
                                            <td>วันจันทร์</td>
                                            <td><?php echo $clinic->TIME1; ?> - <?php echo $clinic->CLOSE1; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($clinic->DAYOFF != 2): ?>
                                        <tr>
                                            <td>วันอังคาร</td>
                                            <td><?php echo $clinic->TIME2; ?> - <?php echo $clinic->CLOSE2; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($clinic->DAYOFF != 3): ?>
                                        <tr>
                                            <td>วันพุธ</td>
                                            <td><?php echo $clinic->TIME3; ?> - <?php echo $clinic->CLOSE3; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($clinic->DAYOFF != 4): ?>
                                        <tr>
                                            <td>วันพฤหัสบดี</td>
                                            <td><?php echo $clinic->TIME4; ?> - <?php echo $clinic->CLOSE4; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($clinic->DAYOFF != 5): ?>
                                        <tr>
                                            <td>วันศุกร์</td>
                                            <td><?php echo $clinic->TIME5; ?> - <?php echo $clinic->CLOSE5; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($clinic->DAYOFF != 6): ?>
                                        <tr>
                                            <td>วันเสาร์</td>
                                            <td><?php echo $clinic->TIME6; ?> - <?php echo $clinic->CLOSE6; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($clinic->DAYOFF != 0): ?>
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
                    <form method="post" action="<?php echo base_url('time/' . $clinic->CLINICID); ?>">
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
                                    <input type="date" class="form-control" name="booking_date" id="book_date" required>
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
