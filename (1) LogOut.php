
<?php

  // Destroy the session
  session_start();
  session_unset();
  unset($_SESSION['email']);
  session_destroy();

  
  // Redirect to the login page
  header("Location:index.php");
  die  ?>
