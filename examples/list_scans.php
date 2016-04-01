<!DOCTYPE html>
<html>
<head>
	<title>KillDuplicate API PHP</title>
	<meta charset="utf-8">
</head>
<body>

<?php

# Directory where API calls are stored
$results_dir = __DIR__ . '/../results/';


# List API calls
$files = scandir($results_dir);
foreach ($files as $file)
{
	if(pathinfo($results_dir.$file, PATHINFO_EXTENSION)==='txt')
	{
		$scan_id = pathinfo($results_dir.$file, PATHINFO_FILENAME);
		echo '<a href="?scan_id='.$scan_id.'">Scan '.$scan_id.'</a><br>';
	}
}

# Display API call details if scan_id is passed as argument in URL 
if(isset($_GET['scan_id']))
{
	$scan_id = $_GET['scan_id'];
	if(file_exists($results_dir.$scan_id))
	{
		$scan_result = file_get_contents($results_dir.$scan_id);
		echo 'Scan details for scan_id : ' . $scan_id . ':<br>';
		echo '<pre>'.$scan_result.'</pre>';
	}
	else
	{
		echo 'File not found for scan_id : ' . $scan_id;
	}
}

?>

</body>
</html>