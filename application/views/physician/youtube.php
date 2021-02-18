<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">จัดการYoutube</li>
        </ol>


        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-folder"></i>ตั้งค่า Youtube</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-success  alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('physician/youtube/update'); ?>" method="post">
                        <table id="pricing-list-container" style="width:100%;">
                            <?php
                            for ($i = 0; $i < 5; $i++):
                                $link = "";
                                $select = 0;
                                if (!empty($youtube[$i])):
                                    $link = $youtube[$i]->LINK;
                                    if ($youtube[$i]->STATUS) {
                                        $select = $i;
                                    }
                                endif;
                                ?>
                                <tr class="pricing-list-item">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="radio" <?php if ($select == $i): ?>  checked <?php endif; ?> name="status" value="<?php echo $i; ?>" id="status<?php echo $i; ?>">
                                            </div>
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="youtube[]" value="<?php echo $link; ?>" placeholder="https://www.youtube.com/">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </table>
                        <p>
                            <button type="submit" class="btn_1 medium mt-3">บันทึก</button>
                        </p>
                    </form>
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

    </div>
    <!-- /.container-fluid-->
</div>