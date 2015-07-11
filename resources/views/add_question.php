<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>Add Questions</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
 <style>
 body{
  background-image: url("real.jpg");
 }
  .jumbotron {
    /* change bootstrap jumbotron text color */
    color: black;
    text-align:center;
    padding-top:5px;
    padding-bottom: 5px;
}
 </style>
 </head>
 
 <body>
 <?php
 require( "loading.php" ); 
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
 echo '
 
<div class="jumbotron">
  <div class="container">
    <h1>Submit your questions below</h1>
    <p>Try submitting questions of various difficulty levels. </p>
    <p>Have fun </p>
   </div>
 </div>   
 <br>
 <form  role="form" method="post" action='.url("questionadded").'>
<center>
 <input type="text"  id="ques" name="ques" required style="height:60px;width:70%; margin-bottom:8px;font-size:25px;text-align:center" placeholder="QUESTION">
</center>
 <center>
 <input type="text"  id="opt1" name="opt1" required style="height:40px;width:30%;margin-bottom:10px;text-align:center;font-size:18px" placeholder="OPTION A">
 </center>
 <center>
 <input type="text"  id="opt2" name="opt2" required style="height:40px;width:30%;margin-bottom:10px;text-align:center;font-size:18px" placeholder="OPTION B">
</center>
 <center>
 <input type="text"  id="opt1" name="opt3" required style="height:40px;width:30%;margin-bottom:10px;text-align:center;font-size:18px" placeholder="OPTION C">
 </center>
 <center>
 <input type="text"  id="opt2" name="opt4" required style="height:40px;width:30%;margin-bottom:10px;text-align:center;font-size:18px" placeholder="OPTION D">
 </center>
 <center>
 <select id="correct" name="correct" required style="height:40px;width:10%;margin-bottom:20px;text-align:center">
                    <option selected="selected" value="A">A</option>
					<option value="B">B</option>
				    <option value="C">C</option>
					<option value="D">D</option>
</select>
</center>
<center>
<select id="difficulty" name="points" required style="height:40px;width:15%;margin-bottom:20px;text-align:center">
                    <option selected="selected" value="1">Easy</option>
					<option value="2">Moderate</option>
				    <option value="3">Difficult</option>
</select>
</center>
<center>
<input type="submit" id="submit" value="Add" class="btn btn-success" style="height:40px;width:15%;margin-bottom:20px;">
 </center>
 <input type="hidden" name="author" value='.$_SESSION["user"].'>
 </form>';
}
 ?>

 </body>
 </html>