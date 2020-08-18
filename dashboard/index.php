<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Todos los alumnos</h1>
    
    
    
 <?php
 session_start();
 $ID =$_SESSION["s_id"];
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT id, nombre, apellido, fnac, curso , tp1 , tp2 , nf FROM personas WHERE usuario_id = '$ID' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo Alumno</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>                                
                                <th>Fecha Nac</th>
								<th>Curso</th>
								<th>Tp1</th>
								<th>Tp2</th>
								<th>NotaFinal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellido'] ?></td>
                                <td><?php echo $dat['fnac'] ?></td> 
								<td><?php echo $dat['curso'] ?></td>
								<td><?php echo $dat['tp1'] ?></td>
								<td><?php echo $dat['tp2'] ?></td>
								<td><?php echo $dat['nf'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="apellido" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido">
                </div>                
                <div class="form-group">
                <label for="fnac" class="col-form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fnac">
                </div>
				 <div class="form-group">
    <label for="curso">Materias</label>
    <select class="form-control" id="curso">
      <option>Algoritmo</option>
      <option>Taller de Software</option>
      <option>Desarrollo Web</option>
      <option>Base de Datos</option>
      <option>Sistema Operativo</option>
    </select>
  </div>
				<div class="form-group">
                <label for="tp1" class="col-form-label">Trabajo Practico N1:</label>
                <input type="number" min="0" max="10" class="form-control" id="tp1"> 
                </div>
				<div class="form-group">
                <label for="tp2" class="col-form-label">Trabajo Practico N2:</label>
                <input type="number" min="0" max="10" class="form-control" id="tp2">
                </div>
				<div class="form-group">
                <label for="nf" class="col-form-label">Nota Final:</label>
                <input type="number" min="0" max="10"class="form-control" id="nf">
                </div>
			
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>