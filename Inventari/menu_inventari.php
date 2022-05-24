<head>
<link href="css/lista.css" rel="stylesheet" type="text/css" />
</head>
<base target="menu">
<body bgcolor="#FFFFFF" link="#222222" vlink="#000000" alink="#000000">


<script id="templateSegnatura" type="text/template">

  <div id="accordion">
  <a class="opening" href="#" ><strong><%= numero %> </strong> <%= denominazione %></a>
 <div class="expanded">
<% _.each(bis, function(scheda) { %>

<li class="linkScheda"> <strong><A HREF="scheda.php?r=<%= numero %> <%= scheda.bis %>" target="s"><%= numero %> <%= scheda.bis %></a></strong>
<% if (scheda.OK === 't') { %>
    OK <img src='img/ok.png' width='16px' height='16px'>
<% } %>
<% if (scheda.OK === 'f') { %>
    OLD <img src='img/ko.png' width='16px' height='16px'>
<% } %>
<span class="denominazione">
<br><%= scheda.denominazione %></span>

</li> <% }); %>
</div> 
 
</div>
</script>

<script id="templateSegnatureTrovate" type="text/template">
 <div class="risultatiRicerca">
  Inventari trovati : <span class="count"><%= count %></span>
  <% _.each(segnature, function(segnatura)
            { %>  <li class="linkScheda"><strong><A HREF="scheda.php?r=<%= segnatura.numero %> <%= segnatura.bis %>" target="s"><%= segnatura.numero %> <%= segnatura.bis %></a></strong>
 <% if (segnatura.OK === 't') { %>
    OK <img src='img/ok.png' width='16px' height='16px'>
<% } %>
<% if (segnatura.OK === 'f') { %>
    OLD <img src='img/ko.png' width='16px' height='16px'>
<% } %>
	           <span class="denominazione">
<br><%= segnatura.DENOMINAZIONE %>

</span>
            </li> <% }); %>
</div>

</script>
<div class="menuRicerca">
<strong>ELENCO INVENTARI</strong><br>
Ricerca testuale: 
<br>
           <input type="text" class="inputRicercaTesto" id="RicercaTesto"> OR <input type="text" class="inputRicercaTesto" id="RicercaTesto2">
           <button id="ButtonRicercaTesto">Cerca</button>
           <button id ="azzeraRicerche">Azzera ricerche</button>
<br>
</div>
 <div id="listaPrincipale"></div>
 <div id="LoadingLista" ><img src='img/ajax-loader.gif'><br>Caricamento dati....  </div>
</body>
  <script src="js/vendor/jquery-1.10.1.min.js"></script>
	<script src="js/vendor/underscore.js"></script>
	<script src="js/vendor/jquery-ui-1.10.3.custom.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
         
$( document ).ready(function() {

initialize();

});
	 
	</script>
</html>