<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            glitchord
        </title>
        <meta charset="utf-8"/>
        <!-- estilos -->
       
        <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        
        <!-- fin estilos -->
    </head>
    <body>
       
        <!-- Iniciar sesión -->
        <div class="contenido" >
            <form class="login" action="php/validar_admin.php" method="POST">
                
                <div>
                    <label for="uname">
                        <b>
                            Nombre de Usuario
                        </b>
                    </label>
                    <br>
                    <input type="text" placeholder="Usuario" name="uname" required/>
                    <br>
                    <label for="psw">
                        <b>
                            Contraseña
                        </b>
                    </label>
                    <br>
                    <input type="password" placeholder="Contraseña" name="psw" required/>
                    <br>
                    <button type="submit" class="log">
                        Inicia sesión
                    </button>
                    
                    
                </div>
                
            </form>
        </div>
    </body>
</html>
