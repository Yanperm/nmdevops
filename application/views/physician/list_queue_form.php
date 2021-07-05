<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6">
    <div class="list_time">
        <div class="list_title">
            <i class="icon_clock_alt"></i>
            <h5 style='color:#ffffff !important'><?php echo $clinic->CLINICNAME; ?> <?php echo $date; ?></h3>
        </div>
        <?php
        $today = date($date);
        $number = date('w', strtotime($today));
        ?>
        <?php if ($number == $clinic->DAYOFF || $closeStatus): ?>
            <div class="alert alert-danger text-center" role="alert">
                หยุดทำการ <?php echo $date; ?>
            </div>
        <?php endif; ?>
        <?php if ($statusBooked): ?>
            <div class="alert alert-info text-center" role="alert">
                <p> ท่านได้ทำการนัดหมอในวันที่ <?php echo $date; ?></p>
                <p>คิวที่จอง  : <?php echo $queueBooked?></p>
                <p>เรียบร้อยแล้ว</p>
            </div>
        <?php endif; ?>


        <?php if ($number != $clinic->DAYOFF && !$statusBooked && !$closeStatus): ?>
            <ul>
                <?php foreach ($times as $key => $time):
                    $textTime = $time->format('H:i') . '-' . $time->add($interval)->format('H:i');
                    ?>
                    <li><strong><?php echo $textTime; ?></strong>
                        <span>A<?php echo $key + 1; ?> </span>
                        <?php
                        $booked = false;
                        foreach ($booking as $i => $item):
                            if ($item->QBER == ($key + 1)):
                                $booked = true;
                            endif;
                        endforeach; ?>

                        <?php if ($booked): ?>
                            <button class="booked" disabled>จองแล้ว</button>
                        <?php endif; ?>

                        <?php if (!$booked): ?>
                            <a href="javascript:void(0)" onclick="queue('<?=$textTime?>','A<?=($key + 1)?>','<?=($key + 1)?>')">จองคิว</a>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
                <!--                                --><?php //foreach ($bookingExtraQues as $key => $item):?>
                <!--                                    <li style="background: #e9e6ee;"><strong style="width: 105px;">คิวเสริม</strong>-->
                <!--                                        <span>B--><?php //echo $key + 1;?><!-- </span>-->
                <!--                                        <button class="booked" disabled>จองแล้ว</button>-->
                <!--                                    </li>-->
                <!--                                --><?php //endforeach;?>
                <li style="background: #e9e6ee;"><strong style="width: 105px;">คิวเสริม</strong>
                    <span>B<?php echo count($bookingExtraQues) + 1; ?> </span>
                    <a  href="javascript:void(0)" onclick="queue('รอเรียกจากเคาเตอร์','B<?=(count($bookingExtraQues) + 1)?>','<?=(50+count($bookingExtraQues) + 1)?>')" >จองคิว</a>
                </li>
                <?php if ($bookingExtraQuesC != null):?>
                <li style="background: #e9e6ee;"><strong style="width: 120px;">ฉีดยา/ทำแผล</strong>
                    <span>C<?php echo count($bookingExtraQuesC) + 1; ?> </span>
                    <a href="javascript:void(0)" onclick="queue('รอเรียกจากเคาเตอร์','C<?=(count($bookingExtraQuesC) + 1)?>','<?=(101+count($bookingExtraQuesC) + 1)?>')">จองคิว</a>
                </li>
              <?php endif;?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-6">
  <form action="<?php echo base_url('physician/insertQueue'); ?>" method="post" id="add-queue-form">

    <input type="hidden" value="<?php echo $this->session->userdata('id'); ?>" name="clinic_id">

    <h4>รายละเอียด</h4>
    <table style='font-size: 20px;'>
      <tr>
        <td>วันที่</td>

        <td class="text_queue"><?php echo $date; ?></td>
      </tr>
      <tr>
        <td>เวลา</td>
        <td class="text_queue" id='text-time'></td>
      </tr>
      <tr>
        <td>คิวที่</td>
        <td class="text_queue" id='text-queue'></td>
      </tr>
    </table>
    <hr>
    <div id="form-queue" style='display:none'>
    <p>กรุณากรอกข้อมูลคนไข้</p>
    <input type='hidden' id="time" name='time'>
    <input type='hidden' id="date" name='date' value="<?php echo $date; ?>">
    <input type='hidden' id="queue" name='queue'>
    <input type='hidden' id="qber" name='qber'>
    <div class="form-group">
        <label>เมลล์</label>
        <input type="email" class="form-control" placeholder="" id="email" name="email" required onBlur="checkEmail(this.value)">
    </div>
    <p id="error-email" style="display:none;color: #f44336;">เมลล์นี้มีการใช้งานในระบบ</p>
    <div class="form-group">
        <label>ชื่อ</label>
        <input type="text" class="form-control" placeholder="" name="firstname_booking" required>
    </div>
    <div class="form-group">
        <label>นามสกุล</label>
        <input type="text" class="form-control" placeholder="" name="lastname_booking" required>
    </div>
    <div class="form-group">
        <label>เบอร์โทรศัพท์ติดต่อ</label>
        <input type="text" class="form-control" placeholder="" name="telephone" required>
    </div>
    <div class="form-group">
        <label>Line Id</label>
        <input type="text" class="form-control" placeholder="" name="line_id" >
    </div>
   
    <div class="form-group">
        <label>สาเหตุที่มาพบแพทย์</label>
        <textarea class="form-control" name="cause" required></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="button" id="btn-add" onclick="addQueue()" disabled="disabled">ยืนยันการนัดหมอ</button>
        <button class="btn btn-default"type="reset">ล้างข้อมูล</button>
    </div>


  </form>
</div>
</div>
</div>
<script>
function checkEmail(email){
    $.ajax({
     url: '<?php echo base_url('physician/checkEmail')?>',
     type: 'get',
     data : {email : email},
     success: function(response) {
      let data  = JSON.parse(response);
      
      if(Object.keys(data.member).length === 0 ){
        $('#error-email').hide();
        $("#btn-add").prop("disabled", false);
      }else{
        $('#error-email').show();
        $("#btn-add").prop("disabled", true);
      }
     }
   });
}
</script>
