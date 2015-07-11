<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>Home Page of Quiz.</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
 </head>
 <style>
 *
 {
	 box-sizing:border-box;
 }
 </style>
 <body>
<?php
  $login_failure=1;
if(count($_SESSION))
{ 
  $id =$_SESSION["user"];
  $pass=$_SESSION["pass"];
  $account = \App\account::find($id);
  if(strcmp($pass, $account->password)==0)
  {
  $signin = " ".$account->name;
  $signinurl = "";
  $login= " logout";
  $loginurl = url("logout");
  $login_failure=0;
  }
  
}
if($login_failure)
{ 
  echo '
   <script>
  window.location="'.url("/").'";
  </script>
  
  ';
}
else
{
include 'navbar.php'; 
require( "loading.php" ); 
require 'displayquestions.php';
} 
 ?>
 </body>
 </html>