<?PHP
require 'check_auth.php';
require 'conn_auth.php';
require 'smarty.php';
require 'functions.php';



$sql="select distinct \"IDfondo\",fondo   from \"Fondi\" F order by 2;";
$fondi=get_items_list($dbconn,$sql);

$filepath = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
//echo $filepath;
$smarty->assign('filepath',$filepath);
$smarty->assign('fondi',$fondi);
$smarty->display('ricerca_fondi.tpl');
?>