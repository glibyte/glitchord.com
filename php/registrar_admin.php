<?php
	$mysql =new mysqli("localhost","root","","glitchord");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_POST['psw']==$_POST['psw_repeat']) {
	              $uname = $_POST['uname'];
	              $psw = md5($_POST['psw'],30); //md5 hash password security

 	                  if ($mysql-> connect_error){ 
	                     	die("Se perdio la conexion, vuelve a inetntarlo");
	                                      	//error
	         		      }else{
	                     	$mysql->query("insert into admins values (null,'$uname','$psw')")
		                    or die ($mysql-> error);
		                    $mysql ->close();

		                      header("location:../panelcontrol.php#registrado");
		                      //listo
		                }


        }else{
            header("location:../panelcontrol.php#error");
            //la contraseña no es igual
          }
}

?>