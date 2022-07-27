<?PHP
require 'functions.php'; // functions used in the script

header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT fondo  FROM "fondi" ';

//echo $sql;
$items_list=get_items_list($dbconn,$sql);
echo json_encode($items_list);
//echo indent(json_encode($items_list));





?>  