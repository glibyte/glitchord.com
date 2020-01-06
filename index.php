<?php session_start(); 
//error_reporting(0);
if (isset($_SESSION['usuario'])) {
    $session = $_SESSION['usuario'];
}else{
    $session=null;
}

include 'php/conexion.php';
include 'php/carrito_op.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            glitchord
        </title>
        <meta charset="utf-8"/>
        <!-- estilos -->
        <link rel="stylesheet" type="text/css" href="css/header.css"/>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link rel="stylesheet" type="text/css" href="css/buyboton.css"/>
        <link rel="stylesheet" type="text/css" href="css/icons.css"/>
        <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
        <link rel="stylesheet" type="text/css" href="css/footer.css"/>
        <link rel="stylesheet" type="text/css" href="css/flex_container.css"/>
        <link rel = "stylesheet" href = "css/redes_sociales.css"/>
        <link rel="stylesheet" type="text/css" href="css/login_signup.css"/>
        <link rel="stylesheet" type="text/css" href="css/parallax.css"/>
        <link rel="stylesheet" type="text/css" href="css/carrito.css">
        <!-- fin estilos -->
        <script type="text/javascript" src="script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="script/script.js"></script>

    </head>
    <body>
        <header>
            <h1>
                Glitchord GOODS
            </h1>
            <p>
                La mejor
                <b>
                    Música
                </b>
                para tus oidos.
            </p>
        </header>
        <nav>
            <ul>
                <li>
                    <a class="activo" href="#!">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="tienda.php">
                        Tienda
                    </a>
                </li>
                <li>
                    <a href="#!">
                        Ayuda
                    </a>
                </li>
                <?php if ( $session!=null ) { ?>
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
               
                <?php } ?>
                <?php if ( $session==null ) { ?>
                <li class="lrc">
                    <a onclick="document.getElementById('id01').style.display='block'">
                        Inicia sesión
                    </a>
                </li>
                <li class="lrc">
                    <a onclick="document.getElementById('id02').style.display='block'">
                        Regístrate
                    </a>
                </li>
                <?php } ?>
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
               <?php 
               if ($session==null) {
               ?>
              <button onclick="document.getElementById('id01').style.display='block'">Pagar</button>
            <?php 
        }else{
            ?>
               <!--   <a class="btn_pagar2" href="php/compras.php">  -->
              <a class="btn_pagar2" href="tarjeta.php">
              <button>Pagar</button>
             </a>
            <!--  </a> -->
          <?php }}else{
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
        <!-- fin carrito -->
        <!-- Iniciar sesión -->
        <div id="id01" class="modal">
            <form class="modal-content animate" action="php/validar_user.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Cancelar">
                        &times;
                    </span>
                    <img src="images/img_user2.png" alt="Avatar" class="avatar"/>
                </div>
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
                    <input type="password" placeholder="Contraseña" name="psw" required/>
                    <button type="submit" class="lore">
                        Inicia sesión
                    </button>
                    <label class="check">
                        <input type="checkbox" name="recordar1"/>
                        Recordar
                        <span class="checkmark">
                        </span>
                    </label>
                    <div class="me">
                        Aún no tienes una cuenta?
                        <a id="c1">
                            crear cuenta
                        </a>
                    </div>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                        Cancelar
                    </button>
                    <span class="psw">
                        Se te olvidó tu
                        <a href="#">
                            contraseña?
                        </a>
                    </span>
                </div>
            </form>
        </div>
        <script>
                // Obtener el modal
                var modal1 = document.getElementById('id01');
                // Cuando el usuario haga clic en cualquier lugar fuera del modal, ciérrelo
                window.onclick = function(event2) {
                    if (event2.target == modal1) {
                        modal1.style.display = "none";
                    }
                }      
        </script>
        <!-- cambiar de ventana -->
        <script type="text/javascript" src="script/cambiar_de_ventana1.js"></script>
        <!-- cambiar de ventana -->
        <!-- Fin Iniciar sesión -->
        <!-- Registrar -->
        <div id="id02" class="modal">
            <form class="modal-content animate" action="php/registrar.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Cancelar">
                        &times;
                    </span>
                    <img src="images/img_user2.png" alt="Avatar" class="avatar"/>
                </div>
                <div class="container">
                    <label for="uname">
                        <b>
                            Nombre de Usuario
                        </b>
                    </label>
                    <input type="text" placeholder="Usuario" name="uname" required/>
                    <label for="email">
                        <b>
                            Correo
                        </b>
                    </label>
                    <input type="text" placeholder="ejemplo@gmail.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="verifica tu correo" required/>
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
                        Regístrate
                    </button>
                    <label class="check">
                        <input type="checkbox" name="recordar2"/>
                        Recordar
                        <span class="checkmark">
                        </span>
                    </label>
                    <div class="me">
                        Ya tienes una cuenta?
                        <a id="c2">
                            Inicia sesión
                        </a>
                    </div>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">
                        Cancelar
                    </button>
                    <span class="psw">
                        Al crear una cuenta, usted acepta nuestros
                        <a href="privacy-policy.html">
                            Términos y Privacidad.
                        </a>
                    </span>
                </div>
                <!-- emnsaje para la contraseña -->
                <div id="message">
                    <h3>
                        La contraseña debe contener lo siguiente:
                    </h3>
                    <p id="number" class="invalid">
                        A
                        <b>
                            número
                        </b>
                    </p>
                    <p id="length" class="invalid">
                        Minimum
                        <b>
                            8 caracteres
                        </b>
                    </p>
                </div>
                <!-- script para registrar -->
                <script type="text/javascript" src="script/registrar_email_psw.js"></script>
                <!-- fin mensaje para la contraseña -->
            </form>
        </div>
        <!-- Fin registrar -->
        <!-- inicio contenido-->
        <section>
            <div class="flex-container">
                <?php
                include 'php/conexion.php';
                $re=$mysql->query("select * from productos")or die ($mysql-> error);
                            $mysql ->close();
                while ($f=$re->fetch_array()){
                ?>
                <!--inicio producto-->
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <?php if ($f['etiqueta_new']=="si") {?>

                        <!--inicio etiqueta NEW -->
                        <h1 class="new">
                            New
                            <span class="forma">
                            </span>
                        </h1>
                        <!--fin etiqueta NEW -->

                    <?php }?>
                        <img class="playeras" src="productos/<?php echo $f['imagen'];?>" alt="producto"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            <?php echo $f['descripcion'];?>
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $<?php echo $f['precio'];?>
                    </div>
                    <div>
                        <a href="?id=<?php echo $f['id'];?>">
                        <button class="button">
                            <span>   
                                &nbsp;Añadir&nbsp;
                            </span>
                        </button>
                    </a>
                    </div>
                    <!--fin cuadros-->
                </div>
                <!--fin producto-->
                <?php
            }
                ?>
                
                
                
            </div>
        </section>
        <!-- fin contenido-->
        <!-- tipo de seccion-->
        <div class="nomseccion">
            Lo mas Nuevo
        </div>
        <!-- fin tipo de seccion-->
        <!-- imagen -->
        <div class="parallax">
            <div class="parallax-text">
                <h1 style="font-size:50px">
                    Moda
                </h1>
                <p>
                    Future Bass - Trap  - Hip Hop - Chill Out
                </p>
            </div>
        </div>
        <!-- fin imagen -->
        <!-- inicio contenido-->
        <section>
            <div class="flex-container">
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <!--inicio etiqueta NEW -->
                        <h1 class="new">
                            New
                            <span class="forma">
                            </span>
                        </h1>
                        <!--fin etiqueta NEW -->
                        <img class="playeras" src="images/playeras/girl_white_3.png" alt="sudadera"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Sudadera
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $249.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/girl_gray_black_3.png" alt="sudadera"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Sudadera
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $249.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/girl_white_red_3.png" alt="sudadera"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Sudadera
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $249.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <!--inicio etiqueta NEW -->
                        <h1 class="new">
                            New
                            <span class="forma">
                            </span>
                        </h1>
                        <!--fin etiqueta NEW -->
                        <img class="playeras" src="images/playeras/girl_black_red_3.png" alt="sudadera"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Sudadera
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $249.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/girl_black_2.png" alt="sudadera"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Sudadera
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $249.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/girl_black_1.png" alt="camiseta"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Camiseta
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $139.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/girl_white_1.png" alt="camiseta"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Camiseta
                            Mujer
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $139.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <!--inicio etiqueta NEW -->
                        <h1 class="new">
                            New
                            <span class="forma">
                            </span>
                        </h1>
                        <!--fin etiqueta NEW -->
                        <img class="playeras" src="images/playeras/boy_black_1.png" alt="camiseta"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Camiseta
                            Hombre
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $139.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/boy_black_2.png" alt="camiseta"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Camiseta
                            Hombre
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $139.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
                <div>
                    <!--inicio cuadros-->
                    <div class="info_imagen">
                        <img class="playeras" src="images/playeras/boy_black_3.png" alt="camiseta"/>
                        <!--inicio info dentro de la imagen -->
                        <div class="overlay">
                            Camiseta
                            Hombre
                        </div>
                        <!--fin info dentro de la imagen -->
                    </div>
                    <div class="precio">
                        $139.99
                    </div>
                    <div>
                        <button class="button">
                            <span>
                                &nbsp;Comprar&nbsp;
                            </span>
                        </button>
                    </div>
                    <!--fin cuadros-->
                </div>
            </div>
        </section>
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
