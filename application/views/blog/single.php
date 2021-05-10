<!-- SPECIFIC CSS -->
<link href="<?php echo base_url() ?>assets/css/blog.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Athiti:wght@200&family=Bai+Jamjuree:wght@200&family=Chakra+Petch:wght@300&family=Charm&family=Charmonman&family=Chonburi&family=Itim&family=K2D:wght@100&family=Kanit:wght@200&family=Krub:wght@200&family=Maitree:wght@200&family=Mali:wght@200&family=Mitr:wght@200&family=Niramit:wght@200&family=Pattaya&family=Pridi:wght@200&family=Prompt:wght@300&family=Sarabun:wght@200&family=Sriracha&family=Taviraj:wght@100&family=Thasadith&family=Trirong:wght@100&display=swap" rel="stylesheet">

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
<style>
  .desc-blog {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
  /* .singlepost p {
    line-height: 0.5 !important;
} */
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
      <h1>ข่าว นัดหมอ อินเทรนด์</h1>
       <p>ติดตาม ข่าว จาก นัดหมอ เพื่อ อินเทรนด์ สุขภาพ ต้องการมีสุขภาพแบบเท่ห์ follow เราทาง Social Media
ทุกช่องทาง เราจะตามหาข่าว สุขภาพ วิคราะห์ เจาะลึก รีวิว ในมุมของที่ แตกต่าง พร้อมให้บริการ ส่งตรง
ข่าวสาร ทุกช่องทาง ติดตามเราได้ ทาง Facebook Twitter YouTube และ IG</p>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div class="bloglist singlepost">
          <?php if ($blog->image_path != ''):?>
          <p><img alt="" class="img-fluid" src="<?php echo $blog->image_path;?>"></p>
          <?php endif;?>
          <?php if ($blog->youtube_link != ''):
            $pos = strpos($blog->youtube_link, '=');
            $link = substr($blog->youtube_link, $pos+1);

            $youtubeLink = $link;

            ?>
            <iframe     style="    height: 450px;" src="https://www.youtube.com/embed/<?php echo $youtubeLink;?>"></iframe>
          <?php endif;?>
          <h1><?php echo $blog->title;?></h1>
          <div class="postmeta">
            <ul>
              <li><a href="#"><i class="icon_folder-alt"></i> <?php echo $blog->name;?></a></li>
              <li><a href="#"><i class="icon_clock_alt"></i> <?php echo $blog->created_at;?></a></li>
              <li><a href="#"><i class="icon_pencil-edit"></i> <?php echo $blog->NAME;?></a></li>
              <li><a href="#"><i class="icon_comment_alt"></i> (<?php echo number_format(count($comment));?>) Comments</a></li>
            </ul>
          </div>
          <!-- /post meta -->
          <div class="post-content">
            <div class="dropcaps">
              <p>
                <?php echo $blog->description;?>
              </p>
            </div>
          </div>
          <!-- /post -->
        </div>
        <?php if (count($comment) > 0):?>
        <div id="comments">
          <h5>แสดงความคิดเห็น</h5>
          <ul>
            <?php foreach ($comment as $item):?>
            <li>
              <div class="avatar">
                <a href="#"><img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="">
                </a>
              </div>
              <div class="comment_right clearfix">
                <div class="comment_info">
                  By <a href="#"><?php echo $item['name'];?></a><span>|</span><?php echo $item['created_at']?></a><span>|</span>
                  <a href="javascript:void(0)" onclick='reply(<?php echo $item['id'];?>)'>Reply</a>
                  <?php if (!empty($this->session->userdata('authenticated')) && $this->session->userdata('authenticated') && ($this->session->userdata('type') == 'admin')) : ?>
                      <span>|</span><a href="javascript:void(0)" onclick='delComment(<?php echo $item['id'];?>)'>Delete</a>
                  <?php endif;?>
                </div>
                <p>
                  <?php echo $item['description'];?></a>
                </p>
                <form action="<?php echo base_url('reply');?>" method="post" style='display:none' id='reply_<?php echo $item['id'];?>'>
                  <input type='hidden' value="<?php echo $blog->id;?>" name="blog_id">
                  <input type='hidden' value="<?php echo $item['id'];?>" name='comment_id'>
                  <?php if (empty($this->session->userdata('authenticated'))): ?>
                  <input type="hidden" name="name_<?php echo $item['id'];?>" id="name_<?php echo $item['id'];?>" class="form-control" value="<?php echo 'Guest'.rand(111111, 999999);?>">
                  <?php endif;?>
                  <?php if (!empty($this->session->userdata('authenticated'))): ?>
                  <input type="hidden" name="name_<?php echo $item['id'];?>" id="name_<?php echo $item['id'];?>" class="form-control" value="<?php echo $this->session->userdata('name').rand(111111, 999999);?>">
                  <?php endif;?>
                  <textarea class='form-control' name='comment_<?php echo $item['id'];?>'></textarea>
                  <button type="submit" class='btn btn-success'>ตอบกลับ</button>
                </form>
              </div>
              <?php if (count($item["reply"]) > 0):?>
              <ul class="replied-to">
                <?php foreach ($item["reply"] as $reply):?>
                <li>
                  <div class="avatar">
                    <a href="#"><img src="https://www.cqc-songkhlapao.com/uploads/avatars/no_avatar.png" alt="">
                    </a>
                  </div>

                  <div class="comment_right clearfix">
                    <div class="comment_info">
                      By <a href="#"><?php echo $reply["name"];?></a><span>|</span><?php echo $reply["created_at"];?><span>
                        <?php if (!empty($this->session->userdata('authenticated')) && $this->session->userdata('authenticated') && ($this->session->userdata('type') == 'admin')) : ?>
                            <span>|</span><a href="javascript:void(0)" onclick='delReply(<?php echo $reply['id'];?>)'>Delete</a>
                        <?php endif;?>
                    </div>
                    <p>
                      <?php echo $reply["comment"];?>
                    </p>

                  </div>
                </li>
              <?php endforeach;?>
              </ul>
            <?php endif;?>
            </li>
            <?php endforeach;?>

          </ul>
        </div>
      <?php endif;?>
        <hr>

        <h5>โพสต์ความคิดเห็น</h5>
        <form action="<?php echo base_url('comment');?>" method="post">
          <input type='hidden' value="<?php echo $blog->id;?>" name="blog_id">
          <div class="form-group">
            <?php if (empty($this->session->userdata('authenticated'))): ?>
            <input type="hidden" name="name" id="name" class="form-control" value="<?php echo 'Guest'.rand(111111, 999999);?>">
            <?php endif;?>
            <?php if (!empty($this->session->userdata('authenticated'))): ?>
            <input type="hidden" name="name" id="name" class="form-control" value="<?php echo $this->session->userdata('name').rand(111111, 999999);?>">
            <?php endif;?>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="comments" id="comments" rows="6" placeholder=" ข้อความ"></textarea>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6LeJtM0aAAAAAFIg4lqW-58q4GYmIt8Pb2pBzZsk"></div>
            <button type="submit" id="submit2" class="btn_1" disabled> แสดงความคิดเห็น</button>
          </div>
        </form>

      </div>
      <!-- /col -->

      <aside class="col-lg-3">
        <div class="widget">
          <form action="<?php echo base_url('blog/1');?>" method="get">
            <div class="form-group">
              <input type="text" name="textSearch" id="textSearch" class="form-control" value="" placeholder="ค้นหา...">
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
                <a href="<?php echo base_url('blog/single/'.$item['id']);?>">
                  <?php if ($item['image_path'] != ''):?>
                    <img src="<?php echo $item['image_path'];?>" alt="">
                  <?php endif;?>

                  <?php if ($item['youtube_link'] != ''):
                    $pos = strpos($item['youtube_link'], '=');
                    $link = substr($item['youtube_link'], $pos+1);

                    $youtubeLink = $link;

                    ?>
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php echo $youtubeLink;?>"></iframe>
                  <?php endif;?>
                </a>
              </div>
              <small><?php echo $item['created_at'];?></small>
              <h3><a href="<?php echo base_url('blog/single/'.$item['id']);?>" title="" class='desc-blog'><?php echo $item['title'];?></a></h3>
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
            <?php foreach ($category as $item):?>
            <li><a href="<?php echo base_url('blog/1');?>?category=<?php echo $item->id;?>"><?php echo $item->name;?> <span>(<?php echo $item->numBlog;?>)</span></a></li>
            <?php endforeach;?>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function reply(id){
  $('#reply_'+id).show();
}

function makeaction(){
      document.getElementById('submit2').disabled = false;
}

function delComment(id){
  Swal.fire({
  title: 'ต้องการลบหรือไม่?',
  text: "",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ตกลง',
  cancelButtonText: 'ยกเลิก'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      url: '<?php echo base_url('del-comment');?>',
      type: 'post',
      // dataType: 'json',
      data: {
        id: id
      },
      success: function(response) {
        location.reload();
      }
    });
  }
})

}

function delReply(id){

  Swal.fire({
  title: 'ต้องการลบหรือไม่?',
  text: "",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ตกลง',
  cancelButtonText: 'ยกเลิก'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      url: '<?php echo base_url('del-reply');?>',
      type: 'post',
      // dataType: 'json',
      data: {
        id: id
      },
      success: function(response) {
        location.reload();
      }
    });
  }
})

}
</script>
