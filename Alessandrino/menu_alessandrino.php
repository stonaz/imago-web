<head>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;MAPPE</FONT>
<ul class="flipMenu">


<?PHP
include '../parametri.php';
$query_type= $_POST['query_type'];
$searchstring= $_POST['searchstring'];
//echo $_POST['query_type'];
//echo "Server:".$dbserver;
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=alessandrino user=imago_web password=normal.2020") or die ('no db');
$query_corda="select corda_unica,intestazione from clientview order by cartella, lettera,arabo,bis,romano;";
if ($query_type=="testo")
{ 
$query_corda = 	"SELECT corda_unica,intestazione FROM clientView WHERE intestazione ilike '%$searchstring%'
 			Or toponimi  ilike '%$searchstring%'
			Or proprietario ilike '%$searchstring%'
 			Or agrimensore ilike '%$searchstring%'
			Or note ilike '%$searchstring%'
			Or descrizione ilike '%$searchstring%' " ;
}
//echo $query_corda;			
$result=pg_query($dbconn,$query_corda);
while($row=pg_fetch_array($result))
{
	print'<li><A HREF="scheda.php?r=';echo $row[0];print'" target="s">'; echo $row[0]."<br>".$row[1]."</A></li>\n";
}
?>
</ul>


</FONT>
</body>
</html>