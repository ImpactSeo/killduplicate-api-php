<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Get your credits 'json'
$credits_response = get_credits('json');
//echo $credits . '<br>';
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

//print_r($credits);
//echo 'You have ' . $credits_response->data->credits . ' remaining credits';

# Get your credits 'txt'
// $credits = get_credits('txt');
// $credits = explode("\n", $credits);
// echo 'You have '.$credits[3].' remaining credits';

# Get your credits 'xml'
// $credits = get_credits('xml');
// $credits = simplexml_load_string(trim($credits), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
// echo 'You have '.(string)$credits->data->credits.' remaining credits';

?>

</body>
</html>