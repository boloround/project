<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    session_start();
    if (empty($_SESSION['list_of_cars'])) {


//        $porsche = new Car("2014 Porsche 911", 114991, 7864, "images/porsche.jpg");
//        $ford = new Car("2011 Ford F450", 55995, 14241, "images/ford.jpg");
//        $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
//        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");



//        $cars = array($porsche, $ford, $lexus, $mercedes);

        $_SESSION['list_of_cars'] = array();

    }


    $app->get("/", function() use ($app) {
        $porsche = new Car("2014 Porsche 911", 114991, 7864, "images/porsche.jpg");
        $ford = new Car("2011 Ford F450", 55995, 14241, "images/ford.jpg");
        $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");

        $cars = array($porsche, $ford, $lexus, $mercedes);

        return $app['twig']->render('cars.html.twig', array('cars' => $cars));
    });

    $app->post("/car", function() use ($app) {
      $task = new Car($_POST['description']);
      $task->save();
      return $app['twig']->render('cars.html.twig', array('car' => $car));
   });

    return $app;
 ?>
