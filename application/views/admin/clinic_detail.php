<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('admin/dashboard')?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Clinic update</li>
        </ol>
        <form action="#" enctype="multipart/form-data">
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>ข้อมูลคลินิก</h2>
            </div>
            <div class="row">
                <input type="hidden" value="<?=$clinic->image?>" name="old_image">
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success  alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                <?php endif; ?>
                <h5>รูปภาพ</h5><br>
                <p> รูปภาพจะปรากฏที่หน้ารายละเอียดของคลินิก ขนาดแนะนำ 350x350</p>

                <div class="container">
                    <hr>
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="file" accept=".png, .jpg, .jpeg"/>
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <input type="hidden" value="<?= $clinic->image ?>" name="old_image">
                            <?php if ($clinic->image == ''): ?>
                                <div id="imagePreview" style="background-image: url('https://www.efood2you.com/uploads/avatar.png');">
                                </div>
                            <?php endif; ?>

                            <?php if ($clinic->image !== ''): ?>
                                <div id="imagePreview" style="background-image: url(<?php echo $clinic->image; ?>);">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อคลินิก</label>
                        <input type="text" class="form-control" value="<?php echo $clinic->CLINICNAME;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>แพทย์</label>
                        <input type="text" class="form-control" value="<?php echo $clinic->DOCTORNAME;?>">
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>สาขาวิชาที่เชี่ยวชาญ</label>
                        <input type="text" class="form-control"  value="<?php echo $clinic->PROFICIENT;?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ปริญญาบัตรและสถาบันการศึกษา</label>
                        <input type="text" class="form-control" value="<?php echo $clinic->DIPLOMA;?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php $degree = explode(",",$clinic->DEGREE);?>

                        <h6>วุฒิบัตร</h6>
                        <table id="pricing-list-container" style="width:100%;">
                            <?php foreach ($degree as $item):?>
                            <tr class="pricing-list-item">
                                <td>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="degree[]" value="<?php echo $item;?>">
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
                        <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>เพิ่มวุฒิบัตร</a>
                </div>
<!--                <div class="col-md-6">-->
<!--                    --><?php //$service = explode(",",$clinic->SERVICE);?>
<!---->
<!---->
<!--                    <h6>บริการของคลินิก</h6>-->
<!--                    <table id="pricing-list-container" style="width:100%;">-->
<!--                        --><?php //foreach ($service as $item):?>
<!--                            <tr class="pricing-list-item">-->
<!--                                <td>-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-10">-->
<!--                                            <div class="form-group">-->
<!--                                                <input type="text" class="form-control" name="service[]" value="--><?php //echo $item;?><!--">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-2">-->
<!--                                            <div class="form-group">-->
<!--                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                        --><?php //endforeach;?>
<!--                    </table>-->
<!--                    <a href="#1" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>เพิ่มบริการของคลินิก</a>-->
<!--                </div>-->

            </div>

        </div>
        <!-- /box_general-->

        <!-- /box_general-->
            <p><button class="btn_1 medium" type="submit">บันทึก</button></p>

        </form>
    </div>
    <!-- /.container-fluid-->
</div>
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });


        //validate change password
        $('#password-form').validate({
            rules: {
                old_password: {
                    required: true,
                    minlength: 4,
                    remote: {
                        url: "<?php echo base_url('physician/check_old_password')?>",
                        type: "post"
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                cpassword: {
                    required: true,
                    equalTo: "#password"
                },

            },
            messages: {
                old_password: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "ความยาวของรหัสผ่านอย่างน้อย 6 ตัวอักษร",
                    remote: "รหัสผ่านไม่ถูกต้อง"
                },
                password: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "ความยาวของรหัสผ่านอย่างน้อย 6 ตัวอักษร"
                },
                cpassword: {
                    required: "กรุณากรอกยืนยันรหัสผ่าน",
                    equalTo: "รหัสไม่ตรงกัน"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }


        });

        loadPagination(0);
        loadCheckin(0);

    });

</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>