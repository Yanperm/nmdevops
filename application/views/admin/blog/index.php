<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" rel="stylesheet">-->
<link href="https://cdn.datatables.net/1.10.23/css/dataTables.bulma.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Blog</li>

    </ol>
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Blog</h2>
        <a style="    float: right;" class="btn btn-success" href="<?php echo base_url('admin/blog-add');?>">เพิ่ม Blog</a>
        <a style="    float: right;margin-right:10px" class="btn btn-success" href="#" data-toggle="modal" data-target="#exampleModal">เพิ่มหมวดหมู่</a>
      </div>
      <table id="example" class="table is-striped" style="width:100%">
        <thead>
          <tr>
            <th style='width:150px'>หัวข้อ</th>
            <th>รูปภาพ</th>
            <th>Youtube</th>
            <th>วันที่สร้าง</th>
            <th>จัดการ</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">หมวดหมู่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <input type="text" class="form-control" placeholder="ชื่อหมวดหมู่" id="name">
        <button type="button" class="btn btn-primary mt-3" onclick="addCategory()">เพิ่ม</button>
        <div>

          <table class="table mt-3">
            <thead class="thead-light">
              <tr>
                <th scope="col">Category name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="category-list">
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<style>
  .avatar-table {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid #3f4078;
    margin-right: 10px;
  }

  .select {
    display: initial;
  }
</style>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bulma.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" class="init">
  $(document).ready(function() {

    var url = "<?php echo base_url();?>";
    var table = $('#example').DataTable({
      pageLength: 10,
      serverSide: true,
      processing: true,
      ajax: {
        url: '<?php echo site_url('admin/blogData'); ?>'
      },
      'columns': [{
          data: 'title',
        },
        {
          data: 'image_path',
          render: function(data, type, row) {
            if(data != ''){
              return "<img style='    width: 200px;height:100px' src='" + data + "'>"
            }else{
              return '';
            }

          }
        },
        {
          data: 'youtube_link',
          render: function(data, type, row) {
            return data;
            // if(data != null){
            //   var pos = data.indexOf("=");
            //   var link = data.substring(pos);
            //   return '<iframe width="420" height="315"src="https://www.youtube.com/embed/tgbNymZ7vqY'+link+'"></iframe>'
            // }
          }
        },
        {
          data: 'created_at',
        },

        {
          data: 'id',
          render: function(data, type, row) {
            return '<a href="' + url + '/admin/blog-edit?id=' + data + '" class="btn btn-outline-warning"><i class="ri-edit-2-line"></i></a><button type="button" onclick="del(' + data +
              ')" class="btn btn-outline-danger"><i class="ri-delete-bin-2-line"></i></button>';
          },

          orderable: false
        }
      ]
    });
  })

  function del(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?=base_url()?>admin/blog-delete',
          method: 'post',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            window.location.reload();
          }
        });
      }
    })
  }

  function addCategory() {
    $.ajax({
      url: '<?php echo base_url('admin/insertBlogCategory ')?>',
      type: 'post',
      data: {
        name: $('#name').val()
      },
      success: function(response) {
        $('#name').val('');
        getCategory();
      }
    });
  }

  function updateBlogCategory(id) {

    $.ajax({
      url: '<?php echo base_url('admin/updateBlogCategory ')?>',
      type: 'post',
      data: {
        name: $('#cate'+id).val(),
        id : id
      },
      success: function(response) {
        Swal.fire(
          'สำเร็จ!',
          'ทำการแก้ไขหมวดหมู่สำเร็จ!',
          'success'
        )
        getCategory();
      }
    });
  }

  function deleteBlogCategory(id) {

    Swal.fire({
      title: 'ต้องการลบหรือไม่?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?php echo base_url('admin/deleteBlogCategory ')?>',
          type: 'post',
          data: {
            id : id
          },
          success: function(response) {
            Swal.fire(
              'สำเร็จ!',
              'ทำการลบหมวดหมู่สำเร็จ!',
              'success'
            )
            getCategory();
          }
        });
      }
    })
  }

  function getCategory() {
    $.ajax({
      url: '<?php echo base_url('admin/getBlogCategory')?>',
      type: 'get',
      success: function(response) {
        $('#category-list').html(response);
        console.log(response);
      }
    });
  }
  getCategory();


</script>
