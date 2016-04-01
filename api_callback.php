<?php

# Wait for killduplicate.com to send scan result
$rawData = file_get_contents("php://input");
$rawData = json_decode($rawData);

error_log('api_callback  - text id : ' . $rawData->id);
error_log('api_callback  - result : ' . print_r($rawData, true));

$result_dir = __DIR__ . '/results/';

if($rawData)
{
	# Create results directory if missing
	if(!is_dir($result_dir))
	{
		mkdir($result_dir, 0777);
	}

	# Test directory is writable
	if(is_writable($result_dir))
	{
		# Save results in database or folder
		$filename = $result_dir . $rawData->id . '.txt';
		$saved = file_put_contents($filename, $rawData);
		if($saved!==false)
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
		error_log('api_callback - Make directory ' . $result_dir . ' writable !');
	}
}
else
{
	error_log('api_callback - An error occured');
}
