<?php 
$time = date("G:i:s");
$entry = "Información guardada a las $time.\n";
$file = "/kunden/homepages/16/d380803416/htdocs/crontabs/scripts/test.cron.txt";
$open = fopen($file,"a");
 
if ( $open ) {
	fwrite($open,$entry);
	fclose($open);
}
 ?>