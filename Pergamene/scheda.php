<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato di Roma - Progetto Imago II</title>
<meta name="keywords" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<meta name="description" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<link href="../common/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
include '../parametri.php';
//echo $credits_url;
$host=$server;
$catalogo="Imago";
$num_segn="";
$query_type="";
$searchstring="";
$anno_sel="";
$tipologia_sel="";
$secolo_sel="";
$cass="";
$bis="";
$credits_url="";
$numero="" ;
$sub="" ;
foreach($_GET as $key=>$temp)
			{
			$$key=$temp;
			//print "<b>$key</b>=$temp<br>";
			
			}
if (!empty($num_segn))
{
$num_sel=explode(";",$num_segn);
$numero=$num_sel[0] ;
$sub=$num_sel[1] ;	
}


if (!isset($_GET['r'])){$row="noQuery";}
	else {$row=$_GET['r'];}
$dbconn = pg_connect ("host=$dbserver port=5432 dbname=pergamene user=$user password=$pwd") or die ('no db');
//echo $searchstring;
function mostra($row,$dbserver,$serverIIP,$query_type,$searchstring,$anno_sel,$tipologia_sel,$secolo_sel,$cass,$bis,$numero,$sub,$credits_url,$dbconn)
{
	if ($row == "noQuery"   and $query_type !="segn"){
		echo "<h2><center>Effettuare una selezione dai criteri di ricerca</center></h2>";
		return;
	}
	
	if ($query_type=="segn")
	{
	$query = "SELECT * from \"pergamene_view\" where \"CASSETTA\"='".$cass."' AND \"BIS\"='".$bis."'";
	$query_count = "SELECT count(*) from \"pergamene_view\" where \"CASSETTA\"='".$cass."' AND \"BIS\"='".$bis."'";
	//echo $query;
	if ($numero != "")
		{
		$query .= " and \"NUMERO\" = '$numero' ";
		$query .= " and \"SUB\" = '$sub' ";
		$query_count = str_replace("*","count(*)",$query);
		}
	}
	else
	{
	$query = "SELECT * from \"pergamene_view\" where \"cod_serie\" is not null ";
	$query_count = "SELECT count(*) from \"pergamene_view\" where \"cod_serie\" is not null ";
	//echo $query;
	if ($row)
		{
		$query .= "and \"cod_serie\" = '$row' ";
		$query_count = str_replace("*","count(*)",$query);
		//echo $query;
		}
		if ($searchstring != "" )
		{
		//echo "stringa";
		$searchstring=utf8_encode($searchstring);
		$query .= "and (\"LUOGO\" ilike '%$searchstring%' ";
		$query .= "or \"REGESTO\" ilike '%$searchstring%' ";
		$query .= "or \"ROGATARIO\" ilike '%$searchstring%' ";
		$query .= "or \"BIBLIOGRAFIA\" ilike '%$searchstring%' ";
		$query .= "or \"NOTE\" ilike '%$searchstring%' ";
		$query .= "or \"TRADIZIONE\" ilike '%$searchstring%' )";
		$query_count = str_replace("*","count(*)",$query);
		}
	if ($anno_sel)
		{
		$query .= "and \"ANNO\" = '$anno_sel' ";
		$query_count = str_replace("*","count(*)",$query);
		}
	if ($tipologia_sel)
		{
		//	echo "TIPOLOGIA: $tipologia_sel";
		$query .= "and \"tipologia_documento\" = '$tipologia_sel' ";
		$query_count = str_replace("*","count(*)",$query);
		}
	if ($secolo_sel)
		{
		$query .= "and \"SECOLO\" = '$secolo_sel' ";
		$query_count = str_replace("*","count(*)",$query);
		}
		$query .= " order by \"CASSETTA\",\"NUMERO\",\"BIS\"  ";
	}
	//echo $query;
	$result_count=pg_query($dbconn,$query_count);
	 while ($row = pg_fetch_array($result_count))
    {
		$tot=$row[0];
	}
	
	print '<table width="100%" >
  <tr> 
    <td valign="top" width="56%" align="center"> ';
	echo "<b>Pergamene trovate: $tot</b>";
 	$result=pg_query($dbconn,$query);	
	while ($info=pg_fetch_array($result))
	{
	
	global $catalogo;	
print '
      <table border="1"  align="center"  width="80%" >
        <tr valign="top"> 
          <td class="intestazione"  width="111">Fondo</td>
          <td class="dati" colspan="6">'; echo $info[0] ; print'</td>
        </tr>
        <tr valign="top"> 
          <td class="intestazione"  width="111">Serie</td>
          <td class="dati" colspan="6">'; echo $info[1] ; print'</td>
        </tr>
      
       
 <tr> 
    <td class="intestazione" width="5%"  valign="top">Cassetta/cartella</td>
    <td width="3%"  valign="top" class="dati">&nbsp;'; echo  $info[7] ; print'</td>
    <td class="intestazione"colspan="2"  valign="top">Vecchia 
      segnatura&nbsp;</td>
    <td  valign="top" width="4%" class="dati">&nbsp;'; echo  $info[8]; print'</td>
  <td width="14%" class="intestazione" valign="top">Sigillo</td>
   <td width="14%" class="dati">&nbsp;'; $info[21]== 1?print "si":print "no" ; print'
</td> </tr>

 <tr> 
    <td  rowspan="2" class="intestazione" width="10%"  valign="top">Estremi cronologici</td>
	<td   class="intestazione" width="3%"  valign="top">Giorno</td>
    <td class="intestazione" width="3%"  valign="top">Mese</td>
    <td width="10%" class="intestazione"  valign="top">Anno</td>

    <td width="5%" class="intestazione" valign="top">Secolo</td>
    <td width="5%" colspan="2" class="intestazione" valign="top">Luogo</td>
    
  </tr>
   <tr> 
    <td width="3%" class="dati" >&nbsp;'; echo  $info[11]; print'</td>
    <td width="3%" class="dati">&nbsp;'; echo  $info[12]; print'</td>
    <td width="10%" class="dati">&nbsp;'; echo  $info[13]; print'</td>
    <td width="5%" class="dati">&nbsp;'; echo  $info[14]; print'</td>
    <td width="5%" colspan="2" class="dati">&nbsp;'; echo  $info[16]; print'</td>
  
  </tr>
  <tr> 
    <td width="10%" class="intestazione" valign="top">Tipologia documento</td>
    <td colspan="6" class="dati"  valign="top">&nbsp;';echo  $info['tipologia_documento']; print'</td>
  </tr>
  <tr> 
    <td width="10%" class="intestazione" valign="top">Rogatario</td>
    <td colspan="6" class="dati"  valign="top">&nbsp;';echo  $info[18]; print'</td>
  </tr>
  <tr> 
    <td width="10%" class="intestazione" valign="top">Note</td>
    <td colspan="6" class="dati" valign="top">&nbsp;'; echo  $info[19]; print'</td>
  </tr>
  <tr> 
    <td width="10%" class="intestazione"  valign="top">Tradizione</td>
    <td colspan="6" class="dati" valign="top">&nbsp;'; echo  $info[20]; print'</td>
  </tr>
  <tr> 
    <td width="10%" class="intestazione"  valign="top">Bibliografia</td>
    <td colspan="6" class="dati"  valign="top">&nbsp;'; echo  $info[22]; print'</td>
  </tr>
  <tr> 
    <td width="10%" class="intestazione" valign="top">Regesto</td>
    <td colspan="6" class="dati" >&nbsp;'; echo  $info[17]; print'</td>
';
$colspan = 6;
if ($info["IDsponsor"])
{
	//echo "Sponsor ci sta";
	$sponsor_id = $info["IDsponsor"];
	$sponsor=1;
	$logo_sponsor = $info["Logo"];
	$messaggio = $info["messaggio"];
	$colspan = 3;
}
else
{
	//echo "Sponsor ci sta";
	$sponsor=0;
}

	/*ALLEGATI*/



	//$dbconnimmall = pg_connect ("host=$dbserver port=5432 dbname=pergamene user=$user password=$pwd") or die ('no db');
	$imm_all ="SELECT \"HOST\", \"PATH\",\"NOME\",\"SOGGETTO\" FROM \"scansioni_view\"  where \"CASSETTA\" ='".$info[2]."' AND \"BIS\" = '".$info[3]."' AND \"NUMERO\" = '".$info[4]."' AND \"SUB\" = '".$info[5]."' AND \"DOCUMENTO\" = '".$info[6]."' ORDER BY \"SOGGETTO\"";
	//echo $imm_all;
	

	$result4=pg_query($dbconn,$imm_all);
	print '<TR><td valign="top" class="intestazione">Scansioni</td><td class="dati" colspan="';
	echo  $colspan;
	print '">';
	$scansione="no";
	if ($result4!=null) 
		{
		
		
		while ($row_scan= pg_fetch_array($result4))
			{
		$scansione="si";
				$dir=$row_scan[0].$row_scan[1];
				//echo "DIR:$dir";
				$file=$row_scan[2].".jp2";
					//	$dir=substr($dir,6,strlen($dir));
						//$dir="Pergamene/".$dir;
						$dir=str_replace("\\","/",$dir);
					//	echo $dir." FILE: ".$file;
			//		echo $row_scan[3];
						if ($row_scan[3] == "fascicolo")
						{
						
						echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?r=".$file."&Path=".$dir."\">";
						echo "<img src='../images/occhio.gif'>&nbsp;".$row_scan[3];
						print'</A>'."&nbsp;";
						}
						else
						{
						
						echo "<A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
						echo $file."','".$dir."')\" BORDER=0>";
	   					echo "<img src='../images/occhio.gif'>&nbsp;".$row_scan[3];
						print'</A>'."&nbsp;";
						}
						
			
				
			}
			echo "</ul>";
		}
		//echo $scansione;
	if ($scansione=="no")		
		{
			echo "Immagine non presente";
		}
	echo "</td>";
	if ($sponsor)		
		{
			echo "<td colspan=3>\n";
			echo "<A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:sponsor_msg('";
		    echo $sponsor_id."')\" BORDER=0>";

			echo "<img src='../credits/".$credits_url."/".$logo_sponsor."'>";
			print"</A></td>";
		}
	echo "</TR></table>";
		
    }
	echo "</TD></TR></table>";
	echo "<HR>";
}
mostra($row,$dbserver,$serverIIP,$query_type,$searchstring,$anno_sel,$tipologia_sel,$secolo_sel,$cass,$bis,$numero,$sub,$credits_url,$dbconn);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=/AS_Roma/Imago/&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}

function sponsor_msg(sponsor_id)
{
	//var path = dir + '/' + file ;
	url="../credits/view_credits.php?id=" +sponsor_id ;
	window.open(url,null, "top=400,left=400,height=300,width=300,status=no,toolbar=no,menubar=no,location=no");
	
}


</script>
</body>
</html>