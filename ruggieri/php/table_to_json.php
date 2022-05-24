<?PHP
require '../../parametri.php';
require 'functions.php'; // functions used in the script
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=ruggeri user=imago_web password=normal.2020") or die ('no db');
function get_immagini($categoria,$dbconn)
{
   //echo "QUI";
    $imm= array();
    $sql='SELECT *  FROM "Carte" ';
	 $sql='SELECT *  FROM "Carte" where "Ms" =\'493\' order by "# Atlante"';
	
    $result = pg_query($dbconn, $sql) or die ('no query: '.$php_errormsg);
    while($row=pg_fetch_array($result))
        {
           $numManoscritto=     $row['#ms'];
		   $numAtlante=     $row['# Atlante'];
           $titoloAtlante=     $row['titolo Atlante'];
           $dim=     $row['dimensioni'];
		   $trascrizione=     $row['# trascrizione'];
           $filename=     $row['filename'];
           $dettagli=array('numManoscritto' => $numManoscritto,
                           'titoloAtlante'=>$titoloAtlante,
                           'numAtlante'=>$numAtlante,
						   'trascrizione'=>$trascrizione,
						   'dim'=>$dim,
                           'Filename' => $filename
                           );
           array_push($imm,$dettagli);
            //array(id=>'1',titolo=>'mio',descrizione=>'tu'),
            //array(id=>'1',titolo=>'mio',descrizione=>'tu'),
    
        }
        
   return ($imm); 
}

header('Content-Type: application/json'); //for correct output in browsers
$json=array();
$categorie=array();
$categorie["Atlante della Cina"]=@get_immagini($categoria,$dbconn);
array_push($json,$categorie);
echo indent(json_encode($json));

//$sql= 'SELECT *  FROM "Carte" ';
//$result = pg_prepare($dbconn, $query, $insert);

//echo $sql."<br>";
/*
$result = pg_query($dbconn, $sql) or die ('no first query: '.$php_errormsg);
while($row=pg_fetch_array($result))
	{
        $categorie=array();
        $categoria=     $row['categoria'];
       // $categorie['Categoria']=     $categoria;
        $categorie[$categoria]=get_immagini($categoria,$dbconn);
	//print $row['categ$categoriaoria']."<br>";
        array_push($json,$categorie);
	}


//echo "pippo";
*/

?>  