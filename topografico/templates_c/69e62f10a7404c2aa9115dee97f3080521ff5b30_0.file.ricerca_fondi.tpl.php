<?php
/* Smarty version 3.1.33, created on 2019-03-26 23:40:40
  from 'C:\inetpub\wwwroot\topografico\templates\ricerca_fondi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9a8e48345c78_15650685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69e62f10a7404c2aa9115dee97f3080521ff5b30' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\topografico\\templates\\ricerca_fondi.tpl',
      1 => 1553548797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9a8e48345c78_15650685 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

 <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  </head>

  <body >
    
      <div class="container-fluid">
      
      
       <div class="row">
        

        
   <div class="col">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light "> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="ricerca_collocazioni.php">Ricerca per collocazione </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="ricerca_fondi.php">Ricerca per fondo <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>     
    </ul>
  </div>
</nav>

  </div> <!--Fine menu navigazione-->

 </div><!--Fine header-->
    
<div class="row">
  <div class="col">
 <strong>Ricerca Fondo</strong>
<form class= "form-group"  name ="collocazione_fondi" action="collocazione_fondi.php" >

<select   name="id_fondo" onChange="javascript: document.collocazione_fondi.submit();">
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
 <strong>Ricerca testuale</strong>
<form class= "form-group"  action="fondi.php" >
<input type="text" name="textsearch">
<input type="submit" value="Cerca">
</form>
</div>
  </div>

</div><!--Fine container-->
  </body>
</html><?php }
}
