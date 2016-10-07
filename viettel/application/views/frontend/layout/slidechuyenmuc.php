<div class="container shownews hidden-xs">
<?php if(isset($bv)&&is_array($bv)): 
$link = base_url().$alias.'/'.$bv[0]->alias.'-post.html';
?>
	<div class="col-md-6 shownewsone">
		<img src="<?=$bv[0]->urlhinh?>">
		<a href="<?=$link?>">
			<div class="sopopup col-md-12 p">
				<div class="popupparent">
					<p><?=$bv[0]->tieude?></p>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[0]->ngaydang)?></i>
				</div>
			</div>
		</a>
	</div>
<?php endif; ?>
	<div class="col-md-6 shownewstwo p">
	<?php if(isset($bv)&&is_array($bv)):
		for($i=1;$i<5;$i++):
	?>
		<div class="col-md-6 twoparent p">
		<?php if(isset($bv[$i])):
				$link = base_url().$alias.'/'.$bv[$i]->alias.'-post.html';
		 ?>
			<img src="<?=$bv[$i]->urlhinh?>">
			<a href="<?=$link?>">
				<div class="sopopup col-md-12 p">
					<div class="popupparent">
						<p><?=$bv[$i]->tieude?></p>
						<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[$i]->ngaydang)?></i>
					</div>
				</div>
			</a>
			<?php endif; ?>
		</div>
	<?php endfor;endif; ?>
	</div>
</div>
<div class="container hidden-md hidden-lg newsnew ">
<?php if(isset($bv)&&is_array($bv)):
?>
	<div class="newsone col-md-6">
		<h4><span>BÀI VIẾT MỚI</span></h4>
		<?php 
		for($i=0;$i<5;$i++):
		if(isset($bv[$i])):
				$link = base_url().$alias.'/'.$bv[$i]->alias.'-post.html';
		 ?>
			<div class="col-md-12 p item">
				<div class="col-md-4 p">
					<a href="<?=$link?>"><img src="<?=$bv[$i]->urlhinh?>"></a>
				</div>
				<div class="col-md-8 pp">
					<p><a href="<?=$link?>"><?=$bv[$i]->tieude?></a></p>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[$i]->ngaydang)?></i>
				</div>
			</div>
		<?php endif; endfor; ?>
	</div>
<?php endif; ?>
</div>