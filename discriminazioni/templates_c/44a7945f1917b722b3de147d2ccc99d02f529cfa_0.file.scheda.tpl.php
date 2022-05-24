<?php
/* Smarty version 3.1.33, created on 2019-09-19 18:28:05
  from '/var/www/html/imago/discriminazioni/templates/scheda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d83ac95343fb5_64396373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44a7945f1917b722b3de147d2ccc99d02f529cfa' => 
    array (
      0 => '/var/www/html/imago/discriminazioni/templates/scheda.tpl',
      1 => 1568910482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d83ac95343fb5_64396373 (Smarty_Internal_Template $_smarty_tpl) {
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
 
    <?php if (!empty($_smarty_tpl->tpl_vars['busta']->value)) {?>
 <strong>Dati busta </strong>     

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['busta']->value, 'b');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
?>
    <table ">
    <thead>
    <th >N. busta</th>
    <th >Titolo</th>
     <th >Descrizione fisica</th>
      <th >Descrizione intrinseca</th>
   <th >Estremi cronologici</th>
    </thead>
    <tbody>
   	 <tr> 
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
	  </tr>
		  
  
 </tbody>
    </table>  
    
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

  <?php if (!empty($_smarty_tpl->tpl_vars['fascicoli']->value)) {?>
 <strong>Fascicoli</strong>     

    
    <table ">
    <thead>
    <th >Intestazione</th>
    <th >Consistenza</th>
     <th >Descrizione</th>
   
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
   
    
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
    </table>  
    

<?php }?>
</body>
</html>
<?php }
}
