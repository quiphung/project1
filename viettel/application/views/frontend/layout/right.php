<div class="col-md-4 col-xs-12 right">
	<?php include('quangcao.php') ?>
	<?php /*
	<div class="rrone">
		<h4><span>DỊCH VỤ DOANH NGHIỆP</span></h4>
		<p><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i>Dịch vụ Internet Viettel</a></p>
		<p><a href="#"><i class="fa fa-building" aria-hidden="true"></i>Dịch vụ doanh nghiệp</a></p>
		<p><a href="#"><i class="fa fa-rss" aria-hidden="true"></i>Dịch vụ Internet Viettel</a></p>
	</div>
	*/?>
	<?php foreach($dmright as $k=>$v): if($v->kieuhienthi==1){ 
		$dmc = $this->bv->getdanhmuccon($v->iddm);
		if(is_array($dmc)):
	?>
		<div class="rrtwo col-md-12 col-xs-12 p">
			<h4><span><?=$v->tieude?></span></h4>
			<?php foreach($dmc as $kk=>$vv): ?>
				<p><a href="<?=base_url().$vv->alias?>"><?=$vv->tieude?></a></p>
			<?php endforeach; ?>
		</div>
	<?php endif;} else{ if($v->kieuhienthi==2): ?>
		<div class="rrtwo col-md-12 col-xs-12 p">
			<h4><span><?=$v->tieude?></span></h4>
			<?php $bv = $this->vt->getbaiviet($v->iddm,12,0); 
				if(is_array($bv)): foreach($bv as $kk=>$vv):
					$alias = $this->bv->getalias($vv->idbv);
					foreach($alias as $ali);
			?>
			<p><a href="<?=base_url().$ali->alias.'/'.$vv->alias.'-post.html'?>"><?=$vv->tieude?></a></p>
			<?php endforeach;endif; ?>
		</div>
	<?php endif; } endforeach; ?>
	<div class="rrthree col-md-12 col-xs-12 p">
		<h4><span>NỘI DUNG HÀNG ĐẦU</span></h4>
		<?php foreach($bvnew as $k=>$v):
		$alias = $this->bv->getalias($v->idbv);
		$link = base_url().$alias[0]->alias.'/'.$v->alias.'-post.html'; ?>
		<div class="item col-md-12 col-xs-12 p">
			<?php if($v->urlhinh): ?>
			<div class="img col-md-4 col-xs-4 p">
				<a href="<?=$link?>"><img src="<?=$v->urlhinh?>"></a>
			</div>
		<?php endif; ?>
			<div class="<?php echo ($v->urlhinh)?'col-md-8 col-xs-8':'col-md-12 col-xs-12' ?> info">
				<h5><a href="<?=$link?>"><?=$v->tieude?></a></h5>
				<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$v->ngaydang)?></i>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
	<div class="col-md-12 col-xs-12 rrfour p">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#goicuoc" aria-controls="goicuoc" role="tab" data-toggle="tab">Gói cước</a></li>
		    <li role="presentation"><a href="#chuyenmuc" aria-controls="chuyenmuc" role="tab" data-toggle="tab">Chuyên mục</a></li>
		    <li role="presentation"><a href="#tag" aria-controls="tag" role="tab" data-toggle="tab">Thẻ</a></li>
		  </ul>
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane fade in active" id="goicuoc">
		    	<?php if(isset($bvgoicuoc)&&is_array($bvgoicuoc)): foreach($bvgoicuoc as $k=>$v): ?>
		    		<p><a href="<?=base_url().$v->cmalias.'/'.$v->alias.'-post.html'?>"><i class="fa fa-link" aria-hidden="true"></i><?=$v->tieude?></a></p>
		    	<?php endforeach;endif; ?>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="chuyenmuc">
		    	<?php if(isset($chuyenmuc)&&is_array($chuyenmuc)): foreach($chuyenmuc as $k=>$v): ?>
		    		<a href="<?=base_url().'chuyen-muc/'.$v->alias.'.html'?>" style="font-size:<?=frand(8, 22, 4)?>pt"><?=$v->tieude?></a>
		    	<?php endforeach;endif; ?>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="tag">
		    	<?php if(isset($tags)&&is_array($tags)): foreach($tags as $k=>$v): ?>
		    		<a href="<?=base_url().'tag/'.$v->alias.'.html'?>" style="font-size:<?=$v->fontsize?>pt"><?=$v->tieude?></a>
		    	<?php endforeach;endif; ?>
		    </div>
		  </div>
	</div>
</div>