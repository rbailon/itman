<?php
/*

	Copyright (C) 2015

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

	// COMENTAR si no haga falta ver los ERRORES
	error_reporting(E_ALL ^ E_NOTICE); ini_set('display_errors', '1');
	// .........................................


	// Incluir ficheros base ...................
	include_once('./_cl/class.SESSION.php');
	include_once('./_cl/class.DBPDO.php');
	include_once('./_cl/class.PERSON.php');
	include_once('./_cl/class.DEPARTAMENT.php');
	include_once('./_cl/class.CENTER.php');
	//include_once('./_cl/class.MAIL.php');
	//include_once('./_cl/class.SMARTTAB.php');
	include_once('./_VARS&CONST.php');
	include_once('./_FUNCIONS.php');
	set_error_handler('errorHandler');
	// .........................................

	session_start();
	$Sess = new SESSION ();

	$errLogin = '0';

	// CERRAR SESSION Y BORRAR DATOS
	if (isset($_GET['out'])) {

		SESSION::destroy();
		header("Location:."); // Recarga index.php

	} elseif (SESSION::authenticate()) {

		$DB = new DBPDO();                      // Conectar a base de datos
		$oUser = new USER ($_SESSION['id']);        // Cargar usuario

		include_once('./apli.php');

		//----------------      ***************      ----------------
		//----------------         *********         ----------------
		//----------------            ***            ----------------

	} else {

		if (isset($_POST['life'])){

			if (isset($_POST['user']) && $_POST['user']) {

				// Conectar a la base de datos y comprobar
				// los datos de login (usuario y clave)
				$DB = new DBPDO();
				$row = $DB->fetch (" SELECT * FROM tb_persons WHERE user = '".$_POST['user']."' ");

				if($row) {

					if (isset($_POST['pass'])) {

						$row = $DB->fetch (" SELECT * FROM tb_persons WHERE user = '".$_POST['user']."' AND pass = md5('".$_POST['pass']."') ");

						if($row) {

							// DATOS DE LA SESSION INICIADA
							$_SESSION['id']             = $row['id'];
							$_SESSION['user']           = $row['user'];
							$_SESSION['userAgent']      = $_SERVER['HTTP_USER_AGENT'];
							$_SESSION['IPaddress']      = $_SERVER['REMOTE_ADDR'];
							$_SESSION['LastActivity']   = $_SERVER['REQUEST_TIME'];

							//$_SESSION[SKey]          = uniqid(mt_rand(), true);


							header("Location:"); // Recarga index.php
						} else {
							$errLogin = "Contraseña incorrecta";
						}
					}
				} else {
					$errLogin = "El usuario no existe";
				}
			} else {
				$errLogin = "Debe introducir sus datos de identificación";
			}
		}

		//SESSION::error("ERROR: No existe centros en tb_centros ");

		// Pantalla de login
		include_once ("login.php");

	}

	//Desconectamos la base de datos
	if (isset($DB)) { $DB = null; }



?>
