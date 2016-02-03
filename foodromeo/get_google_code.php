<!-- http://localhost/foodromeo/sign-up.php -->

<html>
<head>

</head>
<body onload="myFunction()">

<script type="text/javascript">
  
function myFunction(){
// Getting URL var by its name
var url =window.location.href;
var type = url.split('#');
var hash = '';
if(type.length > 1)
  hash = type[1];

var str1 = "http://localhost/foodromeo/get-google-code-1.php?token=";
var str2 = hash.replace('access_token=','');
var res = str1.concat(str2);

/*alert(res);*/

window.location.href = res;
return substr(hash, 13);
}

</script>







</body>
</html>



