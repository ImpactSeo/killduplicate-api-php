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
$credits = get_credits($format);
$credits = json_decode($credits);
echo 'You have ' . $credits->data->credits . ' remaining credits';

# Get your credits 'txt'
// $credits = get_credits($format);
// $credits = explode("\n", $credits);
// echo 'You have '.$credits[3].' remaining credits';

# Get your credits 'xml'
// $credits = get_credits($format);
// $credits = simplexml_load_string(trim($credits), "SimpleXMLElement", LIBXML_NOEMPTYTAG);
// echo 'You have '.(string)$credits->data->credits.' remaining credits';

?>

</body>
</html>