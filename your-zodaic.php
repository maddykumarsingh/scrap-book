<?php
include_once "database.php";
session_start();


if (!isset($_SESSION["id"])) {
    header("Location:index.php");
}


// Given date
$date = $_SESSION['dob'];
$zodiacData = null;

// Extract month and day from the date
$month = date('m', strtotime($date));
$day = date('d', strtotime($date));

// SQL query
$sql = "SELECT *
        FROM ZodiacSigns
        WHERE
          (startMonth = $month AND startDay <= $day)
          OR
          (endMonth = $month AND endDay >= $day)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first row
    $zodiacData = $result->fetch_assoc();
} else {
    echo "No records found";
}

$conn->close();

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
    transform: translateY(100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
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
  background-image: url('images/white-background-with-spiral-pattern-center.png');
  background-size: cover;
}

#content {
  position: absolute;
  top:28%;
  left:40%;
  background-image: url('images/Ellipse 94.png');
  width: 350px; /* Adjust size as needed */
  height: 350px; /* Adjust size as needed */
  background-size: cover;
  animation: fadeIn 2s forwards;
z-index:100;
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
 @media screen and (max-width: 1000px) {
           #content {
    position: absolute;
    top: 10%;
    left: 35%;
     width: 300px; /* Adjust size as needed */
  height: 300px; /* Adjust size as needed */
}

#submitBtn {
  margin: 10px auto;
  top:71%;
}  
  h2.h2Class{
      margin:10px;
  }
        }
        
        
        
</style>
</head>
<body>

<!-- <div id="side1Image"></div>
<div id="side2Image"></div>
<div id="logo"></div>
<div id="content">
    <h2 id="name" style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:42px;">Zodaic Sign</h2>
    <p id="meaning" style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:24px; width: 80%; left: 10%; position: absolute;">Your name is wonderfully unique and carries a divine touch; you are a precious blessing.</p>
</div>

<a href="birth-date.php" id="submitBtn"></a>
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
    <h2 id="name" class="h2Class"><?=$zodiacData['sign']?></h2>
    <p id="meaning"  class="pClass"><?=$zodiacData['horoscopeText']?></p>
</div>




    </div>
    <a href="gender.php" id="submitBtn">next</a>
    
    <div class="bottomSection">
          <img src="images/side1.png" />
    </div>
    
    
</div>




<?php include_once 'orientation-check.php'; ?>
</body>
</html>
