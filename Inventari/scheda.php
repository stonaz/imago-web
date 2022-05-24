<html>
<head>
<link href="css/style_scheda.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
include '../parametri.php';
include 'conn.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['r'])){$row="001  ";}
	else { $row=pg_escape_string($_GET['r']);}


function mostra($row,$dbserver,$serverIIP,$dbconn)
{
    
//print $row."<br>";
$key= explode (" ",$row);
;
//print ($key[0]);
$numero =  $key[0];
//print "$numero<br>";
//$bis =  $key[1];
$bis = isset($key[1]) ? $key[1] : '';
//print ($bis);
print'
	 <table width="100%" align="center">
	<tr> 
   	 <td valign="top" width="60%" rowspan="2" align="center">
'; 	

	$query = "SELECT * from webview  where \"numero\"='".$numero."'";
    if ($bis)
    {$query .=" AND  \"bis\"='".$bis."'";}
    else
    {$query .=" AND  \"bis\"=' '";}
//	echo $query;
	$result=pg_query($dbconn,$query);

 while ($info=pg_fetch_array($result))
	{
   // print_r($info);
	//global $catalogo;
    
	/*$dir=$info[20];
	$dir=substr($dir,6,strlen($dir));
	//$dir="pre/".$dir;
	$dir=strtolower(str_replace("\\","/",$dir));
echo "DIR: ".$dir;*/
    
	
    if ($bis)
    {$numero = $numero.".".$bis;}
    $file=$numero."/001.jp2";
    $pdffile=$numero.".pdf";
print '	
    	  <table border="1" bgcolor="#ffffff" cellspacing="0" width="90%">
        

	<tr>
        <td class="intestazione"> Fondo</td>
          <td class="dati"> &nbsp;'; echo  $info['fondo']; print'</td>

        </tr>
         <tr> 
          <td class="intestazione">Inventario</td>
          <td class="dati">&nbsp;'; echo  $info[1]; print ' ';echo  $info[2];
															
										
										
										
										
										print'</td>
        </tr>       
<tr> 
          <td class="intestazione">
Autori</td>
          <td class="dati">&nbsp;'; echo  $info[3]; print'</td>
        </tr>
<tr> 
          <td class="intestazione">
 Denominazione</td>
          <td class="dati">&nbsp;'; echo  $info[4]; print'</td>
        </tr>

        <tr> 
          <td class="intestazione">Natura</td>
          <td class="dati" >&nbsp;'; echo  $info[5]; print'</td>
        </tr>
        <tr> 
          <td class="intestazione">Osservazioni</td>
          <td class="dati">

         &nbsp;'; echo  $info['osservazioni']; print'</td>
        </tr>

       
        <tr> 
          <td class="intestazione">';

		print 'Consultazione</td>
          <td class="dati">&nbsp;';
        if ($info['JPEG2000'])
       {
		echo "<A  target=\"_new\" HREF=\"sfoglia_brogliardi.php?Path=Inventari/".$numero."&r1=".$file."\">";
		echo "On line <IMG SRC=\"../images/book.png\" BORDER=\"0\"></A>&nbsp;";
        }
        if ($info['PDF'])
        {
        echo "<A HREF=\"pdf/".$pdffile."\">";
        echo "Download PDF <IMG SRC=\"img/pdf.png\" width=15 height=16 BORDER=\"0\"></A>";
        }
         if ($info['IMAGO'])
        {
        $imago_name=$info['Imago_name'];
        echo "<A target=\"_new\" HREF='$imago_name'>";
        echo "IMAGO";
        }
         if ($info['XDAMS'])
        {
        $xdams_name=$info['XDAMS_name'];
        echo "&nbsp;<A target=\"_new\" HREF='$xdams_name'>";
        echo "XDAMS";
        }

	print'</td>
        </tr>
        
	</table> 

	';
	}
	
print'</td>
        </tr>
        
	</table> 

	';
	
}
mostra($row,$dbserver,$serverIIP,$dbconn);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=/AS_Roma/Imago/&fi]]le=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
}

</script>
</body>
</html>