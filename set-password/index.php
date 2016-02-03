<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Confirm password with HTML5</title>
    
    
    
    <link rel='stylesheet prefetch' href='http://yui.yahooapis.com/pure/0.5.0/pure-min.css'>

    
    
    
    
  </head>

  <body>

<?php

/*$url=$_POST['txturl'];*/
$activation_key=$_GET['activation_key'];
$url1="http://0.0.0.0:3000/get_user/activation_key=".$activation_key."/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko";
/*echo $url;*/
$ch1 = curl_init();//I have removed it from here
curl_setopt($ch1, CURLOPT_URL,$url1);// This will do
curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch1);
$arr = json_decode($output,true);
/*echo $arr;*/
curl_close($ch1); 



$post_data = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
    // For promotional, this will be ignored by the SMS gateway
    'email'   => $_POST['email'],
    'password'    => $_POST['password'],
    'confirm_password'  => $_POST['confirm_password'], 
);
 
 
$url = "http://0.0.0.0:3000/verify/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko";

$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 
$http_result = curl_exec($ch);
/*echo $http_result;*/
$error = curl_error($ch);
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 
curl_close($ch);
?>
<!--<h5>Activation Date</h5>
<?php echo $arr[0]['activation_key_time'];?><br>
<h5>Todays Date</h5>
<?php echo date('Y-m-d H:i:s');?><br>
<h5>After 48 hours of Activation Date</h5> -->
<?php $newtimestamp = strtotime($arr[0]['activation_key_time']." + 2880 minute");
 $date1=date('Y-m-d H:i:s', $newtimestamp); ?><br>



<?php if(date('Y-m-d H:i:s') < $date1){?>
        <?php if($arr[0]['email']==''){ ?>

          <h5>Successfull</h5>
          <?php }else{ ?>

            <form class="pure-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
             
              <fieldset>
                  <legend>Verify Account</legend><br><br>
                  
                  E-mail: <input type="text" name="email" ReadOnly="True" value=<?php echo $arr[0]['email'] ?>><br><br>
                  Password: <input type="password" name="password" placeholder="Password" id="password" required><br><br>
                  Confirm Password: <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>

                  <button type="submit" class="pure-button pure-button-primary">Confirm</button>
              </fieldset>
          </form>
              <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                  <script src="js/index.js"></script>

          <?php } ?>
<?php }else{?>
        <h5>Confirmation link expired</h5>
<?php } ?>


    
     
    
    
  </body>
</html>
