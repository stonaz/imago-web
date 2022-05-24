<?PHP
require 'conn.php';
require 'smarty.php';
if(isset($_GET['textSearch']) && !empty($_GET['textSearch']))
{
    $textSearch = $_GET['textSearch'];
}
$textSearch_form = "$textSearch";
$textSearch = "%$textSearch%";
//echo $textsearch;
//echo $busta;
//echo $serie;

$stmt = $pdo->prepare("SELECT * FROM fascicoli where \"descrizione\" ilike :textsearch OR  \"intestazione\" ilike :textsearch");
$stmt->bindParam(':textsearch', $textSearch);
$stmt->execute() or die('error on select');
$result_fascicoli = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$count_fascicoli = count($result_fascicoli);
//print_r($result_fascicoli);
$user = $_SESSION["authenticatedUser"] ;
$smarty->assign('user',$user);
$smarty->assign('textSearch_form',$textSearch_form);
$smarty->assign('fascicoli',$result_fascicoli);
$smarty->assign('count_fascicoli',$count_fascicoli);
$smarty->display('find_fascicoli.tpl');

?>