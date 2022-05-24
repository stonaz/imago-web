<html>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<ul class="flipMenu">
<li><a href="javascript:closeAllFlips()" target="m">Nascondi Tutto</a> | 
<a href="javascript:openAllFlips()" target="m">Mostra Tutto</a></li>
<li>Cartiglio<ul>

<?PHP

include '../parametri.php';
function leggifileimm($root,$dir,$dbserver)
{
	
	$dir1=$dir;
	$dir1=substr($dir1,5,strlen($dir1));
	//$dir1="UTE/".$dir1;
	$dir=str_replace("/","\\",$dir);

	//echo "<HR>".$dir;

	$dbconn2 = pg_connect ("host=$dbserver port=5432 dbname=ute user=imago_web password=normal.2020") or die ('no db');
	$query_scan="select \"DESCRIZIONE\",\"NOME\" FROM \"Mappe_scansioniView\" where \"PATH\" ='".$dir."' order by \"NOME\"";	
	//echo $query_scan;

	$result_scan=pg_query($dbconn2,$query_scan);

	while ($row_scan=pg_fetch_array($result_scan))
	{
	print'<li><A HREF="s_sfoglia_brogliardi.php?dir=';echo $dir1."&r=".$row_scan[1].".jp2"; print'" target="s">';echo $row_scan[0]; print'</A></li>';

	}

}


$path=$_GET['Path'];
//echo $path;

leggifileimm($root,$path,$dbserver);
?>

</ul></li>
</ul>
</ul></li>
</ul>
</FONT>
</body>
</html>