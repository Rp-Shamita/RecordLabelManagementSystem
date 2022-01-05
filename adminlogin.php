<?php
include 'connectiondbms.php';
session_start();
if(isset($_POST['login'])){
  $password=$_POST['password'];
  $sql="select * from USERS1 where Company_name='admin' AND password='".$password."' limit 1";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)==1){
    $_SESSION['Admin'] = $row['Company_name'];
    header('Location: admin.php');
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
  <title>ADMIN Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="logindbms.css">
</head>
<body>
  <div class="title">
    <h1 class="title">MAESTRO</h1>
  </div>
  <div class="loginbox">

    <img src=maestro2.png class="avatar">
    <h1><u>ADMIN LOGIN</u></h1>
    <form method="post">
      <p>Password</p>
      <input type ="password" name="password" placeholder="Enter Password">
      <input type="submit" name="login" value="Login"><br>
  </div>
</body>
</html>