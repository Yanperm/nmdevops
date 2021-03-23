<form action="<?php echo base_url('physician/clinic/update')?>" method="post" >
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/dashboard')?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">ข้อมูลคลินิก</li>
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
                        <label>ชื่อคลินิก</label>
                        <input type="text" class="form-control" name="clinic_name" value="<?php echo $clinic->CLINICNAME;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ไลน์ไอดี</label>
                        <input type="text" class="form-control" name="line_id" value="<?php echo $clinic->LINE;?>">
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $clinic->PHONE;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>อีเมล</label>
                        <input type="email" class="form-control" name="email"  value="<?php echo $clinic->USERNAME;?>">
                    </div>
                </div>
            </div>
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
                <h2><i class="fa fa-map-marker"></i>ที่อยู่</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>รายละเอียดที่อยู่</label>
                        <textarea class="form-control" name="address"><?php echo $clinic->ADDRESS;?></textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>จังหวัด</label>
                        <input type="text" class="form-control" name="province" value="<?php echo $clinic->PROVINCE;?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" name="lat" value="<?php echo $clinic->LAT;?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="long" value="<?php echo $clinic->LONG;?>">
                    </div>
                </div>
            </div>

            <!-- /row-->
        </div>
        <!-- /box_general-->



        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-folder"></i>บริการของคลินิก</h2>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <table id="pricing-list-container" style="width:100%;">
                        <?php $service = explode(",",$clinic->SERVICE);?>
                        <?php foreach ($service as $item):?>
                        <tr class="pricing-list-item">
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="service[]" value="<?php echo $item;?>">
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
                        <?php endforeach;?>
                    </table>
                    <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>เพิ่มบริการ</a>
                </div>
            </div>
            <!-- /row-->
        </div>

        <!-- /box_general-->
        <p><button type="submit"  class="btn_1 medium">บันทึก</button></p>
    </div>
    <!-- /.container-fluid-->
</div>
</form>

<!--<script src="--><?php //echo base_url() ?><!--assets/physician/vendor/dropzone.min.js"></script>-->