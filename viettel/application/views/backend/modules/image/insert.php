<div class="row">
<div class="col-md-12">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Thêm hình ảnh</a>
    </li>
     <li role="presentation" class=""><a href="<?=base_url()?>admin/image"  aria-expanded="false">Quản lý hình ảnh</a>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm hình ảnh <small style="color:red"><?php echo(isset($thongbao))?$thongbao:''?></small></h2>
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
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Hình ảnh<span></span></label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input id="hinh" name="hinh" type="text" size="60" value="<?=set_value('hinh')?>" />
                <input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'hinh' );" />
                <p><small>File types hợp lệ: png, jpg, gif.</small></p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Loại</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="form-control" name="loai" id="loai">
                  <option value="0">Slide</option>
                  <option value="1">Banner</option>
                  <option value="2">Logo</option>
                  <option value="3">Quảng cáo</option>
                </select>
              </div>
            </div>
            <div class="form-group" id="thutu">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ tự</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="number" name="thutu" class="form-control" min=0 placeholder=""  value="<?=set_value('thutu')?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Trạng thái</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="">
                  <label>
                    <input type="checkbox" class="js-switch" checked name="anhien" /> Ẩn hiện
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#loai').change(function(){
     if($(this).val()==0||$(this).val()==3){
      $('#thutu').show(100);
     }
     else{
      $('#thutu').hide(100);
     }
    });
  })
</script>