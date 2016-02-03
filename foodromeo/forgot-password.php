<!-- http://localhost/foodromeo/sign-up.php -->

<html>
<head>
<script type="text/javascript">
  

</script>
</head>
<body>


<?php

/*$post_data = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
    // For promotional, this will be ignored by the SMS gateway
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
    'Firstname: ""',
    'Lastname: ""',
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
    'Is-set-pw: 0',
   
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

 

?>




<div class="form">
      
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Forgot Password</h1>
          
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          

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
        
        
        
      </div>
      
</div>
</body>
</html>



