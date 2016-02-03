<!-- http://localhost/foodromeo/sign-up.php -->

<html>
<head>
<script type="text/javascript">
  
/*document.getElementById("myNumber").defaultValue = "16";*/
</script>
</head>
<body>

<!-- Twitter -->
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



/*echo '<pre>';
echo $response;
echo '</pre>';*/

/*echo '<pre>';
print_r (curl_getinfo($c));
echo '</pre>';*/

curl_close($c);

?>

<?php

/*$post_data = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
    // For promotional, this will be ignored by the SMS gateway
    'firstname'   => $_POST['firstname'],
    'lastname'    => $_POST['lastname'],
    'email'  => $_POST['email'], 
);
 
 
$url = "http://0.0.0.0:3000/register/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko";

$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Apple-Tz: 0',
    'X-Apple-Store-Front: 143444,12'
    ));
 
$http_result = curl_exec($ch);
$error = curl_error($ch);
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 
curl_close($ch);*/






$url2 = 'http://0.0.0.0:3000/register/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko';
$headr = array(
    'Firstname: '.$_POST['firstname'],
    'Lastname: '.$_POST['lastname'],
    'Email: '.$_POST['email'],
    'Phone: ""',
    'Address-line-1: ""',
    'Address-line-2: ""',
    'Pin-code: ""',
    'Photo: ""',
    'Password: ""',
    'Access-token: ""',
    'Fb-id: ""',
    'Fb-access-token: ""',
    'Google-id: ""',
    'Google-access-token: ""',
    'Twitter-id: ""',
    'Twitter-token: ""',
    'Twitter-token-secret: ""',
    'Twitter-screen-name: ""',
    'Activation-key: ""',
    'Activation-key-time: ""',
    'Is-set-pw: 1',
    'City: ""',
   
    );
/*$headr[] = 'Accept: application/json';
$headr[] = 'Authorization: Basic '.$accesstoken;*/

//cURL starts
$crl2 = curl_init();
curl_setopt($crl2, CURLOPT_URL, $url2);
curl_setopt($crl2, CURLOPT_HTTPHEADER,$headr);
curl_setopt($crl2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($crl2, CURLOPT_HTTPGET,true);
$reply2 = curl_exec($crl2);
/*echo $reply;*/
$arr2 = json_decode($reply2,true);
echo $arr2['message'];

curl_close($reply2);







/*$post_data1 = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
    // For promotional, this will be ignored by the SMS gateway
    'login_email'   => $_POST['login_email'],
    'login_password'    => $_POST['login_password'],
);*/

/*$url=$_POST['txturl'];*/

/*$url1="http://0.0.0.0:3000/login/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko";

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL,$url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
curl_setopt($crl, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Email: '.$_POST['login_email'],
    'Password: '.$_POST['login_password'],
   
    ));
$output = curl_exec($ch1);
$arr = json_decode($output,true);
echo $output;
echo $_POST['login_email'];
echo $_POST['login_password'];
if ($arr['status'] == 400 || $arr['status'] == 401){
  echo $arr['message'];
}
if($arr['status'] == 200){
  header('Location: blank-page.php');
};
curl_close($ch1);*/


$url3 = 'http://0.0.0.0:3000/login/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko';
$headr = array(
    'Email: '.$_POST['login_email'],
    'Password: '.$_POST['login_password'],
   
    );
/*$headr[] = 'Accept: application/json';
$headr[] = 'Authorization: Basic '.$accesstoken;*/

//cURL starts
$crl = curl_init();
curl_setopt($crl, CURLOPT_URL, $url3);
curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($crl, CURLOPT_HTTPGET,true);
$reply = curl_exec($crl);
/*echo $reply;*/
$arr1 = json_decode($reply,true);
if ($arr1['status'] == 400 || $arr1['status'] == 401){
  echo "<br>";
  echo $arr1['message'];
}
if($arr1['status'] == 200){
  header('Location: blank-page.php');
};
curl_close($reply);



/*
$url1="https://graph.facebook.com/oauth/access_token?client_id=177909892570210&client_secret=db005a2d32b03896dd46341e8cba2081&code=<CODE>";

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL,$url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch1);
$arr = json_decode($output,true);
echo $arr;
curl_close($ch1);*/
 

?>




<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="https://www.facebook.com/dialog/oauth?client_id=177909892570210&redirect_uri=http://localhost/foodromeo/get_code.php&scope=manage_pages%2Cemail&state=<STATE>">Login with Facebook</a></li>
        <li class="tab"><a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email%20profile&redirect_uri=http://localhost/foodromeo/get_google_code.php&response_type=token&client_id=219221435680-f4oiivqg1mil18deh9dm0e2kvpisc9j4.apps.googleusercontent.com">Login with Google</a></li>
        <li class="tab"><a href="https://api.twitter.com/oauth/authenticate?<?php echo $response ?>">Login with Twitter</a></li>
      </ul>


      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up</h1>
          
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name
              </label>
              <input name="firstname" defaultValue=" " type="text"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name
              </label>
              <input name="lastname" defaultValue=" " type="text"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" type="email" required/>
          </div>
          
          <br>
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Login</h1>
          
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="text" name="login_email" required/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="text" name="login_password" required/>
          </div>
          
          <p class="forgot"><a href="http://localhost/foodromeo/forgot-password.php">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div>
      
</div>
</body>
</html>



