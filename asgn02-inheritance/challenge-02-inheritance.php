<?php

class Movie {
  public $title = "Crash Landing On You";
  public $genre = "Foreign Film";
  protected $releaseYear;
  private $lengthInMinutes;
  public $director;
  public $rating;

  public function setLengthInMinutes($value) { 
    $this->lengthInMinutes = (int)$value; 
  }
    
  public function getLengthInMinutes() {
    return $this->lengthInMinutes; 
  }

  public function setReleaseYear($value) {
    $this->releaseYear = (int)$value;
  }
  public function getReleaseYear() { return $this->releaseYear; }

  public function minutesToHours() {
    return round($this->lengthInMinutes / 60, 2);
  }
}

class ForeignFilm extends Movie {
  public $hasSubtitles;
  public $hasEnglishVoiceover;
  public $country = "South Korea";
  public $subGenre;

  function isSuitedForEnglishAudience() {
  return $this->hasSubtitles || $this->hasEnglishVoiceover;
}
}

class ForeignSeries extends ForeignFilm {
  public $numberOfEpisodes;
  public $numberOfSeasons;
  public $stillAiring;

  function isSeries() {
  return $this->numberOfEpisodes > 1 ;
}
}


$crashLanding = new ForeignSeries;
$crashLanding->subGenre = 'Korean Drama';
$crashLanding->setReleaseYear(2025);
$crashLanding->numberOfEpisodes = "13";
$crashLanding->setLengthInMinutes(45);
$crashLanding->director = "Lee Jung-hyo";
$crashLanding->hasSubtitles = true;
$crashLanding->hasEnglishVoiceover = false;

$isSeriesText = $crashLanding->isSeries() ? "Yes" : "No";
$isSuitedText = $crashLanding->isSuitedForEnglishAudience() ? "Yes" : "No";
$hours = $crashLanding->minutesToHours();

echo "<h2>" . $crashLanding->title . "</h2>";
echo "Genre: " . $crashLanding->genre . "<br>";
echo "Sub-Genre: " . $crashLanding->subGenre . "<br>";
echo "Country: " . $crashLanding->country . "<br>";
echo "Release Year: " . $crashLanding->getReleaseYear() . "<br>";
echo "Is this a series? " . $isSeriesText . "<br>";
echo "Length: " . $crashLanding->getLengthInMinutes() . " minutes (" . $hours . " hours)<br>";
echo "Suited for English audience? " . $isSuitedText . "<br>";
