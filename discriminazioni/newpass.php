<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> Password reset</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />
<link href="css/signin.css" rel="stylesheet">
</head>
<body>
	 <div id="wrap">	
		
<?PHP
require 'servers.php';


         
$pdo = new PDO('pgsql:host='.$db_server.';dbname=Ebrei', 'postgres', 'Superman123');
   
             
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    $stmt = $pdo->prepare("SELECT email  FROM password_resets where email = :email AND token =:hash ");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash', $hash);
    $stmt->execute() or die('error on select');
    $result = $stmt->fetchAll();
//print_r($result);
   $match  = count($result);
                 
    if($match > 0){
        // We have a match, activate the account
     //   $stmt = $pdo->prepare("UPDATE users SET active=true  where email = :email AND hash=:hash and active = false  ") ;
     //   $stmt->bindParam(':email', $email);
    //    $stmt->bindParam(':hash', $hash);
    //    $stmt->execute() or die('error on update');
        header('location:newpass_form.php?token='.$hash.'&email='.$email);
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">Token non valido</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Richiesta non valida</div>';
}

             
        ?>

        
		
     </div>
</body>
</html>