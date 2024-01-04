<?php
include "database.php";
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect favorite foods from the submitted form
    $favoriteFoods = $_POST["favorite_foods"];
    
    // Convert the array to a comma-separated string
    $favoriteFoodsString = implode(',', $favoriteFoods);


    $id = $conn->real_escape_string($_SESSION["id"]);
    $favoriteFoodsString = $conn->real_escape_string($favoriteFoodsString);

    $sql = "UPDATE person SET  favorite_food = '$favoriteFoodsString' WHERE person_id = '$id'";

    if ($conn->query($sql) === TRUE) {
       header("Location:iconic-star.php");
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
    <link rel="stylesheet" type="text/css" href="fonts/style.css"/>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'PF Handbook Pro Regular';
        }

        .background {
            background-image: url('images/Food_BG.png');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
        }

        .input-area {
              position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    height: 66%;
    width: 100%;
    padding-top: 60%;
        }

        .input-field {
            padding: 10px;
            margin-right: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .add-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: red;
            color: white;
            cursor: pointer;
        }

        .input-group {
            margin-bottom: 10px;
        }

        .remove-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #ff6f61;
            color: white;
            cursor: pointer;
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
        
         h2.classh2{
     font-size: 50px; font-weight:bold;
  }
  @media screen and (max-width: 1000px) {
     h2.classh2{
     font-size:22px;
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

 .input-area {
              position: absolute;
  
    padding-top: 50%;
        }
        
        
        
 }
  
    </style>
</head>
<body onload="addInputField()">

<div class="background">
    <div class="input-area">
        <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div id="inputContainer">
                <!-- Initial input group -->
                <h2 class="classh2">What's your comfort food/favourite Cuisine?</h2>
                <div class="input-group">
                    <button type="button" class="add-btn" onclick="addInputField()">+ Add new Item</button>
                </div>
            </div>
            <button type="submit" id="submitBtn">next</button>
        </form>
    </div>
</div>

<script>
    function addInputField() {
        // Create new input group
        var newInputGroup = document.createElement('div');
        newInputGroup.className = 'input-group';

        // Create new input field
        var inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.className = 'input-field';
        inputField.name = 'favorite_foods[]'; // Use array notation for multiple values
        inputField.placeholder = 'Enter item...';

        // Create remove button
        var removeButton = document.createElement('button');
        removeButton.className = 'remove-btn';
        removeButton.textContent = '-';
        removeButton.onclick = function() {
            // Remove the current input group when the remove button is clicked
            inputContainer.removeChild(newInputGroup);
        };

        // Append new input field and remove button to the new input group
        newInputGroup.appendChild(inputField);
        newInputGroup.appendChild(removeButton);

        // Get the input container
        var inputContainer = document.getElementById('inputContainer');

        // Append the new input group to the input container
        inputContainer.appendChild(newInputGroup);
    }
</script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
