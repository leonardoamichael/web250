<?php
class Bicycle {

  var $brand;
  var $model;
  var $year;
  var $description = 'Used bicycle';
  var $weight_kg = 0.0;

  function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  function weight_lbs() {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

}

$trek = new Bicycle;
$trek->brand = 'BMX';
$trek->model = 'Ridgeline';
$trek->year = '2019';
$trek->weight_kg = 1.0;

$cd = new Bicycle;
$cd->brand = 'Huffy';
$cd->model = 'Viper';
$cd->year = '2023';
$cd->weight_kg = 8.0;

echo $trek->name() . "<br>";
echo $cd->name() . "<br>";

echo $trek->weight_kg . "<br>";
echo $trek->weight_lbs() . "<br>";

$trek->set_weight_lbs(2);
echo $trek->weight_kg . "<br>";
echo $trek->weight_lbs() . "<br>";
