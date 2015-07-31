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

    //************************************************************************************
    function fmto_DD_MM_AAAA($f) {
        $s='';

        switch(strlen($f))
        {
            case 19://TIMESTAMP
                return substr($f,5,2)."-".substr($f,2,2)."-".substr($f,0,4);
                break;

            default: return $f;
        }
    }


    //************************************************************************************
    // Ver el contenido de un array u objeto. El 2º argumento dice si terminar el programa
    function show($obj, $k = 0) {


      global $err;
     	$s = '';

		$s = '<pre>' . print_r($obj, true) . '</pre>';

		if(!$k) {
			echo $s;
			exit();
		} else {
			$err .= ($err)?"<br>".$s:$s;
		}
   }


   //**********************************************************************************
	function errorHandler( $errno, $errstr, $errfile, $errline, $errcontext)
	{
	   global $err;

		// errno: El primer parámetro, errno, contiene el nivel del error ocasionado, como un valor de tipo integer.
		// errstr: El segundo parámetro, errstr, contiene el mensaje de error, como cadena.
		// errfile: El tercer parámetro es opcional, errfile, que contiene el nombre de archivo que ocasionó el error, como cadena.
		// errline: El cuarto parámetro es opcional, errline, que contiene el número de línea donde ocurrió el error, como valor de tipo integer.
		// errcontext: El quinto parámetro es opcional, errcontext, el cuál es una matriz que apunta a la tabla de símbolos activa en el punto
		// 				donde ocurrió el error. En otras palabras, errcontext contendrá una matriz con cada variable que existe en el ámbito donde el error
		// 				fue provocado. El gestor de errores de usuario no debe modificar el contexto del error.

		//if($errno != 8)
		switch ($errno) {
			case 2:
				$errno = "WARNING";
				break;
			case 8:
				$errno = "NOTICE";
				break;

			default: break;
		}
		if($err) $err .= "<br>";
		$err .= 'Type: <b>'. $errno .'</b> '. $errstr .' <b>'. $errfile .'</b> line <b>'. $errline .'</b>';
		//"\n\n---ERRCONTEXT---\n".print_r( $errcontext, true).
		// "\n\nBacktrace of errorHandler()\n".
		// print_r( debug_backtrace(), true);
	}

?>
