<?php


// Include the session script
require 'includes/session.php';



// Redirect user if not logged in
require_login($logged_in);


// Retrieve the username from the session data
$email = $_SESSION['email'];


// Retrieves ALL emails from the database based on the username from the session data.
$sql = "SELECT * FROM user WHERE email = :email";

// Execute the SQL query using the pdo function w/arg for username and fetch the result
$user = pdo($pdo, $sql, ['email' => $email])->fetch();







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Merchandise</title>
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
    <h1 id="Title"> Concerts</h1>

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

        <h2>Here is your first and last name</h2>
        <h2><?= $user['fname'] ?></h2>
        <h2><?= $user['lname'] ?></h2>

    </div>
</div>

</body>



