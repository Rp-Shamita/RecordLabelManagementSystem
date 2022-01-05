<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .container {
  border-radius: 5px;
  padding: 20px;
}
table{
    border: 5px solid black;
}
</style>
<body>
<nav class="navbar navbar-light bg-dark" style="height: 85px; margin: 10px 5px 10px 5px;">
  <div class="container-fluid">
  <img src="maestro2.png" class="rounded-circle" style="width: 5%; float: left; margin-bottom: 20px;" alt="MAESTRO">
  <h1 style="color: white; align: center;">ADMIN</h1>
    <form class="d-flex" method=get action='adminview.php' target="_blank">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <input class="btn btn-outline-success" type="submit" value="Search">
    </form>
  </div>
</nav>
    <div class=container>
<?php
include 'connectiondbms.php';
$query = "SELECT * from requests";
$result = mysqli_query($con, $query);

echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped table-hover"> 
      <tr> 
          <td> <font face="Arial"><b>Request Number</font> </td>
          <td> <font face="Arial"><b>Request company</font> </td>
          <td> <font face="Arial"><b>Request Type</font> </td> 
          <td> <font face="Arial"><b>Modified value</font> </td>
          <td> <font face="Arial"><b>Approve Requests</font> </td>
      </tr>';

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr> 
                  <td>'.$row['Request_no'].'</td>
                  <td>'.$row['Company_name'].'</td>
                  <td>'.$row['Request_Type'].'</td>
                  <td>'.$row['Request_name'].'</td>
                  <td><a class="btn btn-primary" href="query.php?approve='.$row['Request_no'].'&compname='.$row['Company_name'].'&reqtype='.$row['Request_Type'].'&reqname='.$row['Request_name'].'">Approve</a></td>
              </tr>';
    }
}
?>
</table>
</div>
<a href='logoutdbms.php' style="text-align: right;">Logout</a>
</body>
</html>