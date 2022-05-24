<?PHP
require 'check_auth.php';
require 'conn_auth.php';
require 'smarty.php';
require 'functions.php';



$sql="select distinct \"IDfondo\",fondo   from \"Fondi\" F order by 2;";
$fondi=get_items_list($dbconn,$sql);
$sql="select  * from elenco_luoghi;";
$items_list=get_items_list($dbconn,$sql);
$collocazioni=array();
foreach ($items_list as $c){
  //  print_r($c);
    $collocazione['value'] = $c['Galla Placidia']."/".$c['Torre']."/".$c['Piano'];
    $collocazione['text'] = $c['Sede']."/".$c['Torre']."/".$c['Piano_full'];
    array_push($collocazioni,$collocazione);
}
//print_r ($collocazioni);
if (isset($_GET['collocazione_sel']))
{
  $collocazione_sel=$_GET['collocazione_sel'];
  $collocazioni_array = explode("/", $collocazione_sel);
$sede = $collocazioni_array[0];
$torre = $collocazioni_array[1];
$piano = $collocazioni_array[2];
  $sql="SELECT distinct ubicazione
    FROM \"Fondi\" F, \"Serie\" S, \"Collocazione\" C, \"Responsabili\" R
    WHERE (ubicazione is not null or ubicazione <> '')
    AND F.\"IDfondo\" = S.\"IDfondo\"
    AND S.\"IDserie\" = C.\"IDserie\" AND F.\"IDfondo\" = R.\"IDfondo\"
    AND S.\"Galla Placidia\" = '$sede'
   AND C.\"Piano\" = '$piano'
    AND C.\"Torre\" = '$torre'
     ORDER BY ubicazione";
  //   echo $sql;
     $ubicazioni=get_items_list($dbconn,$sql);
  //   print_r($ubicazioni);
     $smarty->assign('collocazione_sel',$collocazione_sel);
    $smarty->assign('ubicazioni',$ubicazioni);

  
}
$filepath = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
//echo $filepath;
$smarty->assign('filepath',$filepath);
$smarty->assign('fondi',$fondi);
//$smarty->display('ricerca_fondi.tpl');
$smarty->assign('collocazioni',$collocazioni);
$smarty->display('ricerca.tpl');
?>