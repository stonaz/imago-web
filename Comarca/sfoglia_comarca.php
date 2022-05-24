<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato di Roma - Progetto Imago II</title>
<meta name="keywords" content="ICRCPAL: Istituto Centrale per il Restauro e la Conservazione del Patrimonio Archivistico e Librario, Restauro, Biblioteca, conservazione, Digital Library, CFLR, Imago, ICPL, ICPAL, ICRCPAL" />
<meta name="description" content="ICRCPAL: Istituto Centrale per il Restauro e la Conservazione del Patrimonio Archivistico e Librario, Restauro, Biblioteca, conservazione, Digital Library, CFLR, Imago, ICPL,ICPAL, ICRCPAL" />
<link href="../common/style_icrcpal2.css" rel="stylesheet" type="text/css" />
</head>
<BODY  bgcolor="#EEEEEE">
<div id="outer">
	
  <div id="header"> 
    <h1>IMAGO</h1>
    <h2>Catasto Gregoriano: Comarca</h2>
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
<li class="first"><a href="../gregoriano/gregoriano_intro.html">Catasto Gregoriano</a></li>

		
		</ul>
	</div>




	<div id="content">		
		<div id="menuContentContainer">
<?PHP
if((!($_GET['lar'])) && (!($_GET['alt'])))
{ 
$path="Comarca";
$r=$_GET['r1'];
echo "<script>location.href='sfoglia_comarca.php?Path=";echo $path."&r=";echo $r."&lar='+screen.width+'&alt='+screen.height;</script>"; 
}  
else 
{
$path="Comarca";
$r=$_GET['r'];
$lar=$_GET['lar'];
$alt=$_GET['alt'];
if ($alt<=768) {print'<IFRAME id="m" name="m" src="menu_sfoglia_comarca.php?Path=';echo $path; print'" width="100%"  height="526" overflow="auto" ></IFRAME>';}
if ($alt>768)  {print'<IFRAME id="m" name="m" src="menu_sfoglia_comarca.php?Path=';echo $path; print'" width="100%"  height="800" overflow="auto" ></IFRAME>';}
print'
</div>
<div id="largeContentContainer">
';
if ($alt<=768) {print'<IFRAME src="s_sfoglia_comarca.php?dir=';echo $path; print'&r1=';echo $r;print'" id="s" name="s" width="100%" height="526" overflow="auto" > </IFRAME>';}
if ($alt>768) {print'<IFRAME src="s_sfoglia_comarca.php?dir=';echo $path; print'&r1=';echo $r;print'" id="s" name="s" width="100%" height="800" overflow="auto" > </IFRAME>';}
}
?>
		</div>		
	</div>
</div>
</body>
</html>
