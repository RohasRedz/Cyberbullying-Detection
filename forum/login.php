<?php 
include("connection.php");
if(isset($_POST['btn1'])) {

$redirect=$_POST['redirect'];
$useremail=$_POST['email'];
$userpwd=$_POST['password'];
$q="select * from tbl_users where user_email='$useremail'";
$rs=mysqli_query($con,$q);
 if($row=mysqli_fetch_assoc($rs))
 { 
	 $pd=$row['user_password'];
	 if($userpwd==$pd)
	 {
		 session_start();
   $_SESSION['login']=true;
   $_SESSION['userid']=$row['user_id'];
   if($redirect)
	header("location:topic.php?id=$redirect");
else 
	header("location:index.php");
      }
	 else {
			
			 header("location:login.php?msg=invalidpassword");
		 }
 }
     else {
	 header("location:registration.php?msg=register");
          }
}
?>
<?php include "header.php"; ?>
			</div>
	<div class="col-md-9 main">
	<!-- login-page -->
	<br><br>
	 <?php 
                     if(!empty($_GET['msg']))
                        {
	                      if($_GET['msg']=='invalidpassword'){
		                  echo "<h3>"."<b>"."please enter valid password"."</b>"."</h3>";
                                }
								if($_GET['msg']=='invalidname'){
		                         echo "please enter valid username";
                                      }
							if($_GET['msg']=='logout'){
		                         echo "log out successfully";
                                      }
                         if($_GET['msg']=='login'){
						echo "<br>"."<br>"."<center>"."<b>"."PLEASE LOGIN OR REGISTER TO COMMENT"."</b>"."</center>";
							}
							}
							?>
	<div class="login">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3 class="tittle">Login <i class="glyphicon glyphicon-lock"></i></h3>
					 <p>Welcome, please enter the following to continue.</p>
					 <p>If you have previously Login with us, <a href="#">click here</a></p>
					 <form action="" method="post">
						 <h5>E-mail:</h5>	
						 <input type="hidden" name="redirect" value="<?php echo @$_GET['redirect']; ?>" />
						 <input type="email" name="email" placeholder="enter your e-mail id"> <br> <br>
						 <h5>Password:</h5>
						 <input type="password"name="password" >					
						 <input type="submit" name="btn1"value="Login">
					 </form>
			</div>
			<div class="col-md-6 login-right">
					 <h3 class="tittle">New Registration <i class="glyphicon glyphicon-file"></i></h3>
					<p>By creating an account with our forum, you can become a part of our discussion forum and give your views about any topic in forum.</p>
					<a href="registration.php" class="hvr-bounce-to-bottom button">Create An Account</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- //login-page -->
			<?php include "footer.php"; ?>