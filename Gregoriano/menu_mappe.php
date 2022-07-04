<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;MAPPE </FONT>
<ul class="flipMenu">
<li><a href="javascript:closeAllFlips()" target="m">Nascondi Tutto</a> | 
<a href="javascript:openAllFlips()" target="m">Mostra Tutto</a></li>

<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=$user password=$pwd") or die ('no db');
$query_localita="select DISTINCT \"PROVINCIA\" from \"mappe_view\" order by \"PROVINCIA\" ASC";
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
	if (substr($Provincia[$i],0,4)=="Forl") {echo "<li>Forli'<ul>";}
	else {echo "<li>".$Provincia[$i]."<ul>";}
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=imago_web password=normal.2020") or die ('no db');
	$query_piante="select \"LOCALITA\", \"SCANSIONE\" from \"mappe_view\" WHERE \"PROVINCIA\"='".$Provincia[$i]."' ORDER BY \"LOCALITA\", \"SCANSIONE\" ASC";
	$result=pg_query($dbconn,$query_piante);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_mappe.php?Provincia=';echo $Provincia[$i]; print'&Localita=';echo $row[0];print'&Scansione=';echo $row[1];print'" target="s">'; echo $row[0]." ".$row[1]."</A></li>\n";
	$k++;
	}
	echo "</ul></li>";
}
?>
</ul></li>


</ul></FONT>
</body>
</html>