<div class="menubox">
	<div id="menu" class="container hidden-xs">
	<div class="menu">
	   		<span><a href="<?=base_url()?>"><i class="fa fa-home" aria-hidden="true"></i>TRANG CHỦ VIETTEL</a></span>
	</div>
	<?php foreach($rmenu as $r):
		if(in_array('menu',json_decode($r->loai,true))):
			$link = base_url().$r->alias.'.html';
	?>
	<?php if(0==$r->kieuhienthi): ?>
	   <div class="menu">
	   		<span><a href="<?=$link?>"><?=mb_strtoupper($r->tieude,'UTF-8')?></a></span>
	   </div>
	<?php endif; ?>
	<?php if(1==$r->kieuhienthi): ?>
	   <div class="menu list">
	   		<span><a href="<?=$link?>"><?=mb_strtoupper($r->tieude,'UTF-8')?></a></span>
	   		<?php $dmc = $this->vt->getdanhmuc($r->iddm); 
	   			if(is_array($dmc)): ?>
	   		<div class="lsub">
	   			<?php 
	   				foreach($dmc as $rc):
	   				$dmcc = $this->vt->getdanhmuc($rc->iddm); if(is_array($dmcc)){ ?>
		   		<div class="list">
			   		<a href="<?=base_url().$r->alias.'/'.$rc->alias.'.html'?>"><p><?=mb_strtoupper($rc->tieude,'UTF-8')?></p>
			   		<div class="lsub">
			   		<?php foreach($dmcc as $rcc): ?>
			   			<a href="<?=base_url().$rc->alias.'/'.$rcc->alias.'.html'?>"><p><?=mb_strtoupper($rcc->tieude,'UTF-8')?></p></a>
			   		<?php endforeach; ?>
			   		</div>
			   </div>
			   <?php } else{ ?>
	   			<a href="<?=base_url().$r->alias.'/'.$rc->alias.'.html'?>"><p><?=$rc->tieude?></p></a>
	   			<?php }endforeach; ?>
	   		</div>
	   		<?php endif; ?>
	   </div>
	<?php endif; ?>
	<?php if(2==$r->kieuhienthi): ?>
	   <div class="menu delist">
	   		<span><a href="<?=$link?>"><?=mb_strtoupper($r->tieude,'UTF-8')?></a></span>
	   		<div class="col-md-12 dlsub">
	   			<div class="content">
		   		<?php 
		   			$dmbv = $this->vt->danhmucbaiviet($r->iddm);
		   			foreach($dmbv as $kv): $link = base_url().$r->alias.'/'.$kv->alias.'-post.html'; 
		   		?>
		   			<div class="item col-md-2">
		   			<?php if($kv->urlhinh): ?>
		   				<a href="<?=$link?>"><img src="<?=$kv->urlhinh?>"></a>
		   			<?php endif; ?>
						<p><a href="<?=$link?>"><?=$kv->tieude?></a></p>
					</div>
				<?php endforeach; ?>
				</div>
				<div class="delistcontrol col-md-12">
					<input type="hidden" value="<?=$r->iddm?>" >
		            <a class="dmprev" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="dmnext" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
	   		</div>
	   </div>
	<?php endif; ?>
	<?php endif; endforeach; ?>
		<div class="menu">
		   		<span><a href="<?=base_url().'tin-tuc.html'?>">TIN TỨC</a></span>
		</div>
		<div class="menu">
		   		<span><a href="<?=base_url().'lien-he.html'?>">Liên hệ</a></span>
		</div>
	   <div class="search">
	   		<span class="glyphicon glyphicon-search"></span>
		</div>
		<div class="searchp">
			<form class="searchform searchmenu">
				<div class="input-group">
                  <input type="text" class="form-control inputsearch" placeholder="Tìm kiếm" name="keyword" value="<?php echo (isset($keyword))?$keyword:'' ?>"  >
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Tìm kiếm</button>
                  </span>
                </div>
			</form>
		</div>
		<div class="result">
			<div class="resultlink">
			</div>
			<div class="viewall">
				<a href="<?=base_url()?>tim-kiem.html"><i>Xem tất cả</i></a>
			</div>
		</div>
	</div>
	<nav id="navbar" class="navbar navbar-default navbar-static hidden-md hidden-lg"> 
		<div class="container-fluid"> 
			<div class="navbar-header"> 
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse"> 
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> <span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
				</button> 
				<a class="navbar-brand" href="#"></a> 
			</div> 
			<div class="navbar-collapse bs-example-js-navbar-collapse collapse" aria-expanded="true"> 
				<ul class="nav navbar-nav"> 
					<li><a href="<?=base_url()?>"><i class="fa fa-home" aria-hidden="true"></i>TRANG CHỦ VIETTEL</a></li>
				<?php foreach($rmenu as $r):
					if(in_array('menu',json_decode($r->loai,true))):
						$link = base_url().$r->alias;
				 		if(1==$r->kieuhienthi){ 
				 ?>
					<li class="dropdown"> 
						<a id="drop1" href="<?=$link?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?=mb_strtoupper($r->tieude,'UTF-8')?> <span class="caret"></span> </a>
					<?php $dmc = $this->vt->getdanhmuc($r->iddm); 
   						if(is_array($dmc)): 
   					?>
						<ul class="dropdown-menu" aria-labelledby="drop1"> 
					<?php foreach($dmc as $rc): ?>
							<li><a href="<?=base_url().$r->alias.'/'.$rc->alias?>"><?=mb_strtoupper($rc->tieude,'UTF-8')?></a>
							</li> 
					<?php endforeach; ?>
						</ul> 
					<?php endif; ?>
					</li> 
				<?php }else{ ?>
					<li><a href="<?=$link?>"><?=mb_strtoupper($r->tieude,'UTF-8')?></a></li>
				<?php } endif; endforeach; ?>
					<li><a href="<?=base_url().'tin-tuc.html'?>">TIN TỨC</a></li>			 
				</ul>  
			</div> 
		</div> 
	</nav>
</div>