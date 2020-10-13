<?php
 

 
function encrypt ($input) {
	$Key = "dublin";
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($Key), $input, MCRYPT_MODE_CBC, md5(md5($Key))));
        return $output;
    }
 
     function decrypt ($input) {
     	$Key = "dublin";
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5($Key))), "\0");
        return $output;
    }

//echo decrypt("u7SOovcbljUbZEI0Ql9xA4fL7cD5aiNI4ZuYH5Va0O0=");

