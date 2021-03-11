<div style="width: 55%">
    <h2 style="    background: #401e7b;
    color: #ffffff;
    padding: 20px;
    text-align: center;
    margin-bottom: -13px;"> ยืนยันการนัดหมอ <?php echo $clinicName; ?></h2>
    <div style="    font-size: 17px;
    background: #f0f0f0;
    padding: 20px;">
        <p style="font-weight: bold;"> รายละเอียดผู้ป่วย</p>
        <p> หมายเลขการจอง : <?php echo $vn; ?></p>
        <p> ชื่อผู้ป่วย : <?php echo $firstName; ?> <?php echo $lastName; ?></p>
        <p> เบอร์โทรศัพท์ติดต่อ : <?php echo $telephone; ?></p>
        <p> Line Id : <?php echo $lineId; ?></p>
        <p> สาเหตุที่มาพบแพทย์ : <?php echo $cause; ?></p>

        <br><br>
        <hr>
        <p style="font-weight: bold;">วันและเวลาที่นัดหมอ</p>
        <p> วันที่ : <?php echo $date; ?></p>
        <?php if ($time != ''): ?><p> เวลา : <?php echo $time; ?></p><?php endif; ?>

        <p> คิวที่ : <?php echo $ques; ?></p>
    </div>
</div>
<br><br><br>

