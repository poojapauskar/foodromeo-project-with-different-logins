<?php
date_default_timezone_set('UTC');

$oauth_callback = 'http://localhost/foodromeo/get_twitter_code_2.php'; // calls are made from index.php
$url = 'https://api.twitter.com/oauth/request_token';

$oauth_consumer_key = 'Bn8lK1V5Of3jJt9a5MxlJQqpp';
$oauth_nonce = str_shuffle(trim(base64_encode(time()), '='));
$oauth_signature_method = 'HMAC-SHA1';
$oauth_timestamp = time();
$oauth_token = '4833720979-CkdIsDwnMRLo5aZ8j3jO0RIZwkKWlD6cLQipKAN';
$oauth_version = '1.0';

$HTTPMethod = 'POST'; 
$BaseURL = 'https://api.twitter.com/oauth/request_token';   

$consumer_secret = 'BsB4xREhPXddgTP3lUJXF99C6aasB4cJIrQ9fK8L7wu6Jc41ZJ';
$access_token_secret = 'HsGuhR7aj3OTaRCfqUAxV1ViIUj6UC8walKDsBcnS2Kct';

$params = array(
    'oauth_consumer_key' => $oauth_consumer_key,
    'oauth_nonce' => $oauth_nonce,
    'oauth_signature_method' => $oauth_signature_method,
    'oauth_timestamp' => $oauth_timestamp,
    'oauth_version' => $oauth_version,
    'oauth_callback' => $oauth_callback
);

 /*$params = array( 'oauth_consumer_key' => $oauth_consumer_key,
  'oauth_nonce' => $oauth_nonce,
   'oauth_signature_method' => $oauth_signature_method,
    'oauth_timestamp' => $oauth_timestamp,
     'oauth_version' => $oauth_version, 'oauth_callback' => $oauth_callback );.*/

function parameter_string (array $params)
{
    $temp_array = array();
    $parameter_string = '';

    while (current($params)) {
        $temp_array[rawurlencode(key($params))] = rawurlencode(current($params));
        next($params);
    }
    ksort($temp_array);
    foreach ($temp_array as $key => $value) {
        $parameter_string .= '&' . $key . '=' . $value;
    }

    return trim($parameter_string, '&');
}

$parameter_string = parameter_string($params);

function signature_base_string ( $HTTPMethod, $BaseURL, $parameter_string)
{
    $signature_base_string = $HTTPMethod . '&' . rawurlencode($BaseURL) . '&' . rawurlencode($parameter_string);
    return $signature_base_string;
}
$signature_base_string = signature_base_string ($HTTPMethod, $BaseURL, $parameter_string);

function signing_key($consumer_secret)
{
    return rawurlencode($consumer_secret) . '&'; 
}
$signing_key = signing_key($consumer_secret);   

$oauth_signature = base64_encode(hash_hmac('SHA1', $signature_base_string, $signing_key, true));

$header[] = 'Authorization: OAuth '.
        'oauth_callback="'.rawurlencode($oauth_callback).'", '.
        'oauth_consumer_key="'.rawurlencode($oauth_consumer_key).'", '.
        'oauth_nonce="'.rawurlencode($oauth_nonce).'", '.
        'oauth_signature="'.rawurlencode($oauth_signature).'", '.
        'oauth_signature_method="'.rawurlencode('HMAC-SHA1').'", '.
        'oauth_timestamp="'.rawurlencode($oauth_timestamp).'", '.
        'oauth_version="'.rawurlencode('1.0').'"';

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_HEADER => false,
    CURLINFO_HEADER_OUT => true,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true
    );

$c = curl_init();

$d = curl_setopt_array($c, $options);

$response = curl_exec($c);



echo '<pre>';
echo $response;
/*print_r($response['status']);*/
echo '</pre>';

/*echo '<pre>';
print_r (curl_getinfo($c));
echo '</pre>';*/

curl_close($c);

?>