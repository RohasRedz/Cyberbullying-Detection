 
  <div class="logo">
						<a href="index.php"><h1>Blogger</h1></a>
					</div>
					<div class="top-menu">
					 <span class="menu"> </span>

					<ul class="cl-effect-16">
						<li><a class="active" href="index.php" data-hover="HOME">Home</a></li> 
						<li><a class="active" href="category.php" data-hover="CATEGORIES">Categories</a></li>		
						<li><a class="active" href="topics.php" data-hover="ALL TOPICS">All Topics</a></li>
						<li><br /><br /><br /><br /></li>						
						<li><a href="contact.php" data-hover="CONTACT">Contact</a></li>
						<?php if(@$_SESSION['login'] == true){ ?>
						<li><a href="logout.php" data-hover="LOG OUT">Log out</a></li>
						<?php } ?>
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
					</div>