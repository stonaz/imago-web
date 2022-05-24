<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;REGISTRI</FONT>
<ul class="flipMenu">

<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=notai user=imago_web password=normal.2020") or die ('no db');
$query_corda="select * from serie_view;";
$result=pg_query($dbconn,$query_corda);
while($row=pg_fetch_array($result))
{
	print'<li><A HREF="scheda.php?r=';echo $row[1];print'" target="s">'; echo $row[0]."</A></li>";
}
?>








</ul></FONT>
</body>
</html>