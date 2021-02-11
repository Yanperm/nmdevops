<?php foreach ($listCheckin as $item): ?>
    <div class="strip_list wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">

        <figure style="width: 64px;height: 64px;">
            <a href="<?php echo base_url('clinic/'.$item["CLINICNAME"]);?>"><img src="<?php echo $item['image'];?>" alt="" style="    width: 68px;height: 79px;"></a>
        </figure>
        <small><?php echo $item['PROFICIENT'];?></small>
        <h3><?php echo $item['CLINICNAME'];?></h3>
        <div><h3>หมายเลขการจอง <?php echo $item['BOOKINGID'];?></h3></div>
        <p>สถานะเช็คอิน  <span class="history_span"><?php if($item["CHECKIN"]): echo 'เช็คอินแล้ว'; endif;?> <?php if(!$item["CHECKIN"]): echo 'ยังไม่ได้เช็คอิน'; endif;?></span></p>
        <ul>
            <li>คิว <span class="history_span"><?php echo $item["QUES"];?></span></li>
            <li>วันที่ <span class="history_span"><?php echo $item["BOOKDATE"];?></span></li>
            <li>เวลา <span class="history_span"><?php echo $item["BOOKTIME"];?></span></li>

            <li><a href="<?php echo base_url('checkin')?>?vn=<?php echo $item["BOOKINGID"];?>&email=<?php echo $item["EMAIL"];?>" target="_blank">เช็คอิน</a></li>
        </ul>
    </div>
<?php endforeach; ?>
<div id="paginationCheckin">
<?php echo $pagination; ?>
</div>

<script>
    $('#paginationCheckin').on('click','a',function(e){
        e.preventDefault();
        var pageno = $(this).attr('data-ci-pagination-page');
        loadCheckin(pageno);
    });
</script>



