<?php
include "../../parametri.php";
function db_connect($dbserver)
{
$link_id=pg_connect("host=$dbserver port=5432 dbname=Bazzani user=imago_web password=normal.2020");
if ($link_id==0) {echo "Connessione al DATABASE non riuscita <BR>";return;}
return $link_id;
}

function db_disconnect()
{
pg_close();
}

?>