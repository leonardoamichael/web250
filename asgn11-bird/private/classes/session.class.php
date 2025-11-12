<?php

class Session {

  private $member_id;
  public  $username;
  public  $member_type;  // 'm' (member) or 'a' (admin)
  private $last_login;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($member) {
    if($member) {
      // prevent session fixation attacks
      session_regenerate_id(true);
      $this->member_id    = $_SESSION['member_id']    = $member->id;
      $this->username     = $_SESSION['username']     = $member->username;
      $this->member_type  = $_SESSION['member_type']  = $member->member_type ?? 'm';
      $this->last_login   = $_SESSION['last_login']   = time();
    }
    return true;
  }

  public function is_logged_in() {
    return isset($this->member_id) && $this->last_login_is_recent();
  }

  // view helpers for the three-views logic
  public function is_member() {
    // members and admins both count as "member" for CRUD on birds
    return $this->is_logged_in() && in_array($this->member_type, ['m','a'], true);
  }

  public function is_admin() {
    return $this->is_logged_in() && $this->member_type === 'a';
  }

  // (optional) accessor if you need the id outside
  public function id() { return $this->member_id; }

  public function logout() {
    unset($_SESSION['member_id']);
    unset($_SESSION['username']);
    unset($_SESSION['member_type']);
    unset($_SESSION['last_login']);
    unset($this->member_id, $this->username, $this->member_type, $this->last_login);
    return true;
  }

  private function check_stored_login() {
    if(isset($_SESSION['member_id'])) {
      $this->member_id   = $_SESSION['member_id'];
      $this->username    = $_SESSION['username'] ?? '';
      $this->member_type = $_SESSION['member_type'] ?? 'm';
      $this->last_login  = $_SESSION['last_login'] ?? null;
    }
  }

  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  public function message($msg="") {
    if(!empty($msg)) {
      $_SESSION['message'] = $msg;
      return true;
    } else {
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message() {
    unset($_SESSION['message']);
  }
}

?>
