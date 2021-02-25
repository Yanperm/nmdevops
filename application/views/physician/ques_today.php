<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/dashboard') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">เรียกคิว</li>
        </ol>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-user"></i>กำลังเรียกคิว....</h2><span style="float: right" ><a href="<?php echo base_url('physician/ques/reset');?>">Reset all</a></span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            หมายเลขคิว
                        </div>
                        <div class="card-body">
                            <p class="card-title" style="text-align: center;font-size: 49px;color: #3f51b5;"><?php if(!empty($currentQues[0]->QUES)): echo $currentQues[0]->QUES; endif;?></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            ช่องที่
                        </div>
                        <div class="card-body">
                            <p class="card-title" style="text-align: center;font-size: 49px;color: #3f51b5;"><?php if(!empty($currentQues[0]->QUES)):?> 1<?php endif;?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">รายการจองคิววันนี้</h2>
            </div>
            <div class="list_general">
                <ul>
                    <?php foreach ($ques as $item): ?>
                        <li>
                            <figure><img src="<?php echo $item['IMAGE']; ?>" alt=""></figure>
                            <h4>
                                <?php echo $item['CUSTOMERNAME']; ?>
                                <?php if ($item['CHECKIN']): ?>
                                    <i class="approved">เช็คอินแล้ว</i>
                                <?php endif; ?>
                                <?php if (!$item['CHECKIN']): ?>
                                    <i class="pending">ยังไม่เช็คอิน</i>
                                <?php endif; ?>
                            </h4>
                            <ul class="booking_details">
                                <li><strong>คิวที่</strong> <?php echo $item['QUES']; ?></li>
                                <li><strong>วันที่จอง</strong> <?php echo $item['BOOKDATE']; ?></li>
                                <li><strong>เวลาที่จอง</strong> <?php echo $item['BOOKTIME']; ?></li>
                                <li><strong>เบอร์โทรศัพท์</strong> <?php echo $item['PHONE']; ?></li>
                                <li><strong>สาเหตุ</strong> <?php echo $item['DETAIL']; ?></li>
                            </ul>
                            <ul class="buttons">
                                <?php
                                if ($item["SHOWS"] != 2 && $item["SHOWS"] != 3): ?>
                                    <li><a onclick="call('<?php echo $item['BOOKINGID'];?>','<?php echo $item["QUES"]; ?>')" href="javascript:void(0)" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> เรียกคิว</a></li>
                                <?php endif; ?>
                                <?php if ($item["SHOWS"] == 3 || $item["SHOWS"] == 2 ): ?>
                                    <li><a  onclick="call('<?php echo $item['BOOKINGID'];?>','<?php echo $item["QUES"]; ?>')" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> เรียกซ้ำ</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <nav aria-label="...">
            <?php echo $pagination; ?>
        </nav>
    </div>
</div>
<script src="<?php echo base_url('node_modules/socket.io/client-dist/socket.io.js');?>"></script>

<script>

    function call(id,q){
        window.location.replace("<?php echo base_url('physician/ques/call');?>"+"?id="+id);
        var socket = io.connect( 'https://'+window.location.hostname+':3000' );
            socket.emit('queue', {
                id : '<?php echo $this->session->userdata("id");?>',
                message: q
            });
    }
</script>
