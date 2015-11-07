<?php

// Send the headers
header('Content-type: text/html');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');

$name="Houston, we'got a problem!";
if (isset($_GET["response"])){
	$name = $_GET["response"];
}

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<html>';
echo '<head>';
echo '  <meta name="nav" content="end"/>';
echo '</head>';
echo '<body>';
echo 'Your name is<br/><br/>';
echo $name;
echo '<br/><br/>and the service has ended...';
echo '</body>';
echo '</html>';

?>