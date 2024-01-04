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
        header("Location:add-more-kid.php");
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
   /* border-radius: 50%;*/
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
    font-size: 30px;

}

.addbutton{
width: 50px;
    height: 50px;
    background-color: black;
    color: white;
    text-align: center;
    display: block;
    border-radius: 50%;
    text-decoration: none;
    font-size: 45px;
    position: absolute;
    right: 0;
    left: 0;
    margin: auto;
    cursor: pointer;
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
  Select your kids hobbies
</div>

<div class="hobbies-section">
  <img src='images/kids-hobbies/Gardening.png' alt='gardening' style="animation: rubberBand 1s 0.5s forwards;" class='hobby'>
<img src='images/kids-hobbies/Playing Music.png' alt='playing-guitar' style="animation: rubberBand 1s 1.0s forwards;" class='hobby'>
<img src='images/kids-hobbies/Reading.png' alt='reading' style="animation: rubberBand 1s 1.5s forwards;" class='hobby'>
<img src='images/kids-hobbies/Cooking.png' alt='cooking' style="animation: rubberBand 1s 2.0s forwards;" class='hobby'>
<img src='images/kids-hobbies/Photography.png' alt='photography' style="animation: rubberBand 1s 2.5s forwards;" class='hobby'>
<img src='images/kids-hobbies/Fishing.png' alt='fishing' style="animation: rubberBand 1s 3.0s forwards;" class='hobby'>
<img src='images/kids-hobbies/Skateboarding.png' alt='skate-boarding' style="animation: rubberBand 1s 3.5s forwards;" class='hobby'>
<img src='images/kids-hobbies/Painting.png' alt='painting' style="animation: rubberBand 1s 4.0s forwards;" class='hobby'>
<img src='images/kids-hobbies/Dancing.png' alt='dancing' style="animation: rubberBand 1s 4.5s forwards;" class='hobby'>
<img src='images/kids-hobbies/Skating.png' alt='skating' style="animation: rubberBand 1s 5.0s forwards;" class='hobby'>
</div>
<button id="submitBtn" onclick="submitForm()">next</button>
<button class="addbutton" onclick="openModal()" >+</button>

<script>

 var hobbies = [];

 function openModal() {
  // Use SweetAlert to get the "others" hobby input
  Swal.fire({
    title: 'Specify Hobby',
    input: 'text',
    inputPlaceholder: 'Enter your hobby',
    showCancelButton: true,
    confirmButtonText: 'Submit',
    cancelButtonText: 'Cancel',
    inputValidator: (value) => {
      if (!value) {
        return 'You need to enter something!';
      }
    }
  }).then((result) => {
    if (result.isConfirmed) {
      // Push the entered value to the hobbies array
      hobbies.push(result.value.toLowerCase());
    }
  });
}

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
