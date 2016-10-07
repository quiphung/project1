<?php if(isset($tinhot)&&is_array($tinhot)): ?>
<div id="text-carousel" class="container carousel slide newhot" data-ride="carousel">
	<div class="col-md-1 col-xs-12 titlehot p">
		<h4>TIN HOT</h4>
	</div>
	<div class="carousel-inner col-md-9 col-xs-12">
		<?php for($i=0;$i<count($tinhot);$i++):
			$alias = $this->bv->getalias($tinhot[$i]->idbv);
		?>
        <div class="item <?php echo (0==$i)?'active':'' ?>">
            <div class="carousel-content">
                <div>
                    <a href='<?=base_url().$alias[0]->alias.'/'.$tinhot[$i]->alias.'-post.html'?>'><p><?=$tinhot[$i]->tieude?></p></a>
                </div>
            </div>
        </div>
    <?php endfor; ?>
    </div>
    <div class="controlslide">
        <a class="" href="#text-carousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="" href="#text-carousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
</div>
<?php endif; ?>