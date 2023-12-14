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
  background-image: url('images/logo.png');
  position: absolute;
  top: 35%;
  left: 30%;
  transform: translate(-50%, -50%);
  width: 650px; /* Initial size */
  height: 125px; /* Initial size */
  background-size: cover;
  animation: logoAnimation 6s forwards; /* 4 seconds to stay + 2 seconds to fade */
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
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  height: 50px; /* Adjusted for footer height */
  background-size: cover;
  opacity: 0; /* Start with the footer invisible */
  animation: fadeIn 2s forwards;
  animation-delay: 6s; /* Delay the start of the footer animation */
}

#nextImage {
  background-image: url('images/Welcome to our Collector_s edition Where every page tells your story!This book is a canvas of collaboration, a space where you can add your unique strokes, and together, we will craft a vibrant tapestry of memori.png');
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80%; /* Initial size */
  height: 80%; /* Initial size */
  background-size: cover;
  opacity: 0; /* Start with the next image invisible */
  animation: fadeIn 2s forwards;
  animation-delay: 6s; /* Delay the start of the next image animation */
}

#submitBtn {
  position: absolute;
  top: 75%;
  left:50%;
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


</style>
</head>
<body>

<div id="logo"></div>
<div id="nextImage">
  <a href="step-2.php" id="submitBtn"></a>
</div>

<div id="footer"></div>

</body>
</html>
