<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url('/') ?>">หน้าแรก</a></li>
                <li>รายละเอียดคิวจอง</li>

            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60_35">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="box_general_3 write_review">
                    <?php if (empty($detail[0])): ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div id="confirm">
                                <div style="font-size: 33px;color: #e84e84;" class="icon icon--order-success svg add_bottom_15">
                                    <div class="fs1" aria-hidden="true" data-icon="r"></div>
                                </div>
                                <h2>ไม่พบข้อมูลการนัดหมอ !</h2>
                                <p>กรุณาตรวจสอบอีกครั้ง</p>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>

                    <?php if (!empty($detail[0])): ?>
                        <h1 style="font-weight: bold;">รายละเอียดคิวจอง</h1>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ques_detail">
                                    <label>รายการ</label>
                                    <?php echo $detail[0]->BOOKINGID; ?>
                                </div>
                                <p class="ques_detail"><i class="icon_archive_alt"></i> <?php echo $detail[0]->CLINICNAME; ?></p>
                                <p class="ques_detail"><span class="pe-7s-user"></span> <?php echo $detail[0]->CUSTOMERNAME; ?></p>
                                <?php if ($detail[0]->CONFIRM): ?><span class="status">ยืนยันการจอง</span><?php endif; ?>
                                <?php if (!$detail[0]->CONFIRM): ?><span class="status">ยังไม่ยืนยันการจอง</span><?php endif; ?>
                                <p class="ques_detail">สถานะ :
                                    <?php if (!$detail[0]->CHECKIN): ?><span class="confirm_0">ยังไม่ได้ทำการเช็คอิน</span><?php endif; ?>
                                    <?php if ($detail[0]->CHECKIN): ?><span class="confirm_1">ทำการเช็คอินเรียบร้อยแล้ว</span><?php endif; ?>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <div class="box_feat_checkin">
                                    <p class="ques_detail"><i class="icon_calendar"></i> <?php echo $detail[0]->BOOKDATE; ?></p>
                                    <p class="ques_detail"><i class="icon_clock_alt"></i> <?php echo $detail[0]->BOOKTIME; ?></p>
                                    <h3>คิวที่</h3>
                                    <h1><?php echo $detail[0]->QUES; ?></h1>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div style="text-align: right">
                            <?php if (!$detail[0]->CHECKIN): ?>
                                <a href="#" class="btn_cancel"><span class="pe-7s-close-circle"></span>ยกเลิกคิว</a>
                                <a href="<?php echo base_url('/confirm/checkin/' . $detail[0]->BOOKINGID); ?>" class="btn_1" style="padding: 9px 26px;font-weight: bold;font-size: 15px;"><span class="pe-7s-check"></span>เช็คอิน</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>