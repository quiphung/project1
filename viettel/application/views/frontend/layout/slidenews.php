<div class="container hidden-xs shownews">
<?php if(isset($bvnew)&&is_array($bvnew)): 
$alias = $this->bv->getalias($bvnew[0]->idbv);
$link = base_url().$alias[0]->alias.'/'.$bvnew[0]->alias.'-post.html';
?>
	<div class="col-md-6 col-xs-12 shownewsone">
		<img src="<?=$bvnew[0]->urlhinh?>">
		<a href="<?=$link?>">
			<div class="sopopup col-md-12 p">
				<div class="popupparent">
					<p><?=$bvnew[0]->tieude?></p>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bvnew[0]->ngaydang)?></i>
				</div>
			</div>
		</a>
	</div>
<?php endif; ?>
	<div class="col-md-6 col-xs-12 shownewstwo p">
	<?php if(isset($bvnew)&&is_array($bvnew)):
		for($i=1;$i<5;$i++):
	?>
		<div class="col-md-6 col-xs-12 twoparent p">
		<?php if(isset($bvnew[$i])):
				$alias = $this->bv->getalias($bvnew[$i]->idbv);
				$link = base_url().$alias[0]->alias.'/'.$bvnew[$i]->alias.'-post.html';
		 ?>
			<img src="<?=$bvnew[$i]->urlhinh?>">
			<a href="<?=$link?>">
				<div class="sopopup col-md-12 p">
					<div class="popupparent">
						<p><?=$bvnew[$i]->tieude?></p>
						<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bvnew[$i]->ngaydang)?></i>
					</div>
				</div>
			</a>
			<?php endif; ?>
		</div>
	<?php endfor;endif; ?>
	</div>
</div>
<div class="container hidden-md hidden-lg newsnew ">
<?php if(isset($bvnew)&&is_array($bvnew)):
?>
	<div class="newsone col-md-6">
		<h4><span>BÀI VIẾT MỚI</span></h4>
		<?php 
		for($i=0;$i<5;$i++):
		if(isset($bvnew[$i])):
				$alias = $this->bv->getalias($bvnew[$i]->idbv);
				$link = base_url().$alias[0]->alias.'/'.$bvnew[$i]->alias.'-post.html';
		 ?>
			<div class="col-md-12 p item">
				<div class="col-md-4 p">
					<a href="<?=$link?>"><img src="<?=$bvnew[$i]->urlhinh?>"></a>
				</div>
				<div class="col-md-8 pp">
					<p><a href="<?=$link?>"><?=$bvnew[$i]->tieude?></a></p>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bvnew[$i]->ngaydang)?></i>
				</div>
			</div>
		<?php endif; endfor; ?>
	</div>
<?php endif; ?>
</div>