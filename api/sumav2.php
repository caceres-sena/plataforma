<?php
//include_once "../modelo/encripter.php";
//include_once "../modelo/credencialdao.php";
//include_once "../modelo/seguridaddao.php";
//echo mostrartoken($token);
require_once 'generartoken.php';
require_once '../vendor/autoload.php';

$json = file_get_contents('php://input');
$client = json_decode($json);
$token=$_GET['token'];
$n1=$client->n1;
$n2=$client->n2;
$suma=$n1+$n2;



if(verificartoken($token)){
	echo 'Suma='.$suma;
}
else{
	echo "Acceso no Autorizado";
}



