<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/froala_editor.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/froala_style.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/code_view.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/colors.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/emoticons.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/image_manager.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/image.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/line_breaker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/table.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/char_counter.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frola/css/plugins/video.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('admin/blog') ?>">Blog</a>
            </li>
            <li class="breadcrumb-item active">Blog Update</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Blog Update</h2>
            </div>
            <form action="<?php echo base_url('admin/blog-update') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" id="blog_id" name="blog_id" value="<?php echo $blog->id;?>">
              <div class="row">
                  <div class="col-lg-12">
                  <?php if ($this->session->flashdata('msg')): ?>
                      <div class="alert alert-success  alert-dismissible fade show">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>สำเร็จ!</strong> <?php echo $this->session->flashdata('msg'); ?>
                      </div>
                  <?php endif; ?>
                  </div>

                  <div class="col-md-12">

                          <h5>รูปภาพ/Youtube</h5>

                          <div class="container">
                              <hr>
                              <select class="form-control" onchange="typeBlogfn(this.value)" id='typeBlog'>
                                <option value="0" <?php if ($blog->image_path != ''):?>selected<?php endif;?>>Image</option>
                                <option value="1" <?php if ($blog->youtube_link != ''):?>selected<?php endif;?>>Youtube</option>
                              </select>
                              <div id='image' class='mt-3'>
                              <div class="avatar-upload">
                                  <div class="avatar-edit">
                                      <input type='file' id="imageUpload" name="file" accept=".png, .jpg, .jpeg"/>
                                      <label for="imageUpload"></label>
                                  </div>
                                  <div class="avatar-preview">
                                      <input type="hidden" value="<?= $blog->image_path ?>" name="old_image">
                                      <?php if ($blog->image_path == ''): ?>
                                          <div id="imagePreview" style="background-image: url('https://i.pinimg.com/originals/ae/8a/c2/ae8ac2fa217d23aadcc913989fcc34a2.png');">
                                          </div>
                                      <?php endif; ?>

                                      <?php if ($blog->image_path !== ''): ?>
                                          <div id="imagePreview" style="background-image: url(<?php echo $blog->image_path; ?>);">
                                          </div>
                                      <?php endif; ?>
                                  </div>
                              </div>
                            </div>
                            <div id='youtube' class='mt-3' style='display:none'>
                              <h5>Youtube link</h5>
                              <input type='text' class='form-control' value="<?php echo $blog->youtube_link;?>" name="youtube_link" id="youtube_link">
                            </div>
                          </div>


                  </div>
                  <div class="col-md-12">
                      <h5>รายละเอียด</h5>
                      <hr>
                      <div class="row justify-content-center mt-3">
                            <div class="col-md-3">
                                หมวดหมู่
                            </div>
                            <div class="col-md-9 ">
                              <select class="form-control" name='category'>
                                <?php foreach ($category as $item):?>
                                  <option <?php if ($item->id == $blog->category_id):?> selected <?php endif;?> value='<?php echo $item->id?>'><?php echo $item->name;?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                              <div class="col-md-3">
                                  หัวข้อ
                              </div>
                              <div class="col-md-9 ">
                                  <input type="text" class="form-control" value="<?php echo $blog->title;?>" id="subject" name="subject">
                              </div>
                          </div>

                          <div class="row justify-content-center mt-3">
                                <div class="col-md-3">
                                    รายละเอียด
                                </div>
                                <div class="col-md-9 ">
                                  <div id="editor">
                                      <?php echo $blog->description;?>
                                  </div>
                                  <!-- <div class="editor" id='editor'><?php echo $blog->description;?></div> -->
                                    <textarea class="form-control" name='desc' id='desc' style='display:none'><?php echo $blog->description;?></textarea>
                                </div>
                            </div>

                          <div class="row justify-content-center mt-3">
                              <div class="col-md-2">

                              </div>
                              <div class="col-md-4 ">
                                  <p class="text-center add_top_30"><input type="submit" class="btn_1" value="บันทึกการแก้ไข"></p>
                              </div>
                          </div>
                    </div>
              </div>
            </form>
        </div>
    </div>
</div>

<style>
    .avatar-upload {
        position: relative;
        max-width: 100%;
        margin: 5px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
      width: 100%;
      height: 500px;
      position: relative;
      border-radius: 0;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
    }



    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 0%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Athiti:wght@200&family=Bai+Jamjuree:wght@200&family=Chakra+Petch:wght@300&family=Charm&family=Charmonman&family=Chonburi&family=Itim&family=K2D:wght@100&family=Kanit:wght@200&family=Krub:wght@200&family=Maitree:wght@200&family=Mali:wght@200&family=Mitr:wght@200&family=Niramit:wght@200&family=Pattaya&family=Pridi:wght@200&family=Prompt:wght@300&family=Sarabun:wght@200&family=Sriracha&family=Taviraj:wght@100&family=Thasadith&family=Trirong:wght@100&display=swap" rel="stylesheet">

<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/froala_editor.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/align.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/image.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/link.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/table.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/video.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/url.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frola/js/plugins/save.min.js"></script>

<script>
(function () {
  new FroalaEditor("#editor", {
    //fullPage: true,
    fontFamily: {
      "Prompt,sans-serif": 'Prompt',
      "Kanit,sans-serif": 'Kanit',
      "Athiti,sans-serif": 'Athiti ',
      "Bai Jamjuree,sans-serif": 'Bai Jamjuree ',
      "Chakra Petch,sans-serif": 'Chakra Petch ',
      "Charmonman,sans-serif": 'Charmonman ',
      "Itim,sans-serif": 'Itim ',
      "K2D,sans-serif": 'K2D ',
      "Krub,sans-serif": 'Krub ',
      "Maitree,sans-serif": 'Maitree ',
      "Mali,sans-serif": 'Mali ',
      "Mitr,sans-serif": 'Mitr ',
      "Pattaya,sans-serif": 'Pattaya ',
      "Pridi,sans-serif": 'Pridi ',
      "Sarabun,sans-serif": 'Sarabun ',
      "Sriracha,sans-serif": 'Sriracha ',
      "Taviraj,sans-serif": 'Taviraj ',
      "Thasadith,sans-serif": 'Thasadith ',
      "Trirong,sans-serif": 'Trirong ',
    },
    fontFamilySelection: true,
    events: {
      initialized: function() {
      this.events.focus()
      this.fontSize.apply('14px')
      this.fontFamily.apply('Prompt')
    },
    'contentChanged': function (keydownEvent) {
      $('#desc').val(this.html.get());
    }
  }
  })
})()

//    $(document).ready(function () {
      // var toolbarOptions = [
      //   ['bold', 'italic', 'underline', 'strike','link'], // toggled buttons
      //   // ['blockquote', 'code-block'],
      //
      //   [{
      //     'header': 1
      //   }, {
      //     'header': 2
      //   }], // custom button values
      //   [{
      //     'list': 'ordered'
      //   }, {
      //     'list': 'bullet'
      //   }],
      //   [{
      //     'script': 'sub'
      //   }, {
      //     'script': 'super'
      //   }], // superscript/subscript
      //   [{
      //     'indent': '-1'
      //   }, {
      //     'indent': '+1'
      //   }], // outdent/indent
      //   [{
      //     'direction': 'rtl'
      //   }],
      //   ['image', 'code-block'], // text direction
      //
      //   [{
      //     'header': [1, 2, 3, 4, 5, 6, false]
      //   }],
      //
      //   [{
      //     'color': []
      //   }, {
      //     'background': []
      //   }], // dropdown with defaults from theme
      //   [{
      //     'align': []
      //   }],
      //
      //   // ['clean']                                         // remove formatting button
      // ];
      //
      // var Link = Quill.import('formats/link');
      //
      // class MyLink extends Link {
      // 	static create(value) {
      // 		let node = Link.create(value);
      // 		value = Link.sanitize(value);
      // 		node.setAttribute('href', value);
      // 		if (value.startsWith("https://quilljs.com")) {
      // 			node.removeAttribute('target');
      // 		} else {
      // 			node.setAttribute("target", "_blank");
      // 		}
      // 		return node;
      // 	}
      //
      // 	format(name, value) {
      // 		super.format(name, value);
      //
      // 		if (name !== this.statics.blotName || !value) {
      // 			return;
      // 		}
      //
      // 		if (value.startsWith("https://quilljs.com")) {
      // 			this.domNode.removeAttribute("target");
      // 		} else {
      // 			this.domNode.setAttribute("target", "_blank");
      // 		}
      // 	}
      // }
      //
      // Quill.register(MyLink);
      //
      // quill = new Quill('#editor', {
      //   modules: {
      //     toolbar: toolbarOptions
      //   },
      //   theme: 'snow'
      // });
      // quill.on('text-change', function(delta, oldDelta, source) {
      //   $('#desc').val(quill.root.innerHTML);
      // });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });

  //  });

    var typeBlogId = $('#typeBlog').val();
    typeBlogfn(typeBlogId);

    function typeBlogfn(id) {
      if (id == 0) {
        $('#image').show();
        $('#youtube').hide();
        $('#youtube_link').val('');
      }
      if (id == 1) {
        $('#image').hide();
        $('#imageUpload').val('');
        $('#youtube').show();
      }
    }

</script>

<!-- Validation JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
