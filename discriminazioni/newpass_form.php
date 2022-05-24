<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> Password reset</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css" />
<link href="css/signin.css" rel="stylesheet">
</head>
<?PHP
require 'servers.php';         
$pdo = new PDO('pgsql:host='.$db_server.';dbname=Ebrei', 'postgres', 'Superman123');

if (isset($_POST['pwd']) && isset($_POST['pwd_repeat'])  ) {
    if ( $_POST['pwd'] !== $_POST['pwd_repeat'])
    {
        $err_msg = "Le password non sono uguali";
    }
    elseif (strlen($_POST['pwd']) < 8)  
    {
        $err_msg = "La lunghezza minima della password è 8 caratteri";
    }
    else{
        
    
  $new_pass = $_POST['pwd'];
  $new_pass_c = $_POST['pwd_repeat'];
  $hash = $_GET['token'];
  $email = $_GET['email'];
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
        $stmt = $pdo->prepare("UPDATE users set password = crypt(:pwd, gen_salt('bf', 8)) where email = :email ");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pwd', $new_pass);
        $stmt->execute() or die('error on update');
        $stmt = $pdo->prepare("DELETE  FROM password_resets where email = :email AND token =:hash " );
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hash', $hash);
        $stmt->execute() or die('error on delete');
        $ok_msg = "Password modificata";
        
        }
        else
        {
        // No match -> invalid url or token has already been used.
        $err_msg = "token non valido";
    }
  }
}
else
{
    $err_msg = "Inserire la password";
}
?>
<body>
	 <div id="wrap">
        <form class="form-signin" method="POST" >
      <h1 class="h3 mb-3 font-weight-normal">Password reset </h1>
   <?PHP
   if(isset($ok_msg)){  // Check if $msg is not empty
        echo '<div class="ok_msg">'.$ok_msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
       
    }
   if(!empty($err_msg)){  // Check if $msg is not empty
        echo '<div class="error_msg">'.$err_msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    }
    ?>
             <label for="pwd" class="sr-only">Password</label>
      <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password ( 8 caratteri min. )"   required>
          <label for="pwd_repeat" class="sr-only">Conferma Password</label>
      <input type="password" name="pwd_repeat" id="pwd_repeat" class="form-control" placeholder="Conferma Password "   required>
    
    <button class="btn btn-lg btn-primary btn-block" name="reset-password" type="submit">Invia </button>
    
     
      
    </form>
        		
     </div>
</body>
</html>