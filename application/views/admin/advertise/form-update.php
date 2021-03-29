<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('admin/advertise') ?>">Advertise</a>
            </li>
            <li class="breadcrumb-item active">Advertise Update</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Advertise Update</h2>
            </div>
            <form action="<?php echo base_url('admin/advertise-update') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" id="advertise_id" name="advertise_id" value="<?php echo $advertise->ADVERTISEID;?>">
              <div class="row">
                  <div class="col-lg-12">
                  <?php if ($this->session->flashdata('msg')): ?>
                      <div class="alert alert-success  alert-dismissible fade show">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
                      </div>
                  <?php endif; ?>
                  </div>

                  <div class="col-md-6">

                          <h5>รูปภาพ</h5>

                          <div class="container">
                              <hr>
                              <div class="avatar-upload">
                                  <div class="avatar-edit">
                                      <input type='file' id="imageUpload" name="file" accept=".png, .jpg, .jpeg"/>
                                      <label for="imageUpload"></label>
                                  </div>
                                  <div class="avatar-preview">
                                      <input type="hidden" value="<?= $advertise->ADVERTISEIMAGE ?>" name="old_image">
                                      <?php if ($advertise->ADVERTISEIMAGE == ''): ?>
                                          <div id="imagePreview" style="background-image: url('https://i.pinimg.com/originals/ae/8a/c2/ae8ac2fa217d23aadcc913989fcc34a2.png');">
                                          </div>
                                      <?php endif; ?>

                                      <?php if ($advertise->ADVERTISEIMAGE !== ''): ?>
                                          <div id="imagePreview" style="background-image: url(<?php echo $advertise->ADVERTISEIMAGE; ?>);">
                                          </div>
                                      <?php endif; ?>
                                  </div>
                              </div>
                          </div>


                  </div>
                  <div class="col-md-6">
                      <h5>รายละเอียด</h5>
                      <hr>
                        <div class="row justify-content-center mt-3">
                              <div class="col-md-3">
                                  หัวข้อ
                              </div>
                              <div class="col-md-9 ">
                                  <input type="text" class="form-control" value="<?php echo $advertise->ADVERTISESUBJECT;?>" id="subject" name="subject">
                              </div>
                          </div>
                          <div class="row justify-content-center mt-3">
                                <div class="col-md-3">
                                    Link
                                </div>
                                <div class="col-md-9 ">
                                    <input type="text" class="form-control" value="<?php echo $advertise->ADVERTISELINK;?>" id="link" name="link">
                                </div>
                            </div>
                          <div class="row justify-content-center mt-3">
                                <div class="col-md-3">
                                    รายละเอียด
                                </div>
                                <div class="col-md-9 ">
                                    <textarea class="form-control" name='desc' id='desc' ><?php echo $advertise->ADVERTISEDETAIL;?></textarea>
                                </div>
                            </div>

                          <div class="row justify-content-center mt-3">
                              <div class="col-md-2">

                              </div>
                              <div class="col-md-4 ">
                                  <p class="text-center add_top_30"><input type="submit" class="btn_1" value="บันทึกการแก้ไข"></p>
                              </div>
                          </div>
                    </div>
              </div>
            </form>
        </div>
    </div>
</div>

<style>
    .avatar-upload {
        position: relative;
        max-width: 100%;
        margin: 5px auto;
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
      width: 100%;
      height: 500px;
      position: relative;
      border-radius: 0;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
    }



    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 0%;
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
