<?php include "header.php"; ?>
			</div>
			<?php 
			include "connection.php"; 
			$q="select * from tbl_categories";
			$rs=mysqli_query($con,$q);
			?>
	<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		   <h3 class="tittle">CATEGORIES </h3>
			<div class="banner">
                 <div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					       <li>
							  <img src="images/categories.jpg" class="img-responsive" alt="" />
							
						 <div class="clearfix"> </div>
						 							
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
			   <!--//banner-->
			   
			   
			   <?php    while($row=mysqli_fetch_assoc($rs)) { ?>
			    <div class="col-md-3 b-bottom"> 
				  <h5 class="top">
				  <a class="btn btn-success" href="cattopics.php?id=<?php echo $row['cat_id']; ?>">   <?php  echo $row['cat_name']; ?> </a> 
				  </h5>
				</div>
			 
			<?php
			  } ?> 		   	
			   
		     
			 </div>
			<!--//banner-section-->
			
	<?php include "newssection.php";
	include "footer.php";
	?>
	