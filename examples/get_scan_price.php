<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Load your text
$text = file_get_contents(__DIR__ . '/../texts/text-example-1.txt');

# Get scan price 'json'
$cost = get_scan_price($text, 'json');
$cost = json_decode($cost);
echo 'Scanning this text will cost '.$cost->data->credits.' credits. You have '. $cost->data->account . ' remaining credits.';

# Get scan price 'txt'
// $cost = get_scan_price($text, 'txt');
// $cost = explode("\n", $cost);
// echo 'Scanning this text will cost '.$cost[3].' credits. You have '. $cost[4] . ' remaining credits.';

# Get scan price 'xml'
// $cost = get_scan_price($text, 'xml');
// $cost = simplexml_load_string(trim($cost), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
// echo 'Scanning this text will cost '.(string)$cost->data->credits.' credits. You have '. (string)$cost->data->account . ' remaining credits.';

?>

</body>
</html>