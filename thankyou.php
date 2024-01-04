
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
      title: "Thank you for sharing your insights with us!",
      showDenyButton: false,
      showCancelButton: false,
      confirmButtonText: "Ok",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         window.location.href="index.php"
      } 
    });
    </script>
<?php include_once 'orientation-check.php'; ?>
</body>
</html>
