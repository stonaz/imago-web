<html>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">
<FONT  SIZE="+1">&nbsp;&nbsp;MAPPE COMARCA</FONT>
<ul class="flipMenu">


<?PHP
include '../parametri.php';
//$query_type= $_POST['query_type'];
//$searchstring= $_POST['searchstring'];
$query_type = (isset($_POST['query_type'])) ? $_POST['query_type'] : "";
$searchstring = (isset($_POST['searchstring'])) ? $_POST['searchstring'] : "";

//echo $_POST['query_type'];
//echo "Server:".$dbserver;
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=comarca user=$user password=$pwd") or die ('no db');
$query_corda="select * from mappe order by 1;";



			
$result=pg_query($dbconn,$query_corda);
while($row=pg_fetch_array($result))
{
	print'<li><A HREF="s_sfoglia_comarca.php?dir=Comarca&r=';echo $row[1];print'" target="s">'; echo "<strong>".$row[1]."</strong><br>".$row[2]."</A></li>\n";
}


?>
</ul>
</FONT>
</body>
</html>
