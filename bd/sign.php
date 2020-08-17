<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
// $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
// switch($opcion){
    // case 1: //alta
        $consulta = "INSERT INTO usuarios (usuario, password ) VALUES('$usuario', MD5('$password')) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        // $consulta = "SELECT id, nombre, apellido, fnac, curso, tp1, tp2, nf curso FROM personas ORDER BY id DESC LIMIT 1";
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $conexion= NULL;
        // break;      
// }

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>