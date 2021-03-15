<main>
    <form action="<?php echo base_url('search/1') ?>" method="get" id="form-search">
        <div id="results">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>ข้อมูล <?php echo number_format(count($clinic)); ?></strong> จาก <?php echo number_format($total_rows); ?> รายการ</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search_bar_list">
                            <input type="text" class="form-control" name="text_search" placeholder="<?php echo $textSearch; ?>">
                            <input type="hidden" name="lat" id="lat" value="13.7465971">
                            <input type="hidden" name="long" id="long" value="100.5371214">
                            <input type="submit" value="ค้นหา">
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /results -->

        <div class="filters_listing">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <h6>ประเภทการค้นหา</h6>
                        <div class="switch-field">
                            <input type="radio" id="all" name="type_search" value="all" <?php if ($typeSearch == 'all'): ?>  checked <?php endif; ?> >
                            <label for="all">ทั้งหมด</label>
                            <input type="radio" id="doctors" name="type_search" value="doctor" <?php if ($typeSearch == 'doctor'): ?>  checked <?php endif; ?>>
                            <label for="doctors">แพทย์</label>
                            <input type="radio" id="clinics" name="type_search" value="clinic" <?php if ($typeSearch == 'clinic'): ?>  checked <?php endif; ?>>
                            <label for="clinics">คลินิก</label>
                            <input type="radio" onClick="near()" id="nearby" name="type_search" value="nearby" <?php if ($typeSearch == 'nearby'): ?>  checked <?php endif; ?>>
                            <label for="nearby">คลินิกใกล้ฉัน</label>
                        </div>
                    </li>
                    <li>
                        <h6>การแสดงผล</h6>
                        <div class="layout_view">
                            <a href="<?php echo base_url('search') . "?view=grid&text_search=" . $textSearch . "&type_search=" . $typeSearch; ?>"><i class="icon-th"></i></a>
                            <a href="#0" class="active"><i class="icon-th-list"></i></a>
                            <a href="<?php echo base_url('search') . "?view=map&text_search=" . $textSearch . "&type_search=" . $typeSearch; ?>"><i class="icon-map-1"></i></a>
                        </div>
                    </li>
                    <li>
                        <h6>เรียงโดย</h6>
                        <select name="sort" class="selectbox">
                            <option value="view">ยอดผู้ชมมากที่สุด</option>
                            <!--                            <option value="Best rated">Best rated</option>-->
                            <!--                            <option value="Men">Men</option>-->
                            <!--                            <option value="Women">Women</option>-->
                        </select>
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
    </form>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-7">
                <?php foreach ($clinic as $key => $item): ?>
                    <div class="strip_list wow fadeIn">
                        <?php if (empty($this->session->userdata('authenticated'))): ?>
                            <a href="<?php echo base_url('login'); ?>" class="wish_bt"></a>
                        <?php endif; ?>
                        <?php if (!empty($this->session->userdata('authenticated'))): ?>
                            <?php
                            $likeStatus = false;
                            foreach ($like as $l):
                                if ($l->CLINICID == $item->IDCLINIC) {
                                    $likeStatus = true;
                                }
                            endforeach;
                            ?>
                            <?php if ($likeStatus): ?>
                                <a href="#0" id="like<?php echo $item->IDCLINIC; ?>" onClick="like('<?php echo $item->IDCLINIC ?>')" class=" wish_bt_active"><i style="color: #e91e63;" class="icon-heart"></i></a>
                            <?php endif; ?>
                            <?php if (!$likeStatus): ?>
                                <a href="#0" id="like<?php echo $item->IDCLINIC; ?>" onClick="like('<?php echo $item->IDCLINIC ?>')" class="wish_bt"></a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <figure>
                            <a href="<?php echo base_url('clinic/' . $item->CLINICID); ?>"><img src="<?php echo $item->image; ?>" alt=""></a>
                        </figure>
                        <small><?php echo $item->DETAIL ?: ''; ?></small>
                        <h3><?php echo $item->CLINICNAME ?: ''; ?></h3>
                        <p><?php echo $item->SERVICE ?: ''; ?></p>
                        <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
                        <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="<?php echo base_url() ?>/assets/img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                        <ul>
                            <li><a href="#0" onclick="onHtmlClick('Doctors', <?php echo $key; ?>)" class="btn_listing">ดูบนแผนที่</a></li>
                            <li><a href="https://www.google.com/maps/dir//<?php echo $item->CLINICNAME; ?>/@<?php echo $item->LAT; ?>,<?php echo $item->LONG; ?>,14z" target="_blank">การเดินทาง</a></li>
                            <li><a href="<?php echo base_url('clinic/' . $item->CLINICID); ?>">นัดหมอ</a></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
                <!-- /strip_list -->


                <!--                <nav aria-label="" class="add_top_20">-->
                <!--                    <ul class="pagination pagination-sm">-->
                <!--                        <li class="page-item disabled">-->
                <!--                            <a class="page-link" href="#" tabindex="-1">ก่อนหน้า</a>-->
                <!--                        </li>-->
                <!--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                <!--                        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                <!--                        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <!--                        <li class="page-item">-->
                <!--                            <a class="page-link" href="#">ถัดไป</a>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </nav>-->
                <!-- /pagination -->
                <div id="pagination">
                    <?php echo $pagination; ?>
                </div>
            </div>
            <!-- /col -->

            <aside class="col-lg-5" id="sidebar">
                <div id="map_listing" class="normal_list">
                </div>
            </aside>
            <!-- /aside -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>

<textarea id="data" style="display: none"><?php echo $map; ?></textarea>
<!-- SPECIFIC SCRIPTS -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHFd8roCGXvkpRiNV3bEiyVMkqSL6qoPU"></script>

<script>
    var base_url = '<?php echo base_url();?>';

    function near() {
        document.getElementById("form-search").submit();
    }


    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        lng = position.coords.longitude;
        $('#lat').val(lat);
        $('#long').val(lng);
        console.log(lat);
        console.log(lng);
    }

    var doctor = JSON.parse($('#data').val());

    function like(id) {
        $.ajax({
            url: '<?=base_url()?>like',
            method: 'post',
            data: {id: id},
            dataType: 'json',
            success: function (response) {
                location.reload();
            }
        });
    }

</script>


<script src="<?php echo base_url() ?>assets/js/markerclusterer.js"></script>
<script src="<?php echo base_url() ?>assets/js/map_listing.js?v=<?= time() ?>"></script>
<script src="<?php echo base_url() ?>assets/js/infobox.js"></script>