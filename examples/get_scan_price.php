<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>KillDuplicate API PHP</title>
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

?>

</body>
</html>