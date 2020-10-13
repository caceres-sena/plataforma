<?php
//include_once "../modelo/encripter.php";
//include_once "../modelo/credencialdao.php";
//include_once "../modelo/seguridaddao.php";
//echo mostrartoken($token);
require_once 'generartoken.php';
require_once '../vendor/autoload.php';

$json = file_get_contents('php://input');
$client = json_decode($json);
$headers = apache_request_headers();

if(isset($headers['Authorization'])){
	$token =$headers['Authorization'];
}
else{
	$token="Sin token";
}
$n1=$client->n1;
$n2=$client->n2;
$suma=$n1+$n2;



if(verificartoken($token)){
	$json = array("suma" => $suma,"status"=>"202");
	$codigo="202";
}
else{
	$json = array("status"=>"406");
	$codigo="406";
}



header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, ,Authorization,Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Content-Type: application/json');
http_response_code($codigo);
echo json_encode($json);