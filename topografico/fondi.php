<?PHP
require 'check_auth.php';
require 'conn_auth.php';
require 'smarty.php';
//require 'conn.php';
require 'functions.php';
ini_set("display_errors", "on");
ini_set('memory_limit','1G');

error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_GET['textsearch']))
{$textsearch=$_GET['textsearch'];}
else{
    $msg="Inserire un termine per la ricerca";
}
$msg_text="";

$sql="SELECT DISTINCT F.\"IDfondo\", F.fondo as \"Fondo\"
FROM \"Fondi\" F, \"Serie\" S
WHERE F.\"IDfondo\" = S.\"IDfondo\" ";
 
// echo $sql;

if (!empty($textsearch)) {
    $smarty->assign('textsearch',$textsearch);
    $sql.=" AND (F.\"fondo\" ILIKE '%$textsearch%' or S.\"Serie\" ILIKE '%$textsearch%') ";
}
$sql.=" ORDER BY fondo";
//echo $msg_text;

$filepath = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
if(!empty($msg))
{
    print "<span class='red'>$msg</span>";
}
else{
    $items_list=get_items_list($dbconn,$sql);

//print_r($items_list);

$smarty->assign('filepath',$filepath);
//$smarty->assign('responsabile',$responsabile);
//$smarty->assign('fondo',$fondo);
//$smarty->assign('id_fondo',$id_fondo);
$smarty->assign('fields',$fields);
$smarty->assign('fondi',$items_list);
$smarty->display('fondi.tpl');
}

?>