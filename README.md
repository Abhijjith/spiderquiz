
# An online quiz platform.
<p> Hello guys. This is my third task for spider web dev inductions. </p>
<p> Basically in this quiz task , the user is allowed to either submit a question or answer the questions submitted or challenged by other users. </p>

# HOW I WENT ABOUT THE TASK.
<p> Upon reading the problem statement , i had a basic idea on how the functioning behind the scenes was gonna happen.
Also i had a brief or general idea on how my front end part should look. </p>
<p> Step by step i started creating the pages in order and started improvising it. </p>

# WHAT I BASICALLY USED.
<p> 1. Client side
      1. HTML
      2. CSS
      3. Javascript </p>
 <p>   2. Server Side
      1. PHP+MySQL . (XAMPP) </p>
       
# SERVER ROUTES

1. '/' - Welcome page or basically the homepage.
2. '/logincheck' - This is used for checking the user has already an account and is ready to login to the quiz page.
3. '/signup' - This is used for the registration purposes in the website.
4. '/add_question' - This enables the user to add a question.
5. '/quiz' - This is the official quiz page for logged in users.
6. '/questionadded' - This page is used for the confirmation that question has been added.
7. '/logout' - This enables the user to logout.
8. '/userscore' - This allows the user to check his score at any point of time.
9. '/leaderboard' - This shows the leaderboard of all users by score.
10. '/name' - This shows the leaderboard of all users sorted by name.

# BUILD INSTRUCTIONS.

1. Clone the repo onto a subdirectory of your base Apache server directory.
2. Install XAMPP in your system. You can download and install it from the links given at the end of this file.
Make the Apache and MySQL run using the XAMPP control panel.  
3. Make sure you also hav Laravel 5 installed. After the installation, create a new project names spiderquiz and the necesaary files will be automatically created in the folder directory.. 
4. Edit the config.php file. Write in your Username , password and database name. Also change the same in database.php and .env file.
5. Create a databse called quiz and your database tables will be created automaically once you run the localhost/quiz/public/  link. Because i hav given the create table Sql commands in the welcome.blade.php file.
6. All the external bootstrap modules are given in the public directory.  Download the modules from the following links to enable the loading function. http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css , https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js , http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js . 
7. So after folowing all these instructions , just play around running the localhost/quiz/public/ link. Have fun and enjoy the quiz interface. Cheers. 

# PROCESS HOW IT GOES ABOUT.

1. Initially when is request to the link localhost/spiderquiz/public/ is requested , the page will welcome you with a loading function. It will then show us the welcome page. It contains all the quiz instructions and its key features. It also conatins the registration and the login input fields.
2. An already registered user can enter the credientials in the login input fields and then proceed to the home page of the quiz.
3. A new comer to the quiz can enter the registration details through the input fields.
4. Once you enter the home page of the quiz , the user has two options. He can either submit questions by entering the question and their options in the input fields.
5. A user can answer all the unanswered questions and his score will be updated automatically.  The user can view his score at any point of time. There will be a pie chart depicting the score.
6. The user can also hav a look at the leaderboard which is depicted in tables using bootstrap. Have fun.

Will include screenshots soon.
