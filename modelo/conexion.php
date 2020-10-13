<?php

class Conexion{

public function conectar(){

$link = new PDO("mysql:host=localhost;dbname=asistencia","root","", array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		return $link;
	}

/*
public function conectar(){

$link = new PDO("mysql:host=localhost;dbname=u654926880_bitacora","u654926880_usbmultimedia","mult123", array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		return $link;

	}

	*/

}

?>