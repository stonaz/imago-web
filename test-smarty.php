<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// *nix style (note capital 'S')
//require_once('/usr/local/lib/Smarty-v.e.r/libs/Smarty.class.php');

// windows style
require_once('c:/smarty-3.1.33/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir('c:/inetpub/wwwroot/templates_smarty/templates/');
$smarty->setCompileDir('c:/inetpub/wwwroot/templates_smarty/templates_c/');
$smarty->setConfigDir('c:/inetpub/wwwroot/templates_smarty/configs/');
$smarty->setCacheDir('c:/inetpub/wwwroot/templates_smarty/cache/');
//echo "test";
$smarty->testInstall();
$smarty->assign('name','Ned');

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

$smarty->display('index.tpl');
?>