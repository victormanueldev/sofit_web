<?php
  session_start();
  session_destroy();
  header('Location: ../SofitWeb_1.3/login.php');
?>
