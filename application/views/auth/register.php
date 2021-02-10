<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="register">
                <h1>สร้างบัญชีนัดหมอ</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form id="register-form" action="<?php echo base_url('add_member'); ?>" method="post">
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
                            <p class="text-center link_bright">เป็นสมาชิกอยู่แล้วหรือไม่? <a href="<?php echo base_url('login') ?>"><strong>เข้าสู่ระบบ</strong></a></p>
                            <!--                            <p class="text-center"><small>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</small></p>-->
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /register -->
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
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

