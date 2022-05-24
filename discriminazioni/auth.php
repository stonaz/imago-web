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
    $pdo = new PDO('pgsql:host=$dbserver;dbname=Ebrei', 'postgres', 'Superman123');
    $stmt = $pdo->prepare("SELECT password, email FROM users where password =  crypt(:pwd, password) AND email = :email AND active=true");
    $stmt->bindParam(':email', $username);
    $stmt->bindParam(':pwd', $password);
    $stmt->execute() or die('error on auth select');
    $result = $stmt->fetchAll();
    $match  = count($result);
//    echo $match;
   if ($match > 0)
    return true;
  else
    return false;

}

function log_access($user,$ip,$timestamp)
{
//$dbconn = pg_connect ("host=localhost port=5432 dbname=Topografico user=postgres password=postgres") or die ('no db');
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=Ebrei user=postgres password=Superman123") or die ('no db');

//$result = pg_prepare($dbconn, "query", "INSERT into access_log ( \"user\" , ip_address, \"timestamp\") values ( $1 ,  $2, $3)");
//$result = pg_execute($dbconn, "query", array($user,$ip,$timestamp));
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
 // header("Location: index.php");
  echo "<script>top.window.location = 'discriminazioni.php'</script>";
  }
  else
  {
    // The authentication failed
    $_SESSION['loginMessage'] = "Accesso non riuscito";
      // Relocate back to the login page
 header("Location: login.php");
  
  }

  
?>