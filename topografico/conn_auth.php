<?PHP
//session_start( );
$user = $_SESSION['authenticatedUser'] ;
$password = $_SESSION['password'] ;
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=Topografico user=$user password=$password") or die ('no db');
?>