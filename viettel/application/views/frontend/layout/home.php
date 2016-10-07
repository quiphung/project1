<!doctype html>
<html>
<head>
<?php include('head.php') ?>
</head>
<body>
	<header>
		<?php include('header.php'); ?>
	</header>
	<div id="container" class="container">
		<div id="left" class="col-md-8">
			<?php if(isset($view)&&$view!='')$this->load->view($view); ?>
		</div>
		<?php include('right.php'); ?>
	</div>
	<footer>
		<?php include('footer.php'); ?>
	</footer>
	<div id="totop">
		<button class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span></button>
	</div>
</body>
</html>
<script>
$(document).ready(function(){
    $('.search').click(function(){
    	$('.searchp').toggle(150);
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){ 
   $(window).scroll(function(){ 
       if ($(this).scrollTop() > 200) { 
           $('#totop').fadeIn(); 
       } else { 
           $('#totop').fadeOut(); 
       } 
   }); 
   $('#totop').click(function(){ 
       $("html, body").animate({ scrollTop: 0 }, 200); 
       return false; 
   }); 
});
</script>