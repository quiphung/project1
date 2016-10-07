<div class="row">
<div class="col-md-12">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cập nhật chuyên mục</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">SEO</a> </li>
   
     <li role="presentation" class=""><a href="<?=base_url()?>admin/chuyenmuc/index"  aria-expanded="false">Quản lý chuyên mục</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Cập nhật chuyên mục <small style="color:red"><?php echo(isset($thongbao))?$thongbao:''?></small></h2>
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
                <input type="text" name="tieude" class="form-control" placeholder="" required=""  value="<?php echo isset($loai->TieuDe)? $loai->TieuDe:set_value('tieude')?>">
              </div>
            </div>
            <?php /*
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Chuyên mục</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <select class="form-control" name="loai">
                <option value="0">--Chọn chuyên mục--</option>
                  <?php foreach ($rloai as $k => $v):?>
                  <option <?php echo($loai->idCha == $k)?'selected':'' ?> value="<?=$k?>"><?=$v?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div> */ ?>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ tự</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="number" name="thutu" class="form-control" placeholder=""  value="<?php echo isset($loai->ThuTu)? $loai->ThuTu:set_value('thutu')?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Trạng thái</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="">
                  <label>
                    <input type="checkbox" class="js-switch" name="anhien" <?php echo isset($loai->AnHien)&&($loai->AnHien==1)? 'checked':'' ?> /> Ẩn hiện
                  </label>
                  <label>
                    <input type="checkbox" class="js-switch" name="noibat" <?php echo isset($loai->NoiBat)&&($loai->NoiBat==1)? 'checked':'' ?> /> Nổi bật
                  </label>
                </div>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <button type="reset" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success" name="gohome">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
      <!-- start user projects -->
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>CẤU HÌNH SEO<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left" method="post">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Title</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" name="title" class="form-control" placeholder="" required="" value="<?php echo isset($loai->Title)?$loai->Title:set_value('title') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Url</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" name="url" class="form-control" placeholder="" required="" value="<?php echo isset($loai->Alias)?$loai->Alias:set_value('url') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Description</label>
              <div class="col-md-10"><textarea id="mota" name="mota"><?php echo isset($loai->Description)?$loai->Description:set_value('mota')?></textarea></div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="reset" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
      <!-- end user projects -->
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
