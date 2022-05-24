<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT distinct "Nominativo","qualifica"  FROM "Autore_CD" order by 1 ';

$items_list=get_items_list($dbconn,$sql);
$lista_nominativi=array();
foreach ($items_list as $nominativi)
{
   $autore=array();
   $autore['nominativo']=$nominativi['Nominativo'];
   $autore['qualifica']=$nominativi['qualifica'];
   //echo $autore;
   array_push( $lista_nominativi,$autore);
}
//echo json_encode($lista_nominativi);
echo indent(json_encode($lista_nominativi))

?>  