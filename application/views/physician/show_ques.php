<!doctype html>
<html ag-app>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>โปรแกรมนัดหมอออนไลน์ เต็มรูปแบบ ใช้งานง่ายขึ้นกว่าเดิม สำหรับคลินิกที่ต้องการความสะดวก ลดความแออัด</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic//css/bootstrap.min.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic//css/bootstrap-reboot.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic//css/bootstrap-grid.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic/css/corusal.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic/css/anmimation.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic/css/softubon.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic/css/productc.css" rel="stylesheet">
    <link href="https://nutmor.com/rathawitclinic/js/jquery-ui-1.11.4.custom.css" rel="stylesheet"/>
    <script src="https://nutmor.com/rathawitclinic/js/jquery-1.12.3.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <script src="https://nutmor.com/rathawitclinic/js/jquery-ui-1.11.4.custom.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <script src="https://nutmor.com/rathawitclinic/js/datepicker.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-2.2.4.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-latest.js" type="f0314693281be9dc0159a340-text/javascript"></script>
<script>
    let today = new Date();
    let dateToday = ('0' + (today.getMonth() + 1)).slice(-2) + "/" + ('0' + today.getDate()).slice(-2) + "/" + today.getFullYear();
    let dayOff = $('#day_off').val();
    let start = Date.parse(dateToday + " " + $('#start').val());
    let end = Date.parse(dateToday + " " + $('#end').val());
    let currentTime = Date.parse(dateToday + " " + today.getHours() + ":" + today.getMinutes());
    //let currentTime = Date.parse(dateToday + " " + "20:59");
    if (isNaN(dayOff) || today.getDay() == dayOff) {
        $('#stop').show();
        $('#close').hide();
        $('#open').hide();
    } else if (start > currentTime || end < currentTime) {
        $('#close').show();
        $('#open').hide();
        $('#stop').hide();
    } else if (start <= currentTime || end >= currentTime) {
        $('#close').hide();
        $('#open').show();
        $('#stop').hide();

        let minutesToAdd = 15;
        let time = start;
        let ques = 1;
        let quesShow = 0;

        while (time < end) {
            time = new Date(time + minutesToAdd * 60000);
            time = Date.parse(time);
            if (currentTime <= time && quesShow == 0) {
                quesShow = ques;
            }
            ques++;
        }

       // alert(quesShow);
        $('#qber').html("A" + quesShow);
    }
</script>
<body style="font-family: 'Prompt', sans-serif;" class="bg-dark text-white">
<div class="container-fluid">
    <?php
    $start = '';
    $end = '';
    $dayNow = date('N');
    if ($clinic->DAYOFF != 1):
        if ($dayNow == 1):
            $start = $clinic->TIME1;
            $end = $clinic->CLOSE1;
        endif;
    endif;
    if ($clinic->DAYOFF != 2):
        if ($dayNow == 2):
            $start = $clinic->TIME2;
            $end = $clinic->CLOSE2;
        endif;
    endif;
    if ($clinic->DAYOFF != 3):
        if ($dayNow == 3):
            $start = $clinic->TIME3;
            $end = $clinic->CLOSE3;
        endif;
    endif;
    if ($clinic->DAYOFF != 4):
        if ($dayNow == 4):
            $start = $clinic->TIME4;
            $end = $clinic->CLOSE4;
        endif;
    endif;
    if ($clinic->DAYOFF != 5):
        if ($dayNow == 5):
            $start = $clinic->TIME5;
            $end = $clinic->CLOSE5;
        endif;
    endif;
    if ($clinic->DAYOFF != 6):
        if ($dayNow == 6):
            $start = $clinic->TIME6;
            $end = $clinic->CLOSE6;
        endif;
    endif; ?>
    <?php if ($clinic->DAYOFF != 0):
        if ($dayNow == 0):
            $start = $clinic->TIME_OPEN;
            $end = $clinic->TIME_CLOSE;
        endif;
    endif; ?>
    <input type="hidden" value="<?php echo $start; ?>" id="start">
    <input type="hidden" value="<?php echo $end; ?>" id="end">
    <input type="hidden" value="<?php echo $clinic->DAYOFF; ?>" id="day_off">
    <div class="row">
        <div class="col-8">
            <iframe width="1250" height="1000" src="https://www.youtube.com/embed/MCJLW8O5-dg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-4">
            <div id="qber">
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="f0314693281be9dc0159a340-|49" defer=""></script>
</body>
</html>
