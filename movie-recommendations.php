
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

<style>

       #submitBtn {
        display: block;
    margin: 20px auto;
    width: 142px;
    height: 36px;
    background-size: cover;
    border: none;
    cursor: pointer;
    position: absolute;
    bottom: 9%;
    right: 3%;
    background-color: black;
    border-radius: 30px;
    color: white;
    font-size: 27px;
    line-height: 39px;
    text-decoration: none;
    font-family: sans-serif;
    text-align: center;
    z-index: 10;
}

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
  body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/Married_BG.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
  .container {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 15%;
  }
  .column {
    flex: 1;
    padding: 20px;
  }
  .movie-posterL {
    max-width: 40%;
    height: auto;
    margin-bottom: 20px;
    animation: flyInFromTopLeft 2s forwards;

  }
  .movie-posterR {
    max-width: 40%;
    height: auto;
    margin-bottom: 20px;
    animation: flyInFromBottomRight 2s forwards;

  }
  .movie-name {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
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


 @media screen and (max-width: 1000px) {
     #logo {
   
    width: 60px; /* Adjust size as needed */
    height: 60px;
     }
     
     .movie-name {
    max-width: 50%;
    height: auto;
    margin-bottom: 20px;
}
    #submitBtn {
     display: block;
    margin: 10px auto;
    width: 120px;
    height: 30px;
    background-size: cover;
    border: none;
    cursor: pointer;
    position: absolute;
    top: 105%;
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
<div class="container">
  <div class="column">
    <img src="images/poster.png" alt="The Lunchbox" class="movie-posterL">
    <img src="images/theproposal.png" alt="The Proposal" class="movie-posterL">
    <img src="images/notebook.png" alt="The Notebook" class="movie-posterL">
  </div>
  <div class="column">
    <img src="images/nameofmovies.png" alt="List of Movies" class="movie-name">
  </div>
  <div class="column">
    <img src="images/HMS.png" alt="Harry Met Sejal" class="movie-posterR">
    <img src="images/500days.png" alt="500 Days of Summer" class="movie-posterR">
    <img src="images/lalaland.png" alt="500 Days of Summer" class="movie-posterR">
  </div>

</div>

<a href="set-reminder.php" id="submitBtn">next</a>

<?php include_once 'orientation-check.php'; ?>
</body>
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
  </script>
</html>
