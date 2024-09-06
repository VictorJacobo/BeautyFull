<?php

		$servername = 'localhost';
		//$servername = '172.31.0.134';
		$database = 'login_reg';
		$username = 'root';
		$password = '';

		// Crear conexion
        $conexion = mysqli_connect($servername, $username, $password,$database)
/*		if (!($conexion))
		{
			print("Error al conectarse a la Base de datos.");
		}
		else
		{
			print("Conexion exitosa.");
		}

		//Conexion a la Base de Datos
		if (!mysqli_select_db($conexion, $database))
		{
			print("Error al seleccionar la base de datos. <br>");
			exit();
		}
		else
		{
			print("Conexion exitosa a la base de datos [$database]. <br>");
		}

		return $conexion;
        */
?>


