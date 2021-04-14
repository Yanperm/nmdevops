<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physicain/dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">จัดการคิว</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">ตัวเลือกการค้นหา
              <!-- <a href="<?php echo base_url('physician/addQueueForm');?>" style="float:right" class="btn btn-success">เพิ่มคิว</a> -->
              <button style="float:right" class="btn btn-success" data-toggle="modal" data-target="#modal-add-queue">เพิ่มคิว</button>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('physician/manage'); ?>" method="get">
                    <div class="row">
                        <div class="col-lg-1"><label>วันที่</label></div>
                        <div class="col-lg-3">
                            <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">


                <i class="fa fa-table"></i> รายการคิว วันที่ <?php echo $date; ?></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="text-center font-bold">
                            <th>บัตรคิว</th>
                            <!-- <th>วันที่</th> -->
                            <th>เวลา</th>
                            <th>สาเหตุ</th>
                            <th>ชื่อสกุลคนไข้ที่จองคิวตรวจ</th>
                            <th>เบอร์โทร</th>
                            <th>LINE</th>
                            <th>ช่องทางการจอง</th>
                            <th>สถานะ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ques as $item): ?>
                            <tr>
                                <td><?php echo $item['QUES']; ?></td>
                               <!-- <td><?php echo $item['BOOKDATE']; ?></td> -->
                                <td><?php echo $item['BOOKTIME']; ?></td>
                                <td><?php echo $item['DETAIL']; ?></td>
                                <td><?php echo $item['CUSTOMERNAME']; ?></td>
                                <td><?php echo $item['PHONE']; ?></td>
                                <td><?php echo $item['LINEID']; ?></td>
                                <td class="text-center">
                                    <?php if ($item['BOOK_ON'] == 'WEBSITE'):?>
                                        <span class="badge badge-secondary"><?php echo $item['BOOK_ON']; ?></span>
                                    <?php endif;?>
                                    <?php if ($item['BOOK_ON'] == 'MOBILE'):?>
                                        <span class="badge badge-info"><?php echo $item['BOOK_ON']; ?></span>
                                    <?php endif;?>
                                    </td>
                                <td>
                                    <?php if ($item["TYPE"] == 0): ?>
                                        <?php if (!$item["CHECKIN"]): ?> <span class="badge badge-warning">ยังไม่เช็คอิน</span> <?php endif; ?>
                                        <?php if ($item["CHECKIN"]): ?> <span class="badge badge-success">เช็คอินแล้ว</span> <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($item["TYPE"] == 1): ?>
                                        <?php if ($item["STATUS"] != 2): ?>
                                            <?php if (!$item["CHECKIN"]): ?> <span class="badge badge-warning">ยังไม่เช็คอิน</span> <?php endif; ?>
                                            <?php if ($item["CHECKIN"]): ?> <span class="badge badge-success">เช็คอินแล้ว</span> <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($item["STATUS"] == 2): ?>
                                            <span class="badge badge-danger">ยกเลิกคิว</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($item["STATUS"] != 2): ?>
                                        <?php if (!$item["CHECKIN"]): ?> <a style="width: 100%" class="btn btn-warning" href="<?php echo base_url('physician/manage/checkin') . "?id=" . $item["BOOKINGID"]; ?>"> เช็คอินให้ </a> <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($item["CHECKIN"] && $item["STATUS"] != 2): ?><a href="<?php echo base_url('physician/manage/cancel')."?id=".$item["BOOKINGID"];?>" style="width: 100%" class="btn btn-danger" href="#"> <i class="fa fa-fw fa-trash"></i> </a> <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal-add-queue" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มคิว วันที่ <?php echo $date; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="queue-modal-content">

      </div>
    </div>
  </div>
</div>

<style>
.list_time ul li  {
    text-align: center;
    background-color: #fff;
    padding: 15px;
    font-size: 18px;
    display: block;
    margin-bottom: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    position: relative;
    font-weight: bold;
    color: #3f4078;
}
.list_time ul li  strong {
    background-color: #f8f8f8;
    float: left;
    color: #3f4078;
    font-size: 18px;
    line-height: 1;
    padding: 6px;
    display: inline-block;
    margin-right: 10px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
}
.list_time ul li  a {
    background: #fff;
    border: 2px solid #e74e84;
    float: right;
    color: #e74e84;
    padding: 5px 20px;
    font-weight: 500;
    line-height: 1;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -ms-border-radius: 30px;
    border-radius: 30px;
    cursor: pointer;
}

.list_time ul li  button {
    background: #fff;
    border: 2px solid #e74e84;
    float: right;
    color: #e74e84;
    padding: 5px 20px;
    font-weight: 500;
    line-height: 1;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -ms-border-radius: 30px;
    border-radius: 30px;
    cursor: pointer;
}

.booked {
    background: #dfdfdf !important;
    border: 2px solid #eaeaea !important;
    color: #3f4078 !important;
    cursor: no-drop !important;
}


.list_time ul li  button:hover {
    background: #e74e84;
    color: #fff;
}

.list_title {
    background-color: #3f4079;
    color: #fff;
    margin-bottom: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    padding: 30px 0;
    text-align: center;
}

.text_queue{
  padding-left: 15px;
  color: #e84e84;
}
</style>
<script>
// function getQueue(){
//   let date = $('#date').val();
//
//   $.ajax({
//       url: '<?php echo base_url('physician/getQueue')?>',
//       type: 'get',
//       data : {date : '<?php echo $date; ?>'},
//       data : {
//           date : date,
//       },
//       success: function (response) {
//         $('#show-queue').html(response);
//       }
//   });
// }

function queue(time,queue,qber){
  $('#text-time').html(time);
  $('#text-queue').html(queue);

  $('#time').val(time);
  $('#queue').val(queue);
  $('#qber').val(qber);
  $('#form-queue').css('display','');

}
</script>
<script>
 function getQueue(){
   $.ajax({
     url: '<?php echo base_url('physician/addQueueFormAjax')?>',
     type: 'get',
     data : {date : '<?php echo $date; ?>'},
     success: function(response) {
       $('#queue-modal-content').html(response);
     }
   });
 }

 getQueue();
</script>
