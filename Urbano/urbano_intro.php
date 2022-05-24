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
			<div id="primaryContent">	<h2 class="title">Catasto Urbano</h2>
<table class="presentazione" border=0 cellspacing="4"><tr><td valign="top">
		
<p align="justify"> Il Catasto urbano di Roma nasce in parte in funzione della 
              manutenzione delle strade cittadine, e in parte nell'ambito dell'opera 
              di catastazione dell'intero Stato, funzionale alla imposizione della 
              "dativa reale".<br>
              Gli architetti a cui fu appaltata la rilevazione, nel 1818, utilizzarono 
              la pianta del Nolli (1748), suddividendola in isolati e componendola 
              in fogli di mappa per rione. La redazione delle mappe in scala 1:1000 
              fu la base della compilazione dei registri descrittivi delle proprietà 
              (brogliardi); espletati i ricorsi dei proprietari, il catasto fu 
              attivato nel 1824.<br>
              Le piante dei rioni sono da confrontare con le altre due serie cartografiche 
              delle suddivisioni originarie e degli aggiornamenti successivi; 
              allo stesso modo i brogliardi originali sono confrontabili con una 
              seconda serie di brogliardi corretti e con una terza di aggiornamenti 
              al 1871.<br>
              L'insieme della documentazione fornisce - come per altre città dello 
              Stato pontificio - una immagine fedele ed estremamente approfondita 
              dell'assetto urbano, degli aspetti funzionali e della vita economica 
              della Roma preunitaria. Monumenti, orti, giardini e il fiume Tevere 
              sono spesso rappresentati con grande efficacia pittorica.<br>
            <p align="justify">Consulenza sul fondo: Luisa Falchi <br>
              Progetto della base di dati: Paolo Buonora<br>
              Immissione ed elaborazione dati: Vincenzo De Meo e Fabio Simonelli<br>
              Acquisizione immagini: Enrica Serinaldi, Nicoletta Valente, Alessio 
              Rinaldini, Luciana Devoti<br>
              Coordinamento: Vincenzo De Meo<br>
              Sviluppo software: Stefano Tonazzi<br>
              Progettazione e assistenza sistemistica: Leonardo Valcamonici (CASPUR) 
          </td>
<td width="20">&nbsp;</td>
<td  valign="top" >

						<img src="urbano.jpg"  border="0">
			<br>
			<font size="1">Rione Trevi, pianta 4: particolare di Fontana di Trevi</font>

</td></tr></table>
			</div>


		</div>
		
  <div id="secondaryContent"> 
    <ul>
      <li class="first"><A HREF="urbano_intro.php">Presentazione</A></li>
    </ul>
    <ul>
      <li  ><A HREF="urbano_docs.php">I documenti</A></li>
    </ul>
    <ul>
      <li  ><A HREF="urbano_digit.php">La digitalizzazione</A></li>
    </ul>
    <ul>
      <li  ><A HREF="http://www.dipsuwebgis.uniroma3.it/" target="_blank" >WebGIS</A></li>
    </ul>
    <ul>
      <li> Rioni 
        <ul>
          <?PHP
include '../parametri.php';
include 'conn.php';
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
