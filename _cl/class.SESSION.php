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


//================================
class SESSION {

	private static $debug = 0;      // [0]NO muestra información [1]Muestra información
	private static $time = 3600;    // Tiempo sin interactuar 3600seg = 1h
	public $oper = 0;             // Codigo de operación
	public $data = array();         // Array de datos del objeto SESSION


	public function __construct() {

		if ($_GET) {
			$this->data = $_GET;
		} else {
			$this->data = $_POST;
		}

		// Si existe el kn (kerberos number) de la URL, se desgrana
		/*
			CODIGOS DE OPERACION [oper]
				000

		*/
		if (isset($this->data['kn'])) {

			$this->clas   =  substr($this->data['kn'], 0,3);
			$this->oper   =  substr($this->data['kn'], 4,5);

		} else {

			// Valores por defecto
			$this->oper   = "001";

		}
	}


	//**********************************************************************
	// Comprobar si se ha iniciado la sessión
	public static function authenticate() {

		if (self::$debug) {

			showX($_SESSION, 1);
		}

		if(isset($_SESSION['id']) && $_SESSION['user'] && $_SESSION['LastActivity']) {

			if(isset($_SESSION['LastActivity'])) {

				$t = time() - $_SESSION['LastActivity'];
				if ($t > self::$time) {
					// Si se ha superado el limite de tiempo sin trabajar, se cierra la sessión
					self::destroy();

				} else $_SESSION['LastActivity'] = time();
			}

			return true;

		} else return false;

	}


	//**********************************************************************
	// Cerrar la sesion activa
	public static function destroy() {

		$user = $_SESSION['user'];
		session_unset();
		session_destroy();
		session_start();
		session_regenerate_id(true);

		trigger_error("Sesion $user cerrada ", E_USER_NOTICE);

	}


	//**********************************************************************
	// Enviar el error al registro de php
	public static function error($error = null) {

		$caller = debug_backtrace();
		$in = ' in <strong>'.$caller[0]['file'].'</strong> on line <strong>'.$caller[0]['line'].'</strong> ';

		if(isset($error))
			trigger_error($error.$in, E_USER_WARNING);

	}

}

?>
