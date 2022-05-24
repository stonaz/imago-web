<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">

<ul class="flipMenu">
<li><a href="javascript:closeAllFlips()" target="m">Nascondi Tutto</a> | 
<a href="javascript:openAllFlips()" target="m">Mostra Tutto</a></li>

<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=urbano user=imago_web password=normal.2020") or die ('no db');
$query_localita="select \"Arabo\",\"Rione\" from rioni_vista order by \"Rione\" ";
$result=pg_query($dbconn,$query_localita);
$i=0;
while($row=pg_fetch_array($result))
{
   	$Rione[$i]=$row[1];
   	$i++;
}

$cont=$i;
for ($i=0;$i<$cont;$i++)
{
	echo "<li>".$Rione[$i]."<ul>";
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=urbano user=imago_web password=normal.2020") or die ('no db');
	$query_piante="select * from aggiornamenti_vista WHERE \"Rione\"='".$Rione[$i]."' ORDER BY \"Arabo_porzione\" ASC";
	$result=pg_query($dbconn,$query_piante);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_aggiornamenti.php?Rione=';echo $Rione[$i];print'&Porzione=';echo $row[7]; print'&Allegato=';echo $row[9];print'" target="s">'; echo $row[7]; if ($row[9]!=" ") echo " allegato ".$row[9]."</A></li>";else echo "</A></li>";
	$k++;
	}
	echo "</ul></li>";
}
?>
</ul></li>


</ul></FONT>
</body>
</html>