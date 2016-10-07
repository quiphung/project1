<div class="chuyenmucbox container">
	<div class="chuyenmucleft">
	<?php if(isset($chuyenmuc)&&is_array($chuyenmuc)):
			for($i=0;$i<6;$i++):
				if(isset($chuyenmuc[$i])):
				$link = base_url().'chuyen-muc/'.$chuyenmuc[$i]->alias.'.html';
	?>
		<span <?php echo ($alias==$chuyenmuc[$i]->alias)?'class="active"':'' ?>><a href="<?=$link?>"><?=$chuyenmuc[$i]->tieude?></a></span>
	<?php endif; endfor; ?>
	<?php if(count($chuyenmuc)>=6): ?>
		<div class="chuyenmucparent"><span class="glyphicon glyphicon-chevron-down"></span>
			<div class="chuyenmucsub">
			<?php for($i=6;$i<count($chuyenmuc);$i++):
					if(isset($chuyenmuc[$i])):
						$link = base_url().'chuyen-muc/'.$chuyenmuc[$i]->alias.'.html';
			?>
				<a <?php echo ($alias==$chuyenmuc[$i]->alias)?'class="active"':'' ?> href="<?=$link?>"><p><?=$chuyenmuc[$i]->tieude?></p></a>
			<?php endif;endfor; ?>
			</div>
		</div>
	<?php endif;endif; ?>
	</div>
	<?php /*
	<div class="chuyenmucright">
		<span>Mới nhất <span class="glyphicon glyphicon-chevron-down"></span></span>
		<div class="chuyenmucsub">
			<a href="#"><p>Kinh doanh</p></a>
			<a href="#"><p>Kinh doanh</p></a>
			<a href="#"><p>Kinh doanh</p></a>
			<a href="#"><p>Kinh doanh</p></a>
			<a href="#"><p>Kinh doanh</p></a>
		</div>
	</div> */ ?>
</div>