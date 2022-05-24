<?php

function db_connect()
{
$link_id=pg_connect("host=poirot port=5432 dbname=Bazzani user=postgres password=swordfish");
if ($link_id==0) {echo "Connessione non riusita <BR>";return;}
return $link_id;
}


function db_disconnect()
{
pg_close();
}

?>