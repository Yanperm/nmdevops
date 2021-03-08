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
            <li class="breadcrumb-item active">Clinic</li>
        </ol>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Clinic</h2>
            </div>
            <table  id="example" class="table is-striped" style="width:100%">
                <thead>
                <tr>
                    <th>ชื่อคลืนิก</th>
                    <th>แพทย์</th>
<!--                    <th>สาขาวิชาที่เชี่ยวชาญ</th>-->
                    <th>จังหวัด</th>
                    <th>หมายเลขโทรศัพท์</th>
                    <th>แพ็คเก็จ</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($clinic as $item):?>
                        <tr>
                            <td>
                                <img src="<?php echo $item->image ? $item->image:'https://nmepr.com/assets/images/profile/607414.svg';?>" class="avatar-table">
                                <?php echo $item->CLINICNAME;?>
                            </td>
                            <td><?php echo $item->DOCTORNAME;?></td>
<!--                            <td>--><?php //echo $item->PROFICIENT;?><!--</td>-->
                            <td><?php echo $item->PROVINCE;?></td>
                            <td><?php echo $item->PHONE;?></td>
                            <td>
                                <?php if($item->TYPE == 1 || $item->TYPE == 'Community'):?>
                                    <span class="badge badge-primary">Community</span>
                                <?php endif;?>
                                <?php if($item->TYPE == 2 || $item->TYPE == 'Pro'):?>
                                    <span class="badge badge-secondary">PRO</span>
                                <?php endif;?>
                                <?php if($item->TYPE == 3 || $item->TYPE == 'ULTIMATE' || $item->TYPE == 'Ultimate'):?>
                                    <span class="badge badge-success">ULTIMATE</span>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if($item->ACTIVATE == 1):?>
                                    <span class="badge badge-success">เปิดใช้งาน</span>
                                <?php endif;?>
                                <?php if($item->ACTIVATE != 1):?>
                                    <span class="badge badge-danger">ปิดใช้งาน</span>
                                <?php endif;?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('admin/clinic/detail/'.$item->IDCLINIC)?>"><i class="ri-edit-2-line"></i></a>
                                <i class="ri-delete-bin-2-line"></i>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .avatar-table{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid #3f4078;
        margin-right: 10px;
    }
    .select{
        display: initial;
    }
</style>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bulma.min.js"></script>
<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>
