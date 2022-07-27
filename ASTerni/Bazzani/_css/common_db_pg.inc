<?php
include "../../parametri.php";
function db_connect($dbserver,$user,$pwd)
{
$link_id=pg_connect("host=$dbserver port=5432 dbname=Bazzani user=$user password=$pwd");
if ($link_id==0) {echo "Connessione al DATABASE non riuscita <BR>";return;}
return $link_id;
}

function db_disconnect()
{
pg_close();
}

?>