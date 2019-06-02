<?php include "header.php";
	include "connection.php";
			$tid=$_GET['id'];			
$r="select * from tbl_comments 
LEFT JOIN tbl_users ON tbl_users.user_id=tbl_comments.user_id
where topic_id=$tid ";
$s=mysqli_query($con,$r);
$no=mysqli_num_rows($s);
?>
	
	<div class="full">
			<div class="col-md-3 top-nav sing-page">
				    <?php include "menu.php"; ?>
			</div>
			<?php 
			$q="select * from tbl_topics where topic_id=".$tid;
			$rs=mysqli_query($con,$q);
			?>
		<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		   <h3 class="tittle">Discussion Page <i class="glyphicon glyphicon-file"></i></h3>
			<div class="single">
							<?php
						   while($row=mysqli_fetch_assoc($rs)) {?>
							<img src="<?php echo $row['topic_image']; ?>" class="img-responsive" alt="" />
				<div class="b-bottom"> 
			      <h2 class="top"><a href="#"> <?php echo $row['topic_title']; ?> </a></h2>
				   <p class="sub"> 	<?php echo $row['topic_description']; ?> </p>
				   
				Date : <?php echo date('d/m/Y', strtotime($row['topic_date'])); ?>
			     <?php 	 } 
						   ?>
						  
				</div>
			 </div>
			 
<?php 

if(@$_SESSION['login']== true  ){ 
 $uid = $_SESSION['userid'];
?>
 <b><p style="color:#9A03FE"> 
				  <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span><?php echo $no; ?> </a>
				 &nbsp;&nbsp;
 (<?php echo $row['topic_like_count']; ?>) <a href="liketopic.php?topic=<?php echo $tid;?>"> Likes </a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							(<?php echo $row['topic_dislike_count']; ?>) <a href="disliketopic.php?topic=<?php echo $tid;?>"> Dislikes </a>
				</p></b> 
				<br>
<?php if($no >= 1){ ?>
		<div class="response">                
					<h4>Responses</h4>
					<div class="media response-info">
					<?php while($row=mysqli_fetch_assoc($s)) { ?>
						<div class="media-left response-text-left">
							<a href="#">
								<img class="media-object" src="<?php echo $row['user_image']; ?>" alt="" width="70px" height="70px"/>			
					</a>
							<h5><a href="#">By:  <?php echo ucfirst($row['user_name']); ?> </a></h5>
						</div>
						<div class="media-body response-text-right">
							<p> <?php echo $row['comment_description']; ?> </p>
							<ul>
							
					<b style="color:#9A03FE">		(<?php echo $row['comment_like_count']; ?>) <a href="like.php?topic=<?php echo $tid;?>&comment= <?php echo $row['comment_id'];?>">Likes </a>
							&nbsp;&nbsp;&nbsp;
							(<?php echo $row['comment_dislike_count']; ?>) <a href="dislike.php?topic=<?php echo $tid;?>&comment= <?php echo $row['comment_id'];?>">Dislikes </a>
							
							
							
							</p></b>
								
								
								<li>Date : <?php echo date('d/m/Y', strtotime($row['comment_date'])); ?> </li>
								
							</ul>
							</div>
							<div class="clearfix"> </div>
					<?php } ?>
						
						
					</div>
</div>	
<?php } else {  ?>	
<div class="response">                
					<h4>Be the first to comment here.....</h4>
					</div>
<?php } ?>
<div class="coment-form">
					<h4>Post your comment</h4>
					<form action="comment.php" method="post">
					<input type="hidden" name="tid" value="<?php echo $tid;?>"/>
					<input type="hidden" name="uid" value="<?php echo $uid ?> "/>
						
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" name="ucomment" required="">Write Your Comment...</textarea>
						<input type="submit" name="btn" value="Submit Comment" >
					</form>
				</div>	
				<?php } 
					else { echo "<br>"."<br>"."<h3>"."PLEASE FIRST"?> <a href="login.php?redirect=<?php echo $tid; ?>">LOGIN </a><?php echo "TO COMMENT"."</h3>";
					}
					?>
				<div class="clearfix"></div>
			</div>
			<!--//banner-->
			<!--//banner-section-->	
			
			<?php include "newssection.php";
				  include "footer.php";	 ?>
		