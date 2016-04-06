<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Get your credits with 'json' answer
$credits_response = get_credits('json');
$credits_json = json_decode($credits_response);
if($credits_json)
{
	if($credits_json->status==='success')
	{
		$user_remaining_credits = $credits_json->data->credits;
		
		echo 'You have ' . $user_remaining_credits . ' remaining credits';		
	}
	else
	{
		echo 'An error occured : ' . $credits_json->message; 
	}
}
else
{
	echo 'An error occured : ' . $credits_response;
}


# Get your credits with 'xml' answer
/*$credits_response = get_credits('xml');
$credits_xml = simplexml_load_string(trim($credits_response), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
if($credits_xml)
{
	if((string)$credits_xml->status==='success')
	{
		$user_remaining_credits = (string)$credits_xml->data->credits;
		
		echo 'You have ' . $user_remaining_credits . ' remaining credits';
	}
	else
	{
		echo 'An error occured : ' . $credits_xml->message; 
	}
}
else
{
	echo 'An error occured : ' . $credits_response;
}*/

?>

</body>
</html>