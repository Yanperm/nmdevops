<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li><a href="<?php echo base_url('clinic/' . $clinic->CLINICNAME); ?>"><?php echo $clinic->CLINICNAME; ?></a></li>
                <li>นัดหมอออนไลน์</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <form id="booking-clinic-form" method="post" action="<?php echo base_url('booking-confirm') ?>">
            <input type="hidden" value="<?php echo $date; ?>" name="date">
            <input type="hidden" value="<?php echo $time; ?>" name="time">
            <input type="hidden" value="<?php echo $ques; ?>" name="ques">
            <input type="hidden" value="<?php echo $qber; ?>" name="qber">
            <input type="hidden" value="<?php echo $clinic->CLINICID; ?>" name="clinic_id">
            <div class="row">

                <div class="col-xl-8 col-lg-8">
                    <div class="box_general_3 cart">
                        <?php if (empty($this->session->userdata('authenticated'))): ?>
                            <div class="message">
                                <p>เป็นสมาชิกอยู่แล้วหรือไม่?<a href="#0"> เข้าสู่ระบบ </a>ที่นี้</p>
                            </div>
                        <?php endif; ?>
                        <div class="form_title">
                            <h3><strong>1</strong>ข้อมูลพื้นฐาน</h3>
                        </div>
                        <div class="step">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" id="firstname_booking" name="firstname_booking" placeholder="" value="<?php if (!empty($member)): echo explode(" ", $member->CUSTOMERNAME)[0]; endif; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>นามสกุล</label>
                                        <input type="text" class="form-control" id="lastname_booking" name="lastname_booking" placeholder="" value="<?php if (!empty($member) && !empty(explode(" ", $member->CUSTOMERNAME)[1])): echo explode(" ", $member->CUSTOMERNAME)[1]; endif; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!--End step -->

                        <div class="form_title">
                            <h3><strong>2</strong>ข้อมูลสำหรับการติดต่อ</h3>
                        </div>
                        <div class="step">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>เบอร์โทรศัพท์ติดต่อ</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="" value="<?php if (!empty($member)): echo $member->PHONE; endif; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Line Id</label>
                                        <input type="text" class="form-control" id="line_id" name="line_id" placeholder="" value="<?php if (!empty($member)): echo $member->LINEID; endif; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>อีเมล</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php if (!empty($member)): echo $member->EMAIL; endif; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!--End step -->

                        <div class="form_title">
                            <h3><strong>3</strong>สาเหตุที่มาพบแพทย์</h3>
                        </div>
                        <div class="step">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="cause" id="cause"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--End row -->
                        </div>

                        <!--End step -->
                    </div>
                </div>
                <!-- /col -->
                <aside class="col-xl-4 col-lg-4" id="sidebar">
                    <div class="box_general_3 booking">

                        <div class="title">
                            <h3>รายละเอียดการนัดหมอ</h3>
                        </div>
                        <div class="summary">
                            <ul>
                                <li>วันที่: <strong class="float-right"><?php echo $date; ?></strong></li>
                                <li>คิวที่ : <strong class="float-right"><?php echo $ques; ?></strong></li>
                                <?php if ($time != '0'): ?>
                                    <li>เวลา: <strong class="float-right"><?php echo $time; ?></strong></li>
                                <?php endif; ?>
                                <li>แพทย์: <strong class="float-right"><?php echo $clinic->DOCTORNAME ?? ''; ?></strong></li>
                            </ul>
                        </div>
                        <!--                        <ul class="treatments checkout clearfix">-->
                        <!--                            <li>-->
                        <!--                                Back Pain visit <strong class="float-right">$55</strong>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                Cardiovascular screen <strong class="float-right">$55</strong>-->
                        <!--                            </li>-->
                        <!--                            <li class="total">-->
                        <!--                                Total <strong class="float-right">$110</strong>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <hr>
                        <button class="btn_1 full-width" type="submit">ยืนยันการนัดหมอ</button>

                    </div>
                    <!-- /box_general -->
                </aside>
                <!-- /asdide -->

            </div>
            <!-- /row -->
        </form>
    </div>
    <!-- /container -->
</main>
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>-->
<!--<script>-->
<!--    Swal.fire(-->
<!--        'หมายเหตุ!',-->
<!--        'ใส่ข้อมูลอีเมลให้ถูกต้องเพื่อทำการส่งอีเมล<br>ส่วนการส่งอีเมลถึงแพทย์รอการเชื่อมฐานข้อมูลก็ส่งได้เลยค่ะ<br> (ข้อมูลพร้อมลงฐานข้อมูลแล้วค่ะ)',-->
<!--        'warning'-->
<!--    )-->
<!--</script>-->

<script>
    $(document).ready(function () {
        $('#booking-clinic-form').validate({
            rules: {
                firstname_booking: {
                    required: true,
                },
                lastname_booking: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    //remote: {
                    //    url: "<?php //echo base_url('check_email_clinic_already')?>//",
                    //    type: "post"
                    //}
                },
                telephone: {
                    required: true,
                },
                cause: {
                    required: true,
                },

            },
            // set validation messages for the rules are set previously
            messages: {
                firstname_booking: {
                    required: "กรุณากรอกชื่อ"
                },
                lastname_booking: {
                    required: "กรุณากรอกนามสกุล"
                },
                telephone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์"
                },
                email: {
                    required: "กรุณากรอกเมลล์",
                    email: "รูปแบบเมลล์ไม่ถูกต้อง",
                    //remote: "อีเมลนี้มีการใช้งานแล้ว"
                },
                cause: {
                    required: "กรุณากรอกสาเหตุ",
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>