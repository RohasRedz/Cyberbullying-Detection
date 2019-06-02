<!DOCTYPE html>
<?php 
include("connection.php");
if(isset($_POST['btn'])) {

$uname=$_POST['name'];
$pwd=$_POST['password'];
$q="select user_name,user_password from tbl_admin where user_name='$uname'";
$rs=mysql_query($q);

 if($row=mysql_fetch_assoc($rs))
 { 
	 $pd=$row['user_password'];
	 if($pwd==$pd)
	 {
		 session_start();
   $_SESSION['login']=true;
   header("location:home.php");
      }
	 else {
			
			 header("location:index.php?msg=invalidpassword");
		 }
 }
     else {
	 header("location:index.php?msg=invalidname");
          }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Admin Login </title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
			<p> 
                <?php 
                     if(!empty($_GET['msg']))
                        {
	                      if($_GET['msg']=='invalidpassword'){
		                  echo "please enter valid password";
                                }
								if($_GET['msg']=='invalidname'){
		                         echo "please enter valid username";
                                      }
									  if($_GET['msg']=='login'){
		                         echo "please login first";
                                      }
                          if($_GET['msg']=='logout'){
		                         echo "log out successfully";
                                      }
                         
                         }
                    ?>
           </p>
		   <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" name="name" required autofocus>
            </div>
			
			
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
         
            <button class="btn btn-primary btn-lg btn-block"  name="btn" type="submit">Login</button>
         
        </div>
      </form>

    </div>


  </body>
</html>
