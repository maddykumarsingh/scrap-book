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
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">

</head>
<body>



    <script>
        Swal.fire({
      title: "Want to add more kids ?",
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: "Add",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         window.location.href="kids-information.php"
      }else window.location.href='hobbies.php'
    });
    </script>

</body>
</html>
