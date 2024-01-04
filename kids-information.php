<?php
include "database.php";
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $kidName = $_POST["kid_name"]; // New field
    $kidAge = (int) $_POST["kid_age"];   // New field

    $_SESSION["kid_name"] = $kidName;


    $id = $conn->real_escape_string($_SESSION["id"]);
    $kidName = $conn->real_escape_string($kidName); // New field
    $kidAge = $conn->real_escape_string($kidAge);   // New field

    $sql = "INSERT INTO kids (person_id, `name`, age) VALUES ('$id', '$kidName', '$kidAge')";

    if ($conn->query($sql) === TRUE) {
      $kidId = $conn->insert_id;

      // Store kid_id in the session
      $_SESSION["kid_id"] = $kidId;
       header("Location:kid-overview.php");
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
<title>Kids Information</title>
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
  .content {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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
</style>
</head>
<body>

  <form id="form" class="content" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> 
    <input type="text" name="kid_name" class="input-field" placeholder="Your Kid's Name" id="kidName">
    <input type="number" name="kid_age" class="input-field" placeholder="Age" id="kidAge">
    <button type="button" id="nextButton" onclick="goToNextPage()">Next</button>
    <a style="padding:5px 10px; margin:10px ; background:white; border-radius:10px;" href="hobbies.php">Skip</a>
  </form>



  <script>
    function validateForm() {
      var kidName = document.getElementById('kidName').value;
      var kidAge = document.getElementById('kidAge').value;

      // Validate Kid's Name
      if (kidName.trim() === "") {
        Swal.fire({
            title: 'Invalid Kid Name',
            text: 'Please enter valid kid name.',
            icon: 'error',
            confirmButtonText: 'OK',
        });
        return false;
      }

      // Validate Age
      if (isNaN(kidAge) || kidAge <= 0) {
        Swal.fire({
            title: 'Invalid Kid Age',
            text: 'Please enter a valid age for your Kid.',
            icon: 'error',
            confirmButtonText: 'OK',
        });
        return false;
      }

      return true;
    }

   function goToNextPage(){
     if( validateForm()){
        document.getElementById('form').submit();
     }
   }
  </script>

  <?php include_once 'orientation-check.php'; ?>

</body>
</html>
