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
  <?php include_once 'orientation-check.php'; ?>
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
  background-image: url('images/Icon awesome-chevron-circle-right.png');
  background-color: none;
  width: 50px; /* Adjust size as needed */
  height: 50px; /* Adjust size as needed */
  background-size: cover;
  border: none;
  cursor: pointer;
  position: absolute;
  top: 18%;
  left: 85%;
  background-color: transparent;
z-index:100;
}

body {
  margin: 0;
  height: 100vh;
  overflow: hidden;
  background-image: url('images/background.png');
  background-size: cover;
}

#content {
  position: absolute;
  top: 28%;
  left: 40%;
  width: 350px; /* Adjust size as needed */
  height: 350px; /* Adjust size as needed */
  background-size: cover;
  animation: fadeIn 2s forwards;
}

#cakeContainer {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
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
           #content {
    position: absolute;
    top: 10%;
    left: 40%;
     width: 250px; /* Adjust size as needed */
  height: 250px; /* Adjust size as needed */
}

#submitBtn {
  margin: 10px auto;
  top:71%;
}  

label.labelClass{
     margin-left: 20px;
    font-size:22px;
}

input[type=date] {
    display: block;
    margin: 20px auto;
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
        <input type="date" id="dob" name="dob" required onchange="calculateAge()">
        <button type="submit" id="submitBtn" ></button>
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
    for (let i = 0; i < ageString.length; i++) {
        let candleImg = document.createElement('img');
        candleImg.src = 'images/'+ageString[i] + '.png';
        candleImg.classList.add('candle');
        candleImg.style.width = '25px'; // Set the width of candles
        candleImg.style.height = 'auto';
        candleImg.style.top = '10%'; // Adjust the position as needed
        candleImg.style.left = (40 + i * 10) + '%'; // Adjust the position as needed
        cakeContainer.appendChild(candleImg);
    }
}


</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
