<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css"/>
<style>

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #f5f8fa;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .swiper-button-prev:after, .swiper-button-next:after {
        font-family: swiper-icons;
        font-size: 26px;
        text-transform: none !important;
        letter-spacing: 0;
        text-transform: none;
        font-variant: initial;
        line-height: 1;
    }
    .swiper-button-prev, .swiper-container-rtl .swiper-button-next {
        left: -5px;
        right: auto;
        width: 32px;
        height: 32px;
        color: #3f417a;
        background: rgb(255, 255, 255);
        box-shadow: rgb(0 0 0 / 25%) 0px 2px 4px;
        border-radius: 4px;
        cursor: pointer;
    }
    .swiper-button-prev, .swiper-button-next {

        top: 40% !important;
    }
    .swiper-button-next, .swiper-container-rtl .swiper-button-prev {
        right: -5px;
        left: auto;
        width: 32px;
        height: 32px;
        color: #3f417a;
        background: rgb(255, 255, 255);
        box-shadow: rgb(0 0 0 / 25%) 0px 2px 4px;
        border-radius: 4px;
        cursor: pointer;
    }

    #cookie {
        position: fixed;
        display: block;
        left: 0;
        right: 0;
        bottom: 0;
        margin: 0;
        padding: 0;
        z-index: 99990;
    }
    #cookie input {
        display: none;
    }
    #cookie input:not(:checked) ~ span::before {
        content: "";
        display: inline;
    }
    #cookie input:checked ~ * {
        display: none;
        pointer-events: none;
    }
    #cookie {
        color: white;
        background-color: black;
        text-align: center;
    }
    #cookie > * {
        margin: 0.5em;
    }
</style>
<div id="cookie">
    <input type="checkbox" id="accept" />

    <span>โดยการใช้เว็บไซต์ของเราคุณรับทราบว่าคุณได้อ่านและทำความเข้าใจ
        <a href="https://pdpa.pro/policies/view/th/GEukMy5v2TfiAX2B2h6mEH21">นโยบายความเป็นส่วนตัว</a> นโยบายคุกกี้นโยบายความเป็นส่วนตัวและข้อกำหนดในการให้บริการ ของเรา</span>
    <div class="btn btn-success"><label for="accept">ยอมรับ</label></div>
</div>
<main>
    <div class="hero_home version_1">
        <div class="content">
            <h3>นัดหมอ</h3>
            <p>
                นัดหมายแพทย์ เช็คอิน ดูคิวออนไลน์ ไม่ต้องรอนาน
            </p>
            <form method="get" action="<?php echo base_url('search/1') ?>">
                <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" name="text_search" class=" search-query" placeholder="ค้นหาจากชื่อแพทย์">
                        <input type="submit" class="btn_search" value="ค้นหาเลย">
                    </div>
                    <ul>
                        <li>
                            <input type="radio" id="all" name="type_search" value="all" checked>
                            <label for="all">ทั้งหมด</label>
                        </li>
                        <li>
                            <input type="radio" id="doctor" name="type_search" value="doctor">
                            <label for="doctor">แพทย์</label>
                        </li>
                        <li>
                            <input type="radio" id="clinic" name="type_search" value="clinic">
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
            <p>เมื่อเราเจ็บป่วย ทุกคนต้องการที่จะพบหมอโดยเร็ว ตรวจร่างกาย แล้วได้พบหมอ เพื่อจะได้รักษาอาการที่เป็น</p>
        </div>

        <?php if(count($advertise) > 0):?>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php  foreach ($advertise as $item):?>
                <div class="swiper-slide">
                    <div class="box_card">
                        <img class="advertise_image" src="<?php echo $item->ADVERTISEIMAGE;?>">
                        <h3><?php echo $item->ADVERTISESUBJECT;?></h3>
                        <p><?php echo $item->ADVERTISEDETAIL;?></p>
                        <a href="<?php echo $item->ADVERTISELINK;?>" target="_blank" class="advertise_link">อ่านต่อ</a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <?php endif;?>


        <!--        <div class="row add_bottom_30">-->
        <!--            <div class="col-lg-4">-->
        <!--                <div class="box_feat" id="icon_1">-->
        <!--                    <span></span>-->
        <!--                    <h3>ค้นหาแพทย์</h3>-->
        <!--                    <p>ค้นหาแพทย์ หรือ คลินิกโดยใช้ ชื่อจริง ของแพทย์ หรือคำค้นอาการที่แสดง แล้วกด ค้นหา เลือกนัดหมายแพทย์</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-4">-->
        <!--                <div class="box_feat" id="icon_2">-->
        <!--                    <span></span>-->
        <!--                    <h3>ดูโปรไฟล์</h3>-->
        <!--                    <p>ศึกษารายละเอียดข้อมูลแพทย์ ความเชี่ยวชาญ ที่ตั้ง เวลาเปิดปิด ว่าตรงกับอาการและความต้องการ ของเราหรือไม่ </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-4">-->
        <!--                <div class="box_feat" id="icon_3">-->
        <!--                    <h3>นัดหมอ</h3>-->
        <!--                    <p>ทำการนัดหมายแพทย์ ผ่านระบบออนไลน์ ทางเว็บ และทาง mobile application เช็คอิน ดูคิวออนไลน์ </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!-- /row -->
<!--        <p class="text-center"><a href="--><?php //echo base_url('link/list') ?><!--" class="btn_1 medium">นัดหมอ</a></p>-->

    </div>
    <!-- /container -->
    <?php if (count($clinic) > 0): ?>
        <div class="bg_color_1">
            <div class="container margin_120_95">
                <div class="main_title">
                    <h2>คลินิกโปรด</h2>
                    <p>รายการคลินิกโปรด ที่มีผู้สนใจใช้บริการในขณะนี้</p>
                </div>
                <div id="reccomended" class="owl-carousel owl-theme">

                    <?php foreach ($clinic as $row): ?>
                        <div class="item">
                            <form method="post" action="<?php echo base_url('clinic/' . $row->IDCLINIC) ?>">
                                <div class="views"><i class="icon-eye-7"></i>3000</div>
                                <div class="title">
                                    <button class="btn btn-block btn-info" type="submit"><?php echo $row->CLINICNAME; ?><br/><em><?php echo $row->DETAIL; ?></em></button>
                                </div>
                                <img src="<?php echo $row->image; ?>" alt="">
                            </form>
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- /carousel -->
            </div>
            <!-- /container -->
        </div>
    <?php endif; ?>
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
                    <h3>ดาวน์โหลด <strong>นัดหมอ แอป</strong> ได้เลย</h3>
                    <p class="lead">นัดหมอ ทำให้คนไข้พบหมอได้เลย ไม่ต้องรอนาน คนไข้สามารถดาวน์โหลด แอปนัดหมอ เพื่อใช้ในการนัดหมายแพทย์ เช็คอิน ดูคิว ออนไลน์ ได้ทุกที่ทุกเวลา มาถึงคลินิกก่อนเวลานัดหมาย ประมาณ 5-10 นาที ก็สามารถพบแพทย์ได้เลย ไม่ต้องมารอที่คลินิกเป็นเวลานาน โหลดได้ทั้ง App store และ play store แบบไม่มีค่าใช้่จ่าย</p>
                    <div class="app_buttons wow" data-wow-offset="100">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
                        <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1"/>
                            <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58"/>
                            <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9"/>
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
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup: 4,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        loop: true,
        loopFillGroupWithBlank: false,
        pagination: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            375: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        }
    });
</script>
