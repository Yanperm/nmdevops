<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login-2">
                <h1>เช็คอินยืนยันการเข้าตรวจ</h1>
                <form method="post" action="<?php echo base_url('detail_checkin') ?>">
                    <div class="box_form clearfix">
                        <div class="box_login">

                            <?php if($clinicId != ''):?>
                                <p class="p_checkin">คลินิก</p>
                            <div class="form-group">
                                <select class="form-control" required name="clinic">
                                    <option value=""></option>
                                    <?php foreach ($clinic as $item): ?>
                                    <option <?php if ($clinicId != '' && $clinicId == $item->CLINICID): ?>selected<?php endif; ?> value="<?php echo $item->CLINICID; ?>"><?php echo $item->CLINICNAME; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php endif;?>
                            <?php if($clinicId == ''):?>
                                <p class="p_checkin">หมายเลขการจอง * vnxxxxxxx</p>
                                <div class="form-group">
                                    <input type="text" name="vn" value="<?php echo $vn;?>" class="form-control" placeholder="">
                                </div>
                            <?php endif;?>
                            <p class="p_checkin">อีเมล</p>
                            <div class="form-group">
                                <input type="email" name="email" value="<?php echo $email;?>" class="form-control" placeholder="อีเมลของท่าน">
                            </div>

                            <div class="form-group">
                                <input class="btn_1" type="submit" value="ตรวจสอบข้อมูลคิวจอง">
                            </div>
                        </div>
                        <div class="box_login last">
                            <p class="text_checkin">บริการฟรีสำหรับคนไข้</p>
                            <a class="link_checkin"><i class="icon-info-2"></i>ข้อมูลเพิ่มเติม </a>
                        </div>

                    </div>
                </form>
                <p class="text-center link_bright">เป็นสมาชิกอยู่แล้วหรือไม่? <a href="<?php echo base_url('login')?>"><strong>เข้าสู่ระบบ</strong></a></p>
            </div>
            <!-- /login -->
        </div>
    </div>
</main>


