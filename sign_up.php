<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Plataforma Docente- Login</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>
     
      <div class="container-login" id="modalCRUD">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formSign" action="" method="post">
                <span class="login-form-title">REGISTRARSE</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                <input class="input100" type="text" id="usuario" name="usuario" placeholder="Ingrese su Usuario">
                <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                <input class="input100" type="password" id="password" name="password" placeholder="Ingrese Password">
                <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                <input class="input100" type="password" id="passwordRepit" name="passwordRepit" placeholder="Repetir su Password">
                <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                    <div class="login-form-bgbtn"></div>
                    <button type="submit" id="btnGuardar" class="login-form-btn">Registrarme</button>
                    </div>
                    </div>
                <div class="Sign-form-btn mt-2">
                        <div class="login-form-bgbtn"></div>
                        <?php
                        $href="http://localhost/";
                        $nombr="Volver";
                        $class="login-form-btn";
                        echo "<a href='".$href."' class='".$class."'>".$nombr."</a>";
                        ?>
                </div>
            </form>
        </div>
    </div>     
        
        
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <!-- <script src="codigo.js"></script>     -->
     <script type="text/javascript" src="codigoForSign.js"></script>  
    </body>
</html>