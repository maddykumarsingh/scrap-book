
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Time Well Spent</title>
<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
  }
  body {
    background-image: url('images/white-background-with-spiral-pattern-center.png');
    background-position: center;
    background-repeat: no-repeat;
  }
  #logo {
    background-image: url('images/ABC_Red.jpg');
    background-size: cover;
    width: 330px; /* Adjust size as needed */
    height: 70px;
    float: right; /* Align the logo to the top right corner */
    margin: 30px;
    clear: both;
  }
  #headerImage {
    background-image: url('images/Here are a few tips to spend your time wisely!.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    margin-top: 2vh;
    width: auto;
    height: 50px;
    clear: both;
    
  }
  #content {
  animation: fadeIn 3s forwards;
  text-align: center;
  width: 70%;
  margin: auto;
  padding: 8px;
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

  .tip-image {
    width: 250px;
    height: 250px;
    margin: 10px;
    opacity: 0;
    transform: scale(0.5);
    transition: transform 0.5s, opacity 0.5s;
  }
  @keyframes rubberBand {
    from {
      transform: scale(0.5);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }
</style>
</head>
<body>

<div id="logo"></div>

<div id="headerImage"></div>
<div id="content">
<img id="travel" class="tip-image" src="images/Travel.png" style="animation: rubberBand 1s 0.5s forwards;" alt="Travel to explore">
<img id="self" class="tip-image" src="images/Self.png" style="animation: rubberBand 1s 1s forwards;" alt="Self Discovery">
<img id="party" class="tip-image" src="images/Party.png" style="animation: rubberBand 1s 1.5s forwards;" alt="Make Health a priority">
<img id="dating" class="tip-image" src="images/Dating.png" style="animation: rubberBand 1s 2s forwards;" alt="Strong friendships">
<img id="dance" class="tip-image" src="images/Dance.png" style="animation: rubberBand 1s 2.5s forwards;" alt="Set personal goals">
<a href="hobbies.php" id="submitBtn"></a>
</div>
</body>
</html>
