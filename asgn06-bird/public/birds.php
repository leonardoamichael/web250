<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<!-- /* 
  Create a table. The header should reflect the headings in the wnc-birds.csv class.
  Use a table border of 1 to make the display easier to read.
*/ -->

<table border="1" cellpadding="6" cellspacing="0">
  <thead>
    <tr>
      <th>Common Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Nest Placement</th>
      <th>Behavior</th>
      <th>Conservation ID</th>
      <th>Backyard Tips</th>
    </tr>
  </thead>
  <tbody>
   
<?php

  $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
  $bird_array = $parser->parse();

/*
  Create a foreach array using $bird_array as $args
  Create a new instance of $bird
*/

  foreach($bird_array as $args):
   $bird = new Bird($args)
  ?>
  
  
<!-- /*
  Create a table row that lists out all of the bird
  properties.

*/ -->


  <tr>
    <td><?php echo h($bird->common_name); ?></td>
    <td><?php echo h($bird->habitat); ?></td>
    <td><?php echo h($bird->food); ?></td>
    <td><?php echo h($bird->nest_palcement); ?></td>
    <td><?php echo h($bird->behavior); ?></td>
    <td><?php echo h($bird->conservation_id); ?></td>
    <td><?php echo h($bird->backyard_tips); ?></td>
  </tr>
<?php endforeach; ?>

</tbody>
</table>

<?php

$sql = "SELECT * FROM birds";
$result = $database->query($sql);

// Loop through all rows returned by the query
while($row = $result->fetch_assoc()) {
  echo "Name: " . $row['common_name'] . "<br>";
}

// Free the result set
$result->free();

?>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
