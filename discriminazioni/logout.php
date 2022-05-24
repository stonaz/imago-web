<?php
  session_start( );

  $appUsername = $_SESSION["authenticatedUser"];

  $loginMessage = "Utente \"$appUsername\" disconnesso";
  $_SESSION["loginMessage"] = $loginMessage;
 // session_register("loginMessage");

 // session_unregister("authenticatedUser");
  unset($_SESSION['authenticatedUser']);
  // Relocate back to the login page
 echo "<script>top.window.location = 'discriminazioni.php'</script>";
 // header("Location: index.php");
?>