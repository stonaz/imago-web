<?PHP
 session_start( );
if (isset($_SESSION["authenticatedUser"]))
header("Location: search.php");
?>