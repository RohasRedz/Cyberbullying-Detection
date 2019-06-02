<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php  include "connection.php";
$nid=$_GET['id'];
 ?>
 <?php include "header.php"; ?>
			</div>
			<?php 
			$q="select * from tbl_news where news_id=".$nid;
			$rs=mysqli_query($con ,$q);
			?>
		<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		   <h3 class="tittle">News Page <i class="glyphicon glyphicon-file"></i></h3>
			<div class="single">
							<?php
						   while($row=mysqli_fetch_assoc($rs)) {?>
							<img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />
				 <div class="b-bottom"> 
			      <h5 class="top"><a href="#">	<?php echo $row['news_title']; ?> </a></h5>
				   <p class="sub"><?php echo $row['news_description']; ?></p>
			      <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo $row['news_addedon']; ?> </div>
					</div>
				 <?php 	 } 
					  ?>
			 </div>
				<div class="clearfix"></div>
			</div>
			<!--//banner-->
			<!--//banner-section-->
			<?php include "newssection.php"; ?>
			</div>
			<div class="clearfix"> </div>
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