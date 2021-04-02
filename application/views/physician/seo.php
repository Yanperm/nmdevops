<form action="<?php echo base_url('physician/seoUpdate')?>" method="post" >
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('physician/dashboard')?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">SEO</li>
        </ol>
        <?php if ($this->session->flashdata('msg')): ?>
            <div class="alert alert-success  alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>ตั้งค่า SEO</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <textarea class="form-control" name='title'><?php echo $clinic->SEO_TITLE;?></textarea>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control" name='desc'><?php echo $clinic->SEO_META;?></textarea>
                    </div>
                </div>
            </div>

        </div>
        <!-- /box_general-->



        <!-- /box_general-->
        <p><button type="submit"  class="btn_1 medium">บันทึก</button></p>
    </div>
    <!-- /.container-fluid-->
</div>
</form>

<!--<script src="--><?php //echo base_url()?><!--assets/physician/vendor/dropzone.min.js"></script>-->
