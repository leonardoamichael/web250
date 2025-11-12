<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bird)) {
  redirect_to(url_for('/staff/birds/index.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
</dl>


<dl>
  <dt>Conservation Status</dt>
  <dd>
    <select name="bird[conservation_id]">
      <?php foreach (Bird::CONSERVATION_OPTIONS as $key => $label) { ?>
        <option value="<?php echo h($key); ?>"
          <?php if ((string)$bird->conservation_id === (string)$key) { echo 'selected'; } ?>>
          <?php echo h($label); ?>
        </option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>backyard Tips</dt>
  <dd><input type="text" name="bird[backyard_tips]" value="<?php echo h($bird->backyard_tips); ?>" /></dd>
</dl>
