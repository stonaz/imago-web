<html>
<head>
<link href="../common/style_urbano.css" rel="stylesheet" type="text/css" />
</head>
<BODY  >
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


if (!isset($_GET['Rione'])){$Rione="Borgo";}
	else {$Rione=$_GET['Rione'];}

if (!isset($_GET['Porzione'])){$porzione="I";}
	else {$porzione=$_GET['Porzione'];}

if (!isset($_GET['Allegato'])){$allegato=" ";}
	else {$allegato=$_GET['Allegato'];}

function mostra($Rione,$porzione,$allegato,$dbserver,$serverIIP,$dbconn,$root)
{

	$query = "SELECT * from aggiornamenti_vista where \"Rione\"='".$Rione."' AND \"Porzioni\"='".$porzione."' AND \"Allegato\"='".$allegato."' ";
	//echo $query;
	$result=pg_query($dbconn,$query);
	$info=pg_fetch_array($result);
	//db_disconnect();
	//var_dump($info[18]);

	global $catalogo;

	$dir=$info[17];	

	//Trasformazione della stringa presente nel DB, in modo da farla corrispondere al filesystem linux per maiuscole/minuscole
	$dir=ucfirst(strtolower(substr($dir,6,strlen($dir))));
	$dir="Urbano/".$dir;
	//echo $dir."<br>";
	$file=$info[18].".jp2";

	$file=strtolower(str_replace("\\","/",$file));
	$dir=str_replace("\\\\","\\",$dir);
	$dir=str_replace("\\","/",$dir);
	

print' <table width="100%" align="center" >
  	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 

	 <table  width="100%"  border="1" cellspacing="0" >
  	<tr> 
<tr> 
          <td class="intestazione" >Fondo</td>
          <td class="dati">';echo $info[0];print'</td>
        
          
<td rowspan="14" class="preview_grey" align="center" valign="middle" >';
echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	print'
</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "alessandrino.jp2','kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

</td>


        </tr>
<tr> 
          <td class="intestazione">Serie</td>
          <td class="dati">';echo $info[1];print'</td>
        </tr>	
<tr>
<td class="intestazione" >Rione</td>
          <td class="dati" >'; echo $info[2]."-".$info[5]; print'<br>
            </td>
         <tr> 
          <td class="intestazione" >Sottoserie</td>
          <td class="dati">'; echo $info[5]; print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Porzioni</td>
          <td class="dati" >'; echo $info[6]."-".$info[7];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Foglio</td>
          <td class="dati">'; echo $info[8]; print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Allegato</td>
          <td class="dati">';  echo $info[9];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Data</td>
          <td class="dati">';  echo $info[13];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Note</td>
          <td class="dati" >

';  echo $info[15];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Scala</td>
          <td class="dati">';  echo $info[12];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Larghezza</td>
          <td class="dati">';  echo $info[10];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Altezza</td>
          <td class="dati">';  echo $info[11];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >Autore</td>
          <td class="dati">';  echo $info[14];print'<br>
            </td>
        </tr>
<tr ><td colspan=2 class="intestazione" valign="top" >
<table width="100%" align="center">
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

if ($allegato=="") {$allegato=" ";}

//INTESTAZIONE PAGINA E SELECT
print '<table width="100%" align="center"><tr><td>';
print '<table><tr><td class="intestazione">';
echo "<b>Rione: $Rione</b>";
print '</td><td class="dati">';
$myfile="s_piante.php" ;
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

mostra($Rione,$porzione,$allegato,$dbserver,$serverIIP,$dbconn,$root);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}


</script>
</body>
</html>