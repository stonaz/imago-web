<?PHP
require 'functions.php'; // functions used in the script

header('Content-Type: application/json'); //for correct output in browsers
$testo = pg_escape_string($_GET['testo']);
$testo2= pg_escape_string($_GET['testo2']);



if ($testo and $testo2)
{
 $sql="SELECT distinct numero, bis, \"DENOMINAZIONE\",\"OK\" FROM webview 
WHERE 

  (\"DENOMINAZIONE\" ILIKE '%$testo%' OR \"DENOMINAZIONE\" ILIKE '%$testo2%' ) OR 
  (autori ILIKE '%$testo%' OR autori ILIKE '%$testo2%' ) OR
  (fondo ILIKE '%$testo%' OR fondo ILIKE '%$testo2%' )
  ORDER BY 1,2,3;";  
}


else

 {
 $sql="SELECT distinct numero, bis, \"DENOMINAZIONE\",\"OK\" FROM webview 
WHERE 

  (\"DENOMINAZIONE\" ILIKE '%$testo%'  ) OR 
  (autori ILIKE '%$testo%'  ) OR
  (fondo ILIKE '%$testo%'  )
  ORDER BY 1,2,3;";  
}






//echo $sql;
//$items_list=get_items_list($dbconn,$sql);
 $items_list=get_items_list($dbconn,$sql);
  $segnatura_list=array();
 foreach ($items_list as $segnatura)
{
   $segnature=array();
   $segnature["numero"]=$segnatura["numero"];
   $segnature["bis"]=$segnatura["bis"];
   $segnature["DENOMINAZIONE"]=$segnatura["DENOMINAZIONE"];
   $segnature["OK"]=$segnatura["OK"];

  array_push( $segnatura_list,$segnature);

 }
//echo json_encode($luoghi);
echo indent(json_encode($segnatura_list));

?>  