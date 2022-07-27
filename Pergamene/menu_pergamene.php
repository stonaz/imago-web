<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
<SCRIPT language="JavaScript" type="text/javascript">
function cambia(record) {
	var ilframe = parent.cerca.location.href='search_pergamene.php?r='+record;
	return ilframe;
}
</SCRIPT>
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;PERGAMENE</FONT>
<ul class="flipMenu">

<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=pergamene user=$user password=$pwd") or die ('no db');
$query_corda="SELECT * from serie_view ORDER BY \"nome_serie\" ASC";
$result=pg_query($dbconn,$query_corda);
while($row=pg_fetch_array($result))
{
	print'<li><A HREF="scheda.php?r=';
	echo $row[1];
	print'" onclick="cambia(';echo "'".$row[1]."'";
	print ')" return false" target="s">';
	echo $row[0]."</A></li>";
}
?>








</ul></FONT>
</body>
</html>