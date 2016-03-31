<?php

# Wait for killduplicate.com to send scan result
$rawData = file_get_contents("php://input");
$rawData = json_decode($rawData, true);

error_log('test_api_callback.php : ' . print_r($rawData, true));