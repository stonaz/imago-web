
<?PHP
require 'functions.php'; // functions used in the script
require 'conn.php'; 
header('Content-Type: application/json'); //for correct output in browsers
$fondi_list=array();
$sql="SELECT DISTINCT \"fondo\"  FROM  \"serie\" 
 order by 1" ;
//echo $sql;
$fondo_list=get_items_list($dbconn,$sql);
foreach ($fondo_list as $fondo)
{
$fondo_sel=array();
$nome_fondo=$fondo["fondo"];
//$id_fondo=$fondo["IDfondo"];
$fondo_sel["nome_fondo"]=$nome_fondo;
//$fondo_sel["id_fondo"]=$id_fondo;
//$classe_sel["nome_classe"]=$classi["classe"];
//$classe_sel["fondi"]=array();
//$fondo_sel["fondi"]=array();
$serie_list=array();
//selezione collezioni
$sql="SELECT DISTINCT S.\"#serie\" , S.\"serie\" 
FROM \"serie\" S
WHERE S.\"fondo\" = '$nome_fondo'
 order by 1,2" ;
//echo $sql;
$serie_rs=get_items_list($dbconn,$sql);
if (!empty($serie_rs))
{
foreach ($serie_rs as $serie)
{

$id_serie=$serie["#serie"];
$nome_serie=$serie["serie"];
$serie_sel=array();
$serie_sel["serie"]=$nome_serie;
//$serie_sel["nome_fondo"]=$nome_fondo;
$serie_sel["buste"]=array();
$sql="SELECT  fondo,\"#serie\",\"#busta\",titolo
FROM \"buste\"
where \"#serie\" =  '$id_serie' order by 1,2,3" ;
 //echo $sql;
 $segnatura_list=get_items_list($dbconn,$sql);
 if (!empty($segnatura_list)){
// print_r($segnatura_list);
$segnature_list=array();
 foreach ($segnatura_list as $segnatura)
{
   
   $busta=array();
   
   $busta['fondo'] =  $segnatura["fondo"];
   $busta['serie'] =  $segnatura["#serie"];
   $busta['numero']=$segnatura["#busta"];
   $busta['titolo'] =  $segnatura["titolo"];

  array_push( $serie_sel["buste"],$busta);

 }
 }
 array_push( $serie_list,$serie_sel);
  }
}
  $fondo_sel['Serie']=$serie_list;
  array_push( $fondi_list,$fondo_sel);
}

echo indent(json_encode($fondi_list));

?>  

