<?php
//include 'log_access.php';
//include 'error.inc';

function authenticateUser($username, $password)
{
  // Test that the username and password 
  // are both set and return false if not
  if (!isset($username) || !isset($password))
    return false;
 // $dbconn = pg_connect ("host=localhost port=5432 dbname=Topografico user=$username password=$password") ;
  $dbconn = pg_connect ("host=$dbserver port=5432 dbname=Topografico user=$username password=$password") ;
  if (!$dbconn) 
    return false;
  else
    return true;

}

function log_access($user,$ip,$timestamp)
{
//$dbconn = pg_connect ("host=localhost port=5432 dbname=Topografico user=postgres password=postgres") or die ('no db');
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=Topografico user=imago_mgt password=Batman.2020") or die ('no db');

$result = pg_prepare($dbconn, "query", "INSERT into access_log ( \"user\" , ip_address, \"timestamp\") values ( $1 ,  $2, $3)");
$result = pg_execute($dbconn, "query", array($user,$ip,$timestamp));
}

// Main ----------

  session_start( );

  $authenticated = false;

  $appUsername = $_POST["formUsername"];
  $appPassword = $_POST["formPassword"];

  $authenticated = authenticateUser($appUsername, $appPassword);
  

  if ($authenticated == true) 
  {
    // Register the customer id
    $_SESSION['authenticatedUser'] = $appUsername;
    $_SESSION['password'] = $appPassword;
    $_SESSION['loginIpAddress'] = $_SERVER['REMOTE_ADDR'];
    $current_timestamp = date('Y-m-d H:i:s');
    log_access($_SESSION['authenticatedUser'] ,  $_SESSION['loginIpAddress'] , $current_timestamp);
  header("Location: index.php");
  }
  else
  {
    // The authentication failed
    $_SESSION['loginMessage'] = "Accesso non riuscito";
      // Relocate back to the login page
  header("Location: login.php");
  
  }

  
?>