<?php
$pass = "1234";
$hash = password_hash($pass, PASSWORD_DEFAULT);
//echo $hash . "<br>";

//var_dump(password_verify("123", $hash));

//$pass = '1234';

//echo md5($pass);

echo $hash;
