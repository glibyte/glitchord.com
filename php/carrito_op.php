<?php
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
                $arreglo=$_SESSION['carrito'];
                $encontro=false;
                $numero=0;
                for ($i=0; $i <count($arreglo) ; $i++) { 
                    if ($arreglo[$i]['Id']==$_GET['id']) {
                        $encontro=true;
                        $numero=$i;
                    }
                }
                if ($encontro==true) {
                    $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                    $_SESSION['carrito']=$arreglo;
                }else{
                    $nombre="";
                    $precio=0;
                    $imagen="";
                    $re=$mysql->query("select * from productos where id=".$_GET['id']);
                    while ($f=$re->fetch_array()) {
                        $nombre=$f['descripcion'];
                        $precio=$f['precio'];
                        $imagen=$f['imagen'];
                    }
                    $datosNew=array('Id'=>$_GET['id'],
                                     'Nombre'=>$nombre,
                                      'Precio'=>$precio,
                                      'Imagen'=>$imagen,
                                      'Cantidad'=>1);
                    array_push($arreglo, $datosNew);
                    $_SESSION['carrito']=$arreglo;
                }
    }
}else{
    if (isset($_GET['id'])) {
        $nombre="";
        $precio=0;
        $imagen="";
        $re=$mysql->query("select * from productos where id=".$_GET['id']);
        while ($f=$re->fetch_array()) {
            $nombre=$f['descripcion'];
            $precio=$f['precio'];
            $imagen=$f['imagen'];
        }
        $arreglo[]=array('Id'=>$_GET['id'],
                         'Nombre'=>$nombre,
                          'Precio'=>$precio,
                          'Imagen'=>$imagen,
                          'Cantidad'=>1);
        $_SESSION['carrito']=$arreglo;
    }
}
?>