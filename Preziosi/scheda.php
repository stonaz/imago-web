<html>
<head>
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=preziosi user=$user password=$pwd") or die ('no db');


if (!isset($_GET['r'])){
	$corda="920";
	$link="865.1";
	}
	else { 
$params = explode("-",$_GET['r']);
$corda=$params[0];
$link=$params[1];
}

//print_r($params);
function mostra($dbconn,$row,$dbserver,$host,$corda,$link)
{
print'
	 <table width="100%" align="center">
	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center">
'; 	

	$query = "SELECT * from web_view where \"N\"=$corda AND link = $link";
//	echo $query;
	$result=pg_query($dbconn,$query);

 while ($info=pg_fetch_array($result))
	{
	
	global $catalogo;	
print '	
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="90%">
        

	<tr>
        <td class="intestazione"> Fondo</td>
          <td class="dati"> &nbsp;'; echo  $info[0]; print'</td>
<td   rowspan="14" align="center" valign="middle" class="preview_grey" >'; 

	$dir=strtolower($info[20]);
	//$dir=substr($dir,6,strlen($dir));
	//$dir="pre/".$dir;
	//$dir=str_replace("\\","/",$dir);

	$file=$info[21].".jp2";

	echo "<CENTER><A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?Path=".$dir."&r1=".$file."\">";
	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."/".$file."&thumbspec=middlebig\" BORDER=\"0\">";

	print'
	</A><br>';
echo "<a onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
echo "sma200.jp2','kodak')\" BORDER=0>";
//	echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=Imago&item=".$dir."\\".$file."&thumbspec=middlebig\">";
	print'Visualizza bandino colore</a></CENTER>

</td>
        </tr>
        
<tr> 
          <td class="intestazione">
 N.corda</td>
          <td class="dati">&nbsp;'; echo  $info[3]; print'</td>
        </tr>
<tr> 
          <td class="intestazione">
 Titolo</td>
          <td class="dati">&nbsp;'; echo  $info[5]; print'</td>
        </tr>

        <tr> 
          <td class="intestazione">Secolo</td>
          <td class="dati" >&nbsp;'; echo  $info[6]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">Anno</td>
          <td class="dati">

&nbsp;'; echo  $info[7]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">Carte</td>
          <td class="dati">&nbsp;'; echo  $info[8]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">Fogli</td>
          <td class="dati">&nbsp;'; echo  $info[9]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">Altezza</td>
          <td class="dati">&nbsp;'; echo  $info[11]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">Larghezza</td>
          <td class="dati">&nbsp;'; echo  $info[12]; print'</td>
        </tr>
		 <tr> 
          <td class="intestazione">Descrizione</td>
          <td class="dati">&nbsp;'; echo  $info[22]; print'</td>
        </tr>

        <tr> 
          <td class="intestazione">';
echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?Path=".$dir."&r1=".$file."\">";
		print 'Consultazione</a></td>
          <td class="dati">&nbsp;'; 
		echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?Path=".$dir."&r1=".$file."\">";
		echo "<IMG SRC=\"../images/book.png\" BORDER=\"0\"></A>";

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
mostra($dbconn,$row,$dbserver,$host,$corda,$link);

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