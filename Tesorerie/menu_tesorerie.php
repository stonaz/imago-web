<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<ul class="flipMenu">
<li><a href="javascript:closeAllFlips()" target="m">Nascondi Tutto</a> | 
<a href="javascript:openAllFlips()" target="m">Mostra Tutto</a></li>
<li>Tesoreria provinciale del Patrimonio<ul>
<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=tesorerie user=imago_web password=normal.2020") or die ('no db');
$query_corda="select distinct \"busta\" from registri_view WHERE \"nome_serie\"='Tesoreria provinciale del Patrimonio' order by \"busta\" ASC ";
$result=pg_query($dbconn,$query_corda);
$i=0;
while($row=pg_fetch_array($result))
{
	$busta[$i]=$row[0];
	$i++;	
}

$cont=$i;
for ($i=0;$i<$cont;$i++)
{
	echo "<li>Busta #".$busta[$i]."<ul>";
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=tesorerie user=imago_web password=normal.2020") or die ('no db');
	$query_piante="select \"registro\" from registri_view WHERE \"nome_serie\"='Tesoreria provinciale del Patrimonio' AND \"busta\"='".$busta[$i]."' ORDER BY \"registro\" ASC";
	$result=pg_query($dbconn,$query_piante);

	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_tesorerie.php?Serie=152&Busta=';echo $busta[$i]; print'&Registro=';echo $row[0];print'" target="s"> registro #'; echo $row[0]."</A></li>";
	}
	echo "</ul></li>";
}

?>
</ul></li>
<li>Tesoreria provinciale della Marca<ul>
<?PHP
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=tesorerie user=imago_web password=normal.2020") or die ('no db');
$query_corda="select distinct \"busta\" from registri_view WHERE \"nome_serie\"='Tesoreria provinciale della Marca' order by \"busta\" ASC ";
$result=pg_query($dbconn,$query_corda);
$i=0;
while($row=pg_fetch_array($result))
{
	$busta[$i]=$row[0];
	$i++;	
}

$cont=$i;
for ($i=0;$i<$cont;$i++)
{
	echo "<li>Busta #".$busta[$i]."<ul>";
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=tesorerie user=imago_web password=normal.2020") or die ('no db');
	$query_piante="select \"registro\" from registri_view WHERE \"nome_serie\"='Tesoreria provinciale della Marca' AND \"busta\"='".$busta[$i]."' ORDER BY \"registro\" ASC";
	$result=pg_query($dbconn,$query_piante);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_tesorerie.php?Serie=153&Busta=';echo $busta[$i]; print'&Registro=';echo $row[0];print'" target="s"> registro #'; echo $row[0]."</A></li>";
	$k++;
	}
	echo "</ul></li>";
}

?>

</ul></li>


</ul></FONT>
</body>
</html>