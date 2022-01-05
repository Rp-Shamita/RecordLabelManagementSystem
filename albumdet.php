<?php
include 'connectiondbms.php';
session_start();
$album = $_GET['album'];
echo $album;
$query = "select * from album where Album_name like '".$album."%'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$query = "select * from songs where Album_name like '".$album."%'";
$resA = mysqli_query($con, $query);
$nA = mysqli_num_rows($resA);
while($row1=mysqli_fetch_assoc($resA)){
  $x = $row1['Song_name'];
  $y = $row1['Music_video_url'];
  $z = $row1['Spotify_rank'];
  $w = $row1['Billboard_rank'];
  $AresArray[] = $x;
  $ApicArray[] = $y;
  $AspotArray[] = $z;
  $AbillArray[] = $w;
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
  background-image: url('WGkW.gif'); 
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
  transition: max-height 0.2s ease-out;
  overflow: hidden;
}
.flex-container {
  display: flex;
  background-image: url('F6VQ.gif'); 
  flex-wrap: wrap;
  /*background: black;*/
}

.flex-container > div {
  background-color: black;
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
</style>
</head>
<body>
<div class="heading">
<h1><u><?php echo $row['Album_name'] ?></u></h1>
<?php echo '<img class="logo" src="data:image/jpeg;base64,'.base64_encode($row['album_cover']).'"/>';?>
</div>
<div class="container">
  <div class="row">
    <div class="col-25">
      <label for="name">Artist name:-</label>
    </div>
    <div class="col-75">
      <input type="text" value=<?php echo $row['Artist_name'] ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Release Date:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value= "'.$row['Release_dt'].'"'; ?> readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Title Song:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['Title_song'].'"'; ?>readonly >
      <iframe width="560" height="315" <?php echo 'src='.$row['titlelink']?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">No of songs:-</label>
    </div>
    <div class="col-75">
      <input type="text" <?php echo 'value = "'.$row['No_of_songs'].'"'; ?>readonly >
    </div>
    <button class="accordion">SONGS</button>
    <div class="panel">
        <div class="flex-container">
        <?php
  for($i=0;$i<$nA;$i++){
    echo "<div>
    <iframe width='100' height='100' src=".$ApicArray[$i]." title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
    <h6 style='color: white;'>".$AresArray[$i]."</h6>
    <p style='font-size: 10px;color: white;'>Spotify Rank: ".$AspotArray[$i]."</p>
    <p style='font-size: 10px;color: white;'>Billboard Rank: ".$AbillArray[$i]."</p>
    </div>";
  }?>
  </div>
</div>
</div>
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
</body>
</html>
