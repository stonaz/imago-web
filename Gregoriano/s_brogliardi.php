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

if (!isset($_GET['Denominazione'])){$Denominazione="Agugliano";}
	else {$Denominazione=pg_escape_string($_GET['Denominazione']);}

function mostra($Provincia,$Denominazione,$dbserver,$serverIIP)
{

	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=imago_web password=normal.2020") or die ('no db');
	$query = "SELECT * from brogliardi_view where \"PROVINCIA\"='".$Provincia."' AND \"DENOMINAZIONE_BROGLIARDO\"='".$Denominazione."'";
	$result=pg_query($dbconn,$query);
	$info=pg_fetch_array($result);
	//db_disconnect();

	
	global $catalogo;


	$dir=$info[13];

	$dir=substr($dir,6,strlen($dir));
	$dir="Gregoriano/".$dir."/".$info[14];
	$file="001.jp2";

	$file=str_replace("\\","/",$file);
	$dir=str_replace("\\\\","\\",$dir);
	$dir=str_replace("\\","/",$dir);
	//echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	//echo $file."','".$dir."')\" BORDER=0>";
	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."/".$file."&thumbspec=big\">";
	//print'</A></CENTER>';

print'
	 <table width="100%" align="center">
  	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="90%">
         <tr valign="top"> 
          <td class="intestazione">  Provincia</td>
          <td class="dati"  colspan="3">'; echo $info[3];print'<br>
            </td>
           <td rowspan="17" align="center" valign="middle" class="preview_grey" >
<A target="_top" HREF="sfoglia_brogliardi.php?Path=';
 echo $dir;print'&r='; echo $file;
print'">';
    	echo "<IMG SRC=\"http://".$serverIIP."/iiifserver?FIF=/images/Patrimonio/Archivi/AS_Roma/Imago/".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
print '
</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "SMA200.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

</td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione" >mappa</td>
          <td class="dati"  colspan="3">'; echo $info[4];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione">aggiunti</td>
          <td class="dati"  colspan="3">'; echo $info[5];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione">territorio</td>
          <td class="dati"  colspan="3">'; echo $info[6];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione">redazione</td>
          <td class="dati"  colspan="3">'; echo $info[7];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione">porzione</td>
          <td class="dati"  colspan="3">'; echo $info[8];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione">denominazione</td>
          <td class="dati"  colspan="3">'; echo $info[9];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione">tomo</td>
          <td class="dati"  colspan="3">'; echo $info[10];print'<br>
            </td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione"height="2">sezione</td>
          <td class="dati">'; echo $info[11];print'<br>
            </td>
        </tr>
        <tr> 
          <td class="intestazione" >
<A target="_top" HREF="sfoglia_brogliardi.php?Path='; echo $dir;print'&r='; echo $file;print'">Sfoglia brogliardo</td>
          <td  class="dati" ><A target="_top" HREF="sfoglia_brogliardi.php?Path='; echo $dir;print'&r='; echo $file;print'"><IMG SRC="../images/book.png" BORDER="0" ALT="Sfoglia/See"></td>
        </tr>
<tr>
<td class="intestazione" valign="top" colspan="2">
<table width="100%" align="center" >
  	<tr> 
<td valign="top" width="60%" rowspan="2" align="left"> 
Relativi:

    	  <table class="dati" border="1" width="100%">
        <tr> 

   	 <td>Mappe</td>
	 <td>Mappette</td>
</tr>
<tr>


<td valign="top" >';
$query_mappe_corr = "SELECT * FROM mappe_view WHERE  
		 \"PROVINCIA\" = '$info[3]'
		  and \"REDAZIONE\" = '$info[7]'
		  and \"NAGGIUNTI\" =  '$info[5]'
		  and \"NMAPPA\" = $info[4]
			

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

print	'<td valign="top" >';
$query_mappette_corr = "SELECT * FROM mappette_view WHERE  
		 \"PROVINCIA\" = '$info[3]'
		  and \"REDAZIONE\" = '$info[7]'
		  and \"NAGGIUNTI\" =  '$info[5]'
		  and \"NMAPPA\" = $info[4]
 ";

// echo $query_mappette_corr ;
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


mostra($Provincia,$Denominazione,$dbserver,$serverIIP);

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
</body>
</html>