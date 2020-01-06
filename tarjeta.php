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
        <link rel="stylesheet" type="text/css" href="css/tarjeta.css">
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
                            for($i=0;$i<count($datos_c);$i++){

                            ?>
                        <span id="badge">
                            <?php echo $datos_c[$i]['Cantidad'];?>
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
              <a class="btn_pagar2" href="perfil.php">
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
<!-- -->
<div class="main">
<h2>Metodo de pago</h2>
<p>Tarjeta</p>
<div class="row2">
  <div class="col-75">
    <div class="container2">
      <form action="/action_page.php">
      
        <div class="row2">
          <div class="col-50">
            <h3>Dirección de Envio</h3>
            <label for="fname"><i class="icon icon-user"></i> Nombre completo</label>
            <input type="text" id="fname" name="firstname" placeholder="Jesús A. Ruiz">
            <label for="email"><i class="icon icon-envelop"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="ruiz@example.com">
            <label for="adr"><i class="icon icon-location"></i> Dirección</label>
            <input type="text" id="adr" name="address" placeholder="62 W. 17th Street">
            <label for="city"><i class="icon icon-office"></i> Ciudad</label>
            <input type="text" id="city" name="city" placeholder="México">

            <div class="row2">
              <div class="col-50">
                <label for="state">Estado</label>
                <input type="text" id="state" name="state" placeholder="Michoacan">
              </div>
              <div class="col-50">
                <label for="zip">CP / Zip</label>
                <input type="text" id="zip" name="zip" placeholder="59374">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Pago</h3>
            <label for="fname">Tarjetas aceptadas</label>
            <div class="icon-container">
              <i class="icon icon-credit-card" style="color:navy;"></i>
              <i class="icon icon-credit-card" style="color:blue;"></i>
              <i class="icon icon-credit-card" style="color:red;"></i>
              <i class="icon icon-credit-card" style="color:orange;"></i>
            </div>
            <label for="cname">Nombre en la tarjeta</label>
            <input type="text" id="cname" name="cardname" placeholder="Jesús Ruiz">
            <label for="ccnum">Número de tarjeta</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Mes</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row2">
              <div class="col-50">
                <label for="expyear">Año</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Dirección de envío igual a la facturación
        </label>
         
         <a class="btn_pagar2" href="php/compras.php">
       <!-- <input type="submit" value="Confirmar" class="btn"> -->
      <div class="btn">
          Pagar
      </div>
        </a>       
         
    </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container2">
        <?php
          if (isset($_SESSION['carrito'])) {
            $datos_c=$_SESSION['carrito'];

            ?>
        <h4>Cart <span class="price" style="color:black"><i class="icon icon-cart"></i> <b><?php echo count($datos_c)?></b></span></h4>
         <?php 
            for($i=0;$i<count($datos_c);$i++){

            ?>
            <div class="productos_c">
                  
                  <p><?php echo $datos_c[$i]['Nombre'];?><span class="price">$ <?php echo $datos_c[$i]['Precio'];?></span></p>
            </div>
            <hr>
            <?php 
               } ?>
      <p>Total <span class="price" style="color:black"><b>$<?php echo $total ?></b></span></p>
  <?php } else{
          ?>
          <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>0</b></span></h4>
              <p>No hay productos :(</p>
          <?php 
      }

          ?>
    </div>
  </div>
</div>

</div>

<!-- -->
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
