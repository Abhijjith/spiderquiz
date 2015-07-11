<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>Question Added</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
 <style>
 body{
 	background-image:url("real.jpg");
     }
     h1{
     	font-size: 40px;
     	text-align: center;
     }
</style>
 </head>
 
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
 
  $question =  new \App\question;
	   $question->question=$ques;
	   $question->opt1=$opt1;
	   $question->opt2=$opt2;
	   $question->opt3=$opt3;
	   $question->opt4=$opt4;
	   $question->correct=$correct;
	   $question->author=$author;
	   $question->points=$points;
	   $question->save();
 }
	      
?>	     
         <h1>Confirmation of Question Submission</h1>
         <br>
		 <br>
		 <br>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <div class="alert alert-success col-sm-4 col-xs-8 text-center" ><strong>Successful !! Your question will appear at the opponent's question wall.</strong></div>
		 </div>
	   
 	   
 </body>
 </html>