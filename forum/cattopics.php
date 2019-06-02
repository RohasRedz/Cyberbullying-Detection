<?php include "connection.php";
 include "header.php"; ?>
			</div>
	<?php
$cid=$_GET['id'];
$q="select * from tbl_categories where cat_id=".$cid;
$rs=mysqli_query($con,$q);?>	
		
	<div class="col-md-9 main">
	  <!--grids-->
	   <div class="grid-section">
	   <u>  <h1 class="tittle"> 
		 <?php
while($row=mysqli_fetch_assoc($rs)){ echo $row['cat_name']; ?> <br> <?php } ?> </h1></u><br>
   <?php
$cid=$_GET['id'];
$q="select * from tbl_topics where cat_id=".$cid;
$rs=mysqli_query($con,$q);?>	

				<?php
while($row=mysqli_fetch_assoc($rs))
{ ?>  <div class="col-md-6">	
<img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" /> <br>
	<b><a href="topic.php?id=<?php echo $row['topic_id'];?>"> <?php echo $row['topic_title']; ?> </a></b> <br><br>
	</div> 
	<?php
}
?>
	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
			</div>
		 </div>	
	</div>
     <div class="clearfix"> </div>
<!--/footer-->
	    			<?php include "footer.php"; ?>