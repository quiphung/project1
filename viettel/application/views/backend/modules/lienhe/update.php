<div class="row">
<div class="col-md-12">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Liên hệ</a>
    </li>
     <li role="presentation" class=""><a href="<?=base_url()?>admin/lienhe"  aria-expanded="false">Trở lại</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Cập nhật</h2>
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
               <label class="control-label col-md-2 col-sm-2 col-xs-12">Tình trạng</label>
               <div class="col-md-10 col-sm-10 col-xs-12">
               <input type="hidden" name="update" value="1">
               <select name="tinhtrang" class="form-control">
                 <option value="0" <?php echo(0==$r->tinhtrang)?'selected':'' ?>>Chưa xử lý</option>
                 <option value="1" <?php echo(1==$r->tinhtrang)?'selected':'' ?>>Đã xử lý</option>
               </select>
               </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <textarea class="form-control"><?=$r->noidung?></textarea>
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
  </div>
</div>
</div>
</div>

