<?PHP
include '../parametri.php';
if (!isset($_GET['ordine'])){$ordine="corda_unica";}
else {$ordine=$_GET['ordine'];}

$query_type= $_POST['query_type'];
$searchstring= $_POST['searchstring'];
//echo $_POST['query_type'];
//echo $searchstring;
//echo $ordine."<br>";
?><head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>

<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;MAPPE</FONT>
<ul class="flipMenu">

<?PHP
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=ute user=imago_web password=normal.2020") or die ('no db');

	if (!isset($_POST['searchstring']))
	{
	$query_corda="SELECT * from mappe_view ORDER BY \"Comune\", \"Sezione\" ASC";
	}
	else
	{
	$ex_com=utf8_encode("già_nel_comune");
	$ex_n=utf8_encode("già_n");
	$loc=utf8_encode("Località");
	$query_corda= 	"SELECT * FROM mappe_view
			WHERE \"Comune\" ilike '%$searchstring%'
 			Or note ilike '%$searchstring%'
			Or \"$ex_com\"  ilike '%$searchstring%'
			Or \"$loc\" ilike '%$searchstring%' "  ;
	}
	//echo $query_corda;
	$result=pg_query($dbconn,$query_corda);
	while($row=pg_fetch_array($result))
		{
		print'<li><A HREF="scheda.php?r=';echo $row[1];print'" target="s">';echo $row[10]." ".$row[11]." ".$row[16]."</A></li>";
//<BR>NC:".$row[2]."(".$row[3]." ".$row[4]." ".$row[5].")

		}
	



?>








</ul></FONT>
</body>
</html>