<html>
<BODY  bgcolor="#EEEEEE">
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['Path'])){$dir="pre/PRE004/confraternita_ss._Annunziata/920_libro_delle_piante_di_tutte_le_case/";}
	else {$dir=$_GET['Path'];}


if (!isset($_GET['r1'])){$row="01.jp2";}
	else {$row=$_GET['r1'];}



function mostra($row,$dir,$dbserver,$serverIIP,$root)
{
	$file=$row;
	//echo $file;
	global $catalogo;
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=".$catalogo."&item=".$dir."\\".$file."&thumbspec=bigger\">";
	print'</A></CENTER>';
	
}
mostra($row,$dir,$dbserver,$serverIIP,$root);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	//console.log('iipstart');
	var path = dir + '/' + file ;
	//url_inizio="http://<?PHP echo $serverIIP; ?>:9001/StyleServer/calcrgn?browser=win_ie&cat=Imago&style=default/view.xsl&wid=400&hei=300&browser=win_ie&plugin=false&item=";
	//url_fine="&wid=400&hei=300&style=default/view.xsl&plugin=false";
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}


</script>
</body>
</html>