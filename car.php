<?php

class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image_path;


    function setMake($new_make)
    {
        $this->make_model = (string) $new_make;
    }

    function getMake()
    {
        return $this->make_model;
    }

    function setPrice($new_price)
    {
        $this->price = (int) $new_price;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setMiles($new_miles)
    {
        $this->miles = (int) $new_miles;
    }

    function getMiles()
    {
        return $this->miles;
    }

    function setImagePath($new_image_path)
    {
        $this->image_path = (string) $new_image_path;
    }

    function getImagePath()
    {
        return $this->image_path;
    }

    function worthBuying($max_price)
    {
        return $this->price < $max_price;
    }

    function __construct($car_make_model, $car_price, $car_miles, $car_image_path)
    {
        $this->make_model = $car_make_model;
        $this->price = $car_price;
        $this->miles = $car_miles;
        $this->image_path = $car_image_path;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864, "images/porsche.jpg");
$ford = new Car("2011 Ford F450", 55995, 14241, "images/ford.jpg");
$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");



$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <title>Your Car Dealership's Homepage</title>
    </head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $current_make_model = $car->getMake();
                $current_price = $car->getPrice();
                $current_miles = $car->getMiles();
                $current_image = $car->getImagePath();
                echo "<li> $current_make_model </li>";
                echo "<ul>";
                    echo "<li> $$current_price </li>";
                    echo "<li> Miles: $current_miles </li>";
                    echo "<li><img src='$current_image' alt='$current_make_model'></li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
