<?php


session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "root", "scrap_book" , 3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if files were uploaded
    if (isset($_FILES['files'])) {
        $errors = [];

        // Get the person's ID from the session (replace with your actual session variable)
        $person_id = $_SESSION["id"];

        // Create a directory for the person's files
        $upload_path = "uploads/$person_id/";
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        // Loop through each file
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['files']['name'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];

            // Check if the file is an image (you may need to enhance this validation)
            $file_type = mime_content_type($file_tmp);
            if (strpos($file_type, "image") === false) {
                $errors[] = "File '$file_name' is not an image.";
                continue;
            }

            // Move the file to the person's directory
            $destination = $upload_path . $file_name;
            move_uploaded_file($file_tmp, $destination);

            // Insert the file name into the database
            $sql = "INSERT INTO files (file_name  , person_id) VALUES ('$file_name', '$person_id')";
            $conn->query($sql);
        }

        // Display errors, if any
        if (!empty($errors)) {
            echo "Errors occurred:\n";
            foreach ($errors as $error) {
                echo "- $error\n";
            }
        } else {
           header("Location:hobbies.php");
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Images</title>
<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background: url('images/Kids_BG.png') no-repeat center center fixed; 
    background-size: cover;
  }
  
  .upload-area {
    width: 50%;
    height: 300px;
    margin: 10% auto;
    background-color: white;
    border-radius: 15px;
    border: 2px dashed #000;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    cursor: pointer;
  }
  
  .upload-area:hover {
    background-color: #f8f8f8;
  }
  
  .upload-instructions {
    text-align: center;
    padding: 20px;
  }
  
  .hidden-input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  #submitBtn {
  display: block;
  margin: 20px auto;
  background-image: url('images/Next Icon.png');
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
</style>
</head>
<body>

<form method="post" enctype="multipart/form-data">

<div class="upload-area" onclick="document.getElementById('file-input').click();">
  <div class="upload-instructions">
    Drag and drop images here or click to select files
  </div>
  <input type="file" id="file-input" class="hidden-input" name="files[]" multiple >
</div>
<button id="submitBtn"></button>
</form>
<script>
  const uploadArea = document.querySelector('.upload-area');
  
  uploadArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    uploadArea.style.backgroundColor = '#e9e9e9';
  });
  
  uploadArea.addEventListener('dragleave', () => {
    uploadArea.style.backgroundColor = 'white';
  });
  
  uploadArea.addEventListener('drop', (event) => {
    event.preventDefault();
    uploadArea.style.backgroundColor = 'white';
    // Handle the files
    let dt = event.dataTransfer;
    let files = dt.files;
    // Use files here
  });
</script>

</body>
</html>
