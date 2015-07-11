<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>SCORE</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
	  <script src="chart.js"></script>
	  <script src="http://www.flotcharts.org/flot/jquery.flot.js"></script>
 </head>
 <style>
 *
 {
	 box-sizing:border-box;
 }
 h1{
 	font-size: 40px;
 	text-align: center;
 }
 body{
 	background-image: url("real.jpg");
 }
 h2{
 	font-size:25px;
 	text-align:center;
 }
 </style>
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
$account=\App\account::find($_SESSION["user"]);
$score = $account->score;
echo '
	<h1>SCORE REPORT</h1>
	<br>
    <h2>We really appreciate your playing competitive skills.Keep Going.!!</h2>
<br>
<br>
<br>	
 <center>
				<div style="position:relative;float:left;margin-left:150px;">
				<canvas id="canvas"  height="300" width="400"></canvas>
			</div>
			<div style="position:relative;float:left;margin-left:50px;margin-top:50px;" class="alert alert-info col-sm-4 text-center">Your effective total score is <strong>'.$score.'</strong> points</div>
			</div>
			
</center>
<div id="legend">
</div>
	<script>
		var data = [
    {
        value:'. $account->score.',
        color:"blue",
        highlight: "#FF5A5E",
        label: "Score"
    }
]

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		var myDoughnutChart = new Chart(ctx).Pie(data,{animateScale: true,animateRotate : true});
		
	    
	  
	}
	
	</script>';
	
} 
 ?>
 </body>
 </html>