<?php include('logo.php') ?>
<?php include('menu.php') ?>
<?php if('tag'!=$this->router->fetch_method()&&'search'!=$this->router->fetch_method()){include('hotnews.php');} ?>
<?php if('tag'!=$this->router->fetch_method()&&'search'!=$this->router->fetch_method()){include('slider.php');} ?>