<?php
include 'connectiondbms.php';
session_start();
if(!isset($_SESSION['Company_name'])){
    header('Location: logindbms.php');
}
$comp = $_SESSION['Company_name'];
if(isset($_GET['Submit']))
{
    if(isset($_GET['checkbox1'])){
        $text = $_GET['textbox1'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','Establish_dt','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox2'])){
        $text = $_GET['textbox2'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','Founder','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox3'])){
        $text = $_GET['textbox3'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','Chairman','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox4'])){
        $text = $_GET['textbox4'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','Address','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox5'])){
        $text = $_GET['textbox5'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','Contact_no','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox6'])){
        $text = $_GET['textbox6'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','CEmail','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox7'])){
        $text = $_GET['textbox7'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','CWebsite','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox8'])){
        $text = $_GET['textbox8'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','Staff_no','$text')";
        mysqli_query($con, $query);
    }
    if(isset($_GET['checkbox9'])){
        $text = $_GET['textbox9'];
        $query = "INSERT into Requests(Company_name, Request_type, Request_name) values('$comp','CNet_worth','$text')";
        mysqli_query($con, $query);
    }
    echo "<script>alert('Change requested Successfully! Will be changed by the admin soon!');</script>";
    echo "<script>window.close();</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script type="text/javascript">
    function enableDisable(chkPassport, textboxID)
    {
        var txtPassportNumber = document.getElementById(textboxID);
        txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
</script>
<style>
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
input[type="submit"]{
    width: 150px;
    float: right;
    background-color: #3CB371;
}
input[type="submit"]:hover{
    background-color:  #7FFF00;
}
</style>
</head>
</body>
<!--<label for="chkPassport">
    <input type="checkbox" id="chkPassport" />
    Do you have Passport?
</label>
<br />
Passport Number:
<input type="text" id="txtPassportNumber" disabled="disabled" />-->
<div class="heading">
    <h1>Send your request here</h1>
</div>
<div class=container>
<form class="row g-3" method=get>
  <div class="col-md-6">
      <label for="inputEmail" id="label1" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox1" onclick="enableDisable(this, 'textbox1')">Establishment Date:-</label>
      <input type="number" id="textbox1" name="textbox1" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label2" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox2" onclick="enableDisable(this, 'textbox2')">Founder:-</label>
      <input type="text" id="textbox2" name="textbox2" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label3" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox3" onclick="enableDisable(this, 'textbox3')">Chairman:-</label>
      <input type="text" id="textbox3" name="textbox3" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label4" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox4" onclick="enableDisable(this, 'textbox4')">Address:-</label>
      <input type="text" id="textbox4" name="textbox4" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label5" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox5" onclick="enableDisable(this, 'textbox5')">Contact no:-</label>
      <input type="text" id="textbox5" name="textbox5"  class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label6" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox6" onclick="enableDisable(this, 'textbox6')">Email:-</label>
      <input type="email" id="textbox6" name="textbox6" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label7" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox7" onclick="enableDisable(this, 'textbox7')">Website:-</label>
      <input type="text" id="textbox7" name="textbox7" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label8" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox8" onclick="enableDisable(this, 'textbox8')">Total Staff:-</label>
      <input type="number" id="textbox8" name="textbox8" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <label for="inputEmail" id="label9" class="form-label"><input type="checkbox" id="chkPassport" name="checkbox9" onclick="enableDisable(this, 'textbox9')">Net Worth(in billions):-</label>
      <input type="number" id="textbox9" name="textbox9" class="form-control" disabled="disabled"/>
  </div>
  <div class="col-md-6">
      <br>
      <input type="submit" class="form-control" name="Submit" value="Request change"/>
  </div>
</form>
</div>
</body>
</html>