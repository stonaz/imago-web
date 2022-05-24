<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
include '../parametri.php';
$catalogo="Imago";


if (!isset($_GET['r'])){$row="428/I";}
	else {$row=$_GET['r'];}
	
function ContainsNumbers($String){
    return preg_match('/\\d/', $String) > 0;
}

function mostra($row,$dbserver,$serverIIP)
{
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=alessandrino user=imago_web password=normal.2020") or die ('no db');
	$query = "SELECT * from clientview where corda_unica='".$row."'";
	$result=pg_query($dbconn,$query);
	$info=pg_fetch_array($result);
	//db_disconnect();

	//$host="212.189.172.102";
	global $catalogo;

//FORMATTAZIONE DI FILE E DIR PER ALLINEARE DB E FILE SYSTEM
	$dir=$info[25];
	$dir=substr($dir,6,strlen($dir));
	$file=$row;

	$file=substr($file,strpos($file,"/")+1,strlen($file));
	//echo $file."<br>";
	if (is_numeric($file))
		{$file=str_pad($file, 2, "0", STR_PAD_LEFT);}
	else
		if (!ContainsNumbers($file))
			{$file="_".$file;}
		else
			if (strlen($file) == 2)
			{$file=str_pad($file, 3, "0", STR_PAD_LEFT);}
			
	
	
	$file=$file.".jp2";
	//echo $file."<br>";
	$file=strtolower(str_replace("\\","/",$file));
	$dir=strtolower(str_replace("\\","/",$dir));
	$dir="Alessandrino/".$dir;
	echo $dir;

print'
	 <table width="100%" align="center">
  	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center"> 
    	  <table  border="2" bgcolor="#ffffff"   width="90%">
        <tr> 
          <td class="intestazione" >Fondo</td>
          <td class="dati" >&nbsp;';echo $info[7];
print'</td>

<td rowspan="16" align="center" valign="middle" bgcolor="#EFEFDD">';
echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=/data/imago/images/".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";

	print'
</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "Alessandrino.jp2','Kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>
</td>
        </tr>
        <tr> 
          <td class="intestazione">Serie</td>
          <td class="dati">&nbsp;';echo $info[8];print'</td>
        </tr>
		       
		        <tr> 
          <td class="intestazione" >segnatura</td>
          <td class="dati">&nbsp;';echo $row;print'</td>
        </tr>
        <tr> 
          <td class="intestazione" > precedenti</td>
          <td class="dati">&nbsp;';echo $info[9];print'  </td>
        </tr>
        <tr> 
          <td class="intestazione" >datazione</td>
          <td class="dati">&nbsp;';echo $info[10];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">data 
            esibizione</td>
          <td class="dati">&nbsp;';echo $info[11];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">intestazione</td>
          <td class="dati">&nbsp;';echo $info[12];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">toponimi</td>
          <td class="dati" >&nbsp;';echo $info[13];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">proprietario</td>
          <td class="dati">&nbsp;';echo $info[14];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">estensione</td>
          <td class="dati">&nbsp;';echo $info[15];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">agrimensore</td>
          <td class="dati">&nbsp;';echo $info[16];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">scala</td>
          <td class="dati">&nbsp;';echo $info[17];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">misure</td>
          <td class="dati">&nbsp;';echo $info[18];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">descrizione</td>
          <td class="dati">&nbsp;';echo $info[19];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">note</td>
          <td class="dati">&nbsp;';echo $info[20];print'</td>
        </tr>
        <tr> 
          <td class="intestazione">soggetto</td>
          <td class="dati">&nbsp;';echo $info[21];print' </td>
        </tr>
		</table> 
		</td>
		</tr>
		</table> 

	';

	
	
}
mostra($row,$dbserver,$serverIIP);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	//console.log('iipstart');
	var path = dir + '/' + file ;
	//url_inizio="http://<?PHP echo $serverIIP; ?>:9001/StyleServer/calcrgn?browser=win_ie&cat=Imago&style=default/view.xsl&wid=400&hei=300&browser=win_ie&plugin=false&item=";
	//url_fine="&wid=400&hei=300&style=default/view.xsl&plugin=false";
	url="http://<?PHP echo $serverIIP ?>/imago-web/iip_viewer/<?PHP echo $viewer ?>?dir=&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}

</script>
</body>
</html>