<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>KillDuplicate API PHP</title>
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

?>

</body>
</html>