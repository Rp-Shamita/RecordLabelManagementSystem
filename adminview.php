<?php
include 'connectiondbms.php';
session_start();
$search=$_GET['search'];
$result = mysqli_query($con, "select * from company1 where Company_name like '%".$search."%'");
$row=mysqli_fetch_assoc($result);
$compname=$row['Company_name'];
$estdate=$row['Establish_dt'];
$founder=$row['Founder'];
$chairman=$row['Chairman'];
$address=$row['Address'];
$contact=$row['Contact_no'];
$email=$row['CEmail'];
$website=$row['CWebsite'];
$staff=$row['Staff_no'];
$net=$row['CNet_worth'];
$image=$row['Logo'];
$query = "select * from artist1 where Company_name='".$compname."'";
$res = mysqli_query($con, $query);
$n = mysqli_num_rows($res);
while($row=mysqli_fetch_assoc($res)){
  $x = $row['Artist_name'];
  $y = $row['Picture'];
  $resArray[] = $x;
  $picArray[] = $y;
}
$query = "select * from band where Company_name='".$compname."'";
$resB = mysqli_query($con, $query);
$nB = mysqli_num_rows($resB);
while($row=mysqli_fetch_assoc($resB)){
  $x = $row['Band_name'];
  $y = $row['BPicture'];
  $BresArray[] = $x;
  $BpicArray[] = $y;
}
$query = "select * from album, artist1 where album.Artist_name=artist1.Artist_name and Artist1.Company_name='".$compname."'";
$resA = mysqli_query($con, $query);
$nA = mysqli_num_rows($resA);
while($row=mysqli_fetch_assoc($resA)){
  $x = $row['Album_name'];
  $y = $row['album_cover'];
  $AresArray[] = $x;
  $ApicArray[] = $y;
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
  background-image: url('WGkW.gif') ;
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
  text-align: center;
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
  background-image: url('F6VQ.gif');
  /*background: black;*/
}

.flex-container > div {
  background-color: #000;
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
h6{
  color: white;
}
label{
  font-weight: bold;
  font-size: 18px;
}
</style>
</head>
<body>
<div class="heading">
<h1><u><?php echo $compname ?></u></h1>
<?php echo '<img class="logo" src="data:image/png;base64,'.base64_encode($image).'"/>';?>
</div>
<div class="container">
  <div class="row">
    <div class="col-25">
      <label for="name">Establishment Date:-</label>
    </div>
    <div class="col-75">
      <input type="text" value=<?php echo $estdate ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Founder:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value= "'.$founder.'"'; ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Chairman:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$chairman.'"'; ?>readonly >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Address:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$address.'"'; ?>readonly >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Contact no:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$contact.'"'; ?>readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Email:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$email.'"'; ?>readonly >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Website:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$website.'"'; ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Total Staff:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$staff.'"'; ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Net Worth(in billions):-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$net.'" billion'; ?>readonly >
    </div>
  </div>
</div>
<h2 style="background-color: white; color:black;">Click here to know more</h2>
<button class="accordion">ARTISTS</button>
<div class="panel">
<div class="flex-container">
  <?php
  for($i=0;$i<$n;$i++){
    echo "<div>
    <a href=artist.php?artist=".$resArray[$i]."><img style='width: 50%;' class='pic' src='data:image/jpeg;base64,".base64_encode($picArray[$i])."'/></a>
    <h6>".$resArray[$i]."</h6>
    </div>";
  }?>
</div>
</div>
<button class="accordion">BANDS</button>
<div class="panel">
<div class="flex-container">
  <?php
  for($i=0;$i<$nB;$i++){
    echo "<div>
    <a href=band.php?band=".$BresArray[$i]."><img style='width: 70%;' class='pic' src='data:image/jpeg;base64,".base64_encode($BpicArray[$i])."'/></a>
    <h6 style='text-align: center;'>".$BresArray[$i]."</h6>
    </div>";
  }?>
</div>
</div>
<button class="accordion">ALBUMS</button>
<div class="panel">
<div class="flex-container">
  <?php
  for($i=0;$i<$nA;$i++){
    echo "<div>
    <a href=albumdet.php?album=".$AresArray[$i]."><img style='width: 70%;' class='pic' src='data:image/jpeg;base64,".base64_encode($ApicArray[$i])."'/></a>
    <h6 style='text-align: center;'>".$AresArray[$i]."</h6>
    </div>";
  }?>
</div>
</div>
</body>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</html>



