<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
include '../parametri.php';
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=ute user=$user password=$pwd") or die ('no db');
$host=$server;
$catalogo="Imago";


if (!isset($_GET['r'])){$row="3356";}
	else {$row=$_GET['r'];}

if (!isset($_GET['ordine'])){$ordine="corda_unica";}
else {$ordine=$_GET['ordine'];}
//echo $ordine;
//echo $row;
function mostra($row,$dbserver,$serverIIP,$ordine,$dbconn,$root)
{
	if ( $ordine=="corda_unica" )
	{
	$query = "SELECT * from mappe_view where \"ID\"=".$row;
	}
	else
	{
	$query = "SELECT * from mappe_view where \"Nuova_corda\"='".$row."'";
	}
	//echo $query;
	$result=pg_query($dbconn,$query);

 while ($info=pg_fetch_array($result))
	{

	global $catalogo;	
	print'
	 <table width="100%" align="center">
	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="100%">
       
	
	<tr>
        <td width="18%" class="intestazione">Nuova segnatura </td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[2]; print'</td>
<td   rowspan="16" align="center" valign="middle" class="preview_grey" >'; 
	$query_scan="select \"PATH\", \"NOME\" FROM \"Mappe_scansioniView\" where \"COMUNE\" ='".pg_escape_string($info[10])."' AND \"nsezione\" = '".$info[12]."' AND \"già_nel_comune\" = '".$info[14]."' AND \"già_n\" = '".$info[15]."' AND \"REDAZIONE\" ='".$info[17]."' LIMIT 1";	
	$result_scan=pg_query($dbconn,$query_scan);
	
	$row_scan = pg_fetch_array($result_scan);
	
	$dir_grezza=$row_scan[0];
	
	$dir_grezza=str_replace("\\","/",$dir_grezza);
	$dir=$row_scan[0];
	$dir=strtolower(substr($dir,6,strlen($dir)));
	$dir="UTE/".$dir;
	$dir=str_replace("\\","/",$dir);
	//echo $dir;

	$file=$row_scan[1].".jp2";
	
	echo "<CENTER><A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?File=".$file."&Path=".$dir_grezza."\">";
	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."/".$file."&thumbspec=middlebig\" BORDER=\"0\">";
	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";

	print'
	</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "Ute.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

	</td>        </tr>
        <tr>
          <td width="18%" class="intestazione">Comune</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[10]; print'</td>
        </tr>
        <tr>
          <td width="18%" class="intestazione">Frazione/aggiunta</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[13]; print'</td>
        </tr>
        <tr>
          <td width="18%" class="intestazione">Sezione</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[11]; print'</td>
        </tr>
        <tr>
          <td width="18%" class="intestazione">Localit&agrave;</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[16]; print'</td>
        </tr>
        <tr>
          <td width="18%" class="intestazione">Gi&agrave; nel comune di</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[9]; print'</td>
        </tr>
        <tr>
          <td width="18%" class="intestazione">Rif. al Catasto Gregoriano</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[3]; echo  " ".$info[4]; print'</td>
        </tr>
        <tr>
          <td width="18%" class="intestazione">Redazione</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[17]; print'</td>
        </tr>


        <tr>
          <td width="18%" class="intestazione">Data</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[18]; print'</td>
        </tr>

        <tr>
          <td width="18%" class="intestazione">Aggiornamento</td>
          <td width="82%" class="dati" >&nbsp;'; echo  $info[19]; print'</td>
        </tr>

        <tr>
          <td width="18%" class="intestazione">Scala</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[20]; print'</td>
        </tr>

        <tr>
          <td width="18%" class="intestazione">  Quadro</td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[22]; print'</td>
        </tr>

        <tr>
          <td width="18%" class="intestazione" class="intestazione" >Consistenza  </td>
          <td width="82%" class="dati">&nbsp;'; echo  $info[21]; print'</td>
        </tr>

        <tr>
          <td width="18%" class="intestazione" >Note</td>
          <td width="82%" class="dati">  &nbsp;'; echo  $info[24]; print'</td>
        </tr>     

        <tr>
          <td width="18%" class="intestazione">';
echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?File=".$file."&Path=".$dir_grezza."\">";
print 'Consultazione
</a>
</td>
          <td width="82%" class="dati">&nbsp;'; 
	echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?File=".$file."&Path=".$dir_grezza."\">";
	echo "<IMG SRC=\"../images/book.png\" BORDER=\"0\"></A>";

		print'
</td>
        </tr>
        
	</table> 

	';

	
/*ALLEGATI*/

print'
<table width="90%" border=1> 

	';

	//$dbconnall = pg_connect ("host=$dbserver port=5432 dbname=ute user=$user password=$pwd") or die ('no db');

	$all ="SELECT * FROM \"allegati_view\"  where \"Comune\" ='".$info[10]."' AND \"nsezione\" = '".$info[12]."' AND \"già_nel_comune\" = '".$info[14]."' AND \"già_n\" = '".$info[15]."' AND \"redazione\" ='".$info[17]."'";
	//echo $all;
$x=0;
	$result=pg_query($dbconn,$all);
	while ($row_all = pg_fetch_array($result))
	   {
		$x++;
		print' <tr><td class="intestazione" valign="top">ALLEGATO ';
		echo "$x:<br>";			
		echo $row_all[6]."</td><td class=\"preview_grey\" >";
		//echo $row_all[5];


		//$dbconnimmall = pg_connect ("host=$dbserver port=5432 dbname=ute user=$user password=$pwd") or die ('no db');
		$imm_all ="SELECT \"PATH\",\"NOME\" FROM \"scansioni_allegato_view\"  where \"COMUNE\" ='".$info[10]."' AND \"nsezione\" = '".$info[12]."' AND \"già_nel_comune\" = '".$info[14]."' AND \"già_n\" = '".$info[15]."' AND \"REDAZIONE\" ='".$info[17]."' AND \"nALLEGATO\"='".$row_all[5]."'";
		//echo $imm_all;
		$result4=pg_query($dbconn,$imm_all);
		$row_scan= pg_fetch_array($result4);
		if ($row_scan[0]!=null)
		{
			$dir=$row_scan[0];
			$file=$row_scan[1].".jp2";
			$file = strtolower($file);
			$dir=strtolower(substr($dir,6,strlen($dir)));
			$dir="UTE/".$dir;
			$dir=str_replace("\\","/",$dir);
			echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
			echo $file."','".$dir."')\" BORDER=0>";
				echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";

		   	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."/".$file."&thumbspec=middlebig\">";
			print'
			</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "alessandrino.jp2','kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

			</td>';
			
		}
		echo "</tr>";
	 	}	



	}
print '</tr>';
}
mostra($row,$dbserver,$serverIIP,$ordine,$dbconn,$root);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir,$host)
{
	var path = dir + '/' + file ;
	//url_inizio="http://<?PHP echo $host ?>:9001/StyleServer/calcrgn?browser=win_ie&cat=Imago&style=default/view.xsl&wid=400&hei=300&browser=win_ie&plugin=false&item=";
	//url_fine="&wid=400&hei=300&style=default/view.xsl&plugin=false";
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}


</script>
</body>
</html>