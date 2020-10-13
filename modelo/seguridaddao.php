<?php
require_once "conexion.php";
class SeguridadDao extends Conexion{

public function acttoken($usuario,$token){


	  $mensaje="Sin mensaje";
try {
	 $conexion=Conexion::conectar();
   $sql="update seguridad set token=:token where usuario=:usuario;";
    
	
    $stmt = $conexion->prepare($sql);	
		$stmt->bindParam(":usuario", $usuario,PDO::PARAM_STR);
    $stmt->bindParam(":token", $token,PDO::PARAM_STR);  
   	$stmt->execute();
    $fila=$stmt->rowCount();
        
	}

catch(PDOException $e) {
  $fila=-1;
} 


return $fila;

}


////////////////////////////////////////////////////////////////////////////////////


public function mostrartoken($usuario){
  
  $token="sin token"; 

  $stmt = Conexion::conectar()->prepare("SELECT token FROM seguridad WHERE usuario=:usuario"); 
  $stmt->bindParam(":usuario", $usuario,PDO::PARAM_STR);
  $stmt->execute();       
    #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.

  while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //echo $fila["token"].PHP_EOL;
    $token=$fila["token"];
  }
  
  return $token;
}




}
/*
$seg=new SeguridadDao();
echo $seg->acttoken('carcac79','123456');
*/