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
    _FUNCIONS.php
    ===================
    Funciones Generales

    Version: 0.1
    Creado: 20150218
    Autor: rbailonf@gmail.com
    Ultima Modificacion: 20150220

    20080000 - FUNCTION outChorizo         =>
    20080000 - FUNCTION inChorizo          =>
    20080000 - FUNCTION usuarioValidado    =>
    20080000 - FUNCTION datosCookie        =>
    20080000 - FUNCTION fmto_DD_MM_AAAA    => Convertir un TIMESTAMP en formato DD-MM-AAAA
    20150214 - FUNCTION showX (object, [bool])

    /////////////////////////////////////////////////////////////////////////

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
    function showX($obj, $k = 0) {
   
        echo '<pre>'; print_r($obj); echo '</pre>';
   
        if (!$k) { exit(); }

    }

    //**********************************************************************************
    function inChorizo(){
        
        $ch = $oEnt->dato['ch'];

        $oEnt->dato['c_lg']     = substr($ch, 0,2);
        //$oUser->cod_usuario     = substr($ch, 2,3);
        $oEnt->dato['c_mod']    = substr($ch, 5,3);
        $oEnt->dato['c_sec']    = substr($ch, 8,3);

        //echo  ">>>>".$oEnt->dato['c_lg']."-".$oEnt->dato['c_mod']."-".$oEnt->dato['c_sec'];
    }
/*/////////////////////////////////////////////////////////////////////////////////////

//**********************************************************************************
/*function outChorizo(){
require "./_variables.php";
return "es"
.str_pad($oUser->cod_usuario, 3, "0", STR_PAD_LEFT)
.$oEnt->dato['c_mod']
.$oEnt->dato['c_sec']
;
}




//**********************************************************************************
function usuarioValidado() {
require "./_variables.php";

$datos = datosCookie($_COOKIE, $globs['name_cookie']);

if(!$datos['code'] || !$datos['email']){ return 0; }
else {
$globs['u_code']     = $datos['code'];
$globs['u_email']    = $datos['email'];
//echo "<br>>".$globs['u_code']." - ".$globs['u_email'];

return 1;
}
}


//**********************************************************************************
function datosCookie($cookie, $name)
{
$datos = array ('code' => '');
$dat = explode("|", $cookie[$name]);
if($dat[0] && $dat[1]) {
$datos['code']    = $dat[0];
$datos['email']      = $dat[1];
//echo "<br>>".$datos['code']." - ".$datos['email'];
}
return $datos;
}

//*/

?>
