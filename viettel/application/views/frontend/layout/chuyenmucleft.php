<div class="col-md-8 p cateleft">
<?php 
if(isset($bv)&&is_array($bv)):
for($i=5;$i<count($bv);$i++):
if(isset($bv[$i])):
	$link = base_url().$alias.'/'.$bv[$i]->alias.'-post.html';
?>
	<div class="item col-md-6">
		<a href="<?=$link?>"><img src="<?=$bv[$i]->urlhinh?>"></a>
		<h4><a href="<?=$link?>"><?=$bv[$i]->tieude?></a></h4>
		<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$bv[$i]->ngaydang)?></i>
		<div class="summary"><?=cutnchar($bv[$i]->tomtat,200)?></div>
	</div>
<?php endif;endfor;endif; ?>
<div class="phantrang">
	<?=$this->pagination->create_links()?>
</div>
</div>
