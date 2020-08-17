<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

        $consult = "SELECT usuarios.usuario FROM usuarios WHERE usuario='$usuario'";
        $result = $conexion->prepare($consult);
        $result->execute();
       
        if($result->rowCount() >= 1){
            $data=Null;
            print json_encode($data);
            $conexion=null;
        }else{
            $consulta = "INSERT INTO usuarios (usuario, password ) VALUES('$usuario', MD5('$password')) ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
             print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
             $conexion = NULL;
        }
?>