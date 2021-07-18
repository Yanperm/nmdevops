<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li><a href="<?php echo base_url('clinic/' . $clinic->ENNAME); ?>"><?php echo $clinic->CLINICNAME; ?></a></li>
                <li>เลือกเวลา</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="list_time">
                            <div class="list_title">
                                <i class="icon_clock_alt"></i>
                                <h3><?php echo $clinic->CLINICNAME; ?> <?php echo $date; ?></h3>
                            </div>
                            <?php
                            $today = date($date);
                            $number = date('w', strtotime($today));
                            ?>
                            <?php if ($fullQueue): ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    คิวจองเต็มแล้ว โปรดจองคิวในวันถัดไป  ต้องขออภัยด้วยค่ะ
                                </div>
                            <?php elseif ($number == $clinic->DAYOFF || $closeStatus): ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    หยุดทำการ <?php echo $date; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($statusBooked): ?>
                                <div class="alert alert-info text-center" role="alert">
                                    <p> ท่านได้ทำการนัดหมอในวันที่ <?php echo $date; ?></p>
                                    <p>คิวที่จอง  : <?php echo $queueBooked?></p>
                                    <p>เรียบร้อยแล้ว</p>
                                </div>
                            <?php endif; ?>


                            <?php if ($number != $clinic->DAYOFF && !$statusBooked && !$closeStatus && !$fullQueue): ?>
                                <ul>
                                    <?php foreach ($times as $key => $time):
                                        $textTime = $time->format('H:i') . '-' . $time->add($interval)->format('H:i');
                                        ?>
                                        <li><strong><?php echo $textTime; ?></strong>
                                            <span>A<?php echo $key + 1; ?> </span>
                                            <?php
                                            $booked = false;
                                            foreach ($booking as $i => $item):
                                                if ($item->QBER == ($key + 1)):
                                                    $booked = true;
                                                endif;
                                            endforeach; ?>

                                            <?php if ($booked): ?>
                                                <button class="booked" disabled>จองแล้ว</button>
                                            <?php endif; ?>

                                            <?php if (!$booked): ?>
                                                <a href="<?php echo base_url('/booking/' . $clinic->CLINICID . '?booking_date=' . $date . "&booking_time=" . $textTime . '&ques=A' . ($key + 1) . '&qber=' . ($key + 1)) ?>">จองคิว</a>
                                            <?php endif; ?>

                                        </li>
                                    <?php endforeach; ?>
                                    <!--                                --><?php //foreach ($bookingExtraQues as $key => $item):?>
                                    <!--                                    <li style="background: #e9e6ee;"><strong style="width: 105px;">คิวเสริม</strong>-->
                                    <!--                                        <span>B--><?php //echo $key + 1;?><!-- </span>-->
                                    <!--                                        <button class="booked" disabled>จองแล้ว</button>-->
                                    <!--                                    </li>-->
                                    <!--                                --><?php //endforeach;?>

                                    <li style="background: #e9e6ee;"><strong style="width: 120px;">คิวเสริม</strong>
                                        <span>B<?php echo count($bookingExtraQues) + 1; ?> </span>
                                        <a href="<?php echo base_url('/booking/' . $clinic->CLINICID . '?booking_date=' . $date . "&booking_time=0&ques=B" . (count($bookingExtraQues) + 1) . '&qber=' . (50+count($bookingExtraQues) + 1)) ?>">จองคิว</a>
                                    </li>
                                    <?php if ($bookingExtraQuesC != null):?>
                                    <li style="background: #e9e6ee;"><strong style="width: 120px;">ฉีดยา/ทำแผล</strong>
                                        <span>C<?php echo count($bookingExtraQuesC) + 1; ?> </span>
                                        <a href="<?php echo base_url('/booking/' . $clinic->CLINICID . '?booking_date=' . $date . "&booking_time=0&ques=C" . (count($bookingExtraQuesC) + 1) . '&qber=' . (100+count($bookingExtraQuesC) + 1)) ?>">จองคิว</a>
                                    </li>
                                  <?php endif;?>

                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <aside class="col-xl-4 col-lg-4" id="sidebar">
                        <div class="box_general_3 booking">

                            <div class="title">
                                <h3>รายละเอียดการนัดหมอ</h3>
                            </div>
                            <div class="summary">
                                <ul>
                                    <li>วันที่: <strong class="float-right"><?php echo $date; ?></strong></li>
                                    <li>แพทย์: <strong class="float-right"><?php echo $clinic->DOCTORNAME; ?></strong></li>
                                </ul>
                            </div>
                            <hr>
                        </div>

                    </aside>
                </div>
                <!-- /row -->
            </div>
        </div>
    </div>
</main>
