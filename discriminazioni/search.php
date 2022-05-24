<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Archivio di Stato de L'Aquila </title>
<meta name="keywords" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<meta name="description" content="Archivio di Stato di Roma, State Archive of Rome, Stato Pontificio, Papal States" />
<link href="css/style_icrcpal2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>


 
 <link href="css/main.css" rel="stylesheet" type="text/css" />
 
</head>
<?php
   // include 'conn.php';
 //  require 'check_auth.php';
   session_start( );
?>

<body style="background-color: white;">
<form id="listaSedi" style="display:inline;" action='find_registri.php' target='s'>
<div class="ricerca">
<strong>Ricerca nomi/cognomi: </strong>
<input type="text" name="textsearch" id="textSearch">
<input id="searchButton" type="submit" value="Cerca" >
</div>
<div style="float:right">
 <?PHP  echo $_SESSION["authenticatedUser"] ?>
    <a href="logout.php"><button type="button" class="btn btn-secondary custom" >Logout</button></a>
</div>
</form>