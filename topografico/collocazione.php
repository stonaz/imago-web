<?PHP
require 'check_auth.php';
require 'conn_auth.php';
require 'smarty.php';
//require 'conn.php';
require 'functions.php';
ini_set("display_errors", "on");
ini_set('memory_limit','1G');

error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_GET['collocazione']))
{$collocazione=$_GET['collocazione'];}
else{
    $msg="Errore";
}

if (isset($_GET['ubicazione']))
{$ubicazione=$_GET['ubicazione'];}
else{
    $msg="Errore";
}

$collocazioni_array = explode("/", $collocazione);
//print_r($collocazioni_array);
$sede = $collocazioni_array[0];
$torre = $collocazioni_array[1];
$piano = $collocazioni_array[2];
if ($sede == '1'){
    $sede_full = "Galla Placidia";
}
else{
    $sede_full = "Sapienza";
}



//echo $sede;


$fields=array();

//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//$sql="select * from \"Collocazione\" limit 20;";



$sql="SELECT F.fondo as \"Fondo\",
S.\"Serie\",
C.\"subserie\" as \"Subserie\",
C.\"ubicazione\" as \"Ubicazione\",
C.\"fila/chiave\" as \"Fila/Chiave\",
C.\"lato/cassetta\" as \"Lato/Cassetta\",
C.\"ordine\" as \"Ordine\",
C.\"range\" as \"Range\",
C.\"sigla\" as \"Sigla\",
C.\"note\" as \"Note\"
FROM \"Fondi\" F, \"Serie\" S, \"Collocazione\" C, \"Responsabili\" R
WHERE F.\"IDfondo\" = S.\"IDfondo\"
AND S.\"IDserie\" = C.\"IDserie\"
AND F.\"IDfondo\" = R.\"IDfondo\"
";

if (isset($sede)) {
    $sql.="AND S.\"Galla Placidia\" = '$sede' ";
}

if (!empty($piano)) {
    $sql.="AND C.\"Piano\" = '$piano' ";
}

if (!empty($torre)) {
    $sql.="AND C.\"Torre\" = '$torre' ";
}

if (isset($ubicazione)) {
    if ($ubicazione == ''){
        $sql.="AND (C.\"ubicazione\" = '' OR C.\"ubicazione\" is null)";
    }
    else{
        $sql.="AND C.\"ubicazione\" = '$ubicazione' ";
    }
    
}

$sql.=" ORDER BY C.\"fila/chiave\",C.\"lato/cassetta\",C.\"ordine\",C.\"numero\",C.\"bis\"";



//echo $sql;




$filepath = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
if(!empty($msg))
{
    print "<span class='red'>$msg</span>";
}
else{
    $items_list=get_items_list($dbconn,$sql);

//print_r($items_list);
if(!empty($items_list)){
    $fields = array_keys($items_list[0]);
    $conteggio = count($items_list);
 //   echo "<strong>Record trovati: </strong>".count($items_list);
}
    $smarty->assign('filepath',$filepath);
$smarty->assign('sede',$sede_full);
$smarty->assign('torre',$torre);
$smarty->assign('piano',$piano);
$smarty->assign('conteggio',$conteggio);
$smarty->assign('fields',$fields);
$smarty->assign('collocazione_rs',$items_list);
$smarty->display('collocazione.tpl');
}

?>