<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online quiz portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
<style>
*
{
box-sizing: border-box;
}
.float
{
position:relative;
float:left;
}
#bar
{
background-color:#995795;
color:yellow;
border: 1px solid #395795;
}
.jumbotron {
    /* change bootstrap jumbotron text color */
    color: black;
    text-align:center;
    padding-top:10px;
}
body{
  background-image: url("real.jpg");
}
</style>
	  
	  </head>

<body>
   <div class="jumbotron">
  <div class="container">
    <h1>ONLINE QUIZ PLATFORM</h1> 
    <h2> KEY FEATURES OF THE QUIZ. </h2>
    <p>This website basically provides a platform for quizzers. </p>
    <p>The quiz will contain a series of questions submitted by other users. </p>     
    <p>The logged-in users have two options.
       Either they can play the quiz or
       they can submit a question of their own. </p>
    <p>The user's score will be updated and stored dynamically. </p>
    <p>So what are you waiting for? Go Ahead. </p>
    <p>Signup and login to explore the beauty </p>
    <p>Been a enthuasistic and regular user ? Here you go. Login below </p>
</div>
   </div>
   <?php
   require( "loading.php" ); 

   $servername = "localhost";
  $username = "root";
   $conn = new mysqli($servername, $username, "");
  $sql = "CREATE DATABASE IF NOT EXISTS quiz";
  $conn->query($sql);
  $conn->close();
  $conn = new mysqli($servername, $username, "","quiz");
  $sql="CREATE TABLE IF NOT EXISTS accounts(
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  username VARCHAR(50),
  password VARCHAR(50),
  score int(11)
  )";
  $conn->query($sql);
  $sql="CREATE TABLE IF NOT EXISTS questions(
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(100),
  opt1 VARCHAR(50),
  opt2 VARCHAR(50),
  opt3 VARCHAR(50),
  opt4 VARCHAR(50),
  correct VARCHAR(2),
  points int(5),
  author int(11)
  )";
  $conn->query($sql);
    $sql="CREATE TABLE IF NOT EXISTS answers(
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  ques_id int(11),
  author_id int(11),
  ans_opt VARCHAR(255),
  cor_opt VARCHAR(255),
  ques VARCHAR(255)
  )";
  $conn->query($sql);
  if(count($_SESSION))
{ 
  $id =$_SESSION["user"];
  $pass=$_SESSION["pass"];
  $account = \App\account::find($id);
  if(strcmp($pass, $account->password)==0)
  {
   echo '
   <script>
  window.location="'.url("quiz").'";
  </script>
  
  ';
  }
  
}
   echo '
  <nav class="navbar navbar-inverse" id="bar">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    <div class="navbar-header">
      <a class="navbar-brand" style="color:#EDF0F5">AN ONLINE QUIZ PLATFORM</a>
	  
    </div>
	 </div>
</nav>
  <br>
  <br>
  <br>
  <div class="float col-sm-4 col-xs-offset-0 col-xs-10 col-xs-offset-1 "style="background-color:whiteblush;text-align:center;padding-left:auto;">
  
  </div>
	
  
 <div class="float col-sm-2 col-sm-offset-0 col-xs-10 col-xs-offset-1" >
  <form class="form-horizontal" role="form" method="post" action='.url("signup").'>
  <div class="row">
    <div class=" form-group " >
           <label for="email">Fullname:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
  </div>
  <div class="row">
   <div class=" form-group " >
         <label for="email">Username:</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
  </div>
    <div class="row">
    <div class="form-group ">
      <label for="pass1">Password:</label>
      <input type="password" class="form-control" id="pass1" name="pass1" required>
    </div>
  </div>
  <div class="row">
    <div class="form-group">
      <label for="pass2">Retype Password:</label>
      <input type="password" class="form-control" id="pass2" name="pass2" required>
    </div>
  </div>
  <div class="row">
    <div class="form-group">
      <input type="button" class="form-control btn-success" id="register" value="REGISTER" onclick="validation();">
    </div>
  </div>
  <input type="submit" style="visibility:hidden;" id="submit">
   </form>
 </div>







 

  <div class="float col-sm-2 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
  <form class="form-horizontal" role="form" method="post" action='.url("logincheck").'>
  <div class="row">
  <div class="form-group" >
            <label for="email">Username:</label>
    <input type="text" class="form-control" id="name1" name="username" placeholder="Username:">
  </div>
  </div>
  <div class="row">
  <div class="form-group" >
            <label for="pass">Password:</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password:">
  </div>
  </div>
  <div class="row">
  <input type="submit" class="btn btn-primary" value = "Login">
  </div>
  </form>
  </div>




 ';
?>  





<script>
function validation()                                            // function for the validation so that proper info is inserted.
{   
	var name = document.getElementById("name").value;
	var username = document.getElementById("username").value;
	var pass1 = document.getElementById("pass1").value;
	var pass2 = document.getElementById("pass2").value;
	name = name.trim();
	



  document.getElementById("name").value=name;
	var mistake=0;
	if(pass1.localeCompare(pass2))                                     //checking whether both passwords are matching.
	{
		mistake++;
		window.alert("passwords do not match with each other.");
	 	document.getElementById("pass1").value="";
		document.getElementById("pass2").value="";
		
	}
	if((!/^[0-9a-zA-Z]+$/.test(username)))                  //checking it has only letters and numbers
		{    mistake++;
		window.alert("Please enter a valid username");
		document.getElementById("name").value="";
		document.getElementById("pass1").value="";
		document.getElementById("pass2").value="";
	   }
	if((!/^[a-zA-Z\s]*$/.test(name)))                      //Checking it has only letters
		{    mistake++;
		window.alert("Please enter a valid name");
		document.getElementById("name").value="";
		document.getElementById("pass1").value="";
		document.getElementById("pass2").value="";
	}
	
	
	
	if(!mistake)
		document.getElementById("submit").click();                
}
</script>
</body>
</html>