<?php

session_start();

$personName = '';

if (isset($_SESSION["first_name"]) ) {
  $personName =$_SESSION["first_name"];
} 


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css"
    href="fonts/style.css"/>
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
  background-image: url('images/Icon awesome-chevron-circle-right.png');
  width: 50px; /* Adjust size as needed */
  height: 50px; /* Adjust size as needed */
  background-size: cover;
  border: none;
  cursor: pointer;
  position: absolute;
  top:75%;
  left:50%;
  background-color: transparent;
z-index:100;
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
    width: 150px;
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
    left: 40%;
     width: 250px; /* Adjust size as needed */
  height: 250px; /* Adjust size as needed */
}

#submitBtn {
  margin: 10px auto;
  top:71%;
}  
  
        }
        
        
        
</style>
</head>
<body>


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
    <h2 id="name" class="h2Class" ><?=$personName?></h2>
    <p id="meaning" class="pClass">Your name is wonderfully unique and carries a divine touch; you are a precious blessing.</p>
</div>

<a href="birth-date.php" id="submitBtn"></a>
    </div>
    
    
    <div class="bottomSection">
          <img src="images/side1.png" />
    </div>
    
    
</div>



<script>
// Fetch the information and update the 'meaning' element
function fetchAndDisplayMeaning() {
    const name = '<?=$personName?>'; // You can dynamically get the name from the server or user input

    fetch(`https://data-enrichment.myofficeengagements.com/scrap-book/name-meaning.php?name=${name}`)
        .then(response => response.text())
        .then(data => {
            // Update the 'meaning' element with the fetched data
            console.log(data);
            document.getElementById('meaning').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

// Call the function when the page loads
window.onload = function() {
    fetchAndDisplayMeaning();
};
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
