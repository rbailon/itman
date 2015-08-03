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


	class PERSON {

		static $tab_estado = array(
			 ''  => ''
			,'A' => 'Activo'
			,'C' => 'Baja'
		);


		//********************************************
		static function getAll() {

			global $DB;

			$rows = $DB->fetchAll (" SELECT * FROM tb_personas ORDER BY apellido1, apellido2, nombre ");

			return $rows;

		}


		//********************************************
		static function get($id) {

			global $DB;
			$row = $DB->fetch(" SELECT * FROM tb_persons WHERE id = ?", $id);

			if ($row) {
				return $row;
			} else {
				SESSION::error("ERROR: No existe persona para ID ".$id);
			}
		}


		//********************************************
		public function load() {

			global $DB;
			$row = $DB->fetch(" SELECT * FROM tb_persons WHERE id = ?", $this->id_persona);

			if ($row) {

				$this->id 			         = $row['id'];
				$this->user               	= $row['user'];
				$this->name            		= $row['name'];
				$this->surname            	= $row['surname'];
				$this->phone               = $row['phone'];
				$this->departament         = $row['departament'];
				$this->center      			= $row['center'];
				$this->rol            		= $row['rol'];
				$this->state           		= $row['state'];
				$this->last_login          = $row['last_login'];
				$this->date_discharge		= $row['date_discharge'];
				$this->user_discharge      = $row['user_discharge'];
				$this->date_mod            = $row['date_mod'];
				$this->user_mod            = $row['user_mod'];

			} else {
				SESSION::error("ERROR: No existe persona para ID ".$this->id_persona);
			}
		}


		//********************************************
		static function form() {
		   global $globs, $oUser;


		   $options_departaments = '<option value="0"></option>';
		   foreach(DEPARTAMENT::getIDs() as $key => $value)
		      $options_departaments .= '<option value="'.$key.'">'.$value.'</option>';

		   $options_centers = '<option value="0"></option>';
		   foreach(CENTER::getIDs() as $key => $value)
		      $options_centers .= '<option value="'.$key.'">'.$value.'</option>';

		   $options_emails = '<option value="0"></option>';
		   foreach(MAIL::getIDs() as $key => $value)
		      $options_emails .= '<option value="'.$key.'">'.$value.'</option>';

		   if($oUser->authorized[PU_MODI_PERSONA])
		      $b = '&nbsp;&nbsp;<span onclick=persona.addMail(); class="boton bt h">&nbsp;+&nbsp;</span>';

		   $s .= '
			<h1></h1>
			<h1>Datos personales<div>^</div></h1>
			<div id="fPerson" class="dficha">

					<div class="form">

						<ul>
							<li><label>Id:</label><input disabled class="" type="text" size="5" id="id_person"></li>
							<li>&nbsp;</li>
							<li><label>Nombre:</label><input class="bool" type="text" size="15" id="name"></li>
							<li>&nbsp;</li>
							<li><label>Apellidos:</label><input class="bool" type="text" size="30" id="surname"></li>
							<li>&nbsp;</li>
							<li><label>Departamento:</label><select class="bool" id="id_departament">'.$options_departaments.'</select></li>
							<li>&nbsp;</li>
							<li><label>Centro:</label><select class="bool" id="cp_cod_centro">'.$options_centers.'</select></li>
							<li>&nbsp;</li>
							<li><label>Usuario:</label><input class="bool" type="text" size="15" id="user"></li>
						</ul>

						<div class="subform">
							<br><br>
							<span class=h3>Emails relacionados'.$b.'</span>
							<br><br>

							<div id=emails style="text-align:center;">
								<select disabled class=h id="cpb_cod_email">'.$options_emails.'</select>
								<ul><li class="l h"></li></ul>
							</div>
						</div>

						<div class="subform">
							<br><br><span class=h3>Permisos</span><br><br>

							<table id=pu class=pu>
							<thead>
								<tr>
									<th width=20%></th>
									<th width=20% class=c>Alta</th>
									<th width=20% class=c>Baja</th>
									<th width=20% class=c>Modificación</th>
									<th width=20% class=c>Consulta</th>
								</tr>
							</thead>
							<tbody>



							</tbody>
							</table>
						</div>
					</div>

			</div>
			<h1>Emails relacionados</h1>

			<div class="submit">
				<ul>
					<li><div class="bt" onclick="alert(\'hi\');">Editar</div></li>
					<li><div class="bt" onclick="alert(\'hi\');">Aceptar</div></li>
					<li><div class="bt" onclick="$(\'#vFicha\').toggle();">Cancelar</div></li>
				</ul>
			</div>

<!--
	<div id="tabs">
	  <ul>
	    <li><a href="#fragment-1"><span>Tabla</span></a></li>
	    <li><a href="#fragment-2"><span>Ficha</span></a></li>
	    <li><a href="#fragment-3"><span>Three</span></a></li>
	  </ul>
	  <div>
		  <div id="fragment-1">



		      <h1></h1>
		  </div>
		  <div id="fragment-2">
		    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
		    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
		  </div>
		  <div id="fragment-3">
		    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
		    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
		    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
		  </div>
		</div>
	</div>

	<script>$( "#tabs" ).tabs();</script>
-->
		   ';

		   return $s;
		}
	}


	class USER extends PERSON {


		//********************************************
		public function __construct($id_user=null) {

			global $DB;

			if ($id_user) {
				$this->id_persona = $id_user;
				$this->load();

			$row = $DB->fetch(" SELECT * FROM tb_rols WHERE id = ?", $this->rol); //showArray($row);

			if ($row) {

				$this->authorized 		= $row['authorization'];

			} else {
				SESSION::error("ERROR: No existe rol ID ".$this->rol);
			}


			} else { exit(); }

		}

	}

?>
