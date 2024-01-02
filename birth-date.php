<?php 
include_once "database.php";
session_start();

if (!isset($_SESSION["id"])) {
    header("Location:index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $birthdate = $_POST["dob"];
  $_SESSION['dob'] =  $birthdate;

  $id = $conn->real_escape_string($_SESSION["id"]);
  $birthdate = $conn->real_escape_string($birthdate);

  $sql = "UPDATE person SET birthdate = '$birthdate' WHERE person_id = '$id'";

  if ($conn->query($sql) === TRUE) {
       header('Location:your-zodaic.php');
  } else {
     
  }

  $conn->close();
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css"
    href="fonts/style.css"/>
  <?php include_once 'orientation-check.php'; ?>
<style>
@keyframes flyInFromTopLeft {
  from {
    transform: translate(-100%, -100%);
    opacity: 0;
  }
  to {
    transform: translate(0, 0);
    opacity: 1;
  }
}

@keyframes flyInFromBottomRight {
  from {
    transform: translate(100%, 100%);
    opacity: 0;
  }
  to {
    transform: translate(0, 0);
    opacity: 1;
  }
}
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

#side1Image {
  background-image: url('images/side1.png');
  position: absolute;
  bottom: 0;
  right: 0;
  width: 60%; /* Adjust size as needed */
  height: 50%; /* Adjust size as needed */
  background-size: cover;
  animation: flyInFromBottomRight 2s forwards;
  margin-bottom: -2%;
}

#side2Image {
  background-image: url('images/side2.png');
  position: absolute;
  top: 0;
  left: 0;
  width: 60%; /* Adjust size as needed */
  height: 50%; /* Adjust size as needed */
  background-size: cover;
  animation: flyInFromTopLeft 2s forwards;
}

#logo {
  background-image: url('images/ABC_Red.jpg');
  position: absolute;
  top: 25px;
  right: 25px;

  width: 330px; /* Adjust size as needed */
  height: 70px; /* Adjust size as needed */
  background-size: cover;
}

#submitBtn {
  display: block;
  margin: 20px auto;
  background-image: url('images/Icon awesome-chevron-circle-right.png');
  background-color: none;
  width: 50px; /* Adjust size as needed */
  height: 50px; /* Adjust size as needed */
  background-size: cover;
  border: none;
  cursor: pointer;
  position: absolute;
  top: 18%;
  left: 85%;
  background-color: transparent;

}

body {
  margin: 0;
  height: 100vh;
  overflow: hidden;
  background-image: url('images/background.png');
  background-size: cover;
}

#content {
  position: absolute;
  top: 28%;
  left: 40%;
  width: 350px; /* Adjust size as needed */
  height: 350px; /* Adjust size as needed */
  background-size: cover;
  animation: fadeIn 2s forwards;
}

#cakeContainer {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.candle {
    position: absolute;
    /* positions will be set dynamically with JavaScript */
}

input[type=date] {
    display: block;
    margin: 50px auto;
    background-color: #fcf8e8;
    color: #baa78c;
    font-size: 20px;
    border: 1px solid #baa78c;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
}
</style>
</head>
<body>
<div id="side1Image"></div>
<div id="side2Image"></div>
<div id="logo"></div>
<div id="content">
    <div>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="dob" style="text-align: center; margin-left: 50px; font-family:'PF Handbook Pro Regular'; font-weight:normal; font-size:32px;">Enter your date of birth</label><br/>
        <input type="date" id="dob" name="dob" onchange="calculateAge()">
        <button type="submit" id="submitBtn" ></button>
    </form>
    </div>
    <div id="cakeContainer">
        <img id="cake" src="images/Cake.png" alt="Birthday Cake" style="width:150px; height:auto;">
    </div>
</div>
<script>
function calculateAge() {
    var dob = document.getElementById('dob').value;
    var today = new Date();
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    displayCakeAndCandles(age);
}

function displayCakeAndCandles(age) {
    const cakeContainer = document.getElementById('cakeContainer');
    cakeContainer.innerHTML = '<img id="cake" src="images/Cake.png" alt="Birthday Cake" style="width:150px; height:auto;">';
    
    // Assuming the candle images are named '1.png', '2.png', etc.
    const ageString = age.toString();
    for (let i = 0; i < ageString.length; i++) {
        let candleImg = document.createElement('img');
        candleImg.src = 'images/'+ageString[i] + '.png';
        candleImg.classList.add('candle');
        candleImg.style.width = '25px'; // Set the width of candles
        candleImg.style.height = 'auto';
        candleImg.style.top = '10%'; // Adjust the position as needed
        candleImg.style.left = (40 + i * 10) + '%'; // Adjust the position as needed
        cakeContainer.appendChild(candleImg);
    }
}

function redirectToNextPage() {
    // Redirect to the next page (replace 'nextPage.html' with the actual URL)
    window.location.href = 'step5.html';
}
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
