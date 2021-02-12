<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="register">
                <h1>สร้างบัญชีนัดหมอ</h1>





                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="tabs_styled_2">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="member-tab" data-toggle="tab" href="#member" role="tab" aria-controls="member">ผู้ป่วย</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab" aria-controls="clinic" aria-expanded="true">คลีนิก</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade  show active " id="member" role="tabpanel" aria-labelledby="member-tab">
                                    <form id="register-form" action="<?php echo base_url('add_member'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="box_form">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" class="form-control" placeholder="" id="first_name" name="first_name">
                                            </div>
                                            <div class="form-group">
                                                <label>นามสกุล</label>
                                                <input type="text" class="form-control" placeholder="" name="last_name">
                                            </div>
                                            <div class="form-group">
                                                <label>อีเมล</label>
                                                <input type="email" class="form-control" placeholder="" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label>Line Id</label>
                                                <input type="text" class="form-control" placeholder="" name="line_id">
                                            </div>
                                            <div class="form-group">
                                                <label>เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control" placeholder="" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label>รหัสผ่าน</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>ยืนยันรหัสผ่าน</label>
                                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label> รูปภาพ</label>
                                                <input type="file" name="files" class="form-control">
                                            </div>
                                            <div id="pass-info" class="clearfix"></div>
                                            <div class="checkbox-holder text-left">
                                                <div class="checkbox_2">
                                                    <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked>
                                                    <label for="check_2"><span>ยอมรับ <strong>เงื่อนไขข้อตกลงการใช้บริการ และ นโยบายความเป็นส่วนตัว</strong>ของ Nutmor</span></label>
                                                </div>
                                            </div>
                                            <div class="form-group text-center add_top_30">
                                                <input class="btn_1" type="submit" value="สมัครสมาชิก">
                                            </div>
                                        </div>
                                        <p class="text-center link_bright" style="color: #3f4078;">เป็นสมาชิกอยู่แล้วหรือไม่? <a href="<?php echo base_url('login') ?>"><strong>เข้าสู่ระบบ</strong></a></p>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
                                    <form id="register-clinic-form" action="<?php echo base_url('add_clinic'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="box_form">
                                            <div class="form-group">
                                                <label>ชื่อคลีนิก</label>
                                                <input type="text" class="form-control" placeholder=""  name="clinic_name">
                                            </div>
                                            <div class="form-group">
                                                <label>แพทย์</label>
                                                <input type="text" class="form-control" placeholder="" name="doctor_name">
                                            </div>
                                            <div class="form-group">
                                                <label>สาขาวิชาที่เชี่ยวชาญ</label>
                                                <input type="text" class="form-control" placeholder="" name="proficient">
                                            </div>
                                            <div class="form-group">
                                                <label>บริการของทางคลินิก</label>
                                                <input type="text" class="form-control" placeholder="" name="service">
                                            </div>
                                            <div class="form-group">
                                                <label>ปริญญาบัตรและสถาบันการศึกษา</label>
                                                <input type="text" class="form-control" placeholder="" name="diploma">
                                            </div>
                                            <div class="form-group">
                                                <label>วุฒิบัตร</label>
                                                <input type="text" class="form-control" placeholder="" name="degree">
                                            </div>
                                            <div class="form-group">
                                                <label>ที่อยู่</label>
                                                <input type="text" class="form-control" placeholder="" name="province">
                                            </div>
                                            <div class="form-group">
                                                <label>อีเมล</label>
                                                <input type="email" class="form-control" placeholder="" name="email_clinic">
                                            </div>
                                            <div class="form-group">
                                                <label>Line Id</label>
                                                <input type="text" class="form-control" placeholder="" name="line_id_clinic">
                                            </div>
                                            <div class="form-group">
                                                <label>เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control" placeholder="" name="phone_clinic">
                                            </div>
                                            <div class="form-group">
                                                <label>เว็บไซต์</label>
                                                <input type="text" class="form-control" placeholder="" name="website">
                                            </div>
                                            <div class="form-group">
                                                <label>รหัสผ่าน</label>
                                                <input type="password" class="form-control" id="password_clinic" name="password_clinic" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>ยืนยันรหัสผ่าน</label>
                                                <input type="password" class="form-control" id="cpassword_clinic" name="cpassword_clinic" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label> รูปภาพ</label>
                                                <input type="file" name="files_clinic" class="form-control">
                                            </div>
                                            <div id="pass-info" class="clearfix"></div>
                                            <div class="checkbox-holder text-left">
                                                <div class="checkbox_2">
                                                    <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked>
                                                    <label for="check_2"><span>ยอมรับ <strong>เงื่อนไขข้อตกลงการใช้บริการ และ นโยบายความเป็นส่วนตัว</strong>ของ Nutmor</span></label>
                                                </div>
                                            </div>
                                            <div class="form-group text-center add_top_30">
                                                <input class="btn_1" type="submit" value="สมัครสมาชิก">
                                            </div>
                                        </div>
                                        <p class="text-center link_bright" style="color: #3f4078;">เป็นสมาชิกอยู่แล้วหรือไม่? <a href="<?php echo base_url('login') ?>"><strong>เข้าสู่ระบบ</strong></a></p>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {

        $('#register-form').validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo base_url('check_email_already')?>",
                        type: "post"
                    }
                },
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6
                },
                cpassword: {
                    required: true,
                    equalTo: "#password"
                }
            },
            // set validation messages for the rules are set previously
            messages: {
                first_name: {
                    required: "กรุณากรอกชื่อ"
                },
                last_name: {
                    required: "กรุณากรอกนามสกุล"
                },
                phone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์"
                },
                email: {
                    required: "กรุณากรอกอีเมล",
                    email: "รูปแบบอีเมลไม่ถูกต้อง",
                    remote: "อีเมลนี้มีการใช้งานแล้ว"
                },
                password: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "ความยาวของรหัสผ่านอย่างน้อย 6 ตัวอักษร"
                },
                cpassword: {
                    required: "กรุณากรอกยืนยันรหัสผ่าน",
                    equalTo: "รหัสไม่ตรงกัน"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $('#register-clinic-form').validate({
            rules: {
                clinic_name: {
                    required: true,
                },
                doctor_name: {
                    required: true,
                },
                email_clinic: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo base_url('check_email_clinic_already')?>",
                        type: "post"
                    }
                },
                phone_clinic: {
                    required: true,
                },
                password_clinic: {
                    required: true,
                    minlength: 6
                },
                cpassword_clinic: {
                    required: true,
                    equalTo: "#password_clinic"
                }
            },
            // set validation messages for the rules are set previously
            messages: {
                clinic_name: {
                    required: "กรุณากรอกชื่อคลีนิก"
                },
                doctor_name: {
                    required: "กรุณากรอกชื่อแพทย์"
                },
                phone_clinic: {
                    required: "กรุณากรอกเบอร์โทรศัพท์"
                },
                email_clinic: {
                    required: "กรุณากรอกอีเมล",
                    email: "รูปแบบอีเมลไม่ถูกต้อง",
                    remote: "อีเมลนี้มีการใช้งานแล้ว"
                },
                password_clinic: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "ความยาวของรหัสผ่านอย่างน้อย 6 ตัวอักษร"
                },
                cpassword_clinic: {
                    required: "กรุณากรอกยืนยันรหัสผ่าน",
                    equalTo: "รหัสไม่ตรงกัน"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

