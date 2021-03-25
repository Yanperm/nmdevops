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
            <div class="col-lg-8">
                <div id="confirm">
                    <div class="icon icon--order-success svg add_bottom_15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                    <h5>เราได้รับข้อมูล คลินิก <strong><?php echo $clinicName;?></strong> เรียบร้อยแล้ว</h4>
                        <h5>โปรดชำระค่า <strong><?php echo $package;?> Package</strong> เป็นเงิน <strong><?php echo  number_format($money);?> </strong>บาท</h5>
                      <h5 class="mt-5">  โอนเข้า </h5>
                    <h5>  ธนาคารกสิกรไทย ชื่อบัญชี <strong>หจก. นัดหมอ</strong></h5>
                    <img style="    width: 40px;margin-top: 20px;margin-bottom: 20px;" src="<?php echo base_url();?>/assets/img/kbank_logo.png">
                    <h5>เลขที่บัญชี <strong>091-1-73698-5</strong></h5>

                    <h5>โปรดส่งหลักฐานการโอนมาที่ <strong>visinvisible@gmail.com</strong></h5>



                   <!--  <h2>ขอขอบคุณสำหรับการสมัครสมาชิก!</h2>
                    <p style="    font-size: 16px;">คุณจะได้รับรายละเอียดการใช้งานที่อีเมล</p> -->
                    <p class="mt-5" style="    font-size: 17px;">ติดต่อชำระค่าบริการได้ที่</p>
                    <table style="margin: auto;text-align: left;font-size: 17px;font-weight: bold;width: 48%;">
                        <tr>
                            <td><i class="ri-phone-line"></i> เบอร์โทรศัพท์</td>
                            <td>: 083-645-9900</td>
                        </tr>
                        <tr>
                            <td><i class="ri-mail-send-line"></i> เมลล์</td>
                            <td>: visinvisible@gmail.com</td>
                        </tr>
                        <tr>
                            <td><i class="ri-line-line"></i> ไลน์</td>
                            <td>: @cobenhavn</td>
                        </tr>
                    </table>
                     <a class="mt-5" href="<?php echo base_url('physician');?>">กลับหน้าหลัก</a>
                </div>
               
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>