
<?php


$token=$_GET['token'];

$url2="http://0.0.0.0:3000/google/?access_token=hak7GAIRAi2iLL1KXqKyetSC3cjVko&google_access_token=".$token;
/*echo $url2;*/
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL,$url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1);
$output2 = curl_exec($ch2);
$arr2 = json_decode($output2,true);
echo "Welcome";
curl_close($ch2);
 

?>