<?php

require_once('../private/initialize.php');

$errors = [];

if (is_post_request()) {
  $args = $_POST['member'] ?? [];

  // never accept a posted role from the public form
  unset($args['member_type']);

  $member = new Member($args);
  $member->member_type = 'm'; // force regular member

  if ($member->save() === true) {
    $session->message('Account created successfully! Please log in.');
    redirect_to(url_for('/login.php'));
  }
} else {
  $member = new Member();
  $member->member_type = 'm';
}

?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/index.php'); ?>">&laquo; Back to Birds</a>

  <div class="member new">
    <h1>Create Member</h1>

    <?php echo display_errors($member->errors); ?>

    <form action="<?php echo url_for('/signup.php'); ?>" method="post">

      <?php include(__DIR__ . '/staff/members/form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php');?>