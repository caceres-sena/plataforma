<?php
require_once "conexion.php";
class BitacoraDao extends Conexion{

public function guardarBitacora($bitacora,$fecha,$docente,$clase,$periodo,$asignatura){


	  $mensaje="Sin mensaje";
try {
	 $conexion=Conexion::conectar();
    
	$sql="INSERT INTO bitacora(bitacora,fecha,hora,docente,clase,periodo,asignatura) VALUES (:bitacora,:fecha,curtime(),:docente,:clase,:periodo,:asignatura)";
 

    $stmt = $conexion->prepare($sql);	
		$stmt->bindParam(":bitacora", $bitacora,PDO::PARAM_STR);
    $stmt->bindParam(":fecha", $fecha,PDO::PARAM_STR);  
    $stmt->bindParam(":docente", $docente,PDO::PARAM_STR);
	  $stmt->bindParam(":clase", $clase,PDO::PARAM_INT);  
    $stmt->bindParam(":periodo", $periodo,PDO::PARAM_STR);  
    $stmt->bindParam(":asignatura", $asignatura,PDO::PARAM_STR);  


		$stmt->execute();
        $fila=$stmt->rowCount();
        if($fila==1){
         $mensaje="Guardo, La Bitacora con Exito!!" ;
        }
        else if($fila==0){
        	$mensaje="Problemas al Guardar";
        }
} catch(PDOException $e) {
 if ($e->errorInfo[1] == 1062) {
 	$mensaje="registro duplicado";
      // duplicate entry, do something else
   } else {
      // an error other than duplicate entry occurred
   // echo $e->errorInfo[1];
    $mensaje=$e->getMessage();
   }
} 
return $mensaje;
	}


public function mostrarBitacora(){
        
  $stmt = Conexion::conectar()->prepare("SELECT bitacora,fecha,hora,docente,clase,periodo,asignatura FROM bitacora WHERE docente='3805476' and asignatura='4311' and periodo='2020-1';"); 
  $stmt->execute();       
    #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
  $array=$stmt->fetchAll(PDO::FETCH_ASSOC);
    // cerrar conexion;
  $stmt=null; 
  
  return $array;
        
}



}


