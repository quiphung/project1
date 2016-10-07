<div class="container slider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	<?php for($i=0;$i<count($slide);$i++): ?>
	    <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?php echo(0==$i)?'active':''?>"></li>
	<?php endfor; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	<?php for($i=0;$i<count($slide);$i++): ?>
	    <div class="item <?php echo (0==$i)?'active':''?>">
	      <img src="<?=$slide[$i]->urlhinh?>" alt="">
	    </div>
	<?php endfor; ?>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</div>