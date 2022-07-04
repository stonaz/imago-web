<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;MAPPETTE </FONT>
<ul class="flipMenu">
<li><a href="javascript:closeAllFlips()" target="m">Nascondi Tutto</a> | 
<a href="javascript:openAllFlips()" target="m">Mostra Tutto</a></li>

<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=$user password=$pwd") or die ('no db');
$query_localita="select DISTINCT \"PROVINCIA\" from \"mappette_view\" order by \"PROVINCIA\" ASC";
$result=pg_query($dbconn,$query_localita);
$i=0;
while($row=pg_fetch_array($result))
{
   	$Provincia[$i]=$row[0];
   	$i++;
}

$cont=$i;
for ($i=0;$i<$cont;$i++)
{
	echo "<li>".$Provincia[$i]."<ul>";
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=imago_web password=normal.2020") or die ('no db');
	$query_piante="select * from \"mappette_view\" WHERE \"PROVINCIA\"='".$Provincia[$i]."' ORDER BY \"TERRITORIO\",\"DENOMINAZIONE_MAPPETTA\" , \"SEZIONE_MAPPA\", \"SOGGETTO\" ASC";
	$result=pg_query($dbconn,$query_piante);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_mappette.php?Provincia=';
	echo $Provincia[$i];
	print'&Territorio=';echo $row[6];
	print'&Mappa=';echo $row[3];
	print'&Soggetto=';echo $row[15];
	print'&Sezione=';echo $row[8];
	print'&Denominazione=';echo $row[11];
	print'&Descrizione=';echo $row[10];
	print'" target="s">'; echo $row[6]."-".$row[11]." $row[10] $row[8]". strtoupper($row[15])."</A></li>";
	$k++;
	}
	echo "</ul></li>";
	echo "\n";
}
?>
</ul></li>


</ul></FONT>
</body>
</html>