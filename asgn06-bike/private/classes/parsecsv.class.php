<?php

class ParseCSV {


//  HOW: The character passed to fgetcsv to split each row into columns.
//  WHY: CSV files can use different separators. Setting it here makes parsing flexible.

  public static $delimiter = ',';

  private $filename;
  private $header;
  private $data=[];
  private $row_count = 0;

  public function __construct($filename='') {
    if($filename != '') {
      $this->file($filename);
    }
  }

  public function file($filename) {
    if(!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif(!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  public function parse() {
    if(!isset($this->filename)) {
      echo "File not set.";
      return false;
    }

    // clear any previous results
    $this->reset();

    $file = fopen($this->filename, 'r');
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if($row == [NULL] || $row === FALSE) { continue; }
      if(!$this->header) {
     	  $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
     	}
    }
    fclose($file);
    return $this->data;
  }

  // HOW: Returns the most recent parsed data without re-reading the file.
  // WHY: Caller may need the results again after parse() without extra work.
  public function last_results() {
    return $this->data;
  }

  //  HOW: Returns the number of data rows parsed, not counting the header.
  //  WHY: Useful for summaries, tests, or pagination logic.
  public function row_count() {
    return $this->row_count;
  }
  
  // HOW: Resets header, data array, and row counter to their initial values.
  // WHY: Ensures each call to parse() starts clean and does not mix old results.
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->row_count = 0;
  }

}

?>
