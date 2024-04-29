<?php
//reusing code

//start session
session_start();

//Used code from class material
require 'includes/database-connection.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>SignUp</title>
    <link href = "./css/Client.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Dela+Gothic+One&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">


</head>
<body>

<div class="Top">
    <h1 id="Title"> Sign Up Page</h1>

    <img id="logo" src="./images/concept_logo.png" alt="logo">
</div>


<br>

<div class="navBar">
    <nav>
        <a href ="https://alexchow.rhody.dev/web_profiles/about.html">About </a>
        <a href ="https://alexchow.rhody.dev/web_profiles/index.html">Home </a>
        <a href ="https://alexchow.rhody.dev/web_profiles/concerts.html">Concerts</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/music.html">Music</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/phpclient.php">Merch</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/signup.php">Sign Up</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/login.php">Log In</a>
    </nav>
</div>

<div class="background-img">
    <div class = "wrap">
        <h1>Sign up page</h1>



        <form action="signup-process.php" method="POST">
            <div class="fields">
                <div class="field quarter">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field quarter">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field quarter">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div class="field quarter">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>


            </div>
            <ul class="actions">
                <li><input type="submit" value="Sign Up" ></li>
            </ul>
        </form>
    </div>
</div>

</body>



