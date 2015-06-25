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
	
	PERSONS.php
	===================
	Tratamiento de los datos de personas

*/


	$tb1 = new SMARTTAB ('persons','table table-hover table-condensed ');

	$tb1->head('', 'c b tHead', '2%', 'ID');
	$tb1->head('', 'l b tHead', '', 'NOMBRE');
	//$tb1->head('', 'l b tHead', '', 'APELLIDO1');
	//$tb1->head('', 'l b tHead', '', 'APELLIDO2');
	//$tb1->head('', 'c b tHead', '', 'DNI');
	$tb1->head('', 'c b tHead', '', 'USUARIO');
	//$tb1->head('', 'c b tHead', '', 'PASS');
	$tb1->head('', 'c b tHead', '1%', 'DEPARTAMENTO');
	$tb1->head('', 'c b tHead', '5%', 'CENTRO');
	//$tb1->head('', 'c b tHead', '', 'WEB');
	//$tb1->head('', 'c b tHead', '', 'PERMISOS');
	//$tb1->head('', 'c b tHead', '', 'ESTADO');


	$listDepartamentos 	= DEPARTAMENT::getList();
	$listCentros		= CENTER::getList();


	$rows = $DB->fetchAll (" SELECT * FROM tb_personas ORDER BY apellido1, apellido2, nombre LIMIT 0,25 ");


	//showX($rows);
	if(isset($rows)) {

		for ($i=0; $i < count($rows); $i++) { 

			$class = '';
			
			if ($rows[$i]['usuario'])           $class .= " success ";
			if ($rows[$i]['estado'] == 'C')     $class .= " danger ";

			$tb1->row($rows[$i]['cod_persona'], $class);

			$tb1->cell('',"c ",'',$rows[$i]['cod_persona']);
			$tb1->cell('',"l b",'',$rows[$i]['apellido1']." ".$rows[$i]['apellido2'].", ".$rows[$i]['nombre']);
			//$tb1->cell('',"l b",'',$rows[$i]['apellido1']);
			//$tb1->cell('',"l b",'',$rows[$i]['apellido2']);
			//$tb1->cell('',"c",'',$rows[$i]['dni']);
			$tb1->cell('',"c b",'',$rows[$i]['usuario']);
			//$tb1->cell('',"c",'',$rows[$i]['pass']);
			$tb1->cell('',"l",'',$listDepartamentos[$rows[$i]['cod_departamento']]);
			$tb1->cell('',"l",'',"<nobr>".$listCentros[$rows[$i]['cod_centro']]."</nobr>");
			//$tb1->cell('',"b",'',$rows[$i]['acceso_web']);
			//$tb1->cell('',"r",'',$rows[$i]['permisos']);
			//$tb1->cell('',"c",'',PERSON::$tab_estado[$rows[$i]['estado']]);

		}

		$sal .= "

<script src=\"_p/persons.js\"></script>
<script>
	$(document).ready(function(){ 		
		persons.x();
		$(\"#persons\").DataTable();
		$(\"#buscar\").focus();
	});
		
</script>

		<div class=\"panel panel-default\">

			<div class=\"panel-heading\">PERSONAS</div>
			<div class=\"panel-body\">
			
				<div class=\"r\">
					<FORM>
						<input id=\"buscar\" placeholder=\"buscar...\" size=\"15\">
					</FORM>
				</div>
			
			</div>

		"
		.$tb1->pintar()
		."</div>";


	}

	

?>