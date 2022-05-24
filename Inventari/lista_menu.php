<?PHP
require 'functions.php'; // functions used in the script

header('Content-Type: application/json'); //for correct output in browsers


   

$segnature_list=array();
$sql="SELECT distinct  numero,denominazione  FROM etichette  order by 1" ;
 //echo $sql;
 $segnatura_list=get_items_list($dbconn,$sql);
 //echo $segnatura;
 
 foreach ($segnatura_list as $segnatura)
{
   $segnature=array();
   
   $numero=$segnatura["numero"];
   $segnature["numero"]=$segnatura["numero"];
   $segnature["denominazione"]=$segnatura["denominazione"];
   $segnature["bis"]=array();

   $sql="SELECT bis, \"DENOMINAZIONE\",\"OK\" FROM inventari  where numero = '$numero' order by 1" ;
   $segnatura_items=get_items_list($dbconn,$sql);
   foreach ($segnatura_items as $scheda_item)
   {
     
      $scheda=array();
      $scheda['bis']=$scheda_item['bis'];
      $scheda['denominazione']=$scheda_item['DENOMINAZIONE'];
      $scheda['OK']=$scheda_item['OK'];

   //   $scheda['sub']=$scheda_item['#sub'];;
      array_push( $segnature["bis"],$scheda);
     // echo $scheda['#sub'];
   }
   
  // $segnature["foglio"]=$segnatura["#foglio"];
  // $segnature["sub"]=$segnatura["#sub"];
  //
  array_push( $segnature_list,$segnature);

 }
   

echo indent(json_encode($segnature_list));

?>  