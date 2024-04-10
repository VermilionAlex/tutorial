<?php
//create a class for merchandise, for our client website as it is for a band
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





</body>


