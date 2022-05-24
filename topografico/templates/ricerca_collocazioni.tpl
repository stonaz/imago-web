<!DOCTYPE html>
<html>

  <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    {foreach $collocazioni as $collocazione}
    
   <option value="{$collocazione['value']}"
    {if isset($collocazione_sel) }
       {if $collocazione['value'] == $collocazione_sel}
  selected
{/if}
{/if} 
>
    {$collocazione['text']}
   </option>
   
{/foreach}   
</select>

</form>
<form class= "form-group"  action="collocazione.php" name="toposearch" >
     {if isset($collocazione_sel) }
 <input type="hidden" name="collocazione" value="{$collocazione_sel}">
{/if}

 <select class= "form-group"  id="collocazione" name="ubicazione" onChange="javascript: document.toposearch.submit();" >

{if $ubicazioni }
<option value="">Selezionare un ubicazione</option>
    {foreach $ubicazioni as $ubicazione}
    
   <option value="{$ubicazione['ubicazione']}">{$ubicazione['ubicazione']}</option>
     
{/foreach}
{/if}
</select>

</form>
</div>
  </div>
 </div><!--Fine container-->


<script>
 function toposearchSubmit()
{
  
 }
</script>
  </body>
 
</html>