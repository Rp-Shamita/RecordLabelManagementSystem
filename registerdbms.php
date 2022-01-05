<?php

include 'connectiondbms.php';
session_start();
error_reporting(0);
if (isset($_SESSION['Company_name'])) {
    header("Location: logindbms.php");
}

if (isset($_POST['submit'])) {
	$comp = $_POST['Company_name'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users1 WHERE Company_name='$comp'";
		$result = mysqli_query($con, $sql);
		if ($result->num_rows==0) {
			$sql = "INSERT INTO users1 (Company_name, password) VALUES ('$comp', '$password')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
        echo "<script>window.location.href='logindbms.php'</script>";
				$comp = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			}
      else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
        echo "<script>window.location.href='registerdbms.php'</script>";
			}
		} else {
			echo "<script>alert('Woops! Record label Already Exists.')</script>";
      echo "<script>window.location.href='registerdbms.php'</script>";
		}

	}
  else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <style>
  .loginbox{
    border-radius: 10%;
  }
  </style>
  <meta charset="UTF-8">
  <title>Register Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="registerdbms.css">
</head>
<body>
  <div class="title">
    <h1 class="title">MAESTRO</h1>
  </div>
  <div class="loginbox">

    <img src=maestro.png class="avatar">
    <h1><u>REGISTER</u></h1>
    <form method="post">
      <p>Company Name</p>
      <input type ="text" name="Company_name" placeholder="Enter company name">
      <p>Password</p>
      <input type ="password" name="password" placeholder="Enter Password">
      <p>Confirm Password</p>
      <input type ="password" name="cpassword" placeholder="Enter Password">
      <input type="submit" name="submit" value="Register"><br>
      <a href="logindbms.php" style=": center;">Done registering? Sign in here</a>
  </div>
</body>
</html>
