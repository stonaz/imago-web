 	<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato de L'Aquila </title>
<meta name="keywords" content="Archivio di Stato de L'Aquila, Aquila, Catasti,Catasti antichi" />
<meta name="description" content="Archivio di Stato de L'Aquila, Aquila, Catasti,Catasti antichi" />
<link href="css/style_icrcpal2.css" rel="stylesheet" type="text/css" />
 <link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="ricerca">
		<div style="float:left">
 <form id="listaSedi" style="display:inline;" action='find_registri.php' target='s'>

<strong>Ricerca nomi/cognomi: </strong>
<input type="text" name="textSearch" id="textSearch" value="{$textSearch_form}">
<input id="searchButton" type="submit" value="Cerca" >
</form>
	<button id='azzeraRicerche' onclick="azzeraRicerca();">Azzera ricerca</button>
</div>
<div style="float:right">
{$user}
    <a href="logout.php"><button type="button" class="btn btn-secondary custom" >Logout</button></a>
</div>
</div>



    {if !empty($fascicoli) }
	<br>
 <span style="font-size: 16px;"><strong>Fascicoli trovati: {$count_fascicoli}</strong>  </span>   
<br>
    
    <table >
    <thead>
		<th >Fondo</th>
		<th >Busta</th>
    <th >Intestazione</th>
    <th >Consistenza</th>
     <th >Descrizione</th>
	  <th >Immagini</th>
  
    </thead>
  <tbody>
    {foreach $fascicoli as $f_list}
    <tr>
     <td>{$f_list['fondo']}</td>
     <td>{$f_list['#busta']}</td>
   <td>{$f_list['intestazione']}</td>
   <td>{$f_list['consistenza']}</td>
   <td>{$f_list['descrizione']}</td>
   <td>
				{if !empty($f_list['bobina_scatto'])}
				<a class="js_link" onclick="fascicolo('{$f_list['#busta']}','{$f_list['bobina_scatto']}','{$f_list['fondo']|strtoupper}')">Vai al fascicolo</a>
			{/if}
			</td>
   
    
    </tr>
{/foreach}
</tbody>
    </table>  
    

{/if}
<script>
	
		function azzeraRicerca()
	{
		var textSearch = document.getElementById("textSearch");
		textSearch.value="";
	}
	
 	function fascicolo(dir,file,iip_dir)
{
	console.log('apri fascicolo');
	if (dir.length == 1)
	{
		dir = '0' + dir;
	}
	url= "sfoglia_fascicolo.php?busta=" +dir + "&basedir=" + iip_dir + "&file=" + file + ".jp2"  ;
	window.open(url,'busta', "height=700,width=900,status=yes,toolbar=no,menubar=no,location=no");
	}
	
	function immv(file,basedir,iip_dir)
{
	url= "iipimage.php?file="+ file + ".jp2&basedir=" + basedir + "&busta=0" + iip_dir;
	window.open(url,'fascicolo', "height=700,width=900,status=yes,toolbar=no,menubar=no,location=no");
	
}
	</script>
</body>
</html>
