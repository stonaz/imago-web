<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
include '../parametri.php';
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=notai user=$user password=$pwd") or die ('no db');

$host=$server;
$catalogo="Imago";


if (!isset($_GET['r'])){$row="748.01";}
	else {$row=$_GET['r'];}


function mostra($row,$dbserver,$serverIIP,$dbconn,$root)
{
print '	 <table width="100%" border="1" align="left">
	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="left">
';
	$query = "SELECT * from rubriche_view where link=".$row;
	$result=pg_query($dbconn,$query);

 while ($info=pg_fetch_array($result))
	{
	
	global $catalogo;	
	print'
 
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="100%">

	<tr>
        <td width="23%" class="intestazione" >Volume</td>
          <td width="77%" class="dati">&nbsp;'; echo  $info[4]; print'</td>
<td   rowspan="14" align="center" valign="middle" bgcolor="#EFEFDD">'; 
	//$dbconn2 = pg_connect ("host=$dbserver port=5432 dbname=notai user=$user password=$pwd") or die ('no db');
	$query_scan="select \"PATH\", \"NOME\" FROM scansioni_view where link =".$row." AND \"Volume\" = ".$info[4]." AND \"sub\" = '".$info[5]."'";
	
	$result_scan=pg_query($dbconn,$query_scan);
	$row_scan = pg_fetch_array($result_scan);

	$dir=$row_scan[0];
	$dir=strtoupper(substr($dir,6,strlen($dir)));
	$dir="Notai/".$dir;
	$dir=str_replace("\\","/",$dir);

	$file=$row_scan[1].".jp2";

	echo "<CENTER><A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?r1=".$file."&Path=".$dir."\">";
	    	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";

	print'
	</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "SMA200.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

</td>
        </tr>
        
          <td width="23" width="23%" class="intestazione" > Bis</td>
          <td width="77%" class="dati">&nbsp;'; echo  $info[5]; print'</td>
        </tr>
        
          <td width="23%" class="intestazione">Intestazione</td>
          <td width="77%" class="dati">&nbsp;'; echo  $info[6]; print'</td>
        </tr>
        
          <td width="23%" class="intestazione">Estremi cronologici</td>
          <td width="77%" class="dati">&nbsp;'; echo  $info[7]; print'</td>
        </tr>
        
          <td width="23%" class="intestazione">Autore</td>
          <td width="77%" class="dati">&nbsp;'; echo  $info[8]; print'</td>
        </tr>
        
          <td width="23%" class="intestazione"> Committente</td>
          <td width="77%" width="77%" class="dati" >  &nbsp;'; echo  $info[9]; print'</td>
        </tr>
        
          <td width="23%" class="intestazione">Datazione</td>
          <td width="77%" class="dati">&nbsp;'; echo  $info[10]; print'</td>
        </tr>
        
          <td width="23%" class="intestazione">Note</td>
          <td width="77%" class="dati" >&nbsp;'; echo  $info[11]; print'</td>
        </tr>
        <tr> 
        </tr>
        <tr  > 
          <td width="23%" class="intestazione">';
echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?r1=".$file."&Path=".$dir."\">";
print 'Consultazione</a></td>
          <td width="77%" class="dati">';
	echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?r1=".$file."&Path=".$dir."\">";
	echo "<IMG SRC=\"../images/book.png\" BORDER=\"0\">";
	print'</A></CENTER>';
	print'</td>
        </tr>
	</table> 
	
	';
	}
print'</td>
        </tr>
	</table> 
	
	';
	
	
}
mostra($row,$dbserver,$serverIIP,$dbconn,$root);

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