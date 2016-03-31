<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Set your desired return format : json|xml|txt
$format = 'json';
# How do you wish result : short|long
$result = 'long';
# Load your text
$text = file_get_contents(__DIR__ . '/texts/text-example-1.txt');

# Scan text 'json'
$scan = scan_text($text, $format, $result);
$scan = json_decode($scan);
// print_r($scan);
echo 'You should store this text id '.$scan->data->text_id.' for retrieving it in callback. This scan cost you '.$scan->data->cost.' credits. You have '. $scan->data->credits . ' remaining credits.';


# Scan text 'txt'
// $scan = scan_text($text, $format);
// $scan = explode("\n", $scan);
// echo 'Scanning this text will cost '.$scan[3].' credits. You have '. $scan[4] . ' remaining credits.';

# Scan text 'xml'
// $scan = scan_text($text, $format);
// $scan = simplexml_load_string(trim($scan), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
// echo 'Scanning this text will cost '.(string)$scan->data->credits.' credits. You have '. (string)$scan->data->account . ' remaining credits.';

?>

</body>
</html>