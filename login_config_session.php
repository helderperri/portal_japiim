
<?php
require_once ("config.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['login_google'])){

    unset($_SESSION['login_source']);
    $_SESSION['login_source'] = $_POST['login_source'];
    //$loginurl = $_POST['loginurl'];
    //header("Location: ".$loginurl."");
  }
  ?>