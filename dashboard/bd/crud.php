<?php
session_start();
$ID =$_SESSION["s_id"];
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$fnac = (isset($_POST['fnac'])) ? $_POST['fnac'] : '';
$curso = (isset($_POST['curso'])) ? $_POST['curso'] : '';
$tp1 = (isset($_POST['tp1'])) ? $_POST['tp1'] : '';
$tp2 = (isset($_POST['tp2'])) ? $_POST['tp2'] : '';
$nf = (isset($_POST['nf'])) ? $_POST['nf'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

session_start();
$_SESSION["s_usuario"];

switch($opcion){
    case 1: //alta
        
        $consulta = "INSERT INTO personas (nombre, apellido, fnac, curso, tp1, tp2, nf, usuario_id) VALUES('$nombre', '$apellido', '$fnac', '$curso', '$tp1', '$tp2', '$nf', '$ID') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, nombre, apellido, fnac, curso, tp1, tp2, nf curso FROM personas ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $conexion= NULL;
        //break;
    case 2: //modificación
        $consulta = "UPDATE personas SET nombre='$nombre', apellido='$apellido', fnac='$fnac' , curso='$curso' , tp1='$tp1' , tp2='$tp2' , nf='$nf' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, nombre, apellido, fnac, curso, tp1, tp2, nf FROM personas WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM personas WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
