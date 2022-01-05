<?php
session_start();
if(isset($_GET['search']))
{
  $search = $_GET['search_word'];
include 'connectiondbms.php';
$sql = "select * from company1 where Company_name like'%".$search."%'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
  $row=mysqli_fetch_assoc($result);
  $_SESSION['search']=$row['Company_name'];
  header('Location: publicomp.php');
  exit();
}
else{
  $sql = "select * from artist1 where Artist_name like'%".$search."%'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    $_SESSION['search']=$row['Company_name'];
    header('Location: publicomp.php');
    exit();
  }
  else{
    $sql = "select * from band where Band_name like'%".$search."%'";
    $result=mysqli_query($con,$sql);
   if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    $_SESSION['search']=$row['Company_name'];
    header('Location: publicomp.php');
    exit();
  }
  else{
    $sql = "select * from album,artist1 where Album_name like'%".$search."%' and album.Artist_name=artist1.Artist_name";
    $result=mysqli_query($con,$sql);
   if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    $_SESSION['search']=$row['Company_name'];
    header('Location: publicomp.php');
    exit();
   }
  else{
     echo "<script>alert('Not found')</script>";
     echo "<script>window.location.href='first.php'</script>";
    $search="";
    $_GET['search_word']="";
    exit();
  }
}
  }
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
    .avatar{
      position: relative;
      border-radius: 50%;
      width: 20%;
      display: block;
      margin-left: auto;
      margin-right: auto;
      border: 5px solid black;
    }
    h1{
    font-family: FreeMono, monospace;
    font-size: 48px;
    font-style: italic;
    font-variant: normal;
    color: white;
  }
  .wrapper{
    position: relative;
    max-width: 450px;
    margin: 50px auto;
    margin-left: auto;
    margin-right: auto;
    display: block;
    align-items: center;
  }
  #search{
    background-image: url(search2.png);
    background-repeat: no-repeat;
    text-indent: 20px;
  }
  #myVideo {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  display: block;
  margin: auto;
}
    </style>
    <meta charset="utf-8">
    <title>Search Now</title>
    <link rel="stylesheet" href="firststyle.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head> 
  <body>
  <video autoplay muted loop id="myVideo">
  <source src="vid.mp4" type="video/mp4">
</video>
    <h1 style="text-align: center;color: white;">MAESTRO</h1>
    <img src="maestro2.png" class="avatar">
    <div class="wrapper">
      <div class="search-input">
        <form method="get">
        <input type="text" name="search_word" placeholder="Search by name, artist, band, song" id="search" autocomplete="off">
        <input type="submit" name="search" value="search" class="button" hidden>
      </form>
    </div>
  </body>
</html>