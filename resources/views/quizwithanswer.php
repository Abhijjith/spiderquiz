<?php
session_start();
?>

<!DOCTYPE html>
	  <html>
	  <head>
	  <title>Answer Questions</title>
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
$answer = \App\answer::where('ques_id','=',$quesid)
                     ->where('author_id','=',$_SESSION["user"])
					 ->get();
if(count($answer))
{
	echo '
		 <div class="row">
		 <div class="col-sm-2 col-xs-2 " ></div>
		 <div class="alert alert-info col-sm-8 col-xs-8 text-center" > <strong>Question you are trying to answer is already answered</strong></div>
		 </div>';
}
else
{
$question = \App\question::where('id','=',$quesid)
                           ->first();
if ($ans==$question->correct)
{	echo '
		 <div class="row">
		 <div class="col-sm-2 col-xs-2 " ></div>
		 <div class="alert alert-success col-sm-12 col-xs-8 text-center" > <strong>Right Answer! '.$question->points.' points added to your score.</strong></div>
		 <div class="alert alert-success col-sm-12 col-xs-8 text-center" > <strong>Keep going. Continue the same form.</strong></div>
		 </div>';
		 $account = \App\account::find($_SESSION["user"]);
		 $account->score = $account->score + $question->points;		 
		 $account->save();
}
else
{
	echo '
		 <div class="row">
		 <div class="col-sm-2 col-xs-2 " ></div>
		 <div class="alert alert-danger col-sm-12 col-xs-8 text-center" > <strong>Wrong Answer! Sorry, '.$question->points.' points has been deducted</strong></div>
		 <div class="alert alert-success col-sm-12 col-xs-8 text-center" > <strong>No problems. Gain it back in the remaining questions. Cheers !!</strong></div>
		 </div>';
		 $account = \App\account::find($_SESSION["user"]);
		 $account->score = $account->score - $question->points;
		  $account->save();
}
if($ans=='A')
$answer_opt = $question->opt1;
else if($ans=='B')
$answer_opt = $question->opt2;
else if($ans=='C')
$answer_opt = $question->opt3;
else if($ans=='D')
$answer_opt = $question->opt4;	
if($question->correct=='A')
$correct_opt = $question->opt1;
else if($question->correct=='B')
$correct_opt = $question->opt2;
else if($question->correct=='C')
$correct_opt = $question->opt3;
else if($question->correct=='D')
$correct_opt = $question->opt4;
$answer = new \App\answer;
$answer->ques_id = $quesid;
$answer->author_id = $_SESSION["user"];
$answer->ans_opt = $answer_opt;
$answer->cor_opt = $correct_opt;
$answer->ques = $question->question;
$answer->save();
}
require 'displayquestions.php';
} 
 ?>
 </body>
 </html>