{* Smarty *}

<link rel="stylesheet" type="text/css" href="http://{$filepath}/css/main.css" />
<div class="searchBox">
 Ricerca Fondi
<form name ="collocazione_fondi" action="collocazione_fondi.php" target="s">

<select name="id_fondo" onChange="javascript: document.collocazione_fondi.submit();document.sel_locale.reset();">
 <option value=""> </option>
    {foreach $fondi as $fondo}
    
   <option value="{$fondo['IDfondo']}">{$fondo['fondo']}</option>
   
   
{/foreach}

    
</select>
</form>

<form action="fondi.php" target="s">
<input type="text" name="textsearch">
<input type="submit" value="Cerca">
</form>
</div>
<div class="searchBox">

 Ricerca Topografica

<form action="ricerca.php" name="sel_locale" >
 <input type="hidden" name="select_ubi" value="ok">
 <select id="collocazione" name="collocazione_sel" onChange="javascript: document.sel_locale.submit();" >
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
<form action="collocazione.php" name="toposearch" target="s">
     {if isset($collocazione_sel) }
 <input type="hidden" name="collocazione" value="{$collocazione_sel}">
{/if}

 <select id="collocazione" name="ubicazione" onChange="javascript: document.toposearch.submit();" >
  <option value=""></option>
<option value="">Non specificata </option>
{if $ubicazioni }
    {foreach $ubicazioni as $ubicazione}
    
   <option value="{$ubicazione['ubicazione']}">{$ubicazione['ubicazione']}</option>
     
{/foreach}
{/if}
</select>

</form>
</div>