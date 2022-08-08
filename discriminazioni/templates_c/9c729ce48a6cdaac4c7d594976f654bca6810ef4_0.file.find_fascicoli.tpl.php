<?php
/* Smarty version 3.1.46, created on 2022-08-08 17:33:06
  from '/var/www/html/discriminazioni/templates/find_fascicoli.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_62f12cb2bda800_91069589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c729ce48a6cdaac4c7d594976f654bca6810ef4' => 
    array (
      0 => '/var/www/html/discriminazioni/templates/find_fascicoli.tpl',
      1 => 1652962843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62f12cb2bda800_91069589 (Smarty_Internal_Template $_smarty_tpl) {
?> 	<html>
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
<input type="text" name="textSearch" id="textSearch" value="<?php echo $_smarty_tpl->tpl_vars['textSearch_form']->value;?>
">
<input id="searchButton" type="submit" value="Cerca" >
</form>
	<button id='azzeraRicerche' onclick="azzeraRicerca();">Azzera ricerca</button>
</div>
<div style="float:right">
<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

    <a href="logout.php"><button type="button" class="btn btn-secondary custom" >Logout</button></a>
</div>
</div>



    <?php if (!empty($_smarty_tpl->tpl_vars['fascicoli']->value)) {?>
	<br>
 <span style="font-size: 16px;"><strong>Fascicoli trovati: <?php echo $_smarty_tpl->tpl_vars['count_fascicoli']->value;?>
</strong>  </span>   
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
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fascicoli']->value, 'f_list');
$_smarty_tpl->tpl_vars['f_list']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['f_list']->value) {
$_smarty_tpl->tpl_vars['f_list']->do_else = false;
?>
    <tr>
     <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['fondo'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['#busta'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['intestazione'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['consistenza'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['descrizione'];?>
</td>
   <td>
				<?php if (!empty($_smarty_tpl->tpl_vars['f_list']->value['bobina_scatto'])) {?>
				<a class="js_link" onclick="fascicolo('<?php echo $_smarty_tpl->tpl_vars['f_list']->value['#busta'];?>
','<?php echo $_smarty_tpl->tpl_vars['f_list']->value['bobina_scatto'];?>
','<?php echo strtoupper($_smarty_tpl->tpl_vars['f_list']->value['fondo']);?>
')">Vai al fascicolo</a>
			<?php }?>
			</td>
   
    
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
    </table>  
    

<?php }
echo '<script'; ?>
>
	
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
	<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
