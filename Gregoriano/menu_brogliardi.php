<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>

<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;BROGLIARDI</FONT>
<ul class="flipMenu">
<li><a href="javascript:closeAllFlips()" target="m">Nascondi Tutto</a> | 
<a href="javascript:openAllFlips()" target="m">Mostra Tutto</a></li>

<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=$user password=$pwd") or die ('no db');
$query_localita="select distinct \"PROVINCIA\" from brogliardi_view order by \"PROVINCIA\" ASC";
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
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=gregoriano user=$user password=$pwd") or die ('no db');
	$query_piante="select\"DENOMINAZIONE_BROGLIARDO\" from brogliardi_view WHERE \"PROVINCIA\"='".$Provincia[$i]."' order BY \"DENOMINAZIONE_BROGLIARDO\" ASC";
	$result=pg_query($dbconn,$query_piante);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_brogliardi.php?Provincia=';echo $Provincia[$i]; print'&Denominazione=';echo $row[0];print'" target="s">'; echo $row[0]."</A></li>";
	$k++;
	}
	echo "</ul></li>";
}
?>
</ul></li>


</ul></FONT>
</body>
</html>