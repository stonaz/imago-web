<?PHP
require 'check_auth.php';
require 'conn_auth.php';
require 'smarty.php';
//require 'conn.php';
require 'functions.php';

$id_fondo=$_GET['id_fondo'];
$fields=array();
$responsabile="";
$fondo="";
$collocazioni = array();
//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//$sql="select * from \"Collocazione\" limit 20;";
$sql_resp="select r.\"Nome\",r.\"Cognome\",f.fondo
from \"Fondi\" f, \"Responsabili\" r
where 
r.\"IDfondo\" = $id_fondo
AND f.\"IDfondo\"  = r.\"IDfondo\";";
$resp_data=get_items_list($dbconn,$sql_resp);
//print_r($resp_data);
if(!empty($resp_data)){
    $responsabile = $resp_data[0]['Nome']." ".$resp_data[0]['Cognome'];
    $fondo = $resp_data[0]['fondo'];
}


$sql="SELECT
S.\"Galla Placidia\" as \"Sede\",
\"Serie\" || ' ' ||
C.\"subserie\" as \"Subserie\",
C.\"Torre\",
C.\"Piano\",
C.\"ubicazione\" as \"Ubicazione\",
C.\"fila/chiave\" as \"Fila/Chiave\",
C.\"lato/cassetta\" as \"Lato/Cassetta\",
C.\"ordine\" as \"Ordine\",
C.\"range\" as \"Range\",
C.\"sigla\" as \"Sigla\",
C.\"note\" as \"Note\"
FROM \"Serie\" S, \"Collocazione\" C where 
C.\"IDfondo\" = $id_fondo
AND S.\"IDfondo\"  = C.\"IDfondo\"
AND S.\"IDserie\"  = C.\"IDserie\"
ORDER BY S.\"IDserie\",C.\"subserie\",C.\"numero\",C.\"bis\"";

//echo $sql;

$items_list=get_items_list($dbconn,$sql);

//print_r($items_list);
if(!empty($items_list)){
    
    foreach ($items_list as $i) {
        if ($i['Sede']=='0'){
           $i['Sede']="Sapienza"; 
        }
        elseif ($i['Sede']=='1') {
          $i['Sede']='Galla Placidia';  
        }
        else {
          $i['Sede']='';  
        }
        //unset($i['IDfondo']);
        array_push($collocazioni,$i);
     //  print_r($i);
   //  print "<br>";
    }
    $fields = array_keys($collocazioni[0]);
}

$conteggio = count($items_list);

//print_r($fields);
$filepath = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
//echo $filepath;
$smarty->assign('filepath',$filepath);
$smarty->assign('responsabile',$responsabile);
$smarty->assign('fondo',$fondo);
$smarty->assign('id_fondo',$id_fondo);
$smarty->assign('conteggio',$conteggio);
$smarty->assign('fields',$fields);
$smarty->assign('collocazione_rs',$collocazioni);
$smarty->display('collocazione_fondi.tpl');
?>