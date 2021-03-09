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
                <h2><i class="fa fa-user"></i>กำลังเรียกคิว....</h2><span style="float: right"><a href="<?php echo base_url('physician/ques/reset'); ?>">Reset all</a></span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            หมายเลขคิว
                        </div>
                        <div class="card-body">
                            <p class="card-title" style="text-align: center;font-size: 49px;color: #3f51b5;"><?php if (!empty($currentQues[0]->QUES)): echo $currentQues[0]->QUES; endif; ?></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            ช่องที่
                        </div>
                        <div class="card-body">
                            <p class="card-title" style="text-align: center;font-size: 49px;color: #3f51b5;"><?php if (!empty($currentQues[0]->QUES)): ?> 1<?php endif; ?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="box_general">


            <div class="header_box">
                <h2 class="d-inline-block">รายการจองคิววันนี้</h2>
            </div>
            <div class="patient row">
                <?php foreach ($ques as $item): ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <h6><?php echo $item['CUSTOMERNAME'].$item["SHOWS"]; ?></h6>
                            <?php
                            if ($item["SHOWS"] != 2 && $item["SHOWS"] != 3): ?>
                                <a onclick="call('<?php echo $item['BOOKINGID']; ?>','<?php echo $item["QUES"]; ?>')" href="javascript:void(0)" ><div class="title title--common"><i class="fa fa-fw fa-check-circle-o"></i>เรียกคิว</div></a>
                            <?php endif; ?>
                            <?php if ($item["SHOWS"] == 3 || $item["SHOWS"] == 2): ?>
                                <a onclick="call('<?php echo $item['BOOKINGID']; ?>','<?php echo $item["QUES"]; ?>')" ><div class="title title--epic"><i class="fa fa-fw fa-check-circle-o"></i>เรียกซ้ำ</div></a>
                            <?php endif; ?>

                            <div class="desc"><?php echo $item['DETAIL']; ?></div>
                            <img class="avatar-patient" src="<?php echo $item['IMAGE'] ? $item['IMAGE'] : 'https://i.pinimg.com/736x/29/7d/8b/297d8bc1fdfd08c7bdabe8b45e1504b3.jpg' ; ?>">


                            <p class="queue <?php if(!empty($currentQues[0]->QUES)&&$item['QUES'] == $currentQues[0]->QUES):?> blink_me <?php endif;?>">คิวที่ <?php echo $item['QUES']; ?></p>


                            <div>
                                <p> เบอร์โทรศัพท์ &nbsp; </p>
                                <p><?php echo $item['PHONE']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="list_general" style="display: none">
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
                                    <li><a onclick="call('<?php echo $item['BOOKINGID']; ?>','<?php echo $item["QUES"]; ?>')" href="javascript:void(0)" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> เรียกคิว</a></li>
                                <?php endif; ?>
                                <?php if ($item["SHOWS"] == 3 || $item["SHOWS"] == 2): ?>
                                    <li><a onclick="call('<?php echo $item['BOOKINGID']; ?>','<?php echo $item["QUES"]; ?>')" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> เรียกซ้ำ</a></li>
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
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");

    .blink_me {
        animation: blinker 1s linear infinite;
        font-size: 25px;
        color: #2fcc71 !important;
    }

    @keyframes blinker {
        50% { opacity: 0; }
    }
    .avatar-patient {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        margin: 10px;
        border: 1px solid #3f4078;
    }

    .patient .card {
        /*margin: 1rem;*/
        /*width: 300px;*/
        /*height: 500px;*/
        padding: 0.5rem 1rem;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 12px 32px 4px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: 0.2s;
    }

    .patient .card:hover {
        transform: translateY(-5px);
    }
    .patient .card .queue{
        font-size: 25px;
        color: #979a99;
    }

    .patient .card .title {
        color: white;
        margin: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        transition: 0.2s;
        cursor: pointer;
    }

    .patient .card .title--legendary {
        background-color: #f4d03f;
    }

    .patient .card .title--legendary:hover {
        box-shadow: 0 0 12px rgba(244, 208, 63, 0.8);
    }

    .patient .card .title--epic {
        background-color: #8c14fc;
    }

    .patient .card .title--epic:hover {
        box-shadow: 0 0 12px rgba(140, 20, 252, 0.8);
    }

    .patient .card .title--common {
        background-color: #2ecc71;
    }

    .patient .card .title--common:hover {
        box-shadow: 0 0 12px rgba(46, 204, 113, 0.8);
    }

    .patient .card .desc {
        text-align: center;
    }

    .patient .card .actions {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .patient .card .actions button {
        padding: 0.5rem 0.8rem;
        cursor: pointer;
        background-color: transparent;
        border: none;
        text-transform: uppercase;
        outline: 0;
        transition: background-color 0.4s, color 0.4s, transform 0.1s;
    }

    .patient .card .actions button:hover {
        color: white;
        box-shadow: 0 0 24px rgba(0, 0, 0, 0.2);
    }

    .patient .card .actions button:active {
        transform: scale(0.95);
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.3);
    }

    .patient .card .actions__like:hover {
        background-color: #00b16a;
    }

    .patient .card .actions__trade:hover {
        background-color: #3498db;
    }

    .patient .card .actions__cancel:hover {
        background-color: #c0392b;
    }

    p {
        margin-top: 1rem;
        color: #484848;
    }

    a:link,
    a:visited {
        text-decoration: none;
        color: #2574a9;
    }

    .active {
        background-color: #00b16a;
    }

    button::-moz-focus-inner {
        border: 0;
    }
</style>
<script src="<?php echo base_url('node_modules/socket.io/client-dist/socket.io.js'); ?>"></script>

<script>

    function call(id, q) {
        window.location.replace("<?php echo base_url('physician/ques/call');?>" + "?id=" + id);
        var socket = io.connect('https://' + window.location.hostname + ':2083');
        socket.emit('queue', {
            id: '<?php echo $this->session->userdata("id");?>',
            message: q
        });
    }
</script>
