<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>KillDuplicate API PHP</title>
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Directory where API calls are stored
$results_dir = __DIR__ . '/../results/';

# Display API call details if scan_id is passed as argument in URL 
if(isset($_GET['scan_id']))
{
	$scan_id = $_GET['scan_id'];
	
	$rawData = get_scan_result($scan_id);
	// error_log('rawData : ' . $rawData);
	if(!empty($rawData))
	{
		if(false!==$rawData = json_decode($rawData))
		{
			if(isset($rawData->data) && isset($rawData->data->id))
			{
				$filename = $result_dir . $rawData->data->id . '.txt';
				if(false!==$saved = file_put_contents($filename, json_encode($rawData->data)))
				{
					# Result saved
					error_log('get_scan_result - ' . $filename . ' saved');
				}
				else
				{
					echo 'get_scan_result - error saving ' . $filename . '. Check file/folder permissions.';	
				}
			}
			else
			{
				echo 'Missing response data ! ' . $rawData . '<br>';
			}
		}
		else
		{
			echo 'Error decoding JSON : ' . $rawData . '<br>';
		}
	}
	else
	{
		echo 'API Call response : ' . $rawData . '<br>';
	}
	
	echo '<hr>';

}


# List API calls
$files = scandir($results_dir);
echo '<table>';
foreach ($files as $file)
{
	if(pathinfo($results_dir.$file, PATHINFO_EXTENSION)==='txt')
	{
		$scan_id = pathinfo($results_dir.$file, PATHINFO_FILENAME);
		
		$result = file_get_contents($results_dir.$file);
		$result = json_decode($result);
		if($result)
		{
			echo '<tr>';		
			echo '<td>' . $result->resume . '</td>';
			echo '<td><a href="?scan_id='.$scan_id.'">Scan '.$scan_id.'</a></td>';
			echo '<td>' . ($result->duplicate==1 ? ' is duplicated' : ' is not duplicated') . '</td>';
			echo '</tr>';
		}
		else
		{
			echo '<tr>';		
			echo '<td colspan="3">Error reading/decoding' . $results_dir.$file . '</td>';
			echo '</tr>';
		}
	}
}
echo '</table>';

echo '<hr>';

# Display API call details if scan_id is passed as argument in URL 
if(isset($_GET['scan_id']))
{

	echo 'Scan details for scan_id : ' . $scan_id . ':<br>';
	echo '<pre>'.json_encode($rawData->data, JSON_PRETTY_PRINT).'</pre>';

}

?>

</body>
</html>