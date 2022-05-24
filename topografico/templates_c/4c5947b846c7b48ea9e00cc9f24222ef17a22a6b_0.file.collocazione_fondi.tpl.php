<?php
/* Smarty version 3.1.33, created on 2019-03-29 14:39:57
  from 'C:\inetpub\wwwroot\topografico\templates\collocazione_fondi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9e040dd288e9_98192914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c5947b846c7b48ea9e00cc9f24222ef17a22a6b' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\topografico\\templates\\collocazione_fondi.tpl',
      1 => 1553859586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9e040dd288e9_98192914 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="js/tablescroll.js"><?php echo '</script'; ?>
>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  </head>

 
  <body>
    <div class="container-fluid">
      
      
       <div class="row">
        
        
  <div class="col">

<strong>Nome fondo: </strong><?php echo $_smarty_tpl->tpl_vars['fondo']->value;?>
<br>
<strong>Responsabile: </strong><?php echo $_smarty_tpl->tpl_vars['responsabile']->value;?>
<br>
<strong>Record trovati: </strong><?php echo $_smarty_tpl->tpl_vars['conteggio']->value;?>
<br>

</div>
        
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

  <div class='table-responsive table-cont' id='table-cont'>
   <table class="table">
    <thead>
    <tr>
     <th>Sede</th>
  
        
   <th>Serie</th>
  
        
   <th>Torre</th>
  
        
   <th>Piano</th>
  
        
   <th>Ubicazione</th>
  
        
   <th>Fila/<br>Cassettiera</th>
  
        
   <th>Lato/<br>Cass.</th>
  
        
   <th>Ordine</th>
  
        
   <th>Range</th>

  
  
        
   <th>#corda</th>
  
        
   <th>Note</th>
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
  
  </div> 
    </div><!--Fine riga dati-->
     </div><!--Fine container-->
  </body>

</html>
<?php }
}
