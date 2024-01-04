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
    // Collect additional data from this page
    $email = $_POST["email"]; // New field
    $anniversaryDate = $_POST["anniversary_date"]; //


    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<span style='color:red;'>Invalid email format</span>";
    
    }

  // Validate anniversary date
  else if (!isValidDate($anniversaryDate)) {
      echo "<span style='color:red;'>Required anniversary date </span>";
  }

  else {
    $id = $conn->real_escape_string($_SESSION["id"]);
    $email = $conn->real_escape_string($email); // New field

    $sql = "UPDATE person SET email = '$email', anniversary_date = '$anniversaryDate' WHERE person_id = '$id'";

    if ($conn->query($sql) === TRUE) {
       header("Location:kids-information.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }



   
}

function isValidDate($date)
{
    $dateFormat = 'Y-m-d'; // Define the expected date format
    $dateTime = DateTime::createFromFormat($dateFormat, $date);
    return $dateTime && $dateTime->format($dateFormat) === $date;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    background-image: url('images/logo.png');
    background-size: contain;
    background-repeat: no-repeat;
    width: 120px; /* Adjust size as needed */
    height: 120px;
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
    font-size: 32px;
    line-height: 48px;
    text-decoration: none;
    font-family: sans-serif;
    text-align: center;
    z-index:10;
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
  
   @media screen and (max-width: 1000px) {
     #logo {
   
    width: 60px; /* Adjust size as needed */
    height: 60px;
     }
     .clock-gif {
    width: 68%;
    height: auto;
}
.date-input {
    padding: 8px;
    margin: 10px 0;
    font-size:1em;
}

 #submitBtn {
     display: block;
    margin: 20px auto;
    width: 120px;
    height: 30px;
    background-size: cover;
    border: none;
    cursor: pointer;
    position: absolute;
    bottom: 2%;
    right: 3%;
    background-color: black;
    border-radius: 20px;
    color: white;
    font-size: 22px;
    line-height: 28px;
    text-decoration: none;
    font-family: sans-serif;
    text-align: center;
    z-index:10;
}
   }
</style>
</head>
<body>
<div id="logo"></div>

<form id='form' method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<div class="container">
  <div class="left-section">
    <input type="date" name="anniversary_date"  class="date-input" placeholder="Enter your Anniversary Date"  id="anniversary_date" max="<?php echo date('Y-m-d'); ?>">
    <input type="email" name="email" class="date-input"  placeholder="Enter your email id for Notification" id="email">
    <img src="images/reminder.png" alt="Reminder" style="width: 90%; max-width: 600px;">
    <button type="button" id="submitBtn" onclick="setReminder()">next</button>
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


  function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

  function validateDate(date) {
      var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
      return dateRegex.test(date);
  }


  function validateForm() {
            var email = document.getElementById('email').value;
            var anniversaryDate = document.getElementById('anniversary_date').value;

            // Validate email
            if (!validateEmail(email)) {
              Swal.fire({
            title: 'Invalid Email',
            text: 'Please enter valid email.',
            icon: 'warning',
            confirmButtonText: 'OK',
        });
                return false;
            }

            // Validate anniversary date
            if (!validateDate(anniversaryDate)) {
              Swal.fire({
            title: 'Invalid Anniversary Date',
            text: 'Please select valid anniversary date.',
            icon: 'warning',
            confirmButtonText: 'OK',
        });
                return false;
            }

            return true;
  }

  function setReminder(){
    if( validateForm()){
      document.getElementById('myModal').style.display='block';
      const form = document.getElementById('form');
      setTimeout(() => {
        form.submit();
      }, 2000);
    }

  }

  </script>
<?php include_once 'orientation-check.php'; ?>
</body>

</html>
