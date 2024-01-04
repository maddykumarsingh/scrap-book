<?php 
include_once "database.php";
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $birthdate = $_POST["dob"];
  $_SESSION['dob'] = $birthdate;

  if (!isValidDate($birthdate)) {
    echo "Please enter a valid date of birth.";
    return;
  }

  $id = $conn->real_escape_string($_SESSION["id"]);
  $birthdate = $conn->real_escape_string($birthdate);

  $sql = "UPDATE person SET birthdate = '$birthdate' WHERE person_id = '$id'";

  if ($conn->query($sql) === TRUE) {
       header('Location: your-zodaic.php');
  } else {
     
  }

  $conn->close();
}

function isValidDate($date) {
  return (bool)strtotime($date);
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css"
    href="fonts/style.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ABSLI data enrichment">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title> ABSLI | Data Enrichment</title>
 <link rel="icon" href="favicon.ico" type="image/x-icon">
<style>
@keyframes flyInFromTopLeft {
  from {
    transform: translate(-100%, -100%);
    opacity: 0;
  }
  to {
    transform: translate(0, 0);
    opacity: 1;
  }
}

@keyframes flyInFromBottomRight {
  from {
    transform: translate(100%);
    opacity: 0;
  }
  to {
    transform: translate(0);
    opacity: 1;
  }
}
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

#side1Image {
  background-image: url('images/side1.png');
  position: absolute;
  bottom: 0;
  right: 0;
  width: 60%; /* Adjust size as needed */
  height: 50%; /* Adjust size as needed */
  background-size: cover;
  animation: flyInFromBottomRight 2s forwards;
  margin-bottom: -2%;
}

#side2Image {
  background-image: url('images/side2.png');
  position: absolute;
  top: 0;
  left: 0;
  width: 60%; /* Adjust size as needed */
  height: 50%; /* Adjust size as needed */
  background-size: cover;
  animation: flyInFromTopLeft 2s forwards;
}

#logo {
  background-image: url('images/ABC_Red.jpg');
  position: absolute;
  top: 25px;
  right: 25px;

  width: 330px; /* Adjust size as needed */
  height: 70px; /* Adjust size as needed */
  background-size: cover;
}

 #submitBtn {
     display: block;
    margin: 20px auto;
    width: 180px;
    height: 50px;
    background-size: cover;
    border: none;
    cursor: pointer;
    position: absolute;
    bottom: 2%;
    right: 3%;
    background-color: black;
    border-radius: 30px;
    color: white;
    font-size: 32px;
    line-height: 48px;
    text-decoration: none;
    font-family: sans-serif;
    text-align: center;
    z-index:10;
}

body {
  margin: 0;
  height: 100vh;
  overflow: hidden;
  background-image: url('images/background.png');
  background-size: cover;
}

#content {
    height: 350px;
    background-size: cover;
    animation: fadeIn 2s forwards;
    text-align: center;
    width: 100%;
    overflow: hidden;
    float: left;
    margin-top: -200px
}

#cakeContainer {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    display: inline-flex;
}

.candle {
    position: absolute;
    /* positions will be set dynamically with JavaScript */
}

input[type=date] {
    display: block;
    margin: 50px auto;
    background-color: #fcf8e8;
    color: #baa78c;
    font-size: 20px;
    border: 1px solid #baa78c;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
}




.pageContainer{
    height: 100%;
    margin: 0;
   width:100%;
}
.topContent{
       width: 100%;
    overflow: hidden;
    display: block;
    float: left;
       
}

.topImage{
    float:left;
    
      position: relative;
z-index: -1;
  background-repeat: no-repeat;
  animation: flyInFromTopLeft 2s forwards;
      width: 50%;
}

.topImage img{
width:100%;
max-width:100%;
}

 .logo-page{
float: right;
text-align:left;
}

.logo-page img{
          float: right;
    text-align: right;
    width: 100px;
    margin: 10px;
 
}
.bottomSection{
    position: absolute;
    width: 100%;
    display: block;
    text-align: end;
    overflow: hidden;
    bottom: 0;
     animation: flyInFromBottomRight 2s forwards;
     z-index: -1;
}

.bottomSection img{
    width: 50%;
    max-width: 100%;
}

h2.h2Class{
   text-align: center;
   font-family:'PF Handbook Pro Regular';
   font-weight:normal;
   font-size:42px; 
   
}
p.pClass{
    text-align: center;
    font-family:'PF Handbook Pro Regular';
    font-weight:normal;
    font-size:24px;
    width: 80%;
    left: 10%;
    position: absolute;
    margin: 0;
}

label.labelClass{
    text-align: center;
    margin-left: 50px;
    font-family:'PF Handbook Pro Regular';
    font-weight:normal;
    font-size:32px;
}
 @media screen and (max-width: 1000px) {
   

label.labelClass{
     margin-left: 20px;
    font-size:22px;
}

input[type=date] {
    display: block;
    margin: 20px auto;
}


#content {
    height: 350px;;
    float: left;
    margin-top: -120px
}


  
        }
        
        
        
        
</style>
</head>
<body>


<!-- <div id="side1Image"></div>
<div id="side2Image"></div>
<div id="logo"></div>
<div id="content">
    <div>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="dob" style="text-align: center; margin-left: 50px; font-family:'PF Handbook Pro Regular'; font-weight:normal; font-size:32px;">Enter your date of birth</label><br/>
        <input type="date" id="dob" name="dob" onchange="calculateAge()">
        <button type="submit" id="submitBtn" ></button>
    </form>
    </div>
    <div id="cakeContainer">
        <img id="cake" src="images/Cake.png" alt="Birthday Cake" style="width:150px; height:auto;">
    </div>
</div>
-->



<div class="pageContainer">
    <div class="topContent">
    <div class="topImage">
        <img src="images/side2.png" />
    </div>
    
    <div class="logo-page">
        <img src="images/logo.png" />
    </div>
    </div>
    
    
    <div class="centerSection">
<div id="content">
    <div>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="dob"  class="labelClass">Enter your date of birth</label><br/>
        <input type="date" id="dob" name="dob" required onchange="calculateAge()" max="<?php echo date('Y-m-d'); ?>">
        <button type="submit" id="submitBtn" >next</button>
    </form>
    </div>
    <div id="cakeContainer">
        <img id="cake" src="images/Cake.png" alt="Birthday Cake" style="width:150px; height:auto;">
    </div>
</div>


    </div>
    
    
    <div class="bottomSection">
          <img src="images/side1.png" />
    </div>
    
    
</div>


<?php include_once 'orientation-check.php'; ?>

<script>
function calculateAge() {
    var dob = document.getElementById('dob').value;
    var today = new Date();
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    displayCakeAndCandles(age);
}

function displayCakeAndCandles(age) {
    const cakeContainer = document.getElementById('cakeContainer');
    cakeContainer.innerHTML = '<img id="cake" src="images/Cake.png" alt="Birthday Cake" style="width:150px; height:auto;">';
    
    // Assuming the candle images are named '1.png', '2.png', etc.
    const ageString = age.toString();
    console.log(ageString);
    for (let i = 0; i < ageString.length; i++) {
        let candleImg = document.createElement('img');
        candleImg.src = 'images/'+ageString[i] + '.png';
        candleImg.classList.add('candle');
        candleImg.style.width = '25px'; // Set the width of candles
        candleImg.style.height = 'auto';
        candleImg.style.top = '10%'; // Adjust the position as needed
        candleImg.style.left = (39 + i * 10) + '%'; // Adjust the position as needed
        cakeContainer.appendChild(candleImg);
    }
}


</script>


</body>
</html>
