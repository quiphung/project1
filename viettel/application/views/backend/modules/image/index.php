<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Hình ảnh</h2>
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
        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 30%">Hỉnh ảnh</th>
              <th>Loại</th>
              <th>Thứ tự</th>
              <th style="width: 20%">Trạng thái</th>
              <th style="width: 20%"><button type="button" class="btn btn-success btn-xs" onclick="window.location='<?=base_url()?>admin/image/insert'">Thêm mới</button></th>
            </tr>
          </thead>
          <tbody>
          <?php if(isset($row)): foreach($row as $r):?>
            <tr>
              <td><?=$stt++?></td>
              <td><img src="<?=$r->urlHinh?>" height='80'></td>
              <td><?php if(0==$r->Loai) echo 'Slide';if(1==$r->Loai) echo 'Banner';if(2==$r->Loai) echo 'Logo';if(3==$r->Loai) echo 'Quảng cáo'; ?></td>
              <td><?=$r->ThuTu?></td>
              <td><?php  echo(1==$r->AnHien)?'<button type="button" class="btn btn-info btn-xs">Hiện</button>':'<button type="button" class="btn btn-warning btn-xs">Ẩn</button>'; ?></td>
              <td>
                <a href="<?=base_url()?>admin/image/update/<?=$r->idHinh?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <a href="<?=base_url()?>admin/image/delete/<?=$r->idHinh?>" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa hình này?')"><i class="fa fa-trash-o"></i> Delete </a>
              </td>
            </tr>
          <?php endforeach;endif; ?>
          </tbody>
        </table>
        <!-- end project list -->
      </div>
       <div class="clearfix"></div>
       <div class="phantrang">
         <?=$this->pagination->create_links()?>
       </div>
    </div>
  </div>
</div>