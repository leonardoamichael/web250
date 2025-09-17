<?php
class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weightKg = 0.0;

  protected static $wheels = 2;
  protected static $instance_count = 0;
  public const CATEGORIES = ['road', 'mountain', 'hybrid', 'cruiser', 'city', 'BMX'];
  public $category;
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

  public static function wheelDetails() {
    $wheelString = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
    return "It has " . $wheelString . ".";
  }

  public static function create() {
    static::$instance_count++;
    return new static();
  }

  public static function getInstanceCount() {
    return static::$instance_count;
  }

}

class Unicycle extends Bicycle {

  protected static $wheels = 1;

  public function name() {
    return "Unicycle model: " . parent::name();
  }

  public function wheelDetailsOrFallback($useParent = false) {
    if($useParent) {
      return parent::wheelDetails();
    }
    return static::wheelDetails();
  }
}


$trek = Bicycle::create();
$trek->brand = 'BMX';
$trek->model = 'Ridgeline';
$trek->year = '2019';
$trek->category = 'BMX';

$cd = Bicycle::create();
$cd->brand = 'Huffy';
$cd->model = 'Viper';
$cd->year = '2023';
$cd->category = 'road';

$uni = Unicycle::create();

echo "Bicycle: " . Bicycle::wheelDetails() . "<br />";
echo "Unicycle: " . Unicycle::wheelDetails() . "<br />";
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
echo $cd->category . "<br>";
echo $uni->name() . "<br>";
echo $uni->wheelDetailsOrFallback() . "<br>";
echo "<hr />";

echo "Total instances created: " . Bicycle::getInstanceCount() . "<br>";
