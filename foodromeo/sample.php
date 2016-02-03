<?php
$nonce = time();
$timestamp = time();
$oauth = array('oauth_callback' => 'http://bitjini.com/',
              'oauth_consumer_key' => 'Bn8lK1V5Of3jJt9a5MxlJQqpp',
              'oauth_nonce' => $nonce,
              'oauth_signature_method' => 'HMAC-SHA1',
              'oauth_timestamp' => $timestamp,
              'oauth_version' => '1.0');

/**
 * Method for creating a base string from an array and base URI.
 * @param string $baseURI the URI of the request to twitter
 * @param array $params the OAuth associative array
 * @return string the encoded base string
**/
function buildBaseString($baseURI, $params){
 
$r = array(); //temporary array
    ksort($params); //sort params alphabetically by keys
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value); //create key=value strings
    }//end foreach                
 
    return 'POST&' . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r)); //return complete base string
}//end buildBaseString()

$baseString = buildBaseString($baseURI, $oauth);

/**
 * Method for creating the composite key.
 * @param string $consumerSecret the consumer secret authorized by Twitter
 * @param string $requestToken the request token from Twitter
 * @return string the composite key.
**/
function getCompositeKey($consumerSecret, $requestToken){
    return rawurlencode($consumerSecret) . '&' . rawurlencode($requestToken);
}//end getCompositeKey()

$consumerSecret = 'BsB4xREhPXddgTP3lUJXF99C6aasB4cJIrQ9fK8L7wu6Jc41ZJ'; //put your actual consumer secret here, it will look something like 'MCD8BKwGdgPHvAuvgvz4EQpqDAtx89grbuNMRd7Eh98'
 
$compositeKey = getCompositeKey($consumerSecret, null); //first request, no request token yet
$oauth_signature = base64_encode(hash_hmac('sha1', $baseString, $compositeKey, true); //sign the base string
$oauth['oauth_signature'] = $oauth_signature; //add the signature to our oauth array

/**
 * Method for building the OAuth header.
 * @param array $oauth the oauth array.
 * @return string the authorization header.
**/
function buildAuthorizationHeader($oauth){
    $r = 'Authorization: OAuth '; //header prefix
 
    $values = array(); //temporary key=value array
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\""; //encode key=value string
 
    $r .= implode(', ', $values); //reassemble
    echo $r;
    return $r; //return full authorization header
}//end buildAuthorizationHeader()

/**
 * Method for sending a request to Twitter.
 * @param array $oauth the oauth array
 * @param string $baseURI the request URI
 * @return string the response from Twitter
**/
function sendRequest($oauth, $baseURI){
    $header = array( buildAuthorizationHeader($oauth), 'Expect:'); //create header array and add 'Expect:'
 
    $options = array(CURLOPT_HTTPHEADER => $header, //use our authorization and expect header
                           CURLOPT_HEADER => false, //don't retrieve the header back from Twitter
                           CURLOPT_URL => $baseURI, //the URI we're sending the request to
                           CURLOPT_POST => true, //this is going to be a POST - required
                           CURLOPT_RETURNTRANSFER => true, //return content as a string, don't echo out directly
                           CURLOPT_SSL_VERIFYPEER => false); //don't verify SSL certificate, just do it
 
    $ch = curl_init(); //get a channel
    curl_setopt_array($ch, $options); //set options
    $response = curl_exec($ch); //make the call
    echo $response;
    curl_close($ch); //hang up
 
    return $response;
}//end sendRequest()

$baseString = buildBaseString($baseURI, $oauth); //build the base string
 
$compositeKey = getCompositeKey($consumerSecret, null); //first request, no request token yet
$oauth_signature = base64_encode(hash_hmac('sha1', $baseString, $compositeKey, true)); //sign the base string
 
$oauth['oauth_signature'] = $oauth_signature; //add the signature to our oauth array
 
$response = sendRequest($oauth, $baseURI); //make the call


?>