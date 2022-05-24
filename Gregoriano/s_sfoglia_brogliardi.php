<html>
<BODY  bgcolor="#EEEEEE">
	<center>
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";

if (!isset($_GET['Path'])){$path="";}
	else {$path=$_GET['Path'];}

if (!isset($_GET['dir'])){$dir="01.jp2";}
	else {$dir=$_GET['dir'];}

if (!isset($_GET['r'])){$row="01.jp2";}
	else {$row=$_GET['r'];}

if (!isset($_GET['index'])){$index="0";}
	else {$index=$_GET['index'];}

$resource=$root.$dir;
//echo $resource;
$fileimm=leggifileimm($resource);
sort($fileimm);	

function mostra($row,$dir,$serverIIP,$index,$fileimm)
{
	$file=$row;
	$scansione=$index+1;
	global $catalogo;
	if ($index  > 0)
	{
			print'<A HREF="s_sfoglia_brogliardi.php?dir=';echo $dir; print'&r=';echo $fileimm[$index-1];print'&index=';echo $index-1; print'" >';
			echo "<img src='../images/navigate_left.gif'></A>";

	}
	print "&nbsp;<strong>#$scansione</strong>&nbsp;";
	if ($index +1 < count($fileimm))
	{
	print'<A HREF="s_sfoglia_brogliardi.php?dir=';echo $dir; print'&r=';echo $fileimm[$index+1];print'&index=';echo $index+1; print'" >';
	echo "<img src='../images/navigate_right.gif'></A>";

	}
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
    	echo "<IMG SRC=\"http://".$serverIIP."/iiifserver?FIF=/images/Patrimonio/Archivi/AS_Roma/Imago/".$dir."/".$file."&SDS=0,90&CNT=1.0&WID=1024&QLT=100&CVT=jpeg\">";
	print'</A></CENTER>';
	
}


function leggifileimm($dir)
{
	global $cont;
	global $ListaFileImm;
	$cont=0;
	$image_file_array=array("JP2");
	if (!($dp=opendir($dir)))  {die("Directory inesistente");}
	while ($file=readdir($dp))
	{
	
		if ($file!='.' && $file!="..")
		{
			$file_test = explode(".",$file);
            $extension=array_pop($file_test);
			if (in_array(strtoupper($extension),$image_file_array))
				{				
					$ListaFileImm[$cont]=$file;
					$cont++;
						
				}

		}
	}
return($ListaFileImm);
}
mostra($row,$dir,$serverIIP,$index,$fileimm);

?>

</center>

<script language="Javascript1.2">


function immv(file,dir)
{
	var path = dir + '/' + file ;
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=/AS_Roma/Imago/&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
}


</script>
</body>
</html>