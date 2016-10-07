<div class="row">
<div class="col-md-12">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Thêm danh mục</a>
    </li>
     <li role="presentation" class=""><a href="<?=base_url()?>admin/danhmuc/index"  aria-expanded="false">Quản lý danh mục</a>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm chuyên mục <small style="color:red"><?php echo(isset($thongbao))?$thongbao:''?></small></h2>
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
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Kiểu hiển thị<span>*</span></label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="form-control" id="kieu" name="kieu">
                  <option value="0" <?php echo (set_value('kieu')==0)?'selected':''; ?> >Không hiển thị danh mục con</option>
                  <option value="1" <?php echo (set_value('kieu')==1)?'selected':''; ?>>Hiển thị danh sách danh mục con</option>
                  <option value="2" <?php echo (set_value('kieu')==2)?'selected':''; ?>>Hiển thị danh sách bài viết</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Loại<span>*</span></label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="selectpicker" name="loai[]" multiple>
                  <option value="menu">Menu</option>
                  <option value="right">Right</option>
                 <?php /* <option value="footer">Footer</option> */ ?>
                </select>
              </div>
            </div>
            <div class="form-group"  id="danhmuc">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Danh mục cha</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="form-control" name="danhmuc">
                <option value="0">--Chọn danh mục cha--</option>
                  <?php if(isset($danhmuc)):foreach ($danhmuc as $k => $v):?>
                  <option value="<?=$k?>" <?php echo (set_value('danhmuc')==$k)?'selected':'' ?>><?=$v?></option>
                  <?php endforeach;endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Chuyên mục</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="selectpicker" name="chuyenmuc[]" multiple>
                  <?php foreach ($chuyenmuc as $k => $v):?>
                  <option value="<?=$k?>"><?=$v?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ tự</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="number" name="thutu" min=0 class="form-control" placeholder=""  value="<?=set_value('thutu')?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Mô tả</label>
              <div class="col-md-10"><textarea id="mota" name="mota"><?=set_value('mota')?></textarea></div>
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
<script src="<?=base_url()?>lib/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('mota',{
  height:250,
  });
</script>
<style type="text/css">
  #danhmuc{
    display: none;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    if($('#kieu').val()==1){
      $('#danhmuc').show(100);
    }
    else{
      $('#danhmuc').hide(100);
    }
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#kieu').change(function(){
     if($(this).val()==1){
      $('#danhmuc').show(100);
     }
     else{
      $('#danhmuc').hide(100);
     }
    });
  })
</script>
