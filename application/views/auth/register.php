<main>
    <div class="info mt-3 pt-3">
        <!--        <h1 style="font-family: 'Prompt'">สร้างบัญชีนัดหมอ</h1>-->
        <p style="font-size: 30px;font-weight: bold">สร้างบัญชีนัดหมอ</p>
        <!--        <span>-->
        <!--    Made with-->
        <!--    <i class="fa fa-beer"></i>-->
        <!--    by-->
        <!--    <a href="http://www.idesignradthings.com">Ty Stelmach</a>-->
        <!--    <div class="spoilers">-->
        <!--      An app created to score your nonprofit's fundraising technique.</a>-->
        <!--    </div>-->
        <!--  </span>-->
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-4">
            <ul id="progressbar">
                <li class="active">ข้อมูลทั่วไป</li>
                <li>การติดต่อ</li>
                <li>บัญชีผู้ใช้</li>
            </ul>
        </div>
    </div>


    <div class="bg_color_2">

        <div class="container pt-1 pb-3">
            <form class="steps" accept-charset="UTF-8" novalidate="" id="register-form" action="<?php echo base_url('add_member'); ?>" method="post" enctype="multipart/form-data">
                <!-- USER INFORMATION FIELD SET -->
                <fieldset>
                    <h2 class="fs-title">ข้อมูลทั่วไป</h2>
                    <div class="hs_firstname field hs-form-field">

                        <label for="firstname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">ชื่อ *</label>

                        <input id="firstname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983" name="first_name" required="required" type="text" value="" placeholder="" data-rule-required="true" data-msg-required="กรุณากรุณากรอกชื่อ">
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <div class="hs_lastname field hs-form-field">

                        <label for="hs_lastname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">นามสกุล *</label>

                        <input id="hs_lastname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983" name="last_name" required="required" type="text" value="" placeholder="" data-rule-required="true" data-msg-required="กรุณากรุณากรอกนามสกุล">
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <!-- End What's Your First Name Field -->
                    <!-- End Total Number of Constituents in Your Database Field -->
                    <input type="button" data-page="1" name="next" class="next action-button" value="ถัดไป"/>

                </fieldset>
                <!-- ACQUISITION FIELD SET -->
                <fieldset>
                    <h2 class="fs-title">ข้อมูลการติดต่อ</h2>
                    <div class="hs_phone field hs-form-field">
                        <label for="phone-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">เบอร์โทรศัพท์ *</label>
                        <input id="phone-99a6d115-5e68-4355-a7d0-529207feb0b3_2983" name="phone" required="required" type="number" value="" placeholder="" data-rule-required="true" data-msg-required="กรุณากรุณากรอกเบอร์โทรศัพท์">
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <div class="hs_line field hs-form-field">
                        <label for="line-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">ไลน์ไอดี </label>
                        <input id="line-99a6d115-5e68-4355-a7d0-529207feb0b3_2983" name="line_id" type="text" value="" placeholder="" >
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <div class="hs_email field hs-form-field">
                        <label for="email-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">E-mail </label>
                        <input id="email" name="email" required="required"  type="email" value="" placeholder="" data-rule-required="true" data-rule-email="true" data-msg-email="กรุณากรุณากรอกเมลให้ถูกต้อง" data-msg-required="กรุณากรุณากรอกเมล" data-rule-remote="<?php echo base_url('check_email_already')?>" data-msg-remote="บัญชีอีเมลนี้มีการใช้งานแล้ว">
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <!-- End Calc of Total Number of Donors Fields -->
                    <input type="button" data-page="2" name="previous" class="previous action-button" value="ก่อนหน้า"/>
                    <input type="button" data-page="2" name="next" class="next action-button" value="ถัดไป"/>

                </fieldset>
                <!-- Cultivation FIELD SET -->
                <fieldset>
                    <h2 class="fs-title">บัญชีผู้ใช้</h2>
                    <div class="form-group">
                        <label>รหัสผ่าน</label>
                        <input type="password" class="form-control" id="cpassword1" name="password" placeholder="" data-rule-required="true" data-rule-equalto="#cpassword" data-msg-required="กรุณากรุณากรอกรหัสผ่าน" data-msg-equalto="กรุณากรุณากรอกรหัสผ่านให้ตรงกัน">
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="" data-rule-required="true" data-rule-equalto="#cpassword1" data-msg-required="กรุณากรุณากรอกยืนยันรหัสผ่าน" data-msg-equalto="กรุณากรุณากรอกรหัสผ่านให้ตรงกัน">
                        <span class="error1" style="display: none;">
                            <i class="error-log fa fa-exclamation-triangle"></i>
                        </span>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label>รหัสผ่าน</label>-->
<!--                        <input type="password" class="form-control" id="password1" name="password1" placeholder="" data-rule-required="true" data-rule-equalto="#cpassword" data-msg-required="กรุณากรุณากรอกรหัสผ่าน" data-msg-equalto="กรุณากรุณากรอกรหัสผ่านให้ตรงกัน">-->
<!--                        <span class="error1" style="display: none;">-->
<!--                            <i class="error-log fa fa-exclamation-triangle"></i>-->
<!--                        </span>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label> รูปภาพ</label>
                        <input type="file" name="files" class="form-control">
                    </div>

                    <input type="button" data-page="3" name="previous" class="previous action-button" value="ก่อนหน้า"/>
                    <input type="button" data-page="3" name="next" class="submit action-button" value="สมัครสมาชิก"/>

                </fieldset>
            </form>

            <div id="register" style="display: none">
                <h1>สร้างบัญชีนัดหมอ</h1>
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <form id="register-form2" action="<?php echo base_url('add_member'); ?>" method="post" enctype="multipart/form-data">
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
                                    <input type="email" class="form-control" placeholder="" name="email1">
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
                </div>
            </div>
        </div>
    </div>
</main>

<link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css"/>
<link rel="stylesheet" media="all" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"/>

<style>
    /*form styles*/
    .steps {
        width: 675px;
        margin: 50px auto;
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
        width: 80%;
        margin: 0 10%;

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
        color: rgb(51, 51, 51);
        text-transform: uppercase;
        font-size: 16px;
        font-weight: bold;
        width: 33%;
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
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>-->

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
            $('#register-form').submit();

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


    //$(document).ready(function () {
    //
    //    $('#register-form').validate({
    //        rules: {
    //            first_name: {
    //                required: true,
    //            },
    //            last_name: {
    //                required: true,
    //            },
    //            email: {
    //                required: true,
    //                email: true,
    //                remote: {
    //                    url: "<?php //echo base_url('check_email_already')?>//",
    //                    type: "post"
    //                }
    //            },
    //            phone: {
    //                required: true,
    //            },
    //            password: {
    //                required: true,
    //                minlength: 6
    //            },
    //            cpassword: {
    //                required: true,
    //                equalTo: "#password"
    //            }
    //        },
    //        // set validation messages for the rules are set previously
    //        messages: {
    //            first_name: {
    //                required: "กรุณากรอกชื่อ"
    //            },
    //            last_name: {
    //                required: "กรุณากรอกนามสกุล"
    //            },
    //            phone: {
    //                required: "กรุณากรอกเบอร์โทรศัพท์"
    //            },
    //            email: {
    //                required: "กรุณากรอกอีเมล",
    //                email: "รูปแบบอีเมลไม่ถูกต้อง",
    //                remote: "อีเมลนี้มีการใช้งานแล้ว"
    //            },
    //            password: {
    //                required: "กรุณากรอกรหัสผ่าน",
    //                minlength: "ความยาวของรหัสผ่านอย่างน้อย 6 ตัวอักษร"
    //            },
    //            cpassword: {
    //                required: "กรุณากรอกยืนยันรหัสผ่าน",
    //                equalTo: "รหัสไม่ตรงกัน"
    //            }
    //        },
    //        submitHandler: function (form) {
    //            form.submit();
    //        }
    //    });


   // });
</script>
<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
