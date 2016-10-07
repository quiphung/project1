<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Danh mục</h2>
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
              <th style="width: 30%">Tên danh mục</th>
              <th>Loại</th>
              <th>Chuyên mục</th>
              <th>Thứ tự</th>
              <th style="width: 10%">Trạng thái</th>
              <th style="width: 20%"><button type="button" class="btn btn-success btn-xs" onclick="window.location='<?=base_url()?>admin/danhmuc/insert'">Thêm mới</button></th>
            </tr>
          </thead>
          <tbody>
          <?php if(is_array($loai)): foreach($loai as $r):?>
            <tr>
              <td><?=$stt++?></td>
              <td><?=$r[1]?></td>
              <td><?php $dm = json_decode($r[6]); if(count($dm)>0){foreach($dm as $k=>$v){echo $v.',';}}?></td>
              <td><?php $cm = json_decode($r[5]); if(count($cm)>0){foreach($chuyenmuc as $k=>$v){echo in_array($v->idcm,$cm)?$v->tieude.', ':'';}}?></td>
              <td><?=$r[3]?></td>
              <td><?php  echo(1==$r[2])?'<button type="button" class="btn btn-info btn-xs">Hiện</button>':'<button type="button" class="btn btn-warning btn-xs">Ẩn</button>'; ?></td>
              <td> 
              <?php if(16!=$r[0]&&17!=$r[0]): ?>
                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                <a href="<?=base_url()?>admin/danhmuc/update/<?=$r[0]?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
               
                <a href="<?=base_url()?>admin/danhmuc/delete/<?=$r[0]?>" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa chuyên mục này?')"><i class="fa fa-trash-o"></i> Delete </a>
              <?php endif; ?>
              </td>
            </tr>
          <?php endforeach;endif; ?>
          </tbody>
        </table>
        <!-- end project list -->
      </div>
       <div class="clearfix"></div>
    </div>
  </div>
</div>