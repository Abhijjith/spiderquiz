<?php
session_start();
?>


<!DOCTYPE html>
	  <html>
	  <head>
	  <title>SIGN-UP</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
      <style>
      body{
      	background-image: url("real.jpg");
      }
      h1{
      	text-align: center;
      	
      }
      </style>

 </head>
 <body>
 <?php
 
if(count($_SESSION))
{ 
  $id1 =$_SESSION["user"];
  $password=$_SESSION["pass"];
  $account = \App\account::find($id);
  if(strcmp($password, $account->password)==0)
  {
   echo '
   <script>
  window.location="'.url("quiz").'";
  </script>
  
  ';
  }
  
}
  $account =  \App\account::where('username','=',$username)
                              ->get();
  if(count($account))
  {
	 echo '
         <h1>Confirming Registration and Login</h1>
         <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <div class="alert alert-danger col-sm-4 col-xs-8 text-center" >Sorry , The username has already been taken.</div>
		 </div>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <a href='.url("/").' class="btn btn-info col-sm-4 col-xs-8 btn-lg">Please Register with different username.</a>
		 </div>
		 <br>
		 ';
  }
  else
  {
	   $account =  new \App\account;
	   $account->name=$name;
	   $account->username=$username;
	   $account->password= Hash::make($pass1);           //hashing the password so as to make it protective and secure.
	   $account->score=0;
	   $account->save();
	   	 echo '
          <h1>Confirming Registration and Login</h1>
          <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <div class="alert alert-success col-sm-4 col-xs-8 text-center" >Congrats! USER REGISTERED SUCCESSFULLY</div>
		 </div>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <a href='.url("/").' class="btn btn-info col-sm-4 col-xs-8 btn-lg">Login soon and quiz</a>
		 </div>
		 ';
  }
 ?>
 
 </body>
 </html>