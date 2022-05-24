<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato di Roma - Progetto Imago II</title>
<meta name="keywords" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<meta name="description" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<link href="../common/style_icrcpal2.css" rel="stylesheet" type="text/css" />
</head>

<div id="outer">
	<div id="header">
		<h1>IMAGO</h1>
		<h2>ARCHIVIO di STATO di Roma: Catasto Urbano</h2>
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
		<li ><a href="urbano_intro.html">Catasto Urbano</a></li>
		<li  ><a href="piante.php">Piante</a></li>
		<li ><a href="aggiornamenti.php">Aggiornamenti</a></li>
		<li class="first"><a href="brogliardi.php">Brogliardi</a></li>
		
		<li><a href="suddivisioni.php">Suddivisioni</a></li>
		</ul>
	</div>


	<div id="content">		
		<div id="menuContentContainer">
<?PHP
if((!($_GET['lar'])) && (!($_GET['alt'])))
{ 
echo "<script>location.href='brogliardi.php?lar='+screen.width+'&alt='+screen.height;</script>"; 
}  
else 
{
$lar=$_GET['lar'];
$alt=$_GET['alt'];
if ($alt<=768) {print'<IFRAME id="m" name="m" src="menu_brogliardi.php" width="100%"  height="526" overflow="auto" ></IFRAME>';}
if ($alt>768)  {print'<IFRAME id="m" name="m" src="menu_brogliardi.php" width="100%"  height="800" overflow="auto" ></IFRAME>';}
print'
		</div>

		<div id="largeContentContainer">
';
if ($alt<=768) print'<IFRAME src="s_brogliardi.php" id="s" name="s" width="100%" height="526" overflow="auto" > </IFRAME>';
if ($alt>768) print'<IFRAME src="s_brogliardi.php" id="s" name="s" width="100%" height="800" overflow="auto" > </IFRAME>';
}
?>
		</div>		
	</div>
</div>
</body>
</html>
