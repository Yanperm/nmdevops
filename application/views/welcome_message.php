
<main>
    <div class="hero_home version_1">
        <div class="content">
            <h3>นัดหมอ</h3>
            <p>
                นัดหมายแพทย์ เช็คอิน ดูคิวออนไลน์ ไม่ต้องรอนาน
            </p>
            <form method="post" action="<?php echo base_url('link/list') ?>">
                <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" name="CLINICNAME" class=" search-query" placeholder="ค้นหาจากชื่อแพทย์">
                        <input type="submit" class="btn_search" value="ค้นหาเลย">
                    </div>
                    <ul>
                        <li>
                            <input type="radio" id="all" name="radio_search" value="all" checked>
                            <label for="all">ทั้งหมด</label>
                        </li>
                        <li>
                            <input type="radio" id="doctor" name="radio_search" value="doctor">
                            <label for="doctor">แพทย์</label>
                        </li>
                        <li>
                            <input type="radio" id="clinic" name="radio_search" value="clinic">
                            <label for="clinic">คลินิก</label>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <!-- /Hero -->

    <div class="container margin_120_95">
        <div class="main_title">
            <h2>ประสบการณ์ใหม่ <strong>นัดหมอ</strong> ออนไลน์</h2>
            <p>เมื่อเราเจ็บป่วย ทุกคนต้องการที่จะพบหมอโดยเร็ว ตรวจร่างกาย แล้วได้พบหมอ เพื่อจะได้รักษาอาการที่เป็น โดยไม่ต้องไปรอที่คลินิกนานๆ มีขั้นตอนง่ายๆ ดังนี้</p>
        </div>
        <div class="row add_bottom_30">
            <div class="col-lg-4">
                <div class="box_feat" id="icon_1">
                    <span></span>
                    <h3>ค้นหาแพทย์</h3>
                    <p>ค้นหาแพทย์ หรือ คลินิกโดยใช้ ชื่อจริง ของแพทย์ หรือคำค้นอาการที่แสดง แล้วกด ค้นหา เลือกนัดหมายแพทย์</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_2">
                    <span></span>
                    <h3>ดูโปรไฟล์</h3>
                    <p>ศึกษารายละเอียดข้อมูลแพทย์ ความเชี่ยวชาญ ที่ตั้ง เวลาเปิดปิด ว่าตรงกับอาการและความต้องการ ของเราหรือไม่ </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_3">
                    <h3>นัดหมอ</h3>
                    <p>ทำการนัดหมายแพทย์ ผ่านระบบออนไลน์ ทางเว็บ และทาง mobile application เช็คอิน ดูคิวออนไลน์ </p>
                </div>
            </div>
        </div>
        <!-- /row -->
        <p class="text-center"><a href="<?php echo base_url('link/list') ?>" class="btn_1 medium">นัดหมอ</a></p>

    </div>
    <!-- /container -->

    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title">
                <h2>คลินิกโปรด</h2>
                <p>รายการคลินิกโปรด ที่มีผู้สนใจใช้บริการในขณะนี้</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">

                <?php
                $query = $this->db->get_where('tbclinic', array('MOBILE' => 1));
                foreach ($query->result() as $row) {
                    $clinicid = $row->CLINICID;
                    ?>
                    <div class="item">
                        <form method="post" action="<?php echo base_url('link/detail') ?>">
                            <input type="hidden" name="CLINICID" value="<?php echo $clinicid; ?>"/>
                            <div class="views"><i class="icon-eye-7"></i>3000</div>
                            <div class="title">                                
                                <button class="btn btn-block btn-info" type="submit"><?php echo $row->CLINICNAME; ?><br/><em><?php echo $row->DETAIL; ?></em></button>
                            </div><img src="<?php echo $row->image; ?>" alt="">
                        </form>
                    </div>
                    <?php
                }
                ?>

            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /white_bg -->
    <!-- /container
    <div class="container margin_120_95 hidden">
        <div class="main_title">
            <h2>Find your doctor or clinic</h2>
            <p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet cetero at.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="list_home">
                    <div class="list_title">
                        <i class="icon_pin_alt"></i>
                        <h3>ค้นหาตามเขต พื้นที่</h3>
                    </div>
                    <ul>
                        <li><a href="#0"><strong>1</strong>นนทบุรี</a></li>
                        <li><a href="#0"><strong>2</strong>ประจวบคีรีขันธ์</a></li>
                        <li><a href="#0"><strong>3</strong>หนองคาย</a></li>
                        <li><a href="#0"><strong>4</strong>ราชบุรี</a></li>
                        <li><a href="#0"><strong>5</strong>ชัยนาท</a></li>
                        <li><a href="#0"><strong>23</strong>Birmingham</a></li>
                        <li><a href="#0"><strong>23</strong>Boston</a></li>
                        <li><a href="#0"><strong>23</strong>Buffalo</a></li>
                        <li><a href="#0"><strong>23</strong>Charleston</a></li>
                        <li><a href="#0">More...</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="list_home">
                    <div class="list_title">
                        <i class="icon_archive_alt"></i>
                        <h3>ค้นหาคลินิกเฉพาะทาง</h3>
                    </div>
                    <ul>
                        <li><a href="#0"><strong>1</strong>สูติ-นรีเวช</a></li>
                        <li><a href="#0"><strong>2</strong>อายุรกรรม</a></li>
                        <li><a href="#0"><strong>23</strong>Chiropractor</a></li>
                        <li><a href="#0"><strong>23</strong>Dentist</a></li>
                        <li><a href="#0"><strong>23</strong>Dermatologist</a></li>
                        <li><a href="#0"><strong>23</strong>Gastroenterologist</a></li>
                        <li><a href="#0"><strong>23</strong>Ophthalmologist</a></li>
                        <li><a href="#0"><strong>23</strong>Optometrist</a></li>
                        <li><a href="#0"><strong>23</strong>Pediatrician</a></li>
                        <li><a href="#0">More....</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div> -->


    <div id="app_section">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-5">
                    <p><img src="<?php echo base_url() ?>assets/img/app_img.svg" alt="" class="img-fluid" width="500" height="433"></p>
                </div>
                <div class="col-md-6">
                    <small>Application</small>
                    <h3>Download <strong>Nutmor App</strong> Now!</h3>
                    <p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
                    <div class="app_buttons wow" data-wow-offset="100">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
                        <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
                        </svg>
                        <a href="https://apps.apple.com/app/id1510928546" class="fadeIn"><img src="<?php echo base_url() ?>assets/img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
                        <a href="https://play.google.com/store/apps/details?id=com.nutmor.app" class="fadeIn"><img src="<?php echo base_url() ?>assets/img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /app_section -->
</main>
<!-- /main content -->
