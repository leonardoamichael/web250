<?php
require_once('../private/initialize.php');

// Log out the member (no need to require_login here)
$session->logout();

// Send them back to the public home/birds list
redirect_to(url_for('/index.php'));