<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">จัดการเวลา</li>
        </ol>


        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-folder"></i>ตั้งค่าวันเวลาทำการ</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-success  alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('physician/time/update'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>วันหยุดทำการ</label>
                                    <select class="form-control" name="DAYOFF">
                                        <option <?php if ($time["DAYOFF"] == 0): ?> selected <?php endif; ?> value="">ไม่มีวันหยุด</option>
                                        <?php for ($i = 0; $i < 7; $i++): ?>
                                            <option <?php if ($time["DAYOFF"] == $i && ($time["DAYOFF"] == 0 && $time["TIME_OPEN"] != '')): ?> selected <?php endif; ?> value="<?php echo $i; ?>"><?php echo $day[$i]; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <table id="pricing-list-container" style="width:100%;">
                            <?php
                            for ($i = 0; $i < 7; $i++): ?>
                                <?php //if ($time->DAYOFF != $i || $time->DAYOFF == ''):
                                $open = "";
                                $close = "";
                                $nameOpen = "";
                                $nameClose = "";
                                if ($i == 0) {
                                    $open = $time['TIME_OPEN'];
                                    $close = $time['TIME_CLOSE'];
                                    $nameOpen = "TIME_OPEN";
                                    $nameClose = "TIME_CLOSE";
                                } else {
                                    $open = $time['TIME' . $i];
                                    $close = $time['CLOSE' . $i];
                                    $nameOpen = "TIME" . $i;
                                    $nameClose = "CLOSE" . $i;
                                }

//                                if (($i == $time["DAYOFF"] && $time["DAYOFF"] != '') || ($i == $time["DAYOFF"] && $time["DAYOFF"] == 0 && $time['TIME_OPEN'] == '')){
//                                    $open = '';
//                                    $close = '';
//                                }
                                ?>
                                <tr class="pricing-list-item">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" disabled placeholder="วัน" value="<?php echo $day[$i]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="time" class="form-control" placeholder="เวลาเปิด" name="<?php echo $nameOpen; ?>" value="<?php echo $open; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="time" class="form-control" placeholder="เวลาปิด" name="<?php echo $nameClose; ?>" value="<?php echo $close; ?>">
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-md-2">-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                        </div>
                                    </td>
                                </tr>
                                <?php //endif; ?>
                            <?php endfor; ?>
                        </table>
                        <!--                    <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>เพิ่มตารางเวลา</a>-->
                        <p>
                            <button type="submit" class="btn_1 medium mt-3">บันทึก</button>
                        </p>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h6>วันหยุดคลินิก</h6>
                    <div class="row">
                        <div class="col-md-8">
                            <?php if ($this->session->flashdata('msg_holiday')): ?>
                                <div class="alert alert-success  alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg_holiday'); ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url('physician/time/holiday')?>" method="post">
                            <div class="form-group">
                                <input type="date" required class="form-control" name="CLOSEDATE"  placeholder="วันหยุดคลินิก" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                                <button type="submit" class="btn_1 medium mt-3 mb-3">เพิ่มวันหยุดคลินิก</button>
                            </form>

                        </div>
                    </div>
                    <ul class="list-group">
                        <?php foreach ($dateClose as $item): ?>
                            <li class="list-group-item">
                                <?php echo $item->CLOSEDATE; ?>
                                <a style="float: right" href="<?php echo base_url('physician/time/holiday/delete')."?id=".$item->closeid;?>">X</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

    </div>
    <!-- /.container-fluid-->
</div>