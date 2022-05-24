<?php
/* Smarty version 3.1.33, created on 2019-03-15 10:45:29
  from 'C:\inetpub\wwwroot\topografico\templates\ricerca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8b5819203f98_15606026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c27d42b2e62160db3aed5278fb0bb542389228b6' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\topografico\\templates\\ricerca.tpl',
      1 => 1552635884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8b5819203f98_15606026 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_smarty_tpl->tpl_vars['filepath']->value;?>
/css/main.css" />
<div class="searchBox">
 Ricerca Fondi
<form name ="collocazione_fondi" action="collocazione_fondi.php" target="s">

<select name="id_fondo" onChange="javascript: document.collocazione_fondi.submit();document.sel_locale.reset();">
 <option value=""> </option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fondi']->value, 'fondo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fondo']->value) {
?>
    
   <option value="<?php echo $_smarty_tpl->tpl_vars['fondo']->value['IDfondo'];?>
"><?php echo $_smarty_tpl->tpl_vars['fondo']->value['fondo'];?>
</option>
   
   
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    
</select>
</form>

<form action="fondi.php" target="s">
<input type="text" name="textsearch">
<input type="submit" value="Cerca">
</form>
</div>
<div class="searchBox">

 Ricerca Topografica

<form action="ricerca.php" name="sel_locale" >
 <input type="hidden" name="select_ubi" value="ok">
 <select id="collocazione" name="collocazione_sel" onChange="javascript: document.sel_locale.submit();" >
<option value=""> </option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['collocazioni']->value, 'collocazione');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['collocazione']->value) {
?>
    
   <option value="<?php echo $_smarty_tpl->tpl_vars['collocazione']->value['value'];?>
"
    <?php if (isset($_smarty_tpl->tpl_vars['collocazione_sel']->value)) {?>
       <?php if ($_smarty_tpl->tpl_vars['collocazione']->value['value'] == $_smarty_tpl->tpl_vars['collocazione_sel']->value) {?>
  selected
<?php }
}?> 
>
    <?php echo $_smarty_tpl->tpl_vars['collocazione']->value['text'];?>

   </option>
   
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
</select>

</form>
<form action="collocazione.php" name="toposearch" target="s">
     <?php if (isset($_smarty_tpl->tpl_vars['collocazione_sel']->value)) {?>
 <input type="hidden" name="collocazione" value="<?php echo $_smarty_tpl->tpl_vars['collocazione_sel']->value;?>
">
<?php }?>

 <select id="collocazione" name="ubicazione" onChange="javascript: document.toposearch.submit();" >
  <option value=""></option>
<option value="">Non specificata </option>
<?php if ($_smarty_tpl->tpl_vars['ubicazioni']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ubicazioni']->value, 'ubicazione');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ubicazione']->value) {
?>
    
   <option value="<?php echo $_smarty_tpl->tpl_vars['ubicazione']->value['ubicazione'];?>
"><?php echo $_smarty_tpl->tpl_vars['ubicazione']->value['ubicazione'];?>
</option>
     
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
</select>

</form>
</div><?php }
}
