<?php
	session_start();
	include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
  	
  </style>
</head>
<body>
	<div class="container col-lg-6 m-auto">
		<div class="content">
			<div id="message" class="bg-success p-2 text-white">
				
			</div>
			<h3>User Login</h3>
			<form method="post">
				<input type="text" name="a1" id="email" placeholder="Email Id">
				<p id="email-error"></p>
				<input type="password" id="pass" name="a2" placeholder="password">
				<p id="pass-error"></p>
				<input type="submit" id="submit" name="submit" value="Login" class="btn login">
			</form>

			<p>Not register, <a href="index.php">Create an account</a></p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(e){
			e.preventDefault();
			$('#email-error').html();
			$('#pass-error').html('');
			if ($('#email').val()=='') {
				$('#email-error').html('Email is required');
				return false;
			}
			else if(!validateEmail($('#email').val())){
				$('#email-error').html('*E-mail is not valid...!!');
				return false;
			}
			else if ($('#pass').val()=='') {
				$('#pass-error').html('*password is required...!!');
				return false;
			}
			else if ($('#pass').val().length < 6) {
				$('#pass-error').html('*password must be more than 6 character..!!');
				return false;
			}
			else{
				$.ajax({
					url:'user_login_data.php',
					method:"post",
					data: $('form').serialize(),
					dataType: "text",
					success: function(strMessage){
						if (strMessage==='success') {
							window.location.replace("user_address.php");
						}
						else{
							$('#message').show();
							$('#message').text(strMessage);
						}
					}
				});
			}


			function validateEmail($email){
					var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					return emailReg.test($email);
				}
		});
	});
</script>
</body>
</html>	