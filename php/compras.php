<?php
session_start();
include"conexion.php";
  $arreglo=$_SESSION['carrito'];
  $numventa=0;
  $re=$mysql->query("select * from compras order by numventa DESC limit 1") or die($mysql-> error);
  while ($f=$re->fetch_array()) {
                        $numventa=$f['numventa'];
                    }
                    if ($numventa==0) {
                    	$numventa=1;
                    }else{
                    	$numventa++;
                    }
                    for ($i=0; $i <count($arreglo) ; $i++) { 
                    	$mysql->query("insert into compras (numventa, imagen, nombre, precio, cantidad, subtotal) values (
                    		".$numventa.",
                    		'".$arreglo[$i]['Imagen']."',
                    		'".$arreglo[$i]['Nombre']."',
                    		".$arreglo[$i]['Precio'].",
                    		".$arreglo[$i]['Cantidad'].",
                    		".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."
                    	)")or die ($mysql-> error);
                    }
                    //destruir la variable de sesion
                    unset($_SESSION['carrito']);
                    header("location:../?=pagado");
?>