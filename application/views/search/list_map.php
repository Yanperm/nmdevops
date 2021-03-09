<div class="container-fluid full-height">
    <div class="row row-height">
        <div class="col-lg-5 content-left">
            <form action="<?php echo base_url('search/1') ?>" method="get" id="form-search">
                <div class="search_bar_wrapper">
                    <div class="search_bar_list">
                        <input type="text" class="form-control" name="text_search" placeholder="<?php echo $textSearch; ?>">
                        <input type="hidden" name="lat" id="lat" value="13.7465971">
                        <input type="hidden" name="long" id="long" value="100.5371214">
                        <input type="submit" value="ค้นหา">
                        <input type="submit" value="ค้นหา">
                    </div>
                </div>
                <div class="filters_listing map_listing">
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
                                <a href="<?php echo base_url('search') . "?text_search=" . $textSearch . "&type_search=" . $typeSearch; ?>"><i class="icon-th-list"></i></a>
                                <a href="#0" class="active"><i class="icon-map-1"></i></a>
                            </div>
                        </li>
                        <li>
                            <h6>เรียงโดย</h6>
                            <select name="sort" class="selectbox">
                                <option value="view">ยอดผู้ชมมากที่สุด</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <!-- /filters -->
            </form>
            <?php foreach ($clinic as $key => $item): ?>
                <div class="strip_list">
                    <a href="#0" class="wish_bt"></a>
                    <figure>
                        <a href="<?php echo base_url('detail/' . $item->CLINICID); ?>"><img src="<?php echo $item->image; ?>" alt=""></a>
                    </figure>
                    <small><?php echo $item->DETAIL ?? ''; ?></small>
                    <h3><?php echo $item->DOCTORNAME ?? ''; ?></h3>
                    <p><?php echo $item->SERVICE ?? ''; ?></p>
                    <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
                    <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                    <ul>
                        <li><a href="#0" onclick="onHtmlClick('Doctors', <?php echo $key;?>)" class="btn_listing">View on Map</a></li>
                        <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
                        <li><a href="<?php echo base_url('detail/' . $item->CLINICID); ?>">นัดหมอ</a></li>
                    </ul>
                </div>
            <?php endforeach; ?>


<!--            <p class="text-center add_top_30"><a href="#0"><strong>Load more</strong></a></p>-->
            <div id="pagination">
                <?php echo $pagination; ?>
            </div>
        </div>
        <!-- /content-left-->

        <div class="col-lg-7 map-right">
            <div id="map_listing" class="normal_list">
            </div>
            <!-- map-->
        </div>
        <!-- /map-right-->

    </div>
    <!-- /row-->
</div>
<textarea id="data" style="display: none"><?php echo $map; ?></textarea>
<style>
    .content-left {
        padding-top: 0px;
    }
</style>
<!-- SPECIFIC SCRIPTS -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHFd8roCGXvkpRiNV3bEiyVMkqSL6qoPU"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.selectbox-0.2.js"></script>
<script>
    $(".selectbox").selectbox();
</script>

<script>
    var base_url = '<?php echo base_url();?>';
    function near() {
        document.getElementById("form-search").submit();
    }

    var doctor = JSON.parse($('#data').val());
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        lng = position.coords.longitude;
        $('#lat').val(lat);
        $('#long').val(lng);
    }
</script>


<script src="<?php echo base_url() ?>assets/js/markerclusterer.js"></script>
<script src="<?php echo base_url() ?>assets/js/map_listing.js?v=<?=time()?>"></script>
<script src="<?php echo base_url() ?>assets/js/infobox.js"></script>


