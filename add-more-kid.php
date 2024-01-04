<?php 

   session_start();

   unset($_SESSION['kid_id']);
   unset($_SESSION['kid_name']);

?>
<!DOCTYPE html>
<html>
<head>
<style>





body {
  background-image: url('images/white-background-with-spiral-pattern-center.png');
  background-size: cover;
  margin: 0;
  height: 100vh;
  overflow: hidden;
}










</style>
<script src="./dist/js/sweetalert.min.js"></script>
<link href="./dist/css/sweetalert.min.css" rel="stylesheet">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ABSLI data enrichment">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title> ABSLI | Data Enrichment</title>
 <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
<body>



    <script>
        Swal.fire({
      title: "Want to add more kids ?",
      showDenyButton: false,
      showCancelButton: true,
      cancelButtonText:"No , Thank you",
      confirmButtonText: "Add More",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         window.location.href="kids-information.php"
      }else window.location.href='hobbies.php'
    });
    </script>

</body>
</html>
