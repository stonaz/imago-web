<?PHP
require 'smarty.php';
//require 'conn.php';
$loginMessage="";
// Function that returns the HTML FORM that is 
// used to collect the username and password

function login_page($errorMessage)
{
  $smarty = new Smarty();
  $smarty->assign('loginMessage',$errorMessage);
  
  // Generate the login <form> layout
 $smarty->display('login.tpl');
}

//
// Function that returns HTML page showing that 
// the user with the $currentLoginName is logged on

function logged_on_page($currentLoginName)
{

  // Generate the page that shows the user 
  // is already authenticated and authorized
 //$smarty = new Smarty();
  // Generate the login <form> layout
// $smarty->assign('currentLoginName',$currentLoginName);
 //$smarty->display('logout.tpl');
 header("Location: scheda.php");
}

// Main
session_start( );
//echo $_SERVER['REMOTE_ADDR'];
// Check if we have established a session
if (isset($_SESSION["authenticatedUser"]))
{
  // There is a user logged on
  logged_on_page(
          $_SESSION["authenticatedUser"]);
}
else
{
  // No session established, no POST variables 
  // display the login form + any error message
  if (isset($_SESSION["loginMessage"])){
    login_page($_SESSION["loginMessage"]);
  }
  else
  {
    login_page($loginMessage);
  }
  

  session_destroy( );
}
?>