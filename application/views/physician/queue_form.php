

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/manage');?>">จัดการนัดหมาย</a>
            </li>
            <li class="breadcrumb-item active">เพิ่มคิว</li>
        </ol>
        <?php if ($this->session->flashdata('msg')): ?>
            <div class="alert alert-success  alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>เพิ่มคิว</h2>
            </div>
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                      <label>วันที่</label>
                      <input type='date' id="date" min="<?php echo date('Y-m-d'); ?>"  class="form-control">
                      <button type='button' class="btn btn-primary mt-3" onclick="getQueue()">เลือกคิว</button>
                    </div>
              </div>
            </div>

              <div class="row" id="show-queue">

              </div>
            </div>
    </div>
    <!-- /.container-fluid-->
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
function getQueue(){
  let date = $('#date').val();

  $.ajax({
      url: '<?php echo base_url('physician/getQueue')?>',
      type: 'get',
      data : {
          date : date,
      },
      success: function (response) {
        $('#show-queue').html(response);
      }
  });
}

function queue(time,queue,qber){
  $('#text-time').html(time);
  $('#text-queue').html(queue);

  $('#time').val(time);
  $('#queue').val(queue);
  $('#qber').val(qber);
  $('#form-queue').css('display','');

}
</script>
