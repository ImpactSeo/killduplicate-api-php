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
	echo '<span style="color:red;text-align:center">PLEASE SET YOUR API CALLBACK IN config.php</span><br>';
}

$result_dir = __DIR__ . '/results/';
if(!is_dir($result_dir) || !is_writable($result_dir))
{
	echo '<span style="color:red;text-align:center">PLEASE SET results DIRECTORY WRITE PERMISSIONS</span><br>';}

?>

<h2>Simple examples (dive into code to integrate into your own service)</h2>
<a href="examples/get_credits.php">Get your credits</a><br>
<a href="examples/get_scan_price.php">Get scan price</a><br>
<a href="examples/scan_text.php">Scan Text</a> (put your texts in texts folder)<br>
<a href="examples/list_scans.php">List Scans</a><br>
<a href="examples/get_scan_result.php">Get scan result</a><br>

<h2>API Web interface</h2>
Login to your <a href="https://www.killduplicate.com/en/login-email" target="_blank">killduplicate account</a> and simply drag and drop files to scan (supported extensions are pdf, doc, docx, txt).

</body>
</html>