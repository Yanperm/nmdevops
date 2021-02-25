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
<!--    <link href="https://nutmor.com/rathawitclinic/css/productc.css" rel="stylesheet">-->
    <link href="https://nutmor.com/rathawitclinic/js/jquery-ui-1.11.4.custom.css" rel="stylesheet"/>
    <script src="https://nutmor.com/rathawitclinic/js/jquery-1.12.3.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <script src="https://nutmor.com/rathawitclinic/js/jquery-ui-1.11.4.custom.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <script src="https://nutmor.com/rathawitclinic/js/datepicker.js" type="f0314693281be9dc0159a340-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-2.2.4.min.js"></script>
<!--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <style>

        .box {
            width: 95%;
            max-width: 360px;
            /*min-height: 100px;*/
            height:123px;
            font-size: 13.2px;
            /*font-family: Poppins, sans-serif;*/
            display: flex;
            align-items: flex-start;
            justify-content: center;
            background: #fff;
            border-radius: 10px;
            /*box-shadow: 0 0 2px rgba(0, 0, 0, 0.12);*/
            margin: 4px 8px;
            cursor: pointer;
            border-top-right-radius: 65px;
            border-bottom-right-radius: 65px;
        }

        .box-icon-ctn {
            width: 70px;
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            /* background-color: beige; */
            padding: 10px 5px;
        }

        .box-icon-box {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(#9500eb, #4f28ff);
            color: #fff;
            border-radius: 100vh;
        }

        .box-text-ctn {
            width: 100%;
            height: 100%;
            padding: 10px 5px 10px 0;
        }

        .box-heading {
            text-align: start;
            margin-bottom: 4px;
            color: #474747;
        }

        .box-link {
            position: relative;
            display: inline-block;
            text-decoration: none;
            background-image: linear-gradient(#9500eb, #4f28ff);
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            background-position: 80%;
            margin-top: 2px;
            border-radius: 4px;
        }

        .box-link::before {
            position: absolute;
            content: "";
            bottom: 0;
            left: 0;
            width: 0;
            height: 1.6px;
            background: linear-gradient(#9500eb, #4f28ff);
            border-radius: 100vh;
            transition: 300ms;
        }

        .box:hover .box-link::before {
            width: 100%;
        }

        .styled-table {
            text-align: center;
            color: #969696;
            font-size: 30px !important;
            border-collapse: collapse;
            /*margin: 25px 0;*/
            /*font-size: 0.9em;*/
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #3f4078;
            color: #fff;
            font-size: 29px;
            text-align: center;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #8bc34a;
            text-align: center;
            font-size: 4em;
        }
    </style>
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
    function displayCurrentTime() {
        let currentTime = new Date();
        let hours = currentTime.getHours();
        let minutes = currentTime.getMinutes();
        let seconds = currentTime.getSeconds();
        let amOrPm = hours < 12 ? "AM" : "PM";

        hours = hours === 0 ? 12 : hours > 12 ? hours - 12 : hours;
        hours = addZero(hours);
        minutes = addZero(minutes);
        seconds = addZero(seconds);

        let timeString = `${hours} : ${minutes} : ${seconds} `;


        $('#clock').html(timeString);
       // document.getElementById("clock").innerHTML = timeString;
        let timer = setTimeout(displayCurrentTime, 1000);
    }

    function addZero(component) {
        return component < 10 ? "0" + component : component;
    }

    displayCurrentTime();



    function fetchdata(){
        $.ajax({
            url: '<?php echo base_url('physician/order');?>',
            type: 'get',
            success: function(response){
                // Perform operation on the return value
               // alert(response);
               // console.log(response);
                $('#order').html(response);
            }
        });
    }

</script>
<body style="padding-top: 1rem;font-family: 'Prompt', sans-serif;background-color: #fff!important;    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQulpZNGZBaAfPS0zcLUU8ACHLIfrDVaIPc1w&usqp=CAU);" class="bg-dark text-white">

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
        <div class="col-md-4">
            <div class="box">
                <div class="box-text-ctn" style="background: #3f4077;width: 40%;">
                    <p style="color: #ffffff;font-size: 30px;padding-top: 9px;padding-left: 24px;">วันที่
                    <br>
                        <span style="color: #ffffff;font-size: 20px;">Date</span>
                    </p>

                </div>
                <div class="box-text-ctn" style="border: 2px solid #3f4077;border-top-right-radius: 65px;border-bottom-right-radius: 65px;">
                    <h3 class="box-heading mt-3 p-4"><?php echo  date('Y-m-d');?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-text-ctn" style="background: #3f4077;width: 40%;">
                    <p style="color: #ffffff;font-size: 30px;padding-top: 9px;padding-left: 24px;">เวลา
                        <br>
                        <span style="color: #ffffff;font-size: 20px;">Time</span>
                    </p>

                </div>
                <div class="box-text-ctn" style="border: 2px solid #3f4077;border-top-right-radius: 65px;border-bottom-right-radius: 65px;">
                    <h3 class="box-heading mt-3 p-4" id="clock">
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-2" style="display: flex">
            <img style="width: 38px;border-radius: 50%;height: 38px;" src="<?php echo $clinic->image;?>">
            <h3 style="       font-size: 1.2em; color: #3f4078;"><?php echo $clinic->CLINICNAME;?></h3></div>
        <div class="col-md-2"><img style="width: 256px;" src="<?php echo base_url(); ?>/assets/img/nutmor_logo.png"></div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
            <iframe style="width: 100%;height:550px" src="https://www.youtube.com/embed/MCJLW8O5-dg?autoplay=1&mute=1&loop=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-4">
            <div id="qber">
            </div>
            <table class="styled-table">
                <thead>
                <tr>
                    <th>คิวที่ <br> <span style="font-size: 20px">NUMBER</span></th>
                    <th>ช่องบริการ <br> <span style="font-size: 20px">COUNTER</span></th>
                </tr>
                </thead>
                <tbody>
<!--                <tr>-->
<!--                    <td>A0</td>-->
<!--                    <td>00</td>-->
<!--                </tr>-->
                <tr class="active-row">
                    <td id="order"></td>
                    <td>1</td>
                </tr>
<!--                <tr>-->
<!--                    <td>A12</td>-->
<!--                    <td>00</td>-->
<!--                </tr>-->
                <!-- and so on... -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="f0314693281be9dc0159a340-|49" defer=""></script>
<script src="<?php echo base_url('node_modules/socket.io/client-dist/socket.io.js');?>"></script>

<script>
    var socket = io.connect( 'https://'+window.location.hostname+':2083');

    socket.on('queue', function( data ) {});

    socket.on('<?php echo $this->session->userdata('id');?>', function( data ) {
        $('#order').html(data.message)
    });

</script>
<!--<script src="http://localhost:3000/socket.io/socket.io.js"></script>-->
</body>
</html>
