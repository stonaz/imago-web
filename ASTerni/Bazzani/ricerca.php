<?PHP
include "_css/common_db_pg.inc";

if (!isset($_POST['D1'])){$d1=null;}
	else {$d1=$_POST['D1'];}
if (!isset($_POST['D3'])){$d3=null;}
	else {$d3=$_POST['D3'];}
if (!isset($_POST['D5'])){$d5=null;}
	else {$d5=$_POST['D5'];}
if (!isset($_POST['D11'])){$d11=null;}
	else {$d11=$_POST['D11'];}
if (!isset($_POST['D14'])){$d14=null;}
	else {$d14=$_POST['D14'];}
if (!isset($_POST['D15'])){$d15=null;}
	else {$d15=$_POST['D15'];}
if (!isset($_POST['D17'])){$d17=null;}
	else {$d17=$_POST['D17'];}
if (!isset($_POST['D23'])){$d23=null;}
	else {$d23=$_POST['D23'];}

$query="SELECT * FROM disegni WHERE ";
if ($d1!=null) {$query.="UAProgetto='".$d1."' AND  ";}
if ($d3!=null) {$query.="TitoloDisegno ~* '".$d3."' AND  ";}
if ($d5!=null) {$query.="Localita ~* '".$d5."' AND  ";}
if ($d11!=null) {$query.="IDTipologia  ~* '".$d11."' AND  ";}
if ($d14!=null) {$query.="IDTecnica  ~* '".$d14."' AND  ";}
if ($d15!=null) {$query.="IDSupporto ~* '".$d15."' AND  ";}
if ($d17!=null) {$query.="IDCondizione ~* '".$d17."' AND  ";}
if ($d23!=null) {$query.="NCORDA  ~* '".$d23."' AND  ";}

$fine=substr($query,strlen($query)-6,strlen($query));
if ($fine==" AND  ") {$query=substr($query,0,strlen($query)-6);}
if ($fine=="WHERE ") {echo "<font face=\"Arial\" size=\"2\"> <B>Inserire almeno una chiave di ricerca</b></font>";return;}
$link_id=db_connect();
$result=pg_query($link_id,$query);
$num_elem=pg_num_rows($result);
echo "<HTML>";
echo "<base target=\"ricerca\">";
echo "<BODY bgcolor=\"#FFFFFF\">";
echo "<font face=\"Arial\" size=\"1\">";
if ($num_elem==0) {echo "<font face=\"Arial\" size=\"2\"> <B>No item found</b></font>";}
for($i=0;$i<$num_elem;$i++)
{
	echo "<FORM METHOD=\"POST\" ACTION=\"scheda.php?r=".pg_result($result,$i,"CodiceDisegno")."\" target=\"_self\">";
	echo pg_result($result,$i,"UAProgetto");
	echo " - ";
	echo pg_result($result,$i,"TitoloDisegno");
	echo " , ";
	echo pg_result($result,$i,"Localita");
	echo " , ";	
	echo pg_result($result,$i,"IDTipologia");
	echo " , ";
	echo pg_result($result,$i,"IDTecnica");
	echo " , ";
	echo pg_result($result,$i,"IDSupporto");
	echo " , ";
	echo pg_result($result,$i,"IDCondizione");
	echo " , ";
	echo pg_result($result,$i,"NCORDA");	
	echo "<BR><input type=\"submit\"";
	echo " style=\"height:1.6em;color:#FFFFFF;font-weight:bold;cursor:hand;margin:0 4px 1px 0;padding: 0 5px 2px 5px !important;border:1px solid #0000FF;background:#41417d;text-align:center;\" ";
	echo " value=\"Visualizza\" name=\"Submit\">";
	echo "</FORM>";
	echo "<HR>";
}
echo "</FONT>";
db_disconnect();
echo "</HTML>";
?>