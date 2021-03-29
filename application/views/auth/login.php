<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login-2">
                <h1>ลงชื่อเข้าใช้งาน สำหรับสมาชิก!</h1>
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('message') ?>
                    </div>
                <?php } ?>
                <?php echo form_open(base_url('login'), array('id' => 'loginForm')) ?>
                <input type="hidden" value="member" name="type">
                <div class="box_form clearfix">
                    <div class="box_login text-center">
                        <img class="img_login" src="<?php echo base_url();?>/assets/img/nutmor_logo_v01.png" style="width:114px;height:109px;margin-top:0px">
                        <h2 style="color: #818181;">Nutmor</h2>
                    </div>
                    <div class="box_login last">

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="อีเมล" name="email" id="email">
                            <?php echo form_error('email', '<div class="error">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" id="password">
                            <?php echo form_error('password', '<div class="error">', '</div>') ?>
                            <a href="#0" class="forgot">
                                <small>ลืมรหัสผ่าน?</small>
                            </a>
                        </div>
                        <div class="form-group">
                            <input class="btn_1" type="submit" value="เข้าสู่ระบบ">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <p class="text-center link_bright">ท่านต้องการสร้างบัญชีใหม่ ใช่หรือไม่ ? <a href="<?php echo base_url('register') ?>"><strong>สร้างบัญชีนัดหมอ</strong></a></p>
                <!--                <p class="text-center link_bright">Do not have an account yet? <a href="#0"><strong>Register now!</strong></a></p>-->
            </div>
            <!-- /login -->
        </div>
    </div>
</main>
