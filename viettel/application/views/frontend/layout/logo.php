<div class="container logo">
	<div class="col-md-4">
	<?php foreach($image as $k=>$v){if($v->loai==2)$logo=$v->urlhinh;if($v->loai==1)$banner=$v->urlhinh;} ?>
		<a href="<?=base_url()?>"><img src="<?=$logo?>" ></a>
	</div>
	<div class="col-md-8">
		<a href="<?=base_url()?>"><img src="<?=$banner?>" ></a>
	</div>
</div>