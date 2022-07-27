<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
<title>Imago</title></head>
<BODY BGCOLOR="#EEEEEE">
<?PHP
include '../parametri.php';
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=tesorerie user=$user password=$pwd") or die ('no db');

$host=$server;
$catalogo="Imago";


if (!isset($_GET['Serie'])){$serie="152";}
	else {$serie=$_GET['Serie'];}

if (!isset($_GET['Busta'])){$busta="1";}
	else {$busta=$_GET['Busta'];}

if (!isset($_GET['Registro'])){$registro="1";}
	else {$registro=$_GET['Registro'];}


function mostra($serie,$busta,$registro,$dbserver,$serverIIP,$dbconn,$root)
{
	$query = "SELECT \"Path\",\"Nome\" from scansioni_view where \"Link\"=".$serie." AND \"Busta\"='".$busta."' AND \"Registro\"='".$registro."'";
	$result=pg_query($dbconn,$query);
	$imm=pg_fetch_array($result);
	//db_disconnect();


	global $catalogo;


	$dir=$imm[0];
	//Trasformazione della stringa presente nel DB, in modo da farla corrispondere al filesystem linux per maiuscole/minuscole
	$dir=ucfirst(strtolower(substr($dir,6,strlen($dir))));
	//echo $dir;
	//$dir="Tesorerie/Patrimonio".$dir;
	$dir="Tesorerie\\".$dir;
	$file=$imm[1].".jp2";


	$query = "SELECT * from registri_view where \"link\"=".$serie." AND \"busta\"='".$busta."' AND \"registro\"='".$registro."'";
	$result=pg_query($dbconn,$query);
	$info=pg_fetch_array($result);
	//db_disconnect();


	$file=str_replace("\\","/",$file);
	$dir=str_replace("\\","/",$dir);
	//echo $dir;
	

if ($info[0]==152) {$serie="Tesoreria provinciale del Patrimonio";}
else{$serie="Tesoreria provinciale della Marca";}

print'
	 <table border="1" bgcolor="#ffffff" cellspacing="0" width="90%">
                <tr> 
          <td class="intestazione"  ><b>Fondo</b></td>
          <td class="dati"><b>Tesorerie provinciali</b></td>

<td rowspan="17" align="center" valign="middle" class="preview_grey" >
<A target="_new" HREF="sfoglia_brog_tes.php?Path=';
 echo $dir;print'&r='; echo $file;
print'">';
	    	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=/$root".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";

print '
</A><br>';
 echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "SMA200.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

</td>        </tr>
        <tr> 
          <td class="intestazione" ><b>Serie</b></td>
          <td class="dati"><b>'; echo $serie; print'</b></td>
        </tr>
	
		 <tr bgcolor="#C0C0C0"> 
          <td class="intestazione" >Busta</td>
          <td class="dati" >'; echo $info[1]; print'</td>
        </tr>
        <tr bgcolor="#C0C0C0"> 
          <td class="intestazione" color="#000000">Registro</td>
          <td class="dati">  '; echo $info[2]; print'</td>
        </tr>
        <tr bgcolor="#C0C0C0"> 
          <td class="intestazione">Intestazione</td>
          <td class="dati">'; echo $info[3]; print'</td>
        </tr>
        <tr bgcolor="#C0C0C0"> 
          <td class="intestazione">Estremi cronologici</td>
          <td class="dati">'; echo $info[4]; print'</td>
        </tr>
        <tr bgcolor="#C0C0C0"> 
          <td class="intestazione">Consistenza</td>
          <td class="dati">'; echo $info[5]; print'</td>
        </tr>
        <tr bgcolor="#C0C0C0"> 
          <td class="intestazione" >Note</td>
          <td class="dati">'; echo $info[6]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">
		<A target="_top" HREF="sfoglia_brog_tes.php?Path='; echo $dir;print'&r='; echo $file;print'">
		Consultazione
</a>
 		</td>
          <td  class="dati">
<A target="_top" HREF="sfoglia_brog_tes.php?Path='; echo $dir;print'&r='; echo $file;print'">
<IMG SRC="../images/book.png" BORDER="0" ALT="Sfoglia/See"></a></td>
        </tr>

		
</table>  
	';	
	
}
mostra($serie,$busta,$registro,$dbserver,$serverIIP,$dbconn,$root);

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