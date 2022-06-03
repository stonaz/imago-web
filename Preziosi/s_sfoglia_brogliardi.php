<html>
<BODY  bgcolor="#EEEEEE">
	<center>
<?PHP
include '../parametri.php';
$host=$server;
$catalogo="Imago";


if (!isset($_GET['Path'])){$dir="pre/PRE004/confraternita_ss._Annunziata/920_libro_delle_piante_di_tutte_le_case/";}
	else {$dir=$_GET['Path'];}


if (!isset($_GET['r1'])){$row="000volume.jp2";}
	else {$row=$_GET['r1'];}
	
if (!isset($_GET['index'])){$index="0";}
	else {$index=$_GET['index'];}

$resource=$root.$dir;
echo $resource;
$fileimm=leggifileimm($resource);
sort($fileimm);	

function mostra($row,$dir,$dbserver,$serverIIP,$index,$fileimm,$root,$sfoglia_root)
{
	$file=$row;
	$scansione=$index+1;
	global $catalogo;
	if ($index  > 0)
	{
			print'<A HREF="s_sfoglia_brogliardi.php?Path=';echo $dir; print'&r1=';echo $fileimm[$index-1];print'&index=';echo $index-1; print'" >';
			echo "<img src='../images/navigate_left.gif'></A>";

	}
	$size=strlen($fileimm[$index])-4;
    $pagina = substr($fileimm[$index], 0, $size);
	print "&nbsp;<strong>$pagina</strong>&nbsp;";
	if ($index +1 < count($fileimm))
	{
	print'<A HREF="s_sfoglia_brogliardi.php?Path=';echo $dir; print'&r1=';echo $fileimm[$index+1];print'&index=';echo $index+1; print'" >';
	echo "<img src='../images/navigate_right.gif'></A>";

	}
	echo "<CENTER><A  onMouseOver=\"this.style.cursor='pointer'\" onMouseOut=\"this.style.cursor='text'\" onClick=\"javascript:immv('";
	echo $file."','".$dir."')\" BORDER=0>";
	echo "<IMG SRC=\"http://".$serverIIP."/iipsrv/iipsrv.fcgi?FIF=".$root.$dir."/".$file."&SDS=0,90&CNT=1.0&WID=512&QLT=100&CVT=jpeg\">";
	//echo "<IMG SRC=\"http://".$host."/lizardtech/iserv/getthumb?cat=".$catalogo."&item=".$dir."\\".$file."&thumbspec=bigger\">";
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

mostra($row,$dir,$dbserver,$serverIIP,$index,$fileimm,$root,$sfoglia_root);

?>

</center>

<script language="Javascript1.2">

function immv(file,dir)
{
	//console.log('iipstart');
	var path = dir + '/' + file ;
	//url_inizio="http://<?PHP echo $serverIIP; ?>:9001/StyleServer/calcrgn?browser=win_ie&cat=Imago&style=default/view.xsl&wid=400&hei=300&browser=win_ie&plugin=false&item=";
	//url_fine="&wid=400&hei=300&style=default/view.xsl&plugin=false";
	url="http://<?PHP echo $serverIIP ?>/iip_viewer/<?PHP echo $viewer ?>?dir=&file=" +path ;
	window.open(url,null, "height=400,width=600,status=yes,toolbar=no,menubar=no,location=no");
	
}


</script>
</body>
</html>