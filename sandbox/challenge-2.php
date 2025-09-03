<?php

class Movie {
  var $title;
  var $genre;
  var $release_year;
  var $length_in_minutes;
  var $director;
  var $rating;

  function minutes_to_hours() {
    return round($this->length_in_minutes / 60, 2);
  }
}

class ForeignFilm extends Movie {
  var $has_subtitles;
  var $has_english_voiceover;
  var $country;

  function is_suited_for_english_audience() {
  return $this->has_subtitles || $this->has_english_voiceover;
}
}

$ish = new ForeignFilm;
$ish->title = 'I am still here';
$ish->genre = 'Period piece';
$ish->release_year = '2025';
$ish->length_in_minutes = "87";
$ish->director = "Walter Salles";
$ish->rating = "PG-13";
$ish->has_subtitles = true;
$ish->has_english_voiceover = false;
$ish->country = "Brazil";

echo "<h2>" . $ish->title . "</h2>";
echo "Sub-Genre: " . $ish->genre . "<br>";
echo "Country: " . $ish->country . "<br>";
echo "Release Year: " . $ish->release_year . "<br>";
echo "Length: " . $ish->length_in_minutes . " minutes (" . $ish->minutes_to_hours() . " hours)<br>";
echo "Suited for English audience? " . ($ish->is_suited_for_english_audience() ? "Yes" : "No") . "<br>";
