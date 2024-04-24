<?php


require 'includes/database-connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars(trim($_POST['lastname']));

    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate input
    if (empty($username) || empty($email)|| empty($firstname) || empty($lastname)) {
        echo "Please fill in all fields.";
        exit;
    }


    //we get the next user id number to choose from, should be the highest number + 1
    $user_id = $pdo->query("SELECT MAX(user_id) + 1 AS next_id FROM user")->fetch()['next_id'];

    // Insert the new user into table
    try {
        $pdo->beginTransaction();

        //We insert data into the user table
        $stmt = $pdo->prepare("INSERT INTO user (user_id,  fname, lname, email, password) VALUES (?, ? , ?, ?, ?)");
        $stmt->execute([$user_id, $firstname, $lastname,  $email,  $password]);

        $pdo->commit();
        // Successful login
        $redirectUrl = 'login.php';
        $message = "Signup successful. Redirecting to update page...";
    } catch (PDOException $e) {
        $pdo->rollBack();
        // Invalid credentials
        $redirectUrl = 'signup.php';
        $message = $e;    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
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

    <meta http-equiv="refresh" content="3;url=<?= $redirectUrl ?>">
</head>
<body>

<div class="Top">
    <h1 id="Title"> Concerts</h1>

    <img id="logo" src="./images/concept_logo.png" alt="logo">
</div>


<br>

<div class="navBar">
    <nav>
        <a href ="https://alexchow.rhody.dev/web_profiles/about.html">About page </a>

        <a href ="https://alexchow.rhody.dev/web_profiles/index.html">Main page </a>
        <a href ="https://alexchow.rhody.dev/web_profiles/concerts.html">Concert and Shows</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/music.html">Music</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/signup.php">Sign Up</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/login.php">Log In</a>
    </nav>
</div>

<div class="background-img">
    <div class = "wrap">


        <h2><?= $message ?></h2>




    </div>
</div>

</body>
