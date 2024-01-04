<?php
include "database.php";
 
 session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}


 $kidName = isset($_SESSION["kid_name"])?$_SESSION["kid_name"]:'';


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ABSLI data enrichment">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title> ABSLI | Data Enrichment</title>
 <link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css"
    href="fonts/style.css"/>
<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/Kids_BG.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
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
  .input-field {
    width: 50%;
    padding: 15px;
    margin: 10px 0;
    font-size: 1.5em;
    border-radius: 5px;
    border: 2px solid #ddd;
  }
  #nextButton {
    padding: 10px 20px;
    font-size: 1.2em;
    margin-top: 20px;
    border-radius: 5px;
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    border: none;
  }

  #submitBtn {
  display: block;
  margin: 20px auto;
  background-image: url('images/Next Icon.png');
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
#logo {
  background-image: url('images/logo.png');
    background-size: contain;
    background-repeat: no-repeat;
    width: 120px; /* Adjust size as needed */
    height: 120px;
    position: absolute;
    top: 1%;
    right: 1%;
}
</style>
</head>
<body>

<div id="logo"></div>
<div id="content">
    <h2 id="name" style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:42px;"><?=$kidName?></h2>
    <p id="meaning" style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:24px; width: 80%; left: 10%; position: absolute;">Your name is wonderfully unique and carries a divine touch; you are a precious blessing.</p>
</div>
<a href="kid-hobbies.php" id="submitBtn"></a>


<script>
// Fetch the information and update the 'meaning' element
function fetchAndDisplayMeaning() {
    const name = '<?=$kidName?>'; // You can dynamically get the name from the server or user input

    fetch(`https://data-enrichment.myofficeengagements.com/name-meaning.php?name=${name}`)
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
