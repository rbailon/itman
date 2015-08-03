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
	if(isset($Sess->data['ajax'])) {

		switch($Sess->clas) {

			case "001": // FORMs
				$out = PERSON::form();

				echo $out;
				break;


			case "002": // PERSON
				switch ($Sess->oper) {
					case '01':// Devolver lista completa
						$out = PERSON::getAll();

						echo json_encode($out);
						break;

					case '02': // Devolver persona
						if (!$Sess->data['id']) {
							$Sess->data['id'] = $oUser->id;
						}

						$out = PERSON::get($Sess->data['id']);
						echo json_encode($out);
						break;

					default: break;
				}
				break;

			case "003": // MAIL
					$out = MAIL::getAll();
					echo json_encode($out);
				break;

			case "011": // DEPARTAMENT
				$out = DEPARTAMENT::getIDs();

				echo json_encode($out);
				break;


			case "012": // CENTER
				$out = CENTER::getIDs();

				echo json_encode($out);
				break;


			default:
				echo "No case OPER: ".$Sess->oper;
				break;
		}

		exit;
	}

	$sal = '';

	require "./_HEAD.php";
	require "./_MENU.php";
/*
	 switch($Sess->c_oper) {

		  case "001": $program = "./_p/resumen.php"; break;
		  case "002": $program = "./_p/persons.php"; break;
		  case "003": $program = "./_p/mails.php"; break;
		  case "004": $program = "./_p/computers.php"; break;
		  case "006": $program = "./_p/tickets.php"; break;

		  default:
	 }

	 if (file_exists($program)) {
		  require $program;
	 } else {
		  $sal .= "File not exit: $program";
	 }
/*
	 if(!isset($Sess->dato['c_ajax'])) {
	 } else
*/

	 require "./_FOOD.php";

	 $sal .= "<div id=\"page\"></div>";

	 echo $sal;

	 //$sal = eregi_replace("[\n|\r|\n\r]", ' ', $sal);




//#####################################################################################################################
//## F U N C I O N E S
//#####################################################################################################################


?>
