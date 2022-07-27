<?PHP
require 'functions.php'; // functions used in the script

header('Content-Type: application/json'); //for correct output in browsers
$sql='SELECT alias  FROM "alias_view" ';

//echo $sql;
$items_list=get_items_list($dbconn,$sql);
$alias_list=array();
foreach ($items_list as $test)
{
   array_push( $alias_list,$test['alias']);
}
echo json_encode($alias_list);
//echo indent(json_encode($items_list));





?>  