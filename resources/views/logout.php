<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>LOGGED OUT</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
 </head>
 <body>
 <?php 
session_unset(); 
 echo '
   <script>
  window.location="'.url("/").'";
  </script>
  
  ';
 ?>
 </body>
 </html>