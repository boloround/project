<?php

class Car
{
    public $make_model;
    public $price;
    public $miles;

    function worthBuying($max_price)
    {
        return $this->price < $max_price;
    }

    function __construct($car_make_model, $car_price, $car_miles)
    {
        $this->make_model = $car_make_model;
        $this->price = $car_price;
        $this->miles = $car_miles;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864);
$ford = new Car("2011 Ford F450", 55995, 14241);
$lexus = new Car("2013 Lexus RX 350", 44700, 20000);
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);




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
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$car->price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
