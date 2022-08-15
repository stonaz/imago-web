<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato di Roma - Progetto Imago II</title>
<meta name="keywords" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<meta name="description" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
function get_items_list($dbconn,$sql)
{
   
    
   
	
    $result = pg_query($dbconn, $sql) or die ('no query: '.$php_errormsg);
    $arr = pg_fetch_array ($result);        
    return ($arr); 
}

include '../parametri.php';
$id=$_GET[id];
//echo $id;
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=pergamene user=imago_web password=normal.2020") or die ('no db');
$sql = "select * from credits where \"IDsponsor\" = $id";
$result = pg_query($dbconn, $sql) or die ('no query: '.$php_errormsg);
while ($item_list=pg_fetch_array($result))
	{
$logo=$item_list['Logo'];
$msg=$item_list['messaggio'];
    }
//echo $logo;


print "<DIV><img src='$logo'</DIV>";
print "<h2>$msg</h2>";

?>