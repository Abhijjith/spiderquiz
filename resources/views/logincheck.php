<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>LOGGING IN</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
 </head>
 <body>
 <?php
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
 
 
$account =  \App\account::where('username','=',$username)
                              ->get();
  if(count($account))
  {
	 
	 if(Hash::check($pass,$account[0]->password))
	 { 
		 $_SESSION["user"]=$account[0]->id;
		 $_SESSION["pass"]=$account[0]->password;
		  echo '
         <script>
         window.location="'.url("quiz").'";
         </script>
         ';
	 }
	 else
		echo '
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
		 <div class="alert alert-danger col-sm-4 col-xs-8 text-center" >WRONG PASSOWRD</div>
		 </div>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <a href='.url("/").' class="btn btn-info col-sm-4 col-xs-8 btn-lg"> click here to Login again</a>
		 </div>
		 ';
		 
  }
  else
  {
	  echo '
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
		 <div class="alert alert-danger col-sm-4 col-xs-8 text-center" >USERNAME NOT REGISTERED</div>
		 </div>
		 <div class="row">
		 <div class="col-sm-4 col-xs-2 " ></div>
		 <a href='.url("/").' class="btn btn-info col-sm-4 col-xs-8 btn-lg"> click here to signup</a>
		 </div>
		 <br>
		
		 ';
  }
 ?>
 </body>
 </html>