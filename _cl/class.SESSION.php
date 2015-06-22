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
    Clase SESSION
    ===================
    Para controlar el acceso al sistema y las variables de entorno de 
    funcionamiento del programa.

*/


//================================
class SESSION
{
    private static $debug = 0;      // [0]NO muestra información [1]Muestra información
    private static $time = 3600;    // Tiempo sin interactuar 3600seg = 1h
    public $c_oper = 0;             // Codigo de operación
    public $data = array();         // Array de datos del objeto SESSION


    public function __construct() {

        // Si existe el chorizo de la URL, se desgrana
        if (isset($_GET['ch'])) {

            $this->c_oper   = substr($_GET['ch'], 0,2);

        } else {

            // Valores por defecto
            $this->c_oper   = "001";

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
/*
    //**********************************************************************
    function SESSION($GET_vars, $POST_vars)
    {
        $this->cargar_datos_http($GET_vars, $POST_vars);
    }


    //**********************************************************************
    function cargar_datos_http($GET_vars, $POST_vars)
    {
        foreach($GET_vars as $key => $value)
        {
            $this->dato[$key] = $value;
            //echo "<br>Cargando $key => $value";
        }

        foreach($POST_vars as $key => $value)
        {
            $this->dato[$key] = $value;
            //echo "<br>Cargando $key => $value";
        }
    }
    
    
    //**********************************************************************
    function makeSelect($id, $nombre, $clase, $valor, $tupla, $disabled) {
        $d = '';
        
        if($nombre) $n = ' name="'.$nombre.'"';
        //if($clase) $c = ' class="'.$clase.'"';
        if(!$disabled) $d = 'disabled';
        
        $ss = '
        <select id="'.$id.'" '.$d.$n.' class="bool '.$c.'">';

        foreach($tupla as $key => $val) {
            $selected = ''; if($valor && ($valor == $key)) $selected = 'selected';

            $ss .= '
        <option '.$selected.' value="'.$key.'">'.$val.'</option>';
        }
        $ss .= '
        </select>';
        
        return $ss;
    }
//*/
}

?>
