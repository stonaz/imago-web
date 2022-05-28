<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CFLR: Archivio di Stato di Terni - Fondo Cesare Bazzani</title>
<base target="scheda">
</head>
<?PHP
include "_css/common_db_pg.inc";
$file_php="scheda.php";
$db="bazzani";
$dir_imm="Bazzani/";
$dir_thu="thumbnail/";
include '../../parametri.php';
if (!isset($_GET['r'])){$row="001";}
	else {$row=$_GET['r'];}


function accenti($a)
{
if ($a=="LAQUILA") return ("L'AQUILA");
if ($a=="FORLI") return ("FORLI'");
return $a;
}

function mostra($row,$server,$serverIIP,$dbserver)
{


	global $db;
	global $dir_imm;
	global $dir_thu;
	$link_id=db_connect($dbserver);
	if (strlen($row)>3) {$query="SELECT * FROM \"disegni\" WHERE \"codicedisegno\"='".$row."' ORDER BY NCORDA";}
	else {$query="SELECT * FROM disegni WHERE UAProgetto ='".$row."' ORDER BY NCORDA";}
	//echo $query;
	$result=pg_query($link_id,$query) or die('no query');
	$num_elem=pg_num_rows($result);

	print'<table border="1" width="100%" border="0">';
	


for ($i=0;$i<$num_elem;$i++)
{
print'<td width="60%">';
print'<font face="Arial" size="1" color="#000000"><b>Unit&agrave archivistica ';echo pg_result($result,$i,"UAProgetto")."</b></FONT>  ";
//print'<font face="Arial" size="1" color="#000000"><b>Riferimenti archivistici</b> ';echo $d7."</FONT><BR>";
print'<hr>';
print'<font face="Arial" size="2" color="#000000"><b>Localit&agrave</b> ';echo accenti(pg_result($result,$i,"Localita"))."</FONT><BR>";
print'<font face="Arial" size="2" color="#000000"><b>Titolo Disegno</b> ';echo pg_result($result,$i,"TitoloDisegno")."</FONT><BR>";
print'<font face="Arial" size="1" color="#000000"><b>Note</b> ';echo pg_result($result,$i,"Note")."</FONT><BR>";
print'<font face="Arial" size="2" color="#000000"><b>Autografo</b> ';echo pg_result($result,$i,"IDAutografo")."</FONT><BR>";
print'<hr>';
print'<font face="Arial" size="2" color="#000000"><b>Tipologia</b> ';echo pg_result($result,$i,"IDTipologia")."</FONT> - ";
print'<font face="Arial" size="2" color="#000000"><b>Tecnica</b> ';echo pg_result($result,$i,"IDTecnica")."</FONT> - ";
print'<font face="Arial" size="2" color="#000000"><b>Supporto</b> ';echo pg_result($result,$i,"IDSupporto")."</FONT><BR>";
print'<font face="Arial" size="2" color="#000000"><b>Dim. imm.</b> ';echo pg_result($result,$i,"DimensioneImmagine")."</FONT> - ";
print'<font face="Arial" size="2" color="#000000"><b>Data</b> ';echo pg_result($result,$i,"DataImg")."</FONT> - "; 
print'<font face="Arial" size="2" color="#000000"><b>Scala</b> ';echo pg_result($result,$i,"IDScala")."</FONT>";
//print'<hr>';
//print'<font face="Arial" size="2" color="#000000"><b>Restauro</b> ';echo pg_result($result,$i,"Restauro")."</FONT> - ";
//print'<font face="Arial" size="2" color="#000000"><b>Indagine Diagnostiche</b> ';echo $d2."</FONT>";
print'<hr>';
print'<font face="Arial" size="2" color="#000000"><b>Vecchio Numero Corda</b> ';echo pg_result($result,$i,"NCORDA")."</FONT> - ";
print'<font face="Arial" size="2" color="#000000"><b>Recto/Verso</b> ';echo pg_result($result,$i,"VersoRecto")."</FONT><BR>"; 
print'</td><td width="40%">';
print'<CENTER>';
$file= pg_result($result,$i,"CodiceDisegno").".jp2";
$thum= pg_result($result,$i,"CodiceDisegno").".jpg";
$dir=substr($file,2,3);

echo "<A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir_imm.$dir."')\" BORDER=0>";
	    	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=/images/Patrimonio/Archivi/AS_Terni/".$dir_imm."/".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	print'
</A><br>';


print'</CENTER></td>';
print'</tr><tr><td>&nbsp; </td><td>&nbsp;</td></tr>';
}
print'</table>';
echo "\n";
db_disconnect();
}
mostra($row,$server,$serverIIP,$dbserver);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=/AS_Terni/&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}

</script>
</body>
</html>