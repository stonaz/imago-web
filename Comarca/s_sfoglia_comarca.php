<html>
<BODY  bgcolor="#EEEEEE">
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['dir'])){$dir="Comarca";}
	else {$dir=$_GET['dir'];}

if (!isset($_GET['r'])){$row="COMARCA-0";}
	else {$row=$_GET['r'];}
	
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=comarca user=imago_web password=normal.2020") or die ('no db');
$query="select * from mappe where file = '$row' ;";


//echo $query;
			
$result=pg_query($dbconn,$query);
while($record=pg_fetch_array($result))
{
//	echo $record;
	$descr = $record[2];
}
//echo $descr;

function mostra($descr,$row,$dir,$dbserver,$serverIIP)
{
	$file=$row;
	global $catalogo;
	echo "<CENTER><strong>$file</strong><br>$descr<br><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file.".jp2','".$dir."')\" BORDER=0>";
    	echo "<IMG SRC=\"http://".$serverIIP."/iiifserver?FIF=/images/Patrimonio/Archivi/AS_Roma/Imago/".$dir."/".$file.".jp2&SDS=0,90&CNT=1.0&WID=800&QLT=100&CVT=jpeg\">";
	print'</A></CENTER>';
	
}
mostra($descr,$row,$dir,$dbserver,$serverIIP);

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