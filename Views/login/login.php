<?php session_start();
	try {
		$error = '';
		$enviar='';
		$enviado='';

		$conexion = new PDO('mysql:host=localhost;dbname=restaurant', 'root','');//aqui tambien
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nombreusuario = $_POST['nombreusuario'];
			$password = $_POST['password'];
     $sql = $conexion->prepare('SELECT * FROM usuarios WHERE nombreusuario = :nombreusuario AND 
     	                        password = :password');
     $sql->execute(array(':nombreusuario'=>$nombreusuario,
     	                  ':password'=>$password));

     $resultado = $sql->fetch();
        if ($resultado != false) {
	      $_SESSION['nombreusuario'] = $nombreusuario;
	      $enviar .=  '<center> Bienvenido <br>'. ucwords($resultado['nombreusuario']). '</center> <br>';
	      $enviar .= '<meta http-equiv="refresh" content="4;url=../../index">';
	      $enviado .= '<center><i class="fa fa-cog fa-spin fa-3x fa-fw"></i><br>
	                  <span class="">Accediendo Al Sistema...</span></center><br>';
	   
   } else {
   $error .= '<li class="alert alert-danger"> Revisa los datos ingresados </li>';
   
}

		}
	} catch (Exception $e) {
		echo "Problemas con la conexión a la base de datos.";
	}


	






	require 'login.view.php';
 ?>