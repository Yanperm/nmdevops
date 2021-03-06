<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url(''); ?>">หน้าแรก</a></li>
                <li><a href="<?php echo base_url('clinic/' . $clinic->ENNAME); ?>"><?php echo $clinic->CLINICNAME; ?></a></li>
                <li>ยืนยันการนัดหมอ</li>
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
                    <h2>ทำการนัดหมอสำเร็จ</h2>
                    <p>คุณจะได้รับรายละเอียดการนัดหมอที่เมลล์</p>
                </div>
            </div>
        </div>
        <?php if (!empty($this->session->userdata('authenticated')) && $this->session->userdata('authenticated') && $this->session->userdata('type') == 'member'): ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url('member/profile'); ?>" class="btn_1">ไปหน้าบัญชีผู้ใช้</a>
                </div>
            </div>
        <?php endif; ?>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
