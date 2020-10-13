<?php
//include_once "../modelo/encripter.php";
//include_once "../modelo/credencialdao.php";
//include_once "../modelo/seguridaddao.php";
//echo mostrartoken($token);
require_once 'generartoken.php';
require_once '../vendor/autoload.php';

$json = file_get_contents('php://input');
$client = json_decode($json);
$usuario=$client->usuario;
$password=$client->password;

if($usuario=="car.caceres.ochoa@hotmail.com" & $password=="123456"){
	$token=generarTokenjwt($usuario);
	$json = array("usuario" => $usuario,"status"=>"200","token"=>$token,"nomapel"=>"Carlos Caceres Ochoa",
    "foto"=>"carloscaceres");
	$codigo="200";
}

else if($usuario=="car.caceres.ochoa@gmail.com" & $password=="123456"){
	$token=generarTokenjwt($usuario);
	$json = array("usuario" => $usuario,"status"=>"200","token"=>$token,"nomapel"=>"Jose Ochoa arias","foto"=>"bradpitt");
	$codigo="200";
}

else{
	$json = array("usuario" => "Acceso no Autorizado",
		"status"=>"400");
	$codigo="400";
}
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Content-Type: application/json');
echo json_encode($json);