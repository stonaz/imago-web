<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<BODY class="preview_grey">
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['dir'])){$dir="/".substr($_GET['Path'],6,strlen($_GET['Path']));}
	else {$dir=$_GET['dir'];}

if (!isset($_GET['r'])){$row=$_GET['File'];}
	else {$row=$_GET['r'];}



function mostra($row,$dir,$serverIIP,$root)
{
	$file=strtolower($row);
	//echo $file."<br>";
	$dir="UTE".strtolower($dir);
	//echo $dir."<br>";
	global $catalogo;
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=1024&QLT=100&CVT=jpeg\">";

	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=".$catalogo."&item=".$dir."\\".$file."&thumbspec=bigger\">";
	print'</A></CENTER>';
	
}
mostra($row,$dir,$serverIIP);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	console.log('iipstart');
	var path = dir + '/' + file ;
	//url_inizio="http://<?PHP echo $host ?>:9001/StyleServer/calcrgn?browser=win_ie&cat=Imago&style=default/view.xsl&wid=400&hei=300&browser=win_ie&plugin=false&item=";
	//url_fine="&wid=400&hei=300&style=default/view.xsl&plugin=false";
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=/AS_Roma/Imago/&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}


</script>
</body>
</html>