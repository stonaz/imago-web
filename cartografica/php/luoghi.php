<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
if (isset($_GET['soggetto']))
{
   $soggetto = $_GET['soggetto'];
}
$sql='SELECT distinct classe_luogo  FROM "classificazione" ';
if (!empty($soggetto))
{
   $sql.="where classe_soggetto = '$soggetto'";
}
$sql.=' order by 1';
//echo $sql;
$items_list=get_items_list($dbconn,$sql);
$lista_luoghi=array();
foreach ($items_list as $luoghi)
{
   
   //echo indent(json_encode($luoghi));
   
   $luogo=$luoghi['classe_luogo'];
   array_push( $lista_luoghi,$luogo);
}
//echo json_encode($lista_luoghi);
echo indent(json_encode($lista_luoghi));

?>  