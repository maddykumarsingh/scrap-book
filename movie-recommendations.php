
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Movie Recommendations</title>

<style>

#submitBtn {
  display: block;
  margin: 20px auto;
  background-image: url('images/Next Icon.png');
  width: 50px; /* Adjust size as needed */
  height: 50px; /* Adjust size as needed */
  background-size: cover;
  border: none;
  cursor: pointer;
  background-color: transparent;
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
    background-image: url('images/ABC_Red.jpg');
    background-size: cover;
    width: 330px; /* Adjust size as needed */
    height: 70px;
    position: absolute;
    top: 1%;
    right: 1%;
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

<a href="set-reminder.php" id="submitBtn"></a>


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