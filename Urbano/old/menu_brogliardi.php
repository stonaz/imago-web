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
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=urbano user=$user password=$pwd") or die ('no db');
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
	$dbconn = pg_connect ("host=$dbserver port=5432 dbname=urbano user=$user password=$pwd") or die ('no db');
	$query_piante="select * from brogliardi_vista WHERE \"Rione\"='".$Rione[$i]."'";
	$result=pg_query($dbconn,$query_piante);
	$k=1;
	while($row=pg_fetch_array($result))
	{
	print'<li><A HREF="s_brogliardi.php?Rione=';echo $Rione[$i]; print'&Path=';echo $row[6];print'" target="s">'; echo $row[8]."</A></li>";
	$k++;
	}
	echo "</ul></li>";
}
?>
</ul></li>


</ul></FONT>
</body>
</html>