<?PHP
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=urbano user=$user password=$pwd") or die ('no db');
?>