<?php

session_start();

$personName = 'Nitin';

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
    transform: translate(100%, 100%);
    opacity: 0;
  }
  to {
    transform: translate(0, 0);
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

}

</style>
</head>
<body>

<div id="side1Image"></div>
<div id="side2Image"></div>
<div id="logo"></div>
<div id="content">
    <h2 id="name" style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:42px;"><?=$personName?></h2>
    <p id="meaning" style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:24px; width: 80%; left: 10%; position: absolute;">Your name is wonderfully unique and carries a divine touch; you are a precious blessing.</p>
</div>

<a href="your-zodaic.php" id="submitBtn"></a>

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
