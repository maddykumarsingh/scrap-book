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



    // PHP validation
    if (empty($first_name) || empty($last_name)) {
        echo "Please enter both first and last names.";
        return;
    }

    $sql = "INSERT INTO person (first_name, last_name) VALUES ('$first_name', '$last_name')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the id of the inserted record
        $id = $conn->insert_id;

        // Store the id in the session
        $_SESSION["id"] = $id;

        $conn->close();

        header("Location:your-name-meaning.php");
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
    transform: translateY(100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
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
    background-size: contain;
  background-repeat: no-repeat;
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
  background-size: contain;
  background-repeat: no-repeat;
  animation: flyInFromTopLeft 2s forwards;
}

#logo {
 /* background-image: url('images/ABC_Red.jpg');*/
   background-image: url('images/logo.png');
  position: absolute;
    top: 25px;
    right: 44px;
    width: 140px; 
    height: 140px;
    background-size: contain;
    background-repeat: no-repeat;
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
  width:100%;
}

#content {
  position: absolute;
  top:40%;
  left:40%;
      z-index: 100;
}

.entername{
        font-size: 30px;

    
}

.entername p{
    margin:0px;
        font-family: sans-serif;
}


/* Media query for screens below 800px width */
@media screen and (max-width: 900px) and (max-height: 500px) and (orientation: landscape) {
 .entername{
        font-size: 20px;
}
}



.pageContainer{
    height: 100%;
    margin: 0;
   width:100%;
   position:relativ;
}
.topContent{
       width: 100%;
    overflow: hidden;
    display: block;
    float: left;
       
}

.topImage{
    float:left;
    
      position: relative;

  background-repeat: no-repeat;
  animation: flyInFromTopLeft 2s forwards;
      width: 40%;
}

.topImage img{
width:100%;
max-width:100%;
}

 .logo-page{
float: right;
text-align:left;
}

.logo-page img{
          float: right;
    text-align: right;
    width: 80px;
    margin: 10px;
 
}


.bottomSection{
    clear:both;
    position: absolute;
     width: 100%;
     float:right;
    display: block;
    text-align: end;
    overflow: hidden;
    bottom: 0;
    right:0;
     animation: flyInFromBottomRight 2s forwards;
}

.bottomSection img{
  width:40%;
}


 @media screen and (max-width: 1000px) {
           #content {
    position: absolute;
    top: 26%;
    left: 40%;
}

.bottomSection{
    position: realtive;
   
   
}


        }
        
        
        
/* .logo-page{
        float: right;
    position: relative;
    right: 0;
        width: 50%;
}

.logo-page img{
          float: right;
    text-align: right;
    width: 150px;
    margin: 10px;
 
}

.bottomSection{
       position: absolute;
    bottom: 0px;
    animation: flyInFromBottomRight 2s forwards;
    right: 0;
    width: 100%;
    float: right;
    width: 50%;
}

.bottomSection img{
        float: right;
        width:100%;
max-width:100%;
} */
</style>
</head>
<body>

<!--<div id="side1Image"></div>
<div id="side2Image"></div>
<div id="logo"></div> -->

<div class="pageContainer">
    <div class="topContent">
    <div class="topImage">
        <img src="images/side2.png" />
    </div>
    
    <div class="logo-page">
        <img src="images/logo.png" />
    </div>
    </div>
    
    
    <div class="centerSection">
         <div id="content">
    
   <div class="entername"> <p>Enter your Name</p> </div>
<form id='form' method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="text" name="first_name" required id="firstName" placeholder="First Name">
        <input type="text" id="lastName" name="last_name" required placeholder="Last Name">

       <!--  <input  id="submitBtn"  type="submit" >  -->
        <a  href="#"  id="submitBtn"></a>
 </form>
 
 

</div>
    </div>
    
    
    <div class="bottomSection">
          <img src="images/side1.png" />
    </div>
    
    
</div>




<script>
   const submitButton = document.getElementById('submitBtn');
   submitButton.addEventListener('click', () => {
     const form = document.getElementById('form');
     const firstNameInput = document.getElementById('firstName');
     const lastNameInput = document.getElementById('lastName');

     if (firstNameInput.value.trim() === '' || lastNameInput.value.trim() === '') {
        Swal.fire({
            title: 'Validation Error',
            text: 'Please enter both First and Last names.',
            icon: 'error',
            confirmButtonText: 'OK',
        });
        event.preventDefault(); // Prevent form submission
     }
     else form.submit();
   })
</script>

<?php include_once 'orientation-check.php'; ?>
</body>
</html>
