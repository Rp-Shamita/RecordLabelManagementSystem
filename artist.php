<?php
include 'connectiondbms.php';
$artist=$_GET['artist'];
$query = "select * from artist1 where Artist_name like '".$artist."%'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
  background: linear-gradient(120deg,#eecda3,#ef629f);
}
* {
  box-sizing: border-box;
}
span{
  position: absolute;
  text-align: right;
}
option:first-child{
  color: #ccc;
}

input[type=text],select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

img{
    margin-left: auto;
    margin-right: auto;
    display: block;
    width: 10%;
    padding-bottom: 30px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

input[type=text]:focus {
  border: 3px solid #555;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
.heading{
  background-color: black;
  color: white;
}
h1{
  padding: 10px;
  font-size: 42px;
  text-align: center;
}
a{
  color:white;
  text-align: right;
  font-size: 12px;
}
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.flex-container {
  display: flex;
  background: linear-gradient(120deg,#eecda3,#ef629f);
  /*background: black;*/
}

.flex-container > div {
  background-color: #f1f1f1;
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
</style>
</head>
<body>
<div class="heading">
<h1><u><?php echo $row['Artist_name'] ?></u></h1>
<?php echo '<img class="logo" src="data:image/png;base64,'.base64_encode($row['Picture']).'"/>';?>
</div>
<div class="container">
  <div class="row">
    <div class="col-25">
      <label for="name">Artist type:-</label>
    </div>
    <div class="col-75">
      <input type="text" value=<?php echo $row['Artist_type'] ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Age:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value= "'.$row['Age'].'"'; ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Nationality:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['Nationality'].'"'; ?>readonly >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Email id:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['AEmail'].'"'; ?>readonly >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Manager name:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['Manager'].'"'; ?>readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Manager Contact:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['MgrContact'].'"'; ?>readonly >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Instrument:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['Instrument'].'"'; ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Net Worth(int billions):-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['ANetWorth'].'" billion'; ?>readonly >
    </div>
  </div>
</div>
</body>
</html>
