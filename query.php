<?php
include 'connectiondbms.php';
$approve = $_GET['approve'];
$compname = $_GET['compname'];
$requestype = $_GET['reqtype'];
$requestname = $_GET['reqname'];
$q = "update company1 set $requestype='".$requestname."' where Company_name='".$compname."'";
mysqli_query($con, $q);
$q1 = "delete from requests where Request_no=".$approve;
mysqli_query($con, $q1);
header('Refresh:0; url="admin.php"');
?>