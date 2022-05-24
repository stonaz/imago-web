<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
$toponimo = pg_escape_string($_GET['toponimo']);


$sql="SELECT  C.\"classe\" , C.\"fondo\",C.\"#classe\" , C.\"#fondo\",scheda.\"#cartella\", scheda.\"#bis\",scheda.\"#UA\", scheda.\"#sub\", scheda.\"luogo\"
      FROM \"Classe\" C, \"Principale_CD\"  scheda, \"Toponimo_CD\" as toponimo
      WHERE scheda.\"#classe\" = C.\"#classe\"
      AND scheda.\"#fondo\" = C.\"#fondo\"
      AND scheda.\"#cartella\" = toponimo.\"#cartella\"
      AND scheda.\"#UA\" = toponimo.\"#foglio\"
      AND scheda.\"#sub\" = toponimo.\"#sub\"
      AND toponimo.\"mix2\" = '$toponimo'
      order by 1,2,3,4,5,6,7;";

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
echo json_encode($segnatura_list);
//echo indent(json_encode($segnatura_list));

?>  