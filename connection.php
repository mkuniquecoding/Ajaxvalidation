<?php
	$con=mysqli_connect("localhost","root","","kalam_academy");
	if (!$con) {
		echo "<script>alert('Database not connected....!!');</script>";
	}
?>