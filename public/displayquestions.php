<html>
<head>
	<style>
	body 
	{
		background-image: url("real.jpg");
	}
	.row
	{ font-size: 20px;
    }
	</style>
</head>	
<?php
$answers = \App\answer::where('author_id','=',$_SESSION["user"])
                       ->get();
$values = [];
$k=0;
foreach($answers as $answer)
{
	$values[$k] = $answer->ques_id;
	$k++;
}
$question = \App\question::where('author','!=',$_SESSION["user"])
                         ->whereNotIn('id', $values)
                         ->get(['id','question','opt1','opt2','opt3','opt4','points']);
echo '
        <div class="jumbotron">
  <div class="container">
    <h1>THE OFFICIAL QUIZ PAGE</h1> 
    <p>The questions present below are the questions submitted by other users. </p>     
    <p>The users have two options.
       Either they can play the quiz or
       they can submit a question of their own. </p>
    <p>The user score will be updated and stored dynamically. </p>
    <p>So what are you waiting for? Go Ahead. GOOD LUCK  </p>
    <p>Interested in submitting a tough question to squeeze your opponents? Click Submit questions.</p>
     </div>
   </div>

';



if(count($question))
foreach($question as $ques)
{   
$difficulty = "Hard";
$btnclass="btn btn-warning";
$divclass="alert alert-danger";
if($ques->points == 2)
{
	$difficulty = "Moderate";
	$btnclass="btn btn-warning";
	$divclass="alert alert-warning";
}
else if($ques->points == 1)
{
	$difficulty = "Easy";
	$btnclass="btn btn-success";
	$divclass="alert alert-success";
}
	echo' 
	<body>
	<div class="'.$divclass.'" style="margin-right:10%;margin-left:10%;">
	<br>
	 <form  role="form" method="post">
<center>
 <div   id="ques" style="height:60px;width:70%; margin-bottom:20px;text-align:center;font-size:30px; border:3px solid black;padding-top:6px;"><strong>'.$ques->question.'</strong></div>
</center>
 <center>
 <label style="height:40px;width:30%; margin-bottom:20px;margin-right=10%;border:3px solid black;text-align:center;padding-top:4px;font-size:20px;padding-left:5px;">
 <input type="radio"  id="opt1" name="ans" required style="margin-right:10px;" value="A" >'.$ques->opt1.'</label>
 </center>
 <center>
 <label style="height:40px;width:30%; margin-bottom:20px;margin-right=10%;border:3px solid black;text-align:center;padding-top:4px;font-size:20px;padding-left:5px;">
 <input type="radio"  id="opt2" name="ans" required style="margin-right:10px;" value="B" >'.$ques->opt2.'</label>
</center>
 <center>
<label style="height:40px;width:30%; margin-bottom:20px;margin-right=10%;border:3px solid black;text-align:center;padding-top:4px;font-size:20px;padding-left:5px;"> 
<input type="radio"  id="opt1" name="ans" required style="margin-right:10px;" value="C" >'.$ques->opt3.'</label>
</center>
<center>
 <label style="height:40px;width:30%; margin-bottom:20px;margin-right=10%;border:3px solid black;text-align:center;padding-top:4px;font-size:20px;padding-left:5px;">
 <input type="radio"  id="opt2" name="ans" required style="margin-right:10px;" value="D">'.$ques->opt4.'</label>
 </center>
 <center>
<input type="button"  value="'.$difficulty.'" class="'.$btnclass.'" style="height:40px;width:10%;margin-right:5%;margin-bottom:20px;"></button>
<input type="submit" id="submit" value="Submit answer" class="btn btn-primary" style="height:40px;width:20%;margin-bottom:20px;">
 </center>
 <input type="hidden" name="quesid" value='.$ques->id.'>
 </form>
	</div>
	<br>
	</body>';
}
else
	echo '
		 <body>
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
		 <div class="alert alert-info col-sm-12 col-xs-6 text-center" > <strong>Nawww no more questions left to answer.</strong></div>
		 <br>
		 <div class="alert alert-info col-sm-12 col-xs-6 text-center" > <strong>We love your enthuasism. Keep it going.</strong></div>
		 <br>
		 <div class="alert alert-info col-sm-12 col-xs-6 text-center" > <strong>Submit challenging questions to squeeze your opponents.</strong></div>
		 <br>
		 <div class="alert alert-info col-sm-12 col-xs-6 text-center" > <strong>PLAY HARD QUIZ HARD to see yourself at the top of leaderboard.</strong></div>
		 </div>
		 </body>';
?>
</html>