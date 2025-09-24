<?php
class Bird {
    public $commonName;
    public $latinName;

    public function __construct($args = []) {
        $this->commonName = $args['commonName'] ?? null;
        $this->latinName = $args['latinName'] ?? null;
    }

    public function summary() {
        return "Common Name: " . $this->commonName . "<br> Latin Name: " . $this->latinName;
    }
}

$bird1 = new Bird([
    'commonName' => 'Acadian Flycatcher',
    'latinName'  => 'Turdus migratorius'
]);

$bird2 = new Bird([
    'commonName' => 'Eastern Towhee',
    'latinName'  => 'Pipilo erythrophthalmus'
]);

echo $bird1->summary() . "<br>";
echo $bird2->summary();