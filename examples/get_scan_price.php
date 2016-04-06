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

# Get scan price with 'json' answer
$cost_response = get_scan_price($text, 'json');
$cost_json = json_decode($cost_response);
if($cost_json)
{
	if($cost_json->status==='success')
	{
		$text_scan_cost = $cost_json->data->credits;
		$user_remaining_credits = $cost_json->data->account;

		echo 'Scanning this text will cost ' . $text_scan_cost . ' credits. You have '. $user_remaining_credits . ' remaining credits.<br>';
		echo '<pre>'.$text.'</pre>';
	}
	else
	{
		echo 'An error occured : ' . $cost_json->message; 
	}
}
else
{
	echo 'An error occured : ' . $cost_response;	
}


# Get scan price with 'xml' answer
/*$cost_response = get_scan_price($text, 'xml');
$cost_xml = simplexml_load_string(trim($cost_response), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
if($cost_xml)
{
	if((string)$cost_xml->status==='success')
	{
		$text_scan_cost = (string)$cost_xml->data->credits;
		$user_remaining_credits = (string)$cost_xml->data->account;

		echo 'Scanning this text will cost ' . $text_scan_cost . ' credits. You have '. $user_remaining_credits . ' remaining credits.<br>';
		echo '<pre>'.$text.'</pre>';
	}
	else
	{
		echo 'An error occured : ' . $cost_xml->message; 
	}
}
else
{
	echo 'An error occured : ' . $cost_response;	
}*/
?>

</body>
</html>