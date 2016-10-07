<div class="col-md-12 col-xs-12 danhmuc p">
	<h4><span><?=mb_strtoupper($tieude, 'UTF-8')?></span></h4>
<?php if(is_array($bv)): foreach($bv as $k=>$v): $link = base_url().$alias.'/'.$v->alias.'-post.html'; ?>
	<div class="item col-md-12 col-xs-12 p">
	<?php if($v->urlhinh): ?>
		<div class="img col-md-2 col-xs-12 p">
			<img src="<?=$v->urlhinh?>">
		</div>
	<?php endif; ?>
		<div class="<?php echo($v->urlhinh)?'col-md-10 col-xs-12':'col-md-12 col-xs-12' ?> info">
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
