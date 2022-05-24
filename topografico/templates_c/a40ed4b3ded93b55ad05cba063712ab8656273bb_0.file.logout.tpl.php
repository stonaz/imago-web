<?php
/* Smarty version 3.1.33, created on 2019-03-22 12:41:37
  from 'C:\inetpub\wwwroot\topografico\templates\logout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c94add1bac4c3_60241471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a40ed4b3ded93b55ad05cba063712ab8656273bb' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\topografico\\templates\\logout.tpl',
      1 => 1553247538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c94add1bac4c3_60241471 (Smarty_Internal_Template $_smarty_tpl) {
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
