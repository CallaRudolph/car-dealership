<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        function worthBuying($max_price)
           {
               return $this->price < ($max_price + 100);
           }

        function __construct($car_model, $car_price, $car_miles)
        {
            $this->make_model = $car_model;
            $this->price = $car_price;
            $this->miles = $car_miles;
        }

        function setModel($new_model)
        {
            $this->make_model = (float) $new_model;
            // if ($float_model != 0) {
            //   $this->model = $float_model;
            // }
        }

        function getModel()
        {
            return $this->make_model;
        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
              $formatted_price = number_format($float_price, 2);
              $this->price = $float_price;
            }
        }

        function getPrice()
        {
            return $this->price;
        }

        function setMiles($new_miles)
        {
            $float_miles = (float) $new_miles;
            if ($float_miles != 0) {
              $formatted_miles = number_format($float_miles, 2);
              $this->miles = $float_miles;
            }
        }

        function getMiles()
        {
            return $this->miles;
        }
    }

    $porsche = new Car("2014 Porsche 911", 114991, 7864);
    $ford = new Car("2011 Ford F450", 55995, 14241);
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

    $porsche->setModel("2013 Porsche");
    $ford->setPrice(15000);
    $lexus->setMiles(40000);

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET['price'])) {
            array_push($cars_matching_search, $car);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $matching_model = $car->getModel();
                $matching_price = $car->getPrice();
                $matching_miles = $car->getMiles();
                echo "<li> $matching_model </li>";
                echo "<ul>";
                    echo "<li> $$matching_price </li>";
                    echo "<li> Miles: $matching_miles </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
