<div class="col-md-12 danhmuc p">
	<h4><span>KẾT QUẢ TÌM KIẾM</span></h4>
	<form class="searchform">
		<div class="input-group">
          <input type="text" class="form-control" placeholder="Tìm kiếm" name="keyword" value="<?php echo(isset($keyword))?$keyword:'';?>">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Tìm kiếm</button>
          </span>
        </div>
	</form>
<?php if(isset($bv)&&is_array($bv)): 
	foreach($bv as $k=>$v): 
	$alias 	=	$this->bv->getalias($v->idbv); 
	$link 	=	base_url().$alias[0]->alias.'/'.$v->alias.'-post.html'; 
?>
	<div class="item col-md-12 p">
	<?php if($v->urlhinh): ?>
		<div class="img col-md-2 col-xs-2 p">
			<img src="<?=$v->urlhinh?>">
		</div>
	<?php endif; ?>
		<div class="<?php echo($v->urlhinh)?'col-md-10 col-xs-10':'col-md-12 col-xs-12' ?> info">
			<h5><a href="<?=$link?>"><?=$v->tieude?></a></h5>
			<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$v->ngaydang)?></i>
			<div class="summary"><?=cutnchar($v->tomtat,200)?></div>
		</div>
	</div>
<?php endforeach;endif; ?>
<div class="phantrang">
	<?=$this->pagination->create_links()?>
</div>
</div>
