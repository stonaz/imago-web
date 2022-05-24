<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato di Roma - Progetto Imago II</title>
<meta name="keywords" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<meta name="description" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#CCCCCC">
 <?PHP
include '../parametri.php';
//if (!isset($_GET['r'])){$row_sel="1074";}
//	else {$row_sel=$_GET['r'];}
	

$dbconn = pg_connect ("host=$dbserver port=5432 dbname=pergamene user=imago_web password=normal.2020") or die ('no db');

/*Controlla se e' stato selezionato una valore dall'elenco delle cassette tramite la variabile num_on
 In caso positivo nell'elenco dei numeri verranno stampati come selezionati quelli relativi alla cassetta scelta
 Sempre in caso positivo, nell'elenco delle cassette, quella scelta sarà evidenziata come selezionata*/
if ($_SERVER['REQUEST_METHOD']=="POST" )
{
foreach($_POST as $key=>$temp)
			{
			//print "<b>$key</b>=$temp<br>";
			$$key=$temp;
			}
}
else
{
foreach($_GET as $key=>$temp)
			{
			//print "<b>$key</b>=$temp<br>";
			$$key=$temp;
			}
}

if ($num_on=="ok") 
{
$cassetta_sel=explode(";",$cassetta);
$cass=$cassetta_sel[0] ;
$bis=$cassetta_sel[1] ;
if ($bis=="" )
		{
		//'Trasforma in uno spazio la stringa vuota fornita dalla form
		//'Altrimenti la query SQL non funziona
  		$bis=" ";
		}
} 




?> 
<table class="ricerca" border="1" align="center" width="100%" >
  <tr> 
    <td rowspan="2" > <input type="button" name="cancella" value="Cancella selezioni"  onClick="window.location.href='search_pergamene.php?r=none';"></td>
    <td colspan="2" align="center" bgcolor="#999999"> <b>RICERCA PER COLLOCAZIONE</b></td>
	<td colspan="6" align="center"> <b>RICERCA TESTO E/O SERIE</b></td>
  </tr>
  <tr> 
    <td class="dati" width="141" align="center" valign="top"> 
      <form action="search_pergamene.php" method="get" name="sel" id="sel" >
	   <input type="hidden" name="r" value="none">
        <b><font size="1">Cassetta:</font></b> <br>
        <select name="cassetta" onChange="javascript: document.sel.submit();document.sel.reset();document.text.reset()" >
          <option  value="0;0"> </option>
<?PHP
$sql_cassetta= "SELECT distinct \"CASSETTA\", \"BIS\" FROM cassette_view order by \"CASSETTA\"";
//echo $query_comune;
$result=pg_query($dbconn,$sql_cassetta);
while($row=pg_fetch_array($result))
{
   	$cass==$row[0] && $bis==$row[1]?$selected="SELECTED":$selected="";
	echo "<option $selected value=\"$row[0];$row[1]\"> $row[0] $row[1]\n";
	//echo "<option $selected value=\"$row[0]\" > $row[0]."-". $row[1]\n";
	
			
}
?>

 
        </select>
        <input type="hidden" name="num_on" value="ok">
      </form>
    </td>
    <td class="dati" valign="top" width="168" align="center"> <!-- form per i numeri --> 
      <form action="scheda.php" method="get" name="sel_num" id="sel_num" target="s">
<?PHP
if ($num_on== "ok" )
{
$cont=0; 
  $sql_num="select  \"NUMERO\", \"SUB\" from segnatura_view where \"CASSETTA\"= $cass AND \"BIS\"= '$bis' order by \"NUMERO\" ,\"SUB\" " ;
echo "<b><font size='1'>Numero:<br></font></b> ";
echo "<select size=\"1\" name=\"num_segn\">";
echo "           <option selected value=\"\"> </option> ";
$result=pg_query($dbconn,$sql_num);
while($row=pg_fetch_array($result))
	{
	$cont++;
   		//$cont==1?$selected="SELECTED":$selected="";
		echo "<option $selected value=\"$row[0];$row[1]\"> $row[0] $row[1]\n";
	}
echo		 "</option></select>&nbsp;";
echo        "<input type=\"hidden\" name=\"bis\" value=\"$bis\">";
 echo        "<input type=\"hidden\" name=\"cass\" value=\"$cass\">";
 echo        "<input type=\"hidden\" name=\"query_type\" value=\"segn\">";
echo        "<input type=\"submit\" value=\"Cerca\" name=\"submit\" onClick=\"document.text.reset();document.data.reset();document.serie.cod_serie.options.selectedIndex='';\">";
echo "      </form>";
}
else
{
?>
 <b><font size="1">Numero:<br>
      </font></b> 
      <select name="">
        <option value="" SELECTED> </option>
      </select>
	  &nbsp;
<?PHP
echo        "<input type=\"hidden\" name=\"bis\" value=\"$bis\">";
 echo        "<input type=\"hidden\" name=\"cass\" value=\"$cass\">";
 echo        "<input type=\"hidden\" name=\"query_type\" value=\"segn\">";
echo        "<input type=\"submit\" value=\"Cerca\" name=\"submit\" onClick=\"document.text.reset();document.data.reset();document.serie.cod_serie.options.selectedIndex='';\">";
echo "      </form>";
}
?>
   </td>

    <td align="center" class="dati"><!-- form per LE SERIE --> 
	
	<form action="scheda.php" method="get" name="serie" id="serie" target="s">
	<input type="hidden" name="num_on" value="off">
              <b><font size="1">Serie</font></b> <br>
        <select name="r" id="r" style="color: #000000; font-family: arial; font-size: 12px;  width: 150px;" >
          <option  value="">&nbsp;



	<?PHP
$sql_serie= "select * from serie_view order by nome_serie";
//echo $query_comune;
$result=pg_query($dbconn,$sql_serie);
while($row=pg_fetch_array($result))
{
   	$row[1]==$row_sel?$selected="SELECTED":$selected="";
	echo "<option $selected value=\"$row[1]\" >".$row[0]."\n";
	
		
}
?>

 </option>
        </select>	
		 &nbsp;</td>
				
				<td align="center" class="dati" valign="top">
		 <b><font size="1">Tipologia documento </font></b>
        <br><select name="tipologia_sel" style="color: #000000; font-family: arial; font-size: 12px;  width: 250px;">
          <option  value=""> 
		  <?PHP
$sql_tipologia= "select distinct tipologia_documento from pergamene_view order by 1"  ;
$result=pg_query($dbconn,$sql_tipologia);
while($row=pg_fetch_array($result))
{
   	//$cass==$row[0] && $bis==$row[1]?$selected="SELECTED":$selected="";
	echo "<option $selected value=\"$row[0]\" >$row[0]\n";
	
		
}
?>
	</option>
        </select></td>
				
				<td align="center" class="dati" valign="top"> 
        <font size="1"><strong>Stringa di testo</strong></font><br>
          <input type="text" name="searchstring">
          &nbsp; <br></td><td align="center"class="dati" valign="top">
          <font size="1"><strong>Anno</strong></font><br>
          <input type="text" name="anno_sel">
        &nbsp;<br></td><td align="center" class="dati" valign="top">
		 <b><font size="1">Secolo </font></b>
        <br><select name="secolo_sel" >
          <option  value=""> 
		  <?PHP
$sql_secolo= "select distinct \"SECOLO\",\"NSECOLO\" from pergamene_view where \"NSECOLO\" is not null AND \"SECOLO\" is not null order by \"NSECOLO\", \"SECOLO\""  ;
$result=pg_query($dbconn,$sql_secolo);
while($row=pg_fetch_array($result))
{
   	//$cass==$row[0] && $bis==$row[1]?$selected="SELECTED":$selected="";
	echo "<option $selected value=\"$row[0]\" >$row[0]\n";
	
		
}
?>
	</option>
        </select></td><td class="dati" align="center">
        <p> 
		
         
          <input type="submit" name="submit2" value="Cerca" onClick="document.sel_num.num_segn.options.selectedIndex='';document.sel.cassetta.options.selectedIndex=''">
          <input type="hidden" name="num_on" value="niente">
          <input type="hidden" name="recno" value="1">
          <input type="hidden" name="query_type" value="serie">
          </td>
  </tr>
  </table>



