<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  
// Find all bird;
$birds = Bird::find_all();
  
?>
<?php $page_title = 'Birds'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>


<div id="content">
  <div class="birds listing">
    <h1>Birds</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/birds/new.php'); ?>">Add Bird</a>
    </div>

  	<table class="list">
  <thead>
    <tr>
      <th>ID</th>
      <th>Common Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Conservation ID</th>
      <th>Backyard Tips</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($birds as $bird) { ?>
      <tr>
        <td><?php echo h($bird->id); ?></td>
        <td><?php echo h($bird->common_name); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->conservation_id); // or h($bird->conservation()) ?></td>
        <td><?php echo h($bird->backyard_tips); ?></td>
        <td><a class="action" href="<?php echo url_for('/birds/show.php?id=' . h(u($bird->id))); ?>">View</a></td>
        <td><a class="action" href="<?php echo url_for('/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo url_for('/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
