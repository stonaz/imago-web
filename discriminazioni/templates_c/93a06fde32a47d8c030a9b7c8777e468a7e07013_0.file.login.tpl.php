<?php
/* Smarty version 3.1.46, created on 2022-08-08 17:09:59
  from '/var/www/html/discriminazioni/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_62f12747ce4945_38711921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93a06fde32a47d8c030a9b7c8777e468a7e07013' => 
    array (
      0 => '/var/www/html/discriminazioni/templates/login.tpl',
      1 => 1652962843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62f12747ce4945_38711921 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivio di Stato di Roma - Topografico</title>

  <link href="css/style.css" type="text/css" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div id='wrap'>
   
    <form  method="POST" action="auth.php">
      <h1 class="h3 mb-3 font-weight-normal">Login </h1>
       <label for="formUsername" class="sr-only">Username</label>
      <input type="text" name="formUsername" id="formUsername" class="form-control" placeholder="Username" required >
      <label for="formPassword" class="sr-only">Password</label>
      <input type="password" name="formPassword" id="formPassword" class="form-control" placeholder="Password" required>
      
    <button class="btn btn-lg btn-primary btn-block" type="submit">Accedi</button>
     <?php echo $_smarty_tpl->tpl_vars['loginMessage']->value;?>

       
        <br>  <a href="password_reset.php" style="color:red">Password dimenticata ?</a>

     
    <br>  <a href="register.php">Clicca per effettuare la registrazione</a>
    </form>
   
   </div> 

  </body>
</html><?php }
}
