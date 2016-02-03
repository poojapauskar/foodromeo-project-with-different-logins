<!-- http://localhost/foodromeo/sign-up.php -->

<html>
<head>
<script type="text/javascript">
  

</script>
</head>
<body>


<?php


/*echo $_GET['code'];*/

$url1="https://graph.facebook.com/oauth/access_token?client_id=177909892570210&client_secret=db005a2d32b03896dd46341e8cba2081&redirect_uri=http://localhost/foodromeo/get_code.php&code=".$_GET['code'];
/*echo $url1;*/
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL,$url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch1);
$arr = json_decode($output,true);
/*echo $output;*/

/*echo substr($output, 13);*/

curl_close($ch1);


$url2="http://0.0.0.0:3000/facebook/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko&fb_access_token=".substr($output, 13);
/*echo $url2;*/
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL,$url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1);
$output2 = curl_exec($ch2);
$arr2 = json_decode($output2,true);
/*echo $output2;*/
/*echo $arr;*/
echo "Welcome";
curl_close($ch2);
 

?>




<!-- <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="https://www.facebook.com/dialog/oauth?client_id=177909892570210&redirect_uri=http://localhost/foodromeo/get_code.php&scope=manage_pages%2Cpublish_actions&state=<STATE>">Login with Facebook</a></li>
        <li class="tab"><a href="#login">Login with Google</a></li>
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
              <input name="firstname" type="text"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name
              </label>
              <input name="lastname" type="text"/>
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
            <input type="login_email" required/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="login_password" required/>
          </div>
          
          <p class="forgot"><a href="http://localhost/foodromeo/forgot-password.php">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div>
      
</div> -->
</body>
</html>



