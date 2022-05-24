<?PHP
$stringa="nomefile.jp2";
echo $stringa;
$size=strlen($stringa)-4;
$rest = substr($stringa, 0, $size); 
echo $rest;
?>