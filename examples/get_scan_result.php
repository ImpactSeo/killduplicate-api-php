<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

require_once __DIR__ . '/../api_calls.php';

# Directory where API calls are stored
$results_dir = __DIR__ . '/../results/';


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
	$scan_id = $_GET['scan_id'];
	
	$rawData = get_scan_result($scan_id);
	$rawData = json_decode($rawData);
	$filename = $result_dir . $rawData->id . '.txt';
	$saved = file_put_contents($filename, json_encode($rawData));
	if($saved!==false)
	{
		# Result saved
		error_log('get_scan_result - ' . $filename . ' saved');
	}
	else
	{
		error_log('get_scan_result - error saving ' . $filename . '. Check file/folder permissions.');	
	}

	echo 'Scan details for scan_id : ' . $scan_id . ':<br>';
	echo '<pre>'.json_encode($rawData, JSON_PRETTY_PRINT).'</pre>';

}

?>

</body>
</html>