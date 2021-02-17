<main>
    <div id="hero_register">
        <div class="container margin_120_95">
            <div class="row">
                <div class="col-lg-6">
                    <h1>It's time to find you!</h1>
                    <p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
                    <div class="box_feat_2">
                        <i class="pe-7s-map-2"></i>
                        <h3>Let patients to Find you!</h3>
                        <p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
                    </div>
                    <div class="box_feat_2">
                        <i class="pe-7s-date"></i>
                        <h3>Easly manage Bookings</h3>
                        <p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
                    </div>
                    <div class="box_feat_2">
                        <i class="pe-7s-phone"></i>
                        <h3>Instantly via Mobile</h3>
                        <p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
                    </div>
                </div>
                <!-- /col -->
                <div class="col-lg-5 ml-auto">
                    <div class="box_form">
                        <form id="register-clinic-form" action="<?php echo base_url('add_clinic'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>ชื่อคลินิก</label>
                                        <input type="text" class="form-control" placeholder="" name="clinic_name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>แพทย์</label>
                                        <input type="text" class="form-control" placeholder="" name="doctor_name">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-lg-12">
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
                                </div>
                            </div>

                            <p class="text-center add_top_30"><input type="submit" class="btn_1" value="สมัครสมาชิก"></p>
                            <div class="text-center">
                                <small>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</small>
                            </div>
                        </form>
                    </div>
                    <!-- /box_form -->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /hero_register -->
</main>

<script>
    $(document).ready(function () {
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

