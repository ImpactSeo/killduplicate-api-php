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
$text = file_get_contents(__DIR__ . '/../texts/text-example-1.txt');

# Scan text 'json'
$scan_response = scan_text($text, $format, $result);
echo $scan_response;
$scan_json = json_decode($scan_response);
print_r($scan_json, true);
if($scan_json)
{
	if($scan_json->status==='success')
	{
		$text_id = $scan_json->data->id;
		$text_scan_cost = $scan_json->data->credits;

		echo 'You should store this text id (or API Call Id) <strong>' . $text_id . '</strong> for retrieving it in callback. This scan cost you ' . $text_scan_cost . ' credits. <br>';
		echo '<pre>'.$text.'</pre>';
	}
	else
	{
		echo 'An error occured : ' . $scan_json->message; 
	}
}
else
{
	echo 'An error occured : ' . $scan_response;	
}


# Scan text 'txt'
// $scan = scan_text($text, 'txt');
// $scan = explode("\n", $scan);
// echo 'Scanning this text will cost '.$scan[3].' credits. You have '. $scan[4] . ' remaining credits.';

# Scan text 'xml'
// $scan = scan_text($text, 'xml');
// $scan = simplexml_load_string(trim($scan), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
// echo 'Scanning this text will cost '.(string)$scan->data->credits.' credits. You have '. (string)$scan->data->account . ' remaining credits.';

?>

</body>
</html>