<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT distinct classificazione  FROM "Principale_CD" order by 1';

//echo $sql;
$items_list=get_items_list($dbconn,$sql);
$lista_luoghi=array();
foreach ($items_list as $luoghi)
{
   
   //echo indent(json_encode($luoghi));
   
   $luogo=$luoghi['classificazione'];
   array_push( $lista_luoghi,$luogo);
}
//echo json_encode($lista_luoghi);
echo indent(json_encode($lista_luoghi));

?>  