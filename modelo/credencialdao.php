<?php
require_once "conexion.php";
class CredencialDao extends Conexion{


public function validarCredencial($usuario,$password){
  $sql="SELECT usuario, password FROM credencial WHERE usuario=:usuario and password=:password;";      
  $stmt = Conexion::conectar()->prepare($sql); 
  $stmt->bindParam(":usuario", $usuario,PDO::PARAM_STR);
  $stmt->bindParam(":password", $password,PDO::PARAM_STR);  
  
  $stmt->execute();   
  $fila = $stmt->rowCount();    
  $stmt=null; 
  return $fila;          
}

}

