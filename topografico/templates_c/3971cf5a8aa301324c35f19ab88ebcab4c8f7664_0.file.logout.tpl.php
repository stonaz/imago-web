<?php
/* Smarty version 3.1.46, created on 2022-10-05 09:37:03
  from '/var/www/html/topografico/templates/logout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_633d341f27afa1_78516511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3971cf5a8aa301324c35f19ab88ebcab4c8f7664' => 
    array (
      0 => '/var/www/html/topografico/templates/logout.tpl',
      1 => 1652962834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633d341f27afa1_78516511 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML PUBLIC 
      "-//W3C//DTD HTML 4.0 Transitional//EN"
      "http://www.w3.org/TR/html4/loose.dtd" >
  <html>
  <head><title>Login</title></head>
  <body>
    <h2>Topografico</h2>
    <h2>Accesso effettuato come 
        <?php echo $_smarty_tpl->tpl_vars['currentLoginName']->value;?>
</h2>
    <a href="logout.php">Logout</a>
  </body>
  </html><?php }
}
