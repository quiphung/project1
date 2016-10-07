<div class="container">
	<div class="row p">
		<div class="col-md-4 col-xs-12 frone">
		<h4>BÀI VIẾT TIÊU BIỂU</h4>
		<?php for($i=0;$i<3;$i++): if(isset($tinhot[$i])):
			$alias = $this->bv->getalias($tinhot[$i]->idbv); foreach($alias as $ali);
			$link = base_url().$ali->alias.'/'.$tinhot[$i]->alias.'-post.html';
		?>
			<div class="item col-md-12 col-xs-12 p">
			<?php if($tinhot[$i]->urlhinh): ?>
				<div class="img col-md-4 col-xs-4 p">
					<a href="<?=$link?>"><img src="<?=$tinhot[$i]->urlhinh?>"></a>
				</div>
			<?php endif; ?>
				<div class="<?php echo($tinhot[$i]->urlhinh)?'col-md-8 col-xs-8':'col-md-12 col-xs-12' ?> info">
				<?php  ?>
					<h5><a href="<?=$link?>"><?=$tinhot[$i]->tieude ?></a></h5>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$tinhot[$i]->ngaydang)?></i>
				</div>
			</div>
		<?php endif;endfor; ?>
		</div>
		<div class="col-md-4 col-xs-12 frtwo">
			<h4>BÀI VIẾT PHỔ BIẾN</h4>
		<?php foreach($bvxemnhieu as $k=>$v): 
				$alias = $this->bv->getalias($v->idbv); foreach($alias as $ali);
				$link  = base_url().$ali->alias.'/'.$v->alias.'-post.html';
		?>
			<div class="item col-md-12 col-xs-12 p">
			<?php if($v->urlhinh): ?>
				<div class="img col-md-4 col-xs-4 p">
					<a href="<?=$link?>"><img src="<?=$v->urlhinh?>"></a>
				</div>
			<?php endif; ?>
				<div class="<?php echo($v->urlhinh)?'col-md-8 col-xs-8':'col-md-12 col-xs-12' ?> info">
					<h5><a href="<?=$link?>"><?=$v->tieude?></a></h5>
					<span class="glyphicon glyphicon-calendar"></span><i><?=date('d/m/Y',$v->ngaydang)?></i>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="col-md-4 col-xs-12 frthree">
			<h4>MỤC XEM NHIỀU</h4>
			<?php foreach($mucxemnhieu as $k=>$v): ?>
			<p><a href="<?=base_url().$v->alias.'.html'?>"><?=$v->tieude?></a><span><?=$v->solanxem?></span></p>
		<?php endforeach; ?>
		</div>
	</div>
	
	<?php /* <div class="row p">
		<div class="col-md-4 col-xs-12 frfour">
			<h4>Lắp đặt mạng Viettel Hà Nội</h4>
			<p><a href="#">Lắp Mạng Viettel tại huyện Thanh Trì</a></p>
			<p><a href="#">Lắp mạng Viettel quận Long Biên</a></p>
			<p><a href="#">Lắp mạng Viettel quận Hai Bà Trưng</a></p>
			<p><a href="#">Lắp mạng Viettel tại quận Thanh Xuân</a></p>
			<p><a href="#">Lắp mạng Viettel quận Nam Từ Liêm</a></p>
			<p><a href="#">Lắp mạng Viettel tại quân Bắc Từ Liêm</a></p>
		</div>
		<div class="col-md-4 col-xs-12 frfive">
			<h4>LIÊN KẾT NỘI</h4>
			<p><a href="#">Lắp mạng viettel</a></p>
			<p><a href="#">Internet Viettel</a></p>
			<p><a href="#">Cáp quang Viettel</a></p>
		</div>
	</div> */ ?>
	
	<div class="container">
		<div class="logofooter">
			<img src="<?=$logo?>" >
		</div>
		<div class="infofooter">
			<h4>VỀ CHÚNG TÔI</h4>
			<ul>
				<li>TỔNG CÔNG TY VIỄN THÔNG VIETTEL</li>
				<li>Địa chỉ: Số 1 Giang Văn Minh – Ba Đình – Hà Nội</li>
				<li>Địa chỉ: Số 1 Giang Văn Minh – Ba Đình – Hà Nội</li>
				<li>Địa chỉ: Số 1 Giang Văn Minh – Ba Đình – Hà Nội</li>
			</ul>
		</div>
	</div>
</div>