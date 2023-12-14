
<?php 
include 'database.php';
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $wish = $_POST["wish"];


  $id = $conn->real_escape_string($_SESSION["id"]);
  $wish = $conn->real_escape_string($wish);

  $sql = "UPDATE person SET wish = '$wish' WHERE person_id = '$id'";

  if ($conn->query($sql) === TRUE) {
       header('Location: gender.php');
  } else {
     
  }

  $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Birthday Wish</title>
<link rel="stylesheet" type="text/css"
href="/home/dataenrichmentmy/public_html/scrap-book/fonts/style.css"/>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-image: url('images/background.png');
    background-size: cover;
    text-align: center;
    padding-top: 50px;
  }
  #birthdayText {
    font-size: 42px;
    margin-bottom: 20px;
    height: 45px; /* Set the height to the line height to prevent jumping */
    overflow: hidden; /* Hide the overflow text */
   font-family:'PF Handbook Pro Bold';
  }
  .letter {
    opacity: 0;
    display: inline-block;
    position: relative;
    animation: fadeIn 0.3s forwards;
    /* Animation delay will be set by JavaScript */
  }
  input[type=text] {
  display: block;
  margin: 20px auto;
  background-color: #fcf8e8;
  color: #baa78c;
  font-size: 20px;
  border: 1px solid #baa78c;
  padding: 5px;
  border-radius: 5px;
}
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateX(-20px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  #wishInput {
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    padding: 10px;
    width: 450px; /* Set the width of the input box */
    position: absolute;
    top: 30%;
    left: 35%;
  }
  #submitBtn {
    background-image: url('images/Icon awesome-chevron-circle-right.png');
    background-size: cover;
    border: none;
    width: 50px;
    height: 50px;
    cursor: pointer;
    margin-left: 10px;
    position: absolute;
    top: 32%;
    left: 70%;
    background-color: transparent;

  }
  #giftGif {
    position: absolute;
    width: 50%;
    top: 45%;
    left:25%;
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
</style>
</head>
<body>
  <div id="logo"></div>

<div id="birthdayText"></div>
<form  method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <input type="text" id="wishInput" maxlength="250" name="wish" placeholder="Enter your wish...">
   <button type="submit" id="submitBtn"></button>

</form>
<img src="images/Gift-min (1).gif" alt="Gift" id="giftGif">

<script>
  const targetText = "What would you like for your birthday?";
  const container = document.getElementById('birthdayText');
  let delay = 0;

  // Create a span for each character in the target text, including spaces
  targetText.split('').forEach((char, index) => {
    const span = document.createElement('span');
    span.classList.add('letter');
    span.style.animationDelay = `${delay}s`;
    span.textContent = char === ' ' ? ' ' : char; // Use a non-breaking space for spaces
    container.appendChild(span);
    delay += 0.1; // Increment the delay for each letter and speed up the animation
  });

  // Set the max animation delay to ensure the gif appears after the text animation
  const gifDelay = targetText.length * 0.1; // Adjusted to match the new animation speed
  const giftGif = document.getElementById('giftGif');
  giftGif.style.animation = `fadeIn 0.3s ${gifDelay}s forwards`;
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
