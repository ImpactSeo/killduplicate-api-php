<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

require_once __DIR__ . '/config.php';

if(API_KEY==='YOUR_API_KEY')
{
	echo '<span style="color:red;text-align:center">PLEASE SET YOUR API KEY IN config.php</span><br>';
}

if(API_CALLBACK==='YOUR_API_CALLBACK')
{
	echo '<span style="color:red;text-align:center">PLEASE SET YOUR API CALLBACK config.php</span><br>';
}

?>

<a href="examples/get_credits.php">Get your credits</a>
<a href="examples/get_scan_price.php">Get scan price</a>
<a href="examples/scan_text.php">Scan Text</a>


</body>
</html>