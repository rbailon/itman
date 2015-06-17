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
    APLI.php
    ===================
    Programa principal

    Version: 0.1
    Creado: 20150220
    Autor: rbailonf@gmail.com
    Ultima Modificacion: 20150220
    /////////////////////////////////////////////////////////////////////////

*/
    require "./_esq0.php";
    require "./_MENU.php";
    require "./_esq1.php";

    $sal = '';

/*  if($oUser->permisos[PU_CONS_PERSONA]) */
   
    switch($Sess->c_oper) {

        case "001": $program = "./_p/resumen.php"; break;
        case "002": $program = "./_p/persons.php"; break;
        case "003": $program = "./_p/mails.php"; break;
        case "004": $program = "./_p/computers.php"; break;
        case "006": $program = "./_p/tickets.php"; break;

        default:
    }//*/

    if (file_exists($program)) { 
        require $program;
    } else { 
        echo "File not exit: $program";
    }

    if(!isset($Sess->dato['c_ajax'])) {
    } else
    echo $sal;

    //$sal = eregi_replace("[\n|\r|\n\r]", ' ', $sal);
    



    require "./_esq9.php";





//#####################################################################################################################
//## F U N C I O N E S
//#####################################################################################################################


?>

