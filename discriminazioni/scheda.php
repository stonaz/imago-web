<?PHP
require 'conn.php';
require 'smarty.php';
if(isset($_GET['busta']) && !empty($_GET['busta']))
{
    $busta = $_GET['busta'];
    //Correzione per buste questura senza 0
   
    
}
if(isset($_GET['serie']) )
{
    $serie = $_GET['serie'];
}
if(isset($_GET['fondo']) && !empty($_GET['fondo']))
{
    $fondo = $_GET['fondo'];
}
//echo $busta;
//echo $serie;
$user = $_SESSION["authenticatedUser"] ;
$stmt = $pdo->prepare("SELECT s.serie ,b.* FROM buste b ,serie s
                        where s.\"#serie\" = b.\"#serie\"
                        AND b.\"#busta\" = :busta
                        AND b.\"fondo\" = :fondo AND b.\"#serie\" = :serie");
$stmt->bindParam(':busta', $busta);
$stmt->bindParam(':fondo', $fondo);
$stmt->bindParam(':serie', $serie);
$stmt->execute() or die('error on select');
$result_busta = $stmt->fetchAll();
//print_r($result_busta);
$stmt = $pdo->prepare("SELECT * FROM fascicoli where \"#busta\" = :busta ");
$stmt->bindParam(':busta', $busta);
$stmt->execute() or die('error on select');
$result_fascicoli = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//print_r($result_fascicoli);
$smarty->assign('busta',$result_busta);
$smarty->assign('user',$user);
$smarty->assign('fascicoli',$result_fascicoli);
$smarty->display('scheda.tpl');

?>