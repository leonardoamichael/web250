<?php
class Bird {
    public $commonName;
    public $latinName;

    public function __construct($commonName, $latinName) {
        $this->commonName = $commonName;
        $this->latinName = $latinName;
    }
}

$bird1 = new Bird("American Robin", "Turdus migratorius");
$bird2 = new Bird("Eastern Towhee", "Pipilo erythrophthalmus");

echo "Common Name: $bird1->commonName<br>Latin Name: $bird1->latinName <br>";
echo "Common Name: $bird2->commonName<br>Latin Name: $bird2->latinName <br>";