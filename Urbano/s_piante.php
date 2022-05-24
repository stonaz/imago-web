<html>
<head>
<link href="../common/style_urbano.css" rel="stylesheet" type="text/css" />
</head>
<body>
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

<?PHP
include '../parametri.php';
include 'conn.php';

$host=$server;
$catalogo="Imago";


if (!isset($_GET['Rione'])){$Rione="borgo";}
	else {$Rione=$_GET['Rione'];}

if (!isset($_GET['Foglio'])){$Foglio="I";}
	else {$Foglio=$_GET['Foglio'];}

function mostra($Rione,$Foglio,$dbserver,$serverIIP,$dbconn)
{
	$query = "SELECT * from piante_vista where \"Rione\"='".$Rione."' AND \"Foglio\"='".$Foglio."'";
	$result=pg_query($dbconn,$query);
	$info=pg_fetch_array($result);
	//db_disconnect();

	
	global $catalogo;


	$dir=$info[10];
	//Trasformazione della stringa presente nel DB, in modo da farla corrispondere al filesystem linux per maiuscole/minuscole
	$dir=ucfirst(strtolower(substr($dir,6,strlen($dir))));
	$dir="Urbano\\".$dir;
	$file=$info[11].".jp2";

	
	$file=str_replace("\\","/",$file);
	$dir=str_replace("\\","/",$dir);
	

print'
 
	 <table width="100%" align="center">
  	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="100%">
        <tr> 
          <td class="intestazione" bordercolor="#000000">Fondo</td>
          <td  class="dati" >';echo $info[0];
print'</td>
<td class="preview_grey" rowspan="17" bgcolor="#565051"  align="center" valign="middle" >';
echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
	    	echo "<IMG SRC=\"http://".$serverIIP."/iiifserver?FIF=/images/Patrimonio/Archivi/AS_Roma/Imago/".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	print'
</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "Alessandrino.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>


</td>

        </tr>
        <tr> 
          <td class="intestazione" bordercolor="#000000">Serie</td>
          <td class="dati"  >';echo $info[1];print'</td>
        </tr>		       
	<tr> 
          <td class="intestazione" bordercolor="#000000">Sottoserie</td>
          <td class="dati" >  Piante</td>
        </tr>
        <tr> 
          <td class="intestazione" bordercolor="#000000">Rione </td>
          <td class="dati" >';echo $info[5];print'</td>
        </tr>
        <tr> 
          <td class="intestazione" bordercolor="#000000">Foglio</td>
          <td class="dati" >';echo $info[6];print'</td>
        </tr>
        <tr> 
          <td class="intestazione" bordercolor="#000000">Altezza</td>
          <td class="dati" >';echo $info[7];print'</td>
        </tr>
        <tr> 
          <td class="intestazione" bordercolor="#000000">larghezza</td>
          <td class="dati" >';echo $info[8];print'</td>
        </tr>
<tr>


<td class="intestazione" valign="top" colspan="2">
<table width="100%" align="center" >
  	<tr> 
<td valign="top" width="60%" rowspan="2" align="left"> 


    	  <table border="1" class="dati" width="100%">
        <tr> 
	<td>Piante</td>
   	 <td>Brogliardi</td>
	 <td>Suddivisioni</td>
	 <td>Aggiornamenti</td>
	 <td>VCEU</td>
	</tr>
	<tr>';
	print '<td valign="top" >';
	
	//PIANTE
	
	$query_relativi="select * from piante_vista WHERE \"Rione\"='".$Rione ."' ORDER BY \"Arabo_foglio\" ASC";
	$result=pg_query($dbconn,$query_relativi);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_piante.php?Rione=';echo $Rione; print'&Foglio=';echo $row[6];print'" >'; echo $row[6]."</A></li>";
	echo "\n";
	$k++;
	}
	
	
	print '</td><td valign="top" >';
	
	//BROGLIARDI

		$query_relativi="select * from brogliardi_vista WHERE \"Rione\"='".$Rione."' order by \"#serie\"";
$result=pg_query($dbconn,$query_relativi);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_brogliardi.php?Rione=';echo $Rione; print'&Path=';echo $row[6];print'" >'; echo utf8_decode($row[8])."</A></li>";
	echo "\n";
	$k++;
	}
	

		print '</td><td valign="top" >';
		
		//SUDDIVISIONI
	 	
		$query_relativi="select * from suddivisioni_vista WHERE \"Rione\"='".$Rione ."' ORDER BY \"Arabo_porzione\" ASC";
	$result=pg_query($dbconn,$query_relativi);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_suddivisioni.php?Rione=';echo $Rione;print'&Porzione=';echo $row[7]; print'&Allegato=';echo $row[9];print'" >'; echo $row[7]; if ($row[9]!=" ") echo " allegato ".$row[9]."</A></li>";else echo "</A></li>";
	echo "\n";
	$k++;
	}

	      print '</td><td valign="top" >';
	
	//AGGIORNAMENTI 	
		$query_relativi="select * from aggiornamenti_vista WHERE \"Rione\"='".$Rione ."' ORDER BY \"Arabo_porzione\" , \"Allegato\"";
	$result=pg_query($dbconn,$query_relativi);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_aggiornamenti.php?Rione=';echo $Rione;print'&Porzione=';echo $row[7]; print'&Allegato=';echo $row[9];print'" >'; echo $row[7]; if ($row[9]!=" ") echo " allegato ".$row[9]."</A></li>";else echo "</A></li>";
	echo "\n";
	$k++;
	}
		print '</td><td valign="top" >';
		//VCEU 	
		$query_relativi="select * from vceu_vista WHERE \"Rione\"='".$Rione ."' ORDER BY \"Arabo\",\"Tipologia\",\"Scansione\" ";
	$result=pg_query($dbconn,$query_relativi);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_VCEU.php?Rione=';echo $Rione;print'&Arabo=';echo $row['Arabo'];print'&Scansione=';echo $row['Scansione'];print'&Tipologia=';echo $row['Tipologia']; ;print'" >'; echo $row['Descrizione']; echo "</A></li>";
	echo "\n";
	$k++;
	}	
		

	 	print ' </td>

</tr>
	</table>

</td></tr>


		</table> 
	';


}

//INTESTAZIONE PAGINA E SELECT
print '<table width="100%" align="center"><tr><td>';
print '<table><tr><td class="intestazione">';
echo "<b>Rione: $Rione</b>";
print '</td><td class="dati">';
$myfile=$_SERVER['PHP_SELF'] ;
?>
 <form method="get"  action="<?PHP echo $myfile ?>">
        Selezione rione :
        <select size="1" name="Rione" onchange="this.form.submit();"  >
<?PHP

$query_localita="select \"Rione\" from rioni_vista order by \"Rione\" ";
$result=pg_query($dbconn,$query_localita);
while($row=pg_fetch_array($result))
{
   	$Rione==$row[0]?$selected="SELECTED":$selected="";
	echo "<option $selected value=\"$row[0]\" >$row[0]\n";
			
}

print '</select></td></tr></table>';
print '</td></tr></table>'; 
mostra($Rione,$Foglio,$dbserver,$serverIIP,$dbconn);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=/AS_Roma/Imago/&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}


</script>
  </div>
</div>
</body>
</html>