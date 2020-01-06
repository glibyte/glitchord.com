<?php
	include("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_POST['psw']==$_POST['psw_repeat']) {
	              $uname = $_POST['uname'];
	              $email = $_POST['email'];
	              $psw = md5($_POST['psw'],30); //md5 hash password security

 	                  if ($mysql-> connect_error){ 
	                     	die("Se perdio la conexion, vuelve a inetntarlo");
	                                      	//error
	         		      }else{
	                     	$mysql->query("insert into usuarios (uname, email, psw) values ('$uname','$email','$psw')")
		                    or die ($mysql-> error);
		                    $mysql ->close();

		                      header("location:../index.php");
		                      //listo
                             session_start();
		                      //variable de session
                              $_SESSION['usuario']=$uname;

                              //capturara el email
                              $_SESSION['email']=$email;
		                }


        }else{
            header("location:../index.php?=error");
            //la contraseña no es igual
          }
}

?>