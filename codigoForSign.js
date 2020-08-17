    $("#formSign").submit(function(e){
    e.preventDefault();
   
    usuario = $.trim($("#usuario").val());
    password = $.trim($("#password").val());
    passwordRepit = $.trim($("#passwordRepit").val());

    if(usuario.length == "" || password == "" || passwordRepit == ""){
        Swal.fire({
            type:'warning',
            title:'los campos son requerido para crear un registro',
        });
        return false; 
      }
      if(password.length <= '6'){
        Swal.fire({
            type:'warning',
            title:'El password tiene que ser mas de 6 caracteres',
        });
        return false; 
      }else{
        if(password != passwordRepit ){
            Swal.fire({
                type:'warning',
                title:'Porfavor verifique, las contraseñas tienen que ser iguales',
            });
            return false; 
        }else{
                $.ajax({
                    url: "bd/sign.php",
                    type: "POST",
                    datatype: "json",
                    data: {usuario:usuario, password:password}, 
                    success: function(data){ 
                        if(data == "null"){
                            Swal.fire({
                                type:'error',
                                title:'El usuario ya esta utilizado',
                            });
                        }else{
                            Swal.fire({
                                type:'success',
                                title:'¡Registro exitoso!',
                                confirmButtonColor:'#3085d6',
                                confirmButtonText:'Ingresar'
                            }).then((result) => {
                                if(result.value){
                                    window.location.href = "index.php";
                                }
                            })
                            
                        }
                    }        
                });
            }    
      }
    
});    
    