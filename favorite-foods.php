<?php
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect favorite foods from the submitted form
    $favoriteFoods = $_POST["favorite_foods"];
    
    // Convert the array to a comma-separated string
    $favoriteFoodsString = implode(',', $favoriteFoods);

    // Store data in the database
    $conn = new mysqli("localhost", "root", "root", "scrap_book" , 3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
    <title>Interactive Page</title>
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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
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
            background-image: url('images/Icon\ awesome-chevron-circle-right.png');
            width: 50px; /* Adjust size as needed */
            height: 50px; /* Adjust size as needed */
            background-size: cover;
            border: none;
            cursor: pointer;
            background-color: transparent;
        }
    </style>
</head>
<body onload="addInputField()">

<div class="background">
    <div class="input-area">
        <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div id="inputContainer">
                <!-- Initial input group -->
                <h2 style="font-size: 50px; font-weight:bold;">What's your comfort food/favourite Cuisine?</h2>
                <div class="input-group">
                    <button type="button" class="add-btn" onclick="addInputField()">+ Add new Item</button>
                </div>
            </div>
            <button type="submit" id="submitBtn"></button>
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
</body>
</html>
