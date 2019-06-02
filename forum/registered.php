<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include"connection.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>registered</title>
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
			<div class="col-md-3 top-nav grid-sec">
				     <div class="logo">
						<a href="index.php"><h1>Blogger</h1></a>
					</div>
					<div class="top-menu">
					 <span class="menu"> </span>

					<ul class="cl-effect-16">
						<li><a href="index.php" data-hover="HOME">Home</a></li> 
						<li><a class="active" href="category.php" data-hover="CATEGORIES">Categories</a></li>		
						<li><a class="active" href="topics.php" data-hover="ALL TOPICS">All Topics</a></li>											
						<li><a href="about.php" data-hover="About">About</a></li>
						<li><a href="contact.php" data-hover="CONTACT">Contact</a></li>
					</ul>
					<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".top-menu ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
					<ul class="side-icons">
							<li><a class="fb" href="#"></a></li>
							<li><a class="twitt" href="#"></a></li>
							<li><a class="goog" href="#"></a></li>
							<li><a class="drib" href="#"></a></li>
					   </ul>
			    </div>
			</div>
			<?php 
$q="select * from tbl_topics";
$rs=mysqli_query($con,$q);
?>
	<div class="col-md-9 main">
	  <!--grids-->
	   <div class="grid-section">
	    <h3 class="tittle">  <center style="color:#FF4848;"> REGISTRATION DONE <i class="glyphicon glyphicon-stop"></i> </center></h3>
        			<?php 
if(!empty($_GET['msg']))
{
	if($_GET['msg']=='done'){
		echo "<center>"."<h3>"."You have been registered"."</h3>"."</center>";
         }
}
?>
<center> <h4> <a href="login.php">SIGN IN</a> to continue...</h4> <br>
<h3> THANKS! </h3> </center>
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
			</div>
		 </div>	
	</div>
     <div class="clearfix"> </div>
<!--/footer-->
	    			<div class="clearfix"> </div>
				 </div>
	     </div>
		 <br>
		<div class="copy">
		    <p>&copy; 2017 Blogger. All Rights Reserved  </p>
		</div>
	 <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
		<!--//footer-->
			<!--start-smooth-scrolling-->
						<script type="assets/text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>