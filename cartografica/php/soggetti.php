<?PHP
require 'functions.php'; // functions used in the script

if (isset($_GET['luogo']))
{
   $luogo = $_GET['luogo'];
}
//echo $luogo;
$sql='SELECT distinct classe_soggetto  FROM "classificazione" ';
if (!empty($luogo))
{
   $sql.="where classe_luogo = '$luogo'";
}
$sql.=' order by 1';
//echo $sql;
$items_list=get_items_list($dbconn,$sql);
$lista_soggetti=array();
foreach ($items_list as $soggetti)
{
   
   //echo indent(json_encode($luoghi));
   
   $soggetto=$soggetti['classe_soggetto'];
   array_push( $lista_soggetti,$soggetto);
}
//echo json_encode($lista_luoghi);
echo indent(json_encode($lista_soggetti));

?>  