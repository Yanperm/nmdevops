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
            <li class="breadcrumb-item active">Advertise</li>
        </ol>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Advertise</h2>
            </div>
            <table id="example" class="table is-striped" style="width:100%">
                <thead>
                <tr>
                    <th>หัวข้อ</th>
                    <th>รูปภาพ</th>
                    <th>Link</th>
                    <th>รายละเอียด</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
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
<script type="text/javascript" class="init">

    $(document).ready(function () {
        var table = $('#example').DataTable({
            pageLength: 10,
            serverSide: true,
            processing: true,
            ajax: {
                url: '<?php echo site_url('admin/advertiseData'); ?>'
            },
            'columns': [
                {
                    data: 'ADVERTISESUBJECT',
                },
                {
                    data: 'ADVERTISEIMAGE',
                    render: function (data,type,row){
                        return "<img style='    width: 200px;' src='"+data+"'>"
                    }
                },
                {
                    data: 'ADVERTISELINK',
                },
                {
                    data: 'ADVERTISEDETAIL'
                },
                {
                    data: 'ADVERTISEID',
                    render: function (data,type,row){
                        return '<button type="button" class="btn btn-outline-warning"><i class="ri-edit-2-line"></i></button><button type="button" class="btn btn-outline-danger"><i class="ri-delete-bin-2-line"></i></button>';
                    },
                    //render:function(data,type,row){
                    //    var dataName = row['name'];
                    //    var btnDelete = '<a href="#" data-href="<?php //echo site_url('customer/delete'); ?>//" data-id="'+data+'" data-name="'+dataName+'" role="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> ลบ</a>';
                    //    return btnDelete;
                    //},
                    orderable: false
                }
            ]
        });
    })


</script>
