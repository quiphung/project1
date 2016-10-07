<div class="content col-md-12 p">
	<h1><?=$bvdetail->tieude?></h1>
	<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bvdetail->ngaydang)?></i>
	<span class="glyphicon glyphicon-eye-open"><?=$bvdetail->solanxem?></span>
	<div><?=$bvdetail->noidung?></div>
</div>
<?php if(isset($bvlienquan)&&is_array($bvlienquan)): ?>
<div class="bvlienquan col-md-12 p">
<h4><span>BÀI VIẾT LIÊN QUAN</span></h4>
	<div class="col-md-12 p">
	<?php foreach($bvlienquan as $k=>$v):
		$alias = $this->bv->getalias($v->idbv);
		foreach($alias as $ali);
		$link = base_url().$ali->alias.'/'.$v->alias.'-post.html';
	?>
		<div class="item col-md-4">
		<?php if($v->urlhinh): ?>
				<a href="<?=$link?>" title="<?=$v->tieude?>"><img src="<?=$v->urlhinh?>"></a>
			<?php endif; ?>
			<p><a href="<?=$link?>" title="<?=$v->tieude?>"><?=cutnchar($v->tieude,60)?></a></p>
		</div>
	<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
<?php if(is_array($tag)): ?>
<div class="col-md-12 tags p">
	<span class="title">TAGS</span>
	<?php foreach($tag as $k=>$v): ?>
	<a href="<?=base_url().'tag/'.$v->alias?>"><span><?=$v->tieude?></span></a>
	<?php endforeach; ?>
</div>
<?php endif; ?>

