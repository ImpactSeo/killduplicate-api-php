<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>KillDuplicate API PHP</title>
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Set your desired return format : json|xml
$format = 'json';
# How do you wish result : short|long
$result = 'long';
# Directory where texts to scan are stored
$texts_dir = __DIR__ . '/../texts/';
# Set a list of excluded domains from duplicate search 
$exclude_domains = ['www.free.fr', 'data.gouv.fr'];

# Load your texts
$texts = scandir($texts_dir);
foreach ($texts as $text)
{
	if(pathinfo($texts_dir.$text, PATHINFO_EXTENSION)==='txt')
	{
		//$scan_id = pathinfo($results_dir.$file, PATHINFO_FILENAME);
		$text = file_get_contents($texts_dir.$text);

		# Scan text with 'json' answer
		$scan_response = scan_text($text, $format, $result, $exclude_domains);
		$scan_json = json_decode($scan_response);
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
	}
}


?>

</body>
</html>