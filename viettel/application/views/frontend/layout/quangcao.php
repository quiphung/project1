<div class="rimage col-md-12 col-xs-12 p">
<?php foreach($image as $k=>$v):if($v->loai==3):?>
	<div>
		<img src="<?=$v->urlhinh?>" >
	</div>
<?php endif;endforeach; ?>
</div>