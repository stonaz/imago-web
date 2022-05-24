<html >
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8">
<title>Archivio di Stato di Roma - Progetto Imago II</title>
<meta name="keywords" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<meta name="description" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<link href="../common/style_icrcpal2.css" rel="stylesheet" type="text/css" />
</head>


<div id="outer">
	
<div id="header"> 
  <h1>IMAGO</h1>
  <h2>Catasto Urbano</h2>
</div>
<div id="banner">
<p align='right'>	<a style="font-size: 10pt; color: yellow" href="http://www.archiviodistatoroma.beniculturali.it/">
	<img src="../images/header_ASRoma.jpg" width="638" height="59" border="0"><br>
	Torna al sito istituzionale</a>
</div>

	<div id="menu">
		<ul>
				<li ><a href="../index.html">Home Imago</a></li>
<li ><a href="../serie.html">Serie Imago</a></li>
<li class="first"><a href="urbano_intro.php">Catasto Urbano</a></li>

		
		</ul>
	</div>	<div id="content">
		
  <div id="tertiaryContent"> </div>
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
			<h2 class="title">Presentazione</h2>
			Sono accessibili tutti i 90 fogli di mappa del Catasto urbano (scala 1:1000), riprodotti con scanner a rullo Colortrac a 300 ppi, nonché le suddivisioni originarie per isolati e gli aggiornamenti successivi; è possibile confrontare le immagini della cartografia con le riproduzioni in toni di grigio (scanner SMA, 200 ppi) di tre serie di brogliardi: originali, riveduti e aggiornati.
			È possibile selezionare un rione ed esaminare mappe e brogliardi correlati. 
			</div>


		</div>
		
  <div id="secondaryContent"> 
    <ul>
      <li  ><A HREF="urbano_intro.php">Presentazione</A></li>
    </ul>
    <ul>
      <li  ><A HREF="urbano_docs.php">I documenti</A></li>
    </ul>
    <ul>
      <li class="first" ><A HREF="urbano_digit.php">La digitalizzazione</A></li>
    </ul>
    <ul>
      <li  ><A HREF="http://www.dipsuwebgis.uniroma3.it/" target="_blank" >WebGIS</A></li>
    </ul>
    <ul>
      <li> Rioni 
        <ul>
          <?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=urbano user=imago_web password=normal.2020") or die ('no db');
$query_localita="select \"Arabo\",\"Rione\" from rioni_vista order by \"Rione\" ";
$result=pg_query($dbconn,$query_localita);
$i=0;
while($row=pg_fetch_array($result))
{
   	$Rione[$i]=$row[1];
		print'<li><A HREF="s_piante.php?Rione=';echo $Rione[$i]; print'" >'; echo $row[1]."</A></li>";
   	$i++;
}

?>
        </ul>
      </li>
    </ul>
  </div>

</div>
</body>
</html>
