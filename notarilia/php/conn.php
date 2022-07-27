<?PHP
include '../../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=notarilia user=$user password=$pwd") or die ('no db');
?>