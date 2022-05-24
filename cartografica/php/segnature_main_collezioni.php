<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
$classi_list=array();
$sql="SELECT DISTINCT \"#classe\" , \"classe\"  FROM  \"Classe\" 
 order by 1,2" ;
//echo $sql;
$classe_list=get_items_list($dbconn,$sql);
foreach ($classe_list as $classi)
{
$classe_sel=array();
$nome_classe=$classi["classe"];
$classe=$classi["#classe"];
$classe_sel["classe"]=$classi["#classe"];
$classe_sel["nome_classe"]=$classi["classe"];
$classe_sel["fondi"]=array();
//$fondo_sel["fondi"]=array();
$collezioni_list=array();
//selezione collezioni
$sql="SELECT DISTINCT P.\"#classe\" , P.\"#fondo\" , \"classe\",\"fondo\"  FROM \"Principale_CD\" P, \"Classe\" C
where P.\"#classe\" = C.\"#classe\"
and P.\"#fondo\" = C.\"#fondo\"
and P.\"#classe\" = $classe
 order by 1,2" ;
//echo $sql;
$fondo_list=get_items_list($dbconn,$sql);
if (!empty($fondo_list))
{
foreach ($fondo_list as $fondi)
{
$classe=$fondi["#classe"];
$fondo=$fondi["#fondo"];
$nome_classe=$fondi["classe"];
$nome_fondo=$fondi["fondo"];
$fondo_sel=array();
$fondo_sel["nome_fondo"]=$fondi["fondo"];
$fondo_sel["cartelle"]=array();
$sql="SELECT distinct \"#classe\",\"#fondo\",\"#cartella\"  FROM \"Principale_CD\"  where \"#fondo\" = '$fondo' and  \"#classe\" = '$classe' order by 1,2,3 " ;
 //echo $sql;
 $segnatura_list=get_items_list($dbconn,$sql);
 //print_r($segnatura_list);
//$segnature_list=array();
 foreach ($segnatura_list as $segnatura)
{
   
   $segnature=array();
   $fondo=$segnatura["#fondo"];
   $cartella=$segnatura["#cartella"];
   
   $segnature["cartella"]=$segnatura["#cartella"];
   $segnature["schede"]=array();
   
   $sql="SELECT \"#classe\", \"#fondo\", \"#cartella\", \"#UA\", \"#bis\", \"#sub\"  FROM \"Principale_CD\"  where \"#cartella\" = $cartella and  \"#fondo\" = '$fondo' and  \"#classe\" = '$classe'  order by 1,2,3,4,5,6" ;
  //echo $sql;
   $segnatura_items=get_items_list($dbconn,$sql);
   foreach ($segnatura_items as $scheda_item)
   {
     
      $scheda=array();
      //$scheda["nome_classe"]=$nome_classe;
      //$scheda["nome_fondo"]=$nome_fondo;
      $scheda['segnatura']=$scheda_item['#classe'];
      $scheda['classe']=$scheda_item['#classe'];
      $scheda['fondo']=$scheda_item['#fondo'];
      $scheda['segnatura'].="-".$scheda_item['#fondo'];
      $scheda['segnatura'].="-".$cartella;
      $scheda['bis']=$scheda_item['#bis'];
      $scheda['segnatura'].="-".$scheda_item['#bis'];
      $scheda['UA']=$scheda_item['#UA'];
      $scheda['segnatura'].="-".$scheda_item['#UA'];
      $scheda['sub']=$scheda_item['#sub'];
      $scheda['segnatura'].="-".$scheda_item['#sub'];
      array_push( $segnature["schede"],$scheda);
   }
   

  array_push( $fondo_sel["cartelle"],$segnature);

 }
 
 array_push( $collezioni_list,$fondo_sel);
  }
}
  $classe_sel['fondi']=$collezioni_list;
  array_push( $classi_list,$classe_sel);
}

echo json_encode($classi_list);

?>  