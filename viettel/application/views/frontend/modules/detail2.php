<div class="content col-md-12 p">
	<h1><?=$bv[0]->tieude?></h1>
	<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[0]->ngaydang)?></i>
	<span class="glyphicon glyphicon-eye-open"><?=$bv[0]->solanxem?></span>
	<div><?=$bv[0]->noidung?></div>
</div>
<?php if(isset($tag)&&is_array($tag)): ?>
<div class="col-md-12 tags p">
	<span class="title">TAGS</span>
	<?php foreach($tag as $k=>$v): ?>
	<a href="<?=base_url().'tag/'.$v->alias?>"><span><?=$v->tieude?></span></a>
	<?php endforeach; ?>
</div>
<?php endif; ?>

