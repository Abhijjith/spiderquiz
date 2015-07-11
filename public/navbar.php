<?php
echo ' 
<nav class="navbar navbar-inverse " style="background-color:#995795;border: 4px solid #395795">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" style="color:#EDF0F5">Home Page of the QUIZ</a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
	  <ul class="nav navbar-nav">
        <li><a  href='.url("add_question").' style="color:#EDF0F5">SUBMIT QUESTIONS</a></li>
        <li><a  href='.url("quiz").' style="color:#EDF0F5"> ANSWER QUESTIONS</a></li>
		    <li><a  href='.url("userscore").' style="color:#EDF0F5">YOUR SCORE</a></li>
		    <li><a  href='.url("leaderboard").' style="color:#EDF0F5">LEADERBOARD</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color:white">Holla '.$signin.'</a></li>
        <li><a href='.$loginurl.' style="color:white">Click here to '.$login.'</a></li>
      </ul>
    </div>
  </div>
</nav>';
?>