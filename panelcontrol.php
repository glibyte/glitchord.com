<?php 
session_start(); 
//error_reporting(0);
    $session=null;
if (isset($_SESSION['admin'])) {
    $session = $_SESSION['admin'];
}else{
    echo "No tienes acceso";
        die();
}
  /*  if ($session == null || $session='') {
        echo "no tines acceso";
        die();
    }*/

?>
<html>
    <head>
        <title>
            Panel de control
        </title>
        <meta charset="utf-8"/>
        <!-- estilos -->
        <link rel="stylesheet" type="text/css" href="css/panelcontrol.css">
        <!-- estilos -->
    <body>
        <!-- menu -->
<div class="menu-left">
  <a class="tablinks" onclick="mostrar_contenido(event, 'usuarios')" id="defaultOpen">Usuarios</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'd_user')">Borrar Usuario</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'uc')">Ultimas Compras</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'rv')">Registro Ventas</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'addadmin')">Agregar Admin</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'deladmin')">Borrar Admin</a>
  <a href="php/cerrar_session_admin.php">Salir</a>
</div>
        <!-- fin menu-->
<div class="contenido">
        <h1>panel de control</h1>
        <h2>[<?php echo $session?>]</h2>
  <div id="usuarios" class="tabcontent">
     <h3>usuarios</h3>
       <p>Usuarios Registrados</p>
        <table width="70%" border="1px" align="center">
                <tr align="center">
                   <td>id</td>
                   <td>user name</td>
                   <td>email</td>
                   <td>password</td>
                </tr>
        <?php
          $mysql =new mysqli("localhost","root","","glitchord");
             if ($mysql-> connect_error) 
                    die("error en la conexion");

                $info=$mysql->query("select * from usuarios")
                or die ($mysql-> error);
            while ($data=$info->fetch_array()) {
         ?>
                <tr>
                  <td><?=$data["id"]?></td>
                  <td><?=$data["uname"]?></td>
                  <td><?=$data["email"]?></td>
                  <td><?=$data["psw"]?></td>
                </tr>
         <?php }  $mysql ->close();?>
    </table>
  </div>
  <div id="d_user" class="tabcontent">
           <h3>Borrar Usuario</h3>
        <p>Usuarios Registrados</p>
        <!-- tabla -->

        <!-- fin tabla-->
  </div>
  <div id="uc" class="tabcontent">
           <h3>Ultimas compras</h3>
        <p>Productos</p>
        <!-- tabla -->
                <table width="70%" border="1px" align="center">
                <tr align="center">
                   <td>Imagen</td>
                   <td>Nombre</td>
                   <td>Precio</td>
                   <td>Cantidad</td>
                   <td>Subtotal</td>
                </tr>
        <?php
          include("php/conexion.php");

                $info=$mysql->query("select * from compras")
                or die ($mysql-> error);
            while ($data=$info->fetch_array()) {
         ?>
                <tr>
                  <td><img class="imagen_pro" src="productos/<?=$data["imagen"]?>"></td>
                  <td><?=$data["nombre"]?></td>
                  <td><?=$data["precio"]?></td>
                  <td><?=$data["cantidad"]?></td>
                  <td><?=$data["subtotal"]?></td>
                </tr>
         <?php }  $mysql ->close();?>
    </table>
        <!-- fin tabla-->
  </div>
  <div id="rv" class="tabcontent">
           <h3>Registro Ventas</h3>
        <p>Ventas</p>
        <!-- tabla -->
        <!-- fin tabla-->
  </div>
  <div id="addadmin" class="tabcontent">
           <h3>Agregar administrador</h3>
        <!-- Registrar -->
        <div class="modal">
            <form class="modal-content" action="php/registrar_admin.php" method="POST">
                
                <div class="container">
                    <label for="uname">
                        <b>
                            Nombre de Usuario
                        </b>
                    </label>
                    <input type="text" placeholder="Usuario" name="uname" required/>
                    <label for="psw">
                        <b>
                            Contraseña
                        </b>
                    </label>
                    <input type="password" placeholder="Contraseña" id="psw" name="psw" pattern="(?=.*\d).{8,}" title="Debe contener al menos un número y 8 o más caracteres" required/>
                    <label for="psw">
                        <b>
                            Confirmar Contraseña
                        </b>
                    </label>
                    <input type="password" placeholder="Contraseña" name="psw_repeat" required/>
                    <button type="submit" class="lore">
                        Regístrar
                    </button>
                    
                    
                </div>
                
            </form>
        </div>
        <!-- Fin registrar -->
  </div>
  <div id="deladmin" class="tabcontent">
           <h3>Borrar Admin</h3>
        <p>Administradores</p>
        <!-- tabla -->
        <!-- fin tabla-->
  </div>

</div>
<script>
function mostrar_contenido(evt, contenido) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(contenido).style.display = "block";
    evt.currentTarget.className += " active";
}

//Obtener el elemento con id = "defaultOpen" y hacer clic en él
document.getElementById("defaultOpen").click();
</script> 
    </body>
</html>
