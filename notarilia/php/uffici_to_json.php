<?PHP
require 'functions.php'; // functions used in the script

header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT *  FROM "uffici" ';

if ($_GET['fondo']){
    $fondo= ($_GET['fondo']);
    $sql .= " where fondo = '$fondo' ";
    
}
$sql .= " ORDER BY ufficio ";
//echo $sql;
$items_list=get_items_list($dbconn,$sql);
//foreach ($items_list as $)
//$items_list["data finale presunta"]="test";
//print_r($items_list);
echo json_encode($items_list);
//echo indent(json_encode($items_list));





?>  