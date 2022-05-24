<?php
/* Smarty version 3.1.33, created on 2019-10-01 12:13:47
  from 'C:\inetpub\wwwroot\discriminazioni\templates\scheda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d9318cb0bb213_50408684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d5e8dc94fdabfe3eb6e20c76dc823026fab7b3' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\discriminazioni\\templates\\scheda.tpl',
      1 => 1569921219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d9318cb0bb213_50408684 (Smarty_Internal_Template $_smarty_tpl) {
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
<input type="text" name="textSearch" id="textSearch">
<input id="searchButton" type="submit" value="Cerca" >
</form>
	<button id='azzeraRicerche' onclick="azzeraRicerca();">Azzera ricerca</button>
</div>
<div style="float:right">
<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

    <a href="logout.php"><button type="button" class="btn btn-secondary custom" >Logout</button></a>
</div>
</div>

    <?php if (!empty($_smarty_tpl->tpl_vars['busta']->value)) {?>
      

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['busta']->value, 'b');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
?>
    <table ">
    <thead>
		<th >Fondo</th>
		<th >Serie</th>
    <th >#Busta</th>
    <th >Titolo</th>
     <th >Descrizione fisica</th>
      <th >Descrizione intrinseca</th>
   <th >Estremi cronologici</th>
			 <th >Immagini</th>
    </thead>
    <tbody>
   	 <tr>
		 <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['fondo'];?>
 </td>
		  <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['serie'];?>
 </td>
    <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['#busta'];?>
 </td>
    <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['titolo'];?>
 </td>
    <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['descrizione fisica'];?>
 </td>
    <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['descrizione intrinseca'];?>
 </td>
    <td class ="campoScheda"><?php echo $_smarty_tpl->tpl_vars['b']->value['estremi cronologici'];?>
</td>
	  <td>
					<?php if (!empty($_smarty_tpl->tpl_vars['b']->value['bobina_scatto'])) {?>
				<a  class="js_link"  onclick="fascicolo('<?php echo $_smarty_tpl->tpl_vars['b']->value['#busta'];?>
','<?php echo $_smarty_tpl->tpl_vars['b']->value['bobina_scatto'];?>
','<?php echo strtoupper($_smarty_tpl->tpl_vars['b']->value['fondo']);?>
')">Sfoglia busta</a>
			<?php }?>
			</td>
	 </tr>
		  
  
 </tbody>
    </table>  
    
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

  <?php if (!empty($_smarty_tpl->tpl_vars['fascicoli']->value)) {?>
		<br>
<span style="font-size: 16px;"><strong>Fascicoli</strong>  </span>     

    
    <table ">
    <thead>
    <th >Intestazione</th>
    <th >Consistenza</th>
     <th >Descrizione</th>
	
   <th>Immagini</th>
    </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fascicoli']->value, 'f_list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['f_list']->value) {
?>
    <tr>
    
    
   <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['intestazione'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['consistenza'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['f_list']->value['descrizione'];?>
</td>
    
					<?php if (!empty($_smarty_tpl->tpl_vars['f_list']->value['bobina_scatto'])) {?>
   <td><a class="js_link" onclick="fascicolo('<?php echo $_smarty_tpl->tpl_vars['f_list']->value['#busta'];?>
','<?php echo $_smarty_tpl->tpl_vars['f_list']->value['bobina_scatto'];?>
','<?php echo strtoupper($_smarty_tpl->tpl_vars['f_list']->value['fondo']);?>
')">Vai al fascicolo</a></td>
   <?php }?>
    
    </tr>
<?php
}
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
