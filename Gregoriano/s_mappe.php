<html>
<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<BODY bgcolor="#EEEEEE">
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['Provincia'])){$Provincia="Ancona";}
	else {$Provincia=$_GET['Provincia'];}

if (!isset($_GET['Localita'])){$Localita="Agugliano";}
	else {$Localita=pg_escape_string($_GET['Localita']);}

if (!isset($_GET['Scansione'])){$Scansione="";}
	else {$Scansione=$_GET['Scansione'];}

function mostra($Pro,$Loc,$Sca,$dbserver,$serverIIP)
{
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=imago_web password=normal.2020") or die ('no db');
	$query = "SELECT * FROM mappe_view WHERE \"PROVINCIA\"='".$Pro."' AND trim(\"LOCALITA\")='".trim($Loc)."' AND trim(\"SCANSIONE\")='".$Sca."'";	
	$result=pg_query($dbconn,$query);
	

	$info=pg_fetch_array($result);
	//db_disconnect();

	
	global $catalogo;


	$dir=$info[16];
	$dir=substr($dir,6,strlen($dir));
	$dir="Gregoriano\\".$dir;
	$file=$info[17].".jp2";

	
	$file=str_replace("\\","/",$file);
	$dir=str_replace("\\","/",$dir);
	//echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	//echo $file."','".$dir."')\" BORDER=0>";
	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=big\">";
	//print'</A></CENTER>';

print'
	 <table width="100%" align="center">
  	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="90%">
        <tr> 
          <td class="intestazione" >Fondo</td>
          <td  class="dati" >&nbsp;';echo $info[0];print'</td>
            <td   rowspan="14" align="center" valign="middle" bgcolor="#EFEFDD">'; 
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
    	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	print'</A>
	</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "Alessandrino.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

	</td>
        </tr>
        <tr> 
          <td class="intestazione">Serie</td>
          <td  class="dati" >&nbsp;';echo $info[1];print'</td>
        </tr>		       	
        <tr> 
          <td class="intestazione" >  Provincia</td>
          <td  class="dati" >&nbsp;'; echo $info[2];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">mappa</td>
          <td  class="dati" >&nbsp;'; echo $info[3];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">aggiunti</td>
          <td  class="dati" >&nbsp; '; echo $info[4];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">territorio</td>
          <td  class="dati" >&nbsp;'; echo $info[6];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">redazione</td>
          <td  class="dati" >&nbsp;'; echo $info[5];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">porzione</td>
          <td  class="dati" >&nbsp;'; echo $info[7];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">denominazione</td>
          <td  class="dati" >&nbsp;  '; echo $info[10];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">sezione </td>
          <td  class="dati" >&nbsp;'; echo $info[8]."-".$info[9];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">altezza</td>
          <td  class="dati" >&nbsp; '; echo $info[11];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">larghezza</td>
          <td  class="dati" >&nbsp;'; echo $info[12];print'</td>
        </tr>
<tr>
<td class="intestazione" valign="top" colspan="2">
<table width="100%" align="center" >
  	<tr> 
<td valign="top" width="60%" rowspan="2" align="left"> 
Relativi:

    	  <table border="1" class="dati" width="100%">
        <tr> 

   	 <td>Brogliardi</td>
	 <td>Mappette</td>
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
$query_mappette_corr = "SELECT * FROM mappette_view WHERE  
		 \"PROVINCIA\" = '$info[2]'
		  and \"REDAZIONE\" = '$info[5]'
		  and \"NAGGIUNTI\" =  '$info[4]'
		  and \"NMAPPA\" = $info[3]
 ";

 //echo $query_mappette_corr ;
$result=pg_query($dbconn,$query_mappette_corr) or die('query did not execute');
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_mappette.php?Provincia=';	echo $row[2];
	print'&Territorio=';echo $row[6];
	print'&Denominazione=';echo $row[11];
	print'&Mappa=';echo $row[3];
	print'&Descrizione=';echo $row[10];
	print'&Sezione=';echo $row[8];
	print'&Soggetto=';echo $row[15];
	print'" target="s">';
 echo $row[6]."-";
echo $row[11];
if ($row[10] != '') {echo " ".$row[10];}
if ($row[8] != '') {echo " ".$row[8];}
if ($row[15] != '') {echo " ".$row[15];}
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


mostra($Provincia,$Localita,$Scansione,$dbserver,$serverIIP);

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