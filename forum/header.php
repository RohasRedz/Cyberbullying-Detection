<?php 
ob_start();

session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
<title>discussion forum</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="assets/application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='assets///fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
<!--Custom-Theme-files-->
	<link href="assets/css/style.css" rel='stylesheet' type='text/css' />	
	<script src="assets/js/jquery.min.js"> </script>
<!--/script-->
<script type="assets/text/javascript" src="js/move-top.js"></script>
<script type="assets/text/javascript" src="js/easing.js"></script>
<script type="assets/text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

</head>
<body>
	<!-- header-section-starts -->
      <div class="h-top" id="home">
		   <div class="top-header">
				  <ul class="cl-effect-16 top-nag">
						<li><a href="registration.php" data-hover="Registration">Registration</a></li>
					<li><a href="login.php" data-hover="Login">Login</a></li>
					</ul>
				<div class="clearfix"></div>
				</div>
       </div>
	<div class="full">
			<div class="col-md-3 top-nav">
				  <?php include "menu.php"; ?>
			</div>