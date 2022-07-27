<?PHP
require 'functions.php'; // functions used in the script

header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT *  FROM "provenienza" ';

if ($_GET['fondo']){
    $fondo= ($_GET['fondo']);
    $sql .= " where fondo = '$fondo' ";
    $ufficio= ($_GET['ufficio']);
    $sql .= " and ufficio = '$ufficio' ";
    if ($_GET['serie'])
      {
      $serie= ($_GET['serie']);
      $sql .= " and serie = '$serie' ";
      }
    
}
//echo $sql;
$items_list=get_items_list($dbconn,$sql);
echo json_encode($items_list);
//echo indent(json_encode($items_list));





?>  