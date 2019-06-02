<?php include "connection.php";
			$q="select * from tbl_news order by news_id desc limit 1";
			$rs=mysqli_query($con,$q);
			?>
			<div class="banner-right-text">
			 <h3 class="tittle"> Latest News  <i class="glyphicon glyphicon-facetime-video"></i></h3>
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					<div class="general-text">
									<?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
					  <img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />
							<h4 class="top">  <?php echo $row['news_title']; ?>  </h4>													
							<p> <?php echo $row['news_description']; ?> 
							<b><p style="color:#9A03FE"><?php echo $row['news_addedon']; ?>  </p></b>
					<?php  } ?>	
					</div>
<?php 
$q="select * from tbl_news where news_id=2";
$rs=mysqli_query($con,$q);
?>			 
					 <div class="edit-pics">
							      <div class="editor-pics">
								  <div class="col-md-3 item-pic">
								<?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
					  <img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />					
										   </div>
											<div class="col-md-9 item-details">
											<p> 
												<h5 class="inner two"><a href="newsdetail.php?id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?>  </a></h5>
												 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo $row['news_addedon']; ?> </div>
											 </div>
								<?php }?> 
											<div class="clearfix"></div>
										</div>
	<?php 
$q="select * from tbl_news where news_id=1";
$rs=mysqli_query($con,$q);
?>										
										<div class="editor-pics">
										 <div class="col-md-3 item-pic">
										 <?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
								<img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />			
											</div>
											<div class="col-md-9 item-details">
											<h5 class="inner two"><a href="newsdetail.php?id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?>  </a></h5>												
												<div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo $row['news_addedon']; ?> </div>
											  </div>
								<?php } ?>
											<div class="clearfix"></div>
										</div>
<?php 
$q="select * from tbl_news where news_id=3";
$rs=mysqli_query($con,$q);
?>	
										
										<div class="editor-pics">
										 <div class="col-md-3 item-pic">
										 <?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
								<img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />			
											</div>
											<div class="col-md-9 item-details">
											<h5 class="inner two"><a href="newsdetail.php?id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?>  </a></h5>												
												<div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo $row['news_addedon']; ?> </div>
											  </div>
								<?php } ?>
											<div class="clearfix"></div>
										</div>
	<?php 
$q="select * from tbl_news where news_id=4";
$rs=mysqli_query($con,$q);
?>										<div class="editor-pics">
										 <div class="col-md-3 item-pic">
										 <?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
								<img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />			
											</div>
											<div class="col-md-9 item-details">
											<h5 class="inner two"><a href="newsdetail.php?id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?>  </a></h5>												
							<div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo $row['news_addedon']; ?> </div>
											  </div>
								<?php } ?>
											<div class="clearfix"></div>
										</div>
											<div class="clearfix"></div>
										</div>
									</div>
						<?php 
$q="select * from tbl_news where news_id=4";
$rs=mysqli_query($con,$q);
?>			
								<div class="media">	
								 <h3 class="tittle media">Media <i class="glyphicon glyphicon-floppy-disk"></i></h3>
								  <div class="general-text two">
									<?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
					  <img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />
							<h4 class="top">  <?php echo $row['news_title']; ?>  </h4>													
							<p> <?php echo $row['news_description']; ?> 
							<b><p style="color:#9A03FE"><?php echo $row['news_addedon']; ?>  </p></b>
					<?php  } ?>	
									</div>
					         </div>
 <?php 
$q="select * from tbl_news where news_id=3";
$rs=mysqli_query($con,$q);
?>	
					    <div class="general-text two">
						    <?php 	
								while($row=mysqli_fetch_assoc($rs)) {?>
					  <img src="<?php echo $row['news_image']; ?>" class="img-responsive" alt="" />
							<h4 class="top">  <?php echo $row['news_title']; ?>  </h4>													
							<p> <?php echo $row['news_description']; ?> 
							<b><p style="color:#9A03FE"><?php echo $row['news_addedon']; ?>  </p></b>
					<?php  } ?>	</div>
				 </div>
			</div>	
			<!--//general-news-->
			<!--/news-->
			<!--/news-->
		 
			