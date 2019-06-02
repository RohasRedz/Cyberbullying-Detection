<?php 
session_start();
if($_SESSION['login']== true) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
<section id="container" class="">
  <?php include "header.php"; ?>
  <?php include "menu.php"; ?>
 <!--main content start-->
      <section id="main-content">
         <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> TO ADD CATEGORY</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="icon_document_alt"></i> categories</li>
						<li><i class="fa fa-file-text-o"></i>add category</li>
					</ol>
				</div>
			</div>
			 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">                                                                            
                          <div class="panel-body">
                              <form class="form-horizontal " method="post">            
								<div class="form-group">
								 <label class="col-sm-2 control-label">CATEGORY:</label>
                                      <div class="col-sm-4">

						<input type="text" class="form-control" name="categoryname" placeholder="enter new category"> <br> 
		     <button type="submit" name="btn1" class="btn btn-primary">ADD CATEGORY</button>
          
                                  
  </body>
</html>
			
		  
 <?php
 include("connection.php");
 if(isset($_POST['btn1']))
{ 

	$category=$_POST['categoryname'];
$q="insert into tbl_categories(cat_name) values('$category')";
  if(mysql_query($q))
  { 
	 header("location: category.php?msg=inserted");
  }
  else{
	  echo mysql_error();
  }
	
}  ?>

  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>
<?php 
}
else {
	//echo "not authorised";
	header("location:category.php");
}
?>