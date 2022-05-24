<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT distinct "mix2"  FROM "Toponimo_CD" order by 1 ';

$items_list=get_items_list($dbconn,$sql);
$lista_toponimi=array();
foreach ($items_list as $toponimi)
{

   $toponimo=$toponimi['mix2'];
   //echo $autore;
   array_push( $lista_toponimi,$toponimo);
}
//echo json_encode($lista_toponimi);
echo indent(json_encode($lista_toponimi))

?>  