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

	/////////////////////////////////////////////////////////////////////////
	Clase DEPARTAMENT
	=========================
	Clase para manejor departamentos

	Version: 0.1
	Creado: 20150302
	Autor: rbailonf@gmail.com
	Ultima Modificacion: 20150302
	/////////////////////////////////////////////////////////////////////////

*/

	class DEPARTAMENT {

		private static $list = array('' => '', 0 => '' );

		//********************************************
		static function getList(){

			global $DB;

			$rows = $DB->fetchAll(" SELECT * FROM tb_departamentos "); //showArray($row);

			if ($rows) {

				foreach ($rows as $key) {

					self::$list[$key['cod_departamento']] = $key['departamento'];
					
				}

				return self::$list;

			} else {

				SESSION::error("ERROR: No existe departamentos en tb_departamento ");

			}

		}
	}


?>