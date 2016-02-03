<?php
date_default_timezone_set('UTC');

$oauth_callback = 'http://localhost/foodromeo/get_twitter_code_2.php'; // calls are made from index.php
$url = 'https://api.twitter.com/oauth/access_token?oauth_verifier='.$_GET['oauth_verifier'];

$oauth_consumer_key = 'Bn8lK1V5Of3jJt9a5MxlJQqpp';
$oauth_nonce = str_shuffle(trim(base64_encode(time()), '='));
$oauth_signature_method = 'HMAC-SHA1';
$oauth_timestamp = time();
$oauth_token = '4833720979-CkdIsDwnMRLo5aZ8j3jO0RIZwkKWlD6cLQipKAN';
$oauth_version = '1.0';

$HTTPMethod = 'POST'; 
$BaseURL = 'https://api.twitter.com/oauth/access_token?oauth_verifier='.$_GET['oauth_verifier'];   

$consumer_secret = 'BsB4xREhPXddgTP3lUJXF99C6aasB4cJIrQ9fK8L7wu6Jc41ZJ';
$access_token_secret = 'HsGuhR7aj3OTaRCfqUAxV1ViIUj6UC8walKDsBcnS2Kct';


$request_token=$_GET['oauth_token'];
$params = array(
    'oauth_consumer_key' => $oauth_consumer_key,
    'oauth_nonce' => $oauth_nonce,
    'oauth_signature_method' => $oauth_signature_method,
    'oauth_timestamp' => $oauth_timestamp,
    'oauth_version' => $oauth_version,
    'oauth_callback' => $oauth_callback,
    'oauth_token'=>$request_token,
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
        'oauth_token="'.rawurlencode($request_token).'", '.
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

/*echo "Header";
echo $header;*/



echo '<pre>';
print_r($response);
echo '</pre>';

/*echo '<pre>';
print_r (curl_getinfo($c));
echo '</pre>';*/

curl_close($c);






/*$token=$_GET['token'];*/

$url2="http://0.0.0.0:3000/twitter/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko&".$response;
/*echo $url2;*/
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL,$url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1);
$output2 = curl_exec($ch2);
$arr2 = json_decode($output2,true);
echo $output2;
/*echo $arr2;*/
echo "Welcome";
curl_close($ch2);

/*




date_default_timezone_set('UTC');

$oauth_callback1 = 'http://localhost/foodromeo/get_twitter_code_2.php'; // calls are made from index.php
$url1 = 'https://api.twitter.com/1.1/account/verify_credentials.json';

$oauth_consumer_key1 = 'Bn8lK1V5Of3jJt9a5MxlJQqpp';
$oauth_nonce1 = str_shuffle(trim(base64_encode(time()), '='));
$oauth_signature_method1 = 'HMAC-SHA1';
$oauth_timestamp1 = time();
$oauth_token1 = '4833720979-CkdIsDwnMRLo5aZ8j3jO0RIZwkKWlD6cLQipKAN';
$oauth_version1 = '1.0';

$HTTPMethod1 = 'GET'; 
$BaseURL1 = 'https://api.twitter.com/1.1/account/verify_credentials.json';   

$consumer_secret1 = 'BsB4xREhPXddgTP3lUJXF99C6aasB4cJIrQ9fK8L7wu6Jc41ZJ';
$access_token_secret1 = 'HsGuhR7aj3OTaRCfqUAxV1ViIUj6UC8walKDsBcnS2Kct';



$params1 = array(
    'oauth_consumer_key' => $oauth_consumer_key1,
    'oauth_nonce' => $oauth_nonce1,
    'oauth_signature_method' => $oauth_signature_method1,
    'oauth_timestamp' => $oauth_timestamp1,
    'oauth_version' => $oauth_version1,
    'oauth_token='=>$oauth_token1,
    
);

 

function parameter_string1 (array $params1)
{
    $temp_array1 = array();
    $parameter_string1 = '';

    while (current($params1)) {
        $temp_array1[rawurlencode(key($params1))] = rawurlencode(current($params1));
        next($params1);
    }
    ksort($temp_array1);
    foreach ($temp_array1 as $key1 => $value1) {
        $parameter_string1 .= '&' . $key1 . '=' . $value1;
    }

    return trim($parameter_string1, '&');
}

$parameter_string1 = parameter_string1($params1);

function signature_base_string1 ( $HTTPMethod1, $BaseURL1, $parameter_string1)
{
    $signature_base_string1 = $HTTPMethod1 . '&' . rawurlencode($BaseURL1) . '&' . rawurlencode($parameter_string1);
    return $signature_base_string1;
}
$signature_base_string1 = signature_base_string1 ($HTTPMethod1, $BaseURL1, $parameter_string1);

function signing_key1($consumer_secret1)
{
    return rawurlencode($consumer_secret1) . '&'; 
}
$signing_key1 = signing_key1($consumer_secret1);   

$oauth_signature1 = base64_encode(hash_hmac('SHA1', $signature_base_string1, $signing_key1, true));


$header1[] = 'Authorization: OAuth '.
        'oauth_consumer_key="'.rawurlencode($oauth_consumer_key1).'", '.
        'oauth_nonce="'.rawurlencode($oauth_nonce1).'", '.
        'oauth_signature="'.rawurlencode($oauth_signature1).'", '.
        'oauth_signature_method="'.rawurlencode('HMAC-SHA1').'", '.
        'oauth_timestamp="'.rawurlencode($oauth_timestamp1).'", '.
        'oauth_token="'.rawurlencode($oauth_token1).'", '.
        'oauth_version=>"'.rawurlencode('1.0').'"';

$options1 = array(
    CURLOPT_URL => $url1,
    CURLOPT_HEADER => false,
    CURLINFO_HEADER_OUT => true,
    CURLOPT_HTTPHEADER => $header1,
    CURLOPT_POST => false,
    CURLOPT_RETURNTRANSFER => true
    );

$c1 = curl_init();

$d1 = curl_setopt_array($c1, $options1);

$response1 = curl_exec($c1);



echo '<pre>';
print_r($response1);
echo '</pre>';

echo '<pre>';
print_r (curl_getinfo($c1));
echo '</pre>';

curl_close($c1);*/

?>