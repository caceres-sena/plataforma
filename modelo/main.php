<?php
require_once "encriptacion.php";

$enc=new Encriptar();
$passenc= ltrim(rtrim($enc->encriptarPassword("car741852")));
$passdesc=$enc->desencriptarPassword($passenc);
echo $passenc."<br>";
echo $passdesc;
