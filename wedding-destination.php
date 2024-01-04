<?php
include 'database.php';
session_start();


// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $destination = $_POST["wedding_destination"]; // New field

    $id = $conn->real_escape_string($_SESSION["id"]);
    $destination = $conn->real_escape_string($destination); // New field

    $sql = "UPDATE person SET  wedding_destination = '$destination' WHERE person_id = '$id'";

    if ($conn->query($sql) === TRUE) {
       header("Location:hobbies.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
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
<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/Group 8146.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
  .header-section {
    height: 15%;
    display: flex;
    justify-content: center;
    align-items: center;
    clear: both;
  }
  .options-section {
       height: auto;
    display: block;
    padding: 2%;
    width: 84%;
    overflow: hidden;
    text-align: center;
    margin: auto;
  }
  .option-button {
      background: none;
    border: none;
    cursor: pointer;
    transition: transform 0.3s ease;
    margin: 20px;
    width: 180px;
  }
  .option-button img {
      width: 100%;
    max-width: 100%;
    height: auto;
  }
  #logo {
    background-image: url('images/logo.png');
    background-size: contain;
    background-repeat:no-repeat;
    width: 120px; /* Adjust size as needed */
    height: 120px;
    margin: 5px;
    clear: both;
    float: right;
}
  .option-button:hover {
    transform: scale(1.1);
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
  background-color: transparent;
}

img.imgclass{
    max-width: 60%; width:60%; height: auto;
}

 @media screen and (max-width: 1000px) {
     
     
     img.imgclass{
  position:relative;
  top:-80px;
}
.option-button {
    
    margin: 10px;
    width: 110px;
  }
 .options-section {
     position:relative;
  top:-80px;
 }
 }
</style>
</head>
<body>
  <div id="logo"></div>

<div class="header-section">
  <img src="images/Popular wedding destinations chosen by Indians in 2023.png" alt="Wedding Destinations Header" class="imgclass" />
</div>

<div class="options-section">
  <!-- Option buttons for destinations -->
  <button class="option-button" onclick="submitDestination('Kerala')">
    <img src="images/Kerala.png" alt="Kerala">
  </button>
  <button class="option-button" onclick="submitDestination('Maldives')">
    <img src="images/Maldives.png" alt="Maldives">
  </button>
  <button class="option-button" onclick="submitDestination('Goa')">
    <img src="images/Goa.png" alt="Goa">
  </button>
  <button class="option-button" onclick="submitDestination('Jodhpur')">
    <img src="images/Jodhpur.png" alt="Jaipur">
  </button>
  <button class="option-button" onclick="submitDestination('Udaipur')">
    <img src="images/Udaipur.png" alt="Udaipur">
  </button>
  <button class="option-button" onclick="submitDestination('Hometown')">
    <img src="images/Hometown.png" alt="Hometown">
  </button>
</div>

<script>
function submitDestination(destination) {
  // Create a form element
  var form = document.createElement('form');
  form.method = 'post';
  form.action = '<?php $_SERVER['SELF']?>'; // Replace with your actual processing script

  // Add a hidden input with the destination value
  var input = document.createElement('input');
  input.type = 'hidden';
  input.name = 'wedding_destination';
  input.value = destination.toLowerCase();

  // Append the input to the form
  form.appendChild(input);

  // Append the form to the body
  document.body.appendChild(form);

  // Submit the form
  form.submit();
}
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
