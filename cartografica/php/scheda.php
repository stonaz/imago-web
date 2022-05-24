<?PHP
require 'functions.php'; // functions used in the script
header('Content-Type: application/json'); //for correct output in browsers
if ($_GET['cartella'])
{
  // echo "GET ARRIVATA";
    $classe= ($_GET['classe']);
    $fondo= ($_GET['fondo']);
    $cartella= ($_GET['cartella']);
    $bis= ($_GET['bis']);
    $UA= ($_GET['UA']);
    $sub= ($_GET['sub']);
    
    
    
}
else{
   $cartella=80;
   $foglio=230;
   $sub=1;
}

$sql="SELECT C.\"classe\" , C.\"fondo\",P.*   FROM   \"Classe\" C, \"Principale_CD\" P
        where P.\"#classe\" = C.\"#classe\"
      AND P.\"#fondo\" = C.\"#fondo\"
      AND        P.\"#classe\"='$classe' and P.\"#fondo\"='$fondo' and P.\"#cartella\"='$cartella'
      and P.\"#bis\"='$bis' and P.\"#UA\"='$UA' and P.\"#sub\"='$sub'
      ";
//echo $sql;
$items_list=get_items_list($dbconn,$sql);
$scheda=array();
$scheda['data']=$items_list;
$scheda['data'][0]['cartella']=$scheda['data'][0]['#cartella'];
$scheda['data'][0]['bis']=$scheda['data'][0]['#bis'];
$scheda['data'][0]['UA']=$scheda['data'][0]['#UA'];
$scheda['data'][0]['sub']=$scheda['data'][0]['#sub'];

//echo indent(json_encode($scheda['data'][0]['#cartella']));
$sql="SELECT *  FROM \"Fogli_CD\"
        where \"#classe\"='$classe' and \"#fondo\"='$fondo' and\"#cartella\"='$cartella' and \"#bis\"='$bis' and \"#UA\"='$UA' and \"#sub\"='$sub'
              order by \"#classe\",\"#fondo\",\"#cartella\",\"#bis\",\"#UA\",\"#sub\",\"numero\"";

$items_list=get_items_list($dbconn,$sql);
if ($items_list){
 //  echo indent(json_encode($items_list));
   $scheda['fogli']=$items_list;
   //, numero($scheda['fogli']);
  $index=0;
   foreach  ($scheda['fogli'] as $foglioscheda)
   {
      $scheda['fogli'][$index]['cartella']=$foglioscheda['#cartella'];
      $scheda['fogli'][$index]['foglio']=$foglioscheda['#UA'];
      $scheda['fogli'][$index]['sub']=$foglioscheda['#sub'];      
      
      $numero = $foglioscheda['numero'];
      $sql="SELECT \"image\"  FROM \"images\"
      where \"#classe\"='$classe' and \"#fondo\"='$fondo' and  \"#cartella\"='$cartella'  and \"#bis\"='$bis'
      and \"#sub\"='$sub' and \"#UA\"='$UA' and \"numero\"='$numero'
      order by \"#classe\",\"#fondo\",\"#cartella\",\"#bis\",\"#UA\",\"#sub\",\"numero\",\"image\"";
      $items_list=get_items_list($dbconn,$sql);
      $scheda['fogli'][$index]['images']=array();
      if ($items_list){
         
         
         foreach($items_list as $images)
         {
            $image= $images['image'];
            if ( strlen($image) > 1){
               array_push($scheda['fogli'][$index]['images'],$image);

            }
            
         }
         
         
      }
      
   $index++;
    }
   
}
else{
   $test=0;
   $scheda['fogli'] = array();
}

//echo json_encode($scheda);
echo indent(json_encode($scheda))

?>


