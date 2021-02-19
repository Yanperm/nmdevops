<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li><a href="<?php echo base_url('detail/' . $clinic->CLINICID); ?>"><?php echo $clinic->CLINICNAME ?? ''; ?></a></li>
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
                                <h3><?php echo $clinic->CLINICNAME ?? ''; ?><?php echo $date; ?></h3>
                            </div>
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
<!--                                --><?php //foreach ($bookingExtraQues as $key => $item): ?>
<!--                                    <li style="background: #e9e6ee;"><strong style="width: 105px;">คิวเสริม</strong>-->
<!--                                        <span>B--><?php //echo $key + 1; ?><!-- </span>-->
<!--                                        <button class="booked" disabled>จองแล้ว</button>-->
<!--                                    </li>-->
<!--                                --><?php //endforeach; ?>
                                <li style="background: #e9e6ee;"><strong style="width: 105px;">คิวเสริม</strong>
                                    <span>B<?php echo count($bookingExtraQues) + 1; ?> </span>
                                    <a href="<?php echo base_url('/booking/' . $clinic->CLINICID . '?booking_date=' . $date . "&booking_time=0&ques=B" . (count($bookingExtraQues) + 1) . '&qber=' . (count($bookingExtraQues) + 1)) ?>">จองคิว</a>
                                </li>
                            </ul>
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
                                    <li>แพทย์: <strong class="float-right"><?php echo $clinic->DOCTORNAME ?? ''; ?></strong></li>
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