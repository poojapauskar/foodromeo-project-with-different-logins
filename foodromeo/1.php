

<?php


    $headers = 'POST&';
    $headers .= urlencode('https://api.twitter.com/oauth/request_token');
    $headers .= '%26oauth_callback%3d'.urlencode('http://localhost/foodromeo/get_twitter_code.php');
    $headers .= '%26oauth_consumer_key%3d'.urlencode('2fzoPKbVZ58h08WSSeNqQMuHV');
    $headers .= '%26oauth_nonce%3d'.urlencode('ea9ec8429b68d6b77cd5600adbbb0456');
    $headers .= '%26oauth_signature_method%3d'.urlencode('HMAC-SHA1');
    $headers .= '%26oauth_timestamp%3d'.urlencode('1318467427');

    $request_token_url = 'http://api.twitter.com/oauth/request_token?';
    $sha = sha1($headers);
    $url = $request_token_url.$sha.$this->consumer_secret.'&';

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_POST      ,1);
    curl_setopt($ch,CURLOPT_PUT,true); 
    curl_setopt($ch, CURLOPT_HEADER, 1);

    $result = curl_exec($ch);
    echo $result;
    curl_close($ch);
    return $result;
?>