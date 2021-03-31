<form action="<?php echo base_url('physician/doctor/update');?>" method="post">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/dashboard') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">ข้อมูลแพทย์</li>
        </ol>
        <?php if ($this->session->flashdata('msg')): ?>
            <div class="alert alert-success  alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>ข้อมูลทั่วไป</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อแพทย์</label>
                        <input type="text" class="form-control" name="doctor_name" value="<?php echo $clinic->DOCTORNAME; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>สาขาวิชาที่เชี่ยวชาญ</label>
                        <input type="text" class="form-control" name="proficient" value="<?php echo $clinic->PROFICIENT; ?>">
                    </div>
                </div>
            </div>
            <!-- /row-->

            <!-- /row-->
            <!--            <div class="row">-->
            <!--                <div class="col-md-12">-->
            <!--                    <div class="form-group">-->
            <!--                        <label>Profile picture</label>-->
            <!--                        <form action="/file-upload" class="dropzone" ></form>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!-- /row-->
        </div>
        <!-- /box_general-->

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-map-marker"></i>ปริญญาบัตรและสถาบันการศึกษา</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ปริญญาบัตรและสถาบันการศึกษา</label>
                        <input type="text" class="form-control" name="diploma" value="<?php echo $clinic->DIPLOMA; ?>">
                    </div>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-briefcase"></i>สถานที่ทำงาน</h2>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <table id="workplace-list-container" style="width:100%;">
                        <?php $workspace = explode(",", $clinic->WORKPLACE); ?>
                        <?php foreach ($workspace as $item): ?>
                            <tr class="workplace-list-item">
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="workplace[]" value="<?php echo $item; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="#0" class="btn_1 gray add-workplace-list-item"><i class="fa fa-fw fa-plus-circle"></i>เพิ่มสถานที่ทำงาน</a>
                </div>
            </div>
            <!-- /row-->
        </div>



        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-folder"></i>วุฒิบัตร</h2>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <table id="pricing-list-container" style="width:100%;">
                        <?php $degree = explode(",", $clinic->DEGREE); ?>
                        <?php foreach ($degree as $item): ?>
                            <tr class="pricing-list-item">
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="degree[]" value="<?php echo $item; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>เพิ่มวุฒิบัตร</a>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->
        <p><button type="submit" class="btn_1 medium">บันทึก</button></p>
    </div>
    <!-- /.container-fluid-->
</div>
</form>

<!--<script src="--><?php //echo base_url()?><!--assets/physician/vendor/dropzone.min.js"></script>-->
