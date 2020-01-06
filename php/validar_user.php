<?php
session_start();
$uname=$_POST['uname'];
$psw=md5($_POST['psw'],30);
include("conexion.php");
if ($mysql-> connect_error) {
                    die("UPS! Se perdio la conexion, vuelve a inetntarlo");
                }
	$info=$mysql->query("select * from usuarios where uname='$uname' and psw='$psw'")
	or die ($mysql-> error);

	$filas=mysqli_num_rows($info);

	if ($filas>0) {
		header("location:../index.php");
		//variable de session
        $_SESSION['usuario']=$uname;

        //capturara el email
        $data=$info->fetch_array();
        $_SESSION['email']=$data["email"];
	}else{
		header("location:../index.php?=error");
	}
	mysqli_free_result($info);
	$mysql ->close();


?>
