<?php

/*
 * Using code from horoscope key
 */
//start session
session_start();
// Include the session script


require 'includes/session.php';

// If already logged in
if ($logged_in) {
    // Redirect to profile page
    header('Location: profile.php');

    // Stop further code running
    exit;
}


// Check if the form was submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username the user sent
    $email = $_POST['email'];

    // Get the password the user sent
    $password = $_POST['password'];


    // Call your authenticate function in the 'session.php' file to authenticate the user based on the provided username and password.
    $user = authenticate($pdo, $email, $password);

    // If username and password is valid (i.e., user data returned)
    if ($user) {
        // Call the login function in the 'session.php' file to update session data
        login($email);

        // Redirect to profile page
        header('Location: profile.php');

        // Stop further code running
        exit;
    }
    else{
        echo "Invalid login";

    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
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
    <h1 id="Title"> Log in Page</h1>

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
        <h1>Login </h1>

        <form method="POST" action="login.php">
            Email: <input type="email" name="email"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Log In">
        </form>




    </div>
</div>
<footer>
    <p> &copy; 2024 EXILE</p>

    <a href="https://www.freepik.com/author/dgim-studio"> Background Image by dgim-studio</a>
    <a href="https://www.freepik.com/free-vector/grunge-seamless-pattern-with-skulls_8083820.htm#query=metal%20music&position=0&from_view=keyword&track=ais&uuid=c54f4d4f-3c7e-4a50-90ef-b53e8972a1ae"> Image link on Freepik</a>
</footer>
</body>



