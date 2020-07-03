<?php
	include('connection.php');
	session_start();
	$email=$_POST['a1'];
	$pass=$_POST['a2'];
	$query="SELECT * FROM user_registration WHERE email='$email' && password='$pass'";
	$result=mysqli_query($con,$query);
	$row=mysqli_num_rows($result);
	if ($row>0) {
		$_SESSION['uname']=$email;
		echo "success";
	}
	else{
		echo "email or password incorrect....!!";
	}
?>