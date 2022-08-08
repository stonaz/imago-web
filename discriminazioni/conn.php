<?php
        include '../parametri.php';
        require 'check_auth.php';
        $dbconn = pg_connect ("host=$dbserver port=5432 dbname=Ebrei user=postgres password=Superman123") or die ('no db');
       // $root_dir = "/images/AS_Roma/Patrimonio/Imago/discriminazioni/";
      //  $root_dir="\\\\192.168.2.5\\imago\\Patrimonio\\Archivi\\AS_Roma\\Imago\\Discriminazioni";
      //  $iip_dir = "/images/AS_Roma/Patrimonio/Imago/discriminazioni/";
      $root_dir="/images/Patrimonio/Archivi/AS_Roma/Imago/Discriminazioni/";

        $iip_dir = "/images/Patrimonio/Archivi/AS_Roma/Imago/Discriminazioni/";

       // $server = "www.imago.archiviodistatoroma.beniculturali.it";
        $server = "212.189.172.101";
        try {
   $pdo = new PDO('pgsql:host='.$dbserver.';port=5432;dbname=Ebrei;user=postgres;password=Superman123');
   //echo "PDO connection object created";
}
catch(PDOException $e)
{
      echo $e->getMessage();
}


?>