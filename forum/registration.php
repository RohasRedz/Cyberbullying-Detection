<?php 
include "connection.php";
if(isset($_POST['btn2']))
 {
	 $uname=$_POST['name'];
	 $upassword=$_POST['password'];
	 $uphone=$_POST['phone'];
	 $uemail=$_POST['email'];
	 $ugender=$_POST['gender'];
	 $ucity=$_POST['city'];
	 $ustate=$_POST['state'];
	 $ucountry=$_POST['country'];
	 $addedon=date("Y-m-d");
	 $updatedon=date("Y-m-d");
 if($_FILES['image']['error']>0)
 { 
   echo "error in uploading file";
 }	 
else {
	$source=$_FILES['image']['tmp_name'];
	$des="images/".$_FILES['image']['name'];
	 if(move_uploaded_file($source,$des))
	 {
		$q="insert into tbl_users(user_name,user_phone,user_email,user_password,user_gender,user_city,user_state,user_country,user_addedon,user_updatedon,user_image) values
('$uname', '$uphone', '$uemail', '$upassword', '$ugender', '$ucity', '$ustate', '$ucountry', '$addedon', '$updatedon', '$des')";
 
$rs=mysqli_query($con,$q);
if($rs) { 
 header("location:registered.php?msg=done");
 }
else {
	mysqli_error($con);
} 
	 }
}
 }
 ?>
<?php 
if(!empty($_GET['msg']))
{
	if($_GET['msg']=='done'){
		echo "<center>"."<h3>"."You have been registered"."</h3>"."</center>";
         }
}
?>
<?php include "header.php"; ?>
			</div>
	<div class="col-md-9 main">
	<!-- register -->
	<form action="" method="post" enctype="multipart/form-data" >
			<div class="sign-up-form">
				 <h3 class="tittle">Registration <i class="glyphicon glyphicon-file"></i></h3>
					<p>Register to be a part of our discussion forum</p>
		
			<div class="sign-up">
					 <h3 class="tittle reg">Personal Information <i class="glyphicon glyphicon-user"></i></h3>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">First Name* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="text" name="name" class="text" value="enter name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'enter Name';}">

						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="c">Email Address* :</h4>
						</div>
						<div class="sign-up2">
							
								 <input type="email" name="email" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">

						</div>
						<div class="clearfix"> </div>
					</div>
										<div class="sign-u">
						<div class="sign-up1">
							<h4 class="d">Password* :</h4>
						</div>
						<div class="sign-up2">
						
								 <input type="password" name="password" class="Password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">

							
						</div>
						<div class="clearfix"> </div>
					</div>
				<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Phone* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="text" name="phone" class="text" value="phone_number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'phone_number';}">
						
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Gender* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="radio" name="gender" value="male"> male <br>
				<input type="radio" name="gender"  value="female"> female 
						
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">city* :</h4>
						</div>
						<div class="sign-up2">
							
							 <select name="city">
                                              <option value="ambala cantt"> ambala cantt   </option>
                                              <option value="shimla"> shimla  </option>
                                              <option value="karnal"> karnal </option>
											  <option value="delhi"> delhi </option>
											  <option value="yamunanagar"> yamunanagar  </option>
                                          </select>
								
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">state* :</h4>
						</div>
				
					<div class="sign-up2">
							
								<select name="state">
										   <option value="haryana"> haryana </option>
											<option value="punjab"> punjab</option>
											 <option value="maharastra"> maharastra </option>
											<option value="jammu"> jammu </option>
											<option value="kerala"> kerala</option>
											<option value="karnataka"> karnataka </option>
											</select> <br> <br>
								
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Country* :</h4>
						</div>
				
					<div class="sign-up2">
						
								<select name="country">
						<option value="india"> india </option>
											<option value="canada"> canada</option>
											 <option value="australia"> australia </option>
											<option value="us"> us </option>
											<option value="uk"> uk</option>
											<option value="france"> france </option>
											<option value="china"> china </option>
										</select><br><br>
									
						</div>
						<div class="clearfix"> </div>
					</div>
									<div class="sign-u">
						<div class="sign-up1">
							<h4 class="d">add image* :</h4>
						</div>
						<div class="sign-up2">
							
								 <input type="file" name="image" >

							
						</div>
						<div class="clearfix"> </div>
					</div>
					
						<input type="submit" name="btn2" value="REGISTER ME">
					
				</div>
			</form>
			</div>
		</form>
<!-- //register -->
<!-- //login-page -->
			<div class="clearfix"> </div>
	<?php include "footer.php"; ?>