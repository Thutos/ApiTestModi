<?php

// Send the headers
header('Content-type: text/html');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');

$msisdn = "Unknown user!";
foreach (getallheaders() as $name => $value) {
    if (strtolower($name) == "user-msisdn"){
		$msisdn = $value;
		//echo "$name: "; 
		//echo $msisdn;
		//echo "<br>";
	}
}

$msisdn = str_replace('tel:+','',$msisdn);		

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<html>';
echo '<body>';
echo 'Dear ' . $msisdn . ', welcome into a test service to check the different possibilities you have to build your service.<br/><br/>';
echo '<a href="ask_name.php">My Service</a><br/>';
echo '<a href="info.html" accesskey="9">more info</a><br/>';
echo '</body>';
echo '</html>';

?>