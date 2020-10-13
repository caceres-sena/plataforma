<?php
use Firebase\JWT\JWT;
// generar token

function generarToken(){
  $time = time();
$token = array (
  'sub' => '12345678901',
  'name' => 'John Doe',
  'admin' => true,
  'jti' => 'b5a7ab61-0060-4501-9992-b458e88e080b',
  'iat' => 1589557657,
  'exp' => $time + (60*60),
);

$jwt = JWT::encode($token, "ABC&&");
return $jwt;
}

function generarTokenjwt($user){
  $time = time();
$token = array (
  'sub' => '123456789011',
  'name' => $user,
  'admin' => true,
  'jti' => 'b5a7ab61-0060-4501-9992-b458e88e080b',
  'iat' => 1589557657,
  'exp' => $time + (60*60*24),
);

$jwt = JWT::encode($token, "ABC&&");
return $jwt;
}



function Aud()
    {
        $aud = '';
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }
        
        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();
        
        return sha1($aud);
    }


function mostrartoken($token){
	if(empty($token))
        {
            //throw new Exception("Invalid token supplied.");
        }
       try{
        $decode = JWT::decode($token,'ABC&&',['HS256']);
         echo 'token jwt valido';
      }
      catch(\Exception $e){
      //throw new \Exception('Signature verification failed');
        echo 'token jwt invalido';
    }
 }


 function verificartoken($token){
  if(empty($token))
        {
            return false;
        }
       try{
        $decode = JWT::decode($token,'ABC&&',['HS256']);
         return true;
      }
      catch(\Exception $e){
      //throw new \Exception('Signature verification failed');
        return false;
    }
 }

/*token,
            'self::$secret_key',
            self::$encrypt*/

        //);
        /*
        if($decode->aud !== Aud())
        {
            //throw new Exception("Invalid user logged in.");
            echo "invalidado token";
        }
        else{
             echo "token valido";
        }
	//$decoded = JWT::decode($token,"ABC", ['HS256']);
	//return $decoded;

  */

 // return var_dump($decode);
//}

