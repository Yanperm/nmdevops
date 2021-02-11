<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li>สมัครสมาชิก</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_120">
        <div class="row justify-content-center">

            <div class="col-lg-5">
                <h2 class="text-center mb-4">ยืนยันบัญชีเพื่อเข้าใช้งานระบบ!</h2>
                <form action="<?php echo base_url('verify/check'); ?>" method="post">
                    <input type="hidden" value="<?php echo $type;?>" name="type">
                    <div id="confirm">
                        <div class="box_form">
                            <div class="form-group">
                                <label>อีเมล</label>
                                <input type="email" value="<?php echo $email;?>" readonly class="form-control" placeholder="" name="email">
                            </div>
                            <div class="form-group">
                                <label>รหัสยืนยัน 6 หลัก</label>
                                <input type="number" class="form-control" placeholder="" name="code">
                            </div>
                            <div class="form-group text-center add_top_30">
                                <input class="btn_1" type="submit" value="ยืนยัน">
                            </div>
                            <p class="text-center link_bright">หากไม่ได้รับอีเมล? <a href="<?php echo base_url('login') ?>"><strong>ส่งรหัสอีกครั้ง</strong></a></p>
                        </div>


                    </div>
                </form>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>