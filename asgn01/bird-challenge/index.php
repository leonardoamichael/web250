<?php

class Bird {

  var $commonName;
  var $food;
  var $nestPlacement;
  var $conservationLevel;
  var $song;
  var $canFly;
  
  function song() {
    return $this->song;
  }

  function canFly() {
    return $this->canFly;
  }
}

$et = new Bird;
$et->commonName = 'Eastern Towhee';
$et->food = 'seeds, fruits, insects, spiders';
$et->nestPlacement= 'Ground';
$et->conservationLevel = "Low";
$et->song = "drink-your-tea!";
$et->canFly = "This bird can fly";

$ib = new Bird;
$ib->commonName = 'Indigo Bunting';
$ib->food = 'small seeds, berries, buds, and insects';
$ib->nestPlacement= 'roadsides, and railroad rights-of-wafields and on the edges';
$ib->conservationLevel = "Low";
$ib->song = "whatwhat!!";
$ib->canFly = "This bird can fly";

echo "<h2>" . $et->commonName . "</h2>";
echo "Food: " . $et->food . "<br>";
echo "Nest Placement: " . $et->nestPlacement . "<br>";
echo "Conservation Level: " . $et->conservationLevel . "<br>";
echo "Song: " . $et->song() . "<br>";
echo $et->canFly() . "<br>";

echo "<h2>" . $ib->commonName . "</h2>";
echo "Food: " . $ib->food . "<br>";
echo "Nest Placement: " . $ib->nestPlacement . "<br>";
echo "Conservation Level: " . $ib->conservationLevel . "<br>";
echo "Song: " . $ib->song() . "<br>";
echo $ib->canFly() . "<br>";