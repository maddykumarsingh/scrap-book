
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
    <link rel="icon" href="favicon.ico" type="image/x-icon">
 <title> ABSLI | Data Enrichment</title>

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
    background-image: url(images/logo.png);
    background-size: contain;
    background-repeat: no-repeat;
    width: 120px;
    height: 120px;
    float: right;
    margin: 30px;
    clear: both;
  }
  #headerImage {
    background-image: url('images/Here are a few tips to spend your time wisely!.png');
   background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    width: 80%;
      height: 7%;
    clear: both;
    margin: auto;
    position: relative;
    top: -76px;
    
  }
  #content {
  animation: fadeIn 3s forwards;
  text-align: center;
  width: 70%;
  margin: auto;
  padding: 8px;
  position: relative;
    top: -68px;
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

  .tip-image {
       width: 20%;
    height: auto;
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
  
   @media screen and (max-width: 1000px) {
  
    #headerImage {
 
    top: -100px;
    
  }
  #content {
 
    top: -100px;
  }
  .tip-image {
       width: 15%;
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

</div>
<a href="hobbies.php" id="submitBtn">next</a>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
