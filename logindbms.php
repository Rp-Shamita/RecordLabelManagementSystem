<?php
include 'connectiondbms.php';
session_start();
error_reporting(0);
if(isset($_POST['login'])){
  $comp=$_POST['Company_name'];
  $password=$_POST['password'];
  $sql="select * from users1 where Company_name='".$comp."' AND password='".$password."' limit 1";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['Company_name'] = $row['Company_name'];
  if(mysqli_num_rows($result)==1){
      echo '<script>alert("You have successfully logged in")</script>';
      echo '<script>window.location.href="compreq.php"</script>';
    exit();
  }
  else{
    echo '<script>alert("You have entered Incorrect Information")</script>';
    exit();
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
  <title>Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="logindbms.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<body>
  <div class="title">
    <h1 class="title">MAESTRO</h1>
  </div>
  <div class="loginbox">

    <img src=maestro2.png class="avatar">
    <h1><u>LOGIN</u></h1>
    <form method="post">
      <p>Company Name</p>
      <input type ="text" name="Company_name" placeholder="Enter Username">
      <p>Password</p>
      <input type ="password" name="password" placeholder="Enter Password">
      <input type="submit" name="login" value="Login"><br>
      <a href="registerdbms.php">If not registered, Click here</a>
  </div>
</body>
</html>