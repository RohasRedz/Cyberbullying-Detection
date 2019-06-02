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
<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="home.php">
                          <i class="icon_house_alt"></i>
                          <span>HOME</span>
                      </a>
                  </li>
				  
				    <li>
                      <a class="" href="user.php">
                          <i class="icon_genius"></i>
                          <span>  USERS </span>
                      </a>
                  </li>
				  
				  	    <li>
                      <a class="" href="category.php">
                          <i class="icon_genius"></i>
                          <span>CATEGORIES</span>
                      </a>
                  </li>
				  				  	  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
	  <!--main content start-->
	  <?php 
	  include "connection.php";
	  $q1="select * from tbl_categories";
	  $c_rs=mysql_query($q1);
	  ?>
		  <section id="main-content">
         <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> TO ADD TOPIC</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="icon_document_alt"></i> categories</li>
						<li><i class="fa fa-file-text-o"></i>add topic</li>
					</ol>
				</div>
			</div>
			 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">                                                                            
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="newtopic.php" enctype="multipart/form-data" >            
								   <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">category</label>
                                      <div class="col-lg-10">
                                          <select class="form-control m-bot15" name="category">
                                              <option><?php 
														while($c_row=mysql_fetch_assoc($c_rs)) {
																							?>
					<option value="<?php echo $c_row['cat_id'];?>" > <?php echo $c_row['cat_name'];?>
											</option>
											<?php } ?> 
                                          </select>
											</div>
											</div>
								<div class="form-group">
								 <label class="col-sm-2 control-label">TOPIC:</label>
                                      <div class="col-sm-6">

						<input type="text" class="form-control" name="topictitle" placeholder="enter new topic"> <br> 
						</div>
					</div>
						<div class="form-group">
                                      <label class="col-sm-2 control-label">TOPIC DESCRIPTION:</label>
                                      <div class="col-sm-6">
									  <textarea rows="5" cols="15" class="form-control" name="topicdes" placeholder="enter topic description"> </textarea><br>
                                  </div>
								 </div>
							<div class="form-group">
                                      <label class="col-sm-2 control-label">TOPIC IMAGE</label>
                                      <div class="col-sm-6">
					
						<input type="file" class="form-control" name="image" /> <br>
						</div>
						</div>
		     <button type="submit" name="btn1" class="btn btn-primary">ADD TOPIC</button>
          </div>
               </section> 
  </body>
</html>	  
 	   
   
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
 