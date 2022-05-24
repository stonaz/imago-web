<?PHP
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
?>