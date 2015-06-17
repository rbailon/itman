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
	Clase PERSON y Clase USER
	=========================
	Manejo de personas y usuarios de la base de datos.

	Version: 0.1
	Creado: 20150218
	Autor: rbailonf@gmail.com
	Ultima Modificacion: 20150220
	/////////////////////////////////////////////////////////////////////////

*/

	class PERSON {

		static $tab_estado = array(
			 ''  => ''
			,'A' => 'Activo'
			,'C' => 'Baja'
		);


		//********************************************
		public function load(){

			global $DB;
			$row = $DB->fetch(" SELECT * FROM tb_personas WHERE cod_persona = ?", $this->id_persona); //showArray($row);

			if ($row) {

				$this->id_persona           = $row['cod_persona'];
				$this->nombre               = $row['nombre'];
				$this->apellido1            = $row['apellido1'];
				$this->apellido2            = $row['apellido2'];
				$this->dni                  = $row['dni'];
				$this->usuario              = $row['usuario'];
				$this->id_departamento      = $row['cod_departamento'];
				$this->id_centro            = $row['cod_centro'];
				$this->acceso_web           = $row['acceso_web'];
				$this->permisos             = $row['permisos'];
				$this->estado               = $row['estado'];

			} else {
				SESSION::error("ERROR: No existe persona para ID ".$this->id_persona);
			}

		}
	}


	class USER extends PERSON {


		//********************************************
		public function __construct($id_user=null) {

			if ($id_user) {
				$this->id_persona = $id_user; 
				$this->load();
			} else { exit(); }

		}

	}

?>