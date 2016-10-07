<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Bài viết</h2>
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
      <div class="form-group col-md-6">
       <select class="danhmuc form-control">
          <option value="0">--Chọn danh mục--</option>
          <?php if(isset($danhmuc2)): foreach ($danhmuc2 as $k => $v):?>
          <option value="<?=$k?>" <?php if(isset($loai)&&$loai=='dm'){echo ($id==$k)?'selected':'';} ?>><?=$v?></option>
          <?php endforeach;endif; ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <select class="chuyenmuc form-control">
          <option value="0">--Chọn chuyên mục--</option>
           <?php if(count($chuyenmuc)>0):foreach($chuyenmuc as $k=>$v): ?>
           <option value="<?=$v->idcm?>" <?php if(isset($loai)&&$loai=='cm'){echo ($id==$v->idcm)?'selected':'';} ?>><?=$v->tieude?></option>
          <?php endforeach;endif; ?>
        </select>
      </div>
      <div class="x_content">
        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 30%">Tiêu đề</th>
              <th>Danh mục</th>
              <th>Chuyên mục</th>
              <th>Lượt xem</th>
              <th style="width: 20%">Trạng thái</th>
              <th style="width: 20%"><button type="button" class="btn btn-success btn-xs" onclick="window.location='<?=base_url()?>admin/baiviet/insert'">Thêm mới</button></th>
            </tr>
          </thead>
          <tbody>
          <?php if(isset($row)): foreach($row as $r):?>
            <tr>
              <td><?=$stt++?></td>
              <td><?=$r->tieude?></td>
              <td><?php if(isset($danhmuc)){foreach($danhmuc as $dm){
                    if($dm->iddm==$r->iddm){
                      echo $dm->tieude;
                    }
                  }}?>    
              </td>
              <td><?php if(isset($chuyenmuc)){foreach($chuyenmuc as $cm){
                    if($cm->idcm==$r->idcm){
                      echo $cm->tieude;
                    }
                  }} ?>    
              </td>
              <td><?=$r->solanxem?></td>
              <td><?php  echo(1==$r->anhien)?'<button type="button" class="btn btn-info btn-xs">Hiện</button>':'<button type="button" class="btn btn-warning btn-xs">Ẩn</button>'; 
              echo(1==$r->noibat)?'<button type="button" class="btn btn-danger btn-xs">Nổi bật</button>':'';
              ?></td>
              <td>
                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                <a href="<?=base_url()?>admin/baiviet/update/<?=$r->idbv?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <a href="<?=base_url()?>admin/baiviet/delete/<?=$r->idbv?>" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')"><i class="fa fa-trash-o"></i> Delete </a>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('.danhmuc').change(function(){
      id = $(this).val();
      if(id==0){
        url = '<?=base_url()?>admin/baiviet';
      }else{
        url = '<?=base_url()?>admin/baiviet/index/danhmuc/'+id;
      }
     $(location).attr('href', url);
    })
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.chuyenmuc').change(function(){
      id = $(this).val();
      if(id==0){
        url = '<?=base_url()?>admin/baiviet';
      }else{
        url = '<?=base_url()?>admin/baiviet/index/chuyenmuc/'+id;
      }
     $(location).attr('href', url);
    })
  })
</script>