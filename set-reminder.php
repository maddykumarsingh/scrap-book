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
    $email = $_POST["email"]; // New field

    // Convert the array to a comma-separated string

    // Store data in the database
    $conn = new mysqli("localhost", "root", "root", "scrap_book" , 3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($_SESSION["id"]);
    $email = $conn->real_escape_string($email); // New field

    $sql = "UPDATE person SET email = '$email' WHERE person_id = '$id'";

    if ($conn->query($sql) === TRUE) {
       header("Location:kids-information.php");
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

<title>Reminder Page</title>
<link rel="stylesheet" type="text/css"
href="fonts/style.css"/>
<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: 'PF Handbook Pro Bold';
  }
  body{
    background-image: url('images/white-background-with-spiral-pattern-center.png');
  }
  .container {
    display: flex;
    height: 100%;
  }
  .left-section {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    color: #fff; /* White or golden text */
  }
  .date-input {
    width: 80%;
    padding: 15px;
    margin: 20px 0;
    border: none;
    background: transparent;
    color: white;
    font-size: 1.5em;
    background-color: #c31d2e;
    border-radius: 10px;
  }
  .right-section {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .clock-gif {
    width: 80%;
    height: auto;
  }
  #logo {
    background-image: url('images/ABC_Red.jpg');
    background-size: cover;
    width: 330px; /* Adjust size as needed */
    height: 70px;
    position: absolute;
    top: 1%;
    right: 1%;
}
::placeholder {
  color: wheat;
  opacity: 1; /* Firefox */
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
  clear: both;
  background-color: transparent;

}
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }
  .modal-content {
    margin: 15% auto;
    padding: 20px;
    width: 50%;
    margin-top: 0%;
  }
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>
</head>
<body>
<div id="logo"></div>

<form id='form' method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<div class="container">
  <div class="left-section">
    <img src="images/reminder.png" alt="Reminder" style="width: 90%; max-width: 600px;">
    <input type="email" name="email" class="date-input" placeholder="Enter your email id for Notification">
    <button type="button" id="submitBtn" onclick="setReminder()"></button>
  </div>
  <div class="right-section">
    <img src="images/CLock-min (2).gif" alt="Clock" class="clock-gif">
  </div>
</div>
</form>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
    <img src="images/Notification-min.gif" alt="Notification" style="width:100%;height:auto;">
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('myModal');
  
  // Get the button that opens the modal
  var btn = document.getElementById('myBtn');
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName('close')[0];
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = 'none';
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }


  function setReminder(){
    document.getElementById('myModal').style.display='block';
    const form = document.getElementById('form');
    setTimeout(() => {
      form.submit();
    }, 2000);

  }

  </script>

</body>

</html>