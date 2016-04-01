<?php

# Wait for killduplicate.com to send scan result
$rawData = file_get_contents("php://input");
$rawData = json_decode($rawData);

error_log('api_callback  - text id : ' . $rawData->id);
error_log('api_callback  - result : ' . print_r($rawData, true));

if($rawData)
{
	# Save results in database or folder
	$filename = __DIR__ . '/../results/' . $rawData->id . '.txt';
	$saved = file_put_contents($filename, $rawData);
	if($saved!==fase)
	{
		# Result saved
		error_log('api_callback - ' . $filename . ' saved');
	}
	else
	{
		error_log('api_callback - error saving ' . $filename . '. Check file/folder permissions.');	
	}
}
else
{
	error_log('api_callback - An error occured');
}
