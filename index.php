<?php 
// Start a new or resume the existing session
session_start();

// Destroy the current session
session_destroy();

// Start a fresh session
session_start();
?>
<!DOCTYPE html>
<html>
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
@keyframes logoAnimation {
  0% {
    transform: scale(0);
    opacity: 1;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(1);
    opacity: 0;
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

#logo {
 
    position: relative;
    top: 27%;
    margin: 0 auto;
    background-repeat: no-repeat;
    left: 0;
    right: 0;
    width: 260px;
    height: 100%;
    background-size: contain;
 /* animation: logoAnimation 6s forwards;   4 seconds to stay + 2 seconds to fade */
}

body {
  background-image: url('images/white-background-with-spiral-pattern-center.png');
  background-size: cover;
  margin: 0;
  height: 100vh;
  overflow: hidden;
  

}



#footer {
  background-image: url('images/Rectangle 4949.png');
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 50px; /* Adjusted for footer height */
  background-size: contain;
  opacity: 0; /* Start with the footer invisible */
  animation: fadeIn 2s forwards;
  animation-delay: 6s; /* Delay the start of the footer animation */
}

#nextImage {
 /* background-image: url('images/Welcome to our Collector_s edition Where every page tells your story!This book is a canvas of collaboration, a space where you can add your unique strokes, and together, we will craft a vibrant tapestry of memori.png');
   */ position: absolute;
       right: auto;
           top: 10%;
    left: auto;
    margin: auto;
    width: 100%;
    text-align: center;
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: 84%;
    opacity: 0;
    background-repeat: no-repeat;
    animation: fadeIn 2s forwards;
    animation-delay: 6s;
}

#nextImage img{
        text-align: center;
    width: 80%;
    max-width:100%
}


       #submitBtn {
        display: block;
    margin: 20px auto;
    width: 142px;
    height: 36px;
    background-size: cover;
    border: none;
    cursor: pointer;
    position: absolute;
    bottom: -2%;
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
    opacity: 0;
     animation: fadeIn 2s forwards;
    animation-delay: 6s;
}




#logod {
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    animation: logoAnimation 6s forwards;
}

.imgsrc {
     text-align: center;
    max-width: 80%;
}

.imgsrc img {
   max-width: 100%;
            height: auto;
            width: 100%;
}

 @media screen and (max-width: 1000px) {
            .imgsrc img {
                width: 50%;
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
    top: 75%;
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
<div class="pagerap">
<div id="logod">
    <div class="imgsrc">
            <img src="images/logo.png" alt="Logo">
            </div>
</div>
<div id="nextImage">
    
    <img src="images/centePage.png" />
  
</div>
<a href="person-information.php" id="submitBtn">next</a>
<div id="footer"></div>

</div>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
