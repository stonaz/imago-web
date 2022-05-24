<?PHP
require 'smarty.php';
include 'conn.php';
//echo $_GET['dir'];
//$root_dir=$_GET['dir'];
$busta=$_GET['busta'];
$basedir=$_GET['basedir'];
$image_dir = $root_dir."/".$basedir."/".$busta;
$iip_dir = $iip_dir.$basedir."/".$busta;
//print $image_dir;
$iipfile=$_GET['file'];
 if (is_dir($image_dir))
{
      //  echo "Dir found"."<br>";
        if ($handle = opendir($image_dir))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {
                        if ($file != "." and $file != ".." )
                        {$disegni[] = $file;}
                }
                closedir($handle);
        }
}
      sort($disegni);
    // print_r($disegni);
    $count =count($disegni);
  //  print $count."<br>";
    $key = array_search($iipfile, $disegni);
 //   print $key."<br>";
    if ($key > 0)
    {
	$prec = $disegni[$key - 1];
//	print $prec."<br>";
	$smarty->assign('prec',$prec);
    }
     if ($key < $count -1)
    {
	$succ = $disegni[$key + 1];
//	print $succ."<br>";
	$smarty->assign('succ',$succ);
    }
      $smarty->assign('root_dir',$root_dir);
      $smarty->assign('iip_dir',$iip_dir);
      $smarty->assign('basedir',$basedir);
      $smarty->assign('file',$iipfile);
      $smarty->assign('busta',$busta);
      $smarty->assign('pergamene_rs',$disegni);
      $smarty->assign('server',$server);
	  $smarty->display('sfoglia_fascicolo.tpl');
?>