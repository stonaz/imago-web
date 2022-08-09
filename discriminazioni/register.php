<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> Sign up</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />
<link href="css/signin.css" rel="stylesheet">
</head>
<body>
    <!-- start header div -->
  
    <!-- end header div -->  
     
  
     
       <!-- start wrap div -->
    <div id="wrap">
         
        <!-- start php code -->
<?php
require 'servers.php';
require '../parametri.php';
function send_activation_mail( $email,$pwd,$nome,$cognome,$tel,$db_server,$web_server)
        {
    $msg = 'Il tuo account è stato creato, <br /> Attivalo  cliccando sul link che ti è stato spedito per email.';
    //$dbConnection = new PDO('postgr:dbname=ebrei;host=localhost;charset=utf8', 'postgres', 'Superman123');
    $pdo = new PDO('pgsql:host='.$db_server.';dbname=Ebrei', 'postgres', 'Superman123');
    $hash = md5( rand(0,1000) );
    $stmt = $pdo->prepare("INSERT INTO users (password, email,hash,nome,cognome,tel) VALUES (crypt(:pwd, gen_salt('bf', 8)), :email,:hash,:nome,:cognome,:tel   )");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->bindParam(':hash', $hash);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cognome', $cognome);
    $stmt->bindParam(':tel', $tel);
    $stmt->execute() or die('error on insert');
    $to      = $email; // Send email to our user
    $subject = 'Attivazione account per imago - beniculturali.it'; // Give the email a subject 
    $message = '
 

Account creato, puoi accedere usando le credenziali indicate sotto, dopo averlo attivato cliccando sul link sottostante.
 
------------------------
Username: '.$email.'
Password: '.$pwd.'
------------------------
 
Please click this link to activate your account:
http://'.$web_server.'/discriminazioni/verify.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
    $headers = 'From:imago-noreply@beniculturali.it' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}
 function check_data($email,$tel,$pwd)
 {
     $err_msg='';
     $check = 1;
     if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)){
        $err_msg = 'Email non valida.<br>';
        $check = 0;
        }
     if (!ctype_digit($tel)){
        $err_msg .= 'Numero di telefono non valido.<br>';
        $check = 0;
        }
     if (strlen($pwd) < 8){
        $err_msg .= 'Password troppo corta (8 caratteri min.)';
        $check = 0;
        }
        return $err_msg;
 }
 
 function check_email($email,$dbserver)
 {
        //echo $server;
        $err_msg = '';
        $pdo = new PDO('pgsql:host='.$dbserver.';dbname=Ebrei', 'postgres', 'Superman123');
        $stmt = $pdo->prepare("SELECT * from users where email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute() or die('error on select');
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0)
        {
          $err_msg = 'Email già presente.<br>';
          $check = 0;
        }
        return $err_msg;

 }
 
 
    
    if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['pwd']) && !empty($_POST['pwd']) AND isset($_POST['tel']) && !empty($_POST['tel']))
    {
       
        $pwd = $_POST['pwd']; // Turn our post into a local variable
        $email = $_POST['email']; // Turn our post into a local variable
        $tel = $_POST['tel']; // Turn our post into a local variable
        $nome = $_POST['nome']; // Turn our post into a local variable
        $cognome = $_POST['cognome']; // Turn our post into a local variable
        $err_msg = check_email($email,$dbserver); //Controllo che la mail non sia già presente nel DB
        if ($err_msg == '') //Se il controllo è OK, procedo scon gli altri controlli
        {
         $err_msg = check_data($email,$tel,$pwd);    
         if ($err_msg == '')
         {
          $ok_msg = 'Il tuo account è stato creato, <br /> Attivalo  cliccando sul link che ti è stato spedito per email.';
          send_activation_mail($email,$pwd,$nome,$cognome,$tel,$dbserver,$web_server);
         }  
       }
    }
    else
    {
       $pwd = '';
       $email = '';
       $tel = '';
       $nome = '';
       $cognome = '';
    }
    
             
?>
        <!-- stop php code -->
     
        <!-- title and description -->   
       
       
         <?php 
    if(isset($ok_msg)){  // Check if $msg is not empty
        echo '<div class="ok_msg">'.$ok_msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
        $pwd = '';
       $email = '';
       $tel = '';
       $nome = '';
       $cognome = '';
    }
    if(!empty($err_msg)){  // Check if $msg is not empty
        echo '<div class="error_msg">'.$err_msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    } 
?>
        <!-- start sign up form -->  
       <form class="form-signin" method="POST" >
      <h1 class="h3 mb-3 font-weight-normal">Registrazione </h1>
      <label for="nome" class="sr-only">Nome</label>
      <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome/name" value="<?PHP echo $nome?>" required >
      <label for="cognome" class="sr-only">Cognome</label>
      <input type="text" name="cognome" id="cognome" class="form-control" placeholder="Cognome/surname" value="<?PHP echo $cognome?>" required >
       <label for="tel" class="sr-only">Telefono</label>
       <input type="text" name="tel" id="tel" class="form-control" placeholder="Tel ( solo numeri senza spazi )" value="<?PHP echo $tel?>" required >
       <label for="email" class="sr-only">E-mail</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" value="<?PHP echo $email?>" required >
      <label for="pwd" class="sr-only">Password</label>
      <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password ( 8 caratteri min. )" value="<?PHP echo $pwd?>"  required>
      
    <button class="btn btn-lg btn-primary btn-block" type="submit">Invia dati</button>
     
      
    </form>
        <!-- end sign up form -->
         
    </div>
    <!-- end wrap div -->
</body>
</html>