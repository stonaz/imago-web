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
require '../parametri.php';
function send_reset_mail( $email,$dbserver,$web_server)
        {
    //$dbConnection = new PDO('postgr:dbname=ebrei;host=localhost;charset=utf8', 'postgres', 'Superman123');
    $pdo = new PDO('pgsql:host='.$dbserver.';dbname=Ebrei', 'postgres', 'Superman123');
    $hash = md5( rand(0,1000) );
    $stmt = $pdo->prepare("INSERT INTO password_resets (email,token) VALUES  (:email,:hash )");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash', $hash);
    $stmt->execute() or die('error on insert');
    $to      = $email; // Send email to our user
    $subject = 'Password reset per imago - beniculturali.it'; // Give the email a subject 
    $message = '
 


 
Clicca sul link sotto per reimpostare la password di accesso:
http://'.$web_server.'/discriminazioni/newpass.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
    $headers = 'From:imago-noreply@beniculturali.it' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}



  if (isset($_POST['email'])) {
  $email = $_POST['email'];
//  echo $email;
  // ensure that the user exists on our system
  $pdo = new PDO('pgsql:host='.$dbserver.';dbname=Ebrei', 'postgres', 'Superman123');
  $stmt = $pdo->prepare("SELECT * from users where email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute() or die('error on select');
  $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
 // $results = mysqli_query($db, $query);
        }
  if (empty($email)) {
    $err_msg = "Inserire email";
  }else if(empty($result) ){
    $err_msg =  "Spiacente, nessuno user associato all'email";
  }
  else{
        $ok_msg = 'Puoi fare il reset della password cliccando sul link che ti è stato spedito per e-mail.';
    send_reset_mail( $email,$dbserver,$web_server);
    
}

         ?>
		<form class="form-signin" method="POST" >
      <h1 class="h3 mb-3 font-weight-normal">Password reset </h1>
   <?PHP
    if(isset($ok_msg)){  // Check if $msg is not empty
        echo '<div class="ok_msg">'.$ok_msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
      
       $email = '';
    }
   if(!empty($err_msg)){  // Check if $msg is not empty
        echo '<div class="error_msg">'.$err_msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    }
    ?>
       <label for="email" class="sr-only">E-mail</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="E-mail"  required >
      
    <button class="btn btn-lg btn-primary btn-block" name="reset-password" type="submit">Invia </button>
    
     
      
    </form>
     </div>
</body>
</html>