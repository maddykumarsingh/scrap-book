<?php 
include 'database.php';
session_start();



if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $martial = $_POST["martial"];

 

  $id = $conn->real_escape_string($_SESSION["id"]);
  $martial = $conn->real_escape_string($martial);

  $sql = "UPDATE person SET marital_status = '$martial' WHERE person_id = '$id'";

  if ($conn->query($sql) === TRUE) {
    if($martial === 'single'){
      header('Location:time-well-spend.php');
    }
    elseif( $martial === 'engaged'){
      header('Location:wedding-destination.php');
    }
    elseif( $martial === 'married'){
      header('Location:movie-recommendations.php');
    }
  } else {
     
  }

  $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ABSLI data enrichment">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title> ABSLI | Data Enrichment</title>
 <link rel="icon" href="favicon.ico" type="image/x-icon">
<style>
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('images/white-background-with-spiral-pattern-center.png');

  }
  #logo {
       background-image: url(images/logo.png);
    background-size: contain;
    background-repeat: no-repeat;
    width: 120px;
    height: 120px;
    float: right;
    margin: 30px;
    clear: both;
  }
  .status-button {
    border: none;
    width: 431px; /* Adjust as needed */
    height: 99px; /* Adjust as needed */
    cursor: pointer;
    display: block;
    margin: 50px auto; /* Center buttons horizontally */
    background-size: cover;
    background-repeat: no-repeat;
    background-color: transparent;
    clear: both;
    animation: fadeIn 4s forwards;


  }
  #single {
    background-image: url('images/Single White.png');
  }
  #engaged {
    background-image: url('images/Engaged_White.png');
  }
  #married {
    background-image: url('images/Married_White.png');
  }
  
   @media screen and (max-width: 1000px) {
       
       
        #logo {
    width: 80px;
    height: 80px;
    margin: 20px;
  }
  .status-button {
      position:relative;
      top:-80px;
    border: none;
    width: 231px; /* Adjust as needed */
    height: 59px; /* Adjust as needed */
    margin: 10px auto;
  }
   #single {
    background-image: url('images/Single White.png');
     background-size: cover;
    background-repeat: no-repeat;
  }
  #engaged {
    background-image: url('images/Engaged_White.png');
     background-size: cover;
    background-repeat: no-repeat;
  }
  #married {
    background-image: url('images/Married_White.png');
     background-size: cover;
    background-repeat: no-repeat;
  }
   }
</style>
</head>
<body>

<div id="logo"></div>

<button id="single" class="status-button" onclick="selectStatus('single')"></button>
<button id="engaged" class="status-button" onclick="selectStatus('engaged')"></button>
<button id="married" class="status-button" onclick="selectStatus('married')"></button>

<script>
  function selectStatus(status) {
    // Reset all buttons to white image
    document.getElementById('single').style.backgroundImage = "url('images/Single White.png')";
    document.getElementById('engaged').style.backgroundImage = "url('images/Engaged_White.png')";
    document.getElementById('married').style.backgroundImage = "url('images/Married_White.png')";

    // Change the selected button to colored image
    var selectedImage = '';
    switch (status) {
      case 'single':
        selectedImage = 'images/Single_SelectColor.png';
         nextStep('single');
        break;
      case 'engaged':
        selectedImage = 'images/Engaged_SelectColor.png';
        nextStep('engaged');
        break;
      case 'married':
        selectedImage = 'images/Married_SelectColor.png';
        nextStep('married');
        break;
    }
    document.getElementById(status).style.backgroundImage = "url('" + selectedImage + "')";
  }

 function nextStep(selectedStatus) {
     if( selectedStatus ){
      setTimeout(() => {

        var form = document.createElement("form");
          form.id = "form";
          form.method = "post";
          form.action = "<?=$_SERVER["PHP_SELF"]?>";
        var inputField = document.createElement("input");
        inputField.type = "hidden";
        inputField.name = 'martial';
        inputField.value = selectedStatus ;
        form.appendChild(inputField);
        document.body.appendChild(form);
         form.submit();

      } , 400 );
     }
  }
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
