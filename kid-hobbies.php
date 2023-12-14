<?php
include "database.php";
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION["kid_id"])) {
  header("Location: kids-information.php");
  exit();
}



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect additional data from this page
    $hobbies = $_POST["kid_hobbies"];
    $id = $conn->real_escape_string($_SESSION["id"]);
    $kidID = $conn->real_escape_string($_SESSION["kid_id"]);
    $hobbies = $conn->real_escape_string($hobbies);

    $sql = "UPDATE kids SET hobbies = '$hobbies' WHERE person_id = '$id' AND kid_id = '$kidID'";

    if ($conn->query($sql) === TRUE) {
        header("Location:upload-image.php");
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
<title>Kids Hobbies</title>
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
  .header {
    text-align: center;
    color: white;
    padding: 20px;
    font-size: 24px;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
  }
  .hobbies-section {
    display: flex;
    flex-wrap: wrap;
    padding: 10px;
    justify-content: space-around;
    align-items: center;
    height: 70%;
  }
  .hobby {
    width: 200px; /* Adjust size as needed */
    height: 200px; /* Adjust size as needed */
    border-radius: 50%;
    margin: 10px;
    opacity: 0;
    transform: scale(0.5);
    transition: transform 0.5s, opacity 0.5s;
  }
  .hobby.selected {
    border: 5px solid red;
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
@keyframes rubberBand {
    from {
      transform: scale(0.5);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }
</style>
</head>
<body>

<div class="header">
  Select your kids hobbies & upload pictures
</div>

<div class="hobbies-section">
  <img src='images/Group 8251.png' alt='gardening' style="animation: rubberBand 1s 0.5s forwards;" class='hobby'>
<img src='images/Group 8252.png' alt='playing-guitar' style="animation: rubberBand 1s 1.0s forwards;" class='hobby'>
<img src='images/Group 8253.png' alt='reading' style="animation: rubberBand 1s 1.5s forwards;" class='hobby'>
<img src='images/Group 8254.png' alt='cooking' style="animation: rubberBand 1s 2.0s forwards;" class='hobby'>
<img src='images/Group 8255.png' alt='photography' style="animation: rubberBand 1s 2.5s forwards;" class='hobby'>
<img src='images/Group 8256.png' alt='fishing' style="animation: rubberBand 1s 3.0s forwards;" class='hobby'>
<img src='images/Group 8257.png' alt='skate-boarding' style="animation: rubberBand 1s 3.5s forwards;" class='hobby'>
<img src='images/Group 8258.png' alt='painting' style="animation: rubberBand 1s 4.0s forwards;" class='hobby'>
<img src='images/Group 8259.png' alt='music' style="animation: rubberBand 1s 4.5s forwards;" class='hobby'>
<img src='images/Group 8250.png' alt='skating' style="animation: rubberBand 1s 5.0s forwards;" class='hobby'>
</div>
<button id="submitBtn" onclick="submitForm()"></button>
<a href="kids-information.php">Add More Kids</a>

<script>

 var hobbies = [];

  // Function to toggle selection on hobby images
  function toggleSelection(event) {
    let hobby = event.target.alt;
    event.target.classList.toggle('selected');
    if (event.target.classList.contains('selected')) {
    hobbies.push(hobby);
  } else {
    // Remove the hobby if it was deselected
    const index = hobbies.indexOf(hobby);
    if (index !== -1) {
      hobbies.splice(index, 1);
    }
  }
  }

  function submitForm(){
  var dynamicForm = document.createElement("form");
  dynamicForm.id = "hobbiesForm";
  dynamicForm.method = "post";
  dynamicForm.action = "kid-hobbies.php";

  // Attach hobbies to the form as a hidden input
  var hobbiesInput = document.createElement("input");
  hobbiesInput.type = "hidden";
  hobbiesInput.name = "kid_hobbies";
  hobbiesInput.value = hobbies.join(",");
  dynamicForm.appendChild(hobbiesInput);

  // Append the dynamic form to the body and submit it
  document.body.appendChild(dynamicForm);
  dynamicForm.submit();
}

  // Add event listeners after the page loads
  window.onload = function() {
    var hobbiesElement = document.querySelectorAll('.hobby');
    hobbiesElement.forEach(function(hobby) {
      hobby.addEventListener('click', toggleSelection);
    });
  };
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
