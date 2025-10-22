<?php

class Bird extends DatabaseObject {

  static protected $table_name = 'birds';
  static protected $db_columns = ['common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];
/*
Use the wnc-birds.csv file to create the properties
Make all of the properties public.
*/

public $id;
public $common_name;
public $habitat;
public $food;
public $conservation_id;
public $backyard_tips;
 
  /*
  Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
  Use the CONDITION_OPTIONS from the bicycle.class.php file

  1 = Low concern
  2 = Moderate concern
  3 = Extreme concern
  4 = Extinct
  */

public const CONSERVATION_OPTIONS = [
  1 => 'Low concern',
  2 => 'Moderate concern',
  3 => 'Extreme concern',
  4 => 'Extinct'
];

 /*
   - Create a public __contruct that accepts a list of $args[]
   - Use the Null coalescing operator
   - Create a default value of 1 for conservation_id
 */

public function __construct($args = []) {
  $this->common_name     = $args['common_name']    ?? '';
  $this->habitat         = $args['habitat']        ?? '';
  $this->food            = $args['food']           ?? '';
  $this->conservation_id = $args['conservation_id'] ?? 1;  // default to 1
  $this->backyard_tips   = $args['backyard_tips']  ?? '';
}



/*
  Create a public method called conservation(). This method should mimic the
    public function condition() from the bicycle.class.php file


*/

public function name() {
  return "{$this->common_name} {$this->habitat}";
}

public function conservation() {
  if($this->conservation_id > 0) {
    return self::CONSERVATION_OPTIONS[$this->conservation_id];
  } else {
    return "Unknown";
  }
}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->habitat)) {
    $this->errors[] = "Habitat cannot be blank.";
  }
  if(is_blank($this->food)) {
    $this->errors[] = "Food cannot be blank.";
  }
    return $this->errors;
  }


}

?>
