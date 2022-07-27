<table border = '1' cellpadding='3' cellspacing='0'><tr>
<td valign="top" >
<FONT FACE="VERDANA" SIZE="1">

		<form  method="post" target="m" action="menu_ute.php" >
  

<strong> 
RICERCA TESTO  </strong> <input type="text" size="15"
  name="searchstring" value="" >
 <input TYPE="submit" value="Cerca" > 
<a href="menu_ute.php" target="m" >
Annulla selezione</a></form> 
 </td><td valign="top">
<form  method="get" target="s" action="scheda.php" >
<input type="hidden" size="15"
  name="ordine" value="gregoriano" >

 <b><font FACE="VERDANA" size="1">Segnatura gregoriano - Nuova segnatura :</font></b> 
  <select onchange="this.form.submit();" size="1" name="r" >
<option >
<?PHP
include '../parametri.php';
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=ute user=$user password=$pwd") or die ('no db');

$query_greg="select  \"Nuova_corda\",riferimento from \"Gregoriano_vistaView\" order by riferimento";
//echo $query_comune;
$result=pg_query($dbconn,$query_greg);
while($row=pg_fetch_array($result))
{
   	$Nuova_corda==$row[0]?$selected="SELECTED":$selected="";
	echo "<option $selected value=\"$row[0]\"> $row[0]"."-". "$row[1]\n";
	//echo "<option $selected value=\"$row[0]\" > $row[0]."-". $row[1]\n";
	
			
}
?> 
 </option>
  </select> 

</form>
</td></tr></table>




