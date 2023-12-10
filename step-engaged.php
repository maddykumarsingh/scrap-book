<?php
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $destination = $_POST["wedding_destination"]; // New field

    // Store data in the database
    $conn = new mysqli("localhost", "root", "root", "scrap_book" , 3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
<title>Wedding Destinations</title>
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
    height: 80%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    padding: 2%;
  }
  .option-button {
    background: none;
    border: none;
    cursor: pointer;
    transition: transform 0.3s ease;
    margin: 10px;
  }
  .option-button img {
    width: auto; /* Adjust the size as needed */
    height: 240px; /* Fixed height to maintain aspect ratio */
    margin: 10px;
  }
  #logo {
    background-image: url('images/ABC_Red.jpg');
    background-size: cover;
    width: 330px; /* Adjust size as needed */
    height: 70px;
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
</style>
</head>
<body>
  <div id="logo"></div>

<div class="header-section">
  <img src="images/Popular wedding destinations chosen by Indians in 2023.png" alt="Wedding Destinations Header" style="max-width: 80%; height: auto;">
</div>

<div class="options-section">
  <!-- Option buttons for destinations -->
  <button class="option-button" onclick="submitDestination('Kerala')">
    <img src="images/Mask Group 3.png" alt="Kerala">
  </button>
  <button class="option-button" onclick="submitDestination('Maldives')">
    <img src="images/Mask Group 4.png" alt="Maldives">
  </button>
  <button class="option-button" onclick="submitDestination('Goa')">
    <img src="images/Mask Group 5.png" alt="Goa">
  </button>
  <button class="option-button" onclick="submitDestination('Jaipur')">
    <img src="images/Mask Group 7.png" alt="Jaipur">
  </button>
  <button class="option-button" onclick="submitDestination('Udaipur')">
    <img src="images/Mask Group 8.png" alt="Udaipur">
  </button>
  <button class="option-button" onclick="submitDestination('Hometown')">
    <img src="images/Group 8145.png" alt="Hometown">
  </button>
</div>

<script>
function submitDestination(destination) {
  // Create a form element
  var form = document.createElement('form');
  form.method = 'post';
  form.action = 'step-engaged.php'; // Replace with your actual processing script

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

</body>
</html>
