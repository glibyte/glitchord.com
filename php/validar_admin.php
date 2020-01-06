<?php
session_start();
$uname=$_POST['uname'];
$psw=md5($_POST['psw'],30);

include'conexion.php';
if ($mysql-> connect_error) 
	die("Se perdio la conexion, vuelve a inetntarlo");

	$info=$mysql->query("select * from admins where uname='$uname' and psw='$psw'")
	or die ($mysql-> error);

	$filas=mysqli_num_rows($info);

	if ($filas>0) {
		header("location:../panelcontrol.php");
		//variable de session
        $_SESSION['admin']=$uname;
	}else{
		header("location:../admin.php?=error");
	}
	mysqli_free_result($info);
	$mysql ->close();


?>