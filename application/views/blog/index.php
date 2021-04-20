<!-- SPECIFIC CSS -->
<link href="<?php echo base_url() ?>assets/css/blog.css" rel="stylesheet">
<style>
  .desc-blog {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
</style>
<main>
  <div id="breadcrumb">
    <div class="container">
      <ul>
        <li><a href="<?php echo base_url() ?>">หน้าหลัก</a></li>
        <li>blog</li>
      </ul>
    </div>
  </div>
  <!-- /breadcrumb -->

  <div class="container margin_60">
    <div class="main_title">
      <h1>Nutmor Blog</h1>
    </div>
    <div class="row">
      <div class="col-lg-9">

        <?php foreach ($blog as $item):?>
        <article class="blog wow fadeIn">
          <div class="row no-gutters">
            <div class="col-lg-7">
              <figure>
                <a href="#"><img src="<?php echo $item['image_path'];?>" alt="">
                  <div class="preview"><span>อ่านต่อ</span></div>
                </a>
              </figure>
            </div>
            <div class="col-lg-5">
              <div class="post_info">
                <small><?php echo $item['created_at'];?></small>
                <h3><a href="#"><?php echo $item['title'];?></a></h3>
                <p class="desc-blog"><?php echo $item['description'];?></p>
                <ul>
                  <li>
                    <div class="thumb"><img src="http://via.placeholder.com/100x100.jpg" alt=""></div> <?php echo $item['NAME'];?>
                  </li>
                  <li><i class="icon_comment_alt"></i> 20</li>
                </ul>
              </div>
            </div>
          </div>
        </article>
        <?php endforeach;?>

        <!-- /article -->
        <div id="pagination">
          <?php echo $pagination; ?>
        </div>

      </div>
      <!-- /col -->

      <aside class="col-lg-3">
        <div class="widget">
          <form>
            <div class="form-group">
              <input type="text" name="search" id="search" class="form-control" placeholder="ค้นหา...">
            </div>
            <button type="submit" id="submit" class="btn_1"> ค้นหา</button>
          </form>
        </div>
        <!-- /widget -->

        <div class="widget">
          <div class="widget-title">
            <h4>blog ล่าสุด</h4>
          </div>
          <ul class="comments-list">
            <?php foreach ($lastBlog as $item):?>
            <li>
              <div class="alignleft">
                <a href="#0"><img src="<?php echo $item['image_path'];?>" alt=""></a>
              </div>
              <small><?php echo $item['created_at'];?></small>
              <h3><a href="#" title="" class='desc-blog'><?php echo $item['title'];?></a></h3>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
        <!-- /widget -->

        <div class="widget">
          <div class="widget-title">
            <h4>Blog Categories</h4>
          </div>
          <ul class="cats">
            <li><a href="#">Treatments <span>(12)</span></a></li>
            <li><a href="#">News <span>(21)</span></a></li>
            <li><a href="#">Events <span>(44)</span></a></li>
            <li><a href="#">New treatments <span>(09)</span></a></li>
            <li><a href="#">Focus in the lab <span>(31)</span></a></li>
          </ul>
        </div>
        <!-- /widget -->


      </aside>
      <!-- /aside -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</main>