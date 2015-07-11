<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>Leaderboard</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="boot.css">
	  <script src="jquery.js"></script>
      <script src="boot.js"></script>
	   <script src="chart.js"></script>
	  <style>
 *
 {
	 box-sizing:border-box;
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
  $servername = "localhost";
  $username = "root";
  $conn = new mysqli($servername, $username, "","quiz");
  // Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT score, username FROM accounts ORDER BY username";
$result = $conn->query($sql);

echo'
<div class="jumbotron">
  <div class="container">
    <h1>LEADERBOARD AND STANDINGS</h1>
    <p>Such competition much wow.</p>
    <p>Have fun</p>
   </div>
 </div>   
 <br>
 <br>
 <a href='.url("leaderboard").'>Click here to get it sorted by score </a>
 ';


if ($result->num_rows > 0) 
{   $no=1;
    echo "<table class='table table-hover'>
   <thead>
   <tr>
        <th>POSITION</th>
        <th>USERNAME</th>
        <th>SCORE</th>
   </tr>
  </thead>";
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "
        <tbody>
        <tr>
             <td>$no</td>
             <td>".$row["username"]."</td>
             <td>".$row["score"]."</td>
        </tr>
        </tbody>";
        $no++;
    }
    echo "</table>";
} 
else 
{
    echo "0 results";
}

} 
 ?>
 </body>
 </html>