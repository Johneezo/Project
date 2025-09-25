<?php
include('include/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contactno=$_POST['contactno'];
	$status=1;
	$query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	
	echo "<script>alert('Registration successfull. Now You can login');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Student Complaint System | User Regsitrations</title>
	<link rel="stylesheet" href="../admin/assets/css/style.css">
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
				<h4>Complaint management system <hr /><span style="color:#fff;"> Student Registration</span></h4>
				<hr />
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">
						
					<div class="card-body">
				
				
						<div class="form-group mb-3">
							<label for="name">FullName</label>							
							<input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
						</div>
						<div class="form-group mb-4">
							<label for="email">Email</label>
							<input type="email" class="form-control placeholder="EnterEmail" id="email" placeholder="Enter Email"  name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group mb-3">
							<label for="student no">Student No</label>
							<input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Student no" required="required" autofocus>
						</div>
						<div class="form-group mb-3">
							<label for="password">Password</label>
							<input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
						</div>
	
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="submit">Register</button>
						<hr>
						
					</div></form>
					 <i class="fa fa-home" aria-hidden="true"><a class="" href="../index.html">
		                    Back Home
		                </a></i>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="../admin/assets/js/vendor-all.min.js"></script>
<script src="../admin/assets/js/plugins/bootstrap.min.js"></script>



</body>

</html>
