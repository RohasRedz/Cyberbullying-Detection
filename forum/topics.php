<?php include "header.php";
include "connection.php"; ?>
			</div>
			<?php 
		$q="select * from tbl_topics";
		$rs=mysqli_query($con,$q);
		?>
		
	<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		  <u> <h1 class="tittle">ALL TOPICS <i class="glyphicon glyphicon-picture"></i></h1> </u>
			<div class="banner">

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
			  		
			  <div class="top-news">
				<div class="top-inner">
<?php $k=0;	while($row=mysqli_fetch_assoc($rs))
				{  $k++; ?> 
<div class="col-md-6">			
			<img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" /><br>
<b><a href="topic.php?id=<?php echo $row['topic_id']; ?>"> <?php 	echo $row['topic_title']; ?> </a> </b><br><br>
				</div>
				<?php
				if($k%2 == 0){ ?><br>
					 <div class="clearfix"> </div>
				<?php }
					}
					?>
				
					 <div class="clearfix"> </div>
				 </div>
					 	
	            </div>
					<!--//top-news-->
		     </div>
			<!--//banner-section-->
			<?php include "newssection.php"; 
			include "footer.php"; ?>
			