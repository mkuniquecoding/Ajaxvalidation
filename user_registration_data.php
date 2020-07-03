<?php
	include('connection.php');
	$fname=ucwords($_POST['a1']);
	$lname=ucwords($_POST['a2']);
	$email=$_POST['a3'];
	$phone=$_POST['a4'];
	$gender=$_POST['a5'];
	$pass=$_POST['pass'];
	$address=$_POST['a6'];
	$state=ucwords($_POST['a7']);
	$city=ucwords($_POST['a8']);
	$postal_code=$_POST['a9'];

	$check="SELECT * FROM user_registration WHERE email='$email'";
	$result=mysqli_query($con,$check);
	if (mysqli_num_rows($result)==1) {
		echo "Username Already inserted";
	}
	else{
		$query="INSERT INTO user_registration(first_name,last_name,email,password,phone,gender,full_address,state,city,postal_code) 
					VALUES('$fname','$lname','$email','$pass','$phone','$gender','$address','$state','$city','$postal_code')";
		$run_query=mysqli_query($con,$query);
		if ($run_query) {
			echo "You have successfully register";
		}
		else{
			echo "not register";
		}
	}
?>