<?php 
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $gender = $_POST["gender"];

  $conn = new mysqli("localhost", "dataenrichmentmy_root", "rYE*VydaV.#U", "dataenrichmentmy_scrap_book" , 3307);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $id = $conn->real_escape_string($_SESSION["id"]);
  $gender = $conn->real_escape_string($gender);

  $sql = "UPDATE person SET gender = '$gender' WHERE person_id = '$id'";

  if ($conn->query($sql) === TRUE) {
       header('Location: step-7.php');
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

body {
  margin: 0;
  height: 100vh;
  overflow: hidden;
  background-image: url('images/white-background-with-spiral-pattern-center.png');
  background-size: cover;
}

.gender-button {
    background-size: contain;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    width: 250px; /* Adjust as necessary */
    height: 250px; /* Adjust as necessary */
    margin: 10px;
    background-color: transparent;

  }
  #male {
    background-image: url('images/Male.png');
  }
  #female {
    background-image: url('images/Female.png');
  }
  #nonbinary {
    background-image: url('images/Others.png');
  }
  #content {
  position: absolute;
  top:35%;
  left:24%;
  background-size: cover;
  animation: fadeIn 2s forwards;
  text-align: center;
  }
  #name {
  position: absolute;
  top:20%;
  left:45%;
  }
  

</style>
</head>
<body>
    <div id="side1Image"></div>
    <div id="side2Image"></div>
    <div id="logo"></div>
    <h2 id="name" style="text-align: center;font-family:'PF Handbook Pro Bold';font-weight:normal;font-size:42px; color: red;">Select Gender</h2>
    <div id="content">
        <button id="female" class="gender-button" onclick="selectGender('female')"></button>
        <button id="male" class="gender-button" onclick="selectGender('male')"></button>
        <button id="nonbinary" class="gender-button" onclick="selectGender('nonbinary')"></button>
    </div>
    <script>
      let selectedGender = '';
      let parentNode = document.getElementById('content');
    
      function selectGender(gender) {
        selectedGender = gender;
        // Reset all buttons to unselected state
        document.querySelectorAll('.gender-button').forEach(button => {
          button.style.opacity = '0.6';
        });
        // Highlight the selected button
        document.getElementById(gender).style.opacity = '1';
        setTimeout( () => {
          nextStep( gender );
        } , 400)
      }


      function nextStep( gender ){
        var form = document.createElement("form");
          form.id = "form";
          form.method = "post";
          form.action = "<?=$_SERVER["PHP_SELF"]?>";
        var inputField = document.createElement("input");
        inputField.type = "hidden";
        inputField.name = 'gender';
        inputField.value = gender ;
        form.appendChild(inputField);
        parentNode.appendChild(form);
         form.submit();
      }

    </script>
    
</body>
</html>
