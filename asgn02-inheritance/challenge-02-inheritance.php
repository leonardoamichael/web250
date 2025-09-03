<?php

class Movie {
  var $title = "Crash Landing On You";
  var $genre = "Foreign Film";
  var $releaseYear;
  var $lengthInMinutes;
  var $director;
  var $rating;

  function minutesToHours() {
    return round($this->lengthInMinutes / 60, 2);
  }
}

class ForeignFilm extends Movie {
  var $hasSubtitles;
  var $hasEnglishVoiceover;
  var $country = "South Korea";
  var $subGenre;

  function isSuitedForEnglishAudience() {
  return $this->hasSubtitles || $this->hasEnglishVoiceover;
}
}

class ForeignSeries extends ForeignFilm {
  var $numberOfEpisodes;
  var $numberOfSeasons;
  var $stillAiring;

  function isSeries() {
  return $this->numberOfEpisodes > 1 ;
}
}


$clon = new ForeignSeries;
$clon->subGenre = 'Korean Drama';
$clon->releaseYear = '2025';
$clon->numberOfEpisodes = "13";
$clon->lengthInMinutes = "45";
$clon->director = "Walter Salles";
$clon->hasSubtitles = true;
$clon->hasEnglishVoiceover = false;

$isSeriesText = $clon->isSeries() ? "Yes" : "No";
$isSuitedText = $clon->isSuitedForEnglishAudience() ? "Yes" : "No";
$hours = $clon->minutesToHours();

echo "<h2>" . $clon->title . "</h2>";
echo "Genre: " . $clon->genre . "<br>";
echo "Sub-Genre: " . $clon->subGenre . "<br>";
echo "Country: " . $clon->country . "<br>";
echo "Release Year: " . $clon->releaseYear . "<br>";
echo "Is this a series? " . $isSeriesText . "<br>";
echo "Length: " . $clon->lengthInMinutes . " minutes (" . $hours . " hours)<br>";
echo "Suited for English audience? " . $isSuitedText . "<br>";
