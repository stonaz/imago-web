<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<BODY bgcolor="#EEEEEE">
<?PHP
include '../parametri.php';

$catalogo="Imago";
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=$user password=$pwd") or die ('no db');

$host=$server;

if (!isset($_GET['Provincia'])){$Provincia="Ancona";}
	else {$Provincia=$_GET['Provincia'];}

if (!isset($_GET['Territorio'])){$Territorio="Agugliano";}
	else {$Territorio=pg_escape_string($_GET['Territorio']);}

if (!isset($_GET['Mappa'])){$Mappa="89";}
	else {$Mappa=$_GET['Mappa'];}

if (!isset($_GET['Denominazione'])){$Denominazione="Agugliano";}
	else {$Denominazione=pg_escape_string($_GET['Denominazione']);}

if (!isset($_GET['Descrizione'])){$Descrizione="";}
	else {$Descrizione=$_GET['Descrizione'];}

if (!isset($_GET['Soggetto'])){$Soggetto="";}
	else {$Soggetto=$_GET['Soggetto'];}
if (!isset($_GET['Sezione'])){$Sezione="";}
	else {$Sezione=$_GET['Sezione'];}
//echo $Descrizione;
//echo $Territorio;
function mostra($Pro,$Ter,$Map,$Den,$Descr,$Soggetto,$Sezione,$dbserver,$serverIIP,$root,$dbconn)
{
	$query =
	 "SELECT * FROM mappette_view
	 WHERE
	 \"PROVINCIA\"='".$Pro."'
	 AND \"TERRITORIO\"='".$Ter."'
	 AND \"NMAPPA\"= ".$Map." 
	 AND \"DENOMINAZIONE_MAPPETTA\"='".$Den."'
	" ;
	if ($Descr != '')
	{

	$query=$query." AND \"DESCRIZIONE\"='".$Descr."'";
	}
		if ($Soggetto != '')
	{

	$query=$query." AND \"SOGGETTO\"='".$Soggetto."'";
	}
		if ($Sezione!= '')
	{

	$query=$query." AND \"SEZIONE_MAPPA\"='".$Sezione."'";
	}

	//echo $query;
	$result=pg_query($dbconn,$query);
	

	$info=pg_fetch_array($result);
	//db_disconnect();

	
	global $catalogo;


	$dir=$info[17];
	$dir=substr($dir,6,strlen($dir));
	$dir="Gregoriano\\".$dir;
	$file=$info[18].".jp2";

	
	$file=str_replace("\\","/",$file);
	$dir=str_replace("\\","/",$dir);

print'
	 <table width="100%" align="center">
  	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 
    	  <table border="1" class="dati" cellspacing="0" width="90%">
        <tr> 
          <td class="intestazione" >Fondo</b></td>
          <td class="dati" >';echo $info[0];print'</b></td>
	<td   rowspan="14" align="center" valign="middle" bgcolor="#EFEFDD">';
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
    	echo "<IMG SRC=\"http://".$serverIIP."/iiifserver?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	print'
	</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "Alessandrino.jp2','Kodak')\" BORDER=0>";
	print'Visualizza bandino colore</a></CENTER>

</td>
        </tr>
        <tr> 
          <td class="intestazione">Serie</b></td>
          <td  class="dati" >';echo $info[1];print'</b></td>
        </tr>		       	
        <tr> 
          <td class="intestazione">Provincia</td>
          <td  class="dati">&nbsp;';echo $info[2];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">  mappa</td>
          <td  class="dati">&nbsp;';echo $info[3];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">aggiunti</td>
          <td  class="dati">&nbsp;';echo $info[4];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">territorio</td>
          <td  class="dati">&nbsp;' ;echo $info[6];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">redazione</td>
          <td  class="dati">&nbsp;';echo $info[5];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">porzione</td>
          <td class="dati">&nbsp;';echo $info[7];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">denominazione</td>
          <td  class="dati">&nbsp;';echo $info[11];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">sezione</td>
          <td  class="dati">&nbsp;';echo $info[8];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">altezza</td>
          <td class="dati">&nbsp;';echo $info[12];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">larghezza</td>
          <td class="dati" >&nbsp;';echo $info[13];print'</td>
        </tr>

<tr>
<td class="intestazione" valign="top" colspan="2">
<table width="100%" align="center" >
  	<tr> 
<td valign="top" width="60%" rowspan="2" align="left"> 
Relativi:

    	  <table border="1"  class="dati" width="100%">
        <tr> 

   	 <td>Brogliardi</td>
	 <td>Mappe</td>
</tr>
<tr>
	<td valign="top" >';
$query_br_corr = "SELECT * FROM brogliardi_view WHERE  
		 \"PROVINCIA\" = '$info[2]'
		  and \"REDAZIONE\" = '$info[5]'
		  and \"NAGGIUNTI\" =  '$info[4]'
		  and \"NMAPPA\" = $info[3]
 ";
 //echo $query_br_corr ;
$result=pg_query($dbconn,$query_br_corr) or die('query did not execute');
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_brogliardi.php?Provincia=';echo $row[3];print'&Denominazione=';echo $row[11];print'" target="s">'; echo $row[11]."</A></li>";
	$k++;
	}
	echo "</li></td>";

print	'<td valign="top" >';
$query_mappe_corr = "SELECT * FROM mappe_view WHERE  
		 \"PROVINCIA\" = '$info[2]'
		  and \"REDAZIONE\" = '$info[5]'
		  and \"NAGGIUNTI\" =  '$info[4]'
		  and \"NMAPPA\" = $info[3]
 ";
$query_mappe_corr=$query_mappe_corr." ORDER BY \"SOGGETTO\"";
 //echo $query_mappe_corr ;
$result=pg_query($dbconn,$query_mappe_corr) or die('query did not execute');
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_mappe.php?Provincia=';	echo $row[2];
	print'&Localita=';echo $row[18];
	print'&Scansione=';echo $row[13];
	print'" target="s">';
 echo $row[2]."-";
echo $row[18]." ";
echo $row[13];
echo "</A></li>";
	$k++;
	}
	echo "</li></td>";
print '

</tr>
	</table>

</td></tr>


		</table> 
	';
	
}


mostra($Provincia,$Territorio,$Mappa,$Denominazione,$Descrizione,$Soggetto,$Sezione,$dbserver,$serverIIP,$root,$dbconn);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
}


</script>
</body>
</html>