<?php
include "database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];

    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;

    $first_name = $conn->real_escape_string($first_name);
    $last_name = $conn->real_escape_string($last_name);

    $sql = "INSERT INTO person (first_name, last_name) VALUES ('$first_name', '$last_name')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the id of the inserted record
        $id = $conn->insert_id;

        // Store the id in the session
        $_SESSION["id"] = $id;

        $conn->close();

        header("Location: step-3.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
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

body {
  margin: 0;
  height: 100vh;
  overflow: hidden;
  background-image: url('images/white-background-with-spiral-pattern-center.png');
  background-size: cover;
}

#content {
  position: absolute;
  top:40%;
  left:40%;
}
</style>
</head>
<body>

<div id="side1Image"></div>
<div id="side2Image"></div>
<div id="logo"></div>
<div id="content">
<form id='form' method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="text" name="first_name" required id="firstName" placeholder="First Name">
        <input type="text" id="lastName" name="last_name" required placeholder="Last Name">

        <!-- <input  id="submitBtn"  type="submit" > -->
        <a  href="#"  id="submitBtn"></a>
 </form>
 
 

</div>


<script>
   const submitButton = document.getElementById('submitBtn');
   submitButton.addEventListener('click', () => {
     const form = document.getElementById('form');
     form.submit();
   })
</script>

</body>
</html>
