<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/dashboard') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">การจัดการ Package</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Member Package Subscription</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <p>Membership & Billing</p>
                    <button class="btn" onclick="cancel()" style='cursor:pointer'>ยกเลิกสมาชิก</button>
                </div>
                <div class="col-lg-6">
                    <p class="mb-0"><?php echo $clinic->USERNAME;?></p>
                    <p style="color: #03a9f4;">Email</p>
                    <p class="mb-0">********</p>
                    <p style="color: #03a9f4;">Password</p>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo base_url('physician/clinic');?>" style="color: #03a9f4;">Account</a>
                    <br> <br> <br>
                    <a href="<?php echo base_url('physician/profile');?>" class="mt-5" style="color: #03a9f4;">Change</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3">
                    <p>Package Detail</p>

                </div>
                <div class="col-lg-6">
                    <p class="mb-0">
                          <?php if ($clinic->TYPE == 1 || $clinic->TYPE == 'Community'):?>
                            Community
                          <?php elseif ($clinic->TYPE == 2 || $clinic->TYPE == 'Pro'):?>
                            Pro
                          <?php elseif ($clinic->TYPE == 3 || $clinic->TYPE == 'ULTIMATE' || $clinic->TYPE == 'Ultimate'):?>
                                Ultimate
                          <?php endif;?>
                    </p>
                    <p style="color: #03a9f4;">Package</p>
                </div>
                <?php if ($clinic->EXP_DATE != '0000-00-00'):?>
                <div class="col-lg-3">
                  <p style="margin-bottom:0px"><?php echo $clinic->EXP_DATE;?></p>
                  <p style="color: #03a9f4;">วันหมดอายุ</p>
                </div>
                <?php endif;?>
                <?php if ($clinic->EXP_DATE == '0000-00-00'):?>
                <div class="col-lg-3">
                  <p style="margin-bottom:0px">Infinity</p>
                  </div>
              <?php endif;?>
            </div>
        </div>
    </div>
</div>

<style>

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

function cancel(){
  Swal.fire({
    title: 'คุณต้องการยกเลิกหรือไม่?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ตกลง',
    cancelButtonText: 'ยกเลิก'
  }).then((result) => {
    if (result.isConfirmed) {

      $.ajax({
          url: '<?php echo base_url('physician/cancelService')?>',
          type: 'post',
          success: function (response) {
            Swal.fire(
              'แจ้งการยกเลิก',
              'การยกเลิกจะสำเร็จก็ต่อเมื่อเจ้าหน้าที่ยืนยันเรียบร้อยแล้ว',
              'success'
            )
          }
      });

    }
  })
}
</script>
