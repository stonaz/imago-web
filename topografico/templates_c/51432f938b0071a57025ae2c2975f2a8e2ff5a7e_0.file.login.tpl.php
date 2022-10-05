<?php
/* Smarty version 3.1.46, created on 2022-10-04 14:31:25
  from '/var/www/html/topografico/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_633c279d5ebd13_73615510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51432f938b0071a57025ae2c2975f2a8e2ff5a7e' => 
    array (
      0 => '/var/www/html/topografico/templates/login.tpl',
      1 => 1652962834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633c279d5ebd13_73615510 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivio di Stato di Roma - Topografico</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
   
    <form class="form-signin" method="POST" action="auth.php">
      <h1 class="h3 mb-3 font-weight-normal">Login </h1>
       <label for="formUsername" class="sr-only">Username</label>
      <input type="text" name="formUsername" id="formUsername" class="form-control" placeholder="Username" required autofocus>
      <label for="formPassword" class="sr-only">Password</label>
      <input type="password" name="formPassword" id="formPassword" class="form-control" placeholder="Password" required>
      
    <button class="btn btn-lg btn-primary btn-block" type="submit">Accedi</button>
     <?php echo $_smarty_tpl->tpl_vars['loginMessage']->value;?>

    </form>
    

  </body>
</html><?php }
}
