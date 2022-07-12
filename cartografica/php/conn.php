<?PHP
require "../../parametri.php";
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=Cartografica user=$user password=$pwd") or die ('no db');
?>