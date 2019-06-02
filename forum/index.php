<?php include "header.php";  ?>
<?php  include "connection.php";
		$q="select * from tbl_topics order by topic_id desc limit 2";
		$rs=mysqli_query($con,$q);
		?>
		
	<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		   <h3 class="tittle"><u>LATEST TOPICS <i class="glyphicon glyphicon-picture"></i></u></h3>
			<div class="banner">
                 <div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					       
						   <?php
						   while($row=mysqli_fetch_assoc($rs)) {?>
						     <li>		
							<div class="col-md-12 top-text">									  
						   <img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" /><br>
							<h3 class="top"> <a href="topic.php?id=<?php echo $row['topic_id']; ?>"> <?php echo $row['topic_title']; ?> </a> </h3>
							</div>
							
						   <?php  } ?>	
							</li>	
						</ul>
					</div>
					<!--banner-->
	  			<script src="assets/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
		 <div class="clearfix"> </div>		 
			 </div>
			 <br>
			   <!--//banner-->
			  <!--/top-news-->
			  		<u><h1> OTHER TOPICS </h1></u>
				  <?php 
$q="select * from tbl_topics where cat_id=2 order by topic_id desc limit 1";
$rs=mysqli_query($con,$q);
?>		
			  <div class="top-news">
				<div class="top-inner">
					<div class="col-md-6 top-text">
							<?php
						   while($row = mysqli_fetch_assoc($rs)) {?>
					  <img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" />
							<h3 class="top"> <a href="topic.php?id=<?php echo $row['topic_id']; ?>"> <?php echo $row['topic_title']; ?> </a> </h3>
								 							
						   <?php  } ?>	
						   </div>
					
				  <?php 
$q="select * from tbl_topics where cat_id=1 order by topic_id desc limit 1";
$rs=mysqli_query($con,$q);
?>		
					<div class="col-md-6 top-text two">
						     		<?php 	
									  while($row=mysqli_fetch_assoc($rs)) {?>
		
					  <img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" />
							<h3 class="top"> <a href="topic.php?id=<?php echo $row['topic_id']; ?>"> <?php echo $row['topic_title']; ?> </a> </h3>
									<?php  } ?>					
							</div>							
					 <div class="clearfix"> </div>
				 </div>
					 			 
 <?php 
$q="select * from tbl_topics where cat_id=3 order by topic_id limit 1";
$rs=mysqli_query($con,$q);
?>			 
				 <div class="top-inner second">
					<div class="col-md-6 top-text">
						 	<?php 	
									  while($row=mysqli_fetch_assoc($rs)) {?>
		
					  <img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" />
							<h3 class="top"> <a href="topic.php?id=<?php echo $row['topic_id']; ?>"> <?php echo $row['topic_title']; ?> </a> </h3>
									<?php  } ?>					
						
						 </div>
	<?php 
$q="select * from tbl_topics where cat_id=4 order by topic_id limit 1";
$rs=mysqli_query($con,$q);
?>			 					 
					<div class="col-md-6 top-text two">
							<?php 	
									  while($row=mysqli_fetch_assoc($rs)) {?>
		
					  <img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" />
							<h3 class="top"> <a href="topic.php?id=<?php echo $row['topic_id']; ?>"> <?php echo $row['topic_title']; ?> </a> </h3>
									<?php  } ?>					
							
						</div>
					 <div class="clearfix"> </div>
				 </div>
	            </div>
					<!--//top-news-->
		     </div>
			<!--//banner-section-->
			<?php include "newssection.php"; ?> 
<?php include "footer.php"; ?>