<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php base_url('') ?>">หน้าแรก</a></li>
                <li>บัญชีผู้ใช้</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">

            <aside class="col-xl-3 col-lg-4" id="sidebar">
                <div class="box_profile">


                    <h6 class="mt-3"><?php echo $clinic->CLINICNAME; ?></h6>

                    <ul class="statistic">
                        <li>0 คิว</li>
                    </ul>
                    <ul class="contacts">
                        <li><h6>อีเมล</h6><?php echo $clinic->USERNAME; ?></li>
                        <li><h6>หมายเลขโทรศัพท์</h6><a href="tel://<?php echo $clinic->PHONE; ?>"><?php echo $clinic->PHONE; ?></a></li>
                    </ul>

                </div>
            </aside>
            <!-- /asdide -->

            <div class="col-xl-9 col-lg-8">
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success  alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                <?php endif; ?>

                <div class="tabs_styled_2">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php if (empty($this->session->flashdata('tab')) || $this->session->flashdata('tab') == 'profile'): ?> active <?php endif; ?>" id="book-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="book">บัญชีของฉัน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->session->flashdata('tab') == 'password'): ?> active <?php endif; ?>" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-expanded="true">เปลี่ยนรหัสผ่าน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->session->flashdata('tab') == 'history'): ?> active <?php endif; ?>" id="general-tab" data-toggle="tab" href="#history" role="tab" aria-controls="general" aria-expanded="true">คิวตรวจ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->session->flashdata('tab') == 'checkin'): ?> active <?php endif; ?>" id="reviews-tab" data-toggle="tab" href="#checkin" role="tab" aria-controls="reviews">เพิ่มคิว Walk in </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->session->flashdata('tab') == 'checkin'): ?> active <?php endif; ?>" id="reviews-tab" data-toggle="tab" href="#checkin" role="tab" aria-controls="reviews">ลงเวลาเปิดปิด</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->session->flashdata('tab') == 'checkin'): ?> active <?php endif; ?>" id="reviews-tab" data-toggle="tab" href="#checkin" role="tab" aria-controls="reviews">YouTube</a>
                        </li>

                    </ul>
                    <!--/nav-tabs -->

                    <div class="tab-content">

                        <div class="tab-pane fade  <?php if (empty($this->session->flashdata('tab')) || $this->session->flashdata('tab') == 'profile'): ?> show active <?php endif; ?>" id="profile" role="tabpanel" aria-labelledby="book-tab">

                        </div>

                        <!-- /tab_1 -->
                        <div class="tab-pane fade <?php if ($this->session->flashdata('tab') == 'password'): ?> show active <?php endif; ?>" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                            <h4>เปลี่ยนรหัสผ่าน</h4>
                            <p>กรุณาอย่าเปิดเผยรหัสผ่านแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
                            <hr>
                            <form id="password-form" action="<?php echo base_url('password/update') ?>" method="post">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-2">
                                        รหัสผ่านปัจจุบัน
                                    </div>
                                    <div class="col-md-4 ">
                                        <input type="password" class="form-control mb-2" name="old_password">
                                        <div>
                                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="linkedin">ลืมรหัสผ่าน?</a>
                                            <div class="collapse" id="collapseExample">
                                                <div class="card card-body">
                                                    กรุณาออกจากระบบและกดปุ่ม <br> "ลืมรหัสผ่าน" ที่หน้าเข้าสู่ระบบ
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-2">
                                        รหัสผ่านใหม่
                                    </div>
                                    <div class="col-md-4 ">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-2">
                                        ยืนยันรหัสผ่าน
                                    </div>
                                    <div class="col-md-4 ">
                                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4 ">
                                        <p class="text-center add_top_30"><input type="submit" class="btn_1" value="บันทึกการแก้ไข"></p>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane fade <?php if ($this->session->flashdata('tab') == 'history'): ?> show active <?php endif; ?>" id="history" role="tabpanel" aria-labelledby="general-tab">
                            <div class="search_bar_list mb-4">
                                <input type="text" class="form-control" placeholder="ค้นหาจากชื่อแพทย์ หมายเลขจองคิว หรือชื่อคลีนิก">
                                <input type="submit" value="ค้นหา">
                            </div>
                            <div id='result'></div>
                        </div>


                        <div class="tab-pane fade <?php if ($this->session->flashdata('tab') == 'checkin'): ?> show active <?php endif; ?>" id="checkin" role="tabpanel" aria-labelledby="reviews-tab">
                            <p>หมายเหตุ การเช็คอินจะสามารถทำการเช็คได้ก่อนถึงวันนัดหมอ 2 วัน</p>
                            <div id='checkin'></div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
<script>
    $(document).ready(function () {
        //validate profile tab
        $('#profile-form').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo base_url('check_email_already_profile')?>",
                        type: "post"
                    }
                },
                phone: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: "กรุณากรอกชื่อ - สกุล"
                },
                phone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์"
                },
                email: {
                    required: "กรุณากรอกอีเมล",
                    email: "รูปแบบอีเมลไม่ถูกต้อง",
                    remote: "อีเมลนี้มีการใช้งานแล้ว"
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        //validate change password
        $('#password-form').validate({
            rules: {
                old_password: {
                    required: true,
                    minlength: 6,
                    remote: {
                        url: "<?php echo base_url('check_old_password')?>",
                        type: "post"
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                cpassword: {
                    required: true,
                    equalTo: "#password"
                },

            },
            messages: {
                old_password: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "ความยาวของรหัสผ่านอย่างน้อย 6 ตัวอักษร",
                    remote: "รหัสผ่านไม่ถูกต้อง"
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

        // loadPagination(0);
        // loadCheckin(0);

    });

    function loadPagination(pagno) {
        $.ajax({
            url: '<?php echo base_url('loadBooking')?>/' + pagno,
            type: 'get',
            // dataType: 'json',
            success: function (response) {
                // console.log(response.result);
                //$('#pagination').html(response.pagination);
                $('#result').html(response);
                // createTable(response.result,response.row);
            }
        });
    }

    function loadCheckin(pagno) {
        $.ajax({
            url: '<?php echo base_url('loadCheckin')?>/' + pagno,
            type: 'get',
            success: function (response) {
                $('#checkin').html(response);
            }
        });
    }
</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>