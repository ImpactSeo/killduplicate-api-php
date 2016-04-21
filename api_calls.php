<?php

require_once __DIR__ . '/config.php';


/**
 * Get scan cost in credits 
 *
 * @param string $text Text to price scan
 * @param string $format Return format (default json)
 * @param string $result Result type (default short)
 *
 * @return string $response Text response
 */
function scan_text($text, $format = 'json', $result = 'short', $exclude_domains = [])
{
	$post_options = [
		'api_key' => API_KEY,
		'text' => $text,
		'exclude_domains' => $exclude_domains,
		'callback' => API_CALLBACK,
		'format' => $format,
		'result' => $result
	];

	$curl_options = [
		CURLOPT_URL => API_ENDPOINT . 'scan',
	    CURLOPT_SSL_VERIFYPEER => false,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_CONNECTTIMEOUT => 30,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_FOLLOWLOCATION => true,
	    CURLOPT_MAXREDIRS => 5,
	    CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => TRUE,
        # json_encode !!
        CURLOPT_POSTFIELDS => json_encode($post_options),
	];

	$curl = curl_init();
	curl_setopt_array($curl, $curl_options);
	$response = curl_exec($curl);


	# Debug
	// $info = curl_getinfo($curl);
	// echo 'response'.'<br>';
	// echo '<pre>';print_r($response);echo '</pre>';
	// echo 'info'.'<br>';
	// echo '<pre>';print_r($info);echo '</pre>';

	return $response;
}


/**
 * Get scan cost in credits 
 *
 * @param string $text Text to price scan
 * @param string $format Return format (default json)
 *
 * @return string $response Text response
 */
function get_scan_price($text, $format = 'json')
{
	$post_options = [
		'api_key' => API_KEY,
		'text' => $text,
		'format' => $format
	];

	$curl_options = [
		CURLOPT_URL => API_ENDPOINT . 'price',
	    CURLOPT_SSL_VERIFYPEER => false,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_CONNECTTIMEOUT => 30,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_FOLLOWLOCATION => true,
	    CURLOPT_MAXREDIRS => 5,
	    CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => true,
        # json_encode !!
        CURLOPT_POSTFIELDS => json_encode($post_options),
	];

	$curl = curl_init();
	curl_setopt_array($curl, $curl_options);
	$response = curl_exec($curl);

	# Debug
	// $info = curl_getinfo($curl);
	// echo 'response'.'<br>';
	// echo '<pre>';print_r($response);echo '</pre>';
	// echo 'info'.'<br>';
	// echo '<pre>';print_r($info);echo '</pre>';

	return $response;
}


/**
 * Retrieve your credits balance
 *
 * @param string $format (default json)
 *
 * @return string $response
 */
function get_credits($format = 'json')
{
	$curl_options = [
		CURLOPT_URL => API_ENDPOINT . 'credits/' . rawurlencode(API_KEY) . '/' . $format,
	    CURLOPT_SSL_VERIFYPEER => false,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_CONNECTTIMEOUT => 30,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_FOLLOWLOCATION => true,
	    CURLOPT_MAXREDIRS => 5
	];

	$curl = curl_init();
	curl_setopt_array($curl, $curl_options);
	$response = curl_exec($curl);

	# Debug
	// $info = curl_getinfo($curl);
	// echo 'response'.'<br>';
	// echo '<pre>';print_r($response);echo '</pre>';
	// echo 'info'.'<br>';
	// echo '<pre>';print_r($info);echo '</pre>';

	return $response;
}