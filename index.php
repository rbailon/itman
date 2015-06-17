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
    INDEX.php
    ===================
    Programa principal

    Version: 0.1
    Creado: 20150218
    Autor: rbailonf@gmail.com
    Ultima Modificacion: 20150220
    /////////////////////////////////////////////////////////////////////////

*/

    // COMENTAR o ELIMINAR esta linea una vez que no haga falta ver los ERRORES 
    error_reporting(E_ALL ^ E_NOTICE); ini_set('display_errors', '1');
    // .........................................


    include_once('./_cl/class.SESSION.php');
    include_once('./_cl/class.DBPDO.php');
    include_once('./_cl/class.PERSON.php');
    include_once('./_cl/class.DEPARTAMENT.php');
    include_once('./_cl/class.CENTER.php');
    include_once('./_cl/class.SMARTTAB.php');
    include_once('./_VARS&CONST.php');
    include_once('./_FUNCIONS.php');


    session_start();
    //SESSION::error("Yeah!");

    // CERRAR SESSION Y BORRAR DATOS - Preparar un cierre de cesión !!!!!
    if (isset($_GET['out'])) {

        SESSION::destroy();
        header("Location:?"); // Recarga index.php

    } elseif (SESSION::authenticate()) {

      
        $DB = new DBPDO();                      // Conectar a base de datos
        $User = new USER ($_SESSION['id']);        // Cargar usuario
        $Sess = new SESSION ($_SESSION['id']); // Cargar usuario

        include_once('./apli.php');

    } else {


        if (isset($_POST['user']) and isset($_POST['pass'])) {

            // Conectar a la base de datos y comprobar
            // los datos de login (usuario y clave)
            $DB = new DBPDO();
            $row = $DB->fetch (" SELECT * FROM tb_personas WHERE usuario = '".$_POST['user']."' AND pass = password('".$_POST['pass']."') ");

            if($row) {

                // DATOS DE LA SESSION INICIADA
                $_SESSION['id']              = $row['cod_persona'];
                $_SESSION['user']            = $row['usuario'];
                $_SESSION['userAgent']       = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['IPaddress']       = $_SERVER['REMOTE_ADDR'];
                $_SESSION['LastActivity']    = $_SERVER['REQUEST_TIME'];
                //$_SESSION[SKey]          = uniqid(mt_rand(), true);


                header("Location:?ch=es001"); // Recarga index.php

            }
        }

        // Pantalla de login
        include_once ("login.php");

    }

    //Desconectamos la base de datos
    if (isset($DB)) { $DB = null; }

    //----------------      ***************      ----------------
    //----------------         *********         ----------------
    //----------------            ***            ----------------

?>