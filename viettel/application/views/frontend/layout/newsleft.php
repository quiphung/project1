<div class="col-md-8 col-xs-12 left">
	<div class="col-md-12 newsone p">
	<?php if(isset($cmnb[0])):
		$bv 	= 	$this->bv->getcmbv($cmnb[0]->idcm);
		if(is_array($bv)):
		$link 	=	base_url().$cmnb[0]->alias.'/'.$bv[0]->alias.'-post.html'; 
	?>
		<h4><span><?=$cmnb[0]->tieude?></span></h4>
		<div class="content col-xs-12 p">
		<div class="col-md-6 col-xs-12 item1">
			<a href="<?=$link?>"><img src="<?=$bv[0]->urlhinh?>"></a>
			<p><a href="<?=$link?>"><?=$bv[0]->tieude?></a></p>
			<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[0]->ngaydang)?></i>
			<div class="summary"><?=cutnchar($bv[0]->tomtat,200)?></div>
		</div>
		<div class="col-md-6 col-xs-12 item2">
		<?php for($i=1;$i<5;$i++): 
			if(isset($bv[$i])): $link = base_url().$cmnb[0]->alias.'/'.$bv[$i]->alias.'-post.html'
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
		<?php endif;endfor; ?>
		</div>
		</div>
		<div class="controlnewsone col-md-12">
			<input type="hidden" value="<?=$cmnb[0]->idcm?>">
			<a class="prevbv" ><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="nextbv" ><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	<?php endif;endif; ?>
	</div>
<?php for($i=1;$i<count($cmnb);$i++):
		if(isset($cmnb[$i])):
		$bv 	= 	$this->bv->getcmbv($cmnb[$i]->idcm);
		if(is_array($bv)):
		$link 	=	base_url().$cmnb[$i]->alias.'/'.$bv[0]->alias.'-post.html'; 
	?>
	<div class="newstwo col-md-6">
		<h4><span><?=$cmnb[$i]->tieude?></span></h4>
		<div class="item1 col-md-12 p">
			<a href="<?=$link?>"><img src="<?=$bv[0]->urlhinh?>"></a>
			<p><a href="<?=$link?>"><?=$bv[0]->tieude?></a></p>
			<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[0]->ngaydang)?></i>
			<div class="summary"><?=cutnchar($bv[0]->tomtat,200)?></div>
		<?php for($j=1;$j<5;$j++): 
				if(isset($bv[$j])): 
				$link 	=	base_url().$cmnb[$i]->alias.'/'.$bv[$j]->alias.'-post.html'; 
		?>
			<div class="col-md-12 p item">
				<div class="col-md-4 p">
					<a href="<?=$link?>"><img src="<?=$bv[$j]->urlhinh?>"></a>
				</div>
				<div class="col-md-8 pp">
					<p><a href="#"><?=$bv[$j]->tieude?></a></p>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[$j]->ngaydang)?></i>
				</div>
			</div>
		<?php endif; endfor; ?>
		</div>
	</div>
<?php endif;endif;endfor; ?>
</div>
