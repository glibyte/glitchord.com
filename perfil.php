<?php 
session_start(); 
//error_reporting(0);
$session=null;
$email=null;
if (isset($_SESSION['usuario'])) {
$session = $_SESSION['usuario'];
    $email=$_SESSION['email'];
}else{
    header("location:index.php");
        die();
}
    
include 'php/conexion.php';
include 'php/carrito_op.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $session?></title>
	<meta charset="utf-8"/>
        <!-- estilos -->
        <link rel="stylesheet" type="text/css" href="css/header.css"/>
        <link rel="stylesheet" type="text/css" href="css/icons.css"/>
        <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
        <link rel="stylesheet" type="text/css" href="css/footer.css"/>
        <link rel = "stylesheet" href = "css/redes_sociales.css"/>
        <link rel="stylesheet" type="text/css" href="css/login_signup.css"/>
        <link rel="stylesheet" type="text/css" href="css/perfil.css">

        <link rel="stylesheet" type="text/css" href="css/carrito.css">
        <!-- fin estilos -->
        <script type="text/javascript" src="script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="script/script.js"></script>
</head>
<body>
        <header>
            <h1>
                <?php echo $session?>
            </h1>
            <p>
                <?php echo $email?>
            </p>
        </header>
        <nav>
            <ul>
                <li>
                    <a class="activo" href="index.php">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="#!">
                        Tienda
                    </a>
                </li>
                <li>
                    <a href="#!">
                        Ayuda
                    </a>
                </li>
               
                <li class="lrc">
                    <a onclick="myFunction2()">
                    <?php echo $session?>
                    </a>
                    <div class="dropdown">
                    <div id="myDropdown" class="dropdown-content">
                    <a href="perfil.php">Mi cuenta</a>
                    <a href="php/cerrar_session.php">Cerrar sesión</a>
                    </div>
                </div>
                <!-- para mostrar conetenido del boton -->
                <script type="text/javascript" src="script/btn_usuario.js"></script>
                <!-- para mostrar conetenido del boton -->
                </li>           
                <li class="carrito">
                    <a class="icon icon-cart" onclick="openNav()">
                        <?php
                        if (isset($_SESSION['carrito'])){
                            $datos_c=$_SESSION['carrito'];
                            $contador=0;
                            for($i=0;$i<count($datos_c);$i++){

                            ?>
                        <span id="badge">
                            <?php echo $contador=($datos_c[$i]['Cantidad']+$contador);?>
                        </span>
                        <?php }}?>
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- carrito -->
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h1 class="titulo">Carrito</h1>
          <?php
            $total=0;
          if (isset($_SESSION['carrito'])) {
            $datos_c=$_SESSION['carrito'];
            $total=0;
            for($i=0;$i<count($datos_c);$i++){

            ?>
            <div class="productos_c">
                <img src="productos/<?php echo $datos_c[$i]['Imagen'];?>">
                <span class="nombre"><?php echo $datos_c[$i]['Nombre'];?></span>
                <span class="precio">$ <?php echo $datos_c[$i]['Precio'];?></span>
                <div class="cantidad">
                <span>Cantidad:
                    <input class="cantidad_in" type="text" value="<?php echo $datos_c[$i]['Cantidad'];?>"
                    data-precio="<?php echo $datos_c[$i]['Precio'];?>"
                    data-id="<?php echo $datos_c[$i]['Id'];?>">
                </span>
                <span class="subtotal">Subtotal: <?php echo $datos_c[$i]['Cantidad']*$datos_c[$i]['Precio'];?></span>
                <a  class="en_eliminar" data-id="<?php echo $datos_c[$i]['Id'];?>">&times;</a>
            </div>
            </div>
            <?php
            $total=($datos_c[$i]['Cantidad']*$datos_c[$i]['Precio'])+$total; 

               } ?>
               <h2 id="total">Total: <?php echo $total ?></h2>
            
               <!--   <a class="btn_pagar2" href="php/compras.php">  -->
              <a class="btn_pagar2" href="tarjeta.php">
              <button>Pagar</button>
             </a>
            <!--  </a> -->
          <?php }else{
          ?>
          <h2>No hay nada :(</h2>
      <?php } ?>
         </div>
   <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
          }

          function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
          }
   </script>
   <script>
                window.onclick = function(event2) {}
                        </script>
        <!-- fin carrito -->
        <!-- inicio contenido-->
<div class="row">
  <div class="side">
  	<div class="imgcontenedor">
  		<img src="images/img_user2.png" alt="avatar" class="avatar">
  	</div>
      <h2 class="nomus"><?php echo $session?></h2>
      <div class="menu_left">
  <a class="tablinks" onclick="mostrar_contenido(event, 'mid')" id="defaultOpen">Mis datos</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'mip')">Mis pedidos</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'mic')">Mis compras</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'mep')">Metodos de pago</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'cec')">Cerrar sesión</a>
</div>
  </div>
  <div class="main">
  
  <div id="mid" class="tabcontent">
           <h2>Mis datos</h2>
        <h5>Informacion personal</h5>
        <!-- info -->
        <div class="fakeimg" style="height:200px;">//Datos</div>
        <p>Mantenimiento..</p>
        <p>Un poco de texto.</p>

        <!-- fin info-->
  </div>


  <div id="mip" class="tabcontent">
           <h2>Mis pedidos</h2>
        <h5>Pedidos recientes</h5>
        <!-- info -->
         <div class="fakeimg" style="height:200px;">//Datos</div>
        <p>Mantenimiento..</p>
        <p>Un poco de texto.</p>

        <!-- fin info-->
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
</div>
        <!-- fin contenido-->
        <footer>
            <div class="columna">
                <div class="fila">
                    <div class="columna">
                        <h5>
                            Información
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="#!">
                                        Sobre nosotros
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        codigos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna">
                        <h5>
                            Legal
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="terms-and-conditions-of-use.html">
                                        Términos y condiciones de uso
                                    </a>
                                </li>
                                <li>
                                    <a href="privacy-policy.html">
                                        Política de privacidad
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Información de Copyright
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna">
                        <h5>
                            Ayuda
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="#!">
                                        Soporte
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Contáctanos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna">
                        <h5>
                            Equipo
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="#!">
                                        Ruiz Pacheco Jesús Alberto
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Cabrera Bravo Victor Manuel
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Jose Ramon Hernandez Padilla
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Cabrera Torres Moises Alexis
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna social">
                        <h5>
                            Redes Sociales
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/glitchord/" target="_blank" class="icon-facebook">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/glitchord/" target="_blank" class="icon-twitter">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/glitchord/" target="_blank" class="icon-instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" target="_blank" class="icon-spotify">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" target="_blank" class="icon-soundcloud">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fila">
                    <h6>
                        © 2018, Glitchord Records S.L. Copyright.
                    </h6>
                </div>
            </div>
        </footer>
    </body>
</html>
