<?php
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect additional data from this page
    $hobbies = $_POST["hobbies"];

    // Store data in the database
    $conn = new mysqli("localhost", "root", "root", "scrap_book" , 3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($_SESSION["id"]);
    $hobbies = $conn->real_escape_string($hobbies);

    $sql = "UPDATE person SET hobbies = '$hobbies' WHERE person_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location:favorite-foods.php");
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
<title>Hobbies and Passions</title>
<link rel="stylesheet" type="text/css"
    href="fonts/style.css"/>
<style>
    .container {
  display: flex;
  width: 100%;
}
body, html {
    height: 100%;
    margin: 0;
    background: url('images/Hobbies.png') no-repeat center center fixed; 
    background-size: cover;
  }

.left-section {
  width: 20%;
  /* additional styling */
}

.right-section {
  width: 80%;
}

.top-section {
  height: 15%;
  /* additional styling */
}

.bottom-section {
  height: 85%;
  display: flex;
  flex-wrap: wrap;
  gap: 10px; /* Adjust spacing between images */
  justify-content: center; /* Center images in the container */
  align-items: center;
}

.hobby-image {
  width: 100px; /* Adjust based on your image size */
  height: auto; /* Adjust based on your image size */
  margin: 5px;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  opacity: 0;
  transform: scale(0.5);
  animation: appearSequentially 0.3s ease forwards;
}

@keyframes appearSequentially {
  0% {
    opacity: 0;
    transform: translateX(-50px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

.selected {
  border: 3px solid red;
}
img {
height: auto;
width: 100%;
}
#submitBtn {
  display: block;
  margin: 20px auto;
  background-image: url('images/Icon\ awesome-chevron-circle-right.png');
  width: 50px; /* Adjust size as needed */
  height: 50px; /* Adjust size as needed */
  background-size: cover;
  border: none;
  cursor: pointer;
  position: absolute;
  top:80%;
  left:60%;
  background-color: transparent;
  }

</style>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="left-section">
    <!-- Content for the left section -->
  </div>
  <div class="right-section">
    <div class="top-section">
      <h2 style="text-align: center;font-family:'PF Handbook Pro Regular';font-weight:normal;font-size:42px;">Hobbies & Passion</h2>
    </div>
    <div class="bottom-section">
      <!-- Images will be loaded here -->
      <!-- Example for one image -->
      <div class="hobby-image" onclick="selectHobby(this , 'swimming')" style="animation-delay: 0.3s;">
        <img src="images/Swimming.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this , 'tv')" style="animation-delay: 0.6s;">
        <img src="images/TV.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this , 'reading')" style="animation-delay: 1.2s;">
        <img src="images/Reading.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'painting')" style="animation-delay: 1.5s;">
        <img src="images/Painting.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'photography')" style="animation-delay: 1.8s;">
        <img src="images/Photography.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'playing-guitar')" style="animation-delay: 2.1s;">
        <img src="images/Playing Guitar.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'poker')" style="animation-delay: 2.4s;">
        <img src="images/Poker.png"  alt="Hobby">
      </div>

      <div class="hobby-image" onclick="selectHobby(this , 'listening-music')" style="animation-delay: 2.7s;">
        <img src="images/Listening Music.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'kneading')" style="animation-delay: 3.0s;">
        <img src="images/Kneading.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this,'gaming')" style="animation-delay: 3.3s;">
        <img src="images/Gaming.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this,'gardening')" style="animation-delay: 3.6s;">
        <img src="images/Gardening.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'fishing')" style="animation-delay: 3.9s;">
        <img src="images/Fishing.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this ,'football')" style="animation-delay: 4.2s;">
        <img src="images/FootBall.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this,'camping')" style="animation-delay: 4.5s;">
        <img src="images/Camping.png"  alt="Hobby">
      </div>
    <div class="hobby-image" onclick="selectHobby(this ,'cooking')" style="animation-delay: 4.8s;">
        <img src="images/Cooking.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this,'cycling')" style="animation-delay: 5.1s;">
        <img src="images/Cycling.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this,'baking')" style="animation-delay: 5.4s;">
        <img src="images/Baking.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="selectHobby(this,'basket-ball')" style="animation-delay: 5.7s;">
        <img src="images/BasketBall.png"  alt="Hobby">
      </div>
      <div class="hobby-image" onclick="openModal()" style="animation-delay: 6.0s;">
        <img src="images/Please_Specify.png"  alt="Hobby">
      </div>
      <!-- Repeat for other images -->
    </div>
    <a onclick="submitForm()" id="submitBtn"></a>
  </div>
</div>


<script >

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


function selectHobby(element , hobby) {
  element.classList.toggle('selected');
  if (element.classList.contains('selected')) {
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
  dynamicForm.action = "hobbies.php";

  // Attach hobbies to the form as a hidden input
  var hobbiesInput = document.createElement("input");
  hobbiesInput.type = "hidden";
  hobbiesInput.name = "hobbies";
  hobbiesInput.value = hobbies.join(",");
  dynamicForm.appendChild(hobbiesInput);

  // Append the dynamic form to the body and submit it
  document.body.appendChild(dynamicForm);
  dynamicForm.submit();
}


</script>
</body>
</html>
