<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Chuyên mục</h2>
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
              <th style="width: 20%">Tiêu đề</th>
              <th>Email</th>
              <th>Điện thoại</th>
              <th>Nội dung</th>
              <th style="width: 20%">Tình trạng</th>
              <th style="width: 20%"></th>
            </tr>
          </thead>
          <tbody>
          <?php if(isset($row)): foreach($row as $r):?>
            <tr>
              <td><?=$stt++?></td>
              <td><?=$r->tieude?></td>
              <td><?=$r->email?></td>
              <td><?=$r->dienthoai?></td>
              <td><?=cutnchar($r->noidung,50)?></td>
              <td><?php  echo(0==$r->tinhtrang)?'<button type="button" class="btn btn-warning btn-xs">Chưa xử lý</button>':'<button type="button" class="btn btn-info btn-xs">Đã xử lý</button>';
              ?></td>
              <td>
                <a href="<?=base_url()?>admin/lienhe/update/<?=$r->idlh?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <a href="<?=base_url()?>admin/lienhe/delete/<?=$r->idlh?>" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn liên hệ này?')"><i class="fa fa-trash-o"></i> Delete </a>
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