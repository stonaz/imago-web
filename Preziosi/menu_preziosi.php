<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;VOLUMI</FONT>
<ul class="flipMenu">

<?PHP
include '../parametri.php';
$condizioni=" \"Titolo\"!='Statuti della compagnia' AND ";
$condizioni.=" \"Titolo\"!='Liber societatis' AND ";
$condizioni.=" \"Titolo\"!='Testamento di Michelangelo' AND ";
$condizioni.=" \"Titolo\"!='Autografi di sovrani e principi' AND";
$condizioni.=" \"Titolo\"!='Mare magnum' AND ";
$condizioni.=" \"Titolo\"!~'Liber ordinatus*' AND" ;
$condizioni.=" \"Titolo\"!~'Liber ad recolligendum omnia societatis et*' " ;

$dbconn = pg_connect ("host=$dbserver port=5432 dbname=preziosi user=$user password=$pwd") or die ('no db');
$query= "select distinct nome_fondo from web_view ";
$result=pg_query($dbconn,$query);
while($row=pg_fetch_array($result))
{
	$nome_fondo = $row[0];
//	$titolo_volume = pg_escape_string($row[1]);
	print"<li><strong>$nome_fondo</strong><BR>";
	$query2= "select   \"Titolo\",\"N\",link  from web_view WHERE nome_fondo = '$nome_fondo'  order by \"N\"";
    $result2=pg_query($dbconn,$query2);
	while($row=pg_fetch_array($result2))
	{
		$titolo = $row[0];
		$corda  = $row[1];
		$link  = $row[2];
		$r=$corda."-".$link;
		print "<A HREF='scheda.php?r=$r' target='s'> <strong>Vol. $corda </strong> $titolo</A><BR> ";
	}
	print "</li>";
}
?>








</ul></FONT>
</body>
</html>