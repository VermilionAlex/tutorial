<?php
//create a class for merchandise, for our client website as it is for a band

//start session
session_start();

//Used code from class material
require 'validate.php';



class merch{

    //class members declared
    public string $item;
    public string $type;
    public int $stock;

    public float $price;

    public function __construct(string $item, string $type, float $price, int $stock) {
        $this->item = $item;
        $this->type = $type;

        $this->price = $price;
        $this->stock = $stock;
    }

    //getter and setter methods
    public function getItem() : string{
        return $this->item;
    }
    public function getStock() : int{
        return $this->stock;
    }

    public function setItem(string $item) :string {
        $this->item = $item;
        return $this->item;
    }

    public function setStock(int $stock)  {
        $this->stock = $stock;
        return;
    }

    //buy method, if stock is greater than 0, stock will decrease by 1, may be used later
    public function buy(){
        if ($this->stock > 0) {
            $this->stock--;
            return $this->stock;
        } else {
            return 'Out of Stock';
        }
    }


}

//create new objects for the merchandise class
$shirt = new merch('shirt', 'clothes', 20.00, 10);
$tickets = new merch('tickets', 'general', 10.00, 100);
$album = new merch('album', 'cd', 15.00, 20);


/*
 * USING CODE FROM CLASS
 */
//create a user array and an errors array
$user = [
    'name' => '',
    'age' => '',
    'terms' => '',
];

$errors = [
    'name' => '',
    'age' => '',
    'terms' => '',
];


//create a message variable
$message = '';

//if the request method is post, set the user array to the post values
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user['name'] = $_POST['name'];
    $user['age'] = $_POST['age'];
    $user['terms'] = (isset($_POST['terms']) and $_POST['terms'] == 'true') ? true : false;

    //check if the user input is valid
    $errors['name'] = is_text($user['name'],2,20) ? '' : 'Name must be between 2 and 20 characters';
    $errors['age'] = is_number($user['age'], 16,65) ? '' : 'Age must be between 16 and 65';
    $errors['terms'] = $user['terms'] ? '' : 'You must agree to the terms and conditions';


    //use implode method
    $invalid = implode($errors);
    if($invalid){
        $message = 'Please correct the following errors';
    } else {
        $message = 'Thank you for submitting the form';

        // Set cookies
        setcookie('user_name', $user['name'], 0, '/');
        setcookie('user_age', $user['age'], 0, '/');
        setcookie('user_terms', $user['terms'], 0, '/');

    }

}
// Display message
$userName = isset($_COOKIE['user_name']) ? htmlspecialchars($_COOKIE['user_name']) : '';
$userAge = isset($_COOKIE['user_age']) ? htmlspecialchars($_COOKIE['user_age']) : '';
$userTerms = isset($_COOKIE['user_terms']) ? htmlspecialchars($_COOKIE['user_terms']) : '';

// Display cookie data

$_SESSION['user_name'] = $userName;
$_SESSION['user_age'] = $userAge;
$_SESSION['user_terms'] = $userTerms;
echo '<p>Welcome back, ' . $userName . '!</p>';

?>

<?php include 'includes/merch.php'; ?>

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
        <a href ="https://alexchow.rhody.dev/web_profiles/about.html">About page </a>

        <a href ="https://alexchow.rhody.dev/web_profiles/index.html">Main page </a>
        <a href ="https://alexchow.rhody.dev/web_profiles/concerts.html">Concert and Shows</a>
        <a href ="https://alexchow.rhody.dev/web_profiles/music.html">Music</a>
    </nav>
</div>

<h1> Merchandise available:</h1>

<h2> <?= $shirt -> getItem() ?></h2>
<h2> <?= $tickets -> getItem() ?></h2>
<h2> <?= $album -> getItem() ?></h2>

<h2> <?= $shirt -> setStock(20) ?></h2>
<p> The shirts in stock are: <?= $shirt -> getStock() ?></p>


<form action="phpclient.php" method="POST">
    <div class="formText"> Name:</div> <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">
    <span class="error"><?= $errors['name'] ?></span><br>

    <div class="formText">Age: </div>
    <input type="text" name="age" value="<?= htmlspecialchars($user['age']) ?>">

    <span class="error"><?= $errors['age'] ?></span><br>
    <input type="checkbox" name="terms" value="true" <?= $user['terms'] ? 'checked' : '' ?>>

    <div class="formText"> I agree to the terms and conditions </div>
    <span class="error"><?= $errors['terms'] ?></span><br>
    <input type="submit" value="Save">
</form>



</body>



<?php

//destroy session and cookies, use code from class
$_SESSION = [ ];


$params = session_get_cookie_params();



setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
session_destroy();
?>