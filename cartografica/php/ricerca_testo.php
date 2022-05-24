<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
$testo = pg_escape_string($_GET['testo']);
$testo2= pg_escape_string($_GET['testo2']);

if ($testo and $testo2)
{
 $sql="SELECT DISTINCT
  C.\"classe\" , C.\"fondo\",C.\"#classe\" , C.\"#fondo\",
  principale.\"#cartella\", 
  principale.\"#bis\", 
  principale.\"#UA\",
  principale.\"#sub\"
  
FROM 
  \"Fogli_CD\" as fogli,
  \"Principale_CD\" as principale,
  \"Classe\" as C
WHERE
  principale.\"#classe\" = C.\"#classe\" AND
  principale.\"#fondo\" = C.\"#fondo\" AND
  principale.\"#classe\" = fogli.\"#classe\" AND
  principale.\"#fondo\" = fogli.\"#fondo\" AND
  fogli.\"#cartella\" = principale.\"#cartella\" AND
  fogli.\"#bis\" = principale.\"#bis\" AND
  fogli.\"#UA\" = principale.\"#UA\" AND
  fogli.\"#sub\" = principale.\"#sub\" AND
 (
  (lower(fogli.intestazione) ILIKE '%$testo%' OR fogli.intestazione ILIKE '%$testo2%' ) OR 
  (fogli.descrizione ILIKE '%$testo%' OR fogli.descrizione ILIKE '%$testo2%' ) OR
  (principale.\"descrizione intrinseca\" ILIKE '%$testo%' OR principale.\"descrizione intrinseca\" ILIKE '%$testo2%') OR
  (principale.sottoscrizioni ILIKE '%$testo%' OR principale.sottoscrizioni ILIKE '%$testo2%' )
  )
  ORDER BY 1,2,3;";  
}


else
{
 $sql="SELECT DISTINCT
  C.\"classe\" , C.\"fondo\",C.\"#classe\" , C.\"#fondo\",
  principale.\"#cartella\", 
  principale.\"#bis\", 
  principale.\"#UA\",
  principale.\"#sub\"
  
FROM 
  \"Fogli_CD\" as fogli,
  \"Principale_CD\" as principale,
  \"Classe\" as C
WHERE
  principale.\"#classe\" = C.\"#classe\" AND
  principale.\"#fondo\" = C.\"#fondo\" AND
  principale.\"#classe\" = fogli.\"#classe\" AND
  principale.\"#fondo\" = fogli.\"#fondo\" AND
  fogli.\"#cartella\" = principale.\"#cartella\" AND
  fogli.\"#bis\" = principale.\"#bis\" AND
  fogli.\"#UA\" = principale.\"#UA\" AND
  fogli.\"#sub\" = principale.\"#sub\" AND
 ( fogli.intestazione ILIKE '%$testo%' OR 
  fogli.descrizione ILIKE '%$testo%' OR
  principale.\"descrizione intrinseca\" ILIKE '%$testo%' OR
  principale.sottoscrizioni ILIKE '%$testo%') 
  ORDER BY 1,2,3;";  
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