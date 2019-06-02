<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ADMIN DASHBOARD</title>

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
   <?php   include "menu.php"; ?> 
<!--main content start-->
<?php 
include_once("connection.php"); 
$nid=$_GET['id'];
$q="select * from tbl_news where news_id=".$nid;
$rs=mysqli_query($conn ,$q); 
?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<?php
if($row=mysqli_fetch_assoc($rs))
{?>  
				<h3 class="page-header"><i class="fa fa-file-text-o"></i> FORM ELEMENTS</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">HOME</a></li>
						<li><i class="icon_document_alt"></i>FORMS</li>
						<li><i class="fa fa-file-text-o"></i>FORMS ELEMENTS</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                             FORM ELEMENTS
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="editnews.php" enctype="multipart/form-data">
                                  <div class="form-group">
                                      
                                      <div class="col-sm-10">
				    <input type="hidden" class="form-control" name="nid" value="<?php echo $row['news_id']; ?>">
					</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">NEWS TITLE:</label>
                       <div class="col-sm-10">				  
                    <input type="text" class="form-control" name="title" value="<?php echo $row['news_title']; ?>">
					</div>
					</div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">DESCRIPTION:</label>
                                      <div class="col-sm-10">
				   <textarea rows="5" cols="10" class="form-control" name="description"value="<?php echo $row['news_description']; ?>" > </textarea> 
				</div>
				</div>
				<div class="form-group">
                        <label class="col-sm-2 control-label">OLD IMAGE:</label>
                       <div class="col-sm-10">				                 
				 <img src="<?php echo $row['news_image']; ?>" width="100px" height="100px" /> <br> <br>
				 </div>
				<div class="form-group">
                                      <label class="col-sm-2 control-label">NEW IMAGE:</label>
                                      <div class="col-sm-10">				   
									<input type="file" class="form-control" name="image" >
				</div>
				</div>
								<button type="submit" name="btn2" class="btn btn-primary">SUBMIT</button>
           </div>
<?php 
}
else {
	header("location:news.php?msg=error");
}

?>
  <!--main content end-->
  </section>
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