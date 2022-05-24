<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Attivazione account</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <!-- start header div --> 
    <div id="header">
       
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div id="wrap">
        <!-- start PHP code -->
        <?php
         
            $pdo = new PDO('pgsql:host=$dbserver;dbname=Ebrei', 'postgres', 'Superman123');
   
             
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    $stmt = $pdo->prepare("SELECT email, hash, active FROM users where email = :email AND hash=:hash and active = false  ");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash', $hash);
    $stmt->execute() or die('error on select');
    $result = $stmt->fetchAll();
//print_r($result);
   $match  = count($result);
                 
    if($match > 0){
        // We have a match, activate the account
        $stmt = $pdo->prepare("UPDATE users SET active=true  where email = :email AND hash=:hash and active = false  ") ;
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hash', $hash);
        $stmt->execute() or die('error on update');
        echo '<div class="statusmsg">Account attivato. Procedi con il <a href="http://www.imago.archiviodistatoroma.beniculturali.it/discriminazioni/discriminazioni.php"> login </a></div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">URL non valida o account già attivato</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Metodo non vslido</div>';
}

             
        ?>
        <!-- stop PHP Code -->
 
         
    </div>
    <!-- end wrap div --> 
</body>
</html>