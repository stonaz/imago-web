<?php
/* Smarty version 3.1.33, created on 2019-03-26 00:20:43
  from 'C:\inetpub\wwwroot\topografico\templates\ricerca_collocazioni.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c99462b106427_64389047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48901b6c37f828d6ad9edc9525124fb4b9237c3a' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\topografico\\templates\\ricerca_collocazioni.tpl',
      1 => 1553548797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c99462b106427_64389047 (Smarty_Internal_Template $_smarty_tpl) {
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
      <li class="nav-item active">
        <a class="nav-link" href="ricerca_collocazioni.php">Ricerca per collocazione <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ricerca_fondi.php">Ricerca per fondo</a>
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

 <strong>Ricerca per collocazione</strong>

<form class= "form-group" action="ricerca_collocazioni.php" name="sel_locale" >
 <input type="hidden" name="select_ubi" value="ok">
 <select class= "form-group" id="collocazione" name="collocazione_sel" onChange="javascript: document.sel_locale.submit();" >
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
<form class= "form-group"  action="collocazione.php" name="toposearch" >
     <?php if (isset($_smarty_tpl->tpl_vars['collocazione_sel']->value)) {?>
 <input type="hidden" name="collocazione" value="<?php echo $_smarty_tpl->tpl_vars['collocazione_sel']->value;?>
">
<?php }?>

 <select class= "form-group"  id="collocazione" name="ubicazione" onChange="javascript: document.toposearch.submit();" >

<?php if ($_smarty_tpl->tpl_vars['ubicazioni']->value) {?>
<option value="">Selezionare un ubicazione</option>
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
</div>
  </div>
 </div><!--Fine container-->


<?php echo '<script'; ?>
>
 function toposearchSubmit()
{
  
 }
<?php echo '</script'; ?>
>
  </body>
 
</html><?php }
}
