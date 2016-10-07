<div class="row">
<div class="col-md-12">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Thêm bài viết</a>
    </li>
     <li role="presentation" class=""><a href="<?=base_url()?>admin/baiviet/index"  aria-expanded="false">Quản lý bài viết</a>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm tài liệu <small style="color:red"><?php echo(isset($thongbao))?$thongbao:''?></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề<span>*</span></label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" name="tieude" class="form-control" placeholder="" required=""  value="<?=set_value('tieude')?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Danh mục</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="form-control" name="danhmuc">
                  <option value="0">--Chọn danh mục--</option>
                  <?php if(isset($danhmuc)): foreach ($danhmuc as $k => $v):?>
                  <option <?php echo (set_value('danhmuc')==$k)?'selected':''; ?> value="<?=$k?>"><?=$v?></option>
                  <?php endforeach;endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Chuyên mục</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="form-control" name="chuyenmuc">
                  <option value="0">--Chọn chuyên mục--</option>
                  <?php foreach ($chuyenmuc as $k => $v):?>
                  <option <?php echo (set_value('chuyenmuc')==$k)?'selected':''; ?> value="<?=$k?>"><?=$v?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Ảnh đại diện<span></span></label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input id="hinh" name="avatar" type="text" size="60" value="<?=set_value('avatar')?>" />
                <input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'hinh' );" />
                <p><small>File types hợp lệ: png, jpg, gif.</small></p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Tóm Tắt</label>
              <div class="col-md-10"><textarea id="tomtat" name="tomtat"><?=set_value('tomtat')?></textarea></div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung</label>
              <div class="col-md-10"><textarea id="noidung" name="noidung"><?=set_value('noidung')?></textarea></div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Tags</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" data-role="tagsinput" name="tag" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Trạng thái</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="">
                  <label>
                    <input type="checkbox" class="js-switch" checked name="anhien" /> Ẩn hiện
                  </label>
                  <label>
                    <input type="checkbox" class="js-switch" name="noibat" /> Nổi bật
                  </label>
                </div>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <button type="reset" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success" name="gohome">Create</button>
                <button type="submit" class="btn btn-success" name="goedit">Create and Edit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript" src="<?=base_url()?>lib/ckfinder/ckfinder.js"></script>
<script type="text/javascript">

function BrowseServer( startupPath, functionData )
{
  // You can use the "CKFinder" class to render CKFinder in a page:
  var finder = new CKFinder();

  // The path for the installation of CKFinder (default = "/ckfinder/").
  finder.basePath = '../';

  //Startup path in a form: "Type:/path/to/directory/"
  finder.startupPath = startupPath;

  // Name of a function which is called when a file is selected in CKFinder.
  finder.selectActionFunction = SetFileField;

  // Additional data to be passed to the selectActionFunction in a second argument.
  // We'll use this feature to pass the Id of a field that will be updated.
  finder.selectActionData = functionData;

  // Name of a function which is called when a thumbnail is selected in CKFinder.
  finder.selectThumbnailActionFunction = ShowThumbnails;

  // Launch CKFinder
  finder.popup();
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl, data )
{
  document.getElementById( data["selectActionData"] ).value = fileUrl;
}

// This is a sample function which is called when a thumbnail is selected in CKFinder.
function ShowThumbnails( fileUrl, data )
{
  // this = CKFinderAPI
  var sFileName = this.getSelectedFile().name;
  document.getElementById( 'thumbnails' ).innerHTML +=
      '<div class="thumb">' +
        '<img src="' + fileUrl + '" />' +
        '<div class="caption">' +
          '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
        '</div>' +
      '</div>';

  document.getElementById( 'preview' ).style.display = "";
  // It is not required to return any value.
  // When false is returned, CKFinder will not close automatically.
  return false;
}
  </script>

<script src="<?=base_url()?>lib/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('tomtat',{
  height:250,
  });
</script>
<script>
  CKEDITOR.replace('noidung',{
  height:250,
  });
</script>
