<html>
<BODY bgcolor="#EEEEEE">
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['Path'])){$dir="01.jp2";}
	else {$dir=$_GET['Path'];}

if (!isset($_GET['r'])){$row="001.jp2";}
	else {$row=$_GET['r'];}

function mostra($row,$dir,$serverIIP)
{
	$file=$row;
	global $catalogo;
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
	    	echo "<IMG SRC=\"http://".$serverIIP."/iiifserver?FIF=/images/Patrimonio/Archivi/AS_Roma/Imago/".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=1024&QLT=100&CVT=jpeg\">";
	print'</A></CENTER>';
	
}

mostra($row,$dir,$serverIIP);

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