<?php
/* Smarty version 3.1.33, created on 2019-03-10 20:25:48
  from '/var/www/html/topografico/templates/collocazione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8564bcb40250_88346524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0369cde89d81d676dc736b1f8d084df89507ed1' => 
    array (
      0 => '/var/www/html/topografico/templates/collocazione.tpl',
      1 => 1552245933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8564bcb40250_88346524 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

  <head>
    <link data-require="bootstrap@*" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <?php echo '<script'; ?>
 src="js/tablescroll.js"><?php echo '</script'; ?>
>
  </head>

  <body>

  <div class='table-cont' id='table-cont'>
   <table class="table ">
    <thead>
    <tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields']->value, 'field_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->value) {
?>
    
   <th><?php echo $_smarty_tpl->tpl_vars['field_name']->value;?>
</th>
  
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['collocazione_rs']->value, 'collocazione');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['collocazione']->value) {
?>
    <tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['collocazione']->value, 'collocazione_record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['collocazione_record']->value) {
?>
    
   <td><?php echo $_smarty_tpl->tpl_vars['collocazione_record']->value;?>
</td>
   
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
    </table>
  </div>
  </body>

</html>
<?php }
}
