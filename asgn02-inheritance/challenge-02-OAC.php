<?php
class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weightKg = 0.0;
  protected $wheels = 2;

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function weightKg() {
    return $this->weightKg . ' kg';
  }

  public function setWeightKg($value) {
    $this->weightKg = floatval($value);
  }
  public function weightLbs() {
    return floatval($this->weightKg) * 2.2046226218;
  }

  public function setWeightLbs($value) {
    $this->weightKg = floatval($value) / 2.2046226218;
  }

  public function wheelDetails() {
    $wheelString = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
    return "It has " . $wheelString . ".";
  }

}

class Unicycle extends Bicycle {
  protected $wheels = 1;
}

$trek = new Bicycle;
$trek->brand = 'BMX';
$trek->model = 'Ridgeline';
$trek->year = '2019';


$cd = new Bicycle;
$cd->brand = 'Huffy';
$cd->model = 'Viper';
$cd->year = '2023';

$uni = new Unicycle;

echo "Bicycle: " . $trek->wheelDetails() . "<br />";
echo "Unicycle: " . $uni->wheelDetails() . "<br />";
echo "<hr />";

echo "Set weight using kg<br />";
$trek->setWeightKg(1);
echo $trek->weightKg() . "<br />";
echo $trek->weightLbs() . "<br />";
echo "<hr />";

echo "Set weight using lbs<br />";
$trek->setWeightLbs(2);
echo $trek->weightKg() . "<br />";
echo $trek->weightLbs() . "<br />";
echo "<hr />";

echo $trek->name() . "<br>";
echo $cd->name() . "<br>";
echo $cd->wheelDetails() . "<br>";
