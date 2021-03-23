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
            <div class="card-header">ตัวเลือกการค้นหา</div>
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
                                    <?php if($item['BOOK_ON'] == 'WEBSITE'):?>
                                        <span class="badge badge-secondary"><?php echo $item['BOOK_ON']; ?></span>
                                    <?php endif;?>
                                    <?php if($item['BOOK_ON'] == 'MOBILE'):?>
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
