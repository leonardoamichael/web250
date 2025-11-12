<!doctype html>

<html lang="en">
  <head>
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/public.css'); ?>">
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          WNC Birds
        </a>
      </h1>
      <div id="auth-nav">
        <?php if($session->is_logged_in()) { ?> Logged in as <?php echo h($session->username); ?>
        (<a href="<?php echo url_for('/logout.php'); ?>">Logout</a>)
        <?php if($session->is_admin()) { ?>
          | <a href="<?php echo url_for('/members/index.php'); ?>">View Members</a>
        <?php } ?>
        <?php } else { ?>
          <a href="<?php echo url_for('/login.php'); ?>">Login</a> |
          <a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a>
        <?php } ?>
      </div>
    </header>
