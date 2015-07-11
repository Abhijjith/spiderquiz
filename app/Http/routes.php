<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',[function () {
   return view('welcome');
}]);
Route::post('/logincheck',[function () {
   $data = Input::all();
  return view('logincheck',$data);
}]);
Route::post('/signup',[function () {
	$data = Input::all();
  return view('signup',$data);
}]);
Route::get('/add_question',[function () {
   return view('add_question');
}]);
Route::get('/quiz',[function () {
   return view('quiz');
}]);
Route::post('/quiz',[function () {
   $data = Input::all();
   return view('quizwithanswer',$data);
}]);
Route::post('/questionadded',[function () {
   $data = Input::all();
   return view('questionadded',$data);
}]);
Route::get('/logout',[function () {
  return view('logout');
}]);
Route::get('/userscore',[function () {
 return view('userscore');
}]);
Route::get('/leaderboard',[function () {
 return view('leaderboard');
}]);
Route::get('/name',[function () {
  return view('name');
}]);

?>


 