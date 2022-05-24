<?php
/* Smarty version 3.1.33, created on 2019-03-07 13:50:35
  from 'C:\inetpub\wwwroot\topografico\templates\ricerca_collocazione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c80f77b4a9899_97609447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56e9e14eb8dd2fe243ef129cbfcc6d88871379f4' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\topografico\\templates\\ricerca_collocazione.tpl',
      1 => 1551955702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c80f77b4a9899_97609447 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="http://<?php echo $_smarty_tpl->tpl_vars['filepath']->value;?>
/css/main.css" />
<form action="collocazione.php">


  
<span class='red'>* </span> Sede <select name="sede" >
   <option value=""> </option> 
   <option value="0">Sant'Ivo alla Sapienza</option>
   <option value="1">Galla Placidia</option>

     
</select>



<span class='red'>* </span> Torre <select name="torre" >
<option value=""> </option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['torri']->value, 'torre');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['torre']->value) {
?>
    
   <option value="<?php echo $_smarty_tpl->tpl_vars['torre']->value['Torre'];?>
"><?php echo $_smarty_tpl->tpl_vars['torre']->value['Torre'];?>
</option>
     
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>

<span class='red'>* </span>Piano <select name="piano" >
<option value=""> </option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['piani']->value, 'piano');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['piano']->value) {
?>
    
   <option value="<?php echo $_smarty_tpl->tpl_vars['piano']->value['Piano'];?>
"><?php echo $_smarty_tpl->tpl_vars['piano']->value['Piano'];?>
</option>
     
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
</select>

Ubicazione <select name="ubicazione" >
<option value=""> </option>
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
</select>

<input type="submit" value="Cerca">
</form>
<span class='red'>* = campi obbligatori</span><br><?php }
}
