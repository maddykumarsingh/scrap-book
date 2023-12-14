<?php
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

    // Store data in the database
    $conn = new mysqli("localhost", "dataenrichmentmy_root", "rYE*VydaV.#U", "dataenrichmentmy_scrap_book" , 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

  <form  class="content" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> 
    <input type="text" name="kid_name" class="input-field" placeholder="Your Kid's Name">
    <input type="number" name="kid_age" class="input-field" placeholder="Age">
    <button id="nextButton" onclick="goToNextPage()">Next</button>
  </form>



</body>
</html>
