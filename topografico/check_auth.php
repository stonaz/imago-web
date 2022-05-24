<?php
  session_start( );

  $loginScript = "login.php";

  // Set a boolean flag to check if 
  // a user has authenticated
  $notAuthenticated = !isset($_SESSION["authenticatedUser"]);

  // Set a boolean flag to true if this request
  // originated from the same IP address
  // as the one that created this session
  $notLoginIp = isset($_SESSION["loginIpAddress"]) 
    && ($_SESSION["loginIpAddress"] !=
        $_SERVER['REMOTE_ADDR']);

  // Check that the two flags are false
  if($notAuthenticated)
  {
    // The request does not identify a session
    $loginMessage =      "Effettuare l'accesso";
    $_SESSION["loginMessage"] = $loginMessage;
    // Re-locate back to the Login page
    header("Location: " . $loginScript);
    exit;
  }
  else if($notLoginIp)
  {
    // The request did not originate from the machine
    // that was used to create the session. 
    // THIS IS POSSIBLY A SESSION HIJACK ATTEMPT

   // session_register("loginMessage");
    $loginMessage = 
      "You have not been authorized to access the " .
      "URL $REQUEST_URI from the address ". $_SERVER['REMOTE_ADDR'];
    $_SESSION["loginMessage"] = $loginMessage;
    // Re-locate back to the Login page
    header("Location: " . $loginScript);
    exit;
  }

?>