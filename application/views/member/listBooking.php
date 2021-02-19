<?php foreach ($listBooking as $item): ?>

    <div class="strip_list wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
        <figure>
            <a href="<?php echo base_url('clinic/' . $item["CLINICNAME"]); ?>"><img src="<?php echo $item['image']; ?>" alt=""></a>
        </figure>
        <small><?php echo $item['PROFICIENT']; ?></small>
        <h3><?php echo $item['CLINICNAME']; ?></h3>
        <p><?php echo $item['SERVICE']; ?></p>
        <h3>หมายเลขการจอง <?php echo $item['BOOKINGID']; ?></h3>
        <p>สถานะเช็คอิน <span class="history_span"><?php if ($item["CHECKIN"]): echo 'เช็คอินแล้ว'; endif; ?><?php if (!$item["CHECKIN"]): echo 'ยังไม่ได้เช็คอิน'; endif; ?></span></p>
        <?php if($item["STATUS"] == 2 && substr($item["QUES"],0,1) == 'B'):?><p class="cancel-text">ยกเลิกคิว</p><?php endif;?>
        <ul>
            <li>คิว <span class="history_span"><?php echo $item["QUES"]; ?></span></li>
            <li>วันที่ <span class="history_span"><?php echo $item["BOOKDATE"]; ?></span></li>
            <?php if($item["BOOKTIME"] != '' ):?><li>เวลา <span class="history_span"><?php echo $item["BOOKTIME"]; ?></span></li><?php endif;?>
            <?php if (!$item["CHECKIN"]): ?>
                <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@<?php echo $item["LAT"]; ?>,<?php echo $item["LONG"]; ?>,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">เส้นทาง</a></li>
            <?php endif; ?>
        </ul>
    </div>

<?php endforeach; ?>
<div id="pagination">
    <?php echo $pagination; ?>
</div>

<script>
    $('#pagination').on('click', 'a', function (e) {
        e.preventDefault();
        var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
    });
</script>



