<?PHP
require 'functions.php'; // functions used in the script
//header('Content-Type: application/json'); //for correct output in browsers
$testo = pg_escape_string($_GET['testo']);
$testo2= pg_escape_string($_GET['testo2']);

if ($testo and $testo2)
{

$sql="SELECT  C.\"classe\" , C.\"fondo\",C.\"#classe\" , C.\"#fondo\",scheda.\"#cartella\",
      scheda.\"#bis\",scheda.\"#UA\", scheda.\"#sub\", scheda.\"luogo\",CL.classe_luogo
      FROM \"Classe\" C, \"Principale_CD\"  scheda, \"classificazione\" CL
      WHERE scheda.\"#classe\" = C.\"#classe\"
      AND scheda.\"#fondo\" = C.\"#fondo\"
      AND scheda.\"#classe\" = CL.\"#classe\" 
  AND scheda.\"#fondo\" = CL.\"#fondo\"
      AND scheda.\"#cartella\" = CL.\"#cartella\"
      AND scheda.\"#UA\" = CL.\"#UA\"
      AND scheda.\"#sub\" = CL.\"#sub\"
      AND CL.\"classe_luogo\" = '$testo2'
      AND CL.\"classe_soggetto\" = '$testo'
      order by 1,2,3,4,5,6,7;";
}


else
{
$sql="SELECT  C.\"classe\" , C.\"fondo\",C.\"#classe\" , C.\"#fondo\",scheda.\"#cartella\",
      scheda.\"#bis\",scheda.\"#UA\", scheda.\"#sub\", scheda.\"luogo\",CL.classe_luogo
      FROM \"Classe\" C, \"Principale_CD\"  scheda, \"classificazione\" CL
      WHERE scheda.\"#classe\" = C.\"#classe\"
      AND scheda.\"#fondo\" = C.\"#fondo\"
      AND scheda.\"#classe\" = CL.\"#classe\" 
      AND scheda.\"#fondo\" = CL.\"#fondo\"
      AND scheda.\"#cartella\" = CL.\"#cartella\"
      AND scheda.\"#UA\" = CL.\"#UA\"
      AND scheda.\"#sub\" = CL.\"#sub\"
      AND CL.\"classe_soggetto\" = '$testo'
      order by 1,2,3,4,5,6,7;";  
}





//echo $sql;
//$items_list=get_items_list($dbconn,$sql);
 $items_list=get_items_list($dbconn,$sql);
  $segnatura_list=array();
 foreach ($items_list as $scheda_item)
{
   $scheda=array();
      $scheda["nome_classe"]=$scheda_item['classe'];
      $scheda["nome_fondo"]=$scheda_item['fondo'];
      $scheda['segnatura']=$scheda_item['#classe'];
      $scheda['classe']=$scheda_item['#classe'];
      $scheda['fondo']=$scheda_item['#fondo'];
      $scheda['segnatura'].="-".$scheda_item['#fondo'];
      $scheda['cartella']=$scheda_item['#cartella'];
      $scheda['segnatura'].="-".$scheda_item['#cartella'];
      $scheda['bis']=$scheda_item['#bis'];
      $scheda['segnatura'].="-".$scheda_item['#bis'];
      $scheda['UA']=$scheda_item['#UA'];
      $scheda['segnatura'].="-".$scheda_item['#UA'];
      $scheda['sub']=$scheda_item['#sub'];
      $scheda['segnatura'].="-".$scheda_item['#sub'];

  array_push( $segnatura_list,$scheda);

 }
echo indent(json_encode($segnatura_list));

?>  