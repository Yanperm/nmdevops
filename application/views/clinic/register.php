<main>
    <div id="hero_register">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-lg-4">
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
                <div class="col-lg-8 ml-auto ">
                    <div class="row justify-content-center">

                        <div class="col-lg-12">
                            <ul id="progressbar">
                                <li class="active">ข้อมูลคลินิก</li>
                                <li>การติดต่อ</li>
                                <li>บัญชีผู้ใช้</li>
                                <li>แพ็กเกจ</li>
                            </ul>
                        </div>
                    </div>
                    <form class="steps" accept-charset="UTF-8" novalidate="" id="register-clinic-form" action="<?php echo base_url('add_clinic'); ?>" method="post" enctype="multipart/form-data">
                        <!-- USER INFORMATION FIELD SET -->
                        <fieldset>
                            <h2 class="fs-title">ข้อมูลคลินิก</h2>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>ชื่อคลินิก</label>
                                        <input type="text" class="form-control" placeholder="" name="clinic_name" required="required" data-rule-required="true" data-msg-required="กรุณากรุณากรอกชื่อคลินิก">
                                        <span class="error1" style="display: none;">
                                            <i class="error-log fa fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>แพทย์</label>
                                        <input type="text" class="form-control" placeholder="" name="doctor_name" required="required" data-rule-required="true" data-msg-required="กรุณากรุณากรอกชื่อแพทย์">
                                        <span class="error1" style="display: none;">
                                            <i class="error-log fa fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="button" data-page="1" name="next" class="next action-button" value="ถัดไป"/>

                        </fieldset>

                        <fieldset>
                            <h2 class="fs-title">ข้อมูลการติดต่อ</h2>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>เมลล์</label>
                                    <input type="email" class="form-control" placeholder="" name="email_clinic" data-rule-required="true" data-msg-required="กรุณากรุณากรอกเมลล์" data-rule-email="true" data-msg-email="กรุณากรุณากรอกเมลให้ถูกต้อง" data-rule-remote="<?php echo base_url('check_email_clinic_already'); ?>" data-msg-remote="บัญชีอีเมลนี้มีการใช้งานแล้ว">
                                    <span class="error1" style="display: none;">
                                            <i class="error-log fa fa-exclamation-triangle"></i>
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label>Line Id</label>
                                    <input type="text" class="form-control" placeholder="" name="line_id_clinic">
                                    <span class="error1" style="display: none;">
                                            <i class="error-log fa fa-exclamation-triangle"></i>
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" placeholder="" name="phone_clinic" data-rule-required="true" data-msg-required="กรุณากรุณากรอกเบอร์โทรศัพท์">
                                    <span class="error1" style="display: none;">
                                            <i class="error-log fa fa-exclamation-triangle"></i>
                                        </span>
                                </div>
                                <hr>
                            </div>


                            <input type="button" data-page="2" name="previous" class="previous action-button" value="ก่อนหน้า"/>
                            <input type="button" data-page="2" name="next" class="next action-button" value="ถัดไป"/>

                        </fieldset>
                        <fieldset>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="cpassword1" name="password_clinic" placeholder="" data-rule-required="true" data-msg-required="กรุณากรุณากรอกรหัสผ่าน">
                                    <span class="error1" style="display: none;">
                                        <i class="error-log fa fa-exclamation-triangle"></i>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label>ยืนยันรหัสผ่าน</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword_clinic" placeholder="" data-rule-required="true" data-rule-equalto="#cpassword1" data-msg-required="กรุณากรุณากรอกยืนยันรหัสผ่าน" data-msg-equalto="กรุณากรุณากรอกรหัสผ่านให้ตรงกัน">
                                    <span class="error1" style="display: none;">
                                        <i class="error-log fa fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label> รูปภาพ</label>
                                    <input type="file" name="files_clinic" class="form-control">
                                </div>
                            </div>
                            <input type="button" data-page="3" name="previous" class="previous action-button" value="ก่อนหน้า"/>
                            <input type="button" data-page="3" name="next" class="next action-button" value="ถัดไป"/>

                        </fieldset>
                        <!-- Cultivation FIELD SET -->
                        <fieldset>
                            <h2 class="fs-title">แพ็กเกจ</h2>

                            <div class="pricing pricing-palden">
                                <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                                    <div class="pricing-deco">
                                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
          </svg>
                                        <div class="pricing-price"><span class="pricing-currency">฿</span>99
                                            <span class="pricing-period">/ mo</span>
                                        </div>
                                        <h3 class="pricing-title">Community</h3>
                                    </div>
                                    <ul class="pricing-feature-list">
                                        <li class="pricing-feature">1 GB of space</li>
                                        <li class="pricing-feature">1 User</li>
                                        <li class="pricing-feature">10 Appointments a day</li>
                                        <li class="pricing-feature">Free App for All Clinic Patients</li>
                                    </ul>
                                    <button id="type1" type="button" onclick="selectPackage(1)" class="pricing-action">1,000 ฿ Yearly</button>
                                </div>
                                <div class="pricing-item features-item ja-animate pricing__item--featured" data-animation="move-from-bottom" data-delay="item-1" style="min-height: 497px;">
                                    <div class="pricing-deco" style="background: linear-gradient(135deg,#a93bfe,#584efd)">
                                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
          </svg>
                                        <div class="pricing-price"><span class="pricing-currency">฿</span>499
                                            <span class="pricing-period">/ mo</span>
                                        </div>
                                        <h3 class="pricing-title">Pro</h3>
                                    </div>
                                    <ul class="pricing-feature-list">
                                        <li class="pricing-feature">10 GB Share Hos</li>
                                        <li class="pricing-feature">4 Users</li>
                                        <li class="pricing-feature">Unlimited Appointment</li>
                                        <li class="pricing-feature">Nutmor App</li>
                                    </ul>
                                    <button id="type2" type="button" onclick="selectPackage(2)" class="pricing-action">5,900 ฿ Yearly</button>
                                </div>
                                <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-2" style="min-height: 497px;">
                                    <div class="pricing-deco">
                                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
          </svg>
                                        <div class="pricing-price"><span class="pricing-currency">฿</span>4,990
                                            <span class="pricing-period">/ mo</span>
                                        </div>
                                        <h3 class="pricing-title">Ultimate</h3>
                                    </div>
                                    <ul class="pricing-feature-list">
                                        <li class="pricing-feature">100 GB++ Nm VPS</li>
                                        <li class="pricing-feature">Multi Users</li>
                                        <li class="pricing-feature">No Litmit Appointment</li>
                                        <li class="pricing-feature">Nutmor iOS/Android App</li>
                                        <li class="pricing-feature">Electronic Patient Records</li>
                                        <li class="pricing-feature">Nm Inventory</li>
                                    </ul>
                                    <button id="type3" type="button" onclick="selectPackage(3)" class="pricing-action">59,000 ฿ Yearly</button>
                                </div>
                            </div>
                            <input type="hidden" id="package" name="package" value="<?php echo $type;?>" data-rule-required="true"  data-msg-required="กรุณากรุณาเลือกแพ็กเกจ" >
                            <input type="button" data-page="3" name="previous" class="previous action-button" value="ก่อนหน้า"/>
                            <input type="button" data-page="3" name="next" class="submit action-button" value="สมัครสมาชิก"/>

                        </fieldset>
                    </form>


                    <div class="box_form" style="display: none">
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
<link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css"/>
<link rel="stylesheet" media="all" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"/>

<style>
    /*form styles*/
    .steps {
        width: 100%;
        margin: 7px auto;
        position: relative;
    }

    .steps fieldset {
        background: white;
        border: 0 none;
        border-radius: 3px;
        box-shadow: 0 17px 41px -21px rgb(0, 0, 0);
        padding: 20px 30px;
        border-top: 9px solid #e74e84;
        box-sizing: border-box;
        width: 100%;
        /*margin: 0 10%;*/

        /*stacking fieldsets above each other*/
        position: initial;
    }

    /*Hide all except first fieldset*/
    .steps fieldset:not(:first-of-type) {
        display: none;
    }

    /*inputs*/
    .steps label {
        color: #333333;
        text-align: left !important;
        font-size: 15px;
        font-weight: 200;
        padding-bottom: 7px;
        padding-top: 12px;
        display: inline-block;
    }


    .steps input, .steps textarea {
        outline: none;
        display: block;
        width: 100%;
        margin: 0 0 20px;
        padding: 10px 15px;
        border: 1px solid #d9d9d9;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 33px;
        color: #837E7E;
        /*font-family: "pro";*/
        -webkti-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        font-size: 14px;
        font-wieght: 400;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-transition: all 0.3s linear 0s;
        -moz-transition: all 0.3s linear 0s;
        -ms-transition: all 0.3s linear 0s;
        -o-transition: all 0.3s linear 0s;
        transition: all 0.3s linear 0s;
    }

    .steps input:focus, .steps textarea:focus {
        color: #333333;
        border: 1px solid #e74e84;
    }

    .error1 {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -moz-box-shadow: 0 0 0 transparent;
        -webkit-box-shadow: 0 0 0 transparent;
        box-shadow: 0 0 0 transparent;
        position: absolute;
        left: 525px;
        margin-top: -58px;
        padding: 0 10px;
        height: 39px;
        display: block;
        color: #ffffff;
        background: #e62163;
        border: 0;
        font-weight: bold;
        /*font: 14px Corbel, "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Verdana, "Verdana Ref", sans-serif;*/
        line-height: 39px;
        white-space: nowrap;

    }

    .error1:before {
        width: 0;
        height: 0;
        left: -8px;
        top: 14px;
        content: '';
        position: absolute;
        border-top: 6px solid transparent;
        border-right: 8px solid #e62163;
        border-bottom: 6px solid transparent;
    }

    .error-log {
        margin: 5px 5px 5px 0;
        font-size: 19px;
        position: relative;
        bottom: -2px;
    }

    .question-log {
        margin: 5px 1px 5px 0;
        font-size: 15px;
        position: relative;
        bottom: -2px;
    }

    /*buttons*/
    .steps .action-button, .action-button {
        width: 100px !important;
        background: #e74e84;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 29px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px auto;
        -webkit-transition: all 0.3s linear 0s;
        -moz-transition: all 0.3s linear 0s;
        -ms-transition: all 0.3s linear 0s;
        -o-transition: all 0.3s linear 0s;
        transition: all 0.3s linear 0s;
        display: block;
    }

    .steps .next, .steps .submit {
        float: right;
    }

    .steps .previous {
        float: left;
    }

    .steps .action-button:hover, .steps .action-button:focus, .action-button:hover, .action-button:focus {
        background: #bf134d;;
    }

    .steps .explanation {
        display: block;
        clear: both;
        width: 540px;
        background: #f2f2f2;
        position: relative;
        margin-left: -30px;
        padding: 22px 0px;
        margin-bottom: -10px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        top: 10px;
        text-align: center;
        color: #333333;
        font-size: 12px;
        font-weight: 200;
        cursor: pointer;
    }


    /*headings*/
    .fs-title {
        text-transform: uppercase;
        margin: 0 0 5px;
        line-height: 1;
        color: #e74e84;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    .fs-subtitle {
        font-weight: normal;
        font-size: 13px;
        color: #837E7E;
        margin-bottom: 20px;
        text-align: center;
    }

    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
        width: 100%;
        text-align: center;
    }

    #progressbar li {
        list-style-type: none;
        color: #ffffff;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: bold;
        width: 25%;
        float: left;
        position: relative;
    }

    #progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 44px;
        height: 44px;
        line-height: 45px;
        display: block;
        font-size: 15px;
        color: #333;
        background: white;
        border-radius: 50%;
        margin: 0 auto 3px auto;
    }

    /*progressbar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: white;
        position: absolute;
        left: -50%;
        top: 21px;
        z-index: -1;
    }

    #progressbar li:first-child:after {
        /*connector not needed before the first step*/
        content: none;
    }

    /*marking active/completed steps green*/
    /*The number of the step and the connector before it = green*/
    #progressbar li.active:before, #progressbar li.active:after {
        background: #e74e84;
        color: white;
    }


    /* my modal */

    .modal p {
        font-size: 15px;
        font-weight: 100;
        font-family: sans-serif;
        color: #3C3B3B;
        line-height: 21px;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 50%;
        max-width: 630px;
        min-width: 320px;
        height: auto;
        z-index: 2000;
        visibility: hidden;
        -moz-backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .modal.modal-show {
        visibility: visible;
    }

    .lt-ie9 .modal {
        top: 0;
        margin-left: -315px;
    }

    .modal-content {
        background: #ffffff;
        position: relative;
        margin: 0 auto;
        padding: 40px;
        border-radius: 3px;
    }

    .modal-overlay {
        background: #000000;
        position: fixed;
        visibility: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
        opacity: 0;
        -moz-transition-property: visibility, opacity;
        -o-transition-property: visibility, opacity;
        -webkit-transition-property: visibility, opacity;
        transition-property: visibility, opacity;
        -moz-transition-delay: 0.5s, 0.1s;
        -o-transition-delay: 0.5s, 0.1s;
        -webkit-transition-delay: 0.5s, 0.1s;
        transition-delay: 0.5s, 0.1s;
        -moz-transition-duration: 0, 0.5s;
        -o-transition-duration: 0, 0.5s;
        -webkit-transition-duration: 0, 0.5s;
        transition-duration: 0, 0.5s;
    }

    .modal-show .modal-overlay {
        visibility: visible;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);
        opacity: 0.6;
        -moz-transition: opacity 0.5s;
        -o-transition: opacity 0.5s;
        -webkit-transition: opacity 0.5s;
        transition: opacity 0.5s;
    }

    /*slide*/
    .modal[data-modal-effect|=slide] .modal-content {
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
        opacity: 0;
        -moz-transition: all 0.5s 0;
        -o-transition: all 0.5s 0;
        -webkit-transition: all 0.5s 0;
        transition: all 0.5s 0;
    }

    .modal[data-modal-effect|=slide].modal-show .modal-content {
        filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
        opacity: 1;
        -moz-transition: all 0.5s 0.1s;
        -o-transition: all 0.5s 0.1s;
        -webkit-transition: all 0.5s;
        -webkit-transition-delay: 0.1s;
        transition: all 0.5s 0.1s;
    }

    .modal[data-modal-effect=slide-top] .modal-content {
        -moz-transform: translateY(-300%);
        -ms-transform: translateY(-300%);
        -webkit-transform: translateY(-300%);
        transform: translateY(-300%);
    }

    .modal[data-modal-effect=slide-top].modal-show .modal-content {
        -moz-transform: translateY(0);
        -ms-transform: translateY(0);
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }


    /* RESPONSIVE */

    /* moves error logs in tablet/smaller screens */

    @media (max-width: 1000px) {

        /*brings inputs down in size */
        .steps input, .steps textarea {
            outline: none;
            display: block;
            width: 100% !important;
        }

        /*brings errors in */
        .error1 {
            left: 345px;
            margin-top: -58px;
            font-weight: 700;
        }


    }


    @media (max-width: 675px) {
        /*mobile phone: uncollapse all fields: remove progress bar*/
        .steps {
            width: 100%;
            margin: 50px auto;
            position: relative;
        }

        #progressbar {
            display: none;
        }

        /*move error logs */
        .error1 {
            position: relative;
            left: 0 !important;
            margin-top: 24px;
            top: -11px;
            font-weight: 700;
        }

        .error1:before {
            width: 0;
            height: 0;
            left: 14px;
            top: -14px;
            content: '';
            font-weight: 700;
            position: absolute;
            border-left: 6px solid transparent;
            border-bottom: 8px solid #e62163;
            border-right: 6px solid transparent;
        }

        /*show hidden fieldsets */
        .steps fieldset:not(:first-of-type) {
            display: block;
        }

        .steps fieldset {
            position: relative;
            width: 100%;
            margin: 0 auto;
            margin-top: 45px;
        }

        .steps .next, .steps .previous {
            display: none;
        }

        .steps .explanation {
            display: none;
        }

        .steps .submit {
            float: right;
            margin: 28px auto 10px;
            width: 100% !important;
        }

    }


    /* Info */
    .info {
        width: 300px;
        margin: 35px auto;
        text-align: center;
        /*font-family: 'roboto', sans-serif;*/
    }

    .info h1 {
        margin: 0;
        padding: 0;
        font-size: 28px;
        font-weight: 400;
        color: #333333;
        padding-bottom: 5px;

    }

    .info span {
        color: #666666;
        font-size: 13px;
        margin-top: 20px;
    }

    .info span a {
        color: #666666;
        text-decoration: none;
    }

    .info span .fa {
        color: rgb(226, 168, 16);
        font-size: 19px;
        position: relative;
        left: -2px;
    }

    .info span .spoilers {
        color: #999999;
        margin-top: 5px;
        font-size: 10px;
    }

    .pricing {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-justify-content: center;
        justify-content: center;
        width: 100%;
        margin: 0 auto 3em;
    }

    .pricing-item {
        position: relative;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        -webkit-align-items: stretch;
        align-items: stretch;
        text-align: center;
        -webkit-flex: 0 1 330px;
        flex: 0 1 226px;
    }

    .pricing-action {
        color: inherit;
        border: none;
        background: none;
        cursor: pointer;
    }

    .pricing-action:focus {
        outline: none;
    }

    .pricing-feature-list {
        text-align: left;
    }

    .pricing-palden .pricing-item {
        font-family: "Open Sans", sans-serif;
        cursor: default;
        color: #84697c;
        background: #fff;
        box-shadow: 0 0 10px rgba(46, 59, 125, 0.23);
        border-radius: 20px 20px 10px 10px;
        margin: 1em;
    }

    @media screen and (min-width: 66.25em) {
        .pricing-palden .pricing-item {
            margin: 1em -0.5em;
        }
        .pricing-palden .pricing__item--featured {
            margin: 0;
            z-index: 10;
            box-shadow: 0 0 20px rgba(46, 59, 125, 0.23);
        }
    }

    .pricing-palden .pricing-deco {
        border-radius: 10px 10px 0 0;
        background: linear-gradient(135deg, #e84e84, #f4cfdc);
        padding: 3em 0 9em;
        position: relative;
    }

    .pricing-palden .pricing-deco-img {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 160px;
    }

    .pricing-palden .pricing-title {
        font-size: 0.75em;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 5px;
        color: #fff;
    }

    .pricing-palden .deco-layer {
        -webkit-transition: -webkit-transform 0.5s;
        transition: transform 0.5s;
    }

    .pricing-palden .pricing-item:hover .deco-layer--1 {
        -webkit-transform: translate3d(15px, 0, 0);
        transform: translate3d(15px, 0, 0);
    }

    .pricing-palden .pricing-item:hover .deco-layer--2 {
        -webkit-transform: translate3d(-15px, 0, 0);
        transform: translate3d(-15px, 0, 0);
    }

    .pricing-palden .icon {
        font-size: 2.5em;
    }

    .pricing-palden .pricing-price {
        font-size: 3em;
        font-weight: bold;
        padding: 0;
        color: #fff;
        margin: 0 0 0.25em 0;
        line-height: 0.75;
    }

    .pricing-palden .pricing-currency {
        font-size: 0.15em;
        vertical-align: top;
    }

    .pricing-palden .pricing-period {
        font-size: 0.15em;
        padding: 0 0 0 0.5em;
        font-style: italic;
    }

    .pricing-palden .pricing__sentence {
        font-weight: bold;
        margin: 0 0 1em 0;
        padding: 0 0 0.5em;
    }

    .pricing-palden .pricing-feature-list {
        margin-top: -15px;
        padding: 0.25em 0 2.5em;
        list-style: none;
        text-align: center;
    }

    .pricing-palden .pricing-feature {
        padding: 1em 0;
    }

    .pricing-palden .pricing-action {
        font-weight: bold;
        margin: auto 1em 2em 3em;
        padding: 1em 2em;
        color: #fff;
        border-radius: 30px;
        background: linear-gradient(135deg, #a93bfe, #584efd);
        -webkit-transition: background-color 0.3s;
        transition: background-color 0.3s;
    }

    .pricing-palden .pricing-action:hover,
    .pricing-palden .pricing-action:focus {
        background: linear-gradient(135deg, #e84e84, #b9204d);
    }

    .pricing-palden .pricing-item--featured .pricing-deco {
        padding: 5em 0 8.885em 0;
    }

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>

    $(document).ready(function () {


        var current_fs, next_fs, previous_fs;
        var left, opacity, scale;
        var animating;
        $(".steps").validate({
            errorClass: "invalid",
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.insertAfter(element.next("span").children());
            },
            highlight: function (element) {
                $(element).next("span").show();
            },
            unhighlight: function (element) {
                $(element).next("span").hide();
            }
        });
        $(".next").click(function () {
            $(".steps").validate({
                errorClass: "invalid",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.insertAfter(element.next("span").children());
                },
                highlight: function (element) {
                    $(element).next("span").show();
                },
                unhighlight: function (element) {
                    $(element).next("span").hide();
                }
            });
            if (!$(".steps").valid()) {
                return true;
            }
            if (animating) return false;
            animating = false;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.hide();
            // current_fs.animate(
            //     {opacity: 0},
            //     {
            //         step: function (now, mx) {
            //             scale = 1 - (1 - now) * 0.2;
            //             left = now * 50 + "%";
            //             opacity = 1 - now;
            //             current_fs.css({transform: "scale(" + scale + ")"});
            //             next_fs.css({left: left, opacity: opacity});
            //         },
            //         duration: 800,
            //         complete: function () {
            //             current_fs.hide();
            //             animating = false;
            //         },
            //         easing: "easeInOutExpo"
            //     }
            // );
        });
        $(".submit").click(function () {
            $(".steps").validate({
                errorClass: "invalid",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.insertAfter(element.next("span").children());
                },
                highlight: function (element) {
                    $(element).next("span").show();
                },
                unhighlight: function (element) {
                    $(element).next("span").hide();
                }
            });
            if (!$(".steps").valid()) {
                return false;
            }
            if (animating) return false;
            animating = true;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            // current_fs.hide();
            $('#register-clinic-form').submit();

            // current_fs.animate(
            //     {opacity: 0},
            //     {
            //         step: function (now, mx) {
            //             scale = 1 - (1 - now) * 0.2;
            //             left = now * 50 + "%";
            //             opacity = 1 - now;
            //             current_fs.css({transform: "scale(" + scale + ")"});
            //             next_fs.css({left: left, opacity: opacity});
            //         },
            //         duration: 800,
            //         complete: function () {
            //             current_fs.hide();
            //             animating = false;
            //         },
            //         easing: "easeInOutExpo"
            //     }
            // );
        });
        $(".previous").click(function () {
            if (animating) return false;
            animating = false;
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            $("#progressbar li")
                .eq($("fieldset").index(current_fs))
                .removeClass("active");
            previous_fs.show();
            current_fs.hide();
            // current_fs.animate(
            //     {opacity: 0},
            //     {
            //         step: function (now, mx) {
            //             scale = 0.8 + (1 - now) * 0.2;
            //             left = (1 - now) * 50 + "%";
            //             opacity = 1 - now;
            //             current_fs.css({left: left});
            //             previous_fs.css({
            //                 transform: "scale(" + scale + ")",
            //                 opacity: opacity
            //             });
            //         },
            //         duration: 800,
            //         complete: function () {
            //             current_fs.hide();
            //             animating = false;
            //         },
            //         easing: "easeInOutExpo"
            //     }
            // );
        });
    });


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

    function selectPackage(id) {
        $('#package').val(id);
    }

    let package = $('#package').val();
    $("#type"+package).css("background", "linear-gradient(135deg, #e84e84, #b9204d)");
</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

