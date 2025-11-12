<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<?php if($session->is_member()) { ?>
  <p><a href="<?php echo url_for('/birds/new.php'); ?>">Add Bird</a></p>
<?php } ?>

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
      <th>Conservation ID</th>
      <th>Backyard Tips</th>
      <th>View</th>
      <?php if($session->is_member()) { ?>
        <th>Edit</th>
        <th>Delete</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
   
<?php


  $birds = Bird::find_all();


/*
  Create a foreach array using $bird_array as $args
  Create a new instance of $bird
*/

  foreach($birds as $bird):
  ?>
  
  
<!-- /*
  Create a table row that lists out all of the bird
  properties.

*/ -->


  <tr>
    <td><?php echo h($bird->common_name); ?></td>
    <td><?php echo h($bird->habitat); ?></td>
    <td><?php echo h($bird->food); ?></td>
    <td><?php echo h($bird->conservation_id); ?></td>
    <td><?php echo h($bird->backyard_tips); ?></td>
<td><a href="detail.php?id=<?php echo h(u($bird->id)); ?>">View</a></td>
<?php if($session->is_member()) { ?>
  <td><a href="<?php echo url_for('/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
  <td><a href="<?php echo url_for('/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
<?php } ?>
  </tr>
<?php endforeach; ?>

</tbody>
</table>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
