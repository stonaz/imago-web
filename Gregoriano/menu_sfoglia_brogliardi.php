<html>
<SCRIPT language="JavaScript" type="text/javascript" src="../common/menu.js"> </script>
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">
<FONT FACE="VERDANA" SIZE="1">

<FONT  SIZE="+1">&nbsp;&nbsp;BROGLIARDO</FONT>
<ul class="flipMenu">
<?PHP
include '../parametri.php';
$cont=0;
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
			$extension=array_pop(explode(".",$file));
			if (in_array(strtoupper($extension),$image_file_array))
				{				
					$ListaFileImm[$cont]=$file;
					$cont++;
						
				}

		}
	}
return($ListaFileImm);
}

$path=$_GET['Path'];
$resource=$root.$path;
//echo $resource;
$fileimm=leggifileimm($resource);
sort($fileimm);
for ($i=0;$i<$cont;$i++)
{
print'<li><A HREF="s_sfoglia_brogliardi.php?dir=';echo $path; print'&r=';echo $fileimm[$i];print'&index=';echo $i; print'" target="s">';echo "#".($i+1);print'</A></li>';
}
?>


</ul>
</FONT>
</body>
</html>